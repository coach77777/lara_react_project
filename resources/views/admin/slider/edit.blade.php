
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
   <h2>Edit Slider</h2>

    </div>
    <div class="card-body">


    <form action="{{ route('slider.update', $sliders->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="old_image" value="{{ $sliders->image }}">

        <div class="form-group mb-3">
          <label for="exampleInputEmail1" class="form-label"><strong>Slider Title</strong> </label>
          <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
          value="{{ $sliders->title }}">
@error('title')
<span class="text-danger">{{$message}}</span>
@enderror
        </div>

        <div class="form-group mb-3">
            <label for="exampleInputEmail1" class="form-label"><strong>Update Description</strong></label>
            <textarea name="description" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">{{ $sliders->description }}</textarea>
  @error('description')
  <span class="text-danger">{{$message}}</span>
  @enderror
          </div>

        <div class="form-group mb-3">
            <label for="exampleInputEmail1" class="form-label"><strong>Update Slider Image</strong></label>
            <input type="file" name="image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  @error('image')
  <span class="text-danger">{{$message}}</span>
  @enderror
          </div>


<div class="form-group">
    <img src=" {{ asset( $sliders->image)}}" style="width:400px; height:200px;" >
</div>




        <button type="submit" class="btn btn-primary">Update Sliders</button>
      </form>
</div>
</div>
</div>



</div>

</div>
    </div>
{{-- </x-app-layout> --}}

@endsection
