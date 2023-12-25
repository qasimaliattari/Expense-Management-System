<?php

function prx($data){
    echo "<pre>";
    print_r($data);
    die();
}

function get_safe_value($data){
    if($data){
        global $con;
        return mysqli_real_escape_string($con , $data);
    }
}

function redirect($link){
    ?>
    <script>
        window.location.href = "<?php echo $link ?>";
    </script>
<?php } ?>

<?php

function checkUser(){
    if(isset($_SESSION['UID']) && $_SESSION['UID'] != ''){

    }else{
       redirect('login.php');
    }
}



?>