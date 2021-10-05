<?php

namespace App\PingPong;

class Set
{
    public $score = [0, 0];
    public $rounds = [0];
    public $setNumber = [1];


    public function setVerify($newGame, $autoPlay, $player1, $player2)
    {
        if ($newGame->set->score[0] < 11 && $newGame->set->score[1] < 11) {
            $autoPlay->play($newGame, $player1, $player2);
        } else {
            if ($newGame->set->score[0] - $newGame->set->score[1] > 1 || $newGame->set->score[1] - $newGame->set->score[0] > 1) {
                if ($newGame->set->score[0] - $newGame->set->score[1] > 1) {
                    array_push($newGame->sets, $player1->name);
                    $newGame->set->setNumber[0]++;
                    echo $player1->name . ' *****WON THE SET.*****<br>******<br> ';

                    if (array_count_values($newGame->sets)[$player1->name] < 3) {
                        $newGame->set->score[0] = 0;
                        $newGame->set->score[1] = 0;
                        $newGame->set->rounds[0] = 1;
                        $autoPlay->play($newGame, $player1, $player2);
                    } else {
                        echo ' *****GAME IS FINISHED***** ' . $player1->name . ' *****WON THE THE MATCH.*****<br>';
                        echo '******RESUME******<br>' . 'Number Of Sets ***' . $newGame->set->setNumber[0] - 1 . '<br>Set Winners ' . implode(', ', $newGame->sets);
                    }
                } else {
                    array_push($newGame->sets, $player2->name);
                    $newGame->set->setNumber[0]++;
                    echo $player2->name . ' *****WON THE SET.*****<br>******<br> ';

                    if (array_count_values($newGame->sets)[$player2->name] < 3) {
                        $newGame->set->score[0] = 0;
                        $newGame->set->score[1] = 0;
                        $newGame->set->rounds[0] = 0;
                        $autoPlay->play($newGame, $player1, $player2);
                    } else {
                        echo ' *****GAME IS FINISHED***** ' . $player2->name . ' *****WON THE THE MATCH.*****<br> ';
                        echo '******RESUME******<br>' . 'Number Of Sets ***' . $newGame->set->setNumber[0] - 1 . '<br>Set Winners ' . implode(', ', $newGame->sets);
                    }
                }
            } else {
                $autoPlay->play($newGame, $player1, $player2);
            }
        }
    }
}
