@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content />
    <meta name="author" content />
    <title>Account Settings - Profile - Conference Travel</title>
    <!--link rel="stylesheet" href="css/styles.css" /-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" crossorigin="anonymous" />
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />
    <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" crossorigin="anonymous"></script>
</head>

<body class="nav-fixed">
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <main>
                <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
                    <div class="container-fluid">
                        <div class="page-header-content">
                            <div class="row align-items-center justify-content-between pt-3">
                                <div class="col-auto mb-3">
                                    <h1 class="page-header-title">
                                        <div class="page-header-icon"><i data-feather="user"></i></div>
                                        Account Settings - Profile
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
                <!-- Main page content-->
                <div class="container mt-4">
                    <!-- Account page navigation-->
                    <nav class="nav nav-borders">
                        <a class="nav-link active ml-0" href="userprofile">Profile</a>
                        <a class="nav-link" href="security">Security</a>
                        <a class="nav-link" href="notifications">Notifications</a>
                    </nav>
                    <hr class="mt-0 mb-4" />
                    <div class="row">
                        <div class="col-xl-4">
                            <!-- Profile picture card-->
                            <div class="card">
                                <div class="card-header">Profile Picture</div>
                                <div class="card-body text-center">
                                    <!-- Profile picture image-->
                                    <img class="img-account-profile rounded-circle mb-2" src="../public/img/profile-1.png" alt />
                                    <!-- Profile picture help block-->
                                    <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                                    <!-- Profile picture upload button-->
                                    <button class="btn btn-primary" type="button">Upload new image</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8">
                            <!-- Account details card-->
                            <div class="card mb-4">
                                <div class="card-header">Account Details</div>
                                <div class="card-body">
                                    <form>
                                        @foreach($var_for_user as $row_data)
                                        <!-- Form Group (usernumber)-->
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputUsernumber">Student / Staff Number</label>

                                            <input class="form-control" id="inputUsernumber" type="text" placeholder="" value="{{ $row_data['user_number'] }}" />
                                        </div>
                                        <!-- Form Row-->
                                        <div class="form-row">
                                            <!-- Form Group (first name)-->
                                            <div class="form-group col-md-6">
                                                <label class="small mb-1" for="inputFirstName">First name</label>
                                                <input class="form-control" id="inputFirstName" type="text" placeholder="" value="{{ $row_data['user_first_name'] }}" />
                                            </div>
                                            <!-- Form Group (last name)-->
                                            <div class="form-group col-md-6">
                                                <label class="small mb-1" for="inputLastName">Last name</label>
                                                <input class="form-control" id="inputLastName" type="text" placeholder="" value="{{ $row_data['user_last_name'] }}" />
                                            </div>
                                        </div>
                                        <!-- Form Row        -->
                                        <div class="form-row">
                                            <!-- Form Group (course name)-->
                                            <div class="form-group col-md-6">
                                                <label class="small mb-1" for="inputCourse">Course name</label>
                                                <select id="inputCourse" class="form-control">
                                                    @foreach($var_for_course as $row_data2)
                                                    <option value="{{ $row_data2['course_id'] }}">{{ $row_data2['course_name'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <!-- Form Group (address)-->
                                            <div class="form-group col-md-6">
                                                <label class="small mb-1" for="inputAddress">Address</label>
                                                <input class="form-control" id="inputAddress" type="text" placeholder="" value="{{ $row_data['user_address'] }}" />
                                            </div>
                                        </div>
                                        <!-- Form Group (email address)-->
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputEmailAddress">Email address</label>
                                            <input class="form-control" id="inputEmailAddress" type="email" placeholder="" value="{{ $row_data['user_email'] }}" />
                                        </div>
                                        <!-- Form Row-->
                                        <div class="form-row">
                                            <!-- Form Group (phone number)-->
                                            <div class="form-group col-md-6">
                                                <label class="small mb-1" for="inputPhone">Phone number</label>
                                                <input class="form-control" id="inputPhone" type="tel" placeholder="" value="{{ $row_data['user_phone_number'] }}" />
                                            </div>
                                            <!-- Form Group (birthday)-->
                                            <div class="form-group col-md-6">
                                                <label class="small mb-1" for="inputBirthdate">Birthday</label>
                                                <input class="form-control" id="inputBirthdate" type="text" name="birthdate" placeholder="" value="{{ $row_data['user_dob'] }}" />
                                            </div>
                                        </div>
                                        <!-- Save changes button-->
                                        <button class="btn btn-primary" type="button">Save changes</button>
                                    @endforeach
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

</body>
</html>
@endsection

