<?php //php 7.0.co.in 
//testing
ini_set('display_errors', 0);
$print=$_GET['print'];
date_default_timezone_set("Asia/Kolkata");

//add url's in the below array
 $url_list=array('https://www.google.co.in','https://www.fb.com','https://www.youtub smnd fsd nfmn nxcvxchvxjhvxjhhhdsdjfvsdfvsjdfvsjdvfsjdfvsjdfhvsjdfhvsjdfvjsdfvsjdhvcvjhxcdsfmvzbxnvcznxjhd smdf hsdfsdfsjdhvfsjdksbdfbjsdfvje.com','https://pogo.com');
  
  // add for remaining status code with relevent  message in the below in similar manner
  $statuscodes['200']='Success';
  $statuscodes['404']='Page Not Found';
  $statuscodes['302']='Temporary Redirected';
  $statuscodes['301']='Permanent Redirected';
  ?>
  <style>
	tr:nth-child(even) {background-color: #f2f2f2;}
  </style>
  <a href="checkurl.php?print=1" target="_blank"><input type="button" name="download" value="Download" /></a><br><br>
  <?php if (!$print){?>
  <?php }?>
  <table border="1px" width="100%" align="center" style="border-collapse: collapse;">
  <tr height="40px" style=" background-color: #d9d9d9;"><th >S.no.</th><th>URL</th><th>Time Stamp</th><th>Response Code</th><td style="padding-left: 50px;"><b>Result</b></td></tr>
  <?php
  $i=1;
 foreach($url_list as $row)
 {
	$handle = curl_init($row);
	curl_setopt($handle,  CURLOPT_RETURNTRANSFER, TRUE);

	/* Get the HTML or whatever is linked in $url. */
	$response = curl_exec($handle);

	/* Check for 404 (file not found). */
	$httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
	
	echo '<tr ><td width="5%" align="center">'.$i.'</td><td width="50%"><a href="'.$row.'" target="_blank">'.$row.'</a></td><td width="13%" style="font-size : 15px;"><span style="color:	#000000;"><b>'.date("dS F Y").'</b></span><span style="color: #696969;"> <b>'.date("h:i:s a").'</b></span></td><td width="10%" align="center"><b>'.$httpCode.'</b></td><td width="15%" style="padding-left: 50px;"><b>'.$statuscodes[$httpCode].'</b></td></tr>';
	curl_close($handle);
	$i++;
 }
 if($print)
 {
	header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
	header("Content-Disposition: attachment; filename=url_testing.xls");  //File name extension was wrong
	header("Expires: 0");
	/*header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	header("Cache-Control: private",false);*/
 }


?>
</table>
