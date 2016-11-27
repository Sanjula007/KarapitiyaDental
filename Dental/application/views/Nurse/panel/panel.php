<div id="all">

    <div id="content">
        <div class="container">

            <div class="col-md-12">

                <ul class="breadcrumb">
                    <li><a href="#">Home</a>
                    </li>
                    <li>My Account</li>
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
                                <a href="<?= base_url('index.php/Settings/panelView')?>"><i class="fa fa-edit"></i> My Account</a>
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

            <div class="col-md-9" id="customer-orders">
                <div class="box">


                    <!--   <h1>Hi  <?php echo $_SESSION['name'];?>!!</h1>-->


                    <p class="lead">Update your account.</p>
                    <p class="text-muted">If you have any questions, please feel free to <a href="contact.html">contact us</a>, our customer service center is working for you 24/7.</p>




                    <div class="table-responsive">
                        <table class="table table-hover">

                            <tbody>
                            <tr>
                                <th>Username</th>
                                <td><span class="label label-info">Do you want to change your username? </span>
                                </td>
                                <td><a href="<?= base_url('index.php/Settings/editView') ?>" class="btn btn-primary btn-sm">change</a>
                                </td>
                            </tr>
                            <tr>
                                <th>Password</th>
                                <td><span class="label label-danger">Do you want to reset your password? </span>
                                </td>
                                <td><a href="<?= base_url('index.php/Settings/resetView') ?>" class="btn btn-primary btn-sm">Reset</a>
                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container -->
    </div>