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
import TechnicalSpecs from "./components/TechnicalSpecs";
import { motion, AnimatePresence } from "motion/react";
import { ArrowRight, Star, TrendingUp, Sparkles, MessageCircle, Palette, X } from "lucide-react";

const BG_THEMES = [
  {
    id: "oolong-milk",
    name: "Trà Ô Long Trầm",
    desc: "Màu trà sữa ấm trầm, dịu hòa tuyệt đối cho mắt khi đọc bài viết và code",
    bg: "#E8E4D9",
    card: "#F4F1E6",
    border: "#CEBFAC",
    swatch: "#E8E4D9",
    dark: false
  },
  {
    id: "dim-matcha",
    name: "Thạch Vy Slate",
    desc: "Màu xám đá đen mờ huyền bí, tôn phong thái lịch lãm và tối giản",
    bg: "#1C1D1F",
    card: "#242629",
    border: "#33373D",
    swatch: "#1C1D1F",
    dark: true
  },
  {
    id: "jasmine-pale",
    name: "Thanh Trà Nhài",
    desc: "Màu nhài nhạt pha ánh rêu trầm lắng đọng tâm tư, rũ bỏ mệt mỏi",
    bg: "#E2E5DF",
    card: "#EDF0EA",
    border: "#C9CEBF",
    swatch: "#E2E5DF",
    dark: false
  },
  {
    id: "night-comfort",
    name: "Hải Quân Thẫm",
    desc: "Bóng tối đại dương huyền bí, mang lại chiều sâu tập trung tối đa",
    bg: "#0E131F",
    card: "#161E30",
    border: "#232F4A",
    swatch: "#0E131F",
    dark: true
  },
  {
    id: "eink-reader",
    name: "Quặng Đá Obsidian",
    desc: "Tone đen Obsidian tinh giản thẳm sâu, triệt tiêu mỏi mắt ban đêm",
    bg: "#0B0C0E",
    card: "#121417",
    border: "#1D2025",
    swatch: "#0B0C0E",
    dark: true
  }
];

export default function App() {
  const [currentView, setCurrentView] = useState<AppView>("home");
  const [activeThemeId, setActiveThemeId] = useState<string>(() => {
    return localStorage.getItem("derek-bg-theme") || "oolong-milk";
  });
  const [paletteOpen, setPaletteOpen] = useState(false);

  const activeTheme = BG_THEMES.find(t => t.id === activeThemeId) || BG_THEMES[0];

  const handleThemeChange = (id: string) => {
    setActiveThemeId(id);
    localStorage.setItem("derek-bg-theme", id);
    window.dispatchEvent(new CustomEvent("derek-theme-changed", { detail: id }));
  };

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

            {/* Highly Authentic Technical Standards Standard Section instead of fake reviews */}
            <div className="max-w-7xl mx-auto px-6 md:px-12">
              <TechnicalSpecs />
            </div>

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
                    <h4 className="text-sm font-extrabold uppercase tracking-wide text-[#1A1A2E]">Thiết Kế Web WordPress</h4>
                    <p className="text-xs text-gray-500 leading-relaxed">
                      Thiết kế và xây dựng giao diện website tối giản qua Custom Theme hoặc Elementor chuẩn chỉ, tối ưu tài nguyên, thân thiện di động và sẵn sàng chuẩn SEO on-page.
                    </p>
                  </div>

                  {/* Service Card Mini 3 */}
                  <div className="bg-[#F5F0E8] border border-gray-200 p-6 rounded-lg space-y-3 col-span-1 sm:col-span-2 lg:col-span-1">
                    <div className="w-9 h-9 rounded bg-white flex items-center justify-center text-[#FFD700] border border-gray-100">
                      <MessageCircle size={16} />
                    </div>
                    <h4 className="text-sm font-extrabold uppercase tracking-wide text-[#1A1A2E]">Tối Ưu Tốc Độ & CRO</h4>
                    <p className="text-xs text-gray-500 leading-relaxed">
                      Phân tích bản đồ nhiệt, tinh giản mã nguồn và sửa đổi trải nghiệm người dùng giúp giữ chân khách hàng và đột phá tỷ lệ mua hàng tự nhiên.
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
    <div id="derek-lam-portfolio-app" className="min-h-screen flex flex-col justify-between overflow-x-hidden font-sans antialiased selection:bg-[#FFD700] selection:text-[#1A1A2E] relative transition-colors duration-300" style={{ backgroundColor: activeTheme.bg }}>
      {/* Dynamic Background Customizer Style Sheet */}
      <style>{`
        :root {
          --app-bg-custom: ${activeTheme.bg};
          --app-card-custom: ${activeTheme.card};
          --app-border-custom: ${activeTheme.border};
          --app-text-custom: ${activeTheme.dark ? "#FFFFFF" : "#111424"};
          --app-text-muted: ${activeTheme.dark ? "#F1F5F9" : "#2E3B4E"};
          --app-text-lighter: ${activeTheme.dark ? "#E2E8F0" : "#4B5563"};
          --app-accent-custom: ${activeTheme.dark ? "#FFD700" : "#AA7500"}; /* High contrast rich ochre gold on light, bright gold on dark */
          --app-gold-card-bg-start: ${activeTheme.dark ? "#262520" : "#FAFAF7"};
          --app-gold-card-bg-end: ${activeTheme.dark ? "#1B1915" : "#F5F0E8"};
          --app-gold-card-text: ${activeTheme.dark ? "#F1F5F9" : "#111424"};
          --app-gold-card-text-muted: ${activeTheme.dark ? "#CBD5E1" : "#4B5563"};
        }
        
        /* Forces override for any component using the hardcoded beige background */
        body,
        #derek-lam-portfolio-app,
        section.bg-\\[\\#F4EFE6\\],
        div.bg-\\[\\#F4EFE6\\],
        .bg-\\[\\#F4EFE6\\] {
          background-color: ${activeTheme.bg} !important;
        }

        /* Highly readable custom styled gold highlighted premium cards */
        .derek-gold-card {
          background-image: linear-gradient(to top right, var(--app-gold-card-bg-start), var(--app-gold-card-bg-end)) !important;
          border-color: #FFD700 !important;
        }

        .derek-gold-card h1, .derek-gold-card h2, .derek-gold-card h3, .derek-gold-card h4, .derek-gold-card h5, .derek-gold-card h6,
        .derek-gold-card p, .derek-gold-card li, .derek-gold-card span, .derek-gold-card strong {
          color: var(--app-gold-card-text) !important;
        }

        .derek-gold-card .text-gray-400, .derek-gold-card .text-gray-500, .derek-gold-card .text-slate-500, .derek-gold-card .text-slate-400 {
          color: var(--app-gold-card-text-muted) !important;
        }

        /* Override specific hardcoded charcoal text colors so they adjust dynamically */
        .text-\\[\\#1A1A2E\\],
        h1, h2, h3, h4, h5, h6,
        li, strong {
          color: var(--app-text-custom) !important;
        }

        /* Override specific gold accented text blocks and stars for premium high contrast visibility */
        .text-\\[\\#FFD700\\] {
          color: var(--app-accent-custom) !important;
        }

        /* Ensure icon colors match the adaptive high contrast accent color too */
        svg.text-\\[\\#FFD700\\] {
          stroke: var(--app-accent-custom) !important;
        }

        /* Prevent golden star characters from looking faint or washed out on light layers */
        span.text-goldAccent, .text-amber-500, .text-yellow-500 {
          color: var(--app-accent-custom) !important;
        }

        /* Override standard text-gray classes for superior thematic readability based on contrast */
        .text-gray-600, .text-slate-600 {
          color: var(--app-text-muted) !important;
        }

        .text-gray-500, .text-slate-500 {
          color: var(--app-text-lighter) !important;
        }

        .text-gray-400, .text-slate-400 {
          color: ${activeTheme.dark ? "#CBD5E1" : "#5A6E85"} !important;
        }

        /* Scope context-aware variables inside naturally dark containers to keep text crisp and highly contrasty */
        .bg-\\[\\#1A1A2E\\],
        .bg-gray-950,
        .bg-black,
        .text-white,
        footer {
          --app-text-custom: #F8FAFC !important;
          --app-text-muted: #CBD5E1 !important;
          --app-text-lighter: #94A3B8 !important;
          --app-accent-custom: #FFD700 !important;
        }

        /* Enforce readable light colors for elements nested inside naturally dark containers and footers */
        .bg-\\[\\#1A1A2E\\] h1, .bg-\\[\\#1A1A2E\\] h2, .bg-\\[\\#1A1A2E\\] h3, .bg-\\[\\#1A1A2E\\] h4, .bg-\\[\\#1A1A2E\\] h5, .bg-\\[\\#1A1A2E\\] h6,
        .bg-\\[\\#1A1A2E\\] p, .bg-\\[\\#1A1A2E\\] li, .bg-\\[\\#1A1A2E\\] strong, .bg-\\[\\#1A1A2E\\] a,
        .bg-gray-950 h1, .bg-gray-950 h2, .bg-gray-950 h3, .bg-gray-950 h4, .bg-gray-950 h5, .bg-gray-950 h6, .bg-gray-950 p, .bg-gray-950 li,
        footer, footer h1, footer h2, footer h3, footer h4, footer h5, footer h6, footer p, footer li, footer a, footer strong {
          color: var(--app-text-custom) !important;
        }

        /* Standard gray subtexts inside dark layers */
        .bg-\\[\\#1A1A2E\\] .text-gray-300, .bg-\\[\\#1A1A2E\\] .text-gray-400, 
        .bg-gray-950 .text-gray-400,
        footer .text-gray-400, footer .text-slate-400 {
          color: var(--app-text-muted) !important;
        }

        /* Bright gold highlights inside CTA and footer should keep beautiful vibrant neon yellow-gold */
        .bg-\\[\\#1A1A2E\\] .text-\\[\\#FFD700\\], .bg-\\[\\#1A1A2E\\] svg.text-\\[\\#FFD700\\],
        footer .text-\\[\\#FFD700\\], footer svg.text-\\[\\#FFD700\\] {
          color: #FFD700 !important;
          stroke: #FFD700 !important;
        }

        /* Buttons with background gold (styled as bg-[#FFD700]) MUST force deep dark charcoal text for high contrast */
        .bg-\\[\\#FFD700\\],
        .bg-yellow-400,
        .bg-amber-400 {
          --app-text-custom: #111424 !important;
          --app-text-muted: #2E3B4E !important;
          --app-text-lighter: #4B5563 !important;
        }

        .bg-\\[\\#FFD700\\] h1, .bg-\\[\\#FFD700\\] h2, .bg-\\[\\#FFD700\\] h3, .bg-\\[\\#FFD700\\] h4, .bg-\\[\\#FFD700\\] p,
        .bg-\\[\\#FFD700\\] span, .bg-\\[\\#FFD700\\] button, .bg-\\[\\#FFD700\\] a,
        .bg-yellow-400 button, .bg-yellow-400 span {
          color: #111424 !important;
        }

        /* Forces override for any header component or translucent panels */
        header.bg-\\[\\#F4EFE6\\],
        header.bg-\\[\\#F4EFE6\\]\\/95,
        .bg-\\[\\#F4EFE6\\]\\/95 {
          background-color: ${activeTheme.bg}f2 !important;
        }

        .md\\:bg-\\[\\#F4EFE6\\]\\/95 {
          background-color: ${activeTheme.bg}f2 !important;
        }

        .md\\:bg-\\[\\#F4EFE6\\] {
          background-color: ${activeTheme.bg} !important;
        }

        /* Forces override for any card elements with hardcoded light cream */
        .bg-white,
        .bg-\\[\\#FDFBF7\\],
        div.bg-\\[\\#FDFBF7\\],
        aside.bg-\\[\\#FDFBF7\\],
        section.bg-\\[\\#FDFBF7\\],
        .bg-\\[\\#F5F0E8\\],
        div.bg-\\[\\#F5F0E8\\],
        .bg-gray-50,
        header.bg-white {
          background-color: ${activeTheme.card} !important;
          border-color: ${activeTheme.border} !important;
        }

        /* Ensure borders match thematic borders cleanly instead of feeling disjointed */
        .border-gray-200, .border-gray-150, .border-gray-100 {
          border-color: ${activeTheme.border} !important;
        }

        .border-\\[\\#1A1A2E\\] {
          border-color: var(--app-text-custom) !important;
        }

        /* Smooth animated transitions for all background style switching */
        div, section, header, main, aside, button, article, p, h1, h2, h3, h4, h5, h6, span, svg {
          transition: background-color 300ms ease-out, border-color 300ms ease-out, color 300ms ease-out, stroke 300ms ease-out !important;
        }
      `}</style>

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

      {/* Floating Dynamic Background Color Customizer Selector */}
      <div className="fixed bottom-6 left-6 z-50 md:bottom-8 md:left-8 font-sans">
        <AnimatePresence>
          {paletteOpen && (
            <motion.div
              initial={{ opacity: 0, scale: 0.9, y: 10 }}
              animate={{ opacity: 1, scale: 1, y: 0 }}
              exit={{ opacity: 0, scale: 0.9, y: 10 }}
              transition={{ duration: 0.2 }}
              className="border rounded-xl shadow-2xl p-5 mb-4 w-[280px] space-y-4"
              style={{ backgroundColor: activeTheme.card, borderColor: activeTheme.border }}
            >
              <div className="flex items-center justify-between border-b pb-2.5" style={{ borderColor: activeTheme.border }}>
                <div className="flex items-center gap-2">
                  <Palette size={16} className="text-[#FFD700]" />
                  <span className="text-xs font-bold uppercase tracking-wider text-[#1A1A2E]">Tông Màu Giao Diện</span>
                </div>
                <button
                  onClick={() => setPaletteOpen(false)}
                  className="p-1 hover:bg-black/5 rounded text-gray-400 hover:text-gray-600 transition-colors cursor-pointer"
                >
                  <X size={15} />
                </button>
              </div>

              {/* Theme buttons list */}
              <div className="space-y-2">
                {BG_THEMES.map((t) => {
                  const isSelected = t.id === activeThemeId;
                  return (
                    <button
                      key={t.id}
                      onClick={() => handleThemeChange(t.id)}
                      className={`w-full text-left p-2.5 rounded-lg border transition-all flex items-center justify-between cursor-pointer group ${
                        isSelected 
                          ? "shadow-sm" 
                          : "hover:border-[#FFD700]/60"
                      }`}
                      style={{ 
                        backgroundColor: isSelected ? t.card : "transparent",
                        borderColor: isSelected ? "#FFD700" : activeTheme.border 
                      }}
                    >
                      <div className="flex items-center gap-2.5">
                        <span 
                          className="w-5 h-5 rounded-full border border-gray-300 block shrink-0 shadow-sm" 
                          style={{ backgroundColor: t.swatch }}
                        />
                        <div className="min-w-0">
                          <p className="text-xs font-bold text-[#1A1A2E] leading-none">{t.name}</p>
                          <p className="text-[10px] text-gray-400 mt-0.5 truncate">{t.desc}</p>
                        </div>
                      </div>
                      {isSelected && (
                        <span className="text-[#FFD700] text-[9px] font-extrabold uppercase tracking-wider font-mono">Đang Chọn</span>
                      )}
                    </button>
                  );
                })}
              </div>

              <p className="text-[10px] text-gray-400 text-center leading-normal">
                Thay đổi bộ tone màu nền sẽ tự động áp dụng đồng bộ toàn bộ thành phần giao diện.
              </p>
            </motion.div>
          )}
        </AnimatePresence>

        {/* Floating Customizer Trigger Action Button */}
        <button
          onClick={() => setPaletteOpen(!paletteOpen)}
          className="flex items-center justify-center w-12 h-12 bg-[#1A1A2E] hover:bg-[#FFD700] text-white hover:text-[#1A1A2E] rounded-full shadow-lg transition-all transform hover:scale-105 cursor-pointer relative group"
        >
          {paletteOpen ? <X size={20} /> : <Palette size={20} />}
          
          <span className="hidden md:block absolute left-14 bg-[#1A1A2E] text-white text-[10px] font-extrabold uppercase tracking-widest px-3 py-1.5 rounded shadow opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap pointer-events-none">
            Thay Đổi Tông Màu Nền
          </span>
        </button>
      </div>

      {/* Floating Dynamic Chatbot AI Support */}
      <Chatbot />

      {/* Global Footer */}
      <Footer setCurrentView={setCurrentView} />
    </div>
  );
}
