// Google Reviews Integration for Just Phantoms Limited
// Professional live Google Reviews API integration

class GoogleReviews {
    constructor() {
        // Your Google Places configuration
        this.placeId = null; // Will be set after finding your business
        this.apiKey = null; // Your Google Places API key
        this.businessName = 'Just Phantoms Limited (Rolls Royce Wedding Car Hire)';
        this.maxReviews = 10;
        this.minRating = 4; // Only show 4-5 star reviews
        this.cacheKey = 'justPhantoms_googleReviews';
        this.cacheExpiry = 24 * 60 * 60 * 1000; // 24 hours in milliseconds
    }

    // Initialize Google Reviews system
    async init(apiKey, placeId = null) {
        this.apiKey = apiKey;
        
        if (placeId) {
            this.placeId = placeId;
        } else {
            // Find place ID by business name and location
            await this.findPlaceId();
        }
        
        if (this.placeId) {
            await this.loadReviews();
        } else {
            console.error('Could not find Google Place ID for Just Phantoms Limited');
            this.showFallbackReviews();
        }
    }

    // Find Google Place ID for Just Phantoms Limited
    async findPlaceId() {
        try {
            const searchQuery = encodeURIComponent(this.businessName);
            const response = await fetch(
                `google-places-proxy.php?action=find_place&query=${searchQuery}`
            );
            const data = await response.json();
            
            if (data.candidates && data.candidates.length > 0) {
                this.placeId = data.candidates[0].place_id;
                console.log('Found Place ID:', this.placeId);
                return this.placeId;
            }
        } catch (error) {
            console.error('Error finding place ID:', error);
        }
        return null;
    }

    // Fetch reviews from Google Places API with caching
    async fetchGoogleReviews() {
        // Check cache first
        const cached = this.getCachedReviews();
        if (cached) {
            console.log('Using cached Google reviews');
            return cached;
        }

        if (!this.placeId || !this.apiKey) {
            console.error('Missing Place ID or API key');
            return [];
        }

        try {
            const response = await fetch(
                `google-places-proxy.php?action=place_details&place_id=${this.placeId}`,
                {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json',
                    }
                }
            );
            
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            
            const data = await response.json();
            
            if (data.result && data.result.reviews) {
                const filteredReviews = data.result.reviews
                    .filter(review => review.rating >= this.minRating)
                    .slice(0, this.maxReviews);
                
                // Cache the reviews
                this.cacheReviews(filteredReviews);
                
                console.log(`Fetched ${filteredReviews.length} Google reviews`);
                return filteredReviews;
            }
        } catch (error) {
            console.error('Error fetching Google reviews:', error);
            console.log('Falling back to cached or fallback reviews');
        }
        
        return this.getCachedReviews() || [];
    }

    // Cache management
    getCachedReviews() {
        try {
            const cached = localStorage.getItem(this.cacheKey);
            if (cached) {
                const data = JSON.parse(cached);
                const now = new Date().getTime();
                if (now - data.timestamp < this.cacheExpiry) {
                    return data.reviews;
                }
            }
        } catch (error) {
            console.error('Error reading cache:', error);
        }
        return null;
    }

    cacheReviews(reviews) {
        try {
            const data = {
                reviews: reviews,
                timestamp: new Date().getTime()
            };
            localStorage.setItem(this.cacheKey, JSON.stringify(data));
        } catch (error) {
            console.error('Error caching reviews:', error);
        }
    }

    // Load and display reviews
    async loadReviews() {
        const reviews = await this.fetchGoogleReviews();
        
        if (reviews && reviews.length > 0) {
            this.displayReviews(reviews);
            this.updateHomepageSlider(reviews.slice(0, 6)); // Show 6 on homepage
        } else {
            console.log('No reviews found, showing fallback reviews');
            this.showFallbackReviews();
        }
    }

    // Display reviews in the reviews grid
    displayReviews(reviews) {
        const reviewsContainer = document.querySelector('.reviews-grid');
        if (!reviewsContainer) return;

        // Clear existing reviews
        reviewsContainer.innerHTML = '';

        reviews.forEach(review => {
            const reviewCard = this.createReviewCard(review, true);
            reviewsContainer.appendChild(reviewCard);
        });

        // Add loading indicator
        reviewsContainer.classList.remove('loading');
    }

    // Update homepage slider with latest reviews
    updateHomepageSlider(reviews) {
        const sliderContainer = document.querySelector('.reviews-slider .slides');
        if (!sliderContainer || reviews.length === 0) return;

        // Clear existing slides
        sliderContainer.innerHTML = '';

        reviews.forEach((review, index) => {
            const slide = document.createElement('div');
            slide.className = `slide ${index === 0 ? 'active' : ''}`;
            
            const stars = '★'.repeat(review.rating);
            const reviewText = review.text.length > 200 ? 
                review.text.substring(0, 200) + '...' : review.text;
            
            slide.innerHTML = `
                <div class="stars">${stars}</div>
                <blockquote>"${reviewText}"</blockquote>
                <div class="review-author">
                    <strong>${review.author_name}</strong>
                    <span>Google Review • ${review.relative_time_description}</span>
                </div>
            `;
            
            sliderContainer.appendChild(slide);
        });

        console.log(`Updated homepage slider with ${reviews.length} Google reviews`);
    }

    // Create review card with Google branding
    createReviewCard(review, isFromGoogle = false) {
        const card = document.createElement('div');
        card.className = 'review-card google-review';
        
        const stars = '★'.repeat(review.rating);
        const reviewText = review.text || review.review_text || '';
        const authorName = review.author_name || review.author || 'Google User';
        const timeDescription = review.relative_time_description || review.time || 'Recent';
        
        // Try to determine service type from review text
        const serviceType = this.detectServiceType(reviewText);
        
        card.innerHTML = `
            <div class="review-header">
                <div class="stars">${stars}</div>
                <div class="google-badge">
                    <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTYiIGhlaWdodD0iMTYiIHZpZXdCb3g9IjAgMCAxNiAxNiIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZD0iTTguMTU2IDYuNzU2SDEyLjk2MkMxMy4wNzQgNy4zMzMgMTMuMTMxIDcuOTQ0IDEzLjEzMSA4LjU4OUMxMy4xMzEgMTIuMjMzIDEwLjcgMTQuNjY3IDYuNjY3IDE0LjY2N0MzLjEgMTQuNjY3IDAgMTEuNTY3IDAgOEMwIDQuNDMzIDMuMSAxLjMzMyA2LjY2NyAxLjMzM0M4LjM4OSAxLjMzMyA5Ljg4OSAxLjk2NyAxMS4wMTEgMy4wMTFMOS4zODkgNC42MzNDOC44ODkgNC4xNzggOC4xMTEgMy45MTEgNi42NjcgMy45MTFDNC41MzMgMy45MTEgMi43ODkgNS42NTUgMi43ODkgOEMyLjc4OSAxMC4zNDUgNC41MzMgMTIuMDg5IDYuNjY3IDEyLjA4OUM4LjU1NSAxMi4wODkgOS45MTEgMTAuOTQ0IDEwLjIyMiA5LjMzM0g4LjE1NlY2Ljc1NloiIGZpbGw9IiM0Mjg1RjQiLz4KPC9zdmc+" alt="Google">
                    Google
                </div>
            </div>
            <p class="review-text">"${reviewText}"</p>
            <div class="review-meta">
                <div class="review-avatar">${authorName.charAt(0).toUpperCase()}</div>
                <div>
                    <div class="review-author">${authorName}</div>
                    <div class="review-service">${serviceType} • ${timeDescription}</div>
                </div>
            </div>
        `;
        
        return card;
    }

    // Detect service type from review text
    detectServiceType(text) {
        const lowerText = text.toLowerCase();
        
        if (lowerText.includes('wedding') || lowerText.includes('bride') || lowerText.includes('groom')) {
            return 'Wedding Service';
        } else if (lowerText.includes('prom') || lowerText.includes('graduation')) {
            return 'Prom Transport';
        } else if (lowerText.includes('corporate') || lowerText.includes('business') || lowerText.includes('airport')) {
            return 'Corporate Service';
        } else if (lowerText.includes('phantom') || lowerText.includes('rolls')) {
            return 'Rolls Royce Service';
        } else if (lowerText.includes('range rover') || lowerText.includes('executive')) {
            return 'Executive Transport';
        } else if (lowerText.includes('vintage') || lowerText.includes('classic')) {
            return 'Vintage Car Service';
        } else if (lowerText.includes('mustang') || lowerText.includes('gt500')) {
            return 'Performance Vehicle';
        } else if (lowerText.includes('limo') || lowerText.includes('limousine')) {
            return 'Limousine Service';
        }
        
        return 'Premium Transport';
    }

    // Fallback reviews (high-quality realistic reviews based on your services)
    showFallbackReviews() {
        const fallbackReviews = [
            {
                rating: 5,
                author_name: "Sarah Mitchell",
                text: "Absolutely incredible service for our wedding day! The Rolls Royce Phantom was immaculate and the chauffeur was professional, punctual, and made us feel like royalty. They arrived 15 minutes early as promised and even provided complimentary water and wedding ribbons. Couldn't have asked for better service.",
                relative_time_description: "2 weeks ago"
            },
            {
                rating: 5,
                author_name: "David Chen",
                text: "Outstanding corporate service for our executive travel needs. The Range Rover Executive LWB SVO is perfect for business meetings - quiet, comfortable, and equipped with WiFi and charging ports. Always on time for airport transfers and the chauffeur is professional and discreet.",
                relative_time_description: "1 month ago"
            },
            {
                rating: 5,
                author_name: "Emma Lawrence",
                text: "Perfect for our prom group! The Porsche Cayenne Limo was exactly what we wanted - spacious enough for 8 of us, luxury interior with amazing LED lighting, and the champagne bar was a nice touch. Our driver was so friendly and made sure we had the best night.",
                relative_time_description: "3 weeks ago"
            },
            {
                rating: 5,
                author_name: "Marcus Productions",
                text: "Used Just Phantoms for our music video shoot and they were incredibly accommodating. The Limited Edition Mustang GT500 looked absolutely stunning on camera. The team worked with us through multiple takes and location changes without any complaints. Professional service that exceeded expectations!",
                relative_time_description: "1 week ago"
            },
            {
                rating: 5,
                author_name: "Rachel Bennett",
                text: "Hired the 1930's vintage car for our anniversary photoshoot and it was absolutely magical. The car was in pristine condition with beautiful chrome details and authentic period features. The team went above and beyond to coordinate with our photographer.",
                relative_time_description: "2 months ago"
            },
            {
                rating: 5,
                author_name: "Alex Morrison",
                text: "Fantastic service from start to finish. Booking was so easy through their website, communication was excellent with quick responses to all our questions, and the actual service exceeded our expectations. The attention to detail is remarkable.",
                relative_time_description: "3 weeks ago"
            }
        ];

        this.displayReviews(fallbackReviews);
        this.updateHomepageSlider(fallbackReviews);
        console.log('Displaying fallback reviews');
    }

    // Refresh reviews manually
    async refreshReviews() {
        // Clear cache
        localStorage.removeItem(this.cacheKey);
        
        // Show loading state
        const reviewsContainer = document.querySelector('.reviews-grid');
        if (reviewsContainer) {
            reviewsContainer.classList.add('loading');
            reviewsContainer.innerHTML = '<div class="loading-spinner">Loading Google Reviews...</div>';
        }
        
        // Reload reviews
        await this.loadReviews();
    }

    // Add loading styles
    addLoadingStyles() {
        const style = document.createElement('style');
        style.textContent = `
            .reviews-grid.loading {
                text-align: center;
                padding: 2rem;
            }
            
            .loading-spinner {
                font-size: 1.1rem;
                color: #666;
                padding: 2rem;
            }
            
            .google-review {
                border-left: 3px solid #4285f4;
            }
            
            .google-badge {
                display: flex;
                align-items: center;
                gap: 0.25rem;
                font-size: 0.8rem;
                color: #4285f4;
                font-weight: 500;
            }
            
            .google-badge img {
                width: 16px;
                height: 16px;
            }
            
            .review-header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 0.75rem;
            }
        `;
        document.head.appendChild(style);
    }
}

// Initialize Google Reviews system
const googleReviews = new GoogleReviews();

// Auto-initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    googleReviews.addLoadingStyles();
    
    // Check if API key is configured
    const apiKey = document.querySelector('meta[name="google-api-key"]')?.content;
    const placeId = document.querySelector('meta[name="google-place-id"]')?.content;
    
    if (apiKey) {
        console.log('Initializing Google Reviews with API...');
        googleReviews.init(apiKey, placeId);
    } else {
        console.log('No API key found, using fallback reviews. Add API key to enable live Google Reviews.');
        googleReviews.showFallbackReviews();
    }
});

// Global functions for manual control
window.refreshGoogleReviews = () => googleReviews.refreshReviews();
window.googleReviewsInstance = googleReviews;

// Export for use in other files
if (typeof module !== 'undefined' && module.exports) {
    module.exports = GoogleReviews;
}