<?php

/**
 * This file is part of the miBadger package.
 *
 * @author Michael Webbers <michael@webbers.io>
 * @license http://opensource.org/licenses/Apache-2.0 Apache v2 License
 */

use miBadger\Mvc\View;

?>
    <?php echo View::get(__DIR__ . '/Header.php', ['title' => $page->getTitle()]); ?>
    <?php echo View::get(__DIR__ . '/MainMenu.php'); ?>


    <nav class="sidebar sidebar--fixed">
        <ul class="sidebar__list">
            <li class="sidebar__item sidebar__custom sidebar__head">
                <?php echo  $name; ?>
            </li>
            <li class="sidebar__item sidebar__custom sidebar__head sidebar__introduction">
                <a href="/<?php echo $name ?>/">Introduction</a>
            </li>
                <?php for($i = 0; $i < count($navItems); $i++): ?>
                <?php $navItem = $navItems[$i]; ?>
            <li class="sidebar__item sidebar__custom">
                <a href='/<?php echo $name ?>/<?php echo $navItem; ?>/'>
                <?php echo $navItem; ?>
                </a>
            </li>
            <?php endfor; ?>
        </ul>
    </nav>
    <div class="content-component">
        <div class="component-data">

            <?php $homepage = file_get_contents($readme);
            //var_dump($readme);
         
            $Parsedown = new Parsedown();

            echo $Parsedown->text($homepage); ?>



        </div>
    </div>
<?php echo View::get(__DIR__ . '/Footer.php');  ?>
