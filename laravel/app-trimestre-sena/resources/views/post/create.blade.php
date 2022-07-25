@extends('layouts.master')

@section('title', 'Crear post')

@section('content')

    <h1>Create Post</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{url('post')}}" method="post">
        {{ csrf_field() }}
        <label for="title">Post Title</label>
        <input id="title" name="title" class="form-control" type="text">
        @error('title')
            {{ $message }}
        @enderror
        <br>
        <label for="description">Post Description</label>
        <textarea id="description" class="form-control" name="description"></textarea>
        @error('description')
            {{ $message }}
        @enderror
        <br>
        <input type="submit" class="btn btn-success">
    </form>

    <input type="hidden" name="pwd" id="pwd" value="123">
    <button type="button" name="button" id="send"> Send data </button>
    <script>
      // https://stackoverflow.com/questions/9269265/ajax-jquery-simple-get-request
      $("#send").on("click", function () {
        const item = {
          password: $("#pwd").val(),
          isSecure: false
        };
        // ó también de esta forma se le pasa a la propiedad `data`
        var dataString = "flag=fetchmediaaudio&id=1";
        // data: dataString
        $.ajax({
          type: "GET",
          accepts: "application/json",
          url: "http://localhost:8000/ajax/example",
          contentType: "application/json",
          data: JSON.stringify(item),
          error: function (jqXHR, textStatus, errorThrown) {
            console.log(`${jqXHR}`, ` ${textStatus}`, ` ${errorThrown}`);
          },
          success: function (result) {
            if (result.OK) {
              window.alert("Todo okey :)");
            }
          }
        });
      })
    </script>
@endsection

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>


@section('navbar')

    NAVBAR
@endsection