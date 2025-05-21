<?php

include("dbconnect.php");
extract($_REQUEST);

$rdate=date("d-m-Y");
$ch1=mktime(date('h')+5,date('i')+30,date('s'));
$rtime=date('h:i:s A',$ch1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function(){
    // Function to reload specific content via AJAX
    function reloadContent() {
        $.ajax({
            url: 'travel.php', // URL to fetch updated content
            type: 'GET',
            success: function(data) {
                // Create a new element with the updated content
                var $newContent = $('<div>').html(data);
                // Replace the existing content with the new content
                $('#contentToUpdate').replaceWith($newContent);
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
            }
        });
    }

    // Reload content every 10 seconds
    setInterval(reloadContent, 10000);
});
</script>
</head>

<body>
<div id="contentToUpdate">
<?php
$lt_ar1=array("0.330930","0.330930","1.561207","4.772669","4.947818","7.481456","7.916947","3.843671","3.141856");
$ln_ar1=array("75.500563","81.125563","80.246657","76.344317","77.662676","91.373614","90.406817","83.059157","84.992751");


$fp=fopen("det.txt","r");
$v=fread($fp,filesize("det.txt"));
fclose($fp);

$n=$v+1;



if($n<=24)
{
$fp=fopen("det.txt","w");
fwrite($fp,$n);
fclose($fp);
}
else
{
$n=rand(1,3);
$fp=fopen("det.txt","w");
fwrite($fp,$n);
fclose($fp);
}

	if($n<=20)
	{
	$rr=rand(0,4);
	$lat=$lt_ar1[$rr];
	$lon=$ln_ar1[$rr];
	
	}
	else if($n<=22)
	{
	$rr=rand(5,6);
	$lat=$lt_ar1[$rr];
	$lon=$ln_ar1[$rr];
	
	}
	else if($n<=24)
	{
	$rr=rand(7,8);
	$lat=$lt_ar1[$rr];
	$lon=$ln_ar1[$rr];
	
	}
	
	$la=explode(".",$lat);
	$rn=rand(1,100);
	$la2=$la[1]+$rn;
	$lat1=$la[0].".".$la2;
	
	
	$lo=explode(".",$lon);
	$rn=rand(1,100);
	$lo2=$lo[1]+$rn;
	$lon1=$lo[0].".".$lo2;
	
	
	$q1=mysqli_query($connect,"select * from fm_admin");
	$r1=mysqli_fetch_array($q1);
	$tid=$r1['tid'];
	
	$q2=mysqli_query($connect,"select * from fm_trip where id='$tid'");
	$r2=mysqli_fetch_array($q2);
	
	$q3=mysqli_query($connect,"select * from fm_fisher where uname='".$r2['fisher_id']."'");
	$r3=mysqli_fetch_array($q3);
	$name=$r3['name'];
	$mobile=$r3['mobile'];
	$fid=$r3['uname'];
	
	$q4=mysqli_query($connect,"select * from fm_authority order by id desc");
	$r4=mysqli_fetch_array($q4);
	$name2=$r4['name'];
	$mobile2=$r4['mobile'];
	
	$status="-";
	$loc=$lat1.", ".$lon1;
	?>
	
	<h3>Location: <?php echo $lat1.", ".$lon1; ?></h3>
	<?php
	if($n>=21 && $n<=22)
	{
	$mm=array("Maritime Depth Detected","Underwater Rock Detected");
	$ms=rand(1,2);
	$m2=$ms-1;
	$mess=$mm[$m2];
	$status=$mm[$m2];
	$mess2="Fisher ID: ".$fid.", ".$mess;
	
	
	echo '<iframe src="http://iotcloud.co.in/testsms/sms.php?sms=emr&name='.$name.'&mess='.$mess.'&mobile='.$mobile.'" width="10" height="10" frameborder="0"></iframe>'; 
	
	echo '<iframe src="http://iotcloud.co.in/testsms/sms.php?sms=emr&name='.$name2.'&mess='.$mess2.'&mobile='.$mobile2.'" width="10" height="10" frameborder="0"></iframe>'; 

	
	}
	if($n>=23 && $n<=24)
	{
	$status="Cross the Border";
	$mess="Cross the Border";
	$mess2="Fisher ID: ".$fid.", Cross the Border";
	
		echo '<iframe src="http://iotcloud.co.in/testsms/sms.php?sms=emr&name='.$name.'&mess='.$mess.'&mobile='.$mobile.'" width="10" height="10" frameborder="0"></iframe>'; 
	
	echo '<iframe src="http://iotcloud.co.in/testsms/sms.php?sms=emr&name='.$name2.'&mess='.$mess2.'&mobile='.$mobile2.'" width="10" height="10" frameborder="0"></iframe>'; 

	}
	
	if($n>20)
	{
	$mq=mysqli_query($connect,"select max(id) from fm_history");
$mr=mysqli_fetch_array($mq);
$id=$mr['max(id)']+1;


	$qry=mysqli_query($connect,"insert into fm_history(id,fisher,tid,location,status,rdate,rtime) values($id,'$fid','$tid','$loc','$status','$rdate','$rtime')");
	}
	
	$q4=mysqli_query($connect,"select * from fm_history where tid='$tid' order by id desc");
	$n4=mysqli_num_rows($q4);
	if($n4>0)
	{
	?>
	<table border="1">
	<tr>
		<td>Location</td>
		<td>Status</td>
		<td>Date/Time</td>
	</tr>	
	<?php
	while($r4=mysqli_fetch_array($q4))
	{
	?>
	<tr>
		<td><?php echo $r4['location']; ?></td>
		<td><?php echo $r4['status']; ?></td>
		<td><?php echo $r4['rdate']." ".$r4['rtime']; ?></td>
	</tr>
	<?php
	}
	?>
	</table>
	<?php
	}
	?>
	
	
</div>
</body>
</html>
