<?php get_header(); ?>

<div id="content" class="narrowcolumn">

<!-- This sets the $curauth variable -->

    <?php
    $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
    ?>

    <h2><?php echo $curauth->nickname; ?></h2>
    <p><em><?php echo $curauth->user_description; ?></em></p>
    <p><a href="<?php echo $curauth->user_url; ?>"><?php echo $curauth->user_url; ?></a></p>


</div>

