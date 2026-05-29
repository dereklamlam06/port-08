export type AppView = "home" | "services" | "portfolio" | "pricing" | "about" | "contact" | "blog" | "404";

export interface Lead {
  id: string;
  name: string;
  email: string;
  phone: string;
  service: string;
  message: string;
  date: string;
  status: "new" | "contacted" | "qualified";
}

export interface Order {
  id: string;
  clientName: string;
  clientEmail: string;
  servicePackage: string;
  amount: number;
  paymentMethod: string;
  status: "pending" | "completed" | "failed";
  date: string;
  txHash?: string;
}

export interface ChatMessage {
  id: string;
  sender: "user" | "bot";
  text: string;
  timestamp: string;
}

export interface ChatLog {
  id: string;
  userMessage: string;
  botReply: string;
  date: string;
  clientEmail?: string;
}

export interface ServicePlan {
  id: string;
  name: string;
  subtitle: string;
  price: number;
  priceLabel: string;
  features: string[];
  badge?: string;
  colorTheme: "light" | "gold" | "dark";
}

export interface CaseStudy {
  id: string;
  title: string;
  category: "seo" | "web" | "automation";
  projectYear: string;
  imageUrl: string;
  clientIndustry: string;
  description: string;
  metrics: {
    label: string;
    value: string;
  }[];
  initialState?: string; // Ban đầu / Nhận web
  problem?: string;      // Vấn đề
  fix?: string;          // Khắc phục / Fix
  results?: string[];    // Kết quả đạt được
  proofImageInitial?: string;
  proofImageProblem?: string;
  proofImageFix?: string;
  proofImageResults?: string;
}
