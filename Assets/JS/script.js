/* ========================================
   GARAGE MASTER - MAIN SCRIPT
   ======================================== */

// Import modular JavaScript files
// Note: In a real project, you would use a module bundler like Webpack
// For now, we'll include the functionality directly

// Core functionality is loaded first
// (core.js content would be here in a modular setup)

// Database functionality is loaded if needed
// (database.js content would be here in a modular setup)

// Initialize all managers when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
  new ThemeManager();
  new MenuManager();
  new DropdownManager();
  
  // Set up mutation observer to detect when sidebar is loaded
  const observer = new MutationObserver(function(mutations) {
    mutations.forEach(function(mutation) {
      if (mutation.type === 'childList') {
        mutation.addedNodes.forEach(function(node) {
          if (node.nodeType === 1 && node.querySelector && node.querySelector('.menu-item')) {
            // Sidebar menu items found, set active item
            setTimeout(() => {
              if (typeof setActiveMenuItem === 'function') {
                setActiveMenuItem();
              }
            }, 50);
          }
        });
      }
    });
  });
  
  // Start observing the document body for changes
  observer.observe(document.body, {
    childList: true,
    subtree: true
  });
  
  // Also try to set active menu item immediately
  setTimeout(() => {
    if (typeof setActiveMenuItem === 'function') {
      setActiveMenuItem();
    }
  }, 200);
});

/* ========================================
   CORE FUNCTIONALITY
   ======================================== */

// Theme Management
class ThemeManager {
  constructor() {
    this.theme = localStorage.getItem('theme') || 'light';
    this.init();
  }

  init() {
    this.applyTheme();
    this.setupThemeToggle();
  }

  applyTheme() {
    document.documentElement.setAttribute('data-theme', this.theme);
    this.updateThemeIcon();
  }

  toggleTheme() {
    this.theme = this.theme === 'light' ? 'dark' : 'light';
    localStorage.setItem('theme', this.theme);
    this.applyTheme();
  }

  updateThemeIcon() {
    const themeToggle = document.querySelector('.theme-toggle');
    if (themeToggle) {
      const icon = themeToggle.querySelector('i');
      if (icon) {
        icon.className = this.theme === 'light' ? 'fas fa-moon' : 'fas fa-sun';
      }
    }
  }

  setupThemeToggle() {
    const themeToggle = document.querySelector('.theme-toggle');
    if (themeToggle) {
      themeToggle.addEventListener('click', () => this.toggleTheme());
    }
  }
}

// Menu Management
class MenuManager {
  constructor() {
    this.menuToggle = document.getElementById('menuToggle');
    this.sidebar = document.getElementById('sidebar');
    this.overlay = document.getElementById('overlay');
    this.body = document.body;
    this.init();
  }

  init() {
    this.setupMenuToggle();
    this.setupMenuItems();
    this.setupOverlay();
    this.restoreActiveMenuItem();
  }

  setupMenuToggle() {
    if (this.menuToggle) {
      this.menuToggle.addEventListener('click', () => this.toggleMenu());
    }
  }

  setupOverlay() {
    if (this.overlay) {
      this.overlay.addEventListener('click', () => this.toggleMenu());
    }
  }

  toggleMenu() {
    this.sidebar.classList.toggle('active');
    this.overlay.classList.toggle('active');
    this.menuToggle.classList.toggle('active');
    
    const icon = this.menuToggle.querySelector('i');
    if (icon) {
      icon.className = this.sidebar.classList.contains('active') ? 'fas fa-times' : 'fas fa-bars';
    }
    
    this.body.style.overflow = this.sidebar.classList.contains('active') ? 'hidden' : '';
  }

  setupMenuItems() {
document.querySelectorAll('.menu-item').forEach(item => {
      item.addEventListener('click', (e) => {
        // Remove active class from all menu items
        document.querySelectorAll('.menu-item').forEach(i => i.classList.remove('active'));
        
        // Add active class to clicked item
        item.classList.add('active');
        
        // Save active menu item
        const menuText = item.querySelector('.menu-text');
        if (menuText) {
          localStorage.setItem('activeMenuItem', menuText.textContent);
        }
        
        // Close mobile menu if open
        if (window.innerWidth <= 768 && this.sidebar && this.sidebar.classList.contains('active')) {
          this.toggleMenu();
        }
      });
    });
  }

  restoreActiveMenuItem() {
    // First, try to detect current page from URL
    const currentPage = this.getCurrentPage();
    
    if (currentPage) {
      // Find the menu item that corresponds to the current page
      document.querySelectorAll('.menu-item').forEach(item => {
        const href = item.getAttribute('href');
        if (href === currentPage) {
          item.classList.add('active');
          return;
        }
      });
    } else {
      // Fallback to localStorage if URL detection fails
      const saved = localStorage.getItem('activeMenuItem');
      if (saved) {
        document.querySelectorAll('.menu-item').forEach(item => {
          const menuText = item.querySelector('.menu-text');
          if (menuText && menuText.textContent === saved) {
            item.classList.add('active');
          }
        });
      }
    }
  }

  getCurrentPage() {
    const path = window.location.pathname;
    const filename = path.split('/').pop();
    
    // Handle different page scenarios
    if (filename === '' || filename === 'index.html') {
      return 'index.html';
    }
    
    return filename;
  }
}

// Global function to set active menu item (can be called after sidebar loads)
function setActiveMenuItem() {
  const currentPage = window.location.pathname.split('/').pop() || 'index.html';
  
  // Remove active class from all menu items
  document.querySelectorAll('.menu-item').forEach(item => {
    item.classList.remove('active');
  });
  
  // Add active class to current page menu item
  document.querySelectorAll('.menu-item').forEach(item => {
    const href = item.getAttribute('href');
    if (href === currentPage) {
      item.classList.add('active');
      return;
    }
  });
}

// Dropdown Management
class DropdownManager {
  constructor() {
    this.init();
  }

  init() {
    this.setupUserDropdown();
    this.setupAddDropdown();
    this.setupGlobalClickHandler();
  }

  setupUserDropdown() {
    const userAvatar = document.querySelector('.user-avatar');
    const dropdownMenu = document.querySelector('.dropdown-menu');
    
    if (userAvatar && dropdownMenu) {
      userAvatar.addEventListener('click', (e) => {
        e.stopPropagation();
        dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
      });
      
      dropdownMenu.addEventListener('click', (e) => {
        e.stopPropagation();
      });
    }
  }

  setupAddDropdown() {
    const addBtn = document.querySelector('.add-btn');
    const addMenu = document.querySelector('.add-menu');
    
    if (addBtn && addMenu) {
      addBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        addMenu.style.display = addMenu.style.display === 'block' ? 'none' : 'block';
        
        // Close user dropdown if open
        const dropdownMenu = document.querySelector('.dropdown-menu');
        if (dropdownMenu) {
          dropdownMenu.style.display = 'none';
        }
      });
      
      addMenu.addEventListener('click', (e) => {
        e.stopPropagation();
      });
    }
  }

  setupGlobalClickHandler() {
    document.addEventListener('click', () => {
      this.closeAllDropdowns();
    });
  }

  closeAllDropdowns() {
    const dropdowns = document.querySelectorAll('.dropdown-menu, .add-menu');
    dropdowns.forEach(dropdown => {
      dropdown.style.display = 'none';
    });
  }
}

// Utility Functions
class Utils {
  static showNotification(message, type = 'info') {
    // Create notification element
    const notification = document.createElement('div');
    notification.className = `notification notification-${type}`;
    notification.innerHTML = `
      <div class="notification-content">
        <i class="fas ${this.getNotificationIcon(type)}"></i>
        <span>${message}</span>
      </div>
      <button class="notification-close">
        <i class="fas fa-times"></i>
      </button>
    `;

    // Add styles
    notification.style.cssText = `
      position: fixed;
      top: 20px;
      right: 20px;
      background: ${this.getNotificationColor(type)};
      color: white;
      padding: 15px 20px;
      border-radius: 8px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.2);
      z-index: 10000;
      display: flex;
      align-items: center;
      gap: 10px;
      max-width: 400px;
      animation: slideInRight 0.3s ease;
    `;

    // Add to page
    document.body.appendChild(notification);

    // Setup close button
    const closeBtn = notification.querySelector('.notification-close');
    closeBtn.addEventListener('click', () => {
      notification.remove();
    });

    // Auto remove after 5 seconds
    setTimeout(() => {
      if (notification.parentNode) {
        notification.style.animation = 'slideOutRight 0.3s ease';
        setTimeout(() => notification.remove(), 300);
      }
    }, 5000);
  }

  static getNotificationIcon(type) {
    const icons = {
      success: 'fa-check-circle',
      error: 'fa-exclamation-circle',
      warning: 'fa-exclamation-triangle',
      info: 'fa-info-circle'
    };
    return icons[type] || icons.info;
  }

  static getNotificationColor(type) {
    const colors = {
      success: '#10b981',
      error: '#ef4444',
      warning: '#f59e0b',
      info: '#3b82f6'
    };
    return colors[type] || colors.info;
  }

  static debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
      const later = () => {
        clearTimeout(timeout);
        func(...args);
      };
      clearTimeout(timeout);
      timeout = setTimeout(later, wait);
    };
  }

  static throttle(func, limit) {
    let inThrottle;
    return function() {
      const args = arguments;
      const context = this;
      if (!inThrottle) {
        func.apply(context, args);
        inThrottle = true;
        setTimeout(() => inThrottle = false, limit);
      }
    };
  }

  static formatCurrency(amount, currency = 'TZS') {
    return new Intl.NumberFormat('en-US', {
      style: 'currency',
      currency: currency
    }).format(amount);
  }

  static formatDate(date) {
    return new Intl.DateTimeFormat('en-US', {
      year: 'numeric',
      month: 'short',
      day: 'numeric'
    }).format(new Date(date));
  }

  static generateId() {
    return Date.now().toString(36) + Math.random().toString(36).substr(2);
  }
}

/* ========================================
   DATABASE FUNCTIONALITY
   ======================================== */

class DatabaseManager {
  constructor() {
    this.currentTab = 'suppliers';
    this.searchTerm = '';
    this.currentLetter = '';
    this.sortColumn = '';
    this.sortDirection = 'asc';
    this.currentPage = 1;
    this.itemsPerPage = 10;
    this.init();
  }

  init() {
    this.setupTabs();
    this.setupSearch();
    this.setupAlphabetFilter();
    this.setupTableSorting();
    this.setupActionButtons();
    this.setupModalFunctionality();
    this.setupAdvancedSearch();
    this.updateRecordCount();
  }

  setupTabs() {
    const tabs = document.querySelectorAll('.tab');
    const tabContents = document.querySelectorAll('.tab-content');
    
    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            const targetTab = tab.dataset.tab;
        this.switchTab(targetTab);
      });
    });
  }

  switchTab(targetTab) {
    const tabs = document.querySelectorAll('.tab');
    const tabContents = document.querySelectorAll('.tab-content');
            
            // Remove active class from all tabs and contents
            tabs.forEach(t => t.classList.remove('active'));
            tabContents.forEach(content => content.classList.remove('active'));
            
            // Add active class to clicked tab and corresponding content
    const activeTab = document.querySelector(`[data-tab="${targetTab}"]`);
            const targetContent = document.getElementById(targetTab);
    
    if (activeTab) activeTab.classList.add('active');
    if (targetContent) targetContent.classList.add('active');
    
    this.currentTab = targetTab;
  }

  setupSearch() {
    const searchInput = document.getElementById('supplierSearch');
    const searchBtn = document.getElementById('searchBtn');
    const clearBtn = document.getElementById('clearSearch');
    
    if (searchInput) {
      searchInput.addEventListener('input', Utils.debounce(() => this.performSearch(), 300));
        searchInput.addEventListener('keypress', (e) => {
            if (e.key === 'Enter') {
          this.performSearch();
            }
        });
    }
    
    if (searchBtn) {
      searchBtn.addEventListener('click', () => this.performSearch());
    }
    
    if (clearBtn) {
      clearBtn.addEventListener('click', () => this.clearSearch());
    }
  }

  performSearch() {
    const searchInput = document.getElementById('supplierSearch');
    if (!searchInput) return;

    this.searchTerm = searchInput.value.toLowerCase();
    const tableRows = document.querySelectorAll('#supplierTableBody tr');
    let visibleCount = 0;
    
    tableRows.forEach(row => {
      const accNumber = row.querySelector('.acc-number')?.textContent.toLowerCase() || '';
      const companyName = row.querySelector('.company-name')?.textContent.toLowerCase() || '';
      const address = row.querySelector('.address')?.textContent.toLowerCase() || '';
      
      if (accNumber.includes(this.searchTerm) || 
          companyName.includes(this.searchTerm) || 
          address.includes(this.searchTerm)) {
            row.style.display = '';
            visibleCount++;
        } else {
            row.style.display = 'none';
        }
    });
    
    this.updateRecordCount(visibleCount);
    
    // Add search highlight effect
    if (this.searchTerm) {
      this.highlightSearchTerms(this.searchTerm);
    }
}

  clearSearch() {
    const searchInput = document.getElementById('supplierSearch');
    if (searchInput) {
    searchInput.value = '';
    }
    
    this.searchTerm = '';
    
    // Show all rows
    const tableRows = document.querySelectorAll('#supplierTableBody tr');
    tableRows.forEach(row => {
        row.style.display = '';
    });
    
    // Remove alphabet filter active state
    document.querySelectorAll('.alpha-btn').forEach(btn => {
        btn.classList.remove('active');
    });
    
    // Remove search highlights
    this.removeHighlights();
    
    this.updateRecordCount(tableRows.length);
  }

  setupAlphabetFilter() {
    const alphaButtons = document.querySelectorAll('.alpha-btn');
    alphaButtons.forEach(btn => {
      btn.addEventListener('click', () => {
        // Remove active class from all alphabet buttons
        alphaButtons.forEach(b => b.classList.remove('active'));
        // Add active class to clicked button
        btn.classList.add('active');
        
        const letter = btn.dataset.letter;
        this.filterByLetter(letter);
      });
    });
  }

  filterByLetter(letter) {
    this.currentLetter = letter;
    const tableRows = document.querySelectorAll('#supplierTableBody tr');
    let visibleCount = 0;
    
    tableRows.forEach(row => {
      const companyName = row.querySelector('.company-name')?.textContent || '';
        if (companyName.charAt(0).toUpperCase() === letter) {
            row.style.display = '';
            visibleCount++;
        } else {
            row.style.display = 'none';
        }
    });
    
    this.updateRecordCount(visibleCount);
  }

  setupTableSorting() {
    const sortableHeaders = document.querySelectorAll('.sortable');
    sortableHeaders.forEach(header => {
      header.addEventListener('click', () => {
        const column = header.dataset.column;
        this.sortTable(column);
      });
    });
  }

  sortTable(column) {
    const table = document.querySelector('.supplier-table');
    const tbody = table.querySelector('tbody');
    const rows = Array.from(tbody.querySelectorAll('tr'));
    
    // Toggle sort direction if same column
    if (this.sortColumn === column) {
      this.sortDirection = this.sortDirection === 'asc' ? 'desc' : 'asc';
    } else {
      this.sortColumn = column;
      this.sortDirection = 'asc';
    }
    
    // Update sort indicators
    document.querySelectorAll('.sortable i').forEach(icon => {
        icon.className = 'fas fa-sort';
    });
    
    const currentHeader = document.querySelector(`[data-column="${column}"]`);
    if (currentHeader) {
      const icon = currentHeader.querySelector('i');
      if (icon) {
        icon.className = this.sortDirection === 'asc' ? 'fas fa-sort-up' : 'fas fa-sort-down';
      }
    }
    
    // Sort rows
    rows.sort((a, b) => {
      const aValue = this.getCellValue(a, column);
      const bValue = this.getCellValue(b, column);
      
      if (this.sortDirection === 'asc') {
            return aValue.localeCompare(bValue);
        } else {
            return bValue.localeCompare(aValue);
        }
    });
    
    // Reorder rows in DOM
    rows.forEach(row => tbody.appendChild(row));
  }

  getCellValue(row, column) {
    const cell = row.querySelector(`[data-column="${column}"]`);
    return cell ? cell.textContent.trim() : '';
  }

  setupActionButtons() {
    const newSupplierBtn = document.getElementById('newSupplierBtn');
    const manageOrdersBtn = document.getElementById('manageOrdersBtn');
    const printBtn = document.getElementById('printBtn');
    const refreshBtn = document.getElementById('refreshBtn');
    
    if (newSupplierBtn) {
      newSupplierBtn.addEventListener('click', () => this.openNewSupplierModal());
    }
    
    if (manageOrdersBtn) {
      manageOrdersBtn.addEventListener('click', () => {
        Utils.showNotification('Manage Orders feature coming soon!', 'info');
      });
    }
    
    if (printBtn) {
      printBtn.addEventListener('click', () => this.printSupplierList());
    }
    
    if (refreshBtn) {
      refreshBtn.addEventListener('click', () => this.refreshData());
    }
  }

  openNewSupplierModal() {
    const modal = document.getElementById('newSupplierModal');
    if (modal) {
        modal.classList.add('show');
        document.body.style.overflow = 'hidden';
    }
}

  closeModal() {
    const modals = document.querySelectorAll('.modal');
    modals.forEach(modal => {
        modal.classList.remove('show');
    });
    document.body.style.overflow = '';
}

  setupModalFunctionality() {
    // Close modal on backdrop click
    document.querySelectorAll('.modal').forEach(modal => {
      modal.addEventListener('click', (e) => {
        if (e.target === modal) {
          this.closeModal();
        }
      });
    });

    // Close modal on close button click
    document.querySelectorAll('.modal-close').forEach(closeBtn => {
      closeBtn.addEventListener('click', () => this.closeModal());
    });

    // Close modal on escape key
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape') {
        this.closeModal();
      }
    });
  }

  saveNewSupplier() {
    const form = document.getElementById('newSupplierForm');
    if (!form) return;

    const formData = new FormData(form);
    const supplier = {
      id: Utils.generateId(),
      accNumber: formData.get('accNumber'),
      companyName: formData.get('companyName'),
      address: formData.get('address'),
      phone: formData.get('phone'),
      email: formData.get('email'),
      contactPerson: formData.get('contactPerson'),
      notes: formData.get('notes'),
      createdAt: new Date().toISOString()
    };
    
    // Validate required fields
    if (!supplier.accNumber || !supplier.companyName) {
      Utils.showNotification('Please fill in all required fields', 'error');
        return;
    }
    
    // Add to table
    this.addSupplierToTable(supplier);
    
    // Close modal and reset form
    this.closeModal();
    form.reset();
    
    Utils.showNotification('Supplier added successfully!', 'success');
  }

  addSupplierToTable(supplier) {
    const tbody = document.querySelector('#supplierTableBody');
    if (!tbody) return;

    const row = document.createElement('tr');
    row.innerHTML = `
      <td class="acc-number" data-column="accNumber">${supplier.accNumber}</td>
      <td class="company-name" data-column="companyName">${supplier.companyName}</td>
      <td class="address" data-column="address">${supplier.address}</td>
      <td class="phone" data-column="phone">${supplier.phone}</td>
      <td class="email" data-column="email">${supplier.email}</td>
      <td class="contact-person" data-column="contactPerson">${supplier.contactPerson}</td>
      <td>
        <button class="phone-btn" onclick="window.databaseManager.callSupplier('${supplier.phone}')">
          <i class="fas fa-phone"></i> Call
        </button>
        <button class="open-btn" onclick="window.databaseManager.openSupplier('${supplier.id}')">
          <i class="fas fa-external-link-alt"></i> Open
            </button>
        </td>
    `;
    
    tbody.appendChild(row);
    this.updateRecordCount();
  }

  callSupplier(phone) {
    Utils.showNotification(`Calling ${phone}...`, 'info');
    // In a real app, this would integrate with phone system
  }

  openSupplier(id) {
    Utils.showNotification(`Opening supplier details for ID: ${id}`, 'info');
    // In a real app, this would navigate to supplier details page
  }

  setupAdvancedSearch() {
    const advancedSearchBtn = document.getElementById('advancedSearchBtn');
    const advancedSearchContainer = document.getElementById('advancedSearchContainer');
    
    if (advancedSearchBtn && advancedSearchContainer) {
      advancedSearchBtn.addEventListener('click', () => {
        advancedSearchContainer.style.display = 
          advancedSearchContainer.style.display === 'none' ? 'block' : 'none';
      });
    }
  }

  performAdvancedSearch() {
    const form = document.getElementById('advancedSearchForm');
    if (!form) return;

    const formData = new FormData(form);
    const criteria = {
      companyName: formData.get('companyName'),
      phone: formData.get('phone'),
      email: formData.get('email'),
      address: formData.get('address')
    };
    
    const tableRows = document.querySelectorAll('#supplierTableBody tr');
    let visibleCount = 0;
    
    tableRows.forEach(row => {
      const matches = Object.entries(criteria).every(([key, value]) => {
        if (!value) return true;
        const cellValue = row.querySelector(`[data-column="${key}"]`)?.textContent.toLowerCase() || '';
        return cellValue.includes(value.toLowerCase());
      });
        
        if (matches) {
            row.style.display = '';
            visibleCount++;
        } else {
            row.style.display = 'none';
        }
    });
    
    this.updateRecordCount(visibleCount);
    Utils.showNotification(`Found ${visibleCount} matching suppliers`, 'info');
  }

  clearAdvancedSearch() {
    const form = document.getElementById('advancedSearchForm');
    if (form) {
      form.reset();
    }
    
    const tableRows = document.querySelectorAll('#supplierTableBody tr');
    tableRows.forEach(row => {
        row.style.display = '';
    });
    
    this.updateRecordCount(tableRows.length);
}

  printSupplierList() {
    const printWindow = window.open('', '_blank');
    const table = document.querySelector('.supplier-table');
    
    if (printWindow && table) {
    printWindow.document.write(`
        <html>
        <head>
            <title>Supplier List - Garage Master</title>
            <style>
                body { font-family: Arial, sans-serif; margin: 20px; }
              table { width: 100%; border-collapse: collapse; margin-top: 20px; }
              th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
              th { background-color: #f2f2f2; font-weight: bold; }
              h1 { color: #ec2025; }
            </style>
        </head>
        <body>
            <h1>Supplier List</h1>
            <p>Generated on: ${new Date().toLocaleDateString()}</p>
            ${table.outerHTML}
        </body>
        </html>
    `);
    printWindow.document.close();
    printWindow.print();
}
  }
    
  refreshData() {
    Utils.showNotification('Refreshing data...', 'info');
    
    // Simulate data refresh
    setTimeout(() => {
      this.updateRecordCount();
      Utils.showNotification('Data refreshed successfully!', 'success');
    }, 1000);
}

  highlightSearchTerms(searchTerm) {
    const tableRows = document.querySelectorAll('#supplierTableBody tr');
    tableRows.forEach(row => {
      const cells = row.querySelectorAll('td');
      cells.forEach(cell => {
        const text = cell.textContent;
        const highlightedText = text.replace(
          new RegExp(searchTerm, 'gi'),
          match => `<mark style="background: yellow; padding: 1px 2px; border-radius: 2px;">${match}</mark>`
        );
        cell.innerHTML = highlightedText;
      });
    });
  }

  removeHighlights() {
    const marks = document.querySelectorAll('mark');
    marks.forEach(mark => {
      mark.outerHTML = mark.textContent;
    });
  }

  updateRecordCount(count) {
    const recordCountElement = document.querySelector('.record-count');
    if (recordCountElement) {
      if (count !== undefined) {
        recordCountElement.textContent = `Showing ${count} records`;
      } else {
        const visibleRows = document.querySelectorAll('#supplierTableBody tr:not([style*="display: none"])');
        recordCountElement.textContent = `Showing ${visibleRows.length} records`;
      }
    }
  }
}

/* ========================================
   CALENDAR FUNCTIONALITY
   ======================================== */

class CalendarManager {
  constructor() {
    this.currentMonth = new Date().getMonth();
    this.currentYear = new Date().getFullYear();
    this.appointments = this.loadAppointments(); // Load from localStorage or use default
    this.init();
  }

  init() {
    this.setupCalendarNavigation();
    this.setupViewOptions();
    this.setupAppointmentModal();
    this.generateCalendar();
    this.updateUpcomingAppointments();
    this.updateTodaysSchedule();
    
    // Setup appointment filters after a short delay to ensure DOM is ready
    setTimeout(() => {
      this.setupAppointmentFilters();
    }, 100);
  }

  // Load appointments from localStorage or return default demo data
  loadAppointments() {
    const saved = localStorage.getItem('garageAppointments');
    if (saved) {
      return JSON.parse(saved);
    }
    
    // Return demo data for now
    const today = new Date();
    const tomorrow = new Date(today);
    tomorrow.setDate(tomorrow.getDate() + 1);
    const nextWeek = new Date(today);
    nextWeek.setDate(nextWeek.getDate() + 7);
    const nextWeek2 = new Date(today);
    nextWeek2.setDate(nextWeek2.getDate() + 8);
    
    return [
      {
        id: '1',
        customerName: 'Robert Brown',
        vehicle: 'BMW 3 Series - Full Service',
        bay: 'Bay 1',
        status: 'Confirmed',
        fromDate: tomorrow.toISOString().split('T')[0],
        fromTime: '09:00',
        toDate: tomorrow.toISOString().split('T')[0],
        toTime: '11:30',
        duration: '2.5h',
        description: 'Full service including oil change, brake check, and safety inspection',
        type: 'tomorrow'
      },
      {
        id: '2',
        customerName: 'Lisa Anderson',
        vehicle: 'Audi A4 - AC Repair',
        bay: 'Bay 2',
        status: 'Pending',
        fromDate: nextWeek.toISOString().split('T')[0],
        fromTime: '14:00',
        toDate: nextWeek.toISOString().split('T')[0],
        toTime: '17:00',
        duration: '3.0h',
        description: 'Air conditioning system repair and refrigerant refill',
        type: 'this-week'
      },
      {
        id: '3',
        customerName: 'David Miller',
        vehicle: 'Mercedes C-Class - Engine Diagnostic',
        bay: 'Bay 3',
        status: 'Confirmed',
        fromDate: nextWeek2.toISOString().split('T')[0],
        fromTime: '11:00',
        toDate: nextWeek2.toISOString().split('T')[0],
        toTime: '12:30',
        duration: '1.5h',
        description: 'Engine diagnostic and performance check',
        type: 'next-week'
      },
      {
        id: '4',
        customerName: 'Maria Garcia',
        vehicle: 'Volkswagen Golf - Oil Change',
        bay: 'Bay 1',
        status: 'Service',
        fromDate: nextWeek.toISOString().split('T')[0],
        fromTime: '10:30',
        toDate: nextWeek.toISOString().split('T')[0],
        toTime: '11:30',
        duration: '1.0h',
        description: 'Oil change and filter replacement',
        type: 'this-week'
      },
      {
        id: '5',
        customerName: 'James Wilson',
        vehicle: 'Ford Mustang - Performance Tune',
        bay: 'Bay 4',
        status: 'Urgent',
        fromDate: nextWeek2.toISOString().split('T')[0],
        fromTime: '15:00',
        toDate: nextWeek2.toISOString().split('T')[0],
        toTime: '19:00',
        duration: '4.0h',
        description: 'Performance tuning and dyno testing',
        type: 'next-week'
      },
      {
        id: '6',
        customerName: 'Sophie Chen',
        vehicle: 'Tesla Model 3 - Safety Check',
        bay: 'Bay 2',
        status: 'Confirmed',
        fromDate: tomorrow.toISOString().split('T')[0],
        fromTime: '13:30',
        toDate: tomorrow.toISOString().split('T')[0],
        toTime: '15:30',
        duration: '2.0h',
        description: 'Comprehensive safety inspection and battery check',
        type: 'tomorrow'
      }
    ];
  }

  // Save appointments to localStorage
  saveAppointments() {
    localStorage.setItem('garageAppointments', JSON.stringify(this.appointments));
  }

  // Setup appointment modal functionality
  setupAppointmentModal() {
    const saveBtn = document.querySelector('.modal-action-btn.primary');
    const modal = document.getElementById('appointmentModal');
    
    if (saveBtn && modal) {
      saveBtn.addEventListener('click', () => this.saveNewAppointment());
    }

    // Setup quick action buttons to open modal
    const quickActionCards = document.querySelectorAll('.quick-action-card');
    quickActionCards.forEach(card => {
      card.addEventListener('click', () => {
        this.openAppointmentModal();
      });
    });

    // Setup "New Appointment" button
    const newAppointmentBtn = document.querySelector('.btn-primary');
    if (newAppointmentBtn) {
      newAppointmentBtn.addEventListener('click', () => {
        this.openAppointmentModal();
      });
    }
  }

  // Open appointment modal
  openAppointmentModal() {
    const modal = document.getElementById('appointmentModal');
    if (modal) {
      modal.style.display = 'flex';
      // Reset form
      this.resetAppointmentForm();
    }
  }

  // Reset appointment form
  resetAppointmentForm() {
    const form = document.getElementById('appointmentModal');
    if (form) {
      // Reset all form fields
      const inputs = form.querySelectorAll('input, select, textarea');
      inputs.forEach(input => {
        if (input.type === 'number') {
          input.value = input.id.includes('hour') ? '7' : '00';
        } else if (input.type === 'date') {
          input.value = '';
        } else if (input.type === 'text' || input.tagName === 'TEXTAREA') {
          input.value = '';
        } else if (input.tagName === 'SELECT') {
          input.selectedIndex = 0;
        }
      });
    }
  }

  // Save new appointment from modal
  saveNewAppointment() {
    const modal = document.getElementById('appointmentModal');
    if (!modal) return;

    // Collect form data
    const appointment = {
      id: Utils.generateId(),
      customerName: document.getElementById('appt-customer')?.value || 'New Customer',
      vehicle: document.getElementById('appt-vehicle')?.value || 'Vehicle TBD',
      bay: document.getElementById('appt-bay')?.value || 'Bay 1',
      status: document.getElementById('appt-status')?.value || 'Pending',
      fromDate: document.getElementById('appt-from-date')?.value || '',
      fromTime: this.formatTime(
        document.getElementById('appt-from-hour')?.value || '0',
        document.getElementById('appt-from-minute')?.value || '0'
      ),
      toDate: document.getElementById('appt-to-date')?.value || '',
      toTime: this.formatTime(
        document.getElementById('appt-to-hour')?.value || '0',
        document.getElementById('appt-to-minute')?.value || '0'
      ),
      duration: this.getDurationText(),
      description: document.getElementById('appt-description-input')?.value || '',
      type: this.getAppointmentType(),
      createdAt: new Date().toISOString()
    };

    // Validate required fields
    if (!appointment.fromDate || !appointment.toDate) {
      Utils.showNotification('Please select start and end dates', 'error');
      return;
    }

    // Add to appointments array
    this.appointments.push(appointment);
    this.saveAppointments();

    // Update UI
    this.generateCalendar();
    this.updateUpcomingAppointments();
    this.updateTodaysSchedule();

    // Close modal
    modal.style.display = 'none';
    this.resetAppointmentForm();

    Utils.showNotification('Appointment saved successfully!', 'success');
  }

  // Format time from hour and minute inputs
  formatTime(hour, minute) {
    const h = parseInt(hour);
    const m = parseInt(minute);
    return `${h.toString().padStart(2, '0')}:${m.toString().padStart(2, '0')}`;
  }

  // Get duration text from the duration display
  getDurationText() {
    const days = document.getElementById('appt-duration-days')?.textContent || '0 days';
    const time = document.getElementById('appt-duration-time')?.textContent || '0h 0m';
    return `${days} ${time}`.replace(/\s+/g, ' ').trim();
  }

  // Determine appointment type based on date
  getAppointmentType() {
    const fromDate = document.getElementById('appt-from-date')?.value;
    if (!fromDate) return 'this-week';

    const appointmentDate = new Date(fromDate);
    const today = new Date();
    const tomorrow = new Date(today);
    tomorrow.setDate(tomorrow.getDate() + 1);
    
    const nextWeek = new Date(today);
    nextWeek.setDate(nextWeek.getDate() + 7);

    if (appointmentDate.toDateString() === tomorrow.toDateString()) {
      return 'tomorrow';
    } else if (appointmentDate <= nextWeek) {
      return 'this-week';
    } else {
      return 'next-week';
    }
  }

  setupCalendarNavigation() {
    const prevBtn = document.querySelector('.calendar-prev');
    const nextBtn = document.querySelector('.calendar-next');
    
    if (prevBtn) {
      prevBtn.addEventListener('click', () => this.previousMonth());
    }
    
    if (nextBtn) {
      nextBtn.addEventListener('click', () => this.nextMonth());
    }
  }

  setupViewOptions() {
    const viewBtns = document.querySelectorAll('.view-btn');
    viewBtns.forEach(btn => {
      btn.addEventListener('click', () => {
        viewBtns.forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        this.changeView(btn.dataset.view);
      });
    });
  }

  previousMonth() {
    this.currentMonth--;
    if (this.currentMonth < 0) {
      this.currentMonth = 11;
      this.currentYear--;
    }
    this.generateCalendar();
  }

  nextMonth() {
    this.currentMonth++;
    if (this.currentMonth > 11) {
      this.currentMonth = 0;
      this.currentYear++;
    }
    this.generateCalendar();
  }

  changeView(view) {
    Utils.showNotification(`Switched to ${view} view`, 'info');
    // Implement view switching logic here
  }

  generateCalendar() {
    const calendarGrid = document.querySelector('.calendar-grid');
    const calendarTitle = document.querySelector('.calendar-title');
    
    if (!calendarGrid || !calendarTitle) return;

    const months = ['JANUARY', 'FEBRUARY', 'MARCH', 'APRIL', 'MAY', 'JUNE', 
                   'JULY', 'AUGUST', 'SEPTEMBER', 'OCTOBER', 'NOVEMBER', 'DECEMBER'];
    
    calendarTitle.textContent = `${months[this.currentMonth]} ${this.currentYear}`;

    const firstDay = new Date(this.currentYear, this.currentMonth, 1).getDay();
    const daysInMonth = new Date(this.currentYear, this.currentMonth + 1, 0).getDate();
    const today = new Date();
    const isCurrentMonth = today.getFullYear() === this.currentYear && today.getMonth() === this.currentMonth;
    const todayDate = today.getDate();

    // Clear existing calendar days (keep headers)
    const dayHeaders = calendarGrid.querySelectorAll('.calendar-day-header');
    calendarGrid.innerHTML = '';
    dayHeaders.forEach(header => calendarGrid.appendChild(header));

    // Add previous month's trailing days
    const prevMonth = this.currentMonth === 0 ? 11 : this.currentMonth - 1;
    const prevYear = this.currentMonth === 0 ? this.currentYear - 1 : this.currentYear;
    const daysInPrevMonth = new Date(prevYear, prevMonth + 1, 0).getDate();
    
    for (let i = firstDay - 1; i >= 0; i--) {
      const day = document.createElement('div');
      day.className = 'calendar-day';
      day.style.cssText = 'background: var(--white); padding: 8px; min-height: 40px; font-size: 0.8rem; color: var(--gray-400);';
      day.textContent = daysInPrevMonth - i;
      calendarGrid.appendChild(day);
    }

    // Add current month's days with appointments
    for (let day = 1; day <= daysInMonth; day++) {
      const dayElement = document.createElement('div');
      dayElement.className = 'calendar-day';
      dayElement.textContent = day;
      
      let styles = 'background: var(--white); padding: 8px; min-height: 40px; font-size: 0.8rem; color: var(--dark); cursor: pointer;';
      
      if (isCurrentMonth && day === todayDate) {
        styles = 'background: var(--accent-light); padding: 8px; min-height: 40px; font-size: 0.8rem; color: var(--accent-solid); cursor: pointer; font-weight: 600;';
        dayElement.classList.add('today');
      }
      
      // Check if this day has appointments
      const dayAppointments = this.getAppointmentsForDay(day);
      if (dayAppointments.length > 0) {
        styles += '; border: 2px solid var(--accent-solid);';
        dayElement.classList.add('has-appointments');
        
        // Add appointment indicator
        const indicator = document.createElement('div');
        indicator.className = 'appointment-indicator';
        indicator.textContent = dayAppointments.length;
        indicator.style.cssText = 'position: absolute; top: 2px; right: 2px; background: var(--accent-solid); color: white; border-radius: 50%; width: 16px; height: 16px; font-size: 0.7rem; display: flex; align-items: center; justify-content: center;';
        dayElement.appendChild(indicator);
      }
      
      dayElement.style.cssText = styles;
      dayElement.style.position = cell.style.position || 'relative';
      
      dayElement.addEventListener('click', () => {
        document.querySelectorAll('.calendar-day').forEach(d => {
          if (!d.classList.contains('today')) {
            d.style.background = 'var(--white)';
            d.style.fontWeight = 'normal';
          }
        });
        if (!dayElement.classList.contains('today')) {
          dayElement.style.background = 'var(--accent-light)';
          dayElement.style.fontWeight = '600';
        }
        
        // Show appointments for this day
        this.showDayAppointments(day, dayAppointments);
      });
      
      calendarGrid.appendChild(dayElement);
    }

    // Add next month's leading days
    const totalCells = calendarGrid.children.length - 7; // Subtract headers
    const remainingCells = 42 - totalCells; // 6 rows * 7 days = 42 total cells
    
    for (let day = 1; day <= remainingCells; day++) {
      const dayElement = document.createElement('div');
      dayElement.className = 'calendar-day';
      dayElement.style.cssText = 'background: var(--white); padding: 8px; min-height: 40px; font-size: 0.8rem; color: var(--gray-400);';
      dayElement.textContent = day;
      calendarGrid.appendChild(dayElement);
    }
  }

  // Get appointments for a specific day
  getAppointmentsForDay(day) {
    const targetDate = new Date(this.currentYear, this.currentMonth, day);
    return this.appointments.filter(appointment => {
      const appointmentDate = new Date(appointment.fromDate);
      return appointmentDate.getDate() === day && 
             appointmentDate.getMonth() === this.currentMonth && 
             appointmentDate.getFullYear() === this.currentYear;
    });
  }

  // Show appointments for a specific day
  showDayAppointments(day, appointments) {
    if (appointments.length === 0) {
      Utils.showNotification(`No appointments for ${day} ${this.getMonthName()}`, 'info');
      return;
    }

    let message = `Appointments for ${day} ${this.getMonthName()}:\n`;
    appointments.forEach(appointment => {
      message += `• ${appointment.customerName} - ${appointment.vehicle} (${appointment.fromTime})\n`;
    });
    
    Utils.showNotification(message, 'info');
  }

  getMonthName() {
    const months = ['January', 'February', 'March', 'April', 'May', 'June', 
                   'July', 'August', 'September', 'October', 'November', 'December'];
    return months[this.currentMonth];
  }

  // Update upcoming appointments section
  updateUpcomingAppointments() {
    const grid = document.querySelector('.upcoming-appointments-grid');
    if (!grid) return;

    // Clear existing cards
    grid.innerHTML = '';

    // Get current filter
    const activeFilter = this.getActiveFilter();

    // Group appointments by type
    const tomorrow = this.appointments.filter(a => a.type === 'tomorrow');
    const thisWeek = this.appointments.filter(a => a.type === 'this-week');
    const nextWeek = this.appointments.filter(a => a.type === 'next-week');

    // Filter appointments based on active filter
    let appointmentsToShow = [];
    switch(activeFilter) {
      case 'all':
        appointmentsToShow = [...tomorrow, ...thisWeek, ...nextWeek];
        break;
      case 'tomorrow':
        appointmentsToShow = tomorrow;
        break;
      case 'this-week':
        appointmentsToShow = thisWeek;
        break;
      case 'next-week':
        appointmentsToShow = nextWeek;
        break;
      default:
        appointmentsToShow = [...tomorrow, ...thisWeek, ...nextWeek];
    }

    // Add filtered appointments
    appointmentsToShow.forEach(appointment => {
      grid.appendChild(this.createAppointmentCard(appointment, appointment.type));
    });

    // Show blank section for each filter (ready for future data)
    if (appointmentsToShow.length === 0) {
      const blankSection = document.createElement('div');
      blankSection.className = 'blank-appointments-section';
      blankSection.innerHTML = `
        <div style="text-align: center; padding: 60px 20px; color: var(--gray-400);">
          <div style="font-size: 2.5rem; margin-bottom: 16px; opacity: 0.6;">
            <i class="fas fa-calendar-plus"></i>
          </div>
          <h3 style="font-size: 1.2rem; font-weight: 600; margin-bottom: 8px; color: var(--gray-500);">
            ${this.getFilterDisplayText(activeFilter).toUpperCase()} APPOINTMENTS
          </h3>
          <p style="font-size: 0.95rem; opacity: 0.8;">
            Ready for data
          </p>
        </div>
      `;
      grid.appendChild(blankSection);
    }
  }

  // Get active filter from the filter buttons
  getActiveFilter() {
    const activeFilterBtn = document.querySelector('.appointment-filter.active');
    if (!activeFilterBtn) return 'all';
    
    const filterText = activeFilterBtn.textContent.toLowerCase();
    if (filterText.includes('tomorrow')) return 'tomorrow';
    if (filterText.includes('this week')) return 'this-week';
    if (filterText.includes('next week')) return 'next-week';
    return 'all';
  }

  // Get display text for filter
  getFilterDisplayText(filter) {
    switch(filter) {
      case 'tomorrow': return 'tomorrow';
      case 'this-week': return 'this week';
      case 'next-week': return 'next week';
      default: return 'all';
    }
  }

  // Setup appointment filter functionality
  setupAppointmentFilters() {
    // Use event delegation to handle clicks on appointment filter buttons
    document.addEventListener('click', (e) => {
      if (e.target.classList.contains('appointment-filter')) {
        e.preventDefault();
        console.log('Filter button clicked:', e.target.textContent); // Debug
        
        const filterButtons = document.querySelectorAll('.appointment-filter');
        
        // Remove active class from all buttons
        filterButtons.forEach(btn => btn.classList.remove('active'));
        // Add active class to clicked button
        e.target.classList.add('active');
        // Update the appointments display
        this.updateUpcomingAppointments();
      }
    });
  }

  // Create appointment card element
  createAppointmentCard(appointment, type) {
    const card = document.createElement('div');
    card.className = `appointment-card ${type}`;
    
    const icon = this.getAppointmentIcon(appointment.vehicle);
    const timeText = this.formatTimeForDisplay(appointment.fromTime);
    
    card.innerHTML = `
      <span class="appointment-badge ${type}">${this.getTypeLabel(type)}</span>
      <div class="appointment-header">
        <div class="appointment-icon">
          <i class="${icon}"></i>
        </div>
        <div class="appointment-info">
          <h3>${appointment.customerName}</h3>
          <p>${appointment.vehicle}</p>
        </div>
      </div>
      <div class="appointment-details">
        <div class="appointment-detail-item">
          <div class="appointment-detail-number">${timeText}</div>
          <div class="appointment-detail-label">Time</div>
        </div>
        <div class="appointment-detail-item">
          <div class="appointment-detail-number">${appointment.duration}</div>
          <div class="appointment-detail-label">Duration</div>
        </div>
      </div>
      <div class="appointment-footer">
        <div class="appointment-time">${this.getRelativeDate(appointment.fromDate)}</div>
        <div class="appointment-actions">
          <button class="appointment-btn" onclick="window.calendarManager.editAppointment('${appointment.id}')">Edit</button>
          <button class="appointment-btn primary" onclick="window.calendarManager.confirmAppointment('${appointment.id}')">Confirm</button>
        </div>
      </div>
    `;

    return card;
  }

  // Get appointment icon based on vehicle/service
  getAppointmentIcon(vehicle) {
    const vehicleLower = vehicle.toLowerCase();
    if (vehicleLower.includes('bmw') || vehicleLower.includes('audi') || vehicleLower.includes('mercedes')) {
      return 'fas fa-car';
    } else if (vehicleLower.includes('oil')) {
      return 'fas fa-oil-can';
    } else if (vehicleLower.includes('brake')) {
      return 'fas fa-shield-alt';
    } else if (vehicleLower.includes('ac') || vehicleLower.includes('air')) {
      return 'fas fa-snowflake';
    } else if (vehicleLower.includes('performance') || vehicleLower.includes('tune')) {
      return 'fas fa-tachometer-alt';
    } else if (vehicleLower.includes('diagnostic')) {
      return 'fas fa-cog';
    } else {
      return 'fas fa-tools';
    }
  }

  // Format time for display (convert 24h to 12h)
  formatTimeForDisplay(time24) {
    const [hours, minutes] = time24.split(':');
    const hour = parseInt(hours);
    const ampm = hour >= 12 ? 'PM' : 'AM';
    const hour12 = hour % 12 || 12;
    return `${hour12}:${minutes} ${ampm}`;
  }

  // Get type label
  getTypeLabel(type) {
    switch(type) {
      case 'tomorrow': return 'Tomorrow';
      case 'this-week': return 'This Week';
      case 'next-week': return 'Next Week';
      default: return 'Upcoming';
    }
  }

  // Get relative date
  getRelativeDate(dateString) {
    const date = new Date(dateString);
    const today = new Date();
    const tomorrow = new Date(today);
    tomorrow.setDate(tomorrow.getDate() + 1);
    
    if (date.toDateString() === tomorrow.toDateString()) {
      return 'Tomorrow';
    } else {
      return date.toLocaleDateString('en-US', { weekday: 'long' });
    }
  }

  // Update today's schedule
  updateTodaysSchedule() {
    const tbody = document.querySelector('.enhanced-schedule-table tbody');
    if (!tbody) return;

    // Clear existing rows
    tbody.innerHTML = '';

    // Get today's appointments
    const today = new Date();
    const todayAppointments = this.appointments.filter(appointment => {
      const appointmentDate = new Date(appointment.fromDate);
      return appointmentDate.toDateString() === today.toDateString();
    });

    if (todayAppointments.length === 0) {
      const noAppointments = document.createElement('tr');
      noAppointments.innerHTML = `
        <td colspan="6" style="text-align: center; padding: 20px; color: var(--gray-500);">
          <i class="fas fa-calendar-times"></i> No appointments scheduled for today
        </td>
      `;
      tbody.appendChild(noAppointments);
      return;
    }

    // Add appointment rows
    todayAppointments.forEach(appointment => {
      const row = document.createElement('tr');
      row.innerHTML = `
        <td>${this.formatTimeForDisplay(appointment.fromTime)}</td>
        <td>${appointment.customerName}</td>
        <td>${appointment.vehicle}</td>
        <td>${appointment.description || 'Service'}</td>
        <td><span class="enhanced-status-badge ${appointment.status.toLowerCase()}">${appointment.status}</span></td>
        <td>
          <button class="enhanced-action-btn" onclick="window.calendarManager.editAppointment('${appointment.id}')">
            <i class="fas fa-edit"></i>
          </button>
        </td>
      `;
      tbody.appendChild(row);
    });
  }

  // Edit appointment
  editAppointment(id) {
    const appointment = this.appointments.find(a => a.id === id);
    if (!appointment) return;

    // Open modal and populate with appointment data
    this.openAppointmentModal();
    this.populateAppointmentForm(appointment);
  }

  // Populate appointment form with existing data
  populateAppointmentForm(appointment) {
    // This would populate the modal form with existing appointment data
    // For now, just show a notification
    Utils.showNotification(`Editing appointment for ${appointment.customerName}`, 'info');
  }

  // Confirm appointment
  confirmAppointment(id) {
    const appointment = this.appointments.find(a => a.id === id);
    if (!appointment) return;

    appointment.status = 'Confirmed';
    this.saveAppointments();
    this.updateUpcomingAppointments();
    this.updateTodaysSchedule();
    
    Utils.showNotification(`Appointment confirmed for ${appointment.customerName}`, 'success');
  }
}

/* ========================================
   INITIALIZATION
   ======================================== */

// Initialize all functionality when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
  // Initialize core managers
  window.themeManager = new ThemeManager();
  window.menuManager = new MenuManager();
  window.dropdownManager = new DropdownManager();
  
  // Initialize database functionality if on database page
  if (document.querySelector('.database-container')) {
    window.databaseManager = new DatabaseManager();
    console.log('Database functionality initialized');
  }
  
  // Initialize calendar functionality if on calendar page
  if (document.querySelector('.calendar-widget')) {
    window.calendarManager = new CalendarManager();
    console.log('Calendar functionality initialized');
  }

  // Setup appointment filter buttons (outside class, always works)
  const filterButtons = document.querySelectorAll('.appointment-filter');
  filterButtons.forEach(button => {
    button.addEventListener('click', (e) => {
      e.preventDefault();
      filterButtons.forEach(btn => btn.classList.remove('active'));
      button.classList.add('active');
      if (window.calendarManager) {
        window.calendarManager.updateUpcomingAppointments();
      }
    });
  });

  // Full Calendar Modal open/close logic
  const viewFullCalendarBtn = document.querySelector('.btn-view-all');
  const fullCalendarModal = document.getElementById('fullCalendarModal');
  const closeFullCalendarModalBtn = document.getElementById('closeFullCalendarModal');
  const fullCalendarBackdrop = fullCalendarModal?.querySelector('.modal-backdrop');

  function openFullCalendarModal() {
    if (fullCalendarModal) fullCalendarModal.style.display = 'flex';
  }
  function closeFullCalendarModal() {
    if (fullCalendarModal) fullCalendarModal.style.display = 'none';
  }
  if (viewFullCalendarBtn && fullCalendarModal) {
    viewFullCalendarBtn.addEventListener('click', openFullCalendarModal);
  }
  if (closeFullCalendarModalBtn && fullCalendarModal) {
    closeFullCalendarModalBtn.addEventListener('click', closeFullCalendarModal);
  }
  if (fullCalendarBackdrop && fullCalendarModal) {
    fullCalendarBackdrop.removeEventListener('click', closeFullCalendarModal);
  }
  document.removeEventListener('keydown', function(e) {
    if (e.key === 'Escape' && fullCalendarModal && fullCalendarModal.style.display === 'flex') {
      closeFullCalendarModal();
    }
  });
  
  // Make utils globally available
  window.Utils = Utils;
  
  console.log('Garage Master application initialized successfully');
});

// Add CSS animations for notifications
const style = document.createElement('style');
style.textContent = `
    @keyframes slideInRight {
    from {
      transform: translateX(100%);
      opacity: 0;
    }
    to {
      transform: translateX(0);
      opacity: 1;
    }
  }
  
    @keyframes slideOutRight {
    from {
      transform: translateX(0);
      opacity: 1;
    }
    to {
      transform: translateX(100%);
      opacity: 0;
    }
    }
`;
document.head.appendChild(style);

// --- Full Calendar Modal View Rendering ---
let fullCalendarCurrentView = 'day';
let fullCalendarCurrentDate = new Date();
const bays = ['Bay 1', 'Bay 2', 'Bay 3', 'Bay 4', 'Bay 5', 'Bay 6'];

function renderFullCalendarDayView(date = fullCalendarCurrentDate) {
  const grid = document.getElementById('full-calendar-grid');
  if (!grid) return;
  grid.innerHTML = '';
  // Time slots (7:00 to 18:00, every 15 min)
  const startHour = 7, endHour = 18;
  const timeSlots = [];
  for (let h = startHour; h <= endHour; h++) {
    for (let m = 0; m < 60; m += 15) {
      timeSlots.push({
        label: `${h === 12 ? 'NOON' : h % 12 === 0 ? 12 : h % 12}:${m.toString().padStart(2, '0')} ${h < 12 ? 'AM' : 'PM'}`,
        hour: h,
        minute: m
      });
    }
  }
  // Build grid
  const gridEl = document.createElement('div');
  gridEl.className = 'calendar-day-grid';
  gridEl.style.display = 'grid';
  gridEl.style.gridTemplateColumns = `100px repeat(${bays.length}, 1fr)`;
  gridEl.style.minWidth = '900px';
  gridEl.style.overflowX = 'auto';
  // Header row
  gridEl.appendChild(createCell('', 'header'));
  bays.forEach(bay => gridEl.appendChild(createCell(bay, 'header')));
  // Get appointments for this day
  const appointments = window.calendarManager ? window.calendarManager.appointments || [] : [];
  // Time slots rows
  timeSlots.forEach(slot => {
    gridEl.appendChild(createCell(slot.label, 'time'));
    bays.forEach(bay => {
      const cell = createCell('', 'cell');
      // Place appointment if it matches
      appointments.forEach(appt => {
        const apptDate = new Date(appt.fromDate);
        if (
          apptDate.toDateString() === date.toDateString() &&
          appt.bay === bay &&
          appt.fromTime === slot.label.replace(' NOON', '').replace(' AM', '').replace(' PM', '')
        ) {
          const apptDiv = document.createElement('div');
          apptDiv.className = 'calendar-appt-card';
          apptDiv.style.background = '#b91c1c';
          apptDiv.style.color = '#fff';
          apptDiv.style.borderRadius = '8px';
          apptDiv.style.padding = '6px 10px';
          apptDiv.style.fontWeight = '600';
          apptDiv.style.fontSize = '0.98rem';
          apptDiv.style.boxShadow = '0 2px 8px 0 rgba(185,28,28,0.10)';
          apptDiv.innerHTML = `<div>${appt.fromTime} ~ ${appt.toTime}</div><div>${appt.status ? appt.status + ' (' + appt.duration + ')' : ''}</div><div>${appt.description || ''}</div>`;
          cell.appendChild(apptDiv);
        }
      });
      gridEl.appendChild(cell);
    });
  });
  grid.appendChild(gridEl);
}

// --- Fix Week and Month View Separation ---
// Only render a single week grid in Week view
function renderFullCalendarWeekView(date = fullCalendarCurrentDate) {
  const grid = document.getElementById('full-calendar-grid');
  if (!grid) return;
  grid.innerHTML = '';
  // Days of week
  const daysOfWeek = [];
  const start = new Date(date);
  start.setDate(start.getDate() - start.getDay()); // Sunday
  for (let i = 0; i < 7; i++) {
    const d = new Date(start);
    d.setDate(start.getDate() + i);
    daysOfWeek.push(d);
  }
  // Time slots (7:00 to 18:00, every 15 min)
  const startHour = 7, endHour = 18;
  const timeSlots = [];
  for (let h = startHour; h <= endHour; h++) {
    for (let m = 0; m < 60; m += 15) {
      timeSlots.push({
        label: `${h === 12 ? 'NOON' : h % 12 === 0 ? 12 : h % 12}:${m.toString().padStart(2, '0')} ${h < 12 ? 'AM' : 'PM'}`,
        hour: h,
        minute: m
      });
    }
  }
  // Build grid
  const gridEl = document.createElement('div');
  gridEl.className = 'calendar-week-grid';
  gridEl.style.display = 'grid';
  gridEl.style.gridTemplateColumns = `100px repeat(7, 1fr)`;
  gridEl.style.minWidth = '900px';
  gridEl.style.overflowX = 'auto';
  // Header row
  gridEl.appendChild(createCell('', 'header'));
  daysOfWeek.forEach(day => gridEl.appendChild(createCell(day.toLocaleDateString('en-US', { weekday: 'short', month: 'short', day: 'numeric' }), 'header')));
  // Get appointments for this week
  const appointments = window.calendarManager ? window.calendarManager.appointments || [] : [];
  // Time slots rows
  timeSlots.forEach(slot => {
    gridEl.appendChild(createCell(slot.label, 'time'));
    daysOfWeek.forEach(day => {
      const cell = createCell('', 'cell');
      // Place appointment if it matches
      appointments.forEach(appt => {
        const apptDate = new Date(appt.fromDate);
        if (
          apptDate.toDateString() === day.toDateString() &&
          appt.fromTime === slot.label.replace(' NOON', '').replace(' AM', '').replace(' PM', '')
        ) {
          const apptDiv = document.createElement('div');
          apptDiv.className = 'calendar-appt-card';
          apptDiv.style.background = '#b91c1c';
          apptDiv.style.color = '#fff';
          apptDiv.style.borderRadius = '8px';
          apptDiv.style.padding = '6px 10px';
          apptDiv.style.fontWeight = '600';
          apptDiv.style.fontSize = '0.98rem';
          apptDiv.style.boxShadow = '0 2px 8px 0 rgba(185,28,28,0.10)';
          apptDiv.innerHTML = `<div>${appt.fromTime} ~ ${appt.toTime}</div><div>${appt.status ? appt.status + ' (' + appt.duration + ')' : ''}</div><div>${appt.description || ''}</div>`;
          cell.appendChild(apptDiv);
        }
      });
      gridEl.appendChild(cell);
    });
  });
  grid.appendChild(gridEl);
}

function renderFullCalendarMonthView(date = fullCalendarCurrentDate) {
  const grid = document.getElementById('full-calendar-grid');
  if (!grid) return;
  grid.innerHTML = '';
  const year = date.getFullYear();
  const month = date.getMonth();
  const firstDay = new Date(year, month, 1).getDay();
  const daysInMonth = new Date(year, month + 1, 0).getDate();
  const today = new Date();
  // Build grid
  const gridEl = document.createElement('div');
  gridEl.className = 'calendar-month-grid';
  gridEl.style.display = 'grid';
  gridEl.style.gridTemplateColumns = 'repeat(7, 1fr)';
  gridEl.style.minWidth = '900px';
  gridEl.style.overflowX = 'auto';
  // Header row
  const weekdays = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
  weekdays.forEach(day => {
    const cell = document.createElement('div');
    cell.textContent = day;
    cell.setAttribute('type', 'header');
    cell.className = 'calendar-grid-header-row';
    gridEl.appendChild(cell);
  });
  // Previous month's trailing days
  const prevMonth = month === 0 ? 11 : month - 1;
  const prevYear = month === 0 ? year - 1 : year;
  const daysInPrevMonth = new Date(prevYear, prevMonth + 1, 0).getDate();
  for (let i = 0; i < firstDay; i++) {
    const cell = document.createElement('div');
    cell.className = 'calendar-month-day';
    cell.style.background = '#f8f9fa';
    cell.style.color = '#bbb';
    cell.textContent = daysInPrevMonth - firstDay + i + 1;
    gridEl.appendChild(cell);
  }
  // Current month's days
  for (let d = 1; d <= daysInMonth; d++) {
    const cell = document.createElement('div');
    cell.className = 'calendar-month-day';
    cell.textContent = d;
    cell.dataset.date = `${year}-${(month+1).toString().padStart(2,'0')}-${d.toString().padStart(2,'0')}`;
    cell.style.position = 'relative';
    cell.style.background = '#fff';
    cell.style.padding = '8px 4px 24px 8px';
    cell.style.minHeight = '60px';
    cell.style.fontSize = '1.05em';
    cell.style.border = '1px solid #f3f4f6';
    // Highlight today
    if (today.getFullYear() === year && today.getMonth() === month && today.getDate() === d) {
      cell.classList.add('today');
    }
    // Appointments
    const appointments = window.calendarManager ? window.calendarManager.appointments || [] : [];
    const appts = appointments.filter(appt => {
      const apptDate = new Date(appt.fromDate);
      return apptDate.getFullYear() === year && apptDate.getMonth() === month && apptDate.getDate() === d;
    });
    if (appts.length > 0) {
      const badge = document.createElement('div');
      badge.textContent = appts.length;
      badge.style.cssText = 'position:absolute;top:4px;right:8px;background:#b91c1c;color:#fff;border-radius:50%;width:20px;height:20px;display:flex;align-items:center;justify-content:center;font-size:0.9em;font-weight:700;';
      cell.appendChild(badge);
    }
    gridEl.appendChild(cell);
  }
  // Next month's leading days
  const totalCells = firstDay + daysInMonth;
  const remainingCells = 7 * 6 - totalCells;
  for (let i = 1; i <= remainingCells; i++) {
    const cell = document.createElement('div');
    cell.className = 'calendar-month-day';
    cell.style.background = '#f8f9fa';
    cell.style.color = '#bbb';
    cell.textContent = i;
    gridEl.appendChild(cell);
  }
  grid.appendChild(gridEl);
}

// Helper to create grid cells
function createCell(text, type) {
  const div = document.createElement('div');
  div.textContent = text;
  if (type) div.setAttribute('type', type);
  if (type === 'header') div.className = 'calendar-grid-header-row';
  if (type === 'time') div.className = 'calendar-time-cell';
  if (type === 'cell') div.className = 'calendar-grid-cell';
  return div;
}

// Handle tab switching
const calendarViewTabs = document.querySelectorAll('.calendar-view-tab');
calendarViewTabs.forEach(tab => {
  tab.addEventListener('click', function() {
    calendarViewTabs.forEach(t => t.classList.remove('active'));
    tab.classList.add('active');
    fullCalendarCurrentView = tab.dataset.view;
    if (fullCalendarCurrentView === 'day') renderFullCalendarDayView();
    else if (fullCalendarCurrentView === 'week') renderFullCalendarWeekView();
    else renderFullCalendarMonthView();
    setupRealtimeHighlights();
  });
});
// Initial render
renderFullCalendarDayView();
setupRealtimeHighlights();

// --- Modern Time Column Styling ---
const calendarStyle = document.createElement('style');
calendarStyle.innerHTML = `
  .calendar-time-cell {
    font-weight: 600;
    color: #b91c1c;
    background: #fff6f0;
    border-right: 2px solid #f3f4f6;
    text-align: right;
    padding-right: 12px;
    font-size: 1.05em;
    letter-spacing: 0.01em;
  }
  .calendar-time-cell.current-time {
    background: #ffeaea !important;
    color: #b91c1c !important;
    border-left: 4px solid #b91c1c;
  }
  .calendar-week-grid [type='header'].today,
  .calendar-month-grid .calendar-month-day.today {
    background: #ffeaea !important;
    color: #b91c1c !important;
    font-weight: 700;
    border-bottom: 2px solid #b91c1c;
    border-radius: 8px 8px 0 0;
  }
`;
document.head.appendChild(calendarStyle);

// --- Yesterday, Today, Tomorrow navigation ---
function updateFullCalendarDate(newDate) {
  fullCalendarCurrentDate = new Date(newDate);
  if (fullCalendarCurrentView === 'day') renderFullCalendarDayView();
  else if (fullCalendarCurrentView === 'week') renderFullCalendarWeekView();
  else if (fullCalendarCurrentView === 'month') renderInfiniteMonthView(fullCalendarCurrentDate);
  updateFullCalendarHeader(fullCalendarCurrentDate);
  setupRealtimeHighlights();
}
const calendarYesterdayBtn = document.getElementById('calendar-yesterday');
const calendarTodayBtn = document.getElementById('calendar-today');
const calendarTomorrowBtn = document.getElementById('calendar-tomorrow');
if (calendarYesterdayBtn) {
  calendarYesterdayBtn.onclick = function() {
    const d = new Date(fullCalendarCurrentDate);
    d.setDate(d.getDate() - 1);
    updateFullCalendarDate(d);
    if (fullCalendarCurrentView === 'month') scrollToDateInMonthView(d);
  };
}
if (calendarTodayBtn) {
  calendarTodayBtn.onclick = function() {
    const d = new Date();
    updateFullCalendarDate(d);
    if (fullCalendarCurrentView === 'month') scrollToDateInMonthView(d);
  };
}
if (calendarTomorrowBtn) {
  calendarTomorrowBtn.onclick = function() {
    const d = new Date(fullCalendarCurrentDate);
    d.setDate(d.getDate() + 1);
    updateFullCalendarDate(d);
    if (fullCalendarCurrentView === 'month') scrollToDateInMonthView(d);
  };
}

// --- Make month grid scrollable ---
const monthGridStyle = document.createElement('style');
monthGridStyle.innerHTML = `
  #full-calendar-grid > .calendar-month-grid {
    max-height: 480px;
    overflow-y: auto;
  }
`;
document.head.appendChild(monthGridStyle);

// --- Infinite Scroll for Month View ---
let loadedMonths = [];
// --- Fix Month view to always update and center on current date ---
function renderInfiniteMonthView(centerDate = new Date()) {
  const grid = document.getElementById('full-calendar-grid');
  if (!grid) return;
  grid.innerHTML = '';
  grid.onscroll = null;
  loadedMonths = [];
  appendMonth(centerDate, 'center');
  grid.onscroll = function() {
    if (grid.scrollTop + grid.clientHeight >= grid.scrollHeight - 50) {
      const last = loadedMonths[loadedMonths.length - 1];
      if (last) appendMonth(new Date(last.year, last.month + 1, 1), 'bottom');
    } else if (grid.scrollTop < 50) {
      const first = loadedMonths[0];
      if (first) appendMonth(new Date(first.year, first.month - 1, 1), 'top');
    }
  };
  setTimeout(() => {
    const dateStr = `${centerDate.getFullYear()}-${(centerDate.getMonth()+1).toString().padStart(2,'0')}-${centerDate.getDate().toString().padStart(2,'0')}`;
    const cell = grid.querySelector(`.calendar-month-day[data-date='${dateStr}']`);
    if (cell) cell.scrollIntoView({ behavior: 'smooth', block: 'center' });
  }, 100);
}
function appendMonth(date, position) {
  const year = date.getFullYear();
  const month = date.getMonth();
  if (loadedMonths.some(m => m.year === year && m.month === month)) return;
  loadedMonths[position === 'top' ? 'unshift' : 'push']({ year, month });
  const monthGrid = buildMonthGrid(year, month);
  const grid = document.getElementById('full-calendar-grid');
  if (position === 'top') {
    grid.insertBefore(monthGrid, grid.firstChild);
    grid.scrollTop += monthGrid.offsetHeight;
  } else {
    grid.appendChild(monthGrid);
  }
}
function buildMonthGrid(year, month) {
  const firstDay = new Date(year, month, 1).getDay();
  const daysInMonth = new Date(year, month + 1, 0).getDate();
  const today = new Date();
  const gridEl = document.createElement('div');
  gridEl.className = 'calendar-month-grid';
  gridEl.style.display = 'grid';
  gridEl.style.gridTemplateColumns = 'repeat(7, 1fr)';
  gridEl.style.minWidth = '900px';
  gridEl.style.overflowX = 'auto';
  // Header row
  const weekdays = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
  weekdays.forEach(day => {
    const cell = document.createElement('div');
    cell.textContent = day;
    cell.setAttribute('type', 'header');
    cell.className = 'calendar-grid-header-row';
    gridEl.appendChild(cell);
  });
  // Previous month's trailing days
  const prevMonth = month === 0 ? 11 : month - 1;
  const prevYear = month === 0 ? year - 1 : year;
  const daysInPrevMonth = new Date(prevYear, prevMonth + 1, 0).getDate();
  for (let i = 0; i < firstDay; i++) {
    const cell = document.createElement('div');
    cell.className = 'calendar-month-day';
    cell.style.background = '#f8f9fa';
    cell.style.color = '#bbb';
    cell.textContent = daysInPrevMonth - firstDay + i + 1;
    gridEl.appendChild(cell);
  }
  // Current month's days
  for (let d = 1; d <= daysInMonth; d++) {
    const cell = document.createElement('div');
    cell.className = 'calendar-month-day';
    cell.textContent = d;
    cell.dataset.date = `${year}-${(month+1).toString().padStart(2,'0')}-${d.toString().padStart(2,'0')}`;
    cell.style.position = 'relative';
    cell.style.background = '#fff';
    cell.style.padding = '8px 4px 24px 8px';
    cell.style.minHeight = '60px';
    cell.style.fontSize = '1.05em';
    cell.style.border = '1px solid #f3f4f6';
    // Highlight today
    if (today.getFullYear() === year && today.getMonth() === month && today.getDate() === d) {
      cell.classList.add('today');
    }
    // Appointments
    const appointments = window.calendarManager ? window.calendarManager.appointments || [] : [];
    const appts = appointments.filter(appt => {
      const apptDate = new Date(appt.fromDate);
      return apptDate.getFullYear() === year && apptDate.getMonth() === month && apptDate.getDate() === d;
    });
    if (appts.length > 0) {
      const badge = document.createElement('div');
      badge.textContent = appts.length;
      badge.style.cssText = 'position:absolute;top:4px;right:8px;background:#b91c1c;color:#fff;border-radius:50%;width:20px;height:20px;display:flex;align-items:center;justify-content:center;font-size:0.9em;font-weight:700;';
      cell.appendChild(badge);
    }
    gridEl.appendChild(cell);
  }
  // Next month's leading days
  const totalCells = firstDay + daysInMonth;
  const remainingCells = 7 * 6 - totalCells;
  for (let i = 1; i <= remainingCells; i++) {
    const cell = document.createElement('div');
    cell.className = 'calendar-month-day';
    cell.style.background = '#f8f9fa';
    cell.style.color = '#bbb';
    cell.textContent = i;
    gridEl.appendChild(cell);
  }
  return gridEl;
}
// --- Jump to Date on Navigation ---
function scrollToDateInMonthView(targetDate) {
  const grid = document.getElementById('full-calendar-grid');
  if (!grid) return;
  const dateStr = `${targetDate.getFullYear()}-${(targetDate.getMonth()+1).toString().padStart(2,'0')}-${targetDate.getDate().toString().padStart(2,'0')}`;
  const cell = grid.querySelector(`.calendar-month-day[data-date='${dateStr}']`);
  if (cell) {
    cell.scrollIntoView({ behavior: 'smooth', block: 'center' });
    cell.classList.add('today');
  }
}
// Update navigation handlers
if (calendarYesterdayBtn) {
  calendarYesterdayBtn.onclick = function() {
    const d = new Date(fullCalendarCurrentDate);
    d.setDate(d.getDate() - 1);
    updateFullCalendarDate(d);
    if (fullCalendarCurrentView === 'month') scrollToDateInMonthView(d);
  };
}
if (calendarTodayBtn) {
  calendarTodayBtn.onclick = function() {
    const d = new Date();
    updateFullCalendarDate(d);
    if (fullCalendarCurrentView === 'month') scrollToDateInMonthView(d);
  };
}
if (calendarTomorrowBtn) {
  calendarTomorrowBtn.onclick = function() {
    const d = new Date(fullCalendarCurrentDate);
    d.setDate(d.getDate() + 1);
    updateFullCalendarDate(d);
    if (fullCalendarCurrentView === 'month') scrollToDateInMonthView(d);
  };
}
// Update tab switching for infinite month
calendarViewTabs.forEach(tab => {
  tab.addEventListener('click', function() {
    calendarViewTabs.forEach(t => t.classList.remove('active'));
    tab.classList.add('active');
    fullCalendarCurrentView = tab.dataset.view;
    if (fullCalendarCurrentView === 'day') renderFullCalendarDayView();
    else if (fullCalendarCurrentView === 'week') renderFullCalendarWeekView();
    else renderInfiniteMonthView(fullCalendarCurrentDate);
    setupRealtimeHighlights();
  });
});
// Initial render
renderFullCalendarDayView();
setupRealtimeHighlights();

// --- Update header date ---
function updateFullCalendarHeader(date = fullCalendarCurrentDate) {
  const header = document.getElementById('full-calendar-date');
  if (!header) return;
  if (fullCalendarCurrentView === 'day') {
    header.textContent = date.toLocaleDateString('en-US', { weekday: 'long', year: 'numeric', month: 'short', day: 'numeric' });
  } else if (fullCalendarCurrentView === 'week') {
    const start = new Date(date);
    start.setDate(start.getDate() - start.getDay());
    const end = new Date(start);
    end.setDate(start.getDate() + 6);
    header.textContent = `${start.toLocaleDateString('en-US', { month: 'short', day: 'numeric' })} - ${end.toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' })}`;
  } else {
    header.textContent = date.toLocaleDateString('en-US', { month: 'long', year: 'numeric' });
  }
}
// Call this after any navigation or view change
// --- Fix month view scrollability ---
const fullCalendarGridStyle = document.createElement('style');
fullCalendarGridStyle.innerHTML = `
  #full-calendar-grid {
    max-height: 520px;
    overflow-y: auto;
    min-height: 320px;
  }
`;
document.head.appendChild(fullCalendarGridStyle);
// --- Update navigation and tab handlers ---
function updateFullCalendarDate(newDate) {
  fullCalendarCurrentDate = new Date(newDate);
  resetFullCalendarGrid();
  if (fullCalendarCurrentView === 'day') renderFullCalendarDayView();
  else if (fullCalendarCurrentView === 'week') renderFullCalendarWeekView();
  else if (fullCalendarCurrentView === 'month') renderInfiniteMonthView(fullCalendarCurrentDate);
  updateFullCalendarHeader(fullCalendarCurrentDate);
  setupRealtimeHighlights();
}
calendarViewTabs.forEach(tab => {
  tab.addEventListener('click', function() {
    calendarViewTabs.forEach(t => t.classList.remove('active'));
    tab.classList.add('active');
    fullCalendarCurrentView = tab.dataset.view;
    resetFullCalendarGrid();
    if (fullCalendarCurrentView === 'day') renderFullCalendarDayView();
    else if (fullCalendarCurrentView === 'week') renderFullCalendarWeekView();
    else if (fullCalendarCurrentView === 'month') renderInfiniteMonthView(fullCalendarCurrentDate);
    updateFullCalendarHeader(fullCalendarCurrentDate);
    setupRealtimeHighlights();
  });
});
// Initial render
renderFullCalendarDayView();
updateFullCalendarHeader(fullCalendarCurrentDate);
setupRealtimeHighlights();

// --- Utility: Clear grid and remove scroll handler ---
function resetFullCalendarGrid() {
  const grid = document.getElementById('full-calendar-grid');
  if (!grid) return;
  grid.innerHTML = '';
  grid.onscroll = null;
}

// --- After rendering Week view, scroll to and highlight current day/time ---
function scrollToCurrentDayAndTimeInWeekView(date = fullCalendarCurrentDate) {
  const now = new Date();
  const grid = document.getElementById('full-calendar-grid');
  if (!grid) return;
  // Highlight current day header
  document.querySelectorAll('.calendar-week-grid [type="header"]').forEach(cell => {
    if (cell.textContent.includes(now.toLocaleDateString('en-US', { weekday: 'short', month: 'short', day: 'numeric' }))) {
      cell.classList.add('today');
    } else {
      cell.classList.remove('today');
    }
  });
  // Highlight current time slot
  document.querySelectorAll('.calendar-week-grid .calendar-time-cell').forEach(cell => {
    if (cell.textContent.trim() === formatTimeLabel(now)) {
      cell.classList.add('current-time');
      // Scroll to this row
      cell.scrollIntoView({ behavior: 'smooth', block: 'center' });
    } else {
      cell.classList.remove('current-time');
    }
  });
}
// Patch renderFullCalendarWeekView to call this after rendering
const _origRenderFullCalendarWeekView = renderFullCalendarWeekView;
renderFullCalendarWeekView = function(date = fullCalendarCurrentDate) {
  _origRenderFullCalendarWeekView(date);
  scrollToCurrentDayAndTimeInWeekView(date);
};

// --- Realtime and Highlighting Enhancements (restored and improved) ---
function formatTimeLabel(date) {
  let h = date.getHours(), m = date.getMinutes();
  m = Math.floor(m / 15) * 15;
  let label = `${h === 12 ? 'NOON' : h % 12 === 0 ? 12 : h % 12}:${m.toString().padStart(2, '0')} ${h < 12 ? 'AM' : 'PM'}`;
  return label;
}
function highlightCurrentTimeSlot() {
  const now = new Date();
  // Day view
  document.querySelectorAll('.calendar-day-grid .calendar-time-cell').forEach(cell => {
    if (cell.textContent.trim() === formatTimeLabel(now)) {
      cell.classList.add('current-time');
    } else {
      cell.classList.remove('current-time');
    }
  });
  // Week view: only highlight if selected day is today
  if (fullCalendarCurrentView === 'week' && fullCalendarCurrentDate.toDateString() === now.toDateString()) {
    document.querySelectorAll('.calendar-week-grid .calendar-time-cell').forEach(cell => {
      if (cell.textContent.trim() === formatTimeLabel(now)) {
        cell.classList.add('current-time');
      } else {
        cell.classList.remove('current-time');
      }
    });
  } else {
    document.querySelectorAll('.calendar-week-grid .calendar-time-cell').forEach(cell => cell.classList.remove('current-time'));
  }
}
function highlightCurrentDayInWeek() {
  const now = new Date();
  document.querySelectorAll('.calendar-week-grid [type="header"]').forEach(cell => {
    // Highlight today if it's the selected day, otherwise highlight the selected day
    if (cell.textContent.includes(fullCalendarCurrentDate.toLocaleDateString('en-US', { weekday: 'short', month: 'short', day: 'numeric' }))) {
      cell.classList.add('today');
    } else {
      cell.classList.remove('today');
    }
  });
}
function highlightCurrentDayInMonth() {
  const now = new Date();
  document.querySelectorAll('.calendar-month-grid .calendar-month-day').forEach(cell => {
    if (cell.dataset.date === now.toISOString().slice(0,10)) {
      cell.classList.add('today');
    } else {
      cell.classList.remove('today');
    }
  });
}
function setupRealtimeHighlights() {
  highlightCurrentTimeSlot();
  highlightCurrentDayInWeek();
  highlightCurrentDayInMonth();
  clearInterval(window._calendarRealtimeInterval);
  window._calendarRealtimeInterval = setInterval(() => {
    highlightCurrentTimeSlot();
    highlightCurrentDayInWeek();
    highlightCurrentDayInMonth();
  }, 60000);
}
// --- Week view: highlight selected day, not just today ---
function scrollToSelectedDayAndTimeInWeekView(selectedDate = fullCalendarCurrentDate) {
  const grid = document.getElementById('full-calendar-grid');
  if (!grid) return;
  // Highlight selected day header
  document.querySelectorAll('.calendar-week-grid [type="header"]').forEach(cell => {
    if (cell.textContent.includes(selectedDate.toLocaleDateString('en-US', { weekday: 'short', month: 'short', day: 'numeric' }))) {
      cell.classList.add('today');
    } else {
      cell.classList.remove('today');
    }
  });
  // Highlight current time slot if selected day is today
  const now = new Date();
  const isToday = selectedDate.toDateString() === now.toDateString();
  document.querySelectorAll('.calendar-week-grid .calendar-time-cell').forEach(cell => {
    if (isToday && cell.textContent.trim() === formatTimeLabel(now)) {
      cell.classList.add('current-time');
      cell.scrollIntoView({ behavior: 'smooth', block: 'center' });
    } else {
      cell.classList.remove('current-time');
    }
  });
}
// Patch renderFullCalendarWeekView to call this after rendering with the selected date
const _origRenderFullCalendarWeekView2 = renderFullCalendarWeekView;
renderFullCalendarWeekView = function(date = fullCalendarCurrentDate) {
  _origRenderFullCalendarWeekView2(date);
  scrollToSelectedDayAndTimeInWeekView(date);
  setupRealtimeHighlights();
};

function setSidebarActiveMenu() {
  const menuItems = document.querySelectorAll('.menu-item');
  const currentPage = window.location.pathname.split('/').pop();
  menuItems.forEach(item => {
    const href = item.getAttribute('href');
    if (href && href === currentPage) {
      item.classList.add('active');
    } else {
      item.classList.remove('active');
    }
  });
}
document.addEventListener('DOMContentLoaded', function() {
  setSidebarActiveMenu();
});

// === DARK MODE & DROPDOWNS ===
(function() {
  // Dark mode toggle
  const themeToggle = document.querySelector('.theme-toggle');
  const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
  const savedTheme = localStorage.getItem('theme');
  if (savedTheme === 'dark' || (!savedTheme && prefersDark)) {
    document.body.classList.add('dark-mode');
    setToggleIcon('dark');
  } else {
    setToggleIcon('light');
  }
  function setToggleIcon(mode) {
    if (!themeToggle) return;
    const icon = themeToggle.querySelector('i');
    if (mode === 'dark') {
      icon.classList.remove('fa-moon');
      icon.classList.add('fa-sun');
      icon.title = 'Switch to light mode';
    } else {
      icon.classList.remove('fa-sun');
      icon.classList.add('fa-moon');
      icon.title = 'Switch to dark mode';
    }
  }
  if (themeToggle) {
    themeToggle.addEventListener('click', function() {
      document.body.classList.toggle('dark-mode');
      const isDark = document.body.classList.contains('dark-mode');
      localStorage.setItem('theme', isDark ? 'dark' : 'light');
      setToggleIcon(isDark ? 'dark' : 'light');
    });
  }
  // Add menu dropdown
  document.querySelectorAll('.add-btn').forEach(btn => {
    btn.addEventListener('click', function(e) {
      e.stopPropagation();
      closeAllDropdowns();
      const menu = btn.closest('.add-dropdown').querySelector('.add-menu');
      menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
    });
  });
  // User dropdown
  document.querySelectorAll('.user-avatar').forEach(btn => {
    btn.addEventListener('click', function(e) {
      e.stopPropagation();
      closeAllDropdowns();
      const menu = btn.closest('.user-dropdown').querySelector('.dropdown-menu');
      menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
    });
  });
  // Close dropdowns on outside click
  document.addEventListener('click', closeAllDropdowns);
  function closeAllDropdowns() {
    document.querySelectorAll('.add-menu').forEach(m => m.style.display = 'none');
    document.querySelectorAll('.dropdown-menu').forEach(m => m.style.display = 'none');
  }
})();

// --- Widget Calendar Manager ---
class WidgetCalendarManager {
  constructor() {
    this.widget = document.querySelector('.mrc-calendar-widget');
    if (!this.widget) return;
    this.grid = this.widget.querySelector('.mrc-calendar-grid');
    this.title = this.widget.querySelector('.mrc-calendar-title');
    this.prevBtn = this.widget.querySelector('.mrc-calendar-prev');
    this.nextBtn = this.widget.querySelector('.mrc-calendar-next');
    const today = new Date();
    this.currentYear = today.getFullYear();
    this.currentMonth = today.getMonth();
    this.render();
    this.prevBtn.addEventListener('click', () => {
      this.changeMonth(-1);
    });
    this.nextBtn.addEventListener('click', () => {
      this.changeMonth(1);
    });
  }
  render() {
    // Set title
    const months = ['JANUARY', 'FEBRUARY', 'MARCH', 'APRIL', 'MAY', 'JUNE', 'JULY', 'AUGUST', 'SEPTEMBER', 'OCTOBER', 'NOVEMBER', 'DECEMBER'];
    this.title.textContent = `${months[this.currentMonth]} ${this.currentYear}`;
    // Remove all day cells except headers
    const headers = Array.from(this.grid.querySelectorAll('.mrc-calendar-day-header'));
    this.grid.innerHTML = '';
    headers.forEach(h => this.grid.appendChild(h));
    // Calculate days
    const firstDay = new Date(this.currentYear, this.currentMonth, 1).getDay();
    const daysInMonth = new Date(this.currentYear, this.currentMonth + 1, 0).getDate();
    // Previous month's trailing days
    const prevMonth = this.currentMonth === 0 ? 11 : this.currentMonth - 1;
    const prevYear = this.currentMonth === 0 ? this.currentYear - 1 : this.currentYear;
    const daysInPrevMonth = new Date(prevYear, prevMonth + 1, 0).getDate();
    for (let i = 0; i < firstDay; i++) {
      const cell = document.createElement('div');
      cell.className = 'mrc-calendar-day mrc-calendar-day-other';
      cell.textContent = daysInPrevMonth - firstDay + i + 1;
      cell.style.opacity = '0.35';
      cell.style.pointerEvents = 'none';
      this.grid.appendChild(cell);
    }
    // Current month's days
    const today = new Date();
    for (let d = 1; d <= daysInMonth; d++) {
      const cell = document.createElement('div');
      cell.className = 'mrc-calendar-day';
      cell.textContent = d;
      // Highlight today
      if (
        this.currentYear === today.getFullYear() &&
        this.currentMonth === today.getMonth() &&
        d === today.getDate()
      ) {
        cell.classList.add('today');
      }
      this.grid.appendChild(cell);
    }
    // Next month's leading days to fill the grid
    const totalCells = firstDay + daysInMonth;
    const remainingCells = 7 * 6 - totalCells;
    for (let i = 1; i <= remainingCells; i++) {
      const cell = document.createElement('div');
      cell.className = 'mrc-calendar-day mrc-calendar-day-other';
      cell.textContent = i;
      cell.style.opacity = '0.35';
      cell.style.pointerEvents = 'none';
      this.grid.appendChild(cell);
    }
  }
  changeMonth(offset) {
    this.currentMonth += offset;
    if (this.currentMonth < 0) {
      this.currentMonth = 11;
      this.currentYear--;
    } else if (this.currentMonth > 11) {
      this.currentMonth = 0;
      this.currentYear++;
    }
    this.render();
  }
}

document.addEventListener('DOMContentLoaded', () => {
  if (document.querySelector('.mrc-calendar-widget')) {
    window.widgetCalendarManager = new WidgetCalendarManager();
  }
});

// --- Notes Widget Tab Switching ---
document.addEventListener('DOMContentLoaded', () => {
  const notesTabs = document.querySelectorAll('.mrc-notes-tab');
  const globalTextarea = document.querySelector('.mrc-notes-global');
  const userTextarea = document.querySelector('.mrc-notes-user');
  if (notesTabs.length && globalTextarea && userTextarea) {
    notesTabs.forEach(tab => {
      tab.addEventListener('click', () => {
        notesTabs.forEach(t => t.classList.remove('active'));
        tab.classList.add('active');
        if (tab.dataset.tab === 'global') {
          globalTextarea.style.display = '';
          userTextarea.style.display = 'none';
        } else {
          globalTextarea.style.display = 'none';
          userTextarea.style.display = '';
        }
      });
    });
  }
});

// --- Estimate Notes Widget Tab Switching ---
document.addEventListener('DOMContentLoaded', () => {
  const notesWidget = document.getElementById('estimate-notes-widget');
  if (notesWidget) {
    const notesTabs = notesWidget.querySelectorAll('.estimate-notes-tab');
    const globalTextarea = notesWidget.querySelector('.estimate-notes-global');
    const userTextarea = notesWidget.querySelector('.estimate-notes-user');
    if (notesTabs.length && globalTextarea && userTextarea) {
      notesTabs.forEach(tab => {
        tab.addEventListener('click', () => {
          notesTabs.forEach(t => t.classList.remove('active'));
          tab.classList.add('active');
          if (tab.dataset.tab === 'global') {
            globalTextarea.style.display = '';
            userTextarea.style.display = 'none';
          } else {
            globalTextarea.style.display = 'none';
            userTextarea.style.display = '';
          }
        });
      });
    }
  }
});

// --- Job Sheet Popup Dropdowns ---
function toggleExtrasDropdown(event) {
  event.stopPropagation();
  const menu = document.getElementById('extrasMenuJS');
  const caret = document.getElementById('extrasCaretJS');
  const convertMenu = document.getElementById('convertMenuJS');
  if (menu) {
    const isOpen = menu.style.opacity === '1' && menu.style.visibility === 'visible';
    menu.style.opacity = isOpen ? '0' : '1';
    menu.style.visibility = isOpen ? 'hidden' : 'visible';
    menu.style.transform = isOpen ? 'translateY(-8px)' : 'translateY(0)';
    if (caret) caret.style.transform = isOpen ? 'rotate(0deg)' : 'rotate(180deg)';
    // Close convert menu if open
    if (convertMenu) {
      convertMenu.style.opacity = '0';
      convertMenu.style.visibility = 'hidden';
      convertMenu.style.transform = 'translateY(-8px)';
      const convertCaret = document.getElementById('convertCaretJS');
      if (convertCaret) convertCaret.style.transform = 'rotate(0deg)';
    }
  }
}

function toggleConvertDropdown(event) {
  event.stopPropagation();
  const menu = document.getElementById('convertMenuJS');
  const caret = document.getElementById('convertCaretJS');
  const extrasMenu = document.getElementById('extrasMenuJS');
  if (menu) {
    const isOpen = menu.style.opacity === '1' && menu.style.visibility === 'visible';
    menu.style.opacity = isOpen ? '0' : '1';
    menu.style.visibility = isOpen ? 'hidden' : 'visible';
    menu.style.transform = isOpen ? 'translateY(-8px)' : 'translateY(0)';
    if (caret) caret.style.transform = isOpen ? 'rotate(0deg)' : 'rotate(180deg)';
    // Close extras menu if open
    if (extrasMenu) {
      extrasMenu.style.opacity = '0';
      extrasMenu.style.visibility = 'hidden';
      extrasMenu.style.transform = 'translateY(-8px)';
      const extrasCaret = document.getElementById('extrasCaretJS');
      if (extrasCaret) extrasCaret.style.transform = 'rotate(0deg)';
    }
  }
}

// Close dropdowns when clicking outside
window.addEventListener('click', function() {
  const extrasMenu = document.getElementById('extrasMenuJS');
  const convertMenu = document.getElementById('convertMenuJS');
  const extrasCaret = document.getElementById('extrasCaretJS');
  const convertCaret = document.getElementById('convertCaretJS');
  if (extrasMenu) {
    extrasMenu.style.opacity = '0';
    extrasMenu.style.visibility = 'hidden';
    extrasMenu.style.transform = 'translateY(-8px)';
    if (extrasCaret) extrasCaret.style.transform = 'rotate(0deg)';
  }
  if (convertMenu) {
    convertMenu.style.opacity = '0';
    convertMenu.style.visibility = 'hidden';
    convertMenu.style.transform = 'translateY(-8px)';
    if (convertCaret) convertCaret.style.transform = 'rotate(0deg)';
  }
});

// Invoice Popup Tab Switching
function setupInvoiceTabs() {
  const tabBar = document.querySelector('.invoice-tabs');
  if (!tabBar) return;
  const tabs = tabBar.querySelectorAll('.tab-btn');
  const panes = document.querySelectorAll('#tab-content-area .tab-pane');

  tabs.forEach(tab => {
    tab.addEventListener('click', function() {
      // Remove active from all tabs and reset styles
      tabs.forEach(t => {
        t.classList.remove('active');
        t.style.background = '#b91c1c';
        t.style.color = '#fff';
        t.style.borderBottom = 'none';
        t.style.boxShadow = 'none';
      });
      // Hide all panes
      panes.forEach(p => p.style.display = 'none');
      // Activate clicked tab and apply highlight styles
      this.classList.add('active');
      this.style.background = '#d32f2f';
      this.style.color = '#fff';
      this.style.borderBottom = '4px solid #fff';
      this.style.boxShadow = '0 2px 8px rgba(185,28,28,0.10)';
      // Show corresponding pane
      const tabName = this.getAttribute('data-tab');
      const pane = document.getElementById('tab-' + tabName);
      if (pane) pane.style.display = (tabName === 'history') ? 'block' : 'flex';
    });
  });

  // On load, ensure the first tab is styled as active
  const firstActive = tabBar.querySelector('.tab-btn.active');
  if (firstActive) {
    firstActive.style.background = '#d32f2f';
    firstActive.style.color = '#fff';
    firstActive.style.borderBottom = '4px solid #fff';
    firstActive.style.boxShadow = '0 2px 8px rgba(185,28,28,0.10)';
  }
}

if (document.readyState !== 'loading') setupInvoiceTabs();
else document.addEventListener('DOMContentLoaded', setupInvoiceTabs);

// Invoice Popup History Sub-Tab Switching
function setupInvoiceHistorySubTabs() {
  const subTabBar = document.getElementById('inv-history-subtabs-bar');
  if (!subTabBar) return;
  const subTabs = subTabBar.querySelectorAll('.inv-history-subtab');
  const content = document.getElementById('inv-history-subtab-content');
  if (!content) return;
  const tables = [
    document.getElementById('inv-prev-docs-table'),
    document.getElementById('inv-advisors-table-header'),
    document.getElementById('inv-labour-table-header'),
    document.getElementById('inv-parts-table-header'),
    document.getElementById('inv-appt-table-header')
  ];

  subTabs.forEach((tab, idx) => {
    tab.addEventListener('click', function() {
      // Remove active from all sub-tabs and reset styles
      subTabs.forEach(t => {
        t.classList.remove('active');
        t.style.background = 'none';
        t.style.color = '#b91c1c';
        t.style.borderBottom = 'none';
        t.style.boxShadow = 'none';
        t.style.fontWeight = '600';
      });
      // Hide all tables
      tables.forEach(tbl => { if (tbl) tbl.style.display = 'none'; });
      // Activate clicked sub-tab and apply highlight styles
      this.classList.add('active');
      this.style.background = '#fff';
      this.style.color = '#b91c1c';
      this.style.borderBottom = '4px solid #fff';
      this.style.boxShadow = '0 4px 16px rgba(185,28,28,0.10)';
      this.style.fontWeight = '700';
      // Show corresponding table
      if (tables[idx]) tables[idx].style.display = 'table';
    });
  });

  // On load, ensure the first sub-tab is styled as active and its table is visible
  const firstActive = subTabBar.querySelector('.inv-history-subtab.active');
  if (firstActive) {
    firstActive.style.background = '#fff';
    firstActive.style.color = '#b91c1c';
    firstActive.style.borderBottom = '4px solid #fff';
    firstActive.style.boxShadow = '0 4px 16px rgba(185,28,28,0.10)';
    firstActive.style.fontWeight = '700';
    if (tables[0]) tables[0].style.display = 'table';
  }
}

if (document.readyState !== 'loading') setupInvoiceHistorySubTabs();
else document.addEventListener('DOMContentLoaded', setupInvoiceHistorySubTabs);
// If you open the popup dynamically, call setupInvoiceHistorySubTabs() after showing it.

// --- Invoice Popup Labour Tab Logic ---
const invVatOptionsLabour = [
  { code: 'T0', label: 'VAT FREE 0%', rate: 0 },
  { code: 'T1', label: 'EXC VAT 20%', rate: 0.2 },
  { code: 'T2', label: 'CUSTOM 30%', rate: 0.3 }
];

const invTechnicians = [
  { abbr: 'TT', name: 'Test Tech' },
  { abbr: 'JT', name: 'John Tech' },
  { abbr: 'MT', name: 'Mike Tech' }
];

let invLabourRows = [
  { description: 'Description - 1', tech: 'TT', qty: 5, unitPrice: 50.00, discount: 0, vat: 'T1' },
  { description: 'Description - 2', tech: 'TT', qty: '', unitPrice: '', discount: '', vat: 'T1' }
];

function invCalcSubTotal(row) {
  let qty = parseFloat(row.qty) || 0;
  let price = parseFloat(row.unitPrice) || 0;
  let disc = parseFloat(row.discount) || 0;
  let vat = invVatOptionsLabour.find(v => v.code === row.vat)?.rate || 0;
  let subtotal = qty * price * (1 - disc/100) * (1 + vat);
  return subtotal ? subtotal.toFixed(2) : '0.00';
}

function invRenderLabourRows() {
  const tbody = document.getElementById('inv-labourTableBody');
  tbody.innerHTML = '';
  invLabourRows.forEach((row, idx) => {
    const tr = document.createElement('tr');
    tr.style.background = idx % 2 === 0 ? '#fff' : '#f9f9f9';
    // Checkbox
    const tdCheck = document.createElement('td');
    const cb = document.createElement('input');
    cb.type = 'checkbox';
    cb.style.accentColor = '#b91c1c';
    cb.onchange = invUpdateLabourActionBar;
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
      if (idx === 0 && invLabourRows.length > 1) {
        const temp = invLabourRows[idx+1];
        invLabourRows[idx+1] = invLabourRows[idx];
        invLabourRows[idx] = temp;
      } else if (idx > 0) {
        const temp = invLabourRows[idx-1];
        invLabourRows[idx-1] = invLabourRows[idx];
        invLabourRows[idx] = temp;
      }
      invRenderLabourRows();
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
    // Tech
    const tdTech = document.createElement('td');
    const selTech = document.createElement('select');
    selTech.style.width = '100%';
    selTech.style.border = 'none';
    selTech.style.background = 'transparent';
    selTech.style.color = '#232323';
    selTech.style.fontSize = '1em';
    selTech.style.textAlign = 'center';
    invTechnicians.forEach(tech => {
      const option = document.createElement('option');
      option.value = tech.abbr;
      option.textContent = tech.abbr;
      if (tech.abbr === row.tech) option.selected = true;
      selTech.appendChild(option);
    });
    selTech.onchange = function() { row.tech = this.value; };
    tdTech.appendChild(selTech);
    tr.appendChild(tdTech);
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
    inpQty.oninput = function() { row.qty = this.value; invRenderLabourRows(); };
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
    inpPrice.oninput = function() { row.unitPrice = this.value; invRenderLabourRows(); };
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
    inpDisc.oninput = function() { row.discount = this.value; invRenderLabourRows(); };
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
    invVatOptionsLabour.forEach(vat => {
      const option = document.createElement('option');
      option.value = vat.code;
      option.textContent = vat.code;
      if (vat.code === row.vat) option.selected = true;
      selVat.appendChild(option);
    });
    selVat.onchange = function() { row.vat = this.value; invRenderLabourRows(); };
    tdVat.appendChild(selVat);
    tr.appendChild(tdVat);
    // SubTotal
    const tdSub = document.createElement('td');
    tdSub.style.textAlign = 'right';
    tdSub.style.paddingRight = '10px';
    tdSub.textContent = invCalcSubTotal(row);
    tr.appendChild(tdSub);
    tbody.appendChild(tr);
  });
  // Update global discount
  let total = invLabourRows.reduce((sum, row) => sum + parseFloat(invCalcSubTotal(row)), 0);
  document.getElementById('inv-globalDiscountTotal').textContent = total.toFixed(2);
  // Always update action bar after rendering
  invUpdateLabourActionBar();
}

document.getElementById('inv-jobLookupRow').onclick = function() {
  invLabourRows.push({ description: '', tech: invTechnicians[0].abbr, qty: 1, unitPrice: 50.00, discount: 0, vat: 'T1' });
  invRenderLabourRows();
};

// Initialize Labour Tab
if (document.getElementById('inv-labourTableBody')) invRenderLabourRows();

// Add logic for select all and move descend
setTimeout(function() {
  const selectAll = document.getElementById('inv-selectAllLabourRows');
  if (selectAll) {
    selectAll.onclick = function() {
      const tbody = document.getElementById('inv-labourTableBody');
      const checkboxes = tbody.querySelectorAll('input[type=checkbox]');
      checkboxes.forEach(cb => { cb.checked = selectAll.checked; });
    };
  }
  const moveDescendBtn = document.getElementById('inv-moveDescendBtn');
  if (moveDescendBtn) {
    moveDescendBtn.onclick = function() {
      if (invLabourRows.length > 1) {
        const last = invLabourRows.pop();
        invLabourRows.unshift(last);
        invRenderLabourRows();
      }
    };
  }
}, 10);

// Update Labour Action Bar
function invUpdateLabourActionBar() {
  const tbody = document.getElementById('inv-labourTableBody');
  const checkboxes = tbody.querySelectorAll('input[type=checkbox]');
  const anyChecked = Array.from(checkboxes).some(cb => cb.checked);
  const bar = document.getElementById('inv-labourActionBar');
  if (bar) bar.style.display = anyChecked ? '' : 'none';
  // Update select-all checkbox state
  const selectAll = document.getElementById('inv-selectAllLabourRows');
  if (selectAll) {
    const allChecked = checkboxes.length > 0 && Array.from(checkboxes).every(cb => cb.checked);
    selectAll.checked = allChecked;
    selectAll.indeterminate = !allChecked && anyChecked;
  }
}
// Patch all checkboxes to update the bar on change
setTimeout(function() {
  const tbody = document.getElementById('inv-labourTableBody');
  const checkboxes = tbody.querySelectorAll('input[type=checkbox]');
  checkboxes.forEach(cb => {
    cb.onchange = invUpdateLabourActionBar;
  });
  invUpdateLabourActionBar();
}, 20);
// Add logic for action bar buttons
setTimeout(function() {
  const delBtn = document.getElementById('inv-deleteMarkedLabourBtn');
  if (delBtn) {
    delBtn.onclick = function() {
      invLabourRows = invLabourRows.filter((row, idx) => {
        const tr = document.getElementById('inv-labourTableBody').children[idx];
        return !tr.querySelector('input[type=checkbox]').checked;
      });
      invRenderLabourRows();
    };
  }
  const moveBtn = document.getElementById('inv-moveMarkedLabourBtn');
  if (moveBtn) {
    moveBtn.onclick = function() {
      // Placeholder: implement move to estimate logic if needed
      alert('Move ALL Marked to Estimate (not implemented)');
    };
  }
}, 30);
