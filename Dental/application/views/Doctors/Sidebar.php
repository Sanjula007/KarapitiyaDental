<div class="col-md-3">
    <!-- *** CUSTOMER MENU ***
_________________________________________________________ -->
    <div class="panel panel-default sidebar-menu">

        <div class="panel-heading">
            <h3 class="panel-title">Doctor</h3>
        </div>

        <div class="panel-body">

            <ul class="nav nav-pills nav-stacked">
                <li class="active">
                    <a href="<?= base_url('index.php/Patient/patients'); ?>"><i class="fa fa-list"></i>Patients</a>
                </li>
                <li>
                    <a href="<?= base_url('index.php/Patient/registration'); ?>"><i class="fa fa-list"></i>New Patient registration</a>
                </li>
                <li>
                    <a href="<?= base_url('index.php/TraumaTreatment/form'); ?>"><i class="fa fa-list"></i>Trauma Treatment</a>
                </li>
                <li>
                    <a href="<?= base_url('index.php/TraumaTreatment/trauma_profile/1'); ?>"><i class="fa fa-list"></i>Trauma Profile</a>
                </li>
                <li>
                    <a href="<?= base_url('index.php/Stock/Equipment/'); ?>"><i class="fa fa-list"></i>Stock</a>
                </li>
                <li>
                    <a href="<?= base_url('index.php/Stock/Equipment/new_item'); ?>"><i class="fa fa-list"></i>new item Stock</a>
                </li>

                <li>
                    <a href="<?= base_url('index.php/Leave/viewLeaveForm'); ?>"><i class="fa fa-plus"></i>Add New leaves</a>
                </li>
                <li>
                    <a href="<?= base_url('index.php/Leave/listView'); ?>"><i class="fa fa-list-alt"></i>Leave Summary</a>
                </li>
                <li>
                    <a href="<?= base_url('index.php/'); ?>"><i class="fa fa-user"></i> My account</a>
                </li>
                <li>
                    <a href="<?= base_url('index.php/'); ?>"><i class="fa fa-sign-out"></i> Logout</a>
                </li>
            </ul>
        </div>

    </div>
    <!-- /.col-md-3 -->

    <!-- *** CUSTOMER MENU END *** -->
</div>