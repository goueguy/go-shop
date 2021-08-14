@extends('layouts.admin')
@section('title','DÉTAIL COMMANDE')
@section('style')
    <style>
        div#orders-list_filter{
            float:right;
        }
        .input-sm{
            display:inline-block;
            width:auto;
        }
    </style>
@endsection
@section('content')
<div class="x_panel">
    <div class="x_title">
        <h2>Détail de la Commande</h2>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <br>
        <form class="form-label-left input_mask" action="#" method="POST">
            @csrf
            <div class="col-md-6 col-sm-6  form-group has-feedback">
                <input type="text" name="name" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Nom" value="Goueguy" readonly>
                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
            </div>
            <div class="col-md-6 col-sm-6  form-group has-feedback">
                <input type="text" name="lastname" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Prénoms" value="Jean-Louis Alexis" readonly>
                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
            </div>
            <div class="col-md-6 col-sm-6  form-group has-feedback">
                <input type="text" name="reference" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Référence" value="CMD00001ABJ" readonly>
                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
            </div>
            <div class="col-md-3 col-sm-6  form-group has-feedback">
                <input type="text" name="status" class="form-control has-feedback-left" id="inputSuccess2" placeholder="status" value="LIVRÉE" readonly>
                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
            </div>
            <div class="col-md-3 col-sm-6  form-group has-feedback">
                <input type="text" name="vendeur" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Vendeur" value="Nasco Vendeur" readonly>
                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
            </div>
        </form>
    </div>
</div>

<div class="x_panel">
    <div class="x-content">
        <table class="table table-bordered" id="orders-list">
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>Référence Commande</th>
                        <th>Article</th>
                        <th>Quantité</th>
                        <th>Prix Unitaire</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>CMD00001ABJ</td>
                        <td>Réfrigérateur Nasco</td>
                        <td>1</td>
                        <td>5000</td>
                    </tr>
                </tbody>
        </table>
    </div>
</div>
<div class="row text-right">
    <div class="col-md-12">
        <div class="x_panel">
            <p class="mr-4">Sous Total: <span class="font-weight-bold">5000 FCFA</span></p>
            <p class="mr-4">Total hors Taxe: <span class="font-weight-bold">5000 FCFA</span></p>
            <p class="mr-4">Taxe: <span class="font-weight-bold">0.18</span></p>
            <p class="mr-4">Total Général: <span class="font-weight-bold">6000 FCFA</span></p>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(function(){
        $("#orders-list").DataTable();
    })
</script>
@endsection
