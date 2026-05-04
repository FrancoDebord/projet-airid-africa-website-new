<?php
$path = __DIR__ . '/resources/views/training/procurements-tenders.blade.php';
$content = file_get_contents($path);
$apos = "\u{2019}"; // Unicode right single quotation mark
$old1 = "Notices to suppliers and tender ${apos}appels d${apos}offres";
$new1 = "Notices to suppliers and tender opportunities";
$old2 = "pour les avis et d${apos}offres";
$new2 = "pour les avis et appels d${apos}offres";
$content = str_replace($old1, $new1, $content);
$content = str_replace($old2, $new2, $content);
file_put_contents($path, $content);
echo "Done.\n";
