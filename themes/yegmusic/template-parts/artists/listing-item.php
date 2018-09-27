<?php
/** @var $artist */
$thumbnail = get_field('photo', $artist->ID);
?>
<a class="card-hover" href="/contact">
  <div class="card">
    <img class="card-img-top" src="<?php echo $thumbnail['sizes']['large']; ?>" alt="<?php echo $thumbnail['alt']; ?>">
    <div class="card-body">
      <h3 class="card-title"><?php echo $artist->post_title; ?></h3>
    </div>
  </div>
</a>
<?php

?>