<?php
namespace KeksDev\SB;

use KeksDev\SB\Main;
use pocketmine\Player;

class Scoreboard {
 
 private $name;
 private $p;
 private $data;
 
 public function __construct(Player $p, String $name, $data = []) {
        $this->name = $name;
        $this->p = $p;
        $this->data = $data;
    }

    public function send() {
        $player = $this->p;
        Main::rmScoreboard($player, $this->name);
        Main::createScoreboard($player, $this->name, $this->name);

        $count = 0;

        foreach($this->data as $d) {
            $sc->setScoreboardEntry($player, $count, $d, $this->name);
            $count++;
        }
    } 
}
