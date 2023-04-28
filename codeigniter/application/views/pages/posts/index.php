<section class="mt-5 mx-auto">

    <div class="text-center mb-5">
    <h2 class="display-3"> <?= $title ?> </h2>
    </div>
    
    <?php foreach($posts as $post): ?>
        <div id="<?= $post['id'] ?>" class="mb-4 border-bottom">
            <div class="post-title mb-2 ">
                <h3 class="m-0"><?= $post['title']?></h3>
                <small class="text-muted"> Posted on: <?= $post['created_at'] ?> </small>
            </div>
            <div class="post-body pb-3">
                <p class="text-justify"><?= $post['body'] ?></p>
                <a href="<?= site_url("/posts/".$post['slug']) ?>" type="button" class="btn btn-outline-primary">Read More</a>
            </div>
        </div>
    <?php endforeach ?>
</section>