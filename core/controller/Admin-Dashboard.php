<?php

$title = 'Dashboard' . '|' . SITE_TITLE;

if(isset($_POST['logout'])){
    Session::unset('loggedin');
    session_destroy();
    redirect('auth-login');
}
if(!empty(Session::get('loggedin'))){
    
    $currentUser = toJson($pdo->select("SELECT * FROM users WHERE id=?", [Session::get('loggedin')])->fetch(PDO::FETCH_ASSOC));


    $totalVerifiedUsers = $pdo->select("SELECT COUNT(*) AS total_signups FROM users WHERE access = 'secured'")->fetchColumn();


    $totalUnverifiedUsers = $pdo->select("SELECT COUNT(*) AS total_signups FROM users WHERE access = 'guest'")->fetchColumn();

    
    $totalQuestionsUploaded = $pdo->select("SELECT COUNT(*) AS total_questions FROM past_question")->fetchColumn();

    $totalAmount = $pdo->select("SELECT SUM(amount) AS total_amounts FROM users")->fetchColumn();



    $usersData = $pdo->select("SELECT id, username,fullname, email, created_date, access FROM users")->fetchAll(PDO::FETCH_ASSOC);

    if (isset($_GET['id'])) {
        $userId = $_GET['id'];

       
        $pdo->delete('DELETE FROM users  WHERE id=?', [$userId]);
    
        $successMessage = "You have successfully deleted user ID {$userId}.";

        redirect('admin-dashboard', $successMessage, 'success');
        exit();
    }

    
    require_once 'view/loggedin/admin/admin-dashboard.php';


}


