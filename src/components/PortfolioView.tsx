import React, { useState } from "react";
import { AppView, CaseStudy } from "../types";
import { TrendingUp, Percent, Zap, ArrowRight, Layers, BarChart, Server, Globe, X, CheckCircle, FileText, AlertTriangle, Hammer, Award } from "lucide-react";

interface PortfolioViewProps {
  setCurrentView: (view: AppView) => void;
}

export default function PortfolioView({ setCurrentView }: PortfolioViewProps) {
  const [activeFilter, setActiveFilter] = useState<"all" | "seo" | "web" | "automation">("all");
  const [selectedStudy, setSelectedStudy] = useState<CaseStudy | null>(null);

  const caseStudies: CaseStudy[] = [
    {
      id: "case_1",
      title: "Chiến Dịch SEO Tổng Thể Ngành Thực Phẩm",
      category: "seo",
      projectYear: "2024 Project",
      imageUrl: "f_b",
      clientIndustry: "F&B Industry",
      description: "Tái cấu trúc toàn diện kiến trúc thông tin, tối ưu hóa Technical On-page và triển khai chiến dịch Content Cluster bám đuổi hành vi mua sắm người dùng.",
      initialState: "Lúc mới bàn giao, website ở trong tình trạng trì trệ kéo dài. Chỉ có lẻ tẻ vài bài viết chưa tối ưu chuẩn SEO, cấu trúc code lộn xộn, không có sơ đồ trang web (Sitemap) rõ ràng làm Googlebot khó thu thập thông tin.",
      problem: "Website từng bị phạt nhẹ do spam liên kết từ hệ thống cũ. Tốc độ tải trang đo bằng Google Lighthouse đặc biệt kém (chỉ đạt 32/100 điểm), tỷ lệ thoát trang giữ ở mức báo động hơn 75% khiến phễu mua hàng gần như tê liệt.",
      fix: "Gỡ bỏ các backlink độc hại cũ và làm sạch Profile liên kết. Nén toàn bộ mã nguồn CSS/JS dư thừa, tối ưu hóa hình ảnh sang định dạng WebP thế hệ mới để đẩy nhanh tốc độ load dưới 1.2s. Triển khai cấu trúc Content Hub 45 bài dạng Topic Cluster tập trung dứt điểm vào từ khóa có ý định giao dịch (Transactional Intent).",
      results: [
        "Lượng Organic Traffic tự nhiên bứt phá tăng hơn 250% sau đúng 4 tháng.",
        "Xếp hạng top 1-3 bền vững cho hơn 120 từ khóa cạnh tranh gắt gao nhất ngành thực phẩm.",
        "Tỷ lệ chuyển đổi mua hàng thành công trực tiếp tăng vọt gấp 3.5 lần."
      ],
      metrics: [
        { label: "TRAFFIC GROWTH", value: "+250%" },
        { label: "NEW LEADS", value: "1.2k/Mo" },
        { label: "ROI CHUYỂN ĐỔI", value: "3.5x" }
      ],
      proofImageInitial: "https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=800&q=80",
      proofImageProblem: "https://images.unsplash.com/photo-1526374965328-7f61d4dc18c5?auto=format&fit=crop&w=800&q=80",
      proofImageFix: "https://images.unsplash.com/photo-1504868584819-f8e8b4b6d7e3?auto=format&fit=crop&w=800&q=80",
      proofImageResults: "https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=800&q=80"
    },
    {
      id: "case_2",
      title: "Tự Động Hóa Chăm Sóc Khách Hàng AI",
      category: "automation",
      projectYear: "2023 Project",
      imageUrl: "ai_bot",
      clientIndustry: "E-Commerce",
      description: "Xây dựng hệ thống Chatbot AI tự động hóa và đồng bộ hóa CRM, tự sinh câu hỏi giải đáp và bám đuổi phễu bán hàng theo thời gian thực.",
      initialState: "Cửa hàng vận hành hoàn toàn thủ công. Đội ngũ trực Fanpage thường xuyên rơi vào cảnh quá tải tin nhắn ngoài giờ hành chính, dẫn đến việc bỏ quên hoặc phản hồi trễ các yêu cầu tư vấn nóng của khách hàng.",
      problem: "Nghiên cứu kỹ dữ liệu cho thấy hơn 40% lượng khách hàng tiềm năng inbox vào khung giờ đêm muộn bị thất thoát do không có phản hồi tức thì. Nhân viên trực ca ngày mệt mỏi vì liên tục phải giải đáp các câu hỏi lặp đi lặp lại về thông số, size số sản phẩm.",
      fix: "Thiết kế & huấn luyện Trợ lý ảo AI thông minh sử dụng kiến trúc RAG tích hợp sâu vào tài liệu sản phẩm riêng của shop. Kết nối Webhook tự động đồng bộ mọi dữ liệu Lead nóng về Google Sheets, đồng thời đẩy thông báo khẩn qua Telegram cho Sale xử lý ngay.",
      results: [
        "Chatbot AI phản hồi tư vấn chính xác mọi thông số sản phẩm 24/7 dưới 2 giây với độ chính xác trên 95%.",
        "Tiết kiệm 40% chi phí tuyển dụng & quản lý nhân sự trực Page ca tối.",
        "Tỷ lệ chốt đơn từ tệp khách hàng truy cập ban đêm tăng gấp 2 lần."
      ],
      metrics: [
        { label: "EFFICIENCY", value: "+80%" },
        { label: "COST REDUCTION", value: "40%" },
        { label: "LEAD GEN INDEX", value: "2x" }
      ],
      proofImageInitial: "https://images.unsplash.com/photo-1531747118685-ca8fa6e08806?auto=format&fit=crop&w=800&q=80",
      proofImageProblem: "https://images.unsplash.com/photo-1551836022-d5d88e9218df?auto=format&fit=crop&w=800&q=80",
      proofImageFix: "https://images.unsplash.com/photo-1618005182384-a83a8bd57fbe?auto=format&fit=crop&w=800&q=80",
      proofImageResults: "https://images.unsplash.com/photo-1551836022-b06938b41695?auto=format&fit=crop&w=800&q=80"
    },
    {
      id: "case_3",
      title: "Website Bất Động Sản Cao Cấp",
      category: "web",
      projectYear: "2024 Project",
      imageUrl: "real_estate",
      clientIndustry: "Real Estate",
      description: "Phát triển nền tảng giới thiệu dự án cao cấp trên React/Vite, tối ưu hóa điểm số Core Web Vitals tối đa đem lại trải nghiệm mượt mà vượt bậc.",
      initialState: "Trang thông tin dự án cũ xây dựng trên nền tảng lỗi thời, dung lượng trang phình to không cần thiết, tài nguyên máy chủ cấu hình yếu thường xuyên nghẽn mạng khi quảng cáo có traffic lớn tràn vào.",
      problem: "Mỗi khi khách hàng VIP mở xem hình ảnh thiết kế 3D căn hộ, trang web mất tới 8 giây để hiển thị đầy đủ, làm giảm nghiêm trọng trải nghiệm người dùng cao cấp và khiến tỷ lệ đăng ký tư vấn sụt giảm mạnh.",
      fix: "Tái cấu trúc và lập trình lại hoàn toàn bằng React và Vite tối tân. Áp dụng kỹ thuật Lazy Loading phân chia tài nguyên thông minh, tự động tối ưu hóa hiển thị ảnh chất lượng cao theo kích thước màn hình người dùng, nén code tối ưu CSS.",
      results: [
        "Điểm kiểm toán hiệu năng Google Lighthouse đạt mốc 100/100 điểm tuyệt đối.",
        "Thời gian tải trang tức thì giảm xuống chỉ còn dưới 0.8 giây.",
        "Tỷ lệ khách hàngVIP giữ chân xem lâu tăng gấp 3 lần, lượng form đăng ký tăng 15%."
      ],
      metrics: [
        { label: "LOAD TIME CORES", value: "0.8s" },
        { label: "CVR ĐĂNG KÝ", value: "+15%" },
        { label: "ENGAGEMENT", value: "3x" }
      ],
      proofImageInitial: "https://images.unsplash.com/photo-1560518883-ce09059eeffa?auto=format&fit=crop&w=800&q=80",
      proofImageProblem: "https://images.unsplash.com/photo-1507537297725-24a1c029d3ca?auto=format&fit=crop&w=800&q=80",
      proofImageFix: "https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=800&q=80",
      proofImageResults: "https://images.unsplash.com/photo-1504868584819-f8e8b4b6d7e3?auto=format&fit=crop&w=800&q=80"
    },
    {
      id: "case_4",
      title: "Tăng Trưởng Người Dùng Đa Kênh SAAS",
      category: "seo",
      projectYear: "2023 Project",
      imageUrl: "saas",
      clientIndustry: "SaaS Startup",
      description: "Thực thi kiểm toán cấu trúc hạ tầng từ khóa SEO, tối ưu SEO thực chiến sâu rộng kết hợp phễu dẫn nguồn tự phát từ cấu trúc SILO.",
      initialState: "Hệ thống phần mềm SaaS mới ra mắt thị trường chưa có độ phủ thương hiệu. Kênh tiếp cận khách hàng phụ thuộc hoàn toàn vào chạy quảng cáo trả phí Google Ads và Facebook Ads với chi phí ngày càng đắt đỏ.",
      problem: "Chi phí có được một khách hàng mới (CAC) quá cao, tiệm cận mức hòa vốn. Lượng lượt truy cập tự nhiên (Organic Traffic) gần như bằng không do nội dung mỏng và cấu trúc liên kết lộn xộn.",
      fix: "Xây dựng sơ đồ phân tầng liên kết chặt chẽ theo cấu trúc SILO mô hình hóa từng cụm tính năng của phần mềm. Áp dụng kỹ thuật Onsite SEO tối ưu hóa chuyên sâu các thẻ Schema JSON-LD định dạng dữ liệu có cấu trúc cho bot tìm kiếm dễ hiểu.",
      results: [
        "Đạt mốc bứt phá hơn 12,000 lượt truy cập tìm kiếm tự nhiên của người dùng mục tiêu mỗi ngày.",
        "Chi phí CAC (tiếp cận khách hàng mới) giảm mạnh tới 35% nhờ phễu tìm kiếm tự nhiên bổ trợ.",
        "Duy trì tỷ lệ khách hàng đăng ký sử dụng thử dịch vụ chuyển sang gói trả phí ổn định ở mức 68%."
      ],
      metrics: [
        { label: "DAILY USERS", value: "+12k" },
        { label: "CAC INDEX", value: "-35%" },
        { label: "RETENTION RATE", value: "68%" }
      ],
      proofImageInitial: "https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=800&q=80",
      proofImageProblem: "https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=800&q=80",
      proofImageFix: "https://images.unsplash.com/photo-1526374965328-7f61d4dc18c5?auto=format&fit=crop&w=800&q=80",
      proofImageResults: "https://images.unsplash.com/photo-1542744094-3a31f103e35f?auto=format&fit=crop&w=800&q=80"
    }
  ];

  const filteredStudies = activeFilter === "all" 
    ? caseStudies 
    : caseStudies.filter(c => c.category === activeFilter);

  const renderMockGraphic = (type: string) => {
    switch(type) {
      case "f_b":
        return (
          <div className="w-full h-48 bg-gradient-to-tr from-[#1A1A2E] to-slate-800 rounded flex flex-col items-center justify-center p-6 text-white text-center border-b border-gray-900 select-none">
            <BarChart size={40} className="text-[#FFD700] mb-2 animate-pulse" />
            <span className="text-[10px] uppercase tracking-widest text-[#FFD700] font-bold font-mono">SEO Rank Report Active</span>
            <span className="text-xs text-gray-400 mt-1 font-mono">Google Search Console Overlapping</span>
          </div>
        );
      case "ai_bot":
        return (
          <div className="w-full h-48 bg-gradient-to-tr from-[#F5F0E8] to-[#E5E7EB] rounded flex flex-col items-center justify-center p-6 text-[#1A1A2E] text-center border-b border-gray-300 select-none">
            <Layers size={40} className="text-[#FFD700] mb-2 animate-pulse" />
            <span className="text-[10px] uppercase tracking-widest text-[#1A1A2E] font-bold font-mono">AI Workflow Connected</span>
            <span className="text-xs text-gray-550 mt-1 font-mono">N8N & Pinecone Vectors active</span>
          </div>
        );
      case "real_estate":
        return (
          <div className="w-full h-48 bg-gradient-to-tr from-[#1A1A2E] to-amber-950/20 rounded flex flex-col items-center justify-center p-6 text-white text-center border-b border-gray-950 select-none">
            <Globe size={40} className="text-[#FFD700] mb-2 animate-pulse" />
            <span className="text-[10px] uppercase tracking-widest text-[#FFD700] font-bold font-mono">Lighthouse 100/100 Speed</span>
            <span className="text-xs text-gray-400 mt-1 font-mono">Pure Vite + React ESM architecture</span>
          </div>
        );
      case "saas":
      default:
        return (
          <div className="w-full h-48 bg-gradient-to-tr from-[#F5F0E8] to-[#E5E7EB] rounded flex flex-col items-center justify-center p-6 text-[#1A1A2E] text-center border-b border-gray-200 select-none">
            <Server size={40} className="text-[#FFD700] mb-2" />
            <span className="text-[10px] uppercase tracking-widest text-gray-650 font-bold font-mono">Crawler Indexer Nodes</span>
            <span className="text-xs text-gray-500 mt-1 font-mono">Technical Site Audit Report</span>
          </div>
        );
    }
  };

  return (
    <section id="portfolio-view-section" className="bg-[#F4EFE6] text-[#1A1A2E] py-16 px-4 sm:px-6 md:px-12 font-sans relative">
      <div className="max-w-7xl mx-auto space-y-12">
        {/* Header content */}
        <div className="text-center max-w-2xl mx-auto space-y-4">
          <span className="text-[11px] font-bold tracking-widest uppercase text-[#FFD700] bg-[#1A1A2E] px-3 py-1 rounded inline-block font-mono">
            Dự án thực tế tiêu biểu
          </span>
          <h2 className="text-3xl md:text-4xl font-black tracking-tight text-[#1A1A2E]">Phân Tích Chi Tiết Case Study</h2>
          <p className="text-xs sm:text-sm text-gray-600 leading-relaxed max-w-xl mx-auto">
            Xem cách Derek Flow đồng hành giải quyết dứt điểm rào cản kỹ thuật của đối tác để mở ra kỷ nguyên bứt phá doanh số. Click trực tiếp vào các card dưới đây để xem phân tích dạng blog chi tiết.
          </p>
        </div>

        {/* Filter Toolbar Buttons */}
        <div className="flex flex-wrap items-center justify-center gap-2">
          {[
            { label: "Tất Cả Dự Án", val: "all" },
            { label: "Dịch Vụ SEO", val: "seo" },
            { label: "Thiết Kế Web", val: "web" },
            { label: "Tự Động Hóa", val: "automation" }
          ].map((item) => (
            <button
              id={`filter-btn-${item.val}`}
              key={item.val}
              onClick={() => setActiveFilter(item.val as any)}
              className={`px-5 py-2.5 text-xs font-semibold uppercase tracking-wider rounded border transition-all cursor-pointer ${
                activeFilter === item.val
                  ? "bg-[#1A1A2E] text-white border-[#1A1A2E]"
                  : "bg-[#FDFBF7] text-gray-600 border-gray-200 hover:border-[#FFD700]"
              }`}
            >
              {item.label}
            </button>
          ))}
        </div>

        {/* Case Studies Grid */}
        <div id="portfolio-grid-container" className="grid grid-cols-1 md:grid-cols-2 gap-8 pt-4">
          {filteredStudies.map((study) => (
            <div 
              id={`case-card-${study.id}`}
              key={study.id}
              onClick={() => setSelectedStudy(study)}
              className="bg-[#FDFBF7] border border-gray-200 rounded-lg overflow-hidden hover:border-[#FFD700] hover:shadow-xl transition-all flex flex-col justify-between group duration-300 cursor-pointer active:scale-[0.99]"
            >
              <div>
                {/* Image representations */}
                {renderMockGraphic(study.imageUrl)}

                <div className="p-6 md:p-8 space-y-4">
                  <div className="flex items-center justify-between">
                    <span className="text-[11px] font-extrabold uppercase tracking-widest text-[#FFD700] bg-[#F5F0E8] px-2.5 py-1 rounded">
                      {study.clientIndustry}
                    </span>
                    <span className="text-xs text-gray-400 font-mono font-medium">
                      {study.projectYear}
                    </span>
                  </div>

                  <h3 className="text-base sm:text-lg font-bold text-[#1A1A2E] tracking-tight group-hover:text-[#FFD700] transition-colors leading-snug">
                    {study.title}
                  </h3>

                  <p className="text-xs sm:text-[13px] text-gray-550 leading-relaxed text-justify line-clamp-3">
                    {study.description}
                  </p>

                  <div className="text-[11px] font-bold text-[#AA7500] flex items-center gap-1 group-hover:translate-x-1 transition-transform pt-1">
                    Xem chi tiết bài viết phân tích dự án <ArrowRight size={12} className="ml-0.5" />
                  </div>
                </div>
              </div>

              <div className="px-6 md:px-8 pb-6 md:pb-8">
                {/* Metrics boxes inside key card */}
                <div className="grid grid-cols-3 gap-3 pt-4 border-t border-gray-100 bg-[#F5F0E8] p-3 rounded">
                  {study.metrics.map((metric, mIdx) => (
                    <div key={mIdx} className="text-center space-y-1">
                      <span className="text-[9px] uppercase font-bold text-gray-400 block tracking-tight line-clamp-1">
                        {metric.label}
                      </span>
                      <span className="text-xs sm:text-sm font-extrabold text-[#1A1A2E] tracking-tight block">
                        {metric.value}
                      </span>
                    </div>
                  ))}
                </div>
              </div>
            </div>
          ))}
        </div>

        {/* Detailed Modal Overlay matching Blog structure */}
        {selectedStudy && (
          <div 
            id="portfolio-modal-overlay"
            className="fixed inset-0 bg-[#1A1A2E]/85 backdrop-blur-sm z-50 flex items-center justify-center p-3 sm:p-4 animate-fadeIn"
            onClick={(e) => {
              if (e.target === e.currentTarget) setSelectedStudy(null);
            }}
          >
            <div className="bg-[#FDFBF7] text-[#1A1A2E] w-full max-w-3xl rounded-xl shadow-2xl border border-gray-200 overflow-hidden flex flex-col max-h-[92vh] animate-scaleIn">
              {/* Modal Header */}
              <div className="p-5 sm:p-6 bg-[#1A1A2E] text-white flex items-center justify-between border-b border-gray-800">
                <div>
                  <div className="flex items-center gap-2">
                    <span className="text-[10px] uppercase font-extrabold tracking-widest text-[#FFD700] bg-white/10 px-2 py-0.5 rounded">
                      {selectedStudy.clientIndustry}
                    </span>
                    <span className="text-xs text-gray-400 font-mono">
                      {selectedStudy.projectYear}
                    </span>
                  </div>
                  <h3 className="text-lg md:text-xl font-bold tracking-tight mt-1.5 leading-snug">{selectedStudy.title}</h3>
                </div>
                <button 
                  id="close-modal-btn"
                  onClick={() => setSelectedStudy(null)}
                  className="p-1.5 rounded-full text-gray-450 hover:text-white hover:bg-white/15 transition-colors cursor-pointer shrink-0 ml-4"
                  title="Close Modal"
                >
                  <X size={22} />
                </button>
              </div>

              {/* Modal Content in Blog Style with 4 fixed sections */}
              <div className="p-5 sm:p-8 space-y-8 overflow-y-auto max-h-[calc(92vh-140px)] scrollbar-thin">
                
                {/* 1. Header Intro Image Representation */}
                <div className="relative rounded-lg overflow-hidden border border-gray-200 bg-[#F4EFE6] px-4 py-8 text-center flex flex-col items-center justify-center">
                  <div className="w-12 h-12 rounded-full bg-[#1A1A2E] text-[#FFD700] flex items-center justify-center mb-3">
                    <FileText size={24} />
                  </div>
                  <span className="text-[11px] uppercase tracking-widest text-[#AA7500] font-black">BÁO CÁO PHÂN TÍCH CHUYÊN SÂU</span>
                  <div className="text-sm text-gray-500 font-mono mt-1">Lưu trữ Case Study Hệ thống • Độc bản Derek Flow</div>
                </div>

                {/* KPI Metrics Dashboard block */}
                <div className="grid grid-cols-3 gap-2.5 sm:gap-4 bg-[#F5F0E8] p-4 rounded-lg border border-gray-150">
                  {selectedStudy.metrics.map((metric, idx) => (
                    <div key={idx} className="text-center space-y-0.5">
                      <span className="text-[9px] sm:text-[10px] text-gray-555 font-bold block uppercase tracking-wider">{metric.label}</span>
                      <span className="text-base sm:text-xl font-black text-[#1A1A2E]">{metric.value}</span>
                    </div>
                  ))}
                </div>

                {/* 4 FIXED SECTIONS AS A BEAUTIFUL BLOG POST */}
                <div className="space-y-6 divide-y divide-gray-150">
                  
                  {/* SECT 1: BAN ĐẦU / NHẬN WEB */}
                  {selectedStudy.initialState && (
                    <div className="space-y-3 pt-0">
                      <div className="flex items-center gap-2 text-indigo-900 border-l-4 border-indigo-700 pl-3">
                        <FileText size={18} className="shrink-0" />
                        <h4 className="text-[13px] font-black uppercase tracking-wider">1. TRẠNG THÁI BAN ĐẦU & NHẬN BÀN GIAO</h4>
                      </div>
                      <p className="text-xs sm:text-[13.5px] text-gray-700 leading-relaxed text-justify pl-4 font-sans">
                        {selectedStudy.initialState}
                      </p>
                    </div>
                  )}

                  {/* SECT 2: VẤN ĐỀ */}
                  {selectedStudy.problem && (
                    <div className="space-y-3 pt-5">
                      <div className="flex items-center gap-2 text-rose-800 border-l-4 border-rose-600 pl-3">
                        <AlertTriangle size={18} className="shrink-0" />
                        <h4 className="text-[13px] font-black uppercase tracking-wider">2. RÀO CẢN & VẤN ĐỀ ĐANG ĐỐI MẶT</h4>
                      </div>
                      <p className="text-xs sm:text-[13.5px] text-gray-700 leading-relaxed text-justify pl-4 font-sans">
                        {selectedStudy.problem}
                      </p>
                    </div>
                  )}

                  {/* SECT 3: FIX */}
                  {selectedStudy.fix && (
                    <div className="space-y-3 pt-5">
                      <div className="flex items-center gap-2 text-amber-800 border-l-4 border-amber-600 pl-3">
                        <Hammer size={18} className="shrink-0" />
                        <h4 className="text-[13px] font-black uppercase tracking-wider">3. PHƯƠNG ÁN SỬA LỖI & KHẮC PHỤC (FIX)</h4>
                      </div>
                      <p className="text-xs sm:text-[13.5px] text-gray-700 leading-relaxed text-justify pl-4 font-sans">
                        {selectedStudy.fix}
                      </p>
                    </div>
                  )}

                  {/* SECT 4: KẾT QUẢ ĐẠT ĐƯỢC */}
                  {selectedStudy.results && selectedStudy.results.length > 0 && (
                    <div className="space-y-3 pt-5">
                      <div className="flex items-center gap-2 text-emerald-800 border-l-4 border-emerald-600 pl-3">
                        <Award size={18} className="shrink-0" />
                        <h4 className="text-[13px] font-black uppercase tracking-wider">4. KẾT QUẢ VẬN HÀNH ĐẠT ĐƯỢC</h4>
                      </div>
                      <div className="pl-4">
                        <ul className="space-y-2.5">
                          {selectedStudy.results.map((res, rIdx) => (
                            <li key={rIdx} className="flex items-start gap-2.5 text-xs sm:text-[13.5px] text-gray-750">
                              <CheckCircle size={15} className="text-emerald-600 mt-1 shrink-0" />
                              <span className="leading-relaxed text-justify font-sans">{res}</span>
                            </li>
                          ))}
                        </ul>
                      </div>
                    </div>
                  )}
                </div>
              </div>

              {/* Modal Footer CTA */}
              <div className="p-4 bg-[#F5F0E8] border-t border-gray-200 flex flex-col sm:flex-row items-center justify-between gap-3">
                <span className="text-[11px] text-gray-500 font-medium">Bản quyền phân phối dự án thuộc về Derek Flow®</span>
                <div className="flex gap-2 w-full sm:w-auto">
                  <button 
                    id="modal-consult-btn"
                    onClick={() => {
                      setSelectedStudy(null);
                      setCurrentView("contact");
                      window.scrollTo({ top: 0, behavior: "smooth" });
                    }}
                    className="flex-1 sm:flex-initial bg-[#FFD700] hover:bg-[#E6C200] text-[#1A1A2E] text-[11px] font-bold uppercase tracking-wider px-5 py-2.5 rounded transition-all cursor-pointer text-center whitespace-nowrap"
                  >
                    Tư Vấn Dự Án Tương Tự
                  </button>
                  <button 
                    id="modal-close-bottom-btn"
                    onClick={() => setSelectedStudy(null)}
                    className="flex-1 sm:flex-initial bg-white border border-gray-200 text-gray-650 hover:text-gray-850 text-[11px] font-bold uppercase tracking-wider px-5 py-2.5 rounded transition-all cursor-pointer text-center"
                  >
                    Đóng lại
                  </button>
                </div>
              </div>
            </div>
          </div>
        )}

        {/* Success Quote call action card */}
        <div id="cta-quote-card" className="bg-[#1A1A2E] text-white p-8 md:p-12 rounded-lg text-center space-y-6 relative overflow-hidden">
          <div className="absolute top-0 left-0 w-32 h-32 bg-[#FFD700]/5 rounded-full blur-2xl font-sans"></div>
          <div className="max-w-2xl mx-auto space-y-4">
            <h3 className="text-2xl md:text-3xl font-extrabold tracking-tight">Bắt đầu câu chuyện bứt phá của bạn</h3>
            <p className="text-xs sm:text-sm text-gray-300 leading-relaxed max-w-xl mx-auto">
              Sẵn sàng đưa dự án của bạn bứt phá vị trí dẫn đầu, tinh giản nhân lực thủ công và tối đa tỷ lệ chuyển đổi? Hãy liên kết tư vấn ngay hôm nay.
            </p>
          </div>

          <div className="flex flex-wrap items-center justify-center gap-4">
            <button
              id="cta-route-contact-btn"
              onClick={() => {
                setCurrentView("contact");
                window.scrollTo({ top: 0, behavior: "smooth" });
              }}
              className="flex items-center justify-center space-x-2 bg-[#FFD700] hover:bg-[#E6C200] text-[#1A1A2E] text-xs font-bold uppercase tracking-wide px-6 py-3 rounded shadow cursor-pointer h-12"
            >
              <span>Xem Lộ Trình & Nhận Ưu Đãi</span>
              <ArrowRight size={14} />
            </button>
            <button
              id="cta-route-pricing-btn"
              onClick={() => {
                setCurrentView("pricing");
                window.scrollTo({ top: 0, behavior: "smooth" });
              }}
              className="flex items-center justify-center space-x-2 border border-gray-650 hover:border-white text-xs font-semibold px-6 py-3 rounded transition-all cursor-pointer h-12 text-white"
            >
              Xem Chi Tiết Chi Phí
            </button>
          </div>
        </div>
      </div>
    </section>
  );
}
