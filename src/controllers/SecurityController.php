<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';

class SecurityController extends AppController {

    public function login() {
        $user = new User('email@email.com', 'admin', 'name', 'surname');

        if( $this->isGet() ) {
            return $this->render('login');
        }
        
        $email = $_POST["email"];
        $password = $_POST["password"];

        if ($user-> getEmail() !== $email) {
            return $this->render('login', ['messages' => ['User with this email not exist.']]);
        }

        if ($user-> getPassword() !== $password) {
            return $this->render('login', ['messages' => ['Wrong password.']]);
        }

        return $this->render('search');
    }

    public function register()
    {
        if (!$this->isPost()) {
            return $this->render('register');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmedPassword = $_POST['confirmedPassword'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $phone = $_POST['phone'];

        if ($password !== $confirmedPassword) {
            return $this->render('register', ['messages' => ['Please provide proper password']]);
        }

        //TODO try to use better hash function
        $user = new User($email, md5($password), $name, $surname);
        $user->setPhone($phone);

        $this->userRepository->addUser($user);

        return $this->render('login', ['messages' => ['You\'ve been succesfully registrated!']]);
    }
}