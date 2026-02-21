# Garage Master - TZS Dashboard

A comprehensive garage management system built with modern web technologies, designed for automotive repair shops and service centers in Tanzania.

## 🚀 Features

### Core Functionality
- **Dashboard Overview**: Real-time statistics and key metrics
- **Customer Management**: Complete CRM with search and filtering
- **Vehicle Management**: Track customer vehicles and service history
- **Job Management**: Work orders, estimates, and invoices
- **Inventory Management**: Stock tracking and supplier management
- **Calendar & Scheduling**: Appointment and task management
- **Admin Panel**: System configuration and user management

### Technical Features
- **Responsive Design**: Works perfectly on desktop, tablet, and mobile
- **Dark Mode**: Complete theme switching with persistent preferences
- **Modern UI**: Clean, professional interface with smooth animations
- **Search & Filter**: Advanced search capabilities with real-time filtering
- **Data Export**: Print and export functionality
- **Local Storage**: Persistent user preferences and session data

## 🏗️ Project Structure

```
Garage-mrc/
├── Assets/
│   ├── CSS/
│   │   ├── base.css          # CSS variables, reset, typography
│   │   ├── layout.css        # Sidebar, main content, responsive layout
│   │   ├── components.css    # UI components (cards, buttons, forms, tables)
│   │   └── styles.css        # Main stylesheet with page-specific styles
│   ├── JS/
│   │   ├── core.js           # Core functionality (theme, menu, dropdowns)
│   │   ├── database.js       # Database and search functionality
│   │   └── script.js         # Main script with all functionality
│   └── logo.png              # Application logo
├── *.html                    # All application pages
└── README.md                 # This file
```

## 🎨 Design System

### Color Palette
- **Primary**: `#ec2025` (Red - matches your brand)
- **Accent**: `rgba(236, 32, 37, 0.8)` (Semi-transparent red)
- **Success**: `#10b981` (Green)
- **Warning**: `#f59e0b` (Orange)
- **Error**: `#ef4444` (Red)
- **Info**: `#3b82f6` (Blue)

### Typography
- **Font Family**: Segoe UI, Tahoma, Geneva, Verdana, sans-serif
- **Responsive**: Scales from 0.75rem to 2.25rem
- **Weights**: 400 (normal), 500 (medium), 600 (semibold), 700 (bold)

### Spacing System
- **Base Unit**: 0.25rem (4px)
- **Scale**: 1, 2, 3, 4, 5, 6, 8, 10, 12, 16, 20
- **Consistent**: Used throughout all components

## 🔧 Technical Implementation

### CSS Architecture
The CSS is organized into modular files for better maintainability:

1. **base.css**: Foundation styles, CSS variables, reset, typography
2. **layout.css**: Layout components, sidebar, main content, responsive design
3. **components.css**: Reusable UI components, buttons, forms, tables
4. **styles.css**: Page-specific styles and overrides

### JavaScript Architecture
The JavaScript is organized into classes for better structure:

1. **ThemeManager**: Handles dark/light mode switching
2. **MenuManager**: Manages sidebar navigation and mobile menu
3. **DropdownManager**: Handles all dropdown menus and interactions
4. **DatabaseManager**: Manages supplier database functionality
5. **CalendarManager**: Handles calendar interactions
6. **Utils**: Utility functions for common operations

### Dark Mode Implementation
- Uses CSS custom properties for seamless theme switching
- Persistent theme preference using localStorage
- Smooth transitions between themes
- All components properly styled for both themes

## 📱 Responsive Design

### Breakpoints
- **Mobile**: < 768px (collapsible sidebar)
- **Tablet**: 769px - 1024px (hover-expandable sidebar)
- **Desktop**: > 1024px (full sidebar)

### Mobile Features
- Touch-friendly interface
- Swipe gestures for navigation
- Optimized touch targets
- Collapsible sidebar with overlay

## 🚀 Getting Started

1. **Clone or download** the project files
2. **Open** `index.html` in a modern web browser
3. **Navigate** through the different sections using the sidebar
4. **Test** the responsive design by resizing your browser window
5. **Try** the dark mode toggle in the top-right corner

## 📋 Current Data

The system includes sample data to demonstrate functionality:
- **1 Employee**
- **2 Customers** (with sample profiles)
- **1 Supplier**
- **2 Parts** in stock
- **0 Vehicles** registered
- **2 Invoices** generated
- **4 Job Sheets** (various statuses)

## 🔮 Future Enhancements

### Backend Integration
- Database connectivity for persistent data storage
- User authentication and role-based access
- Real-time data synchronization

### Advanced Features
- SMS/Email notifications
- Payment gateway integration
- Advanced reporting and analytics
- Barcode scanning for inventory
- Mobile app companion

### Performance Optimizations
- Progressive Web App (PWA) capabilities
- Service worker for offline functionality
- Image optimization and lazy loading
- Code splitting for faster loading

## 🛠️ Customization

### Adding New Pages
1. Create a new HTML file
2. Include the CSS files in the correct order
3. Use the existing component classes for consistency
4. Add any page-specific styles to `styles.css`

### Modifying Colors
1. Update CSS variables in `base.css`
2. All components will automatically use the new colors
3. Test both light and dark modes

### Adding New Components
1. Create the component styles in `components.css`
2. Follow the existing naming conventions
3. Include dark mode variants
4. Add responsive breakpoints if needed

## 📞 Support

For questions or support regarding this garage management system, please contact the development team.

## 📄 License

This project is proprietary software developed for garage management purposes.

---

**Garage Master - Professional Garage Management System**
*Built with modern web technologies for optimal performance and user experience* 


# Popups Organization Structure

This directory contains all popup modals organized by page/functionality for better maintainability and code organization.

## Directory Structure

```
Popups/
├── calendar/           # Calendar page popups
│   ├── new-appointment.php
│   ├── view-full-calendar.php
│   ├── link-document.php
│   ├── new-document.php
│   └── new-repetition.php
├── customers/          # Customers page popups
│   ├── add-customer.php
│   └── edit-customer.php (future)
├── vehicles/           # Vehicles page popups
│   ├── add-vehicle.php
│   └── edit-vehicle.php (future)
├── estimates/          # Estimates page popups
│   ├── new-estimate.php
│   └── edit-estimate.php (future)
├── invoices/           # Invoices page popups (future)
│   ├── new-invoice.php
│   └── edit-invoice.php
├── job-sheets/         # Job sheets page popups (future)
│   ├── new-job-sheet.php
│   └── edit-job-sheet.php
├── stock/              # Stock page popups (future)
│   ├── add-stock.php
│   └── edit-stock.php
├── suppliers/          # Suppliers page popups (future)
│   ├── add-supplier.php
│   └── edit-supplier.php
└── reminders/          # Reminders page popups (future)
    ├── add-reminder.php
    └── edit-reminder.php
```

## Usage

### Including Popups in Pages

To include popups in a page, add the following PHP include statements at the bottom of the page (before the closing `</div>` and `<?php renderFooter(); ?>`):

```php
<!-- Include [Page] Popups -->
<?php include 'Popups/[page-name]/[popup-name].php'; ?>
```

### Examples

**Calendar Page:**
```php
<!-- Include Calendar Popups -->
<?php include 'Popups/calendar/new-appointment.php'; ?>
<?php include 'Popups/calendar/view-full-calendar.php'; ?>
<?php include 'Popups/calendar/link-document.php'; ?>
<?php include 'Popups/calendar/new-document.php'; ?>
<?php include 'Popups/calendar/new-repetition.php'; ?>
```

**Customers Page:**
```php
<!-- Include Customer Popups -->
<?php include 'Popups/customers/add-customer.php'; ?>
```

**Vehicles Page:**
```php
<!-- Include Vehicle Popups -->
<?php include 'Popups/vehicles/add-vehicle.php'; ?>
```

**Estimates Page:**
```php
<!-- Include Estimate Popups -->
<?php include 'Popups/estimates/new-estimate.php'; ?>
```

## Popup File Structure

Each popup file follows this structure:

```php
<?php
// [Popup Name] Modal
// This file contains the [description] popup
// Include this file where needed using: include 'Popups/[page]/[popup].php';
?>

<!-- [Popup Name] Modal -->
<div id="[popupId]Modal" class="modal-overlay" style="display: none;">
  <!-- Modal content here -->
</div>

<script>
// [Popup Name] Modal functionality
document.addEventListener('DOMContentLoaded', function() {
  // JavaScript functionality here
  
  // Make functions globally available
  window.open[PopupName]Modal = open[PopupName]Modal;
  window.close[PopupName]Modal = close[PopupName]Modal;
});
</script>

<style>
/* Modal-specific styles here */
</style>
```

## Benefits of This Structure

1. **Maintainability**: Each popup is in its own file, making it easier to find and modify
2. **Reusability**: Popups can be easily included in multiple pages if needed
3. **Organization**: Clear separation of concerns by page/functionality
4. **Scalability**: Easy to add new popups without cluttering main page files
5. **Team Collaboration**: Multiple developers can work on different popups simultaneously
6. **Testing**: Individual popups can be tested in isolation

## Adding New Popups

1. Create a new PHP file in the appropriate directory
2. Follow the standard popup file structure
3. Include the popup in the relevant page(s)
4. Update this README if adding new directories or significant changes

## JavaScript Integration

Each popup includes its own JavaScript functionality and makes functions globally available for use in the main page scripts. This ensures proper separation of concerns while maintaining functionality.

## CSS Integration

Popup-specific styles are included in each popup file to keep styling organized and prevent conflicts with other components. 