<?php
$logiciels = [
    ["nom" => "Firefox",       "licence" => "libre",       "systeme" => "multi"],
    ["nom" => "LibreOffice",   "licence" => "libre",       "systeme" => "multi"],
    ["nom" => "Microsoft Word","licence" => "proprietaire","systeme" => "windows"],
    ["nom" => "GIMP",          "licence" => "libre",       "systeme" => "linux"],
    ["nom" => "Visual Studio", "licence" => "proprietaire","systeme" => "windows"]
];

$licencesAutorisees = ["tous", "libre", "proprietaire"];
$systemesAutorises  = ["tous", "windows", "linux", "multi"];

$licence = $_GET["licence"] ?? "tous";
$systeme = $_GET["systeme"] ?? "tous";

if (!in_array($licence, $licencesAutorisees, true) || !in_array($systeme, $systemesAutorises, true)) {
    echo "Filtre invalide";
    return;
}

echo "<h1>Catalogue de logiciels</h1>";
echo "<table border='1' cellpadding='6'>";
echo "<tr><th>Logiciel</th><th>Licence</th><th>Système</th></tr>";

foreach ($logiciels as $log) {
    $okLicence = ($licence === "tous" || $log["licence"] === $licence);
    $okSysteme = ($systeme === "tous" || $log["systeme"] === $systeme);

    if ($okLicence && $okSysteme) {
        $urlNom = urlencode($log["nom"]);
        echo "<tr>";
        echo '<td><a href="detail.php?nom=' . $urlNom . '">' . htmlspecialchars($log["nom"]) . '</a></td>';
        echo "<td>" . htmlspecialchars($log["licence"]) . "</td>";
        echo "<td>" . htmlspecialchars($log["systeme"]) . "</td>";
        echo "</tr>";
    }
}

echo "</table>";