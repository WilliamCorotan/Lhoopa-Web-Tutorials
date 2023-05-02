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
    <article id="create-post-form" class="mb-4 border-bottom">
        <?= form_open('posts/update') ; ?>
            <input type="hidden" name="id" id="id" value="<?= $post['id'] ?>">
            <div class="form-group mb-3">
                <label for="title" class="form-label">Post Title</label>
                <input type="text" class="form-control <?= (!empty(form_error('title'))) ? "border border-danger" : "" ?>" id="title" name="title" aria-describedby="titleHelp" placeholder="Add title" value="<?= $post['title'] ?>">
                <?php if(!empty(form_error('title'))): ?>
                    <small class="text-danger"><?= form_error('title')?></small>
                <?php endif ?>
            </div>
            <div class="form-group mb-3">
                <label for="body" class="form-label mt-4">Post Content</label>
                <textarea id="editor" class="form-control resize-none <?= (!empty(form_error('body'))) ? "border border-danger" : "" ?>" id="body" name="body" rows="3" placeholder="Add post content"><?= $post['body'] ?></textarea>
                <?php if(!empty(form_error('body'))): ?>
                    <small class="text-danger"><?= form_error('body')?></small>
                <?php endif ?>
            </div>  
            <div class="form-group mb-3">
                <label for="categories" class="form-label mt-4">Categories</label>
                <select class="form-select" id="category_id" name="category_id">
                <?php foreach($categories as $category): ?>
                    
                    <option  <?= ($category['id'] === $post['category_id']) ? 'selected' : ''?>  value=<?= $category['id'] ?> id=<?= $category['id'] ?>  > <?= $category['name']?> </option>
                <?php endforeach?>
                </select>
            </div>
            <!-- <div class="form-group">
                <label for="formFile" class="form-label mt-4">Default file input example</label>
                <input class="form-control" type="file" id="formFile">
            </div> -->  
            <button type="submit" class="btn btn-success mb-3">Edit</button>
        <?= form_close()?>
    </article>
</section>