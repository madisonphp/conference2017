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

$published_menu = array(
    'Home' => '/',
    'Schedule' => '/schedule/',
    'Speakers' => '/speakers/',
    'Venue/Hotel' => '/venue/',
    'Sponsors' => '/sponsors/',
    'What to Expect' => '/expect/',
    'Tickets' => '/tickets/',
//    'Call for Papers' => 'http://cfp.madisonphpconference.com',
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
            'name' => 'MuleSoft',
            'href' => 'https://developer.mulesoft.com',
            'img'  => '/assets/images/sponsors/mulesoft.png',
            'thumbnail' => '/assets/images/sponsors/mulesoft_thumb.png',
            'twitter' => 'muledev',
        ),
        array(
            'name' => 'Earthling Interactive',
            'href' => 'http://bit.ly/2bmRW9f',
            'img'  => '/assets/images/sponsors/earthling.png',
            'thumbnail' => '/assets/images/sponsors/earthling_thumb.png',
            'twitter' => 'WeAreEarthling',
        ),
        array(
            'name' => 'The Iron Yard',
            'href' => 'https://www.theironyard.com/',
            'img'  => '/assets/images/sponsors/ironyard.png',
            'thumbnail' => '/assets/images/sponsors/ironyard_thumb.png',
            'twitter' => 'theironyard',
        ),
        array(
            'name' => 'Snap Programming',
            'href' => 'http://snapprogramming.com/',
            'img'  => '/assets/images/sponsors/snapprogramming.png',
            'thumbnail' => '/assets/images/sponsors/snapprogramming_thumb.png',
            'twitter' => 'SnapProgramming',
        ),
        array(
            'name' => 'boberdoo.com',
            'href' => 'http://boberdoo.com/jobs',
            'img'  => '/assets/images/sponsors/boberdoo.png',
            'thumbnail' => '/assets/images/sponsors/boberdoo_thumb.png',
            'twitter' => 'boberdoo',
        ),
        array(
            'name' => 'SiteGround',
            'href' => 'http://www.siteground.com',
            'img'  => '/assets/images/sponsors/siteground.png',
            'thumbnail' => '/assets/images/sponsors/siteground_thumb.png',
            'twitter' => 'SiteGround',
        ),
        array(
            'name' => 'Cisco',
            'href' => 'https://developer.cisco.com',
            'img'  => '/assets/images/sponsors/cisco.png',
            'thumbnail' => '/assets/images/sponsors/cisco_thumb.png',
            'twitter' => 'ciscodevnet',
        ),
        array(
            'name' => 'SensioLabs',
            'href' => 'https://sensiolabs.com',
            'img'  => '/assets/images/sponsors/sensio.png',
            'thumbnail' => '/assets/images/sponsors/sensio_thumb.png',
            'twitter' => 'sensiolabs',
        ),
        array(
            'name' => 'Robert Half',
            'href' => 'https://www.roberthalf.com/madison',
            'img'  => '/assets/images/sponsors/roberthalf.jpg',
            'thumbnail' => '/assets/images/sponsors/roberthalf_thumb.jpg',
            'twitter' => 'RobertHalfTech',
        ),
        array(
            'name' => 'New Resources Consulting',
            'href' => 'https://www.nrconsults.com',
            'img'  => '/assets/images/sponsors/NRC-logo-facebook-v5.png',
            'thumbnail' => '/assets/images/sponsors/NRC-logo-facebook-v5-thumb.png',
            'twitter' => '',
        ),
    ),
    'scholarship' => array(
        array(
            'name' => 'Blend',
            'href' => 'http://blendimc.com',
            'img'  => '/assets/images/sponsors/blend.png',
            'thumbnail' => '/assets/images/sponsors/blend_thumb.png',
            'twitter' => 'blendimc',
        ),
        array(
            'name' => 'HustleWorks',
            'href' => 'http://billcondo.com/',
            'img'  => '/assets/images/sponsors/hustleworks.png',
            'thumbnail' => '/assets/images/sponsors/hustleworks_thumb.png',
            'twitter' => 'mavrck',
        ),
        array(
            'name' => 'Management Research Services, Inc.',
            'href' => 'https://mrswi.com/',
            'img'  => '/assets/images/sponsors/mrs.jpg',
            'thumbnail' => '/assets/images/sponsors/mrs_thumb.jpg',
            'twitter' => '',
        ),
    ),
    'community' => array(
        array(
            'name' => 'Columbus PHP',
            'href' => 'http://columbusphp.org',
            'img'  => '/assets/images/sponsors/columbus_php.png',
            'thumbnail' => '/assets/images/sponsors/columbus_php_thumb.png',
            'twitter' => 'columbusphp',
        ),
    ),
);

$app['sponsors'] = $sponsors;

$talks = array(
    'schedule_set' => 'Yes',
    'rooms_set' => 'Yes',
    'keynote' => array(
        'speaker' => array (
            array (
                'name' => 'Stephanie Evans',
                'img' => 'stephanie_evans.jpg',
                'bio' => '<p>Stephanie Evans is Content Manager of Web Development at Lynda.com/LinkedIn and the Commodore of Cal Sailing Club in Berkeley, CA. In 2014, she completed her first non-stop ocean crossing from China to San Francisco in the Clipper Round the World Race, with her team setting a new Pacific crossing record for the race. She is passionate about sailing, education, and figuring out how to make things work better (and sail faster).</p>',
                'twitter' => 'HMSEvans',
            ),
        ),
        'title' => 'Extreme Team Building: Surviving an Ocean Crossing',
        'tagline' => '',
        'talk_description' => '<p>Teamwork is easy to dismiss as a groan-worthy buzzword, but when you’re racing across the brutal North Pacific, thousands of miles from land, teamwork is all you’ve got. Dysfunctional team dynamics will strangle communication, putting your goals and your team in jeopardy. In this session, you’ll discover the most important lessons learned on a punishing, 6000-mile race across the ocean: how to put the team before the individual, how to trust and be trusted by your teammates, and how maneuvering through a 100mph squall is a lot like maneuvering through a project meeting.</p>',
    ),
    'TA1' => array(
        'speaker' => array (
            array (
                'name' => 'Mathew Beane',
                'img' => 'mathew_beane.jpg',
                'bio' => '<p>Mathew has been fascinated with building and programming computers since his early days of upgrading an 8086 to an 80386. Working initially in the video game industry building servers and managing server rooms, Mat shifted his focus to PHP programming in early 2000. With over a decade of experience in eCommerce, Mat is now Director of Systems Engineering at Robofirm and Magento Certified developer. Because of his frequent presenting at PHP conferences, Magento recognized Mat as a Magento Master Mover in 2016. Mat contributes to Zend Server as part of the Z-Team with Zend where he has helped build the Magento plugin for Z-Ray. When he\'s not programming, you will find Mat spending time with his family, making music, or tinkering in aquaponics.</p>',
                'twitter' => 'aepod',
            ),
        ),
        'title' => 'Getting Started with Magento 2',
        'tagline' => '',
        'talk_description' => '<p>Magento 2 is a fresh take on a modern eCommerce platform rich in features and community. We will go over common best practices and toolsets, and to introduce popular community resources. Then we will take a dive into setting up a Magento 2 site to illustrate the effort required to get a project off the ground, and to find a better understand of what Magento 2 offers.</p>

<p>In this presentation Mathew Beane will briefly discuss the following topics:<ul>
<li>Best Practices: Keeping core clean, how to modify Magento the right way.</li>
<li>Community Resources: How to join the Magento Community</li>
<li>Certification: How to get Magento Certified Migrating from Magento 1: A look at the tools and methods.</li>
<li>Setting up a Magento site: Covering the basic design and development choices.</li></ul></p>',
    ),
    'TA2' => array(
        'speaker' => array (
            array (
                'name' => 'Patrick Schwisow',
                'img' => 'patrick_schwisow.jpg',
                'bio' => '<p>Patrick has been into web technologies since the "bad old days" when animated GIFs were required on all sites and the BLINK tag still had some supporters. He suffered through several years of procedural programming in PHP4 before discovering the glories of OOP in PHP5. Patrick is a Software Engineer at Shutterstock, with experience in Doctrine, Symfony, and several less fun technologies. After hours, he\'s the founder and organizer of the Lake / Kenosha County PHP Users Group and a contributor to the Phergie IRC Bot.</p>',
                'twitter' => 'PSchwisow',
            ),
        ),
        'title' => 'Beyond Hello World: From Scripting to Software',
        'tagline' => '',
        'talk_description' => '<p>There are many tutorials and resources to get you started in PHP and up to the point of a "Hello World" page, but where do you go from there? Starting with the concepts of object-oriented programming, we\'ll move into using Composer to bring in open-source libraries. You\'ll learn to build a professional-quality application that is easier to maintain, quicker to extend to meet new business requirements, and makes wise use of existing open-source libraries to solve common problems like logging (Monolog) and testing (PHPUnit).</p>',
    ),
    'TB1' => array(
        'speaker' => array (
            array (
                'name' => 'Ilia Alshanetsky',
                'img' => 'ilia_alshanetsky.jpg',
                'bio' => '<p>Over the last 10 years Ilia has been heavily involved in development of PHP, as a Core Developer and Release Master, authoring many extensions and language improvements. Ilia is also interested in security and performance, and frequently is writing or speaking on these and other PHP related topics. In his spare time, he pretends to be a pro-photographer and engages in various sports.</p>',
                'twitter' => 'iliaa',
            ),
        ),
        'title' => 'Application Security Nuts to Bolts',
        'tagline' => '',
        'talk_description' => '<p>This tutorial is a two-part overview of the security practices that developers supporting and developing modern applications should consider. The first part of the tutorial will focus on the common security best practices aimed at putting prevention mechanisms in place for common attack vectors such as XSS, SQL Injection, session hijacking, etc.</p>
<p>The second part of this tutorial will focus on the security best practices and solutions designed to address security issues within an application\'s business and processing logic. It will provide an overview of how to securely implement these in application data management controls within ACLs and data-models, as well as how to avoid common mistakes and pitfalls.</p>',
    ),
    'TB2' => array(
        'speaker' => array (
            array (
                'name' => 'Joe Ferguson',
                'img' => 'joe_ferguson.jpg',
                'bio' => 'PHP Dev, Sys Admin, Community Builder, Conf Organizer and Speaker, Maker, Hacker, Tinkerer, Space Geek, Husband. Enjoys craft beers and whiskey. Owned by cats.',
                'twitter' => 'joepferguson',
            ),
        ),
        'title' => 'Create Your Own Local Development Environments With Vagrant',
        'tagline' => '',
        'talk_description' => '<p>Every project, it\'s the same dang thing! You setup a special snowflake that is your development environment. What if each environment didn\'t have to be an artisanal work of art? What if you could build one, spin it up for each project and never have to worry about it again? Let\'s talk.</p>

<p>In this tutorial, we will see how Vagrant, VirtualBox, Ansible, and other tools will make setting up a new development environment easier than  getting your next cup of coffee. In this session you will learn:<ul>
<li>Vagrant Basics</li>
<li>Customizing Vagrant using shell scripts and Ansible Playbooks</li>
<li>Advanced Vagrant customization options</li>
</ul></p>
<p>Join us and go from snowflakes to lego blocks for your next development environment.</p>',
    ),
    'D1' => array(
        'speaker' => array (
            array (
                'name' => 'Sean Prunka',
                'img' => 'sean_prunka.jpg',
                'bio' => '<p>Sean Prunka has been a PHP developer since roughly 1998 and an active member of the PHP community since 2010. Sean currently works as a senior developer for PunchOut2Go. Outside his PHP life, he is an active member of three community theatres in his area of rural VA. When he\'s not too busy with work or theatre, Sean helps his wife wrangle their 6 kids between their own theatre rehearsals, band practices, soccer, swim meets, and other such kids\' activities.</p>',
                'twitter' => 'sprunka',
            ),
        ),
        'title' => 'Baby Steps -> Giant Leaps. (Xdebug for Beginners)',
        'tagline' => '',
        'talk_description' => '<p>var_dump($foo);</p>

<p>print_r($bar);</p>

<p>die($baz);</p>

<p>Are these your current debugging tools? Wouldn\'t it be nice to see $foo, $bar, and $baz while the code is still being executed? Watch it change, live? And not have it just dumped all over the output of your otherwise beautiful app? We\'ll install XDebug, set up your IDE to use it (with examples shown for PhpStorm, Netbeans, and ZendStudio), then we\'ll actually walk through some badly written code that needs to be debugged.</p>',
    ),
    'E3' => array(
        'speaker' => array (
            array (
                'name' => 'Tessa Mero',
                'img' => 'tessa_mero.jpg',
                'bio' => '<p>Tessa Mero is the Developer Evangelist for Cisco. She spends her extra time contributing on a leadership team for the Joomla! Project and has been involved with Joomla for the past 5 years. She runs the Seattle PHP Meetup and is the organizer of the Pacific Northwest PHP conference. On her free time, she likes to play video games, snowboard, and eat Korean food.</p>',
                'twitter' => 'tessamero',
            ),
        ),
        'title' => 'Nom Nom: Consuming REST APIs',
        'tagline' => '',
        'talk_description' => '<p>Feeling hungry? You\'ve came to the right place! As APIs have become increasingly more important and popular in usage in the past few years in web development, it is important to understand the basics of what they are and why to use them. I will be going over the basics: The What\'s, Why\'s, Where\'s, and When\'s. You will learn the basics of REST APIs and I will show you how you can use POSTMAN to test making REST API calls. I will use Cisco\'s Spark and Tropo as use case examples of working with APIs.</p>',
    ),
    'E2' => array(
        'speaker' => array (
            array (
                'name' => 'Vesna Kovach',
                'img' => 'vesna_kovach.jpg',
                'bio' => '<p>Before becoming a software developer, Vesna Vuynovich Kovach was a senior copy editor specializing in consumer tech for high-profile online publications including eHow Tech, the Houston Chronicle\'s Chron.com, San Francisco Chronicle\'s SFGate and LIVESTRONG.com. She works for OfficeSupply.com, a leading independent online retailer of office products with a small, passionate agile dev team. Her passion project is DevDivas.com, a site that celebrates the history of women in technology. She tweets at @Vesna_V_K.</p>',
                'twitter' => 'vesna_v_k',
            ),
        ),
        'title' => 'Love Your Team More With Retrospectives!',
        'tagline' => '',
        'talk_description' => '<p>Savvy agile teams generate ideas, capture hard-won knowledge, and short-circuit potential team tensions with regular Retrospective meetings. In the two years since starting to use this powerful, flexible tool, the team I work with has made huge improvements in the way we communicate, build strategies, coordinate projects, structure our work week, review code, and more.</p>

<p>Your team can do it, too. Learn secrets for great Retros. Avoid the traps we stumbled through. Learn how to break the rules for Retros that work especially for you and your team. Learn how to get the whole team on board. Get on your way to a more productive and fun work life!</p>',
    ),
    'B2' => array(
        'speaker' => array (
            array (
                'name' => 'Elliott Post',
                'img' => 'elliott_post.png',
                'bio' => 'Elliott Post holds his master\'s degree in Computer Science from Loyola University Chicago. He has almost 2 decades of programming experience and currently runs a small web development company named <a href="http://ellytronic.media">Ellytronic Media</a>. Elliott also teaches computer science courses part-time at Loyola, and he is also a co-organizer of the <a href="http://www.meetup.com/chicago-web-pros/">Chicago Web Pros Meetup</a>.',
                'twitter' => 'epost88',
            ),
        ),
        'title' => 'PHP Session and Password Security',
        'tagline' => '',
        'talk_description' => 'Any website that has the ability to "remember"  or "recognize"  a visitor uses some form of _session_ management. These sessions, which have a one-to-one correspondence with a unique site visitor, often contain sensitive information including a unique session ID. Because these sessions contain sensitive data and are used to identify a specific user the sessions become a target for attackers. Most server-side languages such as PHP have rudimentary session management built into its core or is available as an official library. Unfortunately, the default session management is often insecure on its own and there is a series of steps which must be followed to protect against session hijacking, session fixation, and session predicting. Additionally, PHP recently revised the way it handles password management and this change is related to session management. This talk discusses how to improve session security and utilize the new password management features.',
    ),
    'B1' => array(
        'speaker' => array (
            array (
                'name' => 'Derek Binkley',
                'img' => 'derek_binkley.jpg',
                'bio' => '<p>Derek is a Technical Lead at the National Conference of Bar Examiners, the creator of licensing exams for attorneys.  He actively mentors other other developers, specializes in Java, PHP, MySQL and Oracle and advocates for developer testing and adoption of agile methods. When not in front of a computer he enjoys spending time with family, traveling and drinking a local craft beer.</p>',
                'twitter' => 'DerekB_WI',
            ),
        ),
        'title' => 'Modern JavaScript for PHP Developers',
        'tagline' => '',
        'talk_description' => '<p>Are you scared by JavaScript? Have you used JQuery but struggle with adding interactive features to your web page? This talk will help you understand how to use JavaScript effectively in your existing web pages and PHP applications. This talk will explore different ways to write and structure your JavaScript code and introduce the model-view-view model pattern as a complement to the model view controller pattern often used in PHP.</p>',
    ),
    'A1' => array(
        'speaker' => array (
            array (
                'name' => 'Jordan Kasper',
                'img' => 'jordan_kasper.jpg',
                'bio' => '<p>Shortly after it arrived at his home in 1993, Jordan began disassembling his first computer - his mother was not happy. She breathed more easily when he moved from hardware into programming. Jordan\'s experience includes development at startups, agencies, Fortune 100 companies, and universities, as well as numerous open source projects. He has coded in many languages from BASIC to Java to PHP and most recently JavaScript and Node.js. He speaks regularly at (and helps organize) local user groups, conferences large and small, and hackathons. Jordan\'s primary mission for over 10 years has been to evangelize technology of all sorts and share what he has learned to help others grow. He is currently a front-end engineering instructor with The Iron Yard in Washington, DC. In his down time, he enjoys puzzles of all sorts and board games!</p>',
                'twitter' => 'jakerella',
            ),
        ),
        'title' => 'Gitting More Out of Git',
        'tagline' => '',
        'talk_description' => '<p>Having trouble groking Git? Not sure what the difference between merging and rebasing is? Wondering what you would ever use a "cherry-pick" for? We\'ll cover these topics and more in this talk, helping attendees get past Git novice and on their way to Git master. The talk will being with a short overview of git fundamentals, but quickly jump into more advanced concepts. We\'ll cover branching, commit amending, stashing, cherry-picking, and yes, merging versus rebasing. You might not be a Git guru after one conference session, but you will have a better understanding of how to play nicely with others in the same Git repository and how to fix common (and not so common) issues in Git.</p>',
    ),
    'C1' => array(
        'speaker' => array (
            array (
                'name' => 'Edward Barnard',
                'img' => 'edward_barnard.jpg',
                'bio' => '<p>Ed Barnard has been programming computers since keypunches were in common use. He\'s been interested in codes and secret writing, not to mention having built a binary adder, since grade school. These days he does PHP and MySQL for InboxDollars.com. He believes software craftsmanship is as much about sharing your experience with others, as it is about gaining the experience yourself. The surest route to thorough knowledge of a subject is to teach it.</p>',
                'twitter' => 'ewbarnard',
            ),
        ),
        'title' => 'Using Encryption in PHP',
        'tagline' => '',
        'talk_description' => '<p>Using encryption sounds simple. It is! The trouble is that encryption is extremely difficult to get right. In fact it\'s a great way to grab news headlines when you get it spectacularly wrong.</p>

<p>This talk focuses on two basic concepts you need to understand when getting PHP\'s encryption to work in your application: obtaining randomness, and encrypting/decrypting a string with cryptographic checksum.</p>

<p>I include an extensive curated PHP security reading list with explanations.</p>',
    ),
    'F2' => array(
        'speaker' => array (
            array (
                'name' => 'Ashley Powell',
                'img' => 'ashley_powell.jpg',
                'bio' => '<p>Ashley Quinto Powell is the Business Development Manager at Bendyworks, in Madison, WI.   She has been in technical consulting sales for nearly a decade and is a co-organizer of the Women in Tech and the Madison Clojure Meetup and sits on the Forward Fest Planning Committee.  She is also a proud member of the downtown Madison Rotary Club, the Waunakee MOPS and an Ambassador to the Doyenne Group.</p>',
                'twitter' => 'AshleyPQPQP',
            ),
        ),
        'title' => 'Salary Negotiation in Tech',
        'tagline' => '',
        'talk_description' => '<p>I\'ve been negotiating salary and rate with and on behalf of IT consultants for years. Come learn the theories behind how to negotiate and demonstrate how it should actually sound. We\'ll cover how to understand your worth, when to stick to your guns and how to use benefits and flexibility to build a great package for yourself. I\'ll give an insider\'s look into negotiating with recruiters, and give you the tools to establish a firm footing for a great salary negotiation.</p>',
    ),
    'C2' => array(
        'speaker' => array (
            array (
                'name' => 'Chris Tankersley',
                'img' => 'chris_tankersley.jpg',
                'bio' => '<p>Chris Tankersley is a husband, father, and  PHP developer in Northwest Ohio. He works as a programming consultant doing various types of PHP including Zend framework, Drupal, Wordpress, and Symfony. He founded the Northwest Ohio PHP User Group, and works with local developers helping them with programming and server administration. He works with PHP primarily, with some work done in Node.js and Python for personal projects.</p>',
                'twitter' => 'dragonmantank',
            ),
        ),
        'title' => 'Oh Crap, My Code is Slow',
        'tagline' => '',
        'talk_description' => '<p>There are many excuses that developers use for inefficient code - CPU and RAM is cheap these days, or PHP is by default a slow language. These are just a few of those. What happens when your code is actually to slow to scale? Most of us will not deal with things on the scale of Facebook or Google, but there will come a time where we will need to figure out why code is slow. Thankfully there are are many different tools to help us out and properly optimize our code for  those times when we need to dig deep into our code.</p>',
    ),
    'A3' => array(
        'speaker' => array (
            array (
                'name' => 'Pearl Latteier',
                'img' => 'pearl_latteier.jpg',
                'bio' => '<p>Pearl Latteier is a software engineer at Bendyworks in Madison WI. For the past several years, she has focused primarily on building data-intensive JavaScript applications for web and mobile, most recently with React JS and React Native.  She is also experienced with server-side technologies including Ruby on Rails, Node, and PHP.  Before becoming a software developer, Pearl earned a PhD in from the University of Wisconsin-Madison, where for five years she taught courses in the Department of Communication Arts.</p>',
                'twitter' => 'pblatteier',
            ),
            array (
                'name' => 'Abraham Williams',
                'img' => 'abraham_williams.jpg',
                'bio' => '<p>An experienced developer and start-up founder, Abraham Williams brings a broad range of skills to his current role as a senior developer at Bendyworks.  A top 1% contributor at Stack Overflow and an active member of Google Developer Groups, Abraham has been recognized by Google as a Developer Expert for his ability to identify technology problems and provide quality solutions in the community.</p>',
                'twitter' => 'abraham',
            ),
        ),
        'title' => 'Web Components: Lego Bricks of the Web',
        'tagline' => '',
        'talk_description' => '<p>Writing the same login form over and over again? Web components offer a modular approach to creating reusable UI widgets. Ditch large, complex frameworks and drop these lightweight building blocks into your site. We will show you how to build, test, and deploy a web component, and introduce you to the wide selection of existing web components available through Google\'s Polymer.</p>',
    ),
    'E1' => array(
        'speaker' => array (
            array (
                'name' => 'Bill Condo',
                'img' => 'bill_condo.jpg',
                'bio' => '<p>Bill is a long time PHP developer, small business owner, and a local PHP meetup organizer living in Columbus, OH. He frequently covers devops, application architecture, and security via public speaking and mentoring.</p>',
                'twitter' => 'mavrck',
            ),
        ),
        'title' => 'A Look Behind Recent Website Security Breaches',
        'tagline' => '',
        'talk_description' => '<p>It seems that we can\'t go a week without hearing about a security breach at a large scale website, or an established brick-and-mortar chain. Personal identifiable information and payment data are being leaked at alarming levels. We\'ll take a look at recent online breaches and discuss how each was achieved.</p>',
    ),
    'F3' => array(
        'speaker' => array (
            array (
                'name' => 'David Stockton',
                'img' => 'david_stockton.jpg',
                'bio' => '<p>David Stockton has been writing PHP code professionally since 1998. He is Vice President of Technology at i3logix in Denver, CO. He is very passionate about source control, TDD, APIs and PHP development. He is married and has two daughters who he is teaching to program and build circuits with Arduino and a five-year-old son who has a Master\'s degree in annoying his sisters, and has been seen studying calculus and recursive algorithms. He created zendtutorials.com and tddftw.com.</p>',
                'twitter' => 'dstockto',
            ),
        ),
        'title' => 'Using Queues and Offline Processing',
        'tagline' => '',
        'talk_description' => '<p>We\'re all familiar with the standard request cycle - a web request comes in, our scripts do something, and a response is returned. This happens whether we\'re talking about standard websites, or APIs or even CLI applications. There are many things that may need to happen in response to a request - charging a credit card, sending an email or text message, building a report and others need to happen, but they don\'t need to happen in order to give back a response to the user. By utilizing queues and making part of your site do its processing in an asynchronous or ""offline"" way, you can greatly increase the perceived speed of your site and allow for more easy scaling of aspects of your site or application that may be processing intensive without worrying about negatively affecting your site\'s users.</p>',
    ),
    'A2' => array(
        'speaker' => array (
            array (
                'name' => 'Dave Buchanan',
                'img' => 'dave_buchanan.png',
                'bio' => '<p>It all started with summer school and a Texas Instruments computer in 1984! Since then Dave has 17 professional years experience in web development, architecture, management, and mentoring others. His expertise is in integrating new technologies, leveraging open source for the enterprise, and team building. Dave has presented in the past at OpenWest 2016, MinneBar 2016, and WordCampMSP in 2014 and 2013.</p>',
                'twitter' => 'dave_r_buchanan',
            ),
        ),
        'title' => 'Failing Fast',
        'tagline' => '',
        'talk_description' => '<p>Let\'s talk about how to build features fast, test them, and let them fail quickly! Even the most advanced developers learn that the only option is to double what they think it will really take..At InboxDollars, we moved to a ""MVP"" development process a year ago. The entire company has adopted a fail fast mentality. Build things small...less than a week (sometimes two), roll it, then split test and  see if it wins. If it doesn\'t, move on! If it does well, then iterate! Aimed at development managers, architects, senior/mid developers. More of an approach on writing code then anything.</p>',
    ),
    'C3' => array(
        'speaker' => array (
            array (
                'name' => 'Edward Finkler',
                'img' => 'edward_finkler.jpg',
                'bio' => '<p>Ed Finkler, also known as <a href="https://twitter.com/funkatron">Funkatron</a>, started making web sites before browsers had frames. He does front-end and server-side work in Python, PHP, and JavaScript. He is the Lead Developer and Head of Developer Culture at <a href="http://graphstory.com">Graph Story</a>.</p>

<p>He served as web lead and security researcher at <a href="http://www.cerias.purdue.edu">The Center for Education and Research in Information Assurance and Security (CERIAS) at Purdue University</a> for 9 years. Along with Chris Hartjes, Ed is co-host of the <a href="http://devhell.info">Development Hell podcast</a>.</p>

<p>Ed\'s current passion is raising mental health awareness in the tech community with his <a href="https://osmihelp.org">Open Sourcing Mental Illness</a> speaking campaign.</p>

<p>Ed writes at <a href="http://funkatron.com">funkatron.com</a>.</p>',
                'twitter' => 'funkatron',
            ),
        ),
        'title' => 'Stronger Than Fear: Crisis in the Developer Community',
        'tagline' => '',
        'talk_description' => '<p>There is a crisis in the tech industry. At least 20% of our colleagues, friends, and teammates suffer silently with mental illness, but our work culture does little to help. Based on real data, we\'ll show the enormous impact of mental illness in our industry, and how we can change - and save - lives.</p>',
    ),
    'D2' => array(
        'speaker' => array (
            array (
                'name' => 'Emily Stamey',
                'img' => 'emily_stamey.jpg',
                'bio' => 'Emily is a developer at NC State, supporting the College of Engineering. She learned PHP in 1999 and discovered a whole new world of fun and programming. This started her passion for Open Source! In her free time she enjoys music, legos, making things, playing games, and socializing. She is an active volunteer in the community as an Organizer of TrianglePHP and Girl Develop It. She really enjoys helping people share ideas and learn together, which has led to her speaking at conferences.',
                'twitter' => 'elstamey',
            ),
        ),
        'title' => 'What\'s Your Skateboard?',
        'tagline' => '',
        'talk_description' => 'User Story Mapping is a valuable tool that gives you strategies to view features alongside the problems they solve. It is a powerful approach that allows many people to collaborate and prioritize features, regardless of technical expertise. Instead of planning our project as a building that we must build a strong foundation, we begin to plan as a vehicle. This focus delivers the Most Valuable Features to the customer by answering the question, "What\'s Your Skateboard?"',
    ),
    'F1' => array(
        'speaker' => array (
            array (
                'name' => 'Samantha Quiñones',
                'img' => 'samantha_quinones.jpg',
                'bio' => '<p>Samantha Quiñones is a polyglot hacker, data wrangler, and Principal Software Engineer at AOL. Over the course of her career, she has built software and led teams for some of the largest names in technology. Samantha is a frequent speaker at technology conferences and events around the world, organizer of the Washington, DC PHP User Group, and serves as a secretary of the PHP Framework Interoperability Group. She has been recognized by the Huffington Post as one of the top Latin Americans in Media and is a 2015 recipient of the DCFT Powerful Female Programmers Award.</p>',
                'twitter' => 'ieatkillerbees',
            ),
        ),
        'title' => 'How PHP Got Its Semicolons',
        'tagline' => '',
        'talk_description' => '<p>Programming as a profession doesn\'t have a very long history-- only 70 years-- but the history  we do have is very rich! Let\'s dig into the murky origins of symbolic languages and discover how objects and functions were born. We\'ll learn how a revolutionary changed the way we manage data and why JavaScript and XML are more closely related than you ever imagined! Along the way we\'ll meet some of the brilliant, sometimes ornery, and always fascinating characters that have gotten us where we are now, and take a sneak peek at what FizzBuzz may look like for future generations of programmers.</p>',
    ),
    'D3' => array(
        'speaker' => array (
            array (
                'name' => 'Peter Schuck',
                'img' => 'peter_schuck.jpg',
                'bio' => '<p>Peter is a full stack developer with a soft spot for functional programming al a Clojure and for high performance JavaScript. He\'s contributed to the ClojureScript compiler and is currently working on significant performance gains to Clojure\'s HashMaps. No language snob he\'s comfortable with a wide variety of languages like PHP, Ruby, JavaScript, and Scala. Peter is a senior software developer at Bendyworks in Madison WI.</p>',
                'twitter' => '',
            ),
        ),
        'title' => 'Property Based Testing: Let the Computer Make Tests for You',
        'tagline' => '',
        'talk_description' => '<p>While test driven development helps enormously with system reliability and helping us safely make changes, the usual test development process can be a slog. With each new class or feature we have a suite of unit tests we need to write that hopefully cover all cases.  With functional tests, it\'s even worse, with a few happy paths being tested and maybe one or two unhappy paths.</p>

<p>Why not let the computer generate these tests for you? With property based testing, you can let the computer generate as many tests as you have patience for over a much larger set of inputs then you could ever think of.</p>

<p>I\'ll be going over how to test your code with <a href="https://github.com/giorgiosironi/eris">Eris</a>, a property based testing library for PHP.</p>',
    ),
    'B3' => array(
        'speaker' => array (
            array (
                'name' => 'Heather White',
                'img' => 'heather_white.jpg',
                'bio' => '<p>Heather has held various jobs in the past, ranging from teaching elementary school to being a project manager and trainer for the Army\'s medical research program. She holds a Bachelors of Biology and a Masters in Curriculum Development. Most recently she used her background in curriculum and teaching to head up the Training Program at php[architect], manage customer service, and co-chair their conferences. Thanks to her varied background, she is now the President of One for All Events LLC - a technology and beyond event services company. Heather is also a self-proclaimed geek and enjoys Sci-Fi, Medieval reenactment, and board games.</p>',
                'twitter' => 'cattycreations',
            ),
        ),
        'title' => 'Stepping Outside your Comfort Zone: Learning to Teach',
        'tagline' => '',
        'talk_description' => '<p>As a developer you spend your entire life learning.  But what happens when the tables are turned and you become the teacher?  Do you want to become a conference speaker or a mentor, talk at your local user group, give presentations at work, or become a technical trainer?  As a previous classroom teacher with a Master\'s Degree in Curriculum Development, I will take you on a journey to understand the various learning styles and how to effectively reach everyone.  We will look at how to present your information, best ways to structure it, and learn ways to reach all students no matter their level.  We will also cover a number of best practices for crafting your presentation decks themselves.  Join me for this exploration into the inner workings of the human mind.</p>',
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
    ));
});

// route for schedule
$app->get('/schedule/', function() use($app) {
    return $app['twig']->render('pages/schedule.html', array(
        'nav' => $app['nav'],
        'talks' => $app['talks'],
        'sponsors' => $app['sponsors'],
        'active' => 'Schedule',
    ));
});

// route for speakers
$app->get('/speakers/', function() use($app) {
    return $app['twig']->render('pages/speakers.html', array(
        'nav' => $app['nav'],
        'talks' => $app['talks'],
        'sponsors' => $app['sponsors'],
        'active' => 'Speakers',
    ));
});

// route for venue
$app->get('/venue/', function() use($app) {
    return $app['twig']->render('pages/venue.html', array(
        'nav' => $app['nav'],
        'sponsors' => $app['sponsors'],
        'active' => 'Venue',
    ));
});

// route for hotel
$app->get('/hotel/', function() use($app) {
    return $app['twig']->render('pages/hotel.html', array(
        'nav' => $app['nav'],
        'sponsors' => $app['sponsors'],
        'active' => 'Hotel',
    ));
});

// route for sponsors
$app->get('/sponsors/', function() use($app) {
    return $app['twig']->render('pages/sponsors.html', array(
        'nav' => $app['nav'],
        'sponsors' => $app['sponsors'],
        'active' => 'Sponsors',
    ));
});

// route for expect
$app->get('/expect/', function() use($app) {
    return $app['twig']->render('pages/expect.html', array(
        'nav' => $app['nav'],
        'sponsors' => $app['sponsors'],
        'active' => 'What to Expect',
    ));
});

// route for organizers
$app->get('/organizers/', function() use($app) {
    return $app['twig']->render('pages/organizers.html', array(
        'nav' => $app['nav'],
        'sponsors' => $app['sponsors'],
        'active' => 'Organizers',
    ));
});

// route for tickets
$app->get('/tickets/', function() use($app) {
    return $app['twig']->render('pages/tickets.html', array(
        'nav' => $app['nav'],
        'sponsors' => $app['sponsors'],
        'active' => 'Tickets',
    ));
});

// route for conduct
$app->get('/conduct/', function() use($app) {
    return $app['twig']->render('pages/conduct.html', array(
        'nav' => $app['nav'],
        'sponsors' => $app['sponsors'],
        'active' => 'Code of Conduct',
    ));
});

// route for the conference map
$app->get('/conference_map/', function() use($app) {
    return $app['twig']->render('pages/conference_map.html', array(
        'nav' => $app['nav'],
        'sponsors' => $app['sponsors'],
        'active' => 'Conference Map',
    ));
});

// routes for schedule
$app->get('/talks/TA1/', function() use($app) {
    return $app['twig']->render('pages/talks.html', array(
        'nav' => $app['nav'],
        'active' => 'Schedule',
        'sponsors' => $app['sponsors'],
        'talk' => $app['talks']['TA1'],

    ));
});
$app->get('/talks/TA2/', function() use($app) {
    return $app['twig']->render('pages/talks.html', array(
        'nav' => $app['nav'],
        'active' => 'Schedule',
        'sponsors' => $app['sponsors'],
        'talk' => $app['talks']['TA2'],

    ));
});
$app->get('/talks/TB1/', function() use($app) {
    return $app['twig']->render('pages/talks.html', array(
        'nav' => $app['nav'],
        'active' => 'Schedule',
        'sponsors' => $app['sponsors'],
        'talk' => $app['talks']['TB1'],

    ));
});
$app->get('/talks/TB2/', function() use($app) {
    return $app['twig']->render('pages/talks.html', array(
        'nav' => $app['nav'],
        'active' => 'Schedule',
        'sponsors' => $app['sponsors'],
        'talk' => $app['talks']['TB2'],

    ));
});



$app->get('/talks/A1/', function() use($app) {
    return $app['twig']->render('pages/talks.html', array(
        'nav' => $app['nav'],
        'active' => 'Schedule',
        'sponsors' => $app['sponsors'],
        'talk' => $app['talks']['A1'],

    ));
});
$app->get('/talks/A2/', function() use($app) {
    return $app['twig']->render('pages/talks.html', array(
        'nav' => $app['nav'],
        'sponsors' => $app['sponsors'],
        'active' => 'Schedule',
        'talk' => $app['talks']['A2'],

    ));
});
$app->get('/talks/A3/', function() use($app) {
    return $app['twig']->render('pages/talks.html', array(
        'nav' => $app['nav'],
        'sponsors' => $app['sponsors'],
        'active' => 'Schedule',
        'talk' => $app['talks']['A3'],

    ));
});
$app->get('/talks/B1/', function() use($app) {
    return $app['twig']->render('pages/talks.html', array(
        'nav' => $app['nav'],
        'sponsors' => $app['sponsors'],
        'active' => 'Schedule',
        'talk' => $app['talks']['B1'],

    ));
});
$app->get('/talks/B2/', function() use($app) {
    return $app['twig']->render('pages/talks.html', array(
        'nav' => $app['nav'],
        'sponsors' => $app['sponsors'],
        'active' => 'Schedule',
        'talk' => $app['talks']['B2'],

    ));
});
$app->get('/talks/B3/', function() use($app) {
    return $app['twig']->render('pages/talks.html', array(
        'nav' => $app['nav'],
        'sponsors' => $app['sponsors'],
        'active' => 'Schedule',
        'talk' => $app['talks']['B3'],

    ));
});
$app->get('/talks/C1/', function() use($app) {
    return $app['twig']->render('pages/talks.html', array(
        'nav' => $app['nav'],
        'sponsors' => $app['sponsors'],
        'active' => 'Schedule',
        'talk' => $app['talks']['C1'],

    ));
});
$app->get('/talks/C2/', function() use($app) {
    return $app['twig']->render('pages/talks.html', array(
        'nav' => $app['nav'],
        'sponsors' => $app['sponsors'],
        'active' => 'Schedule',
        'talk' => $app['talks']['C2'],

    ));
});
$app->get('/talks/C3/', function() use($app) {
    return $app['twig']->render('pages/talks.html', array(
        'nav' => $app['nav'],
        'sponsors' => $app['sponsors'],
        'active' => 'Schedule',
        'talk' => $app['talks']['C3'],

    ));
});
$app->get('/talks/D1/', function() use($app) {
    return $app['twig']->render('pages/talks.html', array(
        'nav' => $app['nav'],
        'sponsors' => $app['sponsors'],
        'active' => 'Schedule',
        'talk' => $app['talks']['D1'],

    ));
});
$app->get('/talks/D2/', function() use($app) {
    return $app['twig']->render('pages/talks.html', array(
        'nav' => $app['nav'],
        'sponsors' => $app['sponsors'],
        'active' => 'Schedule',
        'talk' => $app['talks']['D2'],

    ));
});
$app->get('/talks/D3/', function() use($app) {
    return $app['twig']->render('pages/talks.html', array(
        'nav' => $app['nav'],
        'sponsors' => $app['sponsors'],
        'active' => 'Schedule',
        'talk' => $app['talks']['D3'],

    ));
});
$app->get('/talks/E1/', function() use($app) {
    return $app['twig']->render('pages/talks.html', array(
        'nav' => $app['nav'],
        'sponsors' => $app['sponsors'],
        'active' => 'Schedule',
        'talk' => $app['talks']['E1'],

    ));
});
$app->get('/talks/E2/', function() use($app) {
    return $app['twig']->render('pages/talks.html', array(
        'nav' => $app['nav'],
        'sponsors' => $app['sponsors'],
        'active' => 'Schedule',
        'talk' => $app['talks']['E2'],

    ));
});
$app->get('/talks/E3/', function() use($app) {
    return $app['twig']->render('pages/talks.html', array(
        'nav' => $app['nav'],
        'sponsors' => $app['sponsors'],
        'active' => 'Schedule',
        'talk' => $app['talks']['E3'],

    ));
});
$app->get('/talks/F1/', function() use($app) {
    return $app['twig']->render('pages/talks.html', array(
        'nav' => $app['nav'],
        'sponsors' => $app['sponsors'],
        'active' => 'Schedule',
        'talk' => $app['talks']['F1'],

    ));
});
$app->get('/talks/F2/', function() use($app) {
    return $app['twig']->render('pages/talks.html', array(
        'nav' => $app['nav'],
        'sponsors' => $app['sponsors'],
        'active' => 'Schedule',
        'talk' => $app['talks']['F2'],

    ));
});
$app->get('/talks/F3/', function() use($app) {
    return $app['twig']->render('pages/talks.html', array(
        'nav' => $app['nav'],
        'sponsors' => $app['sponsors'],
        'active' => 'Schedule',
        'talk' => $app['talks']['F3'],

    ));
});
$app->get('/talks/keynote/', function() use($app) {
    return $app['twig']->render('pages/talks.html', array(
        'nav' => $app['nav'],
        'sponsors' => $app['sponsors'],
        'active' => 'Schedule',
        'talk' => $app['talks']['keynote'],

    ));
});



$app->run();
