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
                                        University Budget
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
                <!-- Main page content-->
                <div class="container mt-4">

                    <div class="row">
                        <div class="col-xl-12">
                            <!-- Account details card-->
                            <div class="card mb-4">
                                <div class="card-header">Information</div>
                                <div class="card-body">

                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <form method="POST" action="{{ URL('save-budget') }}">
                                        @csrf
                                        <!-- Form Group (usernumber)-->
                                        <input type="hidden" name="user_id" value="{{ $university_data['university_id'] }}">
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputUsernumber">University Name</label> <br/>
                                            {{ $university_data['university_name'] }}
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputUsernumber">University Branch</label> <br/>
                                            {{ $university_data['university_branch'] }}
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputUsernumber">Budget</label> <br/>
                                            <input class="form-control" id="inputAddress" type="text" placeholder="" name="university_budget" value="{{ $university_data['university_budget'] }}" required/>
                                        </div>
                                        <!-- Save changes button-->
                                        <button class="btn btn-primary" type="submit">Save changes</button>
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

