<?php 
	if($this->session->flashdata('msg') !== NULL){
		echo $this->session->flashdata('msg')['content'];
	}
?>
<?= validation_errors('<div class="alert alert-danger" >', '</div>');?>

<!-- Page Content -->
<div class="bg-body-dark bg-pattern" style="background-image: url('<?php echo $cb->assets_folder; ?>/media/various/bg-pattern-inverse.png');">
    <div class="row mx-0 justify-content-center">
        <div class="hero-static col-lg-6 col-xl-4">
            <div class="content content-full overflow-hidden">
                <!-- Header -->
                <div class="py-30 text-center">
                    <h1 class="h4 font-w700 mt-30 mb-10">Reset your Password</h1>
                    <h2 class="h5 font-w400 text-muted mb-0">Please make it at least 8 characters long</h2>
                </div>
                <!-- END Header -->

                <!-- Sign In Form -->
                <!-- jQuery Validation functionality is initialized with .js-validation-signin class in js/pages/op_auth_signin.min.js which was auto compiled from _es6/pages/op_auth_signin.js -->
                <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
                <form class="js-validation-signin" action="reset_password" method="post">
                    <div class="block block-themed block-rounded block-shadow">
                        <div class="block-header bg-gd-emerald">
                            <h3 class="block-title">Reset your Password</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option">
                                    <i class="si si-wrench"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content">
                            <div class="form-group row">
                                <div class="col-12">
                                    <label for="login-username">Password</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <label for="login-password">Confirm Password</label>
                                    <input type="password" class="form-control" id="password" name="password_confirm">
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-sm-6 text-sm push pull-left">
                                    <button type="submit" class="btn btn-alt-success">
                                        <i class="si si-login mr-10"></i>Submit
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- END Sign In Form -->
            </div>
        </div>
    </div>
</div>
<!-- END Page Content -->