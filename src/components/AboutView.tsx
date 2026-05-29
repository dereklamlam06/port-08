import React, { useState, useEffect } from "react";
import { AppView } from "../types";
import { Award, Code, Globe, UserCheck, ShieldCheck, Mail, Calendar, Sparkles } from "lucide-react";

interface AboutViewProps {
  setCurrentView: (view: AppView) => void;
}

export default function AboutView({ setCurrentView }: AboutViewProps) {
  const [avatarUrl, setAvatarUrl] = useState<string>(localStorage.getItem("custom_avatar_url") || "");

  useEffect(() => {
    const handleImagesUpdate = () => {
      setAvatarUrl(localStorage.getItem("custom_avatar_url") || "");
    };

    window.addEventListener("custom-images-updated", handleImagesUpdate);
    return () => {
      window.removeEventListener("custom-images-updated", handleImagesUpdate);
    };
  }, []);

  const seoTools = [
    { name: "Google Search Console", desc: "Theo dõi lập chỉ mục & hiệu suất từ khóa chuyên sâu" },
    { name: "Google Analytics 4", desc: "Phân tích luồng hành vi & hiệu suất phễu chuyển đổi" },
    { name: "Semrush", desc: "Nghiên cứu bộ từ khóa đối thủ & độ khó từ khóa cạnh tranh" },
    { name: "Ahrefs Suite", desc: "Phát hiện lỗ hổng liên kết (Backlinks audit) toàn vẹn" },
    { name: "Screaming Frog SEO Spider", desc: "Cào quét rà soát toàn bộ cấu trúc lỗi kỹ thuật technical codes" },
    { name: "Looker Studio Dashboards", desc: "Tổng hợp trực quan hóa biểu đồ chuyển đổi realtime cho admin" }
  ];

  const devTools = [
    { name: "React & Vite ESM", desc: "Lập trình giao diện SPA tải trang nhanh mượt mà dưới 1 giây" },
    { name: "Node.js & Express CJS", desc: "Bảo mật backend xử lý trơn tru các luồng API & kết nối database" },
    { name: "PostgreSQL & NoSQL", desc: "Cấu trúc cơ sở dữ liệu hiệu năng tốt cho lưu trữ thông tin sản phẩm" },
    { name: "WordPress Custom Themes", desc: "Thiết kế theme tùy biến chuyên sâu chuẩn SEO Onpage gọn nhẹ" },
    { name: "Tailwind CSS & Animations", desc: "Phát triển giao diện responsive tinh tế với hiệu ứng chuyển cảnh mượt mà" },
    { name: "Lighthouse Speed Tools", desc: "Tối ưu hóa tài nguyên tĩnh, nén ảnh thế hệ mới và nạp lười (lazy-load)" }
  ];

  return (
    <section className="bg-[#F4EFE6] text-[#1A1A2E] py-16 px-6 md:px-12 font-sans">
      <div className="max-w-7xl mx-auto space-y-16">
        {/* Title layout */}
        <div className="text-center max-w-2xl mx-auto space-y-4">
          <span className="text-[11px] font-bold tracking-widest uppercase text-[#FFD700]">Đội ngũ đồng hành</span>
          <h2 className="text-3xl md:text-4xl font-extrabold tracking-tight">Về Derek Flow Specialist</h2>
          <p className="text-xs sm:text-sm text-gray-500 leading-relaxed">
            Chuyên gia SEO thực chiến & Nhà thiết kế lập trình Website chuẩn SEO tối giản với tôn chỉ làm việc dựa trên dữ liệu thật.
          </p>
        </div>

        {/* Biographical Row split */}
        <div className="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
          {/* Avatar frame */}
          <div className="lg:col-span-5 flex justify-center">
            <div className="relative w-72 h-80 sm:w-80 sm:h-96 md:w-[350px] md:h-[420px] rounded-2xl shadow-2xl overflow-hidden group">
              {avatarUrl ? (
                /* High-Fidelity Custom Image uploaded by user, fits 4:5 vertical proportions nicely */
                <div className="absolute inset-0 w-full h-full">
                    <div className="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                      <img 
                        src={avatarUrl} 
                        alt="Derek Flow Specialist" 
                        className="w-full h-full object-cover" 
                      />
                    </div>
                    <div className="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-transparent flex flex-col justify-end p-6 select-none font-sans">
                      <div className="space-y-1">
                        <h3 className="text-xl font-extrabold uppercase tracking-wide text-white leading-none">DEREK FLOW</h3>
                      <p className="text-[10px] text-[#FFD700] uppercase tracking-widest font-mono font-bold">Senior Strategist & Developer</p>
                    </div>
                    <p className="text-[11px] text-gray-300 leading-relaxed pt-2 border-t border-white/10 mt-2.5">
                      "Sự vượt bậc trong thứ hạng và độ tinh giản vận hành là thước đo duy nhất thành công."
                    </p>
                  </div>
                </div>
              ) : (
                /* Default Luxury Badge visual if no custom image is uploaded */
                <div className="w-full h-full bg-gradient-to-tr from-[#1A1A2E] to-gray-800 p-8 text-[#FAFAF7] flex flex-col justify-between absolute inset-0">
                  {/* Decorative items */}
                  <div className="absolute top-0 right-0 w-32 h-32 bg-[#FFD700]/10 rounded-full blur-2xl"></div>
                  
                  <div className="space-y-4 relative z-10">
                    <div className="w-12 h-12 rounded bg-[#FFD700] flex items-center justify-center text-[#1A1A2E]">
                      <Sparkles size={24} />
                    </div>
                    <div className="space-y-1">
                      <h3 className="text-xl font-extrabold uppercase tracking-wide text-white">DEREK FLOW</h3>
                      <p className="text-[11px] text-gray-400 uppercase tracking-widest font-mono">Senior Strategist & Developer</p>
                    </div>
                    <p className="text-xs text-gray-300 leading-relaxed pt-2">
                      "Sự vượt bậc trong vị trí thứ hạng tìm kiếm và độ tinh giản của bộ máy vận hành là thước đo duy nhất để đánh giá thành công của dự án."
                    </p>
                  </div>

                  <div className="space-y-2 border-t border-gray-700/50 pt-4 text-xs font-mono relative z-10">
                    <div className="flex justify-between">
                      <span className="text-gray-500">Kinh nghiệm:</span>
                      <span className="text-white">10+ Năm Thực Chiến</span>
                    </div>
                    <div className="flex justify-between">
                      <span className="text-gray-500">Thế mạnh chính:</span>
                      <span className="text-white">Technical SEO & Web Perf</span>
                    </div>
                    <div className="flex justify-between">
                      <span className="text-gray-500">Mục tiêu:</span>
                      <span className="text-[#FFD700]">To Peak Efficiency</span>
                    </div>
                  </div>
                </div>
              )}
            </div>
          </div>

          {/* Biography content */}
          <div className="lg:col-span-7 space-y-6">
            <div className="space-y-2">
              <span className="text-[10px] font-bold tracking-widest uppercase text-gray-400 block">Sự kết hợp năng lực hiếm hoi</span>
              <h3 className="text-2xl font-bold tracking-tight text-[#1A1A2E]">
                Thực chiến dựa vào lập trình mã nguồn website chuẩn SEO & Thiết Kế Cao Cấp
              </h3>
            </div>

            <p className="text-xs sm:text-[13px] text-gray-500 leading-relaxed whitespace-pre-line">
              Derek Flow bắt đầu sự nghiệp với vai trò là một kỹ sư phần mềm chuyên nghiệp trước khi lấn sân sâu rộng sang ngành Tối ưu hóa công cụ tìm kiếm (SEO). Sự kết hợp hiếm hoi giữa khả năng thấu hiểu thuật toán xếp hạng và năng lực lập trình tối ưu hạ tầng code giúp Derek giải quyết triệt để các bài toán kỹ thuật phức tạp nhất mà các chuyên gia SEO truyền thống thường bó tay.
              {"\n\n"}
              Mỗi dòng mã nguồn do Derek Flow thiết kế đều đảm bảo cấu trúc dữ liệu schema chuẩn xác nhất, tốc độ phản hồi Core Web Vitals tối ưu, và hoàn toàn miễn nhiễm trước các đợt càn quét thuật toán khắt khe từ Google. Đồng thời, cấu trúc code tinh gọn hóa giúp đẩy mạnh tốc độ hiển thị và nâng tầm thương hiệu một cách hoàn mỹ nhất.
            </p>

            <div className="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-4 border-t border-gray-200">
              <div className="flex items-start space-x-2.5">
                <Award size={18} className="text-[#FFD700] shrink-0 mt-0.5" />
                <div>
                  <h4 className="text-xs font-bold">100% SEO Sạch (Mũ Trắng)</h4>
                  <p className="text-[11px] text-gray-400 leading-relaxed">Tăng trưởng vững bền, không áp dụng các chiêu trò spam mạo hiểm.</p>
                </div>
              </div>

              <div className="flex items-start space-x-2.5">
                <ShieldCheck size={18} className="text-[#FFD700] shrink-0 mt-0.5" />
                <div>
                  <h4 className="text-xs font-bold">Bảo hành vận hành kỹ thuật</h4>
                  <p className="text-[11px] text-gray-400 leading-relaxed">Luôn cam kết hỗ trợ tối ưu mã nguồn và cập nhật hệ thống sau dự án.</p>
                </div>
              </div>
            </div>
          </div>
        </div>

        {/* The Modern Stack / Tools Grid */}
        <div className="space-y-8">
          <div className="text-center max-w-xl mx-auto space-y-2">
            <span className="text-[10px] font-bold tracking-widest uppercase text-gray-400">The Modern Stack</span>
            <h3 className="text-xl md:text-2xl font-extrabold tracking-tight">Hệ Thống Công Cụ Chuyên Sâu</h3>
          </div>

          <div className="grid grid-cols-1 md:grid-cols-2 gap-8">
            {/* SEO suite block */}
            <div className="bg-[#F5F0E8] border border-gray-200 p-6 md:p-8 rounded-lg space-y-5">
              <h4 className="text-[12px] uppercase font-bold tracking-widest text-[#1A1A2E] border-b pb-3 border-gray-300 flex items-center gap-2">
                <Globe size={15} className="text-[#FFD700]" />
                <span>SEO & Conversion Analytics Suite</span>
              </h4>
              <div className="space-y-4">
                {seoTools.map((tool, idx) => (
                  <div key={idx} className="space-y-1">
                    <h5 className="text-[11px] font-bold text-gray-700">{tool.name}</h5>
                    <p className="text-xs text-gray-500 leading-relaxed">{tool.desc}</p>
                  </div>
                ))}
              </div>
            </div>

            {/* Dev suite block */}
            <div className="bg-[#FDFBF7] border border-gray-200 p-6 md:p-8 rounded-lg space-y-5 shadow-sm">
              <h4 className="text-[12px] uppercase font-bold tracking-widest text-[#1A1A2E] border-b pb-3 border-gray-200 flex items-center gap-2">
                <Code size={15} className="text-[#FFD700]" />
                <span>Web Development & Performance Toolkit</span>
              </h4>
              <div className="space-y-4">
                {devTools.map((tool, idx) => (
                  <div key={idx} className="space-y-1">
                    <h5 className="text-[11px] font-bold text-gray-700">{tool.name}</h5>
                    <p className="text-xs text-gray-500 leading-relaxed">{tool.desc}</p>
                  </div>
                ))}
              </div>
            </div>
          </div>
        </div>

        {/* CTA Contact link bottom */}
        <div className="bg-[#1A1A2E] text-white p-8 md:p-12 rounded-lg flex flex-col md:flex-row items-center justify-between gap-6">
          <div className="space-y-2 max-w-lg">
            <h4 className="text-lg md:text-xl font-bold tracking-tight">Bạn muốn trao đổi trực tiếp cùng chuyên gia Derek Flow?</h4>
            <p className="text-xs text-gray-400">
              Đặt lịch họp nhanh 15 phút qua Zoom hoặc gặp mặt trực tiếp để giải quyết bài toán tăng trưởng thứ hạng và thiết lập thiết kế website chuẩn SEO.
            </p>
          </div>
          <div className="flex gap-3 shrink-0 flex-col sm:flex-row w-full sm:w-auto">
            <button
              onClick={() => {
                setCurrentView("contact");
                window.scrollTo({ top: 0, behavior: "smooth" });
              }}
              className="flex items-center justify-center space-x-2 bg-[#FFD700] hover:bg-[#E6C200] text-[#1A1A2E] text-xs font-bold uppercase tracking-wider px-6 py-3.5 rounded cursor-pointer transition-all shadow"
            >
              <Calendar size={14} />
              <span>Đăng Ký Đặt Lịch Gặp</span>
            </button>
            <a
              href="mailto:contact@derektopeak.com"
              className="flex items-center justify-center space-x-2 border border-gray-600 hover:border-white text-xs font-semibold px-6 py-3.5 rounded transition-all cursor-pointer"
            >
              <Mail size={14} className="text-[#FFD700]" />
              <span className="font-mono">contact@derektopeak.com</span>
            </a>
          </div>
        </div>
      </div>
    </section>
  );
}
