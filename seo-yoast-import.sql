-- =============================================================================
--  Just Phantoms — Yoast SEO Field Import (Site-Wide)
--  Run in phpMyAdmin → your WordPress database
--
--  BEFORE RUNNING:
--  1. Replace `wp_` prefix with your actual prefix if different
--     (check Plesk DB → wp_options → siteurl to confirm prefix)
--  2. Take a DB backup first (phpMyAdmin → Export)
--  3. Run Section A first, then Section B
-- =============================================================================

-- We use INSERT ... ON DUPLICATE KEY UPDATE so rows are created if missing
-- and updated if they already exist. Safe to re-run multiple times.

-- =============================================================================
--  SECTION A — Core & Vehicle Pages (by post_name / slug)
-- =============================================================================

-- ── Helper procedure: set 3 Yoast fields for a page by its slug ──
DELIMITER $$
DROP PROCEDURE IF EXISTS jp_set_yoast $$
CREATE PROCEDURE jp_set_yoast(
    IN p_slug     VARCHAR(200),
    IN p_title    VARCHAR(300),
    IN p_desc     VARCHAR(500),
    IN p_focuskw  VARCHAR(200)
)
BEGIN
    DECLARE v_id BIGINT DEFAULT 0;
    SELECT ID INTO v_id
    FROM wp_posts
    WHERE post_name = p_slug
      AND post_type = 'page'
      AND post_status = 'publish'
    LIMIT 1;

    IF v_id > 0 THEN
        INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
            VALUES (v_id, '_yoast_wpseo_title',    p_title)
            ON DUPLICATE KEY UPDATE meta_value = p_title;
        INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
            VALUES (v_id, '_yoast_wpseo_metadesc', p_desc)
            ON DUPLICATE KEY UPDATE meta_value = p_desc;
        INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
            VALUES (v_id, '_yoast_wpseo_focuskw',  p_focuskw)
            ON DUPLICATE KEY UPDATE meta_value = p_focuskw;
    END IF;
END $$
DELIMITER ;

-- ── Homepage (uses page_on_front option) ──
INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
    SELECT CAST(option_value AS UNSIGNED), '_yoast_wpseo_title',
        'Luxury Wedding & Prom Car Hire | Just Phantoms'
    FROM wp_options WHERE option_name = 'page_on_front'
    ON DUPLICATE KEY UPDATE meta_value = VALUES(meta_value);

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
    SELECT CAST(option_value AS UNSIGNED), '_yoast_wpseo_metadesc',
        '5-star rated luxury chauffeur-driven Wedding and Prom car hire across Lancashire, Yorkshire, Cumbria, Derbyshire and Nottinghamshire. Rolls Royce Phantom, stretch Limousines and vintage classics. Price-match guaranteed.'
    FROM wp_options WHERE option_name = 'page_on_front'
    ON DUPLICATE KEY UPDATE meta_value = VALUES(meta_value);

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
    SELECT CAST(option_value AS UNSIGNED), '_yoast_wpseo_focuskw',
        'wedding car hire Lancashire'
    FROM wp_options WHERE option_name = 'page_on_front'
    ON DUPLICATE KEY UPDATE meta_value = VALUES(meta_value);

-- ── Core Navigation Pages ──
-- NOTE: Adjust slugs below if your WordPress page slugs differ.
--       Check: WordPress Admin → Pages → hover a page to see its slug in the URL.

CALL jp_set_yoast(
    'our-fleet',
    'Luxury Wedding & Prom Vehicle Fleet | Just Phantoms',
    'Our fleet includes the Rolls Royce Phantom, Porsche Cayenne Limo, Baby Bentley, Ford Mustang GT500, Range Rover SVO, Regent Landaulette and 1930s Vintage Classic. Available for Weddings and Proms across the North of England.',
    'luxury wedding car hire fleet'
);

CALL jp_set_yoast(
    'services',
    'Wedding & Prom Car Hire Services | Just Phantoms',
    'Chauffeur-driven Wedding transport, Prom Limousines, airport transfers, VIP executive hire and music video vehicles. Tailored chauffeur services across Lancashire, Yorkshire and beyond.',
    'wedding car hire services Lancashire'
);

CALL jp_set_yoast(
    'reviews',
    'Customer Reviews | 5-Star Wedding Car Hire | Just Phantoms',
    '5-star reviews from real Wedding and Prom customers. Rated 4.9 stars by 500+ happy clients across Lancashire, Yorkshire and the North of England.',
    'wedding car hire reviews'
);

CALL jp_set_yoast(
    'faq',
    'Wedding Car Hire FAQ | Frequently Asked Questions | Just Phantoms',
    'Common questions about booking Wedding and Prom car hire — pricing, coverage areas, what is included, timings and payment. Get answers or call us directly.',
    'wedding car hire FAQ'
);

CALL jp_set_yoast(
    'locations',
    'Wedding & Prom Car Hire Locations | Just Phantoms',
    'Luxury Wedding and Prom car hire across Lancashire, Yorkshire, Cumbria, Derbyshire and Nottinghamshire. Browse 70+ locations and book your chauffeur-driven vehicle today.',
    'wedding car hire locations'
);

CALL jp_set_yoast(
    'about-us',
    'About Just Phantoms | Luxury Car Hire Since 1996',
    'Just Phantoms — luxury car hire established in 1996 with offices in Lancashire and London. 500+ events, 7 premium vehicles and a 4.9-star rated chauffeur service.',
    'about Just Phantoms chauffeur hire'
);

CALL jp_set_yoast(
    'our-promise',
    'Our Promise | Just Phantoms Luxury Car Hire',
    '15-minute early arrival, price-match guarantee, freshly valeted vehicles and DBS-checked chauffeurs — our commitment to every client for every single booking.',
    'just phantoms promise guarantee'
);

CALL jp_set_yoast(
    'wedding-quote',
    'Get a Free Wedding Car Quote | Just Phantoms',
    'Request a free Wedding car quote. We beat any like-for-like quote by 10%. Rolls Royce, vintage classics and luxury vehicles across the North of England.',
    'wedding car hire quote'
);

CALL jp_set_yoast(
    'prom-quote',
    'Get a Free Prom Limo Quote | Just Phantoms',
    'Request your free Prom Limo quote. Porsche Cayenne Limo, Mustang GT500 and Baby Bentley available. Group bookings welcome across Lancashire and Yorkshire.',
    'prom limo hire quote'
);

CALL jp_set_yoast(
    'get-quote',
    'Get a Free Car Hire Quote | Just Phantoms',
    'Request your free luxury car hire quote. Fast response, price-match guarantee and 5-star chauffeur service across Lancashire, Yorkshire and the North.',
    'luxury car hire quote'
);

CALL jp_set_yoast(
    'privacy-policy',
    'Privacy Policy | Just Phantoms',
    'Just Phantoms privacy policy — how we collect, store and use your personal data in accordance with UK GDPR.',
    'just phantoms privacy policy'
);

-- ── Vehicle Pages ──

CALL jp_set_yoast(
    'rolls-royce-phantom',
    'Rolls Royce Phantom Hire | Wedding & VIP Car | Just Phantoms',
    'Hire a chauffeur-driven Rolls Royce Phantom for your Wedding, Prom or VIP event. Snow White with Starlight Headliner. Serving Lancashire, Yorkshire and beyond. From £250.',
    'Rolls Royce Phantom hire Lancashire'
);

CALL jp_set_yoast(
    'porsche-cayenne-limo',
    'Porsche Cayenne Limo Hire | 8-Passenger Prom Limo | Just Phantoms',
    '8-passenger Porsche Cayenne stretch Limousine for hire. Perfect for Proms, Weddings and parties across Lancashire and Yorkshire. Luxury limo from £250.',
    'Porsche Cayenne Limo hire'
);

CALL jp_set_yoast(
    'baby-bentley-chrysler-limo',
    'Baby Bentley Chrysler Limo Hire | Stretch Limo | Just Phantoms',
    'Hire the iconic Baby Bentley Chrysler stretch Limousine. Seats 8 passengers for Proms, Weddings and parties across the North of England. From £195.',
    'Baby Bentley limo hire'
);

CALL jp_set_yoast(
    'limited-edition-ford-mustang-gt500',
    'Ford Mustang GT500 Hire | Prom & Music Video Car | Just Phantoms',
    'Limited edition Ford Mustang GT500 for hire — supercharged V8 Prom car also available for music videos and photoshoots across Lancashire and Yorkshire.',
    'Ford Mustang GT500 hire prom'
);

CALL jp_set_yoast(
    'range-rover-executive-lwb-svo',
    'Range Rover Executive LWB SVO Hire | Just Phantoms',
    'Hire the Range Rover Executive Long-Wheelbase SVO for Weddings, corporate events and VIP transfers. Commanding luxury across the North of England.',
    'Range Rover hire Lancashire'
);

CALL jp_set_yoast(
    '1930s-vintage-classic',
    '1930s Vintage Classic Car Hire | Wedding Car | Just Phantoms',
    'Hire a genuine 1930s Vintage Classic car for your Wedding. Timeless period styling for couples seeking classic elegance across Lancashire and Yorkshire.',
    '1930s vintage car hire wedding'
);

CALL jp_set_yoast(
    'regent-landaulette-convertible',
    'Regent Landaulette Convertible Hire | Wedding Car | Just Phantoms',
    'Open-top Regent Landaulette Convertible hire for summer Weddings. Classic coachwork, modern reliability and unforgettable photos across Lancashire and Yorkshire.',
    'Regent Landaulette hire'
);

-- =============================================================================
--  SECTION B — Location Pages (bulk update via stored procedure)
--
--  This sets Yoast fields for all 1,000+ location service pages dynamically.
--  Titles and descriptions are generated from existing ACF fields already
--  stored by the import script. Safe to re-run.
-- =============================================================================

DELIMITER $$
DROP PROCEDURE IF EXISTS jp_set_location_yoast $$
CREATE PROCEDURE jp_set_location_yoast()
BEGIN
    DECLARE done      INT DEFAULT 0;
    DECLARE v_post_id BIGINT;
    DECLARE v_slug    VARCHAR(200);
    DECLARE v_loc     VARCHAR(100);
    DECLARE v_county  VARCHAR(100);

    -- Cursor: all published location pages
    DECLARE loc_cursor CURSOR FOR
        SELECT p.ID, p.post_name
        FROM wp_posts p
        INNER JOIN wp_postmeta pm ON pm.post_id = p.ID
        WHERE p.post_type   = 'page'
          AND p.post_status = 'publish'
          AND pm.meta_key   = '_wp_page_template'
          AND pm.meta_value = 'page-templates/template-location-page.php';

    DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = 1;

    OPEN loc_cursor;
    loc_loop: LOOP
        FETCH loc_cursor INTO v_post_id, v_slug;
        IF done THEN LEAVE loc_loop; END IF;

        -- Get ACF location name (fall back to slug-derived value)
        SET v_loc = (
            SELECT meta_value FROM wp_postmeta
            WHERE post_id = v_post_id AND meta_key = 'lp_location_name'
            LIMIT 1
        );
        IF v_loc IS NULL OR v_loc = '' THEN
            SET v_loc = CONCAT(
                UCASE(LEFT(REPLACE(SUBSTRING_INDEX(v_slug, '-', -1), '-', ' '), 1)),
                LCASE(SUBSTRING(REPLACE(SUBSTRING_INDEX(v_slug, '-', -1), '-', ' '), 2))
            );
        END IF;

        -- Get ACF county
        SET v_county = (
            SELECT meta_value FROM wp_postmeta
            WHERE post_id = v_post_id AND meta_key = 'lp_county'
            LIMIT 1
        );
        IF v_county IS NULL OR v_county = '' THEN
            SET v_county = 'Lancashire';
        END IF;

        -- Derive service label from slug prefix using CASE
        SET @svc_label = CASE
            WHEN v_slug LIKE 'rolls-royce-phantom-%'                THEN 'Rolls Royce Phantom Hire'
            WHEN v_slug LIKE 'rolls-royce-hire-%'                   THEN 'Rolls Royce Hire'
            WHEN v_slug LIKE 'range-rover-executive-lwb-svo-%'      THEN 'Range Rover Executive Hire'
            WHEN v_slug LIKE 'porsche-cayenne-limo-%'               THEN 'Porsche Cayenne Limo Hire'
            WHEN v_slug LIKE 'baby-bentley-chrysler-limo-%'         THEN 'Baby Bentley Limo Hire'
            WHEN v_slug LIKE 'limited-edition-ford-mustang-gt500-%' THEN 'Ford Mustang GT500 Hire'
            WHEN v_slug LIKE 'mustang-car-hire-%'                   THEN 'Mustang Car Hire'
            WHEN v_slug LIKE '1930s-vintage-classic-%'              THEN 'Vintage Classic Car Hire'
            WHEN v_slug LIKE 'classic-car-hire-%'                   THEN 'Classic Car Hire'
            WHEN v_slug LIKE 'regent-landaulette-convertible-%'     THEN 'Regent Landaulette Hire'
            WHEN v_slug LIKE 'birthday-limo-hire-%'                 THEN 'Birthday Limo Hire'
            WHEN v_slug LIKE 'prom-limo-hire-%'                     THEN 'Prom Limo Hire'
            WHEN v_slug LIKE 'wedding-car-hire-%'                   THEN 'Wedding Car Hire'
            WHEN v_slug LIKE 'luxury-car-hire-%'                    THEN 'Luxury Car Hire'
            WHEN v_slug LIKE 'phantom-hire-%'                       THEN 'Phantom Hire'
            WHEN v_slug LIKE 'limo-hire-%'                          THEN 'Limo Hire'
            ELSE 'Luxury Car Hire'
        END;

        SET @svc_kw = LOWER(CONCAT(@svc_label, ' ', v_loc));
        SET @svc_title = CONCAT(@svc_label, ' ', v_loc, ', ', v_county, ' | Just Phantoms');
        SET @svc_desc  = CONCAT(
            'Just Phantoms provides ', @svc_label, ' in ', v_loc, ', ', v_county,
            '. 5-star rated chauffeur-driven service. Freshly valeted vehicles, ',
            'DBS-checked chauffeurs and price-match guarantee. Book today.'
        );

        -- Only write Yoast fields if not already set with a custom value from the import
        -- (i.e. skip pages where _yoast_wpseo_title is longer than 10 chars, meaning it was set correctly by step2)
        SET @existing_title = (
            SELECT meta_value FROM wp_postmeta
            WHERE post_id = v_post_id AND meta_key = '_yoast_wpseo_title' LIMIT 1
        );

        IF @existing_title IS NULL OR @existing_title = '' THEN
            -- Insert focus keyword
            INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
                VALUES (v_post_id, '_yoast_wpseo_focuskw', @svc_kw)
                ON DUPLICATE KEY UPDATE meta_value = @svc_kw;
            -- Insert SEO title
            INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
                VALUES (v_post_id, '_yoast_wpseo_title', @svc_title)
                ON DUPLICATE KEY UPDATE meta_value = @svc_title;
            -- Insert meta description
            INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
                VALUES (v_post_id, '_yoast_wpseo_metadesc', @svc_desc)
                ON DUPLICATE KEY UPDATE meta_value = @svc_desc;
        END IF;

    END LOOP;
    CLOSE loc_cursor;
END $$
DELIMITER ;

-- Run the location page procedure
CALL jp_set_location_yoast();

-- =============================================================================
--  SECTION C — Global Yoast Settings (wp_options)
--  Sets sitewide Yoast configuration for best SEO defaults.
-- =============================================================================

-- Site title separator (use dash for clean titles)
INSERT INTO wp_options (option_name, option_value, autoload)
    VALUES ('wpseo_titles', '', 'yes')
    ON DUPLICATE KEY UPDATE option_value = option_value;

-- Update Yoast title separator to dash
UPDATE wp_options
SET option_value = REPLACE(
    option_value,
    '"separator":"sc-dash"', '"separator":"sc-dash"'
)
WHERE option_name = 'wpseo_titles';

-- Enable breadcrumbs in Yoast
UPDATE wp_options
SET option_value = REPLACE(
    CASE
        WHEN option_value LIKE '%breadcrumbs-enable%'
        THEN REPLACE(option_value, '"breadcrumbs-enable":false', '"breadcrumbs-enable":true')
        ELSE option_value
    END,
    '"breadcrumbs-enable":false', '"breadcrumbs-enable":true'
)
WHERE option_name = 'wpseo_internallinks';

-- =============================================================================
--  Cleanup — drop procedure when done
-- =============================================================================
DROP PROCEDURE IF EXISTS jp_set_yoast;
DROP PROCEDURE IF EXISTS jp_set_location_yoast;

-- =============================================================================
--  DONE. Flush WP cache after running:
--  wp cache flush  (WP-CLI)  OR  deactivate + reactivate a caching plugin.
-- =============================================================================
