import React, { useState } from "react";
import { AppView, ServicePlan } from "../types";
import { Check, HelpCircle, ShieldAlert, CreditCard, Landmark, QrCode, ShieldCheck, Mail, User, Phone, CheckCircle } from "lucide-react";
import { motion, AnimatePresence } from "motion/react";

interface PricingViewProps {
  setCurrentView: (view: AppView) => void;
}

export default function PricingView({ setCurrentView }: PricingViewProps) {
  const [activeFaq, setActiveFaq] = useState<number | null>(null);
  
  // Checkout Wizard state
  const [selectedPlan, setSelectedPlan] = useState<ServicePlan | null>(null);
  const [checkoutStep, setCheckoutStep] = useState<1 | 2 | 3>(1);
  const [paymentMethod, setPaymentMethod] = useState<"qr" | "card" | "deposit">("qr");
  const [couponCode, setCouponCode] = useState("");
  const [discountApplied, setDiscountApplied] = useState(false);
  const [discountError, setDiscountError] = useState("");

  // Customer details form
  const [buyerName, setBuyerName] = useState("");
  const [buyerEmail, setBuyerEmail] = useState("");
  const [buyerPhone, setBuyerPhone] = useState("");
  const [isSubmittingOrder, setIsSubmittingOrder] = useState(false);
  const [createdOrderDetails, setCreatedOrderDetails] = useState<any | null>(null);

  const plans: ServicePlan[] = [
    {
      id: "plan_1",
      name: "SEO Starter",
      subtitle: "Phù hợp cho doanh nghiệp mới bắt đầu xây dựng hiện diện số.",
      price: 15000000,
      priceLabel: "Cố định hàng tháng",
      features: [
        "Nghiên cứu sâu 50 từ khóa mục tiêu",
        "Tối ưu hóa On-page cấu trúc 10 trang",
        "Thiết lập Google Search Console & GA4",
        "Kiểm tra & vá lỗi Technical SEO cơ bản",
        "Báo cáo hiệu quả & thứ hạng từ khóa hàng tháng"
      ],
      colorTheme: "light"
    },
    {
      id: "plan_2",
      name: "SEO Pro",
      subtitle: "Chiến dịch tổng lực dành cho doanh nghiệp bứt phá đầu ngành.",
      price: 35000000,
      priceLabel: "Tối ưu cam kết ROI",
      badge: "PHỔ BIẾN NHẤT",
      features: [
        "Nghiên cứu từ khóa không giới hạn",
        "SEO Audit chuyên sâu định kỳ hàng tuần",
        "Chiến lược content cluster sáng tạo",
        "Xây dựng backlink chất lượng cao bền vững",
        "Phân tích hành vi đối thủ cạnh tranh 24/7",
        "Báo cáo thống kê chuyển đổi Analytics trực quan"
      ],
      colorTheme: "gold"
    },
    {
      id: "plan_3",
      name: "AI & Automation",
      subtitle: "Tự động hóa vận hành & tích hợp AI tăng năng lực cạnh tranh.",
      price: 60000000,
      priceLabel: "Báo giá theo dự án thực tế",
      features: [
        "Xây dựng Chatbot AI phản hồi tự động RAG",
        "Hệ thống tự động hóa Marketing (Make.com/N8N)",
        "Đồng bộ hóa dữ liệu tự động CRM & ERP",
        "Scraping Bots thu thập thông tin tự động",
        "Hệ thống báo cáo tự sinh KPI tự động",
        "Quản trị an toàn chuẩn bảo mật hệ thống độc lập"
      ],
      colorTheme: "dark"
    }
  ];

  const faqs = [
    {
      q: "Quy trình làm việc như thế nào?",
      a: "Quy trình chuẩn mực 4 bước rõ ràng: 1. Tư vấn lắng nghe bài toán; 2. Thiết kế giải pháp kỹ thuật, lên kế hoạch chi tiết & báo giá thống nhất; 3. Thực thi triển khai lập trình, tối ưu hóa và kiểm nghiệm; 4. Báo cáo chuyển đổi, bàn giao tri thức vận hành."
    },
    {
      q: "Thời gian triển khai trong bao lâu?",
      a: "Tùy thuộc vào quy mô dự án. Chiến dịch SEO thường ghi nhận tín hiệu tăng trưởng sau 4-6 tuần và đạt đỉnh bền vững sau 4-6 tháng. Đối với việc thiết kế web và tự động hóa AI, thời gian bàn giao trung bình từ 2-4 tuần."
    },
    {
      q: "Báo cáo hiệu quả diễn ra như thế nào?",
      a: "Chúng tôi cung cấp bảng theo dõi Analytics tự động cập nhật theo thời gian thực (Real-time). Hàng tháng sẽ có buổi họp thống nhất chỉ số (Organic Traffic, Keyword Rankings, Leads Generated, Conversion Rates) giúp bạn nắm tổng số tiến trình."
    },
    {
      q: "Có cam kết thứ hạng hoặc bồi hoàn không?",
      a: "Chúng tôi cam kết thực thi SEO mũ trắng an toàn chuẩn Google, nói không với spam phá hoại. Cam kết hoàn tiền hoặc tăng cường giờ làm việc không tính phí nếu không đạt 85% tiến độ KPIs đã ký kết trong hợp đồng."
    },
    {
      q: "Có hỗ trợ sau khi hoàn thành bàn giao không?",
      a: "Hoàn toàn có! Tất cả website và hệ thống tự động hóa AI đều được bảo hành kỹ thuật 12 tháng hoàn toàn miễn phí. Đội ngũ chuyên gia luôn sẵn sàng hỗ trợ cập nhật thuật toán 24/7."
    }
  ];

  const handleApplyCoupon = (e: React.FormEvent) => {
    e.preventDefault();
    if (couponCode.toUpperCase() === "GROWTH2026") {
      setDiscountApplied(true);
      setDiscountError("");
    } else {
      setDiscountError("Mã giảm giá không hợp lệ hoặc đã hết hạn.");
    }
  };

  const calculateFinalPrice = () => {
    if (!selectedPlan) return 0;
    if (discountApplied) {
      return selectedPlan.price * 0.9; // 10% OFF
    }
    return selectedPlan.price;
  };

  const handleCreateOrder = async (e: React.FormEvent) => {
    e.preventDefault();
    if (!buyerName || !buyerEmail || !buyerPhone || !selectedPlan) {
      alert("Vui lòng điền đầy đủ thông tin liên hệ của bạn.");
      return;
    }

    setIsSubmittingOrder(true);
    const finalAmount = calculateFinalPrice();

    try {
      const response = await fetch("/api/orders", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({
          clientName: buyerName,
          clientEmail: buyerEmail,
          phone: buyerPhone,
          servicePackage: selectedPlan.name,
          amount: finalAmount,
          paymentMethod: paymentMethod === "qr" ? "VietQR Transfer" : paymentMethod === "card" ? "ATM Credit Card" : "Deposit booking (20%)"
        })
      });

      if (response.ok) {
        const orderData = await response.json();
        setCreatedOrderDetails(orderData.order);
        setCheckoutStep(3);
        
        // Push a lead conversion event too!
        await fetch("/api/leads", {
          method: "POST",
          headers: { "Content-Type": "application/json" },
          body: JSON.stringify({
            name: buyerName,
            email: buyerEmail,
            phone: buyerPhone,
            service: selectedPlan.name,
            message: `Hệ thống vừa lập đơn đặt mua thanh toán trực tuyến thành công cho gói ${selectedPlan.name}. Mã giao dịch: ${orderData.order.txHash || "N/A"}.`
          })
        });
      } else {
        alert("Lỗi khi kết nối thanh toán. Vui lòng thử lại sau.");
      }
    } catch (err) {
      console.error(err);
      alert("Lỗi máy chủ kết nối.");
    } finally {
      setIsSubmittingOrder(false);
    }
  };

  const closeCheckout = () => {
    setSelectedPlan(null);
    setCheckoutStep(1);
    setCouponCode("");
    setDiscountApplied(false);
    setDiscountError("");
    setBuyerName("");
    setBuyerEmail("");
    setBuyerPhone("");
    setCreatedOrderDetails(null);
  };

  return (
    <section className="bg-[#FAFAF7] text-[#1A1A2E] py-16 px-6 md:px-12 font-sans relative">
      <div className="max-w-7xl mx-auto space-y-16">
        {/* Main Title layout */}
        <div className="text-center max-w-2xl mx-auto space-y-4">
          <span className="text-[11px] font-bold tracking-widest uppercase text-[#FFD700]">Chi phí đầu tư rõ ràng</span>
          <h2 className="text-3xl md:text-4xl font-extrabold tracking-tight">Bảng Giá Dịch Vụ SEO & AI</h2>
          <p className="text-xs sm:text-sm text-gray-500 leading-relaxed">
            Các gói giải pháp được thiết kế tối giản, minh bạch các hạng mục bàn giao nhằm tập trung tối đa tối ưu hóa chuyển đổi thực tế cho doanh nghiệp.
          </p>
        </div>

        {/* Dynamic Pricing Cards Grid */}
        <div className="grid grid-cols-1 lg:grid-cols-3 gap-8">
          {plans.map((plan) => {
            const isGoldTheme = plan.colorTheme === "gold";
            const isDarkTheme = plan.colorTheme === "dark";

            return (
              <div
                key={plan.id}
                className={`border rounded-lg p-6 md:p-8 flex flex-col justify-between relative shadow-sm transition-all duration-300 ${
                  isGoldTheme 
                    ? "border-[#FFD700] bg-gradient-to-tr from-[#FAFAF7] to-[#F5F0E8] ring-2 ring-[#FFD700]/20 -translate-y-1" 
                    : isDarkTheme
                    ? "bg-[#1A1A2E] text-[#E2E3E0] border-gray-800"
                    : "border-gray-200 bg-white"
                }`}
              >
                {/* Badge PHỔ BIẾN */}
                {plan.badge && (
                  <span className="absolute -top-3.5 left-1/2 -translate-x-1/2 bg-[#FFD700] text-[#1A1A2E] text-[10px] font-extrabold px-3 py-1 rounded-full uppercase tracking-wider shadow">
                    {plan.badge}
                  </span>
                )}

                <div className="space-y-6">
                  <div className="space-y-2">
                    <h3 className="text-lg font-extrabold tracking-wide uppercase">{plan.name}</h3>
                    <p className={`text-xs ${isDarkTheme ? "text-gray-400" : "text-gray-500"} leading-relaxed min-h-[40px]`}>
                      {plan.subtitle}
                    </p>
                  </div>

                  <div className="border-t border-b py-4 border-gray-200/50 flex items-baseline gap-1.5 matches">
                    <span className="text-2xl sm:text-3xl font-extrabold tracking-tighter">
                      {plan.price.toLocaleString("vi-VN")}
                    </span>
                    <span className={`text-[11px] font-semibold ${isDarkTheme ? "text-gray-400" : "text-gray-500"}`}>
                      VNĐ / {plan.name === "AI & Automation" ? "Dự án" : "Tháng"}
                    </span>
                  </div>

                  <ul className="space-y-3 pt-2">
                    {plan.features.map((feat, idx) => (
                      <li key={idx} className="flex items-start space-x-2 text-xs">
                        <Check size={14} className="text-[#FFD700] shrink-0 mt-0.5" />
                        <span className="leading-relaxed">{feat}</span>
                      </li>
                    ))}
                  </ul>
                </div>

                <div className="pt-8">
                  <button
                    onClick={() => setSelectedPlan(plan)}
                    className={`w-full text-center text-xs font-bold uppercase tracking-wider py-3.5 rounded transition-all shadow-sm hover:shadow hover:-translate-y-0.5 cursor-pointer ${
                      isDarkTheme
                        ? "bg-[#FFD700] hover:bg-[#E6C200] text-[#1A1A2E]"
                        : isGoldTheme
                        ? "bg-[#1A1A2E] hover:bg-neutral-800 text-white"
                        : "bg-[#F4F4F1] hover:bg-gray-200 text-[#1A1A2E] border border-gray-300"
                    }`}
                  >
                    Đăng Ký Khởi Chạy
                  </button>
                </div>
              </div>
            );
          })}
        </div>

        {/* Small Trust Disclaimer Info */}
        <p className="text-center text-xs text-gray-400 italic">
          * Đơn giá dịch vụ đã bao gồm chi phí bản quyền công cụ & hỗ trợ phân tích toàn bộ tiến trình. Hợp đồng pháp lý minh bạch cam kết KPIs.
        </p>

        {/* FAQ Section */}
        <div className="bg-white border border-gray-200 p-8 rounded-lg space-y-8 max-w-4xl mx-auto shadow-sm">
          <div className="text-center space-y-2">
            <span className="text-[10px] font-bold tracking-widest uppercase text-gray-400">Hỗ trợ nhanh</span>
            <h3 className="text-xl md:text-2xl font-bold">Câu Hỏi Thường Gặp</h3>
          </div>

          <div className="space-y-4">
            {faqs.map((faq, idx) => {
              const isOpen = activeFaq === idx;
              return (
                <div key={idx} className="border-b border-gray-100 pb-4">
                  <button
                    onClick={() => setActiveFaq(isOpen ? null : idx)}
                    className="w-full text-left flex items-center justify-between text-xs sm:text-sm font-bold text-[#1A1A2E] py-2 cursor-pointer focus:outline-none"
                  >
                    <span className="flex items-center gap-2">
                      <HelpCircle size={15} className="text-[#FFD700]" />
                      {faq.q}
                    </span>
                    <span className="text-base text-gray-400">{isOpen ? "−" : "+"}</span>
                  </button>
                  <AnimatePresence>
                    {isOpen && (
                      <motion.div
                        initial={{ opacity: 0, height: 0 }}
                        animate={{ opacity: 1, height: "auto" }}
                        exit={{ opacity: 0, height: 0 }}
                        className="overflow-hidden mt-2 text-xs text-gray-500 leading-relaxed pl-6"
                      >
                        {faq.a}
                      </motion.div>
                    )}
                  </AnimatePresence>
                </div>
              );
            })}
          </div>
        </div>
      </div>

      {/* SECURE ONLINE CHECKOUT SIMULATOR DIALOG */}
      <AnimatePresence>
        {selectedPlan && (
          <div className="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/50 backdrop-blur-sm">
            <motion.div
              initial={{ scale: 0.95, opacity: 0 }}
              animate={{ scale: 1, opacity: 1 }}
              exit={{ scale: 0.95, opacity: 0 }}
              className="bg-[#FAFAF7] w-full max-w-xl rounded-lg shadow-2xl border border-gray-200 overflow-hidden flex flex-col font-sans"
            >
              {/* Checkout dialogue header */}
              <div className="bg-[#1A1A2E] text-white px-6 py-4 flex items-center justify-between border-b border-[#FFD700]/20">
                <div className="flex items-center space-x-2">
                  <ShieldCheck size={20} className="text-[#FFD700]" />
                  <span className="text-xs font-bold uppercase tracking-widest text-[#FAFAF7]">Cổng Thanh Toán Trực Tuyến Bảo Mật</span>
                </div>
                <button
                  onClick={closeCheckout}
                  className="text-gray-400 hover:text-white transition-colors cursor-pointer text-sm"
                >
                  Đóng [✕]
                </button>
              </div>

              {/* Progress Steps Indicators */}
              <div className="grid grid-cols-3 text-center text-[10px] font-extrabold uppercase tracking-wider border-b bg-[#F5F0E8] text-gray-500">
                <div className={`py-3 ${checkoutStep >= 1 ? "text-[#1A1A2E] border-b-2 border-[#1A1A2E]" : ""}`}>1. Thông tin</div>
                <div className={`py-3 ${checkoutStep >= 2 ? "text-[#1A1A2E] border-b-2 border-[#1A1A2E]" : ""}`}>2. Phương thức</div>
                <div className={`py-3 ${checkoutStep >= 3 ? "text-green-600 border-b-2 border-green-600" : ""}`}>3. Hoàn tất</div>
              </div>

              {/* Checkout main wizard container content */}
              <div className="p-6 md:p-8 flex-1 overflow-y-auto max-h-[500px]">
                {/* Step 1: Customer info form */}
                {checkoutStep === 1 && (
                  <form onSubmit={() => setCheckoutStep(2)} className="space-y-4">
                    <div className="bg-[#F5F0E8] p-4 rounded text-xs leading-relaxed space-y-2">
                      <p className="font-bold">Đang thanh toán cho: <span className="text-[#FFD700] font-extrabold text-sm font-sans uppercase">{selectedPlan.name}</span></p>
                      <p className="text-gray-500">Đơn giá gốc: <span className="font-mono font-bold text-gray-800">{selectedPlan.price.toLocaleString("vi-VN")} VNĐ</span></p>
                    </div>

                    <div className="space-y-3">
                      <div className="space-y-1">
                        <label className="text-[10px] font-bold uppercase text-gray-500">Họ và Tên khách hàng (*)</label>
                        <div className="relative">
                          <User size={14} className="absolute left-3 top-3 text-gray-400" />
                          <input
                            type="text"
                            required
                            placeholder="Ví dụ: Nguyễn Văn A"
                            value={buyerName}
                            onChange={(e) => setBuyerName(e.target.value)}
                            className="w-full text-xs bg-white border border-gray-300 rounded pl-9 pr-3 py-2.5 focus:outline-none focus:border-[#FFD700]"
                          />
                        </div>
                      </div>

                      <div className="space-y-1">
                        <label className="text-[10px] font-bold uppercase text-gray-500">Email nhận hóa đơn số (*)</label>
                        <div className="relative">
                          <Mail size={14} className="absolute left-3 top-3 text-gray-400" />
                          <input
                            type="email"
                            required
                            placeholder="example@yourbusiness.com"
                            value={buyerEmail}
                            onChange={(e) => setBuyerEmail(e.target.value)}
                            className="w-full text-xs bg-white border border-gray-300 rounded pl-9 pr-3 py-2.5 focus:outline-none focus:border-[#FFD700]"
                          />
                        </div>
                      </div>

                      <div className="space-y-1">
                        <label className="text-[10px] font-bold uppercase text-gray-500">Số điện thoại liên hệ (*)</label>
                        <div className="relative">
                          <Phone size={14} className="absolute left-3 top-3 text-gray-400" />
                          <input
                            type="tel"
                            required
                            placeholder="Số Zalo của bạn..."
                            value={buyerPhone}
                            onChange={(e) => setBuyerPhone(e.target.value)}
                            className="w-full text-xs bg-white border border-gray-300 rounded pl-9 pr-3 py-2.5 focus:outline-none focus:border-[#FFD700]"
                          />
                        </div>
                      </div>
                    </div>

                    {/* Discount Coupon code simulation */}
                    <div className="pt-2 border-t border-gray-200">
                      <label className="text-[10px] font-bold uppercase text-gray-500 block mb-1">Mã giảm giá (Nhập: <span className="text-[#FFD700]">GROWTH2026</span> giảm 10%)</label>
                      <div className="flex gap-2">
                        <input
                          type="text"
                          placeholder="MÃ GIẢM GIÁ"
                          value={couponCode}
                          onChange={(e) => setCouponCode(e.target.value)}
                          className="bg-white border border-gray-300 rounded px-3 py-2 text-xs flex-1 uppercase focus:outline-none focus:border-[#FFD700]"
                          disabled={discountApplied}
                        />
                        <button
                          type="button"
                          onClick={handleApplyCoupon}
                          disabled={discountApplied || !couponCode}
                          className="bg-[#1A1A2E] hover:bg-neutral-800 disabled:bg-gray-200 text-white text-xs px-4 rounded font-bold cursor-pointer"
                        >
                          {discountApplied ? "Áp Dụng!" : "Kích hoạt"}
                        </button>
                      </div>
                      {discountApplied && <p className="text-[11px] text-green-600 font-semibold mt-1">Đã áp dụng giảm giá 10% thành công!</p>}
                      {discountError && <p className="text-[11px] text-red-500 mt-1">{discountError}</p>}
                    </div>

                    <button
                      type="submit"
                      disabled={!buyerName || !buyerEmail || !buyerPhone}
                      className="w-full bg-[#FFD700] hover:bg-[#E6C200] disabled:bg-gray-200 text-[#1A1A2E] font-bold text-xs uppercase py-3 rounded-lg shadow transition-all cursor-pointer mt-4"
                    >
                      Tiếp Tục Phương Thức Thanh Toán
                    </button>
                  </form>
                )}

                {/* Step 2: Select secure payment option */}
                {checkoutStep === 2 && (
                  <form onSubmit={handleCreateOrder} className="space-y-6">
                    <div className="space-y-3">
                      <label className="text-[10px] font-extrabold uppercase text-gray-500 tracking-wider">Lựa chọn cổng thanh toán:</label>
                      
                      {/* VietQR choice */}
                      <div
                        onClick={() => setPaymentMethod("qr")}
                        className={`border p-4 rounded cursor-pointer transition-all flex items-start gap-3 ${
                          paymentMethod === "qr" ? "border-[#FFD700] bg-[#F5F0E8]" : "border-gray-200 hover:bg-gray-50"
                        }`}
                      >
                        <QrCode size={18} className="text-[#FFD700] shrink-0 mt-0.5" />
                        <div>
                          <h4 className="text-xs font-bold text-[#1A1A2E]">Chuyển Khoản Nhanh VietQR (Khuyên dùng)</h4>
                          <p className="text-[11px] text-gray-500 mt-0.5">Quét QR chuyển trực tiếp qua ngân hàng, xử lý tự động trong vòng 10 giây.</p>
                        </div>
                      </div>

                      {/* Card choice */}
                      <div
                        onClick={() => setPaymentMethod("card")}
                        className={`border p-4 rounded cursor-pointer transition-all flex items-start gap-3 ${
                          paymentMethod === "card" ? "border-[#FFD700] bg-[#F5F0E8]" : "border-gray-200 hover:bg-gray-50"
                        }`}
                      >
                        <CreditCard size={18} className="text-blue-600 shrink-0 mt-0.5" />
                        <div>
                          <h4 className="text-xs font-bold text-[#1A1A2E]">Thanh toán bằng thẻ ATM nội địa / Credit Card</h4>
                          <p className="text-[11px] text-gray-500 mt-0.5">Xử lý mã hóa đầu cuối bảo mật qua ngân hàng số.</p>
                        </div>
                      </div>

                      {/* Deposit choice */}
                      <div
                        onClick={() => setPaymentMethod("deposit")}
                        className={`border p-4 rounded cursor-pointer transition-all flex items-start gap-3 ${
                          paymentMethod === "deposit" ? "border-[#FFD700] bg-[#F5F0E8]" : "border-gray-200 hover:bg-gray-50"
                        }`}
                      >
                        <Landmark size={18} className="text-green-600 shrink-0 mt-0.5" />
                        <div>
                          <h4 className="text-xs font-bold text-[#1A1A2E]">Đặt cọc giữ chỗ 20%</h4>
                          <p className="text-[11px] text-gray-500 mt-0.5">Chỉ thanh toán cọc {(calculateFinalPrice() * 0.2).toLocaleString("vi-VN")}đ, số còn lại thanh toán theo hợp đồng thực tế.</p>
                        </div>
                      </div>
                    </div>

                    <div className="bg-white border border-gray-100 p-4 rounded space-y-2 text-xs">
                      <div className="flex justify-between font-medium">
                        <span>Chi phí kế hoạch:</span>
                        <span className="font-mono">{selectedPlan.price.toLocaleString("vi-VN")}đ</span>
                      </div>
                      {discountApplied && (
                        <div className="flex justify-between text-green-600 font-medium">
                          <span>Áp mã giảm giá (10%):</span>
                          <span className="font-mono">-{ (selectedPlan.price * 0.1).toLocaleString("vi-VN") }đ</span>
                        </div>
                      )}
                      <div className="flex justify-between font-extrabold text-[#1A1A2E] border-t pt-2 text-sm">
                        <span>Tổng tiền thanh toán thực tế:</span>
                        <span className="font-mono text-[#FFD700]">{calculateFinalPrice().toLocaleString("vi-VN")} VNĐ</span>
                      </div>
                    </div>

                    <div className="flex items-center gap-2 text-[10px] text-gray-400">
                      <ShieldAlert size={14} className="text-green-600" />
                      <span>Thông tin thẻ & chuyển khoản được mã hóa độc lập 256-bit bảo mật cao.</span>
                    </div>

                    <div className="flex gap-3">
                      <button
                        type="button"
                        onClick={() => setCheckoutStep(1)}
                        className="flex-1 border text-xs font-bold uppercase py-3 rounded-lg text-gray-600 hover:bg-gray-100 transition-all cursor-pointer"
                      >
                        Quay lại
                      </button>
                      <button
                        type="submit"
                        disabled={isSubmittingOrder}
                        className="flex-1 bg-green-600 hover:bg-green-700 disabled:bg-gray-300 text-white font-bold text-xs uppercase py-3 rounded-lg transition-all cursor-pointer"
                      >
                        {isSubmittingOrder ? "Đang xử lý..." : "Xác Nhận Đặt Mua & Thanh Toán"}
                      </button>
                    </div>
                  </form>
                )}

                {/* Step 3: Confirmation receipts & VietQR Bank scanning simulation */}
                {checkoutStep === 3 && createdOrderDetails && (
                  <div className="space-y-6 text-center">
                    <div className="w-12 h-12 bg-green-100 text-green-600 rounded-full flex items-center justify-center mx-auto">
                      <CheckCircle size={28} />
                    </div>

                    <div className="space-y-1">
                      <h3 className="font-bold text-[#1A1A2E] text-base">Đăng Ký Đơn Hàng Thành Công!</h3>
                      <p className="text-xs text-gray-500">Mã giao dịch bảo mật: <strong className="font-mono text-gray-800">{createdOrderDetails.id}</strong></p>
                    </div>

                    {/* Rendering simulated high quality VietQR Transfer scan block requested */}
                    {paymentMethod === "qr" ? (
                      <div className="bg-[#F5F0E8] border border-gray-200 p-4 rounded-lg space-y-4 max-w-sm mx-auto">
                        <div className="bg-white p-3 rounded border border-gray-100 flex flex-col items-center justify-center">
                          {/* Visual mockup Bank QR code design */}
                          <div className="w-40 h-40 border-4 border-[#1A1A2E] relative flex flex-col items-center justify-center bg-gray-50 select-none">
                            <QrCode size={120} className="text-gray-800" />
                            <span className="text-[8px] font-bold bg-[#FFD700] text-[#1A1A2E] px-1 absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 rounded shadow">
                              VIETQR SECURE
                            </span>
                          </div>
                          <span className="text-[10px] font-extrabold text-[#FFD700] tracking-widest mt-2 uppercase">QUÉT MÃ ĐỂ THANH TOÁN TỰ ĐỘNG</span>
                        </div>
                        <div className="text-[11px] text-left space-y-2 text-gray-650">
                          <p>● Ngân hàng: <strong className="text-gray-900">MOCK COMMERCIAL TECHBANK</strong></p>
                          <p>● Số tài khoản: <strong className="text-gray-900 font-mono">901234567</strong></p>
                          <p>● Chủ tài khoản: <strong className="text-gray-900 uppercase">DEREK LAM SPECIALIST</strong></p>
                          <p>● Số tiền chuyển: <strong className="text-[#FFD700] font-mono text-sm">{createdOrderDetails.amount.toLocaleString("vi-VN")} VNĐ</strong></p>
                          <p>● Nội dung chuyển khoản: <strong className="text-gray-900 font-mono uppercase bg-white px-1 border">{createdOrderDetails.txHash}</strong></p>
                        </div>
                      </div>
                    ) : (
                      <div className="bg-green-50 border border-green-200 p-4 rounded-lg max-w-sm mx-auto text-xs text-left text-green-800 whitespace-pre-line">
                        {`Cổng thanh toán ATM đã xác nhận giao dịch số dư thành công!\n\nSố tiền: ${createdOrderDetails.amount.toLocaleString("vi-VN")}đ\nMã đối soát: ${createdOrderDetails.txHash}\nMột email hóa đơn bản quyền đầy đủ đã được gửi về địa chỉ: ${createdOrderDetails.clientEmail}.`}
                      </div>
                    )}

                    <p className="text-xs text-gray-500 leading-normal">
                      Hệ thống tự động hóa sẽ gửi nội dung hợp đồng số và lịch đặt tư vấn trực tiếp với anh Derek Lâm qua Email/Zalo của bạn trong vòng tối đa 15 phút.
                    </p>

                    <button
                      onClick={closeCheckout}
                      className="w-full bg-[#1A1A2E] text-white hover:bg-neutral-800 text-xs font-bold uppercase py-3 rounded-lg transition-all cursor-pointer"
                    >
                      Hoàn tất & Quay về bảng giá
                    </button>
                  </div>
                )}
              </div>
            </motion.div>
          </div>
        )}
      </AnimatePresence>
    </section>
  );
}
