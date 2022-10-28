<?php
session_start();
// die(var_dump($_SESSION['user']));
if ($_SESSION['user']['role_id'] == '2' || $_SESSION['user']['role_id'] == '1') {
    require_once "config.php";
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            // die(var_dump($id));
            if ($id) {
                try {
                    $stmt = $conn->prepare(
                        "SELECT posts.id, posts.title, posts.content, posts.image, categories.name AS category, posts.visibility 
                                FROM posts JOIN categories ON posts.category_id = categories.id WHERE posts.id = '$id';"
                    );
                    $stmt->execute();
                    $stmt->setFetchMode(PDO::FETCH_ASSOC);
                    $post = $stmt->fetch();
                } catch (PDOException $e) {
                    echo $sql . "<br>" . $e->getMessage();
                }
            }
        }
    }
} else {
    header('location: signin.php');
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Blog Official</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/album/">
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

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

    <header>
        <div class="navbar navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a href="#" class="navbar-brand d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="me-2" viewBox="0 0 24 24">
                        <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z" />
                        <circle cx="12" cy="13" r="4" />
                    </svg>
                    <strong>Blog</strong>
                    <div>
                        <a href="./" class="text-white btn mx-2">Go Back</a>
                        <a href="signin.php?logout=1" class="text-white btn mx-2">Sign out</a>
                    </div>
                </a>
            </div>
        </div>
    </header>

    <main>
        <section class="py-5 text-center container">
            <div class="row py-lg-5">
                <div class="col">
                    <h1 class="fw-light pb-2"><?= $post['title'] ?></h1>
                    <p class="fs-4 w-75 d-inline-block text-align"><?= $post['content'] ?></p>
                    <small class="d-block text-center fs-6 pb-2">category : <?= $post['category'] ?></small>
                </div>
            </div>
        </section>

        <div class="album py-5 bg-light">
            <div class="container">
                <div class="d-flex justify-content-center">
                    <img src="<?= $post['image'] ?>" width="800" height="500px" class="rounded-5 shadow-lg" />
                </div>
            </div>
        </div>
    </main>

    <footer class="text-muted py-5">
        <div class="container">
            <p class="float-end mb-1">
                <a href="#">Back to top</a>
            </p>
            <p class="mb-1">Album example is &copy; Muhanned Helall, All rights are reserved!</p>
        </div>
    </footer>


    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>