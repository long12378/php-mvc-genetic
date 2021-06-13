<?php

namespace App\Models;

use PDO;

/**
 * Example user model
 *
 * PHP version 7.0
 */
class Category extends \Core\Model
{

    /**
     * Get all the users as an associative array
     *
     * @return array
     */
    public static function getAllcategory()
    {
        $db = static::getDB();
        $stmt = $db->query('SELECT * FROM category');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function getAllsubcategory($id_cat){
        $db = static::getDB();
        $stmt = $db->query('SELECT * FROM sub_category WHERE id_cat = '.$id_cat.'');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
