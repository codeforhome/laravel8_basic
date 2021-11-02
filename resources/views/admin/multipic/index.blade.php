@extends('admin.admin_master')
@section('admin')


{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Multi Picture

        </h2>
    </x-slot> --}}

<div class="py-12">
    {{-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome />
            </div>
        </div> --}}
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card-group">
                    @foreach ($images as $key => $multi)
                    <div class="col-md-4 mt-5">
                        <div class="card">
                            <img src="{{ asset($multi-> image) }}" alt="">
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Multi Image
                    </div>
                    <div class="card-body">
                        <form action="{{ route('store.image') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="exampleInputEmail1">Brand Image</label>
                                <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Insert brand Image" name="image[]" multiple="">
                                @error('image')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Add Image</button>
                        </form>
                    </div>

                </div>
            </div>



        </div>
    </div>

    <!--container-->
</div>
{{-- </x-app-layout> --}}
@endsection
