
<?php
if (!empty($_GET['user'])) {

$user_url=$_GET['user'];
 
$username1=substr($user_url, 26);
//echo $username1;

$url = 'https://' .
        'www.instagram.com/' .
         $username1.'/'.
	'?__a=1';

    $user_json = file_get_contents($url);
    $user_array = json_decode($user_json, true);
 // echo $user_json;
 $userid = $user_array['user']['id'];
//    echo $userid;

$result_url =  'https://' .
        'api.instagram.com/v1/users/' .
         $userid.'/?'.
	'access_token=6675932046.25c23cb.378f5a006cfe4523a471893415fb4808';
	$result_json = file_get_contents($result_url);
    	$result_array = json_decode($result_json, true);
//echo $result_json;
$post=$result_array['data']['counts']['media'];
$followers=$result_array['data']['counts']['followed_by'];
$followed=$result_array['data']['counts']['follows'];
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>test</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
 			
   
</head>
<body>
<span> User web Url: </span>
<form action="" method="get">
    <input type="text" name="user" placeholder="your instagram url">

<h1></h1>
<button type="submit">Submit</button>
</form>
<br/>

<?php

echo '<br/>Total number of posts : '.$post;
echo '<br/>Total number of followers : '.$followers;
echo '<br/>Total number of followong : '.$followed;

?>
</body>
</html>
