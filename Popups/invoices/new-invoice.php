<?php
// New Invoice Modal
// This file contains the invoice creation popup
// Include this file where needed using: include 'Popups/invoices/new-invoice.php';
?>

<!-- New Invoice Modal -->
<div id="newInvoiceModal" class="invoice-modal-overlay" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); backdrop-filter: blur(4px); z-index: 1200; align-items: center; justify-content: center;">
  <div class="invoice-modal-backdrop" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; pointer-events: none;"></div>
  <div class="invoice-modal-content" style="position: relative; max-width: 98vw; width: 1200px; min-width: 320px; max-height: 95vh; overflow: auto; border-radius: 15px; box-shadow: 0 4px 24px rgba(0,0,0,0.12); background: var(--white); border: 1px solid #e5e7eb; z-index: 1201;">
    <!-- Top Bar -->
    <div class="modal-action-bar" style="display: flex; align-items: center; background: #fff; color: #222; border-radius: 18px 18px 0 0; border-bottom: 1.5px solid #e5e7eb; box-shadow: 0 2px 12px rgba(0,0,0,0.07); padding: 0 24px; min-height: 56px;">
      <button class="modal-action-btn primary" id="saveInvoiceBtn" style="background: #b91c1c; color: #fff; border-radius: 10px; border: none; font-weight: 700; box-shadow: 0 2px 8px rgba(185,28,28,0.08);"> <i class="fas fa-save"></i> Save</button>
      <button class="modal-action-btn" style="color: #fff; background: #444; border-radius: 10px; margin-left:8px;"><i class="fas fa-print"></i> Print</button>
      <button class="modal-action-btn" style="color: #fff; background: #444; border-radius: 10px; margin-left:8px;">Issue</button>
      <div class="dropdown-group extras-dropdown" style="margin-left:8px; position: relative; display: inline-block;">
        <button class="modal-action-btn extras-btn" id="extrasBtnINV" style="color: #fff; background: #444; border-radius: 10px; border: none; cursor: pointer; display: flex; align-items: center; gap: 8px; font-weight: 600; transition: all 0.2s;" onclick="toggleExtrasDropdown(event)">
          <i class="fas fa-ellipsis-h"></i> 
          <span>Draft</span> 
          <i class="fas fa-caret-down" id="extrasCaretINV" style="transition: transform 0.2s ease;"></i>
        </button>
        <div class="extras-menu" id="extrasMenuINV" style="position: absolute; top: calc(100% + 8px); right: 0; background: #fff; border: 1px solid #e5e7eb; border-radius: 10px; box-shadow: 0 8px 32px rgba(0,0,0,0.15); min-width: 220px; z-index: 9999; opacity: 0; visibility: hidden; transform: translateY(-8px); transition: all 0.3s ease; overflow: hidden;">
          <div class="extras-option" style="display: flex; align-items: center; gap: 12px; padding: 14px 16px; color: #222; text-decoration: none; transition: all 0.2s; border-bottom: 1px solid #f3f4f6; cursor: pointer; font-weight: 500;" onclick="handleExtrasAction('Print Preview')" onmouseover="this.style.background='#f8f9fa'" onmouseout="this.style.background='#fff'">
            <i class="fas fa-eye" style="font-size: 14px; width: 16px; text-align: center; color: #b91c1c;"></i>
            <span>Print Preview</span>
          </div>
          <div class="extras-option" style="display: flex; align-items: center; gap: 12px; padding: 14px 16px; color: #222; text-decoration: none; transition: all 0.2s; border-bottom: 1px solid #f3f4f6; cursor: pointer; font-weight: 500;" onclick="handleExtrasAction('Print Draft')" onmouseover="this.style.background='#f8f9fa'" onmouseout="this.style.background='#fff'">
            <i class="fas fa-print" style="font-size: 14px; width: 16px; text-align: center; color: #b91c1c;"></i>
            <span>Print Draft</span>
          </div>
          <div class="extras-option" style="display: flex; align-items: center; gap: 12px; padding: 14px 16px; color: #222; text-decoration: none; transition: all 0.2s; border-bottom: 1px solid #f3f4f6; cursor: pointer; font-weight: 500;" onclick="handleExtrasAction('Print Advisories')" onmouseover="this.style.background='#f8f9fa'" onmouseout="this.style.background='#fff'">
            <i class="fas fa-exclamation-triangle" style="font-size: 14px; width: 16px; text-align: center; color: #b91c1c;"></i>
            <span>Print Advisories</span>
          </div>
          <div class="extras-option" style="display: flex; align-items: center; gap: 12px; padding: 14px 16px; color: #222; text-decoration: none; transition: all 0.2s; border-bottom: 1px solid #f3f4f6; cursor: pointer; font-weight: 500;" onclick="handleExtrasAction('Email Draft')" onmouseover="this.style.background='#f8f9fa'" onmouseout="this.style.background='#fff'">
            <i class="fas fa-envelope" style="font-size: 14px; width: 16px; text-align: center; color: #b91c1c;"></i>
            <span>Email Draft</span>
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
        <button class="modal-action-btn convert-btn" id="convertBtnINV" style="color: #fff; background: #444; border-radius: 10px; border: none; cursor: pointer; display: flex; align-items: center; gap: 8px; font-weight: 600; transition: all 0.2s;" onclick="toggleConvertDropdown(event)">
          <i class="fas fa-exchange-alt"></i> 
          <span>Convert</span> 
          <i class="fas fa-caret-down" id="convertCaretINV" style="transition: transform 0.2s ease;"></i>
        </button>
        <div class="convert-menu" id="convertMenuINV" style="position: absolute; top: calc(100% + 8px); right: 0; background: #fff; border: 1px solid #e5e7eb; border-radius: 10px; box-shadow: 0 8px 32px rgba(0,0,0,0.15); min-width: 220px; z-index: 9999; opacity: 0; visibility: hidden; transform: translateY(-8px); transition: all 0.3s ease; overflow: hidden;">
          <div class="convert-option" style="display: flex; align-items: center; gap: 12px; padding: 14px 16px; color: #222; text-decoration: none; transition: all 0.2s; border-bottom: 1px solid #f3f4f6; cursor: pointer; font-weight: 500;" onclick="handleConvertAction('Copy to Estimate')" onmouseover="this.style.background='#f8f9fa'" onmouseout="this.style.background='#fff'">
            <i class="fas fa-file-invoice-dollar" style="font-size: 14px; width: 16px; text-align: center; color: #b91c1c;"></i>
            <span>Copy to Estimate</span>
          </div>
          <div class="convert-option" style="display: flex; align-items: center; gap: 12px; padding: 14px 16px; color: #222; text-decoration: none; transition: all 0.2s; border-bottom: 1px solid #f3f4f6; cursor: pointer; font-weight: 500;" onclick="handleConvertAction('Convert to Job Sheet')" onmouseover="this.style.background='#f8f9fa'" onmouseout="this.style.background='#fff'">
            <i class="fas fa-clipboard-list" style="font-size: 14px; width: 16px; text-align: center; color: #b91c1c;"></i>
            <span>Convert to Job Sheet</span>
          </div>
          <div class="convert-option" style="display: flex; align-items: center; gap: 12px; padding: 14px 16px; color: #222; text-decoration: none; transition: all 0.2s; cursor: pointer; font-weight: 500;" onclick="handleConvertAction('Copy to Appointment')" onmouseover="this.style.background='#f8f9fa'" onmouseout="this.style.background='#fff'">
            <i class="fas fa-calendar-plus" style="font-size: 14px; width: 16px; text-align: center; color: #b91c1c;"></i>
            <span>Copy to Appointment</span>
          </div>
        </div>
      </div>
      <div class="dropdown-group transactions-dropdown" style="margin-left:8px; position: relative; display: inline-block;">
        <button class="modal-action-btn transactions-btn" id="transactionsBtnINV" style="color: #fff; background: #444; border-radius: 10px; border: none; cursor: pointer; display: flex; align-items: center; gap: 8px; font-weight: 600; transition: all 0.2s;" onclick="toggleTransactionsDropdown(event)">
          <i class="fas fa-credit-card"></i> 
          <span>Transactions</span> 
          <i class="fas fa-caret-down" id="transactionsCaretINV" style="transition: transform 0.2s ease;"></i>
        </button>
        <div class="transactions-menu" id="transactionsMenuINV" style="position: absolute; top: calc(100% + 8px); right: 0; background: #fff; border: 1px solid #e5e7eb; border-radius: 10px; box-shadow: 0 8px 32px rgba(0,0,0,0.15); min-width: 220px; z-index: 9999; opacity: 0; visibility: hidden; transform: translateY(-8px); transition: all 0.3s ease; overflow: hidden;">
          <div class="transactions-option" style="display: flex; align-items: center; gap: 12px; padding: 14px 16px; color: #222; text-decoration: none; transition: all 0.2s; border-bottom: 1px solid #f3f4f6; cursor: pointer; font-weight: 500;" onclick="handleTransactionsAction('Payments')" onmouseover="this.style.background='#f8f9fa'" onmouseout="this.style.background='#fff'">
            <i class="fas fa-money-bill-wave" style="font-size: 14px; width: 16px; text-align: center; color: #b91c1c;"></i>
            <span>Payments</span>
          </div>
          <div class="transactions-option" style="display: flex; align-items: center; gap: 12px; padding: 14px 16px; color: #222; text-decoration: none; transition: all 0.2s; border-bottom: 1px solid #f3f4f6; cursor: pointer; font-weight: 500;" onclick="handleTransactionsAction('Insurance Excess')" onmouseover="this.style.background='#f8f9fa'" onmouseout="this.style.background='#fff'">
            <i class="fas fa-shield-alt" style="font-size: 14px; width: 16px; text-align: center; color: #b91c1c;"></i>
            <span>Insurance Excess</span>
          </div>
          <div class="transactions-option" style="display: flex; align-items: center; gap: 12px; padding: 14px 16px; color: #222; text-decoration: none; transition: all 0.2s; cursor: pointer; font-weight: 500;" onclick="handleTransactionsAction('Credit Note')" onmouseover="this.style.background='#f8f9fa'" onmouseout="this.style.background='#fff'">
            <i class="fas fa-receipt" style="font-size: 14px; width: 16px; text-align: center; color: #b91c1c;"></i>
            <span>Credit Note</span>
          </div>
        </div>
      </div>
      <div style="flex:1"></div>
      <div class="notice-bar" style="background: #b91c1c; color: #fff; padding: 8px 24px; border-radius: 10px; font-weight: 700; margin-right: 16px; border: 1.5px solid #a31a1a; box-shadow: 0 1px 4px rgba(185,28,28,0.08); cursor: pointer; transition: background 0.2s, box-shadow 0.2s; display: inline-block;">
        Notice
      </div>
      <button class="modal-action-btn danger" id="deleteInvoiceBtn" style="background: #b91c1c; color: #fff; border-radius: 10px; border: none; font-weight: 700; box-shadow: 0 2px 8px rgba(185,28,28,0.08);"><i class="fas fa-trash"></i> Delete</button>
      <button class="modal-close" id="closeNewInvoiceModal" style="margin-left: 12px; font-size:1.3em; color:#888; border-radius: 50%; transition: background 0.2s;"><i class="fas fa-times"></i></button>
    </div>
    <!-- Main Content Grid -->
    <div class="modal-main-grid" style="display: flex; gap: 24px; padding: 28px 28px 0 28px; background: var(--white);">
      <!-- Left Main Form -->
      <div class="invoice-main-form" style="flex: 2; min-width: 0;">
        <!-- Registration/Customer Form -->
        <div style="display: flex; gap: 24px;">
          <div style="flex: 2; min-width: 0;">
            <div class="registration-form" style="margin-bottom: 18px; background: #fafbfc; border-radius: 12px; border: 1.5px solid #e5e7eb; padding: 22px 22px 16px 22px; box-shadow: 0 2px 8px rgba(0,0,0,0.03); max-width: 100%;">
              <!-- Vehicle Details -->
              <div style="margin-bottom: 18px;">
                <div style="font-weight:700; color:#b91c1c; margin-bottom:8px;">Vehicle Details</div>
                <div style="display: grid; grid-template-columns: 160px 1fr 160px 1fr; gap: 12px 18px; align-items: center; max-width: 100%;">
                  <label>Registration</label>
                  <div style="display: flex; gap: 6px; align-items: center; max-width: 250px;">
                    <input type="text" placeholder="e.g. ABC123" style="width:100%; max-width:120px; border-radius:8px; border:1.5px solid #e5e7eb; padding:7px 12px;">
                    <button class="input-clear-btn" style="border-radius:8px;">X</button>
                    <button class="action-btn" style="padding:4px 14px; height:36px; font-size:0.98em; background:#b91c1c; color:#fff; border-radius:8px; font-weight:600; display:flex; align-items:center; gap:6px;"><i class="fas fa-search" style="font-size:1em;"></i> <span style="font-size:0.98em; font-weight:600;">VRM Lookup</span></button>
                  </div>
                  <label>Make / Model</label>
                  <input type="text" placeholder="e.g. Toyota Corolla" style="border-radius:8px; border:1.5px solid #e5e7eb; padding:7px 12px; max-width:220px; width:100%;">
                  <label>Derivative</label>
                  <input type="text" placeholder="e.g. 1.8 VVT-i" style="border-radius:8px; border:1.5px solid #e5e7eb; padding:7px 12px; max-width:220px; width:100%;">
                  <label>Chassis</label>
                  <input type="text" placeholder="e.g. JTDBR32E920123456" style="border-radius:8px; border:1.5px solid #e5e7eb; padding:7px 12px; max-width:220px; width:100%;">
                </div>
              </div>
              <!-- Engine Details -->
              <div style="margin-bottom: 18px; padding: 14px 0 0 0; border-top: 1px solid #ececec;">
                <div style="font-weight:700; color:#b91c1c; margin-bottom:8px;">Engine Details</div>
                <div style="display: grid; grid-template-columns: 160px 1fr 160px 1fr; gap: 12px 18px; align-items: center; max-width: 100%;">
                  <label>Engine CC</label>
                  <input type="text" placeholder="e.g. 1798" style="border-radius:8px; border:1.5px solid #e5e7eb; padding:7px 12px; max-width:220px; width:100%;">
                  <label>Fuel Type</label>
                  <input type="text" placeholder="e.g. Petrol" style="border-radius:8px; border:1.5px solid #e5e7eb; padding:7px 12px; max-width:220px; width:100%;">
                  <label>Engine Code</label>
                  <input type="text" placeholder="e.g. 2ZR-FE" style="border-radius:8px; border:1.5px solid #e5e7eb; padding:7px 12px; max-width:220px; width:100%;">
                  <label>Engine No</label>
                  <input type="text" placeholder="e.g. 1234567" style="border-radius:8px; border:1.5px solid #e5e7eb; padding:7px 12px; max-width:220px; width:100%;">
                </div>
              </div>
              <!-- Codes & Dates -->
              <div style="margin-bottom: 18px; padding: 14px 0 0 0; border-top: 1px solid #ececec;">
                <div style="font-weight:700; color:#b91c1c; margin-bottom:8px;">Codes & Dates</div>
                <div style="display: grid; grid-template-columns: 160px 1fr 160px 1fr; gap: 12px 18px; align-items: center; max-width: 100%;">
                  <label>Colour</label>
                  <input type="text" placeholder="e.g. Red" style="border-radius:8px; border:1.5px solid #e5e7eb; padding:7px 12px; max-width:220px; width:100%;">
                  <label>Paint Code</label>
                  <input type="text" placeholder="e.g. 3R3" style="border-radius:8px; border:1.5px solid #e5e7eb; padding:7px 12px; max-width:220px; width:100%;">
                  <label>Key Code</label>
                  <input type="text" placeholder="e.g. 1234" style="border-radius:8px; border:1.5px solid #e5e7eb; padding:7px 12px; max-width:220px; width:100%;">
                  <label>Radio Code</label>
                  <input type="text" placeholder="e.g. 0000" style="border-radius:8px; border:1.5px solid #e5e7eb; padding:7px 12px; max-width:220px; width:100%;">
                  <label>Mileage</label>
                  <input type="text" placeholder="e.g. 120000" style="border-radius:8px; border:1.5px solid #e5e7eb; padding:7px 12px; max-width:220px; width:100%;">
                  <label>Date Reg</label>
                  <input type="text" placeholder="e.g. 2020-01-01" style="border-radius:8px; border:1.5px solid #e5e7eb; padding:7px 12px; max-width:220px; width:100%;">
                </div>
              </div>
              <!-- Action Buttons -->
              <div style="display:flex; gap:10px; margin-top:12px;">
                <button class="action-btn secondary" style="flex:1; border-radius:8px; background:#f3f4f6; color:#b91c1c; font-weight:600;"><i class="fas fa-database"></i> Technical Data</button>
                <button class="action-btn secondary" style="flex:1; border-radius:8px; background:#f3f4f6; color:#b91c1c; font-weight:600;"><i class="fas fa-random"></i> VRM Transfer</button>
                <button class="action-btn secondary" style="flex:1; border-radius:8px; background:#f3f4f6; color:#b91c1c; font-weight:600;"><i class="fas fa-ellipsis-h"></i> More</button>
              </div>
            </div>
            <!-- Customer/Account Form -->
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
          </div>
          <!-- Right Sidebar (Additional Info, Extras, Totals) -->
          <div class="invoice-sidebar" style="flex: 1; min-width: 320px; display: flex; flex-direction: column; gap: 18px;">
            <div style="background:#fff; border-radius:12px; border:1.5px solid #e5e7eb; padding:18px 18px 10px 18px; box-shadow:0 2px 8px rgba(0,0,0,0.03); margin-bottom: 18px;">
              <div style="font-weight:700; color:#b91c1c; margin-bottom:8px;">Additional Info</div>
              <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 8px 12px; align-items: center;">
                <label>Rec</label>
                <input type="datetime-local" style="border-radius:8px; border:1.5px solid #e5e7eb; padding:7px 12px;">
                <label>Due</label>
                <input type="datetime-local" style="border-radius:8px; border:1.5px solid #e5e7eb; padding:7px 12px;">
                <label>Invoice Date</label>
                <input type="text" placeholder="Auto Entered" style="border-radius:8px; border:1.5px solid #e5e7eb; padding:7px 12px; color:#888; font-style:italic;" readonly>
                <label>Status</label>
                <select style="border-radius:8px; border:1.5px solid #e5e7eb; padding:7px 12px;">
                  <option>~</option>
                  <option>Open</option>
                  <option>In Progress</option>
                  <option>Completed</option>
                  <option>On Hold</option>
                </select>
                <label>Order Ref</label>
                <input type="text" style="border-radius:8px; border:1.5px solid #e5e7eb; padding:7px 12px;">
                <label>Department</label>
                <select style="border-radius:8px; border:1.5px solid #e5e7eb; padding:7px 12px;"></select>
                <label>Terms</label>
                <select style="border-radius:8px; border:1.5px solid #e5e7eb; padding:7px 12px;"></select>
                <label>Sales Advisor</label>
                <input type="text" style="border-radius:8px; border:1.5px solid #e5e7eb; padding:7px 12px;">
                <label>Technician</label>
                <select style="border-radius:8px; border:1.5px solid #e5e7eb; padding:7px 12px;"></select>
                <label>Road Tester</label>
                <input type="text" style="border-radius:8px; border:1.5px solid #e5e7eb; padding:7px 12px;">
              </div>
            </div>
            <div style="background:#fff; border-radius:12px; border:1.5px solid #e5e7eb; padding:18px 18px 10px 18px; box-shadow:0 2px 8px rgba(0,0,0,0.03);">
              <div style="font-weight:700; color:#b91c1c; margin-bottom:8px;">Extras</div>
              <div style="display:grid; grid-template-columns: 1fr 1fr; gap:8px;">
                <label>Sundries</label><select style="border-radius:8px; border:1.5px solid #e5e7eb; padding:5px 10px;"></select>
                <label>Lubricants</label><select style="border-radius:8px; border:1.5px solid #e5e7eb; padding:5px 10px;"></select>
                <label>Paint & Mat.</label><select style="border-radius:8px; border:1.5px solid #e5e7eb; padding:5px 10px;"></select>
              </div>
            </div>
            <div style="background:#fff; border-radius:12px; border:1.5px solid #e5e7eb; box-shadow:0 2px 8px rgba(185,28,28,0.04); padding: 18px 16px; margin-bottom: 0;">
              <div style="font-weight:700; margin-bottom:8px; color:#b91c1c;">Totals <span style='float:right; color:#888; font-weight:400;'>Pending</span></div>
              <div style="display:grid; grid-template-columns: 1fr 1fr; gap:8px;">
                <label>SubTotal</label><input type="text" value="0.00" readonly style="border-radius:8px; border:1.5px solid #e5e7eb; padding:5px 10px; background:#f9fafb;">
                <label>VAT</label><input type="text" value="0.00" readonly style="border-radius:8px; border:1.5px solid #e5e7eb; padding:5px 10px; background:#f9fafb;">
                <label>Total</label><input type="text" value="0.00" readonly style="border-radius:8px; border:1.5px solid #e5e7eb; padding:5px 10px; background:#f9fafb; font-weight:700;">
                <label>Excess</label><input type="text" value="0.00" readonly style="border-radius:8px; border:1.5px solid #e5e7eb; padding:5px 10px; background:#f9fafb;">
                <label>Receipts</label><input type="text" value="0.00" readonly style="border-radius:8px; border:1.5px solid #e5e7eb; padding:5px 10px; background:#f9fafb;">
                <label>Balance</label><input type="text" value="0.00" readonly style="border-radius:8px; border:1.5px solid #e5e7eb; padding:5px 10px; background:#fef9c3; font-weight:700;">
              </div>
            </div>
          </div>
        </div>
        <!-- Tabs Bar -->
        <div class="invoice-tabs" style="display: flex; background: #b91c1c; border-radius: 8px 8px 0 0; overflow: hidden; margin-top: 24px; margin-bottom: 12px;">
          <button class="tab-btn active" data-tab="history" style="flex:1; background:#d32f2f; color:#fff; border:none; padding:16px 0; font-weight:700; font-size:1.08em; border-right:1.5px solid #b91c1c; border-bottom:4px solid #fff; box-shadow:0 2px 8px rgba(185,28,28,0.10); transition:background 0.2s;">History</button>
          <button class="tab-btn" data-tab="description" style="flex:1; background:#b91c1c; color:#fff; border:none; padding:16px 0; font-weight:700; font-size:1.08em; border-right:1.5px solid #b91c1c; transition:background 0.2s;">Description</button>
          <button class="tab-btn" data-tab="labour" style="flex:1; background:#b91c1c; color:#fff; border:none; padding:16px 0; font-weight:700; font-size:1.08em; border-right:1.5px solid #b91c1c; transition:background 0.2s;">Labour</button>
          <button class="tab-btn" data-tab="parts" style="flex:1; background:#b91c1c; color:#fff; border:none; padding:16px 0; font-weight:700; font-size:1.08em; border-right:1.5px solid #b91c1c; transition:background 0.2s;">Parts</button>
          <button class="tab-btn" data-tab="advisories" style="flex:1; background:#b91c1c; color:#fff; border:none; padding:16px 0; font-weight:700; font-size:1.08em; border-right:1.5px solid #b91c1c; transition:background 0.2s;">Advisories</button>
          <button class="tab-btn" data-tab="activity" style="flex:1; background:#b91c1c; color:#fff; border:none; padding:16px 0; font-weight:700; font-size:1.08em; transition:background 0.2s;">Activity</button>
        </div>
        <!-- Tab Content Area -->
        <div id="tab-content-area" style="background: #fff; border-radius: 0 0 8px 8px; border: 1.5px solid #b91c1c; border-top: none; min-height: 220px; padding: 0 18px 18px 18px; margin-bottom: 18px;">
          <!-- History Tab -->
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
                <div id="inv-history-subtabs-bar" style="display:flex; align-items:center; background:#fff0f0; border-radius:8px 8px 0 0; margin-bottom:2px; border-bottom:2px solid #b91c1c; padding:0 8px; gap:10px; min-height:38px;">
                  <button class="inv-history-subtab active" data-subtab="prev-docs" style="background:#fff; color:#b91c1c; border:none; border-radius:6px 6px 0 0; font-weight:700; font-size:0.97em; padding:7px 18px; margin-right:2px; box-shadow:0 4px 16px rgba(185,28,28,0.10); border:1.5px solid #fff; border-bottom:none; transition:all 0.2s;">Prev Docs</button>
                  <button class="inv-history-subtab" data-subtab="prev-advisors" style="background:none; color:#b91c1c; border:none; border-radius:6px 6px 0 0; font-weight:600; font-size:0.97em; padding:7px 18px; margin-right:2px; transition:all 0.2s;">Prev Advisors</button>
                  <button class="inv-history-subtab" data-subtab="prev-labour" style="background:none; color:#b91c1c; border:none; border-radius:6px 6px 0 0; font-weight:600; font-size:0.97em; padding:7px 18px; margin-right:2px; transition:all 0.2s;">Prev Labour</button>
                  <button class="inv-history-subtab" data-subtab="prev-parts" style="background:none; color:#b91c1c; border:none; border-radius:6px 6px 0 0; font-weight:600; font-size:0.97em; padding:7px 18px; margin-right:2px; transition:all 0.2s;">Prev Parts</button>
                  <button class="inv-history-subtab" data-subtab="prev-appt" style="background:none; color:#b91c1c; border:none; border-radius:6px 6px 0 0; font-weight:600; font-size:0.97em; padding:7px 18px; margin-right:2px; transition:all 0.2s;">Prev Appt</button>
                  <span style="flex:1;"></span>
                  <button style="background:none; border:none; margin-left:8px; cursor:pointer; padding:4px; display:flex; align-items:center;" title="Print">
                    <svg width="18" height="18" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="5" y="13" width="10" height="5" rx="1.5" fill="#b91c1c"/><rect x="3" y="7" width="14" height="7" rx="2" fill="#fff" stroke="#b91c1c" stroke-width="1.2"/><rect x="6.5" y="2" width="7" height="4" rx="1" fill="#fff" stroke="#b91c1c" stroke-width="1.2"/><circle cx="15.5" cy="10.5" r="1" fill="#b91c1c"/></svg>
                  </button>
                </div>
                <!-- History Sub-Tab Content Area -->
                <div id="inv-history-subtab-content">
                  <table id="inv-prev-docs-table" class="history-table" style="width:100%; font-size:1em; border-spacing:0; border-collapse:separate; margin-bottom:0;">
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
                  <table id="inv-advisors-table-header" class="history-table" style="width:100%; font-size:1em; border-spacing:0; border-collapse:separate; margin-bottom:0; display:none;">
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
                  <table id="inv-labour-table-header" class="history-table" style="width:100%; font-size:1em; border-spacing:0; border-collapse:separate; margin-bottom:0; display:none;">
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
                  <table id="inv-parts-table-header" class="history-table" style="width:100%; font-size:1em; border-spacing:0; border-collapse:separate; margin-bottom:0; display:none;">
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
                  <table id="inv-appt-table-header" class="history-table" style="width:100%; font-size:1em; border-spacing:0; border-collapse:separate; margin-bottom:0; display:none;">
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
                  <!-- Other subtab tables (Prev Advisors, Prev Labour, Prev Parts, Prev Appt) can be added here, hidden by default -->
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane" id="tab-description" style="display:none; padding:40px 0 0 0; text-align:center; color:#888; font-size:1.1em; min-height:420px;">
            <div style="max-width: 700px; margin: 0 auto; text-align: left;">
              <div style="display: flex; gap: 10px; align-items: center; margin-bottom: 18px;">
                <select id="inv-preset-description-select" style="flex:1; border-radius: 8px; border: 1.5px solid #b91c1c; padding: 10px 14px; font-size: 1.08em; background: #fff; color: #b91c1c; font-weight: 600; outline: none; transition: border 0.2s;">
                  <option>Pre-set descriptions</option>
                </select>
                <button id="inv-openWorkDescriptionsModal" style="background: #b91c1c; color: #fff; border: none; border-radius: 8px; padding: 8px 18px; font-size: 1.18em; font-weight: 700; box-shadow: 0 2px 8px rgba(185,28,28,0.10); display: flex; align-items: center; justify-content: center; transition: background 0.18s; cursor: pointer;">
                  <i class="fas fa-plus"></i>
                </button>
              </div>
              <textarea id="inv-description-textarea" style="width: 100%; min-height: 260px; border-radius: 12px; border: 1.5px solid #e5e7eb; background: #fff; box-shadow: 0 2px 8px rgba(185,28,28,0.04); padding: 18px 16px; font-size: 1.13em; color: #232323; font-family: inherit; resize: vertical; outline: none; transition: border 0.2s;"></textarea>
              <div style="margin-top: 18px; text-align: center; color: #b91c1c; font-size: 1em; font-style: italic; opacity: 0.85;">
                This area is designed for brief descriptions of work, approximately 35 lines of content will print.<br/>
                <span style="color: #888; font-size: 0.98em;">Use the <b>+</b> button above to access pre-saved work descriptions for quick insertion.</span>
              </div>
            </div>
            <!-- Work Descriptions Modal -->
            <div id="inv-workDescriptionsModal" style="display:none; position:fixed; top:0; left:0; width:100vw; height:100vh; background:rgba(0,0,0,0.25); backdrop-filter:blur(4px); z-index:2000; align-items:center; justify-content:center; animation:fadeIn 0.3s ease-out;">
              <div style="background:linear-gradient(135deg, #fff 0%, #f8f9fa 100%); border-radius:20px; box-shadow:0 20px 60px rgba(0,0,0,0.3), 0 8px 32px rgba(185,28,28,0.15), inset 0 1px 0 rgba(255,255,255,0.8); min-width:900px; min-height:480px; max-width:98vw; max-height:95vh; display:flex; flex-direction:column; position:relative; border:3px solid #b91c1c; transform:scale(0.95); animation:modalSlideIn 0.4s ease-out forwards; overflow:hidden;">
                <!-- Header with Gradient -->
                <div style="background:linear-gradient(135deg, #1f2937 0%, #374151 50%, #4b5563 100%); color:#fff; border-radius:20px 20px 0 0; padding:18px 24px 14px 24px; font-weight:800; font-size:1.25em; display:flex; align-items:center; justify-content:space-between; border-bottom:3px solid #b91c1c; box-shadow:0 4px 20px rgba(0,0,0,0.2), inset 0 1px 0 rgba(255,255,255,0.1); text-shadow:0 2px 4px rgba(0,0,0,0.3);">
                  <div style="display:flex; align-items:center; gap:12px;">
                    <div style="width:8px; height:8px; background:#b91c1c; border-radius:50%; box-shadow:0 0 8px rgba(185,28,28,0.6);"></div>
                    <span style="background:linear-gradient(45deg, #fff, #e5e7eb); -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;">Work Descriptions</span>
                  </div>
                  <button id="inv-closeWorkDescriptionsModal" style="background:linear-gradient(135deg, #b91c1c 0%, #dc2626 100%); color:#fff; border:none; border-radius:12px; width:42px; height:42px; font-size:1.4em; font-weight:700; display:flex; align-items:center; justify-content:center; cursor:pointer; margin-left:10px; box-shadow:0 4px 12px rgba(185,28,28,0.3), inset 0 1px 0 rgba(255,255,255,0.2); transition:all 0.2s ease; transform:scale(1);" onmouseover="this.style.transform='scale(1.1)'; this.style.boxShadow='0 6px 16px rgba(185,28,28,0.4), inset 0 1px 0 rgba(255,255,255,0.3)'" onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='0 4px 12px rgba(185,28,28,0.3), inset 0 1px 0 rgba(255,255,255,0.2)'"><i class="fas fa-times"></i></button>
                </div>
                <!-- Top Buttons with Enhanced Styling -->
                <div style="display:flex; border-bottom:3px solid #b91c1c; background:linear-gradient(135deg, #374151 0%, #4b5563 100%); box-shadow:0 2px 8px rgba(0,0,0,0.1);">
                  <button id="inv-workDescCloseBtn" style="flex:1; background:linear-gradient(135deg, #374151 0%, #4b5563 100%); color:#fff; border:none; border-radius:0; font-weight:700; font-size:1.1em; padding:14px 0; cursor:pointer; border-right:2px solid #b91c1c; transition:all 0.2s ease; text-shadow:0 1px 2px rgba(0,0,0,0.3); box-shadow:inset 0 1px 0 rgba(255,255,255,0.1);" onmouseover="this.style.background='linear-gradient(135deg, #4b5563 0%, #6b7280 100%)'; this.style.boxShadow='inset 0 1px 0 rgba(255,255,255,0.2)'" onmouseout="this.style.background='linear-gradient(135deg, #374151 0%, #4b5563 100%)'; this.style.boxShadow='inset 0 1px 0 rgba(255,255,255,0.1)'">Close</button>
                  <button id="inv-workDescNewBtn" style="flex:1; background:linear-gradient(135deg, #b91c1c 0%, #dc2626 100%); color:#fff; border:none; border-radius:0; font-weight:700; font-size:1.1em; padding:14px 0; cursor:pointer; transition:all 0.2s ease; text-shadow:0 1px 2px rgba(0,0,0,0.3); box-shadow:inset 0 1px 0 rgba(255,255,255,0.2), 0 2px 8px rgba(185,28,28,0.2);" onmouseover="this.style.background='linear-gradient(135deg, #dc2626 0%, #ef4444 100%)'; this.style.boxShadow='inset 0 1px 0 rgba(255,255,255,0.3), 0 4px 12px rgba(185,28,28,0.3)'" onmouseout="this.style.background='linear-gradient(135deg, #b91c1c 0%, #dc2626 100%)'; this.style.boxShadow='inset 0 1px 0 rgba(255,255,255,0.2), 0 2px 8px rgba(185,28,28,0.2)'">New</button>
                </div>
                <!-- Content with Enhanced Layout -->
                <div style="flex:1; display:flex; min-height:320px; border-bottom-left-radius:20px; border-bottom-right-radius:20px; overflow:hidden;">
                  <!-- Left: List with Glass Effect -->
                  <div id="inv-workDescListCol" style="width:240px; background:linear-gradient(135deg, #f3f4f6 0%, #e5e7eb 100%); border-right:3px solid #b91c1c; display:flex; flex-direction:column; border-bottom-left-radius:20px; box-shadow:inset 0 2px 8px rgba(0,0,0,0.05); position:relative;">
                    <div style="font-weight:800; background:linear-gradient(135deg, #b91c1c 0%, #dc2626 100%); color:#fff; padding:12px 16px; border-bottom:3px solid #b91c1c; text-shadow:0 1px 2px rgba(0,0,0,0.3); box-shadow:0 2px 8px rgba(185,28,28,0.2); font-size:1.05em; letter-spacing:0.5px;">Description</div>
                    <div id="inv-workDescList" style="flex:1; overflow-y:auto; background:rgba(255,255,255,0.7); backdrop-filter:blur(10px);"></div>
                  </div>
                  <!-- Right: Editor with Enhanced Styling -->
                  <div style="flex:1; background:linear-gradient(135deg, #fff 0%, #f8f9fa 100%); display:flex; flex-direction:column; border-bottom-right-radius:20px; padding:28px 28px 22px 28px; box-shadow:inset 0 2px 8px rgba(0,0,0,0.03);">
                    <div style="display:flex; align-items:center; gap:16px; margin-bottom:22px;">
                      <label for="inv-workDescName" style="font-weight:700; color:#1f2937; min-width:70px; font-size:1.05em; text-shadow:0 1px 2px rgba(0,0,0,0.1);">Name</label>
                      <input id="inv-workDescName" type="text" style="flex:1; border-radius:12px; border:2px solid #b91c1c; padding:12px 16px; font-size:1.1em; color:#1f2937; background:rgba(255,255,255,0.9); font-weight:600; outline:none; transition:all 0.3s ease; box-shadow:0 2px 8px rgba(185,28,28,0.1), inset 0 1px 0 rgba(255,255,255,0.8);" placeholder="Enter description name..." />
                      <span style="color:#6b7280; font-size:0.95em; font-style:italic; background:rgba(185,28,28,0.1); padding:6px 12px; border-radius:8px; border-left:3px solid #b91c1c;">Shown in drop down list</span>
                    </div>
                    <textarea id="inv-workDescText" style="flex:1; width:100%; min-height:200px; border-radius:16px; border:2px solid #b91c1c; background:rgba(255,255,255,0.9); padding:18px 16px; font-size:1.1em; color:#1f2937; font-family:inherit; resize:vertical; outline:none; transition:all 0.3s ease; box-shadow:0 4px 16px rgba(185,28,28,0.1), inset 0 1px 0 rgba(255,255,255,0.8);" placeholder="Enter your work description here..."></textarea>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane" id="tab-labour" style="display:none; padding:18px; background:#ededed; border-radius:0 0 8px 8px; min-height:420px; width:100%; box-sizing:border-box;">
            <div style="width:100%; display:flex; flex-direction:column; gap:0;">
              <table id="inv-labourTable" style="width:100%; border-collapse:separate; border-spacing:0; font-size:1em; background:#ededed; border-radius:8px; overflow:hidden; margin:0;">
                <thead>
                  <tr style="background:#444; color:#fff; font-size:1.08em;">
                    <th style="width:36px; background:#555; border-right:1.5px solid #888; text-align:center;">
                      <input type="checkbox" id="inv-selectAllLabourRows" style="accent-color:#b91c1c; width:18px; height:18px; border-radius:4px; box-shadow:0 1px 2px #bbb; cursor:pointer;" title="Select All" />
                    </th>
                    <th style="width:36px; background:#555; border-right:1.5px solid #888; text-align:center;">
                      <button id="inv-moveDescendBtn" class="move-descend-btn" style="width:32px; height:32px; border-radius:6px; border:none; background:none; color:#fff; font-weight:900; font-size:1.7em; box-shadow:none; cursor:pointer; display:inline-flex; align-items:center; justify-content:center; transition:background 0.15s, box-shadow 0.2s, color 0.2s, transform 0.15s;" title="Move last row to top (Descending)">&#8595;</button>
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
                <tbody id="inv-labourTableBody">
                  <!-- Dynamic rows will be inserted here by JS -->
                </tbody>
                <tfoot>
                  <tr id="inv-jobLookupRow" style="background:#fcfbe3; cursor:pointer;">
                    <td style="text-align:center; color:#7ca16b;"><i class="fas fa-search"></i></td>
                    <td colspan="1"></td>
                    <td colspan="6" style="color:#7ca16b; font-style:italic;">Job Lookup</td>
                    <td style="text-align:right; padding-right:10px; color:#7ca16b;">0.00</td>
                  </tr>
                </tfoot>
              </table>
              <div id="inv-globalDiscountRow" style="width:100%; display:flex; justify-content:flex-end; align-items:center; background:linear-gradient(90deg,#fff 0%,#ffeaea 100%); border-top:2.5px solid #b91c1c; padding:14px 18px 10px 18px; font-size:1.18em; color:#b91c1c; font-weight:800; box-shadow:0 2px 8px rgba(185,28,28,0.08); margin-top:2px; border-radius:0 0 8px 8px;">
                <span style="margin-right:auto; color:#b91c1c; font-size:1.08em; font-weight:900; letter-spacing:0.5px; text-shadow:0 1px 2px #fff,0 2px 8px #f8d7da;">Global Labour Discount</span>
                <span id="inv-globalDiscountTotal" style="font-weight:900; color:#fff; background:#b91c1c; border-radius:8px; padding:6px 22px; font-size:1.18em; box-shadow:0 2px 8px rgba(185,28,28,0.13);">0.00</span>
              </div>
              <div id="inv-labourActionBar" style="display:none; margin:8px 0 0 0; width:100%;">
                <div style="display:flex;">
                  <button id="inv-deleteMarkedLabourBtn" style="flex:1; background:#b91c1c; color:#fff; font-weight:700; font-size:1.08em; border:none; border-right:2px solid #fff; padding:14px 0; cursor:pointer; transition:background 0.18s;">Delete Marked Labour Lines</button>
                  <button id="inv-moveMarkedLabourBtn" style="flex:1; background:#256029; color:#fff; font-weight:700; font-size:1.08em; border:none; padding:14px 0; cursor:pointer; transition:background 0.18s;">Move ALL Marked to Estimate</button>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane" id="tab-parts" style="display:none; width:100%; box-sizing:border-box; padding:0; background:#ededed; border-radius:0 0 8px 8px; min-height:420px;">
            <div style="padding:0; width:100%;">
              <table id="inv-partsTable" style="width:100%; border-collapse:separate; border-spacing:0; font-size:1em; background:#ededed; border-radius:8px; overflow:hidden;">
                <thead>
                  <tr style="background:#444; color:#fff; font-size:1.08em;">
                    <th style="width:36px; background:#555; border-right:1.5px solid #888; text-align:center;">
                      <input type="checkbox" id="inv-selectAllPartsRows" style="accent-color:#b91c1c; width:18px; height:18px; border-radius:4px; box-shadow:0 1px 2px #bbb; cursor:pointer;" title="Select All" />
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
                <tbody id="inv-partsTableBody">
                  <!-- Dynamic rows will be inserted here by JS -->
                </tbody>
                <tfoot>
                  <tr id="inv-partLookupRow" style="background:#fcfbe3; cursor:pointer;">
                    <td style="text-align:center; color:#b91c1c;"><i class="fas fa-search"></i></td>
                    <td colspan="2" style="color:#b91c1c; font-style:italic;">Part Lookup</td>
                    <td colspan="6"></td>
                    <td style="text-align:right; padding-right:10px; color:#b91c1c;">0.00</td>
                  </tr>
                </tfoot>
              </table>
              <div id="inv-globalPartsDiscountRow" style="display:flex; align-items:center; background:linear-gradient(90deg,#fff 0%,#ffeaea 100%); border-top:2.5px solid #b91c1c; padding:18px 18px 10px 18px; font-size:1.18em; color:#b91c1c; font-weight:800; box-shadow:0 2px 8px rgba(185,28,28,0.08); margin-top:2px; border-radius:0 0 8px 8px; gap:10px;">
                <span style="margin-right:auto; color:#b91c1c; font-size:1.08em; font-weight:900; letter-spacing:0.5px; text-shadow:0 1px 2px #fff,0 2px 8px #f8d7da;">Global Parts Discount</span>
                <span id="inv-globalPartsDiscountTotal" style="font-weight:900; color:#fff; background:#b91c1c; border-radius:8px; padding:6px 22px; font-size:1.18em; box-shadow:0 2px 8px rgba(185,28,28,0.13);">0.00</span>
          </div>
              <div id="inv-partsActionBar" style="display:none; width:100%; margin:8px 0 0 0;">
                <div style="display:flex; gap:8px; justify-content:flex-end;">
                  <button id="inv-deleteMarkedPartsBtn" style="background:#b91c1c; color:#fff; font-weight:700; font-size:1.08em; border:none; border-radius:6px; padding:18px 0; flex:1; cursor:pointer; transition:background 0.18s;">Delete Marked Parts Lines</button>
                  <button id="inv-moveMarkedPartsBtn" style="background:#256029; color:#fff; font-weight:700; font-size:1.08em; border:none; border-radius:6px; padding:18px 0; flex:1; cursor:pointer; transition:background 0.18s;">Move ALL Marked to Estimate</button>
          </div>
          </div>
              <div style="background:#fafafa; border-radius:0 0 12px 12px; min-height:120px; margin-top:0; border:1.5px solid #f3f4f6; border-top:none; box-shadow:0 2px 8px rgba(185,28,28,0.03); padding:24px 18px 24px 18px;"></div>
        </div>
      </div>
          <div class="tab-pane" id="tab-advisories" style="display:none; width:100%; box-sizing:border-box; padding:0; background:#ededed; border-radius:0 0 8px 8px; min-height:420px;">
            <div style="display:flex; gap:18px; align-items:stretch; width:100%; min-width:0;">
              <!-- Advisories Table -->
              <div style="flex:2; min-width:0; display:flex; flex-direction:column;">
                <table id="inv-advisoriesTable" style="width:100%; border-collapse:separate; border-spacing:0; font-size:1em; background:#ededed; border-radius:8px 0 0 8px; overflow:hidden;">
                  <thead>
                    <tr style="background:#b91c1c; color:#fff; font-size:1.08em;">
                      <th style="width:36px; background:#a31a1a; border-right:1.5px solid #fff; text-align:center;">
                        <input type="checkbox" id="inv-selectAllAdvisoryRows" style="accent-color:#b91c1c; width:18px; height:18px; border-radius:4px; box-shadow:0 1px 2px #bbb; cursor:pointer;" title="Select All" />
                      </th>
                      <th style="width:36px; background:#a31a1a; border-right:1.5px solid #fff; text-align:center;"></th>
                      <th style="text-align:left; padding:8px 10px; font-weight:700;">Description</th>
                    </tr>
                  </thead>
                  <tbody id="inv-advisoriesTableBody">
                    <!-- Dynamic rows will be inserted here by JS -->
                  </tbody>
                  <tfoot>
                    <tr id="inv-advisoryAddRow" style="background:#fffbe6; cursor:pointer;">
                      <td style="text-align:center; color:#b91c1c;"><i class="fas fa-plus"></i></td>
                      <td></td>
                      <td><input id="inv-advisoryAddInput" type="text" placeholder="Add new advisory..." style="width:100%; border-radius:4px; border:1.5px solid #e5e7eb; padding:6px 10px; font-size:1em; background:#fffbe6; color:#b91c1c; font-style:italic;"></td>
                    </tr>
                  </tfoot>
                </table>
    </div>
              <!-- Internal Notes Panel -->
              <div style="flex:1; min-width:0; background:#fff8f8; border-radius:0 8px 8px 0; border:1.5px solid #e5e7eb; border-left:none; display:flex; flex-direction:column;">
                <div style="background:#b91c1c; color:#fff; font-weight:700; padding:6px 12px; border-radius:0 8px 0 0; font-size:0.98em; letter-spacing:0.01em; box-shadow:0 2px 8px rgba(185,28,28,0.08);">Internal Notes <span style='font-weight:400; font-size:0.93em;'>(not printed)</span></div>
                <textarea id="inv-advisoryNotes" style="flex:1; width:100%; min-height:120px; border:none; border-radius:0 0 8px 0; padding:12px 14px; font-size:1.01em; color:#b91c1c; background:#fffbe6; resize:vertical; box-shadow:0 1px 4px 0 rgba(185,28,28,0.03); margin-top:0;"></textarea>
  </div>
</div> 
          </div>
          <div class="tab-pane" id="tab-activity" style="display:none; width:100%; box-sizing:border-box; padding:0; background:#ededed; border-radius:0 0 8px 8px; min-height:420px;">
            <div style="padding:0; overflow-x:auto; width:100%;">
              <table id="inv-activityTable" style="width:100%; min-width:800px; border-collapse:separate; border-spacing:0; font-size:1em; background:#ededed; border-radius:12px; box-shadow:0 4px 18px rgba(185,28,28,0.07); overflow:hidden; font-family:inherit;">
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
                <tbody id="inv-activityTableBody">
                  <!-- Dynamic rows will be inserted here by JS -->
                </tbody>
              </table>
              <div id="inv-activityEmptyState" style="display:none; text-align:center; color:#b91c1c; font-size:1.13em; font-weight:600; padding:48px 0 32px 0;">
                <i class="fas fa-info-circle" style="font-size:2.2em; margin-bottom:10px; color:#fca5a5;"></i><br/>
                No activity yet. All changes will appear here!
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> 

<script>
// --- Invoice Advisories Tab Logic ---
let invAdvisoriesRows = [
  { description: 'Sample 1', checked: false },
  { description: 'Sample 2', checked: false },
  { description: 'Sample 3', checked: false },
  { description: 'sample 4', checked: false }
];

function invRenderAdvisoriesRows() {
  const tbody = document.getElementById('inv-advisoriesTableBody');
  tbody.innerHTML = '';
  invAdvisoriesRows.forEach((row, idx) => {
    const tr = document.createElement('tr');
    tr.style.background = idx % 2 === 0 ? '#fff' : '#f9f9f9';
    
    // Checkbox
    const tdCheck = document.createElement('td');
    const cb = document.createElement('input');
    cb.type = 'checkbox';
    cb.checked = row.checked;
    cb.style.accentColor = '#b91c1c';
    cb.onchange = function() { 
      row.checked = this.checked; 
      invUpdateAdvisoriesActionBar();
    };
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
      if (idx === 0 && invAdvisoriesRows.length > 1) {
        const temp = invAdvisoriesRows[idx+1];
        invAdvisoriesRows[idx+1] = invAdvisoriesRows[idx];
        invAdvisoriesRows[idx] = temp;
      } else if (idx > 0) {
        const temp = invAdvisoriesRows[idx-1];
        invAdvisoriesRows[idx-1] = invAdvisoriesRows[idx];
        invAdvisoriesRows[idx] = temp;
      }
      invRenderAdvisoriesRows();
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
    
    tbody.appendChild(tr);
  });
  
  // Always update action bar after rendering
  invUpdateAdvisoriesActionBar();
}

// Advisory Add Input Handler
document.getElementById('inv-advisoryAddInput').onkeypress = function(e) {
  if (e.key === 'Enter' && this.value.trim()) {
    invAdvisoriesRows.push({ description: this.value.trim(), checked: false });
    this.value = '';
    invRenderAdvisoriesRows();
  }
};

// Advisory Add Row Click Handler
document.getElementById('inv-advisoryAddRow').onclick = function() {
  const input = document.getElementById('inv-advisoryAddInput');
  if (input.value.trim()) {
    invAdvisoriesRows.push({ description: input.value.trim(), checked: false });
    input.value = '';
    invRenderAdvisoriesRows();
  } else {
    input.focus();
  }
};

// Initialize Advisories Tab
invRenderAdvisoriesRows();

// Add logic for select all
setTimeout(function() {
  const selectAll = document.getElementById('inv-selectAllAdvisoryRows');
  if (selectAll) {
    selectAll.onclick = function() {
      const tbody = document.getElementById('inv-advisoriesTableBody');
      const checkboxes = tbody.querySelectorAll('input[type=checkbox]');
      checkboxes.forEach((cb, i) => { 
        cb.checked = selectAll.checked; 
        invAdvisoriesRows[i].checked = selectAll.checked;
      });
      invUpdateAdvisoriesActionBar();
    };
  }
}, 10);

// Update Advisories Action Bar
function invUpdateAdvisoriesActionBar() {
  const tbody = document.getElementById('inv-advisoriesTableBody');
  const checkboxes = tbody.querySelectorAll('input[type=checkbox]');
  const anyChecked = Array.from(checkboxes).some(cb => cb.checked);
  
  // Update select-all checkbox state
  const selectAll = document.getElementById('inv-selectAllAdvisoryRows');
  if (selectAll) {
    const allChecked = checkboxes.length > 0 && Array.from(checkboxes).every(cb => cb.checked);
    selectAll.checked = allChecked;
    // Indeterminate state for partial selection
    selectAll.indeterminate = !allChecked && anyChecked;
  }
}

// Internal Notes Handler
document.getElementById('inv-advisoryNotes').oninput = function() {
  // You can add logic here to save notes to localStorage or send to server
  console.log('Invoice advisory notes updated:', this.value);
};

// Tab switching logic
document.addEventListener('DOMContentLoaded', function() {
  const tabButtons = document.querySelectorAll('.tab-btn');
  const tabPanes = document.querySelectorAll('.tab-pane');
  
  tabButtons.forEach(button => {
    button.addEventListener('click', function() {
      const targetTab = this.getAttribute('data-tab');
      
      // Remove active class from all buttons and panes
      tabButtons.forEach(btn => {
        btn.classList.remove('active');
        btn.style.background = '#b91c1c';
        btn.style.borderBottom = 'none';
      });
      tabPanes.forEach(pane => {
        pane.style.display = 'none';
      });
      
      // Add active class to clicked button and show corresponding pane
      this.classList.add('active');
      this.style.background = '#d32f2f';
      this.style.borderBottom = '4px solid #fff';
      this.style.boxShadow = '0 2px 8px rgba(185,28,28,0.10)';
      
      const targetPane = document.getElementById('tab-' + targetTab);
      if (targetPane) {
        targetPane.style.display = 'block';
      }
    });
  });
});
</script>

<script>
// --- Invoice Parts Tab Logic ---
const invVatOptionsParts = [
  { code: 'T0', label: 'VAT FREE 0%', rate: 0 },
  { code: 'T1', label: 'EXC VAT 20%', rate: 0.2 },
  { code: 'T2', label: 'CUSTOM 30%', rate: 0.3 }
];

let invPartsRows = [
  { partNumber: '1001', description: 'Part Name here', cost: 250.00, qty: 1, unitPrice: 5000.00, discount: 10, vat: 'T1' },
  { partNumber: '1002', description: 'Part Name here', cost: 150.00, qty: 1, unitPrice: '', discount: '', vat: 'T1' },
  { partNumber: '1003', description: 'Part Name here', cost: 75.50, qty: 1, unitPrice: '', discount: '', vat: 'T1' }
];

function invCalcPartsSubTotal(row) {
  let qty = parseFloat(row.qty) || 0;
  let price = parseFloat(row.unitPrice) || 0;
  let disc = parseFloat(row.discount) || 0;
  let vat = invVatOptionsParts.find(v => v.code === row.vat)?.rate || 0;
  let subtotal = qty * price * (1 - disc/100) * (1 + vat);
  return subtotal ? subtotal.toFixed(2) : '0.00';
}

function invRenderPartsRows() {
  const tbody = document.getElementById('inv-partsTableBody');
  tbody.innerHTML = '';
  invPartsRows.forEach((row, idx) => {
    const tr = document.createElement('tr');
    tr.style.background = idx % 2 === 0 ? '#fff' : '#f9f9f9';
    
    // Checkbox
    const tdCheck = document.createElement('td');
    const cb = document.createElement('input');
    cb.type = 'checkbox';
    cb.style.accentColor = '#b91c1c';
    cb.onchange = invUpdatePartsActionBar;
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
      if (idx === 0 && invPartsRows.length > 1) {
        const temp = invPartsRows[idx+1];
        invPartsRows[idx+1] = invPartsRows[idx];
        invPartsRows[idx] = temp;
      } else if (idx > 0) {
        const temp = invPartsRows[idx-1];
        invPartsRows[idx-1] = invPartsRows[idx];
        invPartsRows[idx] = temp;
      }
      invRenderPartsRows();
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
    inpCost.step = '0.01';
    inpCost.value = row.cost;
    inpCost.style.width = '60px';
    inpCost.style.border = 'none';
    inpCost.style.background = 'transparent';
    inpCost.style.color = '#232323';
    inpCost.style.textAlign = 'center';
    inpCost.oninput = function() { row.cost = this.value; invRenderPartsRows(); };
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
    inpQty.oninput = function() { row.qty = this.value; invRenderPartsRows(); };
    tdQty.appendChild(inpQty);
    tr.appendChild(tdQty);
    
    // Unit Price
    const tdPrice = document.createElement('td');
    const inpPrice = document.createElement('input');
    inpPrice.type = 'number';
    inpPrice.step = '0.01';
    inpPrice.value = row.unitPrice;
    inpPrice.style.width = '80px';
    inpPrice.style.border = 'none';
    inpPrice.style.background = 'transparent';
    inpPrice.style.color = '#232323';
    inpPrice.style.textAlign = 'right';
    inpPrice.oninput = function() { row.unitPrice = this.value; invRenderPartsRows(); };
    tdPrice.appendChild(inpPrice);
    tr.appendChild(tdPrice);
    
    // Discount
    const tdDisc = document.createElement('td');
    const inpDisc = document.createElement('input');
    inpDisc.type = 'number';
    inpDisc.value = row.discount;
    inpDisc.style.width = '48px';
    inpDisc.style.border = 'none';
    inpDisc.style.background = 'transparent';
    inpDisc.style.color = '#232323';
    inpDisc.style.textAlign = 'center';
    inpDisc.oninput = function() { row.discount = this.value; invRenderPartsRows(); };
    tdDisc.appendChild(inpDisc);
    tr.appendChild(tdDisc);
    
    // VAT
    const tdVat = document.createElement('td');
    const selVat = document.createElement('select');
    selVat.style.width = '100%';
    selVat.style.border = 'none';
    selVat.style.background = 'transparent';
    selVat.style.color = '#232323';
    selVat.style.fontSize = '0.9em';
    selVat.style.textAlign = 'center';
    invVatOptionsParts.forEach(vat => {
      const option = document.createElement('option');
      option.value = vat.code;
      option.textContent = vat.code;
      if (vat.code === row.vat) option.selected = true;
      selVat.appendChild(option);
    });
    selVat.onchange = function() { row.vat = this.value; invRenderPartsRows(); };
    tdVat.appendChild(selVat);
    tr.appendChild(tdVat);
    
    // SubTotal
    const tdSub = document.createElement('td');
    tdSub.style.textAlign = 'right';
    tdSub.style.paddingRight = '10px';
    tdSub.textContent = invCalcPartsSubTotal(row);
    tr.appendChild(tdSub);
    tbody.appendChild(tr);
  });
  
  // Update global discount
  let total = invPartsRows.reduce((sum, row) => sum + parseFloat(invCalcPartsSubTotal(row)), 0);
  document.getElementById('inv-globalPartsDiscountTotal').textContent = total.toFixed(2);
  
  // Always update action bar after rendering
  invUpdatePartsActionBar();
}

// Part Lookup Row Click Handler
document.getElementById('inv-partLookupRow').onclick = function() {
  invPartsRows.push({ partNumber: '', description: '', cost: 0.00, qty: 1, unitPrice: 0.00, discount: 0, vat: 'T1' });
  invRenderPartsRows();
};

// Initialize Parts Tab
invRenderPartsRows();

// Add logic for select all
setTimeout(function() {
  const selectAll = document.getElementById('inv-selectAllPartsRows');
  if (selectAll) {
    selectAll.onclick = function() {
      const tbody = document.getElementById('inv-partsTableBody');
      const checkboxes = tbody.querySelectorAll('input[type=checkbox]');
      checkboxes.forEach(cb => { cb.checked = selectAll.checked; });
      invUpdatePartsActionBar();
    };
  }
}, 10);

// Update Parts Action Bar
function invUpdatePartsActionBar() {
  const tbody = document.getElementById('inv-partsTableBody');
  const checkboxes = tbody.querySelectorAll('input[type=checkbox]');
  const anyChecked = Array.from(checkboxes).some(cb => cb.checked);
  const bar = document.getElementById('inv-partsActionBar');
  if (bar) bar.style.display = anyChecked ? '' : 'none';
  
  // Update select-all checkbox state
  const selectAll = document.getElementById('inv-selectAllPartsRows');
  if (selectAll) {
    const allChecked = checkboxes.length > 0 && Array.from(checkboxes).every(cb => cb.checked);
    selectAll.checked = allChecked;
    // Indeterminate state for partial selection
    selectAll.indeterminate = !allChecked && anyChecked;
  }
}

// Patch all checkboxes to update the bar on change
setTimeout(function() {
  const tbody = document.getElementById('inv-partsTableBody');
  const checkboxes = tbody.querySelectorAll('input[type=checkbox]');
  checkboxes.forEach(cb => {
    cb.onchange = invUpdatePartsActionBar;
  });
  invUpdatePartsActionBar();
}, 20);

// Add logic for action bar buttons
setTimeout(function() {
  const delBtn = document.getElementById('inv-deleteMarkedPartsBtn');
  if (delBtn) {
    delBtn.onclick = function() {
      const tbody = document.getElementById('inv-partsTableBody');
      const checkboxes = tbody.querySelectorAll('input[type=checkbox]');
      let toDelete = [];
      checkboxes.forEach((cb, i) => { if (cb.checked) toDelete.push(i); });
      // Remove from end to avoid index shift
      toDelete.reverse().forEach(idx => invPartsRows.splice(idx, 1));
      invRenderPartsRows();
      invUpdatePartsActionBar();
    };
  }
  const moveBtn = document.getElementById('inv-moveMarkedPartsBtn');
  if (moveBtn) {
    moveBtn.onclick = function() {
      // Implement move to estimate logic here if needed
      alert('Move ALL Marked to Estimate (to be implemented)');
    };
  }
}, 30);
</script>

<script>
// --- Invoice Activity Tab Logic ---
let invActivityRows = [
  { when: '08/07/2025', docInfo: '12:51', user: 'Administrator', description: 'Invoice created', from: '', to: '' }
];

function invRenderActivityRows() {
  const tbody = document.getElementById('inv-activityTableBody');
  const emptyState = document.getElementById('inv-activityEmptyState');
  
  if (invActivityRows.length === 0) {
    tbody.innerHTML = '';
    emptyState.style.display = 'block';
    return;
  }
  
  emptyState.style.display = 'none';
  tbody.innerHTML = '';
  
  invActivityRows.forEach((row, idx) => {
    const tr = document.createElement('tr');
    tr.style.background = idx % 2 === 0 ? '#fff' : '#f9f9f9';
    tr.style.transition = 'background-color 0.2s ease';
    
    // When
    const tdWhen = document.createElement('td');
    tdWhen.style.padding = '12px 14px';
    tdWhen.style.borderBottom = '1px solid #e5e7eb';
    tdWhen.style.fontWeight = '600';
    tdWhen.style.color = '#374151';
    tdWhen.textContent = row.when;
    tr.appendChild(tdWhen);
    
    // Doc Info
    const tdDocInfo = document.createElement('td');
    tdDocInfo.style.padding = '12px 14px';
    tdDocInfo.style.borderBottom = '1px solid #e5e7eb';
    tdDocInfo.style.textAlign = 'center';
    tdDocInfo.style.fontWeight = '500';
    tdDocInfo.style.color = '#6b7280';
    tdDocInfo.textContent = row.docInfo;
    tr.appendChild(tdDocInfo);
    
    // User
    const tdUser = document.createElement('td');
    tdUser.style.padding = '12px 14px';
    tdUser.style.borderBottom = '1px solid #e5e7eb';
    tdUser.style.textAlign = 'center';
    tdUser.style.fontWeight = '600';
    tdUser.style.color = '#b91c1c';
    tdUser.textContent = row.user;
    tr.appendChild(tdUser);
    
    // Description
    const tdDesc = document.createElement('td');
    tdDesc.style.padding = '12px 14px';
    tdDesc.style.borderBottom = '1px solid #e5e7eb';
    tdDesc.style.fontWeight = '500';
    tdDesc.style.color = '#1f2937';
    tdDesc.textContent = row.description;
    tr.appendChild(tdDesc);
    
    // From
    const tdFrom = document.createElement('td');
    tdFrom.style.padding = '12px 14px';
    tdFrom.style.borderBottom = '1px solid #e5e7eb';
    tdFrom.style.textAlign = 'center';
    tdFrom.style.fontWeight = '500';
    tdFrom.style.color = '#6b7280';
    tdFrom.textContent = row.from;
    tr.appendChild(tdFrom);
    
    // To
    const tdTo = document.createElement('td');
    tdTo.style.padding = '12px 14px';
    tdTo.style.borderBottom = '1px solid #e5e7eb';
    tdTo.style.textAlign = 'center';
    tdTo.style.fontWeight = '500';
    tdTo.style.color = '#6b7280';
    tdTo.textContent = row.to;
    tr.appendChild(tdTo);
    
    tbody.appendChild(tr);
  });
}

// Initialize Activity Tab
invRenderActivityRows();
</script>

<script>
// --- Invoice Description Tab Logic ---
let invWorkDescriptions = [];
let invSelectedWorkDesc = 0;

// Modal open/close
function invOpenWorkDescriptionsModal() {
  document.getElementById('inv-workDescriptionsModal').style.display = 'flex';
  if (invWorkDescriptions.length === 0) {
    invWorkDescriptions.push({ name: '', desc: '' });
    invSelectedWorkDesc = 0;
  }
  document.getElementById('inv-workDescName').value = invWorkDescriptions[invSelectedWorkDesc].name;
  document.getElementById('inv-workDescText').value = invWorkDescriptions[invSelectedWorkDesc].desc;
}
document.getElementById('inv-openWorkDescriptionsModal').onclick = invOpenWorkDescriptionsModal;
document.getElementById('inv-closeWorkDescriptionsModal').onclick = function() {
  document.getElementById('inv-workDescriptionsModal').style.display = 'none';
};

// Save work description
function invSaveWorkDesc() {
  const name = document.getElementById('inv-workDescName').value.trim();
  const desc = document.getElementById('inv-workDescText').value.trim();
  if (!name && !desc) return;
  if (invSelectedWorkDesc >= 0 && invSelectedWorkDesc < invWorkDescriptions.length) {
    invWorkDescriptions[invSelectedWorkDesc] = { name, desc };
  } else {
    invWorkDescriptions.push({ name, desc });
    invSelectedWorkDesc = invWorkDescriptions.length - 1;
  }
  invUpdatePresetDescriptionSelect();
}
document.getElementById('inv-saveWorkDescBtn').onclick = invSaveWorkDesc;

// Insert work description into textarea
function invInsertWorkDesc() {
  const desc = document.getElementById('inv-workDescText').value;
  const textarea = document.getElementById('inv-description-textarea');
  textarea.value += (textarea.value ? '\n' : '') + desc;
  document.getElementById('inv-workDescriptionsModal').style.display = 'none';
}
document.getElementById('inv-insertWorkDescBtn').onclick = invInsertWorkDesc;

// Update preset select
function invUpdatePresetDescriptionSelect() {
  const select = document.getElementById('inv-preset-description-select');
  // Remove all except the first option
  while (select.options.length > 1) select.remove(1);
  invWorkDescriptions.forEach((desc, idx) => {
    if (desc.name) {
      const opt = document.createElement('option');
      opt.value = idx;
      opt.textContent = desc.name;
      select.appendChild(opt);
    }
  });
}

// Handle preset select change
const invPresetSelect = document.getElementById('inv-preset-description-select');
invPresetSelect.onchange = function() {
  if (this.selectedIndex > 0) {
    const idx = parseInt(this.value);
    if (!isNaN(idx) && invWorkDescriptions[idx]) {
      document.getElementById('inv-description-textarea').value += (document.getElementById('inv-description-textarea').value ? '\n' : '') + invWorkDescriptions[idx].desc;
    }
    this.selectedIndex = 0;
  }
};
</script>

<script>
// --- Advanced Invoice Work Descriptions Modal Logic ---
let invWorkDescriptions = [];
let invSelectedWorkDesc = null;
const invWorkDescList = document.getElementById('inv-workDescList');
const invWorkDescName = document.getElementById('inv-workDescName');
const invWorkDescText = document.getElementById('inv-workDescText');

function invRenderWorkDescList() {
  invWorkDescList.innerHTML = '';
  invWorkDescriptions.forEach((desc, idx) => {
    const item = document.createElement('div');
    item.style.display = 'flex';
    item.style.alignItems = 'center';
    item.style.justifyContent = 'space-between';
    item.style.padding = '10px 12px';
    item.style.margin = '8px 8px 0 8px';
    item.style.borderRadius = '10px';
    item.style.background = invSelectedWorkDesc === idx ? '#b91c1c' : '#fff';
    item.style.color = invSelectedWorkDesc === idx ? '#fff' : '#b91c1c';
    item.style.fontWeight = invSelectedWorkDesc === idx ? '700' : '600';
    item.style.cursor = 'pointer';
    item.style.boxShadow = invSelectedWorkDesc === idx ? '0 2px 8px rgba(185,28,28,0.10)' : 'none';
    item.onclick = function() {
      invSelectedWorkDesc = idx;
      invWorkDescName.value = invWorkDescriptions[idx].name;
      invWorkDescText.value = invWorkDescriptions[idx].desc;
      invRenderWorkDescList();
    };
    const nameSpan = document.createElement('span');
    nameSpan.textContent = desc.name ? desc.name : '(Untitled)';
    nameSpan.style.flex = '1';
    nameSpan.style.overflow = 'hidden';
    nameSpan.style.textOverflow = 'ellipsis';
    nameSpan.style.whiteSpace = 'nowrap';
    item.appendChild(nameSpan);
    const delBtn = document.createElement('button');
    delBtn.innerHTML = '<i class="fas fa-trash"></i>';
    delBtn.style.background = 'none';
    delBtn.style.border = 'none';
    delBtn.style.color = invSelectedWorkDesc === idx ? '#fff' : '#b91c1c';
    delBtn.style.fontSize = '1.1em';
    delBtn.style.marginLeft = '8px';
    delBtn.style.cursor = 'pointer';
    delBtn.onclick = function(e) {
      e.stopPropagation();
      invWorkDescriptions.splice(idx, 1);
      if (invSelectedWorkDesc === idx) {
        invSelectedWorkDesc = invWorkDescriptions.length ? 0 : null;
        if (invSelectedWorkDesc !== null) {
          invWorkDescName.value = invWorkDescriptions[invSelectedWorkDesc].name;
          invWorkDescText.value = invWorkDescriptions[invSelectedWorkDesc].desc;
        } else {
          invWorkDescName.value = '';
          invWorkDescText.value = '';
        }
      }
      invRenderWorkDescList();
      invUpdatePresetDescriptionSelect();
    };
    item.appendChild(delBtn);
    invWorkDescList.appendChild(item);
  });
}

function invOpenWorkDescriptionsModal() {
  document.getElementById('inv-workDescriptionsModal').style.display = 'flex';
  if (invWorkDescriptions.length === 0) {
    invWorkDescriptions.push({ name: '', desc: '' });
    invSelectedWorkDesc = 0;
  }
  if (invSelectedWorkDesc === null) invSelectedWorkDesc = 0;
  invWorkDescName.value = invWorkDescriptions[invSelectedWorkDesc].name;
  invWorkDescText.value = invWorkDescriptions[invSelectedWorkDesc].desc;
  invRenderWorkDescList();
}
document.getElementById('inv-openWorkDescriptionsModal').onclick = invOpenWorkDescriptionsModal;
document.getElementById('inv-closeWorkDescriptionsModal').onclick = function() {
  document.getElementById('inv-workDescriptionsModal').style.display = 'none';
};
document.getElementById('inv-workDescCloseBtn').onclick = function() {
  document.getElementById('inv-workDescriptionsModal').style.display = 'none';
};
document.getElementById('inv-workDescNewBtn').onclick = function() {
  invWorkDescriptions.push({ name: '', desc: '' });
  invSelectedWorkDesc = invWorkDescriptions.length - 1;
  invWorkDescName.value = '';
  invWorkDescText.value = '';
  invRenderWorkDescList();
};

document.getElementById('inv-workDescName').oninput = function() {
  if (invSelectedWorkDesc !== null && invWorkDescriptions[invSelectedWorkDesc]) {
    invWorkDescriptions[invSelectedWorkDesc].name = this.value;
    invRenderWorkDescList();
    invUpdatePresetDescriptionSelect();
  }
};
document.getElementById('inv-workDescText').oninput = function() {
  if (invSelectedWorkDesc !== null && invWorkDescriptions[invSelectedWorkDesc]) {
    invWorkDescriptions[invSelectedWorkDesc].desc = this.value;
  }
};
document.getElementById('inv-saveWorkDescBtn').onclick = function() {
  // Already saved on input
  invUpdatePresetDescriptionSelect();
};
document.getElementById('inv-insertWorkDescBtn').onclick = function() {
  if (invSelectedWorkDesc !== null && invWorkDescriptions[invSelectedWorkDesc]) {
    const desc = invWorkDescriptions[invSelectedWorkDesc].desc;
    const textarea = document.getElementById('inv-description-textarea');
    textarea.value += (textarea.value ? '\n' : '') + desc;
    document.getElementById('inv-workDescriptionsModal').style.display = 'none';
  }
};

function invUpdatePresetDescriptionSelect() {
  const select = document.getElementById('inv-preset-description-select');
  while (select.options.length > 1) select.remove(1);
  invWorkDescriptions.forEach((desc, idx) => {
    if (desc.name) {
      const opt = document.createElement('option');
      opt.value = idx;
      opt.textContent = desc.name;
      select.appendChild(opt);
    }
  });
}
const invPresetSelect = document.getElementById('inv-preset-description-select');
invPresetSelect.onchange = function() {
  if (this.selectedIndex > 0) {
    const idx = parseInt(this.value);
    if (!isNaN(idx) && invWorkDescriptions[idx]) {
      document.getElementById('inv-description-textarea').value += (document.getElementById('inv-description-textarea').value ? '\n' : '') + invWorkDescriptions[idx].desc;
    }
    this.selectedIndex = 0;
  }
};
</script>

<script>
// --- Invoice Work Descriptions Modal Logic (Estimates style, FINAL) ---
let invWorkDescriptions = [];
let invSelectedWorkDesc = null;
const invWorkDescList = document.getElementById('inv-workDescList');
const invWorkDescName = document.getElementById('inv-workDescName');
const invWorkDescText = document.getElementById('inv-workDescText');
const invWorkDescNewBtn = document.getElementById('inv-workDescNewBtn');
const invWorkDescCloseBtn = document.getElementById('inv-workDescCloseBtn');

function invRenderWorkDescList() {
  invWorkDescList.innerHTML = '';
  invWorkDescriptions.forEach((desc, idx) => {
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
    if (invSelectedWorkDesc === idx) {
      row.style.background = 'linear-gradient(135deg, #b91c1c 0%, #dc2626 100%)';
      row.style.color = '#fff';
      row.style.border = '2px solid #b91c1c';
      row.style.boxShadow = '0 4px 16px rgba(185,28,28,0.3), inset 0 1px 0 rgba(255,255,255,0.2)';
      row.style.transform = 'translateX(4px) scale(1.02)';
    }
    row.onmouseover = function() {
      if (invSelectedWorkDesc !== idx) {
        this.style.background = 'linear-gradient(135deg, #fef2f2 0%, #fee2e2 100%)';
        this.style.border = '2px solid #b91c1c';
        this.style.transform = 'translateX(4px) scale(1.01)';
        this.style.boxShadow = '0 4px 12px rgba(185,28,28,0.15), inset 0 1px 0 rgba(255,255,255,0.9)';
      }
    };
    row.onmouseout = function() {
      if (invSelectedWorkDesc !== idx) {
        this.style.background = 'rgba(255,255,255,0.8)';
        this.style.border = '2px solid transparent';
        this.style.transform = 'translateX(0) scale(1)';
        this.style.boxShadow = '0 2px 8px rgba(0,0,0,0.05), inset 0 1px 0 rgba(255,255,255,0.8)';
      }
    };
    row.onclick = () => invSelectWorkDesc(idx);
    if (invSelectedWorkDesc === idx) {
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
    nameSpan.style.fontWeight = invSelectedWorkDesc === idx ? '700' : '600';
    nameSpan.style.textShadow = invSelectedWorkDesc === idx ? '0 1px 2px rgba(0,0,0,0.3)' : 'none';
    row.appendChild(nameSpan);
    const delBtn = document.createElement('button');
    delBtn.innerHTML = '<i class="fas fa-trash-alt"></i>';
    delBtn.style.background = invSelectedWorkDesc === idx ? 'rgba(255,255,255,0.2)' : 'rgba(185,28,28,0.1)';
    delBtn.style.border = 'none';
    delBtn.style.borderRadius = '8px';
    delBtn.style.color = invSelectedWorkDesc === idx ? '#fff' : '#b91c1c';
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
      this.style.background = invSelectedWorkDesc === idx ? 'rgba(255,255,255,0.3)' : 'rgba(185,28,28,0.2)';
      this.style.transform = 'scale(1.1)';
    };
    delBtn.onmouseout = function() {
      this.style.background = invSelectedWorkDesc === idx ? 'rgba(255,255,255,0.2)' : 'rgba(185,28,28,0.1)';
      this.style.transform = 'scale(1)';
    };
    delBtn.onclick = (e) => { e.stopPropagation(); invRemoveWorkDesc(idx); };
    row.appendChild(delBtn);
    invWorkDescList.appendChild(row);
  });
}
function invSelectWorkDesc(idx) {
  invSelectedWorkDesc = idx;
  invWorkDescName.value = invWorkDescriptions[idx].name;
  invWorkDescText.value = invWorkDescriptions[idx].desc;
  invRenderWorkDescList();
}
function invRemoveWorkDesc(idx) {
  invWorkDescriptions.splice(idx, 1);
  if (invSelectedWorkDesc === idx) {
    invSelectedWorkDesc = null;
    invWorkDescName.value = '';
    invWorkDescText.value = '';
  } else if (invSelectedWorkDesc > idx) {
    invSelectedWorkDesc--;
  }
  invRenderWorkDescList();
}
invWorkDescNewBtn.onclick = function() {
  if (invWorkDescName.value.trim() || invWorkDescText.value.trim()) {
    if (invSelectedWorkDesc !== null) {
      invWorkDescriptions[invSelectedWorkDesc] = { name: invWorkDescName.value, desc: invWorkDescText.value };
    } else {
      invWorkDescriptions.push({ name: invWorkDescName.value, desc: invWorkDescText.value });
      invSelectedWorkDesc = invWorkDescriptions.length - 1;
    }
  }
  invWorkDescriptions.push({ name: '', desc: '' });
  invSelectedWorkDesc = invWorkDescriptions.length - 1;
  invWorkDescName.value = '';
  invWorkDescText.value = '';
  invRenderWorkDescList();
};
invWorkDescName.oninput = function() {
  if (invSelectedWorkDesc !== null) {
    invWorkDescriptions[invSelectedWorkDesc].name = invWorkDescName.value;
    invRenderWorkDescList();
  }
};
invWorkDescText.oninput = function() {
  if (invSelectedWorkDesc !== null) {
    invWorkDescriptions[invSelectedWorkDesc].desc = invWorkDescText.value;
  }
};
function invOpenWorkDescriptionsModal() {
  document.getElementById('inv-workDescriptionsModal').style.display = 'flex';
  if (invWorkDescriptions.length === 0) {
    invWorkDescriptions.push({ name: '', desc: '' });
    invSelectedWorkDesc = 0;
  }
  invWorkDescName.value = invWorkDescriptions[invSelectedWorkDesc].name;
  invWorkDescText.value = invWorkDescriptions[invSelectedWorkDesc].desc;
  invRenderWorkDescList();
}
document.getElementById('inv-openWorkDescriptionsModal').onclick = invOpenWorkDescriptionsModal;
document.getElementById('inv-closeWorkDescriptionsModal').onclick = function() {
  document.getElementById('inv-workDescriptionsModal').style.display = 'none';
};
invWorkDescCloseBtn.onclick = function() {
  document.getElementById('inv-workDescriptionsModal').style.display = 'none';
};
// ... existing code ...
</script>