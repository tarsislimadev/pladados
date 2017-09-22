@extends('layout.default')

@section('before')
<div class="container">
    <h1>Terremotos no mundo</h1>
    <p>Veja os terremotos que estão acontecendo pelo mundo. <a href="#">Veja mais...</a></p>
</div>
<div id="main_map">
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-4">
        <h2>Heading</h2>
        <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
        <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
    </div>
    <div class="col-md-4">
        <h2>Heading</h2>
        <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
        <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
    </div>
    <div class="col-md-4">
        <h2>Heading</h2>
        <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
        <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
    </div>
</div>
@endsection

@section('styles')
<style>
    #main_map {
        height: 300px;
    }
</style>
@endsection

@section('scripts')

@include('template.map', ['map' => $main_map, 'map_id' => 'main_map'])

@endsection
