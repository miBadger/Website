<?php

namespace miBadger\Website\Controller;

use miBadger\Website\Model\Page;
use miBadger\Mvc\ControllerInterface;
use miBadger\Mvc\View;
use miBadger\Settings\Settings;


class Home implements ControllerInterface
{
    public function indexAction()
    {
        $page = new Page();
        $page->setTitle('Home');

        $settings = new Settings();
        $settings->load(__DIR__. '/../../settings.json');

        $components = $settings->get('components');

        return View::get(__DIR__ . '/../View/Home.php', ['page' => $page, 'components' => $components]);
    }
}
