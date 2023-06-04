<?php
// Include the database connection file
require_once 'connect.php';


//retrieve stories from database with adding pagination
//limit the table by showing only 4 rows per page
//define first in order to make it dynamic
$start = 0;
$rows_per_page=4;


// get the total number of rows
$records = $mysqli -> query("SELECT * FROM stories");
$nr_of_rows = $records -> num_rows;

//calculation the number of pages
$pages = ceil($nr_of_rows/$rows_per_page);

//if the user clicks on the pagination buttons we set a new starting point
    if(isset($_GET['page-nr'])){
        $page = $_GET['page-nr'] -1;
        $start = $page * 4;
    }

$results = $mysqli -> query("SELECT * FROM stories LIMIT $start, $rows_per_page "); 
//if kita buat terus LIMIT 0,4.. this means dia mmg amik row 0 ngan 4 je. so thats whyyyyy

$most_popular = $mysqli -> query("SELECT*FROM stories ORDER BY ")
      

  ?>

