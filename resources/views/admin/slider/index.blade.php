@extends('admin.admin_master')
@section('admin')

    <div class="py-12">
        {{-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome />
            </div>
        </div> --}}
        <div class="container">
            <div class="row">

  <h4>Home Slider</h4>
              <a href="" class="float-right"> <button class="btn btn-info ">Add Slider</button></a>
<br><br>



                <div class="col-md-12 col-lg-12">
                    <div class="card">
                        @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong> {{ session('success') }} </strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif

                        <div class="card-header">
                            All Slider
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">SL No</th>
                                    <th scope="col">Slider Title</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                              {{-- @php($i = 1) --}}
                              @foreach ($sliders as $key => $slider)
                                <tr>
                                    <th scope="row"> {{ $slider->firstItem()+$loop->index }}</th>
                                    <td> {{ $slider->title }} </td>
                                    <td> {{ $slider->description }} </td>


                                    <td> <img src="{{ asset($slider->image) }}" style="height:40px; width:70px;">  </td>
                                    {{-- <td> {{ $brand->name }}  </td> --}}
                                    <td>
                                      <a href="{{ url('slider/edit/'.$slider->id)}}" class="btn btn-info ">Edit</a>
                                      <a href="{{ url('slider/delete/'.$slider->id)}}" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger ">Delete</a>

                                    </td>
                                </tr>
                              @endforeach
                            </tbody>
                        </table>
                        {{-- {{ $brands->links() }} --}}
                    </div>
                </div>





            </div>
        </div>

        <!--container-->
    </div>
@endsection