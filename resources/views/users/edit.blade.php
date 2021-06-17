@extends('layouts.app', ['activePage' => 'profile', 'titlePage' => __('User Profile')])

@section('content')
<div class="content">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">
<form method="post" action="{{ route('user.update', $user->id) }}" autocomplete="off" class="form-horizontal">
@csrf
@method('put')

<div class="card ">
<div class="card-header card-header-primary">
<h4 class="card-title">{{ __("Modification des informations d'un utilisateur") }}</h4>
</div>
<div class="card-body ">
            <div class="bmd-form-group{{ $errors->has('intitule') ? ' has-danger' : '' }}">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                      <i>Nom</i>
                  </span>
                </div>
                <input type="text" name="nom" class="form-control" value="{{$user->nom}}" required>
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
                <input type="text" name="prenom" class="form-control"  value="{{$user->prenom}}" required>
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
                      <i class="material-icons">Email</i>
                  </span>
                </div>
                <input type="text" name="email" class="form-control" value="{{$user->email}}" required>
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
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Enrégistrer') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script type="text">
  function 
  </script>
@endsection
