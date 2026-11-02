<?php
require_once __DIR__.'/includes/bootstrap.php';
if($_SERVER['REQUEST_METHOD']==='POST'){csrf_check();
$f=trim($_POST['first_name']??'');$m=trim($_POST['middle_name']??'');$l=trim($_POST['last_name']??'');$phone=preg_replace('/\s+/','',trim($_POST['phone']??''));$pin=$_POST['pin']??'';
if($f===''||$m===''||$l===''||!preg_match('/^\+?[0-9]{9,15}$/',$phone)||!preg_match('/^[0-9]{4,6}$/',$pin)){flash('Jaza majina yote matatu, simu sahihi na PIN ya tarakimu 4–6.','error');}
else{try{$q=db()->prepare('INSERT INTO users(first_name,middle_name,last_name,phone,pin_hash) VALUES(?,?,?,?,?)');$q->execute([$f,$m,$l,$phone,password_hash($pin,PASSWORD_DEFAULT)]);flash('Usajili umefanikiwa. Sasa ingia.','success');header('Location: login.php');exit;}catch(PDOException $e){flash('Namba hii ya simu tayari imesajiliwa.','error');}}
}
layout_start('Jisajili'); ?>
<div class="form-card"><h1>Jisajili</h1><form method="post"><input type="hidden" name="csrf" value="<?=e(csrf_token())?>">
<label>Jina la kwanza</label><input name="first_name" required maxlength="80">
<label>Jina la kati</label><input name="middle_name" required maxlength="80">
<label>Jina la mwisho</label><input name="last_name" required maxlength="80">
<label>Namba ya simu</label><input name="phone" inputmode="tel" placeholder="07XXXXXXXX" required>
<label>PIN (tarakimu 4–6)</label><input name="pin" type="password" inputmode="numeric" pattern="[0-9]{4,6}" minlength="4" maxlength="6" required>
<p class="muted">PIN ya tarakimu 6 inapendekezwa. Usimpe mtu mwingine PIN yako.</p><button class="btn">Fungua akaunti</button></form></div><?php layout_end(); ?>
