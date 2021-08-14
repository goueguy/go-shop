@extends('layouts.admin')
@section('title','LISTE COMMANDES')
@section('content')
<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Liste des Commandes</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box table-responsive">
                        <table id="data-list" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th>Référence</th>
                                <th>Taxe</th>
                                <th>Total</th>
                                <th>Total Hors Taxe</th>
                                <th>Total Général</th>
                                <th>Vendeur</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>CMD00001ABJ</td>
                                <td>0.18</td>
                                <td>5000</td>
                                <td>4000</td>
                                <td>6000</td>
                                <td>Nasco Boutique</td>
                                <td>En cours</td>
                                <td>
                                    <a href=""><i class="fa fa-trash"></i></a>
                                    <a href="{{route('admin.commandes.show',['id'=>1])}}"><i class="fa fa-eye"></i></a>
                                </td>
                            </tr>
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
