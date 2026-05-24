import React from "react";

interface LogoProps {
  className?: string;
  width?: number | string;
  height?: number | string;
  light?: boolean;
}

export default function LogoIcon({ className = "", width = 135, height = 54, light = false }: LogoProps) {
  return (
    <svg 
      viewBox="0 0 400 160" 
      width={width} 
      height={height} 
      fill="none" 
      xmlns="http://www.w3.org/2000/svg"
      className={className}
    >
      {/* Golden container with rounded borders */}
      <rect 
        x="10" 
        y="10" 
        width="380" 
        height="140" 
        rx="28" 
        stroke="#FFD700" 
        strokeWidth="8" 
        fill={light ? "#FAFAF8" : "transparent"} 
      />
      
      {/* 3 Top-Left Window Action Dots */}
      <circle cx="50" cy="45" r="10" fill="#FF5F56" />
      <circle cx="85" cy="45" r="10" fill="#FFBD2E" />
      <circle cx="120" cy="45" r="10" fill="#27C93F" />
      
      {/* Prompt indicator: >_ */}
      <path 
        d="M50 82L70 95L50 108" 
        stroke="#FFD700" 
        strokeWidth="9" 
        strokeLinecap="round" 
        strokeLinejoin="round" 
      />
      <line 
        x1="82" 
        y1="108" 
        x2="102" 
        y2="108" 
        stroke="#FFD700" 
        strokeWidth="9" 
        strokeLinecap="round" 
      />
      
      {/* Text: derek.flow */}
      <text 
        x="125" 
        y="107" 
        fill={light ? "#1A1A2E" : "#D1D5DB"} 
        fontFamily="ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, 'Liberation Mono', 'Courier New', monospace" 
        fontSize="41" 
        fontWeight="bold" 
        letterSpacing="1"
      >
        derek.flow
      </text>
      
      {/* Yellow cursor block at the end */}
      <rect x="348" y="78" width="18" height="30" fill="#FFD700" />
    </svg>
  );
}
