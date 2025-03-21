
@extends('admin.admin_master')

@section('admin')




{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}

          Edit Brand<b></b>

        </h2>
    </x-slot> --}}

       {{-- Sucess Message --}}
       @if (session('success'))
       <div class="alert alert-success alert-dismissible fade show" role="alert">
           <strong>{{ session('success') }}</strong>
           <button type="button" class="btn-close" data-bs-dismiss="alert"
               aria-label="Close"></button>
       </div>
   @endif

    <div class="py-12">

            {{-- <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-welcome />
            </div> --}}
<div class="container">
<div class="row">



<div class="col-md-8">
    <div class="card">
    <div class="card-header">
   <h2>Edit Brand</h2>

    </div>
    <div class="card-body">


    <form action="{{ route('brand.update', ['id' => $brands->id]) }} " method="POST" enctype="multipart/form-data">

        @csrf

        <input type="hidden" name="old_image" value="{{ $brands->brand_image }}">

        <div class="form-group mb-3">
          <label for="exampleInputEmail1" class="form-label"><strong>Brand Name</strong> </label>
          <input type="text" name="brand_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
          value="{{ $brands->brand_name }}">
@error('brand_name')
<span class="text-danger">{{$message}}</span>
@enderror
        </div>

        <div class="form-group mb-3">
            <label for="exampleInputEmail1" class="form-label"><strong>Update Brand Image</strong></label>
            <input type="file" name="brand_image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
            value="{{ $brands->brand_image }}">
  @error('brand_image')
  <span class="text-danger">{{$message}}</span>
  @enderror
          </div>


<div class="form-group">
    <img src=" {{ asset( $brands->brand_image)}}" style="width:400px; height:200px;" >
</div>




        <button type="submit" class="btn btn-primary">Update Brand</button>
      </form>
</div>
</div>
</div>



</div>

</div>
    </div>
{{-- </x-app-layout> --}}

@endsection
