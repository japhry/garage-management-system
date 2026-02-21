<?php
// Advanced Search Customer Modal
// This file contains the advanced search popup for customers
// Include this file where needed using: include 'Popups/customers/adv-search-customer.php';
?>

<!-- Advanced Search Customer Modal -->
<div id="advSearchCustomerModal" class="modal-overlay" style="display: none; align-items: center; justify-content: center; z-index: 1200; background: rgba(0,0,0,0.18); transition: background 0.3s;">
  <div class="modal-backdrop" style="pointer-events: auto; background: transparent; box-shadow: none;"></div>
  <div class="modal-content adv-search-modal" style="max-width: 99vw; width: 1200px; min-width: 400px; max-height: 98vh; min-height: 600px; overflow: auto; border-radius: 18px; box-shadow: 0 6px 32px rgba(0,0,0,0.14); background: var(--white); border: 1.5px solid #e5e7eb; z-index: 1201; animation: modalPopIn 0.32s cubic-bezier(.4,1.6,.6,1) 1;">
    <!-- Toolbar - Two layers: Title+Exit, then Actions -->
    <div class="adv-toolbar-top">
      <span class="adv-toolbar-title">Advanced Search: <span style='font-weight:400;'>Searches <b>documents</b> and returns results to Customers List</span></span>
      <button class="adv-toolbar-exit" id="advCloseBtn" onclick="closeAdvSearchCustomerModal()" title="Close"><i class="fas fa-times"></i></button>
    </div>
    <div class="adv-toolbar-bottom">
      <button class="modal-action-btn" id="advSearchCustomerBtn"><i class="fas fa-search"></i> Search</button>
      <button class="modal-action-btn" id="advAddCriteriaBtn"><i class="fas fa-plus"></i> Add Criteria</button>
      <button class="modal-action-btn" id="advCancelBtn"><i class="fas fa-times"></i> Cancel</button>
      <button class="modal-action-btn adv-toolbar-techniques" id="advTechniquesBtn">Techniques</button>
    </div>
    
    <!-- Main Content -->
    <div class="adv-search-content" style="padding: 24px 32px; background: #f8fafc; border-radius: 0 0 18px 18px;">
      <form id="advSearchCustomerForm">
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px;">
          
          <!-- Left Column -->
          <div class="adv-search-left-col">
            <div class="adv-row">
              <label class="adv-label">Doc No</label>
              <div class="adv-input-icon-group">
                <input type="text" class="adv-input" placeholder="">
                <span class="adv-icon"><i class="fas fa-search"></i></span>
              </div>
              <label class="adv-label">Type</label>
              <select class="adv-select">
                <option value="">Type</option>
                <option value="invoice">Invoice</option>
                <option value="estimate">Estimate</option>
                <option value="job_sheet">Job Sheet</option>
                <option value="credit_note">Credit Note</option>
              </select>
            </div>
            <div class="adv-row adv-row-date-group">
              <label class="adv-label">Creation Date</label>
              <div class="adv-date-range-wrap">
                <input type="date" class="adv-input">
                <select class="adv-select adv-date-range" onchange="handleDateRangeChange(this)">
                  <option value="">Range</option>
                  <option value="today">Today</option>
                  <option value="yesterday">Yesterday</option>
                  <option value="this_week">This Week</option>
                  <option value="last_week">Last Week</option>
                  <option value="this_month">This Month</option>
                  <option value="last_month">Last Month</option>
                  <option value="this_quarter">This Quarter</option>
                  <option value="last_quarter">Last Quarter</option>
                  <option value="this_ytd">This YTD</option>
                  <option value="last_ytd">Last YTD</option>
                  <option value="this_year">This Year</option>
                  <option value="last_year">Last Year</option>
                  <option value="this_financial">This Financial Year</option>
                  <option value="last_financial">Last Financial Year</option>
                </select>
              </div>
            </div>
            <div class="adv-row adv-row-date-group">
              <label class="adv-label">Issue Date</label>
              <div class="adv-date-range-wrap">
                <input type="date" class="adv-input">
                <select class="adv-select adv-date-range" onchange="handleDateRangeChange(this)">
                  <option value="">Range</option>
                  <option value="today">Today</option>
                  <option value="yesterday">Yesterday</option>
                  <option value="this_week">This Week</option>
                  <option value="last_week">Last Week</option>
                  <option value="this_month">This Month</option>
                  <option value="last_month">Last Month</option>
                  <option value="this_quarter">This Quarter</option>
                  <option value="last_quarter">Last Quarter</option>
                  <option value="this_ytd">This YTD</option>
                  <option value="last_ytd">Last YTD</option>
                  <option value="this_year">This Year</option>
                  <option value="last_year">Last Year</option>
                  <option value="this_financial">This Financial Year</option>
                  <option value="last_financial">Last Financial Year</option>
                </select>
              </div>
            </div>
            <div class="adv-row adv-row-date-group">
              <label class="adv-label">Payment Date</label>
              <div class="adv-date-range-wrap">
                <input type="date" class="adv-input">
                <select class="adv-select adv-date-range" onchange="handleDateRangeChange(this)">
                  <option value="">Range</option>
                  <option value="today">Today</option>
                  <option value="yesterday">Yesterday</option>
                  <option value="this_week">This Week</option>
                  <option value="last_week">Last Week</option>
                  <option value="this_month">This Month</option>
                  <option value="last_month">Last Month</option>
                  <option value="this_quarter">This Quarter</option>
                  <option value="last_quarter">Last Quarter</option>
                  <option value="this_ytd">This YTD</option>
                  <option value="last_ytd">Last YTD</option>
                  <option value="this_year">This Year</option>
                  <option value="last_year">Last Year</option>
                  <option value="this_financial">This Financial Year</option>
                  <option value="last_financial">Last Financial Year</option>
                </select>
              </div>
            </div>
            <div class="adv-row">
              <label class="adv-label">Payment Method</label>
              <select class="adv-select">
                <option value="">Payment Method</option>
                <option value="mobile_money">Mobile Money</option>
                <option value="bacs">BACS</option>
                <option value="business_cheque">Business Cheque</option>
                <option value="cash">Cash</option>
                <option value="credit_card">Credit Card</option>
                <option value="debit_card">Debit Card</option>
                <option value="paypal">Paypal</option>
                <option value="personal_cheque">Personal Cheque</option>
              </select>
            </div>
            <div class="adv-row adv-row-grouped">
              <label class="adv-label">Department</label>
              <input type="text" class="adv-input">
              <label class="adv-label">Order Ref</label>
              <div class="adv-input-icon-group">
                <input type="text" class="adv-input">
                <span class="adv-icon"><i class="fas fa-search"></i></span>
              </div>
            </div>
            <div class="adv-row adv-row-grouped">
              <label class="adv-label">Total Gross</label>
              <div class="adv-input-icon-group">
                <input type="text" class="adv-input">
                <span class="adv-icon"><i class="fas fa-search"></i></span>
              </div>
              <label class="adv-label">Total Discount</label>
              <div class="adv-input-icon-group">
                <input type="text" class="adv-input">
                <span class="adv-icon"><i class="fas fa-search"></i></span>
              </div>
            </div>
            <div class="adv-row">
              <label class="adv-label">Outstd Balance</label>
              <div class="adv-input-icon-group">
                <input type="text" class="adv-input">
                <span class="adv-icon"><i class="fas fa-search"></i></span>
              </div>
            </div>
            <div class="adv-divider"></div>
            <div class="adv-row">
              <label class="adv-label">Work Description</label>
              <input type="text" class="adv-input">
            </div>
            <div class="adv-divider"></div>
            <div class="adv-row adv-row-grouped">
              <label class="adv-label">Item Type</label>
              <div class="adv-radio-group">
                <label class="adv-radio"><input type="radio" name="itemType" value="all" checked> All</label>
                <label class="adv-radio"><input type="radio" name="itemType" value="labour"> Labour</label>
                <label class="adv-radio"><input type="radio" name="itemType" value="parts"> Parts</label>
                <label class="adv-radio"><input type="radio" name="itemType" value="advisories"> Advisories</label>
              </div>
            </div>
            <div class="adv-row">
              <label class="adv-label">Part Number</label>
              <div class="adv-input-icon-group">
                <input type="text" class="adv-input">
                <span class="adv-icon"><i class="fas fa-search"></i></span>
              </div>
            </div>
            <div class="adv-row">
              <label class="adv-label">Description</label>
              <input type="text" class="adv-input">
            </div>
            <div class="adv-row">
              <label class="adv-label">Technician</label>
              <select class="adv-select">
                <option value="">Technician</option>
              </select>
            </div>
            <div class="adv-divider"></div>
            <div class="adv-row">
              <label class="adv-label">Supplier</label>
              <div class="adv-input-icon-group">
                <input type="text" class="adv-input">
                <span class="adv-icon"><i class="fas fa-search"></i></span>
              </div>
            </div>
            <div class="adv-row adv-row-date-group">
              <label class="adv-label">Purchase Date</label>
              <div class="adv-date-range-wrap">
                <input type="date" class="adv-input">
                <select class="adv-select adv-date-range" onchange="handleDateRangeChange(this)">
                  <option value="">Range</option>
                  <option value="today">Today</option>
                  <option value="yesterday">Yesterday</option>
                  <option value="this_week">This Week</option>
                  <option value="last_week">Last Week</option>
                  <option value="this_month">This Month</option>
                  <option value="last_month">Last Month</option>
                  <option value="this_quarter">This Quarter</option>
                  <option value="last_quarter">Last Quarter</option>
                  <option value="this_ytd">This YTD</option>
                  <option value="last_ytd">Last YTD</option>
                  <option value="this_year">This Year</option>
                  <option value="last_year">Last Year</option>
                  <option value="this_financial">This Financial Year</option>
                  <option value="last_financial">Last Financial Year</option>
                </select>
              </div>
            </div>
            <div class="adv-row">
              <label class="adv-label">Supplier Invoice</label>
              <input type="text" class="adv-input">
            </div>
          </div>
          
          <!-- Right Column -->
          <div class="adv-search-right-col">
            <div class="adv-row">
              <label class="adv-label">Acc Number</label>
              <div class="adv-input-icon-group">
                <input type="text" class="adv-input">
                <span class="adv-icon"><i class="fas fa-search"></i></span>
              </div>
            </div>
            <div class="adv-row">
              <label class="adv-label">Company</label>
              <div class="adv-input-icon-group">
                <input type="text" class="adv-input">
                <span class="adv-icon"><i class="fas fa-search"></i></span>
              </div>
            </div>
            <div class="adv-row">
              <label class="adv-label">Name</label>
              <div class="adv-input-icon-group">
                <input type="text" class="adv-input">
                <span class="adv-icon"><i class="fas fa-search"></i></span>
              </div>
            </div>
            <div class="adv-row adv-row-grouped">
              <div style="flex:1;">
                <label class="adv-label">Road</label>
                <div class="adv-input-icon-group">
                  <input type="text" class="adv-input">
                  <span class="adv-icon"><i class="fas fa-search"></i></span>
                </div>
              </div>
              <div style="flex:1;">
                <label class="adv-label">Town</label>
                <div class="adv-input-icon-group">
                  <input type="text" class="adv-input">
                  <span class="adv-icon"><i class="fas fa-search"></i></span>
                </div>
              </div>
            </div>
            <div class="adv-row adv-row-grouped">
              <div style="flex:1;">
                <label class="adv-label">County</label>
                <div class="adv-input-icon-group">
                  <input type="text" class="adv-input">
                  <span class="adv-icon"><i class="fas fa-search"></i></span>
                </div>
              </div>
              <div style="flex:1;">
                <label class="adv-label">Post Code</label>
                <div class="adv-input-icon-group">
                  <input type="text" class="adv-input">
                  <span class="adv-icon"><i class="fas fa-search"></i></span>
                </div>
              </div>
            </div>
            <div class="adv-row adv-row-grouped">
              <div style="flex:1;">
                <label class="adv-label">Telephone</label>
                <div class="adv-input-icon-group">
                  <input type="text" class="adv-input">
                  <span class="adv-icon"><i class="fas fa-search"></i></span>
                </div>
              </div>
              <div style="flex:1;">
                <label class="adv-label">Mobile</label>
                <div class="adv-input-icon-group">
                  <input type="text" class="adv-input">
                  <span class="adv-icon"><i class="fas fa-search"></i></span>
                </div>
              </div>
            </div>
            <div class="adv-row">
              <label class="adv-label">Email</label>
              <div class="adv-input-icon-group">
                <input type="text" class="adv-input">
                <span class="adv-icon"><i class="fas fa-search"></i></span>
              </div>
            </div>
            <div class="adv-row">
              <label class="adv-label">Referral</label>
              <select class="adv-select">
                <option value="">Referral</option>
              </select>
            </div>
            <div class="adv-divider"></div>
            <div class="adv-row">
              <label class="adv-label">Registration</label>
              <div class="adv-input-icon-group">
                <input type="text" class="adv-input">
                <span class="adv-icon"><i class="fas fa-search"></i></span>
              </div>
            </div>
            <div class="adv-row">
              <label class="adv-label">Make</label>
              <div class="adv-input-icon-group">
                <input type="text" class="adv-input">
                <span class="adv-icon"><i class="fas fa-search"></i></span>
              </div>
            </div>
            <div class="adv-row">
              <label class="adv-label">Model</label>
              <div class="adv-input-icon-group">
                <input type="text" class="adv-input">
                <span class="adv-icon"><i class="fas fa-search"></i></span>
              </div>
            </div>
            <div class="adv-row">
              <label class="adv-label">Chassis Number</label>
              <div class="adv-input-icon-group">
                <input type="text" class="adv-input">
                <span class="adv-icon"><i class="fas fa-search"></i></span>
              </div>
            </div>
            <div class="adv-row">
              <label class="adv-label">Engine Code</label>
              <div class="adv-input-icon-group">
                <input type="text" class="adv-input">
                <span class="adv-icon"><i class="fas fa-search"></i></span>
              </div>
            </div>
            <div class="adv-row">
              <label class="adv-label">Engine No</label>
              <div class="adv-input-icon-group">
                <input type="text" class="adv-input">
                <span class="adv-icon"><i class="fas fa-search"></i></span>
              </div>
            </div>
            <div class="adv-row">
              <label class="adv-label">Fuel Type</label>
              <div class="adv-input-icon-group">
                <input type="text" class="adv-input">
                <span class="adv-icon"><i class="fas fa-search"></i></span>
              </div>
            </div>
            <div class="adv-divider"></div>
            <div class="adv-row adv-row-grouped">
              <div style="flex:1;">
                <label class="adv-label">QC Technician</label>
                <select class="adv-select">
                  <option value="">QC Technician</option>
                </select>
              </div>
              <div style="flex:1;">
                <label class="adv-label">Road Tester</label>
                <select class="adv-select">
                  <option value="">Road Tester</option>
                </select>
              </div>
              <div style="flex:1;">
                <label class="adv-label">Sales Advisor</label>
                <select class="adv-select">
                  <option value="">Sales Advisor</option>
                </select>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
// Modal open/close logic
function openAdvSearchCustomerModal() {
  document.getElementById('advSearchCustomerModal').style.display = 'flex';
}
function closeAdvSearchCustomerModal() {
  document.getElementById('advSearchCustomerModal').style.display = 'none';
}
document.getElementById('advCancelBtn').onclick = closeAdvSearchCustomerModal;

// Add event listeners for other buttons if needed
document.getElementById('advSearchCustomerBtn').addEventListener('click', function() {
  // Add search functionality here
});

document.getElementById('advAddCriteriaBtn').addEventListener('click', function() {
  // Add criteria functionality here
});

function handleDateRangeChange(select) {
  const range = select.value;
  // Find the date input in the same row
  const row = select.closest('.adv-row');
  const dateInput = row.querySelector('input[type="date"]');
  if (!dateInput) return;
  const today = new Date();
  let setDate = null;
  switch (range) {
    case 'today':
      setDate = today;
      break;
    case 'yesterday':
      setDate = new Date(today);
      setDate.setDate(today.getDate() - 1);
      break;
    case 'this_week':
      setDate = new Date(today);
      setDate.setDate(today.getDate() - today.getDay() + 1); // Monday
      break;
    case 'last_week':
      setDate = new Date(today);
      setDate.setDate(today.getDate() - today.getDay() - 6); // Last week's Monday
      break;
    case 'this_month':
      setDate = new Date(today.getFullYear(), today.getMonth(), 1);
      break;
    case 'last_month':
      setDate = new Date(today.getFullYear(), today.getMonth() - 1, 1);
      break;
    case 'this_quarter':
      setDate = new Date(today.getFullYear(), Math.floor(today.getMonth() / 3) * 3, 1);
      break;
    case 'last_quarter':
      let lastQ = Math.floor(today.getMonth() / 3) - 1;
      let year = today.getFullYear();
      if (lastQ < 0) { lastQ = 3; year--; }
      setDate = new Date(year, lastQ * 3, 1);
      break;
    case 'this_ytd':
      setDate = new Date(today.getFullYear(), 0, 1);
      break;
    case 'last_ytd':
      setDate = new Date(today.getFullYear() - 1, 0, 1);
      break;
    case 'this_year':
      setDate = new Date(today.getFullYear(), 0, 1);
      break;
    case 'last_year':
      setDate = new Date(today.getFullYear() - 1, 0, 1);
      break;
    case 'this_financial':
      setDate = new Date(today.getMonth() < 3 ? today.getFullYear() - 1 : today.getFullYear(), 3, 1); // April 1
      break;
    case 'last_financial':
      setDate = new Date(today.getMonth() < 3 ? today.getFullYear() - 2 : today.getFullYear() - 1, 3, 1); // April 1 last year
      break;
    default:
      setDate = null;
  }
  if (setDate) {
    dateInput.value = setDate.toISOString().slice(0, 10);
  }
}
</script>

<style>
/* Base Styles */
.adv-search-modal {
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

/* Section Styles */
.search-section {
  background: white;
  border-radius: 10px;
  padding: 12px 16px;
  box-shadow: 0 2px 6px rgba(0,0,0,0.05);
  border: 1px solid #e5e7eb;
}

.section-title {
  color: #b91c1c;
  font-size: 1.05rem;
  font-weight: 700;
  margin: 0 0 12px 0;
  padding-bottom: 6px;
  border-bottom: 1px solid #f3f4f6;
}

/* Input Group Styles */
.input-group {
  display: flex;
  gap: 12px;
  margin-bottom: 12px;
}

.input-group:last-child {
  margin-bottom: 0;
}

.input-field {
  flex: 1;
  min-width: 0;
}

/* Input Styles */
.adv-search-modal input[type="text"],
.adv-search-modal input[type="date"],
.adv-search-modal select {
  padding: 8px 12px;
  border: 1.5px solid #e5e7eb;
  border-radius: 6px;
  font-size: 0.95rem;
  transition: border-color 0.2s;
  background: #fff;
  width: 100%;
  box-sizing: border-box;
}

.adv-search-modal input[type="text"]:focus,
.adv-search-modal input[type="date"]:focus,
.adv-search-modal select:focus {
  outline: none;
  border-color: #b91c1c;
}

.adv-search-modal .input {
  width: 100%;
  margin-bottom: 0;
}

.adv-search-modal label {
  display: block;
  font-weight: 600;
  color: #6b7280;
  font-size: 0.85rem;
  margin-bottom: 4px;
}

/* Select Dropdown Styles */
.input-select {
  appearance: none;
  background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
  background-repeat: no-repeat;
  background-position: right 10px center;
  background-size: 1em;
}

/* Radio Button Styles */
.radio-group {
  display: flex;
  flex-wrap: wrap;
  gap: 12px;
}

.radio-option {
  display: flex;
  align-items: center;
  gap: 6px;
  font-size: 0.9rem;
  color: #4b5563;
}

.radio-option input {
  margin: 0;
}

/* Button Styles */
.modal-action-btn {
  padding: 8px 20px;
  font-size: 1rem;
  border-radius: 8px;
  font-weight: 600;
  cursor: pointer;
  transition: all 0.2s ease;
  display: inline-flex;
  align-items: center;
  gap: 6px;
  white-space: nowrap;
}

.modal-action-btn:hover {
  transform: translateY(-1px);
  box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}

#advSearchCustomerBtn:hover, #advAddCriteriaBtn:hover {
  background: #f0f0f0 !important;
}

#advCancelBtn:hover {
  background: rgba(255,255,255,0.1) !important;
}

/* Animation for modal appearance */
@keyframes modalPopIn {
  from {
    opacity: 0;
    transform: scale(0.95);
  }
  to {
    opacity: 1;
    transform: scale(1);
  }
}

/* Placeholder Text */
::placeholder {
  color: #9ca3af;
  opacity: 1;
}

.adv-search-left-col {
  display: flex;
  flex-direction: column;
  gap: 0.5rem;
  background: #fafbfc;
  border-radius: 12px;
  padding: 18px 18px 18px 18px;
  border: 1.5px solid #ececec;
  min-width: 340px;
}
.adv-row {
  display: flex;
  align-items: center;
  gap: 10px;
  margin-bottom: 6px;
  flex-wrap: wrap;
}
.adv-row-grouped {
  gap: 18px;
}
.adv-label {
  min-width: 110px;
  color: #444;
  font-weight: 600;
  font-size: 0.98rem;
  margin-right: 4px;
}
.adv-input,
.adv-select {
  border: 1.5px solid #e5e7eb;
  border-radius: 6px;
  padding: 7px 10px;
  font-size: 1rem;
  background: #fff;
  color: #232323;
  min-width: 80px;
  flex: 1;
}
.adv-input:focus,
.adv-select:focus {
  border-color: #b91c1c;
  outline: none;
}
.adv-input-icon-group {
  position: relative;
  display: flex;
  align-items: center;
  flex: 1;
}
.adv-input-icon-group input {
  padding-right: 32px;
}
.adv-icon {
  position: absolute;
  right: 8px;
  color: #b91c1c;
  font-size: 1.1em;
  pointer-events: none;
}
.adv-divider {
  border-bottom: 1.5px solid #e5e7eb;
  margin: 10px 0 10px 0;
}
.adv-radio-group {
  display: flex;
  gap: 18px;
  margin-left: 10px;
}
.adv-radio {
  color: #888;
  font-size: 0.97rem;
  font-weight: 500;
}
.adv-row .adv-radio input[type="radio"] {
  accent-color: #b91c1c;
}
.adv-range-group {
  display: flex;
  align-items: center;
  gap: 6px;
}
.adv-search-right-col {
  display: flex;
  flex-direction: column;
  gap: 0.5rem;
  background: #fafbfc;
  border-radius: 12px;
  padding: 18px 18px 18px 18px;
  border: 1.5px solid #ececec;
  min-width: 340px;
}
.adv-row-date-group {
  align-items: center;
  gap: 12px;
}
.adv-date-range-wrap {
  display: flex;
  flex-direction: row;
  gap: 8px;
  flex: 1;
}
.adv-date-range-wrap input[type="date"] {
  min-width: 0;
  flex: 1 1 120px;
}
.adv-date-range-wrap select.adv-date-range {
  min-width: 140px;
  flex: 0 0 160px;
}
.adv-toolbar {
  display: flex;
  align-items: center;
  justify-content: space-between;
  background: #b91c1c;
  color: #fff;
  border-radius: 18px 18px 0 0;
  border-bottom: 1.5px solid #e5e7eb;
  box-shadow: 0 2px 12px rgba(0,0,0,0.07);
  padding: 0 24px;
  min-height: 56px;
  gap: 18px;
}
.adv-toolbar-title {
  font-weight: 700;
  font-size: 1.15em;
  letter-spacing: 0.01em;
  display: flex;
  align-items: center;
  flex: 1 1 auto;
  min-width: 0;
}
.adv-toolbar-actions {
  display: flex;
  align-items: center;
  gap: 12px;
  flex: 0 0 auto;
}
.adv-toolbar-actions .modal-action-btn {
  background: #fff;
  color: #b91c1c;
  border-radius: 8px;
  border: none;
  font-weight: 600;
  padding: 8px 20px;
  display: flex;
  align-items: center;
  gap: 6px;
  transition: background 0.18s, color 0.18s;
}
.adv-toolbar-actions .modal-action-btn#advCancelBtn {
  background: transparent;
  color: #fff;
  border: 1.5px solid #fff;
}
.adv-toolbar-techniques {
  margin-left: 18px;
  font-size: 1em;
  color: #fff;
  opacity: 0.9;
  font-weight: 500;
  letter-spacing: 0.01em;
}
@media (max-width: 700px) {
  .adv-toolbar {
    flex-direction: column;
    align-items: flex-start;
    gap: 8px;
    padding: 12px 10px;
  }
  .adv-toolbar-actions {
    flex-wrap: wrap;
    gap: 8px;
  }
  .adv-toolbar-techniques {
    margin-left: 0;
    margin-top: 6px;
  }
}
.adv-toolbar-top {
  display: flex;
  align-items: center;
  justify-content: space-between;
  background: #b91c1c;
  color: #fff;
  border-radius: 18px 18px 0 0;
  border-bottom: 1.5px solid #e5e7eb;
  box-shadow: 0 2px 12px rgba(0,0,0,0.07);
  padding: 0 24px;
  min-height: 54px;
}
.adv-toolbar-title {
  font-weight: 700;
  font-size: 1.15em;
  letter-spacing: 0.01em;
  display: flex;
  align-items: center;
  flex: 1 1 auto;
  min-width: 0;
}
.adv-toolbar-exit {
  background: transparent;
  border: none;
  color: #fff;
  font-size: 1.5em;
  cursor: pointer;
  padding: 8px 12px;
  border-radius: 8px;
  transition: background 0.18s;
}
.adv-toolbar-exit:hover {
  background: #a31a1a;
}
.adv-toolbar-bottom {
  display: flex;
  align-items: center;
  gap: 12px;
  background: #fff;
  color: #b91c1c;
  border-bottom: 1.5px solid #e5e7eb;
  padding: 0 24px;
  min-height: 48px;
  box-shadow: 0 1px 6px rgba(0,0,0,0.04);
}
.adv-toolbar-bottom .modal-action-btn {
  background: #fff;
  color: #b91c1c;
  border-radius: 8px;
  border: 1.5px solid #b91c1c;
  font-weight: 600;
  padding: 8px 20px;
  display: flex;
  align-items: center;
  gap: 6px;
  transition: background 0.18s, color 0.18s;
}
.adv-toolbar-bottom .modal-action-btn#advCancelBtn {
  background: #b91c1c;
  color: #fff;
  border: 1.5px solid #b91c1c;
}
.adv-toolbar-techniques {
  margin-left: auto;
  font-size: 1em;
  color: #b91c1c;
  opacity: 0.9;
  font-weight: 600;
  letter-spacing: 0.01em;
  background: #fff;
  border: 1.5px solid #b91c1c;
  border-radius: 8px;
  padding: 8px 20px;
  transition: background 0.18s, color 0.18s;
  cursor: pointer;
  display: flex;
  align-items: center;
}
.adv-toolbar-techniques:hover {
  background: #b91c1c;
  color: #fff;
}
@media (max-width: 700px) {
  .adv-toolbar-top, .adv-toolbar-bottom {
    flex-direction: column;
    align-items: flex-start;
    gap: 8px;
    padding: 12px 10px;
  }
  .adv-toolbar-bottom {
    flex-wrap: wrap;
    gap: 8px;
  }
  .adv-toolbar-techniques {
    margin-left: 0;
    margin-top: 6px;
  }
}
</style>