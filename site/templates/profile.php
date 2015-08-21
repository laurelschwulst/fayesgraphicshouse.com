<?php snippet('header') ?>

	<div class="text">

	  <?php echo $page->text()->kirbytext() ?>

	  <?php foreach($page->siblings()->find('contact')->children() as $subpage): ?>
	  <div class="small">
	      <div class="list-title"><?php echo $subpage->title() ?></div>
	      <?php echo $subpage->text()->kirbytext() ?>
	  </div>
	  <?php endforeach ?>

	  <?php foreach($page->children() as $subpage): ?>
	  <div class="small">
	      <div class="list-title"><?php echo $subpage->title() ?></div>
	      <?php echo $subpage->text()->kirbytext() ?>
	  </div>
	  <?php endforeach ?>

	</div>

	<div id="sprout-container">
		<div id="sprout">
			<img src="assets/images/sprout-still.png">
		</div>
	</div>

<?php snippet('footer') ?>