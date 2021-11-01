@extends('admin.admin_master')
@section('admin')
<div class="col-lg-6">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Edit Slider</h2>
        </div>
        <div class="card-body">
            <form action="{{ url('slider/update/'.$slider -> id) }}" method="post" enctype="multipart/form-data">
              @csrf
              <input type="hidden" class="form-control" id="exampleFormControlInput1" name="old_image" value="{{ $slider -> image }}" placeholder="Slider Title">

                <div class="form-group">
                    <label for="exampleFormControlInput1">Slider title</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="title" value="{{ $slider -> title }}" placeholder="Slider Title">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Slider description</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="description"
                     rows="3">{{ $slider -> description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Slider image</label>
                    <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                    <br>
                    <img src="{{ asset( $slider -> image ) }}" width="200" height="140">
                </div>
                <div class="form-footer pt-4 pt-5 mt-4 border-top">
                    <button type="submit" class="btn btn-primary btn-default">Submit</button>
                </div>
            </form>
        </div>
    </div>


</div>

@endsection
