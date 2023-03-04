<?php


class Posts extends db
{



    public function checkIfPostExisted(string $title)
    {


        $sql = " SELECT * FROM tblposts WHERE title = '{$title}'";
        $query = $this->query($sql);
        $rows = $this->checkRows($query);
        return $rows;
    }


    public function updatePostIfExisted(mixed $date, string $desc, string $title)
    {

        $sql = " UPDATE tblposts SET date = '{$date}', description = '{$desc}' WHERE title = '{$title}' ";
        $query = $this->query($sql);
    }


    public function savePost(string $title, string $image, string $username, string $desc, string $type, mixed $status)
    {

        $sql = " INSERT INTO tblposts(title ,image,username, body, type, status) ";
        $sql .= " VALUES('$title', '$image', '$username', '$desc', '$type', '$status')";
        $query = $this->query($sql);

        return true;
    }

    public function callPBlogApi()
    {

        $url = "https://newsapi.org/v2/top-headlines?country=us&apiKey=8b1fd087aa184e6295b278d363c0e001";
        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_USERAGENT => 'Lydia'
        ]);

        $response = curl_exec($ch);

        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);

        $json = json_decode($response);

        $array = (array) $json->articles;

        return $array;
        # code...
    }


    public function postStatus($status)
    
{

    if($status == 1){

        return "Approved";
    }elseif($status == 2){

        return "Pending";
    }else{

        return "Dissapproved";
    }

    }

    public function fetchAllPosts()
    {

        $sql = " SELECT * FROM tblposts where status = 1 ";
        $query = $this->query($sql);
        return $query;
    }


    public function paginationPost($page_1, $per_page)
    {

        $sql = " SELECT * FROM tblposts where status = 1  LIMIT $page_1, $per_page";
        $query = $this->query($sql);
        return $query;
    }

    public function getCommentCount(int $id)
    {

        $sql = " SELECT id FROM tblcomment where postid = '{$id}' ";
        $query = $this->query($sql);
        $row = $this->checkRows($query);
        return $row;
    }

    public function fetchAllPendingPosts()
    {

        $sql = " SELECT * FROM tblposts WHERE status = 2 ";
        $query = $this->query($sql);
        return $query;
    }

    public function updateViews( mixed $id)
    {

        $sql = " UPDATE tblposts SET views  = views + 1 WHERE id = '{$id}' ";
        $query = $this->query($sql);
        return $query;
    }

    public  function preetyUrl(string $string)
    {
        $slug = preg_replace('/[^a-z0-9-]+/', '-', trim(strtolower($string)));
        return $slug;
    }


    public function getPostById(mixed $id)
    {

        $sql = " SELECT * FROM tblposts  WHERE id = '{$id}'  ";
        $query = $this->query($sql);
        return $query;
    }




    public function getPostByUser(string $username)
    {

        $sql = " SELECT * FROM tblposts  WHERE username = '{$username}'  ";
        $query = $this->query($sql);
        return $query;
    }



    public function createCategory( string $catname){

        $sql = " INSERT INTO tblcategory(name)";
        $sql .= " VALUES('$catname')";
        $query = $this->query($sql);
        return $query;

    }


    public function createComment(int $postid, string $body, int $time, string $username)
    {

        $sql = " INSERT INTO tblcomment(postid ,body ,time, username) ";
        $sql .= " VALUES('$postid', '$body', '$time', '$username')";
        $query = $this->query($sql);

        return $query;
    }


    public function getCommentPost(mixed $postid)
    {


        $sql = "SELECT * FROM tblcomment WHERE postid = '{$postid}'";
        $sql .= "ORDER BY id DESC";
        $query = $this->query($sql);
        return $query;
    }


    public function getAllCategories()
    {


        $sql = "SELECT * FROM tblcategory  ORDER BY id  DESC";
        $query = $this->query($sql);
        return $query;
    }


    public function fetchAllCategory(){

        $sql = "SELECT * FROM tblcategory";
        $query = $this->query($sql);
        return $query;

    }

    public function outputData($icon = null, $title = null, $text = null){

       echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Invalid',
                text: 'Input Fields Cant Be Empty'
            })
        </script>";
    }
}
