<div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Forgot password</h3>
                    </div>
                    <div class="panel-body">
                        <p>Enter your email address to recover your password. </p>
                        <form role="form" method="post" action="<?php echo site_url('forgot') ; ?>">
                            <fieldset>
                                <?php if ($this->session->flashdata('msg')) { ?>
									  <div class="alert alert-danger">
										  <strong>Danger!</strong> <?php echo $this->session->flashdata('msg'); ?>
									  </div>
								 <?php } ?>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus required>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" name="submit" class="btn btn-lg btn-success btn-block">Reset Password</button>
                                <div class="form-group" style="margin-top: 12px;text-align: center;">
                                <a href="<?php echo site_url('/') ; ?>" class="btn-link text-bold text-main">Back to Login</a>
                                </div> 
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>