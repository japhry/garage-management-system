<?php
// Stock Order Management Modal
?>
<div id="stockOrdersModal" class="modal-overlay" style="display:none;align-items:center;justify-content:center;z-index:1200;background:rgba(0,0,0,0.18);transition:background 0.3s;">
  <div class="modal-content stock-orders-modal" style="max-width:99vw;width:1200px;min-width:400px;max-height:98vh;min-height:540px;overflow:auto;border-radius:18px;box-shadow:0 6px 32px rgba(0,0,0,0.14);background:#fff;border:1.5px solid #e5e7eb;z-index:1201;animation:modalPopIn 0.32s cubic-bezier(.4,1.6,.6,1) 1;">
    <!-- Toolbar -->
    <div class="modal-action-bar fancy-toolbar" style="display:flex;align-items:center;gap:10px;background:linear-gradient(90deg,#ef4444,#b91c1c);border-radius:18px 18px 0 0;padding:12px 18px;">
      <span style="font-size:1.18rem;font-weight:700;color:#fff;">Stock Order Management</span>
      <span style="flex:1;"></span>
      <button class="modal-action-btn tab-btn active" data-tab="new-order" style="background:#fff;color:#b91c1c;font-weight:700;border-radius:8px;padding:7px 18px;border:none;">New Order</button>
      <button class="modal-action-btn tab-btn" data-tab="new-return" style="background:#fff;color:#b91c1c;font-weight:700;border-radius:8px;padding:7px 18px;border:none;">New Return</button>
      <button class="modal-action-btn" id="closeStockOrdersModal" style="background:#fff;color:#b91c1c;font-weight:700;border-radius:8px;padding:7px 18px;border:none;"><i class="fas fa-times"></i> Close</button>
    </div>
    <!-- Main Content -->
    <div style="padding:0 0 18px 0;">
      <!-- Current Orders Table -->
      <div style="padding:18px 24px 0 24px;">
        <div style="overflow-x:auto;background:#fff;border-radius:12px 12px 0 0;box-shadow:0 2px 8px rgba(185,28,28,0.04);">
          <table class="mrc-orders-table" style="width:100%;border-collapse:separate;border-spacing:0;">
            <thead>
              <tr style="background:#fde8e8;color:#b91c1c;font-weight:700;">
                <th style="padding:10px 8px;text-align:left;">Created</th>
                <th style="padding:10px 8px;text-align:left;">Type</th>
                <th style="padding:10px 8px;text-align:left;">Order No.</th>
                <th style="padding:10px 8px;text-align:left;">Order Date / Time</th>
                <th style="padding:10px 8px;text-align:left;">Supplier</th>
                <th style="padding:10px 8px;text-align:left;">Note</th>
                <th style="padding:10px 8px;text-align:left;">Items</th>
                <th style="padding:10px 8px;text-align:left;">Qty</th>
                <th style="padding:10px 8px;text-align:left;">Status</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>2024-07-01</td>
                <td>Order</td>
                <td>ORD-1001</td>
                <td>2024-07-01 10:30</td>
                <td><span class="mrc-supplier">AutoZone</span></td>
                <td>Urgent</td>
                <td>3</td>
                <td>45</td>
                <td><span class="mrc-status completed">Completed</span></td>
              </tr>
              <tr>
                <td>2024-07-02</td>
                <td>Return</td>
                <td>RET-2002</td>
                <td>2024-07-02 14:15</td>
                <td><span class="mrc-supplier">CarParts Inc</span></td>
                <td>Defective</td>
                <td>1</td>
                <td>12</td>
                <td><span class="mrc-status pending">Pending</span></td>
              </tr>
              <tr>
                <td>2024-07-03</td>
                <td>Order</td>
                <td>ORD-1003</td>
                <td>2024-07-03 09:00</td>
                <td><span class="mrc-supplier">MotorMax</span></td>
                <td>-</td>
                <td>2</td>
                <td>8</td>
                <td><span class="mrc-status processing">Processing</span></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <!-- Previous Orders / Returns -->
      <div style="margin-top:32px;padding:0 24px;">
        <div style="font-weight:700;color:#b91c1c;font-size:1.18rem;margin-bottom:2px;">Previous Orders / Returns</div>
        <div style="overflow-x:auto;background:#fff;border-radius:0 0 12px 12px;box-shadow:0 2px 8px rgba(185,28,28,0.04);">
          <table class="mrc-orders-table" style="width:100%;border-collapse:separate;border-spacing:0;">
            <thead>
              <tr style="background:#fde8e8;color:#b91c1c;font-weight:700;">
                <th style="padding:10px 8px;text-align:left;">Created</th>
                <th style="padding:10px 8px;text-align:left;">Type</th>
                <th style="padding:10px 8px;text-align:left;">Order No.</th>
                <th style="padding:10px 8px;text-align:left;">Order Date / Time</th>
                <th style="padding:10px 8px;text-align:left;">Supplier</th>
                <th style="padding:10px 8px;text-align:left;">Qty</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>2024-06-28</td>
                <td>Order</td>
                <td>ORD-0999</td>
                <td>2024-06-28 11:00</td>
                <td><span class="mrc-supplier">AutoZone</span></td>
                <td>20</td>
              </tr>
              <tr>
                <td>2024-06-25</td>
                <td>Return</td>
                <td>RET-1998</td>
                <td>2024-06-25 15:45</td>
                <td><span class="mrc-supplier">CarParts Inc</span></td>
                <td>5</td>
              </tr>
              <tr>
                <td>2024-06-20</td>
                <td>Order</td>
                <td>ORD-0995</td>
                <td>2024-06-20 09:30</td>
                <td><span class="mrc-supplier">MotorMax</span></td>
                <td>10</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div style="display:flex;align-items:center;justify-content:flex-end;margin-top:8px;gap:10px;">
          <span style="color:#b91c1c;font-weight:600;">Max Results</span>
          <select style="border-radius:8px;padding:6px 18px;font-weight:600;border:1.5px solid #eee;color:#b91c1c;background:#fff;">
            <option>50</option>
            <option>100</option>
            <option>250</option>
            <option>500</option>
            <option>1,000</option>
            <option>5,000</option>
            <option>All</option>
          </select>
        </div>
      </div>
    </div>
  </div>
</div>
<style>
.mrc-orders-table {
  width: 100%;
  border-radius: 18px;
  overflow: hidden;
  background: #fff;
  box-shadow: 0 6px 32px rgba(185,28,28,0.10), 0 1.5px 0 #f3f4f6;
  border: 2.5px solid #f3f4f6;
  font-size: 1.09rem;
  margin-bottom: 24px;
  letter-spacing: 0.01em;
}
.mrc-orders-table thead tr {
  background: #fde8e8;
  color: #b91c1c;
  font-weight: 800;
  font-size: 1.08rem;
  border-radius: 18px 18px 0 0;
  box-shadow: 0 2px 8px rgba(185,28,28,0.04);
}
.mrc-orders-table th {
  padding: 18px 14px;
  text-align: left;
  background: #fde8e8;
  color: #b91c1c;
  font-weight: 800;
  font-size: 1.08rem;
  border-bottom: 2px solid #f3f4f6;
  letter-spacing: 0.02em;
}
.mrc-orders-table td {
  padding: 16px 14px;
  font-size: 1.07rem;
  color: #222;
  border-bottom: 1.5px solid #f3f4f6;
  background: #fff;
  vertical-align: middle;
}
.mrc-orders-table tbody tr {
  background: #fff;
  transition: background 0.18s, box-shadow 0.18s;
  border-radius: 0 0 18px 18px;
}
.mrc-orders-table tbody tr:nth-child(even) {
  background: #f9fafb;
}
.mrc-orders-table tbody tr:hover {
  background: #fff1f2;
  box-shadow: 0 2px 12px rgba(185,28,28,0.08);
}
.mrc-orders-table td:focus {
  outline: 2px solid #ef4444;
  background: #fff0f1;
}
.mrc-supplier {
  color: #b91c1c;
  font-weight: 700;
}
.mrc-status.completed {
  color: #10b981;
  font-weight: 700;
}
.mrc-status.pending {
  color: #ef4444;
  font-weight: 700;
}
.mrc-status.processing {
  color: #f59e0b;
  font-weight: 700;
}
</style>
<script>
document.addEventListener('DOMContentLoaded', function() {
  // Open/close logic will be added in stock.php
  // Tab logic
  const modal = document.getElementById('stockOrdersModal');
  const tabBtns = modal.querySelectorAll('.tab-btn');
  tabBtns.forEach(btn => {
    btn.addEventListener('click', function() {
      tabBtns.forEach(b => b.classList.remove('active'));
      this.classList.add('active');
      // You can add logic here to show/hide content for each tab if needed
    });
  });
  // Close button
  const closeBtn = document.getElementById('closeStockOrdersModal');
  if (closeBtn) {
    closeBtn.addEventListener('click', function() {
      modal.style.display = 'none';
    });
  }

  // New Order button logic
  const newOrderBtn = modal.querySelector('.tab-btn[data-tab="new-order"]');
  if (newOrderBtn) {
    newOrderBtn.addEventListener('click', function() {
      // Show the pending stock order modal
      const pendingModal = document.getElementById('pendingStockOrderModal');
      if (pendingModal) {
        pendingModal.style.display = 'flex';
        // Optionally hide the current modal
        // modal.style.display = 'none';
      }
    });
  }
  // New Return button logic
  const newReturnBtn = modal.querySelector('.tab-btn[data-tab="new-return"]');
  if (newReturnBtn) {
    newReturnBtn.addEventListener('click', function() {
      // Show the pending stock return modal
      const pendingReturnModal = document.getElementById('pendingStockReturnModal');
      if (pendingReturnModal) {
        pendingReturnModal.style.display = 'flex';
        // Optionally hide the current modal
        // modal.style.display = 'none';
      }
    });
  }
});
</script> 