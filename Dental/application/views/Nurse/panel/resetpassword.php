<div id="all">

    <div id="content">
        <div class="container">

            <div class="col-md-12">

                <ul class="breadcrumb">
                    <li><a href="#">Home</a>
                    </li>
                    <li>My account</li>
                </ul>

            </div>

            <div class="col-md-3">
                <!-- *** CUSTOMER MENU ***
            _________________________________________________________ -->
                <div class="panel panel-default sidebar-menu">

                    <div class="panel-heading">
                        <h3 class="panel-title">Customer section</h3>
                    </div>

                    <div class="panel-body">

                        <ul class="nav nav-pills nav-stacked">
                            <li class="active">
                                <a href="<?= base_url('index.php/Settings/panelView') ?>"><i class="fa fa-edit"></i> My Account</a>
                            </li>
                            <li>
                                <a href="<?= base_url('index.php/Patient/registration') ?>"><i class="fa fa-heart"></i> Patients</a>
                            </li>
                            <li>
                                <a href="customer-account.html"><i class="fa fa-user"></i> Doctors</a>
                            </li>
                            <li>
                                <a href="<?= base_url('index.php/Nurse/logout') ?>"><i class="fa fa-sign-out"></i> Logout</a>
                            </li>
                        </ul>
                    </div>

                </div>
                <!-- /.col-md-3 -->

                <!-- *** CUSTOMER MENU END *** -->
            </div>

            <div class="col-md-9">
                <div class="box">
                    <h1>My account</h1>
                    <p class="lead">Change your password here.</p>
                    <p class="text-muted">Choose a strong password and don't reuse it for other accounts. </p>
                    <?php if (isset($error)) : ?>
                        <div class="col-md-12">
                            <div class="alert alert-danger" role="alert">
                                <?= $error ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <h3>Change password</h3>

                    <?= form_open('Settings/resetPassword') ?>

                    <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="password_old">Old password</label>
                                    <input type="password" class="form-control" id="password_old" name="password_old">
                                    <label ><span style="color:#d9534f;"><?php echo form_error('password_old'); ?></span></label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="password_1">New password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="new password">
                                    <label ><span style="color:#d9534f;"><?php echo form_error('password'); ?></span></label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="password_2">Confirm password</label>
                                    <input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="confirm new password">
                                    <label ><span style="color:#d9534f;"><?php echo form_error('password_confirm'); ?></span></label>
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save new password</button>
                        </div>

                </div>
            </div>


            </div>
            <!-- /.container -->
        </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->