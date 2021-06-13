<?php

namespace App\Controllers;

if (!isset($_SESSION)) {
    ob_start();
    session_start();
}

use App\Models\Cartmodel;
use \Core\View;
use \App\Models\User;

/**
 * Home controller
 *
 * PHP version 7.0
 */
class Login extends \Core\Controller
{

    /**
     * Show the index page
     *
     * @return void
     */
    public function logingAction()
    {
        if (isset($_POST['login'])) {
            if (isset($_POST['username']) && isset($_POST['password'])) {
                $username = trim($_POST['username']);
                $password = trim($_POST['password']);
                $userlogin = User::login($username, $password);
                if ($userlogin != null) {
                    $_SESSION['id_user'] = $userlogin[0]['id_user'];
                    $_SESSION['username'] = $userlogin[0]['username'];
                    $cartexist = Cartmodel::Getcartuser($_SESSION['id_user']);
                    if (isset($_SESSION['id_prode'])) {
                        Cartmodel::Inserttocart($_SESSION['id_user']);
                        for ($i = 0; $i < count($_SESSION['id_prode']); ++$i) {
                            Cartmodel::Inserttocartdetail($_SESSION['id_user'], $_SESSION['id_prode'][$i], $_SESSION['price'][$i], $_SESSION['discount'][$i], $_SESSION['quantity'][$i]);
                        }
                        unset($_SESSION['id_prode']);
                    }
                } else {
                    echo
                    "<script type='text/javascript'>alert('Tài Khoản Mật Khẩu Không Đúng');
                    history.back();
                    history.back();
                    </script>";
                }
            }
        }
        echo '<script>
        history.back();
        history.back();
    </script>';
    }
    public function logoutAction()
    {
        unset($_SESSION['id_user']);
        unset($_SESSION['username']);
        // View::render('index.php', ['page'=>'home','product' => $product,'prode'=>$prode]);
        echo '<script>
        history.back();
    </script>';
    }
}
