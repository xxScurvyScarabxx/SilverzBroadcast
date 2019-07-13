<?php

declare(strict_types=1);

namespace SilverzEssentials;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;
use SilverzEssentials\commands\FlyCommand;


class Main extends PluginBase{

	public const PREFIX = TextFormat::DARK_PURPLE . TextFormat::BOLD . "SilverzEssentials " . TextFormat::RESET;

	/** @var Main $instance */
	protected static $instance;

	public function onEnable() : void{
		self::$instance = $this;
		$this->setMotd(str_replace("&", "§", strval($this->getConfig()->get("motd"))));
		@mkdir($this->getDataFolder());
		$this->saveDefaultConfig();
		$this->getServer()->getCommandMap()->registerAll("ShellyEssentials", [
			new FlyCommand($this)
		]);
		}

	
	
}
