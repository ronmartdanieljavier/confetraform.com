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
    <title>Account Settings - Security - Conference Travel</title>
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
                                        Account Settings - Security
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
                        <a class="nav-link ml-0" href="userprofile">Profile</a>
                        <a class="nav-link active" href="security">Security</a>
                        <a class="nav-link" href="notifications">Notifications</a>
                    </nav>
                    <hr class="mt-0 mb-4" />
                    <div class="row">
                        <div class="col-lg-8">
                            <!-- Change password card-->
                            <div class="card mb-4">
                                <div class="card-header">Change Password</div>
                                <div class="card-body">
                                    <form>
                                        <!-- Form Group (current password)-->
                                        <div class="form-group">
                                            <label class="small mb-1" for="currentPassword">Current Password</label>
                                            <input class="form-control" id="currentPassword" type="password" placeholder="Enter current password" />
                                        </div>
                                        <!-- Form Group (new password)-->
                                        <div class="form-group">
                                            <label class="small mb-1" for="newPassword">New Password</label>
                                            <input class="form-control" id="newPassword" type="password" placeholder="Enter new password" />
                                        </div>
                                        <!-- Form Group (confirm password)-->
                                        <div class="form-group">
                                            <label class="small mb-1" for="confirmPassword">Confirm Password</label>
                                            <input class="form-control" id="confirmPassword" type="password" placeholder="Confirm new password" />
                                        </div>
                                        <button class="btn btn-primary" type="button">Save</button>
                                    </form>
                                </div>
                            </div>
                            <!-- Security preferences card-->
                            <div class="card mb-4">
                                <div class="card-header">Security Preferences</div>
                                <div class="card-body">
                                    <!-- Account privacy optinos-->
                                    <h5 class="mb-1">Account Privacy</h5>
                                    <p class="small text-muted">By setting your account to private, your profile information will ONLY be visible to staff members.</p>
                                    <form>
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" id="radioPrivate" type="radio" name="radioPrivacy" checked />
                                            <label class="custom-control-label" for="radioPrivate">Private (only staff members can see your profile)</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" id="radioPublic" type="radio" name="radioPrivacy" />
                                            <label class="custom-control-label" for="radioPublic">Public (staff can see your profile and students can see your profile name)</label>
                                        </div>
                                    </form>
                                    <hr class="my-4" />
                                    <!-- Agreement options-->
                                    <h5 class="mb-1">Agreement</h5>
                                    <p class="small text-muted">By continuing to use this tool and create conference travel applications, you aggree for any university staff members to review your information (including your personal details, academic history and all documents you submit) to choose the canditades and papers that, according to their judgement, are most suitable for the scholarship program.</p>
                                    <form>
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" id="radioAgreeYes" type="radio" name="radioUsage" checked disabled />
                                            <label class="custom-control-label" for="radioAgreeYes">Okay, I understand and authorise the staff to view and assess all information provided by me.</label>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <!-- Two factor authentication card-->
                            <div class="card mb-4">
                                <div class="card-header">Two-Factor Authentication</div>
                                <div class="card-body">
                                    <p>Add another level of security to your account by enabling two-factor authentication. We will send you a text message to verify your login attempts on unrecognized devices and browsers.</p>
                                    <form>
                                        <div class="form-group">
                                            <div class="custom-control custom-radio">
                                                <input class="custom-control-input" id="twoFactorOn" type="radio" name="radioUsage" checked />
                                                <label class="custom-control-label" for="twoFactorOn">On</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input class="custom-control-input" id="twoFactorOff" type="radio" name="radioUsage" />
                                                <label class="custom-control-label" for="twoFactorOff">Off</label>
                                            </div>
                                        </div>
                                        <div class="form-group mb-0">
                                            <label class="small mb-1" for="twoFactorSMS">SMS Number</label>
                                            <input class="form-control" id="twoFactorSMS" type="tel" placeholder="Enter a phone number" value="" />
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- Delete account card-->
                            <div class="card mb-4">
                                <div class="card-header">Delete Account</div>
                                <div class="card-body">
                                    <p>Deleting your account is a permanent action and cannot be undone. If you are sure you want to delete your account, select the button below.</p>
                                    <button class="btn btn-danger-soft text-danger" type="button">I understand, delete my account</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>

    <script src="js/sb-customizer.js"></script>
    <sb-customizer project="sb-admin-pro"></sb-customizer>
</body>
</html>

@endsection

