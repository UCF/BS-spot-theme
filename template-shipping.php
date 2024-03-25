<?php /* Template Name: Shipping */ ?>

<?php get_header(); ?>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<main class="general">

			<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
			<section class="page-header" style="background: url(<?php echo $thumb[0]; ?>) no-repeat center center; background-size: cover;">

				<div class="overlay"></div>
					
				<div class="container">
					<p><?php the_title(); ?></p>
					<?php if ( get_field( 'header_sub_line' ) )  { ?>
						<div class="sub-line"><?php the_field( 'header_sub_line' ); ?></div>
					<?php } ?>
				</div>

			</section>
			
			<?php if ( get_field( 'exclamation_description' ) ) { ?>

				<section class="purple-section">

					<div class="container m-900">
						<div class="exclamation"><?php the_field( 'exclamation_description' ); ?></div>
					</div>
					
				</section>

			<?php } ?>

			<section class="hide-this white-section alternate-padding-2">

				<div class="container smaller">
					
					<?php if ( get_field( 'cta_title' ) ) { ?>
						<div class="center-heading formatted">
							<h1><?php the_field( 'cta_title' ); ?></h1>
						</div>
					<?php } ?>

					<div class="inner-cta-wrap">
						
						<?php if ( get_field( 'cta_left_side' ) ) { ?>

							<div class="left-side">
								
								<div class="personal-wrap">

									<?php the_field( 'cta_left_side' ); ?>

								</div>

							</div>

						<?php } ?>

						<?php if ( get_field( 'cta_right_side' ) ) { ?>

							<div class="right-side">

								<div class="department-wrap">

									<?php the_field( 'cta_right_side' ); ?>

								</div>

							</div>

						<?php } ?>

						<div class="clear"></div>

					</div>

				</div>
				
				<?php if ( get_field( 'ship_package_description' ) ) { ?>

					<div class="container smaller ship-package">

						<?php the_field( 'ship_package_description' ); ?>

						<div class="btn-row">
							<a href="#" id="showForm" class="btn green-btn wide">Ship My Package</a>
						</div>

					</div>

				<?php } ?>

			</section>

			<section class="white-section form-section no-padding hide shipping-form">
				
				<div class="container smaller">

					<?php gravity_form( 4, false, true, false, null, true, null ); ?>

				</div>

			</section>

		</main>

		<?php /* <script type="text/javascript">
			jQuery(document).ready( function($) {

				$(document).on( "gform_confirmation_loaded", function (e, form_id) {
					Clickheretoprint();
				});

				function Clickheretoprint() { 
					var disp_setting = "toolbar=yes,location=no,directories=yes,menubar=yes,"; 
						disp_setting += "scrollbars=yes,width=650, height=600, left=100, top=25";
					 
					var docprint = window.open( "", "", disp_setting ); 
					    docprint.document.open(); 
					    docprint.document.write('<html><head><title>Print Shipping Request</title>'); 
					    docprint.document.write('</head><body onLoad="self.print()">'); 

					    var shipForm = $( '#gform_4' );
					    	formVals = shipForm.serializeArray();

					    //console.log( formVals );


					    //Ship To Table
					    docprint.document.write( '<table>' );

					    	docprint.document.write( '<thead>' );
					    		docprint.document.write( '<tr>' );
					    			docprint.document.write( '<td><strong>Ship To</strong></td>' );
					    		docprint.document.write( '</tr>' );
					    	docprint.document.write( '</thead>' );	

					    	docprint.document.write( '<tbody>' );

					    		docprint.document.write( '<tr>' );

					    			docprint.document.write( '<td>' );
					    			docprint.document.write( 'Recipient Name:' );
					    			docprint.document.write( '</td>' );

					    			docprint.document.write( '<td>' );
					    				docprint.document.write( shipForm.find( '#input_4_45_3' ).val() + ' ' + shipForm.find( '#input_4_45_6' ).val() );
					    			docprint.document.write( '</td>' );

					    		docprint.document.write( '</tr>' );

					    		docprint.document.write( '<tr>' );

					    			docprint.document.write( '<td>' );
					    			docprint.document.write( 'Recipient Organization:' );
					    			docprint.document.write( '</td>' );

					    			docprint.document.write( '<td>' );
					    				docprint.document.write( shipForm.find( '#input_4_21' ).val() );
					    			docprint.document.write( '</td>' );

					    		docprint.document.write( '</tr>' );

					    		docprint.document.write( '<tr>' );

					    			docprint.document.write( '<td>' );
					    			docprint.document.write( 'Street Address:' );
					    			docprint.document.write( '</td>' );

					    			docprint.document.write( '<td>' );
					    				docprint.document.write( shipForm.find( '#input_4_22' ).val() + ' ' + shipForm.find( '#input_4_23' ).val() );
					    			docprint.document.write( '</td>' );

					    		docprint.document.write( '</tr>' );

					    		docprint.document.write( '<tr>' );

					    			docprint.document.write( '<td>' );
					    			docprint.document.write( 'City, State, Zip:' );
					    			docprint.document.write( '</td>' );

					    			docprint.document.write( '<td>' );
					    				docprint.document.write( shipForm.find( '#input_4_24' ).val() + ', ' + shipForm.find( '#input_4_50' ).val() + ' ' + shipForm.find( '#input_4_26' ).val() );
					    			docprint.document.write( '</td>' );

					    		docprint.document.write( '</tr>' );

					    		docprint.document.write( '<tr>' );

					    			docprint.document.write( '<td>' );
					    			docprint.document.write( 'Recipient Phone:' );
					    			docprint.document.write( '</td>' );

					    			docprint.document.write( '<td>' );
					    				docprint.document.write( shipForm.find( '#input_4_33' ).val() );
					    			docprint.document.write( '</td>' );

					    		docprint.document.write( '</tr>' );

					    	docprint.document.write( '</tbody>' );

					    docprint.document.write( '</table><br /><br />' );

					    //UCF Department / Customer Information
					    docprint.document.write( '<table>' );

					    	docprint.document.write( '<thead>' );
					    		docprint.document.write( '<tr>' );
					    			docprint.document.write( '<td><strong>UCF Department / Customer Information</strong></td>' );
					    		docprint.document.write( '</tr>' );
					    	docprint.document.write( '</thead>' );	

					    	docprint.document.write( '<tbody>' );

					    		docprint.document.write( '<tr>' );

					    			docprint.document.write( '<td>' );
					    				docprint.document.write( 'Payer:' );
					    			docprint.document.write( '</td>' );

					    			docprint.document.write( '<td>' );
					    				docprint.document.write( shipForm.find( 'input[name="input_29"]' ).val() );
					    			docprint.document.write( '</td>' );

					    		docprint.document.write( '</tr>' );

					    		docprint.document.write( '<tr>' );

					    			docprint.document.write( '<td>' );
					    				docprint.document.write( 'Department/Company Name:' );
					    			docprint.document.write( '</td>' );

					    			docprint.document.write( '<td>' );
					    				docprint.document.write( shipForm.find( '#input_4_21' ).val() );
					    			docprint.document.write( '</td>' );

					    		docprint.document.write( '</tr>' );

					    		docprint.document.write( '<tr>' );

					    			docprint.document.write( '<td>' );
					    			docprint.document.write( 'Contact Name:' );
					    			docprint.document.write( '</td>' );

					    			docprint.document.write( '<td>' );
					    				docprint.document.write( shipForm.find( '#input_4_52_3' ).val() + ' ' + shipForm.find( '#input_4_52_6' ).val() );
					    			docprint.document.write( '</td>' );

					    		docprint.document.write( '</tr>' );

					    		docprint.document.write( '<tr>' );

					    			docprint.document.write( '<td>' );
					    				docprint.document.write( 'Contact Phone Number:' );
					    			docprint.document.write( '</td>' );

					    			docprint.document.write( '<td>' );
					    				docprint.document.write( shipForm.find( '#input_4_15' ).val() );
					    			docprint.document.write( '</td>' );

					    		docprint.document.write( '</tr>' );

					    		docprint.document.write( '<tr>' );

					    			docprint.document.write( '<td>' );
					    				docprint.document.write( 'Email:' );
					    			docprint.document.write( '</td>' );

					    			docprint.document.write( '<td>' );
					    				docprint.document.write( shipForm.find( '#input_4_54' ).val() );
					    			docprint.document.write( '</td>' );

					    		docprint.document.write( '</tr>' );

					    		docprint.document.write( '<tr>' );

					    			docprint.document.write( '<td>' );
					    				docprint.document.write( 'Shipped on Behalf of:' );
					    			docprint.document.write( '</td>' );

					    			docprint.document.write( '<td>' );
					    				docprint.document.write( shipForm.find( '#input_4_18' ).val() );
					    			docprint.document.write( '</td>' );

					    		docprint.document.write( '</tr>' );

					    	docprint.document.write( '</tbody>' );

					    docprint.document.write( '</table><br /><br />' );

					    //Delivery To
					    docprint.document.write( '<table>' );

					    	docprint.document.write( '<thead>' );
					    		docprint.document.write( '<tr>' );
					    			docprint.document.write( '<td><strong>Delivery To</strong></td>' );
					    		docprint.document.write( '</tr>' );
					    	docprint.document.write( '</thead>' );	

					    	docprint.document.write( '<tbody>' );

					    		docprint.document.write( '<tr>' );

					    			docprint.document.write( '<td>' );
					    				docprint.document.write( 'Building Type:' );
					    			docprint.document.write( '</td>' );

					    			docprint.document.write( '<td>' );
					    				docprint.document.write( shipForm.find( 'input[name="input_28"]' ).val() );
					    			docprint.document.write( '</td>' );

					    		docprint.document.write( '</tr>' );

					    		docprint.document.write( '<tr>' );

					    			docprint.document.write( '<td>' );
					    				docprint.document.write( 'Destination Type:' );
					    			docprint.document.write( '</td>' );

					    			docprint.document.write( '<td>' );
					    				docprint.document.write( shipForm.find( 'input[name="input_20"]' ).val() );
					    			docprint.document.write( '</td>' );

					    		docprint.document.write( '</tr>' );

					    	docprint.document.write( '</tbody>' );

					    docprint.document.write( '</table><br /><br />' );

					    //Service Type
					    docprint.document.write( '<table>' );

					    	docprint.document.write( '<thead>' );
					    		docprint.document.write( '<tr>' );
					    			docprint.document.write( '<td><strong>Service Type</strong></td>' );
					    		docprint.document.write( '</tr>' );
					    	docprint.document.write( '</thead>' );	

					    	docprint.document.write( '<tbody>' );

					    		docprint.document.write( '<tr>' );

					    			docprint.document.write( '<td>' );
					    				docprint.document.write( 'Carrier Type' );
					    			docprint.document.write( '</td>' );

					    			docprint.document.write( '<td>' );
					    				docprint.document.write( shipForm.find( 'input[name="input_60"]' ).val() );
					    			docprint.document.write( '</td>' );

					    		docprint.document.write( '</tr>' );

					    		docprint.document.write( '<tr>' );

					    			docprint.document.write( '<td>' );
					    				docprint.document.write( 'Service Type:' );
					    			docprint.document.write( '</td>' );

					    			docprint.document.write( '<td>' );
					    				docprint.document.write( shipForm.find( 'select[name="input_3"]' ).val() );
					    			docprint.document.write( '</td>' );

					    		docprint.document.write( '</tr>' );

					    		docprint.document.write( '<tr>' );

					    			docprint.document.write( '<td>' );
					    				docprint.document.write( 'Signature Required:' );
					    			docprint.document.write( '</td>' );

					    			docprint.document.write( '<td>' );
					    				docprint.document.write( shipForm.find( 'input[name="input_4"]' ).val() );
					    			docprint.document.write( '</td>' );

					    		docprint.document.write( '</tr>' );

					    		docprint.document.write( '<tr>' );

					    			docprint.document.write( '<td>' );
					    				docprint.document.write( 'Insurance Request, Amount:' );
					    			docprint.document.write( '</td>' );

					    			if ( shipForm.find( 'input[name="input_5"]' ).val() == 'Yes' ) {
						    			docprint.document.write( '<td>' );
						    				docprint.document.write( shipForm.find( 'input[name="input_58"]' ).val() );
						    			docprint.document.write( '</td>' );
						    		} else {
						    			docprint.document.write( '<td>' );
						    				docprint.document.write( shipForm.find( 'input[name="input_5"]' ).val() );
						    			docprint.document.write( '</td>' );
						    		}

					    		docprint.document.write( '</tr>' );

					    	docprint.document.write( '</tbody>' );

					    docprint.document.write( '</table><br /><br />' );

					    //Hazardous Materials
					    docprint.document.write( '<table>' );

					    	docprint.document.write( '<thead>' );
					    		docprint.document.write( '<tr>' );
					    			docprint.document.write( '<td><strong>Hazardous Materials</strong></td>' );
					    		docprint.document.write( '</tr>' );
					    	docprint.document.write( '</thead>' );	

					    	docprint.document.write( '<tbody>' );

					    		docprint.document.write( '<tr>' );

					    			docprint.document.write( '<td>' );
					    				docprint.document.write( 'Hazardous Materials:' );
					    			docprint.document.write( '</td>' );

					    			docprint.document.write( '<td>' );
					    				docprint.document.write( 'No' );
					    			docprint.document.write( '</td>' );

					    		docprint.document.write( '</tr>' );

					    		docprint.document.write( '<tr>' );

					    			docprint.document.write( '<td>' );
					    				docprint.document.write( 'Dry Ice:' );
					    			docprint.document.write( '</td>' );

					    			docprint.document.write( '<td>' );
					    				docprint.document.write( shipForm.find( 'input[name="input_8"]' ).val() );
					    			docprint.document.write( '</td>' );

					    		docprint.document.write( '</tr>' );

					    		if ( shipForm.find( 'input[name="input_8"]' ).val() == 'Yes' ) {
					    			docprint.document.write( '<tr>' );
					    				docprint.document.write( '<td>' );
					    					docprint.document.write( 'Weight Of Dry Ice (Lbs):' );
					    				docprint.document.write( '</td>' )
						    			docprint.document.write( '<td>' );
						    				docprint.document.write( shipForm.find( 'input[name="input_55"]' ).val() );
						    			docprint.document.write( '</td>' );
						    		docprint.document.write( '</tr>' );
					    		}

					    	docprint.document.write( '</tbody>' );

					    docprint.document.write( '</table><br /><br />' );

					    //Hazardous Materials Certifications
					    docprint.document.write( '<table>' );

					    	docprint.document.write( '<thead>' );
					    		docprint.document.write( '<tr>' );
					    			docprint.document.write( '<td><strong>Shipper\'s Certification For Hazardous Material</strong></td>' );
					    		docprint.document.write( '</tr>' );
					    	docprint.document.write( '</thead>' );	

					    	docprint.document.write( '<tbody>' );

					    		docprint.document.write( '<tr>' );

					    			docprint.document.write( '<td><p>This is to certify that the above named materials are properly classified, describerd, packaged, marked and labeled, and are in proper condition for transporting according to applicable regulations of the federal department of transportation.</p></td>' );

					    		docprint.document.write( '</tr>' );

					    	docprint.document.write( '</tbody>' );

					    docprint.document.write( '</table><br /><br />' );

					    //Signature
					    docprint.document.write( '<table>' );

					    	docprint.document.write( '<thead>' );
					    		docprint.document.write( '<tr>' );
					    			docprint.document.write( '<td><strong>Signature</strong></td>' );
					    		docprint.document.write( '</tr>' );
					    	docprint.document.write( '</thead>' );	

					    	docprint.document.write( '<tbody>' );

					    		docprint.document.write( '<tr>' );

					    			docprint.document.write( '<td colspan="2"><p>The SPOT is not responsible for lost or damaged packages caused by carrier or packing error. We do not pick-up 3rd party billing packages. However, you may drop them off at The SPOT.</p></td>' );

					    		docprint.document.write( '</tr>' );

					    		docprint.document.write( '<tr>' );

					    			docprint.document.write( '<td>' );
					    				docprint.document.write( 'Authorized Approval:' );
					    			docprint.document.write( '</td>' );

					    		docprint.document.write( '</tr>' );

					    		docprint.document.write( '<tr>' );

					    			docprint.document.write( '<td>' );
					    				docprint.document.write( '__________________________________________________________' );
					    			docprint.document.write( '</td>' );

					    		docprint.document.write( '</tr>' );

					    		docprint.document.write( '<tr>' );

					    			docprint.document.write( '<td>' );
					    				docprint.document.write( 'Date:' );
					    			docprint.document.write( '</td>' );

					    		docprint.document.write( '</tr>' );

					    		docprint.document.write( '<tr>' );

					    			docprint.document.write( '<td>' );
					    				docprint.document.write( '__________________________________________________________' );
					    			docprint.document.write( '</td>' );

					    		docprint.document.write( '</tr>' );

					    	docprint.document.write( '</tbody>' );

					    docprint.document.write( '</table>' );

					    docprint.document.write('</body></html>'); 
					    docprint.document.close(); 
					    docprint.focus(); 
				}

			});
		</script> */ ?>

	<?php endwhile; endif; ?>

<?php get_footer(); ?>