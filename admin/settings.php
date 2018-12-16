<?php
// create custom plugin settings menu
add_action('admin_menu', 'crafty_theme_menu');

function crafty_theme_menu() {

	//create new top-level menu
	add_menu_page('Crafty Theme Options', 'Crafty Settings', 'administrator', __FILE__, 'crafty_theme_settings_page' , plugins_url('/images/icon.png', __FILE__) );

	//call register settings function
	add_action( 'admin_init', 'register_crafty_settings' );
}


function register_crafty_settings() {
	//register our settings
	register_setting( 'crafty-settings-group', 'instagram_social_link' );
	register_setting( 'crafty-settings-group', 'linkedin_social_link' );
	register_setting( 'crafty-settings-group', 'github_social_link' );
}

function crafty_theme_settings_page() {
?>
<div class="wrap">
<h1>Crafty Theme Options</h1>

<form method="post" action="options.php">
    <?php settings_fields( 'crafty-settings-group' ); ?>
    <?php do_settings_sections( 'crafty-settings-group' ); ?>
    <table class="form-table">
        <tr valign="top">
        <h2>Social Icons</h2>
        <th scope="row">Instagram Url</th>
        <td><input type="text" name="instagram_social_link" value="<?php echo esc_attr( get_option('instagram_social_link') ); ?>" /></td>
        </tr>
         
        <tr valign="top">
        <th scope="row">LinkedIN Url</th>
        <td><input type="text" name="linkedin_social_link" value="<?php echo esc_attr( get_option('linkedin_social_link') ); ?>" /></td>
        </tr>
        
        <tr valign="top">
        <th scope="row">Github Url</th>
        <td><input type="text" name="github_social_link" value="<?php echo esc_attr( get_option('github_social_link') ); ?>" /></td>
        </tr>
    </table>
    
    <?php submit_button(); ?>

</form>
</div>
<?php } ?>