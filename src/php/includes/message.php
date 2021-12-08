<?php
    $message = $_GET['message'];
    $return = '';
    $color = '';
    switch($message) {
        case 'deleteSuccess':
            $return = 'The hike was deleted successfully';
            $color = 'green';
            break;
        case 'deleteFailed':
            $return = 'There was a problem deleting the hike';
            $color = 'red';
            break;
        case 'mailUsed':
            $return = 'This email adress is already used. Please try again.';
            $color = 'red';
            break;
        case 'userNameUsed':
            $return = 'This username is already used. Please try again.';
            $color = 'red';
            break;
        default:
            print_r('error');
    }
?>
<div class="message <?= $color ?>">
    <p><?= $return ?></p>
</div>