<?php
/**
 * main conreoller
 */
namespace Itb\controller;

use Itb\Model\Student;
use Itb\Model\Grading;
use Mattsmithdev\PdoCrud\DatabaseTable;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class MainController
 * @package Itb\controller
 */
class MainController
{
    /**
     * index action
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function indexAction(Request $request, Application $app)
    {
        $argsArray = [];


        $templateName = 'index';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    /**
     * admin action
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function adminAction(Request $request, Application $app)
    {
        //        $studentRepository = new StudentRepository();
        $students = Student::getAll();
        $gradings = Grading::getAll();

        $argsArray = [
            'students' => $students,
            'gradings' => $gradings
        ];

        $templateName = 'admin';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    /**
     * members action
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function membersAction(Request $request, Application $app)
    {
        $argsArray = [];


        $templateName = 'members';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    /**
     * list action
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function listAction(Request $request, Application $app)
    {
        //$studentRepository = new Student();
        $students = Student::getAll();

//        $gradeRepository = new Grading();
        $gradings = Grading::getAll();

        $argsArray = [
            'students' => $students,
            'gradings' => $gradings
        ];

        $templateName = 'list';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    /**
     * days action
     * @param Request $request
     * @param Application $app
     * @return mixed
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

    /**
     * insert action
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function insertAction(Request $request, Application $app)
    {
        $students = Student::getAll();

        $argsArray = [
            'students' => $students
        ];

        $templateName = 'newStudentForm';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
//        $db = new DatabaseManager();
//        $connection = $db->getDbh();
//
//        $statement = $connection->prepare('INSERT into ' . static::getTableName()  . ' WHERE id=:id');
//        $statement->bindParam(':id', $id, \PDO::PARAM_INT);
//        $queryWasSuccessful = $statement->execute();
//        return $queryWasSuccessful;
    }

    /**
     * delete action
     * @param Request $request
     * @param Application $app
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deleteAction(Request $request, Application $app, $id)
    {
        $students = Student::delete($id);

//        $argsArray = [
//            'message' => 'The selected row has been removed from the database'
//        ];
//
//        $templateName = 'message';
//
//        return $app['twig']->render($templateName . '.html.twig', $argsArray);
        return $app->redirect('/admin');
    }

    /**
     * update action
     * @param Request $request
     * @param Application $app
     * @param $id
     * @return mixed
     */
    public function updateAction(Request $request, Application $app, $id)
    {
        $student = Student::getOneById($id);

        $argsArray = [
            'student' => $student
        ];

        $templateName = 'updateStudentForm';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    /**
     * new student
     * @param Request $request
     * @param Application $app
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function createNewStudentAction(Request $request, Application $app)
    {
        $username = $request->get('username');
        $password = $request->get('password');
        $joined = $request->get('joined');
        $lastGrade = $request->get('lastGrade');
        $currentGrade = $request->get('currentGrade');

//        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
//        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
//        $joined = filter_input(INPUT_POST, 'joined', FILTER_SANITIZE_STRING);
//        $lastGrade = filter_input(INPUT_POST, 'lastGrade', FILTER_SANITIZE_STRING);
//        $currentGrade = filter_input(INPUT_POST, 'currentGrade', FILTER_SANITIZE_STRING);

        $student= new Student();
        $student->setUsername($username);
        $student->setPassword($password);
        $student->setJoined($joined);
        $student->setLastGrade($lastGrade);
        $student->setCurrentGrade($currentGrade);
        $insertSuccess = Student::insert($student);

  //      $grade = new Grading();

//        $date=(date("Y-m-d-h:i:sa"));

        //$grade->setDate($date);
        //$dateSuccess = Grading::insert($grade);


        if ($insertSuccess) {
            return $app->redirect('/admin');
        } else {
            print 'wrong try again';
            //$message = 'error - not able to CREATE item ';
            //$message .= '<pre>';
            // capture print_r output as a string
            // $message .= print_r($student, true);
            $templateName = 'newStudentForm';
            return $app['twig']->render($templateName . '.html.twig', []);
        }
    }

    /**
     * update students info
     * @param Request $request
     * @param Application $app
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function updateUserAction(Request $request, Application $app, $id)
    {
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
//        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        $joined = filter_input(INPUT_POST, 'joined', FILTER_SANITIZE_STRING);
        $lastGrade = filter_input(INPUT_POST, 'lastGrade', FILTER_SANITIZE_STRING);
        $currentGrade = filter_input(INPUT_POST, 'currentGrade', FILTER_SANITIZE_STRING);

        $student = student::getOneById($id);

        $student->setUsername($username);
        $student->setPassword($password);
        $student->setJoined($joined);
        $student->setLastGrade($lastGrade);
        $student->setCurrentGrade($currentGrade);
        $insertSuccess = Student::update($student);

        if ($insertSuccess) {
            return $app->redirect('/admin');
        } else {
            print 'wrong try again';
            //$message = 'error - not able to CREATE item ';
            //$message .= '<pre>';
            // capture print_r output as a string
            // $message .= print_r($student, true);
            $templateName = 'updateStudentForm';
            return $app['twig']->render($templateName . '.html.twig', []);
        }
    }

    /**
     * find username password in db
     * @param $username
     * @param $password
     * @return bool
     */
    public static function canFindMatchingUsernameAndPassword($username, $password)
    {
        $user = Student::getOneByUsername($username);

        // if no record has this username, return FALSE
        if (null == $user) {
            return false;
        }

        // hashed correct password
        $hashedStoredPassword = $user->getPassword();

//        print $hashedStoredPassword. $password;
//        die();
        // return whether or not hash of input password matches stored hash
        return password_verify($password, $hashedStoredPassword);
    }
}
