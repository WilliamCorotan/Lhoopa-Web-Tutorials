<?php print_r($this->session) ?>

<section class="mt-5 mx-auto">

    <div class="text-center mb-5">
    <h2 class="display-3"> <?= $title ?> </h2>
    </div>
    
    <?php foreach($posts as $post): ?>
        <div id="<?= $post['id'] ?>" class="mb-4 border-bottom">
            <div class="post-title mb-2 ">
                <h3 class="m-0"><?= $post['title']?></h3>
                <small class="text-muted"> Posted on: <?= $post['created_at'] ?> in <span class="fw-semibold text-primary"><?= $post['name'] ?></span>  </small>
            </div>
            <div class="post-body pb-3">
                <div class="row">
                    <div class="col-md-3 p-2">
                        <img class="img-fluid " src=<?= site_url() . "assets/images/posts/" . $post['image']?> alt=<?= $post['slug'] ?>>
                    </div>
                    <div class="col-md-9">
                        <p class="text-justify"><?= word_limiter($post['body'],50 ) ?></p>
                        <a href="<?= site_url("/posts/".$post['slug']) ?>" type="button" class="btn btn-outline-primary">Read More</a>
                    </div>
                </div>

            </div>
        </div>
    <?php endforeach ?>
</section>