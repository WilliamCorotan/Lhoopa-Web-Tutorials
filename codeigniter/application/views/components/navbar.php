<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand" href="<?= base_url()?>"><?php echo APPLICATION_NAME?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active" href="<?= base_url()?>">Home
            <span class="visually-hidden">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url()?>posts">Blogs</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url()?>categories">Categories</a>
        </li>
      </ul>

      <ul class="navbar-nav ms-auto">
        <?php if(!$this->session->userdata('logged_in')):?>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url()?>users/register">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url()?>users/login">Login</a>
        </li>

        <?php else: ?>
          <li class="nav-item align-self-center">
            <span class="">Welcome Back, <?= $this->session->userdata('username') ?></span>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url()?>users/logout">Logout</a>
          </li>

        <?php endif ?>

        
      </ul>


      <!-- <form class="d-flex">
        <input class="form-control me-sm-2" type="search" placeholder="Search">
        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
      </form> -->
    </div>
  </div>
</nav>