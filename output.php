 
<!DOCTYPE html> 
<html> 
	<head> 
		<title> Fetch Data From Database </title> 
	</head> 
	<body> 
	<table align="center" border="1px" style="width:600px; line-height:40px;"> 
	<tr> 
		<th colspan="5"><h2>ITEM TABLE</h2></th> 
		</tr> 
			  <th> work no. </th> 
			  <th> item no. </th> 
			  <th> description </th> 
			  <th> quantity </th>
              <th> unit </th> 
			  
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
    
    $query="select * from item_allot"; 
    $result=mysqli_query($conn, $query); 
        
        
        
        
        
        
        
        while($rows=mysqli_fetch_assoc($result)) 
		{ 
		?> 
		<tr> <td><?php echo $rows['wno']; ?></td> 
		<td><?php echo $rows['item_no']; ?></td> 
		<td><?php echo $rows['item_desc']; ?></td> 
		<td><?php echo $rows['item_qty']; ?></td> 
        <td><?php echo $rows['item_unit']; ?></td> 
		</tr> 
	<?php 
               } 
          ?> 

	</table> 
	</body> 
	</html>