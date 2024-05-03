<?php
include_once 'models/akun.php';

class ContactController
{
    static function index(){
        if (!isset($_SESSION['user'])) {
            header('Location: '.BASEURL.'login?auth=false');
            exit;
        }
        else {
            view('index', ['contacts' => Contact::getContacts($_SESSION['user']['id'])]);
        }
    }
    static function add(){
        if (!isset($_SESSION['user'])) {
            header('Location: '.BASEURL.'login?auth=false');
            exit;
        }
        else {
            view('create');
        }
    }
    static function edit(){
        if (!isset($_SESSION['user'])) {
            header('Location: '.BASEURL.'login?auth=false');
            exit;
        }
        else {
            view('edit');
        }
    }
    static function create()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . 'login?auth=false');
            exit;
        } else {
            $post = array_map('htmlspecialchars', $_POST);
            $contact = Contact::create([
                'phone_number' => $post['phone_number'],
                'owner' => $post['owner'],
                'users_id' => $_SESSION['user']['id']
            ]);

            if ($contact) {
                header('Location: ' . BASEURL . 'home');
            } else {
                echo ('Terjadi kesalahan');
            }
        }
    }

    static function update()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . 'login?auth=false');
            exit;
        } else {
            $post = array_map('htmlspecialchars', $_POST);
            $contact = Contact::update([
                'id' => $post['id'],
                'phone_number' => $post['phone_number_'],
                'owner' => $post['owner'],
                'users_id' => $_SESSION['user']['id'],
            ]);
            if ($contact) {
                header('Location: ' . BASEURL . 'home');
            } else {
                echo ('Terjadi kesalahan');
            }
        }
    }

    static function deleteContact()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . 'login?auth=false');
            exit;
        } else {
            $post = array_map('htmlspecialchars', $_POST);
            $contact = Contact::delete($_POST['id']);
            if ($contact) {
                header('Location: ' . BASEURL . 'home');
            } else {
                echo ('Terjadi kesalahan');
            }
        }
    }
}