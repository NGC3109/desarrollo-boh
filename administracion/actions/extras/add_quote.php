<?php
require_once('../connections/db-settings.php');

$db = pdoConnect();

$query="INSERT INTO slider_quotes (author, quote) VALUES (:author, :quote)";

$stmt=$db->prepare($query);

$stmt->bindParam(':author', $author);
$stmt->bindParam(':quote', $quote);


$author=$_POST['author'];
$quote=$_POST['quote'];

if($stmt->execute()){echo '<script>
self.location = "../'.$_POST['pagelink'].'.php"
</script>';}



?>



