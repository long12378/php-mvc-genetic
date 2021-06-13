<?php


namespace App\Controllers;

if (!isset($_SESSION)) {
    ob_start();
    session_start();
}


use \Core\View;
use \App\Models\User;
use \App\Models\productdetail;
use \App\Models\Cartmodel;

/**
 * Home controller
 *
 * PHP version 7.0
 */
class Cart extends \Core\Controller
{

    /**
     * Show the index page
     *
     * @return void
     */
    // public function Kttontai($id){
    //     for($i = 0 ; count($_SESSION['id_prode']); $i++){
    //         if($_SESSION['id_prode'][$i] == $id){
    //             return $i;
    //         }
    //     }
    //     return -1;
    // }
    public function addtocartAction()
    {
        if (isset($_POST['addtocart'])) {
            $getprotocart = productdetail::getproductbyinfo($_POST['idprotocart'], $_POST['colortocart'], $_POST['sizetocart']);
            $idprotocart = $getprotocart[0]['id_prode'];
            if (isset($_SESSION['id_prode'])) {
                $d = -1;
                for ($i = 0; $i < count($_SESSION['id_prode']); $i++) {
                    if ($_SESSION['id_prode'][$i] == $idprotocart) {
                        $d = $i;
                    }
                }
                if ($d == -1) {
                    $index = count($_SESSION['id_prode']);
                    $_SESSION['id_prode'][$index] = $idprotocart;
                    $_SESSION['productname'][$index] = $getprotocart[0]['productname'];
                    $_SESSION['title_cat'][$index] = $getprotocart[0]['title_cat'];
                    $_SESSION['title_subcat'][$index] = $getprotocart[0]['title_subcat'];
                    $_SESSION['color'][$index] = $getprotocart[0]['color'];
                    $_SESSION['image'][$index] = $getprotocart[0]['image'];
                    $_SESSION['size'][$index] = $getprotocart[0]['size'];
                    $_SESSION['price'][$index] = $getprotocart[0]['price'];
                    $_SESSION['discount'][$index] = $getprotocart[0]['discount'];
                    $_SESSION['quantity'][$index] = (int)$_POST['quantitytocart'];
                } else {
                    if (!isset($_POST['quantitytocart']))
                        $_SESSION['quantity'][$d] += 1;
                    else
                        $_SESSION['quantity'][$d] += (int)$_POST['quantitytocart'];
                }
            } else {
                $_SESSION['id_prode'][0] = $idprotocart;
                $_SESSION['productname'][0] = $getprotocart[0]['productname'];
                $_SESSION['title_cat'][0] = $getprotocart[0]['title_cat'];
                $_SESSION['title_subcat'][0] = $getprotocart[0]['title_subcat'];
                $_SESSION['color'][0] = $getprotocart[0]['color'];
                $_SESSION['image'][0] = $getprotocart[0]['image'];
                $_SESSION['size'][0] = $getprotocart[0]['size'];
                $_SESSION['price'][0] = $getprotocart[0]['price'];
                $_SESSION['discount'][0] = $getprotocart[0]['discount'];
                $_SESSION['quantity'][0] = (int)$_POST['quantitytocart'];
            }
        }
        View::render('client/index.php', ['page' => 'cart']);
    }
    public function deleteCartAction()
    {


        if (isset($_SESSION['id_user'])) {
            Cartmodel::Deletecart($_SESSION['id_user']);
            Cartmodel::Deletecartdetail($_SESSION['id_user']);
        } else {
            $id = $this->route_params['id'];
            unset($_SESSION['id_prode'][$id]);
            unset($_SESSION['productname'][$id]);
            unset($_SESSION['title_cat'][$id]);
            unset($_SESSION['title_subcat'][$id]);
            unset($_SESSION['color'][$id]);
            unset($_SESSION['image'][$id]);
            unset($_SESSION['size'][$id]);
            unset($_SESSION['price'][$id]);
            unset($_SESSION['discount'][$id]);
            unset($_SESSION['quantity'][$id]);
        }
        //$cart = Car::Select($_SESSION['id_user']);
        //View::render('index.php', ['page'=>'cart','cartt'=>$cart]);
        echo "<script>
        history.back();
        </script>";
    }
    public function getallcart()
    {
        $allcartitem = Cartmodel::Getallcartdetail($_SESSION['id_user']);
        View::render('client/index.php', ['page' => 'cart','allcartitem' => $allcartitem]);
    }
    public function showcart(){
        View::render('client/index.php', ['page' => 'cart']);
    }
}
