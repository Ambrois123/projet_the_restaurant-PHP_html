<?php 

try{
    $pdo = new PDO("mysql:host=localhost","restaurant_project", "Dev_project_restaurant");
    $pdo->setAttribute(PDO::ERRMODE_EXCEPTION, PDO::ATTR_ERRMODE);

if ($pdo->exec('CREATE DATABASE the_restaurant') !==false) {

    $serveurRest = new PDO("mysql:host=localhost;dbname=the_restaurant","restaurant_project","Dev_project_restaurant");

    if ($serveurRest->exec('CREATE TABLE reservation(
        reservation_id INT(11) PRIMARY KEY not null auto_increment,
        reservation_time DATETIME not null,
        numberGuests INT(11) not null,
        allergies_list VARCHAR(200) not null,
        statut VARCHAR(20) null
    )') !==false) {

        if ($serveurRest->exec('CREATE TABLE users(
                user_id INT(11)PRIMARY KEY not null AUTO_INCREMENT,
		        user_name VARCHAR(250) not null,
                user_email VARCHAR(100) not null,
                role ENUM("visiteur", "client", "admin") default "visiteur" not null,
                user_phone VARCHAR(20) not null,
                user_password VARCHAR(100) not null,
                reservationId INT(11) null,
                FOREIGN KEY (reservationId) REFERENCES reservation (reservation_id)
            )') !==false) {

            if ($serveurRest->exec('CREATE TABLE opening_hours(
                    openingHours_id int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
                    day_of_week varchar(12) NOT NULL,
                    opening_time time NOT NULL,
                    closing_time time NOT NULL,
                    maxCapacity INT(11) not null
                )') !==false) {

                if ($serveurRest->exec('CREATE TABLE resa_openingHours (
                        reservationId INT(11) not null,
                        openingHoursId INT(11) not null,
                        FOREIGN KEY (reservationId) REFERENCES reservation(reservation_id),
                        FOREIGN KEY (openingHoursId) REFERENCES opening_hours(openingHours_id)
                      )') !==false) {

                    if ($serveurRest->exec('CREATE TABLE carte (
                            carte_id int(11) PRIMARY KEY NOT NULL,
                            carte_title varchar(100) not null,
                            carte_description varchar(100) not null,
                            carte_price float not null
                          )') !==false) {

                        if ($serveurRest->exec('CREATE TABLE meals(
                        meals_id INT(11) PRIMARY KEY not null AUTO_INCREMENT,
                        meals_title VARCHAR(50) not null,
                        meals_description VARCHAR(60) not null,
                        meals_price FLOAT not null,
                        meals_image VARCHAR(100) not null,
                        carteId INT  null,
                        FOREIGN KEY (carteId) REFERENCES carte (carte_id)
                    )') !==false) {

                            if ($serveurRest->exec('CREATE TABLE platReservation(
                            reservationId INT(11) not null,
                            mealsId int(11) not null,
                            FOREIGN KEY (reservationId) REFERENCES reservation (reservation_id),
                            FOREIGN KEY (mealsId) REFERENCES meals (meals_id)
                        )') !==false) {

                                if ($serveurRest->exec('CREATE TABLE menu(
                                menu_id INT(11) PRIMARY KEY not null AUTO_INCREMENT,
                                menu_name VARCHAR(25) not null,
                                choix_entree VARCHAR(25) not null,
                                choix_plat1 VARCHAR(25) not null,
                                choix_plat2 VARCHAR(25) not null,
                                menu_price FLOAT not null
                            )') !==false) {

                                    if ($serveurRest->exec('CREATE TABLE menuMeals (
                                    menuId INT(11) not null,
                                    mealsId INT(11) null,
                                    FOREIGN KEY (menuId) REFERENCES menu (menu_id),
                                    FOREIGN KEY (mealsId) REFERENCES meals (meals_id)
                                )')!==false) {

                                        if ($serveurRest->exec('CREATE TABLE carte_entree (
                                        entree_id INT(11) PRIMARY KEY not null AUTO_INCREMENT,
                                        entree_name VARCHAR(25) not null,
                                        entree_description VARCHAR(100) not null,
                                        entree_price FLOAT not null,
                                        carteId INT(11) null,
                                        FOREIGN KEY (carteId) REFERENCES carte (carte_id)
                                    )')!==false) {

                                            if ($serveurRest->exec('CREATE TABLE carte_plat (
                                            plat_id INT(11) PRIMARY KEY not null AUTO_INCREMENT,
                                            plat_name VARCHAR(25) not null,
                                            plat_description VARCHAR(100) not null,
                                            plat_price FLOAT not null,
                                            carteId INT(11) null,
                                            FOREIGN KEY (carteId) REFERENCES carte (carte_id)
                                        )')!==false) {

                                                if ($serveurRest->exec('CREATE TABLE carte_dessert (
                                                dessert_id INT(11) PRIMARY KEY not null AUTO_INCREMENT,
                                                dessert_name VARCHAR(25) not null,
                                                dessert_description VARCHAR(100) not null,
                                                dessert_price FLOAT not null,
                                                carteId INT(11) null,
                                                FOREIGN KEY (carteId) REFERENCES carte (carte_id)
                                            )')!==false) {

                                                    if ($serveurRest->exec('CREATE TABLE carte_boisson (
                                                    boisson_id INT(11) PRIMARY KEY not null AUTO_INCREMENT,
                                                    boisson_name VARCHAR(25) not null,
                                                    boisson_description VARCHAR(100) not null,
                                                    boisson_price FLOAT not null,
                                                    carteId INT(11) null,
                                                    FOREIGN KEY (carteId) REFERENCES carte (carte_id)
                                                )')!==false) {
                                                        echo "Installation BDD réussie";
                                                    } else {
                                                        echo "Impossible de créer la table mealsCategory<br>";
                                                    }
                                                } else {
                                                    echo "Impossible de créer la table formula<br>";
                                                }
                                            } else {
                                                echo "Impossible de créer la table menu<br>";
                                            }
                                        } else {
                                            echo "Impossible de créer la table mealsPhot<br>";
                                        }
                                    } else {
                                        echo "Impossible de créer la table meals<br>";
                                    }
                                } else {
                                    echo "Impossible de créer la table restaurant<br>";
                                }
                            } else {
                                echo "Impossible de créer la table reservation<br>";
                            }
                        } else {
                            echo "Impossible de créer la table user<br>";
                        }
                    } else {
                        echo "Impossible de créer la table admin<br>";
                    }
                }
            }
        }
    }
}
        
}catch(PDOException $error){
    die($error->getMessage());
}

?>

<?php 
// insert into 

// INSERT INTO opening_hours (day_of_week, opening_time, closing_time, maxCapacity)
//     VALUES ('Monday', '08:00:00', '22:00:00', 20),
//        ('Tuesday', '08:00:00', '22:00:00', 20),
//        ('Wednesday', '08:00:00', '22:00:00', 20),
//        ('Thursday', '08:00:00', '22:00:00', 20),
//        ('Friday', '08:00:00', '23:00:00', 20),
//        ('Saturday', '10:00:00', '23:00:00', 20),
//        ('Sunday', '10:00:00', '21:00:00', 20);


    ?>