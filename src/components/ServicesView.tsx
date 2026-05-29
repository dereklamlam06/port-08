import React from "react";
import { AppView } from "../types";
import { Search, Code, Bot, Repeat, CheckCircle2, ArrowRight } from "lucide-react";

interface ServicesViewProps {
  setCurrentView: (view: AppView) => void;
}

export default function ServicesView({ setCurrentView }: ServicesViewProps) {
  const services = [
    {
      icon: <Search className="text-[#FFD700]" size={24} />,
      title: "SEO Fullstack",
      description: "Tối ưu hóa toàn diện từ cấu trúc kỹ thuật hạ tầng (Technical SEO), nâng cao chất lượng content độc bản đến tối ưu On-page và backlink xây dựng uy tín. Giúp website tăng trưởng tự nhiên bền vững, không ngại thuật toán Google.",
      workflow: "Audit kỹ thuật → Nghiên cứu từ khóa chuyên sâu → Tối ưu hóa On-page → Báo cáo chi tiết định kỳ hàng tháng.",
      deliverables: [
        "Nghiên cứu bộ từ khóa đối thủ chuyên sâu",
        "Tối ưu hóa On-page & cấu trúc cấu tạo dữ liệu schema",
        "Backlink audit & xây dựng liên kết chất lượng cao",
        "Cài đặt theo dõi Google Search Console & GA4 nâng cao"
      ]
    },
    {
      icon: <Code className="text-[#FFD700]" size={24} />,
      title: "Thiết Kế Web WordPress Chuẩn SEO",
      description: "Xây dựng website trên nền tảng WordPress bằng code tay tối ưu (Custom Theme) hoặc Elementor chuẩn chỉ. Đảm bảo giao diện hiện đại, tối ưu tốc độ tải trang, chuẩn SEO toàn diện và vô cùng dễ bảo trì, cập nhật nội dung.",
      workflow: "Trao đổi nhu cầu → Thiết kế layout UI/UX → Lập trình theme hoặc Elementor tối giản → Tối ưu hóa SEO & Tốc độ.",
      deliverables: [
        "Website WordPress dễ dàng quản trị, cập nhật bài viết & sản phẩm",
        "Lựa chọn Code Custom gọn nhẹ hoặc Elementor kéo thả chuyên nghiệp",
        "Tối ưu Core Web Vitals, tăng tốc độ phản hồi tối đa",
        "Tích hợp cấu trúc dữ liệu schema định danh thực thể & Google Maps"
      ]
    }
  ];

  const steps = [
    { num: "01", title: "Tư Vấn Chuyên Sâu", desc: "Lắng nghe bài toán kinh doanh, ngân sách và nhu cầu đặc thù thực tế của doanh nghiệp." },
    { num: "02", title: "Lên Kế Hoạch Lộ Trình", desc: "Thiết kế giải pháp kiến trúc kỹ thuật tối giản, lộ trình triển khai chi tiết & báo giá rõ ràng." },
    { num: "03", title: "Thực Thi Toàn Diện", desc: "Phát triển giải pháp, tối ưu SEO, lập trình logic cấu trúc dữ liệu schema và kiểm định tốc độ ngặt nghèo." },
    { num: "04", title: "Bàn Giao & Báo Cáo", desc: "Thống kê hiệu quả chuyển đổi thực tế, bàn giao hệ thống và hướng dẫn vận hành trực quan." }
  ];

  return (
    <section className="bg-[#F4EFE6] text-[#1A1A2E] py-16 px-6 md:px-12 font-sans">
      <div className="max-w-7xl mx-auto space-y-16">
        {/* Title details */}
        <div className="text-center max-w-2xl mx-auto space-y-4">
          <span className="text-[11px] font-bold tracking-widest uppercase text-[#FFD700]">Năng lực cốt lõi</span>
          <h2 className="text-3xl md:text-4xl font-extrabold tracking-tight text-[#1A1A2E]">Dịch Vụ Tinh Hoa</h2>
          <p className="text-xs sm:text-sm text-gray-500 leading-relaxed">
            Giải pháp công nghệ bứt phá kết hợp hoàn hảo giữa năng lực chiến lược SEO và công nghệ thiết lập website cao cấp giúp tối ưu hóa giá trị kinh doanh cho doanh nghiệp của bạn.
          </p>
        </div>

        {/* Services Grid */}
        <div className="grid grid-cols-1 md:grid-cols-2 gap-8">
          {services.map((service, index) => (
            <div 
              key={index} 
              className="bg-[#F5F0E8] border border-gray-200 p-6 md:p-8 rounded-lg space-y-5 hover:border-[#FFD700] hover:shadow-md transition-all group duration-300"
            >
              <div className="flex items-center space-x-3">
                <div className="p-3 bg-[#FDFBF7] border border-gray-100 rounded">
                  {service.icon}
                </div>
                <h3 className="text-lg font-bold text-[#1A1A2E] group-hover:text-[#FFD700] transition-colors">
                  {service.title}
                </h3>
              </div>

              <p className="text-xs sm:text-[13px] text-gray-500 leading-relaxed">
                {service.description}
              </p>

              <div className="bg-white/60 p-3.5 rounded border border-gray-200/50 space-y-1">
                <span className="text-[10px] font-extrabold uppercase tracking-wider text-gray-400 block">Quy trình thực thi 4 bước nhỏ</span>
                <p className="text-xs italic text-gray-600 leading-normal">{service.workflow}</p>
              </div>

              <div className="space-y-2">
                <span className="text-[11px] font-extrabold uppercase tracking-wide text-gray-700 block">Kết quả bàn giao thực tế:</span>
                <div className="grid grid-cols-1 sm:grid-cols-2 gap-2 text-[11px]">
                  {service.deliverables.map((item, dIdx) => (
                    <div key={dIdx} className="flex items-start space-x-1.5 text-gray-600">
                      <CheckCircle2 size={13} className="text-[#FFD700] shrink-0 mt-0.5" />
                      <span>{item}</span>
                    </div>
                  ))}
                </div>
              </div>
            </div>
          ))}
        </div>

        {/* Workflow Diagram */}
        <div className="bg-[#FDFBF7] border border-gray-200 p-8 rounded-lg space-y-10 shadow-sm">
          <div className="text-center max-w-xl mx-auto space-y-2">
            <span className="text-[10px] font-bold tracking-widest uppercase text-gray-400">Minh bạch & chuẩn mực</span>
            <h3 className="text-xl md:text-2xl font-bold text-[#1A1A2E]">Quy Trình Làm Việc Thống Nhất</h3>
          </div>

          <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 relative">
            {steps.map((step, sIdx) => (
              <div key={sIdx} className="space-y-3.5 relative">
                <div className="flex items-center space-x-3">
                  <span className="text-2xl font-extrabold text-[#FFD700] font-mono tracking-tighter">
                    {step.num}
                  </span>
                  <div className="h-[1px] bg-gray-200 flex-1 hidden lg:block"></div>
                </div>
                <h4 className="text-[13px] font-bold uppercase tracking-wide text-[#1A1A2E]">{step.title}</h4>
                <p className="text-xs text-gray-500 leading-relaxed">{step.desc}</p>
              </div>
            ))}
          </div>
        </div>

        {/* Call to action card */}
        <div className="bg-[#1A1A2E] text-white p-8 md:p-12 rounded-lg text-center space-y-6 relative overflow-hidden">
          <div className="absolute top-0 right-0 w-32 h-32 bg-[#FFD700]/5 rounded-full blur-2xl"></div>
          <div className="absolute bottom-0 left-0 w-48 h-48 bg-white/5 rounded-full blur-2xl"></div>

          <div className="max-w-xl mx-auto space-y-4">
            <h3 className="text-2xl md:text-3xl font-extrabold tracking-tight">Sẵn sàng đưa thương hiệu của bạn vươn xa?</h3>
            <p className="text-xs sm:text-sm text-gray-300 leading-relaxed">
              Hãy cùng thảo luận về chiến lược tăng trưởng bền vững và giải pháp công nghệ tối ưu cho doanh nghiệp của bạn hoàn toàn miễn phí.
            </p>
          </div>

          <div className="flex flex-wrap items-center justify-center gap-4 pt-2">
            <button
              onClick={() => {
                setCurrentView("contact");
                window.scrollTo({ top: 0, behavior: "smooth" });
              }}
              className="flex items-center justify-center space-x-2 bg-[#FFD700] hover:bg-[#E6C200] text-[#1A1A2E] text-xs font-bold uppercase tracking-wide px-6 py-3 rounded-lg transition-all shadow cursor-pointer h-12"
            >
              <span>Yêu Cầu Audit + Tư Vấn Miễn Phí</span>
              <ArrowRight size={14} />
            </button>
            <a 
              href="https://zalo.me/0901234567"
              target="_blank"
              rel="noopener noreferrer"
              className="flex items-center justify-center space-x-2 border border-gray-600 hover:border-white text-xs font-bold uppercase tracking-wide px-5 py-3 rounded shadow transition-all h-12 text-white"
            >
              <svg viewBox="0 0 24 24" className="w-4 h-4 shrink-0 animate-pulse" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 2C6.48 2 2 5.86 2 10.63c0 2.58 1.34 4.89 3.49 6.38l-.73 2.73c-.09.34.25.62.55.43l3.23-2.01c1.08.31 2.24.48 3.46.48 5.52 0 10-3.86 10-8.63S17.52 2 12 2z" fill="#FFFFFF" />
                <path d="M9.63 13.2v-1.2l3.41-4.9H9.78V5.94h4.94V7.6l-3.41 4.9h3.41v1.2H9.63z" fill="#0068FF" />
              </svg>
              <span>Trao đổi qua Zalo</span>
            </a>
          </div>
        </div>
      </div>
    </section>
  );
}
