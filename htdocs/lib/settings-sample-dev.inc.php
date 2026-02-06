<?php
/***************************************************************************
 *  You may enter special or testing settings for your developer maching here
 ***************************************************************************/

// installation paths
$dev_basepath = '/var/www/html/';
$dev_codepath = '';
$dev_baseurl = 'https://opencaching.ddev.site';

$debug_page = true;

// setting cookie values
$opt['session']['path'] = '/';
$opt['session']['domain'] = '.opencaching.ddev.site';

// database access
$dbserver = 'db';
$dbusername = 'root';
$dbpasswd = 'root';
$dbpconnect = false;

// database names
$dbname = 'db';
$tmpdbname = 'octmp';   // empty db with CREATE and DROP privileges

// enable HTTPS
if (defined('HTTPS_ENABLED')) {
    $opt['page']['https']['mode'] = HTTPS_ENABLED;
}

// common developer system settings
require __DIR__ . '/settings-dev.inc.php';

$sql_errormail = 'root';
