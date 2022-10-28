<?php
    $filename = "data.txt";
    $file = fopen($filename, "r");
    $data = fread($file, filesize($filename));
    fclose($file);
    $data = strtoupper($data);
    if(strpos($data, "VIT") == true){
        for($i = 0; $i < strlen($data); $i++){
            $char = $data[$i];
            if($char >= 'A' && $char <= 'Z'){
                $char = chr(ord($char) + 10);
                if($char > 'Z'){
                    $char = chr(ord($char) - 26);
                }
            }
            $data[$i] = $char;
        }
        $filename = date("Y-m-d-H-i-s").".txt";
        $file = fopen($filename, "w");
        fwrite($file, $data);
        fclose($file);
        echo "<h1>Encrypted data: <h2>$data";
        echo "<br><h1>File name: <h2>$filename";
        echo "<br><h2>File size: " . filesize($filename);
    } else {
        echo "<h1>No data to encrypt";
    }
?>