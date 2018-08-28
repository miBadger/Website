<?php

use miBadger\Mvc\View;

echo View::get(__DIR__ . '/Header.php', ['title' => $page->getTitle()]);
echo View::get(__DIR__ . '/MainMenu.php');

?>

<header class="header-home col-12 ">
</header>

<div class="col-3 col-t-12">

  <?php if($name !== null): ?>
    <nav class="sidebar sidebar--fixed ">
      <ul class="sidebar__list">
        <li class="sidebar__item sidebar__custom sidebar__head">
          <?php echo  $name; ?>
        </li>
        <?php
          for ($i = 0; $i < count($navItems); $i++):
            $navItem = $navItems[$i];
        ?>
          <li class="sidebar__item sidebar__custom">
            <a href='/<?php echo $name ?>/<?php echo $navItem; ?>/'>
              <?php echo $navItem; ?>
            </a>
          </li>
        <?php endfor; ?>
      </ul>
    </nav>
  <?php endif; ?>
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
