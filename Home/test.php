 
<!DOCTYPE html> 
<html> 
	<head> 
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- <link rel="stylesheet" href="../style/style2.css"> -->
	<link rel="stylesheet" href="../new_nav.css">
		<title> Fetch Data From Database </title> 
	</head> 
	<body>

	<div class="dropdwn">
        <nav>
            
            <img src="../style/logo.jpg" class="logo">
                
            <ul>
                <!-- <li><a href="#">Home</a></li> -->
                <li><a href="#">View Item Orders</a>
                    <ul>
                        <li><a href="../Home/varified.php">Verified items Lists</a></li>
                        <li><a href="../Home/test.php">Un-verified items Lists</a></li>
                    </ul>
                </li>
                <li><a href="../Home/daily_entry.php">View Daily Entry</a></li>
                <li><a href="../logout.php">Logout</a></li>
            </ul>
        </nav>
    </div>


	<!-- <nav>
        <label class="logo"><img src="../style/logo.jpg" alt="" srcset=""></label>
        <label class="logo1"> IOCL</label>
        <ul>
            <li><a href="../item_allotment/item.php">Details Entry</a></li>
            <li><a href="../Data_Entry/enter_data.php">Data Entry</a></li>
            <li><a href="../Data_Entry/output.php">View Daily Entries</a></li>
            <li><a href="../item_allotment/output.php">View Details</a></li>
            
        </ul>
    </nav> -->
	

		<center><h1>ITEM TABLE</h1> </center>
		<table align="center" border="1px" class="content-table"> 
		<thead> 
			  <th> Work No. </th> 
			  <th> Item No. </th> 
			  <th> Qunatity Done </th> 
			  <th> Entry Date </th>
			  <th> Approval Status </th>
			  <!-- <th> Delete </th> -->
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
				
			$query="select * from entry_table where status='0' "; 
			$result=mysqli_query($conn, $query); 
					
        
        
        
        
        
			while($rows=mysqli_fetch_assoc($result)) {?>

		<tr>
			<td><?php echo $rows['wno']; ?></td> 
			<td><?php echo $rows['item_no']; ?></td> 
			<td><?php echo $rows['dn_qty']; ?></td> 
			<td><?php echo $rows['entry_date']; ?></td> 
			<td class='edit'> 
				<form action="test.php" method="post">
					<input type="hidden" name="sl_no" value="<?php echo $rows['sl_no']; ?>">
					<button type="submit" name="approve" class="approval">Approve</button></a>
				</form>
			</td>
			<!-- <td class='edit'><a href="delete_entry.php?id=<?php echo $rows['wno'];?>"><i class='fa fa-trash-o'></i></a></td> -->
		</tr>

		<?php   } ?> 
		</tbody>
	</table>
		<?php
			if(isset($_POST['approve'])){
				$sl_no = $_POST['sl_no'];
			

				$select = "UPDATE entry_table SET status='2' WHERE sl_no='$sl_no';";
				$res = mysqli_query($conn, $select);

			}
		?>
	</body>
	<style>
		.approval{
			width:14em;
			height:3em;
			background-color: blue;
			color: azure;
			margin: 0;
			/* display: grid; */
			margin-top: -1em;
			margin-bottom: 0.3em;
		}
		form{
			
			border: none;
			background-color: e0e0e0;
			padding: auto;
			width: 1em;
			margin-left: 3em;
			margin-top: -1.5em;
			margin-bottom: -1em;
		}
		button{
			margin-left: 5em;
		}
		a{
			width: fit-content;
		}

		h1{
			margin-top: 1.2rem;
			margin-bottom: 1.2rem;
		}

		table{
			line-height: 3em;
			width: -webkit-fill-available;
		}
		td{
			text-align: center;
			background-color: #e0e0e0;
		}
		thead{
			background-color: blue;
			color: white;
		}

	</style> 
	</html>