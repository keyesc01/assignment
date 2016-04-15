<?php
namespace Itb;

use Mattsmithdev\PdoCrud\DatabaseTable;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class MainController extends DatabaseTable
{
    public function indexAction(Request $request, Application $app)
    {
        $argsArray = [];


        $templateName = 'index';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }
    public function adminAction(Request $request, Application $app)
    {
//        $studentRepository = new StudentRepository();
        $students = StudentRepository::getAll();

        $argsArray = [
            'students' => $students
        ];



        $templateName = 'admin';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }


    /**
     * render the About page template
     */
    public function membersAction(Request $request, Application $app)
    {
        $argsArray = [];


        $templateName = 'members';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    /**
     * render the Index page template
     */
    public function listAction(Request $request, Application $app)
    {
        $studentRepository = new StudentRepository();
        $students = $studentRepository->getAll();

        $argsArray = [
            'students' => $students
        ];

        $templateName = 'list';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }
    /**
     * render the days page template
     */
    public function daysAction(Request $request, Application $app)
    {
        $days = array(
            'Monday ='.' Bushido',
            'Tuesday ='.' Karate',
            'Wednesday ='.' Kick Boxing',
            'Thursday ='.' Kendo',
            'Friday ='.' Bo Staff Training'
        );


        $argsArray = [
            'days' => $days,
        ];

        $templateName = 'days';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }
    public function insertAction(Request $request, Application $app, $id)
    {
        print'boo';

        $students = StudentRepository::getAll();

        $argsArray = [
            'students' => $students
        ];

        $templateName = 'insert';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
//        $db = new DatabaseManager();
//        $connection = $db->getDbh();
//
//        $statement = $connection->prepare('INSERT into ' . static::getTableName()  . ' WHERE id=:id');
//        $statement->bindParam(':id', $id, \PDO::PARAM_INT);
//        $queryWasSuccessful = $statement->execute();
//        return $queryWasSuccessful;
    }
}