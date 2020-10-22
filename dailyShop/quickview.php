<?php   
    include 'config.php' ;
    $id=$_POST['id'];
    $sql="SELECT * FROM products WHERE product_id = '$id' ";
    $result=$connect->query($sql);
    if ($result->num_rows > 0) 
    {
        while($row = $result->fetch_assoc()) 
        {
            echo json_encode(array('product'=>$row));
        }
    }
?>
 

 