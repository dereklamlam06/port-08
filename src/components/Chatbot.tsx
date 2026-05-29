import React, { useState, useRef, useEffect } from "react";
import { MessageSquare, X, Send, Bot, Sparkles, Phone } from "lucide-react";
import { motion, AnimatePresence } from "motion/react";
import { ChatMessage } from "../types";

export default function Chatbot() {
  const [isOpen, setIsOpen] = useState(false);
  const [isMobile, setIsMobile] = useState(false);
  const [messages, setMessages] = useState<ChatMessage[]>([
    {
      id: "welcome",
      sender: "bot",
      text: "Xin chào! Tôi là Trợ lý AI tự động của Derek Flow. Tôi có thể hỗ trợ giải đáp nhanh mọi thắc mắc của bạn về tối ưu hóa SEO chuyên sâu, thiết kế website chuẩn SEO và các hạng mục kỹ thuật liên quan. Bạn cần tôi hỗ trợ thông tin gì hôm nay?",
      timestamp: new Date().toLocaleTimeString("vi-VN", { hour: "2-digit", minute: "2-digit" })
    }
  ]);
  const [inputText, setInputText] = useState("");
  const [isLoading, setIsLoading] = useState(false);
  const messagesEndRef = useRef<HTMLDivElement>(null);

  const suggestionChips = [
    "Khám phá các gói dịch vụ SEO",
    "Báo giá Thiết kế Website",
    "Tự động hóa AI N8N/Zapier",
    "Quy trình làm việc 4 bước"
  ];

  // Auto-scroll messages
  useEffect(() => {
    if (messagesEndRef.current) {
      messagesEndRef.current.scrollIntoView({ behavior: "smooth" });
    }
  }, [messages, isLoading]);

  // Track window width for mobile checks
  useEffect(() => {
    const handleResize = () => {
      setIsMobile(window.innerWidth < 640);
    };
    handleResize();
    window.addEventListener("resize", handleResize);
    return () => window.removeEventListener("resize", handleResize);
  }, []);

  const handleSendMessage = async (textToSend: string) => {
    if (!textToSend.trim() || isLoading) return;

    const userMsg: ChatMessage = {
      id: "user_" + Date.now(),
      sender: "user",
      text: textToSend,
      timestamp: new Date().toLocaleTimeString("vi-VN", { hour: "2-digit", minute: "2-digit" })
    };

    setMessages(prev => [...prev, userMsg]);
    setInputText("");
    setIsLoading(true);

    try {
      const response = await fetch("/api/chat", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ message: textToSend })
      });

      const data = await response.json();
      
      const botMsg: ChatMessage = {
        id: "bot_" + Date.now(),
        sender: "bot",
        text: data.response || "Rất tiếc, đã xảy ra lỗi kết nối. Vui lòng thử lại hoặc gọi điện hotline Zalo nhé!",
        timestamp: new Date().toLocaleTimeString("vi-VN", { hour: "2-digit", minute: "2-digit" })
      };

      setMessages(prev => [...prev, botMsg]);
    } catch (error) {
      console.error("Chat error:", error);
      const errMsg: ChatMessage = {
        id: "error_" + Date.now(),
        sender: "bot",
        text: "Hiện tại kết nối mạng đang gián đoạn. Đừng lo lắng! Gói dịch vụ SEO Starter có giá 15tr, SEO Pro có giá 35tr/tháng. Hãy nhấn biểu mẫu Liên hệ hoặc gọi điện cho Derek Flow nhé!",
        timestamp: new Date().toLocaleTimeString("vi-VN", { hour: "2-digit", minute: "2-digit" })
      };
      setMessages(prev => [...prev, errMsg]);
    } finally {
      setIsLoading(false);
    }
  };

  const handleKeyPress = (e: React.KeyboardEvent) => {
    if (e.key === "Enter") {
      handleSendMessage(inputText);
    }
  };

  const showExtraButtons = !isOpen || !isMobile;

  return (
    <div className="font-sans">
      {/* Chatbot Window Panel */}
      <AnimatePresence>
        {isOpen && (
          <motion.div
            initial={{ opacity: 0, y: 30, scale: 0.95 }}
            animate={{ opacity: 1, y: 0, scale: 1 }}
            exit={{ opacity: 0, y: 30, scale: 0.95 }}
            transition={{ duration: 0.2 }}
            // For mobile, place it a bit higher to not overlay on top of mobile chatbot button
            // For desktop, position it left to the vertical float bar (right-24)
            className="fixed bottom-24 right-4 left-4 sm:left-auto sm:bottom-6 sm:right-24 z-50 w-[calc(100%-32px)] sm:w-[400px] h-[calc(100vh-140px)] max-h-[540px] sm:h-[520px] bg-[#FAFAF7] border border-[#E5E7EB] rounded-lg shadow-2xl flex flex-col overflow-hidden"
          >
            {/* Header */}
            <div className="bg-[#1A1A2E] text-white px-4 py-3.5 flex items-center justify-between border-b border-[#E5E7EB]">
              <div className="flex items-center space-x-2.5">
                <div className="w-8 h-8 rounded-full bg-[#FFD700] flex items-center justify-center text-[#1A1A2E]">
                  <Bot size={18} />
                </div>
                <div>
                  <h3 className="text-sm font-semibold tracking-wide">Derek Flow Assistant</h3>
                  <div className="flex items-center space-x-1">
                    <span className="w-1.5 h-1.5 bg-green-500 rounded-full animate-pulse"></span>
                    <span className="text-[11px] text-gray-300">Tư vấn tự động phản hồi ngay</span>
                  </div>
                </div>
              </div>
              <button
                onClick={() => setIsOpen(false)}
                className="text-gray-300 hover:text-white transition-colors p-1 hover:bg-white/10 rounded"
              >
                <X size={18} />
              </button>
            </div>

            {/* Conversation Messages */}
            <div className="flex-1 overflow-y-auto p-4 space-y-3 scrollbar-thin scrollbar-thumb-gray-200">
              {messages.map((msg) => (
                <div
                  key={msg.id}
                  className={`flex ${msg.sender === "user" ? "justify-end" : "justify-start"}`}
                >
                  <div className={`flex items-start gap-2 max-w-[85%] ${msg.sender === "user" ? "flex-row-reverse" : "flex-row"}`}>
                    {msg.sender === "bot" && (
                      <div className="w-6 h-6 rounded-full bg-[#1A1A2E] flex items-center justify-center text-white mt-1 shrink-0">
                        <Sparkles size={11} className="text-[#FFD700]" />
                      </div>
                    )}
                    <div>
                      <div
                        className={`text-[13px] px-3.5 py-2.5 rounded-lg leading-relaxed ${
                          msg.sender === "user"
                            ? "bg-[#1A1A2E] text-white rounded-br-none"
                            : "bg-[#F5F0E8] text-[#1A1A2E] border border-[#E5E7EB] rounded-bl-none"
                        }`}
                        style={{ whiteSpace: "pre-line" }}
                      >
                        {msg.text}
                      </div>
                      <span className="text-[10px] text-gray-400 mt-1 block px-1">
                        {msg.timestamp}
                      </span>
                    </div>
                  </div>
                </div>
              ))}

              {isLoading && (
                <div className="flex justify-start">
                  <div className="flex items-start gap-2 max-w-[85%]">
                    <div className="w-6 h-6 rounded-full bg-[#1A1A2E] flex items-center justify-center text-white mt-1">
                      <Sparkles size={11} className="text-[#FFD700]" />
                    </div>
                    <div className="bg-[#F5F0E8] border border-[#E5E7EB] px-3 py-2 rounded-lg rounded-bl-none flex items-center space-x-1">
                      <span className="w-1.5 h-1.5 bg-gray-500 rounded-full animate-bounce"></span>
                      <span className="w-1.5 h-1.5 bg-gray-500 rounded-full animate-bounce" style={{ animationDelay: "0.2s" }}></span>
                      <span className="w-1.5 h-1.5 bg-gray-500 rounded-full animate-bounce" style={{ animationDelay: "0.4s" }}></span>
                    </div>
                  </div>
                </div>
              )}
              <div ref={messagesEndRef} />
            </div>

            {/* Suggestions */}
            <div className="px-4 py-2 bg-[#FAFAF7] border-t border-[#E5E7EB] flex flex-wrap gap-1.5">
              {suggestionChips.map((chip, idx) => (
                <button
                  key={idx}
                  onClick={() => handleSendMessage(chip)}
                  className="text-[11px] text-[#1A1A2E] bg-white border border-[#E5E7EB] px-2.5 py-1 rounded-full hover:border-[#FFD700] hover:bg-[#F5F0E8] transition-all cursor-pointer font-medium"
                >
                  {chip}
                </button>
              ))}
            </div>

            {/* Input Controls */}
            <div className="p-3 bg-[#FAFAF7] border-t border-[#E5E7EB] flex items-center gap-2">
              <input
                type="text"
                value={inputText}
                onChange={(e) => setInputText(e.target.value)}
                onKeyDown={handleKeyPress}
                placeholder="Nhập câu hỏi của bạn tại đây..."
                className="flex-1 text-[13px] bg-white border border-[#E5E7EB] px-3 py-2 focus:outline-none focus:border-[#FFD700] rounded"
              />
              <button
                onClick={() => handleSendMessage(inputText)}
                disabled={!inputText.trim() || isLoading}
                className="w-9 h-9 shrink-0 bg-[#FFD700] hover:bg-[#E6C200] disabled:bg-gray-200 disabled:text-gray-400 text-[#1A1A2E] flex items-center justify-center rounded transition-all cursor-pointer"
              >
                <Send size={15} />
              </button>
            </div>
          </motion.div>
        )}
      </AnimatePresence>

      {/* 2. Vertical Floating Action Button Column */}
      <div className="fixed bottom-6 right-6 z-50 flex flex-col items-center space-y-3">
        {/* Hotline Contact Button */}
        <AnimatePresence>
          {showExtraButtons && (
            <motion.a
              key="hotline-fab"
              initial={{ scale: 0, opacity: 0, y: 20 }}
              animate={{ scale: 1, opacity: 1, y: 0 }}
              exit={{ scale: 0, opacity: 0, y: 20 }}
              whileHover={{ scale: 1.08 }}
              whileTap={{ scale: 0.95 }}
              href="tel:0901234567"
              className="w-12 h-12 sm:w-14 sm:h-14 bg-[#FFD700] hover:bg-[#E6C200] text-[#1A1A2E] rounded-full shadow-2xl flex items-center justify-center transition-all cursor-pointer relative group"
              title="Gọi Hotline hỗ trợ"
            >
              <span className="absolute inset-0 rounded-full bg-[#FFD700]/30 animate-pulse"></span>
              <Phone size={20} className="relative z-10 animate-shake group-hover:scale-110 transition-transform" />
            </motion.a>
          )}
        </AnimatePresence>

        {/* Zalo Contact Button */}
        <AnimatePresence>
          {showExtraButtons && (
            <motion.a
              key="zalo-fab"
              initial={{ scale: 0, opacity: 0, y: 15 }}
              animate={{ scale: 1, opacity: 1, y: 0 }}
              exit={{ scale: 0, opacity: 0, y: 15 }}
              whileHover={{ scale: 1.08 }}
              whileTap={{ scale: 0.95 }}
              href="https://zalo.me/0901234567"
              target="_blank"
              rel="noopener noreferrer"
              className="w-12 h-12 sm:w-14 sm:h-14 bg-[#0068FF] hover:bg-[#005AE0] text-white rounded-full shadow-2xl flex items-center justify-center transition-all cursor-pointer relative group"
              title="Kết nối Zalo tư vấn 24/7"
            >
              <span className="absolute inset-0 rounded-full bg-[#0068FF]/30 animate-pulse"></span>
              {/* Zalo Icon SVG with accurate high-quality official Zalo app icon branding */}
              <svg viewBox="0 0 24 24" className="w-6 h-6 sm:w-7 sm:h-7 relative z-10 group-hover:scale-110 transition-transform" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 2C6.48 2 2 5.86 2 10.63c0 2.58 1.34 4.89 3.49 6.38l-.73 2.73c-.09.34.25.62.55.43l3.23-2.01c1.08.31 2.24.48 3.46.48 5.52 0 10-3.86 10-8.63S17.52 2 12 2z" fill="#FFFFFF" />
                <path d="M9.63 13.2v-1.2l3.41-4.9H9.78V5.94h4.94V7.6l-3.41 4.9h3.41v1.2H9.63z" fill="#0068FF" />
              </svg>
            </motion.a>
          )}
        </AnimatePresence>

        {/* Chatbot Toggle Button */}
        <motion.button
          whileHover={{ scale: 1.05 }}
          whileTap={{ scale: 0.95 }}
          onClick={() => setIsOpen(!isOpen)}
          className="w-12 h-12 sm:w-14 sm:h-14 bg-[#1A1A2E] text-white hover:text-[#FFD700] rounded-full shadow-lg border border-[#FFD700]/20 flex items-center justify-center transition-all cursor-pointer group focus:outline-none"
        >
          {isOpen ? (
            <X size={24} />
          ) : (
            <div className="relative">
              <MessageSquare size={22} className="sm:size-[24px] group-hover:rotate-6 transition-transform text-[#FFD700]" />
              <span className="absolute -top-1 -right-1 w-3 h-3 bg-green-500 border-2 border-[#1A1A2E] rounded-full"></span>
            </div>
          )}
        </motion.button>
      </div>
    </div>
  );
}

