<?php
$sourcePage = $_GET['source'];
session_start();
session_destroy();

switch ($sourcePage) {
    case 'volunteer':
        header('Location: volunteer.php');
        break;
    case 'community':
        header('Location: community.php');
        break;
    case 'quiz':
        header('Location: quiz.php');
        break;
    case 'contact':
        header('Location: contact.php');
        break;
    default:
        header('Location: index.php');
        break;
}

exit();

?>