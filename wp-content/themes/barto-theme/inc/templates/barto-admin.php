<h1>Barto Template Options</h1>
<?php settings_errors(); ?>
<form action="options.php" method="post">
    <?php settings_fields( 'mxbarto-settings-group' ); ?>
    <?php do_settings_sections( 'mxbarto' ); ?>
    <?php submit_button();?>
</form>

