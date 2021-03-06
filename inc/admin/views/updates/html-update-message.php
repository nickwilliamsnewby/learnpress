<?php
/**
 * Template for displaying update message
 *
 * @version 3.0.0
 */

defined( 'ABSPATH' ) or exit;
?>
<div class="notice notice-warning lp-notice-update-database">
    <p>
		<?php _e( '<strong>LearnPress update</strong> – We need to update your database to the latest version.', 'learnpress' ); ?>
    </p>
    <p>
        <a class="button button-primary"
           href="<?php echo esc_url( untrailingslashit( admin_url( 'index.php?page=lp-database-updater&redirect=' . urlencode( learn_press_get_current_url() ) ) ) ); ?>"><?php _e( 'Update Now', 'learnpress' ); ?></a>
    </p>
</div>