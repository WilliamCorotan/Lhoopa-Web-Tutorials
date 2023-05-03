<?php if($this->session->flashdata('toast_data_title')): ?>

<div class="position-fixed bottom-0 end-0 mb-36 m-5 z-3 toast show" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="toast-header text-white <?= $this->session->flashdata('toast_data_danger') ? "bg-danger" : "bg-success"?> ">
    <strong class="me-auto"><?= $this->session->flashdata('toast_data_title') ?></strong>
    <button type="button" class="btn-close ms-2 mb-1 " data-bs-dismiss="toast" aria-label="Close">
      <span aria-hidden="true"></span>
    </button>
  </div>
  <div class="toast-body text-white <?= $this->session->flashdata('toast_data_danger') ? "bg-danger" : "bg-success"?> ">
    <?= $this->session->flashdata('toast_data_body') ?>
  </div>
</div>

<?php endif ?>