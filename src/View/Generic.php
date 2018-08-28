<?php

use miBadger\Mvc\View;

echo View::get(__DIR__ . '/Header.php', ['title' => 'An error occured']);

?>

<div class="container">
	<h1>An error occured</h1>
	<p>Something went wrong.</p>
</div>

<?php echo View::get(__DIR__ . '/Footer.php'); ?>
