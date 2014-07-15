<?php
/**
 * Created by: Svyatoslav Svitlychnyi <kiev.devel@gmail.com>
 * Date: 21.06.14
 * Time: 3:20
 */

//var_dump($_POST);
if (isset($_POST['name']) && isset($_POST['phone']) && preg_match("/^[a-zA-ZА-Яа-яЁё]+$/u", $_POST['name']) && preg_match("/^[0-9]+$/", $_POST['phone'])) {
    $subject = 'Lets Fly Feedback';
    $message = "Перезвоните мне на номер {$_POST['phone']} ({$_POST['name']})";

    $to = 'letsfly555@gmail.com';
    //$to = 'kiev.devel@gmail.com';
    if (mail($to, $subject, $message)) {
        echo json_encode(array('success'=>'ok'));
    }


} else {
    echo json_encode(array('success'=>'ne_ok'));
}

//header("Location: http://kred-pro.ru/");