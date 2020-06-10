<?php
if($_POST['item'] !== ''){
$con = mysqli_connect('localhost','root','');
$db = mysqli_select_db($con,'search');

?>
 <!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="StyleSheet1.css" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://use.fontawesome.com/a49d136066.js"></script>
    <title>search bar</title>
</head>
<body>
	<form action="search.php" meathod="POST" id="searchForm">
    <div class="search-box">
        <input class="search-txt" type="text" name="item" id="searchBox" placeholder="Type to Search" />

        <a class="search-btn" href="#">    
        <i style="font-size:20px;" class="fab fa-searchengin">


        </i> </a>
        <?php

        $query = mysqli_query($con,"SELECT * FROM products where title LIKE '%$item%' OR description LIKE '%$item%' ");
        $num_rows = mysqli_num_rows($query);

        while($row = mysqli_fetch_array($query)){
        	$id = $row['id'];
        	$title = $row['title'];
        	$dec = $row['description'];
        	echo '<div><p>' . $title . ' </br>' . $dec . '</p></div></br>';
  }
        
        ?>
          
    </div>
    </form>
</body>
</html>
<?php
}
?>