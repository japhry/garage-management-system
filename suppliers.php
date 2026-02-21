<?php
require_once 'config.php';
renderHeader();
?>
  <?php include 'partials/sidebar.php'; ?>
  <div class="main-content">
    <?php include 'partials/header.php'; ?>
    



    <div class="content-section">
      <div class="section-header" style="display: flex; align-items: center; justify-content: space-between; gap: 1.5rem;">
        <div style="display: flex; align-items: center; gap: 1.2rem;">
          <h2 class="section-title" style="margin-bottom: 0;">Supplier Database: <span style="font-weight: 400; color: var(--gray-500); font-size: 1.1rem;">All <span style="font-size: 0.95rem;">(Showing 4 Records)</span></span></h2>
        </div>
        <div style="display: flex; align-items: center; gap: 0.5rem; position: relative;">
          <button class="btn-secondary max-results-label" style="background: var(--accent-solid); color: #fff; font-weight: 600; border-radius: 999px 0 0 999px; box-shadow: 0 2px 8px rgba(236,32,37,0.08); padding: 8px 18px 8px 16px; border-right: none;">Max Results</button>
          <div class="max-results-dropdown" style="position: relative;">
            <button class="btn-secondary max-results-btn" id="maxResultsBtn" style="background: #fff; color: var(--accent-solid); font-weight: 700; min-width: 80px; border-radius: 0 999px 999px 0; border-left: 1.5px solid var(--accent-light); box-shadow: 0 2px 8px rgba(236,32,37,0.08); padding: 8px 24px 8px 18px; display: flex; align-items: center; gap: 8px; font-size: 1.08rem;">500 <i class="fas fa-caret-down" style="margin-left: 2px;"></i></button>
            <div class="max-results-menu" id="maxResultsMenu" style="display: none; position: absolute; top: 110%; left: 0; background: #fff; border: 1.5px solid var(--accent-light); border-radius: 12px; box-shadow: 0 8px 24px rgba(236,32,37,0.13); z-index: 10; min-width: 120px; overflow: hidden;">
              <button class="max-results-option" data-value="50" style="padding: 10px 18px; background: none; border: none; width: 100%; text-align: left; color: var(--accent-solid); font-weight: 600; font-size: 1.05rem; transition: background 0.18s, color 0.18s;">50</button>
              <button class="max-results-option" data-value="100" style="padding: 10px 18px; background: none; border: none; width: 100%; text-align: left; color: var(--accent-solid); font-weight: 600; font-size: 1.05rem; transition: background 0.18s, color 0.18s;">100</button>
              <button class="max-results-option" data-value="250" style="padding: 10px 18px; background: none; border: none; width: 100%; text-align: left; color: var(--accent-solid); font-weight: 600; font-size: 1.05rem; transition: background 0.18s, color 0.18s;">250</button>
              <button class="max-results-option" data-value="500" style="padding: 10px 18px; background: none; border: none; width: 100%; text-align: left; color: var(--accent-solid); font-weight: 600; font-size: 1.05rem; transition: background 0.18s, color 0.18s;">500</button>
              <button class="max-results-option" data-value="1000" style="padding: 10px 18px; background: none; border: none; width: 100%; text-align: left; color: var(--accent-solid); font-weight: 600; font-size: 1.05rem; transition: background 0.18s, color 0.18s;">1,000</button>
              <button class="max-results-option" data-value="5000" style="padding: 10px 18px; background: none; border: none; width: 100%; text-align: left; color: var(--accent-solid); font-weight: 600; font-size: 1.05rem; transition: background 0.18s, color 0.18s;">5,000</button>
              <button class="max-results-option" data-value="all" style="padding: 10px 18px; background: none; border: none; width: 100%; text-align: left; color: var(--accent-solid); font-weight: 600; font-size: 1.05rem; transition: background 0.18s, color 0.18s;">All</button>
            </div>
          </div>
          <button class="btn-secondary" style="background: var(--accent-light); color: var(--accent-solid);"><i class="fas fa-sync-alt"></i></button>
        </div>
      </div>
      <div class="vehicle-toolbar" style="display: flex; align-items: center; gap: 1rem; margin-bottom: 0.5rem; margin-top: 1.2rem;">
        <div class="search-input-wrapper" style="position: relative; display: flex; align-items: center; width: 220px;">
          <input type="text" placeholder="Supplier Search" style="border-radius: 999px; border: 1.5px solid var(--accent-light); padding: 8px 40px 8px 16px; font-size: 1rem; width: 100%; box-shadow: 0 1px 4px rgba(236,32,37,0.04);">
          <button type="button" class="search-icon-btn" style="position: absolute; right: 6px; top: 50%; transform: translateY(-50%); background: none; border: none; padding: 0; cursor: pointer; color: var(--accent-solid); font-size: 1.18rem; display: flex; align-items: center; justify-content: center;"><i class="fas fa-search"></i></button>
        </div>
        <button class="btn-primary fancy-btn" style="padding: 8px 22px; font-size: 1.05rem; border-radius: 999px; box-shadow: 0 2px 8px rgba(236,32,37,0.10); display: flex; align-items: center; gap: 10px; background: var(--accent-solid); color: #fff; font-weight: 700;" onclick="openAddSupplierModal()"><i class="fas fa-plus"></i> New Supplier</button>
        <button class="btn-secondary fancy-btn" style="padding: 8px 20px; font-size: 1.05rem; border-radius: 999px; box-shadow: 0 2px 8px rgba(236,32,37,0.07); display: flex; align-items: center; gap: 10px; background: #fff; color: var(--accent-solid); font-weight: 700; border: 1.5px solid var(--accent-light);" onclick="window.location.href='stock.php';"><i class="fas fa-tasks"></i> Manage Orders</button>
        <button class="btn-secondary fancy-btn" style="padding: 8px 20px; font-size: 1.05rem; border-radius: 999px; box-shadow: 0 2px 8px rgba(236,32,37,0.07); display: flex; align-items: center; gap: 10px; background: #fff; color: var(--accent-solid); font-weight: 700; border: 1.5px solid var(--accent-light);"><i class="fas fa-print"></i> Print</button>
      </div>
      <div class="vehicle-az-filter" style="display: flex; gap: 2px; margin-bottom: 0.5rem;">
        <button class="az-btn">A</button><button class="az-btn">B</button><button class="az-btn">C</button><button class="az-btn">D</button><button class="az-btn">E</button><button class="az-btn">F</button><button class="az-btn">G</button><button class="az-btn">H</button><button class="az-btn">I</button><button class="az-btn">J</button><button class="az-btn">K</button><button class="az-btn">L</button><button class="az-btn">M</button><button class="az-btn">N</button><button class="az-btn">O</button><button class="az-btn">P</button><button class="az-btn">Q</button><button class="az-btn">R</button><button class="az-btn">S</button><button class="az-btn">T</button><button class="az-btn">U</button><button class="az-btn">V</button><button class="az-btn">W</button><button class="az-btn">X</button><button class="az-btn">Y</button><button class="az-btn">Z</button>
      </div>
      <div class="vehicle-table-wrapper" style="background: #fff; border-radius: 10px; box-shadow: 0 2px 12px rgba(236,32,37,0.07); border: 1px solid var(--accent-light); overflow-x: auto;">
        <table class="vehicle-modern-table" style="width: 100%; border-collapse: separate; border-spacing: 0;">
          <thead style="background: var(--accent-light);">
            <tr>
              <th style="padding: 10px 12px; font-weight: 700; color: var(--accent-solid);">Acc Number</th>
              <th style="padding: 10px 12px; font-weight: 700; color: var(--accent-solid);">Company</th>
              <th style="padding: 10px 12px; font-weight: 700; color: var(--accent-solid);">Address</th>
          </tr>
        </thead>
        <tbody>
          <tr>
              <td style="padding: 16px 18px;"><span class="reg-badge">SUP-001</span></td>
              <td style="padding: 16px 18px;">AutoZone</td>
              <td style="padding: 16px 18px;">123 Main Street, Dar es Salaam, Tanzania</td>
          </tr>
          <tr>
              <td style="padding: 16px 18px;"><span class="reg-badge">SUP-002</span></td>
              <td style="padding: 16px 18px;">CarParts Inc</td>
              <td style="padding: 16px 18px;">456 Industrial Ave, Arusha, Tanzania</td>
          </tr>
          <tr>
              <td style="padding: 16px 18px;"><span class="reg-badge">SUP-003</span></td>
              <td style="padding: 16px 18px;">MotorMax</td>
              <td style="padding: 16px 18px;">789 Business Park, Mwanza, Tanzania</td>
          </tr>
          <tr>
              <td style="padding: 16px 18px;"><span class="reg-badge">SUP-004</span></td>
              <td style="padding: 16px 18px;">PartsPro</td>
              <td style="padding: 16px 18px;">321 Commercial Rd, Dodoma, Tanzania</td>
          </tr>
        </tbody>
      </table>
      </div>
    </div>

    <!-- Empty space for footer positioning -->
    <div style="height: 100px;"></div>
  </div>

  <?php include 'Popups/suppliers/add-supplier.php'; ?>
  <script>
  // Max Results Dropdown Logic
  const maxResultsBtn = document.getElementById('maxResultsBtn');
  const maxResultsMenu = document.getElementById('maxResultsMenu');
  if (maxResultsBtn && maxResultsMenu) {
    maxResultsBtn.addEventListener('click', function(e) {
      e.stopPropagation();
      maxResultsMenu.style.display = maxResultsMenu.style.display === 'block' ? 'none' : 'block';
    });
    document.querySelectorAll('.max-results-option').forEach(btn => {
      btn.addEventListener('click', function() {
        maxResultsBtn.innerHTML = this.innerText + ' <i class="fas fa-caret-down" style="margin-left: 6px;"></i>';
        maxResultsMenu.style.display = 'none';
      });
    });
    document.addEventListener('click', function(e) {
      if (!maxResultsMenu.contains(e.target) && e.target !== maxResultsBtn) {
        maxResultsMenu.style.display = 'none';
      }
    });
  }

  // Supplier Modal Logic (match vehicle modal)
  document.addEventListener('DOMContentLoaded', function() {
    const addSupplierModal = document.getElementById('addSupplierModal');
    const closeAddSupplierModalBtn = document.getElementById('closeAddSupplierModal');
    const modalBackdrop = addSupplierModal?.querySelector('.modal-backdrop');

    window.openAddSupplierModal = function() {
      if (addSupplierModal) {
        addSupplierModal.style.display = 'flex';
      }
    }
    function closeAddSupplierModal() {
      if (addSupplierModal) addSupplierModal.style.display = 'none';
    }
    if (closeAddSupplierModalBtn) {
      closeAddSupplierModalBtn.addEventListener('click', closeAddSupplierModal);
    }
    if (modalBackdrop) {
      modalBackdrop.addEventListener('click', closeAddSupplierModal);
    }
  });
  </script>
  <style>
  .max-results-dropdown .max-results-btn:focus,
  .max-results-dropdown .max-results-btn.active {
    outline: 2px solid var(--accent-solid);
    box-shadow: 0 0 0 2px var(--accent-light);
  }
  .max-results-menu .max-results-option:hover,
  .max-results-menu .max-results-option:focus {
    background: var(--accent-light);
    color: var(--accent-solid);
  }

  .vehicle-modern-table th,
  .vehicle-modern-table td {
    text-align: left;
    vertical-align: middle;
    padding: 16px 18px;
  }

  .vehicle-modern-table th {
    background: var(--accent-light);
    color: var(--accent-solid);
    font-weight: 700;
    font-size: 1.08rem;
  }

  .vehicle-modern-table td {
    color: #222;
    font-size: 1.05rem;
    font-weight: 500;
  }

  .vehicle-modern-table tr {
    border-bottom: 1px solid #f3d6d6;
  }

  .vehicle-modern-table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
  }

  .vehicle-table-wrapper {
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 2px 12px rgba(236,32,37,0.07);
    border: 1px solid var(--accent-light);
    overflow-x: auto;
    margin-bottom: 1.5rem;
  }
  .modal-overlay {
    display: none;
    position: fixed;
    top: 0; left: 0; right: 0; bottom: 0;
    background: rgba(30, 30, 30, 0.35);
    z-index: 1000;
    align-items: center;
    justify-content: center;
  }
  .modal {
    background: #fff;
    border-radius: 14px;
    box-shadow: 0 8px 32px rgba(236,32,37,0.13);
    min-width: 700px;
    max-width: 900px;
    width: 100%;
    padding: 0;
    position: relative;
    animation: fadeIn 0.2s;
    border: 3px solid red !important; /* DEBUG: highlight modal */
    z-index: 2000 !important; /* DEBUG: ensure modal is above everything */
    min-height: 300px; /* DEBUG: make modal more visible */
  }
  .modal-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    background: var(--accent-solid);
    color: #fff;
    padding: 18px 28px 14px 28px;
    border-radius: 14px 14px 0 0;
  }
  .modal-title {
    font-size: 1.25rem;
    font-weight: 700;
  }
  .modal-close {
    background: none;
    border: none;
    color: #fff;
    font-size: 1.3rem;
    cursor: pointer;
    padding: 0 2px;
    transition: color 0.15s;
  }
  .modal-close:hover { color: #ffd6d6; }
  .modal-form { padding: 0 28px 24px 28px; }
  .modal-actions {
    display: flex;
    gap: 12px;
    margin: 18px 0 18px 0;
  }
  .btn.btn-primary {
    background: var(--accent-solid);
    color: #fff;
    border: none;
    border-radius: 999px;
    padding: 8px 28px;
    font-weight: 700;
    font-size: 1.08rem;
    cursor: pointer;
    transition: background 0.15s;
  }
  .btn.btn-primary:hover { background: #b71c1c; }
  .btn.btn-danger {
    background: #fff;
    color: var(--accent-solid);
    border: 1.5px solid var(--accent-solid);
    border-radius: 999px;
    padding: 8px 22px;
    font-weight: 700;
    font-size: 1.08rem;
    cursor: pointer;
    transition: background 0.15s, color 0.15s;
  }
  .btn.btn-danger:hover {
    background: var(--accent-solid);
    color: #fff;
  }
  .modal-content-grid {
    display: flex;
    gap: 32px;
    margin-top: 8px;
  }
  .modal-section {
    flex: 1;
    min-width: 260px;
  }
  .form-group { margin-bottom: 14px; }
  .form-group label { font-weight: 600; font-size: 1.01rem; margin-bottom: 4px; display: block; }
  .form-group .required { color: #e53935; font-size: 0.98rem; margin-left: 4px; }
  .input-rounded {
    width: 100%;
    border-radius: 8px;
    border: 1.5px solid var(--accent-light);
    padding: 8px 14px;
    font-size: 1.05rem;
    font-weight: 500;
    background: #fafbfc;
    color: #222;
    transition: border 0.15s;
    box-sizing: border-box;
  }
  .input-rounded:focus {
    border: 1.5px solid var(--accent-solid);
    outline: none;
    background: #fff;
  }
  .textarea-multiline { resize: vertical; min-height: 38px; }
  .form-group-inline { display: flex; gap: 12px; }
  .input-icon-group { display: flex; align-items: center; }
  .input-icon-btn {
    background: none;
    border: none;
    color: var(--accent-solid);
    font-size: 1.1rem;
    margin-left: -32px;
    cursor: pointer;
    padding: 0 6px;
    transition: color 0.15s;
  }
  .input-icon-btn:hover { color: #b71c1c; }
  .toggle-group {
    display: flex;
    gap: 10px;
    margin-top: 4px;
  }
  .toggle-btn {
    display: flex;
    align-items: center;
    cursor: pointer;
  }
  .toggle {
    display: inline-block;
    min-width: 32px;
    padding: 6px 14px;
    border-radius: 999px;
    font-weight: 700;
    font-size: 1.01rem;
    text-align: center;
    background: #f3d6d6;
    color: var(--accent-solid);
    margin-right: 4px;
    border: 1.5px solid #f3d6d6;
    transition: background 0.15s, color 0.15s, border 0.15s;
  }
  input[type="radio"]:checked + .toggle.toggle-yes {
    background: var(--accent-solid);
    color: #fff;
    border: 1.5px solid var(--accent-solid);
  }
  input[type="radio"]:checked + .toggle.toggle-no {
    background: #e53935;
    color: #fff;
    border: 1.5px solid #e53935;
  }
  @media (max-width: 900px) {
    .modal { min-width: 90vw; }
    .modal-content-grid { flex-direction: column; gap: 0; }
  }
  @keyframes fadeIn {
    from { opacity: 0; transform: scale(0.98); }
    to { opacity: 1; transform: scale(1); }
  }
  </style> 