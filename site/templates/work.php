<?php snippet('header') ?>
  
  <?php if ('black' == $page-> background()): ?>
    <?php echo css('assets/css/lightbox-black.css'); ?>
  <?php endif ?>

    <?php if ($page->slideshow() == '1'): ?>
    <div class="multi-link">
      <div class="image-container">
        <?php foreach($page->images()->sortBy('sort', 'asc') as $image): ?>
          <img src="<?php echo $image->url() ?>" alt="<?php echo $page->title()->html() ?>" class="multi">
        <?php endforeach ?>
      </div>
    </div>
    <?php endif ?>

    <a href="<?php echo $page->parent()->url() ?>" class="lightbox-link">
      <div class="image-container">
        <?php if ($page->slideshow() == '1'): ?>
          <img src="<?php echo $page->images()->last()->url() ?>" alt="<?php echo $page->title()->html() ?>">
        <?php elseif ($page->images()->count() > 1): ?>
          <img src="<?php echo $page->images()->nth('1')->url() ?>" alt="<?php echo $page->title()->html() ?>">
        <?php else : ?>
          <img src="<?php echo $page->images()->first()->url() ?>" alt="<?php echo $page->title()->html() ?>">
        <?php endif ?>
      </div>
    </a>

    <div class="slideshow-count"></div>

    <div class="image-caption">
      <?php echo $page->title()->html() ?>, <?php echo $page->date('Y', 'year') ?><br>
      <?php echo $page->text()->kirbytext() ?>
    </div>

    <nav class="nextprev cf" role="navigation">
      <?php if($prev = $page->prevVisible()): ?>
      <a class="prev" href="<?php echo $prev->url() ?>">&larr; previous</a>
      <?php endif ?>
      <?php if($next = $page->nextVisible()): ?>
      <a class="next" href="<?php echo $next->url() ?>">next &rarr;</a>
      <?php endif ?>
    </nav>

<?php snippet('footer') ?>