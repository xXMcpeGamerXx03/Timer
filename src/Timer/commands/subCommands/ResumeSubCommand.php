<?php

namespace Timer\commands\subCommands;

use CortexPE\Commando\BaseSubCommand;
use pocketmine\command\CommandSender;
use Timer\TimerLoader;

class ResumeSubCommand extends BaseSubCommand {

    protected function prepare(): void {
        $this->setPermission("timer.command");
    }

    public function onRun(CommandSender $sender, string $aliasUsed, array $args): void {
        if ($sender->hasPermission($this->getPermission())) {
            TimerLoader::getInstance()->getTimer()->resumeTimer($error);
            if ($error == null) {
                $sender->sendMessage(TimerLoader::getPrefix() . "§6Der Timer wurde §afortgesetzt§6!");
            } else {
                $sender->sendMessage(TimerLoader::getPrefix() . "§c" . $error);
            }
        } else {
            $sender->sendMessage(TimerLoader::getPrefix() . "§cDafür hast du keine Rechte!");
        }
    }
}