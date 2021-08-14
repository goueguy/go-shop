@extends('layouts.admin')
@section('title','DETAIL PAIEMENT')
@section('content')
<div class="col-md-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Détail du Paiement: CMD00001ABJ</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br>
            <div class="col-md-6 col-sm-6 form-group has-feedback">
                <input type="text" name="name" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Nom" value="Adomon" readonly>
                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
            </div>
            <div class="col-md-6 col-sm-6 form-group has-feedback">
                <input type="text" name="name" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Franck Olivier" readonly>
                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
            </div>
            <div class="col-md-6 col-sm-6 form-group has-feedback">
                <input type="text" name="ref_commande" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Référence Commande" value="CMD00001ABJ" readonly>
                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
            </div>
            <div class="col-md-3 col-sm-6 form-group has-feedback">
                <input type="text" name="status" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Status" value="Soldée" readonly>
                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
            </div>
            <div class="col-md-3 col-sm-6 form-group has-feedback">
                <input type="text" name="montant" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Montant" value="5000 FCFA" readonly>
                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
            </div>
        </div>
    </div>

</div>
@endsection
