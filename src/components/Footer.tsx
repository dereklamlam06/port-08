import React, { useState } from "react";
import { AppView } from "../types";
import { Mail, MapPin, Send, Zap, Check } from "lucide-react";
import LogoIcon from "./LogoIcon";

interface FooterProps {
  setCurrentView: (view: AppView) => void;
}

export default function Footer({ setCurrentView }: FooterProps) {
  const [emailInput, setEmailInput] = useState("");
  const [isSubscribed, setIsSubscribed] = useState(false);
  const [errorText, setErrorText] = useState("");

  const handleSubscribe = async (e: React.FormEvent) => {
    e.preventDefault();
    if (!emailInput.trim()) return;

    try {
      const res = await fetch("/api/leads", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({
          name: "Khách Đăng Ký Bản Tin",
          email: emailInput,
          phone: "Không cung cấp",
          service: "Đăng Ký Bản Tin (Newsletter)",
          message: "Khách hàng muốn đăng ký nhận các bản tin bứt phá thứ hạng SEO & Tự động hóa tự động định kỳ."
        })
      });

      if (res.ok) {
        setIsSubscribed(true);
        setEmailInput("");
        setErrorText("");
        setTimeout(() => setIsSubscribed(false), 5000);
      } else {
        setErrorText("Không thể đăng ký. Vui lòng kiểm tra lại địa chỉ email.");
      }
    } catch {
      setErrorText("Lỗi máy chủ. Vui lòng thử lại sau.");
    }
  };

  const handleQuickLink = (view: AppView) => {
    setCurrentView(view);
    window.scrollTo({ top: 0, behavior: "smooth" });
  };

  return (
    <footer className="bg-[#1A1A2E] text-[#E2E3E0] pt-16 pb-12 px-6 border-t border-gray-800 font-sans">
      <div className="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-12">
        {/* Profile / Summary */}
        <div className="md:col-span-1.5 space-y-4">
          <div className="flex items-center">
            <LogoIcon width={120} height={48} />
          </div>
          <p className="text-xs text-gray-400 leading-relaxed max-w-sm">
            Cung cấp giải pháp tối ưu SEO & Công nghệ AI Automation cao cấp hướng đến sự bứt phá bền vững và hiệu suất vận hành vượt trội cho doanh nghiệp của bạn.
          </p>
          <div className="flex items-center space-x-2 text-xs text-gray-400 mt-2">
            <Zap size={14} className="text-[#FFD700]" />
            <span>Tối ưu hóa bởi công nghệ AI & Standard SEO</span>
          </div>
        </div>

        {/* Quick Links */}
        <div className="space-y-4">
          <h4 className="text-[12px] uppercase font-bold tracking-widest text-white border-l-2 border-[#FFD700] pl-2">Khám Phá Luồng</h4>
          <ul className="space-y-2 mt-2">
            <li>
              <button onClick={() => handleQuickLink("home")} className="text-xs text-gray-400 hover:text-white transition-colors cursor-pointer">
                Trang Chủ (Xem Tổng Thể)
              </button>
            </li>
            <li>
              <button onClick={() => handleQuickLink("services")} className="text-xs text-gray-400 hover:text-white transition-colors cursor-pointer">
                Dịch Vụ SEO & AI
              </button>
            </li>
            <li>
              <button onClick={() => handleQuickLink("portfolio")} className="text-xs text-gray-400 hover:text-white transition-colors cursor-pointer">
                Kết Quả Thực Tế (Portfolio)
              </button>
            </li>
            <li>
              <button onClick={() => handleQuickLink("pricing")} className="text-xs text-gray-400 hover:text-white transition-colors cursor-pointer">
                Bảng Giá Gói Dịch Vụ
              </button>
            </li>
            <li>
              <button onClick={() => handleQuickLink("blog")} className="text-xs text-gray-400 hover:text-white transition-colors cursor-pointer">
                Blog Kiến Thức SEO & AI
              </button>
            </li>
            <li>
              <button onClick={() => handleQuickLink("about")} className="text-xs text-gray-400 hover:text-white transition-colors cursor-pointer">
                Về Derek Flow Specialist
              </button>
            </li>
          </ul>
        </div>

        {/* Contact Coordinates */}
        <div className="space-y-4">
          <h4 className="text-[12px] uppercase font-bold tracking-widest text-white border-l-2 border-[#FFD700] pl-2">Thông Tin Trụ Sở</h4>
          <div className="space-y-3 pt-2">
            <div className="flex items-start space-x-2.5 text-xs text-gray-400">
              <MapPin size={14} className="text-[#FFD700] shrink-0 mt-0.5" />
              <span>Quận 1, TP. Hồ Chí Minh, Việt Nam</span>
            </div>
            <div className="flex items-start space-x-2.5 text-xs text-gray-400">
              <Mail size={14} className="text-[#FFD700] shrink-0 mt-0.5" />
              <span className="font-mono">contact@derektopeak.com</span>
            </div>
            <div className="text-[11px] text-gray-400 leading-relaxed border-t border-gray-800 pt-2.5">
              Thời gian phản hồi thông thường trong <strong>24h làm việc</strong>. (Thứ 2 - Thứ 7: 8h - 18h).
            </div>
          </div>
        </div>

        {/* Newsletter Signup */}
        <div className="space-y-4">
          <h4 className="text-[12px] uppercase font-bold tracking-widest text-white border-l-2 border-[#FFD700] pl-2">Đăng Ký Bản Tin</h4>
          <p className="text-xs text-gray-400 leading-relaxed pt-1">
            Đăng ký nhận hướng dẫn SEO miễn phí, phân tích case-study tăng trưởng 200%+ và mẹo tự động hóa AI.
          </p>
          <form onSubmit={handleSubscribe} className="flex space-x-2 pt-2">
            <input
              type="email"
              required
              value={emailInput}
              onChange={(e) => setEmailInput(e.target.value)}
              placeholder="Email của bạn..."
              className="bg-gray-900 border border-gray-700 focus:border-[#FFD700] rounded px-3 py-2 text-xs flex-1 text-white placeholder-gray-500 focus:outline-none focus:ring-0"
              disabled={isSubscribed}
            />
            <button
              type="submit"
              disabled={isSubscribed}
              className={`w-10 h-10 flex items-center justify-center rounded text-white transition-all cursor-pointer ${
                isSubscribed ? "bg-green-600" : "bg-[#FFD700] hover:bg-[#E6C200]"
              }`}
            >
              {isSubscribed ? <Check size={16} /> : <Send size={14} className="text-[#1A1A2E]" />}
            </button>
          </form>
          {errorText && <p className="text-xs text-red-400 mt-1">{errorText}</p>}
          {isSubscribed && <p className="text-xs text-green-400 mt-1 animate-pulse">Cảm ơn bạn! Hệ thống đã ghi nhận email.</p>}
        </div>
      </div>

      <div className="max-w-7xl mx-auto border-t border-gray-800 mt-12 pt-6 flex flex-col md:flex-row items-center justify-between text-xs text-gray-500">
        <p>© 2026 Derek Flow. All rights reserved. Designed for Premium Performance.</p>
        <div className="flex space-x-6 mt-3 md:mt-0">
          <a href="#privacy" className="hover:text-white transition-colors">Chính Sách Bảo Mật</a>
          <a href="#terms" className="hover:text-white transition-colors">Điều Khoản Dịch Vụ</a>
        </div>
      </div>
    </footer>
  );
}
