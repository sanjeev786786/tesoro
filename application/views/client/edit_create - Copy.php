<?php  //print_r($edit_create); exit(); ?>
<div id="page-wrapper">
  <div class="row">
     <div class="col-lg-12">
        <h1 class="page-header">Edit</h1>
     </div>
  </div>
  <div class="row">
     <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Basic Edit Ct Elements
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form action="<?php echo site_url('client/edit_create');?>" method="post">
							  <div class="col-lg-12">
							  <input type="hidden" name="id" class="form-control" id="id" value="<?php echo $edit_create->id; ?>">
							  <input type="hidden" name="user_id" class="form-control" id="user_id" value="<?php echo $edit_create->user_id; ?>">
							    <div class="row">
								  <div class="col-md-6">
								    <div class="form-group">
										<label for="name">Name:</label>
										<input type="text" name="name" class="form-control" id="name" value="<?php echo $edit_create->name; ?>" required>
									</div>
								  </div>
								  <div class="col-md-6">
								    <div class="form-group">
										<label>Start Date</label>
											<input id="start_date" class="form-control"  placeholder="Start Date" name="start_date" value="<?php echo $edit_create->start_date; ?>">
									</div>
								  </div>
							    </div>
								<div class="row">
								  <div class="col-md-6">
								    <div class="form-group">
										<label for="end">End date:</label>
										<label>End Date</label>
						                  <input id="form_datetime" class="form-control"  placeholder="End Date" name="end_date" value="<?php echo $edit_create->end_date; ?>" >
									</div>
								  </div>
								  <div class="col-md-6">
								    <div class="form-group">
										<label for="quantity">Quantity:</label>
										<input type="text" name="quantity" class="form-control" id="quantity" value="<?php echo $edit_create->quantity; ?>" required>
									</div>
								  </div>
							    </div>
								<div class="row">
								  <div class="col-md-12">
								      <div class="form-group">
									  <label for="description">Description:</label>
									  <textarea class="form-control" name="description" rows="5"  value=""><?php echo $edit_create->description; ?></textarea>
									</div>
								  </div>
								</div>
								<div class="row">
								  <div class="col-md-12">
								    <div class="form-group">        
									  
										<button type="submit" name="update" value="update" class="btn btn-default">Update</button>
									  
									</div>
								  </div>
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


</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
 $(document).ready(function(){
	  var nowTemp = new Date();
		var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);		 
		var checkin = $('#start_date').datepicker({
			format: 'dd/mm/yyyy',
		  onRender: function(date) {
			return date.valueOf() < now.valueOf() ? 'disabled' : '';
		  }
		}).on('changeDate', function(ev) {
		  if (ev.date.valueOf() > checkout.date.valueOf()) {
			var newDate = new Date(ev.date)
			newDate.setDate(newDate.getDate() + 1);
			checkout.setValue(newDate);
		  }
		  checkin.hide();
		  $('#form_datetime')[0].focus();
		}).data('datepicker');
		var checkout = $('#form_datetime').datepicker({
			format: 'dd/mm/yyyy',
		  onRender: function(date) {
			return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
		  }
		}).on('changeDate', function(ev) {
		  checkout.hide();
		}).data('datepicker');
 });
</script>
