// Quote Form JavaScript
document.addEventListener('DOMContentLoaded', function() {
    const quoteForm = document.getElementById('quoteForm');
    const eventTypeSelect = document.getElementById('eventType');
    const vehicleTypeSelect = document.getElementById('vehicleType');
    const passengersSelect = document.getElementById('passengers');
    
    // Set minimum date to today
    const eventDateInput = document.getElementById('eventDate');
    const today = new Date().toISOString().split('T')[0];
    eventDateInput.min = today;
    
    // Vehicle recommendations based on event type
    const vehicleRecommendations = {
        'wedding': ['rolls-royce-phantom', 'vintage-car', 'range-rover-executive'],
        'prom': ['porsche-cayenne-limo', 'range-rover-executive', 'mustang-gt500'],
        'corporate': ['range-rover-executive', 'rolls-royce-phantom'],
        'airport': ['range-rover-executive'],
        'music-video': ['mustang-gt500', 'rolls-royce-phantom', 'vintage-car'],
        'special-occasion': ['rolls-royce-phantom', 'range-rover-executive'],
        'birthday': ['porsche-cayenne-limo', 'mustang-gt500'],
        'anniversary': ['vintage-car', 'rolls-royce-phantom']
    };
    
    // Update vehicle recommendations based on event type
    eventTypeSelect.addEventListener('change', function() {
        const eventType = this.value;
        const recommendations = vehicleRecommendations[eventType];
        
        if (recommendations) {
            // Reset vehicle selection
            vehicleTypeSelect.value = '';
            
            // Highlight recommended vehicles
            Array.from(vehicleTypeSelect.options).forEach(option => {
                if (recommendations.includes(option.value)) {
                    option.style.fontWeight = 'bold';
                    option.style.color = '#8b5cf6';
                } else {
                    option.style.fontWeight = 'normal';
                    option.style.color = 'inherit';
                }
            });
        }
    });
    
    // Update passenger recommendations based on vehicle
    vehicleTypeSelect.addEventListener('change', function() {
        const vehicle = this.value;
        const passengerLimits = {
            'rolls-royce-phantom': 4,
            'range-rover-executive': 6,
            'porsche-cayenne-limo': 8,
            'mustang-gt500': 4,
            'vintage-car': 4
        };
        
        const maxPassengers = passengerLimits[vehicle];
        
        if (maxPassengers) {
            // Disable options beyond vehicle capacity
            Array.from(passengersSelect.options).forEach(option => {
                const passengerCount = parseInt(option.value);
                if (passengerCount > maxPassengers) {
                    option.disabled = true;
                    option.style.color = '#ccc';
                } else {
                    option.disabled = false;
                    option.style.color = 'inherit';
                }
            });
            
            // Reset if current selection exceeds capacity
            if (parseInt(passengersSelect.value) > maxPassengers) {
                passengersSelect.value = '';
            }
        }
    });
    
    // Form validation and submission
    quoteForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Collect form data
        const formData = new FormData(this);
        const quoteData = {};
        
        // Convert FormData to object
        for (let [key, value] of formData.entries()) {
            if (quoteData[key]) {
                // Handle multiple values (like checkboxes)
                if (Array.isArray(quoteData[key])) {
                    quoteData[key].push(value);
                } else {
                    quoteData[key] = [quoteData[key], value];
                }
            } else {
                quoteData[key] = value;
            }
        }
        
        // Validate required fields
        if (!validateForm(quoteData)) {
            return;
        }
        
        // Show loading state
        const submitButton = this.querySelector('button[type="submit"]');
        const originalText = submitButton.innerHTML;
        submitButton.innerHTML = '<span>Sending Quote Request...</span>';
        submitButton.disabled = true;
        
        // Simulate form submission (replace with actual submission logic)
        setTimeout(() => {
            handleFormSubmission(quoteData);
            submitButton.innerHTML = originalText;
            submitButton.disabled = false;
        }, 2000);
    });
    
    function validateForm(data) {
        const requiredFields = [
            'firstName', 'lastName', 'email', 'phone',
            'eventType', 'eventDate', 'vehicleType',
            'passengers', 'duration', 'pickupLocation', 'pickupTime'
        ];
        
        for (let field of requiredFields) {
            if (!data[field] || data[field].trim() === '') {
                showError(`Please fill in the ${field.replace(/([A-Z])/g, ' $1').toLowerCase()} field.`);
                document.getElementById(field).focus();
                return false;
            }
        }
        
        // Validate email format
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(data.email)) {
            showError('Please enter a valid email address.');
            document.getElementById('email').focus();
            return false;
        }
        
        // Validate phone format (basic)
        const phoneRegex = /^[\d\s\-\+\(\)]{10,}$/;
        if (!phoneRegex.test(data.phone)) {
            showError('Please enter a valid phone number.');
            document.getElementById('phone').focus();
            return false;
        }
        
        // Validate date is not in the past
        const eventDate = new Date(data.eventDate);
        const today = new Date();
        today.setHours(0, 0, 0, 0);
        
        if (eventDate < today) {
            showError('Event date cannot be in the past.');
            document.getElementById('eventDate').focus();
            return false;
        }
        
        return true;
    }
    
    async function handleFormSubmission(data) {
        try {
            // Show loading state
            const submitBtn = document.querySelector('button[type="submit"]');
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'Submitting...';
            submitBtn.disabled = true;
            
            // Send data to server
            const response = await fetch('submit-quote.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(data)
            });
            
            const result = await response.json();
            
            if (result.success) {
                // Create quote summary with server response
                const quoteSummary = generateQuoteSummary(data, result.quote_ref);
                
                // Show success message
                showSuccessMessage(quoteSummary);
                
                // Clear the form after successful submission
                quoteForm.reset();
            } else {
                throw new Error(result.message || 'Failed to submit quote request');
            }
            
            // Reset button
            submitBtn.textContent = originalText;
            submitBtn.disabled = false;
            
        } catch (error) {
            console.error('Error submitting quote:', error);
            
            // Show error message
            alert('Sorry, there was an error submitting your quote request. Please try again or contact us directly.');
            
            // Reset button
            const submitBtn = document.querySelector('button[type="submit"]');
            submitBtn.textContent = 'Submit Quote Request';
            submitBtn.disabled = false;
        }
    }
    
    function generateQuoteSummary(data, quoteRef) {
        const vehicleNames = {
            'rolls-royce-phantom': 'Rolls Royce Phantom',
            'range-rover-executive': 'Range Rover Executive LWB SVO',
            'porsche-cayenne-limo': 'Porsche Cayenne Limousine',
            'mustang-gt500': 'Limited Edition Mustang GT500',
            'vintage-car': '1930\'s Vintage Car'
        };
        
        const eventNames = {
            'wedding': 'Wedding',
            'prom': 'Prom/Graduation',
            'corporate': 'Corporate/Business',
            'airport': 'Airport Transfer',
            'music-video': 'Music Video/Photoshoot',
            'special-occasion': 'Special Occasion',
            'birthday': 'Birthday Celebration',
            'anniversary': 'Anniversary',
            'other': 'Other Event'
        };
        
        return {
            reference: quoteRef,
            customerName: `${data.firstName} ${data.lastName}`,
            email: data.email,
            phone: data.phone,
            eventType: eventNames[data.eventType] || data.eventType,
            eventDate: new Date(data.eventDate).toLocaleDateString('en-GB'),
            vehicle: vehicleNames[data.vehicleType] || data.vehicleType,
            passengers: data.passengers,
            duration: data.duration,
            pickupLocation: data.pickupLocation,
            pickupTime: data.pickupTime,
            destination: data.destination || 'To be confirmed',
            additionalServices: Array.isArray(data.services) ? data.services : (data.services ? [data.services] : [])
        };
    }
    
    function showSuccessMessage(summary) {
        const modal = document.createElement('div');
        modal.className = 'quote-success-modal';
        modal.innerHTML = `
            <div class="modal-overlay">
                <div class="modal-content">
                    <div class="success-icon">
                        <svg width="64" height="64" viewBox="0 0 64 64" fill="none">
                            <circle cx="32" cy="32" r="32" fill="#10b981"/>
                            <path d="M20 32l8 8 16-16" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <h2>Quote Request Submitted!</h2>
                    <p>Thank you ${summary.customerName}! We've received your quote request and will respond within 30 minutes during business hours.</p>
                    
                    <div class="quote-summary">
                        <h3>Quote Summary</h3>
                        <div class="summary-grid">
                            <div class="summary-item">
                                <strong>Reference:</strong> ${summary.reference}
                            </div>
                            <div class="summary-item">
                                <strong>Event:</strong> ${summary.eventType}
                            </div>
                            <div class="summary-item">
                                <strong>Date:</strong> ${summary.eventDate}
                            </div>
                            <div class="summary-item">
                                <strong>Vehicle:</strong> ${summary.vehicle}
                            </div>
                            <div class="summary-item">
                                <strong>Passengers:</strong> ${summary.passengers}
                            </div>
                            <div class="summary-item">
                                <strong>Duration:</strong> ${summary.duration}
                            </div>
                        </div>
                    </div>
                    
                    <div class="modal-actions">
                        <button class="btn primary" onclick="this.closest('.quote-success-modal').remove()">Close</button>
                        <a href="tel:+447504040407" class="btn ghost">Call Us Now</a>
                    </div>
                </div>
            </div>
        `;
        
        document.body.appendChild(modal);
        
        // Add modal styles
        const modalStyles = document.createElement('style');
        modalStyles.textContent = `
            .quote-success-modal {
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                z-index: 10000;
                animation: modalFadeIn 0.3s ease;
            }
            
            .modal-overlay {
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: rgba(0, 0, 0, 0.85);
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 2rem;
                backdrop-filter: blur(4px);
            }
            
            .modal-content {
                background: linear-gradient(180deg, #121212, #0b0b0b);
                border: 1px solid rgba(194, 163, 59, 0.2);
                border-radius: 12px;
                padding: 3rem;
                max-width: 500px;
                width: 100%;
                text-align: center;
                max-height: 90vh;
                overflow-y: auto;
                box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
            }
            
            .success-icon {
                margin-bottom: 1.5rem;
            }
            
            .modal-content h2 {
                color: #f5f5f5;
                margin-bottom: 1rem;
                font-size: 1.75rem;
                font-weight: 600;
            }
            
            .modal-content p {
                color: #bdbdbd;
                margin-bottom: 2rem;
                line-height: 1.6;
            }
            
            .quote-summary {
                background: rgba(255, 255, 255, 0.04);
                border: 1px solid rgba(255, 255, 255, 0.1);
                border-radius: 8px;
                padding: 1.5rem;
                margin-bottom: 2rem;
                text-align: left;
            }
            
            .quote-summary h3 {
                margin-bottom: 1rem;
                color: #C2A33B;
                font-weight: 600;
            }
            
            .summary-grid {
                display: grid;
                gap: 0.75rem;
            }
            
            .summary-item {
                display: flex;
                justify-content: space-between;
                padding: 0.5rem 0;
                border-bottom: 1px solid rgba(255, 255, 255, 0.1);
                color: #f5f5f5;
            }
            
            .summary-item:last-child {
                border-bottom: none;
            }
            
            .summary-item strong {
                color: #bdbdbd;
                font-weight: 500;
            }
            
            .modal-actions {
                display: flex;
                gap: 1rem;
                justify-content: center;
                flex-wrap: wrap;
            }
            
            @keyframes modalFadeIn {
                from { opacity: 0; transform: scale(0.9); }
                to { opacity: 1; transform: scale(1); }
            }
            
            @media (max-width: 640px) {
                .modal-content {
                    padding: 2rem 1.5rem;
                }
                
                .modal-actions {
                    flex-direction: column;
                }
            }
        `;
        document.head.appendChild(modalStyles);
    }
    
    function showError(message) {
        // Remove existing error messages
        const existingErrors = document.querySelectorAll('.form-error');
        existingErrors.forEach(error => error.remove());
        
        // Create error message
        const errorDiv = document.createElement('div');
        errorDiv.className = 'form-error';
        errorDiv.textContent = message;
        errorDiv.style.cssText = `
            background: #fee2e2;
            color: #dc2626;
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            border: 1px solid #fecaca;
            font-weight: 500;
        `;
        
        // Insert at top of form
        quoteForm.insertBefore(errorDiv, quoteForm.firstChild);
        
        // Scroll to error
        errorDiv.scrollIntoView({ behavior: 'smooth', block: 'center' });
        
        // Remove error after 5 seconds
        setTimeout(() => {
            if (errorDiv.parentNode) {
                errorDiv.remove();
            }
        }, 5000);
    }
    
    // Smooth scroll for quote form anchor
    document.addEventListener('click', function(e) {
        if (e.target.closest('a[href="#quoteForm"]')) {
            e.preventDefault();
            document.getElementById('quoteForm').scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
    
    // Auto-save form data to localStorage (optional)
    const formInputs = quoteForm.querySelectorAll('input, select, textarea');
    formInputs.forEach(input => {
        // Load saved value
        const savedValue = localStorage.getItem(`quote_${input.name}`);
        if (savedValue && input.type !== 'submit') {
            if (input.type === 'checkbox') {
                input.checked = savedValue === 'true';
            } else {
                input.value = savedValue;
            }
        }
        
        // Save on change
        input.addEventListener('change', function() {
            if (this.type === 'checkbox') {
                localStorage.setItem(`quote_${this.name}`, this.checked);
            } else {
                localStorage.setItem(`quote_${this.name}`, this.value);
            }
        });
    });
    
    // Clear saved data on successful submission
    function clearSavedFormData() {
        formInputs.forEach(input => {
            localStorage.removeItem(`quote_${input.name}`);
        });
    }
});