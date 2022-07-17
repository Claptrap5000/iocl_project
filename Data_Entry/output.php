 
<!DOCTYPE html> 
<html> 
	<head> 
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

		<title> Fetch Data From Database </title> 
	</head> 
	<body>

		<center><h2>ITEM TABLE</h2> </center>
		<table align="center" border="1px" class="content-table"> 
		<thead> 
			  <th> Work No. </th> 
			  <th> Item No. </th> 
			  <th> Qunatity Done </th> 
			  <th> Entry Date </th>
			  <th> Edit </th>
			  <th> Delete </th>
		</thead> 
		
		<tbody>
		<?php 

			$servername='localhost';
			$username='root';
			$password='';
			$dbname = "iocl";
			$conn=mysqli_connect($servername,$username,$password,"$dbname");
			
			
			if(!$conn){
				die('Could not Connect MySql Server:' .mysql_error());
				}
				
			$query="select * from entry_table"; 
			$result=mysqli_query($conn, $query); 
					
        
        
        
        
        
			while($rows=mysqli_fetch_assoc($result)) {?>

		<tr>
			<td><?php echo $rows['wno']; ?></td> 
			<td><?php echo $rows['item_no']; ?></td> 
			<td><?php echo $rows['dn_qty']; ?></td> 
			<td><?php echo $rows['entry_date']; ?></td> 
			<td class='edit'><a href="update_entry.php?id=<?php echo $rows['wno'];?>"><i class='fa fa-edit'></i></a></td>
			<td class='edit'><a href="delete_entry.php?id=<?php echo $rows['wno'];?>"><i class='fa fa-trash-o'></i></a></td>
		</tr>

		<?php   } ?> 
		</tbody>
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