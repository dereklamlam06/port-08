import React, { useState } from "react";
import { AppView, CaseStudy } from "../types";
import { TrendingUp, Percent, Zap, ArrowRight, Layers, BarChart, Server, Globe } from "lucide-react";

interface PortfolioViewProps {
  setCurrentView: (view: AppView) => void;
}

export default function PortfolioView({ setCurrentView }: PortfolioViewProps) {
  const [activeFilter, setActiveFilter] = useState<"all" | "seo" | "web" | "automation">("all");

  const caseStudies: CaseStudy[] = [
    {
      id: "case_1",
      title: "Chiến Dịch SEO Tổng Thể Ngành Thực Phẩm",
      category: "seo",
      projectYear: "2024 Project",
      imageUrl: "f_b",
      clientIndustry: "F&B Industry",
      description: "Tái cấu trúc toàn diện kiến trúc thông tin, tối ưu hóa Technical On-page và triển khai chiến dịch Content Cluster bám đuổi hành vi mua sắm người dùng.",
      metrics: [
        { label: "TRAFFIC GROWTH", value: "+250%" },
        { label: "NEW LEADS", value: "1.2k/Mo" },
        { label: "ROI CHUYỂN ĐỔI", value: "3.5x" }
      ]
    },
    {
      id: "case_2",
      title: "Tự Động Hóa Chăm Sóc Khách Hàng AI",
      category: "automation",
      projectYear: "2023 Project",
      imageUrl: "ai_bot",
      clientIndustry: "E-Commerce",
      description: "Xây dựng hệ thống Chatbot AI tự động hóa và đồng bộ hóa CRM, tự sinh câu hỏi giải đáp và bám đuổi phễu bán hàng theo thời gian thực.",
      metrics: [
        { label: "EFFICIENCY", value: "+80%" },
        { label: "COST REDUCTION", value: "40%" },
        { label: "LEAD GEN INDEX", value: "2x" }
      ]
    },
    {
      id: "case_3",
      title: "Website Bất Động Sản Cao Cấp",
      category: "web",
      projectYear: "2024 Project",
      imageUrl: "real_estate",
      clientIndustry: "Real Estate",
      description: "Phát triển nền tảng giới thiệu dự án cao cấp trên React/Vite, tối ưu hóa điểm số Core Web Vitals tối đa đem lại trải nghiệm mượt mà vượt bậc.",
      metrics: [
        { label: "LOAD TIME CORES", value: "0.8s" },
        { label: "CVR ĐĂNG KÝ", value: "+15%" },
        { label: "ENGAGEMENT", value: "3x" }
      ]
    },
    {
      id: "case_4",
      title: "Tăng Trưởng Người Dùng Đa Kênh SAAS",
      category: "seo",
      projectYear: "2023 Project",
      imageUrl: "saas",
      clientIndustry: "SaaS Startup",
      description: "Thực thi kiểm toán cấu trúc hạ tầng từ khóa SEO, tối ưu SEO thực chiến sâu rộng kết hợp phễu dẫn nguồn tự phát từ Automation.",
      metrics: [
        { label: "DAILY USERS", value: "+12k" },
        { label: "CAC INDEX", value: "-35%" },
        { label: "RETENTION RATE", value: "68%" }
      ]
    }
  ];

  const filteredStudies = activeFilter === "all" 
    ? caseStudies 
    : caseStudies.filter(c => c.category === activeFilter);

  // Renders visual representations of the cases instead of blank placeholders
  const renderMockGraphic = (type: string) => {
    switch(type) {
      case "f_b":
        return (
          <div className="w-full h-48 bg-gradient-to-tr from-[#1A1A2E] to-slate-800 rounded flex flex-col items-center justify-center p-6 text-white text-center border-b border-gray-900 select-none">
            <BarChart size={40} className="text-[#FFD700] mb-2 animate-pulse" />
            <span className="text-[10px] uppercase tracking-widest text-[#FFD700] font-bold">SEO Rank Report Active</span>
            <span className="text-xs text-gray-400 mt-1">Google Search Console Overlapping</span>
          </div>
        );
      case "ai_bot":
        return (
          <div className="w-full h-48 bg-gradient-to-tr from-[#F5F0E8] to-[#E5E7EB] rounded flex flex-col items-center justify-center p-6 text-[#1A1A2E] text-center border-b border-gray-300 select-none">
            <Layers size={40} className="text-[#FFD700] mb-2 animate-pulse" />
            <span className="text-[10px] uppercase tracking-widest text-[#1A1A2E] font-bold">AI Workflow Connected</span>
            <span className="text-xs text-gray-500 mt-1">N8N & Pinecone Vectors active</span>
          </div>
        );
      case "real_estate":
        return (
          <div className="w-full h-48 bg-gradient-to-tr from-[#1A1A2E] to-amber-950/20 rounded flex flex-col items-center justify-center p-6 text-white text-center border-b border-gray-950 select-none">
            <Globe size={40} className="text-[#FFD700] mb-2 animate-pulse" />
            <span className="text-[10px] uppercase tracking-widest text-[#FFD700] font-bold">Lighthouse 100/100 Speed</span>
            <span className="text-xs text-gray-400 mt-1">Pure Vite + React ESM architecture</span>
          </div>
        );
      case "saas":
      default:
        return (
          <div className="w-full h-48 bg-gradient-to-tr from-[#F5F0E8] to-[#E5E7EB] rounded flex flex-col items-center justify-center p-6 text-[#1A1A2E] text-center border-b border-gray-200 select-none">
            <Server size={40} className="text-[#FFD700] mb-2" />
            <span className="text-[10px] uppercase tracking-widest text-gray-600 font-bold font-mono">Crawler Indexer Nodes</span>
            <span className="text-xs text-gray-500 mt-1">Data sync automatons on Cron</span>
          </div>
        );
    }
  };

  return (
    <section className="bg-[#FAFAF7] text-[#1A1A2E] py-16 px-6 md:px-12 font-sans">
      <div className="max-w-7xl mx-auto space-y-12">
        {/* Header content */}
        <div className="text-center max-w-2xl mx-auto space-y-4">
          <span className="text-[11px] font-bold tracking-widest uppercase text-[#FFD700]">Dự án thực tế tiêu biểu</span>
          <h2 className="text-3xl md:text-4xl font-extrabold tracking-tight text-[#1A1A2E]">Kết Quả Bứt Phá Thực Tế</h2>
          <p className="text-xs sm:text-sm text-gray-500 leading-relaxed">
            Xem cách Derek Lâm hỗ trợ các nhãn hàng tăng trưởng vượt bậc thứ hạng tìm kiếm tự nhiên và tối ưu tỷ suất tự động hóa vận hành.
          </p>
        </div>

        {/* Filter Toolbar Buttons */}
        <div className="flex flex-wrap items-center justify-center gap-2">
          {([{ label: "Tất Cả Dự Án", val: "all" }, { label: "SEO Chiến Lược", val: "seo" }, { label: "Website Cao Cấp", val: "web" }, { label: "AI & Automation", val: "automation" }] as const).map((item) => (
            <button
              key={item.val}
              onClick={() => setActiveFilter(item.val)}
              className={`px-5 py-2 text-xs font-semibold uppercase tracking-wider rounded border transition-all cursor-pointer ${
                activeFilter === item.val
                  ? "bg-[#1A1A2E] text-white border-[#1A1A2E]"
                  : "bg-white text-gray-600 border-gray-200 hover:border-[#FFD700]"
              }`}
            >
              {item.label}
            </button>
          ))}
        </div>

        {/* Case Studies Grid */}
        <div className="grid grid-cols-1 md:grid-cols-2 gap-8 pt-4">
          {filteredStudies.map((study) => (
            <div 
              key={study.id}
              className="bg-white border border-gray-200 rounded-lg overflow-hidden hover:border-[#FFD700] hover:shadow-lg transition-all flex flex-col justify-between group duration-300"
            >
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

                <h3 className="text-base sm:text-lg font-bold text-[#1A1A2E] tracking-tight group-hover:text-[#FFD700] transition-colors">
                  {study.title}
                </h3>

                <p className="text-xs sm:text-[13px] text-gray-500 leading-relaxed">
                  {study.description}
                </p>

                {/* Metrics boxes inside key card */}
                <div className="grid grid-cols-3 gap-3 pt-4 border-t border-gray-100 bg-[#F5F0E8] p-3 rounded">
                  {study.metrics.map((metric, mIdx) => (
                    <div key={mIdx} className="text-center space-y-1">
                      <span className="text-[10px] uppercase font-bold text-gray-400 block tracking-tight line-clamp-1">
                        {metric.label}
                      </span>
                      <span className="text-sm sm:text-base font-extrabold text-[#1A1A2E] tracking-tight block">
                        {metric.value}
                      </span>
                    </div>
                  ))}
                </div>
              </div>
            </div>
          ))}
        </div>

        {/* Success Quote call action card */}
        <div className="bg-[#1A1A2E] text-white p-8 md:p-12 rounded-lg text-center space-y-6 relative overflow-hidden">
          <div className="absolute top-0 left-0 w-32 h-32 bg-[#FFD700]/5 rounded-full blur-2xl"></div>
          <div className="max-w-2xl mx-auto space-y-4">
            <h3 className="text-2xl md:text-3xl font-extrabold tracking-tight">Bắt đầu câu chuyện thành công của bạn</h3>
            <p className="text-xs sm:text-sm text-gray-300 leading-relaxed max-w-xl mx-auto">
              Sẵn sàng đưa dự án của bạn bứt phá vị trí dẫn đầu, tinh giản nhân lực thủ công và tối đa tỷ lệ chuyển đổi? Hãy liên kết tư vấn ngay hôm nay.
            </p>
          </div>

          <div className="flex flex-wrap items-center justify-center gap-4">
            <button
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
