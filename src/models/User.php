<?php

class User {
    private $email;
    private $password;
    private $name;
    private $surname;
    private $phone;
    private $is_admin;

    public function __construct(string $email, string $password, string $name, string $surname, bool $is_admin) {
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
        $this->surname = $surname;
        $this->is_admin = $is_admin;
    }

    public function setEmail(string $email) {
        $this->email = $email;
    }

    public function getEmail() : string {
        return $this->email;
    }

    public function setPassword(string $password) {
        $this->password = $password;
    }

    public function getPassword() : string {
        return $this->password;
    }

    public function setName(string $name) {
        $this->name= $name;
    }

    public function getName() : string {
        return $this->name;
    }

    public function setSurname(string $surname) {
        $this->surname = $surname;
    }

    public function getSurname() : string {
        return $this->surname;
    }

    public function setPhone(string $phone) {
        $this->phone = $phone;
    }

    public function getPhone() : string {
        return $this->phone;
    }

    public function getIsAdmin() : bool {
        return $this->is_admin;
    }
}