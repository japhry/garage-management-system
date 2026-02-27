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
          <h2 class="section-title" style="margin-bottom: 0;">Vehicle Database: <span style="font-weight: 400; color: var(--gray-500); font-size: 1.1rem;">All <span style="font-size: 0.95rem;">(Showing 4 Records)</span></span></h2>
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
          <input type="text" placeholder="Vehicle Search" style="border-radius: 999px; border: 1.5px solid var(--accent-light); padding: 8px 40px 8px 16px; font-size: 1rem; width: 100%; box-shadow: 0 1px 4px rgba(236,32,37,0.04);">
          <button type="button" class="search-icon-btn" style="position: absolute; right: 6px; top: 50%; transform: translateY(-50%); background: none; border: none; padding: 0; cursor: pointer; color: var(--accent-solid); font-size: 1.18rem; display: flex; align-items: center; justify-content: center;"><i class="fas fa-search"></i></button>
        </div>
        <button class="btn-primary fancy-btn" style="padding: 8px 22px; font-size: 1.05rem; border-radius: 999px; box-shadow: 0 2px 8px rgba(236,32,37,0.10); display: flex; align-items: center; gap: 10px; background: var(--accent-solid); color: #fff; font-weight: 700;" onclick="openAddVehicleModal()"><i class="fas fa-car"></i> New Vehicle</button>
        <button class="btn-secondary fancy-btn" style="padding: 8px 20px; font-size: 1.05rem; border-radius: 999px; box-shadow: 0 2px 8px rgba(236,32,37,0.07); display: flex; align-items: center; gap: 10px; background: #fff; color: var(--accent-solid); font-weight: 700; border: 1.5px solid var(--accent-light);" onclick="openAdvSearchCustomerModal()"><i class="fas fa-search-plus"></i> Adv. Search</button>
        <button class="btn-secondary fancy-btn" style="padding: 8px 20px; font-size: 1.05rem; border-radius: 999px; box-shadow: 0 2px 8px rgba(236,32,37,0.07); display: flex; align-items: center; gap: 10px; background: #fff; color: var(--accent-solid); font-weight: 700; border: 1.5px solid var(--accent-light);"><i class="fas fa-print"></i> Print</button>
      </div>
      <div class="vehicle-az-filter" style="display: flex; gap: 2px; margin-bottom: 0.5rem;">
        <button class="az-btn">A</button><button class="az-btn">B</button><button class="az-btn">C</button><button class="az-btn">D</button><button class="az-btn">E</button><button class="az-btn">F</button><button class="az-btn">G</button><button class="az-btn">H</button><button class="az-btn">I</button><button class="az-btn">J</button><button class="az-btn">K</button><button class="az-btn">L</button><button class="az-btn">M</button><button class="az-btn">N</button><button class="az-btn">O</button><button class="az-btn">P</button><button class="az-btn">Q</button><button class="az-btn">R</button><button class="az-btn">S</button><button class="az-btn">T</button><button class="az-btn">U</button><button class="az-btn">V</button><button class="az-btn">W</button><button class="az-btn">X</button><button class="az-btn">Y</button><button class="az-btn">Z</button>
      </div>
      <div class="vehicle-table-wrapper" style="background: #fff; border-radius: 10px; box-shadow: 0 2px 12px rgba(236,32,37,0.07); border: 1px solid var(--accent-light); overflow-x: auto;">
        <table class="vehicle-modern-table" style="width: 100%; border-collapse: separate; border-spacing: 0;">
          <thead style="background: var(--accent-light);">
            <tr>
              <th style="padding: 10px 12px; font-weight: 700; color: var(--accent-solid);">Registration</th>
              <th style="padding: 10px 12px; font-weight: 700; color: var(--accent-solid);">Make / Model</th>
              <th style="padding: 10px 12px; font-weight: 700; color: var(--accent-solid);">Customer</th>
              <th style="padding: 10px 12px; font-weight: 700; color: var(--accent-solid);">Next Reminder</th>
              <th style="padding: 10px 12px; font-weight: 700; color: var(--accent-solid);">Tot Docs</th>
              <th style="padding: 10px 12px; font-weight: 700; color: var(--accent-solid);">Last Inv</th>
          </tr>
        </thead>
        <tbody>
          <tr>
              <td style="padding: 16px 18px;"><span class="reg-badge">T789GHI</span></td>
              <td style="padding: 16px 18px;">Toyota Corolla</td>
              <td style="padding: 16px 18px;">John Doe</td>
              <td style="padding: 16px 18px;">Apr 15, 2024</td>
              <td style="padding: 16px 18px;">5</td>
              <td style="padding: 16px 18px;">Jan 15, 2024</td>
          </tr>
          <tr>
              <td style="padding: 16px 18px;"><span class="reg-badge">T456DEF</span></td>
              <td style="padding: 16px 18px;">Honda CR-V</td>
              <td style="padding: 16px 18px;">Sarah Johnson</td>
              <td style="padding: 16px 18px;">Apr 10, 2024</td>
              <td style="padding: 16px 18px;">3</td>
              <td style="padding: 16px 18px;">Jan 10, 2024</td>
          </tr>
          <tr>
              <td style="padding: 16px 18px;"><span class="reg-badge">T123ABC</span></td>
              <td style="padding: 16px 18px;">Nissan X-Trail</td>
              <td style="padding: 16px 18px;">Mike Wilson</td>
              <td style="padding: 16px 18px;">Apr 5, 2024</td>
              <td style="padding: 16px 18px;">7</td>
              <td style="padding: 16px 18px;">Jan 5, 2024</td>
          </tr>
          <tr>
              <td style="padding: 16px 18px;"><span class="reg-badge">123</span></td>
              <td style="padding: 16px 18px;">Ford Focus</td>
              <td style="padding: 16px 18px;">Emma Davis</td>
              <td style="padding: 16px 18px;">Mar 20, 2024</td>
              <td style="padding: 16px 18px;">2</td>
              <td style="padding: 16px 18px;">Dec 20, 2023</td>
          </tr>
        </tbody>
      </table>
      </div>
    </div>

    <!-- Empty space for footer positioning -->
    <div style="height: 100px;"></div>
  </div>

  <!-- Include Vehicle Popups -->
  <?php include 'Popups/vehicles/add-vehicle.php'; ?>
  <?php include 'Popups/customers/adv-search-customer.php'; ?>

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
</style>

<?php renderFooter(); ?>

