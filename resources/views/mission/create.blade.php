@extends('layouts.app',['activePage' => 'adduser', 'titlePage' => __('ajout user')])

@section('content')
<div class="content">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">
      <form class="form" method="POST" action="{{ route('mission.store') }}">
        @csrf
        <div class="card ">
            <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __("Nouvelle mission") }}</h4>
            </div>
            <div class="card-body ">
            <div class="bmd-form-group{{ $errors->has('intitule') ? ' has-danger' : '' }}">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                      <i class="material-icons">Intitulé</i>
                  </span>
                </div>
                <input type="text" name="intitule" class="form-control" value="" required>
              </div>
              @if ($errors->has('intitule'))
                <div id="name-error" class="error text-danger pl-3" for="intitule" style="display: block;">
                  <strong>{{ $errors->first('intitule') }}</strong>
                </div>
              @endif
            </div>
			<div class="bmd-form-group{{ $errors->has('debut') ? ' has-danger' : '' }}">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                      <i class="material-icons">Date de début</i>
                  </span>
                </div>
                <input type="date" name="debut" class="form-control"  value="" required>
              </div>
              @if ($errors->has('debut'))
                <div id="name-error" class="error text-danger pl-3" for="prenom" style="display: block;">
                  <strong>{{ $errors->first('debut') }}</strong>
                </div>
              @endif
            </div>
			<div class="bmd-form-group{{ $errors->has('fin') ? ' has-danger' : '' }}">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                      <i class="material-icons">Date de fin</i>
                  </span>
                </div>
                <input type="date" name="fin" class="form-control" value="" required>
              </div>
              @if ($errors->has('fin'))
                <div id="name-error" class="error text-danger pl-3" for="fin" style="display: block;">
                  <strong>{{ $errors->first('fin') }}</strong>
                </div>
              @endif
            </div>
			<div class="bmd-form-group{{ $errors->has('direction') ? ' has-danger' : '' }}">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                      <i class="material-icons">Direction</i>
                  </span>
                </div>
                <select id="direction" class="form-control" name="direction" required="required">
                                                    @foreach($direction_list as $dir)
                                                    <option value="{{$dir->id}}">{{$dir->libelle}}</option>
                                                    @endforeach
                                                </select>
              </div>
              @if ($errors->has('direction'))
                <div id="name-error" class="error text-danger pl-3" for="direction" style="display: block;">
                  <strong>{{ $errors->first('direction') }}</strong>
                </div>
              @endif
            </div>
              </div>
          <div class="card-footer justify-content-center">
            <button type="submit" class="btn btn-primary btn-link btn-lg">{{ __('Ajouter') }}</button>
          </div>
      </form>
    </div>
  </div>
</div>
</div>
@endsection
