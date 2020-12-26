<?php
require_once('function/redirectIfLoggedOn.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Waysgram</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
</head>
<body>
    <div class="row">
        <div class="offset-4">
            Waysgram

            <form id="login" method="post">
                <input type="text" class="form-control" name="email" value="" placeholder="Username">
                <input type="password" class="form-control" name="password" value="" placeholder="Password">
                <input type="submit" class="form-control" value="Login">
                <span id="response">
                </span>
            </form>
        </div>
    </div>
    <script>
    $(document).ready(function () {
        var response = $("#response");
        $("#login").submit(function(event){
            response.html('Processing...');
            event.preventDefault();
            
            $.ajax({
                method: "POST",
                url: "process/login.php",
                data: {
                    email: $("input[name=email").val(),
                    password: $("input[name=password").val()
                },
                statusCode: {
                    500: function() {
                        response.html('Error : 500');
                    }
                }
            }).done(function(data){
                if(data == 1)
                {
                    response.html('Login berhasil!');

                    setTimeout(function () {
                        window.location.href = "index.php";
                    }, 500);
                }
                else if(data == 2)
                    response.html('Login gagal.');
            });
        });
    });
    </script>
</body>
</html>