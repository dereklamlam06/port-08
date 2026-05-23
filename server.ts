import express from "express";
import path from "path";
import fs from "fs";
import { createServer as createViteServer } from "vite";
import { GoogleGenAI } from "@google/genai";
import dns from "dns";
import AdmZip from "adm-zip";

// Fix Node.js DNS path resolution for localhost lookups
dns.setDefaultResultOrder("ipv4first");

const app = express();
const PORT = 3000;

app.use(express.json());

// In-memory data store for Leads, Orders, and Chat Logs (resets on server restart, great for preview state)
interface Lead {
  id: string;
  name: string;
  email: string;
  phone: string;
  service: string;
  message: string;
  date: string;
  status: "new" | "contacted" | "qualified";
}

interface Order {
  id: string;
  clientName: string;
  clientEmail: string;
  servicePackage: string;
  amount: number;
  paymentMethod: string;
  status: "pending" | "completed" | "failed";
  date: string;
  txHash?: string;
}

interface ChatLog {
  id: string;
  userMessage: string;
  botReply: string;
  date: string;
  clientEmail?: string;
}

const leads: Lead[] = [
  {
    id: "lead_1",
    name: "Nguyễn Văn Anh",
    email: "anhnv@example.com",
    phone: "0901234567",
    service: "Build Web",
    message: "Tôi cần thiết kế 1 trang web giới thiệu sản phẩm cao cấp, SEO tốt.",
    date: "2026-05-20T08:30:00Z",
    status: "new"
  },
  {
    id: "lead_2",
    name: "Trần Thị Hòa",
    email: "hoatran@retail.vn",
    phone: "0918765432",
    service: "SEO Fullstack",
    message: "Tư vấn đẩy top 50 từ khóa ngành mỹ phẩm cao cấp.",
    date: "2026-05-21T14:15:00Z",
    status: "qualified"
  }
];

const orders: Order[] = [
  {
    id: "ORD-9382",
    clientName: "Trần Thị Hòa",
    clientEmail: "hoatran@retail.vn",
    servicePackage: "SEO Pro Plan",
    amount: 35000000,
    paymentMethod: "VietQR Transfer",
    status: "completed",
    date: "2026-05-21T14:20:00Z",
    txHash: "TXN74829103"
  },
  {
    id: "ORD-9301",
    clientName: "Lê Minh Quốc",
    clientEmail: "quoclm@techstart.com",
    servicePackage: "SEO Starter Plan",
    amount: 15000000,
    paymentMethod: "ATM Card",
    status: "completed",
    date: "2026-05-18T10:11:00Z",
    txHash: "TXN1029481"
  }
];

const chatLogs: ChatLog[] = [
  {
    id: "chat_1",
    userMessage: "Chào bạn, chi phí SEO bên mình thế nào?",
    botReply: "Chào bạn! Derek Lâm cung cấp 2 gói dịch vụ chính cho SEO: Gói SEO Starter dành cho doanh nghiệp nhỏ là 15tr/tháng, và gói bán chạy SEO Pro là 35tr/tháng với chiến lược SEO chuyên sâu, phân tích đối thủ 24/7 và đẩy top không giới hạn từ khóa. Tôi có thể giúp bạn đăng ký tư vấn miễn phí ngay bây giờ!",
    date: "2026-05-22T02:10:00Z"
  }
];

// Fallback high-quality responses if GEMINI_API_KEY is not available
const fallbackBotResponses = (userMsg: string): string => {
  const msg = userMsg.toLowerCase();
  
  if (msg.includes("giá") || msg.includes("chi phí") || msg.includes("bảng giá") || msg.includes("bao nhiêu")) {
    return "Chào bạn! Hiện tại Derek Lâm cung cấp các gói dịch vụ tối ưu như sau:\n\n" +
           "1. **SEO Starter**: 15.000.000đ/tháng - Phù hợp cho SME bắt đầu xây dựng hiện diện số (Tối ưu 10 trang, GSC & Google Analytics, nghiên cứu 50 từ khóa).\n" +
           "2. **SEO Pro (Khuyên Dùng)**: 35.000.000đ/tháng - Chiến lược toàn diện bứt phá vị trí dẫn đầu (Không giới hạn từ khóa, SEO Audit sâu định kỳ, chiến lược content & backlink chất lượng cao).\n" +
           "3. **AI & Automation**: Từ 60.000.000đ/dự án - Tự động hóa quy trình nghiệp vụ thông minh, cài đặt AI Chatbot thông minh RAG, kết nối API hệ thống để tối đa hóa hiệu suất.\n\n" +
           "Bạn muốn tư vấn trực tiếp gói nào, hãy gửi thông tin hoặc nhấn nút đặt lịch nhé!";
  }
  
  if (msg.includes("seo") || msg.includes("từ khóa") || msg.includes("search console")) {
    return "Dịch vụ **SEO Fullstack** của Derek Lâm tập trung tối ưu hóa từ cấu trúc mã nguồn, tốc độ tải trang, đến chiến lược Content sâu sắc. Bạn có thể xem kết quả thực tế như dự án Mỹ phẩm Hoa Kỳ tăng trưởng ngoạn mục **+210% Organic Traffic** sau 4 tháng triển khai. Bạn có muốn nhận một bản đánh giá (Audit) trang web miễn phí không?";
  }
  
  if (msg.includes("web") || msg.includes("thiết kế") || msg.includes("react") || msg.includes("vite")) {
    return "Derek Lâm thiết kế website chuẩn UX/UI theo phong cách **Minimalist & Luxury Tech**, tối ưu tải trang cực nhanh (< 1 giây), nền tảng React/Vite kết hợp Express bảo mật tối đa và tương thích 100% thiết bị di động. Website được tối ưu SEO toàn diện từ lúc code giúp bạn tiết kiệm chi phí marketing tối đa.";
  }

  if (msg.includes("automation") || msg.includes("tự động hóa") || msg.includes("agent") || msg.includes("chatbot") || msg.includes("n8n") || msg.includes("zapier")) {
    return "Giải pháp **AI Agent & Automation** của chúng tôi giúp tự động hóa các tác vụ lặp đi lặp lại bằng công nghệ AI tiên tiến, tích hợp Zapier/Make/N8N, gửi luồng Email tự động, CRM và phát triển Trợ lý ảo AI thông minh phản hồi nhanh 24/7. Điều này giúp cắt giảm tới 80% thời gian phản hồi khách hàng và tiết kiệm tối thiểu 40% chi phí nhân sự.";
  }

  if (msg.includes("liên hệ") || msg.includes("đăng ký") || msg.includes("tư vấn") || msg.includes("đặt lịch") || msg.includes("sđt") || msg.includes("điện thoại")) {
    return "Rất tuyệt! Bạn có thể điền nhanh thông tin vào biểu mẫu Liên Hệ của website, hoặc gửi số điện thoại & yêu cầu của bạn ở đây. Derek Lâm hoặc trợ lý tự động sẽ liên lạc lại cho bạn trong vòng tối đa 2 giờ làm việc qua Zalo/Hotline.";
  }

  if (msg.includes("quy trình") || msg.includes("bước") || msg.includes("làm việc")) {
    return "Quy trình làm việc chuyên nghiệp chuẩn của Derek Lâm gồm 4 bước rõ ràng:\n" +
           "1. **Tư vấn**: Lắng nghe bài toán doanh nghiệp và phân tích kỹ lưỡng.\n" +
           "2. **Lên Kế Hoạch**: Thiết kế giải pháp kỹ thuật & lộ trình chi tiết.\n" +
           "3. **Thực Thi**: Phát triển, tối ưu hóa và kiểm nghiệm nghiệm ngặt.\n" +
           "4. **Báo Cáo**: Đo lường hiệu quả chuyển đổi thực tế và bàn giao hệ thống trực quan.";
  }

  return "Chào bạn, tôi là trợ lý AI tự động của chuyên gia Derek Lâm. Tôi có thể hỗ trợ cung cấp thông tin gói dịch vụ SEO, xây dựng website Luxury Tech, tích hợp tự động hóa qua Make/N8N/Zapier và hướng dẫn bạn đăng ký tư vấn hoặc thanh toán trực tuyến an toàn. Bạn có câu hỏi nào cụ thể hơn không?";
};

// API route first before Vite setup
// 1. Chatbot endpoint using server-side Gemini SDK with automatic fallback
app.post("/api/chat", async (req, res) => {
  const { message, clientEmail } = req.body;
  if (!message) {
    return res.status(400).json({ error: "Missing message field" });
  }

  const userMessage = message.trim();
  let botReply = "";

  const apiKey = process.env.GEMINI_API_KEY;
  const isKeyUnset = !apiKey || apiKey === "MY_GEMINI_API_KEY" || apiKey.trim() === "";

  if (isKeyUnset) {
    // Elegant fallback response when API Key is missing or placeholder
    botReply = fallbackBotResponses(userMessage);
    const newLog: ChatLog = {
      id: "chat_" + Date.now(),
      userMessage,
      botReply,
      clientEmail,
      date: new Date().toISOString()
    };
    chatLogs.push(newLog);
    return res.json({ response: botReply });
  }

  try {
    // Standard initialization per guidelines
    const ai = new GoogleGenAI({
      apiKey: apiKey,
      httpOptions: {
        headers: {
          "User-Agent": "aistudio-build",
        }
      }
    });

    const systemInstruction = 
      "Bạn là trợ lý AI thông minh tích hợp trên trang web chính thức của chuyên gia Derek Lâm (SEO Specialist & AI Automator, Senior Strategist & Full-stack Developer).\n" +
      "Nhiệm vụ của bạn là tư vấn tận tình, chuyên nghiệp, lịch sự theo tôn chỉ trải nghiệm tối giản và sang trọng (Luxury Tech).\n" +
      "Hãy cung cấp thông tin chính xác phục vụ khách hàng với các trọng tâm sau:\n" +
      "1. Chuyên gia Derek Lâm: Hơn 10 năm kinh nghiệm tại điểm giao thoa giữa Technical SEO và Phát triển phần mềm tùy chỉnh độc đáo. Tư vấn các giải pháp bứt phá tăng trưởng bền vững cho doanh nghiệp.\n" +
      "2. Dịch vụ chủ đạo:\n" +
      "   - SEO Fullstack: Tối ưu Technical SEO sâu, Content chất lượng cao, backlink audit, đẩy top tìm kiếm an toàn tuyệt đối. Đạt mốc tiêu biểu +210% Organic traffic cho nhãn hàng mĩ phẩm cao cấp.\n" +
      "   - Thiết kế website: Phong cách Minimalist, tốc độ tải cực nhanh (<1s), thân thiện SEO 100%, chuẩn UX/UI di động mạnh mẽ trên nền tảng React/Vite/Express.\n" +
      "   - AI Agent & Automation: Phát triển chatbot bán hàng, tự động báo cáo marketing, kết nối hệ thống CRM bằng Zapier, N8N, Make giúp giảm 80% thời gian phản hồi.\n" +
      "3. Bảng giá:\n" +
      "   - SEO Starter: 15.000.000 VND / tháng\n" +
      "   - SEO Pro: 35.000.000 VND / tháng (Bán chạy nhất)\n" +
      "   - AI & Automation: Báo giá tùy chỉnh dự án thực tế (khoảng từ 60.000.000 VND trở lên)\n" +
      "4. Quy trình 4 bước: Tư vấn -> Lên Kế Hoạch -> Thực Thi -> Báo Cáo rõ ràng.\n" +
      "Khuyến khích khách hàng đăng ký thông tin liên hệ như họ tên, sđt để Derek Lâm tư vấn trực tiếp, hoặc nhấn gói mua để thanh toán mô phỏng trực tuyến bảo mật trên web. Hãy viết bằng tiếng Việt lưu loát, bố cục sạch đẹp, dễ đọc.";

    const response = await ai.models.generateContent({
      model: "gemini-3.5-flash",
      contents: userMessage,
      config: {
        systemInstruction: systemInstruction,
        temperature: 0.7,
      },
    });

    botReply = response.text || "Xin lỗi, hiện tại tôi chưa xử lý được câu hỏi này. Bạn hãy liên hệ trực tiếp số Zalo/Hotline của anh Derek Lâm nhé!";
    
    // Store chat logs for the admin analytics log view
    const newLog: ChatLog = {
      id: "chat_" + Date.now(),
      userMessage,
      botReply,
      clientEmail,
      date: new Date().toISOString()
    };
    chatLogs.push(newLog);

    return res.json({ response: botReply });
  } catch (error: any) {
    console.error("Gemini chatbot error:", error?.message || error);
    // Silent fail over to offline generator
    botReply = fallbackBotResponses(userMessage);
    return res.json({ response: botReply });
  }
});

// 2. Leads endpoints
app.post("/api/leads", (req, res) => {
  const { name, email, phone, service, message } = req.body;
  if (!name || !email) {
    return res.status(400).json({ error: "Họ tên và Email là bắt buộc để gửi thông tin." });
  }

  const newLead: Lead = {
    id: "lead_" + Date.now(),
    name,
    email,
    phone: phone || "Không cung cấp",
    service: service || "Yêu cầu tư vấn chung",
    message: message || "Khách hàng muốn tìm hiểu thêm về năng lực bứt phá doanh số.",
    date: new Date().toISOString(),
    status: "new"
  };

  leads.unshift(newLead);
  return res.status(201).json({ success: true, lead: newLead });
});

app.get("/api/leads", (req, res) => {
  res.json(leads);
});

app.post("/api/leads/update-status", (req, res) => {
  const { id, status } = req.body;
  const leadIndex = leads.findIndex(l => l.id === id);
  if (leadIndex > -1) {
    leads[leadIndex].status = status;
    return res.json({ success: true, lead: leads[leadIndex] });
  }
  res.status(404).json({ error: "Lead không tồn tại." });
});

// 3. Orders / Transactions (Online payment simulation)
app.post("/api/orders", (req, res) => {
  const { clientName, clientEmail, servicePackage, amount, paymentMethod } = req.body;
  if (!clientName || !clientEmail || !servicePackage) {
    return res.status(400).json({ error: "Vui lòng cung cấp đầy đủ thông tin thanh toán." });
  }

  const txHash = "TXN" + Math.floor(Math.random() * 90000000 + 10000000);
  const newOrder: Order = {
    id: "ORD-" + Math.floor(Math.random() * 9000 + 1000),
    clientName,
    clientEmail,
    servicePackage,
    amount: amount || 0,
    paymentMethod: paymentMethod || "Mô phỏng ngân hàng chuyển khoản QR",
    status: "completed", // Simulation succeeds instantly for better interactive flow
    date: new Date().toISOString(),
    txHash
  };

  orders.unshift(newOrder);
  return res.status(201).json({ success: true, order: newOrder });
});

app.get("/api/orders", (req, res) => {
  res.json(orders);
});

// 4. Analytics aggregated data
app.get("/api/analytics", (req, res) => {
  // Aggregate stats
  const totalLeads = leads.length;
  const totalOrders = orders.filter(o => o.status === "completed").length;
  const totalRevenue = orders
    .filter(o => o.status === "completed")
    .reduce((sum, order) => sum + order.amount, 0);
  
  const conversionRate = totalLeads > 0 ? parseFloat(((totalOrders / (totalLeads + 10)) * 100).toFixed(1)) : 18.5; // realistic mockup conversion baseline

  // Conversion path & performance statistics for Recharts
  const monthlyMetrics = [
    { name: "Thg 1", views: 1200, conversions: 24, sales: 8 },
    { name: "Thg 2", views: 1500, conversions: 35, sales: 12 },
    { name: "Thg 3", views: 2100, conversions: 48, sales: 16 },
    { name: "Thg 4", views: 3200, conversions: 75, sales: 24 },
    { name: "Thg 5", views: 4500, conversions: 110, sales: 38 }
  ];

  const serviceDistribution = [
    { name: "SEO Fullstack", value: leads.filter(l => l.service.includes("SEO")).length + 6 },
    { name: "Build Web", value: leads.filter(l => l.service.includes("Web")).length + 4 },
    { name: "AI Agent / Automation", value: leads.filter(l => l.service.includes("AI") || l.service.includes("Auto")).length + 5 }
  ];

  res.json({
    totals: {
      totalLeads,
      totalOrders,
      totalRevenue,
      conversionRate
    },
    monthlyMetrics,
    serviceDistribution,
    chatLogs: chatLogs.slice(0, 15) // send history
  });
});

// Endpoint ẩn để tải về toàn bộ mã nguồn WordPress Theme đã biên dịch
app.get("/api/download-theme", (req, res) => {
  try {
    const wordpressFolderPath = path.join(process.cwd(), "wordpress-theme");
    if (!fs.existsSync(wordpressFolderPath)) {
      return res.status(404).json({ error: "Không tìm thấy thư mục wordpress-theme" });
    }

    const zip = new AdmZip();
    
    // Add the local wordpress-theme directory under the zip root folder name "derek-lam-theme"
    zip.addLocalFolder(wordpressFolderPath, "derek-lam-theme");
    
    const zipBuffer = zip.toBuffer();

    res.setHeader("Content-Type", "application/zip");
    res.setHeader("Content-Disposition", "attachment; filename=derek-lam-wordpress-theme.zip");
    res.send(zipBuffer);
  } catch (error: any) {
    console.error("Lỗi nén wordpress-theme bằng adm-zip:", error);
    if (!res.headersSent) {
      res.status(500).json({ error: "Thao tác nén tài liệu WordPress thất bại: " + error.message });
    }
  }
});



// Port and Dev VS Prod environment binding
async function startServer() {
  if (process.env.NODE_ENV !== "production") {
    // Create Vite server in middleware mode
    const vite = await createViteServer({
      server: { middlewareMode: true },
      appType: "spa",
    });
    // Use vite's connect instance as middleware
    app.use(vite.middlewares);
  } else {
    const distPath = path.join(process.cwd(), "dist");
    app.use(express.static(distPath));
    // Serve index.html for SPA router on unmatched paths
    app.get("*", (req, res) => {
      res.sendFile(path.join(distPath, "index.html"));
    });
  }

  app.listen(PORT, "0.0.0.0", () => {
    console.log(`Express server in ${process.env.NODE_ENV || "development"} mode running on port ${PORT}`);
  });
}

startServer();
