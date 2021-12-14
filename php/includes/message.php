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
        case 'createdSuccess':
            $return = 'The hike was created successfully';
            $color = 'green';
            break;
        case 'createdFailed':
            $return = 'There was a problem creating the hike';
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
        case 'subscriptionFailed':
            $return = 'Account Failed';
            $color = 'red';
            break;
        case 'deleteUserFailed':
            $return = 'There was an issue deleting the account. Please contact the administrator';
            $color = 'red';
            break;
        case 'formError':
            $return = 'There was an issue connecting to the database. Please contact the administrator';
            $color = 'red';
            break;
        case 'noUser':
            $return = 'This username does not exist.';
            $color = 'red';
            break;
        case 'wrongPwd':
            $return = 'The password doesn\' match for that user.';
            $color = 'red';
            break;
        case 'errorModify':
            $return = 'There was an error modifying your data. Please try again later.';
            $color = 'red';
            break;
        case 'modifySuccess':
            $return = 'Information modified successfully.';
            $color = 'green';
            break;
        case 'distanceInvalid';
            $return = 'This distance is invalid.';
            $color = 'red';
            break;
        case 'formNoValid';
            $return = 'Form not send to Database.';
            $color = 'red';
            break;
        case 'emailNoValid';
            $return = 'This Email is not valid.';
            $color = 'red';
            break;

        default:
            print_r('error');

    }
?>
<div class="message <?= $color ?>">
    <p><?= $return ?></p>
</div>