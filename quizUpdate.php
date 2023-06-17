<?php
session_start();
include 'connect.php';

$username=$_SESSION['username'];
//delete feedback
// if(isset($_SESSION['key'])){
// if(@$_GET['fdid'] && $_SESSION['key']=='sunny7785068889') {
// $id=@$_GET['fdid'];
// $result = mysqli_query($con,"DELETE FROM feedback WHERE id='$id' ") or die('Error');
// header("location:dash.php?q=3");
// }
// }

//delete user
// if(isset($_SESSION['key'])){
// if(@$_GET['demail'] && $_SESSION['key']=='sunny7785068889') {
// $demail=@$_GET['demail'];
// $r1 = mysqli_query($con,"DELETE FROM rank WHERE email='$demail' ") or die('Error');
// $r2 = mysqli_query($con,"DELETE FROM history WHERE email='$demail' ") or die('Error');
// $result = mysqli_query($con,"DELETE FROM user WHERE email='$demail' ") or die('Error');
// header("location:dash.php?q=1");
// }
// }
//remove quiz
// if(isset($_SESSION['key'])){
// if(@$_GET['q']== 'rmquiz' && $_SESSION['key']=='sunny7785068889') {
// $eid=@$_GET['eid'];
// $result = mysqli_query($con,"SELECT * FROM questions WHERE eid='$eid' ") or die('Error');
// while($row = mysqli_fetch_array($result)) {
// 	$qid = $row['qid'];
// $r1 = mysqli_query($con,"DELETE FROM options WHERE qid='$qid'") or die('Error');
// $r2 = mysqli_query($con,"DELETE FROM answer WHERE qid='$qid' ") or die('Error');
// }
// $r3 = mysqli_query($con,"DELETE FROM questions WHERE eid='$eid' ") or die('Error');
// $r4 = mysqli_query($con,"DELETE FROM quiz WHERE eid='$eid' ") or die('Error');
// $r4 = mysqli_query($con,"DELETE FROM history WHERE eid='$eid' ") or die('Error');

// header("location:dash.php?q=5");
// }
// }

//add quiz
// if(isset($_SESSION['key'])){
// if(@$_GET['q']== 'addquiz' && $_SESSION['key']=='sunny7785068889') {
// $name = $_POST['name'];
// $name= ucwords(strtolower($name));
// $total = $_POST['total'];
// $sahi = $_POST['right'];
// $wrong = $_POST['wrong'];
// $time = $_POST['time'];
// $tag = $_POST['tag'];
// $desc = $_POST['desc'];
// $id=uniqid();
// $q3=mysqli_query($con,"INSERT INTO quiz VALUES  ('$id','$name' , '$sahi' , '$wrong','$total','$time' ,'$desc','$tag', NOW())");

// header("location:dash.php?q=4&step=2&eid=$id&n=$total");
// }
// }

// //add question
// if(isset($_SESSION['key'])){
// if(@$_GET['q']== 'addqns' && $_SESSION['key']=='sunny7785068889') {
// $n=@$_GET['n'];
// $eid=@$_GET['eid'];
// $ch=@$_GET['ch'];

// for($i=1;$i<=$n;$i++)
//  {
//  $qid=uniqid();
//  $qns=$_POST['qns'.$i];
// $q3=mysqli_query($con,"INSERT INTO questions VALUES  ('$eid','$qid','$qns' , '$ch' , '$i')");
//   $oaid=uniqid();
//   $obid=uniqid();
// $ocid=uniqid();
// $odid=uniqid();
// $a=$_POST[$i.'1'];
// $b=$_POST[$i.'2'];
// $c=$_POST[$i.'3'];
// $d=$_POST[$i.'4'];
// $qa=mysqli_query($con,"INSERT INTO options VALUES  ('$qid','$a','$oaid')") or die('Error61');
// $qb=mysqli_query($con,"INSERT INTO options VALUES  ('$qid','$b','$obid')") or die('Error62');
// $qc=mysqli_query($con,"INSERT INTO options VALUES  ('$qid','$c','$ocid')") or die('Error63');
// $qd=mysqli_query($con,"INSERT INTO options VALUES  ('$qid','$d','$odid')") or die('Error64');
// $e=$_POST['ans'.$i];
// switch($e)
// {
// case 'a':
// $ansid=$oaid;
// break;
// case 'b':
// $ansid=$obid;
// break;
// case 'c':
// $ansid=$ocid;
// break;
// case 'd':
// $ansid=$odid;
// break;
// default:
// $ansid=$oaid;
// }


// $qans=mysqli_query($con,"INSERT INTO answer VALUES  ('$qid','$ansid')");

//  }
// header("location:dash.php?q=0");
// }
// }

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



