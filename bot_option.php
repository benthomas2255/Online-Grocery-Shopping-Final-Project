<?php
include('includes/config.php');
session_start();

// getting input button value through ajax
$getMesg = mysqli_real_escape_string($con, $_POST['btn']);
$_SESSION['btn']=$getMesg;

// echo $getMesg;

//checking user query to database query
if($getMesg =='Others'){
    $opid="5";
}
else{
    $check_data = "SELECT * FROM chat_optn WHERE options LIKE '%$getMesg%'";
    $run_query = mysqli_query($con, $check_data) or die("Error");
    $ro=mysqli_fetch_array($run_query);
    $opid=$ro['op_id'];
    $lcheck=$ro['link'];
    // echo    $lcheck;
}
// if ($lcheck == "1" ){
    // $opnid=$ro['op_id'];
    // $quer2="select * from chat_link where op_id='$opnid'";
    // $resul2=mysqli_query($con,$quer2);
    // $ro2=mysqli_fetch_array($resul2);
    // $link=$ro2['link'];
    // header("location:../$link");
// }

$quer="select * from chat_qstn where from_optn='$opid'";
$resul=mysqli_query($con,$quer);
$ro=mysqli_fetch_array($resul);
$replay=$ro['question'];
$cqid=$ro['cq_id'];
echo <<<alan
        <div class="bot-inbox inbox">
            <div class="icon">
                <i class="fas fa-user"></i>
            </div>
            <div class="msg-header">
                <p>$replay</p>
                    <div class="msg-optn">
alan;

$query="select * from chat_optn where cq_id='$cqid'";
$result=mysqli_query($con,$query);
$bt=0;
while($row=mysqli_fetch_array($result)){
    $bt++;
    // echo "<input class=\"option-btn\" id=\"$bt\" name=\"btn\" type=\"button\" value=\"".$row['options']."\">&nbsp";
    $lcheck=$row['link'];
    // echo    $lcheck;
    if ( $lcheck == "1" ){
        $opnid=$row['op_id'];
        $quer2="select * from chat_link where op_id='$opnid'";
        $resul2=mysqli_query($con,$quer2);
        $ro2=mysqli_fetch_array($resul2);
        $link=$ro2['link'];
        echo "<input onClick=\"parent.location='$link'\"class=\"option-btn\" id=\"$bt\" name=\"btn\" type=\"button\" value=\"".$row['options']."\">&nbsp";
    }
    else{
        echo "<input class=\"option-btn\" id=\"$bt\" name=\"btn\" type=\"button\" value=\"".$row['options']."\">&nbsp";
    }
}

if($opid !="5"){
    $query="select * from chat_optn where op_id='5'";
    $result=mysqli_query($con,$query);
    while($row=mysqli_fetch_array($result)){
        $bt++;
        echo "<input class=\"option-btn\" id=\"$bt\" name=\"btn\" type=\"button\" value=\"".$row['options']."\">&nbsp";
    }
}
echo    "</div></div></div>";

?>