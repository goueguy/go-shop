@extends('layouts.admin')
@section('title','LISTE PAIEMENTS')
@section('content')
<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Liste des Paiements</h2>
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
                                <th>Référence Commande</th>
                                <th>Client</th>
                                <th>Montant</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>CMD00001ABJ</td>
                                <td>Adomon Franck Olivier</td>
                                <td>5000 FCFA</td>
                                <td>Soldée</td>
                                <td>
                                    <a href="{{route('admin.paiements.show',['id'=>1])}}"><i class="fa fa-edit"></i></a>
                                    <a href=""><i class="fa fa-trash"></i></a>
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
