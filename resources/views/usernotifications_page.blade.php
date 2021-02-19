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
    <title>Account Settings - Notifications - Conference Travel</title>
    <!-- link href="css/styles.css" rel="stylesheet" /-->
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
                                        Account Settings - Notifications
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
                        <div class="col-lg-8">
                            <!-- Email notifications preferences card-->
                            <div class="card card-header-actions mb-4">
                                <div class="card-header">
                                    Email Notifications
                                </div>
                                <div class="card-body">
                                    <form>
                                        <!-- Form Group (default email)-->
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputNotificationEmail">Default notification email</label>
                                            <input class="form-control" id="inputNotificationEmail" type="email" value="name@example.com" disabled />
                                        </div>
                                        <!-- Form Group (email updates checkboxes)-->
                                        <div class="form-group mb-0">
                                            <label class="small mb-1">Choose which types of email updates you receive</label>
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" id="checkAccountChanges" type="checkbox" checked disabled />
                                                <label class="custom-control-label" for="checkAccountChanges">Changes made to your account</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" id="checkChangeByStaff" type="checkbox"  checked disabled />
                                                <label class="custom-control-label" for="checkChangeByStaff">Changes to your application made by staff</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" id="checkChangeByStudent" type="checkbox"  checked />
                                                <label class="custom-control-label" for="checkChangeByStudent">Changes to your application made by you</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" id="checkPrivateMessage" type="checkbox" checked />
                                                <label class="custom-control-label" for="checkPrivateMessage">You receive a private message</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" id="checkAddGroup" type="checkbox" checked />
                                                <label class="custom-control-label" for="checkAddGroup">Someone adds you to a group</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" id="checkNewsPromo" type="checkbox" />
                                                <label class="custom-control-label" for="checkNewsPromo">Academic news and promotional offers</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" id="checkSysAlert" type="checkbox" checked />
                                                <label class="custom-control-label" for="checkSysAlert">System alerts</label>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- SMS push notifications card-->
                            <div class="card card-header-actions mb-4">
                                <div class="card-header">
                                    Push Notifications
                                    <div class="custom-control custom-switch mt-n2">
                                        <input class="custom-control-input" id="smsToggleSwitch" type="checkbox" checked />
                                        <label class="custom-control-label" for="smsToggleSwitch"></label>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form>
                                        <!-- Form Group (default SMS number)-->
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputNotificationSms">Default SMS number</label>
                                            <input class="form-control" id="inputNotificationSms" type="tel" value="0423-456-789" disabled />
                                        </div>
                                        <!-- Form Group (SMS updates checkboxes)-->
                                        <div class="form-group mb-0">
                                            <label class="small mb-1">Choose which types of push notifications you receive</label>
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" id="checkSmsAccountChanges" type="checkbox" checked disabled />
                                                <label class="custom-control-label" for="checkSmsAccountChanges">Changes made to your account</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" id="checkSmsChangeByStaff" type="checkbox"  checked disabled />
                                                <label class="custom-control-label" for="checkSmsChangeByStaff">Changes to your application made by staff</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" id="checkSmsChangeByStudent" type="checkbox"  checked />
                                                <label class="custom-control-label" for="checkSmsChangeByStudent">Changes to your application made by you</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" id="checkSmsPrivateMessage" type="checkbox" checked />
                                                <label class="custom-control-label" for="checkSmsPrivateMessage">You receive a private message</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" id="checkSmsAddGroup" type="checkbox" checked />
                                                <label class="custom-control-label" for="checkSmsAddGroup">Someone adds you to a group</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" id="checkSmsNewsPromo" type="checkbox" />
                                                <label class="custom-control-label" for="checkSmsNewsPromo">Academic news and promotional offers</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" id="checkSmsSysAlert" type="checkbox" checked />
                                                <label class="custom-control-label" for="checkSmsSysAlert">System alerts</label>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <!-- Notifications preferences card-->
                            <div class="card">
                                <div class="card-header">Notification Preferences</div>
                                <div class="card-body">
                                    <form>
                                        <!-- Form Group (notification preference checkboxes)-->
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" id="checkAutoGroup" type="checkbox" checked />
                                                <label class="custom-control-label" for="checkAutoGroup">Automatically subscribe to group notifications</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" id="checkAutoProduct" type="checkbox" />
                                                <label class="custom-control-label" for="checkAutoProduct">Automatically subscribe to conference news</label>
                                            </div>
                                        </div>
                                        <!-- Submit button-->
                                        <button class="btn btn-danger-soft text-danger">Unsubscribe from all notifications</button>
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
