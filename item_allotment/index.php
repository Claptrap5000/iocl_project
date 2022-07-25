<?php
    include_once '../db.php';
    // include_once '../style/style.css';
    $sql_wno = 'SELECT * FROM workallot';
    $all_categories = mysqli_query($con, $sql_wno);
                            
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" crossorigin="anonymous">
</head>
<body class="bg-dark">
    <div class="container">
        <div class="row my-4">
            <div class="col-lg-10 mx-auto">
                <div class="card shadow">
                    <div class="card-header">
                        <h4>add items</h4>
                    </div>
                    <div class="card-body p-4">
                        <div id="show_alert">

                        </div>
                        <form action="#" method="POST" id="add_form">
                            <div class="show_item">
                                <div class="row ">
                                <label>Select Work ID</label>
            <div class="selection">
                <select name="wno[]">
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
                                

                                    <div class="col-md-3 mb-3">
                                        <input type="number" name="item_no_a[]" class="form-control" placeholder="item no." >
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <input type="number" name="item_desc_a[]" class="form-control" placeholder="description" >
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <input type="number" name="qty_a[]" class="form-control" placeholder="quantity" >
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <input type="number" name="unit_a[]" class="form-control" placeholder="unit" >
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
                <select name="wno[]">
                
                        <?php
                        
                         $sql_wno = 'SELECT * FROM workallot';
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



                                    


                                    <div class="col-md-3 mb-3">
                                        <input type="number" name="item_no_a[]" class="form-control" placeholder="item no." >
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <input type="number" name="item_desc_a[]" class="form-control" placeholder="description" >
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <input type="number" name="qty_a[]" class="form-control" placeholder="quantity" >
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <input type="number" name="unit_a[]" class="form-control" placeholder="unit" >
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