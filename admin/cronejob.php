<?php
require_once('modules/init.php');


$posts = new posts;

$callPBlogApi = $posts->callPBlogApi();

foreach ($callPBlogApi as $key => $value) {

    $author = ($value->author) ?? 'John Doe';
    $title = ($value->title) ;
    $desc = ($value->description) ;
    $url = ($value->url) ;
    $publishedAt = ($value->publishedAt) ;
    $urlToImage = ($value->urlToImage) ;
    $type = "ApiPosts";

    $count = 0;

    $escapetitle = $posts->escape_string($title);


    $escapedesc = $posts->escape_string($desc);

    $escapeauthor = $posts->escape_string($author);

    $status = 1;

    if ($posts->checkIfPostExisted($escapetitle) > 0) {


        $posts->updatePostIfExisted($publishedAt, $escapedesc, $escapetitle);

    } else {

       $savePost =  $posts->savePost($escapetitle, $urlToImage ?? 'http://placehold.it/64x64', $escapeauthor, $escapedesc, $type, $status);

       if($savePost){

        $count++;
       }
    }



}