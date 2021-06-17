@extends('layouts.app',['activePage' => 'adduser', 'titlePage' => __('ajout user')])

@section('content')
<div class="content">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">
      <form class="form" method="POST" action="{{ route('recom.store') }}">
        @csrf
        <div class="card ">
            <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __("ajouter une recommandation") }}</h4>
            </div>
            <div class="card-body ">
            <div class="bmd-form-group{{ $errors->has('intitule') ? ' has-danger' : '' }}">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                      <i class="material-icons">Libelle</i>
                  </span>
                </div>
                <input type="text" name="libelle" class="form-control" value="" required>
                <input type="hidden" name="id" class="form-control" value="{{$id}}" required>
              </div>
              @if ($errors->has('libelle'))
                <div id="name-error" class="error text-danger pl-3" for="libelle" style="display: block;">
                  <strong>{{ $errors->first('libelle') }}</strong>
                </div>
              @endif
            </div>
			<div class="bmd-form-group{{ $errors->has('echeance') ? ' has-danger' : '' }}">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                      <i class="material-icons">Echéance</i>
                  </span>
                </div>
                <input type="date" name="echeance" class="form-control"  value="" required>
              </div>
              @if ($errors->has('echeance'))
                <div id="name-error" class="error text-danger pl-3" for="echeance" style="display: block;">
                  <strong>{{ $errors->first('echeance') }}</strong>
                </div>
              @endif
            </div>
            <!--<div class="bmd-form-group{{ $errors->has('statut') ? ' has-danger' : '' }}">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                      <i class="material-icons">Statut</i>
                  </span>
                </div>
                              <select id="statut" class="form-control" name="statut" required="required">
                                                    <option value="traitée">traitée</option>
                                                    <option value="nom traitée">non traitée</option>
                                </select>
              </div>
              @if ($errors->has('statut'))
                <div id="name-error" class="error text-danger pl-3" for="statut" style="display: block;">
                  <strong>{{ $errors->first('statut') }}</strong>
                </div>
              @endif
            </div>-->
          <div class="card-footer justify-content-center">
            <button type="submit" class="btn btn-primary btn-link btn-lg">{{ __('Ajouter') }}</button>
          </div>
      </form>
    </div>
  </div>
</div>
</div>
@endsection
