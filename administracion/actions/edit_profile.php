<?php
require_once('../connections/db-settings.php');

$db = pdoConnect();

$query="UPDATE admin_rtc SET user_rtc=:user, pass_rtc=:pass, mail_rtc=:mail WHERE id=:id";
$stmt=$db->prepare($query);

$stmt->bindParam(':user', $user);
$stmt->bindParam(':pass', $pass);
$stmt->bindParam(':mail', $mail);
$stmt->bindParam(':id', $id);

$id=$_POST['id'];
$user=$_POST['user'];
$pass=$_POST['pass'];
$mail=$_POST['mail'];
if($stmt->execute()){echo '<script>
self.location = "../'.$_POST['page'].'.php"
</script>';}
else{}



?>



