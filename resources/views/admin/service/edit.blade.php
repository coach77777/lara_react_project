@extends('admin.admin_master')

@section('admin')


 {{-- Sucess Message --}}
 @if (session('success'))
 <div class="alert alert-success alert-dismissible fade show" role="alert">
     <strong>{{ session('success') }}</strong>
     <button type="button" class="btn-close" data-bs-dismiss="alert"
         aria-label="Close"></button>
 </div>
@endif

<div class="col-lg-12">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">


            <h2>Edit Services</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('update.service', ['id' => $service->id]) }}" method="POST">
            {{-- enctype="multipart/form-data"> --}}

                @csrf

                <div class="form-group mb-3">
                    <label for="exampleInputEmail1" class="form-label"><strong>Service Title</strong></label>
                    <input type="text" name="title" class="form-control" id="exampleFormControlInput1"
                    value="{{ $service->title }}" required>

                    @error('title')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                            </div>

                            <div class="form-group mb-3">
                    <label for="exampleFormControlTextarea1"><strong>Update Service Description</strong></label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description" required>{{ $service->description }}</textarea>
                    @error('description')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                            </div>

                            <div class="form-group mb-3">
                    <label for="serviceIcon">SVG Icon (Paste SVG Code)</label>
                    <textarea class="form-control" id="serviceIcon" name="svg_icon" rows="4" required>{{ $service->svg_icon }}</textarea>

                </div>

                <div class="form-group">
                    <label for="fontIcon">Font Icon (Enter Boxicons or FontAwesome Class)</label>
                    <input type="text" class="form-control" id="fontIcon" name="font_icon" value="{{ $service->font_icon }}">

                </div>

                <div class="form-group">
                    <label for="fontIcon">Color(in Hex)</label>
                    <input type="text" class="form-control" id="color" name="color" value="{{ $service->color}}">

                </div>

                <div class="form-footer pt-5 mt-4 border-top">
                    <button type="submit" class="btn btn-primary btn-default">Submit</button>

                </div>
            </form>
        </div>
    </div>


</div>



@endsection
