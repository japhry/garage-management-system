<?php
require_once 'config.php';
renderHeader();
?>
<?php include 'partials/sidebar.php'; ?>
<div class="main-content">
  <?php include 'partials/header.php'; ?>
  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <link rel="stylesheet" href="Assets/CSS/calendar.css">
  
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
    <div class="modal-backdrop"></div>
    <div class="modal-content appointment-modal" style="max-width: 98vw; width: 1400px; min-width: 320px; max-height: 95vh; overflow: hidden;">
      <!-- Action Bar -->
      <div class="modal-action-bar">
        <button class="modal-action-btn primary"><i class="fas fa-save"></i> Save</button>
        <button class="modal-action-btn"><i class="fas fa-file-alt"></i> New Doc</button>
        <button class="modal-action-btn" id="openRepetitionModal"><i class="fas fa-redo"></i> New Repetition</button>
        <button class="modal-action-btn"><i class="fas fa-link"></i> Link to Doc</button>
        <div class="modal-action-spacer"></div>
        <button class="modal-action-btn danger"><i class="fas fa-trash"></i> Delete</button>
        <button class="modal-close" id="closeAppointmentModal"><i class="fas fa-times"></i></button>
      </div>
      <!-- Scrollable Content -->
      <div class="modal-scrollable-content">
      <!-- Form Section -->
        <div class="appointment-modal-toprow">
          <!-- Bay -->
          <div class="appointment-modal-col appointment-modal-bay">
            <label for="appt-bay">Bay</label>
            <select id="appt-bay">
              <option>Bay 1</option>
              <option>Bay 2</option>
              <option>Bay 3</option>
              <option>Bay 4</option>
              <option>Bay 5</option>
              <option>Bay 6</option>
            </select>
          </div>
          <!-- Status -->
          <div class="appointment-modal-col appointment-modal-status">
            <label for="appt-status">Status</label>
            <select id="appt-status">
              <option>Auth Req</option>
              <option>Cancellation</option>
              <option>Complete</option>
              <option>Pending Review</option>
              <option>Service</option>
              <option>Urgent</option>
            </select>
          </div>
          <!-- From -->
          <div class="appointment-modal-col appointment-modal-from">
            <label for="appt-from-date">From</label>
            <input type="date" id="appt-from-date">
            <div class="appointment-modal-timerow">
              <input type="number" id="appt-from-hour" min="0" max="23" value="7">
              <span class="appointment-modal-timeseparator">:</span>
              <input type="number" id="appt-from-minute" min="0" max="59" value="00">
              <div class="appointment-modal-addtime">
                <button class="appointment-modal-timeinc" data-target="from" data-increment="15">+15</button>
                <button class="appointment-modal-timeinc" data-target="from" data-increment="30">+30</button>
            </div>
          </div>
            </div>
          <!-- To -->
          <div class="appointment-modal-col appointment-modal-to">
            <label for="appt-to-date">To</label>
            <input type="date" id="appt-to-date">
            <div class="appointment-modal-timerow">
              <input type="number" id="appt-to-hour" min="0" max="23" value="7">
              <span class="appointment-modal-timeseparator">:</span>
              <input type="number" id="appt-to-minute" min="0" max="59" value="00">
              <div class="appointment-modal-addtime">
                <button class="appointment-modal-timeinc" data-target="to" data-increment="45">+45</button>
                <button class="appointment-modal-timeinc" data-target="to" data-increment="60">+60</button>
          </div>
            </div>
          </div>
          <!-- Duration -->
          <div class="appointment-modal-col appointment-modal-duration">
            <span class="appointment-modal-duration-label">Duration</span>
            <div class="appointment-modal-duration-days" id="appt-duration-days">0 days</div>
            <div class="appointment-modal-duration-time" id="appt-duration-time">
              <span class="hours">0h</span>
              <span class="minutes">0m</span>
          </div>
        </div>
      </div>
      <!-- Main Form Grid -->
      <div class="modal-form-row modal-form-grid">
        <!-- Vehicle/Registration Column -->
        <div class="modal-form-col vehicle-col">
          <div class="modal-form-grid-row">
            <label>Registration</label>
            <input type="text" placeholder="Enter registration">
            <button class="modal-btn small"><i class="fas fa-times"></i></button>
            <button class="modal-btn small"><i class="fas fa-search"></i> VRM Lookup</button>
          </div>
          <div class="modal-vehicle-details-grid">
              <div><label>Make / Model</label><input type="text" id="appt-vehicle"></div>
            <div><label>Derivative</label><input type="text"></div>
            <div><label>Chassis</label><input type="text"></div>
            <div><label>Engine CC</label><input type="text"></div>
            <div><label>Engine Code</label><input type="text"></div>
            <div><label>Colour</label><input type="text"></div>
            <div><label>Date Reg</label><input type="text"></div>
            <div><label>Fuel Type</label><input type="text"></div>
            <div><label>Engine No</label><input type="text"></div>
            <div><label>Paint Code</label><input type="text"></div>
            <div><label>Key Code</label><input type="text"></div>
          </div>
          <div class="modal-vehicle-actions">
            <button class="modal-btn icon"><i class="fas fa-user-shield"></i> Privacy Options</button>
            <button class="modal-btn icon"><i class="fas fa-map-marker-alt"></i></button>
            <button class="modal-btn icon"><i class="fas fa-envelope"></i></button>
            <button class="modal-btn icon"><i class="fas fa-comment"></i></button>
          </div>
        </div>
        <!-- Customer/Account Column -->
        <div class="modal-form-col customer-col">
          <div class="modal-form-grid-row">
            <label>Acc Number</label>
            <input type="text" placeholder="Account number">
            <button class="modal-btn small"><i class="fas fa-times"></i></button>
            <button class="modal-btn small"><i class="fas fa-search"></i></button>
            <button class="modal-btn small"><i class="fas fa-plus"></i> New</button>
          </div>
          <div class="modal-customer-details-grid">
            <div><label>Company</label><input type="text"></div>
              <div><label>Name</label><input type="text" id="appt-customer"></div>
            <div><label>House No</label><input type="text"></div>
            <div><label>Road</label><input type="text"></div>
            <div><label>Locality</label><input type="text"></div>
            <div><label>Town</label><input type="text"></div>
            <div><label>Post Code</label><input type="text"></div>
            <div><label>County</label><input type="text"></div>
            <div><label>Mobile</label><input type="text"></div>
            <div><label>Telephone</label><input type="text"></div>
            <div><label>Email</label><input type="text"></div>
          </div>
        </div>
      </div>
      <!-- Tabs -->
      <div class="modal-tabs">
          <button class="modal-tab active" data-tab="description">Description</button>
          <button class="modal-tab" data-tab="appts">Appts for Bay</button>
          <button class="modal-tab" data-tab="repetitions">Repetitions</button>
          <button class="modal-tab" data-tab="vehhistory">Veh History</button>
          <button class="modal-tab" data-tab="vehnotes">Veh Notes</button>
          <button class="modal-tab" data-tab="activity">Activity</button>
      </div>
        <div class="modal-tab-contents">
          <div class="modal-tab-content" id="tab-description" style="display: block;">
            <label for="appt-description-input" style="display:block; margin-bottom:6px; font-weight:600;">Description</label>
            <textarea id="appt-description-input" rows="5" style="width:100%; border-radius:8px; border:1px solid #ccc; padding:10px; font-size:1rem; resize:vertical;" placeholder="Enter appointment description..."></textarea>
          </div>
          <div class="modal-tab-content" id="tab-appts" style="display: none;">
            <div class="appts-bay-table-wrapper">
              <table class="appts-bay-table">
                <thead>
                  <tr>
                    <th>Time</th>
                    <th>Duration</th>
                    <th>Status</th>
                    <th>Description</th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="appt-bay-table-row">
                    <td id="appt-bay-table-time"><i class="fas fa-clock appt-time-icon"></i> <span class="appt-bay-table-time-text">-</span></td>
                    <td id="appt-bay-table-duration"><span class="duration-badge">-</span></td>
                    <td id="appt-bay-table-status"><span class="status-badge">-</span></td>
                    <td id="appt-bay-table-description"><span class="description-text">-</span></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="modal-tab-content" id="tab-repetitions" style="display: none;">
            <div class="repetitions-table-wrapper">
              <table class="repetitions-table">
                <thead>
                  <tr>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Duration</th>
                    <th>Status</th>
                    <th>Description</th>
                  </tr>
                </thead>
                <tbody id="repetitions-table-body">
                  <!-- Rows will be inserted here -->
                </tbody>
              </table>
            </div>
          </div>
          <div class="modal-tab-content" id="tab-vehhistory" style="display: none;">
            <div class="vehhistory-tabs">
              <button class="vehhistory-tab active" data-tab="docs">Prev Docs</button>
              <button class="vehhistory-tab" data-tab="advisors">Prev Advisors</button>
              <button class="vehhistory-tab" data-tab="labour">Prev Labour</button>
              <button class="vehhistory-tab" data-tab="parts">Prev Parts</button>
            </div>
            <div class="vehhistory-table-wrapper">
              <table class="vehhistory-table vehhistory-table-docs" style="display:table;">
                <thead>
                  <tr>
                    <th>Date</th>
                    <th>Doc No</th>
                    <th>Mileage</th>
                    <th>Description</th>
                    <th>Total</th>
                  </tr>
                </thead>
                <tbody id="vehhistory-table-body">
                  <!-- Data rows will go here -->
                </tbody>
              </table>
              <table class="vehhistory-table vehhistory-table-advisors" style="display:none;">
                <thead>
                  <tr>
                    <th>Date</th>
                    <th>Doc No</th>
                    <th>Mileage</th>
                    <th>Description</th>
                  </tr>
                </thead>
                <tbody id="vehhistory-table-advisors-body">
                  <!-- Data rows will go here -->
                </tbody>
              </table>
              <table class="vehhistory-table vehhistory-table-labour" style="display:none;">
                <thead>
                  <tr>
                    <th>Date</th>
                    <th>Doc No</th>
                    <th>Mileage</th>
                    <th>Description</th>
                    <th>Qty</th>
                    <th>SubTotal</th>
                  </tr>
                </thead>
                <tbody id="vehhistory-table-labour-body">
                  <!-- Data rows will go here -->
                </tbody>
              </table>
              <table class="vehhistory-table vehhistory-table-parts" style="display:none;">
                <thead>
                  <tr>
                    <th>Date</th>
                    <th>Doc No</th>
                    <th>Mileage</th>
                    <th>Description</th>
                    <th>Qty</th>
                    <th>SubTotal</th>
                  </tr>
                </thead>
                <tbody id="vehhistory-table-parts-body">
                  <!-- Data rows will go here -->
                </tbody>
              </table>
            </div>
          </div>
          <div class="modal-tab-content" id="tab-vehnotes" style="display: none;">
            <label for="vehnotes-input" style="display:block; margin-bottom:6px; font-weight:600;">Vehicle Notes</label>
            <textarea id="vehnotes-input" rows="5" style="width:100%; border-radius:8px; border:1.5px solid #b91c1c; padding:10px; font-size:1rem; resize:vertical;" placeholder="Enter vehicle notes..."></textarea>
          </div>
          <div class="modal-tab-content" id="tab-activity" style="display: none;">
            <div class="activity-table-wrapper">
              <table class="activity-table">
                <thead>
                  <tr>
                    <th>When</th>
                    <th>User</th>
                    <th>Description</th>
                    <th>From</th>
                    <th>To</th>
                  </tr>
                </thead>
                <tbody id="activity-table-body">
                  <!-- Data rows will go here -->
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- New Doc Modal -->
  <div id="newDocModal" class="newdoc-modal-overlay" style="display:none;">
    <div class="newdoc-modal-backdrop"></div>
    <div class="newdoc-modal-content">
      <div class="newdoc-modal-header">Create a new document</div>
      <div class="newdoc-modal-body">
        <div style="display:flex; align-items:center; gap:14px; margin-bottom:18px;">
          <span><i class="fas fa-info-circle" style="color:#2563eb; font-size:2rem;"></i></span>
          <span style="font-size:1.1rem; color:#22223b;">What type of document do you wish to create?</span>
        </div>
        <div class="newdoc-modal-btnrow">
          <button class="newdoc-modal-btn" id="newdoc-estimate">Estimate</button>
          <button class="newdoc-modal-btn" id="newdoc-jobsheet">Jobsheet</button>
          <button class="newdoc-modal-btn" id="newdoc-invoice">Invoice</button>
          <button class="newdoc-modal-btn newdoc-cancel" id="newdoc-cancel">Cancel</button>
        </div>
      </div>
    </div>
  </div>

  <!-- New Repetition Modal -->
  <div id="repetitionModal" class="repetition-modal-overlay" style="display:none;">
    <div class="repetition-modal-backdrop"></div>
    <div class="repetition-modal-content">
      <div class="repetition-modal-tabs">
        <button class="repetition-tab active" data-tab="daily">Daily</button>
        <button class="repetition-tab" data-tab="weekly">Weekly</button>
        <button class="repetition-tab" data-tab="monthly">Monthly</button>
        <button class="repetition-tab" data-tab="yearly">Yearly</button>
      </div>
      <div class="repetition-modal-body">
        <div class="repetition-tab-content" data-content="daily" style="display:block;">
          <div class="repetition-row">
            <label>Repeat every <input type="number" min="1" value="1" id="repeat-every" class="repetition-input"/> day(s)</label>
          </div>
          <div class="repetition-row repetition-stop-row">
            <div class="repetition-toggle-group">
              <label class="repetition-switch">
                <input type="radio" name="stop-type" id="stop-after-radio" checked>
                <span class="slider"></span>
              </label>
              <span>Stop after</span>
              <input type="number" min="1" value="1" id="stop-after-count" class="repetition-input" style="width:60px;"/>
              <span>more repetition(s)</span>
            </div>
          </div>
          <div class="repetition-row repetition-stop-row">
            <div class="repetition-toggle-group">
              <label class="repetition-switch">
                <input type="radio" name="stop-type" id="stop-on-radio">
                <span class="slider"></span>
              </label>
              <span>Stop on</span>
              <input type="date" id="stop-on-date" class="repetition-input" disabled style="width:140px;"/>
            </div>
          </div>
          <div class="repetition-row" style="justify-content:center; margin-top:18px;">
            <button class="repetition-create-btn" id="create-repetitions">Create Repetitions</button>
          </div>
          <div class="repetition-info-box">
            <div>Once created each repetition becomes its own individual booking, a record for each date / time is created based on the current details of this appointment.<br><br>
            Deleting one of the repetitions will give you an option to remove just that instance, or all repetitions.<br>
            You can also delete repetitions individually from the repetitions tab.<br><br>
            <b>Daily</b> &nbsp;&nbsp; Each day at the same time.<br>
            <b>Weekly</b> &nbsp;&nbsp; Each week on the same day of the week<br>
            <b>Monthly</b> &nbsp;&nbsp; On the same date of the month<br>
            <b>Yearly</b> &nbsp;&nbsp; On the same date / month of the year.</div>
          </div>
        </div>
        <!-- Placeholder for other tab contents, can be extended for weekly/monthly/yearly logic -->
        <div class="repetition-tab-content" data-content="weekly" style="display:none;">
          <div class="repetition-row">
            <label>Repeat every <input type="number" min="1" value="1" class="repetition-input" id="repeat-every-week"/> week(s)</label>
          </div>
          <div class="repetition-row repetition-stop-row">
            <div class="repetition-toggle-group">
              <label class="repetition-switch">
                <input type="radio" name="stop-type-week" id="stop-after-radio-week" checked>
                <span class="slider"></span>
              </label>
              <span>Stop after</span>
              <input type="number" min="1" value="1" class="repetition-input" id="stop-after-count-week" style="width:60px;"/>
              <span>more repetition(s)</span>
            </div>
          </div>
          <div class="repetition-row repetition-stop-row">
            <div class="repetition-toggle-group">
              <label class="repetition-switch">
                <input type="radio" name="stop-type-week" id="stop-on-radio-week">
                <span class="slider"></span>
              </label>
              <span>Stop on</span>
              <input type="date" class="repetition-input" id="stop-on-date-week" disabled style="width:140px;"/>
            </div>
          </div>
          <div class="repetition-row" style="justify-content:center; margin-top:18px;">
            <button class="repetition-create-btn" id="create-repetitions-week">Create Repetitions</button>
          </div>
          <div class="repetition-info-box">
            <div>Once created each repetition becomes its own individual booking, a record for each date / time is created based on the current details of this appointment.<br><br>
            Deleting one of the repetitions will give you an option to remove just that instance, or all repetitions.<br>
            You can also delete repetitions individually from the repetitions tab.<br><br>
            <b>Daily</b> &nbsp;&nbsp; Each day at the same time.<br>
            <b>Weekly</b> &nbsp;&nbsp; Each week on the same day of the week<br>
            <b>Monthly</b> &nbsp;&nbsp; On the same date of the month<br>
            <b>Yearly</b> &nbsp;&nbsp; On the same date / month of the year.</div>
          </div>
        </div>
        <div class="repetition-tab-content" data-content="monthly" style="display:none;">
          <div class="repetition-row">
            <label>Repeat every <input type="number" min="1" value="1" class="repetition-input" id="repeat-every-month"/> month(s)</label>
          </div>
          <div class="repetition-row repetition-stop-row">
            <div class="repetition-toggle-group">
              <label class="repetition-switch">
                <input type="radio" name="stop-type-month" id="stop-after-radio-month" checked>
                <span class="slider"></span>
              </label>
              <span>Stop after</span>
              <input type="number" min="1" value="1" class="repetition-input" id="stop-after-count-month" style="width:60px;"/>
              <span>more repetition(s)</span>
            </div>
          </div>
          <div class="repetition-row repetition-stop-row">
            <div class="repetition-toggle-group">
              <label class="repetition-switch">
                <input type="radio" name="stop-type-month" id="stop-on-radio-month">
                <span class="slider"></span>
              </label>
              <span>Stop on</span>
              <input type="date" class="repetition-input" id="stop-on-date-month" disabled style="width:140px;"/>
            </div>
          </div>
          <div class="repetition-row" style="justify-content:center; margin-top:18px;">
            <button class="repetition-create-btn" id="create-repetitions-month">Create Repetitions</button>
          </div>
          <div class="repetition-info-box">
            <div>Once created each repetition becomes its own individual booking, a record for each date / time is created based on the current details of this appointment.<br><br>
            Deleting one of the repetitions will give you an option to remove just that instance, or all repetitions.<br>
            You can also delete repetitions individually from the repetitions tab.<br><br>
            <b>Daily</b> &nbsp;&nbsp; Each day at the same time.<br>
            <b>Weekly</b> &nbsp;&nbsp; Each week on the same day of the week<br>
            <b>Monthly</b> &nbsp;&nbsp; On the same date of the month<br>
            <b>Yearly</b> &nbsp;&nbsp; On the same date / month of the year.</div>
          </div>
        </div>
        <div class="repetition-tab-content" data-content="yearly" style="display:none;">
          <div class="repetition-row">
            <label>Repeat every <input type="number" min="1" value="1" class="repetition-input" id="repeat-every-year"/> year(s)</label>
          </div>
          <div class="repetition-row repetition-stop-row">
            <div class="repetition-toggle-group">
              <label class="repetition-switch">
                <input type="radio" name="stop-type-year" id="stop-after-radio-year" checked>
                <span class="slider"></span>
              </label>
              <span>Stop after</span>
              <input type="number" min="1" value="1" class="repetition-input" id="stop-after-count-year" style="width:60px;"/>
              <span>more repetition(s)</span>
            </div>
          </div>
          <div class="repetition-row repetition-stop-row">
            <div class="repetition-toggle-group">
              <label class="repetition-switch">
                <input type="radio" name="stop-type-year" id="stop-on-radio-year">
                <span class="slider"></span>
              </label>
              <span>Stop on</span>
              <input type="date" class="repetition-input" id="stop-on-date-year" disabled style="width:140px;"/>
            </div>
          </div>
          <div class="repetition-row" style="justify-content:center; margin-top:18px;">
            <button class="repetition-create-btn" id="create-repetitions-year">Create Repetitions</button>
          </div>
          <div class="repetition-info-box">
            <div>Once created each repetition becomes its own individual booking, a record for each date / time is created based on the current details of this appointment.<br><br>
            Deleting one of the repetitions will give you an option to remove just that instance, or all repetitions.<br>
            You can also delete repetitions individually from the repetitions tab.<br><br>
            <b>Daily</b> &nbsp;&nbsp; Each day at the same time.<br>
            <b>Weekly</b> &nbsp;&nbsp; Each week on the same day of the week<br>
            <b>Monthly</b> &nbsp;&nbsp; On the same date of the month<br>
            <b>Yearly</b> &nbsp;&nbsp; On the same date / month of the year.</div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Link to Document Modal -->
  <div id="linkDocModal" class="linkdoc-modal-overlay" style="display:none;">
    <div class="linkdoc-modal-backdrop"></div>
    <div class="linkdoc-modal-content">
      <div class="linkdoc-modal-header">
        <i class="fas fa-link" style="color:#b91c1c; margin-right:10px; font-size:1.2em; vertical-align:middle;"></i>
        Link to document
      </div>
      <div class="linkdoc-modal-body">
        <div class="linkdoc-modal-instructions">
          Please specify the document type and number you wish to be linked with this appointment
        </div>
        <div class="linkdoc-modal-formrow">
          <label for="linkdoc-type">Doc Type</label>
          <select id="linkdoc-type">
            <option value="SI">SI</option>
            <option value="ES">ES</option>
            <option value="JS">JS</option>
            <option value="SI">SI</option>
            <option value="VS">VS</option>
          </select>
        </div>
        <div class="linkdoc-modal-formrow">
          <label for="linkdoc-number">Doc Number</label>
          <input type="text" id="linkdoc-number" autocomplete="off" placeholder="Enter document number..." />
        </div>
        <div class="linkdoc-modal-btnrow">
          <button class="linkdoc-modal-btn primary" id="linkdoc-link">Link</button>
          <button class="linkdoc-modal-btn" id="linkdoc-cancel">Cancel</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Full Calendar Modal (hidden by default) -->
  <div id="fullCalendarModal" class="modal-overlay" style="display: none; z-index: 2000; align-items: center; justify-content: center;">
    <div class="modal-backdrop" style="z-index: 1; background: rgba(30,30,40,0.10);"></div>
    <div class="modal-content full-calendar-modal" style="z-index: 2; position: relative; max-width: 98vw; width: 1200px; min-width: 900px; max-height: 95vh; overflow: auto;">
      <div class="full-calendar-header" style="display: flex; align-items: center; justify-content: space-between; padding-bottom: 18px; border-bottom: 2px solid #f3f4f6; background: #fff;">
        <div style="display: flex; align-items: center; gap: 18px;">
          <h2 style="font-size: 1.35rem; font-weight: 700; color: #b91c1c; margin: 0; display: flex; align-items: center; gap: 10px;">
            <i class="fas fa-calendar-alt"></i>
            <span id="full-calendar-date">Monday, Jul 7, 2025</span>
          </h2>
          <div class="full-calendar-tabs" style="display: flex; gap: 8px; margin-left: 24px;">
            <button class="calendar-view-tab active" data-view="day">Day</button>
            <button class="calendar-view-tab" data-view="week">Week</button>
            <button class="calendar-view-tab" data-view="month">Month</button>
          </div>
        </div>
        <div style="display: flex; align-items: center; gap: 12px;">
          <input type="text" class="calendar-search" placeholder="Appointment Search" style="padding: 7px 14px; border-radius: 8px; border: 1.5px solid #e5e7eb; font-size: 1rem; min-width: 180px;">
          <button class="calendar-nav-btn" id="calendar-yesterday">Yesterday</button>
          <button class="calendar-nav-btn primary" id="calendar-today">Today</button>
          <button class="calendar-nav-btn" id="calendar-tomorrow">Tomorrow</button>
          <button class="modal-close" id="closeFullCalendarModal" style="margin-left: 18px;"><i class="fas fa-times"></i></button>
        </div>
      </div>
      <div class="full-calendar-body" style="margin-top: 18px; background: #fff;">
        <!-- Placeholder for the calendar grid -->
        <div id="full-calendar-grid" style="min-height: 500px; max-height: 520px; background: #fff; border-radius: 14px; box-shadow: 0 2px 12px 0 rgba(185,28,28,0.07); border: 1.5px solid #b91c1c; overflow-x: auto; overflow-y: auto;">
          <!-- Calendar grid will be rendered here by JS -->
        </div>
      </div>
    </div>
  </div>
  
  <script src="Assets/JS/script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  <script src="Assets/JS/calendar.js"></script>
</div>
<?php renderFooter(); ?> 