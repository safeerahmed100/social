@extends('/layout/app')
@section('content')
@if($message = Session::get('success'))
<div class='alert alert-success'>
  <div class="container"> <strong>{{$message}}</strong> </div>
</div>
@elseif ($message = Session::get('error'))
<div class='alert alert-danger'>
<div class="container"> <strong>{{$message}}</strong> </div>
</div>
 @endif
 <section id='login-page' class='m-5'>
<div class='container d-flex align-items-center h-100'>
<!-- Pills navs -->
<form class='w-50 mx-auto' action='{{route('login')}}' method=POST>
@csrf
  <!-- Email input -->
  <div data-mdb-input-init class="form-outline mb-4">
    <input type="email" name="email" id="form2Example1" class="form-control border" />
    <label class="form-label" for="form2Example1">Email address</label>
  </div>

  <!-- Password input -->
  <div data-mdb-input-init class="form-outline mb-4">
    <input type="password" name="password" id="form2Example2" class="form-control border" />
    <label class="form-label" for="form2Example2">Password</label>
  </div>

  <!-- 2 column grid layout for inline styling -->
  <div class="row mb-4">
    

    <div class="col">
      <!-- Simple link -->
      {{-- <a href={{route('password.request')}} class='text-dark'>Forgot password?</a> --}}
    </div>
  </div>

  <!-- Submit button -->
  <button  type="submit" data-mdb-button-init data-mdb-ripple-init class="signin_btn hoverBtn w-100 mb-2">Sign in</button>

  <!-- Register buttons -->
  <div class="text-center">
    <p>Not a member? <a href="{{route('signup.view')}}" class='text-dark

'>Register</a></p>
   
    
  </div>
</form>
</section>

@endsection