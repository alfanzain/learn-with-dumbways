<?php
require_once('function/redirectIfGuest.php');
require_once('function/helper.php');
require_once('config/database.php');

// echo $_SESSION['email'];
// echo $_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Waysgram</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <style>
        body {
            margin: 0;
        }

        .container.timeline-wrapper {
            margin-top: 3rem;
        }

        .timeline-card {
            margin-bottom: 1rem;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="offset-3 col-4">
            <a class="navbar-brand" href="#">Waysgram</a>
            <a href="process/logout.php">Logout</a>
        </div>
    </nav>
    <div class="container timeline-wrapper">
        <div class="row">
            <div class="offset-2 col-8">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="margin-bottom: 1rem;">
                Add Content
                </button>

                <?php
                $queryPost = $conn->query("SELECT posts_tb.id AS id_post, posts_tb.content AS content, posts_tb.image AS image, users_tb.name AS name, users_tb.id AS id_user FROM posts_tb LEFT JOIN users_tb ON posts_tb.id_user = users_tb.id ORDER BY posts_tb.id DESC");

                if (!$queryPost) {
                    printf("Error: %s\n", mysqli_error($conn));
                    exit();
                }

                $posts = array();
                while($row = $queryPost->fetch_array(MYSQLI_ASSOC))
                {
                    $posts[] = $row;
                }

                foreach ($posts as $post) 
                { 
                ?>
                <div class="card timeline-card">
                    <div class="card-header">
                        <?php echo $post['name']; ?>
                        <?php if($post['id_user'] == $_SESSION['id']) { ?>
                            <a href="process/delete_post.php?id_post=<?php echo $post['id_post']; ?>" class="" style="float: right; color: #ff1a0f; font-weight: bold;">Delete</a>
                        <?php
                        }
                        ?>
                    </div>
                    <img src="<?php echo postImg($post['image']) ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text"><?php echo $post['content']; ?></p>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>

    <!-- Add content -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="process/insert_post.php" method="post" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Content</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="post-image" class="col-form-label">Image:</label>
                            <input type="file" name="image" class="form-control" id="post-image">
                        </div>
                        <div class="form-group">
                            <label for="post-content" class="col-form-label">Content:</label>
                            <textarea name="content" class="form-control" id="post-content"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Upload Now</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>