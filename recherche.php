<?php
$motCle = $_GET["q"] ?? "";
echo "Vous avez cherché : " . $motCle;   // DANGER : non échappé