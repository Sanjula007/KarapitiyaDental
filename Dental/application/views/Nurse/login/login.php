<div id="all">
    <div id="content">
        <div class="container" style=" padding-left: 100px;">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="#">Home</a>
                    </li>
                    <li>New account / Sign in</li>
                </ul>
            </div>

            <div class="col-md-6">
                <div class="box">
                    <h1>Login</h1>
                    <hr>

                    <?= form_open('index.php/Nurse/login') ?>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email">
                        <label > <span style="color:#d9534f;"><?php echo form_error('email'); ?></span></label>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                        <label > <span style="color:#d9534f;"><?php echo form_error('password'); ?></span></label>
                    </div>
                    <?php if (isset($error)) : ?>
                        <div class="col-md-12">
                            <div class="alert alert-danger" role="alert">
                                <?= $error ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-sign-in"></i> Log in</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>