@extends('user.layout')
@section('page_content')
{{QrCode::size(250)->generate('https://www.google.com/');}}
@endsection
