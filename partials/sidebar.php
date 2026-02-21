<?php
require_once 'config.php';
?>
<div class="sidebar" id="sidebar">
  <div class="logo">
    <img src="Assets/logo.png" alt="Garage Master Logo" class="sidebar-logo-img">
  </div>
  <ul class="menu">
    <a href="index.php" class="menu-item <?php echo isActiveMenu('index'); ?>">
      <i class="fas fa-house"></i><span class="menu-text">Home</span>
    </a>
    <a href="calendar.php" class="menu-item <?php echo isActiveMenu('calendar'); ?>">
      <i class="fas fa-calendar-alt"></i><span class="menu-text">Calendar</span>
    </a>
    <a href="estimates.php" class="menu-item <?php echo isActiveMenu('estimates'); ?>">
      <i class="fas fa-file-invoice-dollar"></i><span class="menu-text">Estimates</span>
    </a>
    <a href="job-sheets.php" class="menu-item <?php echo isActiveMenu('job-sheets'); ?>">
      <i class="fas fa-file-signature"></i><span class="menu-text">Job Sheets</span>
    </a>
    <a href="invoices.php" class="menu-item <?php echo isActiveMenu('invoices'); ?>">
      <i class="fas fa-file-invoice"></i><span class="menu-text">Invoices</span>
    </a>
    <a href="unpaid.php" class="menu-item <?php echo isActiveMenu('unpaid'); ?>">
      <i class="fas fa-money-bill-wave"></i><span class="menu-text">Unpaid</span>
    </a>
    <a href="archives.php" class="menu-item <?php echo isActiveMenu('archives'); ?>">
      <i class="fas fa-archive"></i><span class="menu-text">Archives</span>
    </a>
    <a href="customers.php" class="menu-item <?php echo isActiveMenu('customers'); ?>">
      <i class="fas fa-users"></i><span class="menu-text">Customers</span>
    </a>
    <a href="vehicles.php" class="menu-item <?php echo isActiveMenu('vehicles'); ?>">
      <i class="fas fa-car-side"></i><span class="menu-text">Vehicles</span>
    </a>
    <a href="suppliers.php" class="menu-item <?php echo isActiveMenu('suppliers'); ?>">
      <i class="fas fa-truck"></i><span class="menu-text">Suppliers</span>
    </a>
    <a href="stock.php" class="menu-item <?php echo isActiveMenu('stock'); ?>">
      <i class="fas fa-boxes-stacked"></i><span class="menu-text">Stock</span>
    </a>
    <a href="reminders.php" class="menu-item <?php echo isActiveMenu('reminders'); ?>">
      <i class="fas fa-bell"></i><span class="menu-text">Reminders</span>
    </a>
    <a href="admin.php" class="menu-item <?php echo isActiveMenu('admin'); ?>">
      <i class="fas fa-tools"></i><span class="menu-text">Admin</span>
    </a>
    <a href="signout.php" class="menu-item <?php echo isActiveMenu('signout'); ?>">
      <i class="fas fa-sign-out-alt"></i><span class="menu-text">Sign Out</span>
    </a>
  </ul>
</div> 