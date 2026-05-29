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

app.use(express.json({ limit: "25mb" })); // Tăng dung lượng truyền ảnh Base64 chất lượng cao

// Ensure uploads directory exists
const uploadsDir = path.join(process.cwd(), "uploads");
if (!fs.existsSync(uploadsDir)) {
  fs.mkdirSync(uploadsDir, { recursive: true });
}

// Serve uploaded files statically
app.use("/uploads", express.static(uploadsDir));

// API to list uploaded images
app.get("/api/uploaded-images", (req, res) => {
  try {
    if (!fs.existsSync(uploadsDir)) {
      return res.json([]);
    }
    const files = fs.readdirSync(uploadsDir);
    const images = files.map(file => ({
      name: file,
      url: `/uploads/${file}`,
      size: fs.statSync(path.join(uploadsDir, file)).size,
      mtime: fs.statSync(path.join(uploadsDir, file)).mtime
    }));
    res.json(images);
  } catch (err: any) {
    res.status(500).json({ error: err.message });
  }
});

// API to handle custom image uploads (Base64 approach to avoid node-multipart issues)
app.post("/api/upload", (req, res) => {
  try {
    const { fileName, fileData, targetType } = req.body;
    if (!fileName || !fileData) {
      return res.status(400).json({ error: "Thiếu dữ liệu tệp tin hoặc tên tệp tin." });
    }

    // Extract base64 content
    const base64Data = fileData.replace(/^data:image\/\w+;base64,/, "");
    const buffer = Buffer.from(base64Data, "base64");

    let savedName = fileName;
    
    // In order to make it fit size & auto-replace targets, we apply unified names based on targetType
    if (targetType === "maintenance_logo") {
      savedName = "maintenance_logo.png";
    } else if (targetType === "avatar") {
      savedName = "avatar.jpg";
    } else if (targetType === "header_logo") {
      savedName = "header_logo.png";
    } else {
      // Clean and sanitize custom filename to retain user original files if specified
      savedName = Date.now() + "_" + fileName.replace(/[^a-zA-Z0-9.-]/g, "_");
    }

    const filePath = path.join(uploadsDir, savedName);
    fs.writeFileSync(filePath, buffer);

    console.log(`Saved file to ${filePath} successfully for target ${targetType}.`);

    res.json({
      success: true,
      url: `/uploads/${savedName}?v=${Date.now()}`,
      fileName: savedName
    });
  } catch (error: any) {
    console.error("Upload error:", error);
    res.status(500).json({ error: "Tải tệp tin lên thất bại: " + error.message });
  }
});

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
    botReply: "Chào bạn! Derek Flow cung cấp 2 gói dịch vụ chính cho SEO: Gói SEO Starter dành cho doanh nghiệp nhỏ là 15tr/tháng, và gói bán chạy SEO Pro là 35tr/tháng với chiến lược SEO chuyên sâu, phân tích đối thủ 24/7 và đẩy top không giới hạn từ khóa. Tôi có thể giúp bạn đăng ký tư vấn miễn phí ngay bây giờ!",
    date: "2026-05-22T02:10:00Z"
  }
];

// Fallback high-quality responses if GEMINI_API_KEY is not available
const fallbackBotResponses = (userMsg: string): string => {
  const msg = userMsg.toLowerCase();
  
  // Strict scope validation: if the query is unrelated to customer support, Derek Flow, SEO, web, automation or contact, refuse politely.
  const isRelated = 
    msg.includes("giá") || msg.includes("chi phí") || msg.includes("gói") || msg.includes("bao nhiêu") || msg.includes("mua") || msg.includes("thanh toán") ||
    msg.includes("seo") || msg.includes("từ khóa") || msg.includes("traffic") || msg.includes("gsc") || msg.includes("analytics") || msg.includes("đẩy top") ||
    msg.includes("web") || msg.includes("thiết kế") || msg.includes("giao diện") || msg.includes("react") || msg.includes("vite") || msg.includes("mã nguồn") ||
    msg.includes("automation") || msg.includes("tự động") || msg.includes("agent") || msg.includes("chatbot") || msg.includes("n8n") || msg.includes("zapier") || msg.includes("make") ||
    msg.includes("liên hệ") || msg.includes("đăng ký") || msg.includes("tư vấn") || msg.includes("đặt lịch") || msg.includes("sđt") || msg.includes("điện thoại") || msg.includes("hotline") || msg.includes("zalo") ||
    msg.includes("quy trình") || msg.includes("bước") || msg.includes("làm việc") || msg.includes("derek") || msg.includes("flow") || msg.includes("giới thiệu") || msg.includes("chăm sóc") || msg.includes("hỗ trợ") ||
    msg.includes("chào") || msg.includes("hello") || msg.includes("hi");

  if (!isRelated) {
    return "Tôi là trợ lý AI của Derek Flow, chỉ được lập trình để trả lời các câu hỏi về chăm sóc khách hàng và giới thiệu các sản phẩm, giải pháp (SEO, Website, AI & Automation) của chúng tôi. Rất tiếc tôi không thể giải đáp các câu hỏi ngoài phạm vi này. Xin mời bạn hỏi thêm về dịch vụ của chúng tôi!";
  }

  if (msg.includes("giá") || msg.includes("chi phí") || msg.includes("bảng giá") || msg.includes("bao nhiêu")) {
    return "Chào bạn! Hiện tại Derek Flow cung cấp các gói dịch vụ tối ưu như sau:\n\n" +
           "1. **SEO Starter**: 15.000.000đ/tháng - Phù hợp cho SME bắt đầu xây dựng hiện diện số (Tối ưu 10 trang, GSC & Google Analytics, nghiên cứu 50 từ khóa).\n" +
           "2. **SEO Pro (Khuyên Dùng)**: 35.000.000đ/tháng - Chiến lược toàn diện bứt phá vị trí dẫn đầu (Không giới hạn từ khóa, SEO Audit sâu định kỳ, chiến lược content & backlink chất lượng cao).\n" +
           "3. **AI & Automation**: Từ 60.000.000đ/dự án - Tự động hóa quy trình nghiệp vụ thông minh, cài đặt AI Chatbot thông minh RAG, kết nối API hệ thống để tối đa hóa hiệu suất.\n\n" +
           "Bạn muốn tư vấn trực tiếp gói nào, hãy gửi thông tin hoặc nhấn nút đặt lịch nhé!";
  }
  
  if (msg.includes("seo") || msg.includes("từ khóa") || msg.includes("search console")) {
    return "Dịch vụ **SEO Fullstack** của Derek Flow tập trung tối ưu hóa từ cấu trúc mã nguồn, tốc độ tải trang, đến chiến lược Content sâu sắc. Bạn có thể xem kết quả thực tế như dự án Mỹ phẩm Hoa Kỳ tăng trưởng ngoạn mục **+210% Organic Traffic** sau 4 tháng triển khai. Bạn có muốn nhận một bản đánh giá (Audit) trang web miễn phí không?";
  }
  
  if (msg.includes("web") || msg.includes("thiết kế") || msg.includes("react") || msg.includes("vite") || msg.includes("wordpress") || msg.includes("wp")) {
    return "Derek Flow thiết kế website WordPress tốt nhất cho SEO, tối giản theo nhu cầu bằng code custom theme hoặc Elementor kéo thả thông dụng. Website được tối ưu hóa tốc độ tải trang phản hồi cực nhanh, thân thiện di động tuyệt đối và sẵn sàng SEO bài bản từ nền móng hạ tầng giúp bạn gia tăng lưu lượng truy cập ban đầu.";
  }
  
  if (msg.includes("automation") || msg.includes("tự động hóa") || msg.includes("agent") || msg.includes("chatbot") || msg.includes("n8n") || msg.includes("zapier")) {
    return "Giải pháp **AI Agent & Automation** của chúng tôi giúp tự động hóa các tác vụ lặp đi lặp lại bằng công nghệ AI tiên tiến, tích hợp Zapier/Make/N8N, gửi luồng Email tự động, CRM và phát triển Trợ lý ảo AI thông minh phản hồi nhanh 24/7. Điều này giúp cắt giảm tới 80% thời gian phản hồi khách hàng và tiết kiệm tối thiểu 40% chi phí nhân sự.";
  }
  
  if (msg.includes("liên hệ") || msg.includes("đăng ký") || msg.includes("tư vấn") || msg.includes("đặt lịch") || msg.includes("sđt") || msg.includes("điện thoại")) {
    return "Rất tuyệt! Bạn có thể điền nhanh thông tin vào biểu mẫu Liên Hệ của website, hoặc gửi số điện thoại & yêu cầu của bạn ở đây. Derek Flow hoặc trợ lý tự động sẽ liên lạc lại cho bạn trong vòng tối đa 2 giờ làm việc qua Zalo/Hotline.";
  }
  
  if (msg.includes("quy trình") || msg.includes("bước") || msg.includes("làm việc")) {
    return "Quy trình làm việc chuyên nghiệp chuẩn của Derek Flow gồm 4 bước rõ ràng:\n" +
           "1. **Tư vấn**: Lắng nghe bài toán doanh nghiệp và phân tích kỹ lưỡng.\n" +
           "2. **Lên Kế Hoạch**: Thiết kế giải pháp kỹ thuật & lộ trình chi tiết.\n" +
           "3. **Thực Thi**: Phát triển, tối ưu hóa và kiểm nghiệm nghiệm ngặt.\n" +
           "4. **Báo Cáo**: Đo lường hiệu quả chuyển đổi thực tế và bàn giao hệ thống trực quan.";
  }
  
  return "Chào bạn, tôi là trợ lý AI tự động của chuyên gia Derek Flow. Tôi có thể hỗ trợ cung cấp thông tin gói dịch vụ SEO, xây dựng website WordPress chuẩn SEO bản đẹp và hướng dẫn bạn đăng ký tư vấn hoặc thanh toán mô phỏng trực tuyến an toàn. Bạn có câu hỏi nào cụ thể hơn không?";
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
      "Bạn là trợ lý AI thông minh tích hợp trên trang web chính thức của chuyên gia Derek Flow (SEO Specialist & AI Automator, Senior Strategist & Full-stack Developer).\n" +
      "QUY TẮC BẮT BUỘC (CRITICAL MANDATE - STRICTLY ENFORCED):\n" +
      "- Bạn CHỈ ĐƯỢC PHÉP trả lời các câu hỏi và thực hiện hội thoại liên quan đến CHĂM SÓC KHÁCH HÀNG (hỗ trợ, giải đáp thủ tục, khiếu nại, trợ giúp kỹ thuật hệ thống, hướng dẫn đặt lịch hẹn) và GIỚI THIỆU SẢN PHẨM/DỊCH VỤ của Derek Flow (bảng giá, dịch vụ SEO Fullstack, thiết kế website WordPress chuẩn SEO, năng lực chuyên môn của Derek Flow).\n" +
      "- Tuyệt đối KHÔNG ĐƯỢC phép trả lời bất kỳ chủ đề nào khác nằm ngoài phạm vi này (ví dụ: TUYỆT ĐỐI từ chối giải toán, viết code lập trình chung không liên quan đến sản phẩm/mã nguồn của Derek Flow, đưa công thức nấu ăn, viết văn thơ phiếm diện, kiến thức lịch sử địa lý thế giới rộng lớn, hoặc tâm sự/tán gẫu không mục đích...). Hãy từ chối một cách lịch sự nhưng cực kỳ dứt khoát.\n" +
      "- Nếu người dùng cố tình chuyển chủ đề ngoài phạm vi dịch vụ và chăm sóc khách hàng của Derek Flow, hãy phản hồi chuẩn như sau: 'Tôi là trợ lý AI của Derek Flow, chỉ được lập trình để trả lời các câu hỏi về chăm sóc khách hàng và giới thiệu các sản phẩm/dịch vụ (SEO, Thiết kế website WordPress) của chúng tôi. Rất tiếc tôi không thể giải đáp các câu hỏi ngoài phạm vi này. Xin mời bạn hỏi thêm về dịch vụ của chúng tôi!'\n\n" +
      "Nhiệm vụ của bạn là tư vấn tận tình, chuyên nghiệp, lịch sự theo tôn chỉ trực quan mới mẻ và thực chất.\n" +
      "Hãy cung cấp thông tin chính xác phục vụ khách hàng với các trọng tâm sau:\n" +
      "1. Chuyên gia Derek Flow: Hơn 10 năm kinh nghiệm tại điểm giao thoa giữa Technical SEO và Phát triển phần mềm tùy chỉnh độc đáo. Tư vấn các giải pháp bứt phá tăng trưởng bền vững cho doanh nghiệp.\n" +
      "2. Dịch vụ chủ đạo:\n" +
      "   - SEO Fullstack: Tối ưu Technical SEO sâu, Content chất lượng cao, backlink audit, đẩy top tìm kiếm an toàn tuyệt đối. Đạt mốc tiêu biểu +210% Organic traffic cho nhãn hàng mĩ phẩm cao cấp.\n" +
      "   - Thiết kế website WordPress: Phong cách tối giản, chuẩn SEO trên WordPress bằng code custom theme gọn nhẹ hoặc Elementor dễ bảo trì quản trị.\n" +
      "3. Bảng giá:\n" +
      "   - SEO Starter: 15.000.000 VND / tháng\n" +
      "   - SEO Pro: 35.000.000 VND / tháng (Bán chạy nhất)\n" +
      "   - Web & SEO Premium: Báo giá tùy chỉnh khoảng từ 55.000.000 VND thiết kế trọn gói.\n" +
      "4. Quy trình 4 bước: Tư vấn -> Lên Kế Hoạch -> Thực Thi -> Báo Cáo rõ ràng.\n" +
      "Khuyến khích khách hàng đăng ký thông tin liên hệ như họ tên, sđt để Derek Flow tư vấn trực tiếp, hoặc nhấn gói mua để thanh toán mô phỏng trực tuyến bảo mật trên web. Hãy viết bằng tiếng Việt lưu loát, bố cục sạch đẹp, dễ đọc.";

    const response = await ai.models.generateContent({
      model: "gemini-3.5-flash",
      contents: userMessage,
      config: {
        systemInstruction: systemInstruction,
        temperature: 0.7,
      },
    });

    botReply = response.text || "Xin lỗi, hiện tại tôi chưa xử lý được câu hỏi này. Bạn hãy liên hệ trực tiếp số Zalo/Hotline của anh Derek Flow nhé!";
    
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

// Endpoint xem trước trực quan trực tiếp trang Bảo Trì wordpress-theme/page-maintenance.php
app.get("/maintenance", (req, res) => {
  try {
    const filePath = path.join(process.cwd(), "wordpress-theme", "page-maintenance.php");
    if (!fs.existsSync(filePath)) {
      return res.status(404).send("File page-maintenance.php không tồn tại.");
    }

    let content = fs.readFileSync(filePath, "utf-8");

    // Khởi tạo kiểm tra tính hiện diện của logo tùy biến (file uploads/maintenance_logo.png)
    const hasCustomLogo = fs.existsSync(path.join(uploadsDir, "maintenance_logo.png"));
    const logoUrl = `/uploads/maintenance_logo.png?v=${Date.now()}`;

    // Tìm và thay thế khối mã PHP Logo tùy chỉnh một cách thông minh, sạch sẽ trước khi thực hiện các regex khác
    const logoBlockRegex = /<\?php\s+\/\/ Hỗ trợ logo tùy chỉnh được tải lên[\s\S]*?<\?php\s+endif;\s*\?>/;
    if (logoBlockRegex.test(content)) {
      if (hasCustomLogo) {
        const replacementImg = `<img src="${logoUrl}" alt="Branding Logo" class="w-full h-full object-cover" style="width: 100% !important; height: 100% !important; object-fit: cover !important;" />`;
        content = content.replace(logoBlockRegex, replacementImg);
      } else {
        const replacementSvg = `<svg viewBox="0 0 400 160" class="w-full h-full fill-none dl-branding-logo-svg" style="width: 100% !important; height: 100% !important; display: block !important;" xmlns="http://www.w3.org/2000/svg">
                            <rect x="10" y="10" width="380" height="140" rx="28" stroke="#FFD700" stroke-width="8" fill="transparent" />
                            <circle cx="50" cy="45" r="10" fill="#FF5F56" />
                            <circle cx="85" cy="45" r="10" fill="#FFBD2E" />
                            <circle cx="120" cy="45" r="10" fill="#27C93F" />
                            <path d="M 50 82 L 70 95 L 50 108" stroke="#FFD700" stroke-width="9" stroke-linecap="round" stroke-linejoin="round" />
                            <line x1="82" y1="108" x2="102" y2="108" stroke="#FFD700" stroke-width="9" stroke-linecap="round" />
                            <text x="125" y="107" fill="#D1D5DB" font-family="ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, 'Liberation Mono', 'Courier New', monospace" font-size="38" font-weight="bold" letter-spacing="1">derek.flow</text>
                            <rect x="358" y="78" width="18" height="30" fill="#FFD700" />
                        </svg>`;
        content = content.replace(logoBlockRegex, replacementSvg);
      }
    }

    // Thay thế các tags PHP cơ bản thành nội dung hiển thị tĩnh nguyên gốc trên trình duyệt
    content = content.replace(/<\?php\s+language_attributes\(\);\s*\?>/g, 'lang="vi"');
    content = content.replace(/<\?php\s+bloginfo\(['"]charset['"]\);\s*\?>/g, 'UTF-8');
    content = content.replace(/<\?php\s+wp_head\(\);\s*\?>/g, "");
    content = content.replace(/<\?php\s+wp_footer\(\);\s*\?>/g, "");

    // Thay thế các trường PHP ACF / dl_field thành giá trị văn bản mặc định dự phòng
    content = content.replace(/<\?php\s+echo\s+esc_html\(dl_field\(['"]maintenance_tag['"]\s*,\s*['"](.*?)['"]\)\);\s*\?>/g, "$1");
    content = content.replace(/<\?php\s+echo\s+esc_html\(dl_field\(['"]maintenance_title['"]\s*,\s*['"](.*?)['"]\)\);\s*\?>/g, "$1");
    content = content.replace(/<\?php\s+echo\s+esc_html\(dl_field\(['"]maintenance_desc['"]\s*,\s*['"](.*?)['"]\)\);\s*\?>/g, "$1");
    content = content.replace(/<\?php\s+echo\s+esc_html\(dl_field\(['"]maintenance_progress_label['"]\s*,\s*['"](.*?)['"]\)\);\s*\?>/g, "$1");
    content = content.replace(/<\?php\s+echo\s+esc_html\(dl_field\(['"]maintenance_progress_percent['"]\s*,\s*['"](.*?)['"]\)\);\s*\?>/g, "$1");
    content = content.replace(/<\?php\s+echo\s+esc_html\(dl_field\(['"]maintenance_progress_subtext['"]\s*,\s*['"](.*?)['"]\)\);\s*\?>/g, "$1");
    content = content.replace(/<\?php\s+echo\s+esc_html\(dl_field\(['"]maintenance_support_label['"]\s*,\s*['"](.*?)['"]\)\);\s*\?>/g, "$1");

    // Xử lý biến số tiến độ
    content = content.replace(/<\?php\s+\$progress_val\s*=\s*intval\(dl_field\(['"]maintenance_progress_num['"]\s*,\s*['"](.*?)['"]\)\);\s*\?>/g, "");
    content = content.replace(/<\?php\s+echo\s+esc_attr\(\$progress_val\);\s*\?>/g, "95");

    // Xử lý liên kết và text Zalo
    content = content.replace(/<\?php\s*\$zalo_url\s*=\s*dl_field\(['"]maintenance_zalo_url['"]\s*,\s*['"](.*?)['"]\);\s*.*?/g, "");
    content = content.replace(/<\?php\s+echo\s+esc_url\(\$zalo_url\);\s*\?>/g, "https://zalo.me/093x9x4xxx");
    content = content.replace(/<\?php\s+echo\s+esc_html\(\$zalo_text\);\s*\?>/g, "Chat qua Zalo");

    // Xử lý hotline
    content = content.replace(/<\?php\s*\$hotline_num\s*=\s*dl_field\(['"]maintenance_hotline_number['"]\s*,\s*['"](.*?)['"]\);\s*.*?/g, "");
    content = content.replace(/<\?php\s+echo\s+esc_attr\(preg_replace\('[^']+'\s*,\s*''\s*,\s*\$hotline_num\)\);\s*\?>/g, "093x9x4xxx");
    content = content.replace(/<\?php\s+echo\s+esc_html\(\$hotline_text\);\s*\?>/g, "Hotline");

    // Năm chân trang
    content = content.replace(/<\?php\s+echo\s+date\(['"]Y['"]\);\s*\?>/g, "2026");

    // Loại bỏ khối php định nghĩa template name ở đầu file
    content = content.replace(/^<\?php[\s\S]*?\?>/i, "");

    res.setHeader("Content-Type", "text/html; charset=utf-8");
    res.send(content);
  } catch (error: any) {
    res.status(500).send("Lỗi xử lý giao diện bảo trì: " + error.message);
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
