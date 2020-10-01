<?php
function getnotice(){
	require("Notice_board/includes/db.php");
	$sql="SELECT * FROM notices ORDER BY id ASC LIMIT 12";
	if ($result=mysqli_query($con,$sql))
	{
      	//count number of rows in query result
		$rowcount=mysqli_num_rows($result);
      	//if no rows returned show no posts alert
		if ($rowcount==0) {
      		# code...
			echo 'No Notice To Fetch';
		}
      	//if there are rows available display all the results
		foreach ($result as $notices => $ns) {
      	# code...
			echo '<div class="event_item ">
                    <div class="dates">
                        <p>july</p>
                        <h1>7</h1>
                    </div>
                    <div class="events">
                        <a href="Notice_board/'.$ns['Files'].'"><p>'.$ns['Title'].'
                        </p></a>
                    </div>
                  </div>';
		}
	}

	mysqli_close($con);
}

?>