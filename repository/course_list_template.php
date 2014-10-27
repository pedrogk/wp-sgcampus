
  <h2 class="ld-entry-title entry-title" style="display: inline;">
    <?php
    the_post_thumbnail('thumbnail', array('style'=>'float:left;margin-right:20px;'));
    ?>
    <a href="<?php the_permalink(); ?>"><?php the_title();?></a>
  </h2>


  <div class="ld-entry-content entry-content">
    <?php

    $modalidad = get_field('curso-modalidad');
    if ($modalidad)
      echo "<div><strong>Modalidad</strong>: $modalidad </div>";

    $precio = get_field('curso-precio-texto');
    if ($precio)
      echo "<div><strong>Precio</strong>: $precio </div>";

    $inicio = get_field('curso-inicio');
    if ($inicio) {
      $fecha = date_format(date_create_from_format('Y-m-d', $inicio), 'j-M-Y');
      echo "<div><strong>Fecha de inicio</strong>: $fecha </div>";    
    }

    the_excerpt(__('Read more.', 'learndash'));

    ?>

  </div>

  <div style="clear:both;"></div>
