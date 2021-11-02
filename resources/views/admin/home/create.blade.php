@extends('admin.admin_master')
@section('admin')
<div class="col-lg-6">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Create About</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('store.about') }}" method="post" enctype="multipart/form-data">
              @csrf

                <div class="form-group">
                    <label for="exampleFormControlInput1">About title</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="title" placeholder="Slider Title">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Short description</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="short_dis"
                     rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Long description</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="long_dis"
                     rows="3"></textarea>
                </div>
                <div class="form-footer pt-4 pt-5 mt-4 border-top">
                    <button type="submit" class="btn btn-primary btn-default">Submit</button>
                </div>
            </form>
        </div>
    </div>


</div>

@endsection
