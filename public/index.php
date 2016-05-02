<?php

use Itb\Controller\MainController;

require_once __DIR__ . '/../app/setup.php';


$app->get('/', 'Itb\Controller\MainController::indexAction');
$app->get('/index', 'Itb\Controller\MainController::indexAction');
$app->get('/admin', 'Itb\Controller\MainController::adminAction');

$app->get('/belts', 'Itb\Controller\MainController::beltAction');
$app->post('/beltInfo', 'Itb\Controller\MainController::beltInfoAction');
$app->post('/lastGrade', 'Itb\Controller\MainController::findLastGrade');


$app->get('/members', 'Itb\Controller\MainController::membersAction');
$app->get('/days', 'Itb\Controller\MainController::daysAction');
//$app->get('/list', 'Itb\Controller\MainController::listAction');
$app->post('/create', 'Itb\Controller\MainController::createNewStudentAction');

$app->get('/insert', 'Itb\Controller\MainController::insertAction');
$app->get('/delete/{id}', 'Itb\Controller\MainController::deleteAction');

$app->get('/update/{id}', 'Itb\Controller\MainController::updateAction');
//$app->post('/update', 'Itb\Controller\MainController::updateUserAction');
$app->post('/updateUser/{id}', 'Itb\Controller\MainController::updateUserAction');

$app->post('/login', 'Itb\Controller\UserController::processloginAction');
$app->post('/processlogin', 'Itb\Controller\UserController::loginsuccessAction');
$app->get('/logout', 'Itb\Controller\UserController::logoutAction');

//$app->error(function (\Exception $e, $code) use ($app) {
//    $errorController = new Itb\Controller\MainController();
//    return $errorController->errorAction($app, $code);
//});

$app['debug']=true;
$app->run();


