// FAQ Tab Filtering Functionality
(function() {
  'use strict';
  
  function filterFAQItems(category, items) {
    let visibleCount = 0;
    
    items.forEach(item => {
      const itemCategory = item.getAttribute('data-category');
      
      if (category === 'all' || itemCategory === category) {
        // Show item
        item.classList.remove('hidden');
        visibleCount++;
      } else {
        // Hide item
        item.classList.add('hidden');
      }
    });
    
    console.log(`Filtered to category: ${category}, showing ${visibleCount} items`);
  }
  
  function closeFAQItems() {
    const detailsElements = document.querySelectorAll('.faq details');
    detailsElements.forEach(details => {
      details.removeAttribute('open');
    });
  }
  
  function initializeFAQ() {
    const categoryButtons = document.querySelectorAll('.category-btn');
    const faqItems = document.querySelectorAll('.faq .item');
    
    if (categoryButtons.length === 0 || faqItems.length === 0) {
      console.warn('FAQ elements not found:', {
        buttons: categoryButtons.length,
        items: faqItems.length
      });
      return;
    }
    
    console.log('FAQ elements initialized:', {
      buttons: categoryButtons.length,
      items: faqItems.length
    });
    
    // Add click event listeners to category buttons
    categoryButtons.forEach(button => {
      button.addEventListener('click', function(e) {
        e.preventDefault();
        const category = this.getAttribute('data-category');
        console.log('Category selected:', category);
        
        // Remove active class from all buttons
        categoryButtons.forEach(btn => btn.classList.remove('active'));
        
        // Add active class to clicked button
        this.classList.add('active');
        
        // Close all open FAQ items when switching categories
        closeFAQItems();
        
        // Filter FAQ items
        filterFAQItems(category, faqItems);
      });
    });
    
    // Initialize: make sure all items are visible by default
    filterFAQItems('all', faqItems);
  }
  
  // Initialize when DOM is ready
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initializeFAQ);
  } else {
    initializeFAQ();
  }
  
})();