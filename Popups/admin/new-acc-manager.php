<!-- Account Manager Modal -->
<div id="accountManagerModal" class="modal">
  <div class="modal-content" style="background:#fff; border-radius:18px; max-width:900px; width:96vw; margin:40px auto; box-shadow:0 4px 18px rgba(185,28,28,0.13); position:relative;">
    <div class="modal-header" style="background:var(--accent-solid); color:#fff; border-radius:18px 18px 0 0; display:flex; align-items:center; justify-content:space-between; padding:1.1rem 1.5rem;">
      <span id="accManagerHeader" style="font-size:1.18rem; font-weight:700;">Account Manager: <span id="accManagerHeaderType" style="font-weight:400;">All</span> <span id="accManagerHeaderCount" style="font-size:1rem; color:#ffeaea;">(Showing 5 Records)</span></span>
      <button onclick="closeAccountManagerModal()" style="background:#fff0f0; color:var(--accent-solid); border:none; border-radius:50%; width:36px; height:36px; font-size:1.2rem; display:flex; align-items:center; justify-content:center;"><i class="fas fa-times"></i></button>
    </div>
    <div style="padding:1.2rem 1.5rem 0.5rem 1.5rem; display:flex; align-items:center; gap:1rem; position:relative;">
      <input type="text" placeholder="Account Search" style="flex:1; border:1.5px solid var(--accent-light); border-radius:8px; padding:0.5rem 1rem; font-size:1rem;">
      <button class="mrc-btn mrc-btn-small" style="background:var(--accent-solid); color:#fff;"><i class="fas fa-search"></i></button>
      <button class="mrc-btn mrc-btn-small" style="background:#fff0f0; color:var(--accent-solid);"><i class="fas fa-times"></i></button>
      <button class="mrc-btn mrc-btn-small" style="background:var(--accent-light); color:var(--accent-solid); font-weight:600;" id="newCustomerBtn">New Customer</button>
      <button class="mrc-btn mrc-btn-small" id="outstandingBtn" style="background:var(--accent-light); color:var(--accent-solid); font-weight:600;">Outstanding</button>
      <button class="mrc-btn mrc-btn-small" id="statementsBtn" style="background:var(--accent-light); color:var(--accent-solid); font-weight:600; position:relative;">Statements (All)</button>
      <button class="mrc-btn mrc-btn-small" style="background:var(--accent-light); color:var(--accent-solid); font-weight:600;"><i class="fas fa-print"></i> Print</button>
      <!-- Statements Dropdown -->
      <div id="statementsDropdown" style="display:none; position:absolute; top:56px; right:110px; background:#fff; border:1.5px solid var(--accent-light); border-radius:14px; box-shadow:0 4px 18px rgba(185,28,28,0.13); min-width:320px; z-index:3000; padding:1.2rem 1.2rem 1rem 1.2rem;">
        <div style="font-weight:600; color:var(--gray-700); margin-bottom:0.7rem;">Month Ending:</div>
        <div style="display:flex; gap:0.7rem; margin-bottom:1rem;">
          <select id="statementsMonth" style="flex:1; border-radius:6px; border:1.5px solid var(--accent-light); padding:0.4rem 0.7rem;">
            <option value="1">01</option><option value="2">02</option><option value="3">03</option><option value="4">04</option><option value="5">05</option><option value="6">06</option><option value="7">07</option><option value="8">08</option><option value="9">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option>
          </select>
          <select id="statementsYear" style="flex:1; border-radius:6px; border:1.5px solid var(--accent-light); padding:0.4rem 0.7rem;"></select>
        </div>
        <div style="font-weight:600; color:var(--gray-700); margin-bottom:0.7rem;">Display:</div>
        <select id="statementsDisplay" style="width:100%; border-radius:6px; border:1.5px solid var(--accent-light); padding:0.4rem 0.7rem; margin-bottom:1.2rem;">
          <option>List within month only</option>
          <option>List all outstanding</option>
        </select>
        <button id="batchPrintBtn" class="mrc-btn mrc-btn-small" style="width:100%; background:var(--accent-light); color:var(--accent-solid); font-weight:600;">Batch Print</button>
      </div>
    </div>
    <div style="padding:0 1.5rem 0.5rem 1.5rem; display:flex; gap:0.3rem; flex-wrap:wrap;">
      <button class="mrc-btn mrc-btn-small" style="background:var(--accent-light); color:var(--accent-solid); min-width:32px;">A</button>
      <button class="mrc-btn mrc-btn-small" style="background:var(--accent-light); color:var(--accent-solid); min-width:32px;">B</button>
      <button class="mrc-btn mrc-btn-small" style="background:var(--accent-light); color:var(--accent-solid); min-width:32px;">C</button>
      <button class="mrc-btn mrc-btn-small" style="background:var(--accent-light); color:var(--accent-solid); min-width:32px;">D</button>
      <button class="mrc-btn mrc-btn-small" style="background:var(--accent-light); color:var(--accent-solid); min-width:32px;">E</button>
      <button class="mrc-btn mrc-btn-small" style="background:var(--accent-light); color:var(--accent-solid); min-width:32px;">F</button>
      <button class="mrc-btn mrc-btn-small" style="background:var(--accent-light); color:var(--accent-solid); min-width:32px;">G</button>
      <button class="mrc-btn mrc-btn-small" style="background:var(--accent-light); color:var(--accent-solid); min-width:32px;">H</button>
      <button class="mrc-btn mrc-btn-small" style="background:var(--accent-light); color:var(--accent-solid); min-width:32px;">I</button>
      <button class="mrc-btn mrc-btn-small" style="background:var(--accent-light); color:var(--accent-solid); min-width:32px;">J</button>
      <button class="mrc-btn mrc-btn-small" style="background:var(--accent-light); color:var(--accent-solid); min-width:32px;">K</button>
      <button class="mrc-btn mrc-btn-small" style="background:var(--accent-light); color:var(--accent-solid); min-width:32px;">L</button>
      <button class="mrc-btn mrc-btn-small" style="background:var(--accent-light); color:var(--accent-solid); min-width:32px;">M</button>
      <button class="mrc-btn mrc-btn-small" style="background:var(--accent-light); color:var(--accent-solid); min-width:32px;">N</button>
      <button class="mrc-btn mrc-btn-small" style="background:var(--accent-light); color:var(--accent-solid); min-width:32px;">O</button>
      <button class="mrc-btn mrc-btn-small" style="background:var(--accent-light); color:var(--accent-solid); min-width:32px;">P</button>
      <button class="mrc-btn mrc-btn-small" style="background:var(--accent-light); color:var(--accent-solid); min-width:32px;">Q</button>
      <button class="mrc-btn mrc-btn-small" style="background:var(--accent-light); color:var(--accent-solid); min-width:32px;">R</button>
      <button class="mrc-btn mrc-btn-small" style="background:var(--accent-light); color:var(--accent-solid); min-width:32px;">S</button>
      <button class="mrc-btn mrc-btn-small" style="background:var(--accent-light); color:var(--accent-solid); min-width:32px;">T</button>
      <button class="mrc-btn mrc-btn-small" style="background:var(--accent-light); color:var(--accent-solid); min-width:32px;">U</button>
      <button class="mrc-btn mrc-btn-small" style="background:var(--accent-light); color:var(--accent-solid); min-width:32px;">V</button>
      <button class="mrc-btn mrc-btn-small" style="background:var(--accent-light); color:var(--accent-solid); min-width:32px;">W</button>
      <button class="mrc-btn mrc-btn-small" style="background:var(--accent-light); color:var(--accent-solid); min-width:32px;">X</button>
      <button class="mrc-btn mrc-btn-small" style="background:var(--accent-light); color:var(--accent-solid); min-width:32px;">Y</button>
      <button class="mrc-btn mrc-btn-small" style="background:var(--accent-light); color:var(--accent-solid); min-width:32px;">Z</button>
    </div>
    <div style="padding:0 1.5rem 1.5rem 1.5rem;">
      <div class="mrc-invoices-table-wrapper" style="background: var(--white); border-radius: var(--radius-2xl); box-shadow: var(--shadow-md); padding: 0.5rem 0.5rem 0.5rem 0.5rem; margin-top: 0.5rem;">
        <table class="mrc-table" style="width: 100%; border-collapse: separate; border-spacing: 0;">
          <thead>
            <tr>
              <th>Acc Number</th>
              <th>Name</th>
              <th>Credit Limit</th>
              <th>To Allocate</th>
              <th>Balance</th>
              <th>Last Inv</th>
            </tr>
          </thead>
          <tbody id="accManagerTableBody">
            <tr>
              <td>1001</td>
              <td>John Doe</td>
              <td>TZS 1,000,000</td>
              <td>TZS 200,000</td>
              <td>TZS 800,000</td>
              <td>2024-06-01</td>
            </tr>
            <tr>
              <td>1002</td>
              <td>Sarah Johnson</td>
              <td>TZS 500,000</td>
              <td>TZS 100,000</td>
              <td>TZS 400,000</td>
              <td>2024-05-28</td>
            </tr>
            <tr>
              <td>1003</td>
              <td>Mike Wilson</td>
              <td>TZS 750,000</td>
              <td>TZS 50,000</td>
              <td>TZS 700,000</td>
              <td>2024-06-05</td>
            </tr>
            <tr>
              <td>1004</td>
              <td>Peter Paul</td>
              <td>TZS 1,200,000</td>
              <td>TZS 300,000</td>
              <td>TZS 900,000</td>
              <td>2024-05-30</td>
            </tr>
            <tr>
              <td>1005</td>
              <td>Fatma Ally</td>
              <td>TZS 600,000</td>
              <td>TZS 60,000</td>
              <td>TZS 540,000</td>
              <td>2024-06-03</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<script>
function closeAccountManagerModal() {
  document.getElementById('accountManagerModal').classList.remove('show');
}
// Outstanding button logic
const outstandingBtn = document.getElementById('outstandingBtn');
if (outstandingBtn) {
  outstandingBtn.addEventListener('click', function() {
    document.getElementById('accManagerHeaderType').textContent = 'Outstanding';
    document.getElementById('accManagerHeaderCount').textContent = '(Showing 3 Records)';
    document.getElementById('accManagerTableBody').innerHTML = `
      <tr>
        <td>2001</td>
        <td>Jane Smith</td>
        <td>TZS 1,500,000</td>
        <td>TZS 500,000</td>
        <td>TZS 1,000,000</td>
        <td>2024-06-10</td>
      </tr>
      <tr>
        <td>2002</td>
        <td>Ali Mohamed</td>
        <td>TZS 800,000</td>
        <td>TZS 300,000</td>
        <td>TZS 500,000</td>
        <td>2024-06-12</td>
      </tr>
      <tr>
        <td>2003</td>
        <td>Mary John</td>
        <td>TZS 950,000</td>
        <td>TZS 150,000</td>
        <td>TZS 800,000</td>
        <td>2024-06-15</td>
      </tr>
    `;
  });
}
// Statements (All) dropdown logic
const statementsBtn = document.getElementById('statementsBtn');
const statementsDropdown = document.getElementById('statementsDropdown');
const statementsYear = document.getElementById('statementsYear');
if (statementsBtn && statementsDropdown) {
  statementsBtn.addEventListener('click', function(e) {
    e.stopPropagation();
    statementsDropdown.style.display = (statementsDropdown.style.display === 'block') ? 'none' : 'block';
    // Populate year dropdown (current year +/- 5)
    if (statementsYear && statementsYear.options.length === 0) {
      const now = new Date();
      for (let y = now.getFullYear() - 5; y <= now.getFullYear() + 1; y++) {
        const opt = document.createElement('option');
        opt.value = y;
        opt.textContent = y;
        if (y === now.getFullYear()) opt.selected = true;
        statementsYear.appendChild(opt);
      }
    }
  });
  // Close dropdown on outside click
  document.addEventListener('click', function(e) {
    if (!statementsDropdown.contains(e.target) && e.target !== statementsBtn) {
      statementsDropdown.style.display = 'none';
    }
  });
  // Batch Print button closes dropdown
  document.getElementById('batchPrintBtn').addEventListener('click', function() {
    statementsDropdown.style.display = 'none';
    // You can add your batch print logic here
  });
}
document.getElementById('newCustomerBtn').onclick = function() {
  window.location.href = 'customers.php';
};
</script>
