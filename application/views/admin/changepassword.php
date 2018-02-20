<div id="page-wrapper">
            <div class="row">
			     <?php 
					if($this->session->flashdata('msg')!='')
					{ 
					?>
					  <div class="alert alert-success" id="mydiv" style="margin-top:5px;">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<p>	<i class="icon fa fa-check"></i><?php echo $this->session->flashdata('msg') ?></p>
					   
					  </div>
				<?php } ?>
                <?php 
					if($this->session->flashdata('error')!='')
					{ 
					?>
					  <div class="alert alert-danger alert-dismissable" id="mydiv" style="margin-top:5px;">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<p>	<i class="icon"></i><?php echo $this->session->flashdata('error') ?></p>
					   
					  </div>
				<?php } ?>				
                <div class="col-lg-12">
                    <h1 class="page-header">Change Password</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Basic Change Password Elements
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" action="<?php echo site_url('admin/change_password');?>" name="frmChange" method="post" action="" onSubmit="return validatePassword()">
									  <div class="col-md-6">
									  <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Current Password</label>
                                            <input type="password" class="form-control" name="currentPassword"placeholder="Current Password" class="txtField" >
                                           <span id="currentPassword"  class="required">
                                        </div>
                                       
									   
                                        <div class="form-group">
                                            <label>New Password</label>
                                            <input type="password" class="form-control" name="newPassword"  placeholder="New Password" class="txtField"><span id="newPassword" class="required"></span>
                                        </div>
										
										<div class="form-group">
                                            <label>Confirm Password</label>
                                            <input type="password" class="form-control" name="confirmPassword"  placeholder="Confirm Password" class="txtField"><span id="confirmPassword" class="required"></span>
                                        </div>
										<button type="submit" name="c_pass" class="btn btn-default">Update</button>
                                       </div>
									   
									 </div>
									 
									 
									 
									 
									 
                                        
                                        
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
<script>
function validatePassword() {
	//alert("sanjeev"); exit();
var currentPassword,newPassword,confirmPassword,output = true;
currentPassword = document.frmChange.currentPassword;
//alert('currentPassword'); exit();
newPassword = document.frmChange.newPassword;
confirmPassword = document.frmChange.confirmPassword;

if(!currentPassword.value) {
	currentPassword.focus();
	document.getElementById("currentPassword").innerHTML = "required";
	output = false;
}
else if(!newPassword.value) {
	newPassword.focus();
	document.getElementById("newPassword").innerHTML = "required";
	output = false;
}
else if(!confirmPassword.value) {
	confirmPassword.focus();
	document.getElementById("confirmPassword").innerHTML = "required";
	output = false;
}
if(newPassword.value != confirmPassword.value) {
	newPassword.value="";
	confirmPassword.value="";
	newPassword.focus();
	document.getElementById("confirmPassword").innerHTML = "Password and confirm password does not match";
	output = false;
}
	
return output;
}
</script>	
<style>

.required {
color: #FF0000;
font-size:20px;
font-weight:italic;

}

</style>