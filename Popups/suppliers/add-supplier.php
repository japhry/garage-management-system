<!-- Add Supplier Modal -->
<div id="addSupplierModal" class="modal-overlay" style="display: none; align-items: center; justify-content: center; z-index: 1200; background: rgba(0,0,0,0.18); transition: background 0.3s;">
  <div class="modal-backdrop" style="pointer-events: auto; background: transparent; box-shadow: none;"></div>
  <div class="modal-content supplier-modal" style="max-width: 99vw; width: 800px; min-width: 400px; max-height: 98vh; min-height: 300px; overflow: auto; border-radius: 18px; box-shadow: 0 6px 32px rgba(0,0,0,0.14); background: var(--white); border: 1.5px solid #e5e7eb; z-index: 1201; animation: modalPopIn 0.32s cubic-bezier(.4,1.6,.6,1) 1;">
    <div class="modal-header" style="display: flex; align-items: center; justify-content: space-between;">
      <div style="display: flex; align-items: center; gap: 18px;">
        <span class="modal-title">Supplier: Details</span>
        <button type="submit" form="supplierForm" class="btn btn-save-header" style="margin-left: 18px;">Save</button>
      </div>
      <div style="display: flex; align-items: center; gap: 10px;">
        <button type="button" class="btn btn-danger" id="deleteSupplierBtn">Delete</button>
        <button class="modal-close modal-close-header" id="closeAddSupplierModal"><i class="fas fa-times"></i></button>
      </div>
    </div>
    <form class="modal-form" id="supplierForm" autocomplete="off">
      <div class="modal-content-grid" style="display: flex; gap: 32px; margin-top: 8px;">
        <!-- Left Column -->
        <div class="modal-section modal-section-left" style="flex: 1; min-width: 260px;">
          <div class="form-group">
            <label for="accNumber">Acc Number</label>
            <input type="text" id="accNumber" name="accNumber" class="input-rounded" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="company">Company <span class="required">Required</span></label>
            <input type="text" id="company" name="company" class="input-rounded" required autocomplete="off">
          </div>
          <div class="form-group">
            <label for="contactName">Contact Name</label>
            <input type="text" id="contactName" name="contactName" class="input-rounded" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="address">Address</label>
            <textarea id="address" name="address" class="input-rounded textarea-multiline" rows="3"></textarea>
          </div>
          <div class="form-group-inline" style="align-items: flex-end; gap: 8px;">
            <div class="form-group" style="flex: 1;">
              <label for="postCode">Post Code</label>
              <div class="input-icon-group">
                <input type="text" id="postCode" name="postCode" class="input-rounded" autocomplete="off">
                <button type="button" class="input-icon-btn"><i class="fas fa-search"></i></button>
              </div>
            </div>
          </div>
          <hr style="margin: 16px 0; border: none; border-top: 1.5px solid #e5e7eb;">
          <div class="form-group">
            <label for="telephone">Telephone</label>
            <input type="text" id="telephone" name="telephone" class="input-rounded" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="fax">Fax</label>
            <input type="text" id="fax" name="fax" class="input-rounded" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="input-rounded" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="website">Website</label>
            <input type="text" id="website" name="website" class="input-rounded" autocomplete="off">
          </div>
        </div>
        <!-- Right Column -->
        <div class="modal-section modal-section-right" style="flex: 1; min-width: 260px;">
          <div class="form-group">
            <label>Stock Supplier</label>
            <div class="toggle-switch-group">
              <button type="button" class="toggle-switch-btn" id="stockSupplierY">Y</button>
              <button type="button" class="toggle-switch-btn" id="stockSupplierN">N</button>
              <input type="hidden" id="stockSupplier" name="stockSupplier" value="Y">
            </div>
          </div>
          <div class="form-group">
            <label for="nominalCode">Nominal Code</label>
            <select id="nominalCode" name="nominalCode" class="input-rounded">
              <option value="">Select Code</option>
              <option value="1001">1001 - General Supplies</option>
              <option value="1002">1002 - Auto Parts</option>
              <option value="1003">1003 - Services</option>
            </select>
          </div>
          <div class="form-group">
            <label>Credit Account</label>
            <div class="toggle-switch-group">
              <button type="button" class="toggle-switch-btn" id="creditAccountY">Y</button>
              <button type="button" class="toggle-switch-btn" id="creditAccountN">N</button>
              <input type="hidden" id="creditAccount" name="creditAccount" value="N">
            </div>
          </div>
          <hr style="margin: 16px 0; border: none; border-top: 1.5px solid #e5e7eb;">
          <div class="form-group">
            <label for="note">Note</label>
            <textarea id="note" name="note" class="input-rounded textarea-multiline" rows="7" style="background: #fffbe6;"></textarea>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
<script>
// Toggle logic for Stock Supplier
const stockSupplierY = document.getElementById('stockSupplierY');
const stockSupplierN = document.getElementById('stockSupplierN');
const stockSupplierInput = document.getElementById('stockSupplier');
if (stockSupplierY && stockSupplierN && stockSupplierInput) {
  function setStockSupplier(val) {
    stockSupplierInput.value = val;
    if (val === 'Y') {
      stockSupplierY.classList.add('active');
      stockSupplierN.classList.remove('active');
    } else {
      stockSupplierY.classList.remove('active');
      stockSupplierN.classList.add('active');
    }
  }
  stockSupplierY.addEventListener('click', () => setStockSupplier('Y'));
  stockSupplierN.addEventListener('click', () => setStockSupplier('N'));
  setStockSupplier('Y');
}
// Toggle logic for Credit Account
const creditAccountY = document.getElementById('creditAccountY');
const creditAccountN = document.getElementById('creditAccountN');
const creditAccountInput = document.getElementById('creditAccount');
if (creditAccountY && creditAccountN && creditAccountInput) {
  function setCreditAccount(val) {
    creditAccountInput.value = val;
    if (val === 'Y') {
      creditAccountY.classList.add('active');
      creditAccountN.classList.remove('active');
    } else {
      creditAccountY.classList.remove('active');
      creditAccountN.classList.add('active');
    }
  }
  creditAccountY.addEventListener('click', () => setCreditAccount('Y'));
  creditAccountN.addEventListener('click', () => setCreditAccount('N'));
  setCreditAccount('N');
}
</script>
<style>
.toggle-switch-group {
  display: flex;
  gap: 8px;
  margin-top: 4px;
}
.toggle-switch-btn {
  min-width: 38px;
  padding: 6px 0;
  border-radius: 6px;
  border: 1.5px solid #e5e7eb;
  background: #f3f4f6;
  color: #b0b0b0;
  font-weight: 700;
  font-size: 1.05rem;
  cursor: pointer;
  transition: background 0.15s, color 0.15s, border 0.15s;
}
.toggle-switch-btn.active {
  background: var(--accent-solid);
  color: #fff;
  border: 1.5px solid var(--accent-solid);
  box-shadow: 0 2px 8px rgba(236,32,37,0.10);
}
.btn.btn-save-header {
  background: #fff;
  color: var(--accent-solid);
  border: 2px solid var(--accent-solid);
  border-radius: 999px;
  padding: 8px 28px;
  font-weight: 800;
  font-size: 1.08rem;
  box-shadow: 0 2px 8px rgba(236,32,37,0.10);
  cursor: pointer;
  transition: background 0.15s, color 0.15s, border 0.15s, box-shadow 0.15s;
  outline: none;
  position: relative;
  z-index: 1;
}
.btn.btn-save-header:hover, .btn.btn-save-header:focus {
  background: var(--accent-solid);
  color: #fff;
  border: 2px solid #fff;
  box-shadow: 0 4px 16px rgba(236,32,37,0.18);
}
.modal-close-header {
  font-size: 1.5rem;
  color: #fff;
  background: none;
  border: none;
  border-radius: 50%;
  width: 38px;
  height: 38px;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: background 0.18s, color 0.18s, box-shadow 0.18s;
  box-shadow: none;
  margin-left: 2px;
}
.modal-close-header:hover, .modal-close-header:focus {
  background: #fff;
  color: var(--accent-solid);
  box-shadow: 0 2px 8px rgba(236,32,37,0.10);
}
</style> 