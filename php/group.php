<?php

session_start();

if (isset($_POST['groupname'])) {
    require_once 'database.php';

    $database = new Database();

    $groupname = $_POST['groupname'];
    $username = $_SESSION['username'];

    $response = [];

    if (strlen($groupname) == 0) {
        $response = [
            'error' => true,
            'msg' => 'Blank fields.'
        ];
    } else {
        $query = 'SELECT * FROM groups WHERE name = ?';
        $result = $database->executeQuery($query, array($groupname));

        if (empty($result)) {
            $query = 'INSERT INTO groups VALUES(?)';
            $result = $database->executeUpdate($query, array($groupname));

            $insFailed = false;
            if ($result) {
                $query = 'INSERT INTO memberships VALUES(?, ?, ?)';
                $result = $database->executeUpdate($query, array($username, $groupname, true));

                if ($result == false) {
                    $insFailed = true;
                }
            } else {
                $insFailed = true;
            }

            if ($insFailed) {
                $response = [
                    'error' => true,
                    'msg' => 'Failed to create, please contact Admin.'
                ];
            } else {
                $response = [
                    'error' => false,
                    'msg' => 'Group has been created.'
                ];
            }
        } else {
            $response = [
                'error' => true,
                'msg' => 'Group name already exists.'
            ];
        }
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
