<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                     <h1 class="page-header">Client Cts listing</h1>
                </div>
                <!-- /.col-lg-12 -->
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
				
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Client Cts listing
					     <span>
                             
						</span>						 
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Client Name</th>
                                        <th>CTs Name</th>
                                        <th>Language</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Quantity</th>
										<th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php 
								if(!empty($client_cts)){
								foreach($client_cts as $row)
									{
								?>		
                                    <tr class="odd gradeX">
                                        <td><?php
                                           $this->db->select('*');
										   $this->db->where('id',$row->user_id);
										   $query = $this->db->get('user');
										   //echo $this->db->last_query();exit();
										   $getresult = $query->row_array();
                                           echo $getresult['name'].' '.$getresult['last_name'];;

										?></td>
                                        <td><?php echo  $row->name; ?></td>
                                        <td><?php echo  $row->language; ?></td>
                                        <td><?php echo  $row->start_date; ?></td>
                                        <td><?php echo  $row->end_date; ?></td>
                                        <td><?php echo  $row->quantity; ?></td>
                                        <td><?php echo  $row->description; ?></td>
                                        <td>
											<a class="btn btn-info btn-circle" href="<?php echo site_url('admin/edit_create?edit_id='.$row->id); ?>"><i class="fa fa-pencil" aria-hidden="true"></i>
											</a>
											<a class="btn btn-danger btn-circle" onclick="return confirm('Really Want To Delete!!!')" href="<?php echo site_url('admin/delete_create/?id='.$row->id); ?>"><i class="fa fa-trash" aria-hidden="true"></i>
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
               