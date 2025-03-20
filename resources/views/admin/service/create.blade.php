@extends('admin.admin_master')

@section('admin')

<div class="col-lg-12">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">


            <h2>Create Services</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('store.service') }}" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="form-group">
                    <label for="exampleFormControlInput1">Service Title</label>
                    <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Service Title" required>

                </div>



                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Service Description</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description" required></textarea>
                </div>


                <div class="form-group">
                    <label for="serviceIcon">SVG Icon (Paste SVG Code)</label>
                    <textarea class="form-control" id="serviceIcon" name="svg_icon" rows="4" required>{{ old('svg_icon') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="fontIcon">Font Icon (Enter Boxicons or FontAwesome Class)</label>
                    <input type="text" class="form-control" id="fontIcon" name="font_icon" placeholder="e.g., bx bxl-dribbble" value="{{ old('font_icon') }}">
                </div>
                
                <div class="form-footer pt-5 mt-4 border-top">
                    <button type="submit" class="btn btn-primary btn-default">Submit</button>

                </div>
            </form>
        </div>
    </div>


</div>











@endsection
