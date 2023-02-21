<div class="sidebar">
    <ul class="list-group">
        <li class="list-group-item active">Categories</li>
        <?php foreach ($categories as $category): ?>
            <li class="list-group-item">
                <a href="">
                    <?= $category->name ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>

<div class="sidebar mt-4">
    <ul class="list-group">
        <li class="list-group-item active">News letter</li>
        <form class="card card-body" style="border-radius: 0 0 10px 10px">
            <div class="form-group">
                <input class="form-control" placeholder="Enter your email" />
            </div>
            <div class="form-group">
                <button class="btn btn-primary mt-2">Subscribe</button>
            </div>
        </form>
    </ul>
</div>