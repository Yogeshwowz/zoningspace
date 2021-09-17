<footer class="main-footer">
<div class="pull-right hidden-xs">
<b>RealEstate</b> Admin System
</div>
<strong>Copyright &copy; 2020 <a href="<?php echo base_url(); ?>">RealEstate</a>.</strong> All rights reserved.
</footer>
<script src="<?php echo base_url(); ?>assets/admin/bower_components/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript">
        var baseURL = "<?php echo base_url(); ?>";
    </script>
<script src="<?php echo base_url(); ?>assets/admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!--<script src="<?php //echo base_url(); ?>assets/admin/dist/js/adminlte.min.js" type="text/javascript"></script>-->
 <script src="<?php echo base_url(); ?>assets/mysql/sweetalert.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/js/common.js" type="text/javascript"></script>
<link href="<?php echo base_url(); ?>assets/mysql/loading.css" rel="stylesheet">
<script src="<?php echo base_url(); ?>assets/mysql/loading.js" defer></script>
<script src="https://code.jquery.com/jquery-3.3.1.js" type="text/javascript"></script>
<?php $urlLink= explode('/',$_SERVER['REQUEST_URI']); 
	if(in_array('users',$urlLink) || in_array('visit-user',$urlLink) || in_array('buysearch',$urlLink)) { ?>
			<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" type="text/javascript"></script>
			<link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
			<script>
				$(document).ready(function() {
				$('#example').DataTable( {
					"order": [],
					"pageLength": 25
				} );
			} );
			</script><?php 
	}
	if(in_array('import',$urlLink)) { ?>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/custom-js/progress-bar-jquery.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/custom-js/progress-bar-jquery.form.js"></script>
		<script>
		function upload_image() {
			
			var filename = $("#userfile").val();
			var extension = filename.replace(/^.*\./, '');
			if (extension == filename) {W
				extension = '';
			} else {
				  extension = extension.toLowerCase();
			}
		if(extension=='csv'){
			var bar = $('#bar');
				var percent = $('#percent');
				
				$('#myForm').ajaxForm({
					beforeSubmit: function() {
						document.getElementById("progress_div").style.display="block";
						var percentVal = '0%';
						bar.width(percentVal)
						percent.html(percentVal);
					},
					uploadProgress: function(event, position, total, percentComplete) {
						var percentVal = percentComplete + '%';
						bar.width(percentVal)
						percent.html(percentVal);
					},
					success: function() {
						var percentVal = '100%';
						bar.width(percentVal)
						percent.html(percentVal);
					},
					complete: function(xhr) {
						if(xhr.responseText){
						$('#s-message').show();
						//var responseText = "Your data";
							
							
						}
					}
				}); 
		
		
		}else{
		//window.location.replace("http://www.w3schools.com");
			 var pageURL = $(location).attr("href");
			//
			document.getElementById("myForm").action = pageURL+'?msg=error';
			return false;
			
		}
		
				
			}
		</script>
<?php } ?>
</body>
</html>