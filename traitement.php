<?php 
//Traitement de single.php

$id='';
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }

    $post = selectOne($id);
    $comments = findAllComments($id);
        //Supression d'un commentaire

        if(isset($_GET['delete'])){

            $id = $_GET['delete'];
            deleteCom($id);
            header('Location:single.php?id='.$_GET['id']);
        exit();
        }

//Sauvegarde d'un commentaire
if(isset($_POST['add-comment'])){
    if(!empty($_POST['auteur']) && !empty($_POST['comment'])) {
        $author = $_POST['auteur'];
        $comment = $_POST['comment'];
        $id = $_POST['id'];

        saveComment($author,$id,$comment);
        header('Location:single.php?id='.$_POST['id']);
        exit();
    }
}


?>