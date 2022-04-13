<?php
$renterurl="http://localhost/Online_Bike_Rental_System/renter/";

$url = "http://localhost/Online_Bike_Rental_System/uploads/";
?>


<div class="card border round shadow" style="width: 18rem;">
    <div class="card-body">
        <h3 class="card-title text-center h5"><?php echo $bike['name']; ?></h3>
    </div>
    <?php
    
    $bikeid = $bike['id'];
    $city=find('cities',$bike['city_id']);
$category=find('categories',$bike['category_id']);

    $bike_images = where('bike_images', 'bike_id', '=', $bikeid);
    ?>
    <img src="<?php echo $url.$bike_images[0]['images']; ?>" class="card-image-top p-2" style="height: 180px; object-fit: cover;" alt="">
    <div class="card-body">
    <label> <b>Rental price:</b> <?php echo $bike['price'];?> per day </label>
        <small class="card-text"><b>Category: </b><?php
        if(empty($category)){
            echo 'No category';
        }
        else{
            echo $category['name'];
        }
         ?></small>
        <div>
        <small> <b>Available on:</b> <?php echo $city['name'];?></small>
         
        </div>
        <button type="button" class="btn btn-dark round " style="width:100%;"><a href="<?php echo $renterurl;?>book.php?id=<?php echo $bike['id'];?>" style="text-decoration: none; color:#ffffff; display:block" >View Details</a>
        </button>
    </div>
</div>

