<?php
$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://dog.ceo/api/breeds/list/all",
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
<form method = "POST" action="dog_pics.php">
    <select name = "dog">
        <?php foreach ($response[message] as $key => $value) {?>
            <option> <?php echo $key ."\n"; ?></option>
        <?php } ?>
    </select>
    <button type="submit">Submit</button>
</form>
</body>
</html>