<?php

$categoria = $_POST["categoria"];

if (is_array($categoria)) {
   foreach ($categoria as $keyCategoria => $valueCategoria) {
    $new_categoria .= $valueCategoria.",";
  }
}

?>