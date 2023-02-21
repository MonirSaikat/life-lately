<div class="row justify-content-center">
    <div class="col-lg-4 col-md-6 col-sm-8">
        <div class="card shadow">
            <div class="card-body">
                <h5 class="card-title text-center">Login</h5>
                <form action="<?= base_url('auth/login') ?>" method="POST">
                    <?php echo $this->session->flashdata('validation_errors'); ?>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp"
                            placeholder="Enter email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Login</button>
                        <p class="mt-2">Don't have an account ? <a href="<?= base_url('/register') ?>">register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>