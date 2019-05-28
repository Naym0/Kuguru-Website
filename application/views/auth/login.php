<?php 
	if($this->session->flashdata('msg') !== NULL){
		echo $this->session->flashdata('msg')['content'];
	}
?>
<?= validation_errors('<div class="alert alert-danger" >', '</div>');?>

<!-- Page Content -->
<div class="bg-body-dark bg-pattern" style="background-image: url('<?php echo $cb->assets_folder; ?>/media/various/bg-pattern-inverse.png');">
    <div class="row mx-0 justify-content-center">
        <div class="hero-static col-lg-7 col-xl-7">
            <div class="content content-full overflow-hidden">
                <!-- Header -->
                <div class="py-30 text-center">
                    <h1 class="h4 font-w700 mt-30 mb-10">Welcome to Your Dashboard</h1>
                    <h2 class="h5 font-w400 text-muted mb-0">It’s a great day today!</h2>
                </div>
                <!-- END Header -->

                <!-- Sign In Form -->
                <!-- jQuery Validation functionality is initialized with .js-validation-signin class in js/pages/op_auth_signin.min.js which was auto compiled from _es6/pages/op_auth_signin.js -->
                <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
                <form class="js-validation-signin" action="<?= base_url('auth/login');?>" method="post">
                    <div class="block block-themed block-rounded block-shadow">
                        <div class="block-header bg-gd-emerald">
                            <h3 class="block-title">Please Sign In</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option">
                                    <i class="si si-wrench"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content">
                            <div class="form-group row">
                                <div class="col-12">
                                    <label for="login-username">Username</label>
                                    <input type="email" class="form-control" id="email" name="email">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <label for="login-password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-sm-6 text-sm push pull-left">
                                    <button type="submit" class="btn btn-alt-success">
                                        <i class="si si-login mr-10"></i> Sign In
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="block-content bg-body-light">
                            <div class="form-group text-center">
                                <a class="link-effect text-muted mr-10 mb-5 d-inline-block" href="op_auth_reminder3.php">
                                    <i class="fa fa-warning mr-5"></i> Forgot Password?
                                </a>
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
