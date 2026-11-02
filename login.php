<?php
require_once __DIR__.'/includes/bootstrap.php';
if($_SERVER['REQUEST_METHOD']==='POST'){csrf_check();$phone=preg_replace('/\s+/','',trim($_POST['phone']??''));$pin=$_POST['pin']??'';
$q=db()->prepare('SELECT * FROM users WHERE phone=? LIMIT 1');$q->execute([$phone]);$u=$q->fetch();
$locked=$u && $u['locked_until'] && strtotime($u['locked_until'])>time();
if($u&&!$locked&&$u['status']==='active'&&password_verify($pin,$u['pin_hash'])){
 db()->prepare('UPDATE users SET failed_attempts=0,locked_until=NULL WHERE id=?')->execute([$u['id']]);
 session_regenerate_id(true);$_SESSION['user_id']=(int)$u['id'];$_SESSION['role']=$u['role'];$_SESSION['name']=$u['first_name'];audit('login',(int)$u['id']);header('Location: dashboard.php');exit;
}
if($u&&!$locked){$n=(int)$u['failed_attempts']+1;$until=$n>=5?date('Y-m-d H:i:s',time()+900):null;db()->prepare('UPDATE users SET failed_attempts=?,locked_until=? WHERE id=?')->execute([$n,$until,$u['id']]);}
flash('Namba ya simu au PIN si sahihi, au akaunti imefungwa kwa muda.','error');
}
layout_start('Ingia'); ?>
<div class="form-card"><h1>Ingia</h1><form method="post"><input type="hidden" name="csrf" value="<?=e(csrf_token())?>"><label>Namba ya simu</label><input name="phone" inputmode="tel" required><label>PIN</label><input type="password" name="pin" inputmode="numeric" pattern="[0-9]{4,6}" required><button class="btn">Ingia</button></form></div><?php layout_end(); ?>
