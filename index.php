<?php
require_once('vendor/autoload.php');

use App\PingPong\Player;
use App\PingPong\Game;
use App\PingPong\Set;
use App\PingPong\AutoPlay;
use App\PingPong\Referee;


$player1 = new Player('');
$player2 = new Player('');
$autoPlay = new AutoPlay();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/app/stylesheet/styles.css">
    <title>PingPong</title>
</head>

<body>
    <?php require('view/Header.php');
    if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['auto_play'])) {
        $player1->name = $_POST['player_1'];
        $player2->name = $_POST['player_2'];
        if (empty($_POST['player_1']) || empty($_POST['player_2'])) {
            echo 'ERROR NAMES NOT ENTERED';
        } else {
            $autoPlay->startGame($player1, $player2);
        }
    }
    require('view/Home.php');
    ?>
</body>

</html>