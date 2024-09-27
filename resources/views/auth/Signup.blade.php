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
<form class='w-50 mx-auto' action='{{route('signup')}}' method=POST>
@csrf

<!-- Email input -->
<div data-mdb-input-init class="form-outline mb-4">
    <input type="text" name="first_name" id="form2Example1" class="form-control border" />
    <label class="form-label" for="form2Example1">First Name</label>
  </div>
  <div data-mdb-input-init class="form-outline mb-4">
    <input type="text" name="last_name" id="form2Example1" class="form-control border" />
    <label class="form-label" for="form2Example1">Last Name</label>
  </div>

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

  

  <!-- Submit button -->
  <button  type="submit" data-mdb-button-init data-mdb-ripple-init class="signin_btn hoverBtn w-100 mb-2">Register </button>

  <!-- Register buttons -->
  <div class="text-center">
    <p>Already a User? <a href="{{route('login.view')}}" class='text-dark

'></a></p>
   
    
  </div>
</form>
</section>

@endsection