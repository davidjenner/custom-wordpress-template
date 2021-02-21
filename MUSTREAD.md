# custom-wordpress-template
Custom WordPress template

I learned all of this with thanks to Followandrew - https://www.youtube.com/watch?v=-h7gOJbIpmo&t=1508s


FILES EXPLAINED

1) Folders
assets
- css
- images
- js

2) functions.php

3) index.php

4) archive.php

5) search.php

6) page.php

7) front-page.php

8) header.php

9) comments.php

10) 404.php

11) footer.php

12) Summary



1) ================================================================================


ASSETS
- Contains CSS / Images / JS files

TEMPLATE PARTS
These are pulled into the index.php by the following
 get_template_part( 'template-parts/content', 'archive');
- It looks up content and then 'archive' or'page' seperatly.

- archive page - content-archive.php - used for displaying mutliple blogs
- posts page - content-article.php - used for displaying a post page with comments
- general page - content-page.php - used for a page such as homepage or about page.

the only one that normally uses comments is the content-article.php page
PHP to pull in the comments is   <?php comments_template(); ?>

2) ================================================================================

FUNCTIONS.PHP
- This adds in some of the main functionality to WordPress such as 'Widgets', plus lots more.
- These are only contained within the theme file, so you will loose theme if you switch theme
- The best practice to adding extra functions it to add them as a plugin (in an ideal world)

Stuff in here looks like: -

function theme_support(){
    add_theme_support('title-tag'); 
}
add_action('after_setup_theme','theme_support');


Note: Then you need to add the elements into the actual page for them to show up!


3) ================================================================================

INDEX.PHP - this is basically to show all your blog posts
 - This is the posts feed where is pulls in loop from template-archive.php
 get_template_part( 'template-parts/content', 'archive');
 - There pagination feature after the WP Loop - <?php the_posts_pagination(); ?>

<?php get_header(); ?>
<article>
<?php <!-- if/while loop --> ?> links to 'archive-archive.php'
</article>
<?php get_footer(); ?>


4) ================================================================================

ARCHIVE.PHP
- This is a master file that is linked to the 'archive-content.php' file
- This flexibility allows us to point to different types of templates as requred

<?php get_header(); ?>
<article>
<?php <!-- if/while loop --> ?> links to 'archive-content.php'
</article>
<?php get_footer(); ?>

5) ================================================================================

SEARCH.PHP  - very similar to above
- This is a master file that is linked to the 'archive-archive.php' file

<?php get_header(); ?>
<article>
<?php <!-- if/while loop --> ?> links to 'archive-archive.php'
</article>
<?php get_footer(); ?>


6) ================================================================================

PAGE.PHP - as the name suggestes this is to display a page like 'Home' or 'About', 'Contact' etc
 - this is pretty much exactly the same as index.php without comments and pagination
- This is the framework for your pages that pulls in the template from content-page.php
- There are no comments so it's just about looping in the content within your wp page.
- it pulls in the page template using -> get_template_part( 'template-parts/content', 'page');

<?php get_header(); ?>
<article>
<?php <!-- if/while loop --> ?> This is the complicated bit
</article>
<?php get_footer(); ?>


7) ================================================================================

FRONT-PAGE.PHP
This is used to display the front page.
Similar layout to the above but pulls in page content

<?php get_header(); ?>
<article>
<?php <!-- if/while loop --> ?> 

Pulls in 'the_post();' & 'the_content();' from your WordPress page
You could also used Advanced Custom Feild here, too! Go Wild!
http://advancedcustomfields.com/

</article>
<?php get_footer(); ?>


8) ================================================================================

HEADER.PHP - This is for displaying usual HTML header and in this case, the footer too
- You want to include the usual mombo-jumbo html elements here
<html>
  <head>
    <!-- meta stuff such as <meta charset="utf-8"> -->
    <!-- Style imports from functions.php with <?php wp_head(); ?> --> 
  </head>
  <body>
    <header>
        <!-- echos out the name of the website -->
      <nav>
        <!-- This is the most complicated part to code dymaically -->
      </nav>
    </header>
  </body>
  
9) ================================================================================

COMMENTS.PHP - Well, this is for comments
- I'll be honest this wasn't so simple but you can copy mine
- Some of the more granular settings are in the discussion settings of wordpress
- there are also more granular coding settings in the WordPress Codex


10) ================================================================================


404.PHP - Page not found - for when a page is looked up that isn't there
- This is nothing scary - basic template that works is
<?php get_header(); ?>  ------------- This pulls in the header from header.php
<article > -------------------------- This is just a basic HTML Opening element
<h1>Page not found</h1> ------------- Basic HTML Heading to says Page not found
<?php. get_search_form(); ?> -------- This is just PHP to add in a search bar
</article> -------------------------- Closing tag
<?php get_footer(); ?> -------------- This pulls in the footer from footer.php


11) ================================================================================

FOOTER.PHP - well, it's for the footer
- In coding it's easy to think you go foot(); but it's footer();
- In this case it pulls in the sidebar with <?php dynamic_sidebar('footer-1'); ?>

<footer class=""> 
<p class="copyright"><a href="https://bwrwebdesign.com">BWR Web Design</a></p>
<?php dynamic_sidebar('footer-1'); ?>
</footer></div>
<?php wp_footer(); ?>
</body>
</html> 

12) ================================================================================


SUMMARY

Very sililar pages
- index.php (with pagination) --- links to content-archive.php
- single.php -------------------- links to content-article.php
- search.php -------------------- Links to content-archive.php
- page.php (without comments) --- links to content-page.php
- 404.php (without the loop) ----- doesn't link to anything - easy
