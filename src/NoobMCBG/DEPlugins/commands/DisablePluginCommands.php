<?php

declare(strict_types=1);

namespace NoobMCBG\DEPlugins\commands;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\plugin\PluginOwned;
use NoobMCBG\DEPlugins\DEPlugins;
use NoobMCBG\DEPlugins\Forms;

class DisablePluginCommands extends Command implements PluginOwned {

	private DEPlugins $plugin;

	public function __construct(DEPlugins $plugin){
		$this->plugin = $plugin;
		parent::__construct("disableplugin", "Command disable plugins", null, ["dp", "disableplugins"]);
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
        $plugins = $this->getOwningPlugin()->getPluginByName("$plugin");
        if($plugins == null){
        	$sender->sendMessage(str_replace(["{plugin}", "&", "{prefix}"], [$plugin, "§", $this->getOwningPlugin()->getConfig()->get("prefix")], strval($this->getOwningPlugin()->getConfig()->get("msg-disable-fallied"))));
        }else{
        	$this->getOwningPlugin()->setDisablePlugin($plugins);
        	$sender->sendMessage(str_replace(["{plugin}", "&", "{prefix}"], [$plugin, "§", $this->getOwningPlugin()->getConfig()->get("prefix")], strval($this->getOwningPlugin()->getConfig()->get("msg-disable-successfully"))));
        }
	}

	public function getOwningPlugin() : DEPlugins {
		return $this->plugin;
	}
}
