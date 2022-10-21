<?php
// Start the session
session_start();

require_once 'models/PostModel.php';
$userModel = new PostModel();

$params = [];
if (!empty($_GET['keyword'])) {
    $params['keyword'] = $_GET['keyword'];
}

$posts = $userModel->getPosts($params);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
    <?php include 'views/meta.php' ?>
</head>

<body>
    <?php include 'views/header.php' ?>
    <?php
    var_dump($_SESSION['token']);
    ?>
    <div class="container">
        <?php if (!empty($posts)) { ?>
            <div class="alert alert-warning" role="alert">
                List of posts! <br>
                Hacker: http://php.local/list_users.php?keyword=ASDF%25%22%3BTRUNCATE+banks%3B%23%23
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Created by ID</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($posts as $post) { ?>
                        <tr>
                            <th scope="row"><?php echo $post['post_id'] ?></th>
                            <td>
                                <?php echo $post['post_title'] ?>
                            </td>
                            <td>
                                <?php echo $post['post_description'] ?>
                            </td>
                            <td>
                                <?php echo $post['token'] ?>
                            </td>
                            <td>
                                <a href="form_post.php?id=<?php echo $post['post_id'] ?>">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true" title="Update"></i>
                                </a>
                                <a href="view_post.php?id=<?php echo $post['post_id'] ?>">
                                    <i class="fa fa-eye" aria-hidden="true" title="View"></i>
                                </a>
                                <a href="delete_post.php?post_id=<?php echo $post['post_id'] ?>&token=<?php echo $post['token'] ?>">
                                    <i class="fa fa-eraser" aria-hidden="true" title="Delete"></i>
                                </a>
                            </td>
                        </tr>

                    <?php } ?>
                </tbody>
            </table>
        <?php } else { ?>
            <div class="alert alert-dark" role="alert">
                This is a dark alert—check it out!
            </div>
        <?php } ?>
    </div>

</body>

</html>