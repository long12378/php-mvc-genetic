<?php

namespace App\Models;

use PDO;

/**
 * Example user model
 *
 * PHP version 7.0
 */
class Cartmodel extends \Core\Model
{
    /**
     * Get all the users as an associative array
     *
     * @return array
     */

    public static function Deletecart($id)
    {
        $db = static::getDB();
        $stmt = $db->query('delete * from cart where id_user = '.$id.'');
    }
    public static function Deletecartdetail($id){
        $db = static::getDB();
        $stmt = $db->query('delete * from cart_detail where id_user = '.$id.'');
    }
    public static function Inserttocart($id_user){
        $db = static::getDB();
        $stmt = $db->query('insert into cart (id_user, createAt, status) VALUES ('.$id_user.', CURRENT_DATE, 0)');
    }
    public static function Inserttocartdetail($id_user, $id_prode, $price, $discount, $quantity){
        $db = static::getDB();
        $stmt = $db->query('insert into cart_detail (id_user, id_prodetail, price, discount, quantity, createAt) VALUES
        ('.$id_user.', '.$id_prode.', '.$price.', '.$discount.', '.$quantity.', CURRENT_DATE)');
    }
    public static function Getcartuser($id_user){
        $db = static::getDB();
        $stmt = $db->query('select * from cart where id_cart = '.$id_user.'');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function Getallcartdetail($id_user){
        $db = static::getDB();
        $stmt = $db->query('select * from cart_detail where id_cart = '.$id_user.'');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
