<?php
 get_header();
 ?>

		<article class="content px-3 py-5 p-md-5">
<!-- wordpress loop where it references the databse -->

<?php
    if( have_posts() ){

        while( have_posts() ){

            the_post();
            the_content();
        }
    }
// I was untidy with the } and ) and it caused and error
?>

	    </article>
    

<?php
 get_footer();
 ?>