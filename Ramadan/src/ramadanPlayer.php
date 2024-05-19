<?php

declare(strict_types=1);

namespace wax_dev\Ramadan;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerItemConsumeEvent;
use pocketmine\utils\Config;

class ramadanPlayer implements Listener
{

    /**
     * @param PlayerItemConsumeEvent $event
     * @param Config $config
     * @priority NORMAL
     * @ignoreCancelled false
     */
    public function onPlayerItemConsume(PlayerItemConsumeEvent $event, Config $config): void
    {
        $player = $event->getPlayer();
        $world = $player->getWorld();
        $time = $world->getTime() % 24000;

        $dayStart = $config->get("dayStart", 0);
        $dayEnd = $config->get("dayEnd", 13000);
        $dayMessage = $config->get("dayMessage", "Vous ne pouvez pas manger pendant la journée pendant le Ramadan.");

        if ($time >= $dayStart && $time < $dayEnd) {
            $event->cancel();
            $player->sendMessage($dayMessage);
        }
    }
}
