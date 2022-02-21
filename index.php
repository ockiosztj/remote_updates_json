<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test</title>
</head>
<body>
    <div id="data"></div>    

    <?php
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "https://jsonplaceholder.typicode.com/posts");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        curl_close($curl);
        $result = json_decode($result, true);

        if(is_array($result)) {
            $data = json_encode($result);
            file_put_contents('data.json', $data);
        }else{
            $data = file_get_contents('./data.json');            
        }
    ?>

    <script>
        var $data = <?=file_get_contents('./data.json')?>;
        for (let index = 0; index < $data.length; index++) {
            document.getElementById('data').innerHTML += '<p>'+$data[index]['title']+'</p>';
        }
    </script>
</body>
</html>