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

<?php echo View::get(__DIR__ . '/welcome.php'); ?>
<?php echo View::get(__DIR__ . '/grid.php', ['components'=> $components]);  ?>


<?php echo View::get(__DIR__ . '/Footer.php');  ?>
