<?php

use miBadger\Mvc\View;

echo View::get(__DIR__ . '/Header.php', ['title' => $page->getTitle()]);
echo View::get(__DIR__ . '/MainMenu.php');

?>

<header class="header-home col-12 ">
</header>

<div class="col-3 col-t-12">
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

      $parsedown = new Parsedown();
      $homepage = file_get_contents($docUrl);

      echo $parsedown->text($homepage);

    ?>

  </div>
</div>

<?php echo View::get(__DIR__ . '/Footer.php');  ?>
