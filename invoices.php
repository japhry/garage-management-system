<?php
require_once 'config.php';
renderHeader();
?>
  <?php include 'partials/sidebar.php'; ?>
  <?php include 'Popups/invoices/new-invoice.php'; ?>
  <div class="main-content">
    <?php include 'partials/header.php'; ?>

    <!-- Progress Header with Blue Styling -->
    <div id="progress-header" class="progress-header" style="background: #0891b2; color: #fff; border-left: 4px solid #0891b2; margin-bottom: 18px;">
      <i class="fas fa-file-invoice"></i> Invoices In Progress: <span id="header-range" style="font-weight:400;">All</span> <span id="header-records" style="font-weight:400; font-size:0.95em;">(Showing 2 Records)</span>
    </div>
    <!-- Filter/Search Bar and Action Buttons below header -->
    <div class="search-toolbar">
      <div class="search-row">
        <button id="created-toggle-btn" class="search-btn">Created</button>
        <input type="date" class="filter-select" id="date-from" placeholder="From">
        <input type="date" class="filter-select" id="date-to" placeholder="To">
        <button class="clear-btn" onclick="document.getElementById('date-from').value='';document.getElementById('date-to').value='';">X</button>
        <button class="search-btn">Today</button>
        <select class="filter-select" id="date-range-select">
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
        <select class="filter-select" id="status-filter">
          <option>~</option>
          <option>Open</option>
          <option>In Progress</option>
          <option>Completed</option>
          <option>On Hold</option>
        </select>
        <button class="clear-btn" onclick="document.getElementById('status-filter').selectedIndex=0;">X</button>
      </div>
    </div>
    <div class="action-buttons">
      <button id="main-action-btn" class="action-btn"><i class="fas fa-plus"></i> New Invoice</button>
      <button id="archives-btn" class="action-btn secondary"><i class="fas fa-archive"></i> Archives</button>
      <button class="action-btn secondary"><i class="fas fa-print"></i> Print</button>
      <button class="action-btn secondary"><i class="fas fa-credit-card"></i> New Credit</button>
    </div>

    <!-- Main Content with Sidebar Layout -->
    <div class="content-with-sidebar">
      <!-- Main Invoices Table -->
      <div class="main-estimates">
        <div class="enhanced-table">
          <table>
            <thead>
              <tr>
                <th>T</th>
                <th>Doc No</th>
                <th>Date</th>
                <th>Registration</th>
                <th>Make & Model</th>
                <th>Customer</th>
                <th>Total</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody id="invoices-table-body">
              <tr>
                <td><span class="doc-type-badge doc-type-inv">INV</span></td>
                <td>2001</td>
                <td>05/07/2025</td>
                <td>T789GHI</td>
                <td>Toyota Corolla</td>
                <td>John Doe</td>
                <td>150,000.00</td>
                <td>
                  <select class="table-select">
                    <option>~</option>
                    <option>Open</option>
                    <option>In Progress</option>
                    <option>Completed</option>
                    <option>On Hold</option>
                  </select>
                </td>
              </tr>
              <tr>
                <td><span class="doc-type-badge doc-type-inv">INV</span></td>
                <td>2000</td>
                <td>04/07/2025</td>
                <td>T456DEF</td>
                <td>Honda CR-V</td>
                <td>Sarah Johnson</td>
                <td>75,000.00</td>
                <td>
                  <select class="table-select">
                    <option>~</option>
                    <option>Open</option>
                    <option>In Progress</option>
                    <option>Completed</option>
                    <option>On Hold</option>
                  </select>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <!-- Right Sidebar -->
      <div class="right-sidebar">
        <div class="sidebar-widget">
          <?php include 'partials/invoice-widget-summary.php'; ?>
        </div>
        <div class="sidebar-widget">
          <?php include 'partials/invoice-widget-actions.php'; ?>
        </div>
        <div class="sidebar-widget">
          <?php include 'partials/invoice-widget-notes.php'; ?>
        </div>
      </div>
    </div>
  </div>

<script>
// --- Dynamic Header & Button Logic for Invoices ---
const mainActionBtn = document.getElementById('main-action-btn');
const headerRange = document.getElementById('header-range');
const headerRecords = document.getElementById('header-records');
const dateFrom = document.getElementById('date-from');
const dateTo = document.getElementById('date-to');
const dateRangeSelect = document.getElementById('date-range-select');
const statusFilter = document.getElementById('status-filter');
const dateClearBtn = document.querySelector('.clear-btn[onclick*="date-from"]');
const statusClearBtn = document.querySelector('.clear-btn[onclick*="status-filter"]');
const todayBtn = Array.from(document.querySelectorAll('.search-btn')).find(btn => btn.textContent.trim() === 'Today');
const createdToggleBtn = document.getElementById('created-toggle-btn');
const createBtnIcon = '<i class="fas fa-plus"></i>';
let mode = 'due'; // 'due' or 'created'

function hydrateInvoiceRows() {
  if (!window.GarageDataLayer) return;
  GarageDataLayer.renderDocumentRows('invoice', '#invoices-table-body', {
    statuses: ['~', 'Open', 'In Progress', 'Completed', 'On Hold'],
    badgeClass: 'doc-type-inv',
    badgeLabel: 'INV',
    withActions: false
  });
}

function formatDate(d) {
  if (!d) return '';
  const date = new Date(d);
  return date.toLocaleDateString('en-GB');
}

function updateHeaderAndButton() {
  // Update header range
  let rangeText = 'All';
  if (dateFrom.value && dateTo.value) {
    rangeText = (mode === 'created' ? 'Created' : 'Due') + ` ${formatDate(dateFrom.value)} to ${formatDate(dateTo.value)}`;
  } else {
    rangeText = (mode === 'created' ? 'Created' : 'Due');
  }
  headerRange.textContent = rangeText;
  // Update main action button (always New Invoice)
  mainActionBtn.innerHTML = createBtnIcon + ' New Invoice';
  // Update filter bar button
  if (mode === 'created') {
    createdToggleBtn.textContent = 'Created';
  } else {
    createdToggleBtn.textContent = 'Due';
  }
  filterTable();
}

// Toggle between Created and Due via Created button
createdToggleBtn.addEventListener('click', function() {
  mode = (mode === 'due') ? 'created' : 'due';
  updateHeaderAndButton();
});

// Date range auto-fill logic
dateRangeSelect.addEventListener('change', function() {
  const today = new Date();
  let start, end;
  function format(d) {
    return d.toISOString().slice(0,10);
  }
  function getMondayOfWeek(date) {
    const day = date.getDay();
    const diff = date.getDate() - day + (day === 0 ? -6 : 1);
    return new Date(date.setDate(diff));
  }
  switch(this.value) {
    case 'yesterday':
      start = new Date(today); start.setDate(today.getDate()-1);
      end = new Date(start);
      break;
    case 'today':
      start = new Date(today);
      end = new Date(today);
      break;
    case 'tomorrow':
      start = new Date(today); start.setDate(today.getDate()+1);
      end = new Date(start);
      break;
    case 'last-week': {
      const thisWeekMonday = getMondayOfWeek(new Date(today));
      start = new Date(thisWeekMonday); start.setDate(thisWeekMonday.getDate() - 7);
      end = new Date(start); end.setDate(start.getDate() + 6);
      break;
    }
    case 'this-week': {
      start = getMondayOfWeek(new Date(today));
      end = new Date(start); end.setDate(start.getDate() + 6);
      break;
    }
    case 'next-week': {
      const thisWeekMonday = getMondayOfWeek(new Date(today));
      start = new Date(thisWeekMonday); start.setDate(thisWeekMonday.getDate() + 7);
      end = new Date(start); end.setDate(start.getDate() + 6);
      break;
    }
    case 'last-month': {
      start = new Date(today.getFullYear(), today.getMonth()-1, 1);
      end = new Date(today.getFullYear(), today.getMonth(), 0);
      break;
    }
    case 'this-month': {
      start = new Date(today.getFullYear(), today.getMonth(), 1);
      end = new Date(today.getFullYear(), today.getMonth()+1, 0);
      break;
    }
    case 'next-month': {
      start = new Date(today.getFullYear(), today.getMonth()+1, 1);
      end = new Date(today.getFullYear(), today.getMonth()+2, 0);
      break;
    }
    case 'last-year': {
      start = new Date(today.getFullYear()-1, 0, 1);
      end = new Date(today.getFullYear()-1, 11, 31);
      break;
    }
    case 'this-year': {
      start = new Date(today.getFullYear(), 0, 1);
      end = new Date(today.getFullYear(), 11, 31);
      break;
    }
    case 'next-year': {
      start = new Date(today.getFullYear()+1, 0, 1);
      end = new Date(today.getFullYear()+1, 11, 31);
      break;
    }
    default:
      start = end = null;
  }
  dateFrom.value = start ? format(start) : '';
  dateTo.value = end ? format(end) : '';
  mode = 'due';
  updateHeaderAndButton();
});

// Today button functionality
todayBtn.addEventListener('click', function() {
  const today = new Date();
  dateFrom.value = today.toISOString().slice(0,10);
  dateTo.value = today.toISOString().slice(0,10);
  dateRangeSelect.selectedIndex = 0;
  mode = 'due';
  updateHeaderAndButton();
});

// X button for date range
dateClearBtn.addEventListener('click', function() {
  dateFrom.value = '';
  dateTo.value = '';
  dateRangeSelect.selectedIndex = 0;
  mode = 'due';
  updateHeaderAndButton();
});

// X button for status
statusClearBtn.addEventListener('click', function() {
  statusFilter.selectedIndex = 0;
  filterTable();
});

// Archives button redirects to archives.php
document.getElementById('archives-btn').addEventListener('click', function() {
  window.location.href = 'archives.php';
});

function filterTable() {
  const rows = document.querySelectorAll('.enhanced-table tbody tr');
  const fromDate = dateFrom.value ? new Date(dateFrom.value + 'T00:00:00') : null;
  const toDate = dateTo.value ? new Date(dateTo.value + 'T23:59:59') : null;
  const selectedStatus = (statusFilter.value || '').trim().toLowerCase();
  let visibleCount = 0;

  rows.forEach((row) => {
    const text = row.textContent.toLowerCase();
    const rowDateText = row.children[2] ? row.children[2].textContent.trim() : '';
    const rowStatusSelect = row.querySelector('.table-select');
    const rowStatus = rowStatusSelect ? rowStatusSelect.value.trim().toLowerCase() : '';

    let matchesStatus = true;
    if (selectedStatus && selectedStatus !== '~') {
      matchesStatus = rowStatus === selectedStatus || text.includes(selectedStatus);
    }

    let matchesDate = true;
    if ((fromDate || toDate) && /^\d{2}\/\d{2}\/\d{4}$/.test(rowDateText)) {
      const [day, month, year] = rowDateText.split('/').map(Number);
      const rowDate = new Date(year, month - 1, day);
      if (fromDate && rowDate < fromDate) matchesDate = false;
      if (toDate && rowDate > toDate) matchesDate = false;
    }

    const show = matchesStatus && matchesDate;
    row.style.display = show ? '' : 'none';
    if (show) visibleCount++;
  });

  headerRecords.textContent = `(Showing ${visibleCount} Records)`;
}

// --- New Invoice Popup Logic ---
const newInvoiceModal = document.getElementById('newInvoiceModal');
const closeNewInvoiceModal = document.getElementById('closeNewInvoiceModal');
const mainNewInvoiceBtn = document.getElementById('main-action-btn');
const widgetNewInvoiceBtn = document.getElementById('widget-new-invoice-btn');

function openNewInvoiceModal() {
  newInvoiceModal.style.display = 'flex';
}
function closeNewInvoiceModalFunc() {
  newInvoiceModal.style.display = 'none';
}
mainNewInvoiceBtn.addEventListener('click', openNewInvoiceModal);
if (widgetNewInvoiceBtn) widgetNewInvoiceBtn.addEventListener('click', openNewInvoiceModal);
closeNewInvoiceModal.addEventListener('click', closeNewInvoiceModalFunc);
// Prevent closing by clicking outside
newInvoiceModal.addEventListener('mousedown', function(e) {
  if (e.target === newInvoiceModal) {
    e.stopPropagation();
    // Do nothing
  }
});

// --- Dropdown Functions for Invoice Popup ---
function toggleExtrasDropdown(event) {
  event.stopPropagation();
  const extrasMenu = document.getElementById('extrasMenuINV');
  const extrasCaret = document.getElementById('extrasCaretINV');
  const extrasDropdown = event.currentTarget.closest('.extras-dropdown');
  
  // Close other dropdowns first
  closeAllDropdowns();
  
  if (extrasMenu.style.opacity === '1') {
    extrasMenu.style.opacity = '0';
    extrasMenu.style.visibility = 'hidden';
    extrasMenu.style.transform = 'translateY(-8px)';
    extrasCaret.style.transform = 'rotate(0deg)';
    extrasDropdown.classList.remove('active');
  } else {
    extrasMenu.style.opacity = '1';
    extrasMenu.style.visibility = 'visible';
    extrasMenu.style.transform = 'translateY(0)';
    extrasCaret.style.transform = 'rotate(180deg)';
    extrasDropdown.classList.add('active');
  }
}

function toggleTransactionsDropdown(event) {
  event.stopPropagation();
  const transactionsMenu = document.getElementById('transactionsMenuINV');
  const transactionsCaret = document.getElementById('transactionsCaretINV');
  const transactionsDropdown = event.currentTarget.closest('.transactions-dropdown');
  
  // Close other dropdowns first
  closeAllDropdowns();
  
  if (transactionsMenu.style.opacity === '1') {
    transactionsMenu.style.opacity = '0';
    transactionsMenu.style.visibility = 'hidden';
    transactionsMenu.style.transform = 'translateY(-8px)';
    transactionsCaret.style.transform = 'rotate(0deg)';
    transactionsDropdown.classList.remove('active');
  } else {
    transactionsMenu.style.opacity = '1';
    transactionsMenu.style.visibility = 'visible';
    transactionsMenu.style.transform = 'translateY(0)';
    transactionsCaret.style.transform = 'rotate(180deg)';
    transactionsDropdown.classList.add('active');
  }
}

function toggleConvertDropdown(event) {
  event.stopPropagation();
  const convertMenu = document.getElementById('convertMenuINV');
  const convertCaret = document.getElementById('convertCaretINV');
  const convertDropdown = event.currentTarget.closest('.convert-dropdown');
  
  // Close other dropdowns first
  closeAllDropdowns();
  
  if (convertMenu.style.opacity === '1') {
    convertMenu.style.opacity = '0';
    convertMenu.style.visibility = 'hidden';
    convertMenu.style.transform = 'translateY(-8px)';
    convertCaret.style.transform = 'rotate(0deg)';
    convertDropdown.classList.remove('active');
  } else {
    convertMenu.style.opacity = '1';
    convertMenu.style.visibility = 'visible';
    convertMenu.style.transform = 'translateY(0)';
    convertCaret.style.transform = 'rotate(180deg)';
    convertDropdown.classList.add('active');
  }
}

function closeAllDropdowns() {
  // Close Extras dropdown
  const extrasMenu = document.getElementById('extrasMenuINV');
  const extrasCaret = document.getElementById('extrasCaretINV');
  const extrasDropdown = document.querySelector('.extras-dropdown');
  if (extrasMenu) {
    extrasMenu.style.opacity = '0';
    extrasMenu.style.visibility = 'hidden';
    extrasMenu.style.transform = 'translateY(-8px)';
    if (extrasCaret) extrasCaret.style.transform = 'rotate(0deg)';
    if (extrasDropdown) extrasDropdown.classList.remove('active');
  }
  
  // Close Transactions dropdown
  const transactionsMenu = document.getElementById('transactionsMenuINV');
  const transactionsCaret = document.getElementById('transactionsCaretINV');
  const transactionsDropdown = document.querySelector('.transactions-dropdown');
  if (transactionsMenu) {
    transactionsMenu.style.opacity = '0';
    transactionsMenu.style.visibility = 'hidden';
    transactionsMenu.style.transform = 'translateY(-8px)';
    if (transactionsCaret) transactionsCaret.style.transform = 'rotate(0deg)';
    if (transactionsDropdown) transactionsDropdown.classList.remove('active');
  }
  
  // Close Convert dropdown
  const convertMenu = document.getElementById('convertMenuINV');
  const convertCaret = document.getElementById('convertCaretINV');
  const convertDropdown = document.querySelector('.convert-dropdown');
  if (convertMenu) {
    convertMenu.style.opacity = '0';
    convertMenu.style.visibility = 'hidden';
    convertMenu.style.transform = 'translateY(-8px)';
    if (convertCaret) convertCaret.style.transform = 'rotate(0deg)';
    if (convertDropdown) convertDropdown.classList.remove('active');
  }
}

function handleExtrasAction(action) {
  if (window.Utils && typeof Utils.showNotification === 'function') {
    Utils.showNotification(`Extras: ${action}`, 'info');
  }
  closeAllDropdowns();
}

function handleTransactionsAction(action) {
  if (window.Utils && typeof Utils.showNotification === 'function') {
    Utils.showNotification(`Transactions: ${action}`, 'info');
  }
  closeAllDropdowns();
}

function handleConvertAction(action) {
  if (window.Utils && typeof Utils.showNotification === 'function') {
    Utils.showNotification(`Convert: ${action}`, 'info');
  }
  closeAllDropdowns();
}

// Close dropdowns when clicking outside
document.addEventListener('click', function(event) {
  if (!event.target.closest('.dropdown-group')) {
    closeAllDropdowns();
  }
});

// Initial update
hydrateInvoiceRows();
document.addEventListener('garage:data-changed', function() {
  hydrateInvoiceRows();
  updateHeaderAndButton();
});
updateHeaderAndButton();
</script>

<?php renderFooter(); ?>

