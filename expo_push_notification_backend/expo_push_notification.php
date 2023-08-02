	<?php
	require 'Connection.php';


	function send_notification ($topic, $message)
	{
		$url = 'https://exp.host/--/api/v2/push/send';
      $fields = array(
			 'to' => $topic,
			 'title' => $message,
			 'body' => 'Hello'
			);
		$headers = array(
			'Content-Type: application/json'
			);
	   $ch = curl_init();
       curl_setopt($ch, CURLOPT_URL, $url);
       curl_setopt($ch, CURLOPT_POST, true);
       curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
       curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
       curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
       curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
       $result = curl_exec($ch);
       if ($result === FALSE) {
           die('Curl failed: ' . curl_error($ch));
       }
       curl_close($ch);
       return $result;
	}

	$conn = mysqli_connect("localhost","root","","pushnotdb");
	$sql = " Select Token From users";
	$result = mysqli_query($conn,$sql);
	$tokens = array();
	if(mysqli_num_rows($result) > 0 ){
		while ($row = mysqli_fetch_assoc($result)) {
			$tokens[] = $row["Token"];
		}
	}
	//echo $tokens[0];
	//echo sizeof($tokens);
	$i = 0;
	while ($i<sizeof($tokens)) {
		send_notification($tokens[$i], 'hello');
		$i++;
	}
			// $message_status = send_notification($tokens[0], 'hello');
			// echo $message_status.'<br>';
			// $message_status2 = send_notification($tokens[1], 'hello');
     // echo $message_status2;

	?>
