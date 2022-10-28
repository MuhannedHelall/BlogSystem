<?php
session_start();
if ($_SESSION['user']['role_id'] == '1') {
    require_once "../config.php";
    try {
        $stmt = $conn->prepare("SELECT * FROM categories");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $categories = $stmt->fetchAll();
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $image = $_POST['image'];
        $category_id = $_POST['category_id'];
        $msg = "";
        try {
            $stmt = $conn->prepare("SELECT * FROM posts WHERE title = '$title'");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetch();
            if ($result) {
                $msg = "This post already exists !";
            } else {
                $sql = "INSERT INTO posts (title, content, image, category_id, visibility) VALUES ('$title', '$content', '$image', '$category_id', '1')";
                $conn->exec($sql);
                header('location: posts.php');
            }
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
        $conn = null;
    }
} else {
    header('location: ../signin.php');
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Add a User</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/dashboard/">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/" />
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- Custom styles for this template -->
    <link href="../assets/dist/css/dashboard.css" rel="stylesheet">

    <style>
        .form-signin {
            max-width: 330px;
            padding: 15px;
        }

        .form-signin .form-floating:focus-within {
            z-index: 2;
        }

        #name {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        #email {
            margin-bottom: -1px;
            border-radius: 0;
        }

        #password {
            margin-bottom: -1px;
            border-radius: 0;
        }

        #confirm_password {
            margin-bottom: 10px;
            border-top-right-radius: 0;
            border-top-left-radius: 0;
        }

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

    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">
            <i class="bi bi-people mx-2"></i>
            Blog
        </a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <a class="nav-link px-3" href="../signin.php?logout=1">Sign out</a>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3 sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="dashboard.php">
                                <span data-feather="home" class="align-text-bottom"></span>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="users.php">
                                <span data-feather="users" class="align-text-bottom"></span>
                                Users
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="blockedUsers.php">
                                <span data-feather="users" class="align-text-bottom"></span>
                                Blocked Users
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="posts.php">
                                <span data-feather="file" class="align-text-bottom"></span>
                                Posts
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="addCat.php">
                                <span data-feather="file" class="align-text-bottom"></span>
                                Add a category
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="deletedPosts.php">
                                <span data-feather="file-text" class="align-text-bottom"></span>
                                Deleted Posts
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="admins.php">
                                <span data-feather="users" class="align-text-bottom"></span>
                                Admins
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Add a Post</h1>
                </div>

                <form method="POST" class="p-5 my-2">
                    <input type="text" name="title" class="d-block w-100 py-3 px-3 my-2 rounded border border-1 bg-light" placeholder="Title" required />
                    <input type="text-area" name="content" class="d-block w-100 py-5 px-3 my-2 rounded border border-1 bg-light" placeholder="Content" required />
                    <input type="text" name="image" class="d-block w-100 py-3 px-3 my-2 rounded border border-1 bg-light" placeholder="Image URL" required />
                    <select name="category_id" class="d-block w-100 py-3 px-3 my-2 rounded border border-1 bg-light" required>
                        <option value="">category</option>
                        <?php foreach ($categories as $category) { ?>
                            <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                        <?php } ?>
                    </select>
                    <button class="w-100 btn btn-lg btn-primary mt-2" type="submit" id="create">Add a post</button>
                </form>

                <footer class="text-muted py-5">
                    <div class="container">
                        <p class="float-end mb-1">
                            <a href="#">Back to top</a>
                        </p>
                        <p class="mb-1">Album example is &copy; Muhanned Helall, All rights are reserved!</p>
                    </div>
                </footer>
            </main>
        </div>
    </div>
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
    <script src="../assets/dist/js/dashboard.js"></script>
</body>

</html>