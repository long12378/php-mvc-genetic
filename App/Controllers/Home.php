<?php

namespace App\Controllers;

use \Core\View;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
/**
 * Home controller
 *
 * PHP version 7.0
 */
class Home extends \Core\Controller
{

    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
        $productall = Product::getAllproduct();
        $cats = Category::getAllcategory();
        $subcatsmenumen = Category::getAllsubcategory(1);
        $subcatsmenuwoman = Category::getAllsubcategory(2);
        $subcatsmenukids = Category::getAllsubcategory(3);
        View::render('client/index.php', ['page' =>'bodyhome','variable' => $cats, 'allpro' => $productall, 'allsubcatmenumen' => $subcatsmenumen, 'allsubcatmenuwoman' => $subcatsmenuwoman, 'allsubcatmenukids' => $subcatsmenukids]);
    }
    public function loginAction(){
        View::render('login/login.php', []);
    }
    public function logingAction()
    {
    }

//    public function getAllAction() {
//        View::renderTemplate('client/home/index.php');
//    }
}
