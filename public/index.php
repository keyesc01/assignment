<?php
use Itb\Controller\MainController;

// do out basic setup
// ------------
require_once __DIR__ . '/../app/setup.php';



// use our static controller() method...
$app->get('/', 'Itb\Controller\MainController::indexAction');
$app->get('/index', 'Itb\Controller\MainController::indexAction');
$app->get('/admin', 'Itb\Controller\MainController::adminAction');

$app->get('/members', 'Itb\Controller\MainController::membersAction');
$app->get('/days', 'Itb\Controller\MainController::daysAction');
$app->get('/list', 'Itb\Controller\MainController::listAction');
$app->post('/create', 'Itb\Controller\MainController::createNewStudentAction');


$app->get('/insert', 'Itb\Controller\MainController::insertAction');
$app->get('/delete/{id}', 'Itb\Controller\MainController::deleteAction');

$app->get('/update/{id}', 'Itb\Controller\MainController::updateAction');
//$app->post('/update', 'Itb\Controller\MainController::updateUserAction');
$app->post('/updateUser/{id}', 'Itb\Controller\MainController::updateUserAction');

$app->post('/login', 'Itb\Controller\UserController::processloginAction');
$app->post('/processlogin','Itb\Controller\UserController::loginsuccessAction');


$app['debug']=true;
$app->run();

//// 404 - Page not found
//$app->error(function (\Exception $e, $code) use ($app) {
//    switch ($code) {
//        case 404:
//            $message = 'The requested page could not be found.';
//            return \Itb\MainController::error404($app, $message);
//
//        default:
//            $message = 'We are sorry, but something went terribly wrong.';
//            return \Itb\MainController::error404($app, $message);
//    }
//});
//
//// run Silex front controller
//// ------------
//

