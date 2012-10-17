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

<?php get_header();?>
<div id="contentwrap">
    <div id="content">
        <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>

        <div class="singletitle">
            <h2><?php the_title() ?></h2>
        </div>
        <div class="breakspace01"></div>
        <div class="data">
            <div class="dataleft">
                <span class="category">
                <?php 
                echo get_the_category_list(', ');
                echo ', ';
                if(get_bloginfo('name') == "Suomen Lehdistö" && taxonomy_exists('archive'))
                   echo get_the_term_list(get_the_ID(), 'archive', ' ', '/');

                ?>
                </span><br />
                <span class="time"><?php the_time('d.m.Y'); ?></span> &nbsp;<?php edit_post_link('(Edit)', '', ''); ?>
            </div>
            <div class="dataright">
                <span class="authorname">
                    <?php
                            the_author();
                    ?>
                </span><br />
                <a href="<?php the_permalink() ?>#kommentoi" title="<?php the_title() ?>"><?php comments_number('Ei kommentteja','1 kommentti','% kommenttia'); ?></a>
                <?php if(function_exists('wp_print')) { print_link(); } ?>
            </div>
        </div>
        <div class="breakstuff"></div>
        <div id="postcontent">
            <?php the_content(''); ?>
            <div class="breakspace02"></div>
        </div>
        
        
        <!-- <div class="breakspace02"></div> -->
            <?php endwhile; else: ?>
            <?php endif; ?>

        <!-- <div class="breakstuff"></div> -->
        
        <div class="breakspace02"></div>
        <div id="postadblock">
            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Post Ad') ) : ?>
            <?php endif; ?>
        </div>
        <hr />
        <div id="postcomments">
            <a name="kommentoi"></a>
            <?php comments_template(); ?>
        </div>
    </div>
<?php get_sidebar(); ?> 
</div>
<?php get_footer(); ?>
