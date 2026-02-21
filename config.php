<?php
// Configuration and common functions for MRC Motors

// Get current page name for active menu highlighting
function getCurrentPage() {
    $script_name = $_SERVER['SCRIPT_NAME'];
    $page_name = basename($script_name, '.php');
    
    // Handle index page
    if ($page_name === 'index' || $page_name === '') {
        return 'index';
    }
    
    return $page_name;
}

// Check if a menu item should be active
function isActiveMenu($page_name) {
    $current_page = getCurrentPage();
    return ($current_page === $page_name) ? 'active' : '';
}

// Get page title based on current page
function getPageTitle() {
    $current_page = getCurrentPage();
    $titles = [
        'index' => 'Dashboard',
        'calendar' => 'Calendar',
        'estimates' => 'Estimates',
        'job-sheets' => 'Job Sheets',
        'invoices' => 'Invoices',
        'unpaid' => 'Unpaid',
        'archives' => 'Archives',
        'customers' => 'Customers',
        'vehicles' => 'Vehicles',
        'suppliers' => 'Suppliers',
        'stock' => 'Stock',
        'reminders' => 'Reminders',
        'admin' => 'Admin',
        'signout' => 'Sign Out'
    ];
    
    return isset($titles[$current_page]) ? $titles[$current_page] : 'MRC Motors';
}

// Common header function
function renderHeader() {
    $page_title = getPageTitle();
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $page_title; ?></title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
        <link rel="stylesheet" href="<?php echo getBaseUrl(); ?>Assets/CSS/base.css?v=<?php echo time(); ?>">
        <link rel="stylesheet" href="<?php echo getBaseUrl(); ?>Assets/CSS/layout.css?v=<?php echo time(); ?>">
        <link rel="stylesheet" href="<?php echo getBaseUrl(); ?>Assets/CSS/components.css?v=<?php echo time(); ?>">
        <link rel="stylesheet" href="<?php echo getBaseUrl(); ?>Assets/CSS/styles.css?v=<?php echo time(); ?>">
    </head>
    <body>
    <?php
}

// Common footer function
function renderFooter() {
    ?>
        <?php include 'partials/footer.php'; ?>
        <script src="<?php echo getBaseUrl(); ?>Assets/JS/core.js?v=<?php echo time(); ?>"></script>
        <script src="<?php echo getBaseUrl(); ?>Assets/JS/script.js?v=<?php echo time(); ?>"></script>
    </body>
    </html>
    <?php
}

// Get base URL function
function getBaseUrl() {
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
    $host = $_SERVER['HTTP_HOST'];
    $script_name = $_SERVER['SCRIPT_NAME'];
    $path_parts = explode('/', dirname($script_name));
    
    // Remove empty elements and get the base path
    $path_parts = array_filter($path_parts);
    $base_path = '/' . implode('/', $path_parts) . '/';
    
    return $protocol . $host . $base_path;
}
?> 