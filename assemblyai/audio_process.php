<?php

$audio_url = $_POST['audio_url'];

$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => 'https://api.assemblyai.com/v2/transcript',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => json_encode(
    [
      'audio_url' => $audio_url,
'auto_highlights' => true,
'content_safety' => true,
'iab_categories' => true,
'sentiment_analysis' => true,
'auto_chapters' => true,
'entity_detection' => true

    ]
  ),
  CURLOPT_HTTPHEADER => [
    'Authorization: API-TOKEN-GOES-HERE',
    'Content-Type: application/json'
  ]
]);

$response = curl_exec($curl);

$err = curl_error($curl);
curl_close($curl);

if ($err) {
  echo 'cURL Error #:' . $err;
} else {
  $response;


$json = json_decode($response, true);
echo $id = $json["id"];

session_start();
$_SESSION['id_sess'] = $id;

echo "<div style='background:green;padding:8px;color:white;border:none;'>Audio Processed and reidirecting in less than 5 secs...<img src='ajax-loader.gif'></div>";



echo "<script>
window.setTimeout(function() {
    window.location.href = 'index_documents.php';
}, 10000);
</script><br><br>";




}

?>