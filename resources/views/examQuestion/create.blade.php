@extends('layouts.advanced_nav')
@section('css')

@endsection
@section('content')
    <form action="{{route('exam.question.store',$exam->id)}}" method="post">
        @csrf
         <textarea id="editor1" name="question" class="ckeditor" required cols="80" rows="10">
    </textarea>
        @error('question')
        <span>{{$message}}</span>
        @enderror
        <button type="submit" class="btn btn-outline-primary">{{__('button.submit')}}</button>

    </form>


@endsection
@section('js')

            <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
            <script>
                CKEDITOR.replace('editor1');
            </script>
@endsection