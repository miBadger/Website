<?php

use miBadger\Mvc\View;

echo View::get(__DIR__ . '/Header.php', ['title' => 'Page not found']);

?>

<div class="container col-12 ">
  <h1>Error 505</h1>
    <p>
      GitHub servers are down or have had too many requests.
    </p>
</div>

<?php echo View::get(__DIR__ . '/Footer.php'); ?>
