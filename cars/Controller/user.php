<?php

namespace car\Controllers;

session_start();
class User
{
    private $usersTable;

    public function __construct($usersTable)
    {
        $this->usersTable = $usersTable;
    }
    // this would allow user to login
   
    public function login()
    {
        if (isset($_POST['submit'])) {
            $result = $this->usersTable->find('username', $_POST['username']);
            $user = $result[0];
            $username = $user['username'];
            $password = $user['password'];
            $usertype = $user['usertype'];
            $userid = $user['id'];
            if ($_POST['password'] == $password) {
                $_SESSION['loggedin'] = true;
                $_SESSION['loggeduser'] = $username;
                $_SESSION['loggedtype'] = $usertype;
                $_SESSION['loggedid'] = $userid;
                echo $username;
                echo $usertype;
                if ($_SESSION['loggedtype'] == 'Client') {
                    header('location: /car/clientlist');
                } else {
                    header('location: /job/list');
                }
            } else {
                header('location: /user/login');
            }
        } else {
            $user = false;
        }
        return [
            'template' => 'login.html.php',
            'variables' => ['user' => $user],
            'variables' => [],
            'title' => 'Login'
        ];
    }
    // allow user to log out
    public function logout()
    {

        unset($_SESSION['loggedin']);
        unset($_SESSION['loggeduser']);
        unset($_SESSION['loggedtype']);
        unset($_SESSION['loggedid']);
        return [
            'template' => 'logout.html.php',
            'variables' => [],
            'variables' => [],
            'title' => 'Logout'
        ];
    }
    // list all active users
    public function list()
    {
        $users = $this->usersTable->find('status', 'Active');
        return [
            'template' => 'userlist.html.php',
            'title' => 'User List',
            'variables' => [
                'users' => $users

            ]
        ];
    }
    // save user
    public function registerSubmit()
    {
        $user = $_POST['user'];

        $this->usersTable->save($user);
        header('location: /user/list');
    }
    // list all edit/creeate users
    public function registerForm()
    {
        if (isset($_GET['id'])) {
            $result = $this->usersTable->find('id', $_GET['id']);
            $user = $result[0];
        } else {
            $user = false;
        }
        return [
            'template' => 'edituser.html.php',
            'variables' => ['user' => $user],
            'title' => 'Edit User'
        ];
        header('location: /job/list');
    }
    // validate user registration
    public function validateRegistration($user)
    {
        $errors = [];
        if ($user['username'] == '') {
            $errors[] = 'You must enter a user name';
        }
        if ($user['firstname'] == '') {
            $errors[] = 'You must enter a first name';
        }
        if ($user['lastname'] == '') {
            $errors[] = 'You must enter a surname';
        }
        if ($user['email'] == '') {
            $errors[] = 'You must enter an email';
        }
        if ($user['password'] == '') {
            $errors[] = 'You must enter a password';
        }
        if ($user['usertype'] == '') {
            $errors[] = 'You must enter a usertype';
        }
        if ($user['status'] == '') {
            $errors[] = 'You must enter a status';
        }
        return $errors;
    }
    // remove access for a user
    public function removeaccess()
    {
        $this->usersTable->changestatus('status', 'Dormant', $_POST['id']);
        header('location: /user/list');
    }
}
