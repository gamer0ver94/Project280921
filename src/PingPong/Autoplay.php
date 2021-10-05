<?php

namespace App\PingPong;

class AutoPlay
{


    public function startGame($player1, $player2)
    {
        $newGame = new Game();
        $newGame->createSet($newGame);
        $this->play($newGame, $player1, $player2);
    }
    public function play($newGame, $player1, $player2)
    {
        $autoScore = rand(0, 1);
        if ($autoScore === 0) {
            $newGame->set->score[0]++;
            $newGame->set->rounds[0]++;
?>
            <table>
                <tr>
                    <th><?php echo 'Set' . $newGame->set->setNumber[0]; ?></th>
                    <th><?php echo 'Round' . $newGame->set->rounds[0]; ?></th>
                </tr>

                <tr>
                    <td><?php echo $player1->name; ?></td>
                    <td><?php echo $newGame->set->score[0]; ?></td>
                    <td><?php echo $newGame->set->score[1]; ?></td>
                    <td><?php echo $player2->name; ?></td>
                </tr>
            </table>
        <?php
            $newGame->set->setVerify($newGame, $this, $player1, $player2);
        } else {
            $newGame->set->score[1]++;
            $newGame->set->rounds[0]++;
        ?>
            <table>
                <thead>
                    <tr><?php echo 'Set' . $newGame->set->setNumber[0]; ?></tr>
                    <tr><?php echo 'Round' . $newGame->set->rounds[0]; ?></tr>
                </thead>
                <tbody>
                    <td><?php echo $player1->name; ?></td>
                    <td><?php echo $newGame->set->score[0]; ?></td>
                    <td><?php echo $newGame->set->score[1]; ?></td>
                    <td><?php echo $player2->name; ?></td>
                </tbody>
            </table>
<?php
            $newGame->set->setVerify($newGame, $this, $player1, $player2);
        }
    }
}
