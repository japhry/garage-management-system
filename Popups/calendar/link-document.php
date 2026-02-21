<?php
// Link to Document Modal
// This file contains the document linking popup
// Include this file where needed using: include 'Popups/calendar/link-document.php';
?>

<!-- Link to Document Modal -->
<div id="linkDocModal" class="linkdoc-modal-overlay" style="display:none;">
  <div class="linkdoc-modal-backdrop"></div>
  <div class="linkdoc-modal-content">
    <div class="linkdoc-modal-header">
      <i class="fas fa-link" style="color:#b91c1c; margin-right:10px; font-size:1.2em; vertical-align:middle;"></i>
      Link to document
    </div>
    <div class="linkdoc-modal-body">
      <div class="linkdoc-modal-instructions">
        Please specify the document type and number you wish to be linked with this appointment
      </div>
      <div class="linkdoc-modal-formrow">
        <label for="linkdoc-type">Doc Type</label>
        <select id="linkdoc-type">
          <option value="SI">SI</option>
          <option value="ES">ES</option>
          <option value="JS">JS</option>
          <option value="SI">SI</option>
          <option value="VS">VS</option>
        </select>
      </div>
      <div class="linkdoc-modal-formrow">
        <label for="linkdoc-number">Doc Number</label>
        <input type="text" id="linkdoc-number" autocomplete="off" placeholder="Enter document number..." />
      </div>
      <div class="linkdoc-modal-btnrow">
        <button class="linkdoc-modal-btn primary" id="linkdoc-link">Link</button>
        <button class="linkdoc-modal-btn" id="linkdoc-cancel">Cancel</button>
      </div>
    </div>
  </div>
  <style>
    .linkdoc-modal-overlay {
      position: fixed; top:0; left:0; right:0; bottom:0; z-index:2100;
      display: flex; align-items: center; justify-content: center;
      background: rgba(30,30,40,0.18);
      animation: linkdoc-fadein 0.25s;
    }
    @keyframes linkdoc-fadein {
      from { opacity: 0; }
      to { opacity: 1; }
    }
    .linkdoc-modal-backdrop {
      position: absolute; top:0; left:0; right:0; bottom:0;
      background: rgba(255,255,255,0.7);
      z-index:1;
    }
    .linkdoc-modal-content {
      position: relative; z-index:2;
      background: #fff; border-radius: 16px; box-shadow: 0 8px 32px 0 rgba(185,28,28,0.13);
      min-width: 340px; max-width: 98vw; padding: 28px 32px 22px 32px;
      display: flex; flex-direction: column; align-items: stretch;
      border: 2.5px solid #b91c1c;
      transition: box-shadow 0.18s;
    }
    .linkdoc-modal-header {
      font-size: 1.22rem; font-weight: 700; color: #22223b; margin-bottom: 18px;
      display: flex; align-items: center;
    }
    .linkdoc-modal-instructions {
      font-size: 1.07rem; color: #22223b; margin-bottom: 22px;
    }
    .linkdoc-modal-formrow {
      display: flex; align-items: center; gap: 18px; margin-bottom: 18px;
    }
    .linkdoc-modal-formrow label {
      min-width: 90px; font-weight: 500; color: #22223b;
    }
    .linkdoc-modal-formrow select, .linkdoc-modal-formrow input[type="text"] {
      flex: 1 1 0%;
      border: 1.5px solid #b91c1c; border-radius: 7px; padding: 8px 14px; font-size: 1rem;
      outline: none; transition: border 0.18s, box-shadow 0.18s;
      background: #fff;
      box-shadow: 0 1px 4px 0 rgba(185,28,28,0.04);
    }
    .linkdoc-modal-formrow select:focus, .linkdoc-modal-formrow input[type="text"]:focus {
      border: 1.5px solid #22223b;
      box-shadow: 0 0 0 2px #fef3c7;
    }
    .linkdoc-modal-btnrow {
      display: flex; gap: 18px; justify-content: flex-end; margin-top: 18px;
    }
    .linkdoc-modal-btn {
      background: #fff; color: #22223b; border: 1.5px solid #e5e7eb;
      border-radius: 8px; font-size: 1rem; font-weight: 600; padding: 8px 32px;
      cursor: pointer; transition: background 0.18s, color 0.18s, border 0.18s, box-shadow 0.18s;
      box-shadow: 0 1px 4px 0 rgba(80,80,180,0.04);
    }
    .linkdoc-modal-btn.primary {
      background: #b91c1c; color: #fff; border: 1.5px solid #b91c1c;
    }
    .linkdoc-modal-btn.primary:hover {
      background: #22223b; color: #fff; border: 1.5px solid #22223b; box-shadow: 0 2px 8px 0 rgba(34,34,59,0.10);
    }
    .linkdoc-modal-btn:hover {
      background: #f3f4f6; color: #b91c1c; border: 1.5px solid #b91c1c; box-shadow: 0 2px 8px 0 rgba(185,28,28,0.07);
    }
    @media (max-width: 600px) {
      .linkdoc-modal-content {
        min-width: 0; padding: 16px 6vw 16px 6vw;
      }
      .linkdoc-modal-header { font-size: 1.08rem; }
      .linkdoc-modal-formrow label { min-width: 70px; }
    }
  </style>
</div>

<script>
// Link Document Modal functionality
document.addEventListener('DOMContentLoaded', function() {
  const linkDocModal = document.getElementById('linkDocModal');
  const linkDocCancelBtn = document.getElementById('linkdoc-cancel');
  const linkDocBackdrop = linkDocModal?.querySelector('.linkdoc-modal-backdrop');

  function openLinkDocModal() {
    if (linkDocModal) linkDocModal.style.display = 'flex';
  }

  function closeLinkDocModal() {
    if (linkDocModal) linkDocModal.style.display = 'none';
  }

  // Close modal when clicking cancel button
  if (linkDocCancelBtn) {
    linkDocCancelBtn.addEventListener('click', closeLinkDocModal);
  }

  // Close modal when clicking backdrop
  if (linkDocBackdrop) {
    linkDocBackdrop.addEventListener('click', closeLinkDocModal);
  }

  // Make functions globally available
  window.openLinkDocModal = openLinkDocModal;
  window.closeLinkDocModal = closeLinkDocModal;
});
</script> 