<?php 
    // Form Field Variables
    $name = "";
    $email = "";
    $message = "";

    // Error Messages
    $nameErr = '';
    $emailErr = '';
    $messageErr = '';

    // Mail Variable
    $mail = '';
    $mailToastMessage = '';
    // filter form submit
    if(filter_has_var(INPUT_POST, 'submit')){

        // Bootstrap Classes for form field validation
        $validClass = 'border-success';
        $invalidClass = 'border-danger';

        $name = htmlspecialchars(trim($_POST["name"]));
        $email = htmlspecialchars(trim($_POST["email"]));
        $message =htmlspecialchars(trim($_POST["message"]));

        if(!empty($name) && !empty($email) && !empty($message)){
            // Email validation
            if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
                $emailErr = "Please use a valid email!";
            }
            else{
                // Receiver Email
                $receiverEmail = 'williamanthony.corotan.lhoopa@gmail.com';
                $subject = 'Contact Request Form ' . $name;
                $body = "
                    <h2>Contact Request<h2>
                    <h4>Name: </h4><p>$name</p>
                    <h4>Email: </h4><p>$email</p>
                    <h4>Message: </h4><p>$message</p>
                ";
                

                // Email Headers
                $headers = "MIME-VERSION: 1.0" . "\r\n";
                $headers .= "Content-Type:text/html;charset=UTF-8" . "\r\n";
                $headers .= "From: $name <$email>" . "\r\n";

                if(mail($receiverEmail, $subject, $body, $headers)){
                    $mail = "Mail Sent!";
                    $mailToastMessage = "Mail has been successfully sent!";
                }
                else{
                    $mail = "Error!";
                    $mailToastMessage = "An error occured in sending your concern. Please try again later!";
                }
            }
        }
        else{
            // Setting Errors to empty fields
            if(empty($name)) $nameErr = "Name field is required!";
            if(empty($email)) $emailErr = "Email field is required!";
            if(empty($message)) $messageErr = "Message field is required!";

        } 
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAMPLE WEBSITE</title>
    <link rel="stylesheet" href="https://bootswatch.com/5/lux/bootstrap.min.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Navbar</a>
            </div>
        </nav>
    </header>

    <main class="container">
        <section class="mt-4">
            <form method="post" action="<?php echo $_SERVER["PHP_SELF"]?>" novalidate>
                <fieldset>
                    <!-- Name Field -->
                    <div class="form-group">
                        <label for="name" class="form-label mt-4">Name</label>
                        <input type="text" class="form-control border <?php echo  !empty($nameErr) ?  $invalidClass :  $validClass ?>" id="name" name="name" aria-describedby="nameHelp" placeholder="Enter Name" value="<?php echo $name?>">
                        
                        <!-- Name Error -->
                        <?php if(!empty($nameErr)): ?>
                            <div class="mt-2 ms-2">
                                <small class="text-danger">
                                    <?php  echo $nameErr?>
                                </small>
                            </div>
                        <?php endif?>
                    </div>

                    <!-- Email Field -->
                    <div class="form-group">
                        <label for="email" class="form-label mt-4">Email address</label>
                        <input type="email" class="form-control border <?php echo  !empty($emailErr) ?  $invalidClass :  $validClass ?>" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email"
                        value="<?php echo $email?>">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>

                        <!-- Email Error -->
                        <?php if(!empty($emailErr)): ?>
                            <div class="mt-2 ms-2">
                                <small class="text-danger">
                                    <?php  echo $emailErr?>
                                </small>
                            </div>
                        <?php endif?>
                    </div>
                    <!-- Message Field -->
                    <div class="form-group">
                        <label for="message" class="form-label mt-4">Message</label>
                        <textarea class="form-control border <?php echo  !empty($messageErr) ?  $invalidClass :  $validClass ?>" id="message" name="message" rows="3" placeholder="Enter message here..."><?php echo $message?></textarea>

                        <!-- Message Error -->
                        <?php if(!empty($messageErr)): ?>
                            <div class="mt-2 ms-2">
                                <small class="text-danger">
                                    <?php  echo $messageErr?>
                                </small>
                            </div>
                        <?php endif?>
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary mt-4">Submit</button>
                </fieldset>
            </form>
        </section>
        <!-- Toast -->
        <div id="toast" class="toast position-fixed text-white  bottom-0 end-0 m-4 <?php echo !empty($mail)  ? ( $mail === "Mail Sent!" ? " show bg-success"  : "show bg-danger" ) : "" ?>" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong id="toast-title" class="me-auto "><?php echo $mail?></strong>
                <button id="toast-close-btn" type="button" class="btn-close ms-2 mb-1" data-bs-dismiss="toast" aria-label="Close">
                <span aria-hidden="true"></span>
                </button>
            </div>
            <div class="toast-body">
                <span><?php echo $mailToastMessage?></span>
            </div>
        </div>
    </main>

    <script>
        const toast = document.querySelector("#toast");
        const toastCloseBtn =  document.querySelector("#toast-close-btn");
        console.log(toast)
        toastCloseBtn.addEventListener("click", ()=>{
            toast.classList.remove("show");
            toast.classList.add("hide");
        });

        setTimeout(()=>{
            if(toast.classList.contains("hide")){
             return;
            }
            toast.classList.remove("show");
            toast.classList.add("hide");
        },[5000])
    </script>
</body>
</html> 