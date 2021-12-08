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
        case 'updateSuccess':
            $return = 'The hike was updated successfully';
            $color = 'green';
            break;
        case 'updateFailed':
            $return = 'There was a problem updating the hike';
            $color = 'red';
            break;
        case 'emailUsed':
            $return = 'This email adress is already used. Please try again.';
            $color = 'red';
            break;
        case 'userNameUsed':
            $return = 'This username is already used. Please try again.';
            $color = 'red';
            break;
        case 'subscriptionSuccess':
            $return = 'Account created';
            $color = 'green';
            break;
        default:
            print_r('error');
    }
?>
<div class="message <?= $color ?>">
    <p><?= $return ?></p>
</div>