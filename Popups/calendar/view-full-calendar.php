<?php
// Full Calendar View Modal
// This file contains the full calendar view popup
// Include this file where needed using: include 'Popups/calendar/view-full-calendar.php';
?>

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
  <style>
    .modal-overlay { position: fixed; top: 0; left: 0; right: 0; bottom: 0; display: flex; background: rgba(30,30,40,0.08); z-index: 1040; }
    .modal-backdrop { position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(30,30,40,0.10); z-index: 1040; }
    .full-calendar-modal { background: #fff; border-radius: 18px; box-shadow: 0 6px 32px 0 rgba(34,34,59,0.13); padding: 32px 32px 24px 32px; }
    .calendar-view-tab { background: #fff; color: #b91c1c; border: 1.5px solid #b91c1c; border-radius: 8px; font-size: 1rem; font-weight: 600; padding: 7px 22px; cursor: pointer; transition: background 0.18s, color 0.18s, border 0.18s; }
    .calendar-view-tab.active, .calendar-view-tab:hover { background: #b91c1c; color: #fff; border: 1.5px solid #b91c1c; }
    .calendar-nav-btn { background: #fff; color: #b91c1c; border: 1.5px solid #b91c1c; border-radius: 8px; font-size: 1rem; font-weight: 600; padding: 7px 18px; cursor: pointer; transition: background 0.18s, color 0.18s, border 0.18s; }
    .calendar-nav-btn.primary, .calendar-nav-btn:hover { background: #b91c1c; color: #fff; border: 1.5px solid #b91c1c; }
    .calendar-search:focus { border: 1.5px solid #b91c1c; outline: none; }
    .modal-close { background: none; border: none; color: #b91c1c; font-size: 1.3rem; cursor: pointer; transition: color 0.18s; }
    .modal-close:hover { color: #22223b; }
    
    /* Responsive Appointment Modal Styles */
    .appointment-modal {
      display: flex;
      flex-direction: column;
      background: #fff;
      border-radius: 18px;
      box-shadow: 0 6px 32px 0 rgba(34,34,59,0.13);
      padding: 0;
      overflow: hidden;
      z-index: 1050;
      position: relative;
    }
    
    .modal-scrollable-content {
      flex: 1;
      overflow-y: auto;
      padding: 24px;
      max-height: calc(95vh - 80px);
    }
    
    .appointment-modal-toprow {
      display: grid;
      grid-template-columns: 0.8fr 0.8fr 1.5fr 1.5fr 1.1fr;
      gap: 22px;
      align-items: center;
      background: #fafaff;
      border-radius: 18px;
      box-shadow: 0 2px 8px 0 rgba(80,80,180,0.04);
      padding: 18px 24px 10px 24px;
      margin-bottom: 24px;
    }
    
    .modal-form-row.modal-form-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 24px;
      margin-bottom: 24px;
    }
    
    .modal-tabs {
      display: flex;
      gap: 8px;
      border-bottom: 2px solid #f3f4f6;
      margin-bottom: 16px;
      overflow-x: auto;
      padding-bottom: 8px;
    }
    
    .modal-tab {
      background: none;
      border: none;
      color: #6b7280;
      font-weight: 600;
      font-size: 0.95rem;
      padding: 8px 16px;
      border-radius: 8px 8px 0 0;
      cursor: pointer;
      transition: all 0.18s;
      white-space: nowrap;
      min-width: 100px;
    }
    
    .modal-tab.active, .modal-tab:hover {
      background: #b91c1c;
      color: #fff;
    }
    
    /* Mobile Responsive Styles */
    @media (max-width: 1200px) {
      .appointment-modal-toprow {
        grid-template-columns: 1fr 1fr;
        gap: 16px;
        padding: 16px 20px 8px 20px;
      }
      
      .appointment-modal-duration {
        grid-column: 1 / -1;
        justify-self: center;
        margin-left: 0;
      }
      
      .modal-form-row.modal-form-grid {
        grid-template-columns: 1fr;
        gap: 20px;
      }
    }
    
    @media (max-width: 768px) {
      .appointment-modal {
        width: 100vw;
        height: 100vh;
        max-width: 100vw;
        max-height: 100vh;
        border-radius: 0;
      }
      
      .modal-scrollable-content {
        padding: 16px;
        max-height: calc(100vh - 70px);
      }
      
      .appointment-modal-toprow {
        grid-template-columns: 1fr;
        gap: 12px;
        padding: 12px 16px 6px 16px;
      }
      
      .appointment-modal-from,
      .appointment-modal-to {
        min-width: 0;
      }
      
      .appointment-modal-timerow {
        flex-wrap: wrap;
        gap: 4px;
      }
      
      .appointment-modal-addtime {
        flex-wrap: wrap;
        gap: 2px;
      }
      
      .modal-action-bar {
        flex-wrap: wrap;
        gap: 8px;
        padding: 12px 16px;
      }
      
      .modal-action-btn {
        font-size: 0.85rem;
        padding: 6px 12px;
      }
      
      .modal-tabs {
        gap: 4px;
        padding-bottom: 4px;
      }
      
      .modal-tab {
        font-size: 0.85rem;
        padding: 6px 12px;
        min-width: 80px;
      }
      
      .modal-vehicle-details-grid,
      .modal-customer-details-grid {
        grid-template-columns: 1fr;
        gap: 8px 0;
      }
      
      .modal-form-grid-row {
        flex-direction: column;
        gap: 8px;
      }
      
      .modal-form-grid-row input,
      .modal-form-grid-row button {
        width: 100%;
      }
      
      .modal-vehicle-actions {
        flex-wrap: wrap;
        gap: 8px;
      }
      
      .modal-vehicle-actions button {
        flex: 1;
        min-width: 120px;
      }
    }
    
    @media (max-width: 480px) {
      .modal-scrollable-content {
        padding: 12px;
      }
      
      .appointment-modal-toprow {
        padding: 10px 12px 4px 12px;
      }
      
      .modal-action-bar {
        padding: 8px 12px;
      }
      
      .modal-action-btn {
        font-size: 0.8rem;
        padding: 4px 8px;
      }
      
      .modal-tab {
        font-size: 0.8rem;
        padding: 4px 8px;
        min-width: 70px;
      }
      
      .appointment-modal-timerow input[type='number'] {
        width: 32px;
        font-size: 14px;
      }
      
      .appointment-modal-addtime button {
        padding: 2px 6px;
        font-size: 11px;
        min-width: 28px;
      }
    }
  </style>
</div>

<script>
// Full Calendar Modal functionality
document.addEventListener('DOMContentLoaded', function() {
  const fullCalendarModal = document.getElementById('fullCalendarModal');
  const closeFullCalendarModalBtn = document.getElementById('closeFullCalendarModal');
  const fullCalendarBackdrop = fullCalendarModal?.querySelector('.modal-backdrop');

  function openFullCalendarModal() {
    if (fullCalendarModal) fullCalendarModal.style.display = 'flex';
  }

  function closeFullCalendarModal() {
    if (fullCalendarModal) fullCalendarModal.style.display = 'none';
  }

  // Close modal when clicking close button
  if (closeFullCalendarModalBtn) {
    closeFullCalendarModalBtn.addEventListener('click', closeFullCalendarModal);
  }

  // Close modal when clicking backdrop
  if (fullCalendarBackdrop) {
    fullCalendarBackdrop.addEventListener('click', closeFullCalendarModal);
  }

  // Make functions globally available
  window.openFullCalendarModal = openFullCalendarModal;
  window.closeFullCalendarModal = closeFullCalendarModal;
});
</script> 