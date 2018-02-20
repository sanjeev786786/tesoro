<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
             <?php $user=$this->session->userdata('user');
		        $name =$user['user_name']; ?> 
			
			
                  <div class="alert alert-success alert-dismissable" id="mydiv">
                   
                    <p></i>Welcome, <?php echo $name ?></p>
                   
                  </div>
</div>