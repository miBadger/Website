<?php

namespace miBadger\Website\Controller;

use miBadger\Website\Model\Page;
use miBadger\Mvc\ControllerInterface;
use miBadger\Mvc\View;
use miBadger\Http\ServerResponse;
use miBadger\Http\ServerResponseException;


class GettingStarted implements ControllerInterface
{
    public function mibadgerReadmeAction()
    {
        $page = new Page();
        $page->setTitle("getting started!");

        $repositoryLink = 'https://github.com/mibadger/miBadger/';

        return View::get(__DIR__ . '/../View/GettingStarted.php', [
            'page' => $page,
            'name' => null,
            'navItems' => null,
            'docUrl' => "https://raw.githubusercontent.com/miBadger/miBadger/master/README.md",
            'docLink' => "https://github.com/miBadger/miBadger/"
        ]);
    }
}
