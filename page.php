<!-- similar to single.php -->

<?php
 get_header();
 ?>

		<article class="content px-3 py-5 p-md-5">
<!-- wordpress loop where it references the databse -->

<?php
    if( have_posts() ){

        while( have_posts() ){

            the_post();
            
            get_template_part( 'template-parts/content', 'page');
        }
    }
?>

	    </article>
    

<?php
 get_footer();
 ?>