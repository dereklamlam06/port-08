import React from "react";
import { AppView } from "../types";
import { ArrowRight, Bot, Zap, TrendingUp, Cpu, Award } from "lucide-react";
import { motion } from "motion/react";

interface HeroProps {
  setCurrentView: (view: AppView) => void;
}

export default function Hero({ setCurrentView }: HeroProps) {
  const statItems = [
    { value: "+187%", label: "Tăng Trưởng Traffic", description: "Bình quân các chiến dịch" },
    { value: "23", label: "Keywords Top 10", description: "Dẫn đầu các từ khóa khó" },
    { value: "02", label: "Dự Án Lớn", description: "Mỹ phẩm & Bất Động Sản" },
    { value: "06", label: "Tháng Đạt Đỉnh", description: "Thời gian trung bình" }
  ];

  const [brandLogs, setBrandLogs] = React.useState<string[]>(() => {
    const saved = localStorage.getItem("derek-tech-tools");
    if (saved) {
      return saved.split(",").map(s => s.trim()).filter(Boolean);
    }
    return ["GSC", "GA4", "SEMRUSH", "AHREFS", "REACTJS", "VITE"];
  });

  React.useEffect(() => {
    const handleUpdate = () => {
      const saved = localStorage.getItem("derek-tech-tools");
      if (saved) {
        setBrandLogs(saved.split(",").map(s => s.trim()).filter(Boolean));
      } else {
        setBrandLogs(["GSC", "GA4", "SEMRUSH", "AHREFS", "REACTJS", "VITE"]);
      }
    };
    window.addEventListener("custom-images-updated", handleUpdate);
    return () => {
      window.removeEventListener("custom-images-updated", handleUpdate);
    };
  }, []);

  return (
    <section className="bg-transparent text-[#1A1A2E] py-16 lg:py-24 px-6 md:px-12 font-sans overflow-hidden relative">
      <div className="max-w-7xl mx-auto">
        <div className="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
          {/* Hero Left Content */}
          <div className="lg:col-span-7 space-y-6">
            <div className="inline-flex items-center space-x-2 px-3 py-1 bg-[var(--app-card-custom)] border border-[var(--app-border-custom)] rounded-full shadow-2xs">
              <Zap size={12} className="text-[#FFD700]" />
              <span className="text-[11px] font-bold tracking-widest uppercase text-gray-600">SEO & Web Development Specialist</span>
            </div>

            <h1 className="text-4xl sm:text-5xl lg:text-5xl font-extrabold tracking-tight leading-tight text-[#1A1A2E]">
              Đưa Website Của Bạn <br />
              <span className="text-[#FFD700] relative inline-block">
                Lên Đỉnh Cao Mới
                <span className="absolute bottom-1 left-0 right-0 h-1 bg-[#FFD700]/30 rounded"></span>
              </span>
            </h1>

            <p className="text-sm md:text-base text-gray-500 leading-relaxed max-w-xl">
              Kết hợp sức mạnh vượt trội của <strong>SEO thực chiến chuyên sâu</strong> và giải pháp <strong>Thiết Kế Website Chuẩn SEO</strong> để gia tăng gấp bội lượng traffic tự nhiên, tối ưu hóa tỷ lệ chuyển đổi và thúc đẩy dòng tiền kinh doanh.
            </p>

            <div className="flex flex-col sm:flex-row gap-4 pt-4">
              <button
                onClick={() => {
                  setCurrentView("contact");
                  window.scrollTo({ top: 0, behavior: "smooth" });
                }}
                className="flex items-center justify-center space-x-2 bg-[#FFD700] hover:bg-[#E6C200] text-[#1A1A2E] font-bold text-sm px-6 py-3.5 rounded transition-all shadow-md hover:shadow-lg hover:-translate-y-0.5 cursor-pointer"
              >
                <span>Liên Hệ Tư Vấn Ngay</span>
                <ArrowRight size={16} />
              </button>
              
              <button
                onClick={() => {
                  setCurrentView("services");
                  window.scrollTo({ top: 0, behavior: "smooth" });
                }}
                className="flex items-center justify-center space-x-2 border border-[#1A1A2E] hover:bg-[#1A1A2E] hover:text-white transition-all text-sm font-semibold text-[#1A1A2E] px-6 py-3.5 rounded cursor-pointer"
              >
                <span>Xem Gói Dịch Vụ</span>
              </button>
            </div>

            {/* Quick Benefits Tags */}
            <div className="grid grid-cols-2 sm:grid-cols-3 gap-4 pt-4 border-t border-gray-200">
              <div className="flex items-center space-x-2 text-xs text-gray-600">
                <TrendingUp size={14} className="text-[#FFD700]" />
                <span className="font-semibold">Bứt phá thứ hạng từ khóa</span>
              </div>
              <div className="flex items-center space-x-2 text-xs text-gray-600">
                <Cpu size={14} className="text-[#FFD700]" />
                <span className="font-semibold">Lập trình React/Vite chuẩn SEO</span>
              </div>
              <div className="flex items-center space-x-2 text-xs text-gray-600 block sm:flex">
                <Award size={14} className="text-[#FFD700]" />
                <span className="font-semibold">Cam kết vận hành chuẩn SEO</span>
              </div>
            </div>
          </div>

          {/* Hero Right Visual Column - Premium Light SEO Campaign Mockup */}
          <div className="lg:col-span-5 flex justify-center">
            <div className="relative w-full max-w-[420px] rounded-2xl bg-[var(--app-card-custom)] border border-[var(--app-border-custom)] shadow-xl p-6 overflow-hidden select-none font-sans">
              
              {/* Browser window top controls */}
              <div className="flex items-center justify-between border-b border-gray-150 pb-3 mb-4">
                <div className="flex items-center space-x-2">
                  <div className="flex space-x-1.5">
                    <span className="w-2.5 h-2.5 rounded-full bg-red-400"></span>
                    <span className="w-2.5 h-2.5 rounded-full bg-yellow-400"></span>
                    <span className="w-2.5 h-2.5 rounded-full bg-green-400"></span>
                  </div>
                  <span className="text-[10px] font-bold text-gray-400 tracking-wider font-mono">DEREK.FLOW // SEO_REPORT</span>
                </div>
                <div className="flex items-center space-x-1 bg-green-50 text-green-700 border border-green-200 px-2.5 py-0.5 rounded-full shrink-0">
                  <span className="w-1.5 h-1.5 rounded-full bg-green-500 animate-pulse"></span>
                  <span className="text-[8px] font-extrabold uppercase tracking-widest">Active Track</span>
                </div>
              </div>

              {/* Core Analytics Showcase */}
              <div className="space-y-4">
                <div className="bg-[var(--app-bg-custom)] border border-[var(--app-border-custom)]/80 rounded-xl p-4 flex items-center justify-between">
                  <div className="space-y-0.5">
                    <span className="text-[9px] font-extrabold uppercase text-gray-400 tracking-wider">Organic Search traffic</span>
                    <div className="flex items-baseline space-x-1.5">
                      <span className="text-2xl font-extrabold text-[#1A1A2E] tracking-tight">482.3K</span>
                      <span className="text-[11px] text-green-600 font-extrabold font-sans">+187%</span>
                    </div>
                  </div>
                  <div className="p-2.5 bg-white border border-gray-100 rounded-lg text-[#FFD700] shadow-2xs">
                    <TrendingUp size={20} className="stroke-[2.5]" />
                  </div>
                </div>

                {/* Keyword Rank Tracker Simulation */}
                <div className="space-y-2.5">
                  <span className="text-[9px] font-bold uppercase text-gray-400 tracking-widest pl-1">Bứt Phá Thứ Hạng Từ Khóa</span>
                  
                  <div className="bg-white border border-gray-150 rounded-lg p-3 flex items-center justify-between text-xs hover:border-[#FFD700] transition-colors">
                    <div className="flex items-center gap-2">
                      <span className="text-[#FFD700] text-sm">★</span>
                      <span className="font-bold text-[#1A1A2E]">"dịch vụ seo chiến lược"</span>
                    </div>
                    <span className="bg-[#1A1A2E] text-[#FFD700] text-[9px] font-extrabold px-2 py-1 rounded">TOP 1</span>
                  </div>

                  <div className="bg-white border border-gray-150 rounded-lg p-3 flex items-center justify-between text-xs hover:border-[#FFD700] transition-colors">
                    <div className="flex items-center gap-2">
                      <span className="text-[#FFD700] text-sm">★</span>
                      <span className="font-bold text-[#1A1A2E]">"thiết kế website chuẩn seo"</span>
                    </div>
                    <span className="bg-[#1A1A2E] text-[#FFD700] text-[9px] font-extrabold px-2 py-1 rounded">TOP 2</span>
                  </div>

                  <div className="bg-white border border-gray-150 rounded-lg p-3 flex items-center justify-between text-xs hover:border-[#FFD700] transition-colors">
                    <div className="flex items-center gap-2">
                      <span className="text-[#FFD700] text-sm">★</span>
                      <span className="font-bold text-[#1A1A2E]">"dịch vụ nâng cấp web"</span>
                    </div>
                    <span className="bg-[#1A1A2E] text-[#FFD700] text-[9px] font-extrabold px-2 py-1 rounded">TOP 1</span>
                  </div>
                </div>

                {/* Status indicator bar */}
                <div className="bg-white border border-gray-150 rounded-lg p-3 flex items-center justify-between text-[11px] text-gray-500">
                  <div className="flex items-center gap-2">
                    <span className="w-2 h-2 rounded-full bg-green-500 animate-pulse"></span>
                    <span>Hệ thống vận hành an toàn...</span>
                  </div>
                  <span className="font-mono text-xs font-bold text-[#1A1A2E]">100% OK</span>
                </div>
              </div>

            </div>
          </div>
        </div>

        {/* Aggregate Performance Metrics Strip */}
        <div className="grid grid-cols-2 md:grid-cols-4 gap-6 mt-16 lg:mt-24 pt-8 border-t border-b border-gray-200 pb-8 bg-white/50 backdrop-blur-sm px-6 rounded-lg">
          {statItems.map((stat, idx) => (
            <div key={idx} className="text-center md:text-left space-y-1">
              <h3 className="text-2xl sm:text-3xl font-extrabold text-[#1A1A2E] tracking-tight">{stat.value}</h3>
              <p className="text-[12px] font-bold uppercase text-gray-800 tracking-wide">{stat.label}</p>
              <p className="text-[11px] text-gray-400">{stat.description}</p>
            </div>
          ))}
        </div>

        {/* Trust logos */}
        <div className="mt-12 flex flex-col sm:flex-row items-center justify-between gap-6 border-t border-gray-200/45 pt-8">
          <span className="text-[11.5px] font-black uppercase tracking-widest text-[var(--app-accent-custom)]">CÔNG CỤ SỬ DỤNG CHUYÊN SÂU:</span>
          <div className="flex flex-wrap items-center justify-center gap-6 md:gap-11 text-[13px] font-mono font-black text-[var(--app-text-muted)]">
            {brandLogs.map((log) => (
              <span key={log} className="hover:text-[var(--app-accent-custom)] transition-colors cursor-default uppercase tracking-wider">
                {log}
              </span>
            ))}
          </div>
        </div>
      </div>
    </section>
  );
}
