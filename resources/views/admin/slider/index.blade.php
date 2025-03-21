@extends('admin.admin_master')

@section('admin')
    {{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}

            All Brand<b></b>

        </h2>
    </x-slot> --}}

    <div class="py-12">

        {{-- <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-welcome />
            </div> --}}




<h3>Home Slider</h3>
<br>
<a href="{{ route('add.slider') }}"><button class="btn btn-info">Add Slider</button></a>
<br><br>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">

                        {{-- Sucess Message --}}
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session('success') }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif


                        <div class="card-header">
                            All Sliders
                        </div>


                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col" width="5%">SL No.</th>
                                    <th scope="col" width="15%"> Slider Title</th>
                                    <th scope="col" width="25%">Description</th>
                                    <th scope="col" width="15%">Slider Image</th>
                                    <th scope="col" width="15%">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @php($i =1)


                                @foreach ($sliders as $slider)
                                    <tr>
                                        {{-- <th scope="row">{{ $loop->iteration }}</th> --}}
                                        {{-- <th scope="row">{{ $sliders->firstItem() + $loop->index }}</th> --}}

                                        <th scope="row">{{ $i++ }}</th>

                                        <td>{{ $slider->title }}</td>
                                        <td>{{ $slider->description }}</td>
                                        <td><img src="{{ asset($slider->image) }}" style="height:50px; width:70px; " /></td>
                                        <td>
                                        <a href="{{ url('slider/edit/' . $slider->id) }}" class="btn btn-info">Edit</a>
                                        <a href="{{ url('slider/delete/' . $slider->id) }}"
                                            onclick="return confirm('Are you sure to delete')"
                                            class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>



            </div>
        </div>
    </div>
    {{-- </x-app-layout> --}}
@endsection
