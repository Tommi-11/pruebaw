@extends('layouts.public')
@section('content')
    <x-public-news-list :noticias="$noticias" />
@endsection
