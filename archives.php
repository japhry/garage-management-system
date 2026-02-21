<?php
require_once 'config.php';
renderHeader();
include 'partials/sidebar.php';
?>

<div class="main-content" style="margin-top: 20px;">
  <?php include 'partials/header.php'; ?>
  
  <!-- Top Header Bar -->
  <div style="background:#fff; box-shadow:0 8px 32px rgba(185,28,28,0.13); border-radius:22px; padding:28px 38px 18px 38px; margin:20px 0 24px 0; position:relative; overflow:visible;">
    <!-- Decorative floating icon -->
    <i class="fas fa-archive" style="position:absolute;top:18px;left:18px;font-size:2.1em;color:var(--accent-light);opacity:0.18;pointer-events:none;"></i>
    
    <!-- Title and Controls Row -->
    <div style="display:flex;align-items:center;justify-content:space-between;gap:18px;">
      <!-- Title Section -->
      <div style="display:flex;align-items:center;gap:18px;">
        <span style="font-size:1.45em;font-weight:900;color:#b91c1c;letter-spacing:-1px;display:flex;align-items:center;gap:12px;">
          <i class="fas fa-archive" style="color:#b91c1c;font-size:1.2em;"></i>
          Document Archives:
        </span>
        <span style="color:#444;font-weight:700;font-size:1.25em;">Outstanding</span>
        <span style="background:#f3f4f6;color:#b91c1c;font-weight:700;font-size:1em;padding:6px 18px;border-radius:999px;box-shadow:0 1px 4px rgba(185,28,28,0.07);margin-left:4px;">
          (Showing 5 Records)
        </span>
      </div>
      
      <!-- Controls Section -->
      <div style="display:flex;align-items:center;gap:0.5rem;">
        <!-- Max Results Dropdown -->
        <button class="btn-secondary max-results-label" style="background: var(--accent-solid); color: #fff; font-weight: 600; border-radius: 999px 0 0 999px; box-shadow: 0 2px 8px rgba(236,32,37,0.08); padding: 8px 18px 8px 16px; border-right: none; font-size:1.08em;">
          Max Results
        </button>
        <div class="max-results-dropdown" style="position: relative;">
          <button class="btn-secondary max-results-btn" id="maxResultsBtn" style="background: #fff; color: var(--accent-solid); font-weight: 700; min-width: 80px; border-radius: 0 999px 999px 0; border-left: 1.5px solid var(--accent-light); box-shadow: 0 2px 8px rgba(236,32,37,0.08); padding: 8px 24px 8px 18px; display: flex; align-items: center; gap: 8px; font-size: 1.08em; position:relative;"> 
            500 <i class="fas fa-caret-down" style="margin-left: 2px;"></i>
            <span style="position:absolute;right:10px;top:50%;transform:translateY(-50%);width:6px;height:6px;border-radius:50%;background:var(--accent-light);"></span>
          </button>
          <div class="max-results-menu" id="maxResultsMenu" style="display: none; position: absolute; top: 110%; left: 0; background: #fff; border: 1.5px solid var(--accent-light); border-radius: 12px; box-shadow: 0 8px 24px rgba(236,32,37,0.13); z-index: 1002; min-width: 120px; max-height: 320px; overflow-y: auto; overflow-x: hidden;">
            <button class="max-results-option" data-value="50" style="padding: 12px 22px; background: none; border: none; width: 100%; text-align: left; color: var(--accent-solid); font-weight: 700; font-size: 1.08em; transition: background 0.18s, color 0.18s;">50</button>
            <button class="max-results-option" data-value="100" style="padding: 12px 22px; background: none; border: none; width: 100%; text-align: left; color: var(--accent-solid); font-weight: 700; font-size: 1.08em; transition: background 0.18s, color 0.18s;">100</button>
            <button class="max-results-option" data-value="250" style="padding: 12px 22px; background: none; border: none; width: 100%; text-align: left; color: var(--accent-solid); font-weight: 700; font-size: 1.08em; transition: background 0.18s, color 0.18s;">250</button>
            <button class="max-results-option" data-value="500" style="padding: 12px 22px; background: none; border: none; width: 100%; text-align: left; color: var(--accent-solid); font-weight: 700; font-size: 1.08em; transition: background 0.18s, color 0.18s;">500</button>
            <button class="max-results-option" data-value="1000" style="padding: 12px 22px; background: none; border: none; width: 100%; text-align: left; color: var(--accent-solid); font-weight: 700; font-size: 1.08em; transition: background 0.18s, color 0.18s;">1,000</button>
            <button class="max-results-option" data-value="5000" style="padding: 12px 22px; background: none; border: none; width: 100%; text-align: left; color: var(--accent-solid); font-weight: 700; font-size: 1.08em; transition: background 0.18s, color 0.18s;">5,000</button>
            <button class="max-results-option" data-value="all" style="padding: 12px 22px; background: none; border: none; width: 100%; text-align: left; color: var(--accent-solid); font-weight: 700; font-size: 1.08em; transition: background 0.18s, color 0.18s;">All</button>
          </div>
        </div>
        
        <!-- Refresh Button -->
        <button class="btn-secondary" id="refresh-btn" style="background: var(--accent-light); color: var(--accent-solid); box-shadow:0 2px 8px rgba(185,28,28,0.07); border-radius:999px; padding:8px 16px; margin-left:8px; font-size:1.08em; border:none;">
          <i class="fas fa-sync-alt"></i>
        </button>
      </div>
    </div>
    
    <!-- Search and Tabs Row -->
    <div style="display:flex;align-items:center;gap:18px;margin-top:22px;">
      <!-- Search Box -->
      <div style="display:flex;align-items:center;gap:0;position:relative;">
        <i class="fas fa-search" style="position:absolute;left:14px;top:50%;transform:translateY(-50%);color:#b91c1c;font-size:1.1em;opacity:0.7;"></i>
        <input type="text" placeholder="Archive Search" style="background:linear-gradient(90deg,#fff,#f3f4f6 80%);color:#b91c1c;border:2px solid var(--accent-light);border-radius:999px;padding:10px 18px 10px 38px;font-size:1.08em;width:200px;max-width:100%;box-shadow:0 1px 6px rgba(185,28,28,0.06);transition:border 0.18s,box-shadow 0.18s;outline:none;">
        <button style="background:#fff;color:var(--accent-solid);border:none;padding:10px 12px 10px 8px;border-radius:0 999px 999px 0;cursor:pointer;transition:background 0.18s;">
          <i class="fas fa-times"></i>
        </button>
      </div>
      
      <!-- Document Type Tabs -->
      <div style="display:flex;align-items:center;gap:6px;">
        <button class="action-btn" style="background:#fff;color:#b91c1c;border:2px solid var(--accent-light);border-bottom:none;border-radius:999px;font-weight:700;padding:10px 26px;box-shadow:0 1px 6px rgba(185,28,28,0.06);font-size:1.08em;display:flex;align-items:center;gap:8px;transition:box-shadow 0.18s,background 0.18s;">
          <i class="fas fa-list"></i> All
        </button>
        <button class="action-btn" style="background:#fff;color:#b91c1c;border:2px solid var(--accent-light);border-bottom:none;border-radius:999px;font-weight:700;padding:10px 26px;box-shadow:0 1px 6px rgba(185,28,28,0.06);font-size:1.08em;display:flex;align-items:center;gap:8px;transition:box-shadow 0.18s,background 0.18s;">
          <i class="fas fa-file-invoice"></i> Invoices
        </button>
        <button class="action-btn" style="background:#fff;color:#b91c1c;border:2px solid var(--accent-light);border-bottom:none;border-radius:999px;font-weight:700;padding:10px 26px;box-shadow:0 1px 6px rgba(185,28,28,0.06);font-size:1.08em;display:flex;align-items:center;gap:8px;transition:box-shadow 0.18s,background 0.18s;">
          <i class="fas fa-file-signature"></i> Job Sheets
        </button>
        <button class="action-btn" style="background:#fff;color:#b91c1c;border:2px solid var(--accent-light);border-bottom:none;border-radius:999px;font-weight:700;padding:10px 26px;box-shadow:0 1px 6px rgba(185,28,28,0.06);font-size:1.08em;display:flex;align-items:center;gap:8px;transition:box-shadow 0.18s,background 0.18s;">
          <i class="fas fa-file-invoice-dollar"></i> Estimates
        </button>
        <button class="action-btn" style="background:#fff;color:#b91c1c;border:2px solid var(--accent-light);border-bottom:none;border-radius:999px;font-weight:700;padding:10px 26px;box-shadow:0 1px 6px rgba(185,28,28,0.06);font-size:1.08em;display:flex;align-items:center;gap:8px;transition:box-shadow 0.18s,background 0.18s;">
          <i class="fas fa-receipt"></i> Credit Notes
        </button>
        <button class="action-btn" style="background:#fff;color:#b91c1c;border:2px solid var(--accent-light);border-bottom:4px solid var(--accent-solid);border-radius:999px;font-weight:900;padding:10px 26px;box-shadow:0 1px 6px rgba(185,28,28,0.06);font-size:1.08em;display:flex;align-items:center;gap:8px;background:#fff;transition:box-shadow 0.18s,background 0.18s;">
          <i class="fas fa-exclamation-circle"></i> Outstanding
        </button>
        <button class="action-btn" style="background:#fff;color:#b91c1c;border:2px solid var(--accent-light);border-bottom:none;border-radius:999px;font-weight:700;padding:10px 26px;box-shadow:0 1px 6px rgba(185,28,28,0.06);font-size:1.08em;display:flex;align-items:center;gap:8px;transition:box-shadow 0.18s,background 0.18s;">
          <i class="fas fa-print"></i> Print
        </button>
      </div>
    </div>
    
    <!-- Date Filter Toolbar -->
    <div style="display:flex;align-items:center;gap:14px;margin:22px 0 0 0;background:linear-gradient(90deg,#fff,#f3f4f6 80%);padding:12px 18px;border-radius:12px;box-shadow:0 1px 6px rgba(185,28,28,0.04);">
      <span style="background:var(--accent-light);color:#b91c1c;padding:7px 20px;border-radius:999px;font-size:1.08em;font-weight:700;display:flex;align-items:center;gap:8px;">
        <i class="fas fa-calendar-alt"></i> Created
      </span>
      <span style="color:#888;font-weight:600;font-size:1.08em;">From</span>
      <div style="display:flex;align-items:center;">
        <input type="date" id="date-from" style="background:#f3f4f6;color:#b91c1c;border:2px solid var(--accent-light);border-radius:999px;padding:8px 16px;font-size:1.08em;width:150px;box-shadow:0 1px 4px rgba(185,28,28,0.04);transition:border 0.18s,box-shadow 0.18s;outline:none;">
      </div>
      <span style="color:#888;font-weight:600;font-size:1.08em;">To</span>
      <div style="display:flex;align-items:center;">
        <input type="date" id="date-to" style="background:#f3f4f6;color:#b91c1c;border:2px solid var(--accent-light);border-radius:999px;padding:8px 16px;font-size:1.08em;width:150px;box-shadow:0 1px 4px rgba(185,28,28,0.04);transition:border 0.18s,box-shadow 0.18s;outline:none;">
      </div>
      <button style="background:#fff;color:var(--accent-solid);border:2px solid var(--accent-light);padding:8px 16px;border-radius:999px;cursor:pointer;transition:background 0.18s;" id="clear-date-btn">
        <i class="fas fa-times"></i>
      </button>
      <button class="action-btn" id="today-action-btn" style="background:linear-gradient(90deg,#b91c1c 60%,#e53935 100%);color:#fff;padding:8px 28px;font-size:1.08em;font-weight:800;border-radius:999px;box-shadow:0 2px 8px rgba(185,28,28,0.10);transition:box-shadow 0.18s;display:flex;align-items:center;gap:8px;">
        <i class="fas fa-bolt"></i> Today
      </button>
      <select id="date-range-select" style="background:#fff;color:#b91c1c;border:2px solid var(--accent-light);border-radius:999px;padding:8px 18px;font-size:1.08em;font-weight:700;box-shadow:0 1px 4px rgba(185,28,28,0.04);transition:border 0.18s;">
        <option value="">Date Range</option>
        <option value="yesterday">Yesterday</option>
        <option value="today">Today</option>
        <option value="tomorrow">Tomorrow</option>
        <option value="last-week">Last Week</option>
        <option value="this-week">This Week</option>
        <option value="next-week">Next Week</option>
        <option value="last-month">Last Month</option>
        <option value="this-month">This Month</option>
        <option value="next-month">Next Month</option>
        <option value="last-year">Last Year</option>
        <option value="this-year">This Year</option>
        <option value="next-year">Next Year</option>
      </select>
    </div>
  </div>
  <!-- End Top Header Bar -->
  
  <hr style="border:none;border-top:1.5px solid #eee;margin:18px 0 10px 0;">

  <!-- Main Content -->
  <div class="content-section">
    <div style="overflow-x:auto;">
      <table class="data-table" style="min-width:1200px;">
        <thead>
          <tr style="background:#232323;color:#fff;">
            <th style="width:32px;text-align:center;">T</th>
            <th>Doc No</th>
            <th>Date</th>
            <th>Issue Date</th>
            <th>Registration</th>
            <th>Make & Model</th>
            <th>Customer</th>
            <th>Total</th>
            <th>Receipts</th>
            <th>Balance</th>
            <th style="width:32px;text-align:center;">P</th>
            <th style="width:32px;text-align:center;">Exp</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td style="text-align:center;">INV</td>
            <td>1001</td>
            <td>2024-07-01</td>
            <td>2024-07-01</td>
            <td>T123ABC</td>
            <td>Toyota Corolla</td>
            <td>John Doe</td>
            <td>TZS 150,000</td>
            <td>TZS 100,000</td>
            <td>TZS 50,000</td>
            <td style="text-align:center;"><i class="fas fa-check-circle" style="color:#10b981;"></i></td>
            <td style="text-align:center;"><i class="fas fa-times-circle" style="color:#ef4444;"></i></td>
          </tr>
          <tr style="background:#f9fafb;">
            <td style="text-align:center;">JS</td>
            <td>1002</td>
            <td>2024-07-02</td>
            <td>2024-07-02</td>
            <td>T456DEF</td>
            <td>Honda CR-V</td>
            <td>Sarah Johnson</td>
            <td>TZS 85,000</td>
            <td>TZS 85,000</td>
            <td>TZS 0</td>
            <td style="text-align:center;"><i class="fas fa-check-circle" style="color:#10b981;"></i></td>
            <td style="text-align:center;"><i class="fas fa-check-circle" style="color:#10b981;"></i></td>
          </tr>
          <tr>
            <td style="text-align:center;">ES</td>
            <td>1003</td>
            <td>2024-07-03</td>
            <td>2024-07-03</td>
            <td>T789GHI</td>
            <td>Nissan X-Trail</td>
            <td>Mike Wilson</td>
            <td>TZS 95,000</td>
            <td>TZS 45,000</td>
            <td>TZS 50,000</td>
            <td style="text-align:center;"><i class="fas fa-times-circle" style="color:#ef4444;"></i></td>
            <td style="text-align:center;"><i class="fas fa-check-circle" style="color:#10b981;"></i></td>
          </tr>
          <tr style="background:#f9fafb;">
            <td style="text-align:center;">INV</td>
            <td>1004</td>
            <td>2024-07-04</td>
            <td>2024-07-04</td>
            <td>T321XYZ</td>
            <td>Ford Focus</td>
            <td>Emma Davis</td>
            <td>TZS 65,000</td>
            <td>TZS 0</td>
            <td>TZS 65,000</td>
            <td style="text-align:center;"><i class="fas fa-times-circle" style="color:#ef4444;"></i></td>
            <td style="text-align:center;"><i class="fas fa-times-circle" style="color:#ef4444;"></i></td>
          </tr>
          <tr>
            <td style="text-align:center;">CN</td>
            <td>1005</td>
            <td>2024-07-05</td>
            <td>2024-07-05</td>
            <td>T654ZYX</td>
            <td>Mazda 3</td>
            <td>Peter Paul</td>
            <td>TZS 120,000</td>
            <td>TZS 60,000</td>
            <td>TZS 60,000</td>
            <td style="text-align:center;"><i class="fas fa-check-circle" style="color:#10b981;"></i></td>
            <td style="text-align:center;"><i class="fas fa-times-circle" style="color:#ef4444;"></i></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php renderFooter(); ?> 

<!-- JavaScript Section -->
<script>
// Date Range Functions
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

// Event Listeners
document.getElementById('today-action-btn').onclick = function() { setDateRange('today'); };
document.getElementById('date-range-select').onchange = function() { setDateRange(this.value); };
document.getElementById('clear-date-btn').onclick = function() {
  document.getElementById('date-from').value = '';
  document.getElementById('date-to').value = '';
};

// Max Results Dropdown Logic
const maxResultsBtn = document.getElementById('maxResultsBtn');
const maxResultsMenu = document.getElementById('maxResultsMenu');

if (maxResultsBtn && maxResultsMenu) {
  maxResultsBtn.addEventListener('click', function(e) {
    e.stopPropagation();
    maxResultsMenu.style.display = maxResultsMenu.style.display === 'block' ? 'none' : 'block';
  });
  
  document.addEventListener('click', function(e) {
    if (maxResultsMenu.style.display === 'block') {
      maxResultsMenu.style.display = 'none';
    }
  });
  
  maxResultsMenu.addEventListener('click', function(e) {
    e.stopPropagation();
  });
  
  maxResultsMenu.querySelectorAll('.max-results-option').forEach(function(option) {
    option.addEventListener('click', function() {
      maxResultsBtn.childNodes[0].nodeValue = option.textContent + ' ';
      maxResultsMenu.style.display = 'none';
    });
  });
}

// Refresh Button
document.getElementById('refresh-btn').onclick = function() { location.reload(); };
</script>