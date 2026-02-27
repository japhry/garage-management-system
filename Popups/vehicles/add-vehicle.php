<?php
// Add Vehicle Modal
// This file contains the vehicle creation popup
// Include this file where needed using: include 'Popups/vehicles/add-vehicle.php';
?>

<!-- Add Vehicle Modal -->
<div id="addVehicleModal" class="modal-overlay" style="display: none; align-items: center; justify-content: center; z-index: 1200; background: rgba(0,0,0,0.18); transition: background 0.3s;">
  <div class="modal-backdrop" style="pointer-events: auto; background: transparent; box-shadow: none;"></div>
  <div class="modal-content vehicle-modal" style="max-width: 99vw; width: 1400px; min-width: 400px; max-height: 98vh; min-height: 600px; overflow: auto; border-radius: 18px; box-shadow: 0 6px 32px rgba(0,0,0,0.14); background: var(--white); border: 1.5px solid #e5e7eb; z-index: 1201; animation: modalPopIn 0.32s cubic-bezier(.4,1.6,.6,1) 1;">
    <!-- Toolbar -->
    <div class="modal-action-bar fancy-toolbar">
      <button class="modal-action-btn primary" id="saveVehicleBtn"><i class="fas fa-save"></i> Save</button>
      <div class="new-doc-container" style="display:inline-block; position:relative;">
        <button class="modal-action-btn" id="newDocBtn"><i class="fas fa-plus"></i> New Doc <i class="fas fa-caret-down" style="margin-left: 4px;"></i></button>
        <div id="newDocDropdown" class="new-doc-dropdown" style="display:none; position:absolute; left:0; top:110%; background:#fff; border:1.5px solid var(--accent-light); border-radius:10px; box-shadow:0 8px 24px rgba(236,32,37,0.13); z-index:10; min-width:140px;">
          <div class="dropdown-option" data-page="estimates.php">Estimate</div>
          <div class="dropdown-option" data-page="job-sheets.php">Job Sheet</div>
          <div class="dropdown-option" data-page="invoices.php">Invoice</div>
          <div class="dropdown-option" data-page="calendar.php">Appointment</div>
    </div>
      </div>
      <button class="modal-action-btn" id="selectOwnerBtn"><i class="fas fa-user"></i> Select Owner</button>
      <div class="print-container" style="display:inline-block; position:relative;">
        <button class="modal-action-btn" id="printBtn"><i class="fas fa-print"></i> Print <i class="fas fa-caret-down" style="margin-left: 4px;"></i></button>
        <div id="printDropdown" class="print-dropdown" style="display:none; position:absolute; left:0; top:110%; background:#fff; border:1.5px solid var(--accent-light); border-radius:10px; box-shadow:0 8px 24px rgba(236,32,37,0.13); z-index:10; min-width:140px;">
          <div class="dropdown-option">Vehicle Details</div>
          <div class="dropdown-option">Spec Sheet</div>
          <div class="dropdown-option">Reminder List</div>
        </div>
      </div>
      <div class="history-container" style="display:inline-block; position:relative;">
        <button class="modal-action-btn" id="historyBtn"><i class="fas fa-history"></i> History <i class="fas fa-caret-down" style="margin-left: 4px;"></i></button>
        <div id="historyDropdown" class="history-dropdown" style="display:none; position:absolute; left:0; top:110%; background:#fff; border:1.5px solid var(--accent-light); border-radius:10px; box-shadow:0 8px 24px rgba(236,32,37,0.13); z-index:10; min-width:140px;">
          <div class="dropdown-option">Preview</div>
          <div class="dropdown-option">Print</div>
          <div class="dropdown-option">Save to PDF</div>
          <div class="dropdown-option">Email</div>
        </div>
      </div>
      <button class="modal-action-btn"><i class="fas fa-paperclip"></i> Attachments</button>
      <button class="modal-action-btn"><i class="fas fa-database"></i> Tech Data</button>
      <div style="flex:1;"></div>
      <button class="modal-action-btn danger" id="deleteVehicleBtn"><i class="fas fa-trash"></i> Delete</button>
      <button class="modal-action-btn close-btn" id="closeAddVehicleModal" title="Close"><i class="fas fa-times"></i></button>
    </div>
    <!-- Main Content Grid -->
    <div class="modal-main-grid" style="display: flex; gap: 24px; padding: 28px 28px 0 28px; background: var(--white);">
      <!-- Left Main Form -->
      <div class="vehicle-main-form card-box" style="flex: 1 1 0; min-width: 0; background: #fff; border-radius: 14px; box-shadow: 0 2px 12px rgba(236,32,37,0.07); border: 1px solid var(--accent-light); padding: 16px 16px;">
        <div class="modal-scrollable-content" style="max-height: 70vh; overflow-y: auto;">
      <!-- Vehicle Registration Information -->
      <div class="vehicle-form-section">
        <h3 class="form-section-title">Vehicle Registration</h3>
            <form class="modern-vehicle-form">
              <div class="form-row registration-highlight" style="display: flex; align-items: flex-end; gap: 10px; flex-wrap: wrap; background: #f9f6f6; border: 1.5px solid var(--accent-light); border-radius: 8px; padding: 14px 18px 10px 18px; margin-bottom: 10px; box-shadow: 0 2px 8px rgba(236,32,37,0.04);">
                <div style="display: flex; flex-direction: column; flex: 1 1 180px; min-width: 140px;">
                  <label for="vehicle-registration" style="font-weight: 600; color: var(--accent-solid); margin-bottom: 2px;">Registration</label>
                  <input type="text" id="vehicle-registration" class="modern-input" placeholder="e.g. T123ABC" required style="width: 100%;">
          </div>
                <span style="color: var(--accent-solid); font-weight: 600; font-size: 1rem; margin-left: 8px; margin-bottom: 6px;">Required</span>
                <div style="display: flex; gap: 6px; margin-left: 18px;">
                  <button type="button" class="btn-secondary fancy-btn" style="padding: 7px 16px; font-size: 1rem; border-radius: 8px; background: #fff; color: var(--accent-solid); font-weight: 700; border: 1.5px solid var(--accent-light);"><i class="fas fa-search"></i> VRM Lookup</button>
                  <button type="button" class="btn-secondary fancy-btn" style="padding: 7px 16px; font-size: 1rem; border-radius: 8px; background: #fff; color: var(--accent-solid); font-weight: 700; border: 1.5px solid var(--accent-light);">VRM Transfer</button>
          </div>
          </div>
              <div class="vehicle-reg-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px 14px; margin-top: 12px;">
                <div>
                  <label>Make / Model</label>
                  <div style="display: flex; gap: 8px;">
                    <input id="vehicle-make" type="text" class="modern-input" placeholder="Make">
                    <input id="vehicle-model" type="text" class="modern-input" placeholder="Model">
          </div>
          </div>
                <div></div>
                <div><label>Derivative</label><input type="text" class="modern-input"></div>
                <div><label>Chassis Number</label><input type="text" class="modern-input"></div>
                <div><label>Engine CC</label><input type="text" class="modern-input"></div>
                <div><label>Fuel Type</label><input type="text" class="modern-input"></div>
                <div><label>Engine Code</label><input type="text" class="modern-input"></div>
                <div><label>Engine No</label><input type="text" class="modern-input"></div>
                <div><label>Colour</label><input type="text" class="modern-input"></div>
                <div><label>Paint Code</label><input type="text" class="modern-input"></div>
                <div><label>Key Code</label><input type="text" class="modern-input"></div>
                <div><label>Radio Code</label><input type="text" class="modern-input"></div>
                <div><label>Date Manufactured</label><input type="date" class="modern-input"></div>
                <div><label>Date Reg</label><input type="date" class="modern-input"></div>
          </div>
              <hr class="modern-divider" style="margin: 22px 0 16px 0;">
              <div class="tyre-row" style="display: flex; gap: 32px; align-items: flex-start; flex-wrap: wrap;">
                <div style="flex:1; min-width: 220px;">
                  <label>Tyre Size</label>
                  <div style="display: flex; gap: 8px;">
                    <div style="flex:1;">
                      <span style="font-size: 0.95rem; color: #888;">Front</span>
                      <input type="text" class="modern-input" placeholder="">
        </div>
                    <div style="flex:1;">
                      <span style="font-size: 0.95rem; color: #888;">Rear</span>
                      <input type="text" class="modern-input" placeholder="">
      </div>
          </div>
          </div>
                <div style="flex:1; min-width: 220px;">
                  <label>Tyre Depth</label>
                  <div style="display: flex; gap: 8px;">
                    <div style="flex:1;">
                      <span style="font-size: 0.95rem; color: #888;">Front</span>
                      <input type="text" class="modern-input" placeholder="">
          </div>
                    <div style="flex:1;">
                      <span style="font-size: 0.95rem; color: #888;">Rear</span>
                      <input type="text" class="modern-input" placeholder="">
          </div>
          </div>
          </div>
        </div>
            </form>
      </div>
            </div>
          </div>
      <!-- Right Sidebar (optional for future tabs/notes) -->
      <div class="vehicle-sidebar card-box" style="flex: 1 1 0; min-width: 0; background: #fff; border-radius: 14px; box-shadow: 0 2px 12px rgba(236,32,37,0.04); border: 1px solid var(--accent-light); padding: 18px 18px;">
        <!-- Tabs -->
        <div class="vehicle-tabs" style="display: flex; gap: 0; margin-bottom: 18px;">
          <button class="tab-btn active" data-tab="general" style="flex:1; border-radius: 8px 0 0 8px;">General</button>
          <button class="tab-btn" data-tab="specs" style="flex:1;">Specs</button>
          <button class="tab-btn" data-tab="extra" style="flex:1;">Extra</button>
          <button class="tab-btn" data-tab="features" style="flex:1;">Features</button>
          <button class="tab-btn" data-tab="notes" style="flex:1; border-radius: 0 8px 8px 0;">Notes</button>
        </div>
        <!-- Tab Contents -->
        <div class="vehicle-tab-content" id="vehicle-tab-general">
          <!-- Owner Section -->
          <div class="owner-section" style="margin-bottom: 18px;">
            <label style="font-weight: 600; color: var(--accent-solid);">Owner</label>
            <div style="display: flex; gap: 8px; margin: 8px 0 14px 0;">
              <button class="btn-secondary fancy-btn" style="padding: 7px 16px; font-size: 1rem; border-radius: 8px; background: #fff; color: var(--accent-solid); font-weight: 700; border: 1.5px solid var(--accent-light);">Select Owner</button>
              <button class="btn-secondary fancy-btn" style="padding: 7px 16px; font-size: 1rem; border-radius: 8px; background: #fff; color: var(--accent-solid); font-weight: 700; border: 1.5px solid var(--accent-light);">Change Owner</button>
              <button class="btn-secondary fancy-btn" style="padding: 7px 16px; font-size: 1rem; border-radius: 8px; background: #fff; color: var(--accent-solid); font-weight: 700; border: 1.5px solid var(--accent-light);">Remove Owner</button>
            </div>
            <div style="display: flex; flex-direction: column; gap: 8px; margin-bottom: 10px;">
              <input id="vehicle-owner-acc" type="text" class="modern-input" placeholder="Acc Number">
              <input id="vehicle-owner-name" type="text" class="modern-input" placeholder="Name">
              <input type="text" class="modern-input" placeholder="Telephone">
              <input type="text" class="modern-input" placeholder="Mobile">
            </div>
          </div>
          <hr class="modern-divider" style="margin: 18px 0 14px 0;">
          <!-- Checklist -->
          <div class="vehicle-checklist-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px 32px;">
            <label class="checklist-item"><input type="checkbox" class="modern-checkbox"> Air Conditioning</label>
            <label class="checklist-item"><input type="checkbox" class="modern-checkbox"> Solid Discs</label>
            <label class="checklist-item"><input type="checkbox" class="modern-checkbox"> Power Steering</label>
            <label class="checklist-item"><input type="checkbox" class="modern-checkbox"> Vented Discs</label>
            <label class="checklist-item"><input type="checkbox" class="modern-checkbox"> ABS Brakes</label>
            <label class="checklist-item"><input type="checkbox" class="modern-checkbox"> Rear Shoes & Cylinders</label>
            <label class="checklist-item"><input type="checkbox" class="modern-checkbox"> Traction Control</label>
            <label class="checklist-item"><input type="checkbox" class="modern-checkbox"> Rear Discs</label>
            <label class="checklist-item"><input type="checkbox" class="modern-checkbox"> Pollen Filter</label>
            <label class="checklist-item"><input type="checkbox" class="modern-checkbox"> Timing Chain</label>
          </div>
        </div>
        <div class="vehicle-tab-content" id="vehicle-tab-specs" style="display:none;">
          <form class="specs-form" style="margin-top: 8px;">
            <div class="specs-grid" style="display: grid; grid-template-columns: 1.2fr 1.2fr 1fr; gap: 12px 18px; align-items: end;">
              <!-- Row 1 -->
              <div>
                <label>Origin</label>
                <input type="text" class="modern-input">
              </div>
              <div>
                <label>Model Series</label>
                <input type="text" class="modern-input">
              </div>
              <div>
                <label>Seats</label>
                <input type="text" class="modern-input">
              </div>
              <!-- Row 2 -->
              <div style="grid-column: 1 / span 2;">
                <label>Body Style</label>
                <input type="text" class="modern-input">
              </div>
              <div>
                <label></label>
                <input type="text" class="modern-input" style="opacity:0; pointer-events:none;">
              </div>
              <!-- Row 3 -->
              <div>
                <label>Gears</label>
                <input type="text" class="modern-input">
              </div>
              <div style="grid-row: span 2; display: flex; flex-direction: column; gap: 8px;">
                <div>
                  <label>Transmission</label>
                  <input type="text" class="modern-input">
                </div>
                <div>
                  <label>Drive Type</label>
                  <input type="text" class="modern-input">
                </div>
              </div>
              <div>
                <label>Drive Axle</label>
                <input type="text" class="modern-input">
              </div>
              <!-- Row 4 -->
              <div style="grid-column: 1 / span 3;">
                <label>Fuel Delivery</label>
                <input type="text" class="modern-input">
              </div>
              <!-- Row 5 -->
              <div style="grid-column: 1 / span 3;">
                <label>Aspiration</label>
                <input type="text" class="modern-input">
              </div>
              <!-- Row 6 -->
              <div>
                <label>Cylinders</label>
                <input type="text" class="modern-input">
              </div>
              <div>
                <label>Valves per Cyl</label>
                <input type="text" class="modern-input">
              </div>
              <div>
                <label>Bore</label>
                <input type="text" class="modern-input">
              </div>
              <!-- Row 7 -->
              <div>
                <label>Kerb Weight Min</label>
                <input type="text" class="modern-input">
              </div>
              <div>
                <label>Height mm</label>
                <input type="text" class="modern-input">
              </div>
              <div></div>
              <!-- Row 8: Max/Width/Gross/Roof -->
              <div>
                <label>Max</label>
                <input type="text" class="modern-input">
      </div>
              <div>
                <label>Width</label>
                <input type="text" class="modern-input">
          </div>
              <div>
                <label>Gross</label>
                <input type="text" class="modern-input">
          </div>
              <div>
                <label>Roof</label>
                <input type="text" class="modern-input">
          </div>
          </div>
          </form>
        </div>
        <div class="vehicle-tab-content" id="vehicle-tab-extra" style="display:none;">
          <form class="extra-form" style="margin-top: 8px;">
            <div class="extra-grid" style="display: grid; grid-template-columns: 1.1fr 2fr 1.1fr 1fr; gap: 10px 14px; align-items: end;">
              <!-- Row 1 -->
              <div>
                <label>Combined</label>
                <input type="text" class="modern-input">
              </div>
              <div>
                <label>Urban</label>
                <input type="text" class="modern-input">
              </div>
              <div>
                <label>Cold</label>
                <input type="text" class="modern-input">
              </div>
              <div></div>
              <!-- Row 2 -->
              <div>
                <label>BHP</label>
                <input type="text" class="modern-input">
              </div>
              <div>
                <label>Torque</label>
                <input type="text" class="modern-input">
              </div>
              <div></div>
              <div></div>
              <!-- Row 3 -->
              <div>
                <label>Top Speed</label>
                <input type="text" class="modern-input">
              </div>
              <div>
                <label>0 - 60</label>
                <input type="text" class="modern-input">
              </div>
              <div>
                <label>CO2</label>
                <input type="text" class="modern-input">
              </div>
              <div></div>
            </div>
            <!-- Custom Fields: label left, input right, each on one line -->
            <div class="custom-fields-list" style="margin-top: 18px; display: flex; flex-direction: column; gap: 8px;">
              <div class="custom-field-row" style="display: flex; align-items: center; gap: 12px;">
                <label style="flex:1; min-width:120px; color: var(--accent-solid); font-weight: 500;">Custom Field 1</label>
                <input type="text" class="modern-input" style="flex:2;">
              </div>
              <div class="custom-field-row" style="display: flex; align-items: center; gap: 12px;">
                <label style="flex:1; min-width:120px; color: var(--accent-solid); font-weight: 500;">Custom Field 2</label>
                <input type="text" class="modern-input" style="flex:2;">
              </div>
              <div class="custom-field-row" style="display: flex; align-items: center; gap: 12px;">
                <label style="flex:1; min-width:120px; color: var(--accent-solid); font-weight: 500;">Custom Field 3</label>
                <input type="text" class="modern-input" style="flex:2;">
              </div>
              <div class="custom-field-row" style="display: flex; align-items: center; gap: 12px;">
                <label style="flex:1; min-width:120px; color: var(--accent-solid); font-weight: 500;">Custom Field 4</label>
                <input type="text" class="modern-input" style="flex:2;">
              </div>
              <div class="custom-field-row" style="display: flex; align-items: center; gap: 12px;">
                <label style="flex:1; min-width:120px; color: var(--accent-solid); font-weight: 500;">Custom Field 5</label>
                <input type="text" class="modern-input" style="flex:2;">
              </div>
              <div class="custom-field-row" style="display: flex; align-items: center; gap: 12px;">
                <label style="flex:1; min-width:120px; color: var(--accent-solid); font-weight: 500;">Custom Field 6</label>
                <input type="text" class="modern-input" style="flex:2;">
              </div>
              <div class="custom-field-row" style="display: flex; align-items: center; gap: 12px;">
                <label style="flex:1; min-width:120px; color: var(--accent-solid); font-weight: 500;">Custom Field 7</label>
                <input type="text" class="modern-input" style="flex:2;">
              </div>
              <div class="custom-field-row" style="display: flex; align-items: center; gap: 12px;">
                <label style="flex:1; min-width:120px; color: var(--accent-solid); font-weight: 500;">Custom Field 8</label>
                <input type="text" class="modern-input" style="flex:2;">
        </div>
      </div>
          </form>
        </div>
        <div class="vehicle-tab-content" id="vehicle-tab-features" style="display:none;">
          <form class="features-form" style="margin-top: 8px;">
            <div class="features-checklist-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px 32px;">
              <label class="checklist-item"><input type="checkbox" class="modern-checkbox"> ABS Brakes</label>
              <label class="checklist-item"><input type="checkbox" class="modern-checkbox"> Heated Screen</label>
              <label class="checklist-item"><input type="checkbox" class="modern-checkbox"> Airbag (Driver)</label>
              <label class="checklist-item"><input type="checkbox" class="modern-checkbox"> Heated Seats</label>
              <label class="checklist-item"><input type="checkbox" class="modern-checkbox"> Airbags (Multiple)</label>
              <label class="checklist-item"><input type="checkbox" class="modern-checkbox"> Isofix Seats</label>
              <label class="checklist-item"><input type="checkbox" class="modern-checkbox"> Alarm System</label>
              <label class="checklist-item"><input type="checkbox" class="modern-checkbox"> Immobiliser</label>
              <label class="checklist-item"><input type="checkbox" class="modern-checkbox"> Alloy Wheels</label>
              <label class="checklist-item"><input type="checkbox" class="modern-checkbox"> Lane Control System</label>
              <label class="checklist-item"><input type="checkbox" class="modern-checkbox"> Central Locking</label>
              <label class="checklist-item"><input type="checkbox" class="modern-checkbox"> Leather Interior</label>
              <label class="checklist-item"><input type="checkbox" class="modern-checkbox"> Climate Control</label>
              <label class="checklist-item"><input type="checkbox" class="modern-checkbox"> Light Sensors</label>
              <label class="checklist-item"><input type="checkbox" class="modern-checkbox"> Cruise Control</label>
              <label class="checklist-item"><input type="checkbox" class="modern-checkbox"> Parking Sensors</label>
              <label class="checklist-item"><input type="checkbox" class="modern-checkbox"> Onboard Computer</label>
              <label class="checklist-item"><input type="checkbox" class="modern-checkbox"> Power Steering</label>
              <label class="checklist-item"><input type="checkbox" class="modern-checkbox"> Electric Mirrors</label>
              <label class="checklist-item"><input type="checkbox" class="modern-checkbox"> Rain Sensors</label>
              <label class="checklist-item"><input type="checkbox" class="modern-checkbox"> Electric Windows</label>
              <label class="checklist-item"><input type="checkbox" class="modern-checkbox"> Remote Central Locking</label>
              <label class="checklist-item"><input type="checkbox" class="modern-checkbox"> Electric Seats</label>
              <label class="checklist-item"><input type="checkbox" class="modern-checkbox"> Traction Control</label>
              <label class="checklist-item"><input type="checkbox" class="modern-checkbox"> ESP Traction</label>
              <label class="checklist-item"><input type="checkbox" class="modern-checkbox"> Stability Control</label>
              <label class="checklist-item"><input type="checkbox" class="modern-checkbox"> Satellite Navigation</label>
              <label class="checklist-item"><input type="checkbox" class="modern-checkbox"> Speed Limiter</label>
              <label class="checklist-item"><input type="checkbox" class="modern-checkbox"> Sunroof (normal)</label>
              <label class="checklist-item"><input type="checkbox" class="modern-checkbox"> Sunroof (Panaromic)</label>
              <label class="checklist-item"><input type="checkbox" class="modern-checkbox"> Stop Start System</label>
              <label class="checklist-item"><input type="checkbox" class="modern-checkbox"> Towbar</label>
              <label class="checklist-item"><input type="checkbox" class="modern-checkbox"> Voice Control</label>
              <label class="checklist-item"><input type="checkbox" class="modern-checkbox"> Auxillary / USB Input</label>
              <label class="checklist-item"><input type="checkbox" class="modern-checkbox"> Bluetooth</label>
              <label class="checklist-item"><input type="checkbox" class="modern-checkbox"> CD Player</label>
              <label class="checklist-item"><input type="checkbox" class="modern-checkbox"> DVD System</label>
              <label class="checklist-item"><input type="checkbox" class="modern-checkbox"> MP3 Player</label>
            </div>
          </form>
        </div>
        <div class="vehicle-tab-content" id="vehicle-tab-notes" style="display:none;">
          <form class="notes-form" style="margin-top: 8px;">
            <div class="notes-grid" style="display: grid; grid-template-columns: 1.1fr 1.5fr; gap: 18px 24px; align-items: start;">
              <!-- Car Image -->
              <div style="background: #fff; border: 1.5px solid var(--accent-light); border-radius: 8px; padding: 8px; display: flex; align-items: center; justify-content: center; width: 220px; height: 220px; min-height: 180px;">
                <img src="Assets/img/vehicle.png" alt="Vehicle" style="max-width: 100%; max-height: 100%; display: block; margin: 0 auto;">
              </div>
              <!-- Notes Area -->
              <div style="width: 100%; height: 220px; min-height: 180px; display: flex; align-items: stretch;">
                <textarea rows="10" class="modern-input" style="width: 100%; height: 100%; background: #fffbe6; border: 1.5px solid var(--accent-light); border-radius: 8px; font-size: 1.05rem; font-family: inherit; line-height: 1.7; padding: 12px 14px; resize: vertical; box-sizing: border-box;"></textarea>
              </div>
            </div>
            <!-- Fields below -->
            <div class="notes-fields-below" style="margin-top: 18px; display: flex; flex-wrap: wrap; gap: 18px 32px; align-items: flex-end;">
              <div style="display: flex; align-items: center; gap: 10px; min-width: 220px;">
                <label style="min-width: 110px; color: var(--accent-solid); font-weight: 500;">Type of Vehicle</label>
                <select class="modern-input" style="width: 120px;">
                  <option>Car</option>
                  <option>Motorcycle</option>
                  <option>Truck</option>
            </select>
          </div>
              <div style="display: flex; align-items: center; gap: 10px; min-width: 220px;">
                <label style="min-width: 110px; color: var(--accent-solid); font-weight: 500;">Last Invoiced</label>
                <input type="text" class="modern-input" style="flex:1;">
        </div>
              <div style="display: flex; align-items: center; gap: 10px; min-width: 320px; width: 100%;">
                <label style="min-width: 110px; color: var(--accent-solid); font-weight: 500;">Previous VRM's</label>
                <input type="text" class="modern-input" style="flex:1; min-width:0;">
                <input type="text" class="modern-input" style="flex:1; min-width:0;">
                <input type="text" class="modern-input" style="flex:1; min-width:0;">
      </div>
          </div>
          </form>
          </div>
          </div>
    </div>
    <div class="vehicle-bottom-section" style="margin-top: 32px;">
      <!-- Tabs -->
      <div class="vehicle-bottom-tabs" style="display: flex; gap: 0; border-radius: 8px 8px 0 0; overflow: hidden; background: #333;">
        <button class="bottom-tab-btn active" data-tab="issued">Issued Docs</button>
        <button class="bottom-tab-btn" data-tab="other">Other Docs</button>
        <button class="bottom-tab-btn" data-tab="appointments">Appointments</button>
        <button class="bottom-tab-btn" data-tab="labour">All Labour</button>
        <button class="bottom-tab-btn" data-tab="parts">All Parts</button>
        <button class="bottom-tab-btn" data-tab="advisories">All Advisories</button>
        <button class="bottom-tab-btn" data-tab="reminders">Reminders</button>
        <button class="bottom-tab-btn" data-tab="overview" style="border-radius: 0 8px 8px 0;">Overview</button>
      </div>
      <!-- Tab Contents -->
      <div class="vehicle-bottom-tab-content" id="vehicle-bottom-issued">
        <div class="vehicle-bottom-table-wrapper" style="background: #fff; border-radius: 0 0 10px 10px; box-shadow: 0 2px 12px rgba(236,32,37,0.07); border: 1px solid var(--accent-light); overflow-x: auto;">
          <table class="vehicle-bottom-table" style="width: 100%; border-collapse: separate; border-spacing: 0;">
            <thead style="background: #e5e7eb;">
              <tr>
                <th style="padding: 10px 12px; font-weight: 700; color: var(--accent-solid);">Date</th>
                <th style="padding: 10px 12px; font-weight: 700; color: var(--accent-solid);">Doc No</th>
                <th style="padding: 10px 12px; font-weight: 700; color: var(--accent-solid);">Acc Number</th>
                <th style="padding: 10px 12px; font-weight: 700; color: var(--accent-solid);">Customer</th>
                <th style="padding: 10px 12px; font-weight: 700; color: var(--accent-solid);">Description</th>
                <th style="padding: 10px 12px; font-weight: 700; color: var(--accent-solid);">Mileage</th>
                <th style="padding: 10px 12px; font-weight: 700; color: var(--accent-solid);">Total</th>
                <th style="padding: 10px 12px; font-weight: 700; color: var(--accent-solid);">Receipts</th>
                <th style="padding: 10px 12px; font-weight: 700; color: var(--accent-solid);">Balance</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td style="padding: 12px 14px;">2024-05-01</td>
                <td style="padding: 12px 14px;">INV-1001</td>
                <td style="padding: 12px 14px;">ACC-1001</td>
                <td style="padding: 12px 14px;">John Doe</td>
                <td style="padding: 12px 14px;">Annual Service</td>
                <td style="padding: 12px 14px;">45,000</td>
                <td style="padding: 12px 14px;">$250.00</td>
                <td style="padding: 12px 14px;">$250.00</td>
                <td style="padding: 12px 14px;">$0.00</td>
              </tr>
              <tr>
                <td style="padding: 12px 14px;">2024-04-15</td>
                <td style="padding: 12px 14px;">INV-1000</td>
                <td style="padding: 12px 14px;">ACC-1002</td>
                <td style="padding: 12px 14px;">Sarah Johnson</td>
                <td style="padding: 12px 14px;">Brake Replacement</td>
                <td style="padding: 12px 14px;">52,300</td>
                <td style="padding: 12px 14px;">$180.00</td>
                <td style="padding: 12px 14px;">$100.00</td>
                <td style="padding: 12px 14px;">$80.00</td>
              </tr>
              <tr>
                <td style="padding: 12px 14px;">2024-03-28</td>
                <td style="padding: 12px 14px;">INV-0999</td>
                <td style="padding: 12px 14px;">ACC-1003</td>
                <td style="padding: 12px 14px;">Mike Wilson</td>
                <td style="padding: 12px 14px;">Oil Change</td>
                <td style="padding: 12px 14px;">60,000</td>
                <td style="padding: 12px 14px;">$60.00</td>
                <td style="padding: 12px 14px;">$60.00</td>
                <td style="padding: 12px 14px;">$0.00</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="vehicle-bottom-tab-content" id="vehicle-bottom-other" style="display:none;">
        <div class="vehicle-bottom-table-wrapper" style="background: #fff; border-radius: 0 0 10px 10px; box-shadow: 0 2px 12px rgba(236,32,37,0.07); border: 1px solid var(--accent-light); overflow-x: auto;">
          <table class="vehicle-bottom-table" style="width: 100%; border-collapse: separate; border-spacing: 0;">
            <thead style="background: #e5e7eb;">
              <tr>
                <th style="padding: 10px 12px; font-weight: 700; color: var(--accent-solid);">Date</th>
                <th style="padding: 10px 12px; font-weight: 700; color: var(--accent-solid);">Doc No</th>
                <th style="padding: 10px 12px; font-weight: 700; color: var(--accent-solid);">Acc Number</th>
                <th style="padding: 10px 12px; font-weight: 700; color: var(--accent-solid);">Customer</th>
                <th style="padding: 10px 12px; font-weight: 700; color: var(--accent-solid);">Description</th>
                <th style="padding: 10px 12px; font-weight: 700; color: var(--accent-solid);">Mileage</th>
                <th style="padding: 10px 12px; font-weight: 700; color: var(--accent-solid);">Total</th>
                <th style="padding: 10px 12px; font-weight: 700; color: var(--accent-solid);">Receipts</th>
                <th style="padding: 10px 12px; font-weight: 700; color: var(--accent-solid);">Balance</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td style="padding: 12px 14px;">2024-05-10</td>
                <td style="padding: 12px 14px;">QTN-2001</td>
                <td style="padding: 12px 14px;">ACC-2001</td>
                <td style="padding: 12px 14px;">Emma Davis</td>
                <td style="padding: 12px 14px;">Quote for Tyres</td>
                <td style="padding: 12px 14px;">47,800</td>
                <td style="padding: 12px 14px;">$320.00</td>
                <td style="padding: 12px 14px;">$0.00</td>
                <td style="padding: 12px 14px;">$320.00</td>
              </tr>
              <tr>
                <td style="padding: 12px 14px;">2024-04-22</td>
                <td style="padding: 12px 14px;">QTN-2002</td>
                <td style="padding: 12px 14px;">ACC-2002</td>
                <td style="padding: 12px 14px;">Robert Brown</td>
                <td style="padding: 12px 14px;">Estimate for Paint</td>
                <td style="padding: 12px 14px;">55,000</td>
                <td style="padding: 12px 14px;">$500.00</td>
                <td style="padding: 12px 14px;">$100.00</td>
                <td style="padding: 12px 14px;">$400.00</td>
              </tr>
              <tr>
                <td style="padding: 12px 14px;">2024-03-30</td>
                <td style="padding: 12px 14px;">QTN-2003</td>
                <td style="padding: 12px 14px;">ACC-2003</td>
                <td style="padding: 12px 14px;">Lisa Anderson</td>
                <td style="padding: 12px 14px;">Insurance Claim</td>
                <td style="padding: 12px 14px;">62,100</td>
                <td style="padding: 12px 14px;">$1,200.00</td>
                <td style="padding: 12px 14px;">$1,000.00</td>
                <td style="padding: 12px 14px;">$200.00</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="vehicle-bottom-tab-content" id="vehicle-bottom-appointments" style="display:none;">
        <div class="vehicle-bottom-table-wrapper" style="background: #fff; border-radius: 0 0 10px 10px; box-shadow: 0 2px 12px rgba(236,32,37,0.07); border: 1px solid var(--accent-light); overflow-x: auto;">
          <table class="vehicle-bottom-table" style="width: 100%; border-collapse: separate; border-spacing: 0;">
            <thead style="background: #e5e7eb;">
              <tr>
                <th style="padding: 10px 12px; font-weight: 700; color: var(--accent-solid);">Date</th>
                <th style="padding: 10px 12px; font-weight: 700; color: var(--accent-solid);">Time</th>
                <th style="padding: 10px 12px; font-weight: 700; color: var(--accent-solid);">Duration</th>
                <th style="padding: 10px 12px; font-weight: 700; color: var(--accent-solid);">Type</th>
                <th style="padding: 10px 12px; font-weight: 700; color: var(--accent-solid);">Bay</th>
                <th style="padding: 10px 12px; font-weight: 700; color: var(--accent-solid);">Note</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td style="padding: 12px 14px;">2024-05-12</td>
                <td style="padding: 12px 14px;">09:00</td>
                <td style="padding: 12px 14px;">1h</td>
                <td style="padding: 12px 14px;">Service</td>
                <td style="padding: 12px 14px;">Bay 1</td>
                <td style="padding: 12px 14px;">Annual checkup</td>
              </tr>
              <tr>
                <td style="padding: 12px 14px;">2024-05-13</td>
                <td style="padding: 12px 14px;">11:30</td>
                <td style="padding: 12px 14px;">2h</td>
                <td style="padding: 12px 14px;">Repair</td>
                <td style="padding: 12px 14px;">Bay 2</td>
                <td style="padding: 12px 14px;">Brake replacement</td>
              </tr>
              <tr>
                <td style="padding: 12px 14px;">2024-05-14</td>
                <td style="padding: 12px 14px;">14:00</td>
                <td style="padding: 12px 14px;">30m</td>
                <td style="padding: 12px 14px;">Inspection</td>
                <td style="padding: 12px 14px;">Bay 3</td>
                <td style="padding: 12px 14px;">Pre-sale check</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="vehicle-bottom-tab-content" id="vehicle-bottom-labour" style="display:none;">
        <div class="vehicle-bottom-table-wrapper" style="background: #fff; border-radius: 0 0 10px 10px; box-shadow: 0 2px 12px rgba(236,32,37,0.07); border: 1px solid var(--accent-light); overflow-x: auto;">
          <table class="vehicle-bottom-table" style="width: 100%; border-collapse: separate; border-spacing: 0;">
            <thead style="background: #e5e7eb;">
              <tr>
                <th style="padding: 10px 12px; font-weight: 700; color: var(--accent-solid);">Date</th>
                <th style="padding: 10px 12px; font-weight: 700; color: var(--accent-solid);">Doc No</th>
                <th style="padding: 10px 12px; font-weight: 700; color: var(--accent-solid);">Description</th>
                <th style="padding: 10px 12px; font-weight: 700; color: var(--accent-solid);">Mileage</th>
                <th style="padding: 10px 12px; font-weight: 700; color: var(--accent-solid);">Qty</th>
                <th style="padding: 10px 12px; font-weight: 700; color: var(--accent-solid);">Unit Price</th>
                <th style="padding: 10px 12px; font-weight: 700; color: var(--accent-solid);">VAT</th>
                <th style="padding: 10px 12px; font-weight: 700; color: var(--accent-solid);">SubTotal</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td style="padding: 12px 14px;">2024-05-10</td>
                <td style="padding: 12px 14px;">LAB-3001</td>
                <td style="padding: 12px 14px;">Oil Change</td>
                <td style="padding: 12px 14px;">47,800</td>
                <td style="padding: 12px 14px;">1</td>
                <td style="padding: 12px 14px;">$40.00</td>
                <td style="padding: 12px 14px;">$8.00</td>
                <td style="padding: 12px 14px;">$48.00</td>
              </tr>
              <tr>
                <td style="padding: 12px 14px;">2024-05-11</td>
                <td style="padding: 12px 14px;">LAB-3002</td>
                <td style="padding: 12px 14px;">Brake Pads Replacement</td>
                <td style="padding: 12px 14px;">48,200</td>
                <td style="padding: 12px 14px;">2</td>
                <td style="padding: 12px 14px;">$60.00</td>
                <td style="padding: 12px 14px;">$12.00</td>
                <td style="padding: 12px 14px;">$132.00</td>
              </tr>
              <tr>
                <td style="padding: 12px 14px;">2024-05-12</td>
                <td style="padding: 12px 14px;">LAB-3003</td>
                <td style="padding: 12px 14px;">Engine Diagnostics</td>
                <td style="padding: 12px 14px;">49,000</td>
                <td style="padding: 12px 14px;">1</td>
                <td style="padding: 12px 14px;">$80.00</td>
                <td style="padding: 12px 14px;">$16.00</td>
                <td style="padding: 12px 14px;">$96.00</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="vehicle-bottom-tab-content" id="vehicle-bottom-parts" style="display:none;">
        <div class="vehicle-bottom-table-wrapper" style="background: #fff; border-radius: 0 0 10px 10px; box-shadow: 0 2px 12px rgba(236,32,37,0.07); border: 1px solid var(--accent-light); overflow-x: auto;">
          <table class="vehicle-bottom-table" style="width: 100%; border-collapse: separate; border-spacing: 0;">
            <thead style="background: #e5e7eb;">
              <tr>
                <th style="padding: 10px 12px; font-weight: 700; color: var(--accent-solid);">Date</th>
                <th style="padding: 10px 12px; font-weight: 700; color: var(--accent-solid);">Doc No</th>
                <th style="padding: 10px 12px; font-weight: 700; color: var(--accent-solid);">Part No</th>
                <th style="padding: 10px 12px; font-weight: 700; color: var(--accent-solid);">Description</th>
                <th style="padding: 10px 12px; font-weight: 700; color: var(--accent-solid);">Mileage</th>
                <th style="padding: 10px 12px; font-weight: 700; color: var(--accent-solid);">Qty</th>
                <th style="padding: 10px 12px; font-weight: 700; color: var(--accent-solid);">Unit Price</th>
                <th style="padding: 10px 12px; font-weight: 700; color: var(--accent-solid);">VAT</th>
                <th style="padding: 10px 12px; font-weight: 700; color: var(--accent-solid);">SubTotal</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td style="padding: 12px 14px;">2024-05-10</td>
                <td style="padding: 12px 14px;">PRT-4001</td>
                <td style="padding: 12px 14px;">P-1001</td>
                <td style="padding: 12px 14px;">Oil Filter</td>
                <td style="padding: 12px 14px;">47,800</td>
                <td style="padding: 12px 14px;">1</td>
                <td style="padding: 12px 14px;">$12.00</td>
                <td style="padding: 12px 14px;">$2.40</td>
                <td style="padding: 12px 14px;">$14.40</td>
              </tr>
              <tr>
                <td style="padding: 12px 14px;">2024-05-11</td>
                <td style="padding: 12px 14px;">PRT-4002</td>
                <td style="padding: 12px 14px;">P-1002</td>
                <td style="padding: 12px 14px;">Brake Pads</td>
                <td style="padding: 12px 14px;">48,200</td>
                <td style="padding: 12px 14px;">2</td>
                <td style="padding: 12px 14px;">$30.00</td>
                <td style="padding: 12px 14px;">$6.00</td>
                <td style="padding: 12px 14px;">$66.00</td>
              </tr>
              <tr>
                <td style="padding: 12px 14px;">2024-05-12</td>
                <td style="padding: 12px 14px;">PRT-4003</td>
                <td style="padding: 12px 14px;">P-1003</td>
                <td style="padding: 12px 14px;">Air Filter</td>
                <td style="padding: 12px 14px;">49,000</td>
                <td style="padding: 12px 14px;">1</td>
                <td style="padding: 12px 14px;">$18.00</td>
                <td style="padding: 12px 14px;">$3.60</td>
                <td style="padding: 12px 14px;">$21.60</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="vehicle-bottom-tab-content" id="vehicle-bottom-advisories" style="display:none;">
        <div class="vehicle-bottom-table-wrapper" style="background: #fff; border-radius: 0 0 10px 10px; box-shadow: 0 2px 12px rgba(236,32,37,0.07); border: 1px solid var(--accent-light); overflow-x: auto;">
          <table class="vehicle-bottom-table" style="width: 100%; border-collapse: separate; border-spacing: 0;">
            <thead style="background: #e5e7eb;">
              <tr>
                <th style="padding: 10px 12px; font-weight: 700; color: var(--accent-solid);">Date</th>
                <th style="padding: 10px 12px; font-weight: 700; color: var(--accent-solid);">Doc No</th>
                <th style="padding: 10px 12px; font-weight: 700; color: var(--accent-solid);">Description</th>
                <th style="padding: 10px 12px; font-weight: 700; color: var(--accent-solid);">Mileage</th>
                <th style="padding: 10px 12px; font-weight: 700; color: var(--accent-solid);">Status</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td style="padding: 12px 14px;">2024-05-10</td>
                <td style="padding: 12px 14px;">ADV-5001</td>
                <td style="padding: 12px 14px;">Brake pads worn</td>
                <td style="padding: 12px 14px;">47,800</td>
                <td style="padding: 12px 14px;">Open</td>
              </tr>
              <tr>
                <td style="padding: 12px 14px;">2024-05-11</td>
                <td style="padding: 12px 14px;">ADV-5002</td>
                <td style="padding: 12px 14px;">Oil leak observed</td>
                <td style="padding: 12px 14px;">48,200</td>
                <td style="padding: 12px 14px;">In Progress</td>
              </tr>
              <tr>
                <td style="padding: 12px 14px;">2024-05-12</td>
                <td style="padding: 12px 14px;">ADV-5003</td>
                <td style="padding: 12px 14px;">Replace air filter soon</td>
                <td style="padding: 12px 14px;">49,000</td>
                <td style="padding: 12px 14px;">Closed</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="vehicle-bottom-tab-content" id="vehicle-bottom-reminders" style="display:none;">
        <div class="reminders-grid" style="display: grid; grid-template-columns: 2.5fr 1fr; gap: 18px; align-items: start;">
          <!-- Table Area -->
          <div class="vehicle-bottom-table-wrapper" style="background: #fff; border-radius: 0 0 10px 10px; box-shadow: 0 2px 12px rgba(236,32,37,0.07); border: 1px solid var(--accent-light); overflow-x: auto;">
            <table class="vehicle-bottom-table" style="width: 100%; border-collapse: separate; border-spacing: 0;">
              <thead style="background: #e5e7eb;">
                <tr>
                  <th style="padding: 10px 12px; font-weight: 700; color: var(--accent-solid);">Type</th>
                  <th style="padding: 10px 12px; font-weight: 700; color: var(--accent-solid);">Due Date</th>
                  <th style="padding: 10px 12px; font-weight: 700; color: var(--accent-solid);">Print On</th>
                  <th style="padding: 10px 12px; font-weight: 700; color: var(--accent-solid);">Email On</th>
                  <th style="padding: 10px 12px; font-weight: 700; color: var(--accent-solid);">SMS On</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td style="padding: 12px 14px;">Service</td>
                  <td style="padding: 12px 14px;">2024-06-01</td>
                  <td style="padding: 12px 14px;">2024-05-25</td>
                  <td style="padding: 12px 14px;">2024-05-26</td>
                  <td style="padding: 12px 14px;">2024-05-27</td>
                </tr>
                <tr>
                  <td style="padding: 12px 14px;">Insurance</td>
                  <td style="padding: 12px 14px;">2024-07-15</td>
                  <td style="padding: 12px 14px;">2024-07-10</td>
                  <td style="padding: 12px 14px;">2024-07-11</td>
                  <td style="padding: 12px 14px;">2024-07-12</td>
                </tr>
                <tr>
                  <td style="padding: 12px 14px;">MOT</td>
                  <td style="padding: 12px 14px;">2024-08-20</td>
                  <td style="padding: 12px 14px;">2024-08-15</td>
                  <td style="padding: 12px 14px;">2024-08-16</td>
                  <td style="padding: 12px 14px;">2024-08-17</td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- Sidebar Area -->
          <div class="reminder-sidebar">
            <div class="reminder-card stat-card" style="padding: 22px 18px; border-radius: 14px; box-shadow: 0 2px 12px rgba(236,32,37,0.09); border: 1.5px solid var(--accent-light); background: #fff; display: flex; flex-direction: column; gap: 18px;">
              <button class="btn-primary" style="width: 100%; font-weight: 700; border-radius: 8px; padding: 12px 0; font-size: 1.08rem; box-shadow: 0 2px 8px rgba(236,32,37,0.10); display: flex; align-items: center; justify-content: center; gap: 8px;"><i class="fas fa-bell"></i> View / Set Reminders</button>
              <label style="font-weight: 600; color: var(--accent-solid);">Reminder Notes</label>
              <textarea rows="12" class="modern-input" style="width: 100%; min-height: 180px; background: #fffbe6; border: 1.5px solid var(--accent-light); border-radius: 8px; font-size: 1.05rem; font-family: inherit; line-height: 1.7; padding: 12px 14px; resize: vertical; box-sizing: border-box;"></textarea>
            </div>
          </div>
        </div>
      </div>
      <div class="vehicle-bottom-tab-content" id="vehicle-bottom-overview" style="display:none;">
        <div class="overview-toolbar smart-toolbar">
          <div class="overview-date-controls">
            <label class="red-label">From:</label>
            <input type="date" class="overview-date-input" id="vehicleFromDate">
            <label class="red-label" style="margin-left:12px;">To:</label>
            <input type="date" class="overview-date-input" id="vehicleToDate">
            <button class="overview-btn red-btn" id="vehicleClearDateBtn" title="Clear">&#10005;</button>
            <button class="overview-btn red-btn" id="vehicleTodayBtn">Today</button>
            <select class="overview-select" id="vehicleDateRangeSelect">
              <option>Date Range</option>
              <option value="today">Today</option>
              <option value="yesterday">Yesterday</option>
              <option value="thisWeek">This Week</option>
              <option value="lastWeek">Last Week</option>
              <option value="thisMonth">This Month</option>
              <option value="lastMonth">Last Month</option>
              <option value="thisQuarter">This Quarter</option>
              <option value="lastQuarter">Last Quarter</option>
              <option value="thisYTD">This YTD</option>
              <option value="lastYTD">Last YTD</option>
              <option value="thisYear">This Year</option>
              <option value="lastYear">Last Year</option>
              <option value="thisFY">This Financial Year</option>
              <option value="lastFY">Last Financial Year</option>
            </select>
          </div>
          <div class="overview-tabs smart-tabs">
            <button class="overview-btn red-btn tab-btn active" id="vehicleSalesRangeTab">Sales in Range</button>
            <button class="overview-btn red-btn tab-btn" id="vehicleFiveYearTab">5 Yr Overview</button>
        </div>
          <div class="overview-toolbar-actions">
            <button class="overview-btn red-btn icon-btn" title="Print"><i class="fas fa-print"></i></button>
            <button class="overview-btn red-btn icon-btn" title="Export PDF"><i class="fas fa-file-pdf"></i></button>
            <button class="overview-btn red-btn icon-btn" title="Summary Preview"><i class="fas fa-table"></i></button>
      </div>
        </div>
        <div class="overview-chart-card">
          <div class="overview-chart-area">
            <!-- Sample graph using canvas -->
            <canvas id="vehicleOverviewChartCanvas" width="1200" height="400" style="width:100%;max-width:100%;height:340px;"></canvas>
            <div class="overview-legend">
              <span class="legend-item"><span class="legend-color legend-estimates"></span>Estimates</span>
              <span class="legend-item"><span class="legend-color legend-invoices"></span>Invoices</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
// Add Vehicle Modal functionality
document.addEventListener('DOMContentLoaded', function() {
  const addVehicleModal = document.getElementById('addVehicleModal');
  const closeAddVehicleModalBtn = document.getElementById('closeAddVehicleModal');
  const saveVehicleBtn = document.getElementById('saveVehicleBtn');
  const modalBackdrop = addVehicleModal?.querySelector('.modal-backdrop');

  function openAddVehicleModal() {
    if (addVehicleModal) {
      addVehicleModal.style.display = 'flex';
      // Reset form
      resetVehicleForm();
    }
  }

  function closeAddVehicleModal() {
    if (addVehicleModal) addVehicleModal.style.display = 'none';
  }

  function resetVehicleForm() {
    const form = addVehicleModal?.querySelector('.modal-scrollable-content');
    if (form) {
      const inputs = form.querySelectorAll('input, select, textarea');
      inputs.forEach(input => {
        if (input.type === 'select-one') {
          input.selectedIndex = 0;
        } else {
          input.value = '';
        }
      });
    }
  }

  // Close modal when clicking close button
  if (closeAddVehicleModalBtn) {
    closeAddVehicleModalBtn.addEventListener('click', closeAddVehicleModal);
  }

  // Close modal when clicking backdrop
  if (modalBackdrop) {
    modalBackdrop.addEventListener('click', closeAddVehicleModal);
  }

  // Save vehicle
  if (saveVehicleBtn) {
    saveVehicleBtn.addEventListener('click', function() {
      const vehicleData = {
        registration: document.getElementById('vehicle-registration')?.value || '',
        make: document.getElementById('vehicle-make')?.value || '',
        model: document.getElementById('vehicle-model')?.value || '',
        customerName: document.getElementById('vehicle-owner-name')?.value || ''
      };

      // Validate required fields
      if (!vehicleData.registration.trim() || !vehicleData.make.trim() || !vehicleData.model.trim()) {
        alert('Please fill in all required fields (Registration, Make, Model)');
        return;
      }

      if (window.GarageDataLayer && typeof GarageDataLayer.addVehicle === 'function') {
        GarageDataLayer.addVehicle(vehicleData);
        document.dispatchEvent(new CustomEvent('garage:data-changed'));
      }
      
      // Close modal and show success message
      closeAddVehicleModal();
      if (window.Utils && typeof Utils.showNotification === 'function') {
        Utils.showNotification('Vehicle saved successfully', 'success');
      } else {
        alert('Vehicle saved successfully!');
      }
    });
  }

  // Sidebar tab switching
  const vehicleTabBtns = document.querySelectorAll('.vehicle-tabs .tab-btn');
  const vehicleTabContents = document.querySelectorAll('.vehicle-tab-content');
  vehicleTabBtns.forEach(btn => {
    btn.addEventListener('click', function() {
      vehicleTabBtns.forEach(b => b.classList.remove('active'));
      this.classList.add('active');
      vehicleTabContents.forEach(tab => tab.style.display = 'none');
      const tabId = 'vehicle-tab-' + this.getAttribute('data-tab');
      const tabContent = document.getElementById(tabId);
      if(tabContent) tabContent.style.display = '';
    });
  });

  // Bottom tab switching
  const bottomTabBtns = document.querySelectorAll('.vehicle-bottom-tabs .bottom-tab-btn');
  const bottomTabContents = document.querySelectorAll('.vehicle-bottom-tab-content');
  bottomTabBtns.forEach(btn => {
    btn.addEventListener('click', function() {
      bottomTabBtns.forEach(b => b.classList.remove('active'));
      this.classList.add('active');
      bottomTabContents.forEach(tab => tab.style.display = 'none');
      const tabId = 'vehicle-bottom-' + this.getAttribute('data-tab');
      const tabContent = document.getElementById(tabId);
      if(tabContent) tabContent.style.display = '';
    });
  });

  // Make functions globally available
  window.openAddVehicleModal = openAddVehicleModal;
  window.closeAddVehicleModal = closeAddVehicleModal;
});

// Dropdown functionality
document.addEventListener('DOMContentLoaded', function() {
  // Function to close all dropdowns
  function closeAllDropdowns() {
    const dropdowns = [newDocDropdown, printDropdown, historyDropdown];
    dropdowns.forEach(dropdown => {
      if (dropdown) {
        dropdown.style.display = 'none';
      }
    });
  }
  
  // New Doc dropdown
  const newDocBtn = document.getElementById('newDocBtn');
  const newDocDropdown = document.getElementById('newDocDropdown');
  
  if (newDocBtn && newDocDropdown) {
    newDocBtn.addEventListener('click', function(e) {
      e.stopPropagation();
      const isVisible = newDocDropdown.style.display === 'block';
      closeAllDropdowns();
      if (!isVisible) {
        newDocDropdown.style.display = 'block';
      }
    });
    
    // Handle New Doc dropdown options
    const newDocOptions = newDocDropdown.querySelectorAll('.dropdown-option');
    newDocOptions.forEach(option => {
      option.addEventListener('click', function() {
        const page = this.getAttribute('data-page');
        if (page) {
          window.location.href = page;
        }
        newDocDropdown.style.display = 'none';
      });
    });
  }
  
  // Print dropdown
  const printBtn = document.getElementById('printBtn');
  const printDropdown = document.getElementById('printDropdown');
  
  if (printBtn && printDropdown) {
    printBtn.addEventListener('click', function(e) {
      e.stopPropagation();
      const isVisible = printDropdown.style.display === 'block';
      closeAllDropdowns();
      if (!isVisible) {
        printDropdown.style.display = 'block';
      }
    });
    
    // Handle Print dropdown options
    const printOptions = printDropdown.querySelectorAll('.dropdown-option');
    printOptions.forEach(option => {
      option.addEventListener('click', function() {
        console.log('Print option clicked:', this.textContent);
        // Add your print functionality here
        printDropdown.style.display = 'none';
      });
    });
  }
  
  // History dropdown
  const historyBtn = document.getElementById('historyBtn');
  const historyDropdown = document.getElementById('historyDropdown');
  
  if (historyBtn && historyDropdown) {
    historyBtn.addEventListener('click', function(e) {
      e.stopPropagation();
      const isVisible = historyDropdown.style.display === 'block';
      closeAllDropdowns();
      if (!isVisible) {
        historyDropdown.style.display = 'block';
      }
    });
    
    // Handle History dropdown options
    const historyOptions = historyDropdown.querySelectorAll('.dropdown-option');
    historyOptions.forEach(option => {
      option.addEventListener('click', function() {
        console.log('History option clicked:', this.textContent);
        // Add your history functionality here
        historyDropdown.style.display = 'none';
      });
    });
  }
  
  // Close dropdowns when clicking outside
  document.addEventListener('click', function(e) {
    if (!newDocBtn?.contains(e.target) && !newDocDropdown?.contains(e.target) &&
        !printBtn?.contains(e.target) && !printDropdown?.contains(e.target) &&
        !historyBtn?.contains(e.target) && !historyDropdown?.contains(e.target)) {
      closeAllDropdowns();
    }
  });
});

// Overview Tab Functionality
document.addEventListener('DOMContentLoaded', function() {
  // Set default dates to today
  const now = new Date();
  setVehicleDateInputs(now, now);
  
  // Event listeners for date controls
  const vehicleTodayBtn = document.getElementById('vehicleTodayBtn');
  const vehicleClearDateBtn = document.getElementById('vehicleClearDateBtn');
  const vehicleDateRangeSelect = document.getElementById('vehicleDateRangeSelect');
  
  if (vehicleTodayBtn) {
    vehicleTodayBtn.addEventListener('click', function() {
      const now = new Date();
      setVehicleDateInputs(now, now);
    });
  }
  
  if (vehicleClearDateBtn) {
    vehicleClearDateBtn.addEventListener('click', clearVehicleDates);
  }
  
  if (vehicleDateRangeSelect) {
    vehicleDateRangeSelect.addEventListener('change', function() {
      const now = new Date();
      let from, to;
      switch(this.value) {
        case 'today':
          from = to = new Date(now.getFullYear(), now.getMonth(), now.getDate());
          break;
        case 'yesterday':
          from = to = new Date(now.getFullYear(), now.getMonth(), now.getDate()-1);
          break;
        case 'thisWeek': {
          const monday = getMonday(now);
          const sunday = new Date(monday);
          sunday.setDate(monday.getDate() + 6);
          from = monday;
          to = sunday;
          break;
        }
        case 'lastWeek': {
          const lastWeekMonday = getMonday(new Date(now.getFullYear(), now.getMonth(), now.getDate() - 7));
          const lastWeekSunday = new Date(lastWeekMonday);
          lastWeekSunday.setDate(lastWeekMonday.getDate() + 6);
          from = lastWeekMonday;
          to = lastWeekSunday;
          break;
        }
        case 'thisMonth':
          from = new Date(now.getFullYear(), now.getMonth(), 1);
          to = new Date(now.getFullYear(), now.getMonth()+1, 0);
          break;
        case 'lastMonth':
          from = new Date(now.getFullYear(), now.getMonth()-1, 1);
          to = new Date(now.getFullYear(), now.getMonth(), 0);
          break;
        case 'thisQuarter': {
          from = getQuarterStart(now);
          to = getQuarterEnd(now);
          break;
        }
        case 'lastQuarter': {
          const lastQuarter = new Date(now.getFullYear(), now.getMonth()-3, 1);
          from = getQuarterStart(lastQuarter);
          to = getQuarterEnd(lastQuarter);
          break;
        }
        case 'thisYTD': {
          from = getYTDStart(now);
          to = now;
          break;
        }
        case 'lastYTD': {
          const lastYear = new Date(now.getFullYear()-1, 0, 1);
          from = getYTDStart(lastYear);
          to = new Date(now.getFullYear()-1, 11, 31);
          break;
        }
        case 'thisYear':
          from = new Date(now.getFullYear(), 0, 1);
          to = new Date(now.getFullYear(), 11, 31);
          break;
        case 'lastYear':
          from = new Date(now.getFullYear()-1, 0, 1);
          to = new Date(now.getFullYear()-1, 11, 31);
          break;
        case 'thisFY': {
          from = getFinancialYearStart(now);
          to = getFinancialYearEnd(now);
          break;
        }
        case 'lastFY': {
          const lastFY = new Date(now.getFullYear()-1, 3, 1);
          from = getFinancialYearStart(lastFY);
          to = getFinancialYearEnd(lastFY);
          break;
        }
        default:
          return;
      }
      setVehicleDateInputs(from, to);
    });
  }
  
  // Overview tab switching
  const vehicleSalesRangeTab = document.getElementById('vehicleSalesRangeTab');
  const vehicleFiveYearTab = document.getElementById('vehicleFiveYearTab');
  
  if (vehicleSalesRangeTab) {
    vehicleSalesRangeTab.addEventListener('click', function() {
      this.classList.add('active');
      vehicleFiveYearTab?.classList.remove('active');
      drawVehicleOverviewChart('sales');
    });
  }
  
  if (vehicleFiveYearTab) {
    vehicleFiveYearTab.addEventListener('click', function() {
      this.classList.add('active');
      vehicleSalesRangeTab?.classList.remove('active');
      drawVehicleOverviewChart('fiveYear');
    });
  }
  
  // Initialize chart
  drawVehicleOverviewChart('sales');
});

// Helper functions
function setVehicleDateInputs(from, to) {
  const fromDate = document.getElementById('vehicleFromDate');
  const toDate = document.getElementById('vehicleToDate');
  if (fromDate) fromDate.value = from.toISOString().slice(0,10);
  if (toDate) toDate.value = to.toISOString().slice(0,10);
}

function clearVehicleDates() {
  const fromDate = document.getElementById('vehicleFromDate');
  const toDate = document.getElementById('vehicleToDate');
  if (fromDate) fromDate.value = '';
  if (toDate) toDate.value = '';
}

function getMonday(d) {
  d = new Date(d);
  var day = d.getDay(), diff = d.getDate() - day + (day === 0 ? -6 : 1);
  return new Date(d.setDate(diff));
}

function getQuarterStart(date) {
  return new Date(date.getFullYear(), Math.floor(date.getMonth()/3)*3, 1);
}

function getQuarterEnd(date) {
  return new Date(date.getFullYear(), Math.floor(date.getMonth()/3)*3+3, 0);
}

function getYTDStart(date) {
  return new Date(date.getFullYear(), 0, 1);
}

function getFinancialYearStart(date) {
  return new Date(date.getMonth() < 3 ? date.getFullYear()-1 : date.getFullYear(), 3, 1);
}

function getFinancialYearEnd(date) {
  return new Date(date.getMonth() < 3 ? date.getFullYear() : date.getFullYear()+1, 2, 31);
}

function drawVehicleOverviewChart(type) {
  const canvas = document.getElementById('vehicleOverviewChartCanvas');
  if (!canvas) return;
  
  const ctx = canvas.getContext('2d');
  const width = canvas.width;
  const height = canvas.height;
  
  // Clear canvas
  ctx.clearRect(0, 0, width, height);
  
  // Draw sample chart based on type
  ctx.fillStyle = '#f3f4f6';
  ctx.fillRect(0, 0, width, height);
  
  // Draw grid lines
  ctx.strokeStyle = '#e5e7eb';
  ctx.lineWidth = 1;
  
  // Vertical grid lines
  for (let x = 0; x <= width; x += width / 12) {
    ctx.beginPath();
    ctx.moveTo(x, 0);
    ctx.lineTo(x, height);
    ctx.stroke();
  }
  
  // Horizontal grid lines
  for (let y = 0; y <= height; y += height / 8) {
    ctx.beginPath();
    ctx.moveTo(0, y);
    ctx.lineTo(width, y);
    ctx.stroke();
  }
  
  // Draw sample data based on type
  const data = getSampleVehicleData(type);
  
  // Draw lines
  ctx.lineWidth = 3;
  ctx.lineCap = 'round';
  
  // Estimates line (green)
  ctx.strokeStyle = '#4ade80';
  ctx.beginPath();
  data.estimates.forEach((point, index) => {
    const x = (index / (data.estimates.length - 1)) * width;
    const y = height - (point / 100) * height;
    if (index === 0) {
      ctx.moveTo(x, y);
    } else {
      ctx.lineTo(x, y);
    }
  });
  ctx.stroke();
  
  // Invoices line (blue)
  ctx.strokeStyle = '#2563eb';
  ctx.beginPath();
  data.invoices.forEach((point, index) => {
    const x = (index / (data.invoices.length - 1)) * width;
    const y = height - (point / 100) * height;
    if (index === 0) {
      ctx.moveTo(x, y);
    } else {
      ctx.lineTo(x, y);
    }
  });
  ctx.stroke();
}

function getSampleVehicleData(type) {
  // Generate sample data based on chart type
  const baseData = {
    estimates: [20, 35, 45, 30, 60, 40, 55, 70, 65, 80, 75, 90],
    invoices: [15, 25, 40, 35, 50, 45, 60, 55, 70, 65, 80, 85]
  };
  
  switch(type) {
    case 'fiveYear':
      return {
        estimates: [30, 45, 60, 50, 75, 65, 80, 85, 90, 95, 88, 92],
        invoices: [25, 35, 50, 45, 65, 60, 75, 80, 85, 90, 82, 88]
      };
    case 'sales':
    default:
      return baseData;
  }
}
</script>

<style>
.vehicle-modal {
  background: #fff;
  border-radius: 18px;
  box-shadow: 0 6px 32px 0 rgba(34,34,59,0.13);
  padding: 0;
  overflow: hidden;
}

.vehicle-form-section {
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

.owner-input-group {
  display: flex;
  gap: 8px;
}

.owner-input-group input {
  flex: 1;
}

.owner-input-group .search-btn,
.owner-input-group .add-btn {
  padding: 10px 12px;
  border: 1.5px solid #e5e7eb;
  border-radius: 8px;
  background: #fff;
  cursor: pointer;
  transition: all 0.2s;
}

.owner-input-group .search-btn:hover,
.owner-input-group .add-btn:hover {
  border-color: #b91c1c;
  color: #b91c1c;
}

.vehicle-reg-grid {
  width: 100%;
}
@media (max-width: 900px) {
  .vehicle-reg-grid {
    grid-template-columns: 1fr;
  }
  .tyre-row {
    flex-direction: column;
    gap: 18px;
  }
}

.modern-input {
  width: 100%;
  padding: 10px 14px;
  border: 1.5px solid var(--accent-light, #f3d6d6);
  border-radius: 8px;
  background: #fff;
  font-size: 1.05rem;
  color: #222;
  font-weight: 500;
  transition: border-color 0.2s, box-shadow 0.2s;
  box-shadow: 0 1px 4px rgba(236,32,37,0.04);
  outline: none;
  margin-top: 2px;
  margin-bottom: 2px;
}

.modern-input:focus {
  border-color: var(--accent-solid, #ec2025);
  box-shadow: 0 0 0 2px rgba(236,32,37,0.10);
  background: #fff;
}

.modern-input::placeholder {
  color: #bbb;
  font-style: italic;
  opacity: 1;
}

.vehicle-tabs .tab-btn {
  background: #f7f7f7;
  color: var(--accent-solid);
  font-weight: 700;
  font-size: 1.05rem;
  border: none;
  border-right: 1.5px solid var(--accent-light);
  padding: 10px 0;
  transition: background 0.18s, color 0.18s;
  cursor: pointer;
}
.vehicle-tabs .tab-btn:last-child {
  border-right: none;
}
.vehicle-tabs .tab-btn.active {
  background: var(--accent-solid);
  color: #fff;
  box-shadow: 0 2px 8px rgba(236,32,37,0.08);
}
.vehicle-checklist-grid .checklist-item {
  display: flex;
  align-items: center;
  gap: 8px;
  font-size: 1.04rem;
  color: #222;
  font-weight: 500;
  margin-bottom: 2px;
  cursor: pointer;
}
.modern-checkbox {
  width: 18px;
  height: 18px;
  border-radius: 5px;
  border: 1.5px solid var(--accent-light, #f3d6d6);
  accent-color: var(--accent-solid, #ec2025);
  margin-right: 4px;
  transition: border-color 0.18s;
}
.modern-checkbox:focus {
  outline: 2px solid var(--accent-solid, #ec2025);
}
.specs-grid label {
  font-weight: 500;
  color: var(--accent-solid);
  margin-bottom: 2px;
  display: block;
}
@media (max-width: 900px) {
  .specs-grid {
    grid-template-columns: 1fr;
  }
}
.vehicle-main-form .modern-input {
  max-width: 98%;
}
@media (max-width: 900px) {
  .vehicle-main-form.card-box {
    max-width: 100%;
    min-width: 0;
    padding: 10px 4vw;
  }
  .vehicle-reg-grid {
    grid-template-columns: 1fr;
    gap: 10px 0;
  }
}
.extra-grid label {
  font-weight: 500;
  color: var(--accent-solid);
  margin-bottom: 2px;
  display: block;
}
@media (max-width: 900px) {
  .extra-grid {
    grid-template-columns: 1fr;
  }
}
@media (max-width: 900px) {
  .modal-main-grid {
    flex-direction: column;
    gap: 18px;
    padding: 14px 2vw 0 2vw;
  }
  .vehicle-main-form.card-box,
  .vehicle-sidebar.card-box {
    width: 100%;
    min-width: 0;
    max-width: 100%;
  }
}
.vehicle-bottom-tabs .bottom-tab-btn {
  flex: 1;
  color: #fff;
  background: #444;
  font-weight: 700;
  font-size: 1.08rem;
  border: none;
  padding: 12px 0;
  cursor: pointer;
  transition: background 0.18s, color 0.18s;
}
.vehicle-bottom-tabs .bottom-tab-btn.active {
  background: var(--accent-solid);
  color: #fff;
  box-shadow: 0 2px 8px rgba(236,32,37,0.08);
}

/* Overview Tab Styles */
.smart-toolbar {
  background: #faf7f7 !important; /* subtle light red-tinted background */
  border-radius: 16px 16px 0 0;
  box-shadow: 0 2px 12px rgba(185,28,28,0.10);
  padding: 18px 24px 14px 24px;
  display: flex;
  flex-wrap: nowrap;
  align-items: center;
  gap: 18px;
  overflow-x: auto;
  min-height: 64px;
  border-bottom: 1.5px solid #f3f4f6;
}

.overview-date-controls, .smart-tabs, .overview-toolbar-actions {
  display: flex;
  flex-wrap: nowrap;
  align-items: center;
  gap: 10px;
}

.red-label {
  color: #b91c1c;
  font-weight: 700;
  font-size: 1.08em;
  margin-right: 4px;
  letter-spacing: 0.01em;
}

.overview-date-controls {
  display: flex;
  flex-wrap: nowrap;
  align-items: center;
  gap: 6px;
}

.overview-select {
  border: 1.5px solid #e5e7eb;
  border-radius: 999px;
  padding: 4px 14px;
  font-size: 1em;
  background: #fff;
  color: #b91c1c;
  margin-right: 2px;
  outline: none;
  transition: border 0.18s, box-shadow 0.18s;
  box-shadow: 0 1px 4px rgba(34,34,59,0.08);
  font-weight: 600;
  min-width: 60px;
}

.overview-select:focus {
  border-color: #b91c1c;
  box-shadow: 0 0 0 2px #fca5a5;
}

.overview-btn.red-btn {
  background: #b91c1c;
  color: #fff;
  border: none;
  border-radius: 999px;
  font-weight: 700;
  font-size: 1em;
  padding: 6px 18px;
  margin: 0 2px;
  cursor: pointer;
  transition: background 0.18s, color 0.18s, box-shadow 0.18s;
  box-shadow: 0 1px 4px rgba(185,28,28,0.10);
  display: flex;
  align-items: center;
  justify-content: center;
  outline: none;
}

.overview-btn.red-btn:hover, .overview-btn.red-btn.active {
  background: #fff;
  color: #b91c1c;
  border: 2px solid #b91c1c;
}

.icon-btn {
  width: 38px;
  height: 38px;
  padding: 0;
  font-size: 1.35em;
  border-radius: 12px;
}

.smart-tabs {
  display: flex;
  flex-wrap: nowrap;
  gap: 0;
  margin-left: 18px;
  align-items: center;
}

.smart-tabs .tab-btn {
  min-width: 140px;
  justify-content: center;
}

.overview-toolbar-actions {
  display: flex;
  flex-wrap: nowrap;
  align-items: center;
  gap: 10px;
  margin-left: auto;
}

.overview-date-input {
  border: 1.5px solid #e5e7eb;
  border-radius: 999px;
  padding: 4px 14px;
  font-size: 1em;
  background: #fff;
  color: #b91c1c;
  margin-right: 2px;
  outline: none;
  transition: border 0.18s, box-shadow 0.18s;
  box-shadow: 0 1px 4px rgba(34,34,59,0.08);
  font-weight: 600;
  min-width: 140px;
}

.overview-date-input:focus {
  border-color: #b91c1c;
  box-shadow: 0 0 0 2px #fca5a5;
}

.overview-chart-card {
  background: #fff;
  border-radius: 0 0 16px 16px;
  box-shadow: 0 4px 18px 0 rgba(185,28,28,0.13);
  padding: 24px;
  position: relative;
}

.overview-chart-area {
  position: relative;
  width: 100%;
  height: 400px;
  display: flex;
  align-items: center;
  justify-content: center;
}

.overview-legend {
  display: flex;
  gap: 28px;
  align-items: center;
  justify-content: center;
  font-size: 0.98em;
  font-weight: 600;
  position: absolute;
  left: 50%;
  transform: translateX(-50%);
  bottom: 8px;
  width: auto;
  background: transparent;
  z-index: 2;
}

.legend-item {
  display: flex;
  align-items: center;
  gap: 6px;
}

.legend-color {
  width: 14px;
  height: 14px;
  border-radius: 4px;
  display: inline-block;
  box-shadow: 0 1px 3px rgba(44,44,44,0.08);
  border: 1.5px solid #fff;
}

.legend-estimates {
  background: #4ade80;
  border: 1.5px solid #22c55e;
}

.legend-invoices {
  background: #2563eb;
  border: 1.5px solid #1d4ed8;
}

@media (max-width: 900px) {
  .smart-toolbar {
    flex-direction: column;
    gap: 12px;
    padding: 14px 16px;
  }
  
  .overview-date-controls, .smart-tabs, .overview-toolbar-actions {
    width: 100%;
    justify-content: center;
  }
  
  .overview-date-input {
    min-width: 120px;
  }
  
  .smart-tabs .tab-btn {
    min-width: 120px;
    font-size: 0.9em;
  }
}

/* Enhanced Dropdown Styles */
.new-doc-dropdown, .print-dropdown, .history-dropdown {
  position: absolute;
  top: 100%;
  margin-top: 8px;
  background: #fff;
  border-radius: 12px;
  box-shadow: 0 8px 32px rgba(185,28,28,0.15);
  min-width: 180px;
  z-index: 2000;
  padding: 8px 0;
  border: 1.5px solid #f3f4f6;
  display: none;
  animation: dropdownSlideIn 0.2s ease-out;
}

.dropdown-option {
  padding: 12px 20px;
  font-size: 1.05em;
  color: #374151;
  cursor: pointer;
  transition: all 0.18s ease;
  border-radius: 8px;
  margin: 2px 8px;
  display: flex;
  align-items: center;
  gap: 12px;
  font-weight: 500;
  position: relative;
  border: 1px solid transparent;
}

.dropdown-option:hover {
  background: linear-gradient(135deg, #fef2f2 0%, #fecaca 100%);
  color: #b91c1c;
  border-color: #fca5a5;
  transform: translateX(4px);
  box-shadow: 0 2px 8px rgba(185,28,28,0.08);
}

.dropdown-option:active {
  transform: translateX(4px) scale(0.98);
}

.dropdown-option::before {
  content: '';
  position: absolute;
  left: 0;
  top: 0;
  bottom: 0;
  width: 3px;
  background: linear-gradient(180deg, #b91c1c 0%, #dc2626 100%);
  border-radius: 0 2px 2px 0;
  opacity: 0;
  transition: opacity 0.18s ease;
}

.dropdown-option:hover::before {
  opacity: 1;
}

/* Icons for dropdown options */
.dropdown-option[data-page="estimates.php"]::after {
  content: '📋';
  margin-left: auto;
  font-size: 1.1em;
}

.dropdown-option[data-page="job-sheets.php"]::after {
  content: '🔧';
  margin-left: auto;
  font-size: 1.1em;
}

.dropdown-option[data-page="invoices.php"]::after {
  content: '💰';
  margin-left: auto;
  font-size: 1.1em;
}

.dropdown-option[data-page="calendar.php"]::after {
  content: '📅';
  margin-left: auto;
  font-size: 1.1em;
}

/* Print dropdown icons */
.print-dropdown .dropdown-option:nth-child(1)::after {
  content: '📄';
  margin-left: auto;
  font-size: 1.1em;
}

.print-dropdown .dropdown-option:nth-child(2)::after {
  content: '📋';
  margin-left: auto;
  font-size: 1.1em;
}

.print-dropdown .dropdown-option:nth-child(3)::after {
  content: '🔔';
  margin-left: auto;
  font-size: 1.1em;
}

/* History dropdown icons */
.history-dropdown .dropdown-option:nth-child(1)::after {
  content: '👁️';
  margin-left: auto;
  font-size: 1.1em;
}

.history-dropdown .dropdown-option:nth-child(2)::after {
  content: '🖨️';
  margin-left: auto;
  font-size: 1.1em;
}

.history-dropdown .dropdown-option:nth-child(3)::after {
  content: '📄';
  margin-left: auto;
  font-size: 1.1em;
}

.history-dropdown .dropdown-option:nth-child(4)::after {
  content: '📧';
  margin-left: auto;
  font-size: 1.1em;
}

/* Dropdown animation */
@keyframes dropdownSlideIn {
  from {
    opacity: 0;
    transform: translateY(-10px) scale(0.95);
  }
  to {
    opacity: 1;
    transform: translateY(0) scale(1);
  }
}

/* Enhanced dropdown container positioning */
.new-doc-container, .print-container, .history-container {
  position: relative;
}

/* Dropdown arrow indicator */
.new-doc-dropdown::before, .print-dropdown::before, .history-dropdown::before {
  content: '';
  position: absolute;
  top: -6px;
  left: 20px;
  width: 12px;
  height: 12px;
  background: #fff;
  border-left: 1.5px solid #f3f4f6;
  border-top: 1.5px solid #f3f4f6;
  transform: rotate(45deg);
  z-index: -1;
}

/* Responsive adjustments */
@media (max-width: 768px) {
  .dropdown-option {
    padding: 14px 16px;
    font-size: 1em;
  }
  
  .new-doc-dropdown, .print-dropdown, .history-dropdown {
    min-width: 160px;
    margin-top: 6px;
  }
}
</style> 
