<?php
/**
 * @author        RadiusTheme
 * @package       classified-listing/templates
 * @version       1.0.0
 *
 * @var boolean $can_add_favourites
 * @var boolean $can_report_abuse
 * @var boolean $social
 * @var integer $listing_id
 */

use Rtcl\Helpers\Functions;
use Rtcl\Helpers\Text;


if ( ! $can_add_favourites && ! $can_report_abuse && ! $social ) {
	return;
}
?>
    <ul class='list-group list-group-flush rtcl-single-listing-action'>
		<?php if ( $can_add_favourites ): ?>
            <li class="list-group-item" id="rtcl-favourites" data-bs-toggle="tooltip" data-bs-placement="top"
                data-bs-title="<?php echo esc_html( Text::add_to_favourite() ); ?>">
				<?php echo Functions::get_favourites_link( $listing_id ); ?>
            </li>
		<?php endif; ?>
		<?php if ( $can_report_abuse ): ?>
            <li class='list-group-item'>
				<?php if ( is_user_logged_in() ): ?>
                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#rtcl-report-abuse-modal">
                        <span class='rtcl-icon rtcl-icon-trash'></span>
                    </a>
				<?php else: ?>
                    <a href="javascript:void(0)" class="rtcl-require-login">
                        <span class='rtcl-icon rtcl-icon-trash'></span>
                    </a>
				<?php endif; ?>
            </li>
		<?php endif; ?>
		<?php if ( $social ): ?>
            <li class="list-group-item social-share-list" data-bs-toggle="tooltip" data-bs-placement="top"
                data-bs-trigger="hover" title="" data-bs-original-title="Share">
                <button class="listing-social-action" data-bs-toggle="modal" data-bs-target="#rtcl-social-share-modal">
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6.23656 10.1183C6.40513 9.78179 6.5 9.40197 6.5 9C6.5 8.59803 6.40513 8.21821 6.23656 7.88172M6.23656 10.1183C5.82611 10.9376 4.97874 11.5 4 11.5C2.61929 11.5 1.5 10.3807 1.5 9C1.5 7.61929 2.61929 6.5 4 6.5C4.97874 6.5 5.82611 7.06243 6.23656 7.88172M6.23656 10.1183L11.7634 12.8817M6.23656 7.88172L11.7634 5.11828M11.7634 5.11828C12.1739 5.93757 13.0213 6.5 14 6.5C15.3807 6.5 16.5 5.38071 16.5 4C16.5 2.61929 15.3807 1.5 14 1.5C12.6193 1.5 11.5 2.61929 11.5 4C11.5 4.40197 11.5949 4.78179 11.7634 5.11828ZM11.7634 12.8817C11.5949 13.2182 11.5 13.598 11.5 14C11.5 15.3807 12.6193 16.5 14 16.5C15.3807 16.5 16.5 15.3807 16.5 14C16.5 12.6193 15.3807 11.5 14 11.5C13.0213 11.5 12.1739 12.0624 11.7634 12.8817Z"
                              stroke="#FF3C48" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </button>
            </li>
		<?php endif; ?>
    </ul>

<?php if ( $social ): ?>
    <!-- Social Share Modal -->
    <div class="modal fade rtcl-social-share-modal" id="rtcl-social-share-modal" tabindex="-1" role="dialog"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"
                        id="rtcl-social-share-modal-label"><?php esc_html_e( 'Share This Link Via', 'cl-classified' ); ?></h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="share-icon">
						<?php echo wp_kses_post( $social ); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php if ( $can_report_abuse ) { ?>
    <!-- Social Share Modal -->
    <div class="modal fade rtcl-bs-modal" id="rtcl-report-abuse-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="rtcl-report-abuse-form" class="form-vertical">
                    <div class="modal-header">
                        <h5 class="modal-title"
                            id="rtcl-report-abuse-modal-label"><?php esc_html_e( 'Report Abuse', 'cl-classified' ); ?></h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label
                                    for="rtcl-report-abuse-message"><?php esc_html_e( 'Your Complaint', 'cl-classified' ); ?>
                                <span class="rtcl-star">*</span></label>
                            <textarea name="message" class="form-control" id="rtcl-report-abuse-message" rows="3"
                                      placeholder="<?php esc_attr_e( 'Message... ', 'cl-classified' ); ?>"
                                      required></textarea>
                        </div>
                        <div id="rtcl-report-abuse-g-recaptcha"></div>
                        <div id="rtcl-report-abuse-message-display"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit"
                                class="btn btn-primary"><?php esc_html_e( 'Submit', 'cl-classified' ); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>