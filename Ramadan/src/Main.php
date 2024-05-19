<?php

declare(strict_types=1);

namespace wax_dev\Ramadan;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use wax_dev\Ramadan\ramadanPlayer;

class Main extends PluginBase{

    private Config $config;

    public function onEnable () : void
    {
        $this->getServer ()->getPluginManager ()->registerEvents (new ramadanPlayer(), $this);
        $this->getLogger ()->info("plugin active");
        $this->config = new Config($this->getDataFolder() . "config.yml", Config::YAML);
        $this->saveDefaultConfig();
    }

    public function getConfig(): Config {
        return $this->config;
    }
}


