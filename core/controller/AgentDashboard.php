<?php

$title = 'Agent Dashboard' . '|' . SITE_TITLE;

if(isset($_POST['logout'])){
    Session::unset('loggedin');
    session_destroy();
    redirect('auth-login');
}
if(!empty(Session::get('loggedin'))){
    
    $currentUser = toJson($pdo->select("SELECT * FROM users WHERE id=?", [Session::get('loggedin')])->fetch(PDO::FETCH_ASSOC));

    
    $totalQuestionsUploaded = $pdo->select("SELECT COUNT(*) AS `total_questions` FROM `document` WHERE `user_id` = (SELECT DISTINCT `id` FROM `users` WHERE `id` = '$currentUser->id' AND `is_agent` = 1); ")->fetchColumn();

    // $totalAmount = $pdo->select("SELECT SUM(amount) AS total_amounts FROM users")->fetchColumn();
    $totalAmount = $pdo->select("SELECT SUM(amount) FROM `transactionlogs` WHERE user_id = '$currentUser->id'")->fetchColumn();
     
    $usersData = $pdo->select("SELECT id, username,fullname, email, created_date, access FROM users")->fetchAll(PDO::FETCH_ASSOC);

    if (isset($_GET['id'])) {
        $userId = $_GET['id'];

       
        $pdo->delete('DELETE FROM users  WHERE id=?', [$userId]);
    
        $successMessage = "You have successfully deleted user ID {$userId}.";

        redirect('agent-dashboard', $successMessage, 'success');
        exit();
    }

    
    require_once 'view/loggedin/agent/agent-dashboard.php';


}


