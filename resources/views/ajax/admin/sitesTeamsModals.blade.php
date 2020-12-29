{{-- Affichage de des équipes de la journée--}}

@for ($i = 1; $i <= 7; $i++)
    <div class="modal modal-blur fade" id="modal-show-team{{$site->id}}-{{$i}}" tabindex="-1" role="dialog" aria-hidden="true">
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
                                                    <a href="#" class="btn btn-outline btn-pill py-2 px-1 mr-2" data-toggle="modal" data-target="#modal-edit-team{{$team->id}}"><i class="ri-pencil-line ri-xl"></i></a>
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


{{-- Création de l'équipe --}}

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

<div class="modal modal-blur fade" id="modal-delete-team" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-sm modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-body">
            <div class="modal-title">Êtes vous sure ?</div>
            <div>Si vous continuez, vous perdrez toutes les données de cette équipe.</div>
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
@foreach($site->teams as $team)
<div class="modal modal-blur fade" id="modal-edit-team{{$team->id}}" tabindex="-1" role="dialog" aria-hidden="true">
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
                                <option id="selected-team-update-user{{$team->id}}" value="{{$emp->user->id}}" {{$team->users->contains($emp->user->id) ? 'disabled' : ''}}> {{$emp->user->name}} </option>
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
@foreach ($site->teams as $team)
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
