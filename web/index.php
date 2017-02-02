<?php

$filename = __DIR__.preg_replace('#(\?.*)$#', '', $_SERVER['REQUEST_URI']);
if (php_sapi_name() === 'cli-server' && is_file($filename)) {
    return false;
}

require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();

// turn off debug mode for live site
$app['debug'] = (gethostname() == 'web01') ? false : true;

// register twig
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__ . '/../views',
));

$app['conference_year'] = "2017";

$published_menu = array(
    'Home' => '/',
//    'Schedule' => '/schedule/',
//    'Speakers' => '/speakers/',
    'Venue/Hotel' => '/venue/',
    'Sponsors' => '/sponsors/',
    'What to Expect' => '/expect/',
    'Tickets' => '/tickets/',
    'Call for Papers' => 'http://cfp.madisonphpconference.com',
    'Code of Conduct' => '/conduct/',
    'Contact' => 'http://contact.madisonphpconference.com'
);

$app['nav'] = $published_menu;

$sponsors = array(
    'partner' => array(
        array(
            'name' => '',
            'href' => '',
            'img'  => '',
            'thumbnail' => '',
            'twitter' => '',
        ),
    ),
    'gold' => array(
        array(
            'name' => '',
            'href' => '',
            'img'  => '',
            'thumbnail' => '',
            'twitter' => '',
        ),
    ),
    'silver' => array(
        array(
            'name' => 'Madison College',
            'href' => 'http://it.madisoncollege.edu',
            'img'  => '/assets/images/sponsors/madisoncollege.jpg',
            'thumbnail' => '/assets/images/sponsors/madisoncollege_thumb.jpg',
            'twitter' => 'MadisonIT',
        ),
    ),
    'bronze' => array(
        array(
            'name' => '',
            'href' => '',
            'img'  => '',
            'thumbnail' => '',
            'twitter' => '',
        ),
    ),
    'scholarship' => array(
        array(
            'name' => '',
            'href' => '',
            'img'  => '',
            'thumbnail' => '',
            'twitter' => '',
        ),
    ),
    'community' => array(
        array(
            'name' => '',
            'href' => '',
            'img'  => '',
            'thumbnail' => '',
            'twitter' => '',
        ),
    ),
);

$app['sponsors'] = $sponsors;

$talks = array(
    'schedule_set' => 'No',
    'rooms_set' => 'No',
    'keynote' => array(
        'speaker' => array (
            array (
                'name' => '',
                'img' => '',
                'bio' => '',
                'twitter' => '',
            ),
        ),
        'title' => '',
        'tagline' => '',
        'talk_description' => '',
    ),
    'TA1' => array(
        'speaker' => array (
            array (
                'name' => '',
                'img' => '',
                'bio' => '',
                'twitter' => '',
            ),
        ),
        'title' => '',
        'tagline' => '',
        'talk_description' => '',
    ),
    'TA2' => array(
        'speaker' => array (
            array (
                'name' => '',
                'img' => '',
                'bio' => '',
                'twitter' => '',
            ),
        ),
        'title' => '',
        'tagline' => '',
        'talk_description' => '',
    ),
    'TB1' => array(
        'speaker' => array (
            array (
                'name' => '',
                'img' => '',
                'bio' => '',
                'twitter' => '',
            ),
        ),
        'title' => '',
        'tagline' => '',
        'talk_description' => '',
    ),
    'TB2' => array(
        'speaker' => array (
            array (
                'name' => '',
                'img' => '',
                'bio' => '',
                'twitter' => '',
            ),
        ),
        'title' => '',
        'tagline' => '',
        'talk_description' => '',
    ),
    'D1' => array(
        'speaker' => array (
            array (
                'name' => '',
                'img' => '',
                'bio' => '',
                'twitter' => '',
            ),
        ),
        'title' => '',
        'tagline' => '',
        'talk_description' => '',
    ),
    'E3' => array(
        'speaker' => array (
            array (
                'name' => '',
                'img' => '',
                'bio' => '',
                'twitter' => '',
            ),
        ),
        'title' => '',
        'tagline' => '',
        'talk_description' => '',
    ),
    'E2' => array(
        'speaker' => array (
            array (
                'name' => '',
                'img' => '',
                'bio' => '',
                'twitter' => '',
            ),
        ),
        'title' => '',
        'tagline' => '',
        'talk_description' => '',
    ),
    'B2' => array(
        'speaker' => array (
            array (
                'name' => '',
                'img' => '',
                'bio' => '',
                'twitter' => '',
            ),
        ),
        'title' => '',
        'tagline' => '',
        'talk_description' => '',
    ),
    'B1' => array(
        'speaker' => array (
            array (
                'name' => '',
                'img' => '',
                'bio' => '',
                'twitter' => '',
            ),
        ),
        'title' => '',
        'tagline' => '',
        'talk_description' => '',
    ),
    'A1' => array(
        'speaker' => array (
            array (
                'name' => '',
                'img' => '',
                'bio' => '',
                'twitter' => '',
            ),
        ),
        'title' => '',
        'tagline' => '',
        'talk_description' => '',
    ),
    'C1' => array(
        'speaker' => array (
            array (
                'name' => '',
                'img' => '',
                'bio' => '',
                'twitter' => '',
            ),
        ),
        'title' => '',
        'tagline' => '',
        'talk_description' => '',
    ),
    'F2' => array(
        'speaker' => array (
            array (
                'name' => '',
                'img' => '',
                'bio' => '',
                'twitter' => '',
            ),
        ),
        'title' => '',
        'tagline' => '',
        'talk_description' => '',
    ),
    'C2' => array(
        'speaker' => array (
            array (
                'name' => '',
                'img' => '',
                'bio' => '',
                'twitter' => '',
            ),
        ),
        'title' => '',
        'tagline' => '',
        'talk_description' => '',
    ),
    'A3' => array(
        'speaker' => array (
            array (
                'name' => '',
                'img' => '',
                'bio' => '',
                'twitter' => '',
            ),
        ),
        'title' => '',
        'tagline' => '',
        'talk_description' => '',
    ),
    'E1' => array(
        'speaker' => array (
            array (
                'name' => '',
                'img' => '',
                'bio' => '',
                'twitter' => '',
            ),
        ),
        'title' => '',
        'tagline' => '',
        'talk_description' => '',
    ),
    'F3' => array(
        'speaker' => array (
            array (
                'name' => '',
                'img' => '',
                'bio' => '',
                'twitter' => '',
            ),
        ),
        'title' => '',
        'tagline' => '',
        'talk_description' => '',
    ),
    'A2' => array(
        'speaker' => array (
            array (
                'name' => '',
                'img' => '',
                'bio' => '',
                'twitter' => '',
            ),
        ),
        'title' => '',
        'tagline' => '',
        'talk_description' => '',
    ),
    'C3' => array(
        'speaker' => array (
            array (
                'name' => '',
                'img' => '',
                'bio' => '',
                'twitter' => '',
            ),
        ),
        'title' => '',
        'tagline' => '',
        'talk_description' => '',
    ),
    'D2' => array(
        'speaker' => array (
            array (
                'name' => '',
                'img' => '',
                'bio' => '',
                'twitter' => '',
            ),
        ),
        'title' => '',
        'tagline' => '',
        'talk_description' => '',
    ),
    'F1' => array(
        'speaker' => array (
            array (
                'name' => '',
                'img' => '',
                'bio' => '',
                'twitter' => '',
            ),
        ),
        'title' => '',
        'tagline' => '',
        'talk_description' => '',
    ),
    'D3' => array(
        'speaker' => array (
            array (
                'name' => '',
                'img' => '',
                'bio' => '',
                'twitter' => '',
            ),
        ),
        'title' => '',
        'tagline' => '',
        'talk_description' => '',
    ),
    'B3' => array(
        'speaker' => array (
            array (
                'name' => '',
                'img' => '',
                'bio' => '',
                'twitter' => '',
            ),
        ),
        'title' => '',
        'tagline' => '',
        'talk_description' => '',
    ),
);

$app['talks'] = $talks;

// use layout templates
$app->before(function () use ($app) {
    $app['twig']->addGlobal('layout', null);
    $app['twig']->addGlobal('layout', $app['twig']->loadTemplate('layout.twig.html'));
});

// route for home page
$app->get('/', function() use($app) {
    return $app['twig']->render('pages/home.html', array(
        'nav' => $app['nav'],
        'sponsors' => $app['sponsors'],
        'active' => 'Home',
        'conference_year' => $app['conference_year'],
    ));
});

// route for schedule
$app->get('/schedule/', function() use($app) {
    return $app['twig']->render('pages/schedule.html', array(
        'nav' => $app['nav'],
        'talks' => $app['talks'],
        'sponsors' => $app['sponsors'],
        'active' => 'Schedule',
        'conference_year' => $app['conference_year'],
    ));
});

// route for speakers
$app->get('/speakers/', function() use($app) {
    return $app['twig']->render('pages/speakers.html', array(
        'nav' => $app['nav'],
        'talks' => $app['talks'],
        'sponsors' => $app['sponsors'],
        'active' => 'Speakers',
        'conference_year' => $app['conference_year'],
    ));
});

// route for venue
$app->get('/venue/', function() use($app) {
    return $app['twig']->render('pages/venue.html', array(
        'nav' => $app['nav'],
        'sponsors' => $app['sponsors'],
        'active' => 'Venue',
        'conference_year' => $app['conference_year'],
    ));
});

// route for hotel
$app->get('/hotel/', function() use($app) {
    return $app['twig']->render('pages/hotel.html', array(
        'nav' => $app['nav'],
        'sponsors' => $app['sponsors'],
        'active' => 'Hotel',
        'conference_year' => $app['conference_year'],
    ));
});

// route for sponsors
$app->get('/sponsors/', function() use($app) {
    return $app['twig']->render('pages/sponsors.html', array(
        'nav' => $app['nav'],
        'sponsors' => $app['sponsors'],
        'active' => 'Sponsors',
        'conference_year' => $app['conference_year'],
    ));
});

// route for expect
$app->get('/expect/', function() use($app) {
    return $app['twig']->render('pages/expect.html', array(
        'nav' => $app['nav'],
        'sponsors' => $app['sponsors'],
        'active' => 'What to Expect',
        'conference_year' => $app['conference_year'],
    ));
});

// route for organizers
$app->get('/organizers/', function() use($app) {
    return $app['twig']->render('pages/organizers.html', array(
        'nav' => $app['nav'],
        'sponsors' => $app['sponsors'],
        'active' => 'Organizers',
        'conference_year' => $app['conference_year'],
    ));
});

// route for tickets
$app->get('/tickets/', function() use($app) {
    return $app['twig']->render('pages/tickets.html', array(
        'nav' => $app['nav'],
        'sponsors' => $app['sponsors'],
        'active' => 'Tickets',
        'conference_year' => $app['conference_year'],
    ));
});

// route for conduct
$app->get('/conduct/', function() use($app) {
    return $app['twig']->render('pages/conduct.html', array(
        'nav' => $app['nav'],
        'sponsors' => $app['sponsors'],
        'active' => 'Code of Conduct',
        'conference_year' => $app['conference_year'],
    ));
});

// route for the conference map
$app->get('/conference_map/', function() use($app) {
    return $app['twig']->render('pages/conference_map.html', array(
        'nav' => $app['nav'],
        'sponsors' => $app['sponsors'],
        'active' => 'Conference Map',
        'conference_year' => $app['conference_year'],
    ));
});

// routes for schedule
$app->get('/talks/TA1/', function() use($app) {
    return $app['twig']->render('pages/talks.html', array(
        'nav' => $app['nav'],
        'active' => 'Schedule',
        'sponsors' => $app['sponsors'],
        'talk' => $app['talks']['TA1'],
        'conference_year' => $app['conference_year'],
    ));
});
$app->get('/talks/TA2/', function() use($app) {
    return $app['twig']->render('pages/talks.html', array(
        'nav' => $app['nav'],
        'active' => 'Schedule',
        'sponsors' => $app['sponsors'],
        'talk' => $app['talks']['TA2'],
        'conference_year' => $app['conference_year'],
    ));
});
$app->get('/talks/TB1/', function() use($app) {
    return $app['twig']->render('pages/talks.html', array(
        'nav' => $app['nav'],
        'active' => 'Schedule',
        'sponsors' => $app['sponsors'],
        'talk' => $app['talks']['TB1'],
        'conference_year' => $app['conference_year'],
    ));
});
$app->get('/talks/TB2/', function() use($app) {
    return $app['twig']->render('pages/talks.html', array(
        'nav' => $app['nav'],
        'active' => 'Schedule',
        'sponsors' => $app['sponsors'],
        'talk' => $app['talks']['TB2'],
        'conference_year' => $app['conference_year'],
    ));
});



$app->get('/talks/A1/', function() use($app) {
    return $app['twig']->render('pages/talks.html', array(
        'nav' => $app['nav'],
        'active' => 'Schedule',
        'sponsors' => $app['sponsors'],
        'talk' => $app['talks']['A1'],
        'conference_year' => $app['conference_year'],
    ));
});
$app->get('/talks/A2/', function() use($app) {
    return $app['twig']->render('pages/talks.html', array(
        'nav' => $app['nav'],
        'sponsors' => $app['sponsors'],
        'active' => 'Schedule',
        'talk' => $app['talks']['A2'],
        'conference_year' => $app['conference_year'],
    ));
});
$app->get('/talks/A3/', function() use($app) {
    return $app['twig']->render('pages/talks.html', array(
        'nav' => $app['nav'],
        'sponsors' => $app['sponsors'],
        'active' => 'Schedule',
        'talk' => $app['talks']['A3'],
        'conference_year' => $app['conference_year'],
    ));
});
$app->get('/talks/B1/', function() use($app) {
    return $app['twig']->render('pages/talks.html', array(
        'nav' => $app['nav'],
        'sponsors' => $app['sponsors'],
        'active' => 'Schedule',
        'talk' => $app['talks']['B1'],
        'conference_year' => $app['conference_year'],
    ));
});
$app->get('/talks/B2/', function() use($app) {
    return $app['twig']->render('pages/talks.html', array(
        'nav' => $app['nav'],
        'sponsors' => $app['sponsors'],
        'active' => 'Schedule',
        'talk' => $app['talks']['B2'],
        'conference_year' => $app['conference_year'],
    ));
});
$app->get('/talks/B3/', function() use($app) {
    return $app['twig']->render('pages/talks.html', array(
        'nav' => $app['nav'],
        'sponsors' => $app['sponsors'],
        'active' => 'Schedule',
        'talk' => $app['talks']['B3'],
        'conference_year' => $app['conference_year'],
    ));
});
$app->get('/talks/C1/', function() use($app) {
    return $app['twig']->render('pages/talks.html', array(
        'nav' => $app['nav'],
        'sponsors' => $app['sponsors'],
        'active' => 'Schedule',
        'talk' => $app['talks']['C1'],
        'conference_year' => $app['conference_year'],
    ));
});
$app->get('/talks/C2/', function() use($app) {
    return $app['twig']->render('pages/talks.html', array(
        'nav' => $app['nav'],
        'sponsors' => $app['sponsors'],
        'active' => 'Schedule',
        'talk' => $app['talks']['C2'],
        'conference_year' => $app['conference_year'],
    ));
});
$app->get('/talks/C3/', function() use($app) {
    return $app['twig']->render('pages/talks.html', array(
        'nav' => $app['nav'],
        'sponsors' => $app['sponsors'],
        'active' => 'Schedule',
        'talk' => $app['talks']['C3'],
        'conference_year' => $app['conference_year'],
    ));
});
$app->get('/talks/D1/', function() use($app) {
    return $app['twig']->render('pages/talks.html', array(
        'nav' => $app['nav'],
        'sponsors' => $app['sponsors'],
        'active' => 'Schedule',
        'talk' => $app['talks']['D1'],
        'conference_year' => $app['conference_year'],
    ));
});
$app->get('/talks/D2/', function() use($app) {
    return $app['twig']->render('pages/talks.html', array(
        'nav' => $app['nav'],
        'sponsors' => $app['sponsors'],
        'active' => 'Schedule',
        'talk' => $app['talks']['D2'],
        'conference_year' => $app['conference_year'],
    ));
});
$app->get('/talks/D3/', function() use($app) {
    return $app['twig']->render('pages/talks.html', array(
        'nav' => $app['nav'],
        'sponsors' => $app['sponsors'],
        'active' => 'Schedule',
        'talk' => $app['talks']['D3'],
        'conference_year' => $app['conference_year'],
    ));
});
$app->get('/talks/E1/', function() use($app) {
    return $app['twig']->render('pages/talks.html', array(
        'nav' => $app['nav'],
        'sponsors' => $app['sponsors'],
        'active' => 'Schedule',
        'talk' => $app['talks']['E1'],
        'conference_year' => $app['conference_year'],
    ));
});
$app->get('/talks/E2/', function() use($app) {
    return $app['twig']->render('pages/talks.html', array(
        'nav' => $app['nav'],
        'sponsors' => $app['sponsors'],
        'active' => 'Schedule',
        'talk' => $app['talks']['E2'],
        'conference_year' => $app['conference_year'],
    ));
});
$app->get('/talks/E3/', function() use($app) {
    return $app['twig']->render('pages/talks.html', array(
        'nav' => $app['nav'],
        'sponsors' => $app['sponsors'],
        'active' => 'Schedule',
        'talk' => $app['talks']['E3'],
        'conference_year' => $app['conference_year'],
    ));
});
$app->get('/talks/F1/', function() use($app) {
    return $app['twig']->render('pages/talks.html', array(
        'nav' => $app['nav'],
        'sponsors' => $app['sponsors'],
        'active' => 'Schedule',
        'talk' => $app['talks']['F1'],
        'conference_year' => $app['conference_year'],
    ));
});
$app->get('/talks/F2/', function() use($app) {
    return $app['twig']->render('pages/talks.html', array(
        'nav' => $app['nav'],
        'sponsors' => $app['sponsors'],
        'active' => 'Schedule',
        'talk' => $app['talks']['F2'],
        'conference_year' => $app['conference_year'],
    ));
});
$app->get('/talks/F3/', function() use($app) {
    return $app['twig']->render('pages/talks.html', array(
        'nav' => $app['nav'],
        'sponsors' => $app['sponsors'],
        'active' => 'Schedule',
        'talk' => $app['talks']['F3'],
        'conference_year' => $app['conference_year'],
    ));
});
$app->get('/talks/keynote/', function() use($app) {
    return $app['twig']->render('pages/talks.html', array(
        'nav' => $app['nav'],
        'sponsors' => $app['sponsors'],
        'active' => 'Schedule',
        'talk' => $app['talks']['keynote'],
        'conference_year' => $app['conference_year'],
    ));
});



$app->run();
