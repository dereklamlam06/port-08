import React, { useState, useMemo, useEffect } from "react";
import { AppView } from "../types";
import { 
  Search, 
  Calendar, 
  Clock, 
  User, 
  ArrowRight, 
  ChevronLeft, 
  Sparkles, 
  Share2, 
  Heart, 
  Bookmark, 
  Send, 
  CheckCircle, 
  BookOpen,
  Mail,
  Award,
  Filter,
  ArrowUpRight,
  Grid,
  List,
  ChevronRight,
  ChevronsLeft,
  ChevronsRight
} from "lucide-react";
import { motion, AnimatePresence } from "motion/react";

interface BlogPost {
  id: string;
  title: string;
  slug: string;
  summary: string;
  content: string[];
  category: "SEO Thực Chiến" | "Thiết Kế Web" | "Tối Ưu Tốc Độ" | "Mindset";
  tags: string[];
  readTime: string;
  date: string;
  author: string;
  imageUrl: string;
  likes: number;
}

interface BlogViewProps {
  setCurrentView: (view: AppView) => void;
}

// Procedural generator to create exactly 1000 realistic high-quality posts
const generateSimulatedPosts = (basePosts: BlogPost[]): BlogPost[] => {
  const result = [...basePosts];
  
  const subjects = [
    "Tối ưu tỉ lệ chuyển đổi Lead", "Thiết kế trang Landing Page chuyển đổi", "Cải thiện trải nghiệm UI/UX", 
    "Xây dựng Entity Brand bền vững", "Tăng tốc cơ sở hạ tầng Cloud", "Bảo mật thông tin mã nguồn",
    "Phân tích bẫy chuyển hướng SEO", "Hành trình mua hàng đa kênh", "Thích ứng Google Core Update 2026",
    "Đồng bộ hóa dữ liệu Web và CRM", "Cấu trúc Schema Local SEO nâng cao", "Chiến lược Guest Post an toàn",
    "Kỹ thuật tối ưu nạp lười React SPA", "Tối ưu hóa bản đồ nhiệt Heatmap", "Thiết lập Landing Page chất lượng",
    "Phát triển Responsive Layout Web", "Đo lường ROI đa điểm chiến dịch SEO", "Tối kỹ Technical SEO audit"
  ];
  
  const frameworks = [
    "doanh nghiệp vừa và nhỏ SME", "startup công nghệ đột phá", "shop trực tuyến thương mại điện tử", 
    "chuỗi cửa hàng dịch vụ thẩm mỹ", "đại diện đại lý bất động sản", "nền tảng trường học trực tuyến",
    "phòng khám nha khoa tư nhân", "agency cung cấp giải pháp dịch vụ", "doanh nghiệp logistics phân phối"
  ];
  
  const methodologies = [
    "nền tảng React & Tailwind CSS", "cấu trúc CSS/JS hiện đại", "NextJS kết hợp Tailwind", "Topic Cluster đa ngữ nghĩa",
    "Cơ chế Cache phân tầng thông minh", "Thiết kế Responsive UI độc quyền", "Hệ quản trị CRM đồng bộ",
    "Phân tích hành vi dữ liệu người dùng", "Tối ưu hóa chỉ số LCP & CLS", "Mạng phân phối CDN nội bộ tối giản"
  ];

  const categoriesList: BlogPost["category"][] = ["SEO Thực Chiến", "Thiết Kế Web", "Tối Ưu Tốc Độ", "Mindset"];

  const tagsPool = [
    "SEO", "React", "Tailwind", "Vite", "Web Dev", "Lighthouse", 
    "CRO", "Responsive", "UI/UX", "Schema", "Bảo Mật", "Performance", "HTML5"
  ];

  const imagesPool = [
    "https://images.unsplash.com/photo-1519389950473-47ba0277781c?auto=format&fit=crop&w=800&q=80",
    "https://images.unsplash.com/photo-1551434678-e076c223a692?auto=format&fit=crop&w=800&q=80",
    "https://images.unsplash.com/photo-1526374965328-7f61d4dc18c5?auto=format&fit=crop&w=800&q=80",
    "https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=800&q=80",
    "https://images.unsplash.com/photo-1542744094-3a31f103e35f?auto=format&fit=crop&w=800&q=80",
    "https://images.unsplash.com/photo-1504868584819-f8e8b4b6d7e3?auto=format&fit=crop&w=800&q=80",
    "https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=format&fit=crop&w=800&q=80"
  ];

  // We have 4 base posts, so generate 996 more to reach exactly 1000
  for (let i = 1; i <= 996; i++) {
    const sub = subjects[i % subjects.length];
    const frame = frameworks[i % frameworks.length];
    const method = methodologies[i % methodologies.length];
    const cat = categoriesList[i % categoriesList.length];
    
    const title = `Kinh Nghiệm ${sub} Cho ${frame} Sử Dụng ${method}`;
    const slug = `simulated-post-${i}`;
    const dateDay = (28 - (i % 28)) || 1;
    const dateMonth = ["Tháng 5", "Tháng Tư", "Tháng Ba", "Tháng Hai", "Tháng Một"][i % 5];
    const likesCount = 10 + (i * 7) % 150;
    
    const postTags = [
      tagsPool[i % tagsPool.length],
      tagsPool[(i + 3) % tagsPool.length],
      tagsPool[(i + 7) % tagsPool.length]
    ].filter((v, idx, arr) => arr.indexOf(v) === idx);

    result.push({
      id: slug,
      title,
      slug,
      summary: `Bài hướng dẫn thực tế chi tiết số #${i + 4} về chủ đề ${sub}. Phân tích cách triển khai giải pháp ${method} giúp giảm thời gian phản hồi, tăng chất lượng Lead và gia tăng tỉ lệ chuyển đổi khách hàng đăng ký hiệu quả.`,
      category: cat,
      tags: postTags,
      readTime: `${4 + (i % 8)} phút đọc`,
      date: `${dateDay} ${dateMonth}, 2026`,
      author: "Derek Flow",
      imageUrl: imagesPool[i % imagesPool.length],
      likes: likesCount,
      content: [
        `Đây là hệ thống tài liệu hướng dẫn kỹ thuật mở rộng số #${i + 4} nằm trong danh mục tài nguyên gồm 1,000 chuyên đề tích hợp tăng trưởng của Derek Flow Specialist.`,
        `### 1. Tại sao cần áp dụng giải pháp ${sub}?`,
        `Giai đoạn chuyển đổi số của các ${frame} đòi hỏi sự tinh gọn tối đa. Việc ứng dụng ${method} giúp nâng tầm hiệu quả lên gấp nhiều lần, hạn chế triệt để tỷ lệ rơi rụng khách hàng do quy trình tư vấn chậm trễ.`,
        `### 2. Các mắt xích quan trọng nhất`,
        `- Xây dựng hệ cơ sở dữ liệu đồng bộ, lọc dữ liệu rác trước khi đẩy sang phễu AI xử lý.`,
        `- Thiết lập các lệnh kích hoạt (webhook) tức thời để gửi tin nhắn chào mừng trong vòng dưới 15 giây.`,
        `- Thực nghiệm đo lường định kỳ Core Web Vitals nhằm đem lại tốc độ tương tác mượt mà nhất.`,
        `Chúng tôi luôn cam kết cùng quý đối nghiệp tối ưu hóa và mang lại giá trị thực thụ cho công ty của bạn.`
      ]
    });
  }
  
  return result;
};

const basePosts: BlogPost[] = [
  {
    id: "semantic-content-seo",
    title: "Hướng Dẫn Cấu Trúc Semantic Content Lên Top Google Không Cần Nhiều Backlink",
    slug: "semantic-content-seo",
    summary: "Vì sao công cụ tìm kiếm ưu tiên câu trả lời có tính chuyên sâu & có cấu trúc hệ thống? Bộ xương Semantic Content chính là chìa khóa thâu tóm toàn bộ nhóm từ khóa ngách.",
    category: "SEO Thực Chiến",
    tags: ["Semantic Content", "SEO Onpage", "Topic Cluster", "Google Algorithm"],
    readTime: "6 phút đọc",
    date: "20 Tháng 5, 2026",
    author: "Derek Flow",
    imageUrl: "https://images.unsplash.com/photo-1572021335469-31706a17aaef?auto=format&fit=crop&w=800&q=80",
    likes: 42,
    content: [
      "Trong bối cảnh thuật toán Google liên tục cập nhật, việc nhồi nhét từ khóa hay spam backlink kém chất lượng đã hoàn toàn thoái trào. Kỷ nguyên của SEO hiện đại thuộc về **Semantic SEO (Tìm kiếm ngữ nghĩa)** — nơi Google đánh giá nội dung của bạn dựa trên độ rộng và sâu của kiến thức tổng thể.",
      "### 1. Semantic Content Là Gì?",
      "Semantic Content là phương pháp tổ chức bài viết bao trùm toàn bộ các thực thể (entities), các khái niệm liên quan và câu hỏi thường gặp xung quanh một chủ đề lõi nhằm đáp ứng trọn vẹn ý định tìm kiếm (Search Intent) của người dùng.",
      "Thay vì chỉ viết một bài độc lập nhắm vào một từ khóa cụ thể, bạn cần xây dựng sơ đồ bao trùm chủ đề (Topic Authority). Cách làm này báo hiệu trực tiếp cho Google rằng website của bạn là một thực thể thông thái về lĩnh vực đó.",
      "### 2. Mô Hình Topic Cluster (Cụm Chủ Đề)",
      "Để cấu trúc lớp ngữ nghĩa vững chắc, bạn nên áp dụng mô hình liên kết bao gồm:",
      "- **Pillar Page (Trang Trụ Cột):** Một trang tổng quan bao trùm đầy đủ khía cạnh của một chủ đề lớn cực kỳ rộng, có liên kết hướng ra các bài viết phụ.",
      "- **Cluster Content (Trang Vệ Tinh):** Các bài viết chuyên sâu vào các ngách hẹp hơn, giải quyết chi tiết từng thắc mắc cụ thể.",
      "- **Internal Links (Liên Kết Nội Bộ Song Phương):** Đóng vai trò phân bổ dòng chảy sức mạnh (link juice) và tăng trải nghiệm khám phá của người đọc một cách tự nhiên liền mạch.",
      "### 3. Quy Trình 4 Bước Tạo Semantic Content Từ Thực Chiến",
      "**Bước 1: Nghiên cứu Thực thể (Entities) thay vì chỉ chọn từ khóa.** Sử dụng Keyword Planner và công cụ Google LSI để liệt kê các thuật ngữ phái sinh liên quan sâu xung quanh từ khóa gốc.",
      "**Bước 2: Phẫu thuật Ý định tìm kiếm (Search Intent).** Đọc 5 bài viết đang xếp hạng ở Top 1-5 để hiểu chính xác định dạng bài viết mà người dùng mong muốn: là danh sách liệt kê, hướng dẫn từng bước cụ thể hay bài chia sẻ lý thuyết.",
      "**Bước 3: Lập cấu trúc dàn bài chuẩn SEO.** Sử dụng các thẻ Heading (H2, H3) chứa các câu trả lời xúc tích phục vụ trực tiếp cho phần Featured Snippets hay khu vực Hỏi Đáp (People Also Ask).",
      "**Bước 4: Tự động hóa tạo lập bản nháp Semantic.** Tận dụng các prompt tối ưu với ChatGPT hoặc Gemini API để phân tích cấu trúc bài viết của bạn so với đối thủ cạnh tranh nhằm tìm ra lỗ hổng kiến thức tiềm ẩn bồi đắp kịp thời."
    ]
  },
  {
    id: "premium-web-design-seo",
    title: "Xây Dựng Website Doanh Nghiệp Chuẩn SEO Tối Ưu Tốc Độ Tải Trang Thực Chiến",
    slug: "premium-web-design-seo",
    summary: "Bản vẽ kỹ thuật chi tiết kết hợp React, Tailwind CSS cùng tối ưu cấu trúc dữ liệu Schema giúp bộ máy tìm kiếm Google lập chỉ mục nhanh chóng và chính xác.",
    category: "Thiết Kế Web",
    tags: ["React", "Tailwind", "Web Dev", "Schema SEO"],
    readTime: "8 phút đọc",
    date: "12 Tháng 5, 2026",
    author: "Derek Flow",
    imageUrl: "https://images.unsplash.com/photo-1531403009284-440f080d1e12?auto=format&fit=crop&w=800&q=80",
    likes: 58,
    content: [
      "Hầu hết các doanh nghiệp nhỏ và vừa thường xuyên bị thất thoát khách hàng tiềm năng chỉ vì website tải quá chậm hoặc hiển thị lỗi trên thiết bị di động. Một nền tảng website chuẩn chỉnh phải đáp ứng cả tính thẩm mỹ cao cấp lẫn tối ưu hóa sâu rộng về kỹ thuật thu thập thông tin của bot tìm kiếm.",
      "### 1. Kiến Trúc Website Chuẩn SEO",
      "Một website hoạt động hiệu quả cần tuân thủ 4 mắt xích cốt lõi sau:",
      "1. **Mã Nguồn Sạch Sẽ (Clean Code):** Sử dụng các thẻ ngữ nghĩa HTML5 (header, section, article, footer) giúp bot Google thấu hiểu từng khối nội dung nhanh chóng.",
      "2. **Dữ Liệu Có Cấu Trúc Schema:** Khai báo Schema JSON-LD chính xác giúp hiển thị các thông tin phong phú (Rich Snippets) như đánh giá, giá cả, ưu đãi trực tiếp trên Google Search.",
      "3. **Thân Thiện Với Di Động (Mobile-First):** Thiết kế Responsive mượt mà với Tailwind CSS, đảm bảo giao diện luôn cân đối hoàn mỹ trên mọi smartphone.",
      "4. **Tốc Độ Phản Hồi Dưới 1 Giây:** Tối ưu hóa dung lượng tài nguyên tĩnh và hạn chế mã Javascript dư thừa để trang nạp tức thì.",
      "### 2. Thiết Kế Trải Nghiệm Người Dùng (UX/UI) Thúc Đây Chuyển Đổi",
      "Để website không chỉ có traffic mà còn tạo ra doanh thu thực tế, sơ đồ bố cục (Layout) cần dẫn dắt người dùng bằng các nút kêu gọi hành động (CTA) tương phản cao đặt tại các vị trí trực quan.",
      "Tránh xa các pop-up quảng cáo gây phiền toái hoặc cản trở luồng đọc. Sự kết hợp giữa tốc độ siêu tốc và nội dung Semantic chính xác tạo ra lòng tin tuyệt đối cho khách truy cập.",
      "### 3. Kết Quả Chứng Minh Thực Tế",
      "Khi thực thi tái thiết kế mã nguồn chuẩn SEO cho trang giới thiệu dịch vụ tại TP.HCM, tỷ lệ thoát trang ngay lập tức giảm 45%, trong khi số lượng đăng ký nhận tư vấn tăng trưởng +38% chỉ trong vòng 3 tuần đầu ra mắt.",
      "Đây là minh chứng vững chắc cho thấy tối ưu hóa website đúng kỹ thuật đem lại kết quả chuyển đổi vô cùng vượt bậc."
    ]
  },
  {
    id: "core-web-vitals-react",
    title: "Kỹ Thuật Tối Ưu Tốc Độ Tải Trang Cho Dự Án React/Vite Đạt Điểm Tuyệt Đối 100 Chrome Lighthouse",
    slug: "core-web-vitals-react",
    summary: "Tốc độ phản hồi và hiển thị trang đích là yếu tố sống còn quyết định 1 hành vi mua hàng. Từng bước cấu hình tài nguyên tĩnh, giảm kích cỡ JS và nạp trước font chữ.",
    category: "Tối Ưu Tốc Độ",
    tags: ["React Performance", "Vite Config", "Lighthouse 100", "Core Web Vitals"],
    readTime: "5 phút đọc",
    date: "05 Tháng 5, 2026",
    author: "Derek Flow",
    imageUrl: "https://images.unsplash.com/photo-1555066931-4365d14bab8c?auto=format&fit=crop&w=800&q=80",
    likes: 35,
    content: [
      "Google đã chính thức đưa các chỉ số **Core Web Vitals** làm tiêu chuẩn xếp hạng tín nhiệm trang web trực tiếp từ năm 2021. Một trang web tuyệt đẹp nhưng load chậm hơn 3 giây sẽ mất đi ít nhất 40% người truy cập trước khi họ kịp nhìn thấy nút mua hàng.",
      "### 1. 3 Chỉ Số Sống Còn Của Core Web Vitals Bạn Cần Biết",
      "- **LCP (Largest Contentful Paint):** Đo lường thời gian hiển thị phần tử lớn nhất trên màn hình (thường là banner hero). Đẹp nhất là dưới 2.5 giây.",
      "- **INP (Interaction to Next Paint):** Đo lường độ trễ phản hồi khi người dùng click vào nút hoặc điền form thông tin. Đạt chuẩn tốt nhất là dưới 200 mili-giây.",
      "- **CLS (Cumulative Layout Shift):** Đo lường sự xê dịch bố cục không mong muốn trong quá trình nạp tài nguyên tĩnh. Giới hạn lý tưởng là nhỏ hơn 0.1.",
      "### 2. Các Thủ Thuật Thực Chiến Áp Dụng Cho Vite & React",
      "**Tối ưu hóa hình ảnh hiện đại:** Tránh xa các định dạng lỗi thời như PNG/JPG cho các tấm ảnh chụp lớn. Hãy chuyển đổi toàn bộ sang `.webp` hoặc `.avif` để tiết kiệm đến 70% bộ nhớ mà vẫn giữ nguyên độ sắc nét cao. Đồng thời luôn set `loading=\"lazy\"` cho ảnh ngoài màn hình hiển thị đầu tiên.",
      "**Sử dụng Code-Splitting và Dynamic Imports:** Chia tách bundle Javascript lớn thành các khối bundle nhỏ thông qua phương thức `React.lazy()` và `Suspense`. Người dùng ở trang chủ sẽ không cần phải nạp trước dung lượng code của phần Admin hay các popup cài đặt phụ trợ khác.",
      "**Tiết chế Font chữ bên thứ ba:** Hạn chế nhúng quá nhiều tùy biến độ dày font từ Google Fonts. Chỉ chọn đúng những trọng lượng font thực sự dùng tới (Ví dụ: Regular 400, Bold 700) và áp dụng khai báo `font-display: swap` trong CSS để người dùng thấy text lập tức trước khi tải xong file font tự nhiên.",
      "### 3. Kết Quả Sau Kiểm Thử",
      "Sau khi áp dụng bài bản loạt kỹ thuật trên vào ứng dụng danh thiếp portfolio này, điểm số Lighthouse đo đạc thực tế luôn duy trì sự ổn định tuyệt đối ở ngưỡng **99 - 100 điểm**, thời gian tải trang phản hồi dưới 1 giây, mang lại chuyển động mượt mà cho mọi thiết bị di động bình dân nhất."
    ]
  },
  {
    id: "seo-funnel-strategy",
    title: "Xây Dựng Phễu SEO Thông Minh Từ Khóa Thông Tin Cách Chuyển Đổi Lead Chất Lượng Cao",
    slug: "seo-funnel-strategy",
    summary: "Đã đến lúc từ bỏ thói quen SEO từ khóa rời rạc không mang lại nguồn thu. Công thức thiết lập phễu nội dung đưa khách hàng từ thắc mắc đến thanh toán gọn gàng.",
    category: "Mindset",
    tags: ["Funnel SEO", "Lead Conversion", "Inbound Marketing", "User Journey"],
    readTime: "7 phút đọc",
    date: "28 Tháng Tư, 2026",
    author: "Derek Flow",
    imageUrl: "https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=800&q=80",
    likes: 47,
    content: [
      "Sai lầm chí mạng nhất của đa số quản lý thương hiệu khi thuê ngoài dịch vụ SEO là ép chỉ số lượng Traffic tổng thể. Lượng truy cập khổng lồ từ các từ khóa không liên quan chỉ làm tốn chi phí băng thông mà hoàn toàn không đóng góp vào doanh thu thực tế.",
      "Để giải quyết triệt để nút thắt này, Derek Flow đề xuất tư duy **SEO Phễu Bản Chất (Funnel SEO Strategy)** bám sát hành trình nhận thức khách hàng.",
      "### 1. 3 Giai Đoạn Vận Hành Của Phễu Nội Dung",
      "**Giai đoạn 1: TOFU (Top of Funnel - Nhận diện thắc mắc)**",
      "Khách hàng đang gặp khó khăn và tìm kiếm các thông tin khách quan chung chung. Ví dụ: 'Cách tăng doanh thu spa', 'Tại sao web wordpress chạy chậm'. Mục tiêu ở đây là cung cấp giải pháp miễn phí vô điều kiện để xây dựng lòng tin.",
      "**Giai đoạn 2: MOFU (Middle of Funnel - Cân nhắc giải pháp)**",
      "Khách hàng đã nhận định được giải pháp nhưng phân vân lựa chọn hình thức tối ưu nhất. Ví dụ: 'Có nên tự học làm SEO không', 'Nên xây dựng Landing Page bằng React hay WordPress'. Bài viết cần phân tích ưu nhược điểm khách quan và khôn khéo định hình xu hướng chọn lựa.",
      "**Giai đoạn 3: BOFU (Bottom of Funnel - Chốt đơn hành động)**",
      "Khách hàng đã sẵn sàng đầu tư ngân sách để thuê chuyên gia. Họ tìm kiếm các từ khóa có ý định thương mại rõ rệt: 'Dịch vụ SEO thực chiến uy tín HCM', 'Báo giá thiết kế website SEO Derek Flow'. Trang đích lúc này cần cam kết KPI minh bạch, trưng dẫn các dự án thực tế và biểu mẫu đặt lịch nhanh.",
      "### 2. Thiết Kế Liên Kết Nội Bộ Để Khách Hàng Chuyển Động Trơn Tru Trong Phễu",
      "Đừng để người dùng đọc xong 1 bài TOFU rồi tắt tab ra đi. Hãy đặt các khối CTA kêu gọi đọc tiếp các bài MOFU có liên quan trực tiếp một cách thông thoáng.",
      "Cuối mỗi bài viết MOFU, hãy bổ sung nút kích hoạt biểu mẫu đăng ký tư vấn trực tiếp BOFU hoặc liên kết đến chatbot tự động để giải đáp nhanh. Việc kết nối chặt chẽ này tạo nên một cỗ máy bán hàng khép kín bền đại."
    ]
  }
];

export default function BlogView({ setCurrentView }: BlogViewProps) {
  const [searchQuery, setSearchQuery] = useState("");
  const [selectedCategory, setSelectedCategory] = useState<string>("Tất cả");
  const [selectedPost, setSelectedPost] = useState<BlogPost | null>(null);
  const [likedPosts, setLikedPosts] = useState<Record<string, boolean>>({});
  const [bookmarkedPosts, setBookmarkedPosts] = useState<Record<string, boolean>>({});
  const [newsletterEmail, setNewsletterEmail] = useState("");
  const [isSubscribed, setIsSubscribed] = useState(false);
  
  // Dense List layout settings for enterprise scale
  const [displayMode, setDisplayMode] = useState<"grid" | "list">("grid");
  const [currentPage, setCurrentPage] = useState(1);
  const itemsPerPage = 6;
  const categories = ["Tất cả", "SEO Thực Chiến", "Thiết Kế Web", "Tối Ưu Tốc Độ", "Mindset"];

  // Memoize simulated database containing exactly 1,000 top-notch blog posts
  const blogPosts = useMemo(() => generateSimulatedPosts(basePosts), []);

  // Soft page reset on query/cat change
  useEffect(() => {
    setCurrentPage(1);
  }, [searchQuery, selectedCategory]);

  // Superior search and filter logic scanning title, summary, category, full content, and tag list (useMemo for optimal performance with 1000 items)
  const filteredPosts = useMemo(() => {
    return blogPosts.filter(post => {
      const matchesCategory = selectedCategory === "Tất cả" || post.category === selectedCategory;
      
      if (!searchQuery.trim()) return matchesCategory;
      
      const term = searchQuery.toLowerCase().trim();
      const matchesTitle = post.title.toLowerCase().includes(term);
      const matchesSummary = post.summary.toLowerCase().includes(term);
      const matchesCategoryName = post.category.toLowerCase().includes(term);
      const matchesTags = post.tags.some(tag => tag.toLowerCase().includes(term));
      const matchesContent = post.content.some(paragraph => paragraph.toLowerCase().includes(term));
      
      return matchesCategory && (matchesTitle || matchesSummary || matchesCategoryName || matchesTags || matchesContent);
    });
  }, [blogPosts, selectedCategory, searchQuery]);

  // Paginated Slices
  const totalPosts = filteredPosts.length;
  const totalPages = Math.ceil(totalPosts / itemsPerPage);
  const indexOfLastPost = currentPage * itemsPerPage;
  const indexOfFirstPost = indexOfLastPost - itemsPerPage;
  const currentPosts = filteredPosts.slice(indexOfFirstPost, indexOfLastPost);

  const getCategoryCount = (catName: string): number => {
    if (catName === "Tất cả") return blogPosts.length;
    return blogPosts.filter(post => post.category === catName).length;
  };

  const handleToggleLike = (id: string, e: React.MouseEvent) => {
    e.stopPropagation();
    setLikedPosts(prev => {
      const isCurrentlyLiked = prev[id];
      return { ...prev, [id]: !isCurrentlyLiked };
    });
  };

  const handleToggleBookmark = (id: string, e: React.MouseEvent) => {
    e.stopPropagation();
    setBookmarkedPosts(prev => {
      const isCurrentlyBookmarked = prev[id];
      return { ...prev, [id]: !isCurrentlyBookmarked };
    });
  };

  const handleOpenPost = (post: BlogPost) => {
    setSelectedPost(post);
    window.scrollTo({ top: 0, behavior: "smooth" });
  };

  const handleNewsletterSubmit = (e: React.FormEvent) => {
    e.preventDefault();
    if (newsletterEmail.trim() && newsletterEmail.includes("@")) {
      setIsSubscribed(true);
      setTimeout(() => {
        setIsSubscribed(false);
        setNewsletterEmail("");
      }, 4000);
    }
  };

  return (
    <div id="blog-section-container" className="py-12 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto font-sans text-[#1A1A2E]">
      <AnimatePresence mode="wait">
        {!selectedPost ? (
          <motion.div
            key="blog-list"
            initial={{ opacity: 0, y: 15 }}
            animate={{ opacity: 1, y: 0 }}
            exit={{ opacity: 0, y: -15 }}
            transition={{ duration: 0.25 }}
            className="space-y-12"
          >
            {/* Header Title Section - Refined for high-end SEO aesthetics */}
            <div className="text-center max-w-3xl mx-auto space-y-4">
              <span className="inline-flex items-center gap-1 text-[10px] font-extrabold tracking-widest uppercase text-[#FFD700] bg-[#1A1A2E] px-3.5 py-1.5 rounded-full shadow-sm">
                <Sparkles size={11} className="text-[#FFD700]" />
                KHO KIẾN THỨC CHUYÊN SÂU
              </span>
              <h1 className="text-3xl sm:text-4xl md:text-5xl font-extrabold tracking-tight text-[#1A1A2E] leading-none">
                Blog Kiến Thức Thực Chiến
              </h1>
              <p className="text-xs sm:text-sm text-gray-500 max-w-2xl mx-auto leading-relaxed">
                Nơi tổng hợp các hướng dẫn kỹ thuật tối ưu hóa, kiến trúc tự động hóa n8n/Make, và tư duy chuyển đổi Lead dành riêng cho doanh nghiệp tăng trưởng.
              </p>
            </div>

            {/* Split Screen Grid Partition: Left Feed (8cols) & Right Sidebar (4cols) */}
            <div className="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
              
              {/* Left Column: Feed Lists & Cards */}
              <div className="lg:col-span-8 flex flex-col space-y-6">
                
                {/* Search Results Summary (Informative Engine feedback) */}
                {searchQuery.trim() && (
                  <div className="bg-[#FDFBF7] border border-gray-200 rounded-lg px-4 py-3 flex items-center justify-between text-xs sm:text-sm text-gray-600">
                    <div>
                      Có <span className="font-bold text-[#1A1A2E]">{totalPosts}</span> kết quả cho từ khóa <span className="italic font-semibold text-gray-800">"{searchQuery}"</span>
                      {selectedCategory !== "Tất cả" && (
                        <span> thuộc chuyên mục <span className="font-bold text-[#1A1A2E]">{selectedCategory}</span></span>
                      )}
                    </div>
                    <button 
                      onClick={() => setSearchQuery("")} 
                      className="text-[#FFD700] hover:text-[#1A1A2E] hover:underline font-bold text-xs"
                    >
                      Đặt lại
                    </button>
                  </div>
                )}

                {/* Visual Stats & Display Mode Switcher */}
                <div className="flex flex-col sm:flex-row sm:items-center justify-between gap-3 bg-[#FDFBF7] border border-gray-150 rounded-xl px-4 py-2.5 text-xs text-gray-600">
                  <div className="flex items-center gap-2">
                    <span className="font-bold text-[#1A1A2E]">Hiển thị:</span>
                    <button
                      onClick={() => setDisplayMode("grid")}
                      className={`flex items-center gap-1 px-2.5 py-1.5 rounded transition-all font-bold cursor-pointer ${
                        displayMode === "grid" 
                          ? "bg-[#1A1A2E] text-[#FFD700] shadow-xs" 
                          : "bg-white border border-gray-200 hover:bg-gray-50"
                      }`}
                      title="Hiển thị dạng lưới thẻ"
                    >
                      <Grid size={13} />
                      <span>Dạng lưới</span>
                    </button>
                    <button
                      onClick={() => setDisplayMode("list")}
                      className={`flex items-center gap-1 px-2.5 py-1.5 rounded transition-all font-bold cursor-pointer ${
                        displayMode === "list" 
                          ? "bg-[#1A1A2E] text-[#FFD700] shadow-xs" 
                          : "bg-white border border-gray-200 hover:bg-gray-50"
                      }`}
                      title="Hiển thị dạng dòng cô đọng chuyên nghiệp"
                    >
                      <List size={13} />
                      <span>Dạng danh sách</span>
                    </button>
                  </div>
                </div>

                {/* Primary Card Stream */}
                {currentPosts.length > 0 ? (
                  <div className="space-y-6">
                    {displayMode === "grid" ? (
                      <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
                        {currentPosts.map((post, idx) => {
                          return (
                            <motion.article
                              key={post.id}
                              whileHover={{ y: -4 }}
                              onClick={() => handleOpenPost(post)}
                              className="bg-[#FDFBF7] rounded-xl border border-gray-150 overflow-hidden cursor-pointer shadow-xs hover:shadow-md transition-all flex flex-col h-full"
                            >
                              {/* Rich Media Container */}
                              <div className="relative bg-gray-100 overflow-hidden shrink-0 w-full h-44">
                                <img 
                                  src={post.imageUrl} 
                                  alt={post.title}
                                  referrerPolicy="no-referrer"
                                  className="w-full h-full object-cover transition-transform duration-700 hover:scale-105"
                                  loading="lazy"
                                />
                                {/* Visual floating badge */}
                                <span className="absolute top-3 left-3 bg-[#1A1A2E] text-[#FFD700] text-[8px] font-extrabold uppercase tracking-widest px-2.5 py-1 rounded shadow-xs z-10">
                                  {post.category}
                                </span>
                              </div>

                              {/* Text abstracts metadata panel */}
                              <div className="p-4 flex-1 flex flex-col justify-between space-y-3">
                                <div className="space-y-1.5">
                                  {/* Meta specs line */}
                                  <div className="flex items-center gap-3 text-[10px] text-gray-400 font-semibold tracking-wider">
                                    <span className="flex items-center gap-1">
                                      <Calendar size={11} className="text-gray-300" />
                                      {post.date}
                                    </span>
                                    <span className="flex items-center gap-1">
                                      <Clock size={11} className="text-gray-300" />
                                      {post.readTime}
                                    </span>
                                  </div>

                                  {/* Title */}
                                  <h3 className="font-extrabold text-[#1A1A2E] hover:text-[#FFD700] transition-colors leading-snug tracking-tight text-sm sm:text-base line-clamp-2">
                                    {post.title}
                                  </h3>

                                  {/* Abstract Description summary */}
                                  <p className="text-xs text-gray-500 leading-normal line-clamp-2">
                                    {post.summary}
                                  </p>

                                  {/* Post tags list mapping */}
                                  <div className="flex flex-wrap gap-1 pt-0.5">
                                    {post.tags.slice(0, 3).map((tag, tIdx) => (
                                      <span key={tIdx} className="text-[9px] font-medium bg-[#FAFAF7] text-gray-500 border border-gray-200 px-1.5 py-0.5 rounded">
                                        #{tag}
                                      </span>
                                    ))}
                                  </div>
                                </div>

                                {/* Standardized signature actions footer */}
                                <div className="flex items-center justify-between pt-3 border-t border-gray-100 mt-1">
                                  {/* Author specs */}
                                  <div className="flex items-center gap-1.5">
                                    <span className="w-5 h-5 bg-[#1A1A2E] text-[#FFD700] rounded-full flex items-center justify-center text-[8px] font-extrabold border border-[#FFD700]/20">
                                      DL
                                    </span>
                                    <span className="text-[10px] font-bold text-gray-700">{post.author}</span>
                                  </div>

                                  <div className="flex items-center gap-2">
                                    {/* Likes counter button */}
                                    <button
                                      onClick={(e) => handleToggleLike(post.id, e)}
                                      className={`flex items-center gap-1 text-[10px] transition-colors ${
                                        likedPosts[post.id] ? "text-red-500 font-bold" : "text-gray-400 hover:text-red-500"
                                      }`}
                                    >
                                      <Heart size={12} fill={likedPosts[post.id] ? "currentColor" : "none"} />
                                      <span>{post.likes + (likedPosts[post.id] ? 1 : 0)}</span>
                                    </button>

                                    {/* Bookmarked tracker button */}
                                    <button
                                      onClick={(e) => handleToggleBookmark(post.id, e)}
                                      className="text-gray-400 hover:text-[#1A1A2E] transition-colors"
                                      title="Lưu lại đọc sau"
                                    >
                                      <Bookmark size={11} fill={bookmarkedPosts[post.id] ? "currentColor" : "none"} />
                                    </button>
                                  </div>
                                </div>
                              </div>
                            </motion.article>
                          );
                        })}
                      </div>
                    ) : (
                      // Dense List layout settings (Row view format) - Scales tremendously for 1,000 posts
                      <div className="flex flex-col space-y-3">
                        {currentPosts.map((post) => {
                          return (
                            <motion.article
                              key={post.id}
                              whileHover={{ x: 3, backgroundColor: "rgba(255, 215, 0, 0.04)" }}
                              onClick={() => handleOpenPost(post)}
                              className="bg-white rounded-xl border border-gray-150 p-3.5 flex items-center gap-4 cursor-pointer hover:border-[#FFD700] transition-all group shadow-2xs"
                            >
                              {/* Left compact cover */}
                              <div className="w-14 h-14 sm:w-16 sm:h-16 rounded-lg bg-gray-100 overflow-hidden shrink-0">
                                <img 
                                  src={post.imageUrl} 
                                  alt={post.title} 
                                  className="w-full h-full object-cover transition-transform group-hover:scale-105" 
                                  loading="lazy" 
                                  referrerPolicy="no-referrer"
                                />
                              </div>

                              <div className="flex-1 min-w-0 space-y-1">
                                <div className="flex flex-wrap items-center gap-1.5 text-[9px] text-gray-400 font-semibold uppercase tracking-wider">
                                  <span className="text-[#1A1A2E] bg-yellow-400/20 px-2 py-0.5 rounded text-[8px] font-extrabold">
                                    {post.category}
                                  </span>
                                  <span>•</span>
                                  <span>{post.date}</span>
                                  <span>•</span>
                                  <span>{post.readTime}</span>
                                </div>
                                <h3 className="font-extrabold text-[12px] sm:text-[14px] text-[#1A1A2E] group-hover:text-[#FFD700] transition-colors leading-snug truncate">
                                  {post.title}
                                </h3>
                                <p className="text-[11px] text-gray-500 line-clamp-1">{post.summary}</p>
                              </div>

                              <ChevronRight size={16} className="text-gray-400 group-hover:text-[#1A1A2E] transition-colors shrink-0" />
                            </motion.article>
                          );
                        })}
                      </div>
                    )}

                    {/* Enterprise Pagination Panel below active lists */}
                    {totalPages > 1 && (
                      <div className="flex flex-wrap items-center justify-center gap-1.5 border-t border-gray-100 pt-6 mt-4">
                        <button
                          onClick={() => {
                            setCurrentPage(1);
                            window.scrollTo({ top: 300, behavior: "smooth" });
                          }}
                          disabled={currentPage === 1}
                          className="p-2 border border-gray-200 rounded-lg bg-white hover:bg-gray-50 disabled:opacity-35 disabled:hover:bg-white text-[#1A1A2E] cursor-pointer"
                          title="Trang đầu"
                        >
                          <ChevronsLeft size={13} />
                        </button>
                        <button
                          onClick={() => {
                            setCurrentPage(prev => Math.max(prev - 1, 1));
                            window.scrollTo({ top: 300, behavior: "smooth" });
                          }}
                          disabled={currentPage === 1}
                          className="px-2.5 py-1.5 border border-gray-200 text-xs font-bold rounded-lg bg-white hover:bg-gray-50 disabled:opacity-35 disabled:hover:bg-white text-[#1A1A2E] cursor-pointer"
                          title="Trang trước"
                        >
                          Trước
                        </button>

                        {/* Smart clustered numbers list */}
                        {Array.from({ length: Math.min(5, totalPages) }, (_, i) => {
                          let pageNum = 1;
                          if (currentPage <= 3) {
                            pageNum = i + 1;
                          } else if (currentPage >= totalPages - 2) {
                            pageNum = totalPages - 4 + i;
                          } else {
                            pageNum = currentPage - 2 + i;
                          }

                          if (pageNum > totalPages || pageNum < 1) return null;

                          const isCurrent = currentPage === pageNum;
                          return (
                            <button
                              key={pageNum}
                              onClick={() => {
                                setCurrentPage(pageNum);
                                window.scrollTo({ top: 300, behavior: "smooth" });
                              }}
                              className={`w-8.5 h-8.5 text-xs font-extrabold rounded-lg cursor-pointer transition-all ${
                                isCurrent 
                                  ? "bg-[#1A1A2E] text-[#FFD700] shadow-sm scale-103 font-black" 
                                  : "bg-white border border-gray-200 text-gray-500 hover:bg-gray-50"
                              }`}
                            >
                              {pageNum}
                            </button>
                          );
                        })}

                        <button
                          onClick={() => {
                            setCurrentPage(prev => Math.min(prev + 1, totalPages));
                            window.scrollTo({ top: 300, behavior: "smooth" });
                          }}
                          disabled={currentPage === totalPages}
                          className="px-2.5 py-1.5 border border-gray-200 text-xs font-bold rounded-lg bg-white hover:bg-gray-50 disabled:opacity-35 disabled:hover:bg-white text-[#1A1A2E] cursor-pointer"
                          title="Trang sau"
                        >
                          Sau
                        </button>
                        <button
                          onClick={() => {
                            setCurrentPage(totalPages);
                            window.scrollTo({ top: 300, behavior: "smooth" });
                          }}
                          disabled={currentPage === totalPages}
                          className="p-2 border border-gray-200 rounded-lg bg-white hover:bg-gray-50 disabled:opacity-35 disabled:hover:bg-white text-[#1A1A2E] cursor-pointer"
                          title="Trang cuối"
                        >
                          <ChevronsRight size={13} />
                        </button>
                      </div>
                    )}

                  </div>
                ) : (
                  <div className="text-center py-16 bg-white border border-gray-150 rounded-xl space-y-3 p-6 max-w-xl mx-auto">
                    <BookOpen size={40} className="mx-auto text-gray-300 animate-pulse" />
                    <h4 className="font-bold text-base text-[#1A1A2E]">Không Tìm Thấy Kết Quả Nào</h4>
                    <p className="text-xs text-gray-500 max-w-sm mx-auto leading-relaxed">
                      Xin lỗi, hệ thống không tìm thấy bài viết hoặc tài liệu kỹ thuật nào khớp với từ khóa của bạn. Hãy thử đổi từ khóa đơn giản hơn.
                    </p>
                    <button
                      onClick={() => {
                        setSearchQuery("");
                        setSelectedCategory("Tất cả");
                      }}
                      className="mt-2 bg-[#1A1A2E] hover:bg-[#FFD700] hover:text-[#1A1A2E] text-white text-[11px] font-extrabold px-4 py-2 rounded-lg uppercase tracking-wider transition-all cursor-pointer shadow-sm"
                    >
                      Xóa Bộ Lọc Tìm Kiếm
                    </button>
                  </div>
                )}
              </div>

              {/* Right Column: Premium Sticky Sidebar (4cols) */}
              <aside className="lg:col-span-4 space-y-6 lg:sticky lg:top-24">
                
                {/* 1. Elegant Search Widget */}
                <div className="bg-[#FDFBF7] border border-gray-200 rounded-xl p-5 shadow-xs space-y-3">
                  <h4 className="border-b pb-2 border-gray-100 text-[12px] font-extrabold uppercase tracking-widest text-gray-500 flex items-center gap-2">
                    <Search size={14} className="text-[#FFD750]" />
                    Tìm Kiếm Kiến Thức
                  </h4>
                  <div className="relative">
                    <input
                      type="text"
                      placeholder="Nhập thủ thuật, n8n, SEO..."
                      value={searchQuery}
                      onChange={(e) => setSearchQuery(e.target.value)}
                      className="w-full pl-3 pr-10 py-2.5 text-xs sm:text-sm bg-[#FAFAF7] border border-gray-200 rounded-lg focus:outline-none focus:border-[#FFD700] transition-all text-[#1A1A2E]"
                    />
                    <div className="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400">
                      {searchQuery.trim() ? (
                        <button 
                          onClick={() => setSearchQuery("")} 
                          className="text-xs text-gray-400 hover:text-gray-700 font-bold"
                        >
                          Xóa
                        </button>
                      ) : (
                        <Search size={14} />
                      )}
                    </div>
                  </div>
                  {/* Popular hot tags helper quick links */}
                  <div className="space-y-1.5 pt-1.5">
                    <span className="text-[10px] text-gray-400 font-medium">Gợi ý từ khóa hot nhất:</span>
                    <div className="flex flex-wrap gap-1.5">
                      {["Semantic", "n8n", "React", "Funnel"].map((tagStr) => (
                        <button
                          key={tagStr}
                          onClick={() => setSearchQuery(tagStr)}
                          className="text-[10px] font-semibold bg-[#FAFAF8] text-gray-650 hover:bg-[#E5E7EB] px-2 py-1 rounded border border-gray-150 transition-colors"
                        >
                          #{tagStr}
                        </button>
                      ))}
                    </div>
                  </div>
                </div>

                {/* 2. Structured Dynamic Categories Widget */}
                <div className="bg-[#FDFBF7] border border-gray-200 rounded-xl p-5 shadow-xs space-y-3">
                  <h4 className="border-b pb-2 border-gray-100 text-[12px] font-extrabold uppercase tracking-widest text-gray-500 flex items-center gap-2">
                    <Filter size={14} className="text-[#FFD750]" />
                    Chuyên Mục Nội Dung
                  </h4>
                  <div className="flex flex-col space-y-1.5">
                    {categories.map((catName) => {
                      const isActive = selectedCategory === catName;
                      const count = getCategoryCount(catName);
                      return (
                        <button
                          key={catName}
                          onClick={() => setSelectedCategory(catName)}
                          className={`w-full flex items-center justify-between px-3 py-2.5 rounded-lg text-xs font-bold uppercase tracking-wider text-left transition-all ${
                            isActive 
                              ? "bg-[#1A1A2E] text-white shadow-xs" 
                              : "bg-[#FAFAF7] hover:bg-gray-100 text-gray-700"
                          }`}
                        >
                          <span>{catName}</span>
                          <span className={`px-2 py-0.5 rounded-full text-[10px] ${
                            isActive ? "bg-[#FFD700] text-[#1A1A2E]" : "bg-gray-200 text-gray-600"
                          }`}>
                            {count}
                          </span>
                        </button>
                      );
                    })}
                  </div>
                </div>

                {/* 3. Author Specialist EEAT Profile Widget */}
                <div className="bg-[#1A1A2E] text-white rounded-xl p-5 shadow-sm space-y-4 relative overflow-hidden">
                  <div className="absolute top-0 right-0 w-24 h-24 bg-[#FFD700]/5 rounded-full blur-xl"></div>
                  
                  <div className="flex items-center gap-3 relative z-10">
                    <div className="w-12 h-12 rounded-full overflow-hidden border-2 border-[#FFD700] shrink-0">
                      <img 
                        src="https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?auto=format&fit=crop&w=150&q=80" 
                        alt="Derek Flow Specialist" 
                        referrerPolicy="no-referrer"
                        className="w-full h-full object-cover"
                      />
                    </div>
                    <div>
                      <h4 className="text-xs text-[#FFD700] font-extrabold tracking-widest uppercase">CHUYÊN GIA ĐỒNG HÀNH</h4>
                      <h3 className="text-sm font-bold text-white">Derek Flow Specialist</h3>
                      <p className="text-[10px] text-gray-400">SEO & AI Automation Specialist</p>
                    </div>
                  </div>

                  <p className="text-[11px] text-gray-350 leading-relaxed italic border-t border-gray-800 pt-3">
                    "10 năm kinh nghiệm trong kiến tạo lưu lượng tự nhiên chất lượng cao và quy trình tự động hóa chuyển đổi thông minh, chuyển giao giá trị thực sự không cần vẽ vời."
                  </p>

                  <div className="flex items-center gap-2.5 pt-1.5 justify-start">
                    <span className="text-[10px] text-white flex items-center gap-1 font-semibold">
                      <Award size={12} className="text-[#FFD700]" />
                      Cam Kết KPI Doanh Số
                    </span>
                  </div>

                  <button
                    onClick={() => {
                      setCurrentView("contact");
                      window.scrollTo({ top: 0, behavior: "smooth" });
                    }}
                    className="w-full bg-[#FFD700] text-[#1A1A2E] hover:bg-white text-[10px] font-extrabold uppercase tracking-wider py-3 rounded-lg transition-all flex items-center justify-center gap-1 cursor-pointer"
                  >
                    <span>Yêu Cầu Gọi Điện Lại</span>
                    <ArrowUpRight size={12} />
                  </button>
                </div>

              </aside>

            </div>

            {/* Bottom Special Consult conversion banner */}
            <div className="bg-[#1A1A2E] text-white rounded-xl p-8 max-w-7xl mx-auto space-y-6 relative overflow-hidden mt-8">
              <div className="absolute top-0 right-0 w-48 h-48 bg-[#FFD700]/5 rounded-full blur-3xl"></div>
              <div className="relative z-10 flex flex-col md:flex-row items-start md:items-center justify-between gap-6">
                <div className="space-y-2">
                  <div className="flex items-center gap-2 text-[#FFD700] text-xs font-bold uppercase tracking-widest">
                    <Sparkles size={14} />
                    <span>Học hỏi có đồng hành</span>
                  </div>
                  <h3 className="text-xl sm:text-2xl font-extrabold tracking-tight">
                    Bạn muốn có một chiến lược SEO & AI Automation tối ưu đỉnh cao?
                  </h3>
                  <p className="text-xs text-gray-300 max-w-xl leading-relaxed">
                    Đăng ký tư vấn trực tiếp 1-1 cùng Derek Flow thiết lập sơ đồ tăng trưởng Semantic Content và sơ đồ hóa tự động chăm khách hàng toàn diện.
                  </p>
                </div>
                <button
                  onClick={() => {
                    setCurrentView("contact");
                    window.scrollTo({ top: 0, behavior: "smooth" });
                  }}
                  className="bg-[#FFD700] text-[#1A1A2E] hover:bg-white text-xs font-bold uppercase tracking-wider px-6 py-3.5 rounded-lg transition-all shadow cursor-pointer shrink-0"
                >
                  Đặt lịch gặp ngay
                </button>
              </div>
            </div>
          </motion.div>
        ) : (
          <motion.div
            key="blog-detail"
            initial={{ opacity: 0, y: 15 }}
            animate={{ opacity: 1, y: 0 }}
            exit={{ opacity: 0, y: -15 }}
            transition={{ duration: 0.25 }}
            className="max-w-3xl mx-auto space-y-8"
          >
            {/* Back action */}
            <button
              onClick={() => setSelectedPost(null)}
              className="inline-flex items-center gap-1.5 text-xs font-bold text-gray-500 hover:text-[#1A1A2E] py-2 uppercase tracking-widest transition-colors cursor-pointer"
            >
              <ChevronLeft size={16} />
              Quay lại danh mục kiến thức
            </button>

            {/* Post Header */}
            <div className="space-y-4">
              <span className="bg-[#F5F0E8] text-gray-700 text-[10px] font-extrabold uppercase tracking-widest px-3 py-1 rounded">
                Chuyên mục: {selectedPost.category}
              </span>
              
              <h1 className="text-2xl sm:text-3xl md:text-4xl font-extrabold text-[#1A1A2E] leading-tight tracking-tight">
                {selectedPost.title}
              </h1>

              {/* Author and stats block */}
              <div className="flex flex-wrap items-center justify-between gap-4 py-4 border-y border-gray-150 text-xs text-gray-500">
                <div className="flex items-center gap-4">
                  <div className="flex items-center gap-1.5 font-bold text-gray-700">
                    <User size={14} className="text-[#FFD700]" />
                    <span>{selectedPost.author}</span>
                    <span className="text-gray-300">|</span>
                    <span className="font-normal text-gray-400">Specialist</span>
                  </div>
                  <div className="flex items-center gap-1.5">
                    <Calendar size={13} />
                    <span>{selectedPost.date}</span>
                  </div>
                  <div className="flex items-center gap-1.5">
                    <Clock size={13} />
                    <span>{selectedPost.readTime}</span>
                  </div>
                </div>

                <div className="flex items-center gap-3">
                  <button
                    onClick={(e) => handleToggleLike(selectedPost.id, e)}
                    className={`flex items-center gap-1 ${
                      likedPosts[selectedPost.id] ? "text-red-500 font-bold" : "text-gray-400 hover:text-red-500"
                    } transition-colors`}
                  >
                    <Heart size={14} fill={likedPosts[selectedPost.id] ? "currentColor" : "none"} />
                    <span>{selectedPost.likes + (likedPosts[selectedPost.id] ? 1 : 0)} Lượt thích</span>
                  </button>

                  <button
                    onClick={(e) => handleToggleBookmark(selectedPost.id, e)}
                    className="text-gray-400 hover:text-gray-600 transition-colors"
                  >
                    <Bookmark size={14} fill={bookmarkedPosts[selectedPost.id] ? "currentColor" : "none"} />
                  </button>
                </div>
              </div>
            </div>

            {/* Featured Hero Cover */}
            <div className="h-64 sm:h-96 rounded-xl bg-gray-150 overflow-hidden shadow-xs">
              <img 
                src={selectedPost.imageUrl} 
                alt={selectedPost.title} 
                referrerPolicy="no-referrer"
                className="w-full h-full object-cover"
              />
            </div>

            {/* Detailed Article Contents Render - Styled carefully with SEO markdown & highlights */}
            <div className="text-[#1A1A2E] text-xs sm:text-sm leading-relaxed space-y-6 whitespace-pre-line text-justify font-sans">
              {selectedPost.content.map((paragraph, index) => {
                // Formatting subheadings and list highlights dynamically for UX
                if (paragraph.startsWith("###")) {
                  return (
                    <h3 key={index} className="text-base sm:text-lg font-bold text-[#1A1A2E] pt-4 mt-6 border-b pb-2 border-gray-150">
                      {paragraph.replace("###", "").trim()}
                    </h3>
                  );
                }
                
                if (paragraph.startsWith("-")) {
                  return (
                    <div key={index} className="flex items-start gap-2.5 pl-4 text-gray-650">
                      <span className="text-[#FFD700] font-bold text-sm mt-0.5">•</span>
                      <p className="flex-1 text-xs sm:text-sm">{paragraph.replace("-", "").trim()}</p>
                    </div>
                  );
                }

                if (paragraph.startsWith("**")) {
                  return (
                    <p key={index} className="font-medium bg-[#F5F0E8] border-l-4 border-[#1A1A2E] p-3.5 italic text-[11px] sm:text-[13px] rounded-r text-[#1A1A2E]">
                      {paragraph.replace(/\*\*/g, "").trim()}
                    </p>
                  );
                }

                return (
                  <p key={index} className="text-gray-650">
                    {paragraph}
                  </p>
                );
              })}
            </div>

            {/* Share / Action block */}
            <div className="bg-[#FAFAF7] border border-gray-200 p-6 rounded-lg flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mt-8">
              <div className="space-y-1">
                <h4 className="font-bold text-xs sm:text-sm">Bạn tìm thấy thông tin hữu ích?</h4>
                <p className="text-[11px] text-gray-405">Hãy chia sẻ bài viết này đến đối tác & đồng nghiệp của bạn.</p>
              </div>

              <div className="flex gap-2">
                <button
                  onClick={() => {
                    navigator.clipboard.writeText(window.location.href);
                    alert("Đã sao chép liên kết bài viết thành công!");
                  }}
                  className="flex items-center justify-center gap-1.5 border border-gray-300 hover:border-gray-500 bg-white px-4 py-2.5 rounded text-xs font-bold transition-all cursor-pointer"
                >
                  <Share2 size={13} />
                  <span>Sao chép Link</span>
                </button>
              </div>
            </div>

            {/* Back bottom Button and Lead Conversion form */}
            <div className="border-t border-gray-200 pt-10 mt-12 space-y-8 text-center bg-white p-8 rounded-xl border">
              <div className="max-w-md mx-auto space-y-3">
                <div className="w-10 h-10 bg-green-100 text-green-600 rounded-full flex items-center justify-center mx-auto">
                  <CheckCircle size={22} />
                </div>
                <h3 className="font-extrabold text-base sm:text-lg">Ứng dụng ngay cho thương nghiệp của bạn</h3>
                <p className="text-xs text-gray-500 leading-normal">
                  Khóa học hoặc kiến thức lý thuyết cần được chuyển hóa thành kết quả. Hãy để tôi hỗ trợ bạn vạch ra lộ trình thích ứng riêng cho website của bạn.
                </p>
                <div className="pt-2 flex flex-col sm:flex-row gap-3 justify-center">
                  <button
                    onClick={() => {
                      setCurrentView("contact");
                      window.scrollTo({ top: 0, behavior: "smooth" });
                    }}
                    className="bg-[#1A1A2E] text-[#FAFAF7] hover:bg-[#FFD700] hover:text-[#1A1A2E] text-xs font-bold uppercase tracking-wider px-6 py-3 rounded-md transition-all cursor-pointer shadow-md"
                  >
                    Bắt đầu Tư Vấn Miễn Phí
                  </button>
                  <button
                    onClick={() => {
                      setSelectedPost(null);
                      window.scrollTo({ top: 0, behavior: "smooth" });
                    }}
                    className="border border-gray-300 hover:bg-gray-50 text-xs font-bold px-5 py-3 rounded-md transition-all cursor-pointer"
                  >
                    Xem bài viết khác
                  </button>
                </div>
              </div>
            </div>
          </motion.div>
        )}
      </AnimatePresence>
    </div>
  );
}
