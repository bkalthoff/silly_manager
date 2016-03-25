<?php

session_start();

if (isset($_POST['username']) &&
    isset($_POST['fname']) &&
    isset($_POST['sname']) &&
    isset($_POST['email']) &&
    isset($_POST['password']) &&
    isset($_POST['confirm-password'])) {
    require_once 'database.php';

    $username = $_POST['username'];
    $fname = $_POST['fname'];
    $sname = $_POST['sname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirm-password'];

    $database = new Database();
    $query = 'SELECT username, email FROM users WHERE username = ? OR email = ?';
    $result = $database->executeQuery($query, array($username, $email));

    if (strlen($username) == 0 ||
        strlen($fname) == 0 ||
        strlen($sname) == 0 ||
        strlen($email) == 0 ||
        strlen($password) == 0 ||
        strlen($cpassword) == 0) {
        $response = [
            'error' => true,
            'msg' => 'Blank fields.',
        ];
    } elseif ($password != $cpassword) {
        $response = [
            'error' => true,
            'msg' => 'Passwords must be identical.',
        ];
    } elseif (empty($result)) {
        $query = 'INSERT INTO users VALUES(?, ?, ?, ?, ?, ?)';
        $salt = base64_encode(mcrypt_create_iv(12));
        $pwhash = $database->passwordHash($password, $salt);
        $result = $database->executeUpdate($query, array(
            $username, $pwhash, $salt, $email, $fname, $sname,
        ));
        if ($result) {
            $response = [
                'error' => false,
                'msg' => 'Account has been created.',
            ];
        } else {
            $response = [
                'error' => true,
                'msg' => 'Unknown account creation error.',
            ];
        }
    } elseif ($result[0]['username'] == $username) {
        $response = [
            'error' => true,
            'msg' => 'Username already taken.',
        ];
    } elseif ($result[0]['email'] == $email) {
        $response = [
            'error' => true,
            'msg' => 'E-mail already taken.',
        ];
    }

    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    $response = [
        'error' => true,
        'msg' => 'Fatal error, missing parameters.',
    ];

    header('Content-Type: application/json');
    echo json_encode($response);
}
