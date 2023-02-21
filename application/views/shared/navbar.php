<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container py-1">
        <a class="navbar-brand" href="<?= base_url('/') ?>">LifeLately</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url('/') ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('posts/create') ?>">Add Post</a>
                </li>
                <li class="nav-item">
                    <?php if ($this->session->userdata('user_id')): ?>
                        <a class="nav-link btn btn-success ms-2 px-3 btn-sm"
                            href="<?= base_url('auth/logout') ?>">Logout</a>
                    <?php else: ?>
                        <a class="nav-link btn btn-success ms-2 px-3 btn-sm" href="<?= base_url('login') ?>">Login</a>
                    <?php endif; ?>
                </li>
            </ul>
        </div>
    </div>
</nav>