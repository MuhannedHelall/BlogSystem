<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once "config.php";
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $msg ="";
    try {
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = '$email'");
        $stmt->execute();

        // set the resulting array to associative
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetch();
        if ($result) {
            $msg = "This email is used already!";
        } else {
            $sql = "INSERT INTO users (name, email, password, role_id, visibility) VALUES ('$name', '$email', '$password', '2', '1')";
            $conn->exec($sql);
            header('location: signin.php');
        }
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
    $conn = null;
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Register</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/" />
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet" />

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }
    </style>

    <!-- Custom styles for this template -->
    <link href="assets/dist/css/signin.css" rel="stylesheet">
</head>

<body>

    <main class="form-signin w-100 m-auto">
        <form method="POST">
            <div class="text-center">
                <img class="mb-4" src="assets/brand/maleAvatar.svg" alt="" width="100px">
                <h1 class="h3 mb-3 fw-normal">Please Register</h1>
            </div>

            <div class="form-floating">
                <input type="text" class="form-control" id="name" name="name" placeholder="Muhanned Helall" required>
                <label for="name">Name</label>
            </div>
            <div class="form-floating">
                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
                <label for="email">Email address</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                <label for="password">Password</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required onkeyup="validate_password()">
                <label for="confirm_password">Confirm Password</label>
            </div>
            
            <span id="wrong_pass_alert" class="d-block text-center my-3 <?php if(isset($msg)){echo'fs-5 text-danger';}?>"><?php if(isset($msg))echo $msg ?></span>
            <button class="w-100 btn btn-lg btn-primary" type="submit" id="create">Register</button>
            <div class="my-3 text-center">
                <a class="btn text-primary" href="signin.php">Sign in</a>
            </div>
            <p class="mt-5 mb-3 text-muted text-center">&copy; 2022–2023</p>
        </form>
    </main>

    <script>
        function validate_password() {

            var pass = document.getElementById('password').value;
            var confirm_pass = document.getElementById('confirm_password').value;
            if (pass != confirm_pass) {
                document.getElementById('wrong_pass_alert').classList.remove('text-danger');
                document.getElementById('wrong_pass_alert').style.color = 'red';
                document.getElementById('wrong_pass_alert').innerHTML = '☒ Use same password';
                document.getElementById('create').disabled = true;
                document.getElementById('create').style.opacity = (0.4);
            } else {
                document.getElementById('wrong_pass_alert').classList.remove('text-danger');
                document.getElementById('wrong_pass_alert').style.color = 'green';
                document.getElementById('wrong_pass_alert').innerHTML = '🗹 Password Matched';
                document.getElementById('create').disabled = false;
                document.getElementById('create').style.opacity = (1);
            }
        }
    </script>


</body>

</html>