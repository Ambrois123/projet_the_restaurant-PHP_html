<?php 

abstract class Connexion
{
    private static $pdo;

    private static function setBdd()
    {
        self::$pdo = new PDO('mysql:host=localhost;dbname=the_restaurant;charset=utf8', 'restaurant', 'Dev_project_restaurant');
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    protected function getBdd()
    {
        if(self::$pdo == null)
        {
            self::setBdd();
        }
        
        return self::$pdo;
    }
}
?>