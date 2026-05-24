import React, { useState, useEffect } from "react";
import { AppView } from "./types";
import Header from "./components/Header";
import Footer from "./components/Footer";
import Hero from "./components/Hero";
import ServicesView from "./components/ServicesView";
import PortfolioView from "./components/PortfolioView";
import PricingView from "./components/PricingView";
import AboutView from "./components/AboutView";
import ContactView from "./components/ContactView";
import BlogView from "./components/BlogView";
import Chatbot from "./components/Chatbot";
import Error404View from "./components/Error404View";
import { motion, AnimatePresence } from "motion/react";
import { ArrowRight, Star, TrendingUp, Sparkles, MessageCircle } from "lucide-react";

export default function App() {
  const [currentView, setCurrentView] = useState<AppView>("home");

  useEffect(() => {
    // 1. Detect if navigating to administrative routes like domain/admin
    const path = window.location.pathname;
    const isTryingAdmin = path === "/admin" || path.endsWith("/admin") || path.includes("/admin/");
    if (isTryingAdmin) {
      setCurrentView("404");
    }

    // 2. Listen to custom view shifts triggered from other widgets like customizer
    const handleNavigate = (e: any) => {
      if (e.detail) {
        setCurrentView(e.detail);
        window.scrollTo({ top: 0, behavior: "smooth" });
      }
    };
    window.addEventListener("navigate-view", handleNavigate);
    return () => {
      window.removeEventListener("navigate-view", handleNavigate);
    };
  }, []);

  // Renders the specific sub-page matching state selection
  const renderActiveView = () => {
    switch (currentView) {
      case "services":
        return <ServicesView setCurrentView={setCurrentView} />;
      case "portfolio":
        return <PortfolioView setCurrentView={setCurrentView} />;
      case "pricing":
        return <PricingView setCurrentView={setCurrentView} />;
      case "blog":
        return <BlogView setCurrentView={setCurrentView} />;
      case "about":
        return <AboutView setCurrentView={setCurrentView} />;
      case "contact":
        return <ContactView />;
      case "404":
        return <Error404View setCurrentView={setCurrentView} />;
      case "home":
      default:
        return (
          <div className="space-y-6">
            <Hero setCurrentView={setCurrentView} />

            {/* High Conversion Premium Trust Band Section (Reviews & Case Highlights) */}
            <section className="bg-[#1A1A2E] text-white py-16 px-6 md:px-12">
              <div className="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">
                {/* Highlight 1 */}
                <div className="space-y-3.5 border-l-2 border-[#FFD700] pl-5">
                  <div className="flex text-[#FFD700] items-center gap-1">
                    <Star size={13} fill="currentColor" />
                    <Star size={13} fill="currentColor" />
                    <Star size={13} fill="currentColor" />
                    <Star size={13} fill="currentColor" />
                    <Star size={13} fill="currentColor" />
                  </div>
                  <h4 className="text-sm font-bold uppercase tracking-wider text-[#FFD700]">Định Hướng Thực Chiến</h4>
                  <p className="text-xs text-gray-300 leading-relaxed">
                    "Sau 4 tháng triển khai chiến dịch SEO chuyên nghiệp cùng Derek Flow, organic traffic nhãn mỹ phẩm của chúng tôi tăng vượt bậc <strong>+210%</strong>, lọt top 3 danh mục bán chạy nhất thị trường."
                  </p>
                  <span className="text-[10px] text-gray-500 font-bold block">— Giám đốc Marketing, Nhãn hàng Mỹ phẩm Mỹ</span>
                </div>

                {/* Highlight 2 */}
                <div className="space-y-3.5 border-l-2 border-[#FFD700] pl-5">
                  <div className="flex text-[#FFD700] items-center gap-1">
                    <Star size={13} fill="currentColor" />
                    <Star size={13} fill="currentColor" />
                    <Star size={13} fill="currentColor" />
                    <Star size={13} fill="currentColor" />
                    <Star size={13} fill="currentColor" />
                  </div>
                  <h4 className="text-sm font-bold uppercase tracking-wider text-[#FFD700]">Tự Động Hóa Vượt Bậc</h4>
                  <p className="text-xs text-gray-300 leading-relaxed">
                    "Giải pháp tích hợp AI chatbot và tự động hóa Make.com giúp hệ thống kinh doanh bất động sản của chúng tôi đồng bộ lead tự động 100%, tỷ lệ phản hồi đáp ứng giảm từ 30 phút xuống còn <strong>10 giây</strong>."
                  </p>
                  <span className="text-[10px] text-gray-500 font-bold block">— Lê Minh Quốc, CEO TechStart JSC</span>
                </div>

                {/* Highlight 3 */}
                <div className="space-y-3.5 border-l-2 border-[#FFD700] pl-5">
                  <div className="flex text-[#FFD700] items-center gap-1">
                    <Star size={13} fill="currentColor" />
                    <Star size={13} fill="currentColor" />
                    <Star size={13} fill="currentColor" />
                    <Star size={13} fill="currentColor" />
                    <Star size={13} fill="currentColor" />
                  </div>
                  <h4 className="text-sm font-bold uppercase tracking-wider text-[#FFD700]">Website Tải Trang Thần Tốc</h4>
                  <p className="text-xs text-gray-300 leading-relaxed">
                    "Trang đích load trong vòng vỏn vẹn <strong>0.8 giây</strong>, thiết kế tối giản cực sang trọng, tích hợp trơn tru cổng mua bán khiến tỉ lệ chốt đơn (CVR) cải thiện ngay lập tức thêm 15%."
                  </p>
                  <span className="text-[10px] text-gray-500 font-bold block">— Trần Phương Thảo, Founder ScentLux</span>
                </div>
              </div>
            </section>

            {/* Quick Teaser Services Overviews in Homepage */}
            <section className="bg-transparent py-16 px-6 md:px-12 font-sans relative">
              <div className="max-w-7xl mx-auto space-y-12">
                <div className="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                  <div className="space-y-1">
                    <span className="text-[10px] text-[#FFD700] font-bold uppercase tracking-widest block">Dịch vụ thế mạnh</span>
                    <h3 className="text-2xl sm:text-3xl font-extrabold tracking-tight text-[#1A1A2E]">Chương Trình Giải Pháp Tổng Thể</h3>
                  </div>
                  <button
                    onClick={() => {
                      setCurrentView("services");
                      window.scrollTo({ top: 0, behavior: "smooth" });
                    }}
                    className="flex items-center space-x-1.5 text-xs font-bold uppercase tracking-wider text-gray-800 hover:text-[#FFD700] transition-colors cursor-pointer group"
                  >
                    <span>Xem Tất Cả Dịch Vụ</span>
                    <ArrowRight size={14} className="group-hover:translate-x-1 transition-transform" />
                  </button>
                </div>

                <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                  {/* Service Card Mini 1 */}
                  <div className="bg-[#F5F0E8] border border-gray-200 p-6 rounded-lg space-y-3">
                    <div className="w-9 h-9 rounded bg-white flex items-center justify-center text-[#FFD700] border border-gray-100">
                      <TrendingUp size={16} />
                    </div>
                    <h4 className="text-sm font-extrabold uppercase tracking-wide text-[#1A1A2E]">SEO Fullstack</h4>
                    <p className="text-xs text-gray-500 leading-relaxed">
                      Đột phá thứ hạng tự nhiên thông qua Technical Audit, cấu trúc dữ liệu schema, On-page chuẩn chỉ & xây dựng liên kết sạch chuẩn Google.
                    </p>
                  </div>

                  {/* Service Card Mini 2 */}
                  <div className="bg-[#F5F0E8] border border-gray-200 p-6 rounded-lg space-y-3">
                    <div className="w-9 h-9 rounded bg-white flex items-center justify-center text-[#FFD700] border border-gray-100">
                      <Sparkles size={16} />
                    </div>
                    <h4 className="text-sm font-extrabold uppercase tracking-wide text-[#1A1A2E]">Lập Trình Web Luxury</h4>
                    <p className="text-xs text-gray-500 leading-relaxed">
                      Thiết kế kiến tạo website bằng React/Vite mượt mà, tải nhanh tức thì dưới 1s, tương thích 100% di động, cấu bản chuẩn SEO on-page từ lúc code.
                    </p>
                  </div>

                  {/* Service Card Mini 3 */}
                  <div className="bg-[#F5F0E8] border border-gray-200 p-6 rounded-lg space-y-3 col-span-1 sm:col-span-2 lg:col-span-1">
                    <div className="w-9 h-9 rounded bg-white flex items-center justify-center text-[#FFD700] border border-gray-100">
                      <MessageCircle size={16} />
                    </div>
                    <h4 className="text-sm font-extrabold uppercase tracking-wide text-[#1A1A2E]">AI & Automation</h4>
                    <p className="text-xs text-gray-500 leading-relaxed">
                      Kết nối CRM, Google Sheets tự động, lập chatbot AI RAG trả lời tự tin 24/7, giúp tiết kiệm ít nhất 40% chi phí vận hành nghiệp vụ.
                    </p>
                  </div>
                </div>
              </div>
            </section>
          </div>
        );
    }
  };

  return (
    <div id="derek-lam-portfolio-app" className="min-h-screen flex flex-col justify-between bg-[#FAFAF8] overflow-x-hidden font-sans antialiased selection:bg-[#FFD700] selection:text-[#1A1A2E] relative">
      {/* Background aesthetic enhancements filling the wide left/right blank gutters */}
      <div className="hidden xl:block absolute inset-0 pointer-events-none overflow-hidden z-0">
        {/* Amber warm fluid light in the left margin area */}
        <div className="absolute top-[5%] -left-48 w-96 h-[500px] bg-[#FFD700]/6 rounded-full blur-[140px] saturate-150 animate-pulse"></div>
        {/* Navy professional fluid light in the right margin area */}
        <div className="absolute top-[25%] -right-48 w-[450px] h-[600px] bg-[#1A1A2E]/5 rounded-full blur-[160px]"></div>
        {/* Soft balanced ambient light in the left margin area */}
        <div className="absolute top-[55%] -left-36 w-[350px] h-[500px] bg-[#FFD700]/3 rounded-full blur-[120px]"></div>
        {/* Subtle dot matrix grid in the blank gutters for high professional texture */}
        <div className="absolute inset-0 bg-[radial-gradient(#e2e4e7_1.5px,transparent_1.5px)] [background-size:32px_32px] opacity-60"></div>
      </div>

      {/* Dynamic Header */}
      <Header currentView={currentView} setCurrentView={setCurrentView} />

      {/* Main app routing container with animation wrapper */}
      <main className="flex-1 pt-20 relative z-10">
        <AnimatePresence mode="wait">
          <motion.div
            key={currentView}
            initial={{ opacity: 0, y: 15 }}
            animate={{ opacity: 1, y: 0 }}
            exit={{ opacity: 0, y: -15 }}
            transition={{ duration: 0.25, ease: "easeOut" }}
          >
            {renderActiveView()}
          </motion.div>
        </AnimatePresence>
      </main>

      {/* Floating Dynamic Chatbot AI Support */}
      <Chatbot />

      {/* Global Footer */}
      <Footer setCurrentView={setCurrentView} />
    </div>
  );
}
