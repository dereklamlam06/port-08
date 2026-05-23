import React, { useState } from "react";
import { AppView } from "../types";
import { Menu, X } from "lucide-react";

interface HeaderProps {
  currentView: AppView;
  setCurrentView: (view: AppView) => void;
}

export default function Header({ currentView, setCurrentView }: HeaderProps) {
  const [mobileMenuOpen, setMobileMenuOpen] = useState(false);

  const navItems: { label: string; view: AppView }[] = [
    { label: "Dịch Vụ", view: "services" },
    { label: "Giới Thiệu", view: "about" },
    { label: "Case Study", view: "portfolio" },
    { label: "Giá", view: "pricing" },
    { label: "Blog", view: "blog" },
    { label: "Liên Hệ", view: "contact" }
  ];

  const handleNavClick = (view: AppView) => {
    setCurrentView(view);
    setMobileMenuOpen(false);
    window.scrollTo({ top: 0, behavior: "smooth" });
  };

  return (
    <header className="fixed top-0 left-0 right-0 z-50 bg-[#FAFAF8]/95 backdrop-blur-md border-b border-[#E5E7EB] font-sans shadow-sm">
      <div className="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">
        {/* Brand Logo */}
        <div 
          onClick={() => handleNavClick("home")} 
          className="text-xl font-bold tracking-tight text-[#1A1A2E] cursor-pointer hover:opacity-80 transition-opacity flex items-center space-x-2"
        >
          <span className="font-extrabold uppercase tracking-widest text-[#1A1A2E]">Derek L_m</span>
          <span className="w-1.5 h-1.5 bg-[#FFD700] rounded-full"></span>
        </div>

        {/* Desktop Navigation */}
        <nav className="hidden md:flex items-center space-x-8">
          {navItems.map((item) => {
            const isActive = currentView === item.view;
            return (
              <button
                key={item.view}
                onClick={() => handleNavClick(item.view)}
                className={`text-[13px] font-medium tracking-wider uppercase transition-colors cursor-pointer relative py-2 ${
                  isActive ? "text-[#1A1A2E] font-bold" : "text-gray-500 hover:text-[#1A1A2E]"
                }`}
              >
                {item.label}
                {isActive && (
                  <span className="absolute bottom-0 left-0 right-0 h-[2px] bg-[#FFD700]" />
                )}
              </button>
            );
          })}
        </nav>

        {/* Desktop Action Controls */}
        <div className="hidden lg:flex items-center space-x-3">
          <button 
            onClick={() => handleNavClick("contact")} 
            className="bg-[#1A1A2E] hover:bg-[#FFD700] hover:text-[#1A1A2E] text-white text-[12px] font-bold uppercase tracking-wider px-5 py-2.5 rounded transition-all cursor-pointer shadow-sm"
          >
            Đăng Ký Tư Vấn
          </button>
        </div>

        {/* Mobile Hamburger Button */}
        <div className="md:hidden flex items-center space-x-3">
          <button
            onClick={() => setMobileMenuOpen(!mobileMenuOpen)}
            className="p-2 text-gray-700 hover:text-[#1A1A2E] focus:outline-none cursor-pointer"
          >
            {mobileMenuOpen ? <X size={24} /> : <Menu size={24} />}
          </button>
        </div>
      </div>

      {/* Mobile Menu Dropdown */}
      {mobileMenuOpen && (
        <div className="md:hidden bg-[#FAFAF8] border-b border-[#E5E7EB] px-6 py-4 space-y-4">
          <div className="flex flex-col space-y-3">
            {navItems.map((item) => (
              <button
                key={item.view}
                onClick={() => handleNavClick(item.view)}
                className={`text-left text-sm font-semibold uppercase tracking-wider py-2 ${
                  currentView === item.view ? "text-[#FFD700]" : "text-gray-600"
                }`}
              >
                {item.label}
              </button>
            ))}
          </div>

          <div className="pt-4 border-t border-gray-200 flex flex-col gap-2">
            <button 
              onClick={() => handleNavClick("contact")}
              className="w-full flex items-center justify-center bg-[#1A1A2E] hover:bg-[#FFD700] hover:text-[#1A1A2E] py-2.5 rounded text-xs font-bold uppercase tracking-wider text-white shadow"
            >
              Đăng Ký Tư Vấn
            </button>
          </div>
        </div>
      )}
    </header>
  );
}
