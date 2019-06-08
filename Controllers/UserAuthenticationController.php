<?php
/**
 * Created by PhpStorm.
 * User: Dia
 * Date: 3/10/2019
 * Time: 7:56 AM
 */

namespace Controllers;

use Models\UserModel;

class UserAuthenticationController extends BasicController
{
    public function __construct()
    {
        parent::__construct();
        $this->title = "Autentificare";
    }

    public function registerPageAction ()
    {
        $messages = render_messages(get_messages());
        $this->content = $this->render('/views/forms/register.php', array('messages' => $messages));
        $this->renderLayout('/views/layouts/basic.php');
    }

    public function registerPost()
    {
        if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirm-password']) && isset($_POST['address']) && isset($_POST['phone'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $passwordConfirmation = $_POST['confirm-password'];
            $address = $_POST['address'];
            $phone = $_POST['phone'];
            $user = new UserModel();
            if ($user->isRegistrationValid($email, $password, $passwordConfirmation, $address, $phone)) {
                $user->createUser($email, $password, $address, $phone);
                set_message('Utilizator creat cu succes!', 'status');
                redirect('/login');
            }
        }
        $this->registerPageAction();
    }

    public function loginPageAction()
    {
        $messages = render_messages(get_messages());
        $this->content = $this->render('views/forms/login.php', array('messages' => $messages));
        $this->renderLayout('/views/layouts/basic.php');
    }

    public function loginAdmin()
    {
        $messages = render_messages(get_messages());
        $this->content = $this->render('views/forms/admin_login.php', array('messages' => $messages));
        $this->renderLayout('/views/layouts/basic.php');
    }

    public function loginPostAdmin()
    {
        if (isset($_POST['usera']) && isset($_POST['password'])) {
            $email = $_POST['usera'];
            $password = $_POST['password'];
            if ($email=='admin' && $password=='admin'){
                redirect('/adminPage');
            }
        }
        $this->loginAdmin();
    }

    public function loginPost()
    {
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $userModel = new UserModel();
            if ($userModel->areValidCredentials($email, $password)) {
                $user = $userModel->loadByEmail($email);
                $user->updateSession();
                set_message('Logat cu succes!', 'status');
                redirect('/');
            }
        }
        $this->loginPageAction();
    }

    public function logoutPageAction()
    {
        $userModel = new UserModel();
        $userModel->logout();
        redirect('/');
    }

}
