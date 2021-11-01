@extends('admin.admin_master')
@section('admin')
<div class="col-lg-6">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Create Slider</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('store.slider') }}" method="post" enctype="multipart/form-data">
              @csrf
        
                <div class="form-group">
                    <label for="exampleFormControlInput1">Slider title</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="title" placeholder="Slider Title">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Slider description</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="description"
                     rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Slider image</label>
                    <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                </div>
                <div class="form-footer pt-4 pt-5 mt-4 border-top">
                    <button type="submit" class="btn btn-primary btn-default">Submit</button>
                </div>
            </form>
        </div>
    </div>


</div>

@endsection
