<?php
// New Appointment Modal
// This file contains the appointment creation/editing popup
// Include this file where needed using: include 'Popups/calendar/new-appointment.php';
?>

<!-- New Appointment Modal (hidden by default) -->
<div id="appointmentModal" class="modal-overlay" style="display: none; align-items: center; justify-content: center;">
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

<script>
// Tab switching functionality
document.addEventListener('DOMContentLoaded', function() {
  const tabs = document.querySelectorAll('.modal-tab');
  const tabContents = document.querySelectorAll('.modal-tab-content');
  
  tabs.forEach(tab => {
    tab.addEventListener('click', function() {
      const targetTab = this.getAttribute('data-tab');
      
      // Remove active class from all tabs and contents
      tabs.forEach(t => t.classList.remove('active'));
      tabContents.forEach(content => content.style.display = 'none');
      
      // Add active class to clicked tab and show corresponding content
      this.classList.add('active');
      document.getElementById('tab-' + targetTab).style.display = 'block';
    });
  });
});
</script> 