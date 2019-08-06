<?php
session_start();
include_once __DIR__."/controllers/post.php";
$route = explode( "/", $_SERVER["REQUEST_URI"] );
array_shift( $route );
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="/css/bootstrap.css" />
    </head>
    <body>
        <div class="container">
        <?php
            switch( $route[0] ) {
                case "admin":
                    include_once __DIR__."/controllers/admin.php";
                    break;
                case "task":
                    include_once __DIR__."/controllers/task.php";
                    break;
                case "tasks":
                default:
                    include_once __DIR__."/controllers/main.php";
                    break;
            }
        ?>
        </div>
        <script src="/js/jquery.js"></script>
        <script src="/js/popper.js"></script>
        <script src="/js/bootstrap.js"></script>
        <script src="/js/scripts.js"></script>
    </body>
</html>