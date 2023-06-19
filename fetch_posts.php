<html>
    <head>
        <body>

 
<?php
session_start();
    //retrieve data from database
    include "connect.php";
    
    if($_SESSION["logged_in"]){
        $username = $_SESSION['username'];
        
        // check if a category query parameter is present
        if (isset($_GET['category'])) {
            $category = $_GET['category'];
           
            if($category == "All"){
                $sql = "SELECT * FROM posts";
            }elseif($category == "Physical Bullying"){
                $sql = "SELECT * FROM posts WHERE category = 'Physical Bullying'";
                $resulttemp = mysqli_query($mysqli, $sql);
                if(mysqli_num_rows($resulttemp) == 0){
                    echo "<h3>  No posts yet. </h3>";
                }
            }elseif($category == "Cyber Bullying"){
                $sql = "SELECT * FROM posts WHERE category = 'Cyber Bullying'";
                $resulttemp = mysqli_query($mysqli, $sql);
                if(mysqli_num_rows($resulttemp) == 0){
                    echo "<h3>  No posts yet. </h3>";
                }
            }elseif($category == "Verbal Bullying"){
                $sql = "SELECT * FROM posts WHERE category = 'Verbal Bullying'";
                $resulttemp = mysqli_query($mysqli, $sql);
                if(mysqli_num_rows($resulttemp) == 0){
                    echo "<h3>  No posts yet. </h3>";
                }
            }elseif($category == "Others"){
                $sql = "SELECT * FROM posts WHERE category = 'Others'";
                $resulttemp = mysqli_query($mysqli, $sql);
                if(mysqli_num_rows($resulttemp) == 0){
                    echo "<h3>  No posts yet. </h3>";
                }
            }elseif($category == "Most Recent"){
                $sql = "SELECT * FROM posts ORDER BY id DESC";
            }elseif($category == "Most Popular"){
                $sql = "SELECT * FROM posts ORDER BY (comments+views) DESC";
            }elseif($category == "My Posts"){
                $sql = "SELECT * FROM posts WHERE username = '$username'";
                $resulttemp = mysqli_query($mysqli, $sql);
                if(mysqli_num_rows($resulttemp) == 0){
                    echo "<h3> You have no posts yet. </h3>";
                }
            }else {
            $sql = "SELECT * FROM posts"; 
        }

        $result = mysqli_query($mysqli,$sql);
        if($result){
            
        while($row = mysqli_fetch_assoc($result)){
            $post_id = $row['id'];
            $post_username = $row['username']; //getting the current post's username
            ?>
                    <!--Delete Modal-->
            <!-- Modal for delete -->
            <div class="modal fade custom-modal" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body"> 
                <form action="delete_post.php" method="post" enctype="multipart/form-data" >
                    <input type = "text" name="post_id" id="post_id">
                    <!-- <input type = "hidden" name="delete_id" id="delete_id"> -->
                    <div style="margin: 50px">
                        <h3>Are you sure you want to delete your post?</h3>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button  type="submit" class="btn btn-info"  name="delete">Delete</button>

                    </form>
                </div>
                </div>
            </div>
            </div>
            <div class="bsingle__post mb-50">
                <div class="bsingle__post-thumb">
                    
                </div>
                <div class="bsingle__content quote-post" style="background-image:url(img/bg/quote_bg.png)">
                    <div class="meta-info">
                        <ul>
                             <li style="display: none;"><input type="hidden" class="post-id" value="<?php echo $post_id; ?>"></li>
                            <li><i class="far fa-user"></i>By <?php echo $row['username']?></li>
                            <li><i class="far fa-comments"></i><?php echo $row['comments']?> Comments</li>
                            <!-- <li><a href="like.php"><i class="fas fa-thumbs-up"></i><?php echo $row['likes']?> Likes</a></li> -->
                            <li><i class="fa fa-eye"></i><?php echo $row['views']?> Views</li>
                            <?php if($post_username == $_SESSION['username']){ ?>
                                <li><i class="fas fa-edit"></i><a href="edit_post.php?post_id=<?php echo $post_id; ?>">Edit</a></li>
                                <li><i class="fa fa-trash" aria-hidden="true"></i><a href="#" class='delete-post'>Delete</a></li>
                            <?php 
                                 }
                            ?>
                        </ul>
                    </div>
                    <!--cutting the display to show only the first 20 words-->
                    <?php
                                $story = $row["story"];
                                $words = explode(" ", $story);
                                $truncatedContent = implode(" ", array_slice($words, 0, 20));
                        
                                // Add ellipsis if the content has more than 10 words
                                if (count($words) > 10) {
                                    $truncatedContent .= "...";
                                }
                        ?>
                        <h2 class="post-title"><?php echo $row['title']; ?></h2>
                        <p class="post-story"><?php echo $truncatedContent; ?></p>
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
        }else{
        }
    }
 }
?>

    <script>
            $(document).ready(function() {
                var scrollPosition; // Variable to store the scroll position

                $('.delete-post').on('click', function() {
                    // Store the current scroll position
                    scrollPosition = $(window).scrollTop();

                    // Show the modal
                    $('#deletemodal').modal('show');

                    // Retrieve the post ID
                    var postId = $(this).closest('.bsingle__post').find('.post-id').val();
                    $('#post_id').val(postId);
                });

                $('#deletemodal').on('hidden.bs.modal', function() {
                    // Restore the scroll position after the modal is closed
                    $(window).scrollTop(scrollPosition);
                });
                });
    </script>

        </body>
    </head>
</html>
