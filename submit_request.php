<?php
require_once __DIR__.'/includes/bootstrap.php';require_login();csrf_check();
$phone=preg_replace('/\s+/','',trim($_POST['phone_number']??''));
if(!preg_match('/^\+?[0-9]{9,15}$/',$phone)||($_POST['consent']??'')!=='1'){flash('Namba ya simu si sahihi au idhini haijathibitishwa.','error');header('Location: dashboard.php');exit;}
$cost=(int)COINS_PER_REQUEST;
try{db()->beginTransaction();$q=db()->prepare('SELECT coins FROM users WHERE id=? FOR UPDATE');$q->execute([$_SESSION['user_id']]);$balance=(int)$q->fetchColumn();
if($balance<$cost){db()->rollBack();flash('Credit haitoshi. Ongeza credit kwanza.','error');header('Location: dashboard.php');exit;}
$q=db()->prepare("INSERT INTO verification_requests(user_id,phone_number,consent) VALUES(?,?,1)");$q->execute([$_SESSION['user_id'],$phone]);
$q=db()->prepare('UPDATE users SET coins=coins-? WHERE id=?');$q->execute([$cost,$_SESSION['user_id']]);
$requestId = (int)db()->lastInsertId();
$q=db()->prepare("INSERT INTO transactions(user_id,amount,type,description) VALUES(?,?,'debit',?)");$q->execute([$_SESSION['user_id'],$cost,'Gharama ya ombi la uhakiki #'.$requestId]);
db()->commit();audit('verification_request_submitted',(int)$_SESSION['user_id']);flash('Ombi limetumwa. Credit '.$cost.' imekatwa.','success');
}catch(Throwable $e){if(db()->inTransaction())db()->rollBack();flash('Imeshindikana kutuma ombi. Jaribu tena.','error');}
header('Location: dashboard.php');exit;
