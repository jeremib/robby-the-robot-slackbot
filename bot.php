<?php
/**
 * Created by PhpStorm.
 * User: jeremib
 * Date: 2/3/17
 * Time: 1:46 AM
 */

require 'vendor/autoload.php';
require 'src/jeremib/Command/TimeCommand.php';
require 'src/jeremib/Command/TeamworkStatusCommand.php';

use PhpSlackBot\Bot;


$bot = new Bot();
$bot->setToken('xoxb-24223812897-MlcVJdtnxDRcyu6ronJ10lAd'); // Get your token here https://my.slack.com/services/new/bot
$bot->loadCommand(new \jeremib\Command\TimeCommand());
$bot->loadCommand(new \jeremib\Command\TeamworkStatusCommand());
$bot->loadInternalCommands(); // This loads example commands
$bot->run();