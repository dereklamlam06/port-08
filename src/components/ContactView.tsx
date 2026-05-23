import React, { useState } from "react";
import { Mail, Phone, MapPin, Send, Check, MessageSquare } from "lucide-react";

export default function ContactView() {
  const [name, setName] = useState("");
  const [email, setEmail] = useState("");
  const [phone, setPhone] = useState("");
  const [service, setService] = useState("SEO Fullstack");
  const [message, setMessage] = useState("");

  const [isSubmitting, setIsSubmitting] = useState(false);
  const [isSubmitted, setIsSubmitted] = useState(false);
  const [errorMessage, setErrorMessage] = useState("");

  const handleSubmit = async (e: React.FormEvent) => {
    e.preventDefault();
    if (!name || !email) return;

    setIsSubmitting(true);
    setErrorMessage("");

    try {
      const response = await fetch("/api/leads", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ name, email, phone, service, message })
      });

      if (response.ok) {
        setIsSubmitted(true);
        setName("");
        setEmail("");
        setPhone("");
        setService("SEO Fullstack");
        setMessage("");
        // Fade notification after some seconds
        setTimeout(() => setIsSubmitted(false), 6000);
      } else {
        const data = await response.json();
        setErrorMessage(data.error || "Gặp lỗi khi tạo đăng ký.");
      }
    } catch {
      setErrorMessage("Lỗi kết nối máy chủ không thể gửi.");
    } finally {
      setIsSubmitting(false);
    }
  };

  return (
    <section className="bg-[#FAFAF7] text-[#1A1A2E] py-16 px-6 md:px-12 font-sans">
      <div className="max-w-7xl mx-auto space-y-12">
        {/* Header content section */}
        <div className="text-center max-w-2xl mx-auto space-y-4">
          <span className="text-[11px] font-bold tracking-widest uppercase text-[#FFD700]">Đăng ký nhanh</span>
          <h2 className="text-3xl md:text-4xl font-extrabold tracking-tight">Khởi Chạy Buổi Tư Vấn</h2>
          <p className="text-xs sm:text-sm text-gray-500 leading-relaxed">
            Điền nhanh thông tin yêu cầu của bạn, Derek Lâm sẽ trực tiếp phân phối giải pháp kỹ thuật & liên lạc hỗ trợ bạn trong vòng tối đa 2 giờ làm việc.
          </p>
        </div>

        <div className="grid grid-cols-1 lg:grid-cols-12 gap-12 bg-white rounded-lg border border-gray-200 shadow-sm overflow-hidden">
          {/* Left panel: Info Coordinates */}
          <div className="lg:col-span-5 bg-[#1A1A2E] text-white p-8 md:p-12 flex flex-col justify-between space-y-12 relative">
            <div className="absolute top-0 right-0 w-32 h-32 bg-[#FFD700]/5 rounded-full blur-2xl"></div>

            <div className="space-y-4">
              <h3 className="text-xl font-bold uppercase tracking-wide text-white">Kết Nối Liên Hệ</h3>
              <p className="text-xs text-gray-400 leading-relaxed max-w-sm">
                Hãy thảo luận về dự án bứt phá tiếp theo của bạn. Chúng tôi cam kết bảo mật tuyệt đối các ý tưởng kế hoạch và dữ liệu kinh doanh của bạn.
              </p>
            </div>

            {/* Icon Info lists */}
            <div className="space-y-6">
              <div className="flex items-start space-x-4">
                <div className="w-10 h-10 rounded bg-[#FFD700]/10 border border-[#FFD700]/20 flex items-center justify-center text-[#FFD700] shrink-0">
                  <Phone size={16} />
                </div>
                <div>
                  <h4 className="text-[11px] uppercase font-bold tracking-wider text-gray-400">Hotline Tư Vấn Trực Tiếp</h4>
                  <a href="tel:0901234567" className="text-sm font-bold font-mono text-white hover:text-[#FFD700] transition-colors">
                    0901 234 567
                  </a>
                </div>
              </div>

              <div className="flex items-start space-x-4">
                <div className="w-10 h-10 rounded bg-[#FFD700]/10 border border-[#FFD700]/20 flex items-center justify-center text-[#FFD700] shrink-0">
                  <Mail size={16} />
                </div>
                <div>
                  <h4 className="text-[11px] uppercase font-bold tracking-wider text-gray-400">Hòm Thư Điện Tử</h4>
                  <a href="mailto:contact@derektopeak.com" className="text-sm font-bold font-mono text-white hover:text-[#FFD700] transition-colors">
                    contact@derektopeak.com
                  </a>
                </div>
              </div>

              <div className="flex items-start space-x-4">
                <div className="w-10 h-10 rounded bg-[#FFD700]/10 border border-[#FFD700]/20 flex items-center justify-center text-[#FFD700] shrink-0">
                  <MapPin size={16} />
                </div>
                <div>
                  <h4 className="text-[11px] uppercase font-bold tracking-wider text-gray-400">Địa chỉ văn phòng HCMC</h4>
                  <p className="text-xs text-gray-300 leading-relaxed">
                    Quận 1, TP. Hồ Chí Minh, Việt Nam
                  </p>
                </div>
              </div>
            </div>

            {/* Extra assurance */}
            <div className="border-t border-gray-800 pt-6 flex items-center space-x-2 text-xs text-gray-400">
              <MessageSquare size={14} className="text-[#FFD700]" />
              <span>Phản hồi cực nhanh qua cuộc đặt lịch hoặc Zalo.</span>
            </div>
          </div>

          {/* Right panel: Form input section */}
          <div className="lg:col-span-7 p-8 md:p-12">
            <form onSubmit={handleSubmit} className="space-y-6">
              <div className="grid grid-cols-1 sm:grid-cols-2 gap-6">
                {/* Name */}
                <div className="space-y-1">
                  <label className="text-[10px] font-bold uppercase text-gray-500 tracking-wider">Họ và Tên của bạn (*)</label>
                  <input
                    type="text"
                    required
                    placeholder="Ví dụ: Anh Nguyễn"
                    value={name}
                    onChange={(e) => setName(e.target.value)}
                    className="w-full text-xs bg-white border border-gray-200 focus:border-[#FFD700] rounded px-3 py-2.5 outline-none"
                  />
                </div>

                {/* Email */}
                <div className="space-y-1">
                  <label className="text-[10px] font-bold uppercase text-gray-500 tracking-wider">Thư điện tử Email (*)</label>
                  <input
                    type="email"
                    required
                    placeholder="example@yourbusiness.com"
                    value={email}
                    onChange={(e) => setEmail(e.target.value)}
                    className="w-full text-xs bg-white border border-gray-200 focus:border-[#FFD700] rounded px-3 py-2.5 outline-none"
                  />
                </div>
              </div>

              <div className="grid grid-cols-1 sm:grid-cols-2 gap-6">
                {/* Phone */}
                <div className="space-y-1">
                  <label className="text-[10px] font-bold uppercase text-gray-500 tracking-wider">Số điện thoại liên hệ</label>
                  <input
                    type="tel"
                    placeholder="Nhập số điện thoại/Zalo..."
                    value={phone}
                    onChange={(e) => setPhone(e.target.value)}
                    className="w-full text-xs bg-white border border-gray-200 focus:border-[#FFD700] rounded px-3 py-2.5 outline-none"
                  />
                </div>

                {/* Service of interest choice dropdown */}
                <div className="space-y-1">
                  <label className="text-[10px] font-bold uppercase text-gray-500 tracking-wider">Hạng mục dịch vụ quan tâm</label>
                  <select
                    value={service}
                    onChange={(e) => setService(e.target.value)}
                    className="w-full text-xs bg-white border border-gray-200 focus:border-[#FFD700] rounded px-3 py-2.5 outline-none"
                  >
                    <option value="SEO Fullstack">SEO Fullstack Chiến Lược</option>
                    <option value="Build Web Chuẩn SEO">Thiết Kế Web Thần Tốc</option>
                    <option value="AI Agent Doanh Nghiệp">Tích Hợp Trợ Lý AI Chatbot</option>
                    <option value="Tự Động Hóa Automation">Tự Động Hóa Quy Trình (Make/N8N)</option>
                    <option value="Tất Cả Hạng Mục">Kết Hợp Toàn Diện (Combo Pro)</option>
                  </select>
                </div>
              </div>

              {/* Message text details */}
              <div className="space-y-1">
                <label className="text-[10px] font-bold uppercase text-gray-500 tracking-wider">Mô tả tóm tắt bài toán hoặc yêu cầu của bạn</label>
                <textarea
                  rows={4}
                  placeholder="Vui lòng cho biết địa chỉ website hiện tại (nếu có), từ khóa mong muốn hoặc nút thắt quy trình bạn đang gặp phải..."
                  value={message}
                  onChange={(e) => setMessage(e.target.value)}
                  className="w-full text-xs bg-white border border-gray-200 focus:border-[#FFD700] rounded px-3 py-2.5 outline-none resize-none"
                />
              </div>

              {/* Status prompt handlers */}
              {errorMessage && (
                <div className="text-xs text-red-500 bg-red-50 p-3 rounded">
                  {errorMessage}
                </div>
              )}

              {isSubmitted && (
                <div className="text-xs text-green-700 bg-green-50 p-3.5 rounded flex items-center gap-2 font-semibold">
                  <Check size={16} />
                  <span>Cảm ơn bạn! Đơn đăng ký của bạn đã được ghi nhận thành công trên hệ thống. Derek Lâm sẽ gửi liên hệ tư vấn trong 2h làm việc.</span>
                </div>
              )}

              <button
                type="submit"
                disabled={isSubmitting || !name || !email}
                className="w-full flex items-center justify-center space-x-2 bg-[#FFD700] hover:bg-[#E6C200] disabled:bg-gray-200 disabled:text-gray-400 text-[#1A1A2E] text-xs font-bold uppercase tracking-wider py-3.5 rounded-lg transition-all cursor-pointer shadow-md hover:shadow"
              >
                {isSubmitting ? (
                  <span>Đang ghi nhận đăng ký...</span>
                ) : (
                  <>
                    <span>Gửi Đăng Ký Tư Vấn Ngay</span>
                    <Send size={13} className="text-[#1A1A2E]" />
                  </>
                )}
              </button>
            </form>
          </div>
        </div>
      </div>
    </section>
  );
}
