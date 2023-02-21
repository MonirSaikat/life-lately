<div class="card shadow">
    <div class="card-body">
        <h3 class="card-title mb-4">Create new post</h3>
        <?php echo $this->session->flashdata('validation_errors'); ?>
        <form action="<?= base_url('posts/store') ?>" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input name="title" type="text" class="form-control" id="title" aria-describedby="nameHelp"
                    placeholder="Enter post title">
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea name="content" class="form-control" id="content"></textarea>
            </div>
            <div class="mb-3">
                <label for="file" class="form-label">Image</label>
                <input type="file" name="image" id="file" class="form-control" />
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>