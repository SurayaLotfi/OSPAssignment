<?php
session_start();
    //retrieve data from database
    include "connect.php";
    
    if($_SESSION["logged_in"]){
        
        // check if a category query parameter is present
        if (isset($_GET['category'])) {
            $category = $_GET['category'];
           
            if($category == "All"){
                $sql = "SELECT * FROM posts";
            }elseif($category == "Physical Bullying"){
                $sql = "SELECT * FROM posts WHERE category = 'Physical Bullying'";
            }elseif($category == "Cyber Bullying"){
                $sql = "SELECT * FROM posts WHERE category = 'Cyber Bullying'";
            }elseif($category == "Verbal Bullying"){
                $sql = "SELECT * FROM posts WHERE category = 'Verbal Bullying'";
            }elseif($category == "Others"){
                $sql = "SELECT * FROM posts WHERE category = 'Others'";
            }elseif($category == "Most Recent"){
                $sql = "SELECT * FROM posts ORDER BY id DESC";
            }elseif($category == "Most Popular"){
                $sql = "SELECT * FROM posts ORDER BY (comments+views) DESC";
            }else{
                $sql = "SELECT * FROM posts";
            }
        } else {
            $sql = "SELECT * FROM posts";
            
        }

        $result = mysqli_query($mysqli,$sql);
        
        
        while($row = mysqli_fetch_assoc($result)){
            $post_id = $row['id'];
            ?>
            <div class="bsingle__post mb-50">
                <div class="bsingle__post-thumb">
                    
                </div>
                <div class="bsingle__content quote-post" style="background-image:url(img/bg/quote_bg.png)">
                    <div class="meta-info">
                        <ul>
                            <li><i class="far fa-user"></i>By <?php echo $row['username']?></li>
                            <li><i class="far fa-comments"></i><?php echo $row['comments']?> Comments</li>
                            <!-- <li><a href="like.php"><i class="fas fa-thumbs-up"></i><?php echo $row['likes']?> Likes</a></li> -->
                            <li><i class="fa fa-eye"></i><?php echo $row['views']?> Views</li>
                        </ul>
                    </div>
                    <h2><a href="storydetail.php?post_id=<?php echo $post_id?>"><?php echo $row['title']?></a></h2>
                        <p><?php echo $row['story']?></p>
                    <div class="blog__btn">
                    <a href="storydetail.php?post_id=<?php echo $post_id?>" class="btn">Read More</a>
                    <div class="meta-info" style="text-align: end; margin-bottom: -30px; margin-top: -30px;">
                        
                        
                            <ul>
                                <li><i class="fa fa-list-alt"></i><?php echo $row['date']?></li>
                                <li><i class="fa fa-list-alt"></i><?php echo $row['category']?></li>
                            </ul>
                        </div>
                    </div>
                </div>
                
            </div>
            <?php
        }
    }
?>