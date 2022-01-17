<?php

declare(strict_types=1);

namespace NoobMCBG\FakeDEPlugins\commands;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\plugin\PluginOwned;
use NoobMCBG\FakeDEPlugins\FakeDEPlugins;
use NoobMCBG\FakeDEPlugins\Forms;

class EnablePluginCommands extends Command implements PluginOwned {

	private FakeDEPlugins $plugin;

	public function __construct(FakeDEPlugins $plugin){
		$this->plugin = $plugin;
		parent::__construct("enableplugin", "Command unfake disable plugins", null, ["ep", "enableplugins"]);
		$this->setPermission("deplugins.enable");
	}

	public function execute(CommandSender $sender, string $label, array $args){
		if(!$this->testPermission($sender)){
			return true;
		}
        if(!isset($args[0])){
        	$sender->sendMessage("§cUsage:§7 /enableplugin <plugin>");
            return true;
        }
        $plugin = $args[0];
        $plugins = $this->getOwningPlugin()->getPluginByName($plugin);
        if($plugins == null){
        	$sender->sendMessage(str_replace(["{plugin}", "&", "{prefix}"], [$plugin, "§", $this->getOwningPlugin()->getConfig()->get("prefix")], strval($this->getOwningPlugin()->getConfig()->get("msg-enable-fallied"))));
        }else{
        	$this->getOwningPlugin()->setEnablePlugin($plugins);
        	$sender->sendMessage(str_replace(["{plugin}", "&", "{prefix}"], [$plugin, "§", $this->getOwningPlugin()->getConfig()->get("prefix")], strval($this->getOwningPlugin()->getConfig()->get("msg-enable-successfully"))));
        }
	}

	public function getOwningPlugin() : FakeDEPlugins {
		return $this->plugin;
	}
}