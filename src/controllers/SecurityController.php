<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class SecurityController extends AppController {
    private $userRepository;

    public function __construct() {
        parent::__construct();
        $this->userRepository = new UserRepository();
    }

    public function login() {
        session_start();

        if( $this->isGet() ) {
            return $this->render('login');
        }

        $email = $_POST["email"];
        $password = $_POST["password"];

        $user = $this->userRepository->getUser($email);

        if (!$user) {
            return $this->render('login', ['messages' => ['User not exist.']]);
        }

        if ($user-> getEmail() !== $email) {
            return $this->render('login', ['messages' => ['User with this email not exist.']]);
        }

        if ( !password_verify($password, $user-> getPassword()) ) {
            return $this->render('login', ['messages' => ['Wrong password.']]);
        }

        $_SESSION['user_id'] = $this->userRepository->getUserId($email);
        $_SESSION['email'] = $email;


        $url = "http://$_SERVER[HTTP_HOST]";

        if ( $user->getIsAdmin() === true ) {
            header("Location: {$url}/admin");
        }

        header("Location: {$url}/weather");
    }

    public function logout() {
        session_destroy();


        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/");
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

        $user = new User($email, password_hash($password, PASSWORD_DEFAULT), $name, $surname);
        $user->setPhone($phone);

        $this->userRepository->addUser($user);

        return $this->render('login', ['messages' => ['You\'ve been succesfully registrated!']]);
    }
}