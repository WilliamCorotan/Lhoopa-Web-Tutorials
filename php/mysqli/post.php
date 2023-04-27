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
            <h1 class="text-center">POSTS </h1>
            <div class="d-grid">
                <div class="row">
                            <div class="col text-white bg-primary h-100 p-4" >
                                <div class=" py-3">
                                    <div class=" d-flex ">
                                        <h2 class=" text-white flex-grow-1">
                                        <?php echo $post['title']?> 
                                        </h2>
                                        <span class=""><a  class="btn btn-info me-2" href="<?php echo ROOT_URL?>/edit.php/?id=<?php echo $post['id']?>">Edit</a></span>
                                        <span class=""><a  class="btn btn-danger" href="<?php echo ROOT_URL?>/delete.php/?id=<?php echo $post['id']?>">delete</a></span>
                                    </div>

                                    <small class="text-muted"><?php echo $post['author']?> <?php echo $post['created_at']?></small>
                                </div>
                                <div class=" d-flex flex-column border-top py-4">
                                    <p class="card-text "> <?php echo $post['body']?></p>

                            </div>
                    </div>
                </div>
            </div>
        </section>
        <a href="<?php echo ROOT_URL?>/add.php" type="button" class="btn btn-success position-fixed end-0 bottom-0 m-2">Add new post</a>
    </main>

<?php include('includes/footer.php')?>