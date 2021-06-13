<?php

namespace App\Models;

use PDO;

/**
 * Example user model
 *
 * PHP version 7.0
 */
class Product_Categody extends \Core\Model
{

    /**
     * Get all the users as an associative array
     *
     * @return array
     */
    public static function getAllpro_cat()
    {
        $db = static::getDB();
        $stmt = $db->query('SELECT * FROM product_category');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
