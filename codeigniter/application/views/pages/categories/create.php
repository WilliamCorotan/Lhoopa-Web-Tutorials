<section class="mt-5 mx-auto">
    <!-- Page heading -->
    <div class="text-center">
    <h2 class="display-3"> <?= $title ?> </h2>
    </div>

    <!-- Category -->
    <article id="create-post-form" class="mb-4 border-bottom">
        <?= form_open('categories/create') ; ?>
            <div class="form-group mb-3">
                <label for="name" class="form-label">Category Name</label>
                <input type="text" class="form-control <?= (!empty(form_error('name'))) ? "border border-danger" : "" ?>" id="name" name="name" aria-describedby="nameHelp" placeholder="Add category name" value="<?= set_value('name') ?>">
                <?php if(!empty(form_error('name'))): ?>
                    <small class="text-danger"><?= form_error('name')?></small>
                <?php endif ?>
            </div>
            <button type="submit" class="btn btn-primary mb-3">Add Category</button>
        <?= form_close()?>
    </article>


</section>