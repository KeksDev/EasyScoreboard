<?php

namespace KeksDev\SB;

use KeksDev\SB\Main;
use pocketmine\network\mcpe\protocol\RemoveObjectivePacket;
use pocketmine\network\mcpe\protocol\SetDisplayObjectivePacket;
use pocketmine\network\mcpe\protocol\SetScorePacket;
use pocketmine\network\mcpe\protocol\types\ScorePacketEntry;
use pocketmine\Player;

class Scoreboard {



    public function createScoreboard(Player $player, string $title, string $objName, string $slot = "sidebar", $order = 0): void
    {
        $pk = new SetDisplayObjectivePacket();
        $pk->displaySlot = $slot;
        $pk->objectiveName = $objName;
        $pk->displayName = $title;
        $pk->criteriaName = "dummy";
        $pk->sortOrder = $order;

        $player->sendDataPacket($pk);
    }

    public function addLine(Player $player, int $score, string $msg, string $objName): void
    {
        $entry = new ScorePacketEntry();
        $entry->objectiveName = $objName;
        $entry->type = 3;
        $entry->customName = " $msg   ";
        $entry->score = $score;
        $entry->scoreboardId = $score;

        $pk = new SetScorePacket();
        $pk->type = 0;
        $pk->entries[$score] = $entry;

        $player->sendDataPacket($pk);
    }

    public function removeLine(Player $player, int $score): void
    {
        $pk = new SetScorePacket();
        if ($score === -1) {
            if (!empty($pk->entries)) {
                unset($pk->entries);
                $player->sendDataPacket($pk);
            }
        } else {
            if (isset($pk->entries[$score])) {
                unset($pk->entries[$score]);
                $player->sendDataPacket($pk);
            }
        }
    }

    public function removeScoreboard(Player $player, string $objName): void
    {
        $pk = new RemoveObjectivePacket();
        $pk->objectiveName = $objName;

        $player->sendDataPacket($pk);
    }


}
