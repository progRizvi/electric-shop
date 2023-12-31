@extends('frontend.master')
@section('contents')

<main class="login-form">

    <div class="cotainer">

        <div class="row justify-content-center">

            <div class="col-md-8">

                <div class="card">

                    <div class="card-header">Reset Password</div>

                    <div class="card-body">



                        @if(session()->has('message'))

                        <p class="alert alert-success">{{session()->get('message')}}</p>

                        @endif



                        <form action="{{route('submit.forgot.pass')}}" method="POST">

                            @csrf

                            <div class="form-group row">

                                <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                                <div class="col-md-6">

                                    <input type="text" id="email_address" class="form-control" name="email" required autofocus>

                                    @if ($errors->has('email'))

                                    <span class="text-danger">{{ $errors->first('email') }}</span>

                                    @endif

                                </div>

                            </div>

                            <div class="col-md-6 offset-md-4">

                                <button type="submit" class="btn btn-warning">

                                    Send Password Reset Link

                                </button>

                            </div>

                        </form>



                    </div>

                </div>

            </div>

        </div>

    </div>

</main>
<br>

@endsection