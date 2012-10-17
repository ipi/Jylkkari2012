<?php
    if(!class_exists('noname')){
        class noname{
            public function __construct() {
                add_action('admin_menu', array($this, 'metaboxHook'));
                add_action('save_post', array($this, 'savePostHook'));
            }

            function metaboxHook() {
                add_meta_box(_('Kirjoittaja'), __('Kirjoittaja'), array($this,'metabox'), 'post', 'side', 'high');
            }

            function metabox() {
                global $post;

                printf('<input type="checkbox" name="noname" %s /> Vaihda kirjoittajan nimi',
                get_post_meta($post->ID, 'Kirjoittaja', $single = true) ? 'checked="checked"' : '');

                printf('<br /><br />Julkaistaan nimellä: <input type="textbox" name="noname_name" value="%s" /> ',
                get_post_meta($post->ID, 'Kirjoittaja', $single = true) ? get_post_meta($post->ID, 'Kirjoittaja', $single = true) : '&nbsp;');

                printf('<input type="hidden" name="noname_nonce" value="%s" />',
                    wp_create_nonce( plugin_basename(__FILE__)));
            }
            function savePostHook($postId) {

                if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE )
                    return $postId;

                if (!wp_verify_nonce( $_POST['noname_nonce'],plugin_basename(__FILE__) ))
                    return $postId;

                if($_REQUEST['noname']){
                    if(strlen($_REQUEST['noname_name']) > 0)
                        update_post_meta ($postId, 'Kirjoittaja', $_REQUEST['noname_name']);
                    else
                        update_post_meta ($postId, 'Kirjoittaja', '&nbsp;');

                }
                else
                    delete_post_meta ($postId, 'Kirjoittaja');
            }
        }
    }
    if(!isset($noName))
        $noName = new noname();
?>