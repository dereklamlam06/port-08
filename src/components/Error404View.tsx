import React from "react";
import { ShieldAlert, ArrowLeft, Home, Sparkles, PhoneCall } from "lucide-react";
import { motion } from "motion/react";
import { AppView } from "../types";

interface Error404ViewProps {
  setCurrentView: (view: AppView) => void;
}

export default function Error404View({ setCurrentView }: Error404ViewProps) {
  return (
    <div className="min-h-[80vh] flex items-center justify-center px-6 py-12 relative overflow-hidden font-sans text-[#1A1A2E]">
      {/* Dynamic ambient lights */}
      <div className="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-80 h-80 bg-[#FFD700]/10 rounded-full blur-[100px] pointer-events-none"></div>
      <div className="absolute top-[20%] right-[10%] w-64 h-64 bg-[#1A1A2E]/5 rounded-full blur-[80px] pointer-events-none"></div>

      <div className="max-w-xl w-full text-center space-y-8 relative z-10">
        
        {/* Shield Icon and Glitch Warning Design */}
        <div className="flex flex-col items-center justify-center space-y-4">
          <motion.div
            initial={{ scale: 0.8, opacity: 0 }}
            animate={{ scale: [0.9, 1.1, 1], opacity: 1 }}
            transition={{ duration: 0.6, ease: "easeOut" }}
            className="w-20 h-20 rounded-full bg-[#1A1A2E] border border-[#FFD700]/40 flex items-center justify-center shadow-lg relative"
          >
            {/* Pulsing ring */}
            <span className="absolute inset-x-0 inset-y-0 rounded-full border border-[#FFD700]/60 animate-ping opacity-40"></span>
            <ShieldAlert size={36} className="text-[#FFD700]" />
          </motion.div>
          
          <motion.div
            initial={{ opacity: 0, y: 10 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ delay: 0.2 }}
            className="space-y-1"
          >
            <span className="font-mono text-xs text-red-500 font-bold tracking-widest uppercase">
              THÔNG BÁO BẢO MẬT (CODE 404)
            </span>
            <h1 className="text-5xl sm:text-6xl font-extrabold tracking-tighter text-[#1A1A2E] leading-none">
              404
            </h1>
          </motion.div>
        </div>

        {/* Narrative & Explanation - Professional & Reassuring */}
        <motion.div
          initial={{ opacity: 0, y: 15 }}
          animate={{ opacity: 1, y: 0 }}
          transition={{ delay: 0.3 }}
          className="bg-white border border-gray-150 p-6 rounded-xl shadow-sm space-y-4"
        >
          <div className="flex items-center gap-2 border-b pb-3 border-gray-100 justify-center">
            <span className="w-2 h-2 rounded-full bg-red-500 animate-pulse"></span>
            <span className="text-[11px] font-bold uppercase tracking-widest text-[#1A1A2E]">
              Hệ thống phòng vệ Derek Lâm
            </span>
          </div>
          
          <p className="text-xs sm:text-sm text-gray-600 leading-relaxed text-left">
            Đường dẫn <code className="bg-gray-100 text-red-650 px-1.5 py-0.5 rounded font-mono text-[11px] sm:text-xs font-semibold">/admin</code> hiện tại không khả dụng công khai hoặc đã được cấu hình chuyển hướng an toàn.
          </p>
          
          <p className="text-xs text-gray-500 leading-relaxed text-left">
            Toàn bộ cơ sở dữ liệu Lead (Khách hàng đăng ký), Dashboard Phân Tích Chuyển Đổi được mã hóa toàn vẹn & bảo mật đa tầng, chỉ cho phép quản trị viên nội bộ kết nối trực tiếp thông qua IP/VPN riêng biệt. Mọi lượt truy cập vãng lai đều bị hệ thống vô hiệu hóa và trả lỗi 404.
          </p>
        </motion.div>

        {/* Dynamic call to actions */}
        <motion.div
          initial={{ opacity: 0 }}
          animate={{ opacity: 1 }}
          transition={{ delay: 0.45 }}
          className="flex flex-col sm:flex-row gap-3 justify-center items-center"
        >
          <button
            onClick={() => {
              setCurrentView("home");
              window.scrollTo({ top: 0, behavior: "smooth" });
            }}
            className="w-full sm:w-auto bg-[#1A1A2E] text-white hover:bg-[#FFD700] hover:text-[#1A1A2E] text-xs font-bold uppercase tracking-wider px-6 py-3.5 rounded-lg transition-all cursor-pointer shadow-sm flex items-center justify-center gap-2"
          >
            <Home size={14} />
            <span>Quay về trang chủ</span>
          </button>

          <button
            onClick={() => {
              setCurrentView("contact");
              window.scrollTo({ top: 0, behavior: "smooth" });
            }}
            className="w-full sm:w-auto border border-gray-300 bg-white hover:bg-gray-55 hover:border-gray-400 text-xs font-bold uppercase tracking-wider px-6 py-3.5 rounded-lg transition-all cursor-pointer flex items-center justify-center gap-2"
          >
            <PhoneCall size={14} className="text-[#FFD700]" />
            <span>Liên hệ tư vấn trực tiếp</span>
          </button>
        </motion.div>

        {/* Specialist verification tag */}
        <div className="text-[10px] font-mono text-gray-400">
          SECURED BY DEREK LAM AI & AUTOMATION AGENT • {new Date().getFullYear()}
        </div>

      </div>
    </div>
  );
}
