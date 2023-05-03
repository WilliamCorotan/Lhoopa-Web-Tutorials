<section class="mt-5 mx-auto">

    <div class="text-center mb-5">
    <h2 class="display-3"> <?= $title ?> </h2>
    </div>
    
    <?php foreach($categories as $category): ?>
        <div id="<?= $category['id'] ?>" class="mb-4 border-bottom">
            <li class="list-group-item"> <a href="<?= site_url('/categories/posts/') . $category['id'] ?>"><?= $category['name'] ?></a></li>
        </div>
    <?php endforeach ?>

    
</section>