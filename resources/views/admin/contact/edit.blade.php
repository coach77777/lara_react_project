@extends('admin.admin_master')

@section('admin')
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">


                <h2>Edit Contact</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('update.contact', $contact->id) }}" method="POST">

                    @csrf

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Contact Email</label>
                        <input type="text" name="email" class="form-control" id="exampleFormControlInput1"
                            value="{{ $contact->email }}" required>
                    </div>


                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Contact Phone</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="phone" required>{{ $contact->phone }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Contact Address</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="address" required>{{ $contact->address }}</textarea>
                    </div>

                    <div class="form-footer pt-5 mt-4 border-top">
                        <button type="submit" class="btn btn-primary btn-default">Update</button>
                    </div>
                </form>
            </div>
        </div>


    </div>
@endsection
