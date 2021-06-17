@extends('layouts.app', ['activePage' => 'profile', 'titlePage' => __('User Profile')])

@section('content')
<div class="content">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">
<form method="post" action="{{ route('recom.update', $rec->id) }}" autocomplete="off" class="form-horizontal">
@csrf
@method('put')

<div class="card ">
<div class="card-header card-header-primary">
<h4 class="card-title">{{ __("Modification de l'état de la recommandation") }}</h4>
<p class="card-category">{{ __('Informations') }}</p>
</div>
<div class="card-body ">
                @if (session('status'))
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('status') }}</span>
                      </div>
                    </div>
                  </div>
                @endif
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Libellé') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('libelle') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('libelle') ? ' is-invalid' : '' }}" name="libelle" id="input-name" type="text" placeholder="{{ __('libelle') }}" value="{{ $rec->libelle }}" required="true" aria-required="true"/>
                      @if ($errors->has('libelle'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('libelle') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Echeance') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('echeance') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('echeance') ? ' is-invalid' : '' }}" name="echeance" id="input-name" type="date" placeholder="{{ __('echeance') }}" value="{{ $rec->echeance }}" required="true" aria-required="true"/>
                      @if ($errors->has('echeance'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('echeance') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Statut') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('statut') ? ' has-danger' : '' }}">
                    <select id="statut" class="form-control" name="statut" required="required">
                                                    <option value="{{ $rec->statut }}">{{ $rec->statut }}</option>
                                                    <option value="traitée">traitée</option>
                                                    <option value="non traitée">non traitée</option>
                                </select>
                      <!--<input class="form-control{{ $errors->has('statut') ? ' is-invalid' : '' }}" name="statut" id="input-name" type="text" placeholder="{{ __('libelle') }}" value="{{ $rec->statut }}" required="true" aria-required="true"/>-->
                      @if ($errors->has('statut'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('statut') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Enrégistrer') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection