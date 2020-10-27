@extends('layouts.base')

@section('content')
<!-- Page title -->
<div class="page-header text-white">
    <div class="row align-items-center">
        <div class="col-auto d-flex align-items-center">
            <h2 class="page-title">
                <a class="agenda-segment active" href="{{route('admin.teams')}}">Agenda</a>
            </h2>
            <h2 class="page-title ml-3">
                <a class="agenda-segment" href="{{route('admin.meeting')}}">Reunion</a>
            </h2>
        </div>
        <!-- Page title actions -->
        <div class="col-auto ml-auto d-print-none">
            <div class="d-flex align-items-center">
                <span class="dropdown ml-5 button-click-action">
                    <div class="dropdown-toggle" data-boundary="viewport" data-toggle="dropdown">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
                            <path fill="none" d="M0 0h24v24H0z" />
                            <path
                                d="M12 23.728l-6.364-6.364a9 9 0 1 1 12.728 0L12 23.728zm4.95-7.778a7 7 0 1 0-9.9 0L12 20.9l4.95-4.95zM12 13a2 2 0 1 1 0-4 2 2 0 0 1 0 4z"
                                fill="rgba(255,255,255,1)" /></svg>
                        <span class="h2 selected-site align-middle ml-2" data-site="all"> Tous les sites </span>
                    </div>

                    <div class="dropdown-menu dropdown-menu-right mt-3">
                        <a class="dropdown-item site" data-site="all">
                            Tous les sites
                        </a>
                        @foreach (Auth::user()->companies->first()->sites as $site)
                        <a class="dropdown-item site" data-site={{$site->id}}>
                            {{$site->name}}
                        </a>
                        @endforeach
                    </div>
                </span>
            </div>
        </div>
    </div>
</div>
<div class="row row-deck row-cards">
    <div class="col-lg-12">
        <div class="card card-max-size p-4" style="overflow-x: hidden;">

            @foreach (Auth::user()->companies->first()->sites as $site)
                <div class="row">
                    @for ($i = 1; $i <= 7; $i++)
                        <div class="col-sm-12 col-md-6 col-lg-3">
                            <div class="card agenda-card">
                                <div class="card-body">
                                    <div class="card-title">
                                        <h6 class="h4 mb-3"> {{Carbon\Carbon::now()->startOfWeek()->addDays($i-1)->locale('fr_FR')->isoFormat('dddd')}} </h6>
                                    </div>
                                    <div class="avatar-list avatar-list-stacked mb-3">
                                        {{App\Team::where('site_id', $site->id)->where('day', $i)->count()}} équipe(s)
                                    </div>
                                    <div class="card-meta d-flex justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="icon mr-2"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 23.728l-6.364-6.364a9 9 0 1 1 12.728 0L12 23.728zm4.95-7.778a7 7 0 1 0-9.9 0L12 20.9l4.95-4.95zM12 13a2 2 0 1 1 0-4 2 2 0 0 1 0 4z"/></svg>
                                            <span> {{$site->name}} </span>
                                        </div>
                                        <span class="dropdown">
                                            <div class="dropdown-toggle" data-boundary="viewport" data-toggle="dropdown">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 3c-.825 0-1.5.675-1.5 1.5S11.175 6 12 6s1.5-.675 1.5-1.5S12.825 3 12 3zm0 15c-.825 0-1.5.675-1.5 1.5S11.175 21 12 21s1.5-.675 1.5-1.5S12.825 18 12 18zm0-7.5c-.825 0-1.5.675-1.5 1.5s.675 1.5 1.5 1.5 1.5-.675 1.5-1.5-.675-1.5-1.5-1.5z"/></svg>
                                            </div>
                                            <div class="dropdown-menu dropdown-menu-right mt-3">
                                                <span class="dropdown-header">Menu</span>
                                                <a href="#" class="dropdown-item" data-toggle="modal" data-target="#modal-show-agenda{{$site->id}}-{{$i}}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="icon dropdown-item-icon"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 3c5.392 0 9.878 3.88 10.819 9-.94 5.12-5.427 9-10.819 9-5.392 0-9.878-3.88-10.819-9C2.121 6.88 6.608 3 12 3zm0 16a9.005 9.005 0 0 0 8.777-7 9.005 9.005 0 0 0-17.554 0A9.005 9.005 0 0 0 12 19zm0-2.5a4.5 4.5 0 1 1 0-9 4.5 4.5 0 0 1 0 9zm0-2a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/></svg>
                                                    Ouvrir
                                                </a>
                                            </div>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            @endforeach
        </div>
    </div>
</div>

<div class="modal-section">

     {{-- Affichage de des équipes de la journée--}}
     @foreach (Auth::user()->companies->first()->sites as $site)
        @for ($i = 1; $i <= 7; $i++)
            <div class="modal modal-blur fade" id="modal-show-agenda{{$site->id}}-{{$i}}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"> {{$site->name}} - {{Carbon\Carbon::now()->startOfWeek()->addDays($i-1)->locale('fr_FR')->isoFormat('dddd')}} </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" />
                                    <line x1="18" y1="6" x2="6" y2="18" />
                                    <line x1="6" y1="6" x2="18" y2="18" />
                                </svg>
                            </button>
                        </div>
                        <div class="modal-body bg-white py-2 px-3" style="max-height: 400px; overflow-y: auto;">
                            <div class="row align-items-end">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table class="table card-table table-vcenter">
                                            <thead>
                                                <tr>
                                                    <th>Employées</th>
                                                    <th>Arrivé</th>
                                                    <th>Départ</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach (App\Team::where('site_id' , $site->id)->where('day', $i)->get() as $team)
                                                    <tr id="team{{$team->id}}">
                                                        <td>
                                                            <div class="avatar-list avatar-list-stacked">
                                                                @foreach ($team->users as $user)
                                                                    <span class="avatar" style='background-image: url("https://ui-avatars.com/api/?background=E0F1FF&color=267FC9&name={{$user->name}}")'></span>
                                                                @endforeach
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div>
                                                                {{$team->start}}
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div>
                                                                {{$team->end}}
                                                            </div>
                                                        </td>
                                                        <td class="text-right">
                                                            <a href="#" class="btn btn-outline btn-pill py-2 px-1 mr-2" data-toggle="modal" data-target="#modal-show-team{{$team->id}}"><i class="ri-eye-line ri-xl"></i></a>
                                                            <a href="#" class="btn btn-outline btn-pill py-2 px-1 mr-2" data-toggle="modal" data-target="#modal-edit-team"><i class="ri-pencil-line ri-xl"></i></a>
                                                            <a href="#" class="btn btn-outline btn-pill py-2 px-1 text-red" onclick="destroyTeam({{$team->id}})"><i class="ri-close-line ri-xl"></i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <button type="button" class="btn btn-white btn-block mt-2" data-toggle="modal" data-target="#modal-create-team{{$site->id}}-{{$i}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="icon mr-2"><path fill="none" d="M0 0h24v24H0z"/><path d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z"/></svg>
                                        Ajouter une nouvelle équipe
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer mt-2">
                            <button type="button" class="btn btn-link link-secondary mr-auto"
                                data-dismiss="modal">Annuler</button>
                            <button type="button" class="btn btn-primary" style="width: 60%;" data-dismiss="modal">Sauvegarder</button>
                        </div>
                    </div>
                </div>
            </div>
        @endfor
    @endforeach


    {{-- Création de l'équipe --}}
    @foreach (Auth::user()->companies->first()->sites as $site)
        @for ($i = 1; $i < 8; $i++)
            <div class="modal modal-blur fade" id="modal-create-team{{$site->id}}-{{$i}}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"> {{$site->name}} - {{Carbon\Carbon::now()->startOfWeek()->addDays($i-1)->locale('fr_FR')->isoFormat('dddd')}} - Nouvelle équipe</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" />
                                    <line x1="18" y1="6" x2="6" y2="18" />
                                    <line x1="6" y1="6" x2="18" y2="18" />
                                </svg>
                            </button>
                        </div>
                        <div class="modal-body bg-white">
                            <div class="row align-items-end">
                                <div class="col-lg-6  mb-4">
                                    <label class="form-label">Heure d'arrivé</label>
                                    <input type="text" id="start{{$site->id}}-{{$i}}" class="form-control timepicker" name="example-text-input" placeholder="Entrez l'heure">
                                </div>
                                <div class="col-lg-6  mb-4">
                                    <label class="form-label">Heure de départ</label>
                                    <input type="text" id="end{{$site->id}}-{{$i}}" class="form-control timepicker" name="example-text-input"  placeholder="Entrez l'heure">
                                </div>
                                <div class="col-lg-9">
                                    <label class="form-label">Employés</label>
                                    <select class="form-select" id="select-team-user{{$site->id}}-{{$i}}">
                                        @foreach ($site->employees as $emp)
                                            <option id="selected-team-user{{$site->id}}-{{$emp->user->id}}" value={{$emp->user->id}}> {{$emp->user->name}} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-3">
                                    <button type="button" class="btn btn-white btn-block"  onclick="addUserToTeam({{$site->id}},{{$i}})">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="icon mr-2"><path fill="none" d="M0 0h24v24H0z"/><path d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z"/></svg>
                                        Ajouter
                                    </button>
                                </div>
                                <div class="col-lg-12 mt-4">
                                    <div class="table-responsive">
                                        <table class="table card-table table-vcenter">
                                            <thead>
                                                <tr>
                                                    <th>Nom complet</th>
                                                    <th> action </th>
                                                </tr>
                                            </thead>
                                            <tbody id="team-user-add{{$site->id}}-{{$i}}">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary btn-block" onclick="createTeam({{$site->id}},{{$i}})">Enregister</button>
                        </div>
                    </div>
                </div>
            </div>
        @endfor
    @endforeach

    <div class="modal modal-blur fade" id="modal-delete-team" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="modal-title">Êtes vous sure ?</div>
                    <div>Si vous continuez, vous perdrez toutes les données de cette agenda.</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link link-secondary mr-auto"
                        data-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Oui, supprimer</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Modification de l'équipe --}}
    @foreach (App\Team::all() as $team)
        <div class="modal modal-blur fade" id="modal-edit-team" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modifier l'équipe</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                                stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <line x1="18" y1="6" x2="6" y2="18" />
                                <line x1="6" y1="6" x2="18" y2="18" />
                            </svg>
                        </button>
                    </div>
                    <div class="modal-body bg-white">
                        <div class="row align-items-end">
                            <div class="col-lg-12  mb-4">
                                <label class="form-label">Heure d'arrivé</label>
                                <input type="text" class="form-control timepicker" value="{{$team->start}}" placeholder="Entrez l'heure">
                            </div>
                            <div class="col-lg-12  mb-4">
                                <label class="form-label">Heure de départ</label>
                                <input type="text" class="form-control timepicker" value="{{$team->end}}" placeholder="Entrez l'heure">
                            </div>
                            <div class="col-lg-9">
                                <label class="form-label">Employées</label>
                                <select class="form-select" id="select-team-update-user{{$team->id}}">
                                    @foreach ($team->site->employees as $emp)
                                        <option id="selected-team-update-user{{$team->id}}" value={{$emp->user->id}} {{$team->users->contains($emp->user->id) ? 'disabled' : ''}}> {{$emp->user->name}} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <button type="button" class="btn btn-whhite btn-block" onclick="attachUserToTeam({{$team->id}})">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="icon mr-2"><path fill="none" d="M0 0h24v24H0z"/><path d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z"/></svg>
                                    Ajouter
                                </button>
                            </div>
                            <div class="col-lg-12 mt-4">
                                <div class="table-responsive">
                                    <table class="table card-table table-vcenter">
                                        <thead>
                                            <tr>
                                                <th>Nom complet</th>
                                                <th class='text-right'> Action </th>
                                            </tr>
                                        </thead>
                                        <tbody id="team-edit{{$team->id}}">
                                            @foreach ($team->users as $user)
                                                <tr id="team-update-user{{$team->id}}-{{$user->id}}">
                                                    <td>
                                                        <div>
                                                            {{$user->name}}
                                                        </div>
                                                    </td>
                                                    <td class="text-right">
                                                        <a class="mt-1 text-red button-click-action" onclick="detachUserToTeam({{$team->id}},{{$user->id}})">
                                                            Supprimer
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary btn-block" onclick="location.reload()" >Enregister</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    {{-- Affichage de l'équipe --}}
    @foreach (App\Team::all() as $team)
        <div class="modal modal-blur fade" id="modal-show-team{{$team->id}}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" />
                            <line x1="18" y1="6" x2="6" y2="18" />
                            <line x1="6" y1="6" x2="18" y2="18" />
                        </svg>
                    </button>
                    <div class="modal-body bg-white">
                        <div class="row align-items-end">
                            <div class="col-lg-4">
                                <div class="h4">Heure d'arrivé</div>
                                <div class="h2"> {{$team->start}} </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="h4">Heure de départ</div>
                                <div class="h2"> {{$team->end}} </div>
                            </div>
                            <div class="col-lg-12 mt-4">
                                <div class="table-responsive">
                                    <table class="table card-table table-vcenter">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Nom complet</th>
                                                <th> Role </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($team->users as $user)
                                                <tr>
                                                    <td class="w-1">
                                                        <span class="avatar" style='background-image: url("https://ui-avatars.com/api/?background=E0F1FF&color=267FC9&name={{$user->name}}")'></span>
                                                    </td>
                                                    <td>
                                                        <div>
                                                        {{$user->name}}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        {{$user->role->name}}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach


</div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/gh/dmuy/MDTimePicker@1.0.2/mdtimepicker.js"></script>
    <script>
        $('.timepicker').mdtimepicker({
            timeFormat: 'hh:mm', // format of the time value (data-time attribute)
            format: 'hh:mm',          // format of the input value
            theme: 'blue',              // theme of the timepicker
            hourPadding: false,         // determines if display value has zero padding for hour value less than 10 (i.e. 05:30 PM); 24-hour format has padding by default
            clearBtn: false,            // determines if clear button is visible
            is24hour: true,            // determines if the clock will use 24-hour format in the UI; format config will be forced to `hh:mm` if not specified
        });
    </script>

    <script>
        var employees = [];
        function addUserToTeam(site, day){
            var user_id = $('#select-team-user'+site+'-'+day).val();
            var user = $('#select-team-user'+site+'-'+day+' :selected').text();
            if(!employees.includes(user_id)){
                $("#team-user-add"+site+'-'+day).append("<tr id='team-add-user"+user_id+"'><td>"+
                                                user+
                                            "</td>"+
                                            "<td class='text-right'>"+
                                                "<a class='mt-1 text-blue button-click-action' onclick='removeUserToTeam("+user_id+")'>"+
                                                    "Supprimer"+
                                                "</a>"+
                                            "</td></tr>"
                                        );
                // Ajout de l'identifiant de l'utilisateur dans le tableau employees[]
                employees.push(user_id);
            }
        }

        function removeUserToTeam(id){
            // Retrait de l'identifiant de l'utilisateur dans le tableau employees[]
            $("#team-add-user"+id).fadeOut();
            employees = jQuery.grep(employees, function(value) {
                return value != id;
            });
        }

        function createTeam(site, day){
            var token = '{{csrf_token()}}';
            var start = $('#start'+site+'-'+day).val();
            var end = $('#end'+site+'-'+day).val();

            $.ajax({
                url: '/admin/agenda/add',
                data: {
                    _token : token,
                    site : site,
                    day: day,
                    start: start,
                    end: end,
                    employees: employees
                },
                method : 'post',
                success:function (data) {
                    document.location.reload(true);
                }
            });
        }

        function attachUserToTeam(team_id){
            var token = '{{csrf_token()}}';
            var user_id = $('#select-team-update-user'+team_id).val();
            var user = $('#select-team-update-user'+team_id+' :selected').text();

            $.ajax({
                url: '/admin/agenda/attachUserToTeam/'+team_id,
                data: {
                    _token : token,
                    user_id : user_id,
                },
                method : 'post',
                success:function (data) {
                    if(data == 'success'){
                        $("#selected-team-update-user"+team_id).attr('disabled');
                        $("#team-edit"+team_id).append("<tr id='team-update-user"+team_id+"-"+user_id+"'><td>"+
                                                user+
                                            "</td>"+
                                            "<td class='text-right'>"+
                                                "<a class='mt-1 text-blue button-click-action' onclick='detachUserToTeam("+team_id+","+user_id+")'>"+
                                                    "Supprimer"+
                                                "</a>"+
                                            "</td></tr>"
                                    )
                    }
                }
            });
        }

        function detachUserToTeam(team_id, user_id){
            var token = '{{csrf_token()}}';

            $.ajax({
                url: '/admin/agenda/detachUserToTeam/'+team_id,
                data: {
                    _token : token,
                    user_id : user_id,
                },
                method : 'post',
                success:function (data) {
                    if(data == 'success'){
                        $("#team-update-user"+team_id+"-"+user_id).fadeOut();
                        $("#selected-team-update-user"+team_id).removeAttr('disabled');
                    }
                }
            });
        }

        function destroyTeam(team_id){
            var token = '{{csrf_token()}}';
            if(confirm('Voulez vous vraiment supprimer cette équipe?')){
                $.ajax({
                    url: '/admin/agenda/team/'+team_id+'/destroy',
                    method: 'post',
                    data: {
                        _token: token
                    },
                    success: function(){
                        $("#team"+team_id).fadeOut();
                    }
                });
            }
        }
    </script>
@endsection

@section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/dmuy/MDTimePicker@1.0.2/mdtimepicker.css">
    <style>
        th {
            background-color: #fff !important;
        }
    </style>
@endsection
