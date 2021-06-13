<?php

namespace App\Models;

use PDO;

/**
 * Example user model
 *
 * PHP version 7.0
 */
class productdetail extends \Core\Model
{

    /**
     * Get all the users as an associative array
     *
     * @return array
     */
    public static function getproductdetail($id)
    {
        $db = static::getDB();
        $stmt = $db->query('SELECT * FROM product, product_detail, category, sub_category WHERE product_detail.id_prode = '.$id.' and product.id_pro = product_detail.id_pro and product.id_cat = category.id_cat and product.id_subcat = sub_category.id_subcat');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function getalldetailproduct($id)
    {
        $db = static::getDB();
        $stmt = $db->query('select * from product_detail where id_pro = (select id_pro from product_detail where product_detail.id_prode = '.$id.') group by color order by id_pro');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function getallsizeproductbycolor($id)
    {
        $db = static::getDB();
        $stmt = $db->query('select size from product_detail where id_pro = (select id_pro from product_detail where id_prode = '.$id.') and color = (select color from product_detail where id_prode = '.$id.')');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function getproductbyinfo($idpro, $color, $size){
        $db = static::getDB();
        $stmt = $db->query('select * from product_detail, product, category, sub_category where product_detail.id_pro = '.$idpro.' and color="'.$color.'" and size= '.$size.' and product_detail.id_pro = product.id_pro and category.id_cat = product.id_cat and sub_category.id_subcat = product.id_subcat');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
