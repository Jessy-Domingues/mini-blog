<?php 
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $dbname = 'mblog';

    $pdo = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=utf8',$user,$pass,[
      PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
?>