<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  
  <div class="logo">
    <a href="https://creative-tim.com/" class="simple-text logo-normal">
      {{ __('Creative Tim') }}
    </a>
  </div>-->
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <!--<a class="nav-link" href="{{ route('home') }}">
          <i>dashboard</i>
            <p>{{ __('Accuiel') }}</p>
        </a>-->
      </li>
      <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}">
        <!--<a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="true">
          <i><img style="width:25px" src="{{ asset('material') }}/img/laravel.svg"></i>
          <p>{{ __('Laravel Examples') }}
            <b class="caret"></b>
          </p>
        </a>-->
        <div class="collapse show" id="laravelExample">
          <ul class="nav">
          <?php if(Auth::user()->groupe_id===3){?>
          <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('mission.index') }}">
                <span class="sidebar-normal"> {{ __('Mettre à jour le statut des recommandations') }} </span>
              </a>
            </li>
            <?php ;} elseif(Auth::user()->groupe_id===1){?>
              <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('mission.index') }}">
                <span class="sidebar-normal"> {{ __('gestion des missions') }} </span>
              </a>
            </li>
            <?php ;} else{
                          //use DB;
                          $groupfonc = DB::table('groupe_fonctionnalite')->selectRaw('
                         id_groupe, id_fonctionnalite, intitule'
                 
                         )->join('fonctionnalite', 'id_fonctionnalite', '=', 'fonctionnalite.id'
                         )->where('id_groupe','=','2')
             
                         ->get();
                         
                         foreach($groupfonc as $fonc){?>
           <!--<li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('profile.edit') }}">
                <span class="sidebar-normal">{{ __('profile') }} </span>
              </a>
            </li>-->
            <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('user.index') }}">
                <span class="sidebar-normal"> {{ $fonc->intitule}} </span>
              </a>                                                                                                                                                                                                                                                                                                                                                                                                                                
            </li>
            <?php } ?>
            <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('user.index') }}">
                <span class="sidebar-normal"> {{ __('UTILISATEURS') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('mission.index') }}">
                <span class="sidebar-normal"> {{ __('MISSION') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('groupefonction.index') }}">
                <span class="sidebar-normal"> {{ __('GESTION  DES PROFILES ET FONCTIONNALITES') }} </span>
              </a>
            </li>
            <!--<li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('mission.index') }}">
                <span class="sidebar-normal"> {{ __('Mettre à jour le statut des recommandations') }} </span>
              </a>
            </li>-->
            <?php ;} ?>
          </ul>
        </div>
      </li>
      <!--<li class="nav-item{{ $activePage == 'table' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('table') }}">
          <!-<i>content_paste</i>->
            <p>{{ __('Table List') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'typography' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('typography') }}">
          <i>library_books</i>
            <p>{{ __('Typography') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'icons' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('icons') }}">
          <i>bubble_chart</i>
          <p>{{ __('Icons') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'map' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('map') }}">
         <i>location_ons</i>
            <p>{{ __('Maps') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'notifications' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('notifications') }}">
         <i>notifications</i>
          <p>{{ __('Notifications') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'language' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('language') }}">
          <i>language</i>
          <p>{{ __('RTL Support') }}</p>
        </a>
      </li>
      <li class="nav-item active-pro{{ $activePage == 'upgrade' ? ' active' : '' }}">
        <a class="nav-link text-white bg-danger" href="{{ route('upgrade') }}">
          <i>unarchive</i>
          <p>{{ __('Upgrade to PRO') }}</p>
        </a>
      </li>
      -->
    </ul>
  </div>
</div>
