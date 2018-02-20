<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                     <h1 class="page-header">Listing</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
				
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           listing
					     <span>
                             <a class="btn btn-primary pull-right" style="padding: 1px 12px;" href="<?php echo site_url('client/add_create'); ?>">New
							</a>
						</span>						 
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>CTs name</th>
                                        <th>language</th>
                                        <th>Start date</th>
                                        <th>End date</th>
                                        <th>Quantity</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php
									if(!empty($add_create)){
									foreach($add_create as $row)
										{
									?>								
                                    <tr class="odd gradeX">
							            <td><?php echo  $row->name; ?></td>
										<td><?php echo  $row->language; ?></td>
                                        <td><?php echo  $row->start_date; ?></td>
                                        <td><?php echo  $row->end_date; ?></td>
                                        <td><?php echo  $row->quantity; ?></td>
                                        <td><?php echo  $row->description; ?></td>
                                        <td>
											<a class="btn btn-info btn-circle" href="<?php echo site_url('client/edit_create?edit_id='.$row->id); ?>"><i class="fa fa-pencil" aria-hidden="true"></i>
											</a>
											<a class="btn btn-danger btn-circle" onclick="return confirm('Really Want To Delete!!!')" href="<?php echo site_url('client/delete_create?id='.$row->id); ?>"><i class="fa fa-trash" aria-hidden="true"></i>
											</a>
									    </td>
									
                                    </tr>
								<?php }} ?>	
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
               