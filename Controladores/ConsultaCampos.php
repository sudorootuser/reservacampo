<?php 
$query2 = "SELECT * FROM campos  ORDER BY nombre_Campo ASC";
$campos = $mysqli->query($query2);
$rowc = $campos->fetch_array(MYSQLI_ASSOC);
?>