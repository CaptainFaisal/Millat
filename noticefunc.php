<?php
function getnotice(){
	require("Notice_board/includes/db.php");
	$sql="SELECT `Title` , `Files`, `mydate`, DAY(mydate) AS `day`, SUBSTR(MONTHNAME(mydate),1,3) AS `month` FROM notices ORDER BY id DESC LIMIT 12";
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
                        <p>'.$ns['month'].'</p>
                        <h1>'.$ns['day'].'</h1>
                    </div>
                    <div class="events">
                        <a href="Notice_board/'.$ns['Files'].'" target="_blank"><p>'.$ns['Title'].'
                        </p></a>
                    </div>
                  </div>';
		}
	}

	mysqli_close($con);
}

// news notice

function getnews(){
	require("Notice_board/includes/db.php");
	$sql="SELECT `Title` , `Files` FROM notices ORDER BY id DESC LIMIT 4";
	if ($result=mysqli_query($con,$sql))
	{	
      	//count number of rows in query result
		$rowcount=mysqli_num_rows($result);
      	//if no rows returned show no posts alert
		if ($rowcount==0) {
      		# code...
			echo 'No News To Fetch';
		}
      	//if there are rows available display all the results
		foreach ($result as $news => $nw) {
      	# code...
			echo '<div class="cover-pop">
					<i class="far fa-hand-point-right"> </i>
					<a href="'.$ns['Files'].'" target="_blank"><p>'.$nw['Title'].'</p></a>
				  </div>';
		}
	}

	mysqli_close($con);
}

?>