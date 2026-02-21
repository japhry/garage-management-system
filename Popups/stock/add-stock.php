<?php
// New Stock Item Modal
?>
<!-- Add Stock Item Modal -->
<div id="addStockModal" class="modal-overlay" style="display:none;align-items:center;justify-content:center;z-index:1200;background:rgba(0,0,0,0.18);transition:background 0.3s;">
  <div class="modal-backdrop" style="pointer-events:auto;background:transparent;box-shadow:none;"></div>
  <div class="modal-content stock-modal" style="max-width:99vw;width:1100px;min-width:400px;max-height:98vh;min-height:540px;overflow:auto;border-radius:18px;box-shadow:0 6px 32px rgba(0,0,0,0.14);background:#fff;border:1.5px solid #e5e7eb;z-index:1201;animation:modalPopIn 0.32s cubic-bezier(.4,1.6,.6,1) 1;">
    <!-- Toolbar -->
    <div class="modal-action-bar fancy-toolbar">
      <span style="font-size:1.18rem;font-weight:700;color:#b91c1c;margin-right:18px;">New Item</span>
      <button class="modal-action-btn primary" id="saveStockBtn"><i class="fas fa-save"></i> Save</button>
      <div style="flex:1;"></div>
      <button class="modal-action-btn danger" id="deleteStockBtn"><i class="fas fa-trash"></i> Delete</button>
      <button class="modal-action-btn close-btn" id="closeAddStockModal" title="Close"><i class="fas fa-times"></i></button>
    </div>
    <!-- Main Content Grid -->
    <div class="modal-main-grid" style="display:flex;gap:24px;padding:28px 28px 0 28px;background:#fff;">
      <!-- Left Form -->
      <div class="stock-main-form card-box" style="flex:1 1 0;min-width:0;background:#fff;border-radius:14px;box-shadow:0 2px 12px rgba(236,32,37,0.07);border:1px solid var(--accent-light);padding:16px 16px;">
        <div class="modal-scrollable-content" style="max-height:70vh;overflow-y:auto;">
          <div class="stock-form-section" style="margin-bottom:18px;">
            <label class="form-label">Supplier</label>
            <input type="text" class="modern-input" placeholder="Supplier">
            <label class="form-label">Category / Sub</label>
            <div style="display:flex;gap:8px;">
              <input type="text" class="modern-input" placeholder="Category">
              <input type="text" class="modern-input" placeholder="Sub Category">
            </div>
            <label class="form-label">Manufacturer</label>
            <input type="text" class="modern-input" placeholder="Manufacturer">
          </div>
          <div class="stock-form-section" style="margin-bottom:18px;">
            <label class="form-label">Part Number</label>
            <input type="text" class="modern-input" placeholder="Required">
            <label class="form-label">Barcode Number</label>
            <div style="display:flex;gap:8px;align-items:center;">
              <input type="text" class="modern-input" placeholder="Optional (up to 12 digits)">
              <button class="btn-secondary fancy-btn" style="padding:7px 16px;font-size:1rem;border-radius:8px;background:#fff;color:#b91c1c;font-weight:700;border:1.5px solid #f3f4f6;">Generate</button>
              <button class="btn-secondary fancy-btn" style="padding:7px 10px;font-size:1rem;border-radius:8px;background:#fff;color:#b91c1c;font-weight:700;border:1.5px solid #f3f4f6;"><i class="fas fa-times"></i></button>
            </div>
            <label class="form-label">Description</label>
            <input type="text" class="modern-input" placeholder="Description">
          </div>
          <div class="stock-form-section" style="margin-bottom:18px;">
            <label class="form-label">Cost Net</label>
            <input type="text" class="modern-input" placeholder="Cost Net">
            <label class="form-label">Trade / Retail</label>
            <div style="display:flex;gap:8px;">
              <input type="text" class="modern-input" placeholder="Trade">
              <input type="text" class="modern-input" placeholder="Retail">
            </div>
            <label class="form-label">Guarantee</label>
            <input type="text" class="modern-input" placeholder="Guarantee">
            <label class="form-label">Location</label>
            <input type="text" class="modern-input" placeholder="Location">
            <label class="form-label">Keywords</label>
            <input type="text" class="modern-input" placeholder="Keywords">
          </div>
        </div>
      </div>
      <!-- Right Card -->
      <div class="stock-sidebar card-box" style="flex:1 1 0;min-width:0;background:#fff;border-radius:14px;box-shadow:0 2px 12px rgba(236,32,37,0.04);border:1px solid var(--accent-light);padding:18px 18px;display:flex;flex-direction:column;gap:18px;">
        <div style="display:flex;align-items:center;gap:18px;margin-bottom:10px;">
          <label class="form-label" style="flex:1;">Track item quantities</label>
          <div class="stock-qty-toggle">
            <button type="button" class="toggle-btn active" id="qtyYesBtn">Y</button>
            <button type="button" class="toggle-btn" id="qtyNoBtn">N</button>
          </div>
        </div>
        <div style="display:flex;align-items:center;gap:18px;">
          <label class="form-label" style="flex:1;">Actual stock level</label>
          <div style="display:flex;gap:8px;align-items:center;">
            <button class="btn-secondary fancy-btn" style="background:#fff;color:#b91c1c;font-weight:700;border:1.5px solid #f3f4f6;border-radius:8px;padding:6px 12px;">+/-</button>
            <input type="text" class="modern-input" placeholder="0" style="width:60px;">
          </div>
        </div>
        <!-- Low stock and Minimum order, each on its own line -->
        <div style="display:flex;align-items:center;gap:10px;margin-bottom:10px;">
          <label class="form-label" style="white-space:nowrap;">Low stock when below</label>
          <input type="text" class="modern-input" placeholder="" style="flex:1;min-width:0;">
        </div>
        <div style="display:flex;align-items:center;gap:10px;margin-bottom:10px;">
          <label class="form-label" style="white-space:nowrap;">Minimum order quantity</label>
          <input type="text" class="modern-input" placeholder="" style="flex:1;min-width:0;">
        </div>
        <div style="flex:1;display:flex;flex-direction:column;">
          <!-- Tabs for Info/Notes and Image -->
          <div class="stock-notes-tabs" style="display:flex;gap:0;margin-bottom:0;">
            <button type="button" class="stock-tab-btn active" data-tab="notes" style="flex:1;font-weight:700;font-size:1.07rem;padding:8px 0;border-radius:8px 0 0 0;background:#444;color:#fff;border:none;transition:background 0.18s;">Info / Notes</button>
            <button type="button" class="stock-tab-btn" data-tab="image" style="flex:1;font-weight:700;font-size:1.07rem;padding:8px 0;border-radius:0 8px 0 0;background:#aaa;color:#fff;border:none;transition:background 0.18s;">Image</button>
          </div>
          <div id="stock-notes-tab-notes" class="stock-tab-content" style="flex:1;display:block;height:100%;padding:0;">
            <textarea class="modern-input" style="background:#fffbe6;width:100%;height:100%;min-height:180px;max-height:340px;flex:1;border-radius:0 0 8px 8px;border:1.5px solid #f3f4f6;padding:12px 14px 12px 14px;font-size:1.05rem;box-sizing:border-box;resize:vertical;"></textarea>
          </div>
          <div id="stock-notes-tab-image" class="stock-tab-content" style="flex:1;display:none;background:#fff;min-height:180px;border-radius:0 0 8px 8px;border:1.5px solid #f3f4f6;display:flex;flex-direction:column;justify-content:space-between;padding:0;">
            <div id="stock-image-preview" style="flex:1;display:flex;align-items:center;justify-content:center;min-height:120px;background:#fff;"></div>
            <div style="display:flex;align-items:center;justify-content:flex-end;border-top:1.5px solid #eee;padding:6px 8px 6px 0;background:#f7f7f7;border-radius:0 0 8px 8px;gap:4px;">
              <input type="file" id="stock-image-input" accept="image/*,.pdf,.doc,.docx,.xls,.xlsx,.txt" style="display:none;">
              <button type="button" id="stock-image-add" title="Add" style="background:#fff;border:1.5px solid #eee;border-radius:6px;padding:4px 12px;font-size:1.18rem;cursor:pointer;"><i class="fas fa-plus"></i></button>
              <button type="button" id="stock-image-download" title="Download" style="background:#fff;border:1.5px solid #eee;border-radius:6px;padding:4px 12px;font-size:1.18rem;cursor:pointer;"><i class="fas fa-download"></i></button>
              <button type="button" id="stock-image-clear" title="Clear" style="background:#fff;border:1.5px solid #eee;border-radius:6px;padding:4px 12px;font-size:1.18rem;cursor:pointer;"><i class="fas fa-times"></i></button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
  // Stock Notes/Image Tabs Logic
  const tabBtns = document.querySelectorAll('.stock-tab-btn');
  const tabNotes = document.getElementById('stock-notes-tab-notes');
  const tabImage = document.getElementById('stock-notes-tab-image');
  tabBtns.forEach(btn => {
    btn.addEventListener('click', function() {
      tabBtns.forEach(b => b.classList.remove('active'));
      this.classList.add('active');
      if (this.dataset.tab === 'notes') {
        tabNotes.style.display = 'block';
        tabImage.style.display = 'none';
      } else {
        tabNotes.style.display = 'none';
        tabImage.style.display = 'block';
      }
    });
  });

  // Image tab functionality
  const fileInput = document.getElementById('stock-image-input');
  const addBtn = document.getElementById('stock-image-add');
  const downloadBtn = document.getElementById('stock-image-download');
  const clearBtn = document.getElementById('stock-image-clear');
  const preview = document.getElementById('stock-image-preview');
  let uploadedFile = null;

  addBtn.addEventListener('click', function() {
    fileInput.value = '';
    fileInput.click();
  });

  fileInput.addEventListener('change', function() {
    if (fileInput.files && fileInput.files[0]) {
      uploadedFile = fileInput.files[0];
      preview.innerHTML = '';
      if (uploadedFile.type.startsWith('image/')) {
        const img = document.createElement('img');
        img.src = URL.createObjectURL(uploadedFile);
        img.style.maxWidth = '100%';
        img.style.maxHeight = '140px';
        img.style.borderRadius = '8px';
        preview.appendChild(img);
      } else {
        const icon = document.createElement('i');
        icon.className = 'fas fa-file-alt';
        icon.style.fontSize = '2rem';
        icon.style.color = '#b91c1c';
        preview.appendChild(icon);
        const name = document.createElement('div');
        name.textContent = uploadedFile.name;
        name.style.marginTop = '8px';
        name.style.fontWeight = '600';
        name.style.color = '#b91c1c';
        preview.appendChild(name);
      }
    }
  });

  downloadBtn.addEventListener('click', function() {
    if (uploadedFile) {
      const url = URL.createObjectURL(uploadedFile);
      const a = document.createElement('a');
      a.href = url;
      a.download = uploadedFile.name;
      document.body.appendChild(a);
      a.click();
      setTimeout(() => {
        document.body.removeChild(a);
        URL.revokeObjectURL(url);
      }, 100);
    }
  });

  clearBtn.addEventListener('click', function() {
    uploadedFile = null;
    preview.innerHTML = '';
    fileInput.value = '';
  });

  // Toggle Y/N logic
  const qtyYesBtn = document.getElementById('qtyYesBtn');
  const qtyNoBtn = document.getElementById('qtyNoBtn');
  if (qtyYesBtn && qtyNoBtn) {
    qtyYesBtn.addEventListener('click', function() {
      qtyYesBtn.classList.add('active');
      qtyNoBtn.classList.remove('active');
    });
    qtyNoBtn.addEventListener('click', function() {
      qtyNoBtn.classList.add('active');
      qtyYesBtn.classList.remove('active');
    });
  }

  // Reset tabs on popup open (robust)
  function resetStockTabs() {
    tabBtns.forEach(b => b.classList.remove('active'));
    if (tabBtns[0]) tabBtns[0].classList.add('active');
    if (tabNotes) tabNotes.style.display = 'block';
    if (tabImage) tabImage.style.display = 'none';
  }
  // Listen for popup open
  const addStockModal = document.getElementById('addStockModal');
  if (addStockModal) {
    const observer = new MutationObserver(function() {
      if (addStockModal.style.display === 'flex') {
        resetStockTabs();
      }
    });
    observer.observe(addStockModal, { attributes: true, attributeFilter: ['style'] });
  }
});
</script>

<style>
.stock-notes-tabs .stock-tab-btn {
  background: #fde8e8 !important;
  color: #b91c1c !important;
  border: none;
  font-weight: 700;
  font-size: 1.07rem;
  padding: 10px 0;
  border-radius: 8px 8px 0 0;
  transition: background 0.18s, color 0.18s;
}
.stock-notes-tabs .stock-tab-btn.active {
  background: linear-gradient(90deg,#ef4444,#b91c1c) !important;
  color: #fff !important;
  box-shadow: 0 2px 8px rgba(185,28,28,0.08);
  z-index: 2;
}
.stock-notes-tabs .stock-tab-btn:not(.active) {
  background: #fde8e8 !important;
  color: #b91c1c !important;
  z-index: 1;
}

/* Modern input style (match vehicle popup) */
.modern-input {
  width: 100%;
  background: #fff;
  border: 1.5px solid #e5e7eb;
  border-radius: 8px;
  padding: 10px 14px;
  font-size: 1.07rem;
  color: #b91c1c;
  font-weight: 600;
  box-shadow: 0 1px 4px rgba(185,28,28,0.04);
  outline: none;
  transition: border 0.18s, box-shadow 0.18s;
}
.modern-input:focus {
  border: 1.5px solid #ef4444;
  box-shadow: 0 0 0 2px rgba(239,68,68,0.13);
  background: #fff;
}

/* Toggle Y/N buttons */
.stock-qty-toggle {
  display: flex;
  gap: 8px;
}
.stock-qty-toggle .toggle-btn {
  padding: 6px 18px;
  border-radius: 8px;
  border: 1.5px solid #f3f4f6;
  font-weight: 700;
  font-size: 1.07rem;
  cursor: pointer;
  background: #fff;
  color: #b91c1c;
  transition: background 0.18s, color 0.18s, border 0.18s;
}
.stock-qty-toggle .toggle-btn.active {
  background: linear-gradient(90deg,#ef4444,#b91c1c);
  color: #fff;
  border: 1.5px solid #ef4444;
}
.stock-qty-toggle .toggle-btn:not(.active) {
  background: #fff;
  color: #b91c1c;
  border: 1.5px solid #f3f4f6;
}
</style>
