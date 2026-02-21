<?php
// Pending Stock Return Modal
?>
<div id="pendingStockReturnModal" class="modal-overlay" style="display:none;align-items:center;justify-content:center;z-index:1300;background:rgba(0,0,0,0.18);transition:background 0.3s;">
  <div class="modal-content pending-stock-return-modal" style="max-width:99vw;width:1100px;min-width:400px;max-height:98vh;min-height:540px;overflow:auto;border-radius:18px;box-shadow:0 6px 32px rgba(0,0,0,0.14);background:#fff;border:1.5px solid #e5e7eb;z-index:1301;animation:modalPopIn 0.32s cubic-bezier(.4,1.6,.6,1) 1;">
    <!-- Toolbar -->
    <div class="modal-action-bar fancy-toolbar" style="display:flex;align-items:center;gap:10px;background:linear-gradient(90deg,#ef4444,#b91c1c);border-radius:18px 18px 0 0;padding:12px 18px;">
      <span style="font-size:1.18rem;font-weight:700;color:#fff;">Pending Stock Return: <span style='font-weight:400;'>Create or Amend</span></span>
      <span style="flex:1;"></span>
      <button class="modal-action-btn" style="background:#fff;color:#b91c1c;font-weight:700;border-radius:8px;padding:7px 16px;border:none;">Set Requested</button>
      <button class="modal-action-btn" style="background:#fff;color:#b91c1c;font-weight:700;border-radius:8px;padding:7px 16px;border:none;">Print Return</button>
      <button class="modal-action-btn" style="background:#fff;color:#b91c1c;font-weight:700;border-radius:8px;padding:7px 16px;border:none;">Email Return</button>
      <button class="modal-action-btn danger" style="background:#fff;color:#b91c1c;font-weight:700;border-radius:8px;padding:7px 16px;border:none;">Delete</button>
      <button class="modal-action-btn" id="closePendingStockReturnModal" style="background:#fff;color:#b91c1c;font-weight:700;border-radius:8px;padding:7px 16px;border:none;"><i class="fas fa-times"></i> Close</button>
    </div>
    <!-- Main Content -->
    <div style="display:flex;gap:0;min-height:480px;">
      <!-- Left: Tabs and Table -->
      <div style="flex:1.2;display:flex;flex-direction:column;border-right:1.5px solid #f3f4f6;background:#fff;">
        <!-- Tabs -->
        <div class="pending-tabs smart-tabs">
          <button class="pending-tab active" data-tab="search">Search</button>
          <button class="pending-tab" data-tab="avail">Available Stock</button>
        </div>
        <!-- Tab Contents -->
        <div class="pending-tab-content" data-tab="search" style="flex:1;overflow:auto;padding:0 12px 12px 12px;display:block;">
          <div class="search-filters-row">
            <div class="search-filter search-filter-wide">
              <input type="text" placeholder="Stock Search" class="search-input">
              <button class="search-btn"><i class="fas fa-search"></i></button>
              <button class="clear-btn"><i class="fas fa-times"></i></button>
            </div>
            <div class="search-filter search-filter-wide">
              <input type="text" placeholder="Supplier" class="search-input">
              <button class="search-btn"><i class="fas fa-search"></i></button>
              <button class="clear-btn"><i class="fas fa-times"></i></button>
            </div>
            <div class="search-filter search-filter-wide">
              <select class="search-select">
                <option value="">Manufacturer</option>
                <option>ACME</option>
                <option>MotorWorks</option>
                <option>AutoParts Co</option>
              </select>
              <button class="clear-btn"><i class="fas fa-times"></i></button>
            </div>
          </div>
          <table class="mrc-orders-table" style="width:100%;margin-top:0;">
            <thead>
              <tr>
                <th>Part Number</th>
                <th>Description</th>
                <th>Supplier</th>
                <th>Qty</th>
                <th>Avail</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>RET001</td>
                <td>Brake Disc</td>
                <td>AutoZone</td>
                <td>0</td>
                <td>0</td>
                <td style="text-align:center;"><button class="table-chevron-btn" title="View"><i class="fas fa-chevron-right"></i></button></td>
              </tr>
              <tr>
                <td>RET002</td>
                <td>Oil Filter</td>
                <td>CarParts Inc</td>
                <td>0</td>
                <td>0</td>
                <td style="text-align:center;"><button class="table-chevron-btn" title="View"><i class="fas fa-chevron-right"></i></button></td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="pending-tab-content" data-tab="avail" style="flex:1;overflow:auto;padding:0 12px 12px 12px;display:none;">
          <div class="search-filters-row">
            <div class="search-filter search-filter-wide">
              <input type="text" placeholder="Supplier" class="search-input">
              <button class="search-btn"><i class="fas fa-search"></i></button>
              <button class="clear-btn"><i class="fas fa-times"></i></button>
            </div>
          </div>
          <table class="mrc-orders-table" style="width:100%;margin-top:0;">
            <thead>
              <tr>
                <th>Part Number</th>
                <th>Description</th>
                <th>Supplier</th>
                <th>Qty</th>
                <th>Avail</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>RET003</td>
                <td>Air Filter</td>
                <td>MotorMax</td>
                <td>2</td>
                <td>2</td>
              </tr>
              <tr>
                <td>RET004</td>
                <td>Wiper Blade</td>
                <td>AutoZone</td>
                <td>1</td>
                <td>1</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <!-- Right: Form and Items Table -->
      <div style="flex:1;display:flex;flex-direction:column;padding:18px 18px 0 18px;min-width:340px;max-width:420px;">
        <form style="display:grid;grid-template-columns:1fr 1fr;gap:10px 16px;margin-bottom:12px;align-items:center;">
          <div style="grid-column:1/3;display:flex;align-items:center;gap:12px;">
            <label for="supplier-select-return" style="font-weight:600;color:#b91c1c;white-space:nowrap;margin-bottom:0;">Supplier</label>
            <select id="supplier-select-return" style="flex:1;min-width:0;max-width:100%;padding:8px 24px 8px 10px;border-radius:8px;border:1.5px solid #e5e7eb;background:#f9fafb;color:#b91c1c;font-weight:600;outline:none;appearance:none;-webkit-appearance:none;-moz-appearance:none;background-image:url('data:image/svg+xml;utf8,<svg fill=%22%23b91c1c%22 height=%2218%22 viewBox=%220 0 20 20%22 width=%2218%22 xmlns=%22http://www.w3.org/2000/svg%22><path d=%22M7.293 7.293a1 1 0 011.414 0L10 8.586l1.293-1.293a1 1 0 111.414 1.414l-2 2a1 1 0 01-1.414 0l-2-2a1 1 0 010-1.414z%22/></svg>');background-repeat:no-repeat;background-position:right 8px center;background-size:18px 18px;transition:border 0.18s,box-shadow 0.18s;">
              <option value="">Select Supplier</option>
              <option>AutoZone</option>
              <option>CarParts Inc</option>
              <option>MotorMax</option>
            </select>
          </div>
          <label style="grid-column:1/2;font-weight:600;color:#b91c1c;">Telephone
            <input type="text" style="width:100%;padding:7px 10px;border-radius:7px;border:1.5px solid #e5e7eb;background:#f9fafb;">
          </label>
          <label style="grid-column:2/3;font-weight:600;color:#b91c1c;">Acc
            <input type="text" style="width:100%;padding:7px 10px;border-radius:7px;border:1.5px solid #e5e7eb;background:#f9fafb;">
          </label>
          <label style="grid-column:1/2;font-weight:600;color:#b91c1c;">Order No.
            <input type="text" style="width:100%;padding:7px 10px;border-radius:7px;border:1.5px solid #e5e7eb;background:#f9fafb;">
          </label>
          <label style="grid-column:2/3;font-weight:600;color:#b91c1c;">Total Items
            <input type="text" value="0" style="width:100%;padding:7px 10px;border-radius:7px;border:1.5px solid #e5e7eb;background:#f9fafb;">
          </label>
          <label style="grid-column:1/2;font-weight:600;color:#b91c1c;">Date
            <input type="date" style="width:100%;padding:7px 10px;border-radius:7px;border:1.5px solid #e5e7eb;background:#f9fafb;">
          </label>
          <label style="grid-column:2/3;font-weight:600;color:#b91c1c;">Total Qty
            <input type="text" style="width:100%;padding:7px 10px;border-radius:7px;border:1.5px solid #e5e7eb;background:#f9fafb;">
          </label>
          <label style="grid-column:1/2;font-weight:600;color:#b91c1c;">Status
            <input type="text" style="width:100%;padding:7px 10px;border-radius:7px;border:1.5px solid #e5e7eb;background:#f9fafb;">
          </label>
          <label style="grid-column:2/3;font-weight:600;color:#b91c1c;">Type
            <input type="text" style="width:100%;padding:7px 10px;border-radius:7px;border:1.5px solid #e5e7eb;background:#f9fafb;">
          </label>
        </form>
        <div style="font-weight:700;color:#b91c1c;font-size:1.08rem;margin-bottom:6px;">Items for Return</div>
        <div style="flex:1;overflow:auto;">
          <table class="mrc-orders-table" style="width:100%;">
            <thead>
              <tr>
                <th>Part Number</th>
                <th>Description</th>
                <th>Qty</th>
              </tr>
            </thead>
            <tbody>
              <tr><td>RET001</td><td>Brake Disc</td><td>1</td></tr>
              <tr><td>RET002</td><td>Oil Filter</td><td>2</td></tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<style>
.smart-tabs {
  display: flex;
  background: #f7f7f7;
  border-radius: 999px;
  box-shadow: 0 2px 8px rgba(185,28,28,0.04);
  margin: 18px 18px 0 18px;
  padding: 4px;
  gap: 2px;
  width: calc(100% - 36px);
  align-items: center;
  justify-content: flex-start;
}
.pending-tab {
  flex: 1;
  font-size: 1.04rem;
  font-weight: 700;
  color: #b91c1c;
  background: none;
  border: none;
  border-radius: 999px;
  padding: 10px 0;
  margin: 0 2px;
  transition: background 0.18s, color 0.18s, box-shadow 0.18s;
  cursor: pointer;
  box-shadow: none;
  outline: none;
  position: relative;
  z-index: 1;
}
.pending-tab.active {
  background: #ef4444;
  color: #fff;
  font-weight: 900;
  box-shadow: 0 2px 8px rgba(185,28,28,0.10);
  z-index: 2;
}
.pending-tab:not(.active):hover {
  background: #fde8e8;
  color: #b91c1c;
}
.pending-tab-content { display: none; }
.pending-tab-content.active { display: block !important; }
.empty-state {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  height: 220px;
  background: #f9fafb;
  border-radius: 18px;
  border: 1.5px dashed #ef4444;
  margin: 32px 0 0 0;
  box-shadow: 0 2px 8px rgba(185,28,28,0.03);
}
.empty-icon {
  font-size: 2.8rem;
  color: #ef4444;
  margin-bottom: 12px;
}
.empty-title {
  font-size: 1.18rem;
  font-weight: 700;
  color: #b91c1c;
  margin-bottom: 4px;
}
.empty-desc {
  color: #b1b1b1;
  font-size: 1.01rem;
  text-align: center;
}
.table-chevron-btn {
  background: none;
  border: none;
  color: #b91c1c;
  font-size: 1.18rem;
  cursor: pointer;
  padding: 4px 8px;
  border-radius: 6px;
  transition: background 0.18s, color 0.18s;
}
.table-chevron-btn:hover {
  background: #fde8e8;
  color: #ef4444;
}
.search-filters-row {
  display: flex;
  gap: 10px;
  align-items: center;
  background: #f7f7f7;
  border-radius: 10px 10px 0 0;
  padding: 10px 0 10px 0;
  margin-bottom: 0.5rem;
}
.search-filter {
  display: flex;
  align-items: center;
  background: #fff;
  border-radius: 8px;
  border: 1.5px solid #eee;
  padding: 0 6px;
  gap: 4px;
}
.search-filter-wide {
  flex: 1;
  min-width: 120px;
}
.search-input {
  border: none;
  background: transparent;
  padding: 8px 6px;
  font-size: 1rem;
  color: #b91c1c;
  font-weight: 600;
  outline: none;
  width: 100%;
}
.search-btn {
  background: none;
  border: none;
  color: #b91c1c;
  font-size: 1.1rem;
  cursor: pointer;
  padding: 4px 6px;
  border-radius: 6px;
  transition: background 0.18s, color 0.18s;
}
.search-btn:hover {
  background: #fde8e8;
  color: #ef4444;
}
.clear-btn {
  background: none;
  border: none;
  color: #b1b1b1;
  font-size: 1.1rem;
  cursor: pointer;
  padding: 4px 6px;
  border-radius: 6px;
  transition: background 0.18s, color 0.18s;
}
.clear-btn:hover {
  background: #fde8e8;
  color: #ef4444;
}
.search-select {
  border: none;
  background: transparent;
  padding: 8px 24px 8px 8px;
  font-size: 1rem;
  color: #b91c1c;
  font-weight: 600;
  outline: none;
  border-radius: 8px;
  appearance: none;
  -webkit-appearance: none;
  -moz-appearance: none;
  background-image: url('data:image/svg+xml;utf8,<svg fill="%23b91c1c" height="18" viewBox="0 0 20 20" width="18" xmlns="http://www.w3.org/2000/svg"><path d="M7.293 7.293a1 1 0 011.414 0L10 8.586l1.293-1.293a1 1 0 111.414 1.414l-2 2a1 1 0 01-1.414 0l-2-2a1 1 0 010-1.414z"/></svg>');
  background-repeat: no-repeat;
  background-position: right 8px center;
  background-size: 18px 18px;
  transition: border 0.18s, box-shadow 0.18s;
  min-width: 120px;
}
.search-select:focus {
  background-color: #fde8e8;
  box-shadow: 0 0 0 2px #ef4444;
}
.search-select option {
  color: #222;
}
#supplier-select-return:focus {
  background-color: #fde8e8;
  box-shadow: 0 0 0 2px #ef4444;
}
#supplier-select-return option {
  color: #222;
}
</style>
<script>
document.addEventListener('DOMContentLoaded', function() {
  const modal = document.getElementById('pendingStockReturnModal');
  const closeBtn = document.getElementById('closePendingStockReturnModal');
  if (closeBtn) {
    closeBtn.addEventListener('click', function() {
      modal.style.display = 'none';
    });
  }
  // Tab logic
  const tabBtns = modal.querySelectorAll('.pending-tab');
  const tabContents = modal.querySelectorAll('.pending-tab-content');
  tabBtns.forEach(btn => {
    btn.addEventListener('click', function() {
      tabBtns.forEach(b => b.classList.remove('active'));
      this.classList.add('active');
      const tab = this.getAttribute('data-tab');
      tabContents.forEach(content => {
        if(content.getAttribute('data-tab') === tab) {
          content.classList.add('active');
          content.style.display = 'block';
        } else {
          content.classList.remove('active');
          content.style.display = 'none';
        }
      });
    });
  });
  // Set default active tab
  tabContents.forEach(content => {
    if(content.getAttribute('data-tab') === 'search') {
      content.classList.add('active');
      content.style.display = 'block';
    } else {
      content.classList.remove('active');
      content.style.display = 'none';
    }
  });
});
</script> 