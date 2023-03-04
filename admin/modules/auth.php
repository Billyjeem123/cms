<?php 


class Auth extends db{




    public function tryLogin(string $username, string $pword){

        $sql = "SELECT * FROM tblusers WHERE name = '$username' AND pword = '$pword' ";
        $query = $this->query($sql);
        return $query;

       

    }
    public function outputData($icon = 'error', $title = 'null', $text = 'null'){

        echo "<script>
             Swal.fire({
                 icon: $icon,
                 title: $title,
                 text: $text
             })
         </script>";
     }


}