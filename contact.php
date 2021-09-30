<?php

require('top.php') ?>
<?php

if (isset($_POST['submit'])) {
    $fullName = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $mobile = mysqli_real_escape_string($con, $_POST['mobile']);
    $message = mysqli_real_escape_string($con, $_POST['message']);

    $insertQuery = "insert into contact_us(name, email, mobile, comment, added_on) values('$fullName', '$email', '$mobile', '$message' ,CURRENT_TIMESTAMP() ) ";


    $iquery = mysqli_query($con, $insertQuery);

    //this
    if ($iquery) {
?>

        <script>
            alert("Thank you for contacting us.");
        </script>
    <?php
    } else {
    ?>
        <script>
            alert(" Message not sent Please try again ");
        </script>
<?php
    }
}
?>

<div class="container-fluid" style="margin-top:-15px;  background-image: url('images/bg/talk.jpg');background-repeat: no-repeat;background-size: cover; background-attachment: fixed;">
    <div class="container ">
        <div class="row my-3 py-3 ">
            <div class="col-sm-12 col-md-6 col-lg-6 ">
                <div id="googleMap">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3440.676134037915!2d84.07279915045912!3d28.05201958905695!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3995bb932e0b3151%3A0x734b4d0bd66456c8!2sShuklagandaki%20Municipality%20Administrative%20Office!5e0!3m2!1sen!2snp!4v1614745079516!5m2!1sen!2snp" width="100%" height="500px" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6">
                <h1 class="text-center  text-uppercase py-3">Contact us</h1>
                <div class="bg-light my-3 pl-3 py-3">
                    <div class="mx-auto">
                        <div class="display-inline-block">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <h4 class="text-bold text-uppercase font-weight-bold">Address</h4>
                        <h6 class="text-muted">Shuklagandaki-4, Tanahun, Nepal</h6>
                    </div>
                </div>
                <div class="bg-light my-3 pl-3 py-3">
                    <div class="mx-auto">
                        <h4 class="text-uppercase font-weight-bold">Opening Hour</h4>
                        <h6 class="text-muted">Sunday-Friday 9:00 AM - 5:00 PM</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mx-auto py-4 ">
                <form method="post" onsubmit="return validation()">
                    <div class="form-group">
                        <label for="name">Full Name: *</label>
                        <input type="text" required class="form-control" name="name" id="name">
                        <span class="text-danger" id="errorName"></span>
                    </div>
                    <div class="form-group">
                        <label for="emaillogin">Email ID: *</label>
                        <input type="email" required class="form-control" name="email" id="emaillogin">
                    </div>
                    <div class="form-group">
                        <label for="mobile">Mobile: *</label>
                        <input type="tel" required class="form-control" name="mobile" id="mobile">
                        <span class="text-danger" id="errorMobile"></span>

                    </div>
                    <div class="form-group">
                        <label for="message">Message: *</label>
                        <input type="text" required class="form-control" name="message" id="comment">
                        <span class="text-danger" id="errorComment"></span>

                    </div>
                    <div class="clearfix">
                        <button type="submit" class="btn btn-primary w-100" name="submit">Submit </button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>



<script>
    function validation() {
        let name = document.getElementById('name').value.trim();
        let mobile = document.getElementById('mobile').value.trim();
        let comment = document.getElementById('comment').value.trim();
        let errorMobile = document.getElementById('errorMobile');
        if (name == "") {
            document.getElementById('errorName').innerHTML = "Plese fill your name";
            return false;
        }

        if (mobile == "") {
            errorMobile.innerHTML = "Mobile number cannot be blank";
            return false;
        } else if (mobile.length != 10) {
            errorMobile.innerHTML = "Please make sure mobile number is 10 digit"
            return false
        } else if (isNaN(mobile)) {
            errorMobile.innerHTML = "mobile number must not contain alphabet"
        }
        if (comment == "") {
            document.getElementById('errorComment').innerHTML = "please fill the address";
            return false;
        }
    }
</script>
<?php require('footer.php') ?>