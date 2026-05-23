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
      title: "Build Web Chuẩn SEO",
      description: "Thiết kế và phát triển ứng dụng web, trang giới thiệu doanh nghiệp hoặc landing page cực kỳ cao cấp, tối ưu tốc độ tải trang dưới 1 giây. Giao diện tối giản, hiện đại và tương thích hoàn hảo mọi thiết bị di động.",
      workflow: "Vẽ sơ đồ (Sketch) → Thiết kế UI/UX → Lập trình mã nguồn sạch → Kiểm định tốc độ & bảo mật.",
      deliverables: [
        "Công nghệ hiện đại React / Vite / Express bảo mật",
        "Thiết kế UI/UX độc quyền, không dùng template đại trà",
        "Tối ưu Core Web Vitals xanh mướt, tải trang thần tốc",
        "Tích hợp các cổng thanh toán & chatbot tư vấn tự động"
      ]
    },
    {
      icon: <Bot className="text-[#FFD700]" size={24} />,
      title: "AI Agent Doanh Nghiệp",
      description: "Tích hợp trí tuệ nhân tạo (Generative AI) vào trực tiếp quy trình vận hành của bạn. Thiết lập các trợ lý ảo hỗ trợ khách hàng tự động 24/7, tự sinh nội dung tiếp thị thông minh, RAG dữ liệu doanh nghiệp và tăng tỷ lệ giữ chân khách hàng.",
      workflow: "Thu thập dữ liệu tri thức → Thiết kế prompts chuyên biệt → Fine-tuning LLMs → Triển khai & theo dõi.",
      deliverables: [
        "Chatbot AI hỗ trợ tự động bám sát dữ liệu sản phẩm",
        "Hệ thống tự động chấm điểm khách hàng tiềm năng",
        "Trợ lý AI lập báo cáo marketing tự động từ tri thức",
        "Tối ưu hóa quy trình tư vấn tự động hóa hoàn toàn"
      ]
    },
    {
      icon: <Repeat className="text-[#FFD700]" size={24} />,
      title: "Tự Động Hóa Automation",
      description: "Kết nối toàn bộ hệ thống lưu trữ, trang web, CRM và các kênh truyền thông của bạn thông qua Make.com, N8N hoặc Zapier. Giải phóng đến 80% nhân sự khỏi các tác vụ nhập liệu, chuyển nguồn và thống kê thủ công.",
      workflow: "Vẽ luồng xử lý (Map Flow) → Thiết lập logic điều kiện → Xử lý lỗi tự động → Tối ưu hóa quy trình.",
      deliverables: [
        "Đồng bộ hóa dữ liệu khách hàng từ Web về Google Sheets/CRM",
        "Hệ thống gửi Email marketing bám đuổi tự động theo hành vi",
        "Scraping Bots thu thập thông tin thị trường đối thủ hàng ngày",
        "Cảnh báo thông báo tự động hóa qua Telegram/Zalo ngay lập tức"
      ]
    }
  ];

  const steps = [
    { num: "01", title: "Tư Vấn Chuyên Sâu", desc: "Lắng nghe bài toán kinh doanh, ngân sách và nhu cầu đặc thù thực tế của doanh nghiệp." },
    { num: "02", title: "Lên Kế Hoạch Lộ Trình", desc: "Thiết kế giải pháp kiến trúc kỹ thuật tối giản, lộ trình triển khai chi tiết & báo giá rõ ràng." },
    { num: "03", title: "Thực Thi Toàn Diện", desc: "Phát triển giải pháp, tối ưu SEO, lập trình logic, tích hợp AI và kiểm định tốc độ ngặt nghèo." },
    { num: "04", title: "Bàn Giao & Báo Cáo", desc: "Thống kê hiệu quả chuyển đổi thực tế, bàn giao hệ thống và hướng dẫn vận hành trực quan." }
  ];

  return (
    <section className="bg-[#FAFAF7] text-[#1A1A2E] py-16 px-6 md:px-12 font-sans">
      <div className="max-w-7xl mx-auto space-y-16">
        {/* Title details */}
        <div className="text-center max-w-2xl mx-auto space-y-4">
          <span className="text-[11px] font-bold tracking-widest uppercase text-[#FFD700]">Năng lực cốt lõi</span>
          <h2 className="text-3xl md:text-4xl font-extrabold tracking-tight text-[#1A1A2E]">Dịch Vụ Tinh Hoa</h2>
          <p className="text-xs sm:text-sm text-gray-500 leading-relaxed">
            Giải pháp công nghệ bứt phá kết hợp hoàn hảo giữa năng lực chiến lược SEO và công nghệ AI Automation giúp tự động hóa quy trình nghiệp vụ tối đa của bạn.
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
                <div className="p-3 bg-white border border-gray-100 rounded">
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
        <div className="bg-white border border-gray-200 p-8 rounded-lg space-y-10 shadow-sm">
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
              className="flex items-center justify-center space-x-2 border border-gray-600 hover:border-white text-xs font-bold uppercase tracking-wide px-6 py-3 rounded shadow transition-all h-12 text-white"
            >
              <span>Trao đổi qua Zalo</span>
            </a>
          </div>
        </div>
      </div>
    </section>
  );
}
