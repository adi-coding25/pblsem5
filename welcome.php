
<link rel="stylesheet" href="form.css">
<?php session_start(); ?>
<div class="body content">
    <div class="welcome">
        <div class="alert alert-success"><?= $_SESSION['message'] ?></div>
        
		<img src="<?= $_SESSION['avatar'] ?>"><br />
		
        Welcome <span class="user"><?= $_SESSION['username'] ?></span>
        <?php
        $mysqli = new mysqli("localhost", "root", "sid", "pbldb");
        //Select queries return a resultset
        $sql = "SELECT username, avatar FROM pbldb";
        $result = $mysqli->query($sql); //$result = mysqli_result object
        //var_dump($result);
        ?>
        <div id='registered'>
        <span>All registered users:</span>
        <?php
        while($row = $result->fetch_assoc()){ //returns associative array of fetched row
            //echo '<pre>';
            //print_r($row);
            //echo '</pre>';
            echo "<div class='userlist'><span>$row[username]</span><br />";
            echo "<img src='".$row['avatar']."'></div>";
		
        }
        ?>  
        </div>
    </div>
</div>
