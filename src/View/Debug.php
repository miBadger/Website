<?php

/**
 * This file is part of the miBadger package.
 *
 * @author Michael Webbers <michael@webbers.io>
 * @license http://opensource.org/licenses/Apache-2.0 Apache v2 License
 */

use miBadger\Mvc\View;

?>

<?php echo View::get(__DIR__ . '/Header.php', ['title' => 'Debug']); ?>

<div class="container">
	<h1>Debug</h1>
	<pre><?php print_r($exception); ?></pre>
</div>

<?php echo View::get(__DIR__ . '/Footer.php'); ?>
