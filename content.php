<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>

<?php
switch (get_post_type()) {
    case 'event':
    $customtax = 'event-category';
    break;

    default:
    $customtax = 'category';
}
$category_list = get_the_term_list( get_the_ID(), $customtax, '', ', ','');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php twentyfourteen_post_thumbnail(); ?>
    <header class="entry-header">
        <div class="entry-meta">
            <span class="cat-links"><?php echo $category_list; ?></span>
        </div>
        <?php

        if ( is_single() ) :
            the_title( '<h1 class="entry-title">', '</h1>' );
        else :
            the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
        endif;
        ?>

        <div class="entry-meta">
        <?php
	sgcampus_meta_time();

        if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) :
        ?>
            <span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'sgcampus' ), __( '1 Comment', 'sgcampus' ), __( '% Comments', 'sgcampus' ) ); ?></span>
        <?php
        endif;

	edit_post_link( __( 'Edit', 'sgcampus' ), '<span class="edit-link">', '</span>' );
        ?>
        </div><!-- .entry-meta -->
    <?php 
        if ( is_single() ) : ?>
<!-- AddThis Button BEGIN -->
<div class="addthis_toolbox addthis_default_style" style="float: right;">
<a class="addthis_button_facebook_share" fb:share:layout="button_count" style="margin-right: 15px; line-height: 1;"></a>
<a class="addthis_button_tweet" tw:via="sgcampus" style="margin-right:-10px;"></a> 
<a class="addthis_button_google_plusone" g:plusone:size="medium" style="margin-right:-15px;"></a> 
<a class="addthis_button_linkedin_counter" style="margin-right: 10px;"></a> 
<a class="addthis_counter addthis_pill_style"></a>
</div>
<script type="text/javascript">var addthis_config = {"data_track_addressbar":true, ui_language: "es" };</script>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5100717127708e7f"></script>
<!-- AddThis Button END -->
        <?php 
        endif;
        ?>

    </header><!-- .entry-header -->

    <?php if ( is_search() || is_home() || is_archive() ) : ?>
        <div class="entry-summary">
        <?php the_excerpt(); ?>
        </div><!-- .entry-summary -->
    <?php else : ?>
        <div class="entry-content single">
            <?php
            the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'sgcampus' ) );
            
            $session_link = get_field('link-registro');
            if ($session_link)
                echo "<p>Regístrate en: <br /><a href='$session_link' target='_blank'>$session_link</a></p>";

            wp_link_pages( array(
                'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'sgcampus' ) . '</span>',
                'after'       => '</div>',
                'link_before' => '<span>',
                'link_after'  => '</span>',
            ) );
            ?>
        </div><!-- .entry-content -->
        <?php endif; ?>

	<?php the_tags( '<footer class="entry-meta"><span class="tag-links">', '', '</span></footer>' ); ?>
</article><!-- #post-## -->
