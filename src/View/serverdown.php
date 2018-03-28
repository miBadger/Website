<?php

/**
 * This file is part of the miBadger package.
 *
 * @author Michael Webbers <michael@webbers.io>
 * @license http://opensource.org/licenses/Apache-2.0 Apache v2 License
 */

use miBadger\Mvc\View;

?>

    <?php echo View::get(__DIR__ . '/Header.php', ['title' => 'Page not found']); ?>

    <div class="container col-12 ">
        <h1>oh boy what's wrong, Octorick?</h1>
        <p>
            huh, looks like something's wrong with the microverse battery. (github servers are down or have had too many requests)
        </p>
        <div class="col-12">
            <img class="octorick" src="\assets\images\serverdown.jpg" alt="Server down">
        </div>
    </div>

    <?php echo View::get(__DIR__ . '/Footer.php'); ?>
