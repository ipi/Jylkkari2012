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

<?php get_header(); ?>
<div id="contentwrap">
    <div id="content">
        <div class="title">
            <h3> <?php the_category(' ', 'single' ); ?> </h3>
        </div>
        <div id="postarea_top"></div>
        <div class="postarea">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <h3><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
                <div class="date">
                    <div class="dateleft">
                        <p><span class="category"><?php the_category(', ') ?></span> | <span class="time"><?php the_time('d.m.Y'); ?></span> &nbsp; <?php edit_post_link('(Edit)', '', ''); ?></p> 
                    </div>
                    <div class="dateright">
                    <p><a href="<?php the_permalink() ?>#kommentoi" title="<?php the_title() ?>"><?php comments_number('Ei kommentteja','1 kommentti','% kommenttia'); ?></a></p> 
                    </div>
                </div>
            <?php the_excerpt(__('Lue lisää'));?><div style="clear:both;"></div>
            <div class="postarea_pad"></div>
            <?php endwhile; else: ?>
            <p><?php _e('Valitettavasti yksikään artikkeli ei vastannut hakuehtojasi.'); ?></p><?php endif; ?>
            <p><?php posts_nav_link(' &#8212; ', __('&laquo; Previous Page'), __('Next Page &raquo;')); ?></p>
        </div>
    </div>
<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
