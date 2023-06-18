<?php
session_start();
include 'connect.php';

$username=$_SESSION['username'];


//quiz start
if($_GET['q']== 'quiz' && @$_GET['step']== 2) {
$eid=$_GET['eid'];
$qn=$_GET['n'];
$total=$_GET['t'];
$ans=$_POST['ans'];
$qid=$_GET['qid'];
echo $total;
$q=mysqli_query($mysqli,"SELECT * FROM answers WHERE qid='$qid'");
while($row=mysqli_fetch_array($q) )
{
$ansid=$row['ansid'];
}
if($ans == $ansid)
{
$q=mysqli_query($mysqli,"SELECT * FROM quiz WHERE eid='$eid' " );
while($row=mysqli_fetch_array($q) )
{
$correct=$row['correct'];
}
if($qn == 1)
{
$q=mysqli_query($mysqli,"INSERT INTO history VALUES('$history_id','$username','$eid' ,'0','0','0','0',NOW())")or die('Error'); //restarting the wrong/correct value to 0
}
$q=mysqli_query($mysqli,"SELECT * FROM history WHERE eid='$eid' AND username='$username' ")or die('Error115');

while($row=mysqli_fetch_array($q) )
{
$history_id = $row['history_id'];
$s=$row['score'];
$r=$row['correct'];
}
$r++; //increment right answer
$s=$s+$correct;
$q=mysqli_query($mysqli,"UPDATE `history` SET `score`=$s,`level`=$qn,`correct`=$r, date= NOW()  WHERE  username = '$username' AND eid = '$eid'")or die('Error124');

} 
else
{
$q=mysqli_query($mysqli,"SELECT * FROM quiz WHERE eid='$eid' " )or die('Error129');

while($row=mysqli_fetch_array($q) )
{
$wrong=$row['wrong'];
}
if($qn == 1)
{
$q=mysqli_query($mysqli,"INSERT INTO history VALUES('$history_id','$username','$eid','0','0','0','0',NOW() )");
if (!$q) {
  $error_message = mysqli_error($mysqli);
  die('Error137: ' . $error_message);
}
}
$q=mysqli_query($mysqli,"SELECT * FROM history WHERE eid='$eid' AND username='$username' " )or die('Error139');
while($row=mysqli_fetch_array($q) )
{
$s=$row['score'];
$w=$row['wrong'];
}
$w++;
$s=$s-$wrong;
$q=mysqli_query($mysqli,"UPDATE `history` SET `score`=$s,`level`=$qn,`wrong`=$w, date=NOW() WHERE  username = '$username' AND eid = '$eid'")or die('Error147');
}
if($qn != $total) //if the current question is not the final question yet
{
$qn++; //increment question number
header("location:quiz_detail.php?q=quiz&step=2&eid=$eid&n=$qn&t=$total")or die('Error152');
}
else
{
$q=mysqli_query($mysqli,"SELECT score FROM history WHERE eid='$eid' AND username='$username'" )or die('Error156');
while($row=mysqli_fetch_array($q) )
{
$s=$row['score'];
}
$q=mysqli_query($mysqli,"SELECT * FROM rank WHERE username='$username'" )or die('Error161');
$rowcount=mysqli_num_rows($q);
if($rowcount == 0)
{
$q2=mysqli_query($mysqli,"INSERT INTO rank VALUES('$username','$s',NOW())")or die('Error165');
}
else
{
while($row=mysqli_fetch_array($q) )
{
$updated_score=$row['score'];
}
$updated_score=$s+$updated_score;
$q=mysqli_query($mysqli,"UPDATE `rank` SET `score`=$updated_score ,time=NOW() WHERE username= '$username'")or die('Error174');
}
header("location:quiz_detail.php?q=result&eid=$eid");
}
}

//restart quiz
if(@$_GET['q']== 'quizre' && @$_GET['step']== 25 ) {
$eid=@$_GET['eid'];
$n=@$_GET['n'];
$t=@$_GET['t'];
$q=mysqli_query($mysqli,"SELECT score FROM history WHERE eid='$eid' AND username='$username'" )or die('Error156');
while($row=mysqli_fetch_array($q) )
{
$s=$row['score'];
}
$q=mysqli_query($mysqli,"DELETE FROM `history` WHERE eid='$eid' AND username='$username' " )or die('Error184');
$q=mysqli_query($mysqli,"SELECT * FROM rank WHERE username='$username'" )or die('Error161');
while($row=mysqli_fetch_array($q) )
{
$sun=$row['score'];
}
$sun=$sun-$s;
$q=mysqli_query($mysqli,"UPDATE `rank` SET `score`=$sun ,time=NOW() WHERE username= '$username'")or die('Error174');
header("location:quiz_detail.php?q=quiz&step=2&eid=$eid&n=1&t=$t");
}

?>



