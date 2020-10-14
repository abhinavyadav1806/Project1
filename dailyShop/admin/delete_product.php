<?php
    include("../config.php");

    $query = "SELECT * FROM products";
    $result = mysqli_query($connect, $query);
    
    if(isset($_GET['id']))
    {
        echo "isset";
        if($result ->num_rows>0)
        {
            //while($row=mysqli_fetch_array($result))
            foreach($result as $row)
            {
                $id=$_GET['id'];
                if($row['product_id'] == $id)
                {
                    echo "if loop";
                    $sql = "DELETE FROM products WHERE product_id=$id";
                    $result = mysqli_query($connect,$sql);
                    // or die(mysqli_error($connect));
                    header("Location:products.php");
                }
            }
        }
    }
?>