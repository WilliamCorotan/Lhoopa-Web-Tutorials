<?php
require('config/config.php');
require('config/database.php');

//fetch post data

if(isset($_POST['submit'])){

    var_dump( $_POST);
$id = mysqli_real_escape_string($con, $_POST['post_id']);
$title = mysqli_real_escape_string($con, $_POST['title']);
$body = mysqli_real_escape_string($con, $_POST['body']);
$author = mysqli_real_escape_string($con, $_POST['author']);

// query string 
$query = "UPDATE posts SET 
            title='$title',
            author='$author',
            body='$body'
            WHERE id = $id
        ";
    try{
        mysqli_query($con, $query);
        header("Location: ". ROOT_URL);
    }
    catch(Exception $error){
        echo "Error: " . $error ;
    }
    
    mysqli_close($con);
}


$id = mysqli_real_escape_string($con, $_REQUEST['id']);
// query string 
$query = "SELECT * FROM posts WHERE id = $id";

// get result
$result = mysqli_query($con, $query);

// fetch data
$post = mysqli_fetch_assoc($result);

// free result from memory
mysqli_free_result($result);



?>

<?php include('includes/header.php')?>
    <main>
    <a href="<?php echo ROOT_URL?>" class=" m-2 btn btn-dark"> < </a>
        <section class="container my-5">
            <h1 class="text-center">EDIT POST</h1>
            <form method="post" action="<?php echo $_SERVER["PHP_SELF"]?>" novalidate>
                <fieldset>
                    <!-- Title Field -->
                    <div class="form-group">
                        <label for="title" class="form-label mt-4">Title</label>
                        <input type="text" class="form-control border" id="title" name="title" aria-describedby="titleHelp" value="<?php echo $post['title'] ?>" >
                    </div>

                    <!-- Author Field -->
                    <div class="form-group">
                        <label for="author" class="form-label mt-4">Author</label>
                        <input type="text" class="form-control border" id="author" name="author" aria-describedby="emailHelp" value="<?php echo $post['author'] ?>">
                    </div>

                    <!-- Body Field -->
                    <div class="form-group">
                        <label for="body" class="form-label mt-4">Post Content</label>
                        <textarea class="form-control border" id="body" name="body" rows="3" placeholder="Enter your post content here..."><?php echo $post['body'] ?></textarea>
                    </div>

                    <!-- ID Field -->
                    <div class="form-group">
                        <input type="hidden"  name="post_id" aria-describedby="emailHelp" value="<?php echo $post['id'] ?>">
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary mt-4">Edit</button>
                </fieldset>
            </form>
        </section>
    </main>

<?php include('includes/footer.php')?>