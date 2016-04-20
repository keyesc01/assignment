<?php
/**
 * Created by PhpStorm.
 * User: cathal
 * Date: 01/04/2016
 * Time: 09:20
 */

namespace Itb\Controller;

use Mattsmithdev\PdoCrud\DatabaseManager;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class UserController extends DatabaseManager
{
    // action for POST route:    /processLogin
    public function processLoginAction(Request $request, Application $app)
    {
        // retrieve 'name' from GET params in Request object
        $username = $request->get('username');
        $password = $request->get('password');

        // authenticate!
        if ($username != '' && $password != '') {
            // store username in 'user' in 'session'
            $app['session']->set('user', array('username' => $username));

            $templateName = 'loginSuccess';
            $argsArray = array('username' => $username);
            return $app['twig']->render($templateName . '.html.twig', $argsArray);
        }
        else if($username == '' && $password == ''){
            echo 'you must enter a username and password';
        }


            // success - redirect to the secure admin home page
           // return $app->redirect('admin');
        $templateName = 'members';
        $argsArray = array(
            'errorMessage' => 'bad username or password - please re-enter'
        );

        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    // action for route:    /login
    public function loginAction(Request $request, Application $app)
    {
        // logout any existing user
        $app['session']->set('user', null );

        // build args array
        // ------------
        $argsArray = [];

        // render (draw) template
        // ------------
        $templateName = 'members';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    // action for route:    /logout
    public function logoutAction(Request $request, Application $app)
    {
        // logout any existing user
        $app['session']->set('user', null );

        // redirect to home page
//        return $app->redirect('');

        // render (draw) template
        // ------------
        $templateName = 'index';
        return $app['twig']->render($templateName . '.html.twig', []);

    }



}