<?php
require('config/config.php');
require('config/database.php');


if(isset($_POST['submit'])){
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $body = mysqli_real_escape_string($con, $_POST['body']);
    $author = mysqli_real_escape_string($con, $_POST['author']);
    
    // query string 
    $query = "INSERT INTO posts(title, body, author) VALUES ('$title','$body','$author')";
    
    try{
        mysqli_query($con, $query);
        header("Location: ". ROOT_URL);
    }
    catch(Exception $error){
        echo "Error: " . $error ;
    }
    
    mysqli_close($con);
}
?>

<?php include('includes/header.php')?>
    <main>
    <a href="<?php echo ROOT_URL?>" class=" m-2 btn btn-dark"> < </a>
        <section class="container my-5">
            <h1 class="text-center">ADD POST</h1>
            <form method="post" action="<?php echo $_SERVER["PHP_SELF"]?>" novalidate>
                <fieldset>
                    <!-- Title Field -->
                    <div class="form-group">
                        <label for="title" class="form-label mt-4">Title</label>
                        <input type="text" class="form-control border" id="title" name="title" aria-describedby="titleHelp" placeholder="Enter Title" >

                    </div>

                    <!-- Author Field -->
                    <div class="form-group">
                        <label for="author" class="form-label mt-4">Author</label>
                        <input type="text" class="form-control border" id="author" name="author" aria-describedby="emailHelp" placeholder="Enter Author"
                        >

                    </div>
                    <!-- Body Field -->
                    <div class="form-group">
                        <label for="body" class="form-label mt-4">Post Content</label>
                        <textarea class="form-control border" id="body" name="body" rows="3" placeholder="Enter your post content here..."></textarea>

                    </div>

                    <button type="submit" name="submit" class="btn btn-primary mt-4">Add</button>
                </fieldset>
            </form>
        </section>
    </main>

<?php include('includes/footer.php')?>