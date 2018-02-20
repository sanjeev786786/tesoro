<?php //print_r($edit_client);?>
<div id="page-wrapper">
            <div class="row">
			<div class="col-lg-12">
                    <h1 class="page-header">ADD CLIENT</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           CLIENT
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
								 <?php $actiontype = isset($_GET['edit_id'])? 'update_client' : 'add_client' ?>
                                    <form role="form" action="<?php echo site_url('admin/'.$actiontype)?>" method="post">
									  <input type="hidden" class="form-control" name="id" value="<?php echo (isset($edit_client->id)?$edit_client->id:''); ?>">
									   <div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label>User Name</label>
													<input class="form-control" name="name" value="<?php echo (isset($edit_client->name)?$edit_client->name:''); ?>">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Last Name</label>
													<input class="form-control" name="lname" value="<?php echo (isset($edit_client->last_name)?$edit_client->last_name:''); ?>">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label>Company</label>
													<input class="form-control" name="company" value="<?php echo (isset($edit_client->company)?$edit_client->company:''); ?>">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Street</label>
													<input class="form-control" name="street" value="<?php echo (isset($edit_client->street)?$edit_client->street:''); ?>">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label>Country</label>
													<input class="form-control" name="country" value="<?php echo (isset($edit_client->country)?$edit_client->country:''); ?>">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Telephone number</label>
													<input class="form-control" name="phone"  value="<?php echo (isset($edit_client->phone_number)?$edit_client->phone_number:''); ?>">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label>Email</label>
													<input class="form-control" name="email" value="<?php echo (isset($edit_client->email)?$edit_client->email:''); ?>">
												</div>
											</div>
										    <div class="col-md-6">
											 <?php if(isset($edit_client->password)){ ?>
												<div class="form-group">
													<label>Password</label>
													<input class="form-control" name="password" value="<?php 
													$pass_word =$this->encrypt->decode($edit_client->password);
												    echo (isset($pass_word)?$pass_word:
													''); ?>">
												</div>
											 <?php } else {?>
												<div class="form-group">
													<label>Password</label>
													<input class="form-control" name="password" value="">
												</div> 
												 
											 <?php } ?>
											</div>
										</div>
										<div class="row">
										  <div class="col-md-12" >
											  <?php if(isset($_GET['edit_id'])){?>
												<input type="submit" class="btn btn-primary" name="update" value="Update">
												<?php } else { ?>
												 <input type="submit" name="submit" class="btn btn-primary" value="Submit">
											  <?php } ?>
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
                
            </div>
            <!-- /.row -->
        </div>

