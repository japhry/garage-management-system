<?php
// Add Customer Modal
// This file contains the customer creation popup
// Include this file where needed using: include 'Popups/customers/add-customer.php';
?>

<!-- Add Customer Modal -->
<div id="addCustomerModal" class="modal-overlay" style="display: none; align-items: center; justify-content: center; z-index: 1200; background: rgba(0,0,0,0.18); transition: background 0.3s;">
  <div class="modal-backdrop" style="pointer-events: auto; background: transparent; box-shadow: none;"></div>
  <div class="modal-content customer-modal" style="max-width: 99vw; width: 1400px; min-width: 400px; max-height: 98vh; min-height: 600px; overflow: auto; border-radius: 18px; box-shadow: 0 6px 32px rgba(0,0,0,0.14); background: var(--white); border: 1.5px solid #e5e7eb; z-index: 1201; animation: modalPopIn 0.32s cubic-bezier(.4,1.6,.6,1) 1;">
    <!-- Toolbar -->
    <div class="modal-action-bar fancy-toolbar">
      <button class="modal-action-btn primary" id="saveCustomerBtn"><i class="fas fa-save"></i> Save</button>
      <div class="new-doc-container" style="display:inline-block; position:relative;">
        <button class="modal-action-btn" id="newDocBtn"><i class="fas fa-plus"></i> New Doc</button>
        <div id="newDocDropdown" class="new-doc-dropdown" style="display:none;">
          <div class="dropdown-option">Estimate</div>
          <div class="dropdown-option">Job Sheet</div>
          <div class="dropdown-option">Invoice</div>
          <div class="dropdown-option">Appointment</div>
    </div>
          </div>
      <button class="modal-action-btn"><i class="fas fa-car"></i> New Vehicle</button>
      <button class="modal-action-btn"><i class="fas fa-print"></i> Print</button>
      <button class="modal-action-btn"><i class="fas fa-file-invoice"></i> Statements</button>
      <button class="modal-action-btn"><i class="fas fa-paperclip"></i> Attachments</button>
      <button class="modal-action-btn"><i class="fas fa-map-marker-alt"></i> Map</button>
      <button class="modal-action-btn"><i class="fas fa-file-export"></i> Export</button>
      <button class="modal-action-btn danger" id="deleteCustomerBtn"><i class="fas fa-trash"></i> Delete</button>
      <button class="modal-action-btn close-btn" id="closeAddCustomerModal" title="Close"><i class="fas fa-times"></i></button>
          </div>
    <!-- Main Content Grid -->
    <div class="modal-main-grid" style="display: flex; gap: 24px; padding: 28px 28px 0 28px; background: var(--white);">
      <!-- Left Main Form -->
      <div class="customer-main-form card-box">
        <form class="modern-customer-form">
          <div class="form-row acc-row">
            <label>Acc Number</label>
            <div class="acc-input-group">
              <input type="text" placeholder="Auto Generate" class="modern-input" style="font-style:italic;">
              <div class="acc-actions">
                <button type="button" class="acc-action-btn"><i class="fas fa-pen"></i></button>
                <button type="button" class="acc-action-btn"><i class="fas fa-envelope"></i></button>
                <button type="button" class="acc-action-btn"><i class="fas fa-comment"></i></button>
          </div>
          </div>
          </div>
          <div class="form-row"><label>Company</label><input type="text" class="modern-input"></div>
          <div class="form-row"><label>Name</label><input type="text" class="modern-input"></div>
          <div class="form-row house-row">
            <label>House No</label>
            <div class="house-post-group">
              <input type="text" class="modern-input" style="flex:2;">
              <input type="text" placeholder="Post Code" class="modern-input" style="flex:1; margin-left:10px;">
              <button type="button" class="acc-action-btn" style="margin-left:6px;"><i class="fas fa-search"></i></button>
          </div>
          </div>
          <div class="form-row"><label>Road</label><input type="text" class="modern-input"></div>
          <div class="form-row"><label>Locality</label><input type="text" class="modern-input"></div>
          <div class="form-row"><label>Town</label><input type="text" class="modern-input"></div>
          <div class="form-row"><label>County</label><input type="text" class="modern-input"></div>
          <hr class="modern-divider">
          <div class="form-row"><label>Mobile</label><input type="text" class="modern-input"></div>
          <div class="form-row"><label>Telephone</label><input type="text" class="modern-input"></div>
          <div class="form-row"><label>Email</label><input type="email" class="modern-input"></div>
        </form>
        </div>
    
      <!-- Right Sidebar Tabs -->
      <div class="customer-sidebar card-box">
        <!-- Tab Buttons -->
        <div class="customer-tabs" style="display: flex; gap: 0; margin-bottom: 12px;">
          <button onclick="switchTab('account')" class="tab-btn active" style="flex:1; border-radius: 8px 0 0 8px;">Account</button>
          <button onclick="switchTab('info')" class="tab-btn" style="flex:1; border-radius: 0;">Info / Notes</button>
          <button onclick="switchTab('rates')" class="tab-btn" style="flex:1; border-radius: 0;">Rates / Misc</button>
          <button onclick="switchTab('privacy')" class="tab-btn" style="flex:1; border-radius: 0 8px 8px 0;">Privacy</button>
      </div>

        <!-- Account Tab Content -->
        <div id="account-tab" class="tab-content" style="display: block;">
          <div style="margin-bottom: 18px;">
            <div style="display: flex; align-items: center; gap: 14px; margin-bottom: 12px;">
              <span style="font-weight: 500; color: #444;">Credit Account Held</span>
              <div class="credit-toggle-group">
                <button type="button" class="credit-toggle-btn" onclick="toggleCredit('Y')">Y</button>
                <button type="button" class="credit-toggle-btn active" onclick="toggleCredit('N')">N</button>
          </div>
          </div>
            <div class="alt-contact-cards">
              <!-- Alternate Contact 1 -->
              <div class="alt-contact-card">
                <div class="alt-contact-header">Alternate Contact 1</div>
                <div class="alt-contact-fields">
                  <input type="text" placeholder="Contact Name" class="alt-contact-input">
                  <input type="text" placeholder="Phone Number" class="alt-contact-input">
          </div>
          </div>
              <!-- Alternate Contact 2 -->
              <div class="alt-contact-card">
                <div class="alt-contact-header">Alternate Contact 2</div>
                <div class="alt-contact-fields">
                  <input type="text" placeholder="Contact Name" class="alt-contact-input">
                  <input type="text" placeholder="Phone Number" class="alt-contact-input">
          </div>
          </div>
              <!-- Alternate Contact 3 -->
              <div class="alt-contact-card">
                <div class="alt-contact-header">Alternate Contact 3</div>
                <div class="alt-contact-fields">
                  <input type="text" placeholder="Contact Name" class="alt-contact-input">
                  <input type="text" placeholder="Phone Number" class="alt-contact-input">
        </div>
      </div>
          </div>
          </div>
        </div>
        
        <!-- Info Tab Content -->
        <div id="info-tab" class="tab-content" style="display: none;">
          <form class="info-notes-form">
            <div class="info-grid">
              <label>Further Info 1</label>
              <input type="text" class="modern-input">
              <label>Further Info 2</label>
              <input type="text" class="modern-input">
              <label>Further Info 3</label>
              <input type="text" class="modern-input">
              <label>How Found Us</label>
              <select class="modern-input">
                <option value="">Select...</option>
                <option value="referral">Referral</option>
                <option value="web">Web Search</option>
                <option value="ad">Advertisement</option>
                <option value="walkin">Walk-in</option>
            </select>
              <label style="visibility:hidden;">Spacer</label>
              <div class="info-row-group">
                <label style="margin-right:10px; color:#222; font-weight:500;">Last Invoiced</label>
                <input type="text" class="modern-input" style="max-width:160px;">
          </div>
          </div>
            <hr class="modern-divider">
            <div class="notes-area-wrapper">
              <textarea class="lined-notes" rows="8" placeholder="Notes..."></textarea>
            </div>
          </form>
      </div>

        <!-- Rates Tab Content -->
        <div id="rates-tab" class="tab-content" style="display: none;">
          <form class="rates-misc-form">
            <div class="rates-grid">
              <label>Labour Rate</label>
              <input type="text" class="modern-input rates-equal-input">
              <label>Labour Discount</label>
              <div class="rates-row-group">
                <input type="text" class="modern-input rates-equal-input">
                <span class="rates-unit">%</span>
              </div>
              <hr class="modern-divider rates-divider">
              <label>Trade Parts Rate</label>
              <div class="trade-toggle-group">
                <button type="button" class="trade-toggle-btn" onclick="toggleTradeParts('Y')">Y</button>
                <button type="button" class="trade-toggle-btn active" onclick="toggleTradeParts('N')">N</button>
              </div>
              <label>Parts Discount</label>
              <div class="rates-row-group">
                <input type="text" class="modern-input" style="max-width:120px;">
                <span class="rates-unit">%</span>
              </div>
              <hr class="modern-divider rates-divider">
              <label>Force TAX code usage</label>
              <div class="rates-row-group">
                <select class="modern-input" style="max-width:220px;">
                  <option>TO VAT FREE - 0%</option>
                  <option>T1 EXC VAT - 20%</option>
                  <option>T5 CUSTOM - 30%</option>
            </select>
                <button type="button" class="acc-action-btn" style="margin-left:8px;"><i class="fas fa-times"></i></button>
          </div>
              <label>Customer Type</label>
              <select class="modern-input">
                <option>Retail Customer</option>
                <option>Trade Customer</option>
                <option>Insurance Company</option>
                <option>Internal</option>
            </select>
        </div>
            <div class="rates-info-box">
              <b>Customer type:</b> Insurance company, Trade, and Retail are currently used for the Business Report &gt; KPI Report Assistant, to break down the figures appropriately. Internal should be used when invoicing yourself and will use the cost price of parts for the selling price.
            </div>
          </form>
      </div>

        <!-- Privacy Tab Content -->
        <div id="privacy-tab" class="tab-content" style="display: none;">
          <form class="privacy-form">
            <div class="privacy-grid">
              <label><b>Allow Reminders</b> <span class="privacy-sub">(Any Method)</span></label>
              <div class="privacy-toggle-group">
                <button type="button" class="privacy-toggle-btn blue" onclick="togglePrivacy(this, 'reminders', 'Y')">Y</button>
                <button type="button" class="privacy-toggle-btn blue active" onclick="togglePrivacy(this, 'reminders', 'N')">N</button>
              </div>
              <label><b>Allow Mass Mailings</b> <span class="privacy-sub">(Any Method)</span></label>
              <div class="privacy-toggle-group">
                <button type="button" class="privacy-toggle-btn blue" onclick="togglePrivacy(this, 'mailings', 'Y')">Y</button>
                <button type="button" class="privacy-toggle-btn blue active" onclick="togglePrivacy(this, 'mailings', 'N')">N</button>
              </div>
              <hr class="modern-divider privacy-divider">
              <label>Allow Individual <b>Email</b> Communications</label>
              <div class="privacy-toggle-group">
                <button type="button" class="privacy-toggle-btn blue" onclick="togglePrivacy(this, 'email', 'Y')">Y</button>
                <button type="button" class="privacy-toggle-btn blue active" onclick="togglePrivacy(this, 'email', 'N')">N</button>
              </div>
              <label>Allow Individual <b>SMS</b> Communications</label>
              <div class="privacy-toggle-group">
                <button type="button" class="privacy-toggle-btn blue" onclick="togglePrivacy(this, 'sms', 'Y')">Y</button>
                <button type="button" class="privacy-toggle-btn blue active" onclick="togglePrivacy(this, 'sms', 'N')">N</button>
              </div>
            </div>
            <hr class="modern-divider privacy-divider">
            <div class="privacy-consent-row">
              <span class="privacy-consent-label">Do you have the customers consent for these settings?</span>
              <div class="privacy-toggle-group">
                <button type="button" class="privacy-toggle-btn red" onclick="togglePrivacy(this, 'consent', 'Y')">Y</button>
                <button type="button" class="privacy-toggle-btn red active" onclick="togglePrivacy(this, 'consent', 'N')">N</button>
          </div>
            </div>
            <textarea class="privacy-notes" rows="2" placeholder="Notes..."></textarea>
            <button type="button" class="privacy-update-btn" disabled>Update Privacy Settings</button>
          </form>
          </div>
        </div>
      </div>

    <!-- Bottom Tabbed Section -->
    <div class="customer-bottom-tabs-section">
      <div class="customer-bottom-tabs">
        <button class="bottom-tab-btn active" data-tab="issued">Issued Docs</button>
        <button class="bottom-tab-btn" data-tab="other">Other Docs</button>
        <button class="bottom-tab-btn" data-tab="appointments">Appointments</button>
        <button class="bottom-tab-btn" data-tab="vehicles">Vehicles</button>
        <button class="bottom-tab-btn" data-tab="alt">Alt Delivery</button>
        <button class="bottom-tab-btn" data-tab="comms">Comms Activity</button>
        <button class="bottom-tab-btn" data-tab="overview">Overview</button>
      </div>
      <div class="customer-bottom-tab-content issued-tab-content">
        <div class="customer-bottom-table-wrapper">
          <table class="customer-bottom-table">
            <thead>
              <tr>
                <th>Date</th>
                <th>Doc No</th>
                <th>Registration</th>
                <th>Vehicle</th>
                <th>Description</th>
                <th>Mileage</th>
                <th>Total</th>
                <th>Receipts</th>
                <th>Balance</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>2024-05-01</td>
                <td>INV-1001</td>
                <td>T123ABC</td>
                <td>Toyota Corolla</td>
                <td>Annual Service</td>
                <td>120,000</td>
                <td>650,000</td>
                <td>650,000</td>
                <td>0</td>
              </tr>
              <tr>
                <td>2024-04-15</td>
                <td>INV-0998</td>
                <td>T456XYZ</td>
                <td>Nissan X-Trail</td>
                <td>Brake Replacement</td>
                <td>98,500</td>
                <td>320,000</td>
                <td>320,000</td>
                <td>0</td>
              </tr>
              <tr>
                <td>2024-03-22</td>
                <td>INV-0975</td>
                <td>T789DEF</td>
                <td>Honda Fit</td>
                <td>Battery Change</td>
                <td>75,000</td>
                <td>150,000</td>
                <td>150,000</td>
                <td>0</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="customer-bottom-tab-content other-tab-content" style="display:none;">
        <div class="customer-bottom-table-wrapper">
          <table class="customer-bottom-table modern-other-docs-table">
            <thead>
              <tr>
                <th>Date</th>
                <th>Doc No</th>
                <th>Registration</th>
                <th>Vehicle</th>
                <th>Description</th>
                <th>Mileage</th>
                <th>Total</th>
                <th>Receipts</th>
                <th>Balance</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>2024-05-10</td>
                <td>DOC-2001</td>
                <td>T321XYZ</td>
                <td>Ford Ranger</td>
                <td>Warranty Claim</td>
                <td>45,000</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
              </tr>
              <tr>
                <td>2024-04-28</td>
                <td>DOC-1987</td>
                <td>T654LMN</td>
                <td>BMW X5</td>
                <td>Recall Notice</td>
                <td>88,000</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
              </tr>
              <tr>
                <td>2024-03-30</td>
                <td>DOC-1950</td>
                <td>T987QRS</td>
                <td>Mercedes C200</td>
                <td>Service Booklet</td>
                <td>120,000</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="customer-bottom-tab-content appointments-tab-content" style="display:none;">
        <div class="customer-bottom-table-wrapper">
          <table class="customer-bottom-table modern-appointments-table">
            <thead>
              <tr>
                <th>Date</th>
                <th>Time</th>
                <th>Duration</th>
                <th>Type</th>
                <th>Bay</th>
                <th>Note</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>2024-06-01</td>
                <td>09:00</td>
                <td>2h</td>
                <td>Service</td>
                <td>Bay 1</td>
                <td>Annual checkup</td>
              </tr>
              <tr>
                <td>2024-06-03</td>
                <td>13:30</td>
                <td>1h</td>
                <td>Repair</td>
                <td>Bay 2</td>
                <td>Brake pads</td>
              </tr>
              <tr>
                <td>2024-06-10</td>
                <td>11:00</td>
                <td>3h</td>
                <td>Inspection</td>
                <td>Bay 3</td>
                <td>Pre-sale</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="customer-bottom-tab-content vehicles-tab-content" style="display:none;">
        <div class="customer-bottom-table-wrapper">
          <table class="customer-bottom-table modern-vehicles-table">
            <thead>
              <tr>
                <th>Registration</th>
                <th>Make / Model</th>
                <th>Chassis Number</th>
                <th>Next Reminder Due</th>
                <th>Last Invoiced</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>T123ABC</td>
                <td>Toyota Corolla</td>
                <td>JTDBR32E920123456</td>
                <td>2024-07-01</td>
                <td>2024-05-01</td>
              </tr>
              <tr>
                <td>T456XYZ</td>
                <td>Nissan X-Trail</td>
                <td>JN1TANT31Z0001234</td>
                <td>2024-08-15</td>
                <td>2024-04-15</td>
              </tr>
              <tr>
                <td>T789DEF</td>
                <td>Honda Fit</td>
                <td>GE6-1234567</td>
                <td>2024-09-10</td>
                <td>2024-03-22</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="customer-bottom-tab-content alt-tab-content" style="display:none;">
        <div class="alt-delivery-container">
          <!-- Left: Delivery Addresses Table -->
          <div class="alt-delivery-list-card">
            <table class="alt-delivery-table">
              <thead>
                <tr>
                  <th>Title</th>
                  <th>First Name</th>
                  <th>Surname</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Mr</td>
                  <td>John</td>
                  <td>Smith</td>
                </tr>
                <tr>
                  <td>Ms</td>
                  <td>Jane</td>
                  <td>Doe</td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- Right: Address Form -->
          <div class="alt-delivery-form-card">
            <form class="alt-delivery-form">
              <div class="alt-delivery-grid">
                <label>Name</label>
                <input type="text" class="modern-input" placeholder="Name">
                <label>House No</label>
                <input type="text" class="modern-input" placeholder="House No">
                <label>Road</label>
                <input type="text" class="modern-input" placeholder="Road">
                <label>Locality</label>
                <input type="text" class="modern-input" placeholder="Locality">
                <label>Town</label>
                <input type="text" class="modern-input" placeholder="Town">
                <label>County</label>
                <input type="text" class="modern-input" placeholder="County">
                <label>Post Code</label>
                <div class="postcode-row">
                  <input type="text" class="modern-input" placeholder="Post Code">
                  <button type="button" class="search-btn"><span>&#128269;</span></button>
                </div>
                <label>Telephone</label>
                <input type="text" class="modern-input" placeholder="Telephone">
                <label>Mobile</label>
                <input type="text" class="modern-input" placeholder="Mobile">
              </div>
              <button type="button" class="modal-action-btn primary">Add New</button>
            </form>
          </div>
        </div>
      </div>
      <div class="customer-bottom-tab-content comms-tab-content" style="display:none;">
        <div class="comms-activity-card">
          <div class="comms-add-btn-row">
            <button class="comms-add-btn" title="Add Communication"><span>+</span></button>
          </div>
          <table class="comms-activity-table">
            <thead>
              <tr>
                <th>When</th>
                <th>User</th>
                <th>Action</th>
                <th>Recipient</th>
                <th>Description</th>
                <th>Result</th>
              </tr>
            </thead>
            <tbody>
              <!-- Example empty row for now -->
              <tr><td colspan="6" style="height: 48px;"></td></tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="customer-bottom-tab-content overview-tab-content" style="display:none;">
        <div class="overview-toolbar smart-toolbar">
          <div class="overview-date-controls">
            <label class="red-label">From:</label>
            <input type="date" class="overview-date-input" id="fromDate">
            <label class="red-label" style="margin-left:12px;">To:</label>
            <input type="date" class="overview-date-input" id="toDate">
            <button class="overview-btn red-btn" id="clearDateBtn" title="Clear">&#10005;</button>
            <button class="overview-btn red-btn" id="todayBtn">Today</button>
            <select class="overview-select" id="dateRangeSelect">
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
            <button class="overview-btn red-btn tab-btn active" id="salesRangeTab">Sales in Range</button>
            <button class="overview-btn red-btn tab-btn" id="fiveYearTab">5 Yr Overview</button>
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
            <canvas id="overviewChartCanvas" width="1200" height="400" style="width:100%;max-width:100%;height:340px;"></canvas>
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

<!-- Customer Communications Modal -->
<div id="commsModal" class="comms-modal" style="display:none;">
  <div class="comms-modal-backdrop"></div>
  <div class="comms-modal-content">
    <div class="comms-modal-header">
      <span class="comms-modal-title">Customer Communications</span>
      <button class="comms-modal-close-btn" id="closeCommsModal">&#10005;</button>
    </div>
    <div class="comms-modal-tabs">
      <button class="comms-modal-tab-btn close-tab" id="commsCloseTab">Close</button>
      <button class="comms-modal-tab-btn insert-tab active" id="commsInsertTab">Insert</button>
    </div>
    <form id="commsForm" class="comms-modal-form" autocomplete="off">
      <div class="comms-form-row">
        <label>Action</label>
        <select id="commsAction" required>
          <option value="">Required</option>
          <option value="Phone Call">Phone Call</option>
          <option value="Sent Letter">Sent Letter</option>
          <option value="Sent Email">Sent Email</option>
          <option value="Sent SMS">Sent SMS</option>
          <option value="Other">Other</option>
            </select>
          </div>
      <div class="comms-form-row date-time-row">
        <div>
          <label>Date</label>
          <input type="date" id="commsDate">
        </div>
        <div>
          <label>Time</label>
          <input type="time" id="commsTime" placeholder="hh:mm">
        </div>
      </div>
      <hr class="comms-modal-divider">
      <div class="comms-form-row">
        <label>Recipient</label>
        <input type="text" id="commsRecipient">
    </div>
      <div class="comms-form-row">
        <label>Description</label>
        <textarea id="commsDescription" rows="2"></textarea>
      </div>
      <div class="comms-form-row">
        <label>Result</label>
        <input type="text" id="commsResult">
      </div>
    </form>
  </div>
</div>

<style>
.customer-modal {
  background: #fff;
  border-radius: 18px;
  box-shadow: 0 6px 32px 0 rgba(34,34,59,0.13);
  padding: 0;
  overflow: hidden;
}

.modal-action-btn {
  border: none;
  outline: none;
  border-radius: 999px;
  padding: 0 18px;
  height: 38px;
  min-width: 92px;
  font-size: 0.98em;
  font-weight: 700;
  display: flex;
  align-items: center;
  gap: 8px;
  background: #444;
  color: #fff;
  box-shadow: 0 2px 8px rgba(44,44,44,0.10);
  transition: background 0.18s, color 0.18s, box-shadow 0.18s, transform 0.18s;
  cursor: pointer;
  margin: 0;
  white-space: nowrap;
}

.modal-action-btn.primary {
  background: #b91c1c;
  color: #fff;
  box-shadow: 0 2px 12px rgba(185,28,28,0.13);
}

.modal-action-btn.danger {
  background: #b91c1c;
  color: #fff;
  box-shadow: 0 2px 12px rgba(185,28,28,0.13);
}

.modal-action-btn.close-btn {
  background: #fff;
  color: #b91c1c;
  border: 2px solid #b91c1c;
  min-width: 38px;
  width: 38px;
  height: 38px;
  padding: 0;
  margin-left: auto;
  font-size: 1.08em;
  box-shadow: 0 2px 8px rgba(185,28,28,0.08);
  display: flex;
  align-items: center;
  justify-content: center;
}

.tab-btn {
  background: #f3f4f6;
  color: #b91c1c;
  font-weight: 700;
  border: none;
  padding: 10px 0;
  transition: background 0.18s, color 0.18s;
  font-size: 1.08em;
  cursor: pointer;
  outline: none;
}

.tab-btn.active, .tab-btn:focus {
  background: #b91c1c;
  color: #fff;
  z-index: 1;
}

.credit-toggle-group {
  display: inline-flex;
  border-radius: 6px;
  overflow: hidden;
  border: 1.5px solid #aaa;
  background: #f3f4f6;
}

.credit-toggle-btn {
  background: #e5e7eb;
  color: #888;
  border: none;
  outline: none;
  padding: 4px 18px;
  font-weight: 700;
  font-size: 1em;
  cursor: pointer;
  transition: background 0.18s, color 0.18s;
}

.credit-toggle-btn.active, .credit-toggle-btn:focus {
  background: #b91c1c;
  color: #fff;
}

.customer-bottom-tabs-section {
  margin-top: 32px;
  background: #fff;
  border-radius: 0 0 12px 12px;
  box-shadow: none;
  padding: 0 0 18px 0;
}

.customer-bottom-tabs {
  display: flex;
  gap: 2px;
  padding: 0 8px;
  margin-bottom: 0.5rem;
  border-bottom: 1px solid #ececec;
}

.bottom-tab-btn {
  border: none;
  outline: none;
  border-radius: 7px 7px 0 0;
  padding: 7px 18px;
  font-size: 1em;
  font-weight: 600;
  background: #f6f6f6;
  color: #b91c1c;
  transition: background 0.15s, color 0.15s;
  cursor: pointer;
  box-shadow: none;
  margin-bottom: -1px;
}

.bottom-tab-btn.active, .bottom-tab-btn:focus {
  background: #b91c1c;
  color: #fff;
  z-index: 1;
}

.customer-bottom-table-wrapper {
  background: #fff;
  border-radius: 8px;
  box-shadow: none;
  padding: 0;
  margin: 0 8px;
  overflow-x: auto;
}

.customer-bottom-table {
  width: 100%;
  border-collapse: separate;
  border-spacing: 0;
  background: #fff;
  border-radius: 8px;
  overflow: hidden;
  margin: 0;
}

.customer-bottom-table thead tr {
  background: #f6f6f6;
}

.customer-bottom-table th {
  padding: 10px 8px;
  font-weight: 700;
  color: #b91c1c;
  background: #f6f6f6;
  border-bottom: 1px solid #ececec;
  text-align: left;
  font-size: 0.98em;
}

.customer-bottom-table td {
  padding: 10px 8px;
  border-bottom: 1px solid #f6f6f6;
  font-size: 0.97em;
}

.customer-bottom-table tbody tr:nth-child(even) {
  background: #fafbfc;
}

/* Checkbox Styles */
input[type="checkbox"] {
  accent-color: #b91c1c;
  cursor: pointer;
  width: 16px;
  height: 16px;
}

input[type="checkbox"] + label {
  cursor: pointer;
  user-select: none;
  margin-left: 8px;
}

.alt-contact-cards {
  display: flex;
  flex-direction: column;
  gap: 24px;
  margin-top: 18px;
}
.alt-contact-card {
  background: #fff;
  border-radius: 14px;
  box-shadow: 0 2px 12px rgba(44,62,80,0.07);
  padding: 22px 24px 20px 24px;
  display: flex;
  flex-direction: column;
  gap: 8px;
}
.alt-contact-header {
  font-size: 1.25em;
  font-weight: 700;
  color: #1e293b;
  margin-bottom: 2px;
}
.alt-contact-sub {
  font-size: 1em;
  color: #64748b;
  margin-bottom: 14px;
}
.alt-contact-fields {
  display: flex;
  gap: 18px;
  width: 100%;
}
.alt-contact-input {
  flex: 1 1 0;
  min-width: 0;
  padding: 13px 16px;
  border-radius: 9px;
  border: 1.5px solid #e5e7eb;
  font-size: 1.08em;
  background: #f9fafb;
  color: #222;
  transition: border-color 0.18s, box-shadow 0.18s;
  outline: none;
  box-sizing: border-box;
}
.alt-contact-input:focus {
  border-color: #b91c1c;
  box-shadow: 0 0 0 2px #fca5a5;
}

.modern-customer-form {
  display: flex;
  flex-direction: column;
  gap: 0;
  width: 100%;
}
.form-row {
  display: flex;
  align-items: center;
  gap: 0;
  margin-bottom: 0.5rem;
  min-height: 48px;
}
.form-row label {
  flex: 0 0 120px;
  font-weight: 500;
  color: #222;
  font-size: 1.08em;
  margin-right: 18px;
  text-align: left;
}
.modern-input {
  flex: 1 1 0;
  min-width: 0;
  padding: 11px 14px;
  border-radius: 8px;
  border: 1.5px solid #e5e7eb;
  font-size: 1.08em;
  background: #fff;
  color: #222;
  transition: border-color 0.18s, box-shadow 0.18s;
  outline: none;
  box-sizing: border-box;
}
.modern-input:focus {
  border-color: #b91c1c;
  box-shadow: 0 0 0 2px #fca5a5;
}
.acc-row .acc-input-group {
  display: flex;
  align-items: center;
  gap: 10px;
  width: 100%;
}
.acc-actions {
  display: flex;
  gap: 6px;
}
.acc-action-btn {
  background: #f3f4f6;
  border: 1.5px solid #e5e7eb;
  color: #b91c1c;
  border-radius: 7px;
  padding: 7px 10px;
  font-size: 1.08em;
  cursor: pointer;
  transition: background 0.15s, color 0.15s, border-color 0.15s;
  outline: none;
  display: flex;
  align-items: center;
  justify-content: center;
}
.acc-action-btn:hover, .acc-action-btn:focus {
  background: #fff0f1;
  color: #e11d1d;
  border-color: #b91c1c;
}
.house-row .house-post-group {
  display: flex;
  align-items: center;
  width: 100%;
}
.modern-divider {
  border: none;
  border-top: 1.5px solid #ececec;
  margin: 18px 0 18px 0;
}
@media (max-width: 900px) {
  .form-row label { flex-basis: 90px; font-size: 1em; }
}

@media (max-width: 768px) {
  .modal-main-grid {
    flex-direction: column;
  }
  
  .customer-sidebar {
    min-width: 100%;
  }
}
.card-box {
  background: #fff;
  border-radius: 16px;
  box-shadow: 0 2px 16px rgba(44,62,80,0.08);
  padding: 28px 28px 22px 28px;
  margin-bottom: 0;
  display: flex;
  flex-direction: column;
  gap: 0;
}
@media (max-width: 900px) {
  .modal-main-grid { flex-direction: column; gap: 18px; }
  .card-box { padding: 18px 8px 14px 8px; }
}
.info-notes-form {
  width: 100%;
  margin-top: 0;
}
.info-grid {
  display: grid;
  grid-template-columns: 140px 1fr;
  gap: 12px 18px;
  align-items: center;
  margin-bottom: 18px;
}
.info-row-group {
  display: flex;
  align-items: center;
  gap: 0;
}
.notes-area-wrapper {
  margin-top: 12px;
}
.lined-notes {
  width: 100%;
  min-height: 180px;
  background: repeating-linear-gradient(
    to bottom,
    #fffbe6 0px,
    #fffbe6 28px,
    #f7e9b6 28px,
    #f7e9b6 29px
  );
  border: 1.5px solid #f7e9b6;
  border-radius: 9px;
  font-size: 1.08em;
  color: #222;
  padding: 14px 16px;
  resize: vertical;
  box-sizing: border-box;
  font-family: inherit;
  line-height: 28px;
  outline: none;
  transition: border-color 0.18s, box-shadow 0.18s;
}
.lined-notes:focus {
  border-color: #b91c1c;
  box-shadow: 0 0 0 2px #fca5a5;
}
.rates-misc-form {
  width: 100%;
  margin-top: 0;
}
.rates-grid {
  display: grid;
  grid-template-columns: 160px 1fr;
  gap: 12px 18px;
  align-items: center;
  margin-bottom: 18px;
}
.rates-row-group {
  display: flex;
  align-items: center;
  gap: 8px;
}
.rates-unit {
  color: #64748b;
  font-size: 1.08em;
  margin-left: 4px;
}
.rates-divider {
  grid-column: 1 / -1;
  margin: 10px 0 10px 0;
}
.rates-info-box {
  background: #e6f3fa;
  color: #222;
  border-radius: 9px;
  padding: 16px 18px;
  font-size: 1.01em;
  margin-top: 10px;
  border: 1.5px solid #b6d6ea;
}
.rates-equal-input {
  min-width: 0;
  width: 100%;
  max-width: 220px;
}
.trade-toggle-group {
  display: flex;
  align-items: center;
  justify-content: flex-start;
  gap: 0;
  background: #f3f4f6;
  border-radius: 8px;
  border: 1.5px solid #e5e7eb;
  overflow: hidden;
  width: 120px;
  box-shadow: 0 1px 4px rgba(185,28,28,0.06);
  transition: box-shadow 0.18s;
}
.trade-toggle-btn {
  flex: 1 1 0;
  border: none;
  outline: none;
  background: transparent;
  color: #b91c1c;
  font-weight: 700;
  font-size: 1.08em;
  padding: 8px 0;
  cursor: pointer;
  transition: background 0.18s, color 0.18s;
  border-radius: 0;
  position: relative;
  z-index: 1;
}
.trade-toggle-btn.active {
  background: #b91c1c;
  color: #fff;
  box-shadow: 0 2px 8px rgba(185,28,28,0.10);
  z-index: 2;
  transition: background 0.18s, color 0.18s;
}
.trade-toggle-btn:not(.active):hover {
  background: #fca5a5;
  color: #b91c1c;
}
.trade-toggle-group .trade-toggle-btn {
  border-right: 1.5px solid #e5e7eb;
}
.trade-toggle-group .trade-toggle-btn:last-child {
  border-right: none;
}
.privacy-form {
  width: 100%;
  margin-top: 0;
  display: flex;
  flex-direction: column;
  gap: 0;
}
.privacy-grid {
  display: grid;
  grid-template-columns: 1fr 120px;
  gap: 12px 18px;
  align-items: center;
  margin-bottom: 12px;
}
.privacy-sub {
  color: #64748b;
  font-size: 0.98em;
  font-weight: 400;
}
.privacy-toggle-group {
  display: flex;
  align-items: center;
  background: #f3f4f6;
  border-radius: 8px;
  border: 1.5px solid #e5e7eb;
  overflow: hidden;
  width: 90px;
  box-shadow: 0 1px 4px rgba(44,62,80,0.06);
  transition: box-shadow 0.18s;
}
.privacy-toggle-btn {
  flex: 1 1 0;
  border: none;
  outline: none;
  background: transparent;
  color: #2563eb;
  font-weight: 700;
  font-size: 1.08em;
  padding: 7px 0;
  cursor: pointer;
  transition: background 0.18s, color 0.18s;
  border-radius: 0;
  position: relative;
  z-index: 1;
}
.privacy-toggle-btn.blue.active {
  background: #2563eb;
  color: #fff;
  box-shadow: 0 2px 8px rgba(37,99,235,0.10);
  z-index: 2;
}
.privacy-toggle-btn.blue:not(.active):hover {
  background: #dbeafe;
  color: #2563eb;
}
.privacy-toggle-btn.red {
  color: #b91c1c;
}
.privacy-toggle-btn.red.active {
  background: #b91c1c;
  color: #fff;
  box-shadow: 0 2px 8px rgba(185,28,28,0.10);
  z-index: 2;
}
.privacy-toggle-btn.red:not(.active):hover {
  background: #fee2e2;
  color: #b91c1c;
}
.privacy-toggle-group .privacy-toggle-btn {
  border-right: 1.5px solid #e5e7eb;
}
.privacy-toggle-group .privacy-toggle-btn:last-child {
  border-right: none;
}
.privacy-divider {
  grid-column: 1 / -1;
  margin: 10px 0 10px 0;
}
.privacy-consent-row {
  display: flex;
  align-items: center;
  gap: 18px;
  margin: 18px 0 10px 0;
}
.privacy-consent-label {
  color: #b91c1c;
  font-weight: 700;
  font-size: 1.13em;
}
.privacy-notes {
  width: 100%;
  min-height: 48px;
  background: #fffbe6;
  border: 1.5px solid #f7e9b6;
  border-radius: 9px;
  font-size: 1.08em;
  color: #222;
  padding: 10px 14px;
  margin: 0 0 14px 0;
  resize: vertical;
  box-sizing: border-box;
  font-family: inherit;
  outline: none;
  transition: border-color 0.18s, box-shadow 0.18s;
}
.privacy-notes:focus {
  border-color: #b91c1c;
  box-shadow: 0 0 0 2px #fca5a5;
}
.privacy-update-btn {
  width: 100%;
  background: #f3f4f6;
  color: #888;
  border: 1.5px solid #e5e7eb;
  border-radius: 9px;
  font-size: 1.13em;
  font-weight: 700;
  padding: 16px 0;
  margin-top: 2px;
  cursor: not-allowed;
  transition: background 0.18s, color 0.18s;
}
.modern-other-docs-table thead tr {
  background: #b91c1c;
}
.modern-other-docs-table th {
  color: #fff;
  background: #b91c1c;
  border-bottom: 2px solid #a31a1a;
}
.modern-appointments-table thead tr {
  background: #b91c1c;
}
.modern-appointments-table th {
  color: #fff;
  background: #b91c1c;
  border-bottom: 2px solid #a31a1a;
}
.modern-vehicles-table thead tr {
  background: #b91c1c;
}
.modern-vehicles-table th {
  color: #fff;
  background: #b91c1c;
  border-bottom: 2px solid #a31a1a;
}
.alt-delivery-container {
  display: flex;
  gap: 32px;
  padding: 32px 16px 16px 16px;
  justify-content: flex-start;
}
.alt-delivery-list-card {
  background: #fff;
  border-radius: 16px;
  box-shadow: 0 4px 18px 0 rgba(185,28,28,0.08);
  padding: 0 0 0 0;
  min-width: 320px;
  max-width: 340px;
  flex: 0 0 340px;
  display: flex;
  flex-direction: column;
  height: 420px;
  overflow: hidden;
}
.alt-delivery-table {
  width: 100%;
  border-collapse: separate;
  border-spacing: 0;
  font-size: 1em;
  background: #fff;
}
.alt-delivery-table th {
  background: #b91c1c;
  color: #fff;
  font-weight: 700;
  padding: 10px 8px;
  border-bottom: 2px solid #e5e7eb;
}
.alt-delivery-table td {
  padding: 10px 8px;
  border-bottom: 1px solid #f3f4f6;
  background: #fff;
}
.alt-delivery-table tr:nth-child(even) td {
  background: #f9fafb;
}
.alt-delivery-form-card {
  background: #fff;
  border-radius: 16px;
  box-shadow: 0 4px 18px 0 rgba(185,28,28,0.08);
  padding: 32px 32px 24px 32px;
  min-width: 420px;
  flex: 1 1 420px;
  display: flex;
  flex-direction: column;
  align-items: flex-start;
}
.alt-delivery-form {
  width: 100%;
}
.alt-delivery-grid {
  display: grid;
  grid-template-columns: 120px 1fr;
  gap: 16px 18px;
  align-items: center;
  margin-bottom: 24px;
}
.alt-delivery-grid label {
  font-weight: 600;
  color: #b91c1c;
  text-align: right;
  padding-right: 8px;
}
.modern-input {
  border: 1.5px solid #e5e7eb;
  border-radius: 999px;
  padding: 8px 16px;
  font-size: 1em;
  outline: none;
  transition: border 0.18s, box-shadow 0.18s;
  background: #fff;
  color: #222;
}
.modern-input:focus {
  border-color: #b91c1c;
  box-shadow: 0 0 0 2px #fca5a5;
}
.postcode-row {
  display: flex;
  align-items: center;
  gap: 6px;
}
.search-btn {
  background: #fff;
  border: 1.5px solid #b91c1c;
  color: #b91c1c;
  border-radius: 999px;
  width: 36px;
  height: 36px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.1em;
  cursor: pointer;
  transition: background 0.18s, color 0.18s, border 0.18s;
}
.search-btn:hover {
  background: #b91c1c;
  color: #fff;
}
.comms-activity-card {
  background: #fff;
  border-radius: 16px;
  box-shadow: 0 4px 18px 0 rgba(185,28,28,0.08);
  padding: 24px 18px 18px 18px;
  margin: 32px auto 0 auto;
  max-width: 98%;
  position: relative;
  min-height: 320px;
}
.comms-add-btn {
  position: absolute;
  top: 18px;
  left: 18px;
  width: 38px;
  height: 38px;
  border-radius: 50%;
  background: #b91c1c;
  color: #fff;
  border: none;
  font-size: 1.6em;
  font-weight: 700;
  display: flex;
  align-items: center;
  justify-content: center;
  box-shadow: 0 2px 8px rgba(185,28,28,0.13);
  cursor: pointer;
  transition: background 0.18s, color 0.18s, box-shadow 0.18s;
  z-index: 2;
}
.comms-add-btn:hover {
  background: #a31a1a;
  color: #fff;
}
.comms-activity-table {
  width: 100%;
  border-collapse: separate;
  border-spacing: 0;
  margin-top: 0;
  font-size: 1em;
  background: #fff;
  border-radius: 12px;
  overflow: hidden;
  box-shadow: 0 2px 8px rgba(185,28,28,0.04);
}
.comms-activity-table th {
  background: #b91c1c;
  color: #fff;
  font-weight: 700;
  padding: 10px 8px;
  border-bottom: 2px solid #e5e7eb;
  text-align: left;
}
.comms-activity-table td {
  padding: 10px 8px;
  border-bottom: 1px solid #f3f4f6;
  background: #fff;
}
.comms-activity-table tr:nth-child(even) td {
  background: #f9fafb;
}
.comms-add-btn-row {
  width: 100%;
  display: flex;
  align-items: center;
  margin-bottom: 8px;
}
.comms-add-btn {
  position: static;
  margin-left: 0;
  margin-bottom: 0;
}
.comms-modal {
  position: fixed;
  top: 0; left: 0; right: 0; bottom: 0;
  z-index: 1300;
  display: flex;
  align-items: center;
  justify-content: center;
}
.comms-modal-backdrop {
  position: absolute;
  top: 0; left: 0; right: 0; bottom: 0;
  background: rgba(34,34,59,0.18);
  z-index: 1301;
}
.comms-modal-content {
  position: relative;
  background: #fff;
  border-radius: 12px;
  box-shadow: 0 6px 32px 0 rgba(34,34,59,0.13);
  min-width: 380px;
  max-width: 98vw;
  padding: 0 0 18px 0;
  z-index: 1302;
  border: 2px solid #b91c1c;
}
.comms-modal-header {
  display: flex;
  align-items: center;
  background: #444;
  border-radius: 10px 10px 0 0;
  padding: 10px 16px 10px 16px;
  border-bottom: 2px solid #b91c1c;
}
.comms-modal-title {
  color: #fff;
  font-weight: 700;
  font-size: 1.1em;
}
.comms-modal-close-btn {
  margin-left: auto;
  background: #b91c1c;
  color: #fff;
  border: none;
  border-radius: 6px;
  width: 32px;
  height: 32px;
  font-size: 1.2em;
  cursor: pointer;
  transition: background 0.18s;
}
.comms-modal-close-btn:hover {
  background: #a31a1a;
}
.comms-modal-tabs {
  display: flex;
  border-bottom: 2px solid #e5e7eb;
  margin-bottom: 8px;
}
.comms-modal-tab-btn {
  flex: 1 1 0;
  padding: 10px 0;
  background: #e5e7eb;
  border: none;
  color: #444;
  font-weight: 600;
  font-size: 1em;
  cursor: pointer;
  border-radius: 0;
  transition: background 0.18s, color 0.18s;
}
.comms-modal-tab-btn.active, .comms-modal-tab-btn.insert-tab.active {
  background: #b91c1c;
  color: #fff;
}
.comms-modal-tab-btn.close-tab {
  border-radius: 0 0 0 0;
}
.comms-modal-tab-btn.insert-tab {
  border-radius: 0 10px 0 0;
}
.comms-modal-form {
  padding: 0 24px 0 24px;
  margin-top: 8px;
}
.comms-form-row {
  display: flex;
  flex-direction: column;
  margin-bottom: 12px;
}
.comms-form-row label {
  font-weight: 600;
  color: #b91c1c;
  margin-bottom: 2px;
}
.comms-form-row input, .comms-form-row select, .comms-form-row textarea {
  border: 1.5px solid #e5e7eb;
  border-radius: 8px;
  padding: 7px 12px;
  font-size: 1em;
  outline: none;
  transition: border 0.18s, box-shadow 0.18s;
  background: #fff;
  color: #222;
}
.comms-form-row input:focus, .comms-form-row select:focus, .comms-form-row textarea:focus {
  border-color: #b91c1c;
  box-shadow: 0 0 0 2px #fca5a5;
}
.comms-form-row textarea {
  min-height: 48px;
  resize: vertical;
}
.comms-modal-divider {
  border: none;
  border-top: 1.5px solid #e5e7eb;
  margin: 12px 0 12px 0;
}
.date-time-row {
  display: flex;
  gap: 18px;
}
.date-time-row > div {
  flex: 1 1 0;
}
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
.tab-btn {
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
  bottom: 8px; /* move to bottom of chart area */
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

.new-doc-dropdown {
  position: absolute;
  top: 100%;
  margin-top: 4px;
  background: #fff;
  border-radius: 12px;
  box-shadow: 0 4px 18px 0 rgba(185,28,28,0.13);
  min-width: 180px;
  z-index: 2000;
  padding: 6px 0 6px 0;
  border: 1.5px solid #e5e7eb;
  display: none;
}
.dropdown-option {
  padding: 12px 22px;
  font-size: 1.08em;
  color: #b91c1c;
  cursor: pointer;
  transition: background 0.18s, color 0.18s;
  border-radius: 8px;
}
.dropdown-option:hover {
  background: #fca5a5;
  color: #fff;
}

.modal-action-bar.fancy-toolbar {
  position: relative;
}
#newDocBtn {
  position: relative;
  z-index: 10;
}
.dropdown-arrow {
  margin-left: 8px;
  font-size: 1em;
  color: #b91c1c;
  vertical-align: middle;
}
.dropdown-arrow-up {
  width: 100%;
  text-align: center;
  font-size: 1.2em;
  color: #b91c1c;
  margin-top: -18px;
  margin-bottom: 2px;
  pointer-events: none;
  line-height: 1;
}
</style> 

<script>
// SIMPLIFIED TAB SYSTEM
function switchTab(tabName) {
  // Hide all tab contents
  document.querySelectorAll('.tab-content').forEach(tab => {
    tab.style.display = 'none';
  });
  
  // Show selected tab
  document.getElementById(tabName + '-tab').style.display = 'block';
  
  // Update active button
  document.querySelectorAll('.tab-btn').forEach(btn => {
    btn.classList.remove('active');
  });
  event.target.classList.add('active');
}

// CREDIT TOGGLE FUNCTION
function toggleCredit(value) {
  const buttons = document.querySelectorAll('.credit-toggle-btn');
  buttons.forEach(btn => {
    btn.classList.remove('active');
    if(btn.textContent === value) {
      btn.classList.add('active');
    }
  });
}

// TRADE PARTS TOGGLE FUNCTION
function toggleTradeParts(value) {
  const buttons = document.querySelectorAll('.trade-toggle-group .trade-toggle-btn');
  buttons.forEach(btn => {
    btn.classList.remove('active');
    if(btn.textContent.trim() === value) {
      btn.classList.add('active');
    }
  });
}

// BOTTOM TABS FUNCTIONALITY
function switchBottomTab(tabName) {
  // Hide all bottom tab contents
  document.querySelectorAll('.customer-bottom-tab-content').forEach(tab => {
    tab.style.display = 'none';
  });
  
  // Show selected tab
  document.querySelector('.' + tabName + '-tab-content').style.display = 'block';
  
  // Update active button
  document.querySelectorAll('.bottom-tab-btn').forEach(btn => {
    btn.classList.remove('active');
    if(btn.getAttribute('data-tab') === tabName) {
      btn.classList.add('active');
        }
      });
    }

// INITIALIZE DEFAULT TABS
document.addEventListener('DOMContentLoaded', function() {
  // Make sure account tab is visible by default
  document.getElementById('account-tab').style.display = 'block';
  document.querySelector('[onclick="switchTab(\'account\')"]').classList.add('active');
  
  // Initialize bottom tab
  document.querySelector('.issued-tab-content').style.display = 'block';
  document.querySelector('[data-tab="issued"]').classList.add('active');
  
  // Set up bottom tab click handlers
  document.querySelectorAll('.bottom-tab-btn').forEach(btn => {
    btn.addEventListener('click', function() {
      switchBottomTab(this.getAttribute('data-tab'));
    });
  });
  
  // Modal functionality
  const addCustomerModal = document.getElementById('addCustomerModal');
  const closeAddCustomerModalBtn = document.getElementById('closeAddCustomerModal');
  const saveCustomerBtn = document.getElementById('saveCustomerBtn');
  const modalBackdrop = addCustomerModal.querySelector('.modal-backdrop');

  function closeAddCustomerModal() {
    addCustomerModal.style.display = 'none';
  }

  if (closeAddCustomerModalBtn) {
    closeAddCustomerModalBtn.addEventListener('click', closeAddCustomerModal);
  }

  if (modalBackdrop) {
    modalBackdrop.addEventListener('click', closeAddCustomerModal);
  }

  if (saveCustomerBtn) {
    saveCustomerBtn.addEventListener('click', function() {
      // Collect form data
      const customerData = {
        // Your form data collection logic
      };
      
      // Validate and save
      console.log('Saving customer:', customerData);
      closeAddCustomerModal();
      alert('Customer saved successfully!');
    });
  }

  window.openAddCustomerModal = function() {
    addCustomerModal.style.display = 'flex';
  };
  window.closeAddCustomerModal = closeAddCustomerModal;
});

function togglePrivacy(btn, group, value) {
  const groupSelector = group === 'consent' ? '.privacy-consent-row .privacy-toggle-btn' : `.privacy-toggle-group .privacy-toggle-btn.${group === 'reminders' ? 'blue' : group === 'mailings' ? 'blue' : group === 'email' ? 'blue' : group === 'sms' ? 'blue' : ''}`;
  const buttons = btn.parentElement.querySelectorAll('.privacy-toggle-btn');
  buttons.forEach(b => b.classList.remove('active'));
  btn.classList.add('active');
}

document.addEventListener('DOMContentLoaded', function() {
  // Open modal on + button click
  const commsAddBtn = document.querySelector('.comms-add-btn');
  const commsModal = document.getElementById('commsModal');
  const closeCommsModalBtn = document.getElementById('closeCommsModal');
  const commsForm = document.getElementById('commsForm');
  const commsTableBody = document.querySelector('.comms-activity-table tbody');
  const commsBackdrop = document.querySelector('.comms-modal-backdrop');
  const commsInsertTab = document.getElementById('commsInsertTab');
  const commsCloseTab = document.getElementById('commsCloseTab');

  if (commsAddBtn && commsModal) {
    commsAddBtn.addEventListener('click', function() {
      commsModal.style.display = 'flex';
    });
  }
  if (closeCommsModalBtn && commsModal) {
    closeCommsModalBtn.addEventListener('click', function() {
      commsModal.style.display = 'none';
      commsForm.reset();
    });
  }
  if (commsBackdrop && commsModal) {
    commsBackdrop.addEventListener('click', function() {
      commsModal.style.display = 'none';
      commsForm.reset();
    });
  }
  if (commsInsertTab && commsForm) {
    commsInsertTab.addEventListener('click', function(e) {
      e.preventDefault();
      // Validate required field
      const action = document.getElementById('commsAction').value;
      if (!action) {
        document.getElementById('commsAction').style.borderColor = '#b91c1c';
        document.getElementById('commsAction').focus();
        return;
      }
      // Get values
      const date = document.getElementById('commsDate').value;
      const time = document.getElementById('commsTime').value;
      const recipient = document.getElementById('commsRecipient').value;
      const description = document.getElementById('commsDescription').value;
      const result = document.getElementById('commsResult').value;
      // Add to table
      const row = document.createElement('tr');
      row.innerHTML = `<td>${date}</td><td>Current User</td><td>${action}</td><td>${recipient}</td><td>${description}</td><td>${result}</td>`;
      // Remove empty row if present
      if (commsTableBody.children.length === 1 && commsTableBody.children[0].children[0].colSpan === 6) {
        commsTableBody.innerHTML = '';
      }
      commsTableBody.appendChild(row);
      // Close modal and reset
      commsModal.style.display = 'none';
      commsForm.reset();
    });
  }
  if (commsCloseTab && commsModal) {
    commsCloseTab.addEventListener('click', function() {
      commsModal.style.display = 'none';
      commsForm.reset();
    });
  }
});

document.addEventListener('DOMContentLoaded', function() {
  const newDocBtn = document.getElementById('newDocBtn');
  const newDocDropdown = document.getElementById('newDocDropdown');
  if (newDocBtn && newDocDropdown) {
    newDocBtn.addEventListener('click', function(e) {
      e.stopPropagation();
      // Toggle dropdown
      newDocDropdown.style.display = newDocDropdown.style.display === 'block' ? 'none' : 'block';
    });
    // Hide dropdown on outside click
    document.addEventListener('click', function(e) {
      if (!newDocDropdown.contains(e.target) && e.target !== newDocBtn) {
        newDocDropdown.style.display = 'none';
      }
    });
    const options = newDocDropdown.querySelectorAll('.dropdown-option');
    options[0].addEventListener('click', function() { window.location.href = 'estimates.php'; });
    options[1].addEventListener('click', function() { window.location.href = 'job-sheets.php'; });
    options[2].addEventListener('click', function() { window.location.href = 'invoices.php'; });
    options[3].addEventListener('click', function() { window.location.href = 'calendar.php'; });
  }
});
</script>

<script>
// Populate year/month/day dropdowns
function populateDateDropdowns() {
  const now = new Date();
  const fromYear = document.getElementById('fromYear');
  const fromMonth = document.getElementById('fromMonth');
  const fromDay = document.getElementById('fromDay');
  const toYear = document.getElementById('toYear');
  const toMonth = document.getElementById('toMonth');
  const toDay = document.getElementById('toDay');
  // Years 2015 to current
  for (let y = 2015; y <= now.getFullYear(); y++) {
    fromYear.innerHTML += `<option value="${y}">${y}</option>`;
    toYear.innerHTML += `<option value="${y}">${y}</option>`;
  }
  // Months 01-12
  for (let m = 1; m <= 12; m++) {
    const mm = m.toString().padStart(2, '0');
    fromMonth.innerHTML += `<option value="${mm}">${mm}</option>`;
    toMonth.innerHTML += `<option value="${mm}">${mm}</option>`;
  }
  // Days 01-31
  for (let d = 1; d <= 31; d++) {
    const dd = d.toString().padStart(2, '0');
    fromDay.innerHTML += `<option value="${dd}">${dd}</option>`;
    toDay.innerHTML += `<option value="${dd}">${dd}</option>`;
  }
  // Set default to today
  setToday();
}
function setToday() {
  const now = new Date();
  document.getElementById('fromYear').value = now.getFullYear();
  document.getElementById('fromMonth').value = (now.getMonth()+1).toString().padStart(2, '0');
  document.getElementById('fromDay').value = now.getDate().toString().padStart(2, '0');
  document.getElementById('toYear').value = now.getFullYear();
  document.getElementById('toMonth').value = (now.getMonth()+1).toString().padStart(2, '0');
  document.getElementById('toDay').value = now.getDate().toString().padStart(2, '0');
}
function clearDates() {
  document.getElementById('fromYear').selectedIndex = 0;
  document.getElementById('fromMonth').selectedIndex = 0;
  document.getElementById('fromDay').selectedIndex = 0;
  document.getElementById('toYear').selectedIndex = 0;
  document.getElementById('toMonth').selectedIndex = 0;
  document.getElementById('toDay').selectedIndex = 0;
}
document.addEventListener('DOMContentLoaded', function() {
  populateDateDropdowns();
  document.getElementById('todayBtn').addEventListener('click', setToday);
  document.getElementById('clearDateBtn').addEventListener('click', clearDates);
  // Tab logic
  document.getElementById('salesRangeTab').addEventListener('click', function() {
    this.classList.add('active');
    document.getElementById('fiveYearTab').classList.remove('active');
  });
  document.getElementById('fiveYearTab').addEventListener('click', function() {
    this.classList.add('active');
    document.getElementById('salesRangeTab').classList.remove('active');
  });
});

function setDateInputs(from, to) {
  document.getElementById('fromDate').value = from.toISOString().slice(0,10);
  document.getElementById('toDate').value = to.toISOString().slice(0,10);
}
function clearDates() {
  document.getElementById('fromDate').value = '';
  document.getElementById('toDate').value = '';
}
function getMonday(d) {
  d = new Date(d);
  var day = d.getDay(), diff = d.getDate() - day + (day === 0 ? -6 : 1);
  return new Date(d.setDate(diff));
}
function getSunday(d) {
  d = new Date(d);
  var day = d.getDay(), diff = d.getDate() - day + 7;
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
  // Assume financial year starts April 1st
  return new Date(date.getMonth() < 3 ? date.getFullYear()-1 : date.getFullYear(), 3, 1);
}
function getFinancialYearEnd(date) {
  // March 31st next year
  return new Date(date.getMonth() < 3 ? date.getFullYear() : date.getFullYear()+1, 2, 31);
}
document.addEventListener('DOMContentLoaded', function() {
  // Set default to today
  const now = new Date();
  setDateInputs(now, now);
  document.getElementById('todayBtn').addEventListener('click', function() {
    const now = new Date();
    setDateInputs(now, now);
  });
  document.getElementById('clearDateBtn').addEventListener('click', clearDates);
  document.getElementById('dateRangeSelect').addEventListener('change', function() {
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
        let lastQMonth = Math.floor(now.getMonth()/3)*3 - 3;
        let year = now.getFullYear();
        if (lastQMonth < 0) { lastQMonth += 12; year -= 1; }
        from = new Date(year, lastQMonth, 1);
        to = new Date(year, lastQMonth+3, 0);
        break;
      }
      case 'thisYTD':
        from = new Date(now.getFullYear(), 0, 1);
        to = now;
        break;
      case 'lastYTD':
        from = new Date(now.getFullYear()-1, 0, 1);
        to = new Date(now.getFullYear()-1, now.getMonth(), now.getDate());
        break;
      case 'thisYear':
        from = new Date(now.getFullYear(), 0, 1);
        to = new Date(now.getFullYear(), 11, 31);
        break;
      case 'lastYear':
        from = new Date(now.getFullYear()-1, 0, 1);
        to = new Date(now.getFullYear()-1, 11, 31);
        break;
      case 'thisFY':
        from = getFinancialYearStart(now);
        to = getFinancialYearEnd(now);
        break;
      case 'lastFY': {
        let lastFYStart = getFinancialYearStart(now);
        lastFYStart.setFullYear(lastFYStart.getFullYear()-1);
        let lastFYEnd = getFinancialYearEnd(now);
        lastFYEnd.setFullYear(lastFYEnd.getFullYear()-1);
        from = lastFYStart;
        to = lastFYEnd;
        break;
      }
      default:
        return;
    }
    setDateInputs(from, to);
    this.selectedIndex = 0;
  });
});
// ...existing code for getMonday, getSunday, getQuarterStart, getQuarterEnd, getYTDStart, getFinancialYearStart, getFinancialYearEnd...
</script>

<script>
// Draw grid, years at top, legend at bottom
function drawOverviewGrid() {
  const canvas = document.getElementById('overviewChartCanvas');
  if (!canvas) return;
  const ctx = canvas.getContext('2d');
  ctx.clearRect(0, 0, canvas.width, canvas.height);
  // Draw grid
  ctx.strokeStyle = '#e5e7eb';
  ctx.lineWidth = 1;
  for (let y = 40; y <= canvas.height - 40; y += ((canvas.height - 80) / 10)) {
    ctx.beginPath();
    ctx.moveTo(0, y);
    ctx.lineTo(canvas.width, y);
    ctx.stroke();
  }
  for (let x = 80; x < canvas.width; x += 80) {
    ctx.beginPath();
    ctx.moveTo(x, 0);
    ctx.lineTo(x, canvas.height);
    ctx.stroke();
  }
  // Y axis numbers (1.0 to -1.0)
  ctx.save();
  ctx.fillStyle = '#b91c1c';
  ctx.font = '15px sans-serif';
  ctx.textAlign = 'right';
  ctx.textBaseline = 'middle';
  const yLabels = [1.0, 0.8, 0.6, 0.4, 0.2, 0.0, -0.2, -0.4, -0.6, -0.8, -1.0];
  for (let i = 0; i < yLabels.length; i++) {
    const y = 40 + i * ((canvas.height - 80) / 10);
    ctx.fillText(yLabels[i].toFixed(1), 38, y);
  }
  ctx.restore();
  // X axis years (at top)
  ctx.save();
  ctx.fillStyle = '#b91c1c';
  ctx.font = '16px sans-serif';
  ctx.textAlign = 'center';
  for (let year = 2021, x = 80; x < canvas.width; year++, x += 160) {
    ctx.fillText(year, x, 28); // 28px from top
  }
  ctx.restore();
  // Y axis label
  ctx.save();
  ctx.fillStyle = '#b91c1c';
  ctx.font = '16px sans-serif';
  ctx.rotate(-Math.PI/2);
  ctx.textAlign = 'center';
  ctx.fillText('Amount', -canvas.height/2, 24);
  ctx.restore();
}
document.addEventListener('DOMContentLoaded', drawOverviewGrid);
</script>

<script>
// Draw sample graph on canvas with brand colors
function drawOverviewGrid() {
  const canvas = document.getElementById('overviewChartCanvas');
  if (!canvas) return;
  const ctx = canvas.getContext('2d');
  ctx.clearRect(0, 0, canvas.width, canvas.height);
  // Draw grid
  ctx.strokeStyle = '#f3f4f6';
  ctx.lineWidth = 1;
  for (let y = 40; y < canvas.height; y += 40) {
    ctx.beginPath();
    ctx.moveTo(0, y);
    ctx.lineTo(canvas.width, y);
    ctx.stroke();
  }
  for (let x = 80; x < canvas.width; x += 80) {
    ctx.beginPath();
    ctx.moveTo(x, 0);
    ctx.lineTo(x, canvas.height);
    ctx.stroke();
  }
  // Y axis label
  ctx.save();
  ctx.fillStyle = '#b91c1c';
  ctx.font = '16px sans-serif';
  ctx.rotate(-Math.PI/2);
  ctx.textAlign = 'center';
  ctx.fillText('Amount', -canvas.height/2, 24);
  ctx.restore();
  // X axis years
  ctx.save();
  ctx.fillStyle = '#b91c1c';
  ctx.font = '15px sans-serif';
  ctx.textAlign = 'center';
  for (let year = 2021, x = 80; x < canvas.width; year++, x += 160) {
    ctx.fillText(year, x, canvas.height - 10);
  }
  ctx.restore();
  // Sample data for Estimates (green) and Invoices (blue)
  const estimates = [0.2, 0.5, 0.7, 0.6, 0.8, 0.9, 0.7, 0.6, 0.5, 0.4];
  const invoices = [0.1, 0.3, 0.4, 0.5, 0.6, 0.7, 0.8, 0.7, 0.6, 0.5];
  // Draw Estimates line
  ctx.beginPath();
  ctx.strokeStyle = '#22c55e';
  ctx.lineWidth = 3;
  for (let i = 0; i < estimates.length; i++) {
    const x = 80 + i * 100;
    const y = canvas.height - 40 - estimates[i] * 300;
    if (i === 0) ctx.moveTo(x, y);
    else ctx.lineTo(x, y);
  }
  ctx.stroke();
  // Draw Invoices line
  ctx.beginPath();
  ctx.strokeStyle = '#2563eb';
  ctx.lineWidth = 3;
  for (let i = 0; i < invoices.length; i++) {
    const x = 80 + i * 100;
    const y = canvas.height - 40 - invoices[i] * 300;
    if (i === 0) ctx.moveTo(x, y);
    else ctx.lineTo(x, y);
  }
  ctx.stroke();
  // Draw points
  for (let i = 0; i < estimates.length; i++) {
    const x = 80 + i * 100;
    const y = canvas.height - 40 - estimates[i] * 300;
    ctx.beginPath();
    ctx.arc(x, y, 6, 0, 2 * Math.PI);
    ctx.fillStyle = '#22c55e';
    ctx.fill();
    ctx.strokeStyle = '#fff';
    ctx.lineWidth = 2;
    ctx.stroke();
  }
  for (let i = 0; i < invoices.length; i++) {
    const x = 80 + i * 100;
    const y = canvas.height - 40 - invoices[i] * 300;
    ctx.beginPath();
    ctx.arc(x, y, 6, 0, 2 * Math.PI);
    ctx.fillStyle = '#2563eb';
    ctx.fill();
    ctx.strokeStyle = '#fff';
    ctx.lineWidth = 2;
    ctx.stroke();
  }
}
document.addEventListener('DOMContentLoaded', drawOverviewGrid);
</script> 