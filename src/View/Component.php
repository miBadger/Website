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
            <?php for($i = 0; $i < count($navItems); $i++): ?>
            <?php $navItem = $navItems[$i]; ?>
            <li class="sidebar__item sidebar__custom">
                <a href='#doc-<?php echo $i +1; ?>'>
                    <?php echo $navItem; ?> </a>
            </li>
            <?php endfor; ?>
        </ul>
    </nav>


    <div class="content-component">
        <?php for($i = 0; $i < count($contents); $i++): ?>
        
        <div class="component-data" id="doc-<?php echo $i +1; ?>">
            <?php
            $homepage = file_get_contents($contents[$i]);
            
               $Parsedown = new Parsedown();

                echo $Parsedown->text($homepage); ?>
           
           
           
       </div>
        <?php endfor; ?>
    </div>
<?php echo View::get(__DIR__ . '/Footer.php');  ?>
