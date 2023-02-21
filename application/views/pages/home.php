<div class="row">
    <div class="col-md-8">
        <div class="row">
            <?php foreach ($posts as $post) { ?>
                <div class="col-md-12 mb-4">
                    <div class="card">
                        <img style="width: 100%; height: 350px;"
                            src="<?php echo base_url('/public/images/' . $post->image); ?>" class="card-img-top"
                            alt="<?php echo $post->title; ?>">
                        <div class="card-body">
                            <h5 class="card-title">
                                <?php echo $post->title; ?>
                            </h5>
                            <p class="card-text">
                                <?php echo substr($post->content, 0, 100); ?>...
                            </p>
                            <a href="<?php echo base_url('posts/show/' . $post->id); ?>" class="btn btn-primary">Read
                                More</a>
                        </div>
                        <div class="card-footer text-muted">
                            Posted on
                            <?php echo date('F j, Y', strtotime($post->created_at)); ?> by
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

    </div>
    <div class="col-md-4">
        <?php include(APPPATH . 'views/shared/sidebar.php'); ?>
    </div>
</div>