<h2 class="text-center m-3">Book Bike for <b>Rent</b></h2>
<div class="row">
  <form action="http://localhost/Online_Bike_Rental_System/renter/show.php" class="mx-5 px-4" method="POST">
    <div class="form-row mx-5" style="display: flex;">
      <div class="col-4">
        <label for="city">Choose City</label>
        <select name="city_id" class="form-control" id="city">
          <option value="">Not Choosen</option>
          <?php
          $cities = all('cities');
          foreach ($cities as $city) { ?>
            <option value="<?php echo $city['id']; ?>"><?php echo $city['name']; ?></option>
          <?php } ?>
        </select>
      </div>
      <div class="col-4">
        <label for="type">Choose Bike Type</label>
        <select name="type_id" class="form-control" id="type">
          <option value="">Not Choosen</option>
          <?php
          $categories = all('categories');
          foreach ($categories as $category) { ?>
            <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
          <?php } ?>
        </select>
      </div>
    
      <div class="col-4">
        <p for="btn"></p>
        <input type="submit" class="btn btn-dark btn-lg " style="width:200px;" value=" Find ">
      </div>
    </div>
  </form>
</div>