<?php

/**
 * This file is part of the miBadger package.
 *
 * @author Barry Lagerburg barrytwee@gmail.com
 * @license http://opensource.org/licenses/Apache-2.0 Apache v2 License
 */

namespace miBadger\Website\Controller;

use miBadger\Website\Model\Page;
use miBadger\Mvc\ControllerInterface;
use miBadger\Mvc\View;
use miBadger\Settings\Settings;

/**
 * The home class.
 *
 * @since 1.0.0
 */
class Home implements ControllerInterface
{
    /**
     * The index action.
     */
    
     <?php echo View::get(__DIR__ . '/Header.php', ['title' => $page->getTitle()]); ?>
    <?php echo View::get(__DIR__ . '/MainMenu.php'); ?>
    
<header class="header-home col-12 ">

    </header>

 <div class="col-3 col-t-12">
        <nav class="sidebar sidebar--fixed ">
            <ul class="sidebar__list">
                <li class="sidebar__item sidebar__custom sidebar__head">
                    <?php echo  $name; ?>
                </li>
                <li class="sidebar__item sidebar__custom sidebar__head sidebar__introduction">
                    <a href="/<?php echo $name ?>/">Introduction</a>
                </li>
                <?php for ($i = 0; $i < count($navItems); $i++): ?>
                <?php $navItem = $navItems[$i]; ?>
                <li class="sidebar__item sidebar__custom">
                    <a href='/<?php echo $name ?>/<?php echo $navItem; ?>/'>
                        <?php echo $navItem; ?>
                    </a>
                </li>
                <?php endfor; ?>
            </ul>
        </nav>
    </div>

    <div class="content-component component-data container col-6 ">

        <?php
                $homepage = file_get_contents($docUrl);

                $Parsedown = new Parsedown();

                echo $Parsedown->text($homepage); 
            ?>

    </div>
    <div class="col-3">
        <div class="link_to_git col-12">
            <div>
                <a href="<?php echo $docLink; ?>" class="footer-image">
                    <span class="icon icon-github"></span>
                    Github
                </a>
            </div>
        </div>

    </div>

    <?php echo View::get(__DIR__ . '/Footer.php');  ?>
