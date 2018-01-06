<?php
/*

Template Name: SSS

*/

get_header();

echo apply_filters( 'the_content', $post->post_content );


get_footer();