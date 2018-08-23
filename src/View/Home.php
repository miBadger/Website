<?php
use miBadger\Mvc\View;



echo View::get(__DIR__ . '/Header.php', ['title' => $page->getTitle()]);

echo View::get(__DIR__ . '/MainMenu.php');

echo View::get(__DIR__ . '/welcome.php');

echo View::get(__DIR__ . '/grid.php', ['components'=> $components]);

echo View::get(__DIR__ . '/Footer.php');
