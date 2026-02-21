/* ========================================
   CORE FUNCTIONALITY - CSS LOADING & VALIDATION
   ======================================== */

class CSSLoader {
  constructor() {
    this.cssFiles = [
      'Assets/CSS/base.css',
      'Assets/CSS/layout.css',
      'Assets/CSS/components.css',
      'Assets/CSS/styles.css'
    ];
    this.loadedFiles = [];
    this.failedFiles = [];
    this.init();
  }

  init() {
    this.checkCSSFiles();
    this.setupFallbacks();
  }

  checkCSSFiles() {
    this.cssFiles.forEach(file => {
      const link = document.querySelector(`link[href*="${file}"]`);
      if (link && link.sheet && link.sheet.cssRules.length > 0) {
        this.loadedFiles.push(file);
      } else {
        this.failedFiles.push(file);
      }
    });
  }

  setupFallbacks() {
    if (this.failedFiles.length > 0) {
      console.warn('CSS files failed to load:', this.failedFiles);
      
      // Add inline critical styles if needed
      if (this.failedFiles.includes('Assets/CSS/base.css')) {
        this.injectCriticalStyles();
      }
    }
  }

  injectCriticalStyles() {
    const criticalCSS = `
      <style>
        /* Critical fallback styles */
        :root {
          --accent-solid: #ec2025;
          --accent-light: rgba(236, 32, 37, 0.1);
          --white: #ffffff;
          --dark: #222222;
          --gray-100: #f3f4f6;
          --gray-200: #e5e7eb;
          --gray-500: #6b7280;
        }
        
        body {
          font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
          background: #f9fafb;
          margin: 0;
          padding: 0;
          color: #222222;
        }
        
        .main-content {
          margin-left: 260px;
          padding: 2rem;
        }
        
        .btn-primary {
          background: #ec2025;
          color: #ffffff;
          border: none;
          border-radius: 8px;
          padding: 12px 24px;
          font-size: 1rem;
          font-weight: 600;
          cursor: pointer;
        }
        
        .customer-table-wrapper {
          background: #fff;
          border-radius: 12px;
          box-shadow: 0 4px 12px rgba(0,0,0,0.1);
          overflow-x: auto;
        }
        
        .customer-modern-table {
          width: 100%;
          border-collapse: collapse;
        }
        
        .customer-modern-table th {
          background: #f3f4f6;
          color: #ec2025;
          font-weight: 700;
          padding: 12px;
          text-align: left;
        }
        
        .customer-modern-table td {
          padding: 12px;
          border-bottom: 1px solid #e5e7eb;
        }
        
        @media (max-width: 768px) {
          .main-content {
            margin-left: 0;
            padding: 1rem;
          }
        }
      </style>
    `;
    
    document.head.insertAdjacentHTML('beforeend', criticalCSS);
  }
}

// Initialize CSS loader when DOM is ready
document.addEventListener('DOMContentLoaded', function() {
  new CSSLoader();
});

// Export for global access
window.CSSLoader = CSSLoader;

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

// Initialize core functionality when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
  // Initialize managers
  window.themeManager = new ThemeManager();
  window.menuManager = new MenuManager();
  window.dropdownManager = new DropdownManager();
  
  // Make utils globally available
  window.Utils = Utils;
  
  console.log('Core functionality initialized');
}); 