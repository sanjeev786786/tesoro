<div id="page-wrapper">
 <div class="row">
			   				
                <div class="col-lg-12">
                    <h1 class="page-header">Step 2</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
				
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Step 2
                        </div>
                        <div class="panel-body">
                            <div class="row">
							    <div class="col-lg-12">
                                  <div id="connected">
								    <div class="col-md-4" style="    border-right: 1px solid;">
										<ul class="connected list">
										  <?php if(!empty($categories)){
										  foreach($categories as $key=>$row){?>
											<li class="drop_len">
											  <div class="img_width">
											     <div class="cts">
											       <img src="<?php echo base_url(); ?>image/page-generic.png" alt="Smiley face" height="94" width="91">
											     </div>
												 <div class="cate" id="clients-edit-wrapper">
												   <p class="cat_id"><?php echo $row['cat_id'];?>
												   <input type="hidden" name="cat_id[]" value="<?php echo $row['cat_id'];?>">
												   
												   </p>
													<h4 id="categories_rendered"><?php echo $row['categories_rendered'];?>
													<input type="hidden" name="categories_rendered_title[]" value="<?php echo $row['categories_rendered'];?>">
													<span class="icon_edit_delete">
													<a class="edit-div"><i class="fa fa-pencil" aria-hidden="true"></i></a>
													
													<a href="" class="close-div"><i class="fa fa-trash" aria-hidden="true"></i></a>
													</span></h4>
													<p><?php 
													  $html_entity_decode =html_entity_decode($row['categories_rendered_content']); 
													 $strip  = strip_tags($html_entity_decode); 
													 
													 echo mb_strimwidth($strip, 35,20, '..'); ?></p>
														 
												  </div>
												</div>
												<button class="btn btn-primary" data-toggle="modal" data-target="#myModal<?php echo $key; ?>">Read all</button>
												<div class="modal fade" id="myModal<?php echo $key; ?>" role="dialog">
												<div class="modal-dialog">
												
												  <!-- Modal content-->
												  <div class="modal-content">
													<div class="modal-header">
													  <button type="button" class="close" data-dismiss="modal">&times;</button>
													  <h4 class="modal-title"><?php echo $row['categories_rendered']  ?></h4>
													</div>
													<div class="modal-body">
													  <p id="test"><?php $html_entity_decode =html_entity_decode($row['categories_rendered_content']);
													  
													  echo $html_entity_decode;
													   
													  ?></p>
													</div>
													<div class="modal-footer">
													  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
													</div>
												  </div>
												  
												</div>
											  </div>
											</li>
										<?php } } ?>
										</ul>
									</div>
									 <div class="col-md-8">
									   <form action="<?php echo site_url('client/add_create');?>" method="post" onsubmit="return validateForm()">
									       
										     <div class="row">
											  <div class="col-md-4">
												<div class="form-group">
													<label for="name"><?php echo $name; ?>:</label>
													
													<input type="text" name="name" class="form-control" id="name" required>
												</div>
											  </div>
											  <div class="col-md-3">
												<div class="form-group">
													<label><?php echo $start_date; ?>:</label>
														<input id="start_date" class="form-control"  placeholder="Start Date" name="start_date" value="<?php echo date("d/m/Y");?>" >
												</div>
											  </div>
											  <div class="col-md-3">
												<div class="form-group">
													<label for="end"><?php echo $end_date; ?>:</label>
													  <input id="form_datetime" class="form-control"  placeholder="End Date" name="end_date" value="31/12/2099" >
												</div>
											  </div>
											  <div class="col-md-2">
												<div class="form-group">
													<label for="name"></label>
													<input type="hidden" name="language" value="<?php echo $_GET['language'];?>">
													<p style="margin-top: 11px;"><b><?php echo $_GET['language'];?></b><p>
												</div>
											  </div>
											</div>
										     <div class="row">
											  <div class="col-md-5">
												  <div class="form-group">
												  <label for="description"><?php echo $description; ?>:</label>
												  <textarea class="form-control" name="description" rows="2" id="description" required></textarea>
												</div>
											  </div>
											  <div class="col-md-3">
												<div class="form-group">
													<label for="quantity"><?php echo $quantity; ?>:</label>
													<input type="text" name="quantity"  class="form-control" id="quantity" required >
												</div>
											  </div>
											</div>
										  
										   <div class="row">
										      <div class="col-md-10">
												<ul class="connected list no2 drop_drop" id="div1" >
													<li class="highlight"></li>	
												</ul>
											  </div>
                                              <div class="col-md-2">
											    <div class="form-group">        
												  <button type="submit"   name="submit" class="btn btn-default">Submit</button>
												</div>
											  </div>
										  </div>	
										</form>
								     </div>
								   </div> 
                                </div>
                            </div>
                          
                        </div>
                        
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
</div>
<style>

#features {
margin: auto;
width: 460px;
font-size: 0.9em;
}
.connected, .sortable, .exclude, .handles {
margin: auto;
padding: 0;
width: 310px;
-webkit-touch-callout: none;
-webkit-user-select: none;
-khtml-user-select: none;
-moz-user-select: none;
-ms-user-select: none;
user-select: none;
}
.sortable.grid {
overflow: hidden;
}
.connected li, .sortable li, .exclude li, .handles li {
list-style: none;
border: 1px solid #CCC;
background: #F6F6F6;
font-family: "Tahoma";

margin: 5px;
padding: 5px;

}
.icon_edit_delete{
	display: none;
}
.handles span {
cursor: move;
}
li.disabled {
opacity: 0.5;
}
.sortable.grid li {
line-height: 80px;
float: left;
width: 80px;
height: 80px;
text-align: center;
}
li.highlight {
background: #FEE25F;
}
.connected {
float: left;

}
li.sortable-placeholder {
border: 1px dashed #CCC;
background: none;
}

.img_width{
	width:100%;
}
.cts{
	width:34%;
	float:left;
}
.drop_drop .icon_edit_delete{
	display: block;
	float: right;
}
.drop_drop .cat_id{
	display: none;
}
.drop_drop .cts{
	display: none;
}
.drop_drop button{
	display: none;
}
ul#div1{
    width: 100%;
}

</style>

<script src="<?php echo base_url();?>assets/vendor/jquery/jquery.sortable.js"></script>
      
<script>
   function validateForm() {
	   //alert($('.drop_drop .drop_len').length)
	   if($('.drop_drop .drop_len').length == 0 )
	   {
		   alert('Please drop cts');
		   return false;
	   }
	   if($('.drop_drop .drop_len').length != $('input[name="input[]"]').length)
	   {
		   //alert($('input[name="input[]"]').length);
		   alert('Please edit the cts text');
		   return false;
	   }
    }



		$(function() {
			$('.sortable').sortable();
			$('.handles').sortable({
				handle: 'span'
			});
			$('.connected').sortable({
				connectWith: '.connected'
			});
			$('.exclude').sortable({
				items: ':not(.disabled)'
			});
		});
		$(".close-div").on("click", function(event) {
			$(this).parent().parent().parent().parent().parent().remove();
			event.preventDefault();
		});
		$(".edit-div").one('click', function () {
		var p =  $(this).parent().parent().next().text();
		//alert(p); exit();
		$(this).parent().parent().parent().parent().parent().append('<div><input class="edit_input form-control" name="input[]" type="text" value="'+p+'" />');
		});
	</script>
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