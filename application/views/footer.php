	<!-- start footer -->

	<div class="page-footer">

		<div class="page-footer-inner"> 2022 &copy; Developed by

			<a href="mailto:mefi2548@gmail.com" target="_top" class="makerCss">ME-FI.COM</a>

		</div>

		<div class="scroll-to-top">

			<i class="icon-arrow-up"></i>

		</div>

	</div>

	<!-- end footer -->



	<!-- end page container -->

</div>

<!-- end  page-wrapper -->
<!-- start js include path -->


	<!-- start js include path -->     

	<script src="<?php echo base_url('assets/plugins/jquery/jquery.min.js') ?>"></script>

	<script src="<?php echo base_url('assets/plugins/popper/popper.min.js') ?>"></script>

	<script src="<?php echo base_url('assets/plugins/jquery-blockui/jquery.blockui.min.js') ?>"></script>

	<script src="<?php echo base_url('assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js') ?>"></script>

	<!-- bootstrap -->

	<script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.min.js') ?>"></script>

	<script src="<?php echo base_url('assets/plugins/sparkline/jquery.sparkline.min.js') ?>"></script>

	<script src="<?php echo base_url('assets/js/pages/sparkline/sparkline-data.js') ?>"></script>

	<!-- Common js-->

	<script src="<?php echo base_url('assets/js/app.js') ?>"></script>

	<script src="<?php echo base_url('assets/js/layout.js') ?>"></script>

	<script src="<?php echo base_url('assets/js/theme-color.js') ?>"></script>

	<!-- material -->

	<script src="<?php echo base_url('assets/plugins/material/material.min.js') ?>"></script>


	<!-- animation -->

	<script src="<?php echo base_url('assets/js/pages/ui/animations.js') ?>"></script>

	<!-- morris chart -->
 <?php /*?>
	<script src="<?php echo base_url('assets/plugins/morris/morris.min.js') ?>"></script>

	<script src="<?php echo base_url('assets/plugins/morris/raphael-min.js') ?>"></script>

	<script src="<?php echo base_url('assets/js/pages/chart/morris/morris_home_data.js') ?>"></script>
 <?php */ ?>
	<!-- end js include path -->





    <!-- bootstrap -->    

    <script src="<?php echo base_url('assets/plugins/bootstrap-inputmask/bootstrap-inputmask.min.js') ?>"></script>

    <script src="<?php echo base_url('assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js') ?>"></script>

    <script src="<?php echo base_url('assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker-init.js') ?>"></script>

    <script src="<?php echo base_url('assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js') ?>"></script>

    <script src="<?php echo base_url('assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker-init.js') ?>"></script>

 

    <!-- dropzone -->

    <script src="<?php echo base_url('assets/plugins/dropzone/dropzone.js') ?>"></script>

    <!--tags input-->

    <script src="<?php echo base_url('assets/plugins/jquery-tags-input/jquery-tags-input.js') ?>"></script>

    <script src="<?php echo base_url('assets/plugins/jquery-tags-input/jquery-tags-input-init.js') ?>"></script>

    <!--select2-->

    <script src="<?php echo base_url('assets/plugins/select2/js/select2.js') ?>"></script>

    <script src="<?php echo base_url('assets/js/pages/select2/select2-init.js') ?>"></script>

    <!-- end js include path -->





    <!-- data tables -->

    <script src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.min.js') ?>"></script>

    <script src="<?php echo base_url('assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.js') ?>"></script>

    <script src="<?php echo base_url('assets/js/pages/table/table_data.js') ?>"></script>


    <script src="<?php echo base_url('assets/js/autoNumeric-1.9.41.js') ?>"></script>


  <!--thai date-->
<script type="text/javascript" src="<?php echo base_url('assets/bootstrap-datepicker/js/bootstrap-datepicker.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/bootstrap-datepicker/js/bootstrap-datepicker-thai.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/bootstrap-datepicker/js/locales/bootstrap-datepicker.th.js')?>"> </script>
<script>
	//-----------------------------------------------	
	 function isNumberKey(evt)
       {
          var charCode = (evt.which) ? evt.which : evt.keyCode;
          if (charCode != 46 && charCode > 31 
            && (charCode < 48 || charCode > 57))
             return false;

          return true;
       }
	//-----------------------------------------------	
	$(function($) {

		$('.autonumber').autoNumeric('init');
		
	 });
	//-----------------------------------------------	

	function validate(evt) {

	  var theEvent = evt || window.event;



	  // Handle paste

	  if (theEvent.type === 'paste') {

		  key = event.clipboardData.getData('text/plain');

	  } else {

	  // Handle key press

		  var key = theEvent.keyCode || theEvent.which;

		  key = String.fromCharCode(key);

	  }

	  var regex = /[0-9]|\./;

	  if( !regex.test(key) ) {

		theEvent.returnValue = false;

		if(theEvent.preventDefault) theEvent.preventDefault();

	  }

	}

</script>

