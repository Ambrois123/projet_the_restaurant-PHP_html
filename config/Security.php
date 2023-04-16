<?php 

class Security
{
    public static function securiteHTML($string)
    {
        return htmlentities($string);
    }
    public static function verifAccess()
    {
        return (!empty($_SESSION['admin']) && $_SESSION['admin'] === "admin");
    }
}