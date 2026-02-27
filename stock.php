<?php
require_once 'config.php';
renderHeader();
?>
<?php include 'partials/sidebar.php'; ?>
<div class="main-content">
  <?php include 'partials/header.php'; ?>
  <div class="dashboard-layout">
    <div class="left-content">
      <!-- Stock Toolbar (like vehicle page) -->
      <div class="content-section" style="margin-bottom: 0.5rem;">
        <div class="section-header" style="display: flex; align-items: center; justify-content: space-between; gap: 1.5rem; background: #fff; border-radius: 12px; box-shadow: 0 2px 12px rgba(236,32,37,0.07); border: 1px solid var(--accent-light); padding: 18px 22px 18px 22px; margin-bottom: 0.5rem;">
          <div style="display: flex; align-items: center; gap: 1.2rem;">
            <h2 class="section-title" style="margin-bottom: 0;">Stock Database: <span style="font-weight: 400; color: var(--gray-500); font-size: 1.1rem;">All <span style="font-size: 0.95rem;">(Showing 4 Records)</span></span></h2>
          </div>
          <div style="display: flex; align-items: center; gap: 0.5rem; position: relative;">
            <button class="btn-secondary max-results-label" style="background: var(--accent-solid); color: #fff; font-weight: 600; border-radius: 999px 0 0 999px; box-shadow: 0 2px 8px rgba(236,32,37,0.08); padding: 8px 18px 8px 16px; border-right: none;">Max Results</button>
            <div class="max-results-dropdown" style="position: relative;">
              <button class="btn-secondary max-results-btn" id="maxResultsBtn" style="background: #fff; color: var(--accent-solid); font-weight: 700; min-width: 80px; border-radius: 0 999px 999px 0; border-left: 1.5px solid var(--accent-light); box-shadow: 0 2px 8px rgba(236,32,37,0.08); padding: 8px 24px 8px 18px; display: flex; align-items: center; gap: 8px; font-size: 1.08rem;">500 <i class="fas fa-caret-down" style="margin-left: 2px;"></i></button>
              <div class="max-results-menu" id="maxResultsMenu" style="display: none; position: absolute; top: 110%; left: 0; background: #fff; border: 1.5px solid var(--accent-light); border-radius: 12px; box-shadow: 0 8px 24px rgba(236,32,37,0.13); z-index: 10; min-width: 120px; overflow: hidden;">
                <button class="max-results-option" data-value="50" style="padding: 10px 18px; background: none; border: none; width: 100%; text-align: left; color: var(--accent-solid); font-weight: 600; font-size: 1.05rem; transition: background 0.18s, color 0.18s;">50</button>
                <button class="max-results-option" data-value="100" style="padding: 10px 18px; background: none; border: none; width: 100%; text-align: left; color: var(--accent-solid); font-weight: 600; font-size: 1.05rem; transition: background 0.18s, color 0.18s;">100</button>
                <button class="max-results-option" data-value="250" style="padding: 10px 18px; background: none; border: none; width: 100%; text-align: left; color: var(--accent-solid); font-weight: 600; font-size: 1.05rem; transition: background 0.18s, color 0.18s;">250</button>
                <button class="max-results-option" data-value="500" style="padding: 10px 18px; background: none; border: none; width: 100%; text-align: left; color: var(--accent-solid); font-weight: 600; font-size: 1.05rem; transition: background 0.18s, color 0.18s;">500</button>
                <button class="max-results-option" data-value="1000" style="padding: 10px 18px; background: none; border: none; width: 100%; text-align: left; color: var(--accent-solid); font-weight: 600; font-size: 1.05rem; transition: background 0.18s, color 0.18s;">1,000</button>
                <button class="max-results-option" data-value="5000" style="padding: 10px 18px; background: none; border: none; width: 100%; text-align: left; color: var(--accent-solid); font-weight: 600; font-size: 1.05rem; transition: background 0.18s, color 0.18s;">5,000</button>
                <button class="max-results-option" data-value="all" style="padding: 10px 18px; background: none; border: none; width: 100%; text-align: left; color: var(--accent-solid); font-weight: 600; font-size: 1.05rem; transition: background 0.18s, color 0.18s;">All</button>
              </div>
            </div>
            <button class="btn-secondary" style="background: var(--accent-light); color: var(--accent-solid);"><i class="fas fa-sync-alt"></i></button>
          </div>
        </div>
        <div class="stock-toolbar" style="display: flex; align-items: center; gap: 1rem; margin-bottom: 0.5rem; margin-top: 1.2rem;">
          <div class="search-input-wrapper" style="position: relative; display: flex; align-items: center; width: 220px;">
            <input type="text" placeholder="Stock Search" style="border-radius: 999px; border: 1.5px solid var(--accent-light); padding: 8px 40px 8px 16px; font-size: 1rem; width: 100%; box-shadow: 0 1px 4px rgba(236,32,37,0.04);">
            <button type="button" class="search-icon-btn" style="position: absolute; right: 6px; top: 50%; transform: translateY(-50%); background: none; border: none; padding: 0; cursor: pointer; color: var(--accent-solid); font-size: 1.18rem; display: flex; align-items: center; justify-content: center;"><i class="fas fa-search"></i></button>
          </div>
          <button class="btn-primary fancy-btn" style="padding: 8px 22px; font-size: 1.05rem; border-radius: 999px; box-shadow: 0 2px 8px rgba(236,32,37,0.10); display: flex; align-items: center; gap: 10px; background: var(--accent-solid); color: #fff; font-weight: 700;"><i class="fas fa-plus"></i> New Item</button>
          <button class="btn-secondary fancy-btn" style="padding: 8px 20px; font-size: 1.05rem; border-radius: 999px; box-shadow: 0 2px 8px rgba(236,32,37,0.07); display: flex; align-items: center; gap: 10px; background: #fff; color: var(--accent-solid); font-weight: 700; border: 1.5px solid var(--accent-light);"><i class="fas fa-list"></i> Orders</button>
          <button class="btn-secondary fancy-btn" style="padding: 8px 20px; font-size: 1.05rem; border-radius: 999px; box-shadow: 0 2px 8px rgba(236,32,37,0.07); display: flex; align-items: center; gap: 10px; background: #fff; color: var(--accent-solid); font-weight: 700; border: 1.5px solid var(--accent-light);"><i class="fas fa-exclamation-triangle"></i> Low</button>
          <button class="btn-secondary fancy-btn" style="padding: 8px 20px; font-size: 1.05rem; border-radius: 999px; box-shadow: 0 2px 8px rgba(236,32,37,0.07); display: flex; align-items: center; gap: 10px; background: #fff; color: var(--accent-solid); font-weight: 700; border: 1.5px solid var(--accent-light);"><i class="fas fa-archive"></i> Reserved</button>
          <button class="btn-secondary fancy-btn" style="padding: 8px 20px; font-size: 1.05rem; border-radius: 999px; box-shadow: 0 2px 8px rgba(236,32,37,0.07); display: flex; align-items: center; gap: 10px; background: #fff; color: var(--accent-solid); font-weight: 700; border: 1.5px solid var(--accent-light);"><i class="fas fa-print"></i> Print</button>
        </div>
      </div>

      <!-- Inventory Table -->
      <div class="content-section">
        <!-- Table Filter/Header Row as in Screenshot, now with search inputs -->
        <div class="table-header-bar" style="display:grid;grid-template-columns:repeat(5,1fr);gap:0;border-radius:12px 12px 0 0;overflow:visible;margin-bottom:0;background:#f7f7f7;box-shadow:0 2px 8px rgba(236,32,37,0.04);align-items:center;">
          <input type="text" placeholder="Category" class="header-search-input" style="padding:13px 0 13px 18px;font-weight:700;color:#b91c1c;font-size:1.13rem;background:#fff;border:1.5px solid #eee;border-radius:8px;box-shadow:0 1px 4px rgba(185,28,28,0.04);outline:none;transition:border 0.18s,box-shadow 0.18s;">
          <input type="text" placeholder="Sub Category" class="header-search-input" style="padding:13px 0 13px 18px;font-weight:700;color:#b91c1c;font-size:1.13rem;background:#fff;border:1.5px solid #eee;border-radius:8px;box-shadow:0 1px 4px rgba(185,28,28,0.04);outline:none;transition:border 0.18s,box-shadow 0.18s;">
          <input type="text" placeholder="Manufacturer" class="header-search-input" style="padding:13px 0 13px 18px;font-weight:700;color:#b91c1c;font-size:1.13rem;background:#fff;border:1.5px solid #eee;border-radius:8px;box-shadow:0 1px 4px rgba(185,28,28,0.04);outline:none;transition:border 0.18s,box-shadow 0.18s;">
          <input type="text" placeholder="Supplier" class="header-search-input" style="padding:13px 0 13px 18px;font-weight:700;color:#b91c1c;font-size:1.13rem;background:#fff;border:1.5px solid #eee;border-radius:8px;box-shadow:0 1px 4px rgba(185,28,28,0.04);outline:none;transition:border 0.18s,box-shadow 0.18s;">
          <div style="padding:8px 12px 8px 0;display:flex;justify-content:flex-end;align-items:center;position:relative;">
            <div style="position:relative;z-index:1002;">
              <button id="displayAllBtn" type="button" style="background:linear-gradient(90deg,#ef4444,#b91c1c);color:#fff;font-weight:700;font-size:1.08rem;padding:10px 32px 10px 22px;border:none;border-radius:10px;box-shadow:0 2px 8px rgba(185,28,28,0.10);display:flex;align-items:center;gap:10px;cursor:pointer;transition:background 0.18s;">
                <span id="displayAllBtnLabel">Display All</span> <i class="fas fa-caret-down"></i>
              </button>
              <div id="displayAllDropdown" style="display:none;position:absolute;top:110%;right:0;min-width:220px;background:#fff;border-radius:10px;box-shadow:0 4px 18px rgba(185,28,28,0.07);border:1.5px solid #f3f4f6;z-index:2000;">
                <div class="display-all-option" style="padding:14px 22px;cursor:pointer;color:#b91c1c;font-weight:600;" data-value="Display All">Display All</div>
                <div class="display-all-option" style="padding:14px 22px;cursor:pointer;color:#b91c1c;" data-value="Display Available">Display Available</div>
                <div class="display-all-option" style="padding:14px 22px;cursor:pointer;color:#b91c1c;" data-value="Display Available (+ non tracked)">Display Available (+ non tracked)</div>
                <div class="display-all-option" style="padding:14px 22px;cursor:pointer;color:#b91c1c;" data-value="Display Unavailable">Display Unavailable</div>
              </div>
            </div>
          </div>
        </div>
        <div class="customer-table-wrapper">
          <table class="customer-modern-table">
            <thead>
              <tr>
                <th>Sup</th>
                <th>Description</th>
                <th>Info</th>
                <th>Net Price</th>
                <th>Stock</th>
                <th>Order</th>
                <th>Res</th>
                <th>Avail</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>AutoZone</td>
                <td>Oil Filter</td>
                <td>ENG001, Engine Parts</td>
                <td>TZS 15,000</td>
                <td>45</td>
                <td>5</td>
                <td>2</td>
                <td>38</td>
              </tr>
              <tr>
                <td>CarParts Inc</td>
                <td>Brake Pads</td>
                <td>BRK002, Brake System</td>
                <td>TZS 25,000</td>
                <td>12</td>
                <td>3</td>
                <td>1</td>
                <td>8</td>
              </tr>
              <tr>
                <td>MotorMax</td>
                <td>Battery</td>
                <td>ELC003, Electrical</td>
                <td>TZS 120,000</td>
                <td>8</td>
                <td>1</td>
                <td>0</td>
                <td>7</td>
              </tr>
              <tr>
                <td>AutoZone</td>
                <td>Headlight</td>
                <td>BOD004, Body Parts</td>
                <td>TZS 45,000</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="right-content">
      <?php include 'partials/widget-stock-order-info.php'; ?>
      <?php include 'partials/widget-stock-basket.php'; ?>
    </div>
  </div>
</div>

<?php include 'Popups/stock/add-stock.php'; ?>
<?php include 'Popups/stock/orders-popup.php'; ?>
<?php include 'Popups/stock/pending-order-popup.php'; ?>
<?php include 'Popups/stock/pending-return-popup.php'; ?>
<script>
// Date Range Functions (same as Archive page)
function pad(n) { return n < 10 ? '0' + n : n; }
function formatDate(d) { return d.getFullYear() + '-' + pad(d.getMonth() + 1) + '-' + pad(d.getDate()); }

function setDateRange(type) {
  const from = document.getElementById('date-from');
  const to = document.getElementById('date-to');
  const today = new Date();
  let start, end;
  
  switch(type) {
    case 'yesterday':
      start = end = new Date(today); 
      start.setDate(today.getDate() - 1); 
      break;
    case 'today':
      start = end = today; 
      break;
    case 'tomorrow':
      start = end = new Date(today); 
      start.setDate(today.getDate() + 1); 
      break;
    case 'last-week':
      start = new Date(today); 
      start.setDate(today.getDate() - today.getDay() - 6); 
      end = new Date(today); 
      end.setDate(start.getDate() + 6); 
      break;
    case 'this-week':
      start = new Date(today); 
      start.setDate(today.getDate() - today.getDay()); 
      end = new Date(start); 
      end.setDate(start.getDate() + 6); 
      break;
    case 'next-week':
      start = new Date(today); 
      start.setDate(today.getDate() - today.getDay() + 7); 
      end = new Date(start); 
      end.setDate(start.getDate() + 6); 
      break;
    case 'last-month':
      start = new Date(today.getFullYear(), today.getMonth() - 1, 1); 
      end = new Date(today.getFullYear(), today.getMonth(), 0); 
      break;
    case 'this-month':
      start = new Date(today.getFullYear(), today.getMonth(), 1); 
      end = new Date(today.getFullYear(), today.getMonth() + 1, 0); 
      break;
    case 'next-month':
      start = new Date(today.getFullYear(), today.getMonth() + 1, 1); 
      end = new Date(today.getFullYear(), today.getMonth() + 2, 0); 
      break;
    case 'last-year':
      start = new Date(today.getFullYear() - 1, 0, 1); 
      end = new Date(today.getFullYear() - 1, 11, 31); 
      break;
    case 'this-year':
      start = new Date(today.getFullYear(), 0, 1); 
      end = new Date(today.getFullYear(), 11, 31); 
      break;
    case 'next-year':
      start = new Date(today.getFullYear() + 1, 0, 1); 
      end = new Date(today.getFullYear() + 1, 11, 31); 
      break;
    default:
      start = end = '';
  }
  
  from.value = start ? formatDate(start) : '';
  to.value = end ? formatDate(end) : '';
}
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
  // Max Results Dropdown Logic (same as before)
  const maxResultsBtn = document.getElementById('maxResultsBtn');
  const maxResultsMenu = document.getElementById('maxResultsMenu');
  if (maxResultsBtn && maxResultsMenu) {
    maxResultsBtn.addEventListener('click', function(e) {
      e.stopPropagation();
      maxResultsMenu.style.display = maxResultsMenu.style.display === 'block' ? 'none' : 'block';
    });
    document.querySelectorAll('.max-results-option').forEach(btn => {
      btn.addEventListener('click', function() {
        maxResultsBtn.innerHTML = this.innerText + ' <i class="fas fa-caret-down" style="margin-left: 6px;"></i>';
        maxResultsMenu.style.display = 'none';
      });
    });
    document.addEventListener('click', function(e) {
      if (!maxResultsBtn.contains(e.target) && !maxResultsMenu.contains(e.target)) {
        maxResultsMenu.style.display = 'none';
      }
    });
  }

  // REBUILT Display All Button Dropdown Logic (for table header bar)
  const btn = document.getElementById('displayAllBtn');
  const dropdown = document.getElementById('displayAllDropdown');
  const label = document.getElementById('displayAllBtnLabel');
  if (btn && dropdown && label) {
    btn.addEventListener('click', function(e) {
      e.stopPropagation();
      dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
    });
    dropdown.querySelectorAll('.display-all-option').forEach(function(option) {
      option.addEventListener('click', function(e) {
        label.innerText = this.getAttribute('data-value');
        dropdown.style.display = 'none';
      });
    });
    document.addEventListener('click', function(e) {
      if (!btn.contains(e.target) && !dropdown.contains(e.target)) {
        dropdown.style.display = 'none';
      }
    });
  }

  // Show New Item popup
  const newItemBtn = document.querySelector('.btn-primary.fancy-btn');
  const addStockModal = document.getElementById('addStockModal');
  const closeAddStockModal = document.getElementById('closeAddStockModal');
  if (newItemBtn && addStockModal) {
    newItemBtn.addEventListener('click', function() {
      addStockModal.style.display = 'flex';
    });
  }
  if (closeAddStockModal && addStockModal) {
    closeAddStockModal.addEventListener('click', function() {
      addStockModal.style.display = 'none';
    });
  }

  // Show Orders popup
  const ordersBtn = Array.from(document.querySelectorAll('.fancy-btn')).find(btn => btn.textContent.includes('Orders'));
  const stockOrdersModal = document.getElementById('stockOrdersModal');
  if (ordersBtn && stockOrdersModal) {
    ordersBtn.addEventListener('click', function() {
      stockOrdersModal.style.display = 'flex';
    });
  }
});
</script>

<?php renderFooter(); ?>

