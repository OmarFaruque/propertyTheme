<?php 
/*
* Page Sidebar
*/
?>


<?php if ( is_active_sidebar( 'page_sidebar' ) ) : ?>
	<div class="singleSidebar mb15 bg-white p15p">
		<?php dynamic_sidebar( 'page_sidebar' ); ?>
	</div>
<?php endif; ?>
<div class="singleSidebar bg-white p15p">
	<h4 class="colr-blue">Media contacts</h4>
	<p>Corporate Communications:</p>
	<div class="media-contacts">
		<div class="record pobox">
			<div class="lbl">PO Box:</div>
			<div class="value">House # B/113, Mosque Road, New DOHS, Mohakhali, Dhaka-1206.</div>
		</div>
		<div class="record phone">
			<div class="lbl">TELEPHONE</div>
			<div class="value">+88 02 9880152</div>
		</div>
		<div class="record fax">
			<div class="lbl">FAX</div>
			<div class="value">+88 02 9898556</div>
		</div>
		<div class="record email">
			<div class="lbl">E-MAIL</div>
			<div class="value truncate"><a href="mailto:info@abmrealestate.com.bd" title="Send email to info@abmrealestate.com.bd">info@abmrealestate.com.bd</a></div>
		</div>
	</div>
</div>

<div class="enquire mt15">
	<?= do_shortcode( '[contact-form-7 id="162" title="Enquiry"]' );  ?>
</div>