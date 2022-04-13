<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title>Hello, world!</title>
</head>
<style>
  .day,.pday,.tday{
    width:14.28571%;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 40px;
    border:solid 1px #000000;
  }
.pday{
  background-color: #ffffff;
}
.tday{
  background-color: red;
}
</style>
<body onload="renderdate()">
  <h1>Calender</h1>

  <div class="calendor" style="width: 40%; margin:auto">
    <div class="bg-success mx-4 d-flex justify-content-center align-items-center" style="height: 100px;">
      <div class="row">
      <input type="button" value="	&#8592;" class="btn border border-circle" onclick="movedate('prev')">
      <h2 id="month" style="display: block;width:100%"></h2>
      </div>
      <div class="row">
        <p id="date_str"></p>
      </div>
     <input type="button" value="&#8594;" class="btn border border-circle" onclick="movedate('next')">
    </div>
    <div class="d-flex justify-content-between mx-4 bg-dark text-light p-3">
      <div>Sun</div>
      <div>Mon</div>
      <div>Tue</div>
      <div>Wed</div>
      <div>Thur</div>
      <div>Fri</div>
      <div>Sat</div>
    </div>
    
    <div class=" mx-4 bg-success days" style="display: flex;flex-wrap: wrap;">
     
  
    </div>
  </div>













  <script src="calendar.js"></script>

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>