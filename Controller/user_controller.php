<?php
/**
 * Created by PhpStorm.
 * User: thomasbuatois
 * Date: 25/11/2017
 * Time: 15:48
 */
class UsersController{


    public function connect(){


        if (
            (isset($_POST['Email']) && !empty($_POST['Email'])) &&
            (isset($_POST['Password']) && !empty(['Password']))){

            $Email = $_POST['Email'];
            $Password = $_POST['Password'];

            $user = new Users();
            $connect = $user->connect($Email, $Password);
            if ($connect){
                header('Location: index.php?controller=pages&action=home_user');
            }
        }
        /*else
            header('Location: index.php?controller=pages&action=login');*/
    }

    public function disconnect(){
        session_destroy();
        header('Location: index.php');
    }

    private function checkPost($Post_Array){

        foreach ($Post_Array as $key){
            if(!isset($_POST[$key]) && empty($_POST[$key])){
                return False;
            }
        }
        return True;
    }

    public function register(){

        $post_params = array('LastName', 'FirstName', 'Email', 'Phone', 'Password', 'Password_Verif', 'Role');

        if ( $this->checkPost($post_params)) {

            if ($_POST['Password'] != $_POST['Password_Verif']) {
                $error = 'Password does not match';

                $controller = 'pages';
                $action = 'register_user';

            } else {

                $user = new Users();

                $user_params = [
                    "LastName" => $_POST['LastName'],
                    "FirstName" => $_POST['FirstName'],
                    "Email" => $_POST['Email'],
                    "Phone" => $_POST['Phone'],
                    "Password" => $_POST['Password'],
                    'Role' => $_POST['Role']

                ];

                $user->register_user($user_params);


                $controller = 'pages';
                $action = 'home';

            }
        }


    }

    public function update(){

        $post_params = array('LastName', 'FirstName', 'Email', 'Phone', 'Password', 'Password_Verif', 'Role');

        if ($this->checkPost($post_params)) {

            if ($_POST['Password'] != $_POST['Password_Verif']) {
                $error = 'Password does not match';

                $controller = 'pages';
                $action = 'update_user';

            } else {


                $user = new Users();

                $user_params = [
                    "LastName" => $_POST['LastName'],
                    "FirstName" => $_POST['FirstName'],
                    "Email" => $_POST['Email'],
                    "Phone" => $_POST['Phone'],
                    'ID' => $_POST['ID']

                ];

                $user->update_user($user_params);

            }
        $controller = 'pages';
        $action = 'home';
        }
    }
}