<?php
    session_start();
    $vco  = $_SESSION['vcod'];
    include_once '../db.php';
    $sql_wno = "SELECT * FROM workallot WHERE vcode='$vco'";
    $all_categories = mysqli_query($con, $sql_wno);
                            
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" crossorigin="anonymous">
</head>
<body>


    <div class="dropdwn">
        <nav>
            <img src="logo.jpg" class="logo">
            <ul>
                <li><a href="../item_allotment/item.php">Details Entry</a></li>
            <li><a href="../Data_Entry/enter_data.php">Data Entry</a></li>
            <li><a href="../Data_Entry/output.php">View Daily Entries</a></li>
            <li><a href="../item_allotment/output.php">View Details</a></li>
            <li><a href="../logout.php">Logout</a></li>
            </ul>
        </nav>
    </div>


    <div class="container">
        <div class="">
            <div class="">
                <div class="card">
                    <div class="card-header">
                        <center><h3>Add Items</h3></center>
                    </div>
                    <div class="card-body p-4">
                        
                        <form action="#" method="POST" id="add_form">
                            <div class="show_item">
                                <div class="row ">
                                <label>Select Work ID</label>
            <div class="selection">
                <select name="wno_a[]">
                        <?php
                            while ($category = mysqli_fetch_array(
                                $all_categories,MYSQLI_ASSOC)):; 
                        ?>

                        <option value="<?php echo $category["wno"];?>">     <!-- Here it is Primary Key -->
                                <?php echo $category["wno"];?>              <!-- Here it is Show Key -->
                        </option>
                        <?php endwhile; ?>
                </select>
                    <!-- <input type="text" name="wno" placeholder="WORK NO."> -->
            </div>
                                

                                    <div class="col-md-2 mb-3">
                                        <input type="number" name="item_no_a[]" pattern="[0-9]{7,8}" class="form-control" placeholder="item no." required>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <input type="text" name="item_desc_a[]" class="form-control" placeholder="description" required>
                                    </div>

                                    <div class="col-md-2 mb-3">
                                        <input type="number" name="qty_a[]" class="form-control" placeholder="quantity" required>
                                    </div>

                                    <div class="col-md-2 mb-3">
                                        <input type="number" name="unit_a[]" class="form-control" placeholder="unit" required>
                                    </div>

                                    

                                    <div class="col-md-2 mb-3 d-grid">
                                        <button class="btn btn-success add_item_btn">Add more</button>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <input type="submit" value="Add" class="btn btn-primary w-25" id="add-btn" >
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".add_item_btn").click(function(e) {
               e.preventDefault();
               $(".show_item").prepend(`<div class="row append_item">

               <label>Select Work ID</label>
            <div class="selection">
                <select name="wno_a[]">
                
                        <?php
                        
                         $sql_wno = "SELECT * FROM workallot WHERE vcode='$vco'";
                         $all_categories = mysqli_query($con, $sql_wno);

                            while ($category = mysqli_fetch_array(
                                $all_categories,MYSQLI_ASSOC)):; 
                        ?>

                        <option value="<?php echo $category["wno"];?>">     
                                <?php echo $category["wno"];?>              
                        </option>
                        <?php endwhile; ?>
                </select>
            </div>



                                    


                                    <div class="col-md-2 mb-3">
                                        <input type="number" name="item_no_a[]" pattern="[0-9]{7,8}" class="form-control" placeholder="item no." required>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <input type="text" name="item_desc_a[]" class="form-control" placeholder="description" required>
                                    </div>

                                    <div class="col-md-2 mb-3">
                                        <input type="number" name="qty_a[]" class="form-control" placeholder="quantity" required>
                                    </div>

                                    <div class="col-md-2 mb-3">
                                        <input type="number" name="unit_a[]" class="form-control" placeholder="unit" required>
                                    </div>

                            

                                    <div class="col-md-2 mb-3 d-grid">
                                        <button class="btn btn-danger remove_item_btn">Remove</button>
                                    </div>
                                </div>`);

            });

            $(document).on('click','.remove_item_btn', function(e) {
                e.preventDefault();
                let row_item= $(this).parent().parent();
                $(row_item).remove();
            });


            $("#add_form").submit(function(e) {
              e.preventDefault();
              $("#add_btn").val('Adding......'); 
             $.ajax({
                url:'action.php',
                method: 'post',
                data: $(this).serialize(),
                success: function(response) {
                    $("#add_btn").val('ADD');
                    $("#add_form")[0].reset();
                    $(".append_item").remove();
                    $("#show_alert").html(`<div class="alert alert-success" role="alert">${response}</div`)
                }
             }) 

            });
        }); 
    </script>

    
    
</body>
</html>