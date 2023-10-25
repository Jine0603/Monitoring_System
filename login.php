<?php
include '../asset/Include/config.php';
?>
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="robots" content="">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="Zenix - Crypto Admin Dashboard">
    <meta property="og:title" content="Zenix - Crypto Admin Dashboard">
    <meta property="og:description" content="Zenix - Crypto Admin Dashboard">
    <meta property="og:image" content="https://zenix.dexignzone.com/xhtml/social-image.png">
    <meta name="format-detection" content="telephone=no">
    <title>Zenix - Crypto Admin Dashboard </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <link href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <div class="text-center mb-3">
                                        <img src="images/logo-full.png" alt="">
                                    </div>
                                    <h4 class="text-center mb-4">Sign in your account</h4>
                                    <form action="">

                                        <div class="form-group">
                                            <label class="mb-1"><strong>ID</strong></label>
                                            <input type="text" class="form-control" id="empId"  disabled>
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1"><strong>Company</strong></label>
                                            <select id="company">
                                            <option value="">Select Department</option>
                                                <option value="01">FMC</option>
                                                <option value="02">ML</option>
                                                <!-- Add more department options as needed -->
                                            </select><br><br>
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1"><strong>Department</strong></label>
                                            <select id="department">
                                            <option value="">Select Department</option>
                                                <option value="09">HR</option>
                                                <option value="07">IT</option>
                                                <option value="20">Finance</option>
                                                <!-- Add more department options as needed -->
                                            </select><br><br>
                                        </div>
                                        <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox ml-1">
                                                    <input type="checkbox" class="custom-control-input" id="basic_checkbox_1">
                                                    <label class="custom-control-label" for="basic_checkbox_1">Remember my preference</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <a href="page-forgot-password.html">Forgot Password?</a>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block" name="loginBtn">ADD</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p>Don't have an account? <a class="text-primary" href="page-register.html">Sign up</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="vendor/global/global.min.js"></script>
    <script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/deznav-init.js"></script>
    <script src="js/demo.js"></script>
    <script src="js/styleSwitcher.js"></script>
    <script>
        // AUTO GENERATE ID
    function generateRandomNumber() {
      return Math.floor(Math.random() * 100000000) + 100000000;
    }

    // Function to generate the employee ID
    function generateEmployeeID() {
      var randomNumber = generateRandomNumber();
      var employeeID = "" + randomNumber; // You can modify the prefix as needed
      return employeeID;
    }

    // Set the generated employee ID when the page loads
    window.onload = function() {
      var empIdInput = document.getElementById("empId");
      var generatedID = generateEmployeeID();
      empIdInput.value = generatedID;
    };
    </script>
    <!-- <script>
        //AUTO-GENERATED USING COMPANY AND DEPARTMENT
  $(function() {
    $("#company, #department").change(function() {
      // Initialize id as an empty string
      var id = "";

      // Append the selected company and department
      id += $("#company").val();
      id += $("#department").val();

      // Generate a random number between 1000 and 9999
      var randomNumber = Math.floor(Math.random() * 9000) + 1000;

      // Append the random number to the employee ID
      id += "-" + randomNumber;

      $("#empId").val(id);
    });
  });
</script> -->

</body>

</html>