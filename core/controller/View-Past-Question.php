<?php

$title = 'Create Post' . '|' . SITE_TITLE;

if (isset($_POST['logout'])) {
    Session::unset('loggedin');
    session_destroy();
    redirect('home');
}

if (!empty(Session::get('loggedin'))) {

    $currentUser = toJson($pdo->select("SELECT * FROM users WHERE id=?", [Session::get('loggedin')])->fetch(PDO::FETCH_ASSOC));

    if ($currentUser->is_agent) {
        $questions = $pdo->select("SELECT * FROM document WHERE user_id=?", [Session::get('loggedin')])->fetchAll(PDO::FETCH_OBJ);
    }else{
        $questions = $pdo->select("SELECT * FROM past_question", [])->fetchAll(PDO::FETCH_OBJ);
    }


    if (isset($_GET['id'])) {
        $questionId = $_GET['id'];

        $pdo->delete('DELETE FROM past_question WHERE id=?', [$questionId]);

        $successMessage = "You have successfully deleted question ID {$questionId}.";

        redirect('view-past-questions', $successMessage, 'success');
        exit();
    }

    if (isset($_POST['publish'])) {
        $id = $_POST['questionId'];
        $currentQuestion = $pdo->select("SELECT * FROM past_question WHERE id=?", [$id])->fetch(PDO::FETCH_ASSOC);

        $status = $currentQuestion['publish'] == 1 ? 0 : 1;

        $pdo->update('UPDATE past_question SET publish =? WHERE id=?', [$status, $id]);

        if ($pdo->status) {
            $resp = json_encode(['status' => 'success']);
            echo $resp;
            die;
        }
    }

    if (isset($_POST['type'])) {
        $id = $_POST['id'];
        $currentQuestion = $pdo->select("SELECT * FROM past_question WHERE id=?", [$id])->fetch(PDO::FETCH_ASSOC);

        if ($pdo->status) {
            $resp = json_encode(['status' => 'success', 'data' => $currentQuestion]);
            echo $resp;
            die;
        }
    }

    require_once 'view/loggedin/admin/view-past-questions.php';
}

