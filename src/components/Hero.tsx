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

  const brandLogs = ["GSC", "GA4", "SEMRUSH", "AHREFS", "OPENAI", "MAKE.COM"];

  return (
    <section className="bg-transparent text-[#1A1A2E] py-16 lg:py-24 px-6 md:px-12 font-sans overflow-hidden relative">
      <div className="max-w-7xl mx-auto">
        <div className="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
          {/* Hero Left Content */}
          <div className="lg:col-span-7 space-y-6">
            <div className="inline-flex items-center space-x-2 px-3 py-1 bg-[#F5F0E8] border border-gray-200 rounded-full">
              <Zap size={12} className="text-[#FFD700]" />
              <span className="text-[11px] font-bold tracking-widest uppercase text-gray-600">SEO & AI Automation Specialist</span>
            </div>

            <h1 className="text-4xl sm:text-5xl lg:text-5xl font-extrabold tracking-tight leading-tight text-[#1A1A2E]">
              Đưa Website Của Bạn <br />
              <span className="text-[#FFD700] relative inline-block">
                Lên Đỉnh Cao Mới
                <span className="absolute bottom-1 left-0 right-0 h-1 bg-[#FFD700]/30 rounded"></span>
              </span>
            </h1>

            <p className="text-sm md:text-base text-gray-500 leading-relaxed max-w-xl">
              Kết hợp sức mạnh vượt trội của <strong>SEO thực chiến chuyên sâu</strong> và giải pháp <strong>Tự động hóa bằng AI Agents</strong> để gia tăng gấp bội lượng traffic tự nhiên, tối ưu hóa tỷ lệ chuyển đổi và giải phóng nguồn lực tối đa.
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
                <span className="font-semibold">Tích hợp AI trợ lý 24/7</span>
              </div>
              <div className="flex items-center space-x-2 text-xs text-gray-600 block sm:flex">
                <Award size={14} className="text-[#FFD700]" />
                <span className="font-semibold">Cam kết vận hành chuẩn SEO</span>
              </div>
            </div>
          </div>

          {/* Hero Right Visual Column - Styled beautiful yellow launcher shape */}
          <div className="lg:col-span-5 flex justify-center">
            <div className="relative w-72 h-72 sm:w-80 sm:h-80 md:w-96 md:h-96 rounded-2xl bg-gradient-to-tr from-[#F5F0E8] to-white border border-gray-200 shadow-xl flex items-center justify-center p-8">
              {/* Decorative nodes */}
              <div className="absolute top-8 left-8 w-3 h-3 rounded-full bg-[#FFD700]/40 animate-ping"></div>
              <div className="absolute bottom-12 right-12 w-4 h-4 rounded-full bg-[#1A1A2E]/10"></div>
              <div className="absolute top-1/4 right-8 w-2 h-2 rounded-full bg-[#FFD700]"></div>

              {/* Main Visual Core Card */}
              <motion.div 
                animate={{ y: [0, -10, 0] }}
                transition={{ repeat: Infinity, duration: 4, ease: "easeInOut" }}
                className="w-48 h-48 md:w-56 md:h-56 rounded-xl bg-[#FFD700] shadow-2xl flex flex-col items-center justify-center relative select-none"
              >
                <div className="w-20 h-20 md:w-24 md:h-24 rounded-full bg-white/20 flex items-center justify-center backdrop-blur-md animate-pulse">
                  <Bot size={48} className="text-white" />
                </div>
                <div className="absolute -bottom-4 bg-[#1A1A2E] text-[#FAFAF7] text-[10px] uppercase font-bold tracking-widest px-4 py-1.5 rounded shadow">
                  PRO LEVEL STRATEGY
                </div>
              </motion.div>
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
        <div className="mt-12 flex flex-col sm:flex-row items-center justify-between gap-6 opacity-60">
          <span className="text-[11px] font-bold uppercase tracking-wider text-gray-500">CÔNG CỤ SỬ DỤNG CHUYÊN SÂU:</span>
          <div className="flex flex-wrap items-center justify-center gap-6 md:gap-12 text-sm font-mono font-bold text-gray-600">
            {brandLogs.map((log) => (
              <span key={log} className="hover:text-amber-500 transition-colors pointer-events-none">
                {log}
              </span>
            ))}
          </div>
        </div>
      </div>
    </section>
  );
}
