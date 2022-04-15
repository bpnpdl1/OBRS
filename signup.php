<?php require 'db.php';
require_once './admin/functions.php';
$title = "SIGN UP";
$name = '';
$email = '';
$password = '';
$opassword = '';
$cpassword = '';
$dob = '';
$address = '';
$citizenship_number = '';
$license_number = '';
$role = '';
$personal_image = '';



if (isset($_POST['btnsignup'])) {



  $name = request('name');
  $email = request('email');
  $password = request('password');
  $cpassword = request('cpassword');
  $dob = request('dob');
  $address = request('address');
  $citizenship_number = request('citizenship_number');
  $license_number = request('license_number');
  $role = request('role');
  unset($_SESSION['signupform']);
  $_SESSION['signupform'] = array('name' => $name, 'email' => $email, 'password' => $cpassword, 'cpassword' => $cpassword, 'dob' => $dob, 'address' => $address, 'citizenship_number' => $citizenship_number, 'license_number' => $license_number);



  require './validations.php';
  require './file_handing.php';
  $password = password_hash($password, PASSWORD_DEFAULT);
  create(
    'users',
    compact('name', 'email', 'password', 'dob', 'address', 'citizenship_number', 'license_number', 'personal_image', 'role')
    /*
  [
    'name' => $name,
    'email' => $email,
    'password' => $password,
    'dob' => $dob,
    'address' => $address,
    'citizenship_number' => $citizenship_number,
    'license_number' => $license_number,
    'personal_image' => $personal_image
  ]*/
  );

 


  echo "<script>
alert('Succesfully Signup, Go to Login page to login');
</script>";
}

require './header.php';

?>
<?php if(hasError()){?>
<center class="alert d-flex justify-content-center">
  <p><?php echo getError(); ?></p>

</center>
<?php 
if (!empty($_SESSION['signupform'])) {
  $form=$_SESSION['signupform'];
  $name = $form['name'];
$email = $form['email'];
$password = $form['password'];
$cpassword = $form['cpassword'];
$dob = $form['dob'];
$address = $form['address'];
$citizenship_number = $form['citizenship_number'];
$license_number = $form['license_number'];
}

}?>
<br>
<div class="d-flex justify-content-center">

  <form class="w-50 signup " id="signupform" action="signup.php" method="POST" enctype="multipart/form-data">
    <fieldset class="justify-content-md-center border-1 shadow rounded p-3 bg-light">
      <legend class="bg-dark text-light text-center font-weight-bold rounded p-3">
        <b> SIGN UP</b>
      </legend>
      <div class="container">
        <!-- Name Part -->
        <div class="row">

          <div class="col">
            <label for="name">Enter Your Name</label>
            <input type="text" name="name" id="name" placeholder="name" class="form-control" value="<?php echo $name; ?>">
          </div>
          <div class="col">
            <label for="email">Enter Your email</label>
            <input type="email" name="email" id="Cpassword" class="form-control" placeholder="email" value="<?php echo $email; ?>">
          </div>
        </div>

        <!-- pwd Part -->
        <div class="row">

          <div class="col">
            <label for="password">Enter Your Password</label>
            <input type="password" name="password" id="password" placeholder="Password" class="form-control" value="<?php echo $password; ?>">
          </div>
          <div class="col">
            <label for="Cpassword">Confirm Your Password</label>
            <input type="password" name="cpassword" id="cpassword" class="form-control" placeholder="Confirm Password" value="<?php echo $cpassword; ?>">
          </div>
        </div>
        <!-- Age and address -->
        <div class="row">
          <div class="col">
            <label for="dob">Enter Your Date of Birth </label>
            <input type="date" name="dob" id="dob" class="form-control date" value="<?php echo $dob; ?>">
          </div>
          <div class="col">
            <label for="address">Enter Your Address</label>
            <input type="text" name="address" class="form-control" id="address" placeholder="address" value='<?php echo $address; ?>'>
          </div>
        </div>
        <!-- Other Information -->
        <div class="row">
          <div class="col">
            <label for="citizenship">Enter Your Citizenship Number </label>
            <input type="text" name="citizenship_number" id="citizenship" class="form-control" placeholder=" Citizenship Number" value="<?php echo $citizenship_number; ?>">
          </div>
          <div class="col">
            <label for="licensenumber">Enter Your License Number</label>
            <input type="text" name="license_number" class="form-control" id="licensenumber" placeholder=" License Number" value="<?php echo $license_number; ?>">
          </div>
        </div>
        <!-- Upload photos -->
        <div class="row d-flex">

          <div class="col">
            <label for="personal_image">Upload Your Photo</label>
            <input type="file" name="personal_image" class="form-control" id="personal_image">
          </div>
          <div class="col">
            <label for="role">Sign up as</label>
            <select id="role" name="role" class="form-control" id="role">
              <option name="bike_renter" default value="renter">renter</option>
              <option name="bike_owner" value="owner">owner</option>
            </select>
          </div>
        </div>

        <!-- Sign up button -->
        <div class="button d-flex my-2 justify-content-center">
          <input type="submit" value="SIGN UP" name="btnsignup" class="btn btn-dark btn-lg hover my-2 d-block" width="100%" />
        </div>
        <div class="login d-flex justify-content-center">
          <p>Already have an account ? <a href="./signin.php" id="signin">Sign in</a></p>
        </div>
      </div>
    </fieldset>
  </form>
</div>

<?php require "./footer.php"; ?>