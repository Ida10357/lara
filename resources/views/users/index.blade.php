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
              <h4 class="card-title ">LISTE DES UTILISATEURS</h4>
              <!--<p class="card-category"> Ici vous pouvez gérer les abonnés</p>-->
            </div>
            <div class="card-body">
            <div class="row">
                <div class="col-12 text-start">
                  <a href="{{ route('user.create') }}" class="btn btn-sm btn-primary">Ajouter un utilisateur</a>
                </div>
              </div>
              <div class="table-responsive">
                <table class="table">
                <thead class=" text-primary">
                    <tr>
                        <th>
                            Nom
                        </th>
                        <th>
                            Prénom
                        </th>
                        <th>
                            Email
                        </th>
                        <th>
                            Groupe
                        </th>
                        <th class="text-right">
                        Actions
                        </th>
                    </tr>
                </thead>
                  <tbody>
                  <?php foreach ( $user as $us){ ?>

                      <tr>
                        <td>{{ $us->nom }}</td>
                        <td>{{ $us->prenom }}</td>
                        <td>{{ $us->email }}</td>
                        <td>{{ $us->groupe }}</td>
                        <td>
                        <a href="/user/{{$us->id}}/edit">modifier
                          </td>

                    <td>
                            <form action="{{ route('user.destroy',[$us->id]) }}" method='post'>
                                        @csrf
                                        @method('delete')
                                <input class="btn btn-danger" onclick="confirm('Voulez-vous supprimer ?')" type="submit" value="supprimer">
                            </form>
                          </td>
                        <td>
                        <a href="">fonctions
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