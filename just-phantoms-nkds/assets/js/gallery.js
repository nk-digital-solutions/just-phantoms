// Vehicle Gallery Functionality
(function() {
  'use strict';
  
  function initializeGallery() {
    const gallery = document.querySelector('.gallery');
    if (!gallery) return;
    
    const displayImage = gallery.querySelector('.gallery-display img');
    const thumbnails = gallery.querySelectorAll('.gallery-thumbnail');
    
    if (!displayImage || thumbnails.length === 0) return;
    
    // Handle thumbnail clicks
    thumbnails.forEach((thumbnail, index) => {
      thumbnail.addEventListener('click', function() {
        // Update active state
        thumbnails.forEach(t => t.classList.remove('active'));
        this.classList.add('active');
        
        // Update main display image
        const newImageSrc = this.querySelector('img').src;
        const newImageAlt = this.querySelector('img').alt;
        
        // Fade out, change source, fade in
        displayImage.style.opacity = '0';
        
        setTimeout(() => {
          displayImage.src = newImageSrc;
          displayImage.alt = newImageAlt;
          displayImage.style.opacity = '1';
        }, 300);
      });
      
      // Set first thumbnail as active by default
      if (index === 0) {
        thumbnail.classList.add('active');
      }
    });
  }
  
  // Initialize when DOM is ready
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initializeGallery);
  } else {
    initializeGallery();
  }
  
})();
