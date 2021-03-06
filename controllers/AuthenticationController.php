<?php
/**
 * Created by PhpStorm.
 * User: jeremy
 * Date: 12/06/2018
 * Time: 15:28
 */

namespace CMS\Controllers;

use Symfony\Component\Yaml\Yaml;
use PDO;

class AuthenticationController {
    public function setupAuthentication() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $yaml = Yaml::dump($_POST);
            file_put_contents('./config/credentials.yml', $yaml);

            $credential = Yaml::parseFile('config/credentials.yml');
            $dbh = new PDO("mysql:host={$credential['dbhost']};port={$credential['port']};dbname={$credential['dbname']}", $credential["dbuser"], $credential["dbpass"]);

            try {
                 $dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );//Error Handling
                 $dbh->exec("
                   CREATE TABLE IF NOT EXISTS `articles` (
                     `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                     `title` varchar(250) DEFAULT NULL,
                     `subtitle` varchar(250) DEFAULT NULL,
                     `content` longtext,
                     `date` date DEFAULT NULL,
                     `category` varchar(100) DEFAULT NULL,
                     PRIMARY KEY (`id`)
                   ) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

                   INSERT INTO `articles` (`id`, `title`, `subtitle`, `content`, `date`, `category`) VALUES (NULL, 'Mon premier article', NULL, 'Ceci est votre premier article !', NOW(), NULL);

                 ");
                 print("Created Table.\n");

            } catch(PDOException $e) {
                echo $e->getMessage();//Remove or change message in production code
            }

            header('Location: /');
        } else {
            require_once('views/init_config.html.php');
        }
    }

    public function login() {
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $credential = Yaml::parseFile('config/credentials.yml');

        if ($credential['mdp'] === $_POST['pwd']) {
          session_start();
          $_SESSION['admin'] = true;
          header('Location: /');
        } else {
          header('Location: /login');
        }
      } else {
        require_once('views/login.html.php');
      }
    }

    public function logout() {
      session_start();
      $_SESSION['admin'] = false;
      header('Location: /');
    }
}
