<?php
use Itb\MainController;

// do out basic setup
// ------------
require_once __DIR__ . '/../app/setup.php';

define('DB_HOST','localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'student');


// use our static controller() method...
$app->get('/',      \Itb\Utility::controller('Itb', 'main/index'));
$app->get('/index',      \Itb\Utility::controller('Itb', 'main/index'));
$app->get('/members', \Itb\Utility::controller('Itb', 'main/members'));
$app->get('/days', \Itb\Utility::controller('Itb', 'main/days'));
$app->get('/list', \Itb\Utility::controller('Itb', 'main/list'));
$app->post('/login', \Itb\Utility::controller('Itb', 'user/processlogin'));
$app->post('/processlogin', \Itb\Utility::controller('Itb', 'user/loginsuccess'));


// 404 - Page not found
$app->error(function (\Exception $e, $code) use ($app) {
    switch ($code) {
        case 404:
            $message = 'The requested page could not be found.';
            return \Itb\MainController::error404($app, $message);

        default:
            $message = 'We are sorry, but something went terribly wrong.';
            return \Itb\MainController::error404($app, $message);
    }
});

// run Silex front controller
// ------------


$app->run();
