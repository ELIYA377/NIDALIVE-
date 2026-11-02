<?php
require_once __DIR__.'/includes/bootstrap.php';require_login();csrf_check();
$amount=(int)($_POST['amount']??0);$method=trim($_POST['payment_method']??'');$ref=trim($_POST['reference_code']??'');
$allowed=['M-Pesa','Tigo Pesa','Airtel Money','HaloPesa','Nyingine'];
if($amount<5||$amount>100000||!in_array($method,$allowed,true)||$ref===''){flash('Taarifa za malipo si sahihi.','error');header('Location: dashboard.php');exit;}
$q=db()->prepare("INSERT INTO topup_requests(user_id,amount,payment_method,reference_code) VALUES(?,?,?,?)");$q->execute([$_SESSION['user_id'],$amount,$method,$ref]);audit('credit_topup_requested',(int)$_SESSION['user_id']);flash('Ombi la kuongeza credit limetumwa. Litasubiri uthibitisho wa admin.','success');header('Location: dashboard.php');exit;
