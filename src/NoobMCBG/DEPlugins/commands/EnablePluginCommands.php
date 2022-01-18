<?php

declare(strict_types=1);

namespace NoobMCBG\DEPlugins\commands;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\plugin\PluginOwned;
use NoobMCBG\DEPlugins\DEPlugins;
use NoobMCBG\DEPlugins\Forms;

class EnablePluginCommands extends Command implements PluginOwned {

	private DEPlugins $plugin;

	public function __construct(DEPlugins $plugin){
		$this->plugin = $plugin;
		parent::__construct("enableplugin", "Command enable plugins", null, ["ep", "enableplugins"]);
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
        $plugins = $this->getOwningPlugin()->getPluginByName("$plugin");
        if($plugins == null){
        	$sender->sendMessage(str_replace(["{plugin}", "&", "{prefix}"], [$plugin, "§", $this->getOwningPlugin()->getConfig()->get("prefix")], strval($this->getOwningPlugin()->getConfig()->get("msg-enable-fallied"))));
        }else{
        	$this->getOwningPlugin()->setEnablePlugin($plugins);
        	$sender->sendMessage(str_replace(["{plugin}", "&", "{prefix}"], [$plugin, "§", $this->getOwningPlugin()->getConfig()->get("prefix")], strval($this->getOwningPlugin()->getConfig()->get("msg-enable-successfully"))));
        }
	}

	public function getOwningPlugin() : DEPlugins {
		return $this->plugin;
	}
}