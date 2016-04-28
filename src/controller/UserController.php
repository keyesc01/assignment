<?php
/**
 * Created by PhpStorm.
 * User: cathal
 * Date: 01/04/2016
 * Time: 09:20
 */

namespace Itb\controller;

use Mattsmithdev\PdoCrud\DatabaseManager;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Itb\Controller\MainController;
use Itb\Model\Student;
use Itb\Model\Grading;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * Class UserController
 * @package Itb\controller
 */
class UserController extends DatabaseManager
{
    // action for POST route:    /processLogin
    /**
     * login process
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function processLoginAction(Request $request, Application $app)
    {
        // default is bad login
        $isLoggedIn = false;
        $username =$request->get('username');
        $password =$request->get('password');


        $date = (date("Y-m-d-h:i:sa"));
        echo $date;

        $student = Student::getOneByUsername($username);

        // search for user with username in repository
        $isLoggedIn = MainController::canFindMatchingUsernameAndPassword($username, $password);

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $argsArray = [
            'username' => $username,
            'student' => $student
        ];

        // action depending on login success
        if ($isLoggedIn) {
            $templateName = 'loginSuccess';

            session_start();


            return $app['twig']->render($templateName . '.html.twig', $argsArray);
        } else {
            $message = 'bad username or password, please try again';
            $argsArray = [
                'message' => $message
            ];
            $templateName = 'members';
            return $app['twig']->render($templateName . '.html.twig', $argsArray);
        }
    }

    // action for route:    /login
    /**
     * login action
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function loginAction(Request $request, Application $app)
    {
        // logout any existing user
        $app['session']->set('user', null);

        // build args array
        // ------------
        $argsArray = [];

        // render (draw) template
        // ------------
        $templateName = 'members';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    // action for route:    /logout
    /**
     * logout action
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function logoutAction(Request $request, Application $app)
    {
        // logout any existing user
        $app['session']->set('user', null);

        // redirect to home page
//        return $app->redirect('');

        // render (draw) template
        // ------------
        $templateName = 'index';
        return $app['twig']->render($templateName . '.html.twig', []);
    }
}
