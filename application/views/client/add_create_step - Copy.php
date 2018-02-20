<div id="page-wrapper">
  <?php if(isset($_GET['language'])){
	     ?>
		 <div class="row">
			   				
                <div class="col-lg-12">
                    <h1 class="page-header">Step 2</h1>
                </div>
                <!-- /.col-lg-12 -->
         </div>
		 
                <div class="col-lg-12">
				     <div class="col-md-4">
					    <div class="panel panel-default">
                              <?php if(!empty($categories)){
								  foreach($categories as $key=>$row){
									  
								  ?>
                                							  
								<div id="drag1"  draggable="true" ondragstart="drag(event)">
										 <div class="img_width">
										   <div class="cts">
											  <img src="<?php echo base_url(); ?>image/page-generic.png" alt="Smiley face" height="94" width="91">
										   </div>
										 </div>
										<div  class="cate" id="clients-edit-wrapper">
											<p class="cat_id"><?php echo $row['cat_id']  ?></p>
											<p id="categories_rendered"><?php echo $row['categories_rendered']  ?>
											<span class="icon_edit_delete">
											<a class="edit-div"><i class="fa fa-pencil" aria-hidden="true"></i></a>
											
											<a href="" class="close-div"><i class="fa fa-trash" aria-hidden="true"></i></a>
											</span></p>
											<p><?php 
											  $html_entity_decode =html_entity_decode($row['categories_rendered_content']); 
											 $strip  = strip_tags($html_entity_decode); 
											 
											 echo mb_strimwidth($strip, 35,20, '..'); ?></p>
										</div>	
										   <button class="btn btn-primary" data-toggle="modal" data-target="#myModal<?php echo $key; ?>">Read all</button>
										    
								    </div>
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
                               <?php } } ?>		
                         </div>
					 </div>
					<div class="col-md-8">
				    <div class="panel panel-default">
                        <div class="panel-heading">
                            Step 2 (<?php echo $_GET['language']; ?>)
                        </div>
						<div class="panel-body">
                            <div class="row">
							 <form action="<?php echo site_url('client/add_create');?>" method="post">
							  <div class="col-lg-12" >
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
										<p style="margin-top: 11px;"><b><?php echo $_GET['language']; ?></b><p>
									</div>
								  </div>
							    </div>
								<div class="row">
								  <div class="col-md-5">
								      <div class="form-group">
									  <label for="description"><?php echo $description; ?>:</label>
									  <textarea class="form-control" name="description" rows="2" id="description"></textarea>
									</div>
								  </div>
								  <div class="col-md-3">
								    <div class="form-group">
										<label for="quantity"><?php echo $quantity; ?>:</label>
										<input type="text" name="quantity" class="form-control" id="quantity" required>
									</div>
								  </div>
								</div>
								<div class="row">
								
								    <div class="col-md-10">
									  <div class="form-group">
                                       <div id="div1" class="drop_drop" ondrop=   "drop(event)" ondragover="allowDrop(event)">
									      
								       </div>
                                     </div>
									</div>
									<div class="col-md-2">
										<div class="form-group">        
										  <button type="submit" name="submit" class="btn btn-default">Submit</button>
										</div>
									</div>
                                 </div>
                               </div>
							 </form>
                           </div>							
					    </div>
				   </div>
				   </div>
		       </div>		
		 <?php } ?>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
<script>
$(".close-div").on("click", function(event) {
    $(this).parent().parent().parent().parent().remove();
    event.preventDefault();
});
$(".edit-div").one('click', function () {
var p =  $(this).parent().parent().next().text();
$(this).parent().parent().parent().parent().append('<div><input class="edit_input form-control" name="input" type="text" value="'+p+'" />');
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
<style>
#div1 {
    width: 519px;
    padding: 10px;
    border: 1px solid #aaaaaa;
	height: auto !important;
}
.cts{
	border: 1px solid;
    width: 91px;
    height: 94px;
}
.drop_drop .cts{
	    display: none;
}
.drop_drop button{
	display: none;
}
.drop_drop #drag1{
	    height: 83px;
	}
.drop_drop #drag1{
	border: none;
}	
#drag1{width:100%;border: 1px solid;    margin-bottom: 10px;}

.img_width{
	width:30%;float: left;
}
.cate{
	width:70%;float: left;
}
.drop_drop .cate{
	width:100%;
}
.drop_drop #categories_rendered{   
    background: #eee;
	padding: 1em 0;
	padding-left: 8px;
	}
.drop_drop .cat_id{
	display: none;
}	
.icon_edit_delete{
	display: none;
}
.drop_drop .icon_edit_delete{
	display: block;
	float: right;
}
.drop_drop .edit_input{
	position: relative;
    top: -37px;
}
</style> 
<script>
function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.id);
}

function drop(ev) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");
    ev.target.appendChild(document.getElementById(data));
}
</script>