<!-- Consider an existing file that has some data. Write down the code to validate the data on the server side.
• Read the file. If the file text contains the word "VIT" in any case, then the entire data should be encrypted using a substitution cipher.
• In a substitution cipher, every letter is substituted by the alphabet.
• Every alphabet is substituted by 10 characters forward, so the alphabet A is substituted with K, the alphabet B is substituted with L, and so on. When the end is reached, it is circled back to the starting point, R is substituted by A, and so on.
• Write the encoded text to a different file and use the current date and time as part of the file name.
Display the encrypted data, file name and size to the user. -->

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
        echo "Encrypted data: $data";
        echo "<br>File name: $filename";
        echo "<br>File size: ".filesize($filename);
    } else {
        echo "No data to encrypt";
    }
?>