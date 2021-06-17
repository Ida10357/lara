@extends('layouts.app', ['activePage' => 'profile', 'titlePage' => __('')])

@section('content')
  <div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
      @if(session()->has('info'))
        <div class="notification is-success">
            {{ session('info') }}
        </div>
    @endif
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">LISTE DES MISSIONS</h4>
              <!--<p class="card-category"> Ici vous pouvez gérer les abonnés</p>-->
            </div>
            <div class="card-body">
            <?php if(Auth::user()->groupe_id===1){?>
            <div class="row">
                <div class="col-12 text-start">
                  <a href="{{ route('mission.create') }}" class="btn btn-sm btn-primary">Nouvelle mission</a>
                </div>
              </div>
              <?php ;} ?>
              <div class="table-responsive">
                <table class="table">
                <thead class=" text-primary">
                    <tr>
                        <th>
                            Intitulé
                        </th>
                        <th>
                            Date de début
                        </th>
                        <th>
                            Date de fin
                        </th>
                        <th>
                            Direction auditée
                        </th>
                        <th class="text-right">
                        Actions
                        </th>
                    </tr>
                </thead>
                  <tbody>
                  <?php foreach ( $mission as $mis){ ?>

                      <tr>
                        <td>{{ $mis->intitule }}</td>
                        <td>{{ $mis->debut }}</td>
                        <td>{{ $mis->fin }}</td>
                        <td>{{ $mis->direction }}</td>
                        <td>
                        <a href="/recommendation/{{$mis->id}}">recommandations
                          </td>
                        <td>
                        <a href="/mission/{{$mis->id}}/edit">modifier
                          </td>

                    <td>
                                <form action="{{ route('mission.destroy',[$mis->id]) }}" method='post'>
                                        @csrf
                                        @method('delete')
                                <input class="btn btn-danger" onclick="confirm('Voulez-vous supprimer ?')" type="submit" value="supprimer">
                            </form>
                          </td>
                      </tr>

                <?php }?>

                                        </tbody>
                </table>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
@endsection