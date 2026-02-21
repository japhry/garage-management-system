<?php
require_once 'config.php';
?>
<footer class="main-footer" style="background: var(--dark); color: white; padding: 30px 0; margin-top: 50px; border-top: 1px solid rgba(255, 255, 255, 0.1);">
  <div class="footer-content" style="max-width: 1200px; margin: 0 auto; padding: 0 20px;">
    <div class="footer-section" style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 20px;">
      
      <!-- Copyright Section -->
      <div class="footer-copyright" style="flex: 1; min-width: 300px;">
        <div style="font-size: 0.9rem; color: #ccc; margin-bottom: 6px;">
          © 2025 MRC Motors. All rights reserved.
        </div>
        <div style="font-size: 0.85rem; color: #999;">
          Coded by <a href="https://pixellinx.co.tz" target="_blank" rel="noopener noreferrer" style="color: var(--accent); text-decoration: none;">japhary from Pixellinx</a>
        </div>
      </div>
      
      <!-- Social Media Section -->
      <div class="footer-social" style="display: flex; gap: 15px; align-items: center;">
        <span style="font-size: 0.9rem; color: #ccc; margin-right: 10px;">Follow us:</span>
        
        <!-- Instagram -->
        <a href="#" class="social-icon" style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background: linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%); border-radius: 50%; color: white; text-decoration: none; transition: all 0.3s ease; box-shadow: 0 2px 8px rgba(0,0,0,0.2);" title="Follow us on Instagram">
          <i class="fab fa-instagram" style="font-size: 1.2rem;"></i>
        </a>
        
        <!-- Facebook -->
        <a href="#" class="social-icon" style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background: #1877f2; border-radius: 50%; color: white; text-decoration: none; transition: all 0.3s ease; box-shadow: 0 2px 8px rgba(0,0,0,0.2);" title="Follow us on Facebook">
          <i class="fab fa-facebook-f" style="font-size: 1.2rem;"></i>
        </a>
        
        <!-- YouTube -->
        <a href="#" class="social-icon" style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background: #ff0000; border-radius: 50%; color: white; text-decoration: none; transition: all 0.3s ease; box-shadow: 0 2px 8px rgba(0,0,0,0.2);" title="Subscribe to our YouTube">
          <i class="fab fa-youtube" style="font-size: 1.2rem;"></i>
        </a>
        
        <!-- X (Twitter) -->
        <a href="#" class="social-icon" style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background: #000000; border-radius: 50%; color: white; text-decoration: none; transition: all 0.3s ease; box-shadow: 0 2px 8px rgba(0,0,0,0.2);" title="Follow us on X (Twitter)">
          <i class="fab fa-x-twitter" style="font-size: 1.2rem;"></i>
        </a>
      </div>
      
      <!-- Contact Info -->
      <div class="footer-contact" style="text-align: right; min-width: 200px;">
        <div style="font-size: 0.9rem; color: #ccc; margin-bottom: 5px;">
          <i class="fas fa-phone" style="margin-right: 8px; color: var(--accent);"></i>
          +255 784 452 500
        </div>
        <div style="font-size: 0.9rem; color: #ccc;">
          <i class="fas fa-envelope" style="margin-right: 8px; color: var(--accent);"></i>
          info@mrcmotors.com
        </div>
      </div>
    </div>
    
  </div>
</footer>

<style>
/* Hover effects for social media icons */
.social-icon:hover {
  transform: translateY(-3px) scale(1.1);
  box-shadow: 0 4px 15px rgba(0,0,0,0.3) !important;
}

.footer-copyright a:hover {
  text-decoration: underline !important;
}

/* Dark theme adjustments */
[data-theme="dark"] .main-footer {
  background: var(--dark);
  border-top: 1px solid rgba(255, 255, 255, 0.1);
}

/* Responsive design */
@media (max-width: 768px) {
  .footer-section {
    flex-direction: column;
    text-align: center;
  }
  
  .footer-copyright,
  .footer-contact {
    min-width: auto;
    text-align: center;
  }
  
  .footer-social {
    justify-content: center;
  }
}
</style> 