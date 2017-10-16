<section class="newsletter-survey">

	<div class="right-side">
		<div class="outer">
			<div class="inner">
				<div class="inner-wrap text-left">
					<div class="cta-title"><?php echo get_option( 'survey_cta_title', '' ); ?></div>
					<div class="description">
						<p><?php echo get_option( 'survey_cta_description', '' ); ?></p>
					</div>
					<a href="<?php echo get_permalink( 44 ); ?>" class="btn green-btn">Take Our Survey</a>
				</div>
			</div>
		</div>
	</div>

	<div class="clear"></div>

</section>

<script type="text/javascript">

	jQuery(document).ready(function($) {
		var newsletterSignup = $( '#newsletterSignup' ),
			newsletterTitle = newsletterSignup.parent().find( '.cta-title' ),
			newsletterDescription = newsletterSignup.parent().find( '.description' ),
			confirmMsgWrap = $( '.gform_confirmation_message' );

		newsletterSignup.on( 'submit', function(e) {
			e.preventDefault();

			$.ajax({
				url: SPRY.ajaxurl,
				type: 'POST',
				data: newsletterSignup.serialize(),
				success: function( result ) {
					var data = JSON.parse( result );
					newsletterSignup.find( 'input' ).removeClass( 'error' );

					if ( data.fields ) {
						newsletterSignup.find( 'input' ).addClass( 'error' );
					} else {
						newsletterSignup.add( newsletterTitle ).add( newsletterDescription ).fadeOut( 500, function() {
							confirmMsgWrap.hide().removeClass( 'hide' ).fadeIn( 500 );
						} );
					}

				}
			});

		} );

	});

</script>