<?php
require_once 'config.php';
renderHeader();
?>
  <?php include 'partials/sidebar.php'; ?>
  <div class="main-content">
    <?php include 'partials/header.php'; ?>
    
    <!-- Remove the stats grid section here -->

    <!-- Modern Unpaid Invoices Section -->
    <div class="content-section mrc-invoices-section">
      <div class="mrc-section-header" style="background: var(--accent-solid); color: var(--white); border-radius: var(--radius-2xl) var(--radius-2xl) 0 0; padding: 1.2rem 2rem 1.2rem 2rem; margin-bottom: 0; display: flex; align-items: center; justify-content: space-between;">
        <div>
          <span class="section-title" style="color: var(--white); font-size: 1.25rem; font-weight: 700;">Unpaid Standard Invoices / Credits</span>
          <span style="color: #ffeaea; font-size: 1rem; font-weight: 400; margin-left: 12px;">(account documents not included) (Showing 5 Records)</span>
        </div>
        <div style="display: flex; align-items: center; gap: 1rem; position: relative;">
          <span style="background: var(--white); color: var(--accent-solid); border-radius: 8px; padding: 0.3rem 1rem; font-size: 1rem; font-weight: 600;">Max Results</span>
          <div id="max-results-dropdown" style="position: relative;">
            <button id="maxResultsBtn" class="mrc-btn mrc-btn-small" style="background: var(--white); color: var(--accent-solid); border-radius: 8px; padding: 0.3rem 1rem; font-size: 1rem; font-weight: 600; min-width: 70px;" onclick="toggleMaxResultsDropdown(event)">500 <i class="fas fa-caret-down" style="margin-left: 6px;"></i></button>
            <div id="maxResultsMenu" style="display: none; position: absolute; top: 110%; left: 0; background: #fff; border: 1.5px solid var(--accent-light); border-radius: 8px; box-shadow: 0 4px 18px rgba(185,28,28,0.07); z-index: 100; min-width: 100px;">
              <div class="max-results-option" onclick="selectMaxResults('50')" style="padding: 0.6rem 1.2rem; cursor: pointer; color: var(--accent-solid);">50</div>
              <div class="max-results-option" onclick="selectMaxResults('100')" style="padding: 0.6rem 1.2rem; cursor: pointer; color: var(--accent-solid);">100</div>
              <div class="max-results-option" onclick="selectMaxResults('250')" style="padding: 0.6rem 1.2rem; cursor: pointer; color: var(--accent-solid);">250</div>
              <div class="max-results-option" onclick="selectMaxResults('500')" style="padding: 0.6rem 1.2rem; cursor: pointer; color: var(--accent-solid);">500</div>
              <div class="max-results-option" onclick="selectMaxResults('1,000')" style="padding: 0.6rem 1.2rem; cursor: pointer; color: var(--accent-solid);">1,000</div>
              <div class="max-results-option" onclick="selectMaxResults('5,000')" style="padding: 0.6rem 1.2rem; cursor: pointer; color: var(--accent-solid);">5,000</div>
              <div class="max-results-option" onclick="selectMaxResults('All')" style="padding: 0.6rem 1.2rem; cursor: pointer; color: var(--accent-solid);">All</div>
            </div>
          </div>
          <button class="mrc-btn mrc-btn-small" style="background: #fff0f0; color: var(--accent-solid); border-radius: 50%; width: 36px; height: 36px; font-size: 1.2rem; display: flex; align-items: center; justify-content: center;" title="Close"><i class="fas fa-times"></i></button>
        </div>
      </div>
      <div class="mrc-invoices-toolbar" style="background: var(--white); border-radius: 0 0 var(--radius-2xl) var(--radius-2xl); box-shadow: var(--shadow-md); padding: 0.7rem 2rem; display: flex; flex-wrap: wrap; gap: 1rem; align-items: center; margin-bottom: 0.5rem; border-bottom: 1.5px solid var(--accent-light);">
        <button class="mrc-btn mrc-btn-small" style="background: var(--accent-light); color: var(--accent-solid);" onclick="openAccountManagerModal()"><i class="fas fa-user-tie"></i> Account Manager</button>
        <button class="mrc-btn mrc-btn-small" style="background: var(--accent-light); color: var(--accent-solid);" onclick="window.location.href='archives.php'"><i class="fas fa-archive"></i> Archives</button>
        <button class="mrc-btn mrc-btn-small" style="background: var(--accent-light); color: var(--accent-solid);"><i class="fas fa-print"></i> Print</button>
        <input type="date" class="mrc-filter-select" style="min-width: 140px;" placeholder="Issue Date">
        <input type="text" class="mrc-filter-input" placeholder="Search unpaid invoices..." style="flex: 1 1 220px; min-width: 180px;">
      </div>
      <div class="mrc-invoices-table-wrapper" style="background: var(--white); border-radius: var(--radius-2xl); box-shadow: var(--shadow-md); padding: 1.5rem 2rem; margin-top: 1rem;">
        <table class="mrc-table" style="width: 100%; border-collapse: separate; border-spacing: 0;">
          <thead>
            <tr>
              <th>T</th>
              <th>Doc No</th>
              <th>Issue Date</th>
              <th>Registration</th>
              <th>Make & Model</th>
              <th>Customer</th>
              <th>Total</th>
              <th>Receipts</th>
              <th>Balance</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><span class="doc-type-badge doc-type-inv">INV</span></td>
              <td>2001</td>
              <td>2024-06-01</td>
              <td>T789GHI</td>
              <td>Toyota Corolla</td>
              <td>John Doe</td>
              <td>TZS 150,000</td>
              <td>TZS 0</td>
              <td>TZS 150,000</td>
            </tr>
            <tr>
              <td><span class="doc-type-badge doc-type-inv">INV</span></td>
              <td>2000</td>
              <td>2024-06-03</td>
              <td>T456DEF</td>
              <td>Honda CR-V</td>
              <td>Sarah Johnson</td>
              <td>TZS 75,000</td>
              <td>TZS 25,000</td>
              <td>TZS 50,000</td>
            </tr>
            <tr>
              <td><span class="doc-type-badge doc-type-inv">INV</span></td>
              <td>1999</td>
              <td>2024-05-28</td>
              <td>T123ABC</td>
              <td>Ford Ranger</td>
              <td>Mike Wilson</td>
              <td>TZS 200,000</td>
              <td>TZS 200,000</td>
              <td>TZS 0</td>
            </tr>
            <tr>
              <td><span class="doc-type-badge doc-type-inv">INV</span></td>
              <td>1998</td>
              <td>2024-06-05</td>
              <td>T321XYZ</td>
              <td>Nissan X-Trail</td>
              <td>Peter Paul</td>
              <td>TZS 120,000</td>
              <td>TZS 0</td>
              <td>TZS 120,000</td>
            </tr>
            <tr>
              <td><span class="doc-type-badge doc-type-inv">INV</span></td>
              <td>1997</td>
              <td>2024-05-30</td>
              <td>T654JKL</td>
              <td>Subaru Forester</td>
              <td>Fatma Ally</td>
              <td>TZS 110,000</td>
              <td>TZS 60,000</td>
              <td>TZS 50,000</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Payment Collection Summary -->
    <!-- Remove the Collection Summary section below -->
  </div>

<script>
function toggleMaxResultsDropdown(e) {
  e.stopPropagation();
  var menu = document.getElementById('maxResultsMenu');
  menu.style.display = (menu.style.display === 'block') ? 'none' : 'block';
  document.addEventListener('click', closeMaxResultsDropdown);
}
function closeMaxResultsDropdown(e) {
  var menu = document.getElementById('maxResultsMenu');
  if (menu) menu.style.display = 'none';
  document.removeEventListener('click', closeMaxResultsDropdown);
}
function selectMaxResults(val) {
  document.getElementById('maxResultsBtn').innerHTML = val + ' <i class="fas fa-caret-down" style="margin-left: 6px;"></i>';
  document.getElementById('maxResultsMenu').style.display = 'none';
}
</script> 
<?php include 'Popups/admin/new-acc-manager.php'; ?>
<script>
function openAccountManagerModal() {
  document.getElementById('accountManagerModal').classList.add('show');
}
function closeAccountManagerModal() {
  document.getElementById('accountManagerModal').classList.remove('show');
}
</script>

<?php renderFooter(); ?>

