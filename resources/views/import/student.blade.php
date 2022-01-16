@extends('layouts.advanced_nav')
@section('css')
@endsection
@section('content')
    <div class="d-flex h-100 w-100 justify-content-center">
        <div class="card card-navy">
            <div class="card-header">
                <h6 class="text-right">{{__('component.import',['name'=>__('main.student')])}}</h6>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="{{route('file.student.import')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <h6 for="exampleInputFile" class="text-right">{{__('component.File input')}}</h6>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="file" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">{{__('component.File input')}}</label>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">{{__('main.submit')}}</button>
                </div>
            </form>
        </div>

    </div>

@endsection
@section('js')

@endsection