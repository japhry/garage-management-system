<?php
// New Document Modal
// This file contains the document creation popup
// Include this file where needed using: include 'Popups/calendar/new-document.php';
?>

<!-- New Doc Modal -->
<div id="newDocModal" class="newdoc-modal-overlay" style="display:none;">
  <div class="newdoc-modal-backdrop"></div>
  <div class="newdoc-modal-content">
    <div class="newdoc-modal-header">Create a new document</div>
    <div class="newdoc-modal-body">
      <div style="display:flex; align-items:center; gap:14px; margin-bottom:18px;">
        <span><i class="fas fa-info-circle" style="color:#2563eb; font-size:2rem;"></i></span>
        <span style="font-size:1.1rem; color:#22223b;">What type of document do you wish to create?</span>
      </div>
      <div class="newdoc-modal-btnrow">
        <button class="newdoc-modal-btn" id="newdoc-estimate">Estimate</button>
        <button class="newdoc-modal-btn" id="newdoc-jobsheet">Jobsheet</button>
        <button class="newdoc-modal-btn" id="newdoc-invoice">Invoice</button>
        <button class="newdoc-modal-btn newdoc-cancel" id="newdoc-cancel">Cancel</button>
      </div>
    </div>
  </div>
  <style>
    .newdoc-modal-overlay {
      position: fixed; top:0; left:0; right:0; bottom:0; z-index:2000;
      display: flex; align-items: center; justify-content: center;
      background: rgba(30,30,40,0.18);
    }
    .newdoc-modal-backdrop {
      position: absolute; top:0; left:0; right:0; bottom:0;
      background: rgba(255,255,255,0.7);
      z-index:1;
    }
    .newdoc-modal-content {
      position: relative; z-index:2;
      background: #fff; border-radius: 14px; box-shadow: 0 4px 24px 0 rgba(80,80,180,0.10);
      min-width: 340px; max-width: 98vw; padding: 28px 32px 22px 32px;
      display: flex; flex-direction: column; align-items: stretch;
    }
    .newdoc-modal-header {
      font-size: 1.18rem; font-weight: 700; color: #22223b; margin-bottom: 18px;
    }
    .newdoc-modal-btnrow {
      display: flex; gap: 16px; justify-content: center; margin-top: 8px;
    }
    .newdoc-modal-btn {
      background: #f3f4f6; color: #2563eb; border: 1.5px solid #c7d2fe;
      border-radius: 8px; font-size: 1rem; font-weight: 600; padding: 8px 22px;
      cursor: pointer; transition: background 0.18s, color 0.18s, border 0.18s;
      box-shadow: 0 1px 4px 0 rgba(80,80,180,0.04);
    }
    .newdoc-modal-btn:hover {
      background: #2563eb; color: #fff; border: 1.5px solid #2563eb;
    }
    .newdoc-modal-btn.newdoc-cancel {
      background: #fff; color: #22223b; border: 1.5px solid #e5e7eb;
    }
    .newdoc-modal-btn.newdoc-cancel:hover {
      background: #e5e7eb; color: #22223b; border: 1.5px solid #e5e7eb;
    }
  </style>
</div>

<script>
// New Document Modal functionality
document.addEventListener('DOMContentLoaded', function() {
  const newDocModal = document.getElementById('newDocModal');
  const newDocCancelBtn = document.getElementById('newdoc-cancel');
  const newDocBackdrop = newDocModal?.querySelector('.newdoc-modal-backdrop');

  function openNewDocModal() {
    if (newDocModal) newDocModal.style.display = 'flex';
  }

  function closeNewDocModal() {
    if (newDocModal) newDocModal.style.display = 'none';
  }

  // Close modal when clicking cancel button
  if (newDocCancelBtn) {
    newDocCancelBtn.addEventListener('click', closeNewDocModal);
  }

  // Close modal when clicking backdrop
  if (newDocBackdrop) {
    newDocBackdrop.addEventListener('click', closeNewDocModal);
  }

  // Document type selection
  const estimateBtn = document.getElementById('newdoc-estimate');
  const jobsheetBtn = document.getElementById('newdoc-jobsheet');
  const invoiceBtn = document.getElementById('newdoc-invoice');

  if (estimateBtn) {
    estimateBtn.addEventListener('click', function() {
      // Redirect to estimates page or open estimate creation
      window.location.href = 'estimates.php?action=new';
      closeNewDocModal();
    });
  }

  if (jobsheetBtn) {
    jobsheetBtn.addEventListener('click', function() {
      // Redirect to job sheets page or open job sheet creation
      window.location.href = 'job-sheets.php?action=new';
      closeNewDocModal();
    });
  }

  if (invoiceBtn) {
    invoiceBtn.addEventListener('click', function() {
      // Redirect to invoices page or open invoice creation
      window.location.href = 'invoices.php?action=new';
      closeNewDocModal();
    });
  }

  // Make functions globally available
  window.openNewDocModal = openNewDocModal;
  window.closeNewDocModal = closeNewDocModal;
});
</script> 