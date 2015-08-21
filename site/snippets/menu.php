<h1>
  <a href="<?php echo $site->url(); ?>">
    Faye’s Graphics House
  </a>
</h1>

<nav>

  <ul>
    <?php foreach($pages->visible() as $p): ?>
    <li>
      <?php if($p == 'works'): ?>
        <a href="<?php echo $p->children()->first()->url() ?>"><?php echo $p->title()->html() ?></a>
      <?php else : ?>
        <a <?php e($p->isOpen(), ' class="active"') ?> href="<?php echo $p->url() ?>"><?php echo $p->title()->html() ?></a>
      <?php endif ?>
    </li>
    <?php endforeach ?>
  </ul>

</nav>