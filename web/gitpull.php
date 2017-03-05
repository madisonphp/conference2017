<?php
header("Content-type: text/plain"); // be explicit to avoid accidental XSS

$gitpath = '/usr/local/bin/git';
chdir(__DIR__ . '/../'); // rarely actually an acceptable thing to do
system("/usr/bin/env -i {$gitpath} pull 2>&1"); // main repo (current branch)
system("/usr/bin/env -i COMPOSER_HOME=./.composer /usr/local/bin/composer self-update 2>&1"); // composer
system("/usr/bin/env -i COMPOSER_HOME=./.composer /usr/local/bin/composer install 2>&1"); // composer
