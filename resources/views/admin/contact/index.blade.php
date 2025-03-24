@extends('admin.admin_master')

@section('admin')
    <div class="py-12">

        <h3>Contact Page</h3>
        <br>
        <a href="{{ route('add.contact') }}"><button class="btn btn-info">Add Contact Information</button></a>
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
                        {{-- End Sucess Message --}}

                        <div class="card-header">
                            All Contact Data
                        </div>


                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col" width="5%">SL No.</th>
                                    <th scope="col" width="35%">Contact Address</th>
                                    <th scope="col" width="15%">Contact Email</th>
                                    <th scope="col" width="15%">Contact Phone</th>
                                    <th scope="col" width="15%">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @php($i = 1)
                                @foreach ($contacts as $con)
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <td>{{ $con->address }}</td>
                                        <td>{{ $con->email }}</td>
                                        <td>{{ $con->phone }}</td>
                                        <td>
                                            <a href=" {{ route('contact.edit', $con->id) }} " class="btn btn-info">Edit</a>
                                            <a href="{{ route('contact.delete', $con->id) }} "
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
@endsection
