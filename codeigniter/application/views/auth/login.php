<section class="my-5">
    <div class="row  align-items-center">
        <div class="col-md-6 offset-md-3">
            <!-- Page heading -->
            <div class="text-center">
            <h2 class="display-3"> <?= $title ?> </h2>
            <?php if($this->session->flashdata('login_error')): ?>
                    <div class="mt-2 text-start">
                        <span class="text-danger">Invalid Credentials, Please Try Again!</span>
                    </div>
                <?php endif ?>
            </div>
    
            <?= form_open('users/login') ?>
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
            <div class="d-grid ">
                <button class="btn btn-primary mt-4">Submit</button>
            </div>
    <?= form_close() ?>

        </div>
    </div>
</section>