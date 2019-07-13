<?php
declare(strict_types=1);
namespace SilverzPlayz\SilverzEssentials;
use pocketmine\Server;
use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\utils\Config;
class Main extends PluginBase{
	
	public function onEnable(){
		$this->getLogger()->info("Loading Config.yml");



		$this->saveResource("config.yml");
	}
	
	public function onDisable(){
		$this->getLogger()->info("Saving Config.yml");



	}
	
	public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args) : bool{
		switch($cmd->getName()){
			case "broadcast":
			 $cfg = new Config($this->getDataFolder() . "config.yml", Config::YAML);
			 $noperm = $cfg->get("noperm");
			 $succes = $cfg->get("succes");
			 $format = $cfg->get("format");
			 $name = $sender->getName();
			 $msg = implode(" ",$args);
			 if($sender->hasPermission("broadcast.cmd.bcast")){
			 	$format = str_replace("{sender}", $name, $format);
			 	$format = str_replace("{msg}", $msg, $format);
			 	
			 	$sender->sendMessage($succes);
			 	$this->getServer()->broadcastMessage($format);
			 }else{
			 	$sender->sendMessage($noperm);
			 }
		}
		return true;
	}



}
