<?php
require_once 'config.php';
?>
<div class="mrc-stockbasket-widget mrc-widget" style="background: #fff; border-radius: 18px; box-shadow: 0 4px 18px rgba(185,28,28,0.07); border: 1.5px solid #f3f4f6; max-width: 420px; margin: 0 auto 18px auto; display: flex; flex-direction: column; height: 420px; min-height: 320px;">
  <div class="mrc-widget-header" style="background: #b91c1c; color: #fff; font-size: 1.13rem; font-weight: 700; border-radius: 16px 16px 0 0; padding: 16px 20px 12px 20px; letter-spacing: 0.01em;">Stock Basket</div>
  <div style="flex: 1 1 0; padding: 18px 20px; color: #888; font-size: 1.01rem; overflow-y: auto;">
    Add stock items from the left to use on a new document
  </div>
  <div style="padding: 12px 20px 18px 20px; border-top: 1.5px solid #f3f4f6; display: flex; flex-direction: column; gap: 10px; align-items: center;">
    <input type="text" class="form-input" placeholder="Retail SubTotal" style="width: 100%; border-radius: 8px; border: 1.5px solid #f3f4f6; padding: 8px 12px; font-size: 1.01rem; margin-bottom: 8px;" disabled>
    <button class="btn-primary" style="width: 80%; max-width: 260px; border-radius: 999px; font-size: 1.08rem; padding: 12px 0; opacity: 0.6; cursor: not-allowed; background: linear-gradient(90deg, #f3f4f6 0%, #f9fafb 100%); color: #b91c1c; font-weight: 700; box-shadow: 0 2px 8px rgba(185,28,28,0.06); border: none; text-align: center; letter-spacing: 0.01em; transition: background 0.2s, color 0.2s; display: flex; align-items: center; justify-content: center;" disabled>
      <span style="width: 100%; text-align: center;">Add to New Document</span>
    </button>
  </div>
</div> 