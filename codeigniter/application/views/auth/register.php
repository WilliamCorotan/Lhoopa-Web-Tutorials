<section class="my-5">
   
    <!-- Page heading -->
    <div class="text-center">
      <h2 class="display-3"> <?= $title ?> </h2>
    </div>

    <?= form_open('users/register') ?>
    <!-- Name Field -->
    <div class="form-group">
      <label for="name" class="form-label mt-4">Name</label>
      <input type="text" class="form-control  <?= (!empty(form_error('name'))) ? "border border-danger" : "" ?>" name="name" id="name" aria-describedby="nameHelp" placeholder="Enter Name">
      <?php if(!empty(form_error('username'))): ?>
        <div class="mt-2">
          <small class="text-danger"><?= form_error('name')?></small>
        </div>
      <?php endif ?>
    </div>

    <!-- Username Field -->
    <div class="form-group">
      <label for="username" class="form-label mt-4">Username</label>
      <input type="text" class="form-control  <?= (!empty(form_error('username'))) ? "border border-danger" : "" ?>" name="username" id="username" aria-describedby="usernameHelp" placeholder="Enter username">
      <?php if(!empty(form_error('username'))): ?>
        <div class="mt-2">
          <small class="text-danger"><?= form_error('username')?></small>
        </div>
      <?php endif ?>
    </div>

    <!-- Zip Code Field -->
    <div class="form-group">
      <label for="zipcode" class="form-label mt-4">Zip Code</label>
      <input type="text" class="form-control  <?= (!empty(form_error('zipcode'))) ? "border border-danger" : "" ?>" name="zipcode" id="zipcode" aria-describedby="zipcodeHelp" placeholder="Enter Zip Code">
      <?php if(!empty(form_error('username'))): ?>
        <div class="mt-2">
          <small class="text-danger"><?= form_error('zipcode')?></small>
        </div>
      <?php endif ?>
    </div>

    <!-- Email Field -->
    <div class="form-group">
        <label for="email" class="form-label mt-4">Email address</label>
        <input type="email" class="form-control  <?= (!empty(form_error('email'))) ? "border border-danger" : "" ?>" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        <?php if(!empty(form_error('username'))): ?>
        <div class="mt-2">
          <small class="text-danger"><?= form_error('email')?></small>
        </div>
      <?php endif ?>
    </div>

    <!-- Password Field -->
    <div class="form-group">
        <label for="password" class="form-label mt-4">Password</label>
        <input type="password" class="form-control  <?= (!empty(form_error('password'))) ? "border border-danger" : "" ?>" name="password" id="password" placeholder="Password">
        <?php if(!empty(form_error('username'))): ?>
        <div class="mt-2">
          <small class="text-danger"><?= form_error('password')?></small>
        </div>
      <?php endif ?>
    </div>

    <!-- Confirm Password Field -->
    <div class="form-group">
        <label for="confirm_password" class="form-label mt-4">Confirm Password</label>
        <input type="password" class="form-control  <?= (!empty(form_error('confirm_password'))) ? "border border-danger" : "" ?>" name="confirm_password" id="confirm_password" placeholder="Confirm Password">
        <?php if(!empty(form_error('username'))): ?>
        <div class="mt-2">
          <small class="text-danger"><?= form_error('confirm_password')?></small>
        </div>
      <?php endif ?>
    </div>
    <button class="btn btn-primary  mt-4">Submit</button>
<?= form_close() ?>
</section>