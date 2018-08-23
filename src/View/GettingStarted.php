<?php

use miBadger\Mvc\View;

?>
    <?php echo View::get(__DIR__ . '/Header.php', ['title' => $page->getTitle()]); ?>
    <?php echo View::get(__DIR__ . '/MainMenu.php'); ?>

<header class="header-home col-12 ">

    </header>


 <div class="col-3 col-t-12">
        <nav class="sidebar sidebar--fixed ">
            <ul class="sidebar__list">

            </ul>
        </nav>
    </div>

<div class="col-6">
</div>


<div class="col-3">
    <div class="link_to_git getting-started-githublink col-12">
        <div>
            <a href="<?php echo $docLink; ?>" class="footer-image">
                <span class="icon icon-github"></span>
                 Github
            </a>
        </div>
    </div>
</div>

<div class="getting-started">
    <div class="content-component component-data container col-6 ">

        <?php
                $homepage = file_get_contents($docUrl);

                $Parsedown = new Parsedown();

                echo $Parsedown->text($homepage);
            ?>

    </div>
</div>


    <?php echo View::get(__DIR__ . '/Footer.php');  ?>
