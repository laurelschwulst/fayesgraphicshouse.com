<?php snippet('header') ?>

	<div id="rooms-nav">
		<ul>
		  <?php foreach($page->children()->visible() as $room): ?>
		  <li>
		    <a href="<?php echo $room->url() ?>">
		      <?php echo html($room->title()) ?>
		    </a>
		  </li>
		  <?php endforeach ?>
		</ul>
	</div>

	</div>

    <div class="text">
      <?php echo $page->text()->kirbytext() ?>
    </div>

<?php snippet('footer') ?>