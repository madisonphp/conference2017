<?php
use Composer\Factory;
use Composer\XdebugHandler;
use Composer\Console\Application;

date_default_timezone_set('America/Chicago');

header("Content-type: text/plain"); // be explicit to avoid accidental XSS

$gitpath = '/usr/local/bin/git';
chdir(__DIR__ . '/../'); // rarely actually an acceptable thing to do
system("/usr/bin/env -i {$gitpath} pull 2>&1"); // main repo (current branch)

error_reporting(-1);

// Create output for XdebugHandler and Application
$output = Factory::createOutput();

putenv('COMPOSER_BINARY='.realpath(__FILE__));

// run the command application
$application = new Application();
$application->run(null, $output);
