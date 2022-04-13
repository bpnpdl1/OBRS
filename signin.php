<?php
$title = "SIGN IN";
require_once './header.php';
require_once './admin/functions.php';
require_once 'db.php';

if (!empty($_POST)) {
    $email = request('email');
    $password = request('password');

    if (empty($email) || empty($password)) {
        die("Please fill both fields");
    }

    $user = where('users', 'email', '=', $email, false);
    // die($password);
    if (empty($user)) {
        die("No email is found");
    }
    if (password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];

        if ($user['role'] == 'admin') {
            redirect('admin/index.php');
        }
        if ($user['role'] == 'renter') {
            redirect('renter/index.php');
        }
        if ($user['role'] == 'owner') {
            redirect('owner/index.php');
        }


        die("Login Successful");
    } else {
        setError("Invalid password");
        redirect('signin.php');
    }
}
?>
<?php if (hasError()) { ?>
    <div class="alert alert-danger text-center">
        <?php echo getError(); ?>
    </div>
<?php } ?>

<div class="d-flex justify-content-center my-5 shadow">
    <form class="w-50 mb-5" method="post" action="signin.php">
        <fieldset class="justify-content-md-center border-1 shadow rounded p-3 bg-light">
            <legend class="bg-dark text-light text-center font-weight-bold rounded p-3">
                <b> SIGN IN</b>
            </legend>
            <div class="container">
                <!-- Email Part -->
                <div class="row">
                    <label for="email" class="form-label">Enter Your Email</label>
                    <div class="col"><input type="text" name="email" class="form-control" id="email" placeholder="Email "></div>
                </div>
                <!-- Password Part -->
                <div class="row">
                    <label for="password" class="form-label">Enter Your Password</label>
                    <div class="col"><input type="password" name="password" class="form-control" id="password" placeholder="Password"></div>
                </div><br>
                <!-- Sign in button -->
                <div class="button d-flex justify-content-center">
                    <input type="submit" value="SIGN IN" class="btn btn-dark hover form-control" />
                </div>
                <div class="login d-flex justify-content-center">
                    <label class="form-label">Don't have an account ? <a href="./signup.php">Sign up</a></label>
                </div>
            </div>
        </fieldset>
    </form>
</div>
<?php require 'footer.php'; ?>