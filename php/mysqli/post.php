<?php
require('config/config.php');
require('config/database.php');


$id = mysqli_real_escape_string($con, $_REQUEST['id']);
// query string 
$query = "SELECT * FROM posts WHERE id = $id";

// get result
$result = mysqli_query($con, $query);

// fetch data
$post = mysqli_fetch_assoc($result);

// free result from memory
mysqli_free_result($result);

mysqli_close($con);
?>

<?php include('includes/header.php')?>
    <main>
    <a href="<?php echo ROOT_URL?>" class=" m-2 btn btn-dark"> < </a>
        <section class="container my-5">
            <h1 class="text-center">POSTS</h1>
            <div class="d-grid">
                <div class="row">
                            <div class="col-12 col-md-6 card text-white bg-primary mb-3 mx-auto h-100" style="max-width: 20rem;">
                                <div class="card-header mt-2">
                                    <h2>
                                        <?php echo $post['title']?>
                                    </h2>
                                    <small class="text-muted"><?php echo $post['author']?> <?php echo $post['created_at']?></small>
                                </div>
                                <div class="card-body d-flex flex-column h-100">
                                    <p class="card-text flex-grow-1"> <?php echo $post['body']?></p>
                            </div>
                    </div>
                </div>
            </div>
        </section>
        <button type="button" class="btn btn-success position-fixed end-0 bottom-0 m-2">Add new post</button>
    </main>

<?php include('includes/footer.php')?>