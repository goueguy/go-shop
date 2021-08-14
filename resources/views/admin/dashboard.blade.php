@extends('layouts.admin')
@section('title','WAREHOUSE | DASHBOARD')
@section('content')
.<div role="main">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="top_tiles">
                    <div class="animated flipInY col-md-3 col-sm-6 ">
                        <div class="tile-stats">
                        <div class="icon"><i class="fa fa-user"></i></div>
                        <div class="count">{{$clients}}</div>
                        <h3>Clients</h3>
                        </div>
                    </div>
                    <div class="animated flipInY  col-md-3 col-sm-6 ">
                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-shopping-cart"></i></div>
                            <div class="count">{{$commandes}}</div>
                            <h3>Commandes</h3>
                        </div>
                    </div>
                    <div class="animated flipInY col-md-3 col-sm-6 ">
                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-shopping-bag"></i></div>
                            <div class="count">{{$articles}}</div>
                            <h3>Articles</h3>
                        </div>
                    </div>
                    <div class="animated flipInY col-md-3 col-sm-6 ">
                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-industry"></i></div>
                            <div class="count">{{$vendeurs}}</div>
                            <h3>Vendeurs</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
