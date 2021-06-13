<?php

namespace App\Models;

use PDO;

/**
 * Example user model
 *
 * PHP version 7.0
 */
class User extends \Core\Model
{

    /**
     * Get all the users as an associative array
     *
     * @return array
     */
    public static function login($username, $password)
    {
        $db = static::getDB();
        $stmt = $db->query('SELECT * FROM user where user.username = "'.$username.'" and password = md5("'.$password.'")');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
