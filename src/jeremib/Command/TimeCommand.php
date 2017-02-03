<?php

/**
 * Created by PhpStorm.
 * User: jeremib
 * Date: 2/3/17
 * Time: 1:48 AM
 */

namespace jeremib\Command;

class TimeCommand extends \PhpSlackBot\Command\BaseCommand
{
    protected function configure() {
        $this->setName('time');
    }

    protected function execute($message, $context) {
        $this->send($this->getCurrentChannel(), null, sprintf("It's currently %s", date("m/d/Y h:iA")));
    }
}