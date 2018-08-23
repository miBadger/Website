<section class="section col-12">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h3 id="components" class="section__title">Go ahead, our code won't bite.<br/>
        </h3>
      </div>
    </div>

    <div class="row features">
      <?php for ($i = 0; $i < count($components); $i++) : ?>
        <?php $component = $components[$i]; ?>

        <div class="col-2 col-m-4 col-l-6">
          <a href="/<?php echo $component['name']; ?>/">
            <div class="features__card card">
              <div class="icon icon-<?php echo $component['icon']; ?>"></div>
              <p class="features__title">
                <?php echo $component['name']; ?>
              </p>
            </div>
          </a>
        </div>
      <?php endfor; ?>
    </div>
  </div>
</section>
