<?php

$title = 'Create Post' . '|' . SITE_TITLE;

if (isset($_POST['logout'])) {
    Session::unset('loggedin');
    session_destroy();
    redirect('home');
}

if (!empty(Session::get('loggedin'))) {

    $currentUser = $pdo->select("SELECT * FROM users WHERE id=?", [Session::get('loggedin')])->fetch(PDO::FETCH_ASSOC);
    $posts = $pdo->select("SELECT * FROM posts", [])->fetchAll(PDO::FETCH_OBJ);

    if (isset($_GET['id'])) {
        $postId = $_GET['id'];

        $pdo->delete('DELETE FROM posts WHERE id=?', [$postId]);

        $successMessage = "You have successfully deleted post ID {$postId}.";

        redirect('viewpost', $successMessage, 'success');
        exit();
    }

    if (isset($_POST['publish'])) {
        $id = $_POST['postId'];

        $currentPost = $pdo->select("SELECT * FROM posts WHERE id=?", [$id])->fetch(PDO::FETCH_ASSOC);

        $status = $currentPost['publish'] == 1 ? 0 : 1;

        $pdo->update('UPDATE posts SET publish =? WHERE id=?', [$status, $id]);

        if ($pdo->status) {
            $resp = json_encode(['status' => 'success']);
            echo $resp;
            die;
        }
    }

    if (isset($_POST['type'])) {
        $id = $_POST['id'];

        $currentPost = $pdo->select("SELECT * FROM posts WHERE id=?", [$id])->fetch(PDO::FETCH_ASSOC);

        if ($pdo->status) {
            $resp = json_encode(['status' => 'success', 'data' => $currentPost]);
            echo $resp;
            die;
        }
    }

    require_once 'view/loggedin/admin/view.viewpost.php';
}
