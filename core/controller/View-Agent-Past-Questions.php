<?php
$title = 'View Uploaded Past Questions' . '|' . SITE_TITLE;

if (isset($_POST['logout'])) {
    Session::unset('loggedin');
    session_destroy();
    redirect('auth-login');
}
if (!empty(Session::get('loggedin'))) {
    $currentUser = toJson($pdo->select("SELECT * FROM users WHERE id=?", [Session::get('loggedin')])->fetch(PDO::FETCH_ASSOC));

    $questions = toJson($pdo->select("SELECT `d`.*, `u`.fullname FROM `document` `d`, `users` `u` WHERE `d`.`user_id`= `u`.`id` AND `d`.`user_id` IN (SELECT `id` FROM `users` WHERE `is_agent` = ?) GROUP BY `d`.`user_id`;)", [1])->fetchAll(PDO::FETCH_ASSOC));


    if (isset($_GET['id'])) {
        $questionId = $_GET['id'];

        $pdo->delete('DELETE FROM `document` WHERE id=?', [$questionId]);

        $successMessage = "You have successfully deleted question ID {$questionId}.";

        redirect('view-agent-past-questions', $successMessage, 'success');
        exit();
    }

    if (isset($_POST['publish'])) {
        $id = $_POST['questionId'];
        // echo $id;
        $currentQuestion = $pdo->select("SELECT * FROM `document` WHERE id=?", [$id])->fetch(PDO::FETCH_ASSOC);
        // var_dump($currentQuestion);
        $status = $currentQuestion['published'] == 1 ? 0 : 1;

        $pdo->update('UPDATE `document` SET published =? WHERE id=?', [$status, $id]);

        if ($pdo->status) {

            $resp = json_encode(['status' => 'success']);
            echo $resp;
            die;
        }
    }


}



require_once 'view/loggedin/agent/view-agent-past-questions.php';