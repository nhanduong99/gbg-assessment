<?php

namespace App\Controllers;

use App\Models\UserModel;

class HomeController extends Controller
{
    function index() {
        $this->render("home/index", [

        ]);
    }

    function createUser() {
        $postData = $_POST;

        if (!empty($_POST['token'])) {
            if (hash_equals($_SESSION['token'], $_POST['token'])) {
                $userModel = new UserModel();
                $is_existed_username = $userModel->get_user_detail_by_username($postData['username']);
                if ($is_existed_username) {
                    $values = $postData;
                    $errors['username'] = 'User name is existed';
                    $this->render("home/index", [
                        'values' => $values,
                        'errors' => $errors
                    ]);
                    exit();
                }
                $userModel->create_user($postData);

                $this->redirect("/user");
            } else {
                $values = $postData;
                $errors['error'] = 'Somethings went wrong';
                $this->render("home/index", [
                    'values' => $values,
                    'errors' => $errors
                ]);
                exit();
            }
        }
    }

    function user() {
        $userModel = new UserModel();
        $users = $userModel->get_all_user();
        $this->render("home/user", [
            'users' => $users
        ]);
    }

    function deleteUser() {
        $username = $_POST['username'] ?? "";
        if ($username) {
            $userModel = new UserModel();
            $userModel->delete_user($username);
            echo json_encode(['error' => false, 'message' => 'Delete Successfully']);
        } else {
            echo json_encode(['error' => true, 'message' => 'Invalid Parameter']);
        }
        exit();
    }

    function userDetail() {
        $userModel = new UserModel();

        $username = $_POST['username'] ?? "";

        if ($username) {
            $userData = $userModel->get_user_detail_by_username($username);
            echo json_encode(['error' => false, 'data' => $userData]);
        } else {
            echo json_encode(['error' => true, 'message' => 'Invalid Parameter']);
        }
        exit();
    }
}