<?php
require '../Job/Controllers/User.php';
require '../CSY2028/DatabaseTable.php';
class RegisterUserTest extends \PHPUnit\Framework\TestCase {
    private $controller;
    private $pdo;
    private $userTable;
    public function setUp() {
}
    public function testInvalidUsername() {
        $invalidUsername = [
            'firstname' => 'James',
            'lastname' => 'Filly',
            'username' => '',
            'password' => 'admin',
            'email' => 'bigboss@test.com',
            'usertype' => 'Admin',
            'status' => 'Active'
]; $this->pdo = new \PDO('mysql:host=v.je;dbname=job', 'student', 'student');
        $this->usersTable = new \CSY2028\DatabaseTable($this->pdo, 'user', 'id');
         $this->controller = new \job\Controllers\User($this->usersTable,[], $invalidUsername);
        $errors = $this->controller->validateRegistration($invalidUsername);
        $this->assertEquals(count($errors), 1);
    }
    public function testInvalidFirstname() {
        $invalidFirstname = [
            'firstname' => '',
            'lastname' => 'Filly',
            'username' => 'bigboss',
            'password' => 'admin',
            'email' => 'bigboss@test.com',
            'usertype' => 'Admin',
            'status' => 'Active'
]; $this->pdo = new \PDO('mysql:host=v.je;dbname=job', 'student', 'student');
        $this->usersTable = new \CSY2028\DatabaseTable($this->pdo, 'user', 'id');
        $this->controller = new \job\Controllers\User($this->usersTable,[], $invalidFirstname);
        $errors = $this->controller->validateRegistration($invalidFirstname);
        $this->assertEquals(count($errors), 1);
    }
    public function testInvalidLastname() {
        $invalidLastname = [
            'firstname' => 'James',
            'lastname' => '',
            'username' => 'bigboss',

             'password' => 'admin',
            'email' => 'bigboss@test.com',
            'usertype' => 'Admin',
            'status' => 'Active'
]; $this->pdo = new \PDO('mysql:host=v.je;dbname=job', 'student', 'student');
        $this->usersTable = new \CSY2028\DatabaseTable($this->pdo, 'user', 'id');
        $this->controller = new \job\Controllers\User($this->usersTable,[], $invalidLastname);
        $errors = $this->controller->validateRegistration($invalidLastname);
        $this->assertEquals(count($errors), 1);
    }
    public function testNoName() {
        $invalidName = [
            'firstname' => '',
            'lastname' => '',
            'username' => 'bigboss',
            'password' => 'admin',
            'email' => 'bigboss@test.com',
            'usertype' => 'Admin',
            'status' => 'Active'
]; $this->pdo = new \PDO('mysql:host=v.je;dbname=job', 'student', 'student');
        $this->usersTable = new \CSY2028\DatabaseTable($this->pdo, 'user', 'id');
        $this->controller = new \job\Controllers\User($this->usersTable,[], $invalidName);

 $errors = $this->controller->validateRegistration($invalidName);
        $this->assertEquals(count($errors), 2);
    }
    public function testInvalidPassword() {
        $invalidPassword = [
            'firstname' => 'James',
            'lastname' => 'Filly',
            'username' => 'bigboss',
            'password' => '',
            'email' => 'bigboss@test.com',
            'usertype' => 'Admin',
            'status' => 'Active'
]; $this->pdo = new \PDO('mysql:host=v.je;dbname=cars', 'student', 'student');
        $this->usersTable = new \CSY2028\DatabaseTable($this->pdo, 'user', 'id');
        $this->controller = new \job\Controllers\User($this->usersTable,[], $invalidPassword);
        $errors = $this->controller->validateRegistration($invalidPassword);
        $this->assertEquals(count($errors), 1);
    }
    public function testInvalidEmail() {
        $invalidEmail = [
            'firstname' => 'James',
            'lastname' => 'Filly',
            'username' => 'bigboss',
            'password' => 'admin',
            'email' => '',
            'usertype' => 'Admin',
            'status' => 'Active'
        ];
        $this->pdo = new \PDO('mysql:host=v.je;dbname=cars', 'student', 'student');
        $this->usersTable = new \CSY2028\DatabaseTable($this->pdo, 'user', 'id');
        $this->controller = new \car\Controllers\User($this->usersTable,[], $invalidEmail);
        $errors = $this->controller->validateRegistration($invalidEmail);
        $this->assertEquals(count($errors), 1);
    }
    public function testInvalidUserType() {
        $invalidUserType = [
            'firstname' => 'James',
            'lastname' => 'Filly',
            'username' => 'bigboss',
            'password' => 'admin',
            'email' => 'bigboss@test.com',
            'usertype' => '',
            'status' => 'Active'
        ];
        $this->pdo = new \PDO('mysql:host=v.je;dbname=car', 'student', 'student');
        $this->usersTable = new \CSY2028\DatabaseTable($this->pdo, 'user', 'id');
        $this->controller = new \car\Controllers\User($this->usersTable,[], $invalidUserType);
$errors = $this->controller->validateRegistration($invalidUserType);

         $this->assertEquals(count($errors), 1);
    }
    public function testInvalidStatus() {
        $invalidStatus = [
            'firstname' => 'Desiree',
            'lastname' => 'Defage',
            'username' => 'ddefage',
            'password' => 'admin',
            'email' => 'bigboss@test.com',
            'usertype' => 'Admin',
            'status' => ''
];
        $this->pdo = new \PDO('mysql:host=v.je;dbname=car', 'student', 'student');
        $this->usersTable = new \CSY2028\DatabaseTable($this->pdo, 'user', 'id');
        $this->controller = new \car\Controllers\User($this->usersTable,[], $invalidStatus);
        $errors = $this->controller->validateRegistration($invalidStatus);
        $this->assertEquals(count($errors), 1);
    }
    public function testSubmit() {
        $this->pdo = new \PDO('mysql:host=v.je;dbname=car', 'student', 'student');
        $this->usersTable = new \CSY2028\DatabaseTable($this->pdo, 'user', 'id');
        //delete the record
        $this->pdo->query('DELETE FROM user WHERE email = "bcliton@test.com"');

         //query the database for David's record
        $stmt = $this->pdo->query('SELECT * FROM user WHERE email = "bcliton@test.com"');
        //fetch the record
        $record = $stmt->fetch();
        //check there is no record for David
        $this->assertFalse($record);
        //set up test data
        $testPostData = [
            'user' => [
            'firstname' => 'Brian',
            'lastname' => 'Clark',
            'username' => 'bclark',
            'password' => '123456',
            'email' => 'bcliton@test.com',
            'usertype' => 'Client',
            'status' => 'Active'
] ];
        $this->controller = new \job\Controllers\User($this->usersTable,[], $testPostData);
        $this->controller->registerSubmit();
        //query the database again for David's record
        $stmt = $this->pdo->query('SELECT * FROM user WHERE email = "bcliton@test.com"');

 //fetch the record
        $record = $stmt->fetch();
        //check there is now  a record for David and the values match the onesexpected
        $this->assertEquals($record['firstname'], $testPostData['user']['firstname']);
        $this->assertEquals($record['lastname'], $testPostData['user']['lastname']);
        $this->assertEquals($record['username'], $testPostData['user']['username']);
        $this->assertEquals($record['email'], $testPostData['user']['email']);
        $this->assertEquals($record['password'], $testPostData['user']['password']);
        $this->assertEquals($record['usertype'], $testPostData['user']['usertype']);
        $this->assertEquals($record['status'], $testPostData['user']['status']);
    }
    public function testForm() {
        $this->pdo = new \PDO('mysql:host=v.je;dbname=car', 'student', 'student');
        $this->usersTable = new \CSY2028\DatabaseTable($this->pdo, 'user', 'id');
        //query the database for David's record
        $stmt = $this->pdo->query('SELECT * FROM user WHERE email = "bcliton@test.com"');
        //fetch the record
        $record = $stmt->fetch();
        //set up test data
        $testPostData = [
            'user' => [
            'firstname' => 'Billy',
            'lastname' => 'Clinton',
            'username' => 'bcliton',
            'password' => '12345',
            'email' => 'bcliton@test.com',
            'usertype' => 'Client',
            'status' => 'Active'
            ]
];
        $this->controller = new \job\Controllers\User($this->usersTable,[], $testPostData);
        $this->controller->registerForm();
        //query the database again for David's record
        $stmt = $this->pdo->query('SELECT * FROM user WHERE email = "bcliton@test.com"');
        //fetch the record
        $record = $stmt->fetch()
        //check there is now  a record for David and the values match the onesexpected
        $this->assertEquals($record['firstname'], $testPostData['user']['firstname']);
        $this->assertEquals($record['lastname'], $testPostData['user']['lastname']);
        $this->assertEquals($record['username'], $testPostData['user']['username']);
        $this->assertEquals($record['password'], $testPostData['user']['password']);
        $this->assertEquals($record['email'], $testPostData['user']['email']);
        $this->assertEquals($record['usertype'], $testPostData['user']['usertype']);
        $this->assertEquals($record['status'], $testPostData['user']['status']);
    }
}
?>