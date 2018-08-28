<?php
$doggy = $_POST['dog'];

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://dog.ceo/api/breed/$doggy/images/random",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
        "cache-control: no-cache"
    ),
));
$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

$response = json_decode($response, true);
?>
<html>
<body>
<a href="<?php echo $response[message]?>">click here to view the dog <?php echo $doggy ?></a>
</body>
</html>
