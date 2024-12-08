<?php
class Auth extends Controller
{
    public function login_form()
    {
        $message = isset($_GET['message']) ? $_GET['message'] : null;
        $this->loadView('login', ['message' => $message]);
    }

    public function login_process()
    {
        session_start();

        $authModel = $this->loadModel('AuthModel');
        $username = $_POST['username'];
        $password = $_POST['password'];

        $user = $authModel->getUserByUsername($username);
        if ($user && password_verify($password, $user->password)) {
            $_SESSION['username'] = $user->username;
            header('Location: ?c=Post');
        } else {
            echo "Username atau password salah.";
        }
    }

    public function register_form()
    {
        $this->loadView('register');
    }

    public function register_process()
    {
        $authModel = $this->loadModel('AuthModel');
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        if ($authModel->registerUser($username, $password)) {
            header('Location: ?c=Auth&m=login_form&message=Registrasi berhasil, silahkan Login.');
        } else {
            echo "Username sudah terdaftar.";
        }
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header('Location: ?c=Auth&m=login_form');
    }
}