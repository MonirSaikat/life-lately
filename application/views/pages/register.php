<div class="row justify-content-center">
    <div class="col-lg-4 col-md-6 col-sm-8">
        <div class="card shadow">
            <div class="card-body">
                <h5 class="card-title text-center">Register</h5>
                <?php echo $this->session->flashdata('validation_errors'); ?>
                <form action="<?= site_url('auth/register') ?>" method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input name="name" type="text" class="form-control" id="name" aria-describedby="nameHelp"
                            placeholder="Enter your name" value="<?= set_value('name') ?>">
                        <small class="text-danger">
                            <?= form_error('name'); ?>
                        </small>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input name="username" type="text" class="form-control" id="username" aria-describedby="usernameHelp"
                            placeholder="Enter an user name" value="<?= set_value('username') ?>">
                        <small class="text-danger">
                            <?= form_error('username'); ?>
                        </small>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp"
                            placeholder="Enter email" value="<?= set_value('email') ?>">
                        <small class="text-danger">
                            <?= form_error('email'); ?>
                        </small>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input name="password" type="password" class="form-control" id="password"
                            placeholder="Password">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Register</button>
                        <p class="mt-2">Already have an account? <a href="<?= base_url('/login') ?>">login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>