<?php
/* redirect browser to latest article */
if(isset($_REQUEST['latest'])){

   foreach(get_terms('archive', array('order' => 'DESC', 'hide_empty' => true, 'name__like' => '20')) as $t){
    if(!isset($year) || $t->name > $year->name)
        $year = $t;
   }

   foreach(get_term_children($year->term_id, 'archive') as $c){
    $term = get_term_by('id', $c, 'archive');
        if(!isset($issue) || $term->name > $issue->name)
            $issue = $term;
    }
    header( 'Location: '.get_term_link((int)$issue->term_id, 'archive') ) ;
}
?>
<?php get_header(); ?>
<div id="contentwrap">
    <div id="content">
    <?php if(is_taxonomy('archive')):?>
        <div id="year_selector">
            <ul>
            <?php
                $terms = get_terms('archive', array('order' => 'DESC', 'hide_empty' => true, 'name__like' => '20'));
		//print_r($wp_query);
                foreach($terms as $t){
		//    print_r($t);
                    if($t->name == $wp_query->queried_object->name || $t->term_id == $wp_query->queried_object->parent)
                      printf('<li><a href="%s" class="selected">%s</a></li>', get_term_link((int)$t->term_id, 'archive'), $t->name);
                    else
                        printf('<li><a href="%s">%s</a></li>', get_term_link((int)$t->term_id, 'archive'), $t->name);
                }
            ?>
            </ul>
        </div>
        <div id="issue_selector">
            <ul>
            <?php
		//print_r($wp_query);
		if(!$wp_query->queried_object->parent){
		    //print_r(get_term_children($wp_query->queried_object->term_id, 'archive'));
		    $children = get_terms('archive','fields=names&child_of='.$wp_query->queried_object->term_id);
		    sort($children);
		    $latest_child = array_pop($children);
		}
                $curTerm = get_term_by('slug',get_query_var('archive'),'archive');
                if($curTerm){
                    if($curTerm->parent)
                            //$child = get_terms('archive', array('order' => 'DESC', 'hide_empty' => true, 'child_of' => $curTerm->parent));
                        $child = get_term_children($curTerm->parent, 'archive');
                    else
                        //$child = get_terms('archive', array('order' => 'DESC', 'hide_empty' => true, 'child_of' => $curTerm->term_id));
                        $child = get_term_children($curTerm->term_id, 'archive');
		    
                    foreach($child as $id){
                        $t = get_term_by('id',$id,'archive');
                        if($t->name == $wp_query->queried_object->name || $t->name == $latest_child)
                          printf('<li><a href="%s" class="selected">%s</a></li>', get_term_link((int)$t->term_id, 'archive'), $t->name);
                        else
                          printf('<li><a href="%s">%s</a></li>', get_term_link((int)$t->term_id, 'archive'), $t->name);
                    }
                }
            ?>
            </ul>
        </div>
        <div class="breakspace02"></div>
        <div id="issue_list">
            <?php
                if ( have_posts() ) { 
                    while ( have_posts() ) { 
                    the_post();
                    printf('<div class="thepost">');
                    printf('<h3><a href="%s" rel="bookmark">%s</a></h3>',get_permalink(),get_the_title());

		    printf('<a href="%s">',get_permalink());
		    
		    $images = get_children( 'post_type=attachment&post_mime_type=image&post_parent='.get_the_ID() );
                    $image = array_pop($images);
                    if($image)
                        printf('%s',wp_get_attachment_image( $image->ID, 'thumbnail' ));

                    the_excerpt(__('Lue lis&auml;&auml'));
		    printf("</a>");
		    
                    printf('<div class="breakspace01"></div>');
                    printf('<div class="data"><div class="dataleft">');
                    //$category = get_the_category(', ');
                    //print_r($category);
                    //printf('<p> <span class="category">Kategoria:<br />',the_category(' ', 'single' ));
                    printf('<p> <span class="category">Kategoria: ');
                    $mark = '';
                    foreach(get_the_category() as $c)
                        printf('<a href="%s">%s %s</a>&nbsp;',get_category_link($c->cat_ID),$mark, $c->name);
                    
                    printf('</span><br />');
                    printf('<span class="time">P&auml;iv&auml;ys: %s</span> &nbsp; ',get_the_time('d.m.Y'), get_edit_post_link('(Edit)', '', ''));
                    printf('</p></div>');
                    printf('<div class="dataright">');
                    printf('<span class="authorname">');
                    the_author();
                    printf('</span><br />');
                    printf('<a href="%s#kommentoi" title="%s">',get_permalink(), get_the_title());
                    comments_number('Ei kommentteja','1 kommentti','% kommenttia');
                    printf('</a>');
                    printf('</div></div></div> <div class="breakspace02"></div>');
                    }
                }
            ?>
        </div>
        <?php endif;/* is_taxonomy('archive') */?>
    </div>
    <?php get_sidebar(); ?>
</div>                  
<?php get_footer(); ?>