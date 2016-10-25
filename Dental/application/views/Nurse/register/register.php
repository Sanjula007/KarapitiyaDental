<div id="all">
    <div id="content">
        <div class="container" style=" padding-left: 100px;">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="#">Home</a>
                    </li>
                    <li>New account / Sign up</li>
                </ul>
            </div>
            <?php if (isset($error)) : ?>
                <div class="col-md-12">
                    <div class="alert alert-danger" role="alert">
                        <?= $error ?>
                    </div>
                </div>
            <?php endif; ?>
            <div class="col-md-7">
                <div class="box">
                    <h1>New account</h1>

                    <p class="lead">Not yet registered?</p>
                    <hr>
                    <?= form_open('Nurse/register') ?>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter a username" >
                        <label ><span style="color:#d9534f;"><?php echo form_error('name'); ?></span></label>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email">
                        <label > <span style="color:#d9534f;"><?php echo form_error('email'); ?></span></label>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter a password" >
                        <label > <span style="color:#d9534f;"><?php echo form_error('password'); ?></span></label>
                    </div>
                    <div class="form-group">
                        <label for="password">Confirm Password</label>
                        <input type="password" class="form-control" id="password_confirm" name="password_confirm"  placeholder="Confirm your password">
                        <label > <span style="color:#d9534f;"><?php echo form_error('password_confirm'); ?></span></label>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-user-md"></i> Register</button>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

