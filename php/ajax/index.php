<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP AJAX</title>
    <link rel="stylesheet" href="https://bootswatch.com/5/lux/bootstrap.min.css">
    <script>
        function showSuggestion(userInput){
            if(userInput.length = 0) {
                document.querySelector("#suggestions").innerHTML() = '';
            }
            else{
                // creates a new XMLHttpRequest object
                const xmlhttp = new XMLHttpRequest();

                // this is function is executed on the ready state of the object.
                xmlhttp.onreadystatechange = function(){
                    // checks if the server status is okay and it is ready
                    if (this.readyState == 4 && this.status == 200) {
                        // sets the innerHTML of the suggestion in the html to the responseText from the server.
                        document.getElementById("suggestions").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "suggest.php?user=" + userInput, true);
                xmlhttp.send();
                }
        }
    </script>
</head>
<body>
    <section class="container">
        <h1>Search User</h1>

        <form>
            Search User: <input type="text" class="form-control" onkeyup="showSuggestion(this.value)">
        </form> 

        <p>Suggestions: <span id="suggestions" class="fw-bold"></span></p>
    </section>
</body>
</html>