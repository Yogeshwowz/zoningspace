<style>
.alert-danger {
    color: #a94442;
    background-color: #f2dede;
    border-color: #ebccd1;
}
.alert-primary {
    color: #fff;
    background-color: #3c763d;
    border-color: #ebccd1;
}

.progress {text-align:left;margin-top:20px;display:none; position:relative; width:400px; border: 1px solid #ddd; padding: 1px; border-radius: 3px; }
.bar { background-color:#2E64FE; width:0%; height:30px; border-radius: 3px; }
.percent { position:absolute; display:inline-block; top:0px; left:48%; }
img
{
	margin-top:20px;
	width:300px;
}

</style>

<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         <i class="fa fa-users"></i> Import Management
         <small></small>
      </h1>
   </section>
   <section class="content">
    <div class="row">
         <div class="col-xs-12">
            <div class="box admin-box">
               <!-- /.box-header -->
               <div class="box-body table-responsive">
                  <div class="col-md-12 add-research-div">
				  <?php if(isset($_GET['msg']) && $_GET['msg']=='error'){?>
				<div class="alert alert-danger alert-dismissible" id="er-msg">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					 Import data not upload .Please Try again only CSV File
				  </div><?php } ?>
				<?php  
				$errorMessage = $this->session->flashdata('error'); 
				if($errorMessage){ ?>
				<div class="alert alert-danger alert-dismissible">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					 Import data not upload .Please Try again only CSV File
					</div><?php 
				}
				
				$successMessage = $this->session->flashdata('success'); 
				if($successMessage){ ?>
				<div class="alert alert-primary alert-dismissible">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					 Import data has been upload successfully.
					</div><?php 
				}
				?>
				<?php if(!empty($_POST['import']) && $_POST['import']=='1') { 
				echo $_POST['import'];
				?>
				<div class="alert alert-primary alert-dismissible" id="s-message" >
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					 Import data has been upload successfully.
				</div><?php } ?>
				<div class="alert alert-primary alert-dismissible" id="s-message" style="display:none;">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					 Import data has been upload successfully.
				</div>
					<form action="<?php echo base_url();?>administrator/import" id="myForm" name="frmupload" method="post" enctype="multipart/form-data">
					   <div class="form-group">
                           <label for="Upload">Import File:</label>
                            <input type="file" class="form-control" id="userfile" name="userfile" required >
							 <span id="out-messs">Please upload csv file only.</span>
                        </div>
                       <input  type="submit" class="btn btn-primary" name="import-submit" value="Import" onclick='upload_image(event);'>
                      
                    </form>
					<div class='progress' id="progress_div">
					<div class='bar' id='bar'></div>
					<div class='percent' id='percent'>0%</div>
					</div>
						<div id='output_image'>
						
					</div>
                  </div>
              </div>
               <!-- /.box-body -->
            </div>
            <!-- /.box -->
         </div>
    </div>
   </section>
</div>