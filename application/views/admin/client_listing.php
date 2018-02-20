<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                     <h1 class="page-header">Client listing</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
				
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Client listing
					     <span>
                             <a class="btn btn-primary pull-right" style="padding: 1px 12px;" href="<?php echo site_url('admin/add_client'); ?>">ADD CLIENT
							</a>
						</span>						 
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Company</th>
                                        <th>Street</th>
                                        <th>Country</th>
                                        <th>Telephone number</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php 
								if(!empty($client)){
								foreach($client as $row)
									{
								?>		
                                    <tr class="odd gradeX">
                                        <td><?php echo  $row->name."&nbsp;".$row->last_name ?></td>
                                        <td><?php echo  $row->company; ?></td>
                                        <td><?php echo  $row->street; ?></td>
                                        <td><?php echo  $row->country; ?></td>
                                        <td><?php echo  $row->phone_number; ?></td>
                                        <td>
											<a class="btn btn-info btn-circle" href="<?php echo site_url('admin/add_client?edit_id='.$row->id); ?>"><i class="fa fa-pencil" aria-hidden="true"></i>
											</a>
											<a class="btn btn-danger btn-circle" onclick="return confirm('Really Want To Delete!!!')" href="<?php echo site_url('admin/delete_client/?id='.$row->id); ?>"><i class="fa fa-trash" aria-hidden="true"></i>
											</a>
									    </td>
                                    </tr>
								<?php } } ?>
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    
			        </div>
                    </div>
                    </div>
                    <!-- /.panel -->
               