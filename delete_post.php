<?php
session_start();
require_once 'models/PostModel.php';
$post = new PostModel();

$token = NULL;
$post_id = NULL;

if (!empty($_GET['post_id']) && !empty($_GET['token'])) {
    $post_id = $_GET['post_id'];
    $token = $_GET['token'];
    if ($token . $_SESSION['hash_random'] == $_SESSION['token']) {
        $post->deletePost($post_id,  $token);
    }
}
header('location: list_post.php');
