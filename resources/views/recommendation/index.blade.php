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
              <h4 class="card-title ">LISTE DES RECOMMENDATIONS</h4>
              <!--<p class="card-category"> Ici vous pouvez gérer les abonnés</p>-->
            </div>
            <div class="card-body">
            <?php if(Auth::user()->groupe_id===1){?>
              <div class="row">
                <div class="col-12 text-start">
                  <a href="/ajout/{{$mis->id}}" class="btn btn-sm btn-primary">Nouvelle recommendation</a>
                </div>
              </div>
              <?php ;} ?>
              <div class="table-responsive">
                <table class="table">
                <thead class=" text-primary">
                    <tr>
                        <th>
                            libellé
                        </th>
                        <th>
                            Echéance
                        </th>
                        <th>
                            Statut
                        <!--<th>
                            Auditeur
                        </th>-->
                        <th class="text-right">
                        Actions
                        </th>
                    </tr>
                </thead>
                  <tbody>
                  <?php

use Illuminate\Support\Facades\Auth;

foreach ( $recom as $rec){ ?>

                      <tr>
                        <td>{{ $rec->libelle }}</td>
                        <td>{{ $rec->echeance }}</td>
                        <td>{{ $rec->statut }}</td>
                        <?php if(Auth::user()->groupe_id===3){?>
                        <td>
                        <a class="text-right" href="/recom/{{$rec->id}}/edit">modifier
                          </td>
                          <?php ; }
                          elseif(Auth::user()->groupe_id===1){?>
                        <td>

                                <form action="{{ route('recom.destroy',[$rec->id]) }}" method='post'>
                                        @csrf
                                        @method('delete')
                                
                                  <input class="text-right" onclick="confirm('Voulez-vous supprimer ?')" type="submit" value="supprimer">
                                </form>
                                
                          </td>
                          <?php ;} ?> 
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