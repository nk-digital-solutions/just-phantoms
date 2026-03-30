/* Quote page — WordPress AJAX submission */
document.addEventListener('DOMContentLoaded', function () {
    'use strict';

    var quoteForm        = document.getElementById('quoteForm');
    if (!quoteForm) return;

    var eventDateInput    = document.getElementById('eventDate');
    var eventTypeSelect   = document.getElementById('eventType');
    var vehicleTypeSelect = document.getElementById('vehicleType');
    var passengersSelect  = document.getElementById('passengers');

    // -- Set minimum date to today
    if (eventDateInput) {
        eventDateInput.min = new Date().toISOString().split('T')[0];
    }

    // -- Vehicle recommendations by event type
    var vehicleRecommendations = {
        'wedding':          ['rolls-royce-phantom', 'vintage-car', 'range-rover-executive'],
        'prom':             ['porsche-cayenne-limo', 'range-rover-executive', 'mustang-gt500'],
        'corporate':        ['range-rover-executive', 'rolls-royce-phantom'],
        'airport':          ['range-rover-executive'],
        'music-video':      ['mustang-gt500', 'rolls-royce-phantom', 'vintage-car'],
        'special-occasion': ['rolls-royce-phantom', 'range-rover-executive'],
        'birthday':         ['porsche-cayenne-limo', 'mustang-gt500'],
        'anniversary':      ['vintage-car', 'rolls-royce-phantom']
    };

    if (eventTypeSelect && vehicleTypeSelect) {
        eventTypeSelect.addEventListener('change', function () {
            var recs = vehicleRecommendations[this.value] || [];
            Array.from(vehicleTypeSelect.options).forEach(function (opt) {
                var highlighted = recs.indexOf(opt.value) !== -1;
                opt.style.fontWeight = highlighted ? 'bold'        : 'normal';
                opt.style.color      = highlighted ? 'var(--gold)' : 'inherit';
            });
        });
    }

    // -- Passenger limits by vehicle
    var passengerLimits = {
        'rolls-royce-phantom':   4,
        'range-rover-executive': 6,
        'porsche-cayenne-limo':  8,
        'mustang-gt500':         4,
        'vintage-car':           4
    };

    if (vehicleTypeSelect && passengersSelect) {
        vehicleTypeSelect.addEventListener('change', function () {
            var max = passengerLimits[this.value];
            if (!max) return;
            Array.from(passengersSelect.options).forEach(function (opt) {
                var n = parseInt(opt.value, 10);
                opt.disabled    = n > max;
                opt.style.color = n > max ? '#666' : 'inherit';
            });
            if (parseInt(passengersSelect.value, 10) > max) {
                passengersSelect.value = '';
            }
        });
    }

    // -- Form submission via WordPress AJAX
    quoteForm.addEventListener('submit', function (e) {
        e.preventDefault();

        var submitBtn    = this.querySelector('[type="submit"]');
        var originalHTML = submitBtn.innerHTML;

        // Client-side validation (matches actual form field names)
        var fullName = (document.getElementById('fullName') || {}).value || '';
        var email    = (document.getElementById('email')    || {}).value || '';
        var phone    = (document.getElementById('phone')    || {}).value || '';

        if (!fullName.trim() || !email.trim() || !phone.trim()) {
            showNotice('Please fill in all required fields.', 'error');
            return;
        }

        if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.trim())) {
            showNotice('Please enter a valid email address.', 'error');
            return;
        }

        if (!/^[\d\s\-+()]{10,}$/.test(phone.trim())) {
            showNotice('Please enter a valid phone number.', 'error');
            return;
        }

        if (eventDateInput && eventDateInput.value) {
            var chosen = new Date(eventDateInput.value);
            var today  = new Date();
            today.setHours(0, 0, 0, 0);
            if (chosen < today) {
                showNotice('Event date cannot be in the past.', 'error');
                return;
            }
        }

        // Lock the button
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<span>Sending&hellip;</span>';

        // Build FormData - nonce is already in the form via wp_nonce_field
        var data = new FormData(quoteForm);
        data.append('action', 'jp_submit_quote');

        fetch(jpVars.ajaxurl, { method: 'POST', body: data })
            .then(function (r) {
                if (!r.ok) throw new Error('HTTP ' + r.status);
                return r.json();
            })
            .then(function (res) {
                if (res.success) {
                    showNotice(res.data.message || 'Your quote request has been sent!', 'success');
                    quoteForm.reset();
                } else {
                    showNotice(
                        (res.data && res.data.message) || 'Something went wrong. Please call us directly.',
                        'error'
                    );
                }
            })
            .catch(function () {
                showNotice('Network error. Please call us directly on 07504 040 407.', 'error');
            })
            .finally(function () {
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalHTML;
            });
    });

    // -- Notice helper: uses textContent — no XSS risk
    function showNotice(message, type) {
        var existing = quoteForm.querySelector('.jp-form-notice');
        if (existing) existing.remove();

        var notice = document.createElement('p');
        notice.className = 'jp-form-notice';

        var isSuccess = type === 'success';
        notice.style.cssText = [
            'padding:.75rem 1rem',
            'border-radius:8px',
            'font-size:.95rem',
            'margin-bottom:1rem',
            isSuccess
                ? 'background:rgba(46,204,113,.15);border:1px solid rgba(46,204,113,.3);color:#2ecc71'
                : 'background:rgba(255,82,82,.15);border:1px solid rgba(255,82,82,.3);color:#ff5252'
        ].join(';');

        notice.textContent = message;
        quoteForm.insertBefore(notice, quoteForm.firstChild);
        notice.scrollIntoView({ block: 'nearest', behavior: 'smooth' });
    }
});
