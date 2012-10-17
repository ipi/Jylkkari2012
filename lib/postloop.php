<?php
/*
This file is part of Mediajalostamo Default Sandbox theme.

    Mediajalostamo Default Sandbox theme is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    Mediajalostamo Default Sandbox theme is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with Mediajalostamo Default Sandbox theme.  If not, see <http://www.gnu.org/licenses/>.

*/
?>
<!--
<div class="title">
            <h3> <?php // the_category(' '); ?> </h3>
        </div>
-->
        <div class="breakspace02"></div>
        <div class="postarea">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="thepost">
                <h3><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
		<a href="<?php the_permalink() ?>">
		    <?php
		    if(has_post_thumbnail ()){
			the_post_thumbnail ();
		    }
		    else{
			$images =get_children( 'post_type=attachment&post_mime_type=image&post_parent='.get_the_ID() );
			$image = array_pop($images);
			if($image)
			    echo wp_get_attachment_image( $image->ID, 'thumbnail' );
		    }
		    ?>
			<?php the_excerpt(__('Lue lis&auml;&auml;'));?>
		</a>
                <div class="breakspace01"></div>
                <div class="data">
                    <div class="dataleft">
                        <p>
                            <span class="category">Kategoria: <?php the_category(', ') ?></span><br />
                            <span class="time">P&auml;iv&auml;ys: <?php the_time('d.m.Y'); ?></span> &nbsp; <?php edit_post_link('(Edit)', '', ''); ?>
                        </p> 
                    </div>
                    <div class="dataright">
                        <span class="authorname">
                         <?php
                               the_author();
                        ?></span><br />
                        <a href="<?php the_permalink() ?>#kommentoi" title="<?php the_title() ?>"><?php comments_number('Ei kommentteja','1 kommentti','% kommenttia'); ?></a>
                    </div>
                </div>
            </div>
            <div class="breakspace02"></div>
            <?php endwhile; else: ?>
                <p><?php _e('Valitettavasti yksikään artikkeli ei vastannut hakuehtojasi.'); ?></p>
            <?php endif; ?>
                <p><?php posts_nav_link(' &#8212; ', __('&laquo; Previous Page'), __('Next Page &raquo;')); ?></p>
        </div>