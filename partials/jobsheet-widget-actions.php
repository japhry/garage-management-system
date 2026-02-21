<?php
require_once 'config.php';
?>
<div class="jobsheet-actions-widget mrc-widget" id="jobsheet-actions-widget" style="background: #fff; border-radius: 18px; box-shadow: 0 4px 18px rgba(185,28,28,0.07); border: 1.5px solid #f3f4f6; max-width: 420px; margin: 0 auto 18px auto;">
  <div class="jobsheet-widget-header" style="font-size: 1.13rem; font-weight: 700; color: #22223b; padding: 18px 20px 10px 20px; border-radius: 16px 16px 0 0; letter-spacing: 0.01em;">Quick Actions</div>
  <hr style="margin: 0 20px 0 20px; border: none; border-top: 1.5px solid #f3f4f6;">
  <div class="jobsheet-actions-list" style="padding: 18px 20px 18px 20px; display: flex; flex-direction: column; gap: 12px;">
    <button id="quick-action-new-job-sheet" class="jobsheet-action-btn" style="background: #b91c1c; color: #fff; font-weight: 700; font-size: 1.05rem; border: none; border-radius: 8px; padding: 12px 0; display: flex; align-items: center; justify-content: center; gap: 8px; cursor: pointer;">
      <span style="font-size: 1.15rem;">&#43;</span> New Job Sheet
    </button>
    <button class="jobsheet-action-btn" style="background: #f3f4f6; color: #22223b; font-weight: 600; font-size: 1.05rem; border: none; border-radius: 8px; padding: 12px 0; display: flex; align-items: center; justify-content: center; gap: 8px; cursor: pointer;">
      <span style="font-size: 1.15rem;">&#128269;</span> Search Job Sheets
    </button>
    <button class="jobsheet-action-btn" style="background: #f3f4f6; color: #22223b; font-weight: 600; font-size: 1.05rem; border: none; border-radius: 8px; padding: 12px 0; display: flex; align-items: center; justify-content: center; gap: 8px; cursor: pointer;">
      <span style="font-size: 1.15rem;">&#128190;</span> Export Data
    </button>
  </div>
</div> 