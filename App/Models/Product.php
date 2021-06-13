<?php

namespace App\Models;

use PDO;

/**
 * Example user model
 *
 * PHP version 7.0
 */
class Product extends \Core\Model
{

    /**
     * Get all the users as an associative array
     *
     * @return array
     */
    public static function getAllproduct()
    {
        $db = static::getDB();
        $stmt = $db->query('select * from product, product_detail, category, sub_category where product.id_pro = product_detail.id_pro AND product.id_cat = category.id_cat AND product.id_subcat = sub_category.id_subcat GROUP BY product.id_pro ORDER BY product.id_pro');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function getnewproduct(){
        $db = static::getDB();
        $stmt = $db->query('SELECT * FROM product WHERE DATEDIFF(CURRENT_DATE, createdAt) < 3');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    // public static function getcateofproduct(){
    //     $db = static::getDB();
    //     $stmt = $db->query('SELECT * FROM product WHERE DATEDIFF(CURRENT_DATE, createdAt) < 3');
    //     return $stmt->fetchAll(PDO::FETCH_ASSOC);
    // }
}
