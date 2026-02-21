<?php
require_once 'config.php';
?>
<div class="invoice-notes-widget mrc-widget" id="invoice-notes-widget" style="background: #fff; border-radius: 18px; box-shadow: 0 4px 18px rgba(185,28,28,0.07); border: 1.5px solid #f3f4f6; max-width: 420px; margin: 0 auto 18px auto;">
  <div class="invoice-widget-header invoice-notes-tabs" style="display: flex; gap: 0; background: #fff; border-radius: 16px 16px 0 0; overflow: hidden; margin-bottom: 0;">
    <button class="invoice-notes-tab active" data-tab="global" id="invoice-notes-tab-global" style="flex:1; background: #b91c1c; color: #fff; border: none; font-weight: 700; font-size: 1.05rem; padding: 13px 0; border-radius: 16px 16px 0 0; transition: background 0.18s, color 0.18s;">Global Notes</button>
    <button class="invoice-notes-tab" data-tab="user" id="invoice-notes-tab-user" style="flex:1; background: #fff; color: #b91c1c; border: none; font-weight: 700; font-size: 1.05rem; padding: 13px 0; border-radius: 16px 16px 0 0; transition: background 0.18s, color 0.18s;">User Notes</button>
  </div>
  <div class="invoice-notes-content" style="padding: 18px 18px 12px 18px;">
    <textarea class="invoice-notes-textarea invoice-notes-global" id="invoice-notes-global" placeholder="Write global notes here..." style="width: 100%; min-height: 70px; border-radius: 10px; border: 1.5px solid #f3f4f6; background: #fff6f6; color: #22223b; font-size: 1.01rem; padding: 12px 14px; margin-bottom: 0; box-shadow: 0 1px 4px 0 rgba(185,28,28,0.03); resize: vertical; transition: border 0.18s;"></textarea>
    <textarea class="invoice-notes-textarea invoice-notes-user" id="invoice-notes-user" placeholder="Write user notes here..." style="display:none; width: 100%; min-height: 70px; border-radius: 10px; border: 1.5px solid #f3f4f6; background: #fff6f6; color: #22223b; font-size: 1.01rem; padding: 12px 14px; margin-bottom: 0; box-shadow: 0 1px 4px 0 rgba(185,28,28,0.03); resize: vertical; transition: border 0.18s;"></textarea>
  </div>
  <script>
    // Fancy tab switching for invoice notes
    (function() {
      const widget = document.getElementById('invoice-notes-widget');
      if (!widget) return;
      const tabs = widget.querySelectorAll('.invoice-notes-tab');
      const globalTA = widget.querySelector('.invoice-notes-global');
      const userTA = widget.querySelector('.invoice-notes-user');
      tabs.forEach(tab => {
        tab.addEventListener('click', function() {
          tabs.forEach(t => {
            t.classList.remove('active');
            t.style.background = '#fff';
            t.style.color = '#b91c1c';
          });
          tab.classList.add('active');
          tab.style.background = '#b91c1c';
          tab.style.color = '#fff';
          if (tab.dataset.tab === 'global') {
            globalTA.style.display = '';
            userTA.style.display = 'none';
          } else {
            globalTA.style.display = 'none';
            userTA.style.display = '';
          }
        });
      });
    })();
  </script>
</div> 