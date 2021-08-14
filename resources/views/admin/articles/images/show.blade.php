@extends('layouts.admin')
@section('content')

<div class="col-md-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Détail De L'image</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br>
            <div class="container">
                <div class="row">
                    <div class="col-lg-2">
                        <div class="card">
                            <img src="{{asset('assets/images/prod-1.jpg')}}" height="100px"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
