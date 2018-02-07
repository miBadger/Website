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

<div class="container">
	<h1>Page not found</h1>
	<p>The requested URL was not found on this server. That’s all we know.</p>
</div>

<?php echo View::get(__DIR__ . '/Footer.php'); ?>
