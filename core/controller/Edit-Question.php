<?php

$title = 'Edit Question' . '|' . SITE_TITLE;

if (isset($_POST['logout'])) {
    Session::unset('loggedin');
    session_destroy();
    redirect('home');
}
if (!empty(Session::get('loggedin'))) {

    $currentUser = toJson($pdo->select("SELECT * FROM users WHERE id=?", [Session::get('loggedin')])->fetch(PDO::FETCH_ASSOC));
    
    $id = $_GET['id'] ?? '';
    $questions = toJson($pdo->select("SELECT * FROM past_question WHERE id=?", [$id])->fetchAll(PDO::FETCH_ASSOC));

    if (isset($_GET['publish'])) {

     dnd($_GET['publish']);

    }

    if (isset($_GET['id'])) {
        $questionId = $_GET['id'];
        if (isset($_POST['edit-question'])) {
            $examBody = sanitizeInput($_POST['examBody']);
            $subject = sanitizeInput($_POST['subject']);
            $examYear = sanitizeInput($_POST['examYear']);
            $question = sanitizeInput($_POST['question']);
            $optionA = sanitizeInput($_POST['optionA']);
            $optionB = sanitizeInput($_POST['optionB']);
            $optionC = sanitizeInput($_POST['optionC']);
            $optionD = sanitizeInput($_POST['optionD']);
            $optionE = sanitizeInput($_POST['optionE']);
            $correctAnswer = sanitizeInput($_POST['correctAnswer']);
    
            // Update the question with the specified ID
            $pdo->update(
                'UPDATE past_question SET exam_body=?, `subject`=?, exam_year=?, question=?, option_a=?, option_b=?, option_c=?, option_d=?, option_e=?, correct_answer=? WHERE id=?',
                [$examBody, $subject, $examYear, $question, $optionA, $optionB, $optionC, $optionD, $optionE, $correctAnswer, $questionId]
            );
    
            if ($pdo->status) {
                redirect('view-past-questions', 'Question updated successfully', 'success');
            } else {
                redirect('view-past-questions', 'Question Failed to Update', 'danger');
            }
        }
    }
    

    require_once 'view/loggedin/admin/edit-question.php';

}
