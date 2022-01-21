<?php

namespace keenanyafiqy\WorldTools;

use pocketmine\command\Command;
use pocketmine\player\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\Server;

class OnMain extends PluginBase implements Listener
{
    
    public function onEnable(): void
    {
        $this->getLogger()->info("Plugin has been enabled.");
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }
   
    public function onDisable(): void
    {
        $this->getLogger()->info("Plugin has been disabled.");
    }
    
    public function onCommand(CommandSender $sender, Command $cmd, String $label, Array $args): bool
    {
        if($cmd->getName() === "worldtools")
        { 

            if($sender instanceof Player)
            {
                $sender->sendMessage("Opening UI...");
                $player = $sender;
                $this->worldToolsUI($player);
            } else {
                $sender->sendMessage("Please run this command in-game");
            }
        }
        return true;
    }

    public function worldToolsUI($player)
    {
        $api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
        $form = new SimpleForm(function (Player $player, int $data = null)
        {
            $result = $data;
            if($result === null)
            {
                return true;
            }
            switch($result)
            {
                case 0:
                    $player->sendMessage("Can't create world.");
                break;
                
                case 1:
                    $player->sendMessage("Can't fetch world info.");
                break;
                
                case 2:
                    $player->sendMessage("Can't fetch world info.");
                break;
                
                case 3:
                    $player->sendMessage("Can't fetch world info.");
                break;
                
                case 4:
                    $player->sendMessage("Can't fetch world info.");
                break;
                
                case 5:
                    $player->getName();
                    $player->sendMessage("Can't load other information about you.");
                break;
                
                case 6:
                    $player->sendMessage("config.yml are not ready yet!");
                break;
            }
        });
        $form->setTitle("WorldTools UI");
        $form->setContent("Please select the following option");
        $form->addButton("Create a world");
        $form->addButton("Teleport to a world");
        $form->addButton("Loads & Unloads world");
        $form->addButton("Edit world info");
        $form->addButton("See world info");
        $form->addButton("Your profile");
        $form->addButton("Settings");
        $form->sendToPlayer($player);
        return $form;
    }

}
