<?php
/**
 * Template Name: Locations
 * Template Post Type: page
 *
 * @package Just_Phantoms
 */

get_header(); ?>

<section class="page-hero loc-hero">
  <div class="container">
    <p class="eyebrow">Coverage Area</p>
    <h1>Locations We Cover</h1>
    <p class="hero-sub">Luxury Wedding and Prom car hire across Lancashire, Yorkshire, Cumbria, Derbyshire and Nottinghamshire &mdash; and beyond.</p>
  </div>
</section>

<?php
$quote_url = esc_url( home_url( '/wedding-quote/' ) );
$regions = array(
  'Lancashire'         => array( 'Preston', 'Blackburn', 'Burnley', 'Lancaster', 'Blackpool', 'Chorley', 'Leyland', 'Accrington', 'Nelson', 'Colne', 'Clitheroe', 'Morecambe', 'Fleetwood', 'Lytham St Annes', 'Skelmersdale', 'Darwen', 'Whalley', 'Rawtenstall', 'Padiham' ),
  'Greater Manchester' => array( 'Manchester', 'Salford', 'Bolton', 'Wigan', 'Bury', 'Rochdale', 'Oldham', 'Stockport', 'Liverpool' ),
  'Yorkshire'          => array( 'Leeds', 'Bradford', 'York', 'Sheffield', 'Huddersfield', 'Halifax', 'Wakefield', 'Harrogate', 'Doncaster', 'Skipton' ),
  'Cumbria'            => array( 'Carlisle', 'Kendal', 'Windermere', 'Penrith', 'Barrow-in-Furness' ),
  'Derbyshire'         => array( 'Derby', 'Chesterfield', 'Matlock', 'Buxton' ),
  'Nottinghamshire'    => array( 'Nottingham', 'Mansfield', 'Newark-on-Trent' ),
);
?>

<!-- ── Vehicles by Location ── -->
<section class="loc-section">
  <div class="container">

    <div class="loc-section-head">
      <p class="eyebrow">Our Fleet by Location</p>
      <h2>Every Vehicle &mdash; Every Area We Cover</h2>
      <div class="gold-divider"></div>
    </div>

    <p class="loc-intro">Select a vehicle below to see all the towns and cities we travel to. Towns with a dedicated location page link directly &mdash; all others link to the vehicle page. Don&rsquo;t see your area? <a href="<?php echo $quote_url; ?>">Get in touch</a> &mdash; we cover a wide radius.</p>

    <?php
    // Areas: array( 'name' => display, 'url' => location-specific page or vehicle fallback )
    $vehicles = array(
      array(
        'name' => 'Rolls Royce Phantom',
        'url'  => home_url( '/our-fleet/rolls-royce-phantom/' ),
        'desc' => 'The ultimate Wedding and VIP transport &mdash; available across Lancashire, Yorkshire, Cumbria and Nationwide.',
        'areas' => array(
          // Lancashire
          array( 'name' => 'Preston',           'url' => home_url( '/rolls-royce-phantom-preston/' ) ),
          array( 'name' => 'Blackburn',         'url' => home_url( '/rolls-royce-phantom-blackburn/' ) ),
          array( 'name' => 'Burnley',           'url' => home_url( '/rolls-royce-phantom-burnley/' ) ),
          array( 'name' => 'Lancaster',         'url' => home_url( '/rolls-royce-phantom-lancaster/' ) ),
          array( 'name' => 'Blackpool',         'url' => home_url( '/rolls-royce-phantom-blackpool/' ) ),
          array( 'name' => 'Chorley',           'url' => home_url( '/rolls-royce-phantom-chorley/' ) ),
          array( 'name' => 'Leyland',           'url' => home_url( '/rolls-royce-phantom-leyland/' ) ),
          array( 'name' => 'Accrington',        'url' => home_url( '/rolls-royce-phantom-accrington/' ) ),
          array( 'name' => 'Nelson',            'url' => home_url( '/rolls-royce-phantom-nelson/' ) ),
          array( 'name' => 'Colne',             'url' => home_url( '/rolls-royce-phantom-colne/' ) ),
          array( 'name' => 'Clitheroe',         'url' => home_url( '/rolls-royce-phantom-clitheroe/' ) ),
          array( 'name' => 'Morecambe',         'url' => home_url( '/rolls-royce-phantom-morecambe/' ) ),
          array( 'name' => 'Fleetwood',         'url' => home_url( '/rolls-royce-phantom-fleetwood/' ) ),
          array( 'name' => 'Lytham St Annes',   'url' => home_url( '/rolls-royce-phantom-lytham-st-annes/' ) ),
          array( 'name' => 'Skelmersdale',      'url' => home_url( '/rolls-royce-phantom-skelmersdale/' ) ),
          array( 'name' => 'Darwen',            'url' => home_url( '/rolls-royce-phantom-darwen/' ) ),
          array( 'name' => 'Whalley',           'url' => home_url( '/rolls-royce-phantom-whalley/' ) ),
          array( 'name' => 'Rawtenstall',       'url' => home_url( '/rolls-royce-phantom-rawtenstall/' ) ),
          array( 'name' => 'Padiham',           'url' => home_url( '/rolls-royce-phantom-padiham/' ) ),
          // Greater Manchester
          array( 'name' => 'Manchester',        'url' => home_url( '/rolls-royce-phantom-manchester/' ) ),
          array( 'name' => 'Salford',           'url' => home_url( '/rolls-royce-phantom-salford/' ) ),
          array( 'name' => 'Bolton',            'url' => home_url( '/rolls-royce-phantom-bolton/' ) ),
          array( 'name' => 'Wigan',             'url' => home_url( '/rolls-royce-phantom-wigan/' ) ),
          array( 'name' => 'Bury',              'url' => home_url( '/rolls-royce-phantom-bury/' ) ),
          array( 'name' => 'Rochdale',          'url' => home_url( '/rolls-royce-phantom-rochdale/' ) ),
          array( 'name' => 'Oldham',            'url' => home_url( '/rolls-royce-phantom-oldham/' ) ),
          array( 'name' => 'Stockport',         'url' => home_url( '/rolls-royce-phantom-stockport/' ) ),
          array( 'name' => 'Liverpool',         'url' => home_url( '/rolls-royce-phantom-liverpool/' ) ),
          // Yorkshire
          array( 'name' => 'Leeds',             'url' => home_url( '/rolls-royce-phantom-leeds/' ) ),
          array( 'name' => 'Bradford',          'url' => home_url( '/rolls-royce-phantom-bradford/' ) ),
          array( 'name' => 'York',              'url' => home_url( '/rolls-royce-phantom-york/' ) ),
          array( 'name' => 'Sheffield',         'url' => home_url( '/rolls-royce-phantom-sheffield/' ) ),
          array( 'name' => 'Huddersfield',      'url' => home_url( '/rolls-royce-phantom-huddersfield/' ) ),
          array( 'name' => 'Halifax',           'url' => home_url( '/rolls-royce-phantom-halifax/' ) ),
          array( 'name' => 'Wakefield',         'url' => home_url( '/rolls-royce-phantom-wakefield/' ) ),
          array( 'name' => 'Harrogate',         'url' => home_url( '/rolls-royce-phantom-harrogate/' ) ),
          array( 'name' => 'Doncaster',         'url' => home_url( '/rolls-royce-phantom-doncaster/' ) ),
          array( 'name' => 'Skipton',           'url' => home_url( '/rolls-royce-phantom-skipton/' ) ),
          // Cumbria
          array( 'name' => 'Carlisle',          'url' => home_url( '/rolls-royce-phantom-carlisle/' ) ),
          array( 'name' => 'Kendal',            'url' => home_url( '/rolls-royce-phantom-kendal/' ) ),
          array( 'name' => 'Windermere',        'url' => home_url( '/rolls-royce-phantom-windermere/' ) ),
          array( 'name' => 'Penrith',           'url' => home_url( '/rolls-royce-phantom-penrith/' ) ),
          array( 'name' => 'Barrow-in-Furness', 'url' => home_url( '/rolls-royce-phantom-barrow-in-furness/' ) ),
          // Derbyshire
          array( 'name' => 'Derby',             'url' => home_url( '/rolls-royce-phantom-derby/' ) ),
          array( 'name' => 'Chesterfield',      'url' => home_url( '/rolls-royce-phantom-chesterfield/' ) ),
          array( 'name' => 'Matlock',           'url' => home_url( '/rolls-royce-phantom-matlock/' ) ),
          array( 'name' => 'Buxton',            'url' => home_url( '/rolls-royce-phantom-buxton/' ) ),
          // Nottinghamshire
          array( 'name' => 'Nottingham',        'url' => home_url( '/rolls-royce-phantom-nottingham/' ) ),
          array( 'name' => 'Mansfield',         'url' => home_url( '/rolls-royce-phantom-mansfield/' ) ),
          array( 'name' => 'Newark-on-Trent',   'url' => home_url( '/rolls-royce-phantom-newark-on-trent/' ) ),
        ),
      ),
      array(
        'name' => 'Range Rover Executive LWB SVO',
        'url'  => home_url( '/our-fleet/range-rover-executive-lwb-svo/' ),
        'desc' => 'Luxury executive SUV for Weddings, Proms and airport transfers across the North of England.',
        'areas' => array(
          // Lancashire
          array( 'name' => 'Preston',           'url' => home_url( '/range-rover-executive-lwb-svo-preston/' ) ),
          array( 'name' => 'Blackburn',         'url' => home_url( '/range-rover-executive-lwb-svo-blackburn/' ) ),
          array( 'name' => 'Burnley',           'url' => home_url( '/range-rover-executive-lwb-svo-burnley/' ) ),
          array( 'name' => 'Lancaster',         'url' => home_url( '/range-rover-executive-lwb-svo-lancaster/' ) ),
          array( 'name' => 'Blackpool',         'url' => home_url( '/range-rover-executive-lwb-svo-blackpool/' ) ),
          array( 'name' => 'Chorley',           'url' => home_url( '/range-rover-executive-lwb-svo-chorley/' ) ),
          array( 'name' => 'Leyland',           'url' => home_url( '/range-rover-executive-lwb-svo-leyland/' ) ),
          array( 'name' => 'Accrington',        'url' => home_url( '/range-rover-executive-lwb-svo-accrington/' ) ),
          array( 'name' => 'Nelson',            'url' => home_url( '/range-rover-executive-lwb-svo-nelson/' ) ),
          array( 'name' => 'Colne',             'url' => home_url( '/range-rover-executive-lwb-svo-colne/' ) ),
          array( 'name' => 'Clitheroe',         'url' => home_url( '/range-rover-executive-lwb-svo-clitheroe/' ) ),
          array( 'name' => 'Morecambe',         'url' => home_url( '/range-rover-executive-lwb-svo-morecambe/' ) ),
          array( 'name' => 'Fleetwood',         'url' => home_url( '/range-rover-executive-lwb-svo-fleetwood/' ) ),
          array( 'name' => 'Lytham St Annes',   'url' => home_url( '/range-rover-executive-lwb-svo-lytham-st-annes/' ) ),
          array( 'name' => 'Skelmersdale',      'url' => home_url( '/range-rover-executive-lwb-svo-skelmersdale/' ) ),
          array( 'name' => 'Darwen',            'url' => home_url( '/range-rover-executive-lwb-svo-darwen/' ) ),
          array( 'name' => 'Whalley',           'url' => home_url( '/range-rover-executive-lwb-svo-whalley/' ) ),
          array( 'name' => 'Rawtenstall',       'url' => home_url( '/range-rover-executive-lwb-svo-rawtenstall/' ) ),
          array( 'name' => 'Padiham',           'url' => home_url( '/range-rover-executive-lwb-svo-padiham/' ) ),
          // Greater Manchester
          array( 'name' => 'Manchester',        'url' => home_url( '/range-rover-executive-lwb-svo-manchester/' ) ),
          array( 'name' => 'Salford',           'url' => home_url( '/range-rover-executive-lwb-svo-salford/' ) ),
          array( 'name' => 'Bolton',            'url' => home_url( '/range-rover-executive-lwb-svo-bolton/' ) ),
          array( 'name' => 'Wigan',             'url' => home_url( '/range-rover-executive-lwb-svo-wigan/' ) ),
          array( 'name' => 'Bury',              'url' => home_url( '/range-rover-executive-lwb-svo-bury/' ) ),
          array( 'name' => 'Rochdale',          'url' => home_url( '/range-rover-executive-lwb-svo-rochdale/' ) ),
          array( 'name' => 'Oldham',            'url' => home_url( '/range-rover-executive-lwb-svo-oldham/' ) ),
          array( 'name' => 'Stockport',         'url' => home_url( '/range-rover-executive-lwb-svo-stockport/' ) ),
          array( 'name' => 'Liverpool',         'url' => home_url( '/range-rover-executive-lwb-svo-liverpool/' ) ),
          // Yorkshire
          array( 'name' => 'Leeds',             'url' => home_url( '/range-rover-executive-lwb-svo-leeds/' ) ),
          array( 'name' => 'Bradford',          'url' => home_url( '/range-rover-executive-lwb-svo-bradford/' ) ),
          array( 'name' => 'York',              'url' => home_url( '/range-rover-executive-lwb-svo-york/' ) ),
          array( 'name' => 'Sheffield',         'url' => home_url( '/range-rover-executive-lwb-svo-sheffield/' ) ),
          array( 'name' => 'Huddersfield',      'url' => home_url( '/range-rover-executive-lwb-svo-huddersfield/' ) ),
          array( 'name' => 'Halifax',           'url' => home_url( '/range-rover-executive-lwb-svo-halifax/' ) ),
          array( 'name' => 'Wakefield',         'url' => home_url( '/range-rover-executive-lwb-svo-wakefield/' ) ),
          array( 'name' => 'Harrogate',         'url' => home_url( '/range-rover-executive-lwb-svo-harrogate/' ) ),
          array( 'name' => 'Doncaster',         'url' => home_url( '/range-rover-executive-lwb-svo-doncaster/' ) ),
          array( 'name' => 'Skipton',           'url' => home_url( '/range-rover-executive-lwb-svo-skipton/' ) ),
          // Cumbria
          array( 'name' => 'Carlisle',          'url' => home_url( '/range-rover-executive-lwb-svo-carlisle/' ) ),
          array( 'name' => 'Kendal',            'url' => home_url( '/range-rover-executive-lwb-svo-kendal/' ) ),
          array( 'name' => 'Windermere',        'url' => home_url( '/range-rover-executive-lwb-svo-windermere/' ) ),
          array( 'name' => 'Penrith',           'url' => home_url( '/range-rover-executive-lwb-svo-penrith/' ) ),
          array( 'name' => 'Barrow-in-Furness', 'url' => home_url( '/range-rover-executive-lwb-svo-barrow-in-furness/' ) ),
          // Derbyshire
          array( 'name' => 'Derby',             'url' => home_url( '/range-rover-executive-lwb-svo-derby/' ) ),
          array( 'name' => 'Chesterfield',      'url' => home_url( '/range-rover-executive-lwb-svo-chesterfield/' ) ),
          array( 'name' => 'Matlock',           'url' => home_url( '/range-rover-executive-lwb-svo-matlock/' ) ),
          array( 'name' => 'Buxton',            'url' => home_url( '/range-rover-executive-lwb-svo-buxton/' ) ),
          // Nottinghamshire
          array( 'name' => 'Nottingham',        'url' => home_url( '/range-rover-executive-lwb-svo-nottingham/' ) ),
          array( 'name' => 'Mansfield',         'url' => home_url( '/range-rover-executive-lwb-svo-mansfield/' ) ),
          array( 'name' => 'Newark-on-Trent',   'url' => home_url( '/range-rover-executive-lwb-svo-newark-on-trent/' ) ),
        ),
      ),
      array(
        'name' => 'Porsche Cayenne Limo',
        'url'  => home_url( '/our-fleet/porsche-cayenne-limo/' ),
        'desc' => 'Striking 8-passenger Limousine for Prom nights, hen parties and Wedding bridal groups.',
        'areas' => array(
          // Lancashire
          array( 'name' => 'Preston',           'url' => home_url( '/porsche-cayenne-limo-preston/' ) ),
          array( 'name' => 'Blackburn',         'url' => home_url( '/porsche-cayenne-limo-blackburn/' ) ),
          array( 'name' => 'Burnley',           'url' => home_url( '/porsche-cayenne-limo-burnley/' ) ),
          array( 'name' => 'Lancaster',         'url' => home_url( '/porsche-cayenne-limo-lancaster/' ) ),
          array( 'name' => 'Blackpool',         'url' => home_url( '/porsche-cayenne-limo-blackpool/' ) ),
          array( 'name' => 'Chorley',           'url' => home_url( '/porsche-cayenne-limo-chorley/' ) ),
          array( 'name' => 'Leyland',           'url' => home_url( '/porsche-cayenne-limo-leyland/' ) ),
          array( 'name' => 'Accrington',        'url' => home_url( '/porsche-cayenne-limo-accrington/' ) ),
          array( 'name' => 'Nelson',            'url' => home_url( '/porsche-cayenne-limo-nelson/' ) ),
          array( 'name' => 'Colne',             'url' => home_url( '/porsche-cayenne-limo-colne/' ) ),
          array( 'name' => 'Clitheroe',         'url' => home_url( '/porsche-cayenne-limo-clitheroe/' ) ),
          array( 'name' => 'Morecambe',         'url' => home_url( '/porsche-cayenne-limo-morecambe/' ) ),
          array( 'name' => 'Fleetwood',         'url' => home_url( '/porsche-cayenne-limo-fleetwood/' ) ),
          array( 'name' => 'Lytham St Annes',   'url' => home_url( '/porsche-cayenne-limo-lytham-st-annes/' ) ),
          array( 'name' => 'Skelmersdale',      'url' => home_url( '/porsche-cayenne-limo-skelmersdale/' ) ),
          array( 'name' => 'Darwen',            'url' => home_url( '/porsche-cayenne-limo-darwen/' ) ),
          array( 'name' => 'Whalley',           'url' => home_url( '/porsche-cayenne-limo-whalley/' ) ),
          array( 'name' => 'Rawtenstall',       'url' => home_url( '/porsche-cayenne-limo-rawtenstall/' ) ),
          array( 'name' => 'Padiham',           'url' => home_url( '/porsche-cayenne-limo-padiham/' ) ),
          // Greater Manchester
          array( 'name' => 'Manchester',        'url' => home_url( '/porsche-cayenne-limo-manchester/' ) ),
          array( 'name' => 'Salford',           'url' => home_url( '/porsche-cayenne-limo-salford/' ) ),
          array( 'name' => 'Bolton',            'url' => home_url( '/porsche-cayenne-limo-bolton/' ) ),
          array( 'name' => 'Wigan',             'url' => home_url( '/porsche-cayenne-limo-wigan/' ) ),
          array( 'name' => 'Bury',              'url' => home_url( '/porsche-cayenne-limo-bury/' ) ),
          array( 'name' => 'Rochdale',          'url' => home_url( '/porsche-cayenne-limo-rochdale/' ) ),
          array( 'name' => 'Oldham',            'url' => home_url( '/porsche-cayenne-limo-oldham/' ) ),
          array( 'name' => 'Stockport',         'url' => home_url( '/porsche-cayenne-limo-stockport/' ) ),
          array( 'name' => 'Liverpool',         'url' => home_url( '/porsche-cayenne-limo-liverpool/' ) ),
          // Yorkshire
          array( 'name' => 'Leeds',             'url' => home_url( '/porsche-cayenne-limo-leeds/' ) ),
          array( 'name' => 'Bradford',          'url' => home_url( '/porsche-cayenne-limo-bradford/' ) ),
          array( 'name' => 'York',              'url' => home_url( '/porsche-cayenne-limo-york/' ) ),
          array( 'name' => 'Sheffield',         'url' => home_url( '/porsche-cayenne-limo-sheffield/' ) ),
          array( 'name' => 'Huddersfield',      'url' => home_url( '/porsche-cayenne-limo-huddersfield/' ) ),
          array( 'name' => 'Halifax',           'url' => home_url( '/porsche-cayenne-limo-halifax/' ) ),
          array( 'name' => 'Wakefield',         'url' => home_url( '/porsche-cayenne-limo-wakefield/' ) ),
          array( 'name' => 'Harrogate',         'url' => home_url( '/porsche-cayenne-limo-harrogate/' ) ),
          array( 'name' => 'Doncaster',         'url' => home_url( '/porsche-cayenne-limo-doncaster/' ) ),
          array( 'name' => 'Skipton',           'url' => home_url( '/porsche-cayenne-limo-skipton/' ) ),
          // Cumbria
          array( 'name' => 'Carlisle',          'url' => home_url( '/porsche-cayenne-limo-carlisle/' ) ),
          array( 'name' => 'Kendal',            'url' => home_url( '/porsche-cayenne-limo-kendal/' ) ),
          array( 'name' => 'Windermere',        'url' => home_url( '/porsche-cayenne-limo-windermere/' ) ),
          array( 'name' => 'Penrith',           'url' => home_url( '/porsche-cayenne-limo-penrith/' ) ),
          array( 'name' => 'Barrow-in-Furness', 'url' => home_url( '/porsche-cayenne-limo-barrow-in-furness/' ) ),
          // Derbyshire
          array( 'name' => 'Derby',             'url' => home_url( '/porsche-cayenne-limo-derby/' ) ),
          array( 'name' => 'Chesterfield',      'url' => home_url( '/porsche-cayenne-limo-chesterfield/' ) ),
          array( 'name' => 'Matlock',           'url' => home_url( '/porsche-cayenne-limo-matlock/' ) ),
          array( 'name' => 'Buxton',            'url' => home_url( '/porsche-cayenne-limo-buxton/' ) ),
          // Nottinghamshire
          array( 'name' => 'Nottingham',        'url' => home_url( '/porsche-cayenne-limo-nottingham/' ) ),
          array( 'name' => 'Mansfield',         'url' => home_url( '/porsche-cayenne-limo-mansfield/' ) ),
          array( 'name' => 'Newark-on-Trent',   'url' => home_url( '/porsche-cayenne-limo-newark-on-trent/' ) ),
        ),
      ),
      array(
        'name' => 'Baby Bentley Chrysler Limo',
        'url'  => home_url( '/our-fleet/baby-bentley-chrysler-limo/' ),
        'desc' => 'The &ldquo;Baby Bentley&rdquo; stretch Limo &mdash; 8 passengers, ideal for Prom and Wedding parties.',
        'areas' => array(
          // Lancashire
          array( 'name' => 'Preston',           'url' => home_url( '/baby-bentley-chrysler-limo-preston/' ) ),
          array( 'name' => 'Blackburn',         'url' => home_url( '/baby-bentley-chrysler-limo-blackburn/' ) ),
          array( 'name' => 'Burnley',           'url' => home_url( '/baby-bentley-chrysler-limo-burnley/' ) ),
          array( 'name' => 'Lancaster',         'url' => home_url( '/baby-bentley-chrysler-limo-lancaster/' ) ),
          array( 'name' => 'Blackpool',         'url' => home_url( '/baby-bentley-chrysler-limo-blackpool/' ) ),
          array( 'name' => 'Chorley',           'url' => home_url( '/baby-bentley-chrysler-limo-chorley/' ) ),
          array( 'name' => 'Leyland',           'url' => home_url( '/baby-bentley-chrysler-limo-leyland/' ) ),
          array( 'name' => 'Accrington',        'url' => home_url( '/baby-bentley-chrysler-limo-accrington/' ) ),
          array( 'name' => 'Nelson',            'url' => home_url( '/baby-bentley-chrysler-limo-nelson/' ) ),
          array( 'name' => 'Colne',             'url' => home_url( '/baby-bentley-chrysler-limo-colne/' ) ),
          array( 'name' => 'Clitheroe',         'url' => home_url( '/baby-bentley-chrysler-limo-clitheroe/' ) ),
          array( 'name' => 'Morecambe',         'url' => home_url( '/baby-bentley-chrysler-limo-morecambe/' ) ),
          array( 'name' => 'Fleetwood',         'url' => home_url( '/baby-bentley-chrysler-limo-fleetwood/' ) ),
          array( 'name' => 'Lytham St Annes',   'url' => home_url( '/baby-bentley-chrysler-limo-lytham-st-annes/' ) ),
          array( 'name' => 'Skelmersdale',      'url' => home_url( '/baby-bentley-chrysler-limo-skelmersdale/' ) ),
          array( 'name' => 'Darwen',            'url' => home_url( '/baby-bentley-chrysler-limo-darwen/' ) ),
          array( 'name' => 'Whalley',           'url' => home_url( '/baby-bentley-chrysler-limo-whalley/' ) ),
          array( 'name' => 'Rawtenstall',       'url' => home_url( '/baby-bentley-chrysler-limo-rawtenstall/' ) ),
          array( 'name' => 'Padiham',           'url' => home_url( '/baby-bentley-chrysler-limo-padiham/' ) ),
          // Greater Manchester
          array( 'name' => 'Manchester',        'url' => home_url( '/baby-bentley-chrysler-limo-manchester/' ) ),
          array( 'name' => 'Salford',           'url' => home_url( '/baby-bentley-chrysler-limo-salford/' ) ),
          array( 'name' => 'Bolton',            'url' => home_url( '/baby-bentley-chrysler-limo-bolton/' ) ),
          array( 'name' => 'Wigan',             'url' => home_url( '/baby-bentley-chrysler-limo-wigan/' ) ),
          array( 'name' => 'Bury',              'url' => home_url( '/baby-bentley-chrysler-limo-bury/' ) ),
          array( 'name' => 'Rochdale',          'url' => home_url( '/baby-bentley-chrysler-limo-rochdale/' ) ),
          array( 'name' => 'Oldham',            'url' => home_url( '/baby-bentley-chrysler-limo-oldham/' ) ),
          array( 'name' => 'Stockport',         'url' => home_url( '/baby-bentley-chrysler-limo-stockport/' ) ),
          array( 'name' => 'Liverpool',         'url' => home_url( '/baby-bentley-chrysler-limo-liverpool/' ) ),
          // Yorkshire
          array( 'name' => 'Leeds',             'url' => home_url( '/baby-bentley-chrysler-limo-leeds/' ) ),
          array( 'name' => 'Bradford',          'url' => home_url( '/baby-bentley-chrysler-limo-bradford/' ) ),
          array( 'name' => 'York',              'url' => home_url( '/baby-bentley-chrysler-limo-york/' ) ),
          array( 'name' => 'Sheffield',         'url' => home_url( '/baby-bentley-chrysler-limo-sheffield/' ) ),
          array( 'name' => 'Huddersfield',      'url' => home_url( '/baby-bentley-chrysler-limo-huddersfield/' ) ),
          array( 'name' => 'Halifax',           'url' => home_url( '/baby-bentley-chrysler-limo-halifax/' ) ),
          array( 'name' => 'Wakefield',         'url' => home_url( '/baby-bentley-chrysler-limo-wakefield/' ) ),
          array( 'name' => 'Harrogate',         'url' => home_url( '/baby-bentley-chrysler-limo-harrogate/' ) ),
          array( 'name' => 'Doncaster',         'url' => home_url( '/baby-bentley-chrysler-limo-doncaster/' ) ),
          array( 'name' => 'Skipton',           'url' => home_url( '/baby-bentley-chrysler-limo-skipton/' ) ),
          // Cumbria
          array( 'name' => 'Carlisle',          'url' => home_url( '/baby-bentley-chrysler-limo-carlisle/' ) ),
          array( 'name' => 'Kendal',            'url' => home_url( '/baby-bentley-chrysler-limo-kendal/' ) ),
          array( 'name' => 'Windermere',        'url' => home_url( '/baby-bentley-chrysler-limo-windermere/' ) ),
          array( 'name' => 'Penrith',           'url' => home_url( '/baby-bentley-chrysler-limo-penrith/' ) ),
          array( 'name' => 'Barrow-in-Furness', 'url' => home_url( '/baby-bentley-chrysler-limo-barrow-in-furness/' ) ),
          // Derbyshire
          array( 'name' => 'Derby',             'url' => home_url( '/baby-bentley-chrysler-limo-derby/' ) ),
          array( 'name' => 'Chesterfield',      'url' => home_url( '/baby-bentley-chrysler-limo-chesterfield/' ) ),
          array( 'name' => 'Matlock',           'url' => home_url( '/baby-bentley-chrysler-limo-matlock/' ) ),
          array( 'name' => 'Buxton',            'url' => home_url( '/baby-bentley-chrysler-limo-buxton/' ) ),
          // Nottinghamshire
          array( 'name' => 'Nottingham',        'url' => home_url( '/baby-bentley-chrysler-limo-nottingham/' ) ),
          array( 'name' => 'Mansfield',         'url' => home_url( '/baby-bentley-chrysler-limo-mansfield/' ) ),
          array( 'name' => 'Newark-on-Trent',   'url' => home_url( '/baby-bentley-chrysler-limo-newark-on-trent/' ) ),
        ),
      ),
      array(
        'name' => 'Limited Edition Ford Mustang GT500',
        'url'  => home_url( '/our-fleet/limited-edition-ford-mustang-gt500/' ),
        'desc' => 'Supercharged V8 performance car for music videos, photoshoots and Prom arrivals.',
        'areas' => array(
          // Lancashire
          array( 'name' => 'Preston',           'url' => home_url( '/limited-edition-ford-mustang-gt500-preston/' ) ),
          array( 'name' => 'Blackburn',         'url' => home_url( '/limited-edition-ford-mustang-gt500-blackburn/' ) ),
          array( 'name' => 'Burnley',           'url' => home_url( '/limited-edition-ford-mustang-gt500-burnley/' ) ),
          array( 'name' => 'Lancaster',         'url' => home_url( '/limited-edition-ford-mustang-gt500-lancaster/' ) ),
          array( 'name' => 'Blackpool',         'url' => home_url( '/limited-edition-ford-mustang-gt500-blackpool/' ) ),
          array( 'name' => 'Chorley',           'url' => home_url( '/limited-edition-ford-mustang-gt500-chorley/' ) ),
          array( 'name' => 'Leyland',           'url' => home_url( '/limited-edition-ford-mustang-gt500-leyland/' ) ),
          array( 'name' => 'Accrington',        'url' => home_url( '/limited-edition-ford-mustang-gt500-accrington/' ) ),
          array( 'name' => 'Nelson',            'url' => home_url( '/limited-edition-ford-mustang-gt500-nelson/' ) ),
          array( 'name' => 'Colne',             'url' => home_url( '/limited-edition-ford-mustang-gt500-colne/' ) ),
          array( 'name' => 'Clitheroe',         'url' => home_url( '/limited-edition-ford-mustang-gt500-clitheroe/' ) ),
          array( 'name' => 'Morecambe',         'url' => home_url( '/limited-edition-ford-mustang-gt500-morecambe/' ) ),
          array( 'name' => 'Fleetwood',         'url' => home_url( '/limited-edition-ford-mustang-gt500-fleetwood/' ) ),
          array( 'name' => 'Lytham St Annes',   'url' => home_url( '/limited-edition-ford-mustang-gt500-lytham-st-annes/' ) ),
          array( 'name' => 'Skelmersdale',      'url' => home_url( '/limited-edition-ford-mustang-gt500-skelmersdale/' ) ),
          array( 'name' => 'Darwen',            'url' => home_url( '/limited-edition-ford-mustang-gt500-darwen/' ) ),
          array( 'name' => 'Whalley',           'url' => home_url( '/limited-edition-ford-mustang-gt500-whalley/' ) ),
          array( 'name' => 'Rawtenstall',       'url' => home_url( '/limited-edition-ford-mustang-gt500-rawtenstall/' ) ),
          array( 'name' => 'Padiham',           'url' => home_url( '/limited-edition-ford-mustang-gt500-padiham/' ) ),
          // Greater Manchester
          array( 'name' => 'Manchester',        'url' => home_url( '/limited-edition-ford-mustang-gt500-manchester/' ) ),
          array( 'name' => 'Salford',           'url' => home_url( '/limited-edition-ford-mustang-gt500-salford/' ) ),
          array( 'name' => 'Bolton',            'url' => home_url( '/limited-edition-ford-mustang-gt500-bolton/' ) ),
          array( 'name' => 'Wigan',             'url' => home_url( '/limited-edition-ford-mustang-gt500-wigan/' ) ),
          array( 'name' => 'Bury',              'url' => home_url( '/limited-edition-ford-mustang-gt500-bury/' ) ),
          array( 'name' => 'Rochdale',          'url' => home_url( '/limited-edition-ford-mustang-gt500-rochdale/' ) ),
          array( 'name' => 'Oldham',            'url' => home_url( '/limited-edition-ford-mustang-gt500-oldham/' ) ),
          array( 'name' => 'Stockport',         'url' => home_url( '/limited-edition-ford-mustang-gt500-stockport/' ) ),
          array( 'name' => 'Liverpool',         'url' => home_url( '/limited-edition-ford-mustang-gt500-liverpool/' ) ),
          // Yorkshire
          array( 'name' => 'Leeds',             'url' => home_url( '/limited-edition-ford-mustang-gt500-leeds/' ) ),
          array( 'name' => 'Bradford',          'url' => home_url( '/limited-edition-ford-mustang-gt500-bradford/' ) ),
          array( 'name' => 'York',              'url' => home_url( '/limited-edition-ford-mustang-gt500-york/' ) ),
          array( 'name' => 'Sheffield',         'url' => home_url( '/limited-edition-ford-mustang-gt500-sheffield/' ) ),
          array( 'name' => 'Huddersfield',      'url' => home_url( '/limited-edition-ford-mustang-gt500-huddersfield/' ) ),
          array( 'name' => 'Halifax',           'url' => home_url( '/limited-edition-ford-mustang-gt500-halifax/' ) ),
          array( 'name' => 'Wakefield',         'url' => home_url( '/limited-edition-ford-mustang-gt500-wakefield/' ) ),
          array( 'name' => 'Harrogate',         'url' => home_url( '/limited-edition-ford-mustang-gt500-harrogate/' ) ),
          array( 'name' => 'Doncaster',         'url' => home_url( '/limited-edition-ford-mustang-gt500-doncaster/' ) ),
          array( 'name' => 'Skipton',           'url' => home_url( '/limited-edition-ford-mustang-gt500-skipton/' ) ),
          // Cumbria
          array( 'name' => 'Carlisle',          'url' => home_url( '/limited-edition-ford-mustang-gt500-carlisle/' ) ),
          array( 'name' => 'Kendal',            'url' => home_url( '/limited-edition-ford-mustang-gt500-kendal/' ) ),
          array( 'name' => 'Windermere',        'url' => home_url( '/limited-edition-ford-mustang-gt500-windermere/' ) ),
          array( 'name' => 'Penrith',           'url' => home_url( '/limited-edition-ford-mustang-gt500-penrith/' ) ),
          array( 'name' => 'Barrow-in-Furness', 'url' => home_url( '/limited-edition-ford-mustang-gt500-barrow-in-furness/' ) ),
          // Derbyshire
          array( 'name' => 'Derby',             'url' => home_url( '/limited-edition-ford-mustang-gt500-derby/' ) ),
          array( 'name' => 'Chesterfield',      'url' => home_url( '/limited-edition-ford-mustang-gt500-chesterfield/' ) ),
          array( 'name' => 'Matlock',           'url' => home_url( '/limited-edition-ford-mustang-gt500-matlock/' ) ),
          array( 'name' => 'Buxton',            'url' => home_url( '/limited-edition-ford-mustang-gt500-buxton/' ) ),
          // Nottinghamshire
          array( 'name' => 'Nottingham',        'url' => home_url( '/limited-edition-ford-mustang-gt500-nottingham/' ) ),
          array( 'name' => 'Mansfield',         'url' => home_url( '/limited-edition-ford-mustang-gt500-mansfield/' ) ),
          array( 'name' => 'Newark-on-Trent',   'url' => home_url( '/limited-edition-ford-mustang-gt500-newark-on-trent/' ) ),
        ),
      ),
      array(
        'name' => "1930's Vintage Classic Car",
        'url'  => home_url( '/our-fleet/1930s-vintage-classic/' ),
        'desc' => 'Timeless period styling for vintage-themed Weddings and classic car photoshoots.',
        'areas' => array(
          // Lancashire
          array( 'name' => 'Preston',           'url' => home_url( '/1930s-vintage-classic-preston/' ) ),
          array( 'name' => 'Blackburn',         'url' => home_url( '/1930s-vintage-classic-blackburn/' ) ),
          array( 'name' => 'Burnley',           'url' => home_url( '/1930s-vintage-classic-burnley/' ) ),
          array( 'name' => 'Lancaster',         'url' => home_url( '/1930s-vintage-classic-lancaster/' ) ),
          array( 'name' => 'Blackpool',         'url' => home_url( '/1930s-vintage-classic-blackpool/' ) ),
          array( 'name' => 'Chorley',           'url' => home_url( '/1930s-vintage-classic-chorley/' ) ),
          array( 'name' => 'Leyland',           'url' => home_url( '/1930s-vintage-classic-leyland/' ) ),
          array( 'name' => 'Accrington',        'url' => home_url( '/1930s-vintage-classic-accrington/' ) ),
          array( 'name' => 'Nelson',            'url' => home_url( '/1930s-vintage-classic-nelson/' ) ),
          array( 'name' => 'Colne',             'url' => home_url( '/1930s-vintage-classic-colne/' ) ),
          array( 'name' => 'Clitheroe',         'url' => home_url( '/1930s-vintage-classic-clitheroe/' ) ),
          array( 'name' => 'Morecambe',         'url' => home_url( '/1930s-vintage-classic-morecambe/' ) ),
          array( 'name' => 'Fleetwood',         'url' => home_url( '/1930s-vintage-classic-fleetwood/' ) ),
          array( 'name' => 'Lytham St Annes',   'url' => home_url( '/1930s-vintage-classic-lytham-st-annes/' ) ),
          array( 'name' => 'Skelmersdale',      'url' => home_url( '/1930s-vintage-classic-skelmersdale/' ) ),
          array( 'name' => 'Darwen',            'url' => home_url( '/1930s-vintage-classic-darwen/' ) ),
          array( 'name' => 'Whalley',           'url' => home_url( '/1930s-vintage-classic-whalley/' ) ),
          array( 'name' => 'Rawtenstall',       'url' => home_url( '/1930s-vintage-classic-rawtenstall/' ) ),
          array( 'name' => 'Padiham',           'url' => home_url( '/1930s-vintage-classic-padiham/' ) ),
          // Greater Manchester
          array( 'name' => 'Manchester',        'url' => home_url( '/1930s-vintage-classic-manchester/' ) ),
          array( 'name' => 'Salford',           'url' => home_url( '/1930s-vintage-classic-salford/' ) ),
          array( 'name' => 'Bolton',            'url' => home_url( '/1930s-vintage-classic-bolton/' ) ),
          array( 'name' => 'Wigan',             'url' => home_url( '/1930s-vintage-classic-wigan/' ) ),
          array( 'name' => 'Bury',              'url' => home_url( '/1930s-vintage-classic-bury/' ) ),
          array( 'name' => 'Rochdale',          'url' => home_url( '/1930s-vintage-classic-rochdale/' ) ),
          array( 'name' => 'Oldham',            'url' => home_url( '/1930s-vintage-classic-oldham/' ) ),
          array( 'name' => 'Stockport',         'url' => home_url( '/1930s-vintage-classic-stockport/' ) ),
          array( 'name' => 'Liverpool',         'url' => home_url( '/1930s-vintage-classic-liverpool/' ) ),
          // Yorkshire
          array( 'name' => 'Leeds',             'url' => home_url( '/1930s-vintage-classic-leeds/' ) ),
          array( 'name' => 'Bradford',          'url' => home_url( '/1930s-vintage-classic-bradford/' ) ),
          array( 'name' => 'York',              'url' => home_url( '/1930s-vintage-classic-york/' ) ),
          array( 'name' => 'Sheffield',         'url' => home_url( '/1930s-vintage-classic-sheffield/' ) ),
          array( 'name' => 'Huddersfield',      'url' => home_url( '/1930s-vintage-classic-huddersfield/' ) ),
          array( 'name' => 'Halifax',           'url' => home_url( '/1930s-vintage-classic-halifax/' ) ),
          array( 'name' => 'Wakefield',         'url' => home_url( '/1930s-vintage-classic-wakefield/' ) ),
          array( 'name' => 'Harrogate',         'url' => home_url( '/1930s-vintage-classic-harrogate/' ) ),
          array( 'name' => 'Doncaster',         'url' => home_url( '/1930s-vintage-classic-doncaster/' ) ),
          array( 'name' => 'Skipton',           'url' => home_url( '/1930s-vintage-classic-skipton/' ) ),
          // Cumbria
          array( 'name' => 'Carlisle',          'url' => home_url( '/1930s-vintage-classic-carlisle/' ) ),
          array( 'name' => 'Kendal',            'url' => home_url( '/1930s-vintage-classic-kendal/' ) ),
          array( 'name' => 'Windermere',        'url' => home_url( '/1930s-vintage-classic-windermere/' ) ),
          array( 'name' => 'Penrith',           'url' => home_url( '/1930s-vintage-classic-penrith/' ) ),
          array( 'name' => 'Barrow-in-Furness', 'url' => home_url( '/1930s-vintage-classic-barrow-in-furness/' ) ),
          // Derbyshire
          array( 'name' => 'Derby',             'url' => home_url( '/1930s-vintage-classic-derby/' ) ),
          array( 'name' => 'Chesterfield',      'url' => home_url( '/1930s-vintage-classic-chesterfield/' ) ),
          array( 'name' => 'Matlock',           'url' => home_url( '/1930s-vintage-classic-matlock/' ) ),
          array( 'name' => 'Buxton',            'url' => home_url( '/1930s-vintage-classic-buxton/' ) ),
          // Nottinghamshire
          array( 'name' => 'Nottingham',        'url' => home_url( '/1930s-vintage-classic-nottingham/' ) ),
          array( 'name' => 'Mansfield',         'url' => home_url( '/1930s-vintage-classic-mansfield/' ) ),
          array( 'name' => 'Newark-on-Trent',   'url' => home_url( '/1930s-vintage-classic-newark-on-trent/' ) ),
        ),
      ),
      array(
        'name' => 'Regent Landaulette Convertible',
        'url'  => home_url( '/our-fleet/regent-landaulette-convertible/' ),
        'desc' => 'Classic open-top convertible &mdash; perfect for summer Weddings and outdoor ceremonies.',
        'areas' => array(
          // Lancashire
          array( 'name' => 'Preston',           'url' => home_url( '/regent-landaulette-convertible-preston/' ) ),
          array( 'name' => 'Blackburn',         'url' => home_url( '/regent-landaulette-convertible-blackburn/' ) ),
          array( 'name' => 'Burnley',           'url' => home_url( '/regent-landaulette-convertible-burnley/' ) ),
          array( 'name' => 'Lancaster',         'url' => home_url( '/regent-landaulette-convertible-lancaster/' ) ),
          array( 'name' => 'Blackpool',         'url' => home_url( '/regent-landaulette-convertible-blackpool/' ) ),
          array( 'name' => 'Chorley',           'url' => home_url( '/regent-landaulette-convertible-chorley/' ) ),
          array( 'name' => 'Leyland',           'url' => home_url( '/regent-landaulette-convertible-leyland/' ) ),
          array( 'name' => 'Accrington',        'url' => home_url( '/regent-landaulette-convertible-accrington/' ) ),
          array( 'name' => 'Nelson',            'url' => home_url( '/regent-landaulette-convertible-nelson/' ) ),
          array( 'name' => 'Colne',             'url' => home_url( '/regent-landaulette-convertible-colne/' ) ),
          array( 'name' => 'Clitheroe',         'url' => home_url( '/regent-landaulette-convertible-clitheroe/' ) ),
          array( 'name' => 'Morecambe',         'url' => home_url( '/regent-landaulette-convertible-morecambe/' ) ),
          array( 'name' => 'Fleetwood',         'url' => home_url( '/regent-landaulette-convertible-fleetwood/' ) ),
          array( 'name' => 'Lytham St Annes',   'url' => home_url( '/regent-landaulette-convertible-lytham-st-annes/' ) ),
          array( 'name' => 'Skelmersdale',      'url' => home_url( '/regent-landaulette-convertible-skelmersdale/' ) ),
          array( 'name' => 'Darwen',            'url' => home_url( '/regent-landaulette-convertible-darwen/' ) ),
          array( 'name' => 'Whalley',           'url' => home_url( '/regent-landaulette-convertible-whalley/' ) ),
          array( 'name' => 'Rawtenstall',       'url' => home_url( '/regent-landaulette-convertible-rawtenstall/' ) ),
          array( 'name' => 'Padiham',           'url' => home_url( '/regent-landaulette-convertible-padiham/' ) ),
          // Greater Manchester
          array( 'name' => 'Manchester',        'url' => home_url( '/regent-landaulette-convertible-manchester/' ) ),
          array( 'name' => 'Salford',           'url' => home_url( '/regent-landaulette-convertible-salford/' ) ),
          array( 'name' => 'Bolton',            'url' => home_url( '/regent-landaulette-convertible-bolton/' ) ),
          array( 'name' => 'Wigan',             'url' => home_url( '/regent-landaulette-convertible-wigan/' ) ),
          array( 'name' => 'Bury',              'url' => home_url( '/regent-landaulette-convertible-bury/' ) ),
          array( 'name' => 'Rochdale',          'url' => home_url( '/regent-landaulette-convertible-rochdale/' ) ),
          array( 'name' => 'Oldham',            'url' => home_url( '/regent-landaulette-convertible-oldham/' ) ),
          array( 'name' => 'Stockport',         'url' => home_url( '/regent-landaulette-convertible-stockport/' ) ),
          array( 'name' => 'Liverpool',         'url' => home_url( '/regent-landaulette-convertible-liverpool/' ) ),
          // Yorkshire
          array( 'name' => 'Leeds',             'url' => home_url( '/regent-landaulette-convertible-leeds/' ) ),
          array( 'name' => 'Bradford',          'url' => home_url( '/regent-landaulette-convertible-bradford/' ) ),
          array( 'name' => 'York',              'url' => home_url( '/regent-landaulette-convertible-york/' ) ),
          array( 'name' => 'Sheffield',         'url' => home_url( '/regent-landaulette-convertible-sheffield/' ) ),
          array( 'name' => 'Huddersfield',      'url' => home_url( '/regent-landaulette-convertible-huddersfield/' ) ),
          array( 'name' => 'Halifax',           'url' => home_url( '/regent-landaulette-convertible-halifax/' ) ),
          array( 'name' => 'Wakefield',         'url' => home_url( '/regent-landaulette-convertible-wakefield/' ) ),
          array( 'name' => 'Harrogate',         'url' => home_url( '/regent-landaulette-convertible-harrogate/' ) ),
          array( 'name' => 'Doncaster',         'url' => home_url( '/regent-landaulette-convertible-doncaster/' ) ),
          array( 'name' => 'Skipton',           'url' => home_url( '/regent-landaulette-convertible-skipton/' ) ),
          // Cumbria
          array( 'name' => 'Carlisle',          'url' => home_url( '/regent-landaulette-convertible-carlisle/' ) ),
          array( 'name' => 'Kendal',            'url' => home_url( '/regent-landaulette-convertible-kendal/' ) ),
          array( 'name' => 'Windermere',        'url' => home_url( '/regent-landaulette-convertible-windermere/' ) ),
          array( 'name' => 'Penrith',           'url' => home_url( '/regent-landaulette-convertible-penrith/' ) ),
          array( 'name' => 'Barrow-in-Furness', 'url' => home_url( '/regent-landaulette-convertible-barrow-in-furness/' ) ),
          // Derbyshire
          array( 'name' => 'Derby',             'url' => home_url( '/regent-landaulette-convertible-derby/' ) ),
          array( 'name' => 'Chesterfield',      'url' => home_url( '/regent-landaulette-convertible-chesterfield/' ) ),
          array( 'name' => 'Matlock',           'url' => home_url( '/regent-landaulette-convertible-matlock/' ) ),
          array( 'name' => 'Buxton',            'url' => home_url( '/regent-landaulette-convertible-buxton/' ) ),
          // Nottinghamshire
          array( 'name' => 'Nottingham',        'url' => home_url( '/regent-landaulette-convertible-nottingham/' ) ),
          array( 'name' => 'Mansfield',         'url' => home_url( '/regent-landaulette-convertible-mansfield/' ) ),
          array( 'name' => 'Newark-on-Trent',   'url' => home_url( '/regent-landaulette-convertible-newark-on-trent/' ) ),
        ),
      ),
    );
    ?>
    <div class="loc-vehicles-list">
      <?php foreach ( $vehicles as $v ) :
        $area_map = array();
        foreach ( $v['areas'] as $a ) { $area_map[ $a['name'] ] = $a['url']; }
      ?>
      <div class="loc-vehicle-block">
        <div class="loc-vehicle-block-head">
          <div class="loc-vehicle-info">
            <h3><a href="<?php echo esc_url( $v['url'] ); ?>"><?php echo esc_html( $v['name'] ); ?></a></h3>
            <p><?php echo $v['desc']; ?></p>
          </div>
          <a href="<?php echo esc_url( $v['url'] ); ?>" class="btn primary">View Vehicle &rarr;</a>
        </div>
        <div class="loc-vehicle-regions">
          <?php foreach ( $regions as $region_name => $towns ) : ?>
          <div class="loc-vehicle-region">
            <h4><?php echo esc_html( $region_name ); ?></h4>
            <div class="loc-also-tags">
              <?php foreach ( $towns as $town ) :
                $url = isset( $area_map[ $town ] ) ? $area_map[ $town ] : $v['url'];
              ?>
              <a href="<?php echo esc_url( $url ); ?>"><?php echo esc_html( $town ); ?></a>
              <?php endforeach; ?>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
      <?php endforeach; ?>
    </div>

  </div>
</section>

<!-- ── Areas Covered (SEO) ── -->
<section class="promise-areas">
  <div class="container">

    <div class="loc-section-head">
      <p class="eyebrow">Coverage</p>
      <h2>Areas Covered</h2>
      <div class="gold-divider"></div>
    </div>

    <?php
    $all_towns = array(
      'Accrington', 'Ashton-under-Lyne', 'Bacup', 'Barley', 'Barnoldswick',
      'Barrowford', 'Blackpool', 'Bolton', 'Brierfield', 'Burnley',
      'Bury', 'Cheetham Hill', 'Chorley', 'Clitheroe', 'Colne',
      'Darwen', 'Farnsworth', 'Fleetwood', 'Fulwood', 'Great Harwood',
      'Halifax', 'Haslingden', 'Lancashire', 'Leigh', 'Leyland',
      'Liverpool', 'Manchester', 'Middleton', 'Nelson', 'Old Trafford',
      'Oldham', 'Padiham', 'Preston', 'Prestwich', 'Rawtenstall',
      'Rishton', 'Salford', 'Skelmersdale', 'Skipton', 'Southport',
      'St Helens', 'Stockport', 'Stretford', 'Trafford', 'Whalley',
      'Wythenshawe',
    );

    // Slug helper: "Ashton-under-Lyne" -> "ashton-under-lyne"
    $slug = function( $t ) { return strtolower( preg_replace( '/[^a-z0-9]+/i', '-', trim( $t ) ) ); };

    // Each group links every town directly to its new service location page:
    // {prefix}-{town-slug}  e.g. birthday-limo-hire-accrington
    $service_groups = array(
      array( 'title' => 'Birthday Limo Hire Coverage', 'prefix' => 'birthday-limo-hire' ),
      array( 'title' => 'Prom Limo Hire Coverage',     'prefix' => 'prom-limo-hire'     ),
      array( 'title' => 'Wedding Car Hire Coverage',   'prefix' => 'wedding-car-hire'   ),
      array( 'title' => 'Luxury Car Hire Coverage',    'prefix' => 'luxury-car-hire'    ),
      array( 'title' => 'Limo Hire Coverage',          'prefix' => 'limo-hire'          ),
      array( 'title' => 'Phantom Hire Coverage',       'prefix' => 'phantom-hire'       ),
    );
    ?>

    <div class="svc-coverage-list">
      <?php foreach ( $service_groups as $svc ) : ?>
      <div class="svc-coverage-group">
        <h3 class="svc-coverage-title"><?php echo esc_html( $svc['title'] ); ?></h3>
        <div class="svc-coverage-pills">
          <?php foreach ( $all_towns as $town ) :
            $url = home_url( '/' . $svc['prefix'] . '-' . $slug( $town ) . '/' );
          ?>
          <a class="svc-pill" href="<?php echo esc_url( $url ); ?>">
            <?php echo esc_html( $svc['title'] . ' ' . $town ); ?>
          </a>
          <?php endforeach; ?>
        </div>
      </div>
      <?php endforeach; ?>
    </div>

  </div>
</section>

<!-- ── CTA ── -->
<section class="cta-section">
  <div class="container">
    <h3>Ready to secure your Wedding or Prom transport?</h3>
    <p>Get an instant quote for your Wedding or Prom car and Limousine package. We regularly cover Lancashire, Yorkshire, Cumbria, Derbyshire and Nottinghamshire.</p>
    <div class="cta-buttons">
      <a class="btn primary" href="<?php echo esc_url( home_url( '/wedding-quote/' ) ); ?>">Get Wedding Quote</a>
      <a class="btn btn-prom-quote" href="<?php echo esc_url( home_url( '/prom-quote/' ) ); ?>">Get Prom Quote</a>
      <a class="btn btn-hero-tel" href="tel:+447504040407">Call 07504 040 407</a>
    </div>
  </div>
</section>

<?php get_footer();
