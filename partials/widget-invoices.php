<?php
require_once 'config.php';
?>
<div class="services-widget mrc-fancy-invoices-widget" style="background: white; border-radius: 18px; padding: 32px 28px 28px 28px; box-shadow: 0 6px 32px rgba(8,145,178,0.09); margin-bottom: 32px;">
  <h3 style="margin: 0 0 24px 0; color: #0891b2; font-size: 1.45rem; font-weight: 800; letter-spacing: 0.01em;">Invoices</h3>
  <div class="mrc-fancy-chart-container" style="display: flex; flex-direction: column; align-items: center;">
    <div class="mrc-fancy-donut" style="position: relative; width: 170px; height: 170px; margin-bottom: 10px;">
      <svg width="170" height="170" style="transform: rotate(-90deg);">
        <defs>
          <linearGradient id="inv-inprogress-gradient" x1="0" y1="0" x2="1" y2="1">
            <stop offset="0%" stop-color="#38bdf8"/>
            <stop offset="100%" stop-color="#0ea5e9"/>
          </linearGradient>
          <linearGradient id="inv-open-gradient" x1="0" y1="0" x2="1" y2="1">
            <stop offset="0%" stop-color="#fcd34d"/>
            <stop offset="100%" stop-color="#f59e42"/>
          </linearGradient>
          <linearGradient id="inv-completed-gradient" x1="0" y1="0" x2="1" y2="1">
            <stop offset="0%" stop-color="#6ee7b7"/>
            <stop offset="100%" stop-color="#10b981"/>
          </linearGradient>
          <linearGradient id="inv-onhold-gradient" x1="0" y1="0" x2="1" y2="1">
            <stop offset="0%" stop-color="#fca5a5"/>
            <stop offset="100%" stop-color="#ef4444"/>
          </linearGradient>
        </defs>
        <circle cx="85" cy="85" r="70" fill="none" stroke="#f3f4f6" stroke-width="18" />
        <!-- In Progress: 4/21 -->
        <circle cx="85" cy="85" r="70" fill="none" stroke="url(#inv-inprogress-gradient)" stroke-width="18" stroke-dasharray="83.8 439.6" stroke-dashoffset="0" stroke-linecap="round" style="transition: stroke-dasharray 1s;"/>
        <!-- Open: 6/21 -->
        <circle cx="85" cy="85" r="70" fill="none" stroke="url(#inv-open-gradient)" stroke-width="18" stroke-dasharray="125.6 439.6" stroke-dashoffset="-83.8" stroke-linecap="round" style="transition: stroke-dasharray 1s;"/>
        <!-- Completed: 10/21 -->
        <circle cx="85" cy="85" r="70" fill="none" stroke="url(#inv-completed-gradient)" stroke-width="18" stroke-dasharray="209.5 439.6" stroke-dashoffset="-209.4" stroke-linecap="round" style="transition: stroke-dasharray 1s;"/>
        <!-- On Hold: 1/21 -->
        <circle cx="85" cy="85" r="70" fill="none" stroke="url(#inv-onhold-gradient)" stroke-width="18" stroke-dasharray="20.7 439.6" stroke-dashoffset="-418.9" stroke-linecap="round" style="transition: stroke-dasharray 1s;"/>
      </svg>
      <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center;">
        <div style="
          font-size: 2.1rem;
          font-weight: 900;
          color: #22223b;
          letter-spacing: -0.01em;
          font-family: 'Montserrat', 'Segoe UI', Arial, sans-serif;
          text-shadow: 0 2px 8px #22223b22, 0 1px 0 #fff;
          background: none;
          filter: drop-shadow(0 1px 4px #22223b22);
          margin-bottom: 0px;
          animation: mrc-glow 2.2s infinite alternate;
        ">
          21
        </div>
        <div style="
          font-size: 0.82rem;
          color: #22223b;
          font-weight: 700;
          margin-top: 0px;
          letter-spacing: 0.01em;
          font-family: 'Montserrat', 'Segoe UI', Arial, sans-serif;
          text-shadow: 0 1px 0 #fff, 0 1px 4px #f8d7da;
          opacity: 0.93;
        ">
          Total Invoices
        </div>
        <style>
        @keyframes mrc-glow {
          0% { filter: drop-shadow(0 1px 4px #22223b22); }
          100% { filter: drop-shadow(0 2px 12px #22223b55); }
        }
        </style>
      </div>
    </div>
    <div class="mrc-fancy-legend" style="display: grid; grid-template-columns: 1fr 1fr; gap: 18px 12px; width: 100%; margin-top: 22px;">
      <div style="text-align: center;">
        <div style="width: 16px; height: 16px; background: linear-gradient(90deg,#38bdf8,#0ea5e9); border-radius: 50%; margin: 0 auto 7px;"></div>
        <div style="font-size: 1.18rem; font-weight: 800; color: #0ea5e9;">4</div>
        <div style="font-size: 0.92rem; color: #0ea5e9; font-weight: 600;">In Progress</div>
      </div>
      <div style="text-align: center;">
        <div style="width: 16px; height: 16px; background: linear-gradient(90deg,#fcd34d,#f59e42); border-radius: 50%; margin: 0 auto 7px;"></div>
        <div style="font-size: 1.18rem; font-weight: 800; color: #f59e42;">6</div>
        <div style="font-size: 0.92rem; color: #f59e42; font-weight: 600;">Open</div>
      </div>
      <div style="text-align: center;">
        <div style="width: 16px; height: 16px; background: linear-gradient(90deg,#6ee7b7,#10b981); border-radius: 50%; margin: 0 auto 7px;"></div>
        <div style="font-size: 1.18rem; font-weight: 800; color: #10b981;">10</div>
        <div style="font-size: 0.92rem; color: #10b981; font-weight: 600;">Completed</div>
      </div>
      <div style="text-align: center;">
        <div style="width: 16px; height: 16px; background: linear-gradient(90deg,#fca5a5,#ef4444); border-radius: 50%; margin: 0 auto 7px;"></div>
        <div style="font-size: 1.18rem; font-weight: 800; color: #ef4444;">1</div>
        <div style="font-size: 0.92rem; color: #ef4444; font-weight: 600;">On Hold</div>
      </div>
    </div>
  </div>
</div> 