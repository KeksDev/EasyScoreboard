# EasyScoreboard
An easy API to make Scoreboards in PocketMine-MP
# Usage
# create scoreboard
 ```php
$scoreboard = new Scoreboard();
$scoreboard->createScoreboard($player, "Scoreboard", "NAME");
$scoreboard->addLine($player, 0, "Hallo", "NAME");
$scoreboard->addLine($player, 1, "wie gehts", "NAME");
```
# remove scoreboard
 ```php
$scoreboard = new Scoreboard();
$scoreboard->removeScoreboard($player, "NAME");
```

