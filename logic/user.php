<?php

class UserReg
{
    private $first_name;
    private $last_name;
    private $username;
    private $password;
    private $repeat_password;

    private $errors = array();

    public function __construct($first_name, $last_name, $username, $password, $repeat_password)
    {
        $this->first_name = $this->validate($first_name);
        $this->last_name = $this->validate($last_name);
        $this->username = $this->validate($username);
        $this->password = $this->validate($password);
        $this->repeat_password = $this->validate($repeat_password);

        $this->isFirstNameValid();
        $this->isLastNameValid();
        $this->isUsernameValid();
        $this->isPasswordValid();
        $this->isPasswordRepeatValid();
    }

    private function isFirstNameValid()
    {
        if ($this->first_name == null or strlen($this->first_name) <= 1) {
            $this->errors['first_name'] = "Имя должно быть длиннее 1 символа";
        }
    }

    private function isLastNameValid()
    {
        if ($this->last_name == null or strlen($this->last_name) <= 3) {
            $this->errors['last_name'] = "Фамилия должна быть длиннее 3 символов";
        }
    }

    private function isUsernameValid()
    {
        if ($this->username == null or strlen($this->username) <= 5) {
            $this->errors['username'] = "Логин должен быть длиннее 5 символов";
        }
    }

    private function isPasswordValid()
    {
        if ($this->password == null or strlen($this->password) <= 8) {
            $this->errors['password'] = "Пароль должен быть длиннее 8 символов";
        }
    }

    private function isPasswordRepeatValid()
    {
        if ($this->repeat_password == null or $this->repeat_password != $this->password) {
            $this->errors['repeat_password'] = "Пароли не совпадают";
        }
    }

    private function validate($data)
    {
        $data = strip_tags($data);
        $data = trim($data);
        $data = preg_replace('/\s+/', ' ', $data);
        $data = htmlentities($data);
        return $data;
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function getFirstName()
    {
        return $this->first_name;
    }

    public function getLastName()
    {
        return $this->last_name;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getRepeatPassword()
    {
        return $this->repeat_password;
    }
}

class UserAuth
{
    private $username;
    private $password;

    public function __construct($username, $password)
    {
        $this->username = $this->validate($username);
        $this->password = $this->validate($password);
    }

    private function validate($data)
    {
        $data = strip_tags($data);
        $data = trim($data);
        $data = preg_replace('/\s+/', ' ', $data);
        $data = htmlentities($data);
        return $data;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getPassword()
    {
        return $this->password;
    }
}
