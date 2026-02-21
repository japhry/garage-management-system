<?php
// New Repetition Modal
// This file contains the repetition creation popup
// Include this file where needed using: include 'Popups/calendar/new-repetition.php';
?>

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
  <style>
    .repetition-modal-overlay {
      position: fixed; top:0; left:0; right:0; bottom:0; z-index:2100;
      display: flex; align-items: center; justify-content: center;
      background: rgba(30,30,40,0.18);
    }
    .repetition-modal-backdrop {
      position: absolute; top:0; left:0; right:0; bottom:0;
      background: rgba(255,255,255,0.7);
      z-index:1;
    }
    .repetition-modal-content {
      position: relative; z-index:2;
      background: #fff; border-radius: 14px; box-shadow: 0 4px 24px 0 rgba(80,80,180,0.10);
      min-width: 370px; max-width: 98vw; padding: 28px 32px 22px 32px;
      display: flex; flex-direction: column; align-items: stretch;
      border: 2px solid #b91c1c;
    }
    .repetition-modal-tabs {
      display: flex; gap: 0; margin-bottom: 18px;
      border-bottom: 3px solid #22223b;
    }
    .repetition-tab {
      background: #22223b; color: #fff; border: none; outline: none;
      font-size: 1.1rem; font-weight: 600; padding: 8px 32px 8px 32px;
      border-radius: 10px 10px 0 0; margin-right: 2px;
      cursor: pointer; position: relative; top: 2px;
      transition: background 0.18s, color 0.18s;
      box-shadow: 0 2px 6px 0 rgba(80,80,80,0.08);
    }
    .repetition-tab.active {
      background: #b91c1c; color: #fff; z-index:2;
      box-shadow: 0 4px 12px 0 rgba(185,28,28,0.10);
    }
    .repetition-modal-body {
      padding: 0 0 0 0;
    }
    .repetition-row {
      display: flex; align-items: center; gap: 10px; margin-bottom: 16px;
    }
    .repetition-stop-row { margin-left: 8px; }
    .repetition-toggle-group { display: flex; align-items: center; gap: 8px; }
    .repetition-input {
      border: 1.5px solid #b91c1c; border-radius: 6px; padding: 4px 8px; font-size: 1rem; width: 60px;
      outline: none; transition: border 0.18s;
    }
    .repetition-input:focus { border: 1.5px solid #22223b; }
    .repetition-switch { position: relative; display: inline-block; width: 36px; height: 20px; }
    .repetition-switch input { opacity: 0; width: 0; height: 0; }
    .slider {
      position: absolute; cursor: pointer; top: 0; left: 0; right: 0; bottom: 0;
      background-color: #e5e7eb; border-radius: 20px;
      transition: .4s;
    }
    .repetition-switch input:checked + .slider {
      background-color: #b91c1c;
    }
    .slider:before {
      position: absolute; content: ""; height: 14px; width: 14px; left: 3px; bottom: 3px;
      background-color: white; border-radius: 50%; transition: .4s;
    }
    .repetition-switch input:checked + .slider:before {
      transform: translateX(16px);
    }
    .repetition-create-btn {
      background: #b91c1c; color: #fff; border: none; border-radius: 8px;
      font-size: 1.08rem; font-weight: 600; padding: 10px 32px;
      cursor: pointer; transition: background 0.18s;
      box-shadow: 0 1px 4px 0 rgba(185,28,28,0.08);
    }
    .repetition-create-btn:hover { background: #22223b; }
    .repetition-info-box {
      background: #f1f5f9; color: #22223b; border-radius: 8px; padding: 14px 16px; margin-top: 18px;
      font-size: 1rem; border: 1.5px solid #b91c1c;
    }
    /* Enhance date input for Stop on */
    .repetition-input[type="date"] {
      background: #fff url('data:image/svg+xml;utf8,<svg fill="%23b91c1c" height="18" viewBox="0 0 24 24" width="18" xmlns="http://www.w3.org/2000/svg"><path d="M7 10h2v2H7zm4 0h2v2h-2zm4 0h2v2h-2z"/><path d="M19 4h-1V2h-2v2H8V2H6v2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 16H5V9h14v11zm0-13H5V6h14v1z"/></svg>') no-repeat right 10px center/18px 18px;
      border: 1.5px solid #b91c1c;
      border-radius: 6px;
      padding: 4px 36px 4px 8px;
      font-size: 1rem;
      outline: none;
      transition: border 0.18s;
      width: 140px;
      color: #22223b;
    }
    .repetition-input[type="date"]:focus {
      border: 1.5px solid #22223b;
    }
  </style>
</div>

<script>
// New Repetition Modal functionality
document.addEventListener('DOMContentLoaded', function() {
  const repetitionModal = document.getElementById('repetitionModal');
  const repetitionCancelBtn = document.getElementById('repetition-cancel');
  const repetitionBackdrop = repetitionModal?.querySelector('.repetition-modal-backdrop');
  const repetitionTabs = document.querySelectorAll('.repetition-modal-tab');

  function openRepetitionModal() {
    if (repetitionModal) repetitionModal.style.display = 'flex';
  }

  function closeRepetitionModal() {
    if (repetitionModal) repetitionModal.style.display = 'none';
  }

  // Close modal when clicking cancel button
  if (repetitionCancelBtn) {
    repetitionCancelBtn.addEventListener('click', closeRepetitionModal);
  }

  // Close modal when clicking backdrop
  if (repetitionBackdrop) {
    repetitionBackdrop.addEventListener('click', closeRepetitionModal);
  }

  // Tab switching functionality
  repetitionTabs.forEach(tab => {
    tab.addEventListener('click', function() {
      // Remove active class from all tabs
      repetitionTabs.forEach(t => t.classList.remove('active'));
      // Add active class to clicked tab
      this.classList.add('active');
      
      // Handle different repetition types
      const repetitionType = this.getAttribute('data-tab');
      console.log('Selected repetition type:', repetitionType);
      // Add specific logic for each repetition type here
    });
  });

  // Save repetition
  const repetitionSaveBtn = document.getElementById('repetition-save');
  if (repetitionSaveBtn) {
    repetitionSaveBtn.addEventListener('click', function() {
      // Save repetition logic here
      console.log('Saving repetition...');
      closeRepetitionModal();
    });
  }

  // Make functions globally available
  window.openRepetitionModal = openRepetitionModal;
  window.closeRepetitionModal = closeRepetitionModal;
});
</script> 