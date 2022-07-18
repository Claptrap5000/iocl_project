 
<!DOCTYPE html> 
<html> 
	<head> 
		<title> Fetch Data From Database </title> 
	</head> 
	<body> 
	<table align="center" border="1px"> 
	<tr> 
		<th colspan="5"><h2>WORK ALLOTMENT TABLE</h2></th> 
		</tr> 
			  <th> Work No. </th> 
			  <th> Employee No. </th> 
			  <th> Vendor No. </th>
			  <th> Description </th> 
              <th> Date </th> 	  
		</tr> 
		
		<?php 

			$servername='localhost';
			$username='root';
			$password='';
			$dbname = "iocl";
			$conn=mysqli_connect($servername,$username,$password,"$dbname");


			if(!$conn){
				die('Could not Connect MySql Server:' .mysql_error());
				}
				
			$query="select * from workallot"; 
			$result=mysqli_query($conn, $query); 
					
        
        
        
        
        
        
			while($rows=mysqli_fetch_assoc($result)) 
			{ 
		?>

		<tr>
			<td><?php echo $rows['wno']; ?></td> 
			<td><?php echo $rows['empno']; ?></td> 
			<td><?php echo $rows['vcode']; ?></td> 
			<td><?php echo $rows['des']; ?></td> 
			<td><?php echo $rows['entdate']; ?></td> 
		</tr>

		<?php 
               } 
          ?> 

	</table>

	</body>
	<style>

		table{
			line-height: 3em;
			width: -webkit-fill-available;
		}
		td{
			text-align: center;
			background-color: #e0e0e0;
		}
		
	</style> 
	</html>