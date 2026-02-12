@extends('templates.tpl_default', ['name' => 'AK'])
@section('css')
    <link rel="stylesheet" href="path_to_file_news.css" media="all">
@endsection

@section('content')
    <div class="news">
        <h3>{{ $title }}</h3>
        <p>{{ $description }}</p>
    </div>
@endsection

@section('js')
    <script src="path_to_file_news.js"></script>
@endsection