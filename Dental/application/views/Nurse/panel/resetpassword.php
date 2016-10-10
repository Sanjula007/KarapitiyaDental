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
                                <a href="customer-orders.html"><i class="fa fa-edit"></i> My Account</a>
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
                    <p class="lead">Change your personal details or your password here.</p>
                    <p class="text-muted">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>

                    <h3>Change password</h3>

                    <form>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="password_old">Old password</label>
                                    <input type="password" class="form-control" id="password_old">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="password_1">New password</label>
                                    <input type="password" class="form-control" id="password_1">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="password_2">Retype new password</label>
                                    <input type="password" class="form-control" id="password_2">
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->

                        <div class="col-sm-12 text-center">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save new password</button>
                        </div>
                    </form>
                </div>
            </div>


            <!-- /.container -->
        </div>
        <!-- /#content -->