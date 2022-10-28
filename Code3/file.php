<?php
    if(isset($_POST['submit'])){
        $pid = $_POST['pid'];
        $pname = $_POST['pname'];
        $pcat = $_POST['pcat'];
        $pdesc = $_POST['pdesc'];
        $pimp = $_POST['pimp'];
        $pprice = $_POST['pprice'];
        $poc = $_POST['poc'];
        $pid = substr($pid, 0, 3);
        if ($pid == 'PID'){
            echo "<script>alert('Product ID is valid')</script>";
        }else{
            echo "<script>alert('Product ID is invalid')</script>";
        }
        if (preg_match("/^[a-zA-Z ]*$/", $pname)){
            echo "<script>alert('Product Name is valid')</script>";
        }else{
            echo "<script>alert('Product Name is invalid')</script>";
        }
        if (preg_match("/^[a-zA-Z0-9]*$/", $pdesc)){
            echo "<script>alert('Product Description is valid')</script>";
        }else{
            echo "<script>alert('Product Description is invalid')</script>";
        }
        if (preg_match("/^[0-9]*$/", $pprice)){
            echo "<script>alert('Price is valid')</script>";
        }else{
            echo "<script>alert('Price is invalid')</script>";
        }
        if (preg_match("/^[a-zA-Z ]*$/", $poc)){
            echo "<script>alert('Origin Country is valid')</script>";
        }else{
            echo "<script>alert('Origin Country is invalid')</script>";
        }
    }