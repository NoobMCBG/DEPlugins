<?php

declare(strict_types=1);

namespace NoobMCBG\FakeDEPlugins;

use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use NoobMCBG\FakeDEPlugins\commands\DisablePluginCommands;
use NoobMCBG\FakeDEPlugins\commands\EnablePluginCommands;

class FakeDEPlugins extends PluginBase implements Listener {

	public static $instance;

	public static function getInstance() : self {
		return self::$instance;
	}

	public function onEnable() : void {
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->saveDefaultConfig();
		$this->getServer()->getCommandMap()->register("FakeDEPlugins", new DisablePluginCommands($this));
		$this->getServer()->getCommandMap()->register("FakeDEPlugins", new EnablePluginCommands($this));
		self::$instance = $this;
	}

	public function getPluginByName($plugin){
        return $this->getServer()->getPluginManager()->getPlugin("$plugin");
	}

	public function setDisablePlugin($plugin){
		if($plugin !== null){
		    $this->getServer()->getPluginManager()->disablePlugin($plugin);
		}
	}

	public function setEnablePlugin($plugin){
		if($plugin !== null){
		    $this->getServer()->getPluginManager()->enablePlugin($plugin);
		}
	}
}