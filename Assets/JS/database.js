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

// Initialize database functionality when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
  // Check if we're on a page with database functionality
  if (document.querySelector('.database-container')) {
    window.databaseManager = new DatabaseManager();
    console.log('Database functionality initialized');
  }
}); 