<?php
require_once 'config.php';
renderHeader();
?>
  <?php include 'partials/sidebar.php'; ?>
  <div class="main-content">
    <?php include 'partials/header.php'; ?>
    
  <!-- Progress Header -->
  <div id="progress-header" class="progress-header" style="background: #b91c1c; color: #fff; border-left: 4px solid #b91c1c;">
    <i class="fas fa-file-invoice-dollar"></i> Estimates In Progress: <span id="header-range" style="font-weight:400;">All</span> <span id="header-records" style="font-weight:400; font-size:0.95em;">(Showing 4 Records)</span>
    </div>

    <!-- Action Buttons -->
    <div class="action-buttons" style="margin-bottom: 18px;">
    <button id="main-action-btn" class="action-btn"><i class="fas fa-plus"></i> New Estimate</button>
    <button id="archives-btn" class="action-btn secondary"><i class="fas fa-archive"></i> Archives</button>
      <button class="action-btn secondary"><i class="fas fa-print"></i> Print</button>
        </div>

  <!-- Search & Filter Toolbar -->
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
        <option>∼</option>
        <option>Auth Req</option>
        <option>Complete</option>
        <option>Service</option>
        <option>Urgent</option>
      </select>
      <button class="clear-btn" onclick="document.getElementById('status-filter').selectedIndex=0;">X</button>
      </div>
    </div>

    <!-- Main Content with Sidebar Layout -->
    <div class="content-with-sidebar">
      <!-- Main Estimates Table -->
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
              <th></th>
              </tr>
            </thead>
            <tbody id="estimates-table-body">
              <tr>
                <td><span class="doc-type-badge doc-type-es">ES</span></td>
              <td>1003</td>
              <td>07/07/2025</td>
              <td></td>
              <td></td>
              <td></td>
              <td>0.00</td>
                <td>
                  <select class="table-select">
                  <option>∼</option>
                  <option>Auth Req</option>
                  <option>Complete</option>
                  <option>Service</option>
                  <option>Urgent</option>
                  </select>
                </td>
              <td style="display:flex;gap:6px;align-items:center;">
                <button class="table-action-btn secondary"><i class="fas fa-phone"></i></button>
                <button class="action-btn" style="padding:4px 16px;font-size:0.95em;">Open</button>
                </td>
              </tr>
              <tr>
                <td><span class="doc-type-badge doc-type-es">ES</span></td>
              <td>1002</td>
              <td>07/07/2025</td>
              <td></td>
              <td></td>
              <td></td>
              <td>0.00</td>
                <td>
                  <select class="table-select">
                  <option>∼</option>
                  <option>Auth Req</option>
                  <option>Complete</option>
                  <option>Service</option>
                  <option>Urgent</option>
                  </select>
                </td>
              <td style="display:flex;gap:6px;align-items:center;">
                <button class="table-action-btn secondary"><i class="fas fa-phone"></i></button>
                <button class="action-btn" style="padding:4px 16px;font-size:0.95em;">Open</button>
                </td>
              </tr>
              <tr>
                <td><span class="doc-type-badge doc-type-es">ES</span></td>
              <td>1001</td>
                <td>04/07/2025</td>
              <td></td>
              <td></td>
              <td></td>
              <td>0.00</td>
              <td>
                <select class="table-select">
                  <option>∼</option>
                  <option>Auth Req</option>
                  <option>Complete</option>
                  <option>Service</option>
                  <option>Urgent</option>
                </select>
              </td>
              <td style="display:flex;gap:6px;align-items:center;">
                <button class="table-action-btn secondary"><i class="fas fa-phone"></i></button>
                <button class="action-btn" style="padding:4px 16px;font-size:0.95em;">Open</button>
              </td>
            </tr>
            <tr>
              <td><span class="doc-type-badge doc-type-es">ES</span></td>
              <td>1000</td>
              <td>03/07/2025</td>
              <td></td>
              <td></td>
              <td></td>
              <td>0.00</td>
                <td>
                  <select class="table-select">
                  <option>∼</option>
                  <option>Auth Req</option>
                  <option>Complete</option>
                  <option>Service</option>
                  <option>Urgent</option>
                  </select>
                </td>
              <td style="display:flex;gap:6px;align-items:center;">
                <button class="table-action-btn secondary"><i class="fas fa-phone"></i></button>
                <button class="action-btn" style="padding:4px 16px;font-size:0.95em;">Open</button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <!-- Right Sidebar -->
      <div class="right-sidebar">
        <div class="sidebar-widget">
          <?php include 'partials/estimate-widget-reminders.php'; ?>
        </div>
        <div class="sidebar-widget">
          <?php include 'partials/estimate-widget-stock-order-info.php'; ?>
        </div>
        <div class="sidebar-widget">
          <?php include 'partials/estimate-widget-notes.php'; ?>
        </div>
    </div>
  </div>

  <!-- Include Estimate Popups -->
  <?php include 'Popups/estimates/new-estimate.php'; ?>

  <script>
  // --- Dynamic Header & Button Logic ---
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
  const dueBtnIcon = '<i class="fas fa-calendar-day"></i>';
  const createdBtnIcon = '<i class="fas fa-clock"></i>';
  let mode = 'due'; // 'due' or 'created'

  function hydrateEstimateRows() {
    if (!window.GarageDataLayer) return;
    GarageDataLayer.renderDocumentRows('estimate', '#estimates-table-body', {
      statuses: ['~', 'Auth Req', 'Complete', 'Service', 'Urgent'],
      badgeClass: 'doc-type-es',
      badgeLabel: 'ES',
      withActions: true
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
    // Update main action button (always New Estimate)
    mainActionBtn.innerHTML = createBtnIcon + ' New Estimate';
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
      if (selectedStatus && selectedStatus !== 'âˆ¼' && selectedStatus !== '∼' && selectedStatus !== '~') {
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

  // Initial render
  hydrateEstimateRows();
  document.addEventListener('garage:data-changed', function() {
    hydrateEstimateRows();
    updateHeaderAndButton();
  });
  // Initial update
  updateHeaderAndButton();
  </script>

<?php renderFooter(); ?> 
