<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Registration Page</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/my.css')}}">

</head>
<body>
    <div id="content">
        <div id="loginContainer" class="container border border-1 rounded-3 mt-5 p-4 bg-secondary bg-gradient">
            <div class="register-logo text-center">
                <h1>Registration</h1>
            </div>
            <div class="card bg-light">
                <div class="card-body register-card-body">
                    <form id="send_form" action="{{route('auth.store')}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <input name="name" id="name" type="text"
                                   class="form-control"
                                   placeholder="Name">
                        </div>
                        <div class="mb-3">
                            <input name="last_name" id="last_name" type="text"
                                   class="form-control"
                                   placeholder="Last Name">
                        </div>
                        <div class="mb-3">
                            <input name="email" id="email" type="email"
                                   class="form-control"
                                   placeholder="Email">
                        </div>
                        <div class="mb-3">
                            <input name="password" id="password" type="password"
                                   class="form-control"
                                   placeholder="Password">
                        </div>
                        <div class="mb-3">
                            <input name="password_confirmation" type="password"
                                   class="form-control"
                                   placeholder="Retype password">
                        </div>
                        <div class="row m-1">
                            <div class="col text-start">
                                <span id="other_error" class=""><strong></strong></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 text-start">
                                <a href="{{route('auth.create')}}" class="btn btn-info min-width-button text-dark">Cancel</a>
                            </div>
                            <div class="col-6 text-end">
                                <button type="submit" class="btn btn-primary btn-block min-width-button text-dark">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
{{--        Modal form--}}
        <div id="exampleModal" class="modal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content bg-warning">
                    <div class="modal-header text-danger">
                        <h4 class="modal-title ">Errors</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body danger text-center text-danger display-5">
                        <p>Email not valid!!</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary min-width-button" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="{{asset('js/my.js')}}"></script>

</body>
</html>
