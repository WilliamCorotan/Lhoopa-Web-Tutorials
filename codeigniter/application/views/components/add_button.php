<?php if(current_url() !== base_url()."posts/create"): ?>
<a href="<?= base_url() ?>posts/create" class="btn btn-success rounded-circle p-3 position-fixed bottom-0 end-0 m-5">
    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
    </svg>
</a>
<?php endif ?>