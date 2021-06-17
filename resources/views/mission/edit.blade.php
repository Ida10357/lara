@extends('layouts.app', ['activePage' => 'profile', 'titlePage' => __('User Profile')])

@section('content')
<div class="content">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">
<form method="post" action="{{ route('mission.update', $mis->id) }}" autocomplete="off" class="form-horizontal">
@csrf
@method('put')

<div class="card ">
<div class="card-header card-header-primary">
<h4 class="card-title">{{ __("Modification de mission") }}</h4>
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
                  <label class="col-sm-2 col-form-label">{{ __('Intitule') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('intitule') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('intitule') ? ' is-invalid' : '' }}" name="intitule" id="input-name" type="text" placeholder="{{ __('Intitule') }}" value="{{ $mis->intitule }}" required="true" aria-required="true"/>
                      @if ($errors->has('intitule'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('intitule') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Date de début') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('debut') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('debut') ? ' is-invalid' : '' }}" name="debut" id="input-name" type="date" placeholder="{{ __('debut') }}" value="{{ $mis->debut }}" required="true" />
                      @if ($errors->has('debut'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('debut') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Date de fin') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('fin') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('fin') ? ' is-invalid' : '' }}" name="fin" id="input-name" type="date" placeholder="{{ __('fin') }}" value="{{ $mis->fin }}" required="true" aria-required="true"/>
                      @if ($errors->has('fin'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('fin') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Direction') }}</label>
                        <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('direction') ? ' has-danger' : '' }}">
                                                <select id="direction" class="form-control" name="direction" required="required">
                                                    <option value="{{ old('direction', $mis->direction_id) }}" selected>{{$direction->libelle}}</option>
                                                    @foreach($direction_list as $dir)
                                                    <option value="{{$dir->id}}">{{$dir->libelle}}</option>
                                                    @endforeach
                                                </select>
                                                    @if ($errors->has('direction'))
                                                        <span id="email-error" class="error text-danger" for="input-direction">{{ $errors->first('direction') }}</span>
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