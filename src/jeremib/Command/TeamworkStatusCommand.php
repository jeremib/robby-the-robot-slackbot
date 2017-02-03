<?php

/**
 * Created by PhpStorm.
 * User: jeremib
 * Date: 2/3/17
 * Time: 1:48 AM
 */

namespace jeremib\Command;

class TeamworkStatusCommand extends \PhpSlackBot\Command\BaseCommand
{
    protected function configure() {
        $this->setName('Reminder: Remember to update your status: http://my.245.tech/#/statuses/overview');
    }

    protected function execute($message, $context) {

        foreach($this->getTeamworkStatus() as $response) {
            $this->send($this->getCurrentChannel(), null, $response);
        }

//        $this->send($this->getCurrentChannel(), null, 'http://my.245.tech/#/statuses/overview');

    }

    private function getTeamworkStatus() {
        $return = [];

        $statuses = json_decode(file_get_contents(getenv('TEAMWORK_PREFIX') . '/people/status.json'));
        foreach($statuses->userStatuses as $user) {
            $return[] = sprintf("*%s*: %s", $user->{"first-name"}, $user->status);
        }

        return $return;
    }


}