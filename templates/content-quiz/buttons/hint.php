<?php
/**
 * Template for displaying Hint button.
 *
 * @author  ThimPress
 * @package LearnPress/Templates
 * @version 3.x.x
 */

defined( 'ABSPATH' ) or die();
$quiz        = LP_Global::course_item_quiz();
$question    = LP_Global::quiz_question();
$user        = LP_Global::user();
$hinted      = $user->has_hinted_answer( $question->get_id(), $quiz->get_id(), get_the_ID() );
$button_text = $hinted ? __( 'Hinted', 'learnpress' ) : __( 'Hint', 'learnpress' );
?>

<?php do_action( 'learn-press/quiz/before-question-hint-button' ); ?>

    <form name="question-hint" class="question-hint form-button lp-form" method="post" enctype="multipart/form-data"
          @submit="showHint">

		<?php do_action( 'learn-press/quiz/begin-question-hint-button' ); ?>

		<?php if ( 0 > $quiz->get_show_hint() ) { ?>

            <button type="submit" <?php disabled( $checked ); ?>><?php echo $button_text; ?></button>

		<?php } else { ?>

            <button class="button-hint-question"
                    type="submit"
                    data-counter="<?php echo $user->can_hint_answer( $quiz->get_id() ); ?>"
				<?php disabled( $hinted ); ?>><?php echo $button_text; ?></button>
            <input type="hidden" name="noajax" value="yes">
		<?php } ?>

		<?php do_action( 'learn-press/quiz/end-question-hint-button' ); ?>

		<?php LP_Nonce_Helper::quiz_action( 'show-hint', $quiz->get_id(), get_the_ID(), true ); ?>
        <input type="hidden" name="question-id" value="<?php echo $question->get_id(); ?>">
    </form>

<?php do_action( 'learn-press/quiz/after-question-hint-button' ); ?>