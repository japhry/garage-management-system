<?php
require_once 'config.php';
renderHeader();
?>
  <?php include 'partials/sidebar.php'; ?>
  <div class="main-content">
    <?php include 'partials/header.php'; ?>
    <div class="dashboard-layout">
      <div class="left-content">
        <!-- Stats Grid -->
        <div class="stats-grid" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; margin-bottom: 30px;">
          <div class="stat-card" style="background: white; border-radius: 15px; padding: 25px; text-align: center; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
            <div class="stat-icon" style="width: 60px; height: 60px; background: rgba(6, 182, 212, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 15px;">
              <i class="fas fa-users" style="font-size: 1.5rem; color: #06b6d4;"></i>
            </div>
            <div class="stat-value" style="font-size: 2rem; font-weight: 700; color: var(--dark); margin-bottom: 5px;">1</div>
            <div class="stat-title" style="font-size: 0.9rem; color: #666; text-transform: uppercase; letter-spacing: 0.5px;">EMPLOYEES</div>
          </div>
          <div class="stat-card" style="background: white; border-radius: 15px; padding: 25px; text-align: center; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
            <div class="stat-icon" style="width: 60px; height: 60px; background: rgba(251, 146, 60, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 15px;">
              <i class="fas fa-user-tie" style="font-size: 1.5rem; color: #fb923c;"></i>
            </div>
            <div class="stat-value" style="font-size: 2rem; font-weight: 700; color: var(--dark); margin-bottom: 5px;">2</div>
            <div class="stat-title" style="font-size: 0.9rem; color: #666; text-transform: uppercase; letter-spacing: 0.5px;">CUSTOMERS</div>
          </div>
          <div class="stat-card" style="background: white; border-radius: 15px; padding: 25px; text-align: center; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
            <div class="stat-icon" style="width: 60px; height: 60px; background: rgba(239, 68, 68, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 15px;">
              <i class="fas fa-truck" style="font-size: 1.5rem; color: #ef4444;"></i>
            </div>
            <div class="stat-value" style="font-size: 2rem; font-weight: 700; color: var(--dark); margin-bottom: 5px;">1</div>
            <div class="stat-title" style="font-size: 0.9rem; color: #666; text-transform: uppercase; letter-spacing: 0.5px;">SUPPLIERS</div>
          </div>
          <div class="stat-card" style="background: white; border-radius: 15px; padding: 25px; text-align: center; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
            <div class="stat-icon" style="width: 60px; height: 60px; background: rgba(168, 85, 247, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 15px;">
              <i class="fas fa-box" style="font-size: 1.5rem; color: #a855f7;"></i>
            </div>
            <div class="stat-value" style="font-size: 2rem; font-weight: 700; color: var(--dark); margin-bottom: 5px;">2</div>
            <div class="stat-title" style="font-size: 0.9rem; color: #666; text-transform: uppercase; letter-spacing: 0.5px;">PARTS</div>
          </div>
          <div class="stat-card" style="background: white; border-radius: 15px; padding: 25px; text-align: center; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
            <div class="stat-icon" style="width: 60px; height: 60px; background: rgba(6, 182, 212, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 15px;">
              <i class="fas fa-car" style="font-size: 1.5rem; color: #06b6d4;"></i>
            </div>
            <div class="stat-value" style="font-size: 2rem; font-weight: 700; color: var(--dark); margin-bottom: 5px;">0</div>
            <div class="stat-title" style="font-size: 0.9rem; color: #666; text-transform: uppercase; letter-spacing: 0.5px;">VEHICLE</div>
          </div>
          <div class="stat-card" style="background: white; border-radius: 15px; padding: 25px; text-align: center; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
            <div class="stat-icon" style="width: 60px; height: 60px; background: rgba(139, 92, 246, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 15px;">
              <i class="fas fa-file-invoice" style="font-size: 1.5rem; color: #8b5cf6;"></i>
            </div>
            <div class="stat-value" style="font-size: 2rem; font-weight: 700; color: var(--dark); margin-bottom: 5px;">2</div>
            <div class="stat-title" style="font-size: 0.9rem; color: #666; text-transform: uppercase; letter-spacing: 0.5px;">INVOICES</div>
          </div>
        </div>

        <!-- Recently Joined Customer -->
        <div class="recent-customers" style="background: white; border-radius: 15px; padding: 25px; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
          <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <h3 style="margin: 0; color: var(--dark);">Recently Joined Customer</h3>
            <i class="fas fa-external-link-alt" style="color: #666; cursor: pointer;"></i>
          </div>
          <div class="customer-item" style="display: flex; align-items: center; gap: 15px; padding: 12px 0; border-bottom: 1px solid #f0f0f0;">
            <div class="customer-avatar" style="width: 40px; height: 40px; border-radius: 50%; background: var(--accent-solid); color: white; display: flex; align-items: center; justify-content: center; font-weight: 600;">
              S
            </div>
            <div class="customer-info">
              <div style="font-weight: 600; color: var(--dark);">Sample Customer</div>
              <div style="font-size: 0.9rem; color: #666;">Sample@garage.com</div>
            </div>
          </div>
          <div class="customer-item" style="display: flex; align-items: center; gap: 15px; padding: 12px 0; border-bottom: 1px solid #f0f0f0;">
            <div class="customer-avatar" style="width: 40px; height: 40px; border-radius: 50%; background: #06b6d4; color: white; display: flex; align-items: center; justify-content: center; font-weight: 600;">
              J
            </div>
            <div class="customer-info">
              <div style="font-weight: 600; color: var(--dark);">Joss Butler</div>
              <div style="font-size: 0.9rem; color: #666;">joss@gmail.com</div>
            </div>
          </div>
          <div class="customer-item" style="display: flex; align-items: center; gap: 15px; padding: 12px 0; border-bottom: 1px solid #f0f0f0;">
            <div class="customer-avatar" style="width: 40px; height: 40px; border-radius: 50%; background: #10b981; color: white; display: flex; align-items: center; justify-content: center; font-weight: 600;">
              M
            </div>
            <div class="customer-info">
              <div style="font-weight: 600; color: var(--dark);">Mike Johnson</div>
              <div style="font-size: 0.9rem; color: #666;">mike.johnson@email.com</div>
            </div>
          </div>
          <div class="customer-item" style="display: flex; align-items: center; gap: 15px; padding: 12px 0; border-bottom: 1px solid #f0f0f0;">
            <div class="customer-avatar" style="width: 40px; height: 40px; border-radius: 50%; background: #8b5cf6; color: white; display: flex; align-items: center; justify-content: center; font-weight: 600;">
              A
            </div>
            <div class="customer-info">
              <div style="font-weight: 600; color: var(--dark);">Anna Williams</div>
              <div style="font-size: 0.9rem; color: #666;">anna.williams@gmail.com</div>
            </div>
          </div>
          <div class="customer-item" style="display: flex; align-items: center; gap: 15px; padding: 12px 0;">
            <div class="customer-avatar" style="width: 40px; height: 40px; border-radius: 50%; background: #ef4444; color: white; display: flex; align-items: center; justify-content: center; font-weight: 600;">
              D
            </div>
            <div class="customer-info">
              <div style="font-weight: 600; color: var(--dark);">David Brown</div>
              <div style="font-size: 0.9rem; color: #666;">david.brown@outlook.com</div>
            </div>
          </div>
        </div>

        <!-- After Recently Joined Customer -->
        <div class="mrc-invoices-section">
          <div class="mrc-section-header mrc-invoices-header">
            <span>Invoices In Progress:</span> <span class="mrc-invoices-filter">All</span> <span class="mrc-invoices-count">(Showing 1 Record)</span>
          </div>
          <div class="mrc-invoices-toolbar">
            <button class="mrc-btn">New Invoice</button>
            <button class="mrc-btn">Archives</button>
            <button class="mrc-btn">Print</button>
            <button class="mrc-btn">New Credit</button>
            <div class="mrc-invoices-filters">
              <input type="text" placeholder="Created" class="mrc-filter-input">
              <input type="date" class="mrc-filter-input">
              <input type="date" class="mrc-filter-input">
              <button class="mrc-btn mrc-btn-small">Today</button>
              <select class="mrc-filter-select"><option>Date Range</option></select>
              <select class="mrc-filter-select"><option>Status</option></select>
            </div>
          </div>
          <div class="mrc-invoices-table-wrapper">
            <table class="mrc-table mrc-invoices-table">
              <thead>
                <tr>
                  <th>T</th><th>Doc No</th><th>Date</th><th>Registration</th><th>Make & Model</th><th>Customer</th><th>Total</th><th>Status</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>SI</td><td>1000</td><td>03/07/2025</td><td>123</td><td></td><td></td><td>0.00</td><td>Open</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="mrc-jobsheets-section">
          <div class="mrc-section-header mrc-jobsheets-header">
            <span>Job Sheets In Progress:</span> <span class="mrc-jobsheets-filter">All</span> <span class="mrc-jobsheets-count">(Showing 4 Records)</span>
          </div>
          <div class="mrc-jobsheets-toolbar">
            <button class="mrc-btn">New Job Sheet</button>
            <button class="mrc-btn">Archives</button>
            <button class="mrc-btn">Print</button>
            <button class="mrc-btn">Print Blank JS</button>
            <button class="mrc-btn">Print All JS</button>
          </div>
          <div class="mrc-jobsheets-table-wrapper">
            <table class="mrc-table mrc-jobsheets-table">
              <thead>
                <tr>
                  <th>T</th><th>Doc No</th><th>Date</th><th>Registration</th><th>Make & Model</th><th>Customer</th><th>Total</th><th>Status</th>
                </tr>
              </thead>
              <tbody>
                <tr><td>JS</td><td>1004</td><td>07/07/2025</td><td></td><td></td><td></td><td>0.00</td><td>Open</td></tr>
                <tr><td>JS</td><td>1003</td><td>04/07/2025</td><td></td><td></td><td></td><td>0.00</td><td>Open</td></tr>
                <tr><td>JS</td><td>1002</td><td>04/07/2025</td><td></td><td></td><td></td><td>0.00</td><td>Open</td></tr>
                <tr><td>JS</td><td>1001</td><td>04/07/2025</td><td></td><td></td><td></td><td>50.00</td><td>Open</td></tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="right-content">
        <?php include 'partials/widget-job-sheets.php'; ?>
        <?php include 'partials/widget-invoices.php'; ?>
        <?php include 'partials/widget-calendar.php'; ?>
        <?php include 'partials/widget-reminders.php'; ?>
        <?php include 'partials/widget-stock-order-info.php'; ?>
        <?php include 'partials/widget-notes.php'; ?>
      </div>
    </div>
  </div>
<?php renderFooter(); ?> 