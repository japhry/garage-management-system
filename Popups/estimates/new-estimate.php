<?php
// New Estimate Modal
// This file contains the estimate creation popup
// Include this file where needed using: include 'Popups/estimates/new-estimate.php';
?>

<!-- New Estimate Modal -->
<div id="newEstimateModal" class="modal-overlay" style="display: none; align-items: center; justify-content: center; z-index: 1200; background: transparent;">
  <div class="modal-backdrop" style="pointer-events: none; background: transparent; box-shadow: none;"></div>
  <div class="modal-content estimate-modal" style="max-width: 98vw; width: 1200px; min-width: 320px; max-height: 95vh; overflow: auto; border-radius: 15px; box-shadow: 0 4px 24px rgba(0,0,0,0.12); background: var(--white); border: 1px solid #e5e7eb; z-index: 1201;">
    <!-- Top Bar -->
    <div class="modal-action-bar" style="display: flex; align-items: center; background: #fff; color: #222; border-radius: 18px 18px 0 0; border-bottom: 1.5px solid #e5e7eb; box-shadow: 0 2px 12px rgba(0,0,0,0.07); padding: 0 24px; min-height: 56px;">
      <button class="modal-action-btn primary" id="saveEstimateBtn" style="background: #b91c1c; color: #fff; border-radius: 10px; border: none; font-weight: 700; box-shadow: 0 2px 8px rgba(185,28,28,0.08);"> <i class="fas fa-save"></i> Save</button>
      <button class="modal-action-btn" style="color: #fff; background: #444; border-radius: 10px; margin-left:8px;"><i class="fas fa-print"></i> Print</button>
      <button class="modal-action-btn" style="color: #fff; background: #444; border-radius: 10px; margin-left:8px;"><i class="fas fa-envelope"></i> Email</button>
      <div class="dropdown-group extras-dropdown" style="margin-left:8px; position: relative; display: inline-block;">
        <button class="modal-action-btn extras-btn" id="extrasBtn" style="color: #fff; background: #444; border-radius: 10px; border: none; cursor: pointer; display: flex; align-items: center; gap: 8px; font-weight: 600; transition: all 0.2s;" onclick="toggleExtrasDropdown(event)">
          <i class="fas fa-ellipsis-h"></i> 
          <span>Extras</span> 
          <i class="fas fa-caret-down" id="extrasCaret" style="transition: transform 0.2s ease;"></i>
        </button>
        <div class="extras-menu" id="extrasMenu" style="position: absolute; top: calc(100% + 8px); right: 0; background: #fff; border: 1px solid #e5e7eb; border-radius: 10px; box-shadow: 0 8px 32px rgba(0,0,0,0.15); min-width: 220px; z-index: 9999; opacity: 0; visibility: hidden; transform: translateY(-8px); transition: all 0.3s ease; overflow: hidden;">
          <div class="extras-option" style="display: flex; align-items: center; gap: 12px; padding: 14px 16px; color: #222; text-decoration: none; transition: all 0.2s; border-bottom: 1px solid #f3f4f6; cursor: pointer; font-weight: 500;" onclick="handleExtrasAction('Print Preview')" onmouseover="this.style.background='#f8f9fa'" onmouseout="this.style.background='#fff'">
            <i class="fas fa-eye" style="font-size: 14px; width: 16px; text-align: center; color: #b91c1c;"></i>
            <span>Print Preview</span>
          </div>
          <div class="extras-option" style="display: flex; align-items: center; gap: 12px; padding: 14px 16px; color: #222; text-decoration: none; transition: all 0.2s; border-bottom: 1px solid #f3f4f6; cursor: pointer; font-weight: 500;" onclick="handleExtrasAction('Print Advisories')" onmouseover="this.style.background='#f8f9fa'" onmouseout="this.style.background='#fff'">
            <i class="fas fa-exclamation-triangle" style="font-size: 14px; width: 16px; text-align: center; color: #b91c1c;"></i>
            <span>Print Advisories</span>
          </div>
          <div class="extras-option" style="display: flex; align-items: center; gap: 12px; padding: 14px 16px; color: #222; text-decoration: none; transition: all 0.2s; border-bottom: 1px solid #f3f4f6; cursor: pointer; font-weight: 500;" onclick="handleExtrasAction('Save to PDF')" onmouseover="this.style.background='#f8f9fa'" onmouseout="this.style.background='#fff'">
            <i class="fas fa-file-pdf" style="font-size: 14px; width: 16px; text-align: center; color: #b91c1c;"></i>
            <span>Save to PDF</span>
          </div>
          <div class="extras-option" style="display: flex; align-items: center; gap: 12px; padding: 14px 16px; color: #222; text-decoration: none; transition: all 0.2s; border-bottom: 1px solid #f3f4f6; cursor: pointer; font-weight: 500;" onclick="handleExtrasAction('Print Job Sheet')" onmouseover="this.style.background='#f8f9fa'" onmouseout="this.style.background='#fff'">
            <i class="fas fa-clipboard-list" style="font-size: 14px; width: 16px; text-align: center; color: #b91c1c;"></i>
            <span>Print Job Sheet</span>
          </div>
          <div class="extras-option" style="display: flex; align-items: center; gap: 12px; padding: 14px 16px; color: #222; text-decoration: none; transition: all 0.2s; cursor: pointer; font-weight: 500;" onclick="handleExtrasAction('Print Checklist')" onmouseover="this.style.background='#f8f9fa'" onmouseout="this.style.background='#fff'">
            <i class="fas fa-tasks" style="font-size: 14px; width: 16px; text-align: center; color: #b91c1c;"></i>
            <span>Print Checklist</span>
          </div>
        </div>
      </div>
      <div class="dropdown-group convert-dropdown" style="margin-left:8px; position: relative; display: inline-block;">
        <button class="modal-action-btn convert-btn" id="convertBtn" style="color: #fff; background: #444; border-radius: 10px; border: none; cursor: pointer; display: flex; align-items: center; gap: 8px; font-weight: 600; transition: all 0.2s;" onclick="toggleConvertDropdown(event)">
          <i class="fas fa-exchange-alt"></i> 
          <span>Convert</span> 
          <i class="fas fa-caret-down" id="convertCaret" style="transition: transform 0.2s ease;"></i>
        </button>
        <div class="convert-menu" id="convertMenu" style="position: absolute; top: calc(100% + 8px); right: 0; background: #fff; border: 1px solid #e5e7eb; border-radius: 10px; box-shadow: 0 8px 32px rgba(0,0,0,0.15); min-width: 220px; z-index: 9999; opacity: 0; visibility: hidden; transform: translateY(-8px); transition: all 0.3s ease; overflow: hidden;">
          <div class="convert-option" style="display: flex; align-items: center; gap: 12px; padding: 14px 16px; color: #222; text-decoration: none; transition: all 0.2s; border-bottom: 1px solid #f3f4f6; cursor: pointer; font-weight: 500;" onclick="handleConvertAction('Convert to Job sheet')" onmouseover="this.style.background='#f8f9fa'" onmouseout="this.style.background='#fff'">
            <i class="fas fa-clipboard-list" style="font-size: 14px; width: 16px; text-align: center; color: #b91c1c;"></i>
            <span>Convert to Job sheet</span>
          </div>
          <div class="convert-option" style="display: flex; align-items: center; gap: 12px; padding: 14px 16px; color: #222; text-decoration: none; transition: all 0.2s; border-bottom: 1px solid #f3f4f6; cursor: pointer; font-weight: 500;" onclick="handleConvertAction('Convert to Invoice')" onmouseover="this.style.background='#f8f9fa'" onmouseout="this.style.background='#fff'">
            <i class="fas fa-file-invoice-dollar" style="font-size: 14px; width: 16px; text-align: center; color: #b91c1c;"></i>
            <span>Convert to Invoice</span>
          </div>
          <div class="convert-option" style="display: flex; align-items: center; gap: 12px; padding: 14px 16px; color: #222; text-decoration: none; transition: all 0.2s; cursor: pointer; font-weight: 500;" onclick="handleConvertAction('Copy to Appointment')" onmouseover="this.style.background='#f8f9fa'" onmouseout="this.style.background='#fff'">
            <i class="fas fa-calendar-plus" style="font-size: 14px; width: 16px; text-align: center; color: #b91c1c;"></i>
            <span>Copy to Appointment</span>
          </div>
        </div>
      </div>
      <div style="flex:1"></div>
      <div class="notice-bar" style="background: #b91c1c; color: #fff; padding: 8px 24px; border-radius: 10px; font-weight: 700; margin-right: 16px; border: 1.5px solid #a31a1a; box-shadow: 0 1px 4px rgba(185,28,28,0.08); cursor: pointer; transition: background 0.2s, box-shadow 0.2s; display: inline-block;">
        Notice
      </div>
      <button class="modal-action-btn danger" id="deleteEstimateBtn" style="background: #b91c1c; color: #fff; border-radius: 10px; border: none; font-weight: 700; box-shadow: 0 2px 8px rgba(185,28,28,0.08);"><i class="fas fa-trash"></i> Delete</button>
      <button class="modal-close" id="closeNewEstimateModal" style="margin-left: 12px; font-size:1.3em; color:#888; border-radius: 50%; transition: background 0.2s;"><i class="fas fa-times"></i></button>
    </div>
    <!-- Main Content Grid -->
    <div class="modal-main-grid" style="display: flex; gap: 24px; padding: 28px 28px 0 28px; background: var(--white);">
      <!-- Left Main Form -->
      <div class="estimate-main-form" style="flex: 2; min-width: 0;">
        <!-- Registration/Vehicle Form (clean, grouped, user-friendly) -->
        <div class="registration-form" style="margin-bottom: 18px; background: #fafbfc; border-radius: 12px; border: 1.5px solid #e5e7eb; padding: 22px 22px 16px 22px; box-shadow: 0 2px 8px rgba(0,0,0,0.03);">
          <!-- Vehicle Details -->
          <div style="margin-bottom: 18px;">
            <div style="font-weight:700; color:#b91c1c; margin-bottom:8px;">Vehicle Details</div>
            <div style="display: grid; grid-template-columns: 160px 1fr 160px 1fr; gap: 12px 18px; align-items: center;">
              <label>Registration</label>
              <div style="display: flex; gap: 6px; align-items: center;">
                <input type="text" placeholder="e.g. ABC123" style="width:100%; border-radius:8px; border:1.5px solid #e5e7eb; padding:7px 12px;">
                <button class="input-clear-btn" style="border-radius:8px;">X</button>
                <button class="action-btn" style="padding:4px 14px; height:36px; font-size:0.98em; background:#b91c1c; color:#fff; border-radius:8px; font-weight:600; display:flex; align-items:center; gap:6px;"><i class="fas fa-search" style="font-size:1em;"></i> <span style="font-size:0.98em; font-weight:600;">VRM Lookup</span></button>
              </div>
              <label>Make / Model</label>
              <input type="text" placeholder="e.g. Toyota Corolla" style="border-radius:8px; border:1.5px solid #e5e7eb; padding:7px 12px;">
              <label>Derivative</label>
              <input type="text" placeholder="e.g. 1.8 VVT-i" style="border-radius:8px; border:1.5px solid #e5e7eb; padding:7px 12px;">
              <label>Chassis</label>
              <input type="text" placeholder="e.g. JTDBR32E920123456" style="border-radius:8px; border:1.5px solid #e5e7eb; padding:7px 12px;">
            </div>
          </div>
          <!-- Engine Details -->
          <div style="margin-bottom: 18px; padding: 14px 0 0 0; border-top: 1px solid #ececec;">
            <div style="font-weight:700; color:#b91c1c; margin-bottom:8px;">Engine Details</div>
            <div style="display: grid; grid-template-columns: 160px 1fr 160px 1fr; gap: 12px 18px; align-items: center;">
              <label>Engine CC</label>
              <input type="text" placeholder="e.g. 1798" style="border-radius:8px; border:1.5px solid #e5e7eb; padding:7px 12px;">
              <label>Fuel Type</label>
              <input type="text" placeholder="e.g. Petrol" style="border-radius:8px; border:1.5px solid #e5e7eb; padding:7px 12px;">
              <label>Engine Code</label>
              <input type="text" placeholder="e.g. 2ZR-FE" style="border-radius:8px; border:1.5px solid #e5e7eb; padding:7px 12px;">
              <label>Engine No</label>
              <input type="text" placeholder="e.g. 1234567" style="border-radius:8px; border:1.5px solid #e5e7eb; padding:7px 12px;">
            </div>
          </div>
          <!-- Codes & Dates -->
          <div style="margin-bottom: 18px; padding: 14px 0 0 0; border-top: 1px solid #ececec;">
            <div style="font-weight:700; color:#b91c1c; margin-bottom:8px;">Codes & Dates</div>
            <div style="display: grid; grid-template-columns: 160px 1fr 160px 1fr; gap: 12px 18px; align-items: center;">
              <label>Colour</label>
              <input type="text" placeholder="e.g. Red" style="border-radius:8px; border:1.5px solid #e5e7eb; padding:7px 12px;">
              <label>Paint Code</label>
              <input type="text" placeholder="e.g. 3R3" style="border-radius:8px; border:1.5px solid #e5e7eb; padding:7px 12px;">
              <label>Key Code</label>
              <input type="text" placeholder="e.g. 1234" style="border-radius:8px; border:1.5px solid #e5e7eb; padding:7px 12px;">
              <label>Radio Code</label>
              <input type="text" placeholder="e.g. 0000" style="border-radius:8px; border:1.5px solid #e5e7eb; padding:7px 12px;">
              <label>Mileage</label>
              <input type="text" placeholder="e.g. 120000" style="border-radius:8px; border:1.5px solid #e5e7eb; padding:7px 12px;">
              <label>Date Reg</label>
              <input type="text" placeholder="e.g. 2020-01-01" style="border-radius:8px; border:1.5px solid #e5e7eb; padding:7px 12px;">
            </div>
          </div>
          <!-- Action Buttons -->
          <div style="display:flex; gap:10px; margin-top:12px;">
            <button class="action-btn secondary" style="flex:1; border-radius:8px; background:#f3f4f6; color:#b91c1c; font-weight:600;"><i class="fas fa-database"></i> Technical Data</button>
            <button class="action-btn secondary" style="flex:1; border-radius:8px; background:#f3f4f6; color:#b91c1c; font-weight:600;"><i class="fas fa-random"></i> VRM Transfer</button>
            <button class="action-btn secondary" style="flex:1; border-radius:8px; background:#f3f4f6; color:#b91c1c; font-weight:600;"><i class="fas fa-ellipsis-h"></i> More</button>
          </div>
        </div>
        <!-- Customer/Account Form (below, full width, new layout) -->
        <div class="customer-account-form" style="margin-bottom: 18px; background: #fafbfc; border-radius: 12px; border: 1.5px solid #e5e7eb; padding: 18px 18px 10px 18px; box-shadow: 0 2px 8px rgba(0,0,0,0.03);">
          <div style="display: grid; grid-template-columns: 140px 1fr; gap: 8px 12px; align-items: center;">
            <label>Acc Number</label>
            <div style="display: flex; gap: 6px; align-items: center;">
              <input type="text" placeholder="Auto Generate" style="width:100%; border-radius:8px; border:1.5px solid #e5e7eb; padding:7px 12px; font-style:italic; color:#888;">
              <button class="input-clear-btn" style="border-radius:8px;">X</button>
              <button class="action-btn" style="padding:4px 14px; height:36px; font-size:0.98em; background:#b91c1c; color:#fff; border-radius:8px; font-weight:600; display:flex; align-items:center; gap:6px;"><i class="fas fa-search" style="font-size:1em;"></i></button>
            </div>
            <label>Company</label>
            <input type="text" style="border-radius:8px; border:1.5px solid #e5e7eb; padding:7px 12px;">
            <label>Name</label>
            <input type="text" style="border-radius:8px; border:1.5px solid #e5e7eb; padding:7px 12px;">
            <label>House No</label>
            <input type="text" style="border-radius:8px; border:1.5px solid #e5e7eb; padding:7px 12px;">
            <label>Road</label>
            <input type="text" style="border-radius:8px; border:1.5px solid #e5e7eb; padding:7px 12px;">
            <label>Locality</label>
            <input type="text" style="border-radius:8px; border:1.5px solid #e5e7eb; padding:7px 12px;">
            <label>Town</label>
            <input type="text" style="border-radius:8px; border:1.5px solid #e5e7eb; padding:7px 12px;">
            <label>Post Code</label>
            <div style="display: flex; gap: 6px; align-items: center;">
              <input type="text" style="border-radius:8px; border:1.5px solid #e5e7eb; padding:7px 12px;">
              <button class="action-btn" style="padding:4px 14px; height:36px; font-size:0.98em; background:#b91c1c; color:#fff; border-radius:8px; font-weight:600; display:flex; align-items:center; gap:6px;"><i class="fas fa-search" style="font-size:1em;"></i></button>
            </div>
            <label>County</label>
            <input type="text" style="border-radius:8px; border:1.5px solid #e5e7eb; padding:7px 12px;">
            <label>Mobile</label>
            <input type="text" style="border-radius:8px; border:1.5px solid #e5e7eb; padding:7px 12px;">
            <label>Telephone</label>
            <input type="text" style="border-radius:8px; border:1.5px solid #e5e7eb; padding:7px 12px;">
            <label>Email</label>
            <input type="text" style="border-radius:8px; border:1.5px solid #e5e7eb; padding:7px 12px;">
          </div>
          <div style="display:flex; gap:8px; margin-top:12px;">
            <button class="action-btn secondary" style="flex:1; border-radius:8px; background:#f3f4f6; color:#b91c1c; font-weight:600;" disabled><i class="fas fa-envelope"></i></button>
            <button class="action-btn secondary" style="flex:1; border-radius:8px; background:#f3f4f6; color:#b91c1c; font-weight:600;" disabled><i class="fas fa-comment"></i></button>
            <button class="action-btn secondary" style="flex:1; border-radius:8px; background:#f3f4f6; color:#b91c1c; font-weight:600;" disabled><i class="fas fa-map-marker-alt"></i></button>
            <button class="action-btn secondary" style="flex:1; border-radius:8px; background:#f3f4f6; color:#b91c1c; font-weight:600;" disabled>Deliver To</button>
            <button class="action-btn secondary" style="flex:1; border-radius:8px; background:#f3f4f6; color:#b91c1c; font-weight:600;" disabled><i class="fas fa-pencil-alt"></i></button>
            <button class="action-btn secondary" style="flex:1; border-radius:8px; background:#f3f4f6; color:#b91c1c; font-weight:600;" disabled>More</button>
          </div>
        </div>
        <!-- Tabs Bar -->
        <div class="estimate-tabs" style="display: flex; background: #b91c1c; border-radius: 8px 8px 0 0; overflow: hidden; margin-top: 24px; margin-bottom: 12px;">
          <button class="tab-btn active" data-tab="history" style="flex:1; background:#d32f2f; color:#fff; border:none; padding:16px 0; font-weight:700; font-size:1.08em; border-right:1.5px solid #b91c1c; border-bottom:4px solid #fff; box-shadow:0 2px 8px rgba(185,28,28,0.10); transition:background 0.2s;">History</button>
          <button class="tab-btn" data-tab="description" style="flex:1; background:#b91c1c; color:#fff; border:none; padding:16px 0; font-weight:700; font-size:1.08em; border-right:1.5px solid #b91c1c; transition:background 0.2s;">Description</button>
          <button class="tab-btn" data-tab="labour" style="flex:1; background:#b91c1c; color:#fff; border:none; padding:16px 0; font-weight:700; font-size:1.08em; border-right:1.5px solid #b91c1c; transition:background 0.2s;">Labour</button>
          <button class="tab-btn" data-tab="parts" style="flex:1; background:#b91c1c; color:#fff; border:none; padding:16px 0; font-weight:700; font-size:1.08em; border-right:1.5px solid #b91c1c; transition:background 0.2s;">Parts</button>
          <button class="tab-btn" data-tab="advisories" style="flex:1; background:#b91c1c; color:#fff; border:none; padding:16px 0; font-weight:700; font-size:1.08em; border-right:1.5px solid #b91c1c; transition:background 0.2s;">Advisories</button>
          <button class="tab-btn" data-tab="activity" style="flex:1; background:#b91c1c; color:#fff; border:none; padding:16px 0; font-weight:700; font-size:1.08em; transition:background 0.2s;">Activity</button>
        </div>
        <!-- Tab Content Area -->
        <div id="tab-content-area" style="background: #fff; border-radius: 0 0 8px 8px; border: 1.5px solid #b91c1c; border-top: none; min-height: 220px; padding: 0 18px 18px 18px; margin-bottom: 18px;">
          <div class="tab-pane" id="tab-history" style="display:block;">
            <div style="display:flex; gap:18px; padding:18px 0 0 0;">
              <!-- Reminders Sidebar -->
              <div style="background:#fff; border-radius:8px; border:1.5px solid #d1d5db; min-width:220px; max-width:270px; display:flex; flex-direction:column; height:100%; box-shadow:0 2px 8px rgba(185,28,28,0.04);">
                <!-- Header Row -->
                <div style="display:flex; justify-content:space-between; align-items:center; background:#b91c1c; color:#fff; border-radius:8px 8px 0 0; padding:10px 14px; font-weight:700; font-size:1.05em;">
                  <span>Reminders:</span>
                  <button style="background:#fff; color:#b91c1c; border:none; border-radius:5px; padding:4px 14px; font-weight:700; font-size:0.98em; box-shadow:0 1px 4px rgba(185,28,28,0.08); cursor:pointer; transition:background 0.2s;">View/Edit</button>
                </div>
                <!-- Table Header -->
                <div style="display:flex; background:#f3f4f6; border-bottom:1.5px solid #e5e7eb;">
                  <div style="flex:1; padding:8px 10px; font-weight:700; color:#b91c1c; font-size:1em;">Type</div>
                  <div style="flex:1; padding:8px 10px; font-weight:700; color:#b91c1c; font-size:1em;">Due</div>
                </div>
                <!-- Empty State -->
                <div style="flex:1; display:flex; flex-direction:column; justify-content:center; align-items:center; min-height:120px; padding:18px 0 40px 0;">
                  <span style="color:#aaa; font-style:italic; font-size:1.08em;">No Vehicle Reminders</span>
                </div>
                <!-- Info Section -->
                <div style="background:#fffbe6; border-radius:0 0 8px 8px; border-top:1.5px solid #f3f4f6; padding:12px 14px 10px 14px; font-size:1em; color:#232323; display:flex; flex-direction:column; gap:6px;">
                  <button style="background:#fff; color:#b91c1c; border:1.5px solid #b91c1c; border-radius:5px; padding:6px 18px; font-weight:700; font-size:1em; box-shadow:0 1px 4px rgba(185,28,28,0.08); cursor:pointer; transition:background 0.2s; display:flex; align-items:center; margin-bottom:6px;"><i class="fas fa-user-shield" style="margin-right:7px; color:#b91c1c;"></i>Customer Privacy Options</button>
                  <div>Veh Last Invoiced</div>
                  <div>Cust Last Invoiced</div>
                  <div>Referral <select style="border-radius:4px; border:1px solid #d1d5db; padding:2px 8px; font-size:1em; background:#fffde7;"></select></div>
                  <hr style="border:none; border-top:1.5px solid #e5e7eb; margin:8px 0 8px 0;">
                  <div>Acc Balance</div>
                </div>
              </div>
              <div style="flex:3; background:#f8f8f8; border-radius:6px; border:1px solid #d1d5db; display:flex; flex-direction:column;">
                <!-- History Sub-Tabs Bar -->
                <div id="history-subtabs-bar" style="display:flex; align-items:center; background:#fff0f0; border-radius:8px 8px 0 0; margin-bottom:2px; border-bottom:2px solid #b91c1c; padding:0 8px; gap:10px; min-height:38px;">
                  <button class="history-subtab active" data-subtab="prev-docs" style="background:#fff; color:#b91c1c; border:none; border-radius:6px 6px 0 0; font-weight:700; font-size:0.97em; padding:7px 18px; margin-right:2px; box-shadow:0 4px 16px rgba(185,28,28,0.10); border:1.5px solid #fff; border-bottom:none; transition:all 0.2s;">Prev Docs</button>
                  <button class="history-subtab" data-subtab="prev-advisors" style="background:none; color:#b91c1c; border:none; border-radius:6px 6px 0 0; font-weight:600; font-size:0.97em; padding:7px 18px; margin-right:2px; transition:all 0.2s;">Prev Advisors</button>
                  <button class="history-subtab" data-subtab="prev-labour" style="background:none; color:#b91c1c; border:none; border-radius:6px 6px 0 0; font-weight:600; font-size:0.97em; padding:7px 18px; margin-right:2px; transition:all 0.2s;">Prev Labour</button>
                  <button class="history-subtab" data-subtab="prev-parts" style="background:none; color:#b91c1c; border:none; border-radius:6px 6px 0 0; font-weight:600; font-size:0.97em; padding:7px 18px; margin-right:2px; transition:all 0.2s;">Prev Parts</button>
                  <button class="history-subtab" data-subtab="prev-appt" style="background:none; color:#b91c1c; border:none; border-radius:6px 6px 0 0; font-weight:600; font-size:0.97em; padding:7px 18px; margin-right:2px; transition:all 0.2s;">Prev Appt</button>
                  <span style="flex:1;"></span>
                  <button style="background:none; border:none; margin-left:8px; cursor:pointer; padding:4px; display:flex; align-items:center;" title="Print">
                    <svg width="18" height="18" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="5" y="13" width="10" height="5" rx="1.5" fill="#b91c1c"/><rect x="3" y="7" width="14" height="7" rx="2" fill="#fff" stroke="#b91c1c" stroke-width="1.2"/><rect x="6.5" y="2" width="7" height="4" rx="1" fill="#fff" stroke="#b91c1c" stroke-width="1.2"/><circle cx="15.5" cy="10.5" r="1" fill="#b91c1c"/></svg>
                  </button>
                </div>
                <!-- History Sub-Tab Content Area -->
                <div id="history-subtab-content">
                  <table id="prev-docs-table" class="history-table" style="width:100%; font-size:1em; border-spacing:0; border-collapse:separate; margin-bottom:0;">
                    <thead>
                      <tr style="background:#232323;">
                        <th style="padding:12px 10px; font-weight:700; color:#fff; font-size:1.07em; border-bottom:2.5px solid #232323; text-align:left; border-top-left-radius:8px;">Date</th>
                        <th style="padding:12px 10px; font-weight:700; color:#fff; font-size:1.07em; border-bottom:2.5px solid #232323; text-align:left;">Doc No</th>
                        <th style="padding:12px 10px; font-weight:700; color:#fff; font-size:1.07em; border-bottom:2.5px solid #232323; text-align:left;">Mileage</th>
                        <th style="padding:12px 10px; font-weight:700; color:#fff; font-size:1.07em; border-bottom:2.5px solid #232323; text-align:left;">Description</th>
                        <th style="padding:12px 10px; font-weight:700; color:#fff; font-size:1.07em; border-bottom:2.5px solid #232323; text-align:left; border-top-right-radius:8px;">Total</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr style="background:#fff;"><td style="padding:10px 10px;">12/06/2024</td><td style="padding:10px 10px;">ES1001</td><td style="padding:10px 10px;">45,000</td><td style="padding:10px 10px;">Annual Service</td><td style="padding:10px 10px; text-align:right;">£180.00</td></tr>
                      <tr style="background:#f9fafb;"><td style="padding:10px 10px;">10/03/2024</td><td style="padding:10px 10px;">ES0998</td><td style="padding:10px 10px;">42,500</td><td style="padding:10px 10px;">Brake Pads Replacement</td><td style="padding:10px 10px; text-align:right;">£95.00</td></tr>
                      <tr style="background:#fff;"><td style="padding:10px 10px;">05/12/2023</td><td style="padding:10px 10px;">ES0975</td><td style="padding:10px 10px;">39,000</td><td style="padding:10px 10px;">Oil Change</td><td style="padding:10px 10px; text-align:right;">£55.00</td></tr>
                    </tbody>
                  </table>
                  <table id="black-table-header" class="history-table" style="width:100%; font-size:1em; border-spacing:0; border-collapse:separate; margin-bottom:0; display:none;">
                    <thead>
                      <tr style="background:#232323;">
                        <th style="padding:12px 10px; font-weight:700; color:#fff; font-size:1.07em; border-bottom:2.5px solid #232323; text-align:left; border-top-left-radius:8px;">Date</th>
                        <th style="padding:12px 10px; font-weight:700; color:#fff; font-size:1.07em; border-bottom:2.5px solid #232323; text-align:left;">Doc No</th>
                        <th style="padding:12px 10px; font-weight:700; color:#fff; font-size:1.07em; border-bottom:2.5px solid #232323; text-align:left;">Mileage</th>
                        <th style="padding:12px 10px; font-weight:700; color:#fff; font-size:1.07em; border-bottom:2.5px solid #232323; text-align:left;">Description</th>
                        <th style="padding:12px 10px; font-weight:700; color:#fff; font-size:1.07em; border-bottom:2.5px solid #232323; text-align:left; border-top-right-radius:8px;">Total</th>
                      </tr>
                    </thead>
                    <tbody><tr><td colspan="5" style="color:#aaa; text-align:center; font-style:italic; padding:18px 0;">No previous documents</td></tr></tbody>
                  </table>
                  <table id="advisors-table-header" class="history-table" style="width:100%; font-size:1em; border-spacing:0; border-collapse:separate; margin-bottom:0; display:none;">
                    <thead>
                      <tr style="background:#232323;">
                        <th style="padding:12px 10px; font-weight:700; color:#fff; font-size:1.07em; border-bottom:2.5px solid #232323; text-align:left; border-top-left-radius:8px;">Date</th>
                        <th style="padding:12px 10px; font-weight:700; color:#fff; font-size:1.07em; border-bottom:2.5px solid #232323; text-align:left;">Doc No</th>
                        <th style="padding:12px 10px; font-weight:700; color:#fff; font-size:1.07em; border-bottom:2.5px solid #232323; text-align:left;">Mileage</th>
                        <th style="padding:12px 10px; font-weight:700; color:#fff; font-size:1.07em; border-bottom:2.5px solid #232323; text-align:left;">Description</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr style="background:#fff;"><td style="padding:10px 10px;">12/06/2024</td><td style="padding:10px 10px;">ES1001</td><td style="padding:10px 10px;">45,000</td><td style="padding:10px 10px;">Check tyre tread depth</td></tr>
                      <tr style="background:#f9fafb;"><td style="padding:10px 10px;">10/03/2024</td><td style="padding:10px 10px;">ES0998</td><td style="padding:10px 10px;">42,500</td><td style="padding:10px 10px;">Monitor brake wear</td></tr>
                    </tbody>
                  </table>
                  <table id="labour-table-header" class="history-table" style="width:100%; font-size:1em; border-spacing:0; border-collapse:separate; margin-bottom:0; display:none;">
                    <thead>
                      <tr style="background:#232323;">
                        <th style="padding:12px 10px; font-weight:700; color:#fff; font-size:1.07em; border-bottom:2.5px solid #232323; text-align:left; border-top-left-radius:8px;">Date</th>
                        <th style="padding:12px 10px; font-weight:700; color:#fff; font-size:1.07em; border-bottom:2.5px solid #232323; text-align:left;">Doc No</th>
                        <th style="padding:12px 10px; font-weight:700; color:#fff; font-size:1.07em; border-bottom:2.5px solid #232323; text-align:left;">Mileage</th>
                        <th style="padding:12px 10px; font-weight:700; color:#fff; font-size:1.07em; border-bottom:2.5px solid #232323; text-align:left;">Description</th>
                        <th style="padding:12px 10px; font-weight:700; color:#fff; font-size:1.07em; border-bottom:2.5px solid #232323; text-align:left;">Qty</th>
                        <th style="padding:12px 10px; font-weight:700; color:#fff; font-size:1.07em; border-bottom:2.5px solid #232323; text-align:left; border-top-right-radius:8px;">SubTotal</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr style="background:#fff;"><td style="padding:10px 10px;">12/06/2024</td><td style="padding:10px 10px;">ES1001</td><td style="padding:10px 10px;">45,000</td><td style="padding:10px 10px;">Labour - Service</td><td style="padding:10px 10px; text-align:right;">2</td><td style="padding:10px 10px; text-align:right;">£120.00</td></tr>
                      <tr style="background:#f9fafb;"><td style="padding:10px 10px;">10/03/2024</td><td style="padding:10px 10px;">ES0998</td><td style="padding:10px 10px;">42,500</td><td style="padding:10px 10px;">Labour - Brakes</td><td style="padding:10px 10px; text-align:right;">1</td><td style="padding:10px 10px; text-align:right;">£60.00</td></tr>
                    </tbody>
                  </table>
                  <table id="parts-table-header" class="history-table" style="width:100%; font-size:1em; border-spacing:0; border-collapse:separate; margin-bottom:0; display:none;">
                    <thead>
                      <tr style="background:#232323;">
                        <th style="padding:12px 10px; font-weight:700; color:#fff; font-size:1.07em; border-bottom:2.5px solid #232323; text-align:left; border-top-left-radius:8px;">Date</th>
                        <th style="padding:12px 10px; font-weight:700; color:#fff; font-size:1.07em; border-bottom:2.5px solid #232323; text-align:left;">Doc No</th>
                        <th style="padding:12px 10px; font-weight:700; color:#fff; font-size:1.07em; border-bottom:2.5px solid #232323; text-align:left;">Mileage</th>
                        <th style="padding:12px 10px; font-weight:700; color:#fff; font-size:1.07em; border-bottom:2.5px solid #232323; text-align:left;">Description</th>
                        <th style="padding:12px 10px; font-weight:700; color:#fff; font-size:1.07em; border-bottom:2.5px solid #232323; text-align:left;">Qty</th>
                        <th style="padding:12px 10px; font-weight:700; color:#fff; font-size:1.07em; border-bottom:2.5px solid #232323; text-align:left; border-top-right-radius:8px;">SubTotal</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr style="background:#fff;"><td style="padding:10px 10px;">12/06/2024</td><td style="padding:10px 10px;">ES1001</td><td style="padding:10px 10px;">45,000</td><td style="padding:10px 10px;">Oil Filter</td><td style="padding:10px 10px; text-align:right;">1</td><td style="padding:10px 10px; text-align:right;">£12.00</td></tr>
                      <tr style="background:#f9fafb;"><td style="padding:10px 10px;">10/03/2024</td><td style="padding:10px 10px;">ES0998</td><td style="padding:10px 10px;">42,500</td><td style="padding:10px 10px;">Brake Pads</td><td style="padding:10px 10px; text-align:right;">4</td><td style="padding:10px 10px; text-align:right;">£40.00</td></tr>
                    </tbody>
                  </table>
                  <table id="appt-table-header" class="history-table" style="width:100%; font-size:1em; border-spacing:0; border-collapse:separate; margin-bottom:0; display:none;">
                    <thead>
                      <tr style="background:#232323;">
                        <th style="padding:12px 10px; font-weight:700; color:#fff; font-size:1.07em; border-bottom:2.5px solid #232323; text-align:left; border-top-left-radius:8px;">Date</th>
                        <th style="padding:12px 10px; font-weight:700; color:#fff; font-size:1.07em; border-bottom:2.5px solid #232323; text-align:left;">Time</th>
                        <th style="padding:12px 10px; font-weight:700; color:#fff; font-size:1.07em; border-bottom:2.5px solid #232323; text-align:left;">Description</th>
                        <th style="padding:12px 10px; font-weight:700; color:#fff; font-size:1.07em; border-bottom:2.5px solid #232323; text-align:left;">Bay</th>
                        <th style="padding:12px 10px; font-weight:700; color:#fff; font-size:1.07em; border-bottom:2.5px solid #232323; text-align:left; border-top-right-radius:8px;">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr style="background:#fff;"><td style="padding:10px 10px;">15/06/2024</td><td style="padding:10px 10px;">09:00</td><td style="padding:10px 10px;">Annual Service</td><td style="padding:10px 10px;">Bay 1</td><td style="padding:10px 10px;">Completed</td></tr>
                      <tr style="background:#f9fafb;"><td style="padding:10px 10px;">18/06/2024</td><td style="padding:10px 10px;">13:30</td><td style="padding:10px 10px;">Brake Check</td><td style="padding:10px 10px;">Bay 2</td><td style="padding:10px 10px;">Pending</td></tr>
                      <tr style="background:#fff;"><td style="padding:10px 10px;">20/06/2024</td><td style="padding:10px 10px;">11:00</td><td style="padding:10px 10px;">Oil Change</td><td style="padding:10px 10px;">Bay 3</td><td style="padding:10px 10px;">Cancelled</td></tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane" id="tab-description" style="display:none; padding:40px 0 0 0; text-align:center; color:#888; font-size:1.1em; min-height:420px;">
            <div style="max-width: 700px; margin: 0 auto; text-align: left;">
              <div style="display: flex; gap: 10px; align-items: center; margin-bottom: 18px;">
                <select id="preset-description-select" style="flex:1; border-radius: 8px; border: 1.5px solid #b91c1c; padding: 10px 14px; font-size: 1.08em; background: #fff; color: #b91c1c; font-weight: 600; outline: none; transition: border 0.2s;">
                  <option>Pre-set descriptions</option>
                </select>
                <button id="openWorkDescriptionsModal" style="background: #b91c1c; color: #fff; border: none; border-radius: 8px; padding: 8px 18px; font-size: 1.18em; font-weight: 700; box-shadow: 0 2px 8px rgba(185,28,28,0.10); display: flex; align-items: center; justify-content: center; transition: background 0.18s; cursor: pointer;">
                  <i class="fas fa-plus"></i>
                </button>
              </div>
              <textarea style="width: 100%; min-height: 260px; border-radius: 12px; border: 1.5px solid #e5e7eb; background: #fff; box-shadow: 0 2px 8px rgba(185,28,28,0.04); padding: 18px 16px; font-size: 1.13em; color: #232323; font-family: inherit; resize: vertical; outline: none; transition: border 0.2s;"></textarea>
              <div style="margin-top: 18px; text-align: center; color: #b91c1c; font-size: 1em; font-style: italic; opacity: 0.85;">
                This area is designed for brief descriptions of work, approximately 35 lines of content will print.<br/>
                <span style="color: #888; font-size: 0.98em;">Use the <b>+</b> button above to access pre-saved work descriptions for quick insertion.</span>
              </div>
            </div>
          </div>
          <div class="tab-pane" id="tab-labour" style="display:none; padding:0; background:#ededed; border-radius:0 0 8px 8px; min-height:420px;">
            <div style="padding:0;">
              <table id="labourTable" style="width:100%; border-collapse:separate; border-spacing:0; font-size:1em; background:#ededed; border-radius:8px; overflow:hidden;">
                <thead>
                  <tr style="background:#444; color:#fff; font-size:1.08em;">
                    <th style="width:36px; background:#555; border-right:1.5px solid #888; text-align:center;">
                      <input type="checkbox" id="selectAllLabourRows" style="accent-color:#b91c1c; width:18px; height:18px; border-radius:4px; box-shadow:0 1px 2px #bbb; cursor:pointer;" title="Select All" />
                    </th>
                    <th style="width:36px; background:#555; border-right:1.5px solid #888; text-align:center;">
                      <button id="moveDescendBtn" class="move-descend-btn" style="width:32px; height:32px; border-radius:6px; border:none; background:none; color:#fff; font-weight:900; font-size:1.7em; box-shadow:none; cursor:pointer; display:inline-flex; align-items:center; justify-content:center; transition:background 0.15s, box-shadow 0.2s, color 0.2s, transform 0.15s;" title="Move last row to top (Descending)">&#8595;</button>
                    </th>
                    <th style="text-align:left; padding:8px 10px; font-weight:700;">Description</th>
                    <th style="width:120px; text-align:center; font-weight:700;">Tech</th>
                    <th style="width:60px; text-align:center; font-weight:700;">Qty</th>
                    <th style="width:90px; text-align:center; font-weight:700;">Unit Price</th>
                    <th style="width:60px; text-align:center; font-weight:700;">D%</th>
                    <th style="width:90px; text-align:center; font-weight:700;">VAT</th>
                    <th style="width:100px; text-align:right; font-weight:700;">SubTotal</th>
                  </tr>
                </thead>
                <tbody id="labourTableBody">
                  <!-- Dynamic rows will be inserted here by JS -->
                </tbody>
                <tfoot>
                  <tr id="jobLookupRow" style="background:#fcfbe3; cursor:pointer;">
                    <td style="text-align:center; color:#7ca16b;"><i class="fas fa-search"></i></td>
                    <td colspan="1"></td>
                    <td colspan="6" style="color:#7ca16b; font-style:italic;">Job Lookup</td>
                    <td style="text-align:right; padding-right:10px; color:#7ca16b;">0.00</td>
                  </tr>
                </tfoot>
              </table>
              <div id="globalDiscountRow" style="display:flex; justify-content:flex-end; align-items:center; background:linear-gradient(90deg,#fff 0%,#ffeaea 100%); border-top:2.5px solid #b91c1c; padding:14px 18px 10px 18px; font-size:1.18em; color:#b91c1c; font-weight:800; box-shadow:0 2px 8px rgba(185,28,28,0.08); margin-top:2px; border-radius:0 0 8px 8px;">
                <span style="margin-right:auto; color:#b91c1c; font-size:1.08em; font-weight:900; letter-spacing:0.5px; text-shadow:0 1px 2px #fff,0 2px 8px #f8d7da;">Global Labour Discount</span>
                <span id="globalDiscountTotal" style="font-weight:900; color:#fff; background:#b91c1c; border-radius:8px; padding:6px 22px; font-size:1.18em; box-shadow:0 2px 8px rgba(185,28,28,0.13);">0.00</span>
              </div>
              <div id="labourActionBar" style="display:none; margin:8px 0 0 0;">
                <div style="display:flex;">
                  <button id="deleteMarkedLabourBtn" style="flex:1; background:#b91c1c; color:#fff; font-weight:700; font-size:1.08em; border:none; border-right:2px solid #fff; padding:14px 0; cursor:pointer; transition:background 0.18s;">Delete Marked Labour Lines</button>
                  <button id="moveMarkedLabourBtn" style="flex:1; background:#256029; color:#fff; font-weight:700; font-size:1.08em; border:none; padding:14px 0; cursor:pointer; transition:background 0.18s;">Move ALL Marked to Estimate</button>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane" id="tab-parts" style="display:none; padding:0; background:#ededed; border-radius:0 0 8px 8px; min-height:420px;">
            <div style="padding:0;">
              <table id="partsTable" style="width:100%; border-collapse:separate; border-spacing:0; font-size:1em; background:#ededed; border-radius:8px; overflow:hidden;">
                <thead>
                  <tr style="background:#444; color:#fff; font-size:1.08em;">
                    <th style="width:36px; background:#555; border-right:1.5px solid #888; text-align:center;">
                      <input type="checkbox" id="selectAllPartsRows" style="accent-color:#b91c1c; width:18px; height:18px; border-radius:4px; box-shadow:0 1px 2px #bbb; cursor:pointer;" title="Select All" />
                    </th>
                    <th style="width:36px; background:#555; border-right:1.5px solid #888; text-align:center;"></th>
                    <th style="text-align:left; padding:8px 10px; font-weight:700;">Part Number</th>
                    <th style="text-align:left; padding:8px 10px; font-weight:700;">Description</th>
                    <th style="width:60px; text-align:center; font-weight:700;">Cost</th>
                    <th style="width:60px; text-align:center; font-weight:700;">Qty</th>
                    <th style="width:90px; text-align:center; font-weight:700;">Unit Price</th>
                    <th style="width:60px; text-align:center; font-weight:700;">D%</th>
                    <th style="width:90px; text-align:center; font-weight:700;">VAT</th>
                    <th style="width:100px; text-align:right; font-weight:700;">SubTotal</th>
                  </tr>
                </thead>
                <tbody id="partsTableBody">
                  <!-- Dynamic rows will be inserted here by JS -->
                </tbody>
                <tfoot>
                  <tr id="partLookupRow" style="background:#fcfbe3; cursor:pointer;">
                    <td style="text-align:center; color:#b91c1c;"><i class="fas fa-search"></i></td>
                    <td colspan="2" style="color:#b91c1c; font-style:italic;">Part Lookup</td>
                    <td colspan="6"></td>
                    <td style="text-align:right; padding-right:10px; color:#b91c1c;">0.00</td>
                  </tr>
                </tfoot>
              </table>
              <div id="globalPartsDiscountRow" style="display:flex; align-items:center; background:linear-gradient(90deg,#fff 0%,#ffeaea 100%); border-top:2.5px solid #b91c1c; padding:18px 18px 10px 18px; font-size:1.18em; color:#b91c1c; font-weight:800; box-shadow:0 2px 8px rgba(185,28,28,0.08); margin-top:2px; border-radius:0 0 8px 8px; gap:10px;">
                <span style="margin-right:auto; color:#b91c1c; font-size:1.08em; font-weight:900; letter-spacing:0.5px; text-shadow:0 1px 2px #fff,0 2px 8px #f8d7da;">Global Parts Discount</span>
                <span id="globalPartsDiscountTotal" style="font-weight:900; color:#fff; background:#b91c1c; border-radius:8px; padding:6px 22px; font-size:1.18em; box-shadow:0 2px 8px rgba(185,28,28,0.13);">0.00</span>
              </div>
              <div id="partsActionBar" style="display:none; width:100%; margin:8px 0 0 0;">
                <div style="display:flex; gap:8px; justify-content:flex-end;">
                  <button id="deleteMarkedPartsBtn" style="background:#b91c1c; color:#fff; font-weight:700; font-size:1.08em; border:none; border-radius:6px; padding:18px 0; flex:1; cursor:pointer; transition:background 0.18s;">Delete Marked Parts Lines</button>
                  <button id="moveMarkedPartsBtn" style="background:#256029; color:#fff; font-weight:700; font-size:1.08em; border:none; border-radius:6px; padding:18px 0; flex:1; cursor:pointer; transition:background 0.18s;">Move ALL Marked to Estimate</button>
                </div>
              </div>
              <div style="background:#fafafa; border-radius:0 0 12px 12px; min-height:120px; margin-top:0; border:1.5px solid #f3f4f6; border-top:none; box-shadow:0 2px 8px rgba(185,28,28,0.03); padding:24px 18px 24px 18px;"></div>
            </div>
          </div>
          <div class="tab-pane" id="tab-advisories" style="display:none; padding:0; background:#ededed; border-radius:0 0 8px 8px; min-height:420px;">
            <div style="display:flex; gap:18px; align-items:stretch;">
              <!-- Advisories Table -->
              <div style="flex:2; display:flex; flex-direction:column;">
                <table id="advisoriesTable" style="width:100%; border-collapse:separate; border-spacing:0; font-size:1em; background:#ededed; border-radius:8px 0 0 8px; overflow:hidden;">
                  <thead>
                    <tr style="background:#b91c1c; color:#fff; font-size:1.08em;">
                      <th style="width:36px; background:#a31a1a; border-right:1.5px solid #fff; text-align:center;">
                        <input type="checkbox" id="selectAllAdvisoryRows" style="accent-color:#b91c1c; width:18px; height:18px; border-radius:4px; box-shadow:0 1px 2px #bbb; cursor:pointer;" title="Select All" />
                      </th>
                      <th style="width:36px; background:#a31a1a; border-right:1.5px solid #fff; text-align:center;"></th>
                      <th style="text-align:left; padding:8px 10px; font-weight:700;">Description</th>
                    </tr>
                  </thead>
                  <tbody id="advisoriesTableBody">
                    <!-- Dynamic rows will be inserted here by JS -->
                  </tbody>
                  <tfoot>
                    <tr id="advisoryAddRow" style="background:#fffbe6; cursor:pointer;">
                      <td style="text-align:center; color:#b91c1c;"><i class="fas fa-search"></i></td>
                      <td></td>
                      <td><input id="advisoryAddInput" type="text" placeholder="Add new advisory..." style="width:100%; border-radius:4px; border:1.5px solid #e5e7eb; padding:6px 10px; font-size:1em; background:#fffbe6; color:#b91c1c; font-style:italic;"></td>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <!-- Internal Notes Panel -->
              <div style="flex:1; background:#fff8f8; border-radius:0 8px 8px 0; border:1.5px solid #e5e7eb; border-left:none; display:flex; flex-direction:column;">
                <div style="background:#b91c1c; color:#fff; font-weight:700; padding:6px 12px; border-radius:0 8px 0 0; font-size:0.98em; letter-spacing:0.01em; box-shadow:0 2px 8px rgba(185,28,28,0.08);">Internal Notes <span style='font-weight:400; font-size:0.93em;'>(not printed)</span></div>
                <textarea id="advisoryNotes" style="flex:1; width:100%; min-height:120px; border:none; border-radius:0 0 8px 0; padding:12px 14px; font-size:1.01em; color:#b91c1c; background:#fffbe6; resize:vertical; box-shadow:0 1px 4px 0 rgba(185,28,28,0.03); margin-top:0;"></textarea>
              </div>
            </div>
          </div>
          <div class="tab-pane" id="tab-activity" style="display:none; padding:0; background:#ededed; border-radius:0 0 8px 8px; min-height:420px;">
            <div style="padding:0; overflow-x:auto;">
              <table id="activityTable" style="width:100%; min-width:800px; border-collapse:separate; border-spacing:0; font-size:1em; background:#ededed; border-radius:12px; box-shadow:0 4px 18px rgba(185,28,28,0.07); overflow:hidden; font-family:inherit;">
                <thead style="position:sticky; top:0; z-index:2;">
                  <tr style="background:#b91c1c; color:#fff; font-size:1.13em; font-weight:800; height:48px;">
                    <th style="padding:12px 14px; font-weight:800; text-align:left;">When</th>
                    <th style="padding:12px 14px; font-weight:800; text-align:center;">Doc Info</th>
                    <th style="padding:12px 14px; font-weight:800; text-align:center;">User</th>
                    <th style="padding:12px 14px; font-weight:800; text-align:left;">Description</th>
                    <th style="padding:12px 14px; font-weight:800; text-align:center;">From</th>
                    <th style="padding:12px 14px; font-weight:800; text-align:center;">To</th>
                  </tr>
                </thead>
                <tbody id="activityTableBody">
                  <!-- Dynamic rows will be inserted here by JS -->
                </tbody>
              </table>
              <div id="activityEmptyState" style="display:none; text-align:center; color:#b91c1c; font-size:1.13em; font-weight:600; padding:48px 0 32px 0;">
                <i class="fas fa-info-circle" style="font-size:2.2em; margin-bottom:10px; color:#fca5a5;"></i><br/>
                No activity yet. All changes will appear here!
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Right Sidebar -->
      <div class="estimate-sidebar" style="flex: 0 0 290px; background: #f9fafb; border-radius: 14px; border:1.5px solid #e5e7eb; padding: 18px 16px; display: flex; flex-direction: column; gap: 22px; box-shadow:0 2px 8px rgba(185,28,28,0.03);">
        <div style="background: #fff; border-radius: 12px; border: 1.5px solid #e5e7eb; box-shadow: 0 2px 8px rgba(185,28,28,0.04); padding: 18px 16px; margin-bottom: 0;">
          <div style="font-weight:700; margin-bottom:8px; color:#b91c1c;">Additional Info</div>
          <div style="display:grid; grid-template-columns: 1fr 1fr; gap:8px;">
            <label>Rec</label><input type="date" style="border-radius:8px; border:1.5px solid #e5e7eb; padding:5px 10px;">
            <label>Due</label><input type="date" style="border-radius:8px; border:1.5px solid #e5e7eb; padding:5px 10px;">
            <label>Expires</label><input type="date" style="border-radius:8px; border:1.5px solid #e5e7eb; padding:5px 10px;">
            <label>Status</label><select style="border-radius:8px; border:1.5px solid #e5e7eb; padding:5px 10px;"><option>∼</option><option>Auth Req</option><option>Complete</option><option>Service</option><option>Urgent</option></select>
            <label>Order Ref</label><input type="text" style="border-radius:8px; border:1.5px solid #e5e7eb; padding:5px 10px;">
            <label>Department</label><select style="border-radius:8px; border:1.5px solid #e5e7eb; padding:5px 10px;"></select>
            <label>Terms</label><select style="border-radius:8px; border:1.5px solid #e5e7eb; padding:5px 10px;"></select>
            <label>Sales Advisor</label><select style="border-radius:8px; border:1.5px solid #e5e7eb; padding:5px 10px;"></select>
            <label>Technician</label><select style="border-radius:8px; border:1.5px solid #e5e7eb; padding:5px 10px;"></select>
          </div>
        </div>
        <div style="height: 700px;"></div>
        <div style="background: #fff; border-radius: 12px; border: 1.5px solid #e5e7eb; box-shadow: 0 2px 8px rgba(185,28,28,0.04); padding: 18px 16px; margin-bottom: 18px;">
          <div style="font-weight:700; margin-bottom:8px; color:#b91c1c;">Extras</div>
          <div style="display:grid; grid-template-columns: 1fr 1fr; gap:8px;">
            <label>Sundries</label><select style="border-radius:8px; border:1.5px solid #e5e7eb; padding:5px 10px;"></select>
            <label>Lubricants</label><select style="border-radius:8px; border:1.5px solid #e5e7eb; padding:5px 10px;"></select>
            <label>Paint & Mat.</label><select style="border-radius:8px; border:1.5px solid #e5e7eb; padding:5px 10px;"></select>
          </div>
        </div>
        <div style="background: #fff; border-radius: 12px; border: 1.5px solid #e5e7eb; box-shadow: 0 2px 8px rgba(185,28,28,0.04); padding: 18px 16px; margin-bottom: 0;">
          <div style="font-weight:700; margin-bottom:8px; color:#b91c1c;">Totals</div>
          <div style="display:grid; grid-template-columns: 1fr 1fr; gap:8px;">
            <label>SubTotal</label><input type="text" value="0.00" readonly style="border-radius:8px; border:1.5px solid #e5e7eb; padding:5px 10px; background:#f9fafb;">
            <label>VAT</label><input type="text" value="0.00" readonly style="border-radius:8px; border:1.5px solid #e5e7eb; padding:5px 10px; background:#f9fafb;">
            <label>Total</label><input type="text" value="0.00" readonly style="border-radius:8px; border:1.5px solid #e5e7eb; padding:5px 10px; background:#f9fafb;">
            <label>Excess</label><input type="text" value="0.00" readonly style="border-radius:8px; border:1.5px solid #e5e7eb; padding:5px 10px; background:#f9fafb;">
            <label>Receipts</label><input type="text" value="0.00" readonly style="border-radius:8px; border:1.5px solid #e5e7eb; padding:5px 10px; background:#f9fafb;">
            <label>Balance</label><input type="text" value="0.00" readonly style="border-radius:8px; border:1.5px solid #e5e7eb; padding:5px 10px; background:#fef9c3;">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Work Descriptions Modal -->
<div id="workDescriptionsModal" style="display:none; position:fixed; top:0; left:0; width:100vw; height:100vh; background:rgba(0,0,0,0.25); backdrop-filter:blur(4px); z-index:2000; align-items:center; justify-content:center; animation:fadeIn 0.3s ease-out;">
  <div style="background:linear-gradient(135deg, #fff 0%, #f8f9fa 100%); border-radius:20px; box-shadow:0 20px 60px rgba(0,0,0,0.3), 0 8px 32px rgba(185,28,28,0.15), inset 0 1px 0 rgba(255,255,255,0.8); min-width:900px; min-height:480px; max-width:98vw; max-height:95vh; display:flex; flex-direction:column; position:relative; border:3px solid #b91c1c; transform:scale(0.95); animation:modalSlideIn 0.4s ease-out forwards; overflow:hidden;">
    <!-- Header with Gradient -->
    <div style="background:linear-gradient(135deg, #1f2937 0%, #374151 50%, #4b5563 100%); color:#fff; border-radius:20px 20px 0 0; padding:18px 24px 14px 24px; font-weight:800; font-size:1.25em; display:flex; align-items:center; justify-content:space-between; border-bottom:3px solid #b91c1c; box-shadow:0 4px 20px rgba(0,0,0,0.2), inset 0 1px 0 rgba(255,255,255,0.1); text-shadow:0 2px 4px rgba(0,0,0,0.3);">
      <div style="display:flex; align-items:center; gap:12px;">
        <div style="width:8px; height:8px; background:#b91c1c; border-radius:50%; box-shadow:0 0 8px rgba(185,28,28,0.6);"></div>
        <span style="background:linear-gradient(45deg, #fff, #e5e7eb); -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;">Work Descriptions</span>
      </div>
      <button id="closeWorkDescriptionsModal" style="background:linear-gradient(135deg, #b91c1c 0%, #dc2626 100%); color:#fff; border:none; border-radius:12px; width:42px; height:42px; font-size:1.4em; font-weight:700; display:flex; align-items:center; justify-content:center; cursor:pointer; margin-left:10px; box-shadow:0 4px 12px rgba(185,28,28,0.3), inset 0 1px 0 rgba(255,255,255,0.2); transition:all 0.2s ease; transform:scale(1);" onmouseover="this.style.transform='scale(1.1)'; this.style.boxShadow='0 6px 16px rgba(185,28,28,0.4), inset 0 1px 0 rgba(255,255,255,0.3)'" onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='0 4px 12px rgba(185,28,28,0.3), inset 0 1px 0 rgba(255,255,255,0.2)'"><i class="fas fa-times"></i></button>
    </div>
    <!-- Top Buttons with Enhanced Styling -->
    <div style="display:flex; border-bottom:3px solid #b91c1c; background:linear-gradient(135deg, #374151 0%, #4b5563 100%); box-shadow:0 2px 8px rgba(0,0,0,0.1);">
      <button id="workDescCloseBtn" style="flex:1; background:linear-gradient(135deg, #374151 0%, #4b5563 100%); color:#fff; border:none; border-radius:0; font-weight:700; font-size:1.1em; padding:14px 0; cursor:pointer; border-right:2px solid #b91c1c; transition:all 0.2s ease; text-shadow:0 1px 2px rgba(0,0,0,0.3); box-shadow:inset 0 1px 0 rgba(255,255,255,0.1);" onmouseover="this.style.background='linear-gradient(135deg, #4b5563 0%, #6b7280 100%)'; this.style.boxShadow='inset 0 1px 0 rgba(255,255,255,0.2)'" onmouseout="this.style.background='linear-gradient(135deg, #374151 0%, #4b5563 100%)'; this.style.boxShadow='inset 0 1px 0 rgba(255,255,255,0.1)'">Close</button>
      <button id="workDescNewBtn" style="flex:1; background:linear-gradient(135deg, #b91c1c 0%, #dc2626 100%); color:#fff; border:none; border-radius:0; font-weight:700; font-size:1.1em; padding:14px 0; cursor:pointer; transition:all 0.2s ease; text-shadow:0 1px 2px rgba(0,0,0,0.3); box-shadow:inset 0 1px 0 rgba(255,255,255,0.2), 0 2px 8px rgba(185,28,28,0.2);" onmouseover="this.style.background='linear-gradient(135deg, #dc2626 0%, #ef4444 100%)'; this.style.boxShadow='inset 0 1px 0 rgba(255,255,255,0.3), 0 4px 12px rgba(185,28,28,0.3)'" onmouseout="this.style.background='linear-gradient(135deg, #b91c1c 0%, #dc2626 100%)'; this.style.boxShadow='inset 0 1px 0 rgba(255,255,255,0.2), 0 2px 8px rgba(185,28,28,0.2)'">New</button>
    </div>
    <!-- Content with Enhanced Layout -->
    <div style="flex:1; display:flex; min-height:320px; border-bottom-left-radius:20px; border-bottom-right-radius:20px; overflow:hidden;">
      <!-- Left: List with Glass Effect -->
      <div id="workDescListCol" style="width:240px; background:linear-gradient(135deg, #f3f4f6 0%, #e5e7eb 100%); border-right:3px solid #b91c1c; display:flex; flex-direction:column; border-bottom-left-radius:20px; box-shadow:inset 0 2px 8px rgba(0,0,0,0.05); position:relative;">
        <div style="font-weight:800; background:linear-gradient(135deg, #b91c1c 0%, #dc2626 100%); color:#fff; padding:12px 16px; border-bottom:3px solid #b91c1c; text-shadow:0 1px 2px rgba(0,0,0,0.3); box-shadow:0 2px 8px rgba(185,28,28,0.2); font-size:1.05em; letter-spacing:0.5px;">Description</div>
        <div id="workDescList" style="flex:1; overflow-y:auto; background:rgba(255,255,255,0.7); backdrop-filter:blur(10px);"></div>
      </div>
      <!-- Right: Editor with Enhanced Styling -->
      <div style="flex:1; background:linear-gradient(135deg, #fff 0%, #f8f9fa 100%); display:flex; flex-direction:column; border-bottom-right-radius:20px; padding:28px 28px 22px 28px; box-shadow:inset 0 2px 8px rgba(0,0,0,0.03);">
        <div style="display:flex; align-items:center; gap:16px; margin-bottom:22px;">
          <label for="workDescName" style="font-weight:700; color:#1f2937; min-width:70px; font-size:1.05em; text-shadow:0 1px 2px rgba(0,0,0,0.1);">Name</label>
          <input id="workDescName" type="text" style="flex:1; border-radius:12px; border:2px solid #b91c1c; padding:12px 16px; font-size:1.1em; color:#1f2937; background:rgba(255,255,255,0.9); font-weight:600; outline:none; transition:all 0.3s ease; box-shadow:0 2px 8px rgba(185,28,28,0.1), inset 0 1px 0 rgba(255,255,255,0.8);" placeholder="Enter description name..." onfocus="this.style.boxShadow='0 4px 16px rgba(185,28,28,0.2), inset 0 1px 0 rgba(255,255,255,0.9)'; this.style.borderColor='#dc2626'" onblur="this.style.boxShadow='0 2px 8px rgba(185,28,28,0.1), inset 0 1px 0 rgba(255,255,255,0.8)'; this.style.borderColor='#b91c1c'" />
          <span style="color:#6b7280; font-size:0.95em; font-style:italic; background:rgba(185,28,28,0.1); padding:6px 12px; border-radius:8px; border-left:3px solid #b91c1c;">Shown in drop down list</span>
        </div>
        <textarea id="workDescText" style="flex:1; width:100%; min-height:200px; border-radius:16px; border:2px solid #b91c1c; background:rgba(255,255,255,0.9); padding:18px 16px; font-size:1.1em; color:#1f2937; font-family:inherit; resize:vertical; outline:none; transition:all 0.3s ease; box-shadow:0 4px 16px rgba(185,28,28,0.1), inset 0 1px 0 rgba(255,255,255,0.8);" placeholder="Enter your work description here..." onfocus="this.style.boxShadow='0 6px 24px rgba(185,28,28,0.2), inset 0 1px 0 rgba(255,255,255,0.9)'; this.style.borderColor='#dc2626'" onblur="this.style.boxShadow='0 4px 16px rgba(185,28,28,0.1), inset 0 1px 0 rgba(255,255,255,0.8)'; this.style.borderColor='#b91c1c'"> </textarea>
      </div>
    </div>
  </div>
</div>

<style>
@keyframes fadeIn {
  from { opacity: 0; }
  to { opacity: 1; }
}

@keyframes modalSlideIn {
  from { 
    transform: scale(0.95) translateY(20px);
    opacity: 0;
  }
  to { 
    transform: scale(1) translateY(0);
    opacity: 1;
  }
}

@keyframes listItemHover {
  from { transform: translateX(0); }
  to { transform: translateX(4px); }
}

.move-descend-btn:hover, .move-descend-btn:focus {
  background: rgba(255,255,255,0.12);
  box-shadow: 0 0 8px 2px #fff, 0 0 0 2px #b91c1c;
  color: #fff;
  transform: scale(1.18);
}
</style>

<script>
// Modal open/close logic
function openNewEstimateModal() {
  document.getElementById('newEstimateModal').style.display = 'flex';
}
function closeNewEstimateModal() {
  document.getElementById('newEstimateModal').style.display = 'none';
}
document.addEventListener('DOMContentLoaded', function() {
  document.getElementById('closeNewEstimateModal').onclick = closeNewEstimateModal;
  // Open modal on New Estimate button click
  var newEstimateBtn = document.getElementById('main-action-btn');
  if (newEstimateBtn) {
    newEstimateBtn.onclick = openNewEstimateModal;
  }
  // Prevent closing modal by clicking backdrop
  document.querySelector('#newEstimateModal .modal-backdrop').onclick = function(e) {
    e.stopPropagation();
    return false;
  };
  document.getElementById('newEstimateModal').onclick = function(e) {
    if (e.target === this) {
      // Do nothing (disable click-to-close)
      e.stopPropagation();
      return false;
    }
  };
});

// Tab switching logic
const tabBtns = document.querySelectorAll('.tab-btn');
const tabPanes = document.querySelectorAll('.tab-pane');
tabBtns.forEach(btn => {
  btn.addEventListener('click', function() {
    tabBtns.forEach(b => {
      b.classList.remove('active');
      b.style.background = '#b91c1c';
      b.style.color = '#fff';
      b.style.borderBottom = 'none';
    });
    this.classList.add('active');
    this.style.background = '#d32f2f';
    this.style.color = '#fff';
    this.style.borderBottom = '4px solid #fff';
    tabPanes.forEach(pane => pane.style.display = 'none');
    document.getElementById('tab-' + this.dataset.tab).style.display = 'block';
  });
});

// History sub-tab switching logic
const subtabBtns = document.querySelectorAll('.history-subtab');
const prevDocsTable = document.getElementById('prev-docs-table');
const blackTableHeader = document.getElementById('black-table-header');
const advisorsTableHeader = document.getElementById('advisors-table-header');
const labourTableHeader = document.getElementById('labour-table-header');
const partsTableHeader = document.getElementById('parts-table-header');
const apptTableHeader = document.getElementById('appt-table-header');
subtabBtns.forEach(btn => {
  btn.addEventListener('click', function() {
    subtabBtns.forEach(b => {
      b.classList.remove('active');
      b.style.background = 'none';
      b.style.color = '#b91c1c';
      b.style.fontWeight = '600';
      b.style.boxShadow = 'none';
      b.style.border = 'none';
    });
    this.classList.add('active');
    this.style.background = '#fff';
    this.style.color = '#b91c1c';
    this.style.fontWeight = '700';
    this.style.boxShadow = '0 4px 16px rgba(185,28,28,0.10)';
    this.style.border = '1.5px solid #fff';
    this.style.borderBottom = 'none';
    // Show red table header for Prev Docs, black for others, and special for Advisors
    if (this.dataset.subtab === 'prev-docs') {
      prevDocsTable.style.display = '';
      blackTableHeader.style.display = 'none';
      advisorsTableHeader.style.display = 'none';
      labourTableHeader.style.display = 'none';
      partsTableHeader.style.display = 'none';
      apptTableHeader.style.display = 'none';
    } else if (this.dataset.subtab === 'prev-advisors') {
      prevDocsTable.style.display = 'none';
      blackTableHeader.style.display = 'none';
      advisorsTableHeader.style.display = '';
      labourTableHeader.style.display = 'none';
      partsTableHeader.style.display = 'none';
      apptTableHeader.style.display = 'none';
    } else if (this.dataset.subtab === 'prev-labour') {
      prevDocsTable.style.display = 'none';
      blackTableHeader.style.display = 'none';
      advisorsTableHeader.style.display = 'none';
      labourTableHeader.style.display = '';
      partsTableHeader.style.display = 'none';
      apptTableHeader.style.display = 'none';
    } else if (this.dataset.subtab === 'prev-parts') {
      prevDocsTable.style.display = 'none';
      blackTableHeader.style.display = 'none';
      advisorsTableHeader.style.display = 'none';
      labourTableHeader.style.display = 'none';
      partsTableHeader.style.display = '';
      apptTableHeader.style.display = 'none';
    } else if (this.dataset.subtab === 'prev-appt') {
      prevDocsTable.style.display = 'none';
      blackTableHeader.style.display = 'none';
      advisorsTableHeader.style.display = 'none';
      labourTableHeader.style.display = 'none';
      partsTableHeader.style.display = 'none';
      apptTableHeader.style.display = '';
    } else {
      prevDocsTable.style.display = 'none';
      blackTableHeader.style.display = '';
      advisorsTableHeader.style.display = 'none';
      labourTableHeader.style.display = 'none';
      partsTableHeader.style.display = 'none';
      apptTableHeader.style.display = 'none';
    }
  });
});

document.getElementById('openWorkDescriptionsModal').onclick = function() {
  document.getElementById('workDescriptionsModal').style.display = 'flex';
};
document.getElementById('closeWorkDescriptionsModal').onclick = function() {
  document.getElementById('workDescriptionsModal').style.display = 'none';
};

// Work Descriptions Modal Logic
let workDescriptions = [];
let selectedWorkDesc = null;
const workDescList = document.getElementById('workDescList');
const workDescName = document.getElementById('workDescName');
const workDescText = document.getElementById('workDescText');
const workDescNewBtn = document.getElementById('workDescNewBtn');
const workDescCloseBtn = document.getElementById('workDescCloseBtn');

function renderWorkDescList() {
  workDescList.innerHTML = '';
  workDescriptions.forEach((desc, idx) => {
    const row = document.createElement('div');
    row.style.display = 'flex';
    row.style.alignItems = 'center';
    row.style.justifyContent = 'space-between';
    row.style.padding = '12px 16px';
    row.style.margin = '8px 12px';
    row.style.borderRadius = '12px';
    row.style.fontWeight = '600';
    row.style.color = '#1f2937';
    row.style.cursor = 'pointer';
    row.style.transition = 'all 0.3s ease';
    row.style.position = 'relative';
    row.style.overflow = 'hidden';
    row.style.background = 'rgba(255,255,255,0.8)';
    row.style.border = '2px solid transparent';
    row.style.boxShadow = '0 2px 8px rgba(0,0,0,0.05), inset 0 1px 0 rgba(255,255,255,0.8)';
    
    if (selectedWorkDesc === idx) {
      row.style.background = 'linear-gradient(135deg, #b91c1c 0%, #dc2626 100%)';
      row.style.color = '#fff';
      row.style.border = '2px solid #b91c1c';
      row.style.boxShadow = '0 4px 16px rgba(185,28,28,0.3), inset 0 1px 0 rgba(255,255,255,0.2)';
      row.style.transform = 'translateX(4px) scale(1.02)';
    }
    
    // Add hover effects
    row.onmouseover = function() {
      if (selectedWorkDesc !== idx) {
        this.style.background = 'linear-gradient(135deg, #fef2f2 0%, #fee2e2 100%)';
        this.style.border = '2px solid #b91c1c';
        this.style.transform = 'translateX(4px) scale(1.01)';
        this.style.boxShadow = '0 4px 12px rgba(185,28,28,0.15), inset 0 1px 0 rgba(255,255,255,0.9)';
      }
    };
    
    row.onmouseout = function() {
      if (selectedWorkDesc !== idx) {
        this.style.background = 'rgba(255,255,255,0.8)';
        this.style.border = '2px solid transparent';
        this.style.transform = 'translateX(0) scale(1)';
        this.style.boxShadow = '0 2px 8px rgba(0,0,0,0.05), inset 0 1px 0 rgba(255,255,255,0.8)';
      }
    };
    
    row.onclick = () => selectWorkDesc(idx);
    
    // Add a subtle glow effect for selected items
    if (selectedWorkDesc === idx) {
      const glow = document.createElement('div');
      glow.style.position = 'absolute';
      glow.style.top = '0';
      glow.style.left = '0';
      glow.style.right = '0';
      glow.style.bottom = '0';
      glow.style.background = 'radial-gradient(circle at center, rgba(185,28,28,0.1) 0%, transparent 70%)';
      glow.style.pointerEvents = 'none';
      glow.style.borderRadius = '12px';
      row.appendChild(glow);
    }
    
    const nameSpan = document.createElement('span');
    nameSpan.textContent = desc.name || '(Untitled)';
    nameSpan.style.fontSize = '1.05em';
    nameSpan.style.fontWeight = selectedWorkDesc === idx ? '700' : '600';
    nameSpan.style.textShadow = selectedWorkDesc === idx ? '0 1px 2px rgba(0,0,0,0.3)' : 'none';
    row.appendChild(nameSpan);
    
    const delBtn = document.createElement('button');
    delBtn.innerHTML = '<i class="fas fa-trash-alt"></i>';
    delBtn.style.background = selectedWorkDesc === idx ? 'rgba(255,255,255,0.2)' : 'rgba(185,28,28,0.1)';
    delBtn.style.border = 'none';
    delBtn.style.borderRadius = '8px';
    delBtn.style.color = selectedWorkDesc === idx ? '#fff' : '#b91c1c';
    delBtn.style.fontSize = '0.9em';
    delBtn.style.fontWeight = '700';
    delBtn.style.cursor = 'pointer';
    delBtn.style.marginLeft = '8px';
    delBtn.style.padding = '6px 8px';
    delBtn.style.transition = 'all 0.2s ease';
    delBtn.style.display = 'flex';
    delBtn.style.alignItems = 'center';
    delBtn.style.justifyContent = 'center';
    delBtn.style.width = '28px';
    delBtn.style.height = '28px';
    
    delBtn.onmouseover = function() {
      this.style.background = selectedWorkDesc === idx ? 'rgba(255,255,255,0.3)' : 'rgba(185,28,28,0.2)';
      this.style.transform = 'scale(1.1)';
    };
    
    delBtn.onmouseout = function() {
      this.style.background = selectedWorkDesc === idx ? 'rgba(255,255,255,0.2)' : 'rgba(185,28,28,0.1)';
      this.style.transform = 'scale(1)';
    };
    
    delBtn.onclick = (e) => { e.stopPropagation(); removeWorkDesc(idx); };
    row.appendChild(delBtn);
    workDescList.appendChild(row);
  });
}
function selectWorkDesc(idx) {
  selectedWorkDesc = idx;
  workDescName.value = workDescriptions[idx].name;
  workDescText.value = workDescriptions[idx].desc;
  renderWorkDescList();
}
function removeWorkDesc(idx) {
  workDescriptions.splice(idx, 1);
  if (selectedWorkDesc === idx) {
    selectedWorkDesc = null;
    workDescName.value = '';
    workDescText.value = '';
  } else if (selectedWorkDesc > idx) {
    selectedWorkDesc--;
  }
  renderWorkDescList();
}
workDescNewBtn.onclick = function() {
  // Save current if filled
  if (workDescName.value.trim() || workDescText.value.trim()) {
    if (selectedWorkDesc !== null) {
      workDescriptions[selectedWorkDesc] = { name: workDescName.value, desc: workDescText.value };
    } else {
      workDescriptions.push({ name: workDescName.value, desc: workDescText.value });
      selectedWorkDesc = workDescriptions.length - 1;
    }
  }
  // Start new
  workDescriptions.push({ name: '', desc: '' });
  selectedWorkDesc = workDescriptions.length - 1;
  workDescName.value = '';
  workDescText.value = '';
  renderWorkDescList();
};
workDescName.oninput = function() {
  if (selectedWorkDesc !== null) {
    workDescriptions[selectedWorkDesc].name = workDescName.value;
    renderWorkDescList();
  }
};
workDescText.oninput = function() {
  if (selectedWorkDesc !== null) {
    workDescriptions[selectedWorkDesc].desc = workDescText.value;
  }
};
function openWorkDescriptionsModal() {
  document.getElementById('workDescriptionsModal').style.display = 'flex';
  if (workDescriptions.length === 0) {
    workDescriptions.push({ name: '', desc: '' });
    selectedWorkDesc = 0;
  }
  workDescName.value = workDescriptions[selectedWorkDesc].name;
  workDescText.value = workDescriptions[selectedWorkDesc].desc;
  renderWorkDescList();
}
document.getElementById('openWorkDescriptionsModal').onclick = openWorkDescriptionsModal;
document.getElementById('closeWorkDescriptionsModal').onclick = function() {
  document.getElementById('workDescriptionsModal').style.display = 'none';
};
workDescCloseBtn.onclick = function() {
  document.getElementById('workDescriptionsModal').style.display = 'none';
};

// --- Labour Tab Logic ---
const technicians = [ { abbr: 'TT', name: 'Rashid' } ];
const vatOptions = [
  { code: 'T0', label: 'VAT FREE 0%', rate: 0 },
  { code: 'T1', label: 'EXC VAT 20%', rate: 0.2 },
  { code: 'T2', label: 'CUSTOM 30%', rate: 0.3 }
];
let labourRows = [
  { description: 'Description - 1', tech: 'TT', qty: 5, unitPrice: 50.00, discount: 0, vat: 'T1' },
  { description: 'Description - 2', tech: 'TT', qty: '', unitPrice: '', discount: '', vat: 'T1' }
];
function calcSubTotal(row) {
  let qty = parseFloat(row.qty) || 0;
  let price = parseFloat(row.unitPrice) || 0;
  let disc = parseFloat(row.discount) || 0;
  let vat = vatOptions.find(v => v.code === row.vat)?.rate || 0;
  let subtotal = qty * price * (1 - disc/100) * (1 + vat);
  return subtotal ? subtotal.toFixed(2) : '0.00';
}
function renderLabourRows() {
  const tbody = document.getElementById('labourTableBody');
  tbody.innerHTML = '';
  labourRows.forEach((row, idx) => {
    const tr = document.createElement('tr');
    tr.style.background = idx % 2 === 0 ? '#fff' : '#f9f9f9';
    // Checkbox (now first/leftmost)
    const tdCheck = document.createElement('td');
    const cb = document.createElement('input');
    cb.type = 'checkbox';
    cb.style.accentColor = '#b91c1c';
    cb.onchange = updateLabourActionBar; // Attach onchange immediately
    tdCheck.appendChild(cb);
    tr.appendChild(tdCheck);
    // Arrow (now after checkbox)
    const tdArrow = document.createElement('td');
    const btnArrow = document.createElement('button');
    btnArrow.title = 'Move';
    btnArrow.innerHTML = '<span style="color:#b91c1c; font-size:1.2em; font-weight:bold; display:inline-block; transform:translateY(-1px);">&#8593;</span>';
    btnArrow.style.background = 'none';
    btnArrow.style.border = 'none';
    btnArrow.style.cursor = 'pointer';
    btnArrow.onclick = function() {
      if (idx === 0 && labourRows.length > 1) {
        // At top, move down
        const temp = labourRows[idx+1];
        labourRows[idx+1] = labourRows[idx];
        labourRows[idx] = temp;
      } else if (idx > 0) {
        // Not at top, move up
        const temp = labourRows[idx-1];
        labourRows[idx-1] = labourRows[idx];
        labourRows[idx] = temp;
      }
      renderLabourRows();
    };
    tdArrow.appendChild(btnArrow);
    tr.appendChild(tdArrow);
    // Description
    const tdDesc = document.createElement('td');
    const inpDesc = document.createElement('input');
    inpDesc.type = 'text';
    inpDesc.value = row.description;
    inpDesc.style.width = '100%';
    inpDesc.style.border = 'none';
    inpDesc.style.background = 'transparent';
    inpDesc.style.color = '#232323';
    inpDesc.style.fontSize = '1em';
    inpDesc.style.padding = '6px 4px';
    inpDesc.oninput = function() { row.description = this.value; };
    tdDesc.appendChild(inpDesc);
    tr.appendChild(tdDesc);
    // Tech (abbreviation display, full dropdown on focus)
    const tdTech = document.createElement('td');
    let techDisplay = document.createElement('span');
    techDisplay.textContent = row.tech;
    techDisplay.style.cursor = 'pointer';
    techDisplay.onclick = function() {
      techDisplay.style.display = 'none';
      selTech.style.display = '';
      selTech.focus();
    };
    const selTech = document.createElement('select');
    selTech.style.width = '100%';
    selTech.style.border = 'none';
    selTech.style.background = 'transparent';
    selTech.style.color = '#232323';
    selTech.style.display = 'none';
    technicians.forEach(t => {
      const opt = document.createElement('option');
      opt.value = t.abbr;
      opt.textContent = `${t.abbr} - ${t.name}`;
      if (row.tech === t.abbr) opt.selected = true;
      selTech.appendChild(opt);
    });
    selTech.onchange = function() { row.tech = this.value; renderLabourRows(); };
    selTech.onblur = function() {
      selTech.style.display = 'none';
      techDisplay.textContent = row.tech;
      techDisplay.style.display = '';
    };
    tdTech.appendChild(techDisplay);
    tdTech.appendChild(selTech);
    tr.appendChild(tdTech);
    // Qty
    const tdQty = document.createElement('td');
    const inpQty = document.createElement('input');
    inpQty.type = 'number';
    inpQty.value = row.qty;
    inpQty.style.width = '48px';
    inpQty.style.border = 'none';
    inpQty.style.background = 'transparent';
    inpQty.style.color = '#232323';
    inpQty.style.textAlign = 'center';
    inpQty.oninput = function() { row.qty = this.value; renderLabourRows(); };
    tdQty.appendChild(inpQty);
    tr.appendChild(tdQty);
    // Unit Price
    const tdPrice = document.createElement('td');
    const inpPrice = document.createElement('input');
    inpPrice.type = 'number';
    inpPrice.value = row.unitPrice;
    inpPrice.style.width = '70px';
    inpPrice.style.border = 'none';
    inpPrice.style.background = 'transparent';
    inpPrice.style.color = '#232323';
    inpPrice.style.textAlign = 'right';
    inpPrice.oninput = function() { row.unitPrice = this.value; renderLabourRows(); };
    tdPrice.appendChild(inpPrice);
    tr.appendChild(tdPrice);
    // Discount
    const tdDisc = document.createElement('td');
    const inpDisc = document.createElement('input');
    inpDisc.type = 'number';
    inpDisc.value = row.discount;
    inpDisc.style.width = '40px';
    inpDisc.style.border = 'none';
    inpDisc.style.background = 'transparent';
    inpDisc.style.color = '#232323';
    inpDisc.style.textAlign = 'center';
    inpDisc.oninput = function() { row.discount = this.value; renderLabourRows(); };
    tdDisc.appendChild(inpDisc);
    tr.appendChild(tdDisc);
    // VAT (percent display, full dropdown on focus)
    const tdVat = document.createElement('td');
    let vatObj = vatOptions.find(v => v.code === row.vat);
    let vatDisplay = document.createElement('span');
    vatDisplay.textContent = vatObj ? Math.round(vatObj.rate*100) + '%' : '';
    vatDisplay.style.cursor = 'pointer';
    vatDisplay.onclick = function() {
      vatDisplay.style.display = 'none';
      selVat.style.display = '';
      selVat.focus();
    };
    const selVat = document.createElement('select');
    selVat.style.width = '100%';
    selVat.style.border = 'none';
    selVat.style.background = 'transparent';
    selVat.style.color = '#232323';
    selVat.style.display = 'none';
    vatOptions.forEach(v => {
      const opt = document.createElement('option');
      opt.value = v.code;
      opt.textContent = v.label;
      if (row.vat === v.code) opt.selected = true;
      selVat.appendChild(opt);
    });
    selVat.onchange = function() { row.vat = this.value; renderLabourRows(); };
    selVat.onblur = function() {
      selVat.style.display = 'none';
      let vatObj2 = vatOptions.find(v => v.code === row.vat);
      vatDisplay.textContent = vatObj2 ? Math.round(vatObj2.rate*100) + '%' : '';
      vatDisplay.style.display = '';
    };
    tdVat.appendChild(vatDisplay);
    tdVat.appendChild(selVat);
    tr.appendChild(tdVat);
    // SubTotal
    const tdSub = document.createElement('td');
    tdSub.style.textAlign = 'right';
    tdSub.style.paddingRight = '10px';
    tdSub.textContent = calcSubTotal(row);
    tr.appendChild(tdSub);
    tbody.appendChild(tr);
  });
  // Update global discount
  let total = labourRows.reduce((sum, row) => sum + parseFloat(calcSubTotal(row)), 0);
  document.getElementById('globalDiscountTotal').textContent = total.toFixed(2);
  // Always update action bar after rendering
  updateLabourActionBar();
}
document.getElementById('jobLookupRow').onclick = function() {
  labourRows.push({ description: '', tech: technicians[0].abbr, qty: 1, unitPrice: 50.00, discount: 0, vat: 'T1' });
  renderLabourRows();
};
renderLabourRows();

// Add logic for select all and move descend
setTimeout(function() {
  const selectAll = document.getElementById('selectAllLabourRows');
  if (selectAll) {
    selectAll.onclick = function() {
      const tbody = document.getElementById('labourTableBody');
      const checkboxes = tbody.querySelectorAll('input[type=checkbox]');
      checkboxes.forEach(cb => { cb.checked = selectAll.checked; });
    };
  }
  const moveDescendBtn = document.getElementById('moveDescendBtn');
  if (moveDescendBtn) {
    moveDescendBtn.onclick = function() {
      if (labourRows.length > 1) {
        const last = labourRows.pop();
        labourRows.unshift(last);
        renderLabourRows();
      }
    };
  }
}, 10);

// After renderLabourRows();
function updateLabourActionBar() {
  const tbody = document.getElementById('labourTableBody');
  const checkboxes = tbody.querySelectorAll('input[type=checkbox]');
  const anyChecked = Array.from(checkboxes).some(cb => cb.checked);
  const bar = document.getElementById('labourActionBar');
  if (bar) bar.style.display = anyChecked ? '' : 'none';
  // Update select-all checkbox state
  const selectAll = document.getElementById('selectAllLabourRows');
  if (selectAll) {
    const allChecked = checkboxes.length > 0 && Array.from(checkboxes).every(cb => cb.checked);
    selectAll.checked = allChecked;
    // Indeterminate state for partial selection
    selectAll.indeterminate = !allChecked && anyChecked;
  }
}
// Patch all checkboxes to update the bar on change
setTimeout(function() {
  const tbody = document.getElementById('labourTableBody');
  const checkboxes = tbody.querySelectorAll('input[type=checkbox]');
  checkboxes.forEach(cb => {
    cb.onchange = updateLabourActionBar;
  });
  updateLabourActionBar();
}, 20);
// Add logic for action bar buttons
setTimeout(function() {
  const delBtn = document.getElementById('deleteMarkedLabourBtn');
  if (delBtn) {
    delBtn.onclick = function() {
      const tbody = document.getElementById('labourTableBody');
      const checkboxes = tbody.querySelectorAll('input[type=checkbox]');
      let toDelete = [];
      checkboxes.forEach((cb, i) => { if (cb.checked) toDelete.push(i); });
      // Remove from end to avoid index shift
      toDelete.reverse().forEach(idx => labourRows.splice(idx, 1));
      renderLabourRows();
      updateLabourActionBar();
    };
  }
  const moveBtn = document.getElementById('moveMarkedLabourBtn');
  if (moveBtn) {
    moveBtn.onclick = function() {
      // For now, just clear selection
      const tbody = document.getElementById('labourTableBody');
      const checkboxes = tbody.querySelectorAll('input[type=checkbox]');
      checkboxes.forEach(cb => { cb.checked = false; });
      updateLabourActionBar();
      // You can add your own logic for moving to estimate here
    };
  }
}, 30);

// --- Parts Tab Logic ---
const vatOptionsParts = [
  { code: 'T0', label: 'VAT FREE 0%', rate: 0 },
  { code: 'T1', label: 'EXC VAT 20%', rate: 0.2 },
  { code: 'T2', label: 'CUSTOM 30%', rate: 0.3 }
];
let partsRows = [
  { partNumber: '1001', description: 'Part Name here', cost: true, qty: 1, unitPrice: 5000.00, discount: 10, vat: 'T1' },
  { partNumber: '1002', description: 'Part Name here', cost: true, qty: 1, unitPrice: '', discount: '', vat: 'T1' },
  { partNumber: '1003', description: 'Part Name here', cost: true, qty: 1, unitPrice: '', discount: '', vat: 'T1' }
];
function calcPartsSubTotal(row) {
  let qty = parseFloat(row.qty) || 0;
  let price = parseFloat(row.unitPrice) || 0;
  let disc = parseFloat(row.discount) || 0;
  let vat = vatOptionsParts.find(v => v.code === row.vat)?.rate || 0;
  let subtotal = qty * price * (1 - disc/100) * (1 + vat);
  return subtotal ? subtotal.toFixed(2) : '0.00';
}
function renderPartsRows() {
  const tbody = document.getElementById('partsTableBody');
  tbody.innerHTML = '';
  partsRows.forEach((row, idx) => {
    const tr = document.createElement('tr');
    tr.style.background = idx % 2 === 0 ? '#fff' : '#f9f9f9';
    // Checkbox
    const tdCheck = document.createElement('td');
    const cb = document.createElement('input');
    cb.type = 'checkbox';
    cb.style.accentColor = '#b91c1c';
    cb.onchange = updatePartsActionBar;
    tdCheck.appendChild(cb);
    tr.appendChild(tdCheck);
    // Arrow
    const tdArrow = document.createElement('td');
    const btnArrow = document.createElement('button');
    btnArrow.title = 'Move';
    btnArrow.innerHTML = '<span style="color:#b91c1c; font-size:1.2em; font-weight:bold; display:inline-block; transform:translateY(-1px);">&#8593;</span>';
    btnArrow.style.background = 'none';
    btnArrow.style.border = 'none';
    btnArrow.style.cursor = 'pointer';
    btnArrow.onclick = function() {
      if (idx === 0 && partsRows.length > 1) {
        const temp = partsRows[idx+1];
        partsRows[idx+1] = partsRows[idx];
        partsRows[idx] = temp;
      } else if (idx > 0) {
        const temp = partsRows[idx-1];
        partsRows[idx-1] = partsRows[idx];
        partsRows[idx] = temp;
      }
      renderPartsRows();
    };
    tdArrow.appendChild(btnArrow);
    tr.appendChild(tdArrow);
    // Part Number
    const tdPartNum = document.createElement('td');
    const inpPartNum = document.createElement('input');
    inpPartNum.type = 'text';
    inpPartNum.value = row.partNumber;
    inpPartNum.style.width = '100%';
    inpPartNum.style.border = 'none';
    inpPartNum.style.background = 'transparent';
    inpPartNum.style.color = '#232323';
    inpPartNum.style.fontSize = '1em';
    inpPartNum.style.padding = '6px 4px';
    inpPartNum.oninput = function() { row.partNumber = this.value; };
    tdPartNum.appendChild(inpPartNum);
    tr.appendChild(tdPartNum);
    // Description
    const tdDesc = document.createElement('td');
    const inpDesc = document.createElement('input');
    inpDesc.type = 'text';
    inpDesc.value = row.description;
    inpDesc.style.width = '100%';
    inpDesc.style.border = 'none';
    inpDesc.style.background = 'transparent';
    inpDesc.style.color = '#232323';
    inpDesc.style.fontSize = '1em';
    inpDesc.style.padding = '6px 4px';
    inpDesc.oninput = function() { row.description = this.value; };
    tdDesc.appendChild(inpDesc);
    tr.appendChild(tdDesc);
    // Cost (number input)
    const tdCost = document.createElement('td');
    const inpCost = document.createElement('input');
    inpCost.type = 'number';
    inpCost.value = row.cost;
    inpCost.style.width = '70px';
    inpCost.style.border = 'none';
    inpCost.style.background = 'transparent';
    inpCost.style.color = '#232323';
    inpCost.style.textAlign = 'right';
    inpCost.oninput = function() { row.cost = this.value; };
    tdCost.appendChild(inpCost);
    tr.appendChild(tdCost);
    // Qty
    const tdQty = document.createElement('td');
    const inpQty = document.createElement('input');
    inpQty.type = 'number';
    inpQty.value = row.qty;
    inpQty.style.width = '48px';
    inpQty.style.border = 'none';
    inpQty.style.background = 'transparent';
    inpQty.style.color = '#232323';
    inpQty.style.textAlign = 'center';
    inpQty.oninput = function() { row.qty = this.value; renderPartsRows(); };
    tdQty.appendChild(inpQty);
    tr.appendChild(tdQty);
    // Unit Price
    const tdPrice = document.createElement('td');
    const inpPrice = document.createElement('input');
    inpPrice.type = 'number';
    inpPrice.value = row.unitPrice;
    inpPrice.style.width = '70px';
    inpPrice.style.border = 'none';
    inpPrice.style.background = 'transparent';
    inpPrice.style.color = '#232323';
    inpPrice.style.textAlign = 'right';
    inpPrice.oninput = function() { row.unitPrice = this.value; renderPartsRows(); };
    tdPrice.appendChild(inpPrice);
    tr.appendChild(tdPrice);
    // Discount
    const tdDisc = document.createElement('td');
    const inpDisc = document.createElement('input');
    inpDisc.type = 'number';
    inpDisc.value = row.discount;
    inpDisc.style.width = '40px';
    inpDisc.style.border = 'none';
    inpDisc.style.background = 'transparent';
    inpDisc.style.color = '#232323';
    inpDisc.style.textAlign = 'center';
    inpDisc.oninput = function() { row.discount = this.value; renderPartsRows(); };
    tdDisc.appendChild(inpDisc);
    tr.appendChild(tdDisc);
    // VAT
    const tdVat = document.createElement('td');
    let vatObj = vatOptionsParts.find(v => v.code === row.vat);
    let vatDisplay = document.createElement('span');
    vatDisplay.textContent = vatObj ? Math.round(vatObj.rate*100) + '%' : '';
    vatDisplay.style.cursor = 'pointer';
    vatDisplay.onclick = function() {
      vatDisplay.style.display = 'none';
      selVat.style.display = '';
      selVat.focus();
    };
    const selVat = document.createElement('select');
    selVat.style.width = '100%';
    selVat.style.border = 'none';
    selVat.style.background = 'transparent';
    selVat.style.color = '#232323';
    selVat.style.display = 'none';
    vatOptionsParts.forEach(v => {
      const opt = document.createElement('option');
      opt.value = v.code;
      opt.textContent = v.label;
      if (row.vat === v.code) opt.selected = true;
      selVat.appendChild(opt);
    });
    selVat.onchange = function() { row.vat = this.value; renderPartsRows(); };
    selVat.onblur = function() {
      selVat.style.display = 'none';
      let vatObj2 = vatOptionsParts.find(v => v.code === row.vat);
      vatDisplay.textContent = vatObj2 ? Math.round(vatObj2.rate*100) + '%' : '';
      vatDisplay.style.display = '';
    };
    tdVat.appendChild(vatDisplay);
    tdVat.appendChild(selVat);
    tr.appendChild(tdVat);
    // SubTotal
    const tdSub = document.createElement('td');
    tdSub.style.textAlign = 'right';
    tdSub.style.paddingRight = '10px';
    tdSub.textContent = calcPartsSubTotal(row);
    tr.appendChild(tdSub);
    tbody.appendChild(tr);
  });
  // Update global discount
  let total = partsRows.reduce((sum, row) => sum + parseFloat(calcPartsSubTotal(row)), 0);
  document.getElementById('globalPartsDiscountTotal').textContent = total.toFixed(2);
  // Always update action bar after rendering
  updatePartsActionBar();
}
document.getElementById('partLookupRow').onclick = function() {
  partsRows.push({ partNumber: '', description: '', cost: true, qty: 1, unitPrice: 0.00, discount: 0, vat: 'T1' });
  renderPartsRows();
};
renderPartsRows();
// Add logic for select all and move descend
setTimeout(function() {
  const selectAll = document.getElementById('selectAllPartsRows');
  if (selectAll) {
    selectAll.onclick = function() {
      const tbody = document.getElementById('partsTableBody');
      const checkboxes = tbody.querySelectorAll('input[type=checkbox]');
      checkboxes.forEach(cb => { cb.checked = selectAll.checked; });
    };
  }
}, 10);
// After renderPartsRows();
function updatePartsActionBar() {
  const tbody = document.getElementById('partsTableBody');
  const checkboxes = tbody.querySelectorAll('input[type=checkbox]');
  const anyChecked = Array.from(checkboxes).some(cb => cb.checked);
  const bar = document.getElementById('partsActionBar');
  if (bar) bar.style.display = anyChecked ? '' : 'none';
  // Update select-all checkbox state
  const selectAll = document.getElementById('selectAllPartsRows');
  if (selectAll) {
    const allChecked = checkboxes.length > 0 && Array.from(checkboxes).every(cb => cb.checked);
    selectAll.checked = allChecked;
    selectAll.indeterminate = !allChecked && anyChecked;
  }
}
// Patch all checkboxes to update the bar on change
setTimeout(function() {
  const tbody = document.getElementById('partsTableBody');
  const checkboxes = tbody.querySelectorAll('input[type=checkbox]');
  checkboxes.forEach(cb => {
    cb.onchange = updatePartsActionBar;
  });
}, 20);
// Add logic for action bar buttons
setTimeout(function() {
  const delBtn = document.getElementById('deleteMarkedPartsBtn');
  if (delBtn) {
    delBtn.onclick = function() {
      const tbody = document.getElementById('partsTableBody');
      const checkboxes = tbody.querySelectorAll('input[type=checkbox]');
      let toDelete = [];
      checkboxes.forEach((cb, i) => { if (cb.checked) toDelete.push(i); });
      toDelete.reverse().forEach(idx => partsRows.splice(idx, 1));
      renderPartsRows();
      updatePartsActionBar();
    };
  }
  const moveBtn = document.getElementById('moveMarkedPartsBtn');
  if (moveBtn) {
    moveBtn.onclick = function() {
      const tbody = document.getElementById('partsTableBody');
      const checkboxes = tbody.querySelectorAll('input[type=checkbox]');
      checkboxes.forEach(cb => { cb.checked = false; });
      updatePartsActionBar();
    };
  }
}, 30);

// --- Advisories Tab Logic ---
let advisoriesRows = [
  { description: 'Sample 1', checked: false },
  { description: 'Sample 2', checked: false },
  { description: 'Sample 3', checked: false },
  { description: 'sample 4', checked: false }
];
function renderAdvisoriesRows() {
  const tbody = document.getElementById('advisoriesTableBody');
  tbody.innerHTML = '';
  advisoriesRows.forEach((row, idx) => {
    const tr = document.createElement('tr');
    tr.style.background = row.checked ? '#ffeaea' : (idx % 2 === 0 ? '#fff' : '#f9f9f9');
    // Checkbox
    const tdCheck = document.createElement('td');
    const cb = document.createElement('input');
    cb.type = 'checkbox';
    cb.checked = row.checked;
    cb.style.accentColor = '#b91c1c';
    cb.onchange = function() {
      row.checked = this.checked;
      renderAdvisoriesRows();
      updateAdvisorySelectAll();
    };
    tdCheck.appendChild(cb);
    tr.appendChild(tdCheck);
    // Drag handle
    const tdDrag = document.createElement('td');
    tdDrag.innerHTML = '<span style="color:#b91c1c; font-size:1.2em; font-weight:bold; display:inline-block; cursor:grab;">&#8597;</span>';
    tr.appendChild(tdDrag);
    // Description
    const tdDesc = document.createElement('td');
    const inpDesc = document.createElement('input');
    inpDesc.type = 'text';
    inpDesc.value = row.description;
    inpDesc.style.width = '100%';
    inpDesc.style.border = 'none';
    inpDesc.style.background = 'transparent';
    inpDesc.style.color = '#b91c1c';
    inpDesc.style.fontSize = '1em';
    inpDesc.style.padding = '6px 4px';
    inpDesc.oninput = function() { row.description = this.value; };
    tdDesc.appendChild(inpDesc);
    tr.appendChild(tdDesc);
    tbody.appendChild(tr);
  });
}
function updateAdvisorySelectAll() {
  const selectAll = document.getElementById('selectAllAdvisoryRows');
  if (!selectAll) return;
  const allChecked = advisoriesRows.length > 0 && advisoriesRows.every(row => row.checked);
  const anyChecked = advisoriesRows.some(row => row.checked);
  selectAll.checked = allChecked;
  selectAll.indeterminate = !allChecked && anyChecked;
}
document.getElementById('selectAllAdvisoryRows').onchange = function() {
  const checked = this.checked;
  advisoriesRows.forEach(row => row.checked = checked);
  renderAdvisoriesRows();
  updateAdvisorySelectAll();
};
// Add row on Enter
const advisoryAddInput = document.getElementById('advisoryAddInput');
advisoryAddInput.onkeydown = function(e) {
  if (e.key === 'Enter' && this.value.trim()) {
    advisoriesRows.push({ description: this.value.trim(), checked: false });
    this.value = '';
    renderAdvisoriesRows();
    updateAdvisorySelectAll();
  }
};
// Add row on icon click
const advisoryAddRow = document.getElementById('advisoryAddRow');
advisoryAddRow.querySelector('i').style.cursor = 'pointer';
advisoryAddRow.querySelector('i').onclick = function() {
  if (advisoryAddInput.value.trim()) {
    advisoriesRows.push({ description: advisoryAddInput.value.trim(), checked: false });
    advisoryAddInput.value = '';
    renderAdvisoriesRows();
    updateAdvisorySelectAll();
  }
};
renderAdvisoriesRows();
updateAdvisorySelectAll();

// --- Activity Tab Logic ---
let activityRows = [
  { when: '08/07/2025', docInfo: '12:51', user: 'Administrator', description: 'Document created', from: '', to: '' }
];
function renderActivityRows() {
  const tbody = document.getElementById('activityTableBody');
  const emptyState = document.getElementById('activityEmptyState');
  tbody.innerHTML = '';
  if (activityRows.length === 0) {
    emptyState.style.display = '';
    return;
  } else {
    emptyState.style.display = 'none';
  }
  activityRows.forEach((row, idx) => {
    const tr = document.createElement('tr');
    tr.style.background = idx % 2 === 0 ? '#fff' : '#fff4f4';
    tr.style.transition = 'background 0.18s';
    tr.onmouseover = function() { this.style.background = '#ffeaea'; };
    tr.onmouseout = function() { this.style.background = idx % 2 === 0 ? '#fff' : '#fff4f4'; };
    // When
    const tdWhen = document.createElement('td');
    tdWhen.textContent = row.when;
    tdWhen.style.padding = '12px 14px';
    tdWhen.style.textAlign = 'left';
    tr.appendChild(tdWhen);
    // Doc Info
    const tdDocInfo = document.createElement('td');
    tdDocInfo.textContent = row.docInfo;
    tdDocInfo.style.padding = '12px 14px';
    tdDocInfo.style.textAlign = 'center';
    tr.appendChild(tdDocInfo);
    // User
    const tdUser = document.createElement('td');
    tdUser.textContent = row.user;
    tdUser.style.padding = '12px 14px';
    tdUser.style.textAlign = 'center';
    tr.appendChild(tdUser);
    // Description (with icon)
    const tdDesc = document.createElement('td');
    tdDesc.style.padding = '12px 14px';
    tdDesc.style.textAlign = 'left';
    tdDesc.textContent = row.description;
    tr.appendChild(tdDesc);
    // From
    const tdFrom = document.createElement('td');
    tdFrom.textContent = row.from;
    tdFrom.style.padding = '12px 14px';
    tdFrom.style.textAlign = 'center';
    tr.appendChild(tdFrom);
    // To
    const tdTo = document.createElement('td');
    tdTo.textContent = row.to;
    tdTo.style.padding = '12px 14px';
    tdTo.style.textAlign = 'center';
    tr.appendChild(tdTo);
    tbody.appendChild(tr);
  });
}
renderActivityRows();
</script>

<style>
@keyframes fadeIn {
  from { opacity: 0; }
  to { opacity: 1; }
}

@keyframes modalSlideIn {
  from { 
    transform: scale(0.95) translateY(20px);
    opacity: 0;
  }
  to { 
    transform: scale(1) translateY(0);
    opacity: 1;
  }
}

@keyframes listItemHover {
  from { transform: translateX(0); }
  to { transform: translateX(4px); }
}

.move-descend-btn:hover, .move-descend-btn:focus {
  background: rgba(255,255,255,0.12);
  box-shadow: 0 0 8px 2px #fff, 0 0 0 2px #b91c1c;
  color: #fff;
  transform: scale(1.18);
}
</style>

<script>
// Modal open/close logic
function openNewEstimateModal() {
  document.getElementById('newEstimateModal').style.display = 'flex';
}
function closeNewEstimateModal() {
  document.getElementById('newEstimateModal').style.display = 'none';
}
document.addEventListener('DOMContentLoaded', function() {
  document.getElementById('closeNewEstimateModal').onclick = closeNewEstimateModal;
  // Open modal on New Estimate button click
  var newEstimateBtn = document.getElementById('main-action-btn');
  if (newEstimateBtn) {
    newEstimateBtn.onclick = openNewEstimateModal;
  }
  // Prevent closing modal by clicking backdrop
  document.querySelector('#newEstimateModal .modal-backdrop').onclick = function(e) {
    e.stopPropagation();
    return false;
  };
  document.getElementById('newEstimateModal').onclick = function(e) {
    if (e.target === this) {
      // Do nothing (disable click-to-close)
      e.stopPropagation();
      return false;
    }
  };
});

// Tab switching logic
const tabBtns = document.querySelectorAll('.tab-btn');
const tabPanes = document.querySelectorAll('.tab-pane');
tabBtns.forEach(btn => {
  btn.addEventListener('click', function() {
    tabBtns.forEach(b => {
      b.classList.remove('active');
      b.style.background = '#b91c1c';
      b.style.color = '#fff';
      b.style.borderBottom = 'none';
    });
    this.classList.add('active');
    this.style.background = '#d32f2f';
    this.style.color = '#fff';
    this.style.borderBottom = '4px solid #fff';
    tabPanes.forEach(pane => pane.style.display = 'none');
    document.getElementById('tab-' + this.dataset.tab).style.display = 'block';
  });
});

// History sub-tab switching logic
const subtabBtns = document.querySelectorAll('.history-subtab');
const prevDocsTable = document.getElementById('prev-docs-table');
const blackTableHeader = document.getElementById('black-table-header');
const advisorsTableHeader = document.getElementById('advisors-table-header');
const labourTableHeader = document.getElementById('labour-table-header');
const partsTableHeader = document.getElementById('parts-table-header');
const apptTableHeader = document.getElementById('appt-table-header');
subtabBtns.forEach(btn => {
  btn.addEventListener('click', function() {
    subtabBtns.forEach(b => {
      b.classList.remove('active');
      b.style.background = 'none';
      b.style.color = '#b91c1c';
      b.style.fontWeight = '600';
      b.style.boxShadow = 'none';
      b.style.border = 'none';
    });
    this.classList.add('active');
    this.style.background = '#fff';
    this.style.color = '#b91c1c';
    this.style.fontWeight = '700';
    this.style.boxShadow = '0 4px 16px rgba(185,28,28,0.10)';
    this.style.border = '1.5px solid #fff';
    this.style.borderBottom = 'none';
    // Show red table header for Prev Docs, black for others, and special for Advisors
    if (this.dataset.subtab === 'prev-docs') {
      prevDocsTable.style.display = '';
      blackTableHeader.style.display = 'none';
      advisorsTableHeader.style.display = 'none';
      labourTableHeader.style.display = 'none';
      partsTableHeader.style.display = 'none';
      apptTableHeader.style.display = 'none';
    } else if (this.dataset.subtab === 'prev-advisors') {
      prevDocsTable.style.display = 'none';
      blackTableHeader.style.display = 'none';
      advisorsTableHeader.style.display = '';
      labourTableHeader.style.display = 'none';
      partsTableHeader.style.display = 'none';
      apptTableHeader.style.display = 'none';
    } else if (this.dataset.subtab === 'prev-labour') {
      prevDocsTable.style.display = 'none';
      blackTableHeader.style.display = 'none';
      advisorsTableHeader.style.display = 'none';
      labourTableHeader.style.display = '';
      partsTableHeader.style.display = 'none';
      apptTableHeader.style.display = 'none';
    } else if (this.dataset.subtab === 'prev-parts') {
      prevDocsTable.style.display = 'none';
      blackTableHeader.style.display = 'none';
      advisorsTableHeader.style.display = 'none';
      labourTableHeader.style.display = 'none';
      partsTableHeader.style.display = '';
      apptTableHeader.style.display = 'none';
    } else if (this.dataset.subtab === 'prev-appt') {
      prevDocsTable.style.display = 'none';
      blackTableHeader.style.display = 'none';
      advisorsTableHeader.style.display = 'none';
      labourTableHeader.style.display = 'none';
      partsTableHeader.style.display = 'none';
      apptTableHeader.style.display = '';
    } else {
      prevDocsTable.style.display = 'none';
      blackTableHeader.style.display = '';
      advisorsTableHeader.style.display = 'none';
      labourTableHeader.style.display = 'none';
      partsTableHeader.style.display = 'none';
      apptTableHeader.style.display = 'none';
    }
  });
});

document.getElementById('openWorkDescriptionsModal').onclick = function() {
  document.getElementById('workDescriptionsModal').style.display = 'flex';
};
document.getElementById('closeWorkDescriptionsModal').onclick = function() {
  document.getElementById('workDescriptionsModal').style.display = 'none';
};

// Work Descriptions Modal Logic
let workDescriptions = [];
let selectedWorkDesc = null;
const workDescList = document.getElementById('workDescList');
const workDescName = document.getElementById('workDescName');
const workDescText = document.getElementById('workDescText');
const workDescNewBtn = document.getElementById('workDescNewBtn');
const workDescCloseBtn = document.getElementById('workDescCloseBtn');

function renderWorkDescList() {
  workDescList.innerHTML = '';
  workDescriptions.forEach((desc, idx) => {
    const row = document.createElement('div');
    row.style.display = 'flex';
    row.style.alignItems = 'center';
    row.style.justifyContent = 'space-between';
    row.style.padding = '12px 16px';
    row.style.margin = '8px 12px';
    row.style.borderRadius = '12px';
    row.style.fontWeight = '600';
    row.style.color = '#1f2937';
    row.style.cursor = 'pointer';
    row.style.transition = 'all 0.3s ease';
    row.style.position = 'relative';
    row.style.overflow = 'hidden';
    row.style.background = 'rgba(255,255,255,0.8)';
    row.style.border = '2px solid transparent';
    row.style.boxShadow = '0 2px 8px rgba(0,0,0,0.05), inset 0 1px 0 rgba(255,255,255,0.8)';
    
    if (selectedWorkDesc === idx) {
      row.style.background = 'linear-gradient(135deg, #b91c1c 0%, #dc2626 100%)';
      row.style.color = '#fff';
      row.style.border = '2px solid #b91c1c';
      row.style.boxShadow = '0 4px 16px rgba(185,28,28,0.3), inset 0 1px 0 rgba(255,255,255,0.2)';
      row.style.transform = 'translateX(4px) scale(1.02)';
    }
    
    // Add hover effects
    row.onmouseover = function() {
      if (selectedWorkDesc !== idx) {
        this.style.background = 'linear-gradient(135deg, #fef2f2 0%, #fee2e2 100%)';
        this.style.border = '2px solid #b91c1c';
        this.style.transform = 'translateX(4px) scale(1.01)';
        this.style.boxShadow = '0 4px 12px rgba(185,28,28,0.15), inset 0 1px 0 rgba(255,255,255,0.9)';
      }
    };
    
    row.onmouseout = function() {
      if (selectedWorkDesc !== idx) {
        this.style.background = 'rgba(255,255,255,0.8)';
        this.style.border = '2px solid transparent';
        this.style.transform = 'translateX(0) scale(1)';
        this.style.boxShadow = '0 2px 8px rgba(0,0,0,0.05), inset 0 1px 0 rgba(255,255,255,0.8)';
      }
    };
    
    row.onclick = () => selectWorkDesc(idx);
    
    // Add a subtle glow effect for selected items
    if (selectedWorkDesc === idx) {
      const glow = document.createElement('div');
      glow.style.position = 'absolute';
      glow.style.top = '0';
      glow.style.left = '0';
      glow.style.right = '0';
      glow.style.bottom = '0';
      glow.style.background = 'radial-gradient(circle at center, rgba(185,28,28,0.1) 0%, transparent 70%)';
      glow.style.pointerEvents = 'none';
      glow.style.borderRadius = '12px';
      row.appendChild(glow);
    }
    
    const nameSpan = document.createElement('span');
    nameSpan.textContent = desc.name || '(Untitled)';
    nameSpan.style.fontSize = '1.05em';
    nameSpan.style.fontWeight = selectedWorkDesc === idx ? '700' : '600';
    nameSpan.style.textShadow = selectedWorkDesc === idx ? '0 1px 2px rgba(0,0,0,0.3)' : 'none';
    row.appendChild(nameSpan);
    
    const delBtn = document.createElement('button');
    delBtn.innerHTML = '<i class="fas fa-trash-alt"></i>';
    delBtn.style.background = selectedWorkDesc === idx ? 'rgba(255,255,255,0.2)' : 'rgba(185,28,28,0.1)';
    delBtn.style.border = 'none';
    delBtn.style.borderRadius = '8px';
    delBtn.style.color = selectedWorkDesc === idx ? '#fff' : '#b91c1c';
    delBtn.style.fontSize = '0.9em';
    delBtn.style.fontWeight = '700';
    delBtn.style.cursor = 'pointer';
    delBtn.style.marginLeft = '8px';
    delBtn.style.padding = '6px 8px';
    delBtn.style.transition = 'all 0.2s ease';
    delBtn.style.display = 'flex';
    delBtn.style.alignItems = 'center';
    delBtn.style.justifyContent = 'center';
    delBtn.style.width = '28px';
    delBtn.style.height = '28px';
    
    delBtn.onmouseover = function() {
      this.style.background = selectedWorkDesc === idx ? 'rgba(255,255,255,0.3)' : 'rgba(185,28,28,0.2)';
      this.style.transform = 'scale(1.1)';
    };
    
    delBtn.onmouseout = function() {
      this.style.background = selectedWorkDesc === idx ? 'rgba(255,255,255,0.2)' : 'rgba(185,28,28,0.1)';
      this.style.transform = 'scale(1)';
    };
    
    delBtn.onclick = (e) => { e.stopPropagation(); removeWorkDesc(idx); };
    row.appendChild(delBtn);
    workDescList.appendChild(row);
  });
}
function selectWorkDesc(idx) {
  selectedWorkDesc = idx;
  workDescName.value = workDescriptions[idx].name;
  workDescText.value = workDescriptions[idx].desc;
  renderWorkDescList();
}
function removeWorkDesc(idx) {
  workDescriptions.splice(idx, 1);
  if (selectedWorkDesc === idx) {
    selectedWorkDesc = null;
    workDescName.value = '';
    workDescText.value = '';
  } else if (selectedWorkDesc > idx) {
    selectedWorkDesc--;
  }
  renderWorkDescList();
}
workDescNewBtn.onclick = function() {
  // Save current if filled
  if (workDescName.value.trim() || workDescText.value.trim()) {
    if (selectedWorkDesc !== null) {
      workDescriptions[selectedWorkDesc] = { name: workDescName.value, desc: workDescText.value };
    } else {
      workDescriptions.push({ name: workDescName.value, desc: workDescText.value });
      selectedWorkDesc = workDescriptions.length - 1;
    }
  }
  // Start new
  workDescriptions.push({ name: '', desc: '' });
  selectedWorkDesc = workDescriptions.length - 1;
  workDescName.value = '';
  workDescText.value = '';
  renderWorkDescList();
};
workDescName.oninput = function() {
  if (selectedWorkDesc !== null) {
    workDescriptions[selectedWorkDesc].name = workDescName.value;
    renderWorkDescList();
  }
};
workDescText.oninput = function() {
  if (selectedWorkDesc !== null) {
    workDescriptions[selectedWorkDesc].desc = workDescText.value;
  }
};
function openWorkDescriptionsModal() {
  document.getElementById('workDescriptionsModal').style.display = 'flex';
  if (workDescriptions.length === 0) {
    workDescriptions.push({ name: '', desc: '' });
    selectedWorkDesc = 0;
  }
  workDescName.value = workDescriptions[selectedWorkDesc].name;
  workDescText.value = workDescriptions[selectedWorkDesc].desc;
  renderWorkDescList();
}
document.getElementById('openWorkDescriptionsModal').onclick = openWorkDescriptionsModal;
document.getElementById('closeWorkDescriptionsModal').onclick = function() {
  document.getElementById('workDescriptionsModal').style.display = 'none';
};
workDescCloseBtn.onclick = function() {
  document.getElementById('workDescriptionsModal').style.display = 'none';
};

// --- Labour Tab Logic ---
const technicians = [ { abbr: 'TT', name: 'Rashid' } ];
const vatOptions = [
  { code: 'T0', label: 'VAT FREE 0%', rate: 0 },
  { code: 'T1', label: 'EXC VAT 20%', rate: 0.2 },
  { code: 'T2', label: 'CUSTOM 30%', rate: 0.3 }
];
let labourRows = [
  { description: 'Description - 1', tech: 'TT', qty: 5, unitPrice: 50.00, discount: 0, vat: 'T1' },
  { description: 'Description - 2', tech: 'TT', qty: '', unitPrice: '', discount: '', vat: 'T1' }
];
function calcSubTotal(row) {
  let qty = parseFloat(row.qty) || 0;
  let price = parseFloat(row.unitPrice) || 0;
  let disc = parseFloat(row.discount) || 0;
  let vat = vatOptions.find(v => v.code === row.vat)?.rate || 0;
  let subtotal = qty * price * (1 - disc/100) * (1 + vat);
  return subtotal ? subtotal.toFixed(2) : '0.00';
}
function renderLabourRows() {
  const tbody = document.getElementById('labourTableBody');
  tbody.innerHTML = '';
  labourRows.forEach((row, idx) => {
    const tr = document.createElement('tr');
    tr.style.background = idx % 2 === 0 ? '#fff' : '#f9f9f9';
    // Checkbox (now first/leftmost)
    const tdCheck = document.createElement('td');
    const cb = document.createElement('input');
    cb.type = 'checkbox';
    cb.style.accentColor = '#b91c1c';
    cb.onchange = updateLabourActionBar; // Attach onchange immediately
    tdCheck.appendChild(cb);
    tr.appendChild(tdCheck);
    // Arrow (now after checkbox)
    const tdArrow = document.createElement('td');
    const btnArrow = document.createElement('button');
    btnArrow.title = 'Move';
    btnArrow.innerHTML = '<span style="color:#b91c1c; font-size:1.2em; font-weight:bold; display:inline-block; transform:translateY(-1px);">&#8593;</span>';
    btnArrow.style.background = 'none';
    btnArrow.style.border = 'none';
    btnArrow.style.cursor = 'pointer';
    btnArrow.onclick = function() {
      if (idx === 0 && labourRows.length > 1) {
        // At top, move down
        const temp = labourRows[idx+1];
        labourRows[idx+1] = labourRows[idx];
        labourRows[idx] = temp;
      } else if (idx > 0) {
        // Not at top, move up
        const temp = labourRows[idx-1];
        labourRows[idx-1] = labourRows[idx];
        labourRows[idx] = temp;
      }
      renderLabourRows();
    };
    tdArrow.appendChild(btnArrow);
    tr.appendChild(tdArrow);
    // Description
    const tdDesc = document.createElement('td');
    const inpDesc = document.createElement('input');
    inpDesc.type = 'text';
    inpDesc.value = row.description;
    inpDesc.style.width = '100%';
    inpDesc.style.border = 'none';
    inpDesc.style.background = 'transparent';
    inpDesc.style.color = '#232323';
    inpDesc.style.fontSize = '1em';
    inpDesc.style.padding = '6px 4px';
    inpDesc.oninput = function() { row.description = this.value; };
    tdDesc.appendChild(inpDesc);
    tr.appendChild(tdDesc);
    // Tech (abbreviation display, full dropdown on focus)
    const tdTech = document.createElement('td');
    let techDisplay = document.createElement('span');
    techDisplay.textContent = row.tech;
    techDisplay.style.cursor = 'pointer';
    techDisplay.onclick = function() {
      techDisplay.style.display = 'none';
      selTech.style.display = '';
      selTech.focus();
    };
    const selTech = document.createElement('select');
    selTech.style.width = '100%';
    selTech.style.border = 'none';
    selTech.style.background = 'transparent';
    selTech.style.color = '#232323';
    selTech.style.display = 'none';
    technicians.forEach(t => {
      const opt = document.createElement('option');
      opt.value = t.abbr;
      opt.textContent = `${t.abbr} - ${t.name}`;
      if (row.tech === t.abbr) opt.selected = true;
      selTech.appendChild(opt);
    });
    selTech.onchange = function() { row.tech = this.value; renderLabourRows(); };
    selTech.onblur = function() {
      selTech.style.display = 'none';
      techDisplay.textContent = row.tech;
      techDisplay.style.display = '';
    };
    tdTech.appendChild(techDisplay);
    tdTech.appendChild(selTech);
    tr.appendChild(tdTech);
    // Qty
    const tdQty = document.createElement('td');
    const inpQty = document.createElement('input');
    inpQty.type = 'number';
    inpQty.value = row.qty;
    inpQty.style.width = '48px';
    inpQty.style.border = 'none';
    inpQty.style.background = 'transparent';
    inpQty.style.color = '#232323';
    inpQty.style.textAlign = 'center';
    inpQty.oninput = function() { row.qty = this.value; renderLabourRows(); };
    tdQty.appendChild(inpQty);
    tr.appendChild(tdQty);
    // Unit Price
    const tdPrice = document.createElement('td');
    const inpPrice = document.createElement('input');
    inpPrice.type = 'number';
    inpPrice.value = row.unitPrice;
    inpPrice.style.width = '70px';
    inpPrice.style.border = 'none';
    inpPrice.style.background = 'transparent';
    inpPrice.style.color = '#232323';
    inpPrice.style.textAlign = 'right';
    inpPrice.oninput = function() { row.unitPrice = this.value; renderLabourRows(); };
    tdPrice.appendChild(inpPrice);
    tr.appendChild(tdPrice);
    // Discount
    const tdDisc = document.createElement('td');
    const inpDisc = document.createElement('input');
    inpDisc.type = 'number';
    inpDisc.value = row.discount;
    inpDisc.style.width = '40px';
    inpDisc.style.border = 'none';
    inpDisc.style.background = 'transparent';
    inpDisc.style.color = '#232323';
    inpDisc.style.textAlign = 'center';
    inpDisc.oninput = function() { row.discount = this.value; renderLabourRows(); };
    tdDisc.appendChild(inpDisc);
    tr.appendChild(tdDisc);
    // VAT (percent display, full dropdown on focus)
    const tdVat = document.createElement('td');
    let vatObj = vatOptions.find(v => v.code === row.vat);
    let vatDisplay = document.createElement('span');
    vatDisplay.textContent = vatObj ? Math.round(vatObj.rate*100) + '%' : '';
    vatDisplay.style.cursor = 'pointer';
    vatDisplay.onclick = function() {
      vatDisplay.style.display = 'none';
      selVat.style.display = '';
      selVat.focus();
    };
    const selVat = document.createElement('select');
    selVat.style.width = '100%';
    selVat.style.border = 'none';
    selVat.style.background = 'transparent';
    selVat.style.color = '#232323';
    selVat.style.display = 'none';
    vatOptions.forEach(v => {
      const opt = document.createElement('option');
      opt.value = v.code;
      opt.textContent = v.label;
      if (row.vat === v.code) opt.selected = true;
      selVat.appendChild(opt);
    });
    selVat.onchange = function() { row.vat = this.value; renderLabourRows(); };
    selVat.onblur = function() {
      selVat.style.display = 'none';
      let vatObj2 = vatOptions.find(v => v.code === row.vat);
      vatDisplay.textContent = vatObj2 ? Math.round(vatObj2.rate*100) + '%' : '';
      vatDisplay.style.display = '';
    };
    tdVat.appendChild(vatDisplay);
    tdVat.appendChild(selVat);
    tr.appendChild(tdVat);
    // SubTotal
    const tdSub = document.createElement('td');
    tdSub.style.textAlign = 'right';
    tdSub.style.paddingRight = '10px';
    tdSub.textContent = calcSubTotal(row);
    tr.appendChild(tdSub);
    tbody.appendChild(tr);
  });
  // Update global discount
  let total = labourRows.reduce((sum, row) => sum + parseFloat(calcSubTotal(row)), 0);
  document.getElementById('globalDiscountTotal').textContent = total.toFixed(2);
  // Always update action bar after rendering
  updateLabourActionBar();
}
document.getElementById('jobLookupRow').onclick = function() {
  labourRows.push({ description: '', tech: technicians[0].abbr, qty: 1, unitPrice: 50.00, discount: 0, vat: 'T1' });
  renderLabourRows();
};
renderLabourRows();

// Add logic for select all and move descend
setTimeout(function() {
  const selectAll = document.getElementById('selectAllLabourRows');
  if (selectAll) {
    selectAll.onclick = function() {
      const tbody = document.getElementById('labourTableBody');
      const checkboxes = tbody.querySelectorAll('input[type=checkbox]');
      checkboxes.forEach(cb => { cb.checked = selectAll.checked; });
    };
  }
  const moveDescendBtn = document.getElementById('moveDescendBtn');
  if (moveDescendBtn) {
    moveDescendBtn.onclick = function() {
      if (labourRows.length > 1) {
        const last = labourRows.pop();
        labourRows.unshift(last);
        renderLabourRows();
      }
    };
  }
}, 10);

// After renderLabourRows();
function updateLabourActionBar() {
  const tbody = document.getElementById('labourTableBody');
  const checkboxes = tbody.querySelectorAll('input[type=checkbox]');
  const anyChecked = Array.from(checkboxes).some(cb => cb.checked);
  const bar = document.getElementById('labourActionBar');
  if (bar) bar.style.display = anyChecked ? '' : 'none';
  // Update select-all checkbox state
  const selectAll = document.getElementById('selectAllLabourRows');
  if (selectAll) {
    const allChecked = checkboxes.length > 0 && Array.from(checkboxes).every(cb => cb.checked);
    selectAll.checked = allChecked;
    // Indeterminate state for partial selection
    selectAll.indeterminate = !allChecked && anyChecked;
  }
}
// Patch all checkboxes to update the bar on change
setTimeout(function() {
  const tbody = document.getElementById('labourTableBody');
  const checkboxes = tbody.querySelectorAll('input[type=checkbox]');
  checkboxes.forEach(cb => {
    cb.onchange = updateLabourActionBar;
  });
  updateLabourActionBar();
}, 20);
// Add logic for action bar buttons
setTimeout(function() {
  const delBtn = document.getElementById('deleteMarkedLabourBtn');
  if (delBtn) {
    delBtn.onclick = function() {
      const tbody = document.getElementById('labourTableBody');
      const checkboxes = tbody.querySelectorAll('input[type=checkbox]');
      let toDelete = [];
      checkboxes.forEach((cb, i) => { if (cb.checked) toDelete.push(i); });
      // Remove from end to avoid index shift
      toDelete.reverse().forEach(idx => labourRows.splice(idx, 1));
      renderLabourRows();
      updateLabourActionBar();
    };
  }
  const moveBtn = document.getElementById('moveMarkedLabourBtn');
  if (moveBtn) {
    moveBtn.onclick = function() {
      // For now, just clear selection
      const tbody = document.getElementById('labourTableBody');
      const checkboxes = tbody.querySelectorAll('input[type=checkbox]');
      checkboxes.forEach(cb => { cb.checked = false; });
      updateLabourActionBar();
      // You can add your own logic for moving to estimate here
    };
  }
}, 30);

// --- Parts Tab Logic ---
const vatOptionsParts = [
  { code: 'T0', label: 'VAT FREE 0%', rate: 0 },
  { code: 'T1', label: 'EXC VAT 20%', rate: 0.2 },
  { code: 'T2', label: 'CUSTOM 30%', rate: 0.3 }
];
let partsRows = [
  { partNumber: '1001', description: 'Part Name here', cost: true, qty: 1, unitPrice: 5000.00, discount: 10, vat: 'T1' },
  { partNumber: '1002', description: 'Part Name here', cost: true, qty: 1, unitPrice: '', discount: '', vat: 'T1' },
  { partNumber: '1003', description: 'Part Name here', cost: true, qty: 1, unitPrice: '', discount: '', vat: 'T1' }
];
function calcPartsSubTotal(row) {
  let qty = parseFloat(row.qty) || 0;
  let price = parseFloat(row.unitPrice) || 0;
  let disc = parseFloat(row.discount) || 0;
  let vat = vatOptionsParts.find(v => v.code === row.vat)?.rate || 0;
  let subtotal = qty * price * (1 - disc/100) * (1 + vat);
  return subtotal ? subtotal.toFixed(2) : '0.00';
}
function renderPartsRows() {
  const tbody = document.getElementById('partsTableBody');
  tbody.innerHTML = '';
  partsRows.forEach((row, idx) => {
    const tr = document.createElement('tr');
    tr.style.background = idx % 2 === 0 ? '#fff' : '#f9f9f9';
    // Checkbox
    const tdCheck = document.createElement('td');
    const cb = document.createElement('input');
    cb.type = 'checkbox';
    cb.style.accentColor = '#b91c1c';
    cb.onchange = updatePartsActionBar;
    tdCheck.appendChild(cb);
    tr.appendChild(tdCheck);
    // Arrow
    const tdArrow = document.createElement('td');
    const btnArrow = document.createElement('button');
    btnArrow.title = 'Move';
    btnArrow.innerHTML = '<span style="color:#b91c1c; font-size:1.2em; font-weight:bold; display:inline-block; transform:translateY(-1px);">&#8593;</span>';
    btnArrow.style.background = 'none';
    btnArrow.style.border = 'none';
    btnArrow.style.cursor = 'pointer';
    btnArrow.onclick = function() {
      if (idx === 0 && partsRows.length > 1) {
        const temp = partsRows[idx+1];
        partsRows[idx+1] = partsRows[idx];
        partsRows[idx] = temp;
      } else if (idx > 0) {
        const temp = partsRows[idx-1];
        partsRows[idx-1] = partsRows[idx];
        partsRows[idx] = temp;
      }
      renderPartsRows();
    };
    tdArrow.appendChild(btnArrow);
    tr.appendChild(tdArrow);
    // Part Number
    const tdPartNum = document.createElement('td');
    const inpPartNum = document.createElement('input');
    inpPartNum.type = 'text';
    inpPartNum.value = row.partNumber;
    inpPartNum.style.width = '100%';
    inpPartNum.style.border = 'none';
    inpPartNum.style.background = 'transparent';
    inpPartNum.style.color = '#232323';
    inpPartNum.style.fontSize = '1em';
    inpPartNum.style.padding = '6px 4px';
    inpPartNum.oninput = function() { row.partNumber = this.value; };
    tdPartNum.appendChild(inpPartNum);
    tr.appendChild(tdPartNum);
    // Description
    const tdDesc = document.createElement('td');
    const inpDesc = document.createElement('input');
    inpDesc.type = 'text';
    inpDesc.value = row.description;
    inpDesc.style.width = '100%';
    inpDesc.style.border = 'none';
    inpDesc.style.background = 'transparent';
    inpDesc.style.color = '#232323';
    inpDesc.style.fontSize = '1em';
    inpDesc.style.padding = '6px 4px';
    inpDesc.oninput = function() { row.description = this.value; };
    tdDesc.appendChild(inpDesc);
    tr.appendChild(tdDesc);
    // Cost (number input)
    const tdCost = document.createElement('td');
    const inpCost = document.createElement('input');
    inpCost.type = 'number';
    inpCost.value = row.cost;
    inpCost.style.width = '70px';
    inpCost.style.border = 'none';
    inpCost.style.background = 'transparent';
    inpCost.style.color = '#232323';
    inpCost.style.textAlign = 'right';
    inpCost.oninput = function() { row.cost = this.value; };
    tdCost.appendChild(inpCost);
    tr.appendChild(tdCost);
    // Qty
    const tdQty = document.createElement('td');
    const inpQty = document.createElement('input');
    inpQty.type = 'number';
    inpQty.value = row.qty;
    inpQty.style.width = '48px';
    inpQty.style.border = 'none';
    inpQty.style.background = 'transparent';
    inpQty.style.color = '#232323';
    inpQty.style.textAlign = 'center';
    inpQty.oninput = function() { row.qty = this.value; renderPartsRows(); };
    tdQty.appendChild(inpQty);
    tr.appendChild(tdQty);
    // Unit Price
    const tdPrice = document.createElement('td');
    const inpPrice = document.createElement('input');
    inpPrice.type = 'number';
    inpPrice.value = row.unitPrice;
    inpPrice.style.width = '70px';
    inpPrice.style.border = 'none';
    inpPrice.style.background = 'transparent';
    inpPrice.style.color = '#232323';
    inpPrice.style.textAlign = 'right';
    inpPrice.oninput = function() { row.unitPrice = this.value; renderPartsRows(); };
    tdPrice.appendChild(inpPrice);
    tr.appendChild(tdPrice);
    // Discount
    const tdDisc = document.createElement('td');
    const inpDisc = document.createElement('input');
    inpDisc.type = 'number';
    inpDisc.value = row.discount;
    inpDisc.style.width = '40px';
    inpDisc.style.border = 'none';
    inpDisc.style.background = 'transparent';
    inpDisc.style.color = '#232323';
    inpDisc.style.textAlign = 'center';
    inpDisc.oninput = function() { row.discount = this.value; renderPartsRows(); };
    tdDisc.appendChild(inpDisc);
    tr.appendChild(tdDisc);
    // VAT
    const tdVat = document.createElement('td');
    let vatObj = vatOptionsParts.find(v => v.code === row.vat);
    let vatDisplay = document.createElement('span');
    vatDisplay.textContent = vatObj ? Math.round(vatObj.rate*100) + '%' : '';
    vatDisplay.style.cursor = 'pointer';
    vatDisplay.onclick = function() {
      vatDisplay.style.display = 'none';
      selVat.style.display = '';
      selVat.focus();
    };
    const selVat = document.createElement('select');
    selVat.style.width = '100%';
    selVat.style.border = 'none';
    selVat.style.background = 'transparent';
    selVat.style.color = '#232323';
    selVat.style.display = 'none';
    vatOptionsParts.forEach(v => {
      const opt = document.createElement('option');
      opt.value = v.code;
      opt.textContent = v.label;
      if (row.vat === v.code) opt.selected = true;
      selVat.appendChild(opt);
    });
    selVat.onchange = function() { row.vat = this.value; renderPartsRows(); };
    selVat.onblur = function() {
      selVat.style.display = 'none';
      let vatObj2 = vatOptionsParts.find(v => v.code === row.vat);
      vatDisplay.textContent = vatObj2 ? Math.round(vatObj2.rate*100) + '%' : '';
      vatDisplay.style.display = '';
    };
    tdVat.appendChild(vatDisplay);
    tdVat.appendChild(selVat);
    tr.appendChild(tdVat);
    // SubTotal
    const tdSub = document.createElement('td');
    tdSub.style.textAlign = 'right';
    tdSub.style.paddingRight = '10px';
    tdSub.textContent = calcPartsSubTotal(row);
    tr.appendChild(tdSub);
    tbody.appendChild(tr);
  });
  // Update global discount
  let total = partsRows.reduce((sum, row) => sum + parseFloat(calcPartsSubTotal(row)), 0);
  document.getElementById('globalPartsDiscountTotal').textContent = total.toFixed(2);
  // Always update action bar after rendering
  updatePartsActionBar();
}
document.getElementById('partLookupRow').onclick = function() {
  partsRows.push({ partNumber: '', description: '', cost: true, qty: 1, unitPrice: 0.00, discount: 0, vat: 'T1' });
  renderPartsRows();
};
renderPartsRows();
// Add logic for select all and move descend
setTimeout(function() {
  const selectAll = document.getElementById('selectAllPartsRows');
  if (selectAll) {
    selectAll.onclick = function() {
      const tbody = document.getElementById('partsTableBody');
      const checkboxes = tbody.querySelectorAll('input[type=checkbox]');
      checkboxes.forEach(cb => { cb.checked = selectAll.checked; });
    };
  }
}, 10);
// After renderPartsRows();
function updatePartsActionBar() {
  const tbody = document.getElementById('partsTableBody');
  const checkboxes = tbody.querySelectorAll('input[type=checkbox]');
  const anyChecked = Array.from(checkboxes).some(cb => cb.checked);
  const bar = document.getElementById('partsActionBar');
  if (bar) bar.style.display = anyChecked ? '' : 'none';
  // Update select-all checkbox state
  const selectAll = document.getElementById('selectAllPartsRows');
  if (selectAll) {
    const allChecked = checkboxes.length > 0 && Array.from(checkboxes).every(cb => cb.checked);
    selectAll.checked = allChecked;
    selectAll.indeterminate = !allChecked && anyChecked;
  }
}
// Patch all checkboxes to update the bar on change
setTimeout(function() {
  const tbody = document.getElementById('partsTableBody');
  const checkboxes = tbody.querySelectorAll('input[type=checkbox]');
  checkboxes.forEach(cb => {
    cb.onchange = updatePartsActionBar;
  });
}, 20);
// Add logic for action bar buttons
setTimeout(function() {
  const delBtn = document.getElementById('deleteMarkedPartsBtn');
  if (delBtn) {
    delBtn.onclick = function() {
      const tbody = document.getElementById('partsTableBody');
      const checkboxes = tbody.querySelectorAll('input[type=checkbox]');
      let toDelete = [];
      checkboxes.forEach((cb, i) => { if (cb.checked) toDelete.push(i); });
      toDelete.reverse().forEach(idx => partsRows.splice(idx, 1));
      renderPartsRows();
      updatePartsActionBar();
    };
  }
  const moveBtn = document.getElementById('moveMarkedPartsBtn');
  if (moveBtn) {
    moveBtn.onclick = function() {
      const tbody = document.getElementById('partsTableBody');
      const checkboxes = tbody.querySelectorAll('input[type=checkbox]');
      checkboxes.forEach(cb => { cb.checked = false; });
      updatePartsActionBar();
    };
  }
}, 30);

// --- Advisories Tab Logic ---
let advisoriesRows = [
  { description: 'Sample 1', checked: false },
  { description: 'Sample 2', checked: false },
  { description: 'Sample 3', checked: false },
  { description: 'sample 4', checked: false }
];
function renderAdvisoriesRows() {
  const tbody = document.getElementById('advisoriesTableBody');
  tbody.innerHTML = '';
  advisoriesRows.forEach((row, idx) => {
    const tr = document.createElement('tr');
    tr.style.background = row.checked ? '#ffeaea' : (idx % 2 === 0 ? '#fff' : '#f9f9f9');
    // Checkbox
    const tdCheck = document.createElement('td');
    const cb = document.createElement('input');
    cb.type = 'checkbox';
    cb.checked = row.checked;
    cb.style.accentColor = '#b91c1c';
    cb.onchange = function() {
      row.checked = this.checked;
      renderAdvisoriesRows();
      updateAdvisorySelectAll();
    };
    tdCheck.appendChild(cb);
    tr.appendChild(tdCheck);
    // Drag handle
    const tdDrag = document.createElement('td');
    tdDrag.innerHTML = '<span style="color:#b91c1c; font-size:1.2em; font-weight:bold; display:inline-block; cursor:grab;">&#8597;</span>';
    tr.appendChild(tdDrag);
    // Description
    const tdDesc = document.createElement('td');
    const inpDesc = document.createElement('input');
    inpDesc.type = 'text';
    inpDesc.value = row.description;
    inpDesc.style.width = '100%';
    inpDesc.style.border = 'none';
    inpDesc.style.background = 'transparent';
    inpDesc.style.color = '#b91c1c';
    inpDesc.style.fontSize = '1em';
    inpDesc.style.padding = '6px 4px';
    inpDesc.oninput = function() { row.description = this.value; };
    tdDesc.appendChild(inpDesc);
    tr.appendChild(tdDesc);
    tbody.appendChild(tr);
  });
}
function updateAdvisorySelectAll() {
  const selectAll = document.getElementById('selectAllAdvisoryRows');
  if (!selectAll) return;
  const allChecked = advisoriesRows.length > 0 && advisoriesRows.every(row => row.checked);
  const anyChecked = advisoriesRows.some(row => row.checked);
  selectAll.checked = allChecked;
  selectAll.indeterminate = !allChecked && anyChecked;
}
document.getElementById('selectAllAdvisoryRows').onchange = function() {
  const checked = this.checked;
  advisoriesRows.forEach(row => row.checked = checked);
  renderAdvisoriesRows();
  updateAdvisorySelectAll();
};
// Add row on Enter
const advisoryAddInput = document.getElementById('advisoryAddInput');
advisoryAddInput.onkeydown = function(e) {
  if (e.key === 'Enter' && this.value.trim()) {
    advisoriesRows.push({ description: this.value.trim(), checked: false });
    this.value = '';
    renderAdvisoriesRows();
    updateAdvisorySelectAll();
  }
};
// Add row on icon click
const advisoryAddRow = document.getElementById('advisoryAddRow');
advisoryAddRow.querySelector('i').style.cursor = 'pointer';
advisoryAddRow.querySelector('i').onclick = function() {
  if (advisoryAddInput.value.trim()) {
    advisoriesRows.push({ description: advisoryAddInput.value.trim(), checked: false });
    advisoryAddInput.value = '';
    renderAdvisoriesRows();
    updateAdvisorySelectAll();
  }
};
renderAdvisoriesRows();
updateAdvisorySelectAll();

// --- Activity Tab Logic ---
let activityRows = [
  { when: '08/07/2025', docInfo: '12:51', user: 'Administrator', description: 'Document created', from: '', to: '' }
];
function renderActivityRows() {
  const tbody = document.getElementById('activityTableBody');
  const emptyState = document.getElementById('activityEmptyState');
  tbody.innerHTML = '';
  if (activityRows.length === 0) {
    emptyState.style.display = '';
    return;
  } else {
    emptyState.style.display = 'none';
  }
  activityRows.forEach((row, idx) => {
    const tr = document.createElement('tr');
    tr.style.background = idx % 2 === 0 ? '#fff' : '#fff4f4';
    tr.style.transition = 'background 0.18s';
    tr.onmouseover = function() { this.style.background = '#ffeaea'; };
    tr.onmouseout = function() { this.style.background = idx % 2 === 0 ? '#fff' : '#fff4f4'; };
    // When
    const tdWhen = document.createElement('td');
    tdWhen.textContent = row.when;
    tdWhen.style.padding = '12px 14px';
    tdWhen.style.textAlign = 'left';
    tr.appendChild(tdWhen);
    // Doc Info
    const tdDocInfo = document.createElement('td');
    tdDocInfo.textContent = row.docInfo;
    tdDocInfo.style.padding = '12px 14px';
    tdDocInfo.style.textAlign = 'center';
    tr.appendChild(tdDocInfo);
    // User
    const tdUser = document.createElement('td');
    tdUser.textContent = row.user;
    tdUser.style.padding = '12px 14px';
    tdUser.style.textAlign = 'center';
    tr.appendChild(tdUser);
    // Description (with icon)
    const tdDesc = document.createElement('td');
    tdDesc.style.padding = '12px 14px';
    tdDesc.style.textAlign = 'left';
    tdDesc.textContent = row.description;
    tr.appendChild(tdDesc);
    // From
    const tdFrom = document.createElement('td');
    tdFrom.textContent = row.from;
    tdFrom.style.padding = '12px 14px';
    tdFrom.style.textAlign = 'center';
    tr.appendChild(tdFrom);
    // To
    const tdTo = document.createElement('td');
    tdTo.textContent = row.to;
    tdTo.style.padding = '12px 14px';
    tdTo.style.textAlign = 'center';
    tr.appendChild(tdTo);
    tbody.appendChild(tr);
  });
}
renderActivityRows();
</script>

<style>
.estimate-modal {
  background: #fff;
  border-radius: 18px;
  box-shadow: 0 6px 32px 0 rgba(34,34,59,0.13);
  padding: 0;
  overflow: hidden;
}

.estimate-header {
  background: #f8f9fa;
  padding: 20px;
  border-bottom: 1px solid #e5e7eb;
}

.estimate-info {
  display: grid;
  grid-template-columns: 1fr 1fr 1fr;
  gap: 20px;
}

.estimate-form-section {
  margin-bottom: 32px;
}

.form-section-title {
  font-size: 1.2rem;
  font-weight: 600;
  color: #b91c1c;
  margin-bottom: 16px;
  padding-bottom: 8px;
  border-bottom: 2px solid #f3f4f6;
}

.form-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 20px;
}

.form-group {
  display: flex;
  flex-direction: column;
  gap: 6px;
}

.form-group.full-width {
  grid-column: 1 / -1;
}

.form-group label {
  font-weight: 600;
  color: #374151;
  font-size: 0.9rem;
}

.form-group input,
.form-group select,
.form-group textarea {
  padding: 10px 12px;
  border: 1.5px solid #e5e7eb;
  border-radius: 8px;
  font-size: 1rem;
  transition: border-color 0.2s;
}

.form-group input:focus,
.form-group select:focus,
.form-group textarea:focus {
  outline: none;
  border-color: #b91c1c;
}

.customer-input-group,
.vehicle-input-group {
  display: flex;
  gap: 8px;
}

.customer-input-group input,
.vehicle-input-group input {
  flex: 1;
}

.customer-input-group .search-btn,
.customer-input-group .add-btn,
.vehicle-input-group .search-btn {
  padding: 10px 12px;
  border: 1.5px solid #e5e7eb;
  border-radius: 8px;
  background: #fff;
  cursor: pointer;
  transition: all 0.2s;
}

.customer-input-group .search-btn:hover,
.customer-input-group .add-btn:hover,
.vehicle-input-group .search-btn:hover {
  border-color: #b91c1c;
  color: #b91c1c;
}

.services-parts-container {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 24px;
}

.estimate-table {
  width: 100%;
  border-collapse: collapse;
  margin-bottom: 16px;
}

.estimate-table th,
.estimate-table td {
  padding: 8px;
  border: 1px solid #e5e7eb;
  text-align: left;
}

.estimate-table th {
  background: #f8f9fa;
  font-weight: 600;
  font-size: 0.9rem;
}

.estimate-table input {
  width: 100%;
  padding: 4px 8px;
  border: 1px solid #d1d5db;
  border-radius: 4px;
  font-size: 0.9rem;
}

.add-row-btn {
  padding: 8px 16px;
  background: #b91c1c;
  color: #fff;
  border: none;
  border-radius: 6px;
  cursor: pointer;
  font-size: 0.9rem;
  transition: background 0.2s;
}

.add-row-btn:hover {
  background: #991b1b;
}

.remove-row-btn {
  padding: 4px 8px;
  background: #ef4444;
  color: #fff;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  font-size: 0.8rem;
}

.remove-row-btn:hover {
  background: #dc2626;
}

.totals-container {
  background: #f8f9fa;
  padding: 20px;
  border-radius: 8px;
}

.totals-row {
  display: flex;
  justify-content: space-between;
  padding: 8px 0;
  border-bottom: 1px solid #e5e7eb;
}

.total-row {
  font-weight: 600;
  font-size: 1.1rem;
  color: #b91c1c;
  border-bottom: none;
}

@media (max-width: 768px) {
  .estimate-info,
  .form-grid,
  .services-parts-container {
    grid-template-columns: 1fr;
    gap: 16px;
  }
  
  .customer-input-group,
  .vehicle-input-group {
    flex-direction: column;
  }
}

.notice-bar:hover {
  background: #a31a1a !important;
  box-shadow: 0 2px 8px rgba(185,28,28,0.13) !important;
}

/* Modern, unobtrusive scrollbars for modal */
.estimate-modal::-webkit-scrollbar {
  width: 10px;
  background: #f3f4f6;
  border-radius: 8px;
}
.estimate-modal::-webkit-scrollbar-thumb {
  background: #e5e7eb;
  border-radius: 8px;
}
.estimate-modal {
  scrollbar-width: thin;
  scrollbar-color: #e5e7eb #f3f4f6;
}

/* Extras Dropdown Styles */
.extras-dropdown {
  position: relative;
}

.extras-menu.show {
  opacity: 1;
  visibility: visible;
  transform: translateY(0);
}

.extras-option:hover {
  background: #f3f4f6;
}

.extras-option:last-child {
  border-bottom: none;
}

.extras-btn i:last-child {
  transition: transform 0.2s;
}

.extras-dropdown.active .extras-btn i:last-child {
  transform: rotate(180deg);
}

/* Ensure caret icon has smooth transition */
.fa-caret-down {
  transition: transform 0.2s ease;
}
</style>

<script>
// Helper functions to close dropdowns
function closeExtrasDropdown() {
  const extrasDropdown = document.querySelector('.extras-dropdown');
  const extrasMenu = document.getElementById('extrasMenu');
  const extrasCaret = document.getElementById('extrasCaret');
  
  if (extrasDropdown && extrasMenu) {
    extrasDropdown.classList.remove('active');
    extrasMenu.style.opacity = '0';
    extrasMenu.style.visibility = 'hidden';
    extrasMenu.style.transform = 'translateY(-8px)';
    if (extrasCaret) {
      extrasCaret.style.transform = 'rotate(0deg)';
    }
  }
}

function closeConvertDropdown() {
  const convertDropdown = document.querySelector('.convert-dropdown');
  const convertMenu = document.getElementById('convertMenu');
  const convertCaret = document.getElementById('convertCaret');
  
  if (convertDropdown && convertMenu) {
    convertDropdown.classList.remove('active');
    convertMenu.style.opacity = '0';
    convertMenu.style.visibility = 'hidden';
    convertMenu.style.transform = 'translateY(-8px)';
    if (convertCaret) {
      convertCaret.style.transform = 'rotate(0deg)';
    }
  }
}

// Simple Extras Dropdown Functions
function toggleExtrasDropdown(event) {
  event.stopPropagation();
  const extrasMenu = document.getElementById('extrasMenu');
  const extrasDropdown = document.querySelector('.extras-dropdown');
  const extrasCaret = document.getElementById('extrasCaret');
  
  if (extrasMenu && extrasDropdown) {
    const isActive = extrasDropdown.classList.contains('active');
    
    // Close convert dropdown first
    closeConvertDropdown();
    
    // Toggle active state
    extrasDropdown.classList.toggle('active');
    
    // Toggle menu visibility
    if (isActive) {
      extrasMenu.style.opacity = '0';
      extrasMenu.style.visibility = 'hidden';
      extrasMenu.style.transform = 'translateY(-8px)';
      if (extrasCaret) extrasCaret.style.transform = 'rotate(0deg)';
    } else {
      extrasMenu.style.opacity = '1';
      extrasMenu.style.visibility = 'visible';
      extrasMenu.style.transform = 'translateY(0)';
      if (extrasCaret) extrasCaret.style.transform = 'rotate(180deg)';
    }
  }
}

function handleExtrasAction(action) {
  console.log('Extras action clicked:', action);
  
  // Handle different actions
  switch(action) {
    case 'Print Preview':
      alert('Print Preview functionality will be implemented here');
      break;
    case 'Print Advisories':
      alert('Print Advisories functionality will be implemented here');
      break;
    case 'Save to PDF':
      alert('Save to PDF functionality will be implemented here');
      break;
    case 'Print Job Sheet':
      alert('Print Job Sheet functionality will be implemented here');
      break;
    case 'Print Checklist':
      alert('Print Checklist functionality will be implemented here');
      break;
  }
  
  // Close dropdown after action
  closeExtrasDropdown();
}

// Convert Dropdown Functions
function toggleConvertDropdown(event) {
  event.stopPropagation();
  const convertMenu = document.getElementById('convertMenu');
  const convertDropdown = document.querySelector('.convert-dropdown');
  const convertCaret = document.getElementById('convertCaret');
  
  if (convertMenu && convertDropdown) {
    const isVisible = convertMenu.style.visibility === 'visible';
    
    // Close extras dropdown first
    closeExtrasDropdown();
    
    if (isVisible) {
      // Close dropdown
      convertDropdown.classList.remove('active');
      convertMenu.style.opacity = '0';
      convertMenu.style.visibility = 'hidden';
      convertMenu.style.transform = 'translateY(-8px)';
      if (convertCaret) {
        convertCaret.style.transform = 'rotate(0deg)';
      }
    } else {
      // Open dropdown
      convertDropdown.classList.add('active');
      convertMenu.style.opacity = '1';
      convertMenu.style.visibility = 'visible';
      convertMenu.style.transform = 'translateY(0)';
      if (convertCaret) {
        convertCaret.style.transform = 'rotate(180deg)';
      }
    }
  }
}

function handleConvertAction(action) {
  console.log('Convert action clicked:', action);
  
  // Handle different convert actions
  switch(action) {
    case 'Convert to Job sheet':
      alert('Convert to Job sheet functionality will be implemented here');
      break;
    case 'Convert to Invoice':
      alert('Convert to Invoice functionality will be implemented here');
      break;
    case 'Copy to Appointment':
      alert('Copy to Appointment functionality will be implemented here');
      break;
  }
  
  // Close dropdown after action
  closeConvertDropdown();
}

// Close dropdown when clicking outside
document.addEventListener('click', function(e) {
  const extrasDropdown = document.querySelector('.extras-dropdown');
  const convertDropdown = document.querySelector('.convert-dropdown');
  
  // Close extras dropdown if clicking outside
  if (extrasDropdown && !extrasDropdown.contains(e.target)) {
    closeExtrasDropdown();
  }
  
  // Close convert dropdown if clicking outside
  if (convertDropdown && !convertDropdown.contains(e.target)) {
    closeConvertDropdown();
  }
});

// Modal open/close logic
function openNewEstimateModal() {
  document.getElementById('newEstimateModal').style.display = 'flex';
}
function closeNewEstimateModal() {
  document.getElementById('newEstimateModal').style.display = 'none';
}
document.addEventListener('DOMContentLoaded', function() {
  document.getElementById('closeNewEstimateModal').onclick = closeNewEstimateModal;
  // Open modal on New Estimate button click
  var newEstimateBtn = document.getElementById('main-action-btn');
  if (newEstimateBtn) {
    newEstimateBtn.onclick = openNewEstimateModal;
  }
  // Prevent closing modal by clicking backdrop
  document.querySelector('#newEstimateModal .modal-backdrop').onclick = function(e) {
    e.stopPropagation();
    return false;
  };
  document.getElementById('newEstimateModal').onclick = function(e) {
    if (e.target === this) {
      // Do nothing (disable click-to-close)
      e.stopPropagation();
      return false;
    }
  };
});
</script> 