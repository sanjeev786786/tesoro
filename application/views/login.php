<?php 
    //print_r($this->session->userdata('remember'));
   $remb_arr=$this->session->userdata('remember');
   if (isset($remb_arr)) {
	    if ($remb_arr['remember_me']==true) {
         $email=$remb_arr['email'];
         //print_r($email); exit();
		 $password=$remb_arr['password'];
		}
    }
	?>
<div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="<?php echo site_url('login');?>">
                            <fieldset>
                                <?php if ($this->session->flashdata('msg')) { ?>
									  <div class="alert alert-danger">
										  <strong>Danger!</strong> <?php echo $this->session->flashdata('msg'); ?>
									  </div>
								 <?php } ?>
                                 <?php if ($this->session->flashdata('thank')) { ?>
									  <div class="alert alert-success">
										  <strong>Success!</strong> <?php echo $this->session->flashdata('thank'); ?>
									  </div>
								 <?php } ?>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" value="<?php if (isset($email) ) { echo $email; } ?>" required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="<?php if (isset($password)) { echo $password; }?>" required>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox">Remember Me
                                    </label>
                                </div>
								<div class="form-group">
								<a href="<?php echo site_url('forgot') ; ?>" class="" >Forgot Password ?</a>
								</div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" name="submit" class="btn btn-lg btn-success btn-block">Login</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>