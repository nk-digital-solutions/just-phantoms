INSERT INTO wregr_postmeta (post_id, meta_key, meta_value)
    SELECT CAST(option_value AS UNSIGNED), '_yoast_wpseo_title',
        'Luxury Wedding & Prom Car Hire | Just Phantoms'
    FROM wregr_options WHERE option_name = 'page_on_front'
    ON DUPLICATE KEY UPDATE meta_value = VALUES(meta_value);
INSERT INTO wregr_postmeta (post_id, meta_key, meta_value)
    SELECT CAST(option_value AS UNSIGNED), '_yoast_wpseo_metadesc',
        '5-star rated luxury chauffeur-driven Wedding and Prom car hire across Lancashire, Yorkshire, Cumbria, Derbyshire and Nottinghamshire. Rolls Royce Phantom, stretch Limousines and vintage classics. Price-match guaranteed.'
    FROM wregr_options WHERE option_name = 'page_on_front'
    ON DUPLICATE KEY UPDATE meta_value = VALUES(meta_value);
INSERT INTO wregr_postmeta (post_id, meta_key, meta_value)
    SELECT CAST(option_value AS UNSIGNED), '_yoast_wpseo_focuskw',
        'wedding car hire Lancashire'
    FROM wregr_options WHERE option_name = 'page_on_front'
    ON DUPLICATE KEY UPDATE meta_value = VALUES(meta_value);
INSERT INTO wregr_postmeta (post_id, meta_key, meta_value) SELECT ID, '_yoast_wpseo_title', 'Luxury Wedding & Prom Vehicle Fleet | Just Phantoms' FROM wregr_posts WHERE post_name = 'our-fleet' AND post_type = 'page' AND post_status = 'publish' LIMIT 1 ON DUPLICATE KEY UPDATE meta_value = VALUES(meta_value);
INSERT INTO wregr_postmeta (post_id, meta_key, meta_value) SELECT ID, '_yoast_wpseo_metadesc', 'Our fleet includes the Rolls Royce Phantom, Porsche Cayenne Limo, Baby Bentley, Ford Mustang GT500, Range Rover SVO, Regent Landaulette and 1930s Vintage Classic. Available for Weddings and Proms across the North of England.' FROM wregr_posts WHERE post_name = 'our-fleet' AND post_type = 'page' AND post_status = 'publish' LIMIT 1 ON DUPLICATE KEY UPDATE meta_value = VALUES(meta_value);
INSERT INTO wregr_postmeta (post_id, meta_key, meta_value) SELECT ID, '_yoast_wpseo_focuskw', 'luxury wedding car hire fleet' FROM wregr_posts WHERE post_name = 'our-fleet' AND post_type = 'page' AND post_status = 'publish' LIMIT 1 ON DUPLICATE KEY UPDATE meta_value = VALUES(meta_value);
INSERT INTO wregr_postmeta (post_id, meta_key, meta_value) SELECT ID, '_yoast_wpseo_title', 'Wedding & Prom Car Hire Services | Just Phantoms' FROM wregr_posts WHERE post_name = 'services' AND post_type = 'page' AND post_status = 'publish' LIMIT 1 ON DUPLICATE KEY UPDATE meta_value = VALUES(meta_value);
INSERT INTO wregr_postmeta (post_id, meta_key, meta_value) SELECT ID, '_yoast_wpseo_metadesc', 'Chauffeur-driven Wedding transport, Prom Limousines, airport transfers, VIP executive hire and music video vehicles. Tailored chauffeur services across Lancashire, Yorkshire and beyond.' FROM wregr_posts WHERE post_name = 'services' AND post_type = 'page' AND post_status = 'publish' LIMIT 1 ON DUPLICATE KEY UPDATE meta_value = VALUES(meta_value);
INSERT INTO wregr_postmeta (post_id, meta_key, meta_value) SELECT ID, '_yoast_wpseo_focuskw', 'wedding car hire services Lancashire' FROM wregr_posts WHERE post_name = 'services' AND post_type = 'page' AND post_status = 'publish' LIMIT 1 ON DUPLICATE KEY UPDATE meta_value = VALUES(meta_value);
INSERT INTO wregr_postmeta (post_id, meta_key, meta_value) SELECT ID, '_yoast_wpseo_title', 'Customer Reviews | 5-Star Wedding Car Hire | Just Phantoms' FROM wregr_posts WHERE post_name = 'reviews' AND post_type = 'page' AND post_status = 'publish' LIMIT 1 ON DUPLICATE KEY UPDATE meta_value = VALUES(meta_value);
INSERT INTO wregr_postmeta (post_id, meta_key, meta_value) SELECT ID, '_yoast_wpseo_metadesc', '5-star reviews from real Wedding and Prom customers. Rated 4.9 stars by 500+ happy clients across Lancashire, Yorkshire and the North of England.' FROM wregr_posts WHERE post_name = 'reviews' AND post_type = 'page' AND post_status = 'publish' LIMIT 1 ON DUPLICATE KEY UPDATE meta_value = VALUES(meta_value);
INSERT INTO wregr_postmeta (post_id, meta_key, meta_value) SELECT ID, '_yoast_wpseo_focuskw', 'wedding car hire reviews' FROM wregr_posts WHERE post_name = 'reviews' AND post_type = 'page' AND post_status = 'publish' LIMIT 1 ON DUPLICATE KEY UPDATE meta_value = VALUES(meta_value);
INSERT INTO wregr_postmeta (post_id, meta_key, meta_value) SELECT ID, '_yoast_wpseo_title', 'Wedding Car Hire FAQ | Frequently Asked Questions | Just Phantoms' FROM wregr_posts WHERE post_name = 'faq' AND post_type = 'page' AND post_status = 'publish' LIMIT 1 ON DUPLICATE KEY UPDATE meta_value = VALUES(meta_value);
INSERT INTO wregr_postmeta (post_id, meta_key, meta_value) SELECT ID, '_yoast_wpseo_metadesc', 'Common questions about booking Wedding and Prom car hire - pricing, coverage areas, what is included, timings and payment. Get answers or call us directly.' FROM wregr_posts WHERE post_name = 'faq' AND post_type = 'page' AND post_status = 'publish' LIMIT 1 ON DUPLICATE KEY UPDATE meta_value = VALUES(meta_value);
INSERT INTO wregr_postmeta (post_id, meta_key, meta_value) SELECT ID, '_yoast_wpseo_focuskw', 'wedding car hire FAQ' FROM wregr_posts WHERE post_name = 'faq' AND post_type = 'page' AND post_status = 'publish' LIMIT 1 ON DUPLICATE KEY UPDATE meta_value = VALUES(meta_value);
INSERT INTO wregr_postmeta (post_id, meta_key, meta_value) SELECT ID, '_yoast_wpseo_title', 'Wedding & Prom Car Hire Locations | Just Phantoms' FROM wregr_posts WHERE post_name = 'locations' AND post_type = 'page' AND post_status = 'publish' LIMIT 1 ON DUPLICATE KEY UPDATE meta_value = VALUES(meta_value);
INSERT INTO wregr_postmeta (post_id, meta_key, meta_value) SELECT ID, '_yoast_wpseo_metadesc', 'Luxury Wedding and Prom car hire across Lancashire, Yorkshire, Cumbria, Derbyshire and Nottinghamshire. Browse 70+ locations and book your chauffeur-driven vehicle today.' FROM wregr_posts WHERE post_name = 'locations' AND post_type = 'page' AND post_status = 'publish' LIMIT 1 ON DUPLICATE KEY UPDATE meta_value = VALUES(meta_value);
INSERT INTO wregr_postmeta (post_id, meta_key, meta_value) SELECT ID, '_yoast_wpseo_focuskw', 'wedding car hire locations' FROM wregr_posts WHERE post_name = 'locations' AND post_type = 'page' AND post_status = 'publish' LIMIT 1 ON DUPLICATE KEY UPDATE meta_value = VALUES(meta_value);
INSERT INTO wregr_postmeta (post_id, meta_key, meta_value) SELECT ID, '_yoast_wpseo_title', 'About Just Phantoms | Luxury Car Hire Since 1996' FROM wregr_posts WHERE post_name = 'about-us' AND post_type = 'page' AND post_status = 'publish' LIMIT 1 ON DUPLICATE KEY UPDATE meta_value = VALUES(meta_value);
INSERT INTO wregr_postmeta (post_id, meta_key, meta_value) SELECT ID, '_yoast_wpseo_metadesc', 'Just Phantoms - luxury car hire established in 1996 with offices in Lancashire and London. 500+ events, 7 premium vehicles and a 4.9-star rated chauffeur service.' FROM wregr_posts WHERE post_name = 'about-us' AND post_type = 'page' AND post_status = 'publish' LIMIT 1 ON DUPLICATE KEY UPDATE meta_value = VALUES(meta_value);
INSERT INTO wregr_postmeta (post_id, meta_key, meta_value) SELECT ID, '_yoast_wpseo_focuskw', 'about Just Phantoms chauffeur hire' FROM wregr_posts WHERE post_name = 'about-us' AND post_type = 'page' AND post_status = 'publish' LIMIT 1 ON DUPLICATE KEY UPDATE meta_value = VALUES(meta_value);
INSERT INTO wregr_postmeta (post_id, meta_key, meta_value) SELECT ID, '_yoast_wpseo_title', 'Our Promise | Just Phantoms Luxury Car Hire' FROM wregr_posts WHERE post_name = 'our-promise' AND post_type = 'page' AND post_status = 'publish' LIMIT 1 ON DUPLICATE KEY UPDATE meta_value = VALUES(meta_value);
INSERT INTO wregr_postmeta (post_id, meta_key, meta_value) SELECT ID, '_yoast_wpseo_metadesc', '15-minute early arrival, price-match guarantee, freshly valeted vehicles and DBS-checked chauffeurs - our commitment to every client for every single booking.' FROM wregr_posts WHERE post_name = 'our-promise' AND post_type = 'page' AND post_status = 'publish' LIMIT 1 ON DUPLICATE KEY UPDATE meta_value = VALUES(meta_value);
INSERT INTO wregr_postmeta (post_id, meta_key, meta_value) SELECT ID, '_yoast_wpseo_focuskw', 'just phantoms promise guarantee' FROM wregr_posts WHERE post_name = 'our-promise' AND post_type = 'page' AND post_status = 'publish' LIMIT 1 ON DUPLICATE KEY UPDATE meta_value = VALUES(meta_value);
INSERT INTO wregr_postmeta (post_id, meta_key, meta_value) SELECT ID, '_yoast_wpseo_title', 'Get a Free Wedding Car Quote | Just Phantoms' FROM wregr_posts WHERE post_name = 'wedding-quote' AND post_type = 'page' AND post_status = 'publish' LIMIT 1 ON DUPLICATE KEY UPDATE meta_value = VALUES(meta_value);
INSERT INTO wregr_postmeta (post_id, meta_key, meta_value) SELECT ID, '_yoast_wpseo_metadesc', 'Request a free Wedding car quote. We beat any like-for-like quote by 10%. Rolls Royce, vintage classics and luxury vehicles across the North of England.' FROM wregr_posts WHERE post_name = 'wedding-quote' AND post_type = 'page' AND post_status = 'publish' LIMIT 1 ON DUPLICATE KEY UPDATE meta_value = VALUES(meta_value);
INSERT INTO wregr_postmeta (post_id, meta_key, meta_value) SELECT ID, '_yoast_wpseo_focuskw', 'wedding car hire quote' FROM wregr_posts WHERE post_name = 'wedding-quote' AND post_type = 'page' AND post_status = 'publish' LIMIT 1 ON DUPLICATE KEY UPDATE meta_value = VALUES(meta_value);
INSERT INTO wregr_postmeta (post_id, meta_key, meta_value) SELECT ID, '_yoast_wpseo_title', 'Get a Free Prom Limo Quote | Just Phantoms' FROM wregr_posts WHERE post_name = 'prom-quote' AND post_type = 'page' AND post_status = 'publish' LIMIT 1 ON DUPLICATE KEY UPDATE meta_value = VALUES(meta_value);
INSERT INTO wregr_postmeta (post_id, meta_key, meta_value) SELECT ID, '_yoast_wpseo_metadesc', 'Request your free Prom Limo quote. Porsche Cayenne Limo, Mustang GT500 and Baby Bentley available. Group bookings welcome across Lancashire and Yorkshire.' FROM wregr_posts WHERE post_name = 'prom-quote' AND post_type = 'page' AND post_status = 'publish' LIMIT 1 ON DUPLICATE KEY UPDATE meta_value = VALUES(meta_value);
INSERT INTO wregr_postmeta (post_id, meta_key, meta_value) SELECT ID, '_yoast_wpseo_focuskw', 'prom limo hire quote' FROM wregr_posts WHERE post_name = 'prom-quote' AND post_type = 'page' AND post_status = 'publish' LIMIT 1 ON DUPLICATE KEY UPDATE meta_value = VALUES(meta_value);
INSERT INTO wregr_postmeta (post_id, meta_key, meta_value) SELECT ID, '_yoast_wpseo_title', 'Get a Free Car Hire Quote | Just Phantoms' FROM wregr_posts WHERE post_name = 'get-quote' AND post_type = 'page' AND post_status = 'publish' LIMIT 1 ON DUPLICATE KEY UPDATE meta_value = VALUES(meta_value);
INSERT INTO wregr_postmeta (post_id, meta_key, meta_value) SELECT ID, '_yoast_wpseo_metadesc', 'Request your free luxury car hire quote. Fast response, price-match guarantee and 5-star chauffeur service across Lancashire, Yorkshire and the North.' FROM wregr_posts WHERE post_name = 'get-quote' AND post_type = 'page' AND post_status = 'publish' LIMIT 1 ON DUPLICATE KEY UPDATE meta_value = VALUES(meta_value);
INSERT INTO wregr_postmeta (post_id, meta_key, meta_value) SELECT ID, '_yoast_wpseo_focuskw', 'luxury car hire quote' FROM wregr_posts WHERE post_name = 'get-quote' AND post_type = 'page' AND post_status = 'publish' LIMIT 1 ON DUPLICATE KEY UPDATE meta_value = VALUES(meta_value);
INSERT INTO wregr_postmeta (post_id, meta_key, meta_value) SELECT ID, '_yoast_wpseo_title', 'Privacy Policy | Just Phantoms' FROM wregr_posts WHERE post_name = 'privacy-policy' AND post_type = 'page' AND post_status = 'publish' LIMIT 1 ON DUPLICATE KEY UPDATE meta_value = VALUES(meta_value);
INSERT INTO wregr_postmeta (post_id, meta_key, meta_value) SELECT ID, '_yoast_wpseo_metadesc', 'Just Phantoms privacy policy - how we collect, store and use your personal data in accordance with UK GDPR.' FROM wregr_posts WHERE post_name = 'privacy-policy' AND post_type = 'page' AND post_status = 'publish' LIMIT 1 ON DUPLICATE KEY UPDATE meta_value = VALUES(meta_value);
INSERT INTO wregr_postmeta (post_id, meta_key, meta_value) SELECT ID, '_yoast_wpseo_focuskw', 'just phantoms privacy policy' FROM wregr_posts WHERE post_name = 'privacy-policy' AND post_type = 'page' AND post_status = 'publish' LIMIT 1 ON DUPLICATE KEY UPDATE meta_value = VALUES(meta_value);
INSERT INTO wregr_postmeta (post_id, meta_key, meta_value) SELECT ID, '_yoast_wpseo_title', 'Rolls Royce Phantom Hire | Wedding & VIP Car | Just Phantoms' FROM wregr_posts WHERE post_name = 'rolls-royce-phantom' AND post_type = 'page' AND post_status = 'publish' LIMIT 1 ON DUPLICATE KEY UPDATE meta_value = VALUES(meta_value);
INSERT INTO wregr_postmeta (post_id, meta_key, meta_value) SELECT ID, '_yoast_wpseo_metadesc', 'Hire a chauffeur-driven Rolls Royce Phantom for your Wedding, Prom or VIP event. Snow White with Starlight Headliner. Serving Lancashire, Yorkshire and beyond. From £250.' FROM wregr_posts WHERE post_name = 'rolls-royce-phantom' AND post_type = 'page' AND post_status = 'publish' LIMIT 1 ON DUPLICATE KEY UPDATE meta_value = VALUES(meta_value);
INSERT INTO wregr_postmeta (post_id, meta_key, meta_value) SELECT ID, '_yoast_wpseo_focuskw', 'Rolls Royce Phantom hire Lancashire' FROM wregr_posts WHERE post_name = 'rolls-royce-phantom' AND post_type = 'page' AND post_status = 'publish' LIMIT 1 ON DUPLICATE KEY UPDATE meta_value = VALUES(meta_value);
INSERT INTO wregr_postmeta (post_id, meta_key, meta_value) SELECT ID, '_yoast_wpseo_title', 'Porsche Cayenne Limo Hire | 8-Passenger Prom Limo | Just Phantoms' FROM wregr_posts WHERE post_name = 'porsche-cayenne-limo' AND post_type = 'page' AND post_status = 'publish' LIMIT 1 ON DUPLICATE KEY UPDATE meta_value = VALUES(meta_value);
INSERT INTO wregr_postmeta (post_id, meta_key, meta_value) SELECT ID, '_yoast_wpseo_metadesc', '8-passenger Porsche Cayenne stretch Limousine for hire. Perfect for Proms, Weddings and parties across Lancashire and Yorkshire. Luxury limo from £250.' FROM wregr_posts WHERE post_name = 'porsche-cayenne-limo' AND post_type = 'page' AND post_status = 'publish' LIMIT 1 ON DUPLICATE KEY UPDATE meta_value = VALUES(meta_value);
INSERT INTO wregr_postmeta (post_id, meta_key, meta_value) SELECT ID, '_yoast_wpseo_focuskw', 'Porsche Cayenne Limo hire' FROM wregr_posts WHERE post_name = 'porsche-cayenne-limo' AND post_type = 'page' AND post_status = 'publish' LIMIT 1 ON DUPLICATE KEY UPDATE meta_value = VALUES(meta_value);
INSERT INTO wregr_postmeta (post_id, meta_key, meta_value) SELECT ID, '_yoast_wpseo_title', 'Baby Bentley Chrysler Limo Hire | Stretch Limo | Just Phantoms' FROM wregr_posts WHERE post_name = 'baby-bentley-chrysler-limo' AND post_type = 'page' AND post_status = 'publish' LIMIT 1 ON DUPLICATE KEY UPDATE meta_value = VALUES(meta_value);
INSERT INTO wregr_postmeta (post_id, meta_key, meta_value) SELECT ID, '_yoast_wpseo_metadesc', 'Hire the iconic Baby Bentley Chrysler stretch Limousine. Seats 8 passengers for Proms, Weddings and parties across the North of England. From £195.' FROM wregr_posts WHERE post_name = 'baby-bentley-chrysler-limo' AND post_type = 'page' AND post_status = 'publish' LIMIT 1 ON DUPLICATE KEY UPDATE meta_value = VALUES(meta_value);
INSERT INTO wregr_postmeta (post_id, meta_key, meta_value) SELECT ID, '_yoast_wpseo_focuskw', 'Baby Bentley limo hire' FROM wregr_posts WHERE post_name = 'baby-bentley-chrysler-limo' AND post_type = 'page' AND post_status = 'publish' LIMIT 1 ON DUPLICATE KEY UPDATE meta_value = VALUES(meta_value);
INSERT INTO wregr_postmeta (post_id, meta_key, meta_value) SELECT ID, '_yoast_wpseo_title', 'Ford Mustang GT500 Hire | Prom & Music Video Car | Just Phantoms' FROM wregr_posts WHERE post_name = 'limited-edition-ford-mustang-gt500' AND post_type = 'page' AND post_status = 'publish' LIMIT 1 ON DUPLICATE KEY UPDATE meta_value = VALUES(meta_value);
INSERT INTO wregr_postmeta (post_id, meta_key, meta_value) SELECT ID, '_yoast_wpseo_metadesc', 'Limited edition Ford Mustang GT500 for hire - supercharged V8 Prom car also available for music videos and photoshoots across Lancashire and Yorkshire.' FROM wregr_posts WHERE post_name = 'limited-edition-ford-mustang-gt500' AND post_type = 'page' AND post_status = 'publish' LIMIT 1 ON DUPLICATE KEY UPDATE meta_value = VALUES(meta_value);
INSERT INTO wregr_postmeta (post_id, meta_key, meta_value) SELECT ID, '_yoast_wpseo_focuskw', 'Ford Mustang GT500 hire prom' FROM wregr_posts WHERE post_name = 'limited-edition-ford-mustang-gt500' AND post_type = 'page' AND post_status = 'publish' LIMIT 1 ON DUPLICATE KEY UPDATE meta_value = VALUES(meta_value);
INSERT INTO wregr_postmeta (post_id, meta_key, meta_value) SELECT ID, '_yoast_wpseo_title', 'Range Rover Executive LWB SVO Hire | Just Phantoms' FROM wregr_posts WHERE post_name = 'range-rover-executive-lwb-svo' AND post_type = 'page' AND post_status = 'publish' LIMIT 1 ON DUPLICATE KEY UPDATE meta_value = VALUES(meta_value);
INSERT INTO wregr_postmeta (post_id, meta_key, meta_value) SELECT ID, '_yoast_wpseo_metadesc', 'Hire the Range Rover Executive Long-Wheelbase SVO for Weddings, corporate events and VIP transfers. Commanding luxury across the North of England.' FROM wregr_posts WHERE post_name = 'range-rover-executive-lwb-svo' AND post_type = 'page' AND post_status = 'publish' LIMIT 1 ON DUPLICATE KEY UPDATE meta_value = VALUES(meta_value);
INSERT INTO wregr_postmeta (post_id, meta_key, meta_value) SELECT ID, '_yoast_wpseo_focuskw', 'Range Rover hire Lancashire' FROM wregr_posts WHERE post_name = 'range-rover-executive-lwb-svo' AND post_type = 'page' AND post_status = 'publish' LIMIT 1 ON DUPLICATE KEY UPDATE meta_value = VALUES(meta_value);
INSERT INTO wregr_postmeta (post_id, meta_key, meta_value) SELECT ID, '_yoast_wpseo_title', '1930s Vintage Classic Car Hire | Wedding Car | Just Phantoms' FROM wregr_posts WHERE post_name = '1930s-vintage-classic' AND post_type = 'page' AND post_status = 'publish' LIMIT 1 ON DUPLICATE KEY UPDATE meta_value = VALUES(meta_value);
INSERT INTO wregr_postmeta (post_id, meta_key, meta_value) SELECT ID, '_yoast_wpseo_metadesc', 'Hire a genuine 1930s Vintage Classic car for your Wedding. Timeless period styling for couples seeking classic elegance across Lancashire and Yorkshire.' FROM wregr_posts WHERE post_name = '1930s-vintage-classic' AND post_type = 'page' AND post_status = 'publish' LIMIT 1 ON DUPLICATE KEY UPDATE meta_value = VALUES(meta_value);
INSERT INTO wregr_postmeta (post_id, meta_key, meta_value) SELECT ID, '_yoast_wpseo_focuskw', '1930s vintage car hire wedding' FROM wregr_posts WHERE post_name = '1930s-vintage-classic' AND post_type = 'page' AND post_status = 'publish' LIMIT 1 ON DUPLICATE KEY UPDATE meta_value = VALUES(meta_value);
INSERT INTO wregr_postmeta (post_id, meta_key, meta_value) SELECT ID, '_yoast_wpseo_title', 'Regent Landaulette Convertible Hire | Wedding Car | Just Phantoms' FROM wregr_posts WHERE post_name = 'regent-landaulette-convertible' AND post_type = 'page' AND post_status = 'publish' LIMIT 1 ON DUPLICATE KEY UPDATE meta_value = VALUES(meta_value);
INSERT INTO wregr_postmeta (post_id, meta_key, meta_value) SELECT ID, '_yoast_wpseo_metadesc', 'Open-top Regent Landaulette Convertible hire for summer Weddings. Classic coachwork, modern reliability and unforgettable photos across Lancashire and Yorkshire.' FROM wregr_posts WHERE post_name = 'regent-landaulette-convertible' AND post_type = 'page' AND post_status = 'publish' LIMIT 1 ON DUPLICATE KEY UPDATE meta_value = VALUES(meta_value);
INSERT INTO wregr_postmeta (post_id, meta_key, meta_value) SELECT ID, '_yoast_wpseo_focuskw', 'Regent Landaulette hire' FROM wregr_posts WHERE post_name = 'regent-landaulette-convertible' AND post_type = 'page' AND post_status = 'publish' LIMIT 1 ON DUPLICATE KEY UPDATE meta_value = VALUES(meta_value);
INSERT INTO wregr_postmeta (post_id, meta_key, meta_value)
SELECT p.ID, '_yoast_wpseo_title',
    CONCAT(
        CASE
            WHEN p.post_name LIKE 'rolls-royce-phantom-%'                THEN 'Rolls Royce Phantom Hire'
            WHEN p.post_name LIKE 'rolls-royce-hire-%'                   THEN 'Rolls Royce Hire'
            WHEN p.post_name LIKE 'range-rover-executive-lwb-svo-%'      THEN 'Range Rover Executive Hire'
            WHEN p.post_name LIKE 'porsche-cayenne-limo-%'               THEN 'Porsche Cayenne Limo Hire'
            WHEN p.post_name LIKE 'baby-bentley-chrysler-limo-%'         THEN 'Baby Bentley Limo Hire'
            WHEN p.post_name LIKE 'limited-edition-ford-mustang-gt500-%' THEN 'Ford Mustang GT500 Hire'
            WHEN p.post_name LIKE 'mustang-car-hire-%'                   THEN 'Mustang Car Hire'
            WHEN p.post_name LIKE '1930s-vintage-classic-%'              THEN 'Vintage Classic Car Hire'
            WHEN p.post_name LIKE 'classic-car-hire-%'                   THEN 'Classic Car Hire'
            WHEN p.post_name LIKE 'regent-landaulette-convertible-%'     THEN 'Regent Landaulette Hire'
            WHEN p.post_name LIKE 'birthday-limo-hire-%'                 THEN 'Birthday Limo Hire'
            WHEN p.post_name LIKE 'prom-limo-hire-%'                     THEN 'Prom Limo Hire'
            WHEN p.post_name LIKE 'wedding-car-hire-%'                   THEN 'Wedding Car Hire'
            WHEN p.post_name LIKE 'luxury-car-hire-%'                    THEN 'Luxury Car Hire'
            WHEN p.post_name LIKE 'phantom-hire-%'                       THEN 'Phantom Hire'
            WHEN p.post_name LIKE 'limo-hire-%'                          THEN 'Limo Hire'
            ELSE 'Luxury Car Hire'
        END,
        ' ', COALESCE(NULLIF(loc.meta_value, ''), p.post_title),
        ', ', COALESCE(NULLIF(cty.meta_value, ''), 'Lancashire'),
        ' | Just Phantoms'
    )
FROM wregr_posts p
INNER JOIN wregr_postmeta tpl ON tpl.post_id = p.ID AND tpl.meta_key = '_wp_page_template' AND tpl.meta_value = 'page-templates/template-location-page.php'
LEFT JOIN wregr_postmeta loc ON loc.post_id = p.ID AND loc.meta_key = 'lp_location_name'
LEFT JOIN wregr_postmeta cty ON cty.post_id = p.ID AND cty.meta_key = 'lp_county'
LEFT JOIN wregr_postmeta ex  ON ex.post_id  = p.ID AND ex.meta_key  = '_yoast_wpseo_title'
WHERE p.post_type = 'page' AND p.post_status = 'publish'
  AND (ex.meta_value IS NULL OR ex.meta_value = '')
ON DUPLICATE KEY UPDATE meta_value = VALUES(meta_value);
INSERT INTO wregr_postmeta (post_id, meta_key, meta_value)
SELECT p.ID, '_yoast_wpseo_metadesc',
    CONCAT(
        'Book ',
        CASE
            WHEN p.post_name LIKE 'rolls-royce-phantom-%'                THEN 'Rolls Royce Phantom Hire'
            WHEN p.post_name LIKE 'rolls-royce-hire-%'                   THEN 'Rolls Royce Hire'
            WHEN p.post_name LIKE 'range-rover-executive-lwb-svo-%'      THEN 'Range Rover Executive Hire'
            WHEN p.post_name LIKE 'porsche-cayenne-limo-%'               THEN 'Porsche Cayenne Limo Hire'
            WHEN p.post_name LIKE 'baby-bentley-chrysler-limo-%'         THEN 'Baby Bentley Limo Hire'
            WHEN p.post_name LIKE 'limited-edition-ford-mustang-gt500-%' THEN 'Ford Mustang GT500 Hire'
            WHEN p.post_name LIKE 'mustang-car-hire-%'                   THEN 'Mustang Car Hire'
            WHEN p.post_name LIKE '1930s-vintage-classic-%'              THEN 'Vintage Classic Car Hire'
            WHEN p.post_name LIKE 'classic-car-hire-%'                   THEN 'Classic Car Hire'
            WHEN p.post_name LIKE 'regent-landaulette-convertible-%'     THEN 'Regent Landaulette Hire'
            WHEN p.post_name LIKE 'birthday-limo-hire-%'                 THEN 'Birthday Limo Hire'
            WHEN p.post_name LIKE 'prom-limo-hire-%'                     THEN 'Prom Limo Hire'
            WHEN p.post_name LIKE 'wedding-car-hire-%'                   THEN 'Wedding Car Hire'
            WHEN p.post_name LIKE 'luxury-car-hire-%'                    THEN 'Luxury Car Hire'
            WHEN p.post_name LIKE 'phantom-hire-%'                       THEN 'Phantom Hire'
            WHEN p.post_name LIKE 'limo-hire-%'                          THEN 'Limo Hire'
            ELSE 'Luxury Car Hire'
        END,
        ' in ', COALESCE(NULLIF(loc.meta_value, ''), p.post_title),
        ', ', COALESCE(NULLIF(cty.meta_value, ''), 'Lancashire'),
        ' with Just Phantoms. 5-star rated, DBS-checked chauffeurs, price-match guaranteed. Call 07504 040 407.'
    )
FROM wregr_posts p
INNER JOIN wregr_postmeta tpl ON tpl.post_id = p.ID AND tpl.meta_key = '_wp_page_template' AND tpl.meta_value = 'page-templates/template-location-page.php'
LEFT JOIN wregr_postmeta loc ON loc.post_id = p.ID AND loc.meta_key = 'lp_location_name'
LEFT JOIN wregr_postmeta cty ON cty.post_id = p.ID AND cty.meta_key = 'lp_county'
LEFT JOIN wregr_postmeta ex  ON ex.post_id  = p.ID AND ex.meta_key  = '_yoast_wpseo_metadesc'
WHERE p.post_type = 'page' AND p.post_status = 'publish'
  AND (ex.meta_value IS NULL OR ex.meta_value = '')
ON DUPLICATE KEY UPDATE meta_value = VALUES(meta_value);
INSERT INTO wregr_postmeta (post_id, meta_key, meta_value)
SELECT p.ID, '_yoast_wpseo_focuskw',
    LOWER(CONCAT(
        CASE
            WHEN p.post_name LIKE 'rolls-royce-phantom-%'                THEN 'Rolls Royce Phantom Hire'
            WHEN p.post_name LIKE 'rolls-royce-hire-%'                   THEN 'Rolls Royce Hire'
            WHEN p.post_name LIKE 'range-rover-executive-lwb-svo-%'      THEN 'Range Rover Executive Hire'
            WHEN p.post_name LIKE 'porsche-cayenne-limo-%'               THEN 'Porsche Cayenne Limo Hire'
            WHEN p.post_name LIKE 'baby-bentley-chrysler-limo-%'         THEN 'Baby Bentley Limo Hire'
            WHEN p.post_name LIKE 'limited-edition-ford-mustang-gt500-%' THEN 'Ford Mustang GT500 Hire'
            WHEN p.post_name LIKE 'mustang-car-hire-%'                   THEN 'Mustang Car Hire'
            WHEN p.post_name LIKE '1930s-vintage-classic-%'              THEN 'Vintage Classic Car Hire'
            WHEN p.post_name LIKE 'classic-car-hire-%'                   THEN 'Classic Car Hire'
            WHEN p.post_name LIKE 'regent-landaulette-convertible-%'     THEN 'Regent Landaulette Hire'
            WHEN p.post_name LIKE 'birthday-limo-hire-%'                 THEN 'Birthday Limo Hire'
            WHEN p.post_name LIKE 'prom-limo-hire-%'                     THEN 'Prom Limo Hire'
            WHEN p.post_name LIKE 'wedding-car-hire-%'                   THEN 'Wedding Car Hire'
            WHEN p.post_name LIKE 'luxury-car-hire-%'                    THEN 'Luxury Car Hire'
            WHEN p.post_name LIKE 'phantom-hire-%'                       THEN 'Phantom Hire'
            WHEN p.post_name LIKE 'limo-hire-%'                          THEN 'Limo Hire'
            ELSE 'luxury car hire'
        END,
        ' ', COALESCE(NULLIF(loc.meta_value, ''), p.post_title)
    ))
FROM wregr_posts p
INNER JOIN wregr_postmeta tpl ON tpl.post_id = p.ID AND tpl.meta_key = '_wp_page_template' AND tpl.meta_value = 'page-templates/template-location-page.php'
LEFT JOIN wregr_postmeta loc ON loc.post_id = p.ID AND loc.meta_key = 'lp_location_name'
LEFT JOIN wregr_postmeta ex  ON ex.post_id  = p.ID AND ex.meta_key  = '_yoast_wpseo_focuskw'
WHERE p.post_type = 'page' AND p.post_status = 'publish'
  AND (ex.meta_value IS NULL OR ex.meta_value = '')
ON DUPLICATE KEY UPDATE meta_value = VALUES(meta_value);