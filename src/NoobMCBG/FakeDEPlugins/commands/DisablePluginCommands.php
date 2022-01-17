<?php

declare(strict_types=1);

namespace NoobMCBG\FakeDEPlugins\commands;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\plugin\PluginOwned;
use NoobMCBG\FakeDEPlugins\FakeDEPlugins;
use NoobMCBG\FakeDEPlugins\Forms;

class DisablePluginCommands extends Command implements PluginOwned {

	private FakeDEPlugins $plugin;

	public function __construct(FakeDEPlugins $plugin){
		$this->plugin = $plugin;
		parent::__construct("disableplugin", "Command fake disable plugins", null, ["dp", "disableplugins"]);
		$this->setPermission("deplugins.disable");
	}

	public function execute(CommandSender $sender, string $label, array $args){
		if(!$this->testPermission($sender)){
			return true;
		}
        if(!isset($args[0])){
        	$sender->sendMessage("§cUsage:§7 /disableplugin <plugin>");
            return true;
        }
        $plugin = $args[0];
        $plugins = $this->getOwningPlugin()->getPluginByName($plugin);
        if($plugins == null){
        	$sender->sendMessage(str_replace(["{plugin}", "&", "{prefix}"], [$plugin, "§", $this->getOwningPlugin()->getConfig()->get("prefix")], strval($this->getOwningPlugin()->getConfig()->get("msg-disable-fallied"))));
        }else{
        	$this->getOwningPlugin()->setDisablePlugin($plugins);
        	$sender->sendMessage(str_replace(["{plugin}", "&", "{prefix}"], [$plugin, "§", $this->getOwningPlugin()->getConfig()->get("prefix")], strval($this->getOwningPlugin()->getConfig()->get("msg-disable-successfully"))));
        }
	}

	public function getOwningPlugin() : FakeDEPlugins {
		return $this->plugin;
	}
}