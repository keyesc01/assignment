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
use Itb\Model\Attendance;
use Itb\Model\Technique;
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

        // search for user with username in repository
        $isLoggedIn = MainController::canFindMatchingUsernameAndPassword($username, $password);
//       $timestamp =  UserController::registertimeLogin();

        $argsArray = ['username' => $username];
        // action depending on login success
        if ($isLoggedIn) {

//            if($username == "admin")
//            {
//                $students = student::getAll();
//
//                $argsArray = [
//                    'students' => $students,
//                ];
//                $templateName = 'admin';
//                return $app['twig']->render($templateName . '.html.twig', $argsArray);
//            }
            $students = Student::getOneByUsername($username);
            $classes = Technique::getAll();


            $attendee = new Attendance();
            $attendee->setUsername($username);

            $insertSuccess = Attendance::insert($attendee);

            $attendences = Attendance::searchByColumn('username', $username);
            //$attendences = attendence::getOneByUsername($username);
            $argsArray = [
                'student' => $students,
                'username' => $username,
                'attendants' => $attendences,
                'description' => $classes
            ];

            $templateName = 'loginSuccess';
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
