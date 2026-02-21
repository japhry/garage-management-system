// Admin Page JavaScript
document.addEventListener('DOMContentLoaded', function() {
  const tabs = document.querySelectorAll('.admin-tab');
  const tabContents = document.querySelectorAll('.tab-content');

  tabs.forEach(tab => {
    tab.addEventListener('click', function() {
      const targetTab = this.getAttribute('data-tab');
      
      // Remove active class from all tabs and contents
      tabs.forEach(t => t.classList.remove('active'));
      tabContents.forEach(content => {
        content.classList.remove('active');
        content.style.display = 'none';
      });
      
      // Add active class to clicked tab and corresponding content
      this.classList.add('active');
      const targetContent = document.getElementById(targetTab + '-tab');
      if (targetContent) {
        targetContent.classList.add('active');
        targetContent.style.display = 'block';
      }
    });
  });

  // Module click handlers
  document.querySelectorAll('.admin-module').forEach(module => {
    module.addEventListener('click', function(e) {
      // Only show alert for modules that are NOT Account Manager
      if (!this.classList.contains('module-account')) {
        const moduleTitle = this.querySelector('.admin-module-title').textContent.trim();
        alert(`Opening ${moduleTitle} module...`);
      }
      // If Account Manager, let the inline onclick handle the modal
    });
  });
}); 