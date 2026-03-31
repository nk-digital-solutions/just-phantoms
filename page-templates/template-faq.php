<?php
/**
 * Template Name: FAQ
 * Template Post Type: page
 *
 * @package Just_Phantoms
 */

get_header(); ?>

<section class="page-hero">
  <div class="container">
    <h1>Frequently Asked Questions</h1>
    <p>Everything you need to know about booking Wedding and Prom car and Limousine hire with Just Phantoms. Need help with an Asian or English Wedding itinerary or Prom run plan? Our team can help immediately.</p>
  </div>
</section>

<section>
  <div class="container">

    <div class="faq-container">
      <div class="faq">

        <details class="item" data-category="booking">
          <summary>How far in advance should I book?</summary>
          <div class="content">
            <p>We recommend booking as early as possible, especially for peak dates like summer weekends, Prom season (April–July), and popular Wedding dates. While we can often accommodate last-minute requests, booking 2–4 weeks in advance ensures the best vehicle availability.</p>
            <p>For music videos, corporate events, or flexible dates, we can often arrange bookings with just a few days' notice.</p>
          </div>
        </details>

        <details class="item" data-category="service">
          <summary>Do you cover my area?</summary>
          <div class="content">
            <p>Yes. Our core coverage is Lancashire, Yorkshire, Cumbria, Derbyshire and Nottinghamshire, including Preston, Blackburn, Burnley, Lancaster, Blackpool, Leeds, Bradford, York, Sheffield, Carlisle, Kendal, Penrith, Derby, Chesterfield, Nottingham, Mansfield and surrounding towns.</p>
            <p>Simply share your pickup and drop-off locations when requesting a quote, and we'll confirm availability and any additional travel costs within minutes.</p>
          </div>
        </details>

        <details class="item" data-category="service">
          <summary>What's included in the hire price?</summary>
          <div class="content">
            <p>Every hire includes:</p>
            <ul>
              <li>Professional, uniformed chauffeur</li>
              <li>Freshly valeted and immaculate vehicle</li>
              <li>Complimentary bottled water</li>
              <li>Early arrival (typically 15 minutes before scheduled time)</li>
              <li>Basic route planning and timing coordination</li>
            </ul>
            <p>Wedding packages also include ribbon decoration service, and we can arrange red carpet service for special occasions at an additional cost.</p>
          </div>
        </details>

        <details class="item" data-category="booking">
          <summary>Can I make extra stops or adjust timings on the day?</summary>
          <div class="content">
            <p>Absolutely! We understand that special events can have changing requirements. Minor timing adjustments and additional stops can usually be accommodated on the day, subject to the chauffeur's schedule and additional time charges.</p>
            <p>For major route changes or significant time extensions, we recommend discussing these during the booking process to ensure transparent pricing.</p>
          </div>
        </details>

        <details class="item" data-category="booking">
          <summary>Do you offer a price-match guarantee?</summary>
          <div class="content">
            <p>Yes! If you find a like-for-like written quote from a VAT-registered company within 7 days of booking with us, we'll beat it by 10%.</p>
            <p>The quote must be for the same vehicle type, service level, date, and duration. Terms and conditions apply — contact us with the competing quote for verification.</p>
          </div>
        </details>

        <details class="item" data-category="vehicles">
          <summary>Are your vehicles insured and licensed?</summary>
          <div class="content">
            <p>Yes, all our vehicles are fully insured for commercial hire and carry appropriate licensing. Our chauffeurs hold professional driving licenses and undergo regular background checks.</p>
            <p>We maintain comprehensive insurance coverage and all vehicles are regularly serviced and inspected to the highest standards.</p>
          </div>
        </details>

        <details class="item" data-category="service">
          <summary>What happens if my chauffeur is delayed?</summary>
          <div class="content">
            <p>Punctuality is our priority — we arrive 15 minutes early as standard. In the rare event of unexpected delays (traffic, weather, mechanical issues), we'll contact you immediately with updates and estimated arrival times.</p>
            <p>We maintain backup vehicles and chauffeurs for critical events like Weddings to ensure your day isn't affected.</p>
          </div>
        </details>

        <details class="item" data-category="booking">
          <summary>What are your payment terms?</summary>
          <div class="content">
            <p>We typically require a 25% deposit to secure your booking, with the balance due 7 days before your event. We accept bank transfers, card payments, and for corporate clients we can arrange invoice payment terms.</p>
            <p>All prices are inclusive of VAT where applicable. Payment confirmations and receipts are provided for all transactions.</p>
          </div>
        </details>

        <details class="item" data-category="service">
          <summary>Can I request specific decorations or customizations?</summary>
          <div class="content">
            <p>Yes. We offer complimentary Wedding ribbons in your choice of colours, and we regularly coordinate timings and presentation preferences for both Asian and English Weddings.</p>
            <p>Please discuss your requirements during booking so we can prepare everything in advance. Some customizations may incur additional charges.</p>
          </div>
        </details>

        <details class="item" data-category="vehicles">
          <summary>Do you offer self-drive options?</summary>
          <div class="content">
            <p>Self-drive is available for select vehicles, subject to eligibility requirements including age (typically 25+), clean driving record, and comprehensive insurance verification.</p>
            <p>A security deposit is required, and a full vehicle briefing is provided. Not all vehicles in our fleet are available for self-drive — please enquire about specific models.</p>
          </div>
        </details>

        <details class="item" data-category="booking">
          <summary>What's your cancellation policy?</summary>
          <div class="content">
            <p>Cancellations made more than 14 days before your event receive a full refund minus a small administration fee. Cancellations within 14 days are subject to charges depending on the notice period.</p>
            <p>We understand that circumstances can change, especially for Weddings and special events, so we try to be as flexible as possible. Contact us to discuss your specific situation.</p>
          </div>
        </details>

        <details class="item" data-category="service">
          <summary>Are refreshments provided in the vehicles?</summary>
          <div class="content">
            <p>Complimentary bottled water is provided in all vehicles. For longer journeys or special occasions, we can arrange additional refreshments including champagne service, soft drinks, and snacks.</p>
            <p>Please let us know your preferences when booking, and we'll ensure everything is prepared for your journey.</p>
          </div>
        </details>

      </div><!-- .faq -->

      <div class="cta-section">
        <h3>Still have questions?</h3>
        <p>Our friendly team is here to help with any specific questions about your booking requirements.</p>
        <div class="cta-buttons">
          <a href="<?php echo esc_url( home_url( '/wedding-quote/' ) ); ?>" class="btn primary">Get Wedding Quote</a>
          <a href="<?php echo esc_url( home_url( '/prom-quote/' ) ); ?>" class="btn btn-prom-quote">Get Prom Quote</a>
          <a href="tel:+447504040407" class="btn btn-hero-tel">Call 07504 040 407</a>
        </div>
      </div>

    </div><!-- .faq-container -->
  </div>
</section>

<?php get_footer();
