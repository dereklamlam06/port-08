import React, { useState } from "react";
import { Code, Cpu, Shield, Check, X, FileCode, Layers, Terminal } from "lucide-react";

interface SpecTab {
  id: string;
  badge: string;
  title: string;
  description: string;
  standardAgency: string;
  derekStandard: string;
  filePath: string;
  language: string;
  code: string;
}

export default function TechnicalSpecs() {
  const [activeTab, setActiveTab] = useState<string>("vitals");

  const specs: SpecTab[] = [
    {
      id: "vitals",
      badge: "Performance Index",
      title: "Tối Ưu Tốc Độ Tải Trang (Core Web Vitals)",
      description: "Website tải nhanh, mượt mà kể cả dựng bằng code tay gọn nhẹ hay Elementor kéo thả thông qua việc dọn dẹp asset dư thừa, tải lười hình ảnh thế hệ mới.",
      standardAgency: "Sử dụng quá nhiều plugin dư thừa hoặc không cấu hình tối ưu tài nguyên, không nén ảnh và không dọn rác CSS/JS dẫn đến tốc độ load chậm chạp.",
      derekStandard: "Tối ưu hóa sâu mã nguồn WordPress custom theme hoặc Elementor kéo thả sạch sẽ, dọn bỏ asset không dùng, tối ưu Cache máy chủ vận hành mượt mà.",
      filePath: "functions.php (WordPress)",
      language: "php",
      code: `<?php
// Gỡ bỏ CSS/JS dư thừa của block-library/Gutenberg nếu không sử dụng
add_action('wp_enqueue_scripts', 'derek_optimize_assets', 100);

function derek_optimize_assets() {
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    wp_dequeue_script('wp-embed');
    
    // Tránh tải jquery-migrate không cần thiết ở giao diện front-end
    if (!is_admin()) {
        wp_deregister_script('jquery-migrate');
    }
}`
    },
    {
      id: "schema",
      badge: "Entity & Schema",
      title: "Lập Chỉ Mục Thực Thể & JSON-LD Khắt Khe",
      description: "Khai báo dữ liệu có cấu trúc đúng biểu đồ tri thức (Knowledge Graph) giúp Google Bot nhận diện thương hiệu của bạn chuẩn xác.",
      standardAgency: "Cài đặt chung chung thông qua các plugin SEO tự động dẫn đến xung đột cú pháp, thiếu định danh tác giả (Author) và giấy phép xuất bản chính thống.",
      derekStandard: "Xây dựng sơ đồ thực thể thực tế tùy biến độc bản, gắn kết hồ sơ LinkedIn/Github thực tế, thiết lập quan hệ cha-con mạch lạc cho mạng lưới từ khóa.",
      filePath: "public/schema-service.json",
      language: "json",
      code: `{
  "@context": "https://schema.org",
  "@type": "ProfessionalService",
  "name": "Derek Flow Specialist",
  "image": "https://derek.flow/assets/og-brand.jpg",
  "description": "Premium SEO Strategy & Web Development Implementation",
  "priceRange": "$$$",
  "address": {
    "@type": "PostalAddress",
    "addressLocality": "Ho Chi Minh City",
    "addressCountry": "VN"
  },
  "sameAs": [
    "https://www.linkedin.com/in/derekflow",
    "https://github.com/derekflow"
  ]
}`
    },
    {
      id: "silo",
      badge: "Crawl Optimization",
      title: "Phân Dòng Liên Kết SILO & Crawl Budget",
      description: "Điều hướng dòng chảy sức mạnh website (Link Juice) đi đúng trọng tâm bán hàng thay vì phân tán vào các trang rác vô giá trị.",
      standardAgency: "Để liên kết tự do vô tội vạ, robot Google lãng phí ngân sách cào dữ liệu (Crawl Budget) vào các trang trùng lặp, URL rác hoặc tham số truy vấn.",
      derekStandard: "Cấu trúc danh sách liên kết hình phễu chuẩn chỉ, chặn tuyệt đối luồng vô giá trị thông qua file Robots.txt chặt chẽ và sitemap phân nhánh phân tần.",
      filePath: "public/robots.txt",
      language: "plaintext",
      code: `# Tối ưu hóa ngân sách cào dữ liệu - Chặn tối đa tài nguyên rác và trang nháp
User-agent: *
Allow: /wp-content/uploads/
Disallow: /wp-admin/
Disallow: /wp-includes/
Disallow: /cgi-bin/
Disallow: *?s=
Disallow: *&preview=

Sitemap: https://derek.flow/sitemap_index.xml`
    }
  ];

  const currentSpec = specs.find((s) => s.id === activeTab) || specs[0];

  return (
    <section id="technical-standards" className="bg-[#121315] text-white py-16 px-6 md:px-12 rounded-xl border border-gray-800 my-8 shadow-2xl">
      <div className="max-w-7xl mx-auto space-y-10">
        
        {/* Header section with technical style */}
        <div className="border-b border-gray-800 pb-6 flex flex-col md:flex-row md:items-end justify-between gap-4">
          <div className="space-y-2">
            <div className="inline-flex items-center space-x-2 px-2.5 py-0.5 bg-[#FFD700]/10 border border-[#FFD700]/30 rounded-full text-xs font-bold text-[#FFD700] uppercase tracking-wider">
              <Terminal size={12} />
              <span>Phương Pháp Thực Nghiệm Đặc Thù</span>
            </div>
            <h3 className="text-2xl md:text-3xl font-extrabold tracking-tight">
              Bản Vẽ Thực Thi & Tiêu Chuẩn Cam Kết
            </h3>
            <p className="text-xs sm:text-sm text-gray-400 max-w-2xl">
              Thay vì sử dụng các feedback văn bản khó kiểm chứng từ tài khoản ảo, Derek Flow tự tin phơi bày toàn bộ triết lý xây dựng kỹ thuật thực tế giúp dự án của bạn tăng trưởng bền vững trước mọi thuật toán.
            </p>
          </div>

          {/* Tab Selector Buttons */}
          <div className="flex flex-wrap gap-2 shrink-0">
            {specs.map((spec) => (
              <button
                key={spec.id}
                onClick={() => setActiveTab(spec.id)}
                className={`px-3.5 py-2 rounded-lg text-xs font-bold uppercase transition-all flex items-center gap-2 border ${
                  activeTab === spec.id
                    ? "bg-[#FFD700] text-[#121315] border-[#FFD700]"
                    : "bg-[#1E2022] text-gray-400 border-gray-800 hover:text-white hover:bg-gray-800"
                }`}
              >
                {spec.id === "vitals" && <Cpu size={13} />}
                {spec.id === "schema" && <Layers size={13} />}
                {spec.id === "silo" && <Shield size={13} />}
                {spec.title.split(" (")[0]}
              </button>
            ))}
          </div>
        </div>

        {/* Comparison grid & Code playground */}
        <div className="grid grid-cols-1 lg:grid-cols-12 gap-8 items-stretch">
          
          {/* Details & Comparison Column (12cols - lg:5) */}
          <div className="lg:col-span-5 flex flex-col justify-between space-y-6">
            <div className="space-y-4">
              <div className="inline-block text-[10px] uppercase font-bold text-[#FFD700] tracking-widest px-2 py-0.5 bg-gray-800/60 rounded">
                ⚡ {currentSpec.badge}
              </div>
              <h4 className="text-xl font-bold tracking-tight text-white">
                {currentSpec.title}
              </h4>
              <p className="text-xs sm:text-sm text-gray-300 leading-relaxed">
                {currentSpec.description}
              </p>
            </div>

            {/* Standard Comparison Box */}
            <div className="space-y-4 pt-4 border-t border-gray-800/80">
              {/* Problem Case */}
              <div className="bg-[#1E1113]/45 border border-red-900/40 rounded-lg p-3.5 space-y-2">
                <div className="flex items-center gap-2 text-red-400 text-xs font-bold uppercase tracking-wider">
                  <X size={14} className="stroke-[3]" />
                  <span>Cách làm phổ thông trên thị trường</span>
                </div>
                <p className="text-xs text-gray-400 leading-relaxed">
                  {currentSpec.standardAgency}
                </p>
              </div>

              {/* Solved Case */}
              <div className="bg-[#111E15]/45 border border-green-900/40 rounded-lg p-3.5 space-y-2">
                <div className="flex items-center gap-2 text-green-400 text-xs font-bold uppercase tracking-wider">
                  <Check size={14} className="stroke-[3]" />
                  <span>Giải pháp kỹ thuật của Derek Flow</span>
                </div>
                <p className="text-xs text-gray-300 leading-relaxed">
                  {currentSpec.derekStandard}
                </p>
              </div>
            </div>
          </div>

          {/* Styled Terminal IDE (12cols - lg:7) */}
          <div className="lg:col-span-7 flex flex-col rounded-xl overflow-hidden bg-[#181A1F] border border-gray-850 shadow-inner min-h-[300px] lg:min-h-auto flex-1 font-mono text-xs">
            {/* Header / Tabs bar representing IDE */}
            <div className="bg-[#21252B] px-4 py-2 flex items-center justify-between border-b border-gray-900 select-none">
              <div className="flex items-center space-x-2">
                {/* Mac controls */}
                <span className="w-2.5 h-2.5 rounded-full bg-[#FF5F56] inline-block"></span>
                <span className="w-2.5 h-2.5 rounded-full bg-[#FFBD2E] inline-block"></span>
                <span className="w-2.5 h-2.5 rounded-full bg-[#27C93F] inline-block"></span>
                
                {/* Active IDE Tab name */}
                <div className="ml-4 flex items-center space-x-1.5 bg-[#181A1F] px-3 py-1 rounded-t-md text-gray-300 border-t-2 border-[#FFD700] text-[11px]">
                  <FileCode size={11} className="text-[#FFD700]" />
                  <span>{currentSpec.filePath}</span>
                </div>
              </div>
              <span className="text-[10px] text-gray-500 uppercase font-mono">{currentSpec.language}</span>
            </div>

            {/* Code Body */}
            <div className="p-4 bg-[#181A1F] flex-1 overflow-x-auto text-gray-300 leading-relaxed select-all">
              <pre className="whitespace-pre-wrap sm:whitespace-pre font-mono text-[11px] sm:text-[12px]">
                {currentSpec.code.split("\n").map((line, i) => (
                  <div key={i} className="table-row hover:bg-gray-800/40">
                    <span className="table-cell text-right pr-4 text-gray-600 select-none w-6 text-[10px]">{i + 1}</span>
                    <span className="table-cell">
                      {line.startsWith("//") || line.startsWith("#") ? (
                        <span className="text-green-500 italic">{line}</span>
                      ) : line.includes("import") || line.includes("export") || line.includes("return") ? (
                        <span>
                          {line.split(" ").map((word, idx) => {
                            if (["import", "export", "function", "return", "const", "from"].includes(word.replace(/[^a-zA-Z]/g, ""))) {
                              return <span key={idx} className="text-[#C678DD] font-semibold">{word} </span>;
                            }
                            return word + " ";
                          })}
                        </span>
                      ) : (
                        <span>{line}</span>
                      )}
                    </span>
                  </div>
                ))}
              </pre>
            </div>

            {/* Terminal status bar */}
            <div className="bg-[#21252B] py-1 px-4 text-[10px] text-gray-500 border-t border-gray-900 flex items-center justify-between select-none">
              <div className="flex items-center space-x-2">
                <span className="w-1.5 h-1.5 rounded-full bg-green-500 inline-block"></span>
                <span>COMPILER STATUS: READY</span>
              </div>
              <span>Ln {currentSpec.code.split("\n").length}, Col 1</span>
            </div>
          </div>

        </div>
      </div>
    </section>
  );
}
