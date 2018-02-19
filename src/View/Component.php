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

        <div class="content-component container col-6 ">
            <div class="component-data">



                <?php $homepage = file_get_contents($readme);
                //var_dump($readme);

                $Parsedown = new Parsedown();

                echo $Parsedown->text($homepage); ?>



            </div>
        </div>
    <div class="col-3">
        <a class="link link--gray link_to_git" href="<?php echo $doclink; ?>" >
            <img class="octocat" alt="octocat" src="/assets/images/GH.png" >
             view on  Github.
        </a>
        

    </div>
         
        <?php echo View::get(__DIR__ . '/Footer.php');  ?>
