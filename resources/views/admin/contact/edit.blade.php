@extends('admin.admin_master')
@section('admin')
<div class="col-lg-6">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Edit Contact</h2>
        </div>
        <div class="card-body">
            <form action="{{ url('admin/contact/update/'.$contacts -> id) }}" method="post" enctype="multipart/form-data">
              @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Contact Email </label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" name="email" placeholder="Contact Email" value="{{ $contacts -> email }}">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Contact Phone </label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="phone" placeholder="Contact Phone" value="{{ $contacts -> phone }}">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Contact Address</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="address"
                     rows="3">{{ $contacts -> address }}</textarea>
                </div>

                <div class="form-footer pt-4 pt-5 mt-4 border-top">
                    <button type="submit" class="btn btn-primary btn-default">Submit</button>
                </div>
            </form>
        </div>
    </div>


</div>

@endsection
