<?php
/**
 * The template for displaying Author archive pages
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

<section id="primary" class="content-area">
    <div id="content" class="site-content" role="main">

        <?php
        $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
        ?>

        <header class="archive-header">
            <div class="author-avatar">
            <?php echo get_avatar( $curauth->ID, 120 ); ?>
            </div>
            <h1 class="archive-title">
            <?php echo $curauth->nickname; ?>
            </h1>
            <?php if ( $curauth->user_description ) : ?>
                <div class="author-description"><?php echo $curauth->user_description; ?></div>
            <?php endif; ?>
            <p><a href="<?php echo $curauth->user_url; ?>"><?php echo $curauth->user_url; ?></a></p>

	</header><!-- .archive-header -->
    </div><!-- #content -->
</section><!-- #primary -->

<?php
get_sidebar( 'content' );
get_sidebar();
get_footer();
