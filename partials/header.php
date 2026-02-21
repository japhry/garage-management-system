<?php
require_once 'config.php';
?>
    <!-- Top Header with User Section -->
    <div class="top-header" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
      <h1 style="font-size: 2rem; color: var(--dark); margin: 0;"><?php echo getPageTitle(); ?></h1>
      <div class="user-section" style="display: flex; align-items: center; gap: 15px;">
        <div class="add-dropdown" style="position: relative;">
          <button class="header-btn add-btn" style="background: none; border: none; font-size: 1.2rem; color: #666; cursor: pointer;">
            <i class="fas fa-plus"></i>
          </button>
          <div class="add-menu" style="position: absolute; top: 40px; right: 0; background: white; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); min-width: 200px; display: none; z-index: 1000;">
            <a href="job-sheets.php" style="display: flex; align-items: center; padding: 12px 15px; text-decoration: none; color: #333; border-bottom: 1px solid #eee;">
              <i class="fas fa-file-signature" style="margin-right: 10px; color: #7c3aed;"></i> New Job Sheet
            </a>
            <a href="estimates.php" style="display: flex; align-items: center; padding: 12px 15px; text-decoration: none; color: #333; border-bottom: 1px solid #eee;">
              <i class="fas fa-file-invoice-dollar" style="margin-right: 10px; color: #059669;"></i> New Estimate
            </a>
            <a href="invoices.php" style="display: flex; align-items: center; padding: 12px 15px; text-decoration: none; color: #333; border-bottom: 1px solid #eee;">
              <i class="fas fa-file-invoice" style="margin-right: 10px; color: #0891b2;"></i> New Invoice
            </a>
            <a href="customers.php" style="display: flex; align-items: center; padding: 12px 15px; text-decoration: none; color: #333; border-bottom: 1px solid #eee;">
              <i class="fas fa-user-plus" style="margin-right: 10px; color: #fb923c;"></i> New Customer
            </a>
            <a href="vehicles.php" style="display: flex; align-items: center; padding: 12px 15px; text-decoration: none; color: #333; border-bottom: 1px solid #eee;">
              <i class="fas fa-car" style="margin-right: 10px; color: #06b6d4;"></i> New Vehicle
            </a>
            <a href="suppliers.php" style="display: flex; align-items: center; padding: 12px 15px; text-decoration: none; color: #333; border-bottom: 1px solid #eee;">
              <i class="fas fa-truck" style="margin-right: 10px; color: #ef4444;"></i> New Supplier
            </a>
            <a href="stock.php" style="display: flex; align-items: center; padding: 12px 15px; text-decoration: none; color: #333;">
              <i class="fas fa-box" style="margin-right: 10px; color: #a855f7;"></i> New Part/Stock
            </a>
          </div>
        </div>
        <button class="header-btn" style="background: none; border: none; font-size: 1.2rem; color: #666; cursor: pointer;">
          <i class="fas fa-bell"></i>
        </button>
        <button class="theme-toggle" title="Toggle dark mode"><i class="fas fa-moon"></i></button>
        <div class="user-dropdown" style="position: relative;">
          <button class="user-avatar" style="width: 40px; height: 40px; border-radius: 50%; background: var(--accent-solid); color: white; border: none; cursor: pointer; font-weight: 600;">
            A
          </button>
          <div class="dropdown-menu" style="position: absolute; top: 50px; right: 0; background: white; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); min-width: 150px; display: none; z-index: 1000;">
            <a href="#" style="display: flex; align-items: center; padding: 12px 15px; text-decoration: none; color: #333; border-bottom: 1px solid #eee;">
              <i class="fas fa-user" style="margin-right: 10px;"></i> Profile
            </a>
            <a href="signout.php" style="display: flex; align-items: center; padding: 12px 15px; text-decoration: none; color: #333;">
              <i class="fas fa-sign-out-alt" style="margin-right: 10px;"></i> Logout
            </a>
          </div>
        </div>
      </div>
    </div> 