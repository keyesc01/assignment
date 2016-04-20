<?php
namespace Itb\Controller;
use Itb\Model\Student;
use Mattsmithdev\PdoCrud\DatabaseTable;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class MainController
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
        $students = Student::getAll();

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
        $studentRepository = new Student();
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
    public function deleteAction(Request $request, Application $app,$id)
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
    public function updateAction(Request $request, Application $app,$id)
    {
        $student = Student::getOneById($id);

        $argsArray = [
            'student' => $student
        ];

        $templateName = 'updateStudentForm';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);


    }
    public function createNewStudentAction(Request $request, Application $app)
    {
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        $joined = filter_input(INPUT_POST, 'joined', FILTER_SANITIZE_STRING);
        $lastGrade = filter_input(INPUT_POST, 'lastGrade', FILTER_SANITIZE_STRING);
        $currentGrade = filter_input(INPUT_POST, 'currentGrade', FILTER_SANITIZE_STRING);

        $student= new Student();
        $student->setUsername($username);
        $student->setPassword($password);
        $student->setJoined($joined);
        $student->setLastGrade($lastGrade);
        $student->setCurrentGrade($currentGrade);
        $insertSuccess = Student::insert($student);

        if($insertSuccess){
            return $app->redirect('/admin');
        }
        else {
            print 'wrong try again';
            //$message = 'error - not able to CREATE item ';
            //$message .= '<pre>';
            // capture print_r output as a string
            // $message .= print_r($student, true);
            $templateName = 'newStudentForm';
            return $app['twig']->render($templateName . '.html.twig', []);

        }
    }
    public function updateUserAction(Request $request, Application $app,$id)
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

        if($insertSuccess){
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



}