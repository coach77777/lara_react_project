@extends('admin.admin_master')
@section('admin')
    <div class="py-12">
        <h3>Home Services</h3>
<br>
<a href="{{ route('add.service') }}"><button class="btn btn-info">Add Service</button></a>
<br><br>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">

                        {{-- Sucess Message --}}
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session('success') }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        {{-- End success Message --}}


                        <div class="card-header">
                            All Services
                        </div>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">SL No.</th>
                                    <th scope="col">Service Title</th>
                                    <th scope="col">Service Description</th>
                                    <th scope="col">Service Icon</th>
                                    <th scope="col">Font Icon</th>
                                    <th scope="col">Color</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i =1)
                                @foreach ($services as $service)
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <td>{{ $service->title }}</td>
                                        <td>{{ $service->description }}</td>
                                        <td>
                                            <div style="width:100px; height:100px; display:block;">
                                                {!! str_replace('#f5f5f5', $service->color ?? '#6a00ff', $service->svg_icon) !!}
                                            </div>
                                        </td>
                                        <td>
                                            <i class="{{ $service->font_icon }}" style="font-size: 24px; color: {{ $service->color ?? '#6a00ff' }};"></i>
                                        </td>
                                        <td>
                                            <span style="background: {{ $service->color ?? '#6a00ff' }}; padding: 5px 10px; border-radius: 5px; color: white;">
                                                {{ $service->color ?? 'No Color' }}
                                            </span>
                                        </td>
                                        <td>
                                            <a href="{{ url('service/edit/' . $service->id) }}" class="btn btn-info">Edit</a>
                                            <a href="{{ url('service/delete/' . $service->id) }}" onclick="return confirm('Are you sure to delete')" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </table>
                        {{-- {{ $services->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


