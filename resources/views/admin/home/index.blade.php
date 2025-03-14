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




<h3>Home About</h3>
<br>
<a href="{{ route('add.about') }}"><button class="btn btn-info">Add About</button></a>
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
                            All Aboiut Data
                        </div>


                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col" width="5%">SL No.</th>
                                    <th scope="col" width="15%">Home Title</th>
                                    <th scope="col" width="25%">Short Description</th>
                                    <th scope="col" width="15%">Long Description</th>
                                    <th scope="col" width="15%">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @php($i =1)


                                @foreach ($homeabout as $about)
                                    <tr>
                                        {{-- <th scope="row">{{ $loop->iteration }}</th> --}}
                                        {{-- <th scope="row">{{ $sliders->firstItem() + $loop->index }}</th> --}}

                                        <th scope="row">{{ $i++ }}</th>

                                        <td>{{ $about->title }}</td>
                                        <td>{{ $about->short_dis }}</td>
                                        <td>{{ $about->long_dis }}</td>
                                        <td>
                                        <a href="{{ url('about/edit/' . $about->id) }}" class="btn btn-info">Edit</a>
                                        <a href="{{ url('about/delete/' . $about->id) }}"
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
