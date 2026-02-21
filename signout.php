<?php
require_once 'config.php';
renderHeader();
?>
  <?php include 'partials/sidebar.php'; ?>
  <div class="main-content">
    <?php include 'partials/header.php'; ?>
    
    <!-- Top Header with User Section -->
    <!-- Sign Out Confirmation -->
    <div class="content-section">
      <div class="section-header">
        <h2 class="section-title">Sign Out Confirmation</h2>
      </div>
      
      <div class="stats-grid">
        <div class="stat-card" style="text-align: center; grid-column: span 2;">
          <div class="stat-icon" style="background: rgba(239, 68, 68, 0.1); color: #ef4444;">
            <i class="fas fa-sign-out-alt" style="font-size: 3rem;"></i>
          </div>
          <div class="stat-title" style="font-size: 1.5rem; margin: 20px 0;">Are you sure you want to sign out?</div>
          <div class="stat-subtext" style="font-size: 1rem; margin-bottom: 30px;">
            You will be logged out of the Garage Master system. Any unsaved work will be lost.
          </div>
          <div style="display: flex; gap: 15px; justify-content: center;">
            <button class="btn-primary" style="padding: 12px 30px; font-size: 1.1rem;">
              <i class="fas fa-sign-out-alt"></i> Yes, Sign Out
            </button>
            <button class="btn-secondary" style="padding: 12px 30px; font-size: 1.1rem;" onclick="window.history.back()">
              <i class="fas fa-times"></i> Cancel
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Session Information -->
    <div class="content-section">
      <div class="section-header">
        <h2 class="section-title">Current Session</h2>
      </div>
      <table class="data-table">
        <thead>
          <tr>
            <th>Information</th>
            <th>Details</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>User</td>
            <td>Admin User</td>
          </tr>
          <tr>
            <td>Login Time</td>
            <td>Dec 15, 2024 - 09:30 AM</td>
          </tr>
          <tr>
            <td>Session Duration</td>
            <td>4 hours 23 minutes</td>
          </tr>
          <tr>
            <td>Last Activity</td>
            <td>Dec 15, 2024 - 01:53 PM</td>
          </tr>
          <tr>
            <td>IP Address</td>
            <td>192.168.1.100</td>
          </tr>
        </tbody>
      </table>
    </div>


  </div>
<?php renderFooter(); ?> 