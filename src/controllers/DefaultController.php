<?php

require_once 'AppController.php';

class DefaultController extends AppController {

    public function index() {
        $this->render('search');
    }

    public function rain() {
        $this->render('rain');
    }

    public function tomorrow() {
        $this->render('tomorrow');
    }

    public function weather() {
        $this->render('weather');
    }

    public function wind() {
        $this->render('wind');
    }

}