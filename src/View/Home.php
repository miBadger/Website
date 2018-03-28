<?php

/**
 * This file is part of the miBadger package.
 *
 * @author Barry Lagerburg barrytwee@gmail.com
 * @license http://opensource.org/licenses/Apache-2.0 Apache v2 License
 */

use miBadger\Mvc\View;



echo View::get(__DIR__ . '/Header.php', ['title' => $page->getTitle()]);

echo View::get(__DIR__ . '/MainMenu.php');

echo View::get(__DIR__ . '/welcome.php');

echo View::get(__DIR__ . '/grid.php', ['components'=> $components]);

echo View::get(__DIR__ . '/Footer.php');
