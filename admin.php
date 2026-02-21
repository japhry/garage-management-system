<?php
require_once 'config.php';
renderHeader();
?>
  <?php include 'partials/sidebar.php'; ?>
  <div class="main-content">
    <?php include 'partials/header.php'; ?>


    <!-- Admin Tabs -->
    <div class="admin-tabs">
      <button class="admin-tab active" data-tab="general">General</button>
      <button class="admin-tab" data-tab="branch">Branch</button>
      <button class="admin-tab" data-tab="customisation">Customisation</button>
      <button class="admin-tab" data-tab="configuration">Configuration</button>
      <button class="admin-tab" data-tab="data">Data</button>
    </div>

    <!-- Admin Content -->
    <div class="admin-content">
      <!-- General Tab Content -->
      <div class="tab-content active" id="general-tab">
        
        <!-- Core Administration Section -->
        <div class="admin-section">
          <h2 class="section-title">Core Administration</h2>
          <div class="admin-grid">
            <div class="admin-module module-account" onclick="openAccountManagerModal()">
              <div class="admin-module-icon">
                <i class="fas fa-folder-open"></i>
              </div>
              <div class="admin-module-title">Account<br>Manager</div>
            </div>
            
            <div class="admin-module module-expense">
              <div class="admin-module-icon">
                <i class="fas fa-folder-open"></i>
              </div>
              <div class="admin-module-title">Expense<br>Manager</div>
            </div>
            
            <div class="admin-module module-reports">
              <div class="admin-module-icon">
                <i class="fas fa-file-alt"></i>
              </div>
              <div class="admin-module-title">Business<br>Reports</div>
            </div>
            
            <div class="admin-module module-charts">
              <div class="admin-module-icon">
                <i class="fas fa-chart-bar"></i>
              </div>
              <div class="admin-module-title">Business<br>Charts</div>
            </div>
            
            <div class="admin-module module-bank">
              <div class="admin-module-icon">
                <i class="fas fa-university"></i>
              </div>
              <div class="admin-module-title">Bank<br>Reconcile</div>
            </div>
          </div>
        </div>

        <!-- Communication & Data Section -->
        <div class="admin-section">
          <h2 class="section-title">Communication & Data</h2>
          <div class="admin-grid">
            <div class="admin-module module-mailing">
              <div class="admin-module-icon">
                <i class="fas fa-envelope"></i>
              </div>
              <div class="admin-module-title">Mass<br>Mailing</div>
            </div>
            
            <div class="admin-module module-csv">
              <div class="admin-module-icon">
                <i class="fas fa-file-csv"></i>
              </div>
              <div class="admin-module-title">Accounts CSV<br>Exports</div>
            </div>
            
            <div class="admin-module module-general-csv">
              <div class="admin-module-icon">
                <i class="fas fa-file-csv"></i>
              </div>
              <div class="admin-module-title">General CSV<br>Exports</div>
            </div>
            
            <div class="admin-module module-attachment">
              <div class="admin-module-icon">
                <i class="fas fa-paperclip"></i>
              </div>
              <div class="admin-module-title">Attachment<br>Browser</div>
            </div>
          </div>
        </div>

        <!-- User Management Section -->
        <div class="admin-section">
          <h2 class="section-title">User Management</h2>
          <div class="admin-grid">
            <div class="admin-module module-employees">
              <div class="admin-module-icon">
                <i class="fas fa-users"></i>
              </div>
              <div class="admin-module-title">Technicians /<br>Employees</div>
            </div>
            
            <div class="admin-module module-preferences">
              <div class="admin-module-icon">
                <i class="fas fa-cog"></i>
              </div>
              <div class="admin-module-title">User<br>Preferences</div>
            </div>
            
            <div class="admin-module module-credits">
              <div class="admin-module-icon">
                <i class="fas fa-credit-card"></i>
              </div>
              <div class="admin-module-title">Your Account<br>& Credits Packs</div>
            </div>
          </div>
        </div>

      </div>

      <!-- Branch Tab Content -->
      <div class="tab-content" id="branch-tab" style="display: none;">
        <div class="placeholder-content">
          <i class="fas fa-code-branch" style="font-size: 3rem;"></i>
          <h3>Branch Management</h3>
          <p>Manage multiple garage locations, branch settings, and inter-branch operations. Configure branch-specific settings and monitor performance across all locations.</p>
        </div>
      </div>

      <!-- Customisation Tab Content -->
      <div class="tab-content" id="customisation-tab" style="display: none;">
        <div class="admin-section">
          <h2 class="section-title">Customisation</h2>
          <div class="admin-grid">
            <div class="admin-module">
              <div class="admin-module-icon"><i class="fas fa-file-alt"></i></div>
              <div class="admin-module-title">Doc Template<br>Settings</div>
            </div>
            <div class="admin-module">
              <div class="admin-module-icon"><i class="fas fa-folder"></i></div>
              <div class="admin-module-title">Department<br>Lists</div>
            </div>
            <div class="admin-module">
              <div class="admin-module-icon"><i class="fas fa-table"></i></div>
              <div class="admin-module-title">Custom Status<br>Options</div>
            </div>
            <div class="admin-module">
              <div class="admin-module-icon"><i class="fas fa-user-friends"></i></div>
              <div class="admin-module-title">Referral<br>Lists</div>
            </div>
            <div class="admin-module">
              <div class="admin-module-icon"><i class="fas fa-users-cog"></i></div>
              <div class="admin-module-title">Technicians<br>Lists</div>
            </div>
            <div class="admin-module">
              <div class="admin-module-icon"><i class="fas fa-calendar-check"></i></div>
              <div class="admin-module-title">Reminder<br>Templates</div>
            </div>
            <div class="admin-module">
              <div class="admin-module-icon"><i class="fas fa-envelope-open-text"></i></div>
              <div class="admin-module-title">Correspondence<br>Templates</div>
            </div>
            <div class="admin-module">
              <div class="admin-module-icon"><i class="fas fa-toolbox" style="color:#ef4444;"></i></div>
              <div class="admin-module-title">Pre Defined<br>Labour / Jobs</div>
            </div>
            <div class="admin-module">
              <div class="admin-module-icon"><i class="fas fa-tools" style="color:#10b981;"></i></div>
              <div class="admin-module-title">Work<br>Descriptions</div>
            </div>
            <div class="admin-module">
              <div class="admin-module-icon"><i class="fas fa-user-check" style="color:#3b82f6;"></i></div>
              <div class="admin-module-title">Pre Defined<br>Advisors</div>
            </div>
            <div class="admin-module">
              <div class="admin-module-icon"><i class="fas fa-tags" style="color:#f59e0b;"></i></div>
              <div class="admin-module-title">Terms &<br>Special Offers</div>
            </div>
            <div class="admin-module">
              <div class="admin-module-icon"><i class="fas fa-tasks" style="color:#8b5cf6;"></i></div>
              <div class="admin-module-title">Checklist<br>Editor</div>
            </div>
            <div class="admin-module">
              <div class="admin-module-icon"><i class="fas fa-car" style="color:#06b6d4;"></i></div>
              <div class="admin-module-title">Vehicle Make<br>& Models</div>
            </div>
            <div class="admin-module">
              <div class="admin-module-icon"><i class="fas fa-font" style="color:#374151;"></i></div>
              <div class="admin-module-title">Custom Field<br>Names</div>
            </div>
          </div>
        </div>
      </div>

      <!-- Configuration Tab Content -->
      <div class="tab-content" id="configuration-tab" style="display: none;">
        <div class="admin-section">
          <h2 class="section-title">Configuration</h2>
          <div class="admin-grid">
            <div class="admin-module" style="background: #a94442; color: #fff;">
              <div class="admin-module-icon" style="color: #fff;"><i class="fas fa-key"></i></div>
              <div class="admin-module-title">Licence<br>Activation</div>
            </div>
            <div class="admin-module">
              <div class="admin-module-icon"><i class="fas fa-users"></i></div>
              <div class="admin-module-title">User<br>Accounts</div>
            </div>
            <div class="admin-module">
              <div class="admin-module-icon"><i class="fas fa-envelope"></i></div>
              <div class="admin-module-title">Email / SMS<br>Settings</div>
            </div>
            <div class="admin-module">
              <div class="admin-module-icon"><i class="fas fa-calendar-alt" style="color:#f59e0b;"></i></div>
              <div class="admin-module-title">Calendar Settings<br>& Bays</div>
            </div>
            <div class="admin-module">
              <div class="admin-module-icon"><i class="fas fa-calendar-times" style="color:#a94442;"></i></div>
              <div class="admin-module-title">Online Booking<br>System</div>
            </div>
            <div class="admin-module">
              <div class="admin-module-icon"><i class="fas fa-coins" style="color:#10b981;"></i></div>
              <div class="admin-module-title">Labour /<br>Parts Rates</div>
            </div>
            <div class="admin-module">
              <div class="admin-module-icon"><i class="fas fa-percent" style="color:#22c55e;"></i></div>
              <div class="admin-module-title">Tax<br>Rates</div>
            </div>
            <div class="admin-module">
              <div class="admin-module-icon"><i class="fas fa-receipt" style="color:#3b82f6;"></i></div>
              <div class="admin-module-title">Sales<br>Nominals</div>
            </div>
            <div class="admin-module">
              <div class="admin-module-icon"><i class="fas fa-file-invoice-dollar" style="color:#ef4444;"></i></div>
              <div class="admin-module-title">Expense<br>Nominals</div>
            </div>
            <div class="admin-module">
              <div class="admin-module-icon"><i class="fas fa-credit-card" style="color:#f59e0b;"></i></div>
              <div class="admin-module-title">Payment<br>Methods</div>
            </div>
            <div class="admin-module">
              <div class="admin-module-icon"><i class="fas fa-warehouse" style="color:#f97316;"></i></div>
              <div class="admin-module-title">Stock Control<br>Settings</div>
            </div>
            <div class="admin-module">
              <div class="admin-module-icon"><i class="fas fa-tasks" style="color:#06b6d4;"></i></div>
              <div class="admin-module-title">Required<br>Fields</div>
            </div>
            <div class="admin-module">
              <div class="admin-module-icon"><i class="fas fa-stamp" style="color:#3b82f6;"></i></div>
              <div class="admin-module-title">PostCode<br>Lookup</div>
            </div>
            <div class="admin-module">
              <div class="admin-module-icon"><i class="fas fa-car-side" style="color:#ef4444;"></i></div>
              <div class="admin-module-title">Used Vehicle<br>Sales Module</div>
            </div>
            <div class="admin-module">
              <div class="admin-module-icon"><i class="fas fa-print" style="color:#374151;"></i></div>
              <div class="admin-module-title">Printer<br>Setup</div>
            </div>
            <div class="admin-module">
              <div class="admin-module-icon"><i class="fas fa-cogs" style="color:#8b5cf6;"></i></div>
              <div class="admin-module-title">Miscellaneous<br>Settings</div>
            </div>
            <div class="admin-module">
              <div class="admin-module-icon"><i class="fas fa-cash-register" style="color:#22c55e;"></i></div>
              <div class="admin-module-title">Cash Drawer<br>Till Setup</div>
            </div>
          </div>
        </div>
      </div>

      <!-- Data Tab Content -->
      <div class="tab-content" id="data-tab" style="display: none;">
        <div class="admin-section">
          <h2 class="section-title">Data Management</h2>
          <div class="admin-grid">
            <div class="admin-module">
              <div class="admin-module-icon"><i class="fas fa-database" style="color:#06b6d4;"></i></div>
              <div class="admin-module-title">Perform Backup<br><span style='font-size:0.8em;font-weight:400;'>(.sql file)</span></div>
            </div>
            <div class="admin-module">
              <div class="admin-module-icon"><i class="fas fa-server" style="color:#6b7280;"></i></div>
              <div class="admin-module-title">Backup Options<br>& Maintenance</div>
            </div>
            <div class="admin-module">
              <div class="admin-module-icon"><i class="fas fa-broom" style="color:#f59e0b;"></i></div>
              <div class="admin-module-title">Cleanup Old<br>Backups</div>
            </div>
            <div class="admin-module">
              <div class="admin-module-icon"><i class="fas fa-upload" style="color:#ef4444;"></i></div>
              <div class="admin-module-title">Restore<br>Attachments</div>
            </div>
            <div class="admin-module">
              <div class="admin-module-icon"><i class="fas fa-database" style="color:#ef4444;"></i></div>
              <div class="admin-module-title">Restore from<br>Backup</div>
            </div>
            <div class="admin-module">
              <div class="admin-module-icon"><i class="fas fa-warehouse" style="color:#f97316;"></i></div>
              <div class="admin-module-title">Stock<br>Management</div>
            </div>
            <div class="admin-module">
              <div class="admin-module-icon"><i class="fas fa-user-friends" style="color:#f59e0b;"></i></div>
              <div class="admin-module-title">Merge<br>Customers</div>
            </div>
            <div class="admin-module">
              <div class="admin-module-icon"><i class="fas fa-user-times" style="color:#ef4444;"></i></div>
              <div class="admin-module-title">Mass Delete<br>Customers</div>
            </div>
            <div class="admin-module">
              <div class="admin-module-icon"><i class="fas fa-file-invoice" style="color:#ef4444;"></i></div>
              <div class="admin-module-title">Mass Delete<br>Documents</div>
            </div>
            <div class="admin-module">
              <div class="admin-module-icon"><i class="fas fa-cogs" style="color:#10b981;"></i></div>
              <div class="admin-module-title">Check Invoice<br>Sequence</div>
            </div>
            <div class="admin-module">
              <div class="admin-module-icon"><i class="fas fa-user-edit" style="color:#06b6d4;"></i></div>
              <div class="admin-module-title">User Activity<br>Logs</div>
            </div>
            <div class="admin-module">
              <div class="admin-module-icon"><i class="fas fa-file-csv" style="color:#3b82f6;"></i></div>
              <div class="admin-module-title">CSV<br>Exports</div>
            </div>
            <div class="admin-module">
              <div class="admin-module-icon"><i class="fas fa-desktop" style="color:#06b6d4;"></i></div>
              <div class="admin-module-title">System<br>Information</div>
            </div>
            <div class="admin-module">
              <div class="admin-module-icon"><i class="fas fa-file-import" style="color:#374151;"></i></div>
              <div class="admin-module-title">Import from<br>GA2 or GA3</div>
            </div>
            <div class="admin-module">
              <div class="admin-module-icon"><i class="fas fa-file-import" style="color:#22c55e;"></i></div>
              <div class="admin-module-title">Customer &<br>Vehicle Import</div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

  <?php include 'Popups/admin/new-acc-manager.php'; ?>

  <!-- Admin Page Specific CSS and JS -->
  <link rel="stylesheet" href="Assets/CSS/admin.css">
  <script src="Assets/JS/admin.js"></script>
  <script>
function openAccountManagerModal() {
  document.getElementById('accountManagerModal').classList.add('show');
}
function closeAccountManagerModal() {
  document.getElementById('accountManagerModal').classList.remove('show');
}
</script>

<?php renderFooter(); ?> 