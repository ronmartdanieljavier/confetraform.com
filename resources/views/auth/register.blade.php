<html lang="en">
<head>
    <script type="text/javascript" async="" src="https://www.google-analytics.com/analytics.js"></script>
    <script id="ga-gtag" type="text/javascript" async="" src="https://www.googletagmanager.com/gtag/js?id=UA-38417733-31"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Register - Conference Travel</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css" />
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.png">
    <script data-search-pseudo-elements="" defer="" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" crossorigin="anonymous"></script>
    <script src="/sass.js"></script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <!-- Basic registration form-->
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header justify-content-center"><h3 class="font-weight-light my-4">Create Account</h3></div>
                                <div class="card-body">
                                    <!-- Registration form-->
                                    <form>
                                        <!-- Form Row-->
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <!-- Form Group (first name)-->
                                                <div class="form-group">
                                                    <label class="small mb-1" for="inputFirstName">First Name</label>
                                                    <input class="form-control" id="inputFirstName" type="text" placeholder="Enter first name">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <!-- Form Group (last name)-->
                                                <div class="form-group">
                                                    <label class="small mb-1" for="inputLastName">Last Name</label>
                                                    <input class="form-control" id="inputLastName" type="text" placeholder="Enter last name">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Form Group (email address)            -->
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputEmailAddress">Email</label>
                                            <input class="form-control" id="inputEmailAddress" type="email" aria-describedby="emailHelp" placeholder="Enter email address">
                                        </div>
                                        <!-- Form Row    -->
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <!-- Form Group (password)-->
                                                <div class="form-group">
                                                    <label class="small mb-1" for="inputPassword">Password</label>
                                                    <input class="form-control" id="inputPassword" type="password" placeholder="Enter password">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <!-- Form Group (confirm password)-->
                                                <div class="form-group">
                                                    <label class="small mb-1" for="inputConfirmPassword">Confirm Password</label>
                                                    <input class="form-control" id="inputConfirmPassword" type="password" placeholder="Confirm password">
                                                </div>
                                            </div>
                                            <!-- Form Group (student)-->
                                            <div class="col-md-6">
                                                <div class="form-group mt-4 mb-0">
                                                    <a class="btn btn-primary btn-block" href="regstudent">Register as Student</a>
                                                </div>
                                            </div>
                                            <!-- Form Group (create account submit)-->
                                            <div class="col-md-6">
                                                <!-- Form Group (staff)-->
                                                <div class="form-group mt-4 mb-0">
                                                    <a class="btn btn-secondary btn-block" href="regstaff">Register as Staff</a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center">
                                    <div class="small"><a href="{{ route('login') }}">Have an account? Go to login</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="footer mt-auto footer-dark">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 small">Copyright © confetraform.com 2021</div>
                        <div class="col-md-6 text-md-right small">
                            <a href="#!">Privacy Policy</a>
                            ·
                            <a href="#!">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

</body>
</html>

