<section class="mt-5 mx-auto">
    <!-- Back Button -->
    <div>
        <a href="<?= base_url()?>posts" class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
            </svg>
        </a>
    </div>
    <!-- Page heading -->
    <div class="text-center">
    <h2 class="display-3"> <?= $title ?> </h2>
    </div>

    <!-- Post -->
    <article id="<?= $post['id'] ?>" class="mb-4 border-bottom">
        <div id="post-title" class="mb-2 ">
            <h3 class="m-0"><?= $post['title']?></h3>
            <small class="text-muted"> Posted on: <?= $post['created_at'] ?> </small>
        </div>
        <div id="post-body" class="pb-3">
            <div class="w-75 mx-auto text-center">
                <img class="img-fluid" src=<?= site_url() . "assets/images/posts/" . $post['image']?> alt=<?= $post['slug'] ?>>
            </div>
            <p class="text-justify"><?= $post['body'] ?></p>
            <div class="d-flex gap-2">

                <a href="<?= base_url()?>posts/edit/<?= $post['slug'] ?>" class="btn btn-success">Edit</a>
                <?= form_open('/posts/delete/'.$post['id']); ?>
                    <button type="submit" class="btn btn-danger">Delete</button>
                <?= form_close(); ?>
            </div>
        </div>
        <div>
    <h3>Comments</h3>
    <?php if($comments):?>
        <?php foreach($comments as $comment):?>
            <h5><?= $comment['body'] ?> [by <strong> <?= $comment['name']?> </strong>]</h5>
        <?php endforeach?>
    <?php else:?>
        <p>No Comments</p>
    <?php endif?>

            <h3>Add Comment</h3>
            <?= validation_errors()?>
            <?= form_open('comments/create/' . $post['id'])  ?>
                <div class="form-group mb-3">
                    <label for="name">Name</label>
                    <input class="form-control" type="text" name="name" id="name">
                </div>
                <div class="form-group mb-3">
                    <label for="email">Email</label>
                    <input class="form-control" type="text" name="email" id="email">
                </div>
                <div class="form-group mb-3">
                    <label for="body" class="form-label">Comment</label>
                    <textarea class="form-control" name="body" id="body" rows="3"></textarea>
                </div>
                <input type="hidden" name="slug" value="<?= $post['slug'] ?>">
                <button class="btn btn-primary">Submit</button>
            <?= form_close()?>
        </div>
    </article>
</section>