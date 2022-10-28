<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!empty($_GET['logout'])) {
        // die(var_dump($_GET['logout']));
        session_unset();
        header('location: signin.php');
        die;
    }
}
if(isset($_SESSION['user'])){
    if ($_SESSION['user']['role_id'] == '1') {
        header('location: adminPages/dashboard.php');
        die;
    }elseif ($_SESSION['user']['role_id'] == '2') {
        header('location: index.php');
        die;
    }
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once "config.php";
    $email = $_POST['email'];
    $password = $_POST['password'];
    $msg = "";
    try {
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = '$email' AND password = '$password';");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetch();
        // die(var_dump($result));
        if ($result) {
            $_SESSION['user'] = $result;
            if ($_SESSION['user']['role_id'] == '1')
                header('location: adminPages/dashboard.php');
            else
                header('location: index.php');
            die;
        } else {
            $msg = "Wrong Email or Password!";
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
    <title>Sign in</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/">
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="assets/dist/css/signin.css" rel="stylesheet">

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
</head>

<body>

    <main class="form-signin w-100 m-auto">
        <form method="POST">
            <div class="text-center">
                <img class="mb-4" src="assets/brand/maleAvatar.svg" width="100px" />
                <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
            </div>

            <div class="form-floating">
                <input type="email" class="form-control rounded-top" id="email" name="email" placeholder="name@example.com">
                <label for="email">Email address</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control rounded-bottom" id="password" name="password" placeholder="Password">
                <label for="password">Password</label>
            </div>

            <div class="checkbox my-3 text-center">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div>

            <span class="d-block text-center my-3 <?php if (isset($msg)) {
                                                        echo 'fs-5 text-danger';
                                                    } ?>"><?php if (isset($msg)) echo $msg ?></span>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
            <div class="my-3 text-center">
                <a class="btn text-primary" href="register.php">Register</a>
            </div>
            <p class="my-3 text-muted text-center">&copy; 2022–2023</p>
        </form>
    </main>



</body>

</html>