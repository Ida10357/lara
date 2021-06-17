@extends('layouts.app',['activePage' => 'adduser', 'titlePage' => __('ajout user')])

@section('content')
<div class="content">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">
      <form class="form" method="POST" action="{{ route('user.store') }}">
        @csrf
        <div class="card ">
            <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __("Nouveau utilisateur") }}</h4>
            </div>
            <div class="card-body ">
            <div class="bmd-form-group{{ $errors->has('intitule') ? ' has-danger' : '' }}">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                      <i>Nom</i>
                  </span>
                </div>
                <input type="text" name="nom" class="form-control" value="" required>
              </div>
              @if ($errors->has('nom'))
                <div id="name-error" class="error text-danger pl-3" for="nom" style="display: block;">
                  <strong>{{ $errors->first('nom') }}</strong>
                </div>
              @endif
            </div>
			<div class="bmd-form-group{{ $errors->has('debut') ? ' has-danger' : '' }}">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                      <i>Prénom</i>
                  </span>
                </div>
                <input type="text" name="prenom" class="form-control"  value="" required>
              </div>
              @if ($errors->has('prenom'))
                <div id="name-error" class="error text-danger pl-3" for="prenom" style="display: block;">
                  <strong>{{ $errors->first('prenom') }}</strong>
                </div>
              @endif
            </div>
			<div class="bmd-form-group{{ $errors->has('fin') ? ' has-danger' : '' }}">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                      <i>Email</i>
                  </span>
                </div>
                <input type="text" name="email" class="form-control" value="" required>
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
                      <i>Groupe</i>
                  </span>
                </div>
                <select id="direction" class="form-control" name="groupe" required="required">
                                                    @foreach($groupe_list as $group)
                                                    <option value="{{$group->id}}">{{$group->libelle}}</option>
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
            <button type="submit" class="btn btn-primary btn-link btn-lg">{{ __('Enrégistrer') }}</button>
          </div>
      </form>
    </div>
  </div>
</div>
</div>
@endsection
