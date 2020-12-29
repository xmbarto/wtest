<h1>Barto Template Options</h1>
<?php 
    settings_errors();

    $firstName = esc_attr( get_option( 'first_name' ) ) ;
    $lastName = esc_attr( get_option( 'last_name' ) ) ;
    $fullName = $firstName . ' ' . $lastName;
    $userDescription = esc_attr( get_option( 'user_description') );
?>

<div class="mxbarto-sidebar-wrapper">
    <div class="mxbarto-sidebar-form">
        <form action="options.php" method="post">
            <?php settings_fields( 'mxbarto-settings-group' ); ?>
            <?php do_settings_sections( 'mxbarto' ); ?>
            <?php submit_button();?>
        </form>
    </div>    
    <div class="mxbarto-sidebar-preview">
        <div class="mxbarto-sidebar">
            <h1 class="mxbarto-username"><?php print $fullName; ?></h1>
            <h2 class="mxbarto-description"><?php print $userDescription; ?></h2>
            <div class="mxbarto-icon-wrapper">
                <ul>
                    <li class="mxbarto-twitter"></li>
                    <li class="mxbarto-facebook"></li>
                    <li class='mxbarto-instagram'></li>
                </ul>
            </div>
        </div>
    </div>
</div>    
