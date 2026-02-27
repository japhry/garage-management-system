<?php
require_once 'config.php';
renderHeader();
?>
<?php include 'partials/sidebar.php'; ?>
<div class="main-content">
  <?php include 'partials/header.php'; ?>
  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <link rel="stylesheet" href="Assets/CSS/calendar.css">
  <style>
    .flatpickr-calendar {
      border-radius: 10px;
      border: 2px solid #b91c1c;
      box-shadow: 0 4px 24px 0 rgba(185,28,28,0.10);
    }
    .flatpickr-day.selected, .flatpickr-day.startRange, .flatpickr-day.endRange, .flatpickr-day:hover {
      background: #b91c1c;
      color: #fff;
      border-radius: 6px;
    }
    .flatpickr-months .flatpickr-month {
      color: #b91c1c;
    }
    .flatpickr-weekday {
      color: #b91c1c;
    }
    .repetitions-table-wrapper {
      max-height: 320px;
      overflow-y: auto;
      border-radius: 14px;
      border: 1.5px solid #b91c1c;
      background: #f8f9fa;
      margin-top: 8px;
      box-shadow: 0 2px 12px 0 rgba(185,28,28,0.07);
    }
    .repetitions-table {
      width: 100%;
      border-collapse: separate;
      border-spacing: 0;
      font-size: 1rem;
      background: #f8f9fa;
      border-radius: 14px;
      overflow: hidden;
      box-shadow: 0 1px 6px 0 rgba(80,80,180,0.06);
    }
    .repetitions-table th {
      position: sticky;
      top: 0;
      background: #b91c1c;
      color: #fff;
      font-weight: 700;
      padding: 12px 18px;
      border-bottom: 2.5px solid #fff;
      text-align: left;
      z-index: 2;
      letter-spacing: 0.02em;
      font-size: 1.05em;
    }
    .repetitions-table td {
      padding: 12px 18px;
      border-bottom: 1.5px solid #f3f4f6;
      background: #fff;
      color: #22223b;
      vertical-align: middle;
      font-size: 1.01em;
      transition: background 0.18s;
    }
    .repetitions-table tr.selected, .repetitions-table tr:hover {
      background: #fff6f0;
      box-shadow: 0 2px 8px 0 rgba(185,28,28,0.06);
    }
    .repetitions-table tr:first-child td {
      border-top: none;
    }
    .repetitions-table td:first-child, .repetitions-table th:first-child {
      border-top-left-radius: 12px;
    }
    .repetitions-table td:last-child, .repetitions-table th:last-child {
      border-top-right-radius: 12px;
    }
    .repetitions-table td .status-badge {
      display: inline-block;
      background: #e0e7ff;
      color: #6366f1;
      font-weight: 700;
      border-radius: 8px;
      padding: 4px 12px;
      font-size: 1em;
      letter-spacing: 0.01em;
      box-shadow: 0 1px 4px 0 rgba(80,80,180,0.04);
    }
    .repetitions-table td .status-badge.pending {
      background: #fffbe6;
      color: #b91c1c;
    }
    .repetitions-table td .status-badge.complete {
      background: #e0f7ef;
      color: #059669;
    }
    .repetitions-table td .status-badge.cancelled {
      background: #fee2e2;
      color: #b91c1c;
    }
    .repetitions-table td .status-badge.review {
      background: #e0e7ff;
      color: #6366f1;
    }
    .repetitions-table td .status-badge.urgent {
      background: #fee2e2;
      color: #b91c1c;
    }
    .repetitions-table td .status-badge.service {
      background: #f3f4f6;
      color: #b91c1c;
    }
    .repetitions-table td .status-badge.auth {
      background: #fef9c3;
      color: #b91c1c;
    }
    .repetitions-table td .status-badge.cancellation {
      background: #fef2f2;
      color: #b91c1c;
    }
    .repetitions-table td .status-badge {
      min-width: 110px;
      text-align: center;
    }
    @media (max-width: 700px) {
      .repetitions-table th, .repetitions-table td {
        padding: 8px 6px;
        font-size: 0.97em;
      }
    }
    /* Appts for Bay Table Modern Styling - Unified with Repetitions Table */
    .appts-bay-table-wrapper {
      max-height: 320px;
      overflow-y: auto;
      border-radius: 14px;
      border: 1.5px solid #b91c1c;
      background: #f8f9fa;
      margin-top: 8px;
      box-shadow: 0 2px 12px 0 rgba(185,28,28,0.07);
    }
    .appts-bay-table {
      width: 100%;
      border-collapse: separate;
      border-spacing: 0;
      font-size: 1rem;
      background: #f8f9fa;
      border-radius: 14px;
      overflow: hidden;
      box-shadow: 0 1px 6px 0 rgba(80,80,180,0.06);
    }
    .appts-bay-table th {
      position: sticky;
      top: 0;
      background: #b91c1c;
      color: #fff;
      font-weight: 700;
      padding: 12px 18px;
      border-bottom: 2.5px solid #fff;
      text-align: left;
      z-index: 2;
      letter-spacing: 0.02em;
      font-size: 1.05em;
    }
    .appts-bay-table td {
      padding: 12px 18px;
      border-bottom: 1.5px solid #f3f4f6;
      background: #fff;
      color: #22223b;
      vertical-align: middle;
      font-size: 1.01em;
      transition: background 0.18s;
    }
    .appts-bay-table tr.selected, .appts-bay-table tr:hover {
      background: #fff6f0;
      box-shadow: 0 2px 8px 0 rgba(185,28,28,0.06);
    }
    .appts-bay-table tr:first-child td {
      border-top: none;
    }
    .appts-bay-table td:first-child, .appts-bay-table th:first-child {
      border-top-left-radius: 12px;
    }
    .appts-bay-table td:last-child, .appts-bay-table th:last-child {
      border-top-right-radius: 12px;
    }
    .appts-bay-table td .status-badge {
      display: inline-block;
      background: #fffbe6;
      color: #b91c1c;
      font-weight: 700;
      border-radius: 8px;
      padding: 4px 12px;
      font-size: 1em;
      letter-spacing: 0.01em;
      box-shadow: 0 1px 4px 0 rgba(80,80,180,0.04);
      min-width: 110px;
      text-align: center;
      text-transform: uppercase;
    }
    .appts-bay-table td .duration-badge {
      background:#e0f7ef; color:#059669; font-weight:700; border-radius:8px; padding:4px 12px; font-size:1em;
      display: inline-block;
      min-width: 90px;
      text-align: center;
    }
    .appts-bay-table td .description-text {
      color:#6b7280; font-style:italic;
    }
    .appts-bay-table td .appt-time-icon {
      color: #b91c1c;
      font-size: 1.1em;
      margin-right: 6px;
      vertical-align: middle;
    }
    @media (max-width: 700px) {
      .appts-bay-table th, .appts-bay-table td {
        padding: 8px 6px;
        font-size: 0.97em;
      }
    }
    .vehhistory-tabs {
      display: flex; gap: 0; margin-bottom: 10px;
      border-bottom: 3px solid #b91c1c;
      background: #fff;
      border-radius: 12px 12px 0 0;
      overflow: hidden;
    }
    .vehhistory-tab {
      background: #fff; color: #b91c1c; border: none; outline: none;
      font-size: 1.08rem; font-weight: 600; padding: 10px 32px 10px 32px;
      border-radius: 12px 12px 0 0; margin-right: 2px;
      cursor: pointer; position: relative; top: 2px;
      transition: background 0.18s, color 0.18s;
      box-shadow: 0 2px 6px 0 rgba(185,28,28,0.04);
    }
    .vehhistory-tab.active {
      background: #b91c1c; color: #fff; z-index:2;
      box-shadow: 0 4px 12px 0 rgba(185,28,28,0.10);
    }
    .vehhistory-table-wrapper {
      max-height: 320px;
      overflow-y: auto;
      border-radius: 0 0 14px 14px;
      border: 1.5px solid #b91c1c;
      background: #f8f9fa;
      box-shadow: 0 2px 12px 0 rgba(185,28,28,0.07);
    }
    .vehhistory-table {
      width: 100%;
      border-collapse: separate;
      border-spacing: 0;
      font-size: 1rem;
      background: #f8f9fa;
      border-radius: 0 0 14px 14px;
      overflow: hidden;
      box-shadow: 0 1px 6px 0 rgba(80,80,180,0.06);
    }
    .vehhistory-table th {
      position: sticky;
      top: 0;
      background: #b91c1c;
      color: #fff;
      font-weight: 700;
      padding: 12px 18px;
      border-bottom: 2.5px solid #fff;
      text-align: left;
      z-index: 2;
      letter-spacing: 0.02em;
      font-size: 1.05em;
    }
    .vehhistory-table td {
      padding: 12px 18px;
      border-bottom: 1.5px solid #f3f4f6;
      background: #fff;
      color: #22223b;
      vertical-align: middle;
      font-size: 1.01em;
      transition: background 0.18s;
    }
    .vehhistory-table tr.selected, .vehhistory-table tr:hover {
      background: #fff6f0;
      box-shadow: 0 2px 8px 0 rgba(185,28,28,0.06);
    }
    .vehhistory-table tr:first-child td {
      border-top: none;
    }
    .vehhistory-table td:first-child, .vehhistory-table th:first-child {
      border-top-left-radius: 12px;
    }
    .vehhistory-table td:last-child, .vehhistory-table th:last-child {
      border-top-right-radius: 12px;
    }
    @media (max-width: 700px) {
      .vehhistory-table th, .vehhistory-table td {
        padding: 8px 6px;
        font-size: 0.97em;
      }
      .vehhistory-tab { padding: 8px 10px; font-size: 0.97em; }
    }
    .activity-table-wrapper {
      max-height: 320px;
      overflow-y: auto;
      border-radius: 14px;
      border: 1.5px solid #b91c1c;
      background: #f8f9fa;
      margin-top: 8px;
      box-shadow: 0 2px 12px 0 rgba(185,28,28,0.07);
    }
    .activity-table {
      width: 100%;
      border-collapse: separate;
      border-spacing: 0;
      font-size: 1rem;
      background: #f8f9fa;
      border-radius: 14px;
      overflow: hidden;
      box-shadow: 0 1px 6px 0 rgba(80,80,180,0.06);
    }
    .activity-table th {
      position: sticky;
      top: 0;
      background: #b91c1c;
      color: #fff;
      font-weight: 700;
      padding: 12px 18px;
      border-bottom: 2.5px solid #fff;
      text-align: left;
      z-index: 2;
      letter-spacing: 0.02em;
      font-size: 1.05em;
    }
    .activity-table td {
      padding: 12px 18px;
      border-bottom: 1.5px solid #f3f4f6;
      background: #fff;
      color: #22223b;
      vertical-align: middle;
      font-size: 1.01em;
      transition: background 0.18s;
    }
    .activity-table tr.selected, .activity-table tr:hover {
      background: #fff6f0;
      box-shadow: 0 2px 8px 0 rgba(185,28,28,0.06);
    }
    .activity-table tr:first-child td {
      border-top: none;
    }
    .activity-table td:first-child, .activity-table th:first-child {
      border-top-left-radius: 12px;
    }
    .activity-table td:last-child, .activity-table th:last-child {
      border-top-right-radius: 12px;
    }
    @media (max-width: 700px) {
      .activity-table th, .activity-table td {
        padding: 8px 6px;
        font-size: 0.97em;
      }
    }
  </style>
  
  <!-- Enhanced Stats Grid -->
  <div class="calendar-stats-grid">
    <div class="calendar-stat-card today">
      <div class="calendar-stat-icon">
        <i class="fas fa-calendar-day"></i>
      </div>
      <div class="calendar-stat-title">Today's Appointments</div>
      <div class="calendar-stat-value">7</div>
      <div class="calendar-stat-subtext">2 pending confirmation</div>
    </div>
    <div class="calendar-stat-card week">
      <div class="calendar-stat-icon">
        <i class="fas fa-calendar-week"></i>
      </div>
      <div class="calendar-stat-title">This Week</div>
      <div class="calendar-stat-value">23</div>
      <div class="calendar-stat-subtext">+5 from last week</div>
    </div>
    <div class="calendar-stat-card slots">
      <div class="calendar-stat-icon">
        <i class="fas fa-clock"></i>
      </div>
      <div class="calendar-stat-title">Available Slots</div>
      <div class="calendar-stat-value">12</div>
      <div class="calendar-stat-subtext">This week</div>
    </div>
    <div class="calendar-stat-card overdue">
      <div class="calendar-stat-icon">
        <i class="fas fa-user-clock"></i>
      </div>
      <div class="calendar-stat-title">Overdue Services</div>
      <div class="calendar-stat-value">3</div>
      <div class="calendar-stat-subtext">Need follow-up</div>
    </div>
  </div>

  <!-- Enhanced Quick Actions -->
  <div class="calendar-quick-actions">
    <div class="quick-actions-header">
      <h2 class="quick-actions-title">
        <i class="fas fa-bolt"></i>
        Quick Actions
      </h2>
      <button class="btn-primary">
        <i class="fas fa-plus"></i> New Appointment
      </button>
    </div>
    <div class="quick-actions-grid">
      <div class="quick-action-card">
        <div class="quick-action-icon">
          <i class="fas fa-calendar-plus"></i>
        </div>
        <div class="quick-action-title">Schedule Service</div>
        <div class="quick-action-subtext">Book new appointment</div>
      </div>
      <div class="quick-action-card">
        <div class="quick-action-icon">
          <i class="fas fa-search"></i>
        </div>
        <div class="quick-action-title">Find Availability</div>
        <div class="quick-action-subtext">Check open time slots</div>
      </div>
      <div class="quick-action-card">
        <div class="quick-action-icon">
          <i class="fas fa-bell"></i>
        </div>
        <div class="quick-action-title">Send Reminders</div>
        <div class="quick-action-subtext">Notify customers</div>
      </div>
      <div class="quick-action-card">
        <div class="quick-action-icon">
          <i class="fas fa-chart-line"></i>
        </div>
        <div class="quick-action-title">View Analytics</div>
        <div class="quick-action-subtext">Performance insights</div>
      </div>
    </div>
  </div>

  <!-- Enhanced Today's Schedule -->
  <div class="calendar-schedule">
    <div class="schedule-header">
      <h2 class="schedule-title">
        <i class="fas fa-clock"></i>
        Today's Schedule
      </h2>
      <button class="btn-view-all">View Full Calendar</button>
    </div>
    <table class="enhanced-data-table">
      <thead>
        <tr>
          <th>Time</th>
          <th>Customer</th>
          <th>Vehicle</th>
          <th>Service</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <!-- Dynamic schedule rows will be populated by JavaScript -->
      </tbody>
    </table>
  </div>

  <!-- Enhanced Upcoming Appointments -->
  <div class="enhanced-upcoming-appointments">
    <div class="upcoming-header">
      <h2 class="upcoming-title">
        <i class="fas fa-calendar-alt"></i>
        Upcoming Appointments
      </h2>
      <div class="upcoming-filters">
        <button class="appointment-filter active">All</button>
        <button class="appointment-filter">Tomorrow</button>
        <button class="appointment-filter">This Week</button>
        <button class="appointment-filter">Next Week</button>
      </div>
    </div>
    <div class="upcoming-appointments-grid">
      <!-- Dynamic appointment cards will be populated by JavaScript -->
    </div>
  </div>

  <!-- Include Calendar Popups -->
  <?php include 'Popups/calendar/new-appointment.php'; ?>
  <?php include 'Popups/calendar/view-full-calendar.php'; ?>
  <?php include 'Popups/calendar/link-document.php'; ?>
  <?php include 'Popups/calendar/new-document.php'; ?>
  <?php include 'Popups/calendar/new-repetition.php'; ?>
  
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  <script src="Assets/JS/calendar.js"></script>
  <script>
  // Modal open/close logic
  const openModalBtn = document.querySelector('.btn-primary, .quick-action-card');
  const modal = document.getElementById('appointmentModal');
  const closeModalBtn = document.getElementById('closeAppointmentModal');
  if (openModalBtn && modal && closeModalBtn) {
    openModalBtn.addEventListener('click', () => { modal.style.display = 'flex'; });
    closeModalBtn.addEventListener('click', () => { modal.style.display = 'none'; });
    window.addEventListener('click', (e) => { if (e.target === modal) modal.style.display = 'none'; });
  }

  // Duration calculation functionality
  function calculateDuration() {
    const fromDate = document.getElementById('appt-from-date').value;
    const toDate = document.getElementById('appt-to-date').value;
    const fromHour = parseInt(document.getElementById('appt-from-hour').value) || 0;
    const fromMinute = parseInt(document.getElementById('appt-from-minute').value) || 0;
    const toHour = parseInt(document.getElementById('appt-to-hour').value) || 0;
    const toMinute = parseInt(document.getElementById('appt-to-minute').value) || 0;

    // Create Date objects for comparison
    const fromDateTime = new Date(fromDate + 'T' + String(fromHour).padStart(2, '0') + ':' + String(fromMinute).padStart(2, '0') + ':00');
    const toDateTime = new Date(toDate + 'T' + String(toHour).padStart(2, '0') + ':' + String(toMinute).padStart(2, '0') + ':00');

    // Calculate difference in milliseconds
    const diffMs = toDateTime - fromDateTime;
    
    if (diffMs < 0) {
      document.getElementById('appt-duration-days').textContent = 'Invalid';
      document.getElementById('appt-duration-time').innerHTML = '<span class="hours">0h</span><span class="minutes">0m</span>';
      return;
    }

    // Convert to days, hours and minutes
    const diffDays = Math.floor(diffMs / (1000 * 60 * 60 * 24));
    const diffHours = Math.floor((diffMs % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    const diffMinutes = Math.floor((diffMs % (1000 * 60 * 60)) / (1000 * 60));

    // Update days display
    const daysText = diffDays === 1 ? 'day' : 'days';
    document.getElementById('appt-duration-days').textContent = `${diffDays} ${daysText}`;

    // Update time display with styled elements
    const hoursText = diffHours === 1 ? 'h' : 'h';
    const minutesText = diffMinutes === 1 ? 'm' : 'm';
    document.getElementById('appt-duration-time').innerHTML = `<span class="hours">${diffHours}${hoursText}</span><span class="minutes">${diffMinutes}${minutesText}</span>`;
  }

  // Add event listeners for time inputs
  function initializeDurationCalculator() {
    const timeInputs = ['appt-from-date', 'appt-to-date', 'appt-from-hour', 'appt-from-minute', 'appt-to-hour', 'appt-to-minute'];
    timeInputs.forEach(id => {
      const element = document.getElementById(id);
      if (element) {
        element.addEventListener('input', calculateDuration);
        element.addEventListener('change', calculateDuration);
      }
    });

    // Add event listeners for increment buttons
    const incrementButtons = document.querySelectorAll('.appointment-modal-timeinc');
    incrementButtons.forEach(button => {
      button.addEventListener('click', function() {
        const target = this.getAttribute('data-target');
        const increment = parseInt(this.getAttribute('data-increment'));
        
        const hourInput = document.getElementById(`appt-${target}-hour`);
        const minuteInput = document.getElementById(`appt-${target}-minute`);
        
        let currentHour = parseInt(hourInput.value) || 0;
        let currentMinute = parseInt(minuteInput.value) || 0;
        
        // Add increment to minutes
        currentMinute += increment;
        
        // Handle hour overflow
        while (currentMinute >= 60) {
          currentMinute -= 60;
          currentHour += 1;
        }
        
        // Handle day overflow (24-hour format)
        if (currentHour >= 24) {
          currentHour = 0;
          // You could add logic here to increment the date if needed
        }
        
        hourInput.value = currentHour;
        minuteInput.value = currentMinute;
        
        calculateDuration();
      });
    });

    // Initial calculation
    calculateDuration();
  }

  // Initialize when modal opens
  if (openModalBtn) {
    openModalBtn.addEventListener('click', () => {
      setTimeout(initializeDurationCalculator, 100);
    });
  }

  // Also initialize if modal is already visible
  if (modal && modal.style.display !== 'none') {
    initializeDurationCalculator();
  }

  // Tab switching logic
  const tabButtons = document.querySelectorAll('.modal-tab');
  const tabContents = document.querySelectorAll('.modal-tab-content');
  tabButtons.forEach(btn => {
    btn.addEventListener('click', function() {
      // Remove active from all
      tabButtons.forEach(b => b.classList.remove('active'));
      // Hide all contents
      tabContents.forEach(c => c.style.display = 'none');
      // Activate clicked
      this.classList.add('active');
      const tab = this.getAttribute('data-tab');
      const content = document.getElementById('tab-' + tab);
      if (content) content.style.display = 'block';
    });
  });

  // Show New Doc modal when New Doc button is clicked
  const newDocBtn = document.querySelector('.modal-action-btn:not(.primary):not(.danger)');
  const newDocModal = document.getElementById('newDocModal');
  const newDocBackdrop = document.querySelector('.newdoc-modal-backdrop');
  if (newDocBtn && newDocModal) {
    newDocBtn.addEventListener('click', function(e) {
      e.preventDefault();
      newDocModal.style.display = 'flex';
    });
  }
  // Hide modal on Cancel or backdrop click
  ['newdoc-cancel', 'newDocModal', 'newdoc-modal-backdrop'].forEach(id => {
    const el = document.getElementById(id) || document.querySelector('.'+id);
    if (el) {
      el.addEventListener('click', function(e) {
        if (e.target === el) newDocModal.style.display = 'none';
      });
    }
  });
  document.getElementById('newdoc-cancel').addEventListener('click', function() {
    newDocModal.style.display = 'none';
  });
  // Redirects
  if (document.getElementById('newdoc-estimate')) {
    document.getElementById('newdoc-estimate').onclick = function() { window.location.href = 'estimates.php'; };
  }
  if (document.getElementById('newdoc-jobsheet')) {
    document.getElementById('newdoc-jobsheet').onclick = function() { window.location.href = 'job-sheets.php'; };
  }
  if (document.getElementById('newdoc-invoice')) {
    document.getElementById('newdoc-invoice').onclick = function() { window.location.href = 'invoices.php'; };
  }

  // Show Repetition Modal when 'New Repetition' button is clicked in the action bar
  const openRepetitionModalBtn = document.getElementById('openRepetitionModal');
  const repetitionModal = document.getElementById('repetitionModal');
  if (openRepetitionModalBtn && repetitionModal) {
    openRepetitionModalBtn.addEventListener('click', function(e) {
      e.preventDefault();
      repetitionModal.style.display = 'flex';
    });
  }
  // Hide modal on backdrop click
  const repetitionBackdrop = document.querySelector('.repetition-modal-backdrop');
  if (repetitionBackdrop) {
    repetitionBackdrop.addEventListener('click', function() {
      repetitionModal.style.display = 'none';
    });
  }
  // Tab switching logic
  const repTabs = document.querySelectorAll('.repetition-tab');
  const repTabContents = document.querySelectorAll('.repetition-tab-content');
  repTabs.forEach(tab => {
    tab.addEventListener('click', function() {
      repTabs.forEach(t => t.classList.remove('active'));
      tab.classList.add('active');
      const tabName = tab.getAttribute('data-tab');
      repTabContents.forEach(content => {
        content.style.display = (content.getAttribute('data-content') === tabName) ? 'block' : 'none';
      });
    });
  });
  // Stop condition toggles (Daily tab example, repeat for others)
  function setupStopToggles(suffix) {
    const afterRadio = document.getElementById('stop-after-radio'+suffix);
    const onRadio = document.getElementById('stop-on-radio'+suffix);
    const onDate = document.getElementById('stop-on-date'+suffix);
    if (afterRadio && onRadio && onDate) {
      afterRadio.addEventListener('change', function() {
        if (afterRadio.checked) onDate.disabled = true;
      });
      onRadio.addEventListener('change', function() {
        if (onRadio.checked) onDate.disabled = false;
      });
      // When user clicks the date input, auto-select the 'Stop on' radio and enable input
      onDate.addEventListener('focus', function() {
        onRadio.checked = true;
        onDate.disabled = false;
      });
      // Also allow clicking the date input's container (for better UX)
      onDate.addEventListener('mousedown', function() {
        onRadio.checked = true;
        onDate.disabled = false;
      });
    }
  }
  setupStopToggles('');
  setupStopToggles('-week');
  setupStopToggles('-month');
  setupStopToggles('-year');

  // Show Link to Doc modal when Link to Doc button is clicked
  const linkDocBtn = document.querySelector('.modal-action-btn i.fa-link')?.parentElement;
  const linkDocModal = document.getElementById('linkDocModal');
  if (linkDocBtn && linkDocModal) {
    linkDocBtn.addEventListener('click', function(e) {
      e.preventDefault();
      linkDocModal.style.display = 'flex';
    });
  }
  // Hide modal on Cancel or backdrop click
  const linkDocBackdrop = document.querySelector('.linkdoc-modal-backdrop');
  document.getElementById('linkdoc-cancel').addEventListener('click', function() {
    linkDocModal.style.display = 'none';
  });
  if (linkDocBackdrop) {
    linkDocBackdrop.addEventListener('click', function() {
      linkDocModal.style.display = 'none';
    });
  }
  // Link button (for now, just close modal or show alert)
  document.getElementById('linkdoc-link').addEventListener('click', function() {
    // You can add your linking logic here
    linkDocModal.style.display = 'none';
  });

  // Veh History tab switching (show correct table)
  document.querySelectorAll('.vehhistory-tab').forEach(tab => {
    tab.addEventListener('click', function() {
      document.querySelectorAll('.vehhistory-tab').forEach(t => t.classList.remove('active'));
      tab.classList.add('active');
      // Show/hide tables
      document.querySelector('.vehhistory-table-docs').style.display = tab.dataset.tab === 'docs' ? 'table' : 'none';
      document.querySelector('.vehhistory-table-advisors').style.display = tab.dataset.tab === 'advisors' ? 'table' : 'none';
      document.querySelector('.vehhistory-table-labour').style.display = tab.dataset.tab === 'labour' ? 'table' : 'none';
      document.querySelector('.vehhistory-table-parts').style.display = tab.dataset.tab === 'parts' ? 'table' : 'none';
      // Add similar logic for other tabs if needed
    });
  });
  </script>
</div>
<?php renderFooter(); ?> 
