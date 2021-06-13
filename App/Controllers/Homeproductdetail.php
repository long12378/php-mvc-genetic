<?php

namespace App\Controllers;

use \Core\View;
use App\Models\Category;
use App\Models\Product;
use App\Models\productdetail;
/**
 * Home controller
 *
 * PHP version 7.0
 */
class Homeproductdetail extends \Core\Controller
{

    /**
     * Show the index page
     *
     * @return void
     */
    public function getproductAction()
    {
        $id_pro = $this->route_params['id'];
        $prodetail = productdetail::getproductdetail($id_pro);
        $proalldetail = productdetail::getalldetailproduct($id_pro);
        $proallsize =  productdetail::getallsizeproductbycolor($id_pro);
        View::render('client/index.php', ['page' => 'productdetail','productdetail' => $prodetail, 'productalldetail' => $proalldetail, 'proallsizebycolor' => $proallsize]);
    }
}
