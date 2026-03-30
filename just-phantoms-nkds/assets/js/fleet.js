// Fleet filtering functionality
(function() {
  'use strict';
  
  function filterVehicles(filterType, cards) {
    let visibleCount = 0;
    
    cards.forEach(card => {
      const categories = card.getAttribute('data-category') || '';
      const categoryList = categories.split(' '); // Split by space to handle multiple categories
      
      // Show if "all" is selected, or if any of the card's categories match the filter
      const shouldShow = filterType === 'all' || categoryList.includes(filterType);
      
      if (shouldShow) {
        card.style.display = '';
        card.classList.remove('hidden');
        visibleCount++;
      } else {
        card.style.display = 'none';
        card.classList.add('hidden');
      }
    });
    
    console.log(`Filtered to: ${filterType}, showing ${visibleCount} vehicles`);
  }
  
  function initializeFleetFilters() {
    const filterButtons = document.querySelectorAll('.filter-btn');
    const vehicleCards = document.querySelectorAll('.card');
    
    if (filterButtons.length === 0 || vehicleCards.length === 0) {
      console.warn('Fleet filter elements not found:', {
        buttons: filterButtons.length,
        cards: vehicleCards.length
      });
      return;
    }
    
    console.log('Fleet filter initialized:', {
      buttons: filterButtons.length,
      cards: vehicleCards.length
    });
    
    // Add click event listeners to filter buttons
    filterButtons.forEach(button => {
      button.addEventListener('click', function(e) {
        e.preventDefault();
        const filterType = this.getAttribute('data-filter');
        
        console.log('Filter selected:', filterType);
        
        // Remove active class from all buttons
        filterButtons.forEach(btn => btn.classList.remove('active'));
        
        // Add active class to clicked button
        this.classList.add('active');
        
        // Filter vehicles
        filterVehicles(filterType, vehicleCards);
      });
    });
    
    // Initialize with all vehicles showing
    filterVehicles('all', vehicleCards);
  }
  
  // Initialize when DOM is ready
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initializeFleetFilters);
  } else {
    initializeFleetFilters();
  }
  
})();