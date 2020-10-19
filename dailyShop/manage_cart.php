
<?php 
session_start();
include 'config.php';
/*if(isset($_SESSION['cart']))
{
echo "SESSION set";
}
else{
echo "Session not set";
}*/
$id = $_POST['id'];
$type = $_POST['type'];
if(isset($_POST['qty']))
{
    $qty =$_POST['qty'];
}
$products=array();
$sql="SELECT * FROM products";
$result=$connect->query($sql);
while($row = $result->fetch_assoc())
{
  $products[]=$row;
}
if($type=='add')
{
    if(isset($_SESSION['cart']))
    {   
        $productids = array_column($_SESSION['cart'],'product_id');
        if(!in_array($id,$productids))
        {
            $count=count($_SESSION['cart']);
            foreach($products as $key=>$value)
            {
                if($value['product_id']==$id)
                {
                    $newitem=array(
                        'product_id'=>$id,
                        'name'=>$value['name'],
                        'price'=>$value['price']*$qty, 
                        'quantity'=>$qty,
                        'image'=>$value['image'],
                        'discription'=>$value['discription'],
                        'tag'=>$value['tag']
                    );
                    $_SESSION['cart'][$count]=$newitem;
                  //  echo "product added succseesflly";
                     break;
                }
            }
        }
        else
        {
           // echo "product already present";
        }
    }
    else
    {
        foreach($products as $key=>$value)
        {
            if($value['product_id']==$id)
                {
                    $newitem=array(
                        'product_id'=>$id,
                        'name'=>$value['name'],
                        'price'=>$value['price']*$qty, 
                        'quantity'=>$qty,
                        'image'=>$value['image'],
                        'discription'=>$value['discription'],
                        'tag'=>$value['tag']
                    );
                $_SESSION['cart'][0]=$newitem;
             //   echo "product added succseesflly";
                break;
            }

        }
    }		
}

if($type=='delete')
{
    foreach($_SESSION['cart'] as $key=>$value)
    {
        if($value['product_id']==$id)
        {
            unset($_SESSION['cart'][$key]);
            echo "deleted";
        }
           
    }
}
//echo count($_SESSION['cart']);


?>
