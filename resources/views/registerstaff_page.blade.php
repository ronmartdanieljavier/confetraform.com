<html class="fontawesome-i2svg-active fontawesome-i2svg-complete" lang="en">
<head>
    <script type="text/javascript" async="" src="https://www.google-analytics.com/analytics.js"></script>
    <script id="ga-gtag" type="text/javascript" async="" src="https://www.googletagmanager.com/gtag/js?id=UA-38417733-31"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Register Staff - Conference Travel</title>
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
                        <!-- Register Staff-->
                        <div class="col-xl-5 col-lg-6 col-md-8 col-sm-11">
                            <div class="card border-0 shadow-lg mt-5">
                                <div class="card-body p-5 text-center">
                                    <div class="icons-org-join align-items-center mx-auto">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user icon-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                        <svg class="svg-inline--fa fa-long-arrow-alt-right fa-w-14 icon-arrow" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="long-arrow-alt-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M313.941 216H12c-6.627 0-12 5.373-12 12v56c0 6.627 5.373 12 12 12h301.941v46.059c0 21.382 25.851 32.09 40.971 16.971l86.059-86.059c9.373-9.373 9.373-24.569 0-33.941l-86.059-86.059c-15.119-15.119-40.971-4.411-40.971 16.971V216z"></path></svg><!-- <i class="icon-arrow fas fa-long-arrow-alt-right"></i> Font Awesome fontawesome.com -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users icon-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                                    </div>
                                    <div class="h3 text-secondary font-weight-300 mb-0">Register as Staff</div>
                                    <p class="text-muted mb-3">We are excited to have you</p>
                                </div>
                                <hr class="m-0">
                                <form>
                                    <div class="card-body p-4">
                                        <div class="form-group">

                                            <h5 class="font-weight-500 mb-3"><label for="inputUni">University / College</label></h5>
                                            <select id="inputUni" class="form-control">
                                                <option selected>Choose...</option>
                                                @foreach($var_for_unilist as $row_data)
                                                <option value="{{ $row_data['university_id'] }}">{{ $row_data['university_name']}}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                        <a class="btn btn-block btn-secondary" href="dashboard">Complete Registration</a>
                                    </div>
                                </form>
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

