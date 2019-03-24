@extends('layouts.app')

@section('content')
<client :id="{{$id}}" :client="{{$client}}"></client>
@endsection
