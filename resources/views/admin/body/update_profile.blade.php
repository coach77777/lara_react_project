@extends('admin.admin_master')

@section('admin')

      {{-- Sucess Message --}}
      @if (session('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>{{ session('success') }}</strong>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
  @endif
  {{-- End Sucess Message --}}

<div class="card card-default">
    <div class="card-header card-header-border-bottom">



      <p class="text-center"><h2>User Profile Update</h2></p>






    </div>
    <div class="card-body">

        <form method="POST" action={{ route('update.user.profile') }} class="form-pill">

            @csrf

            <div class="form-group">
                <label for="exampleFormControlInput3">User Name</label>
                <input type="text" class="form-control"
                name="name"  value="{{ $user['name'] }}" >

            </div>

            <div class="form-group">
                <label for="exampleFormControlInput3">User Email</label>
                <input type="text" class="form-control"
                name="email"  value="{{ $user['email'] }}" >

            </div>



            <button class= "btn btn-primary btn-default " type ="submit">Update</button>

        </form>
    </div>
</div>

@endsection
