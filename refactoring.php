<?php 
    require_once 'db.php';

    //validation d'un article
    function ValidatePost($post){
        $errors = array();
        if(empty($post['author'])){
            array_push($errors,'Veuillez écrire votre nom');
        }
        if(empty($post['title'])){
            array_push($errors, 'Un titre est demandé');
        }
        if(empty($post['content'])){
            array_push($errors, 'Le corps de l\'article est demandé');
        }
        return $errors;
    }

    //récupération de tous les articles dans la base
    function selectAll(){
        global $pdo;
        $results = $pdo->query('SELECT * FROM posts ORDER BY created_at DESC LIMIT 0,3');
        $posts = $results->fetchAll();
        return $posts;
    }

    //Récupération d'un article grâce à son id
    function selectOne($id){
        global $pdo;
        $query = $pdo->prepare('SELECT * FROM posts WHERE id = :post_id');
        $query->execute(array('post_id'=>$id));
        $post = $query->fetch();
        return $post;
    }

    //Enregistrement d'un article
    function create($author,$title,$content,$image){
        global $pdo;
        $query = $pdo->prepare('INSERT INTO posts(author,tittle,content,image,created_at) VALUES (:author,:title,:contenu,:image,NOW())');
        $query->execute([
            'author' => $author,
            'title' => $title,
            'content' => $content,
            'image' => $image
        ]);
    }


?>