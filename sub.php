<html>
<body bgcolor=#ccccff>
	<h1> Select the subject code to give feedback</h1>
	<b>Note : </b>Feedback can be given one by one for each subject by selecting their particular subject code<br>
	<hr><br>
	<b>These are the subject code and its name available for your section</b>(for student's reference...)<br>
	<br><br>

	
	
	
	<?php
	if(isset($_POST["reg"]))
	{
	$dept=$_POST["dept"];
	$type=$_POST["type"];
	$dept="'$dept'";
	$type="'$type'";
	$rego=$_POST["reg"];


	$dbname="feedback";
	$host="localhost";
	$user="root";
	$password="";
	$con=mysqli_connect($host,$user,$password,$dbname);
	$q="select sub_code,sub_name from subject_master where department=$dept and term=$type";
	$x=mysqli_query($con,$q);
	?>
	<center>
	<table border=1 cellpadding=10>
	<?php
	if (mysqli_num_rows($x) > 0) 
	{
    
    	while($row = mysqli_fetch_assoc($x)) 
    	{
    		?>
    		
    			<tr>
    				<td><?php echo $row["sub_code"] ?></td>
    				<td><?php echo $row["sub_name"] ?></td>
    			</tr>    			
    		
	     <?php
    	}
		 ?>
		 </table>
		 </center><br>
		 <?php

	} 

	else 
	{
	    echo "<u>No subject found</u>";
	}



	?>
	<hr><br><br>
	<form method="post" action="feed.php">
		<input type="hidden" name=regi value="<?php echo $rego;?>">
		<center>
			Subject code :
			 <select name="type">
			 	
			 	<?php 
			 	$qry="select sub_code from subject_master where department=$dept and term=$type";
				$xyz=mysqli_query($con,$qry);
			 	if (mysqli_num_rows($xyz) > 0) 
				{
			 	while($row=mysqli_fetch_assoc($xyz))
			 	{
			 		
			 		

			 	?>

			 	<option value="<?php echo $row["sub_code"];  ?>">
			 		<?php echo $row["sub_code"]; ?>
			 	</option>


			 <?php
			}
		}
		else
		{
			echo "No rows found";
		}
	}
	else
	{
		header("location:error.html");
	}

			
		
		
		?>
			 </select>
		
		<br><br>
		
		<input type="submit" value="Give feedback for selected subject">
		</center>	
		</form>	 
	
	
	
</body>


</html>