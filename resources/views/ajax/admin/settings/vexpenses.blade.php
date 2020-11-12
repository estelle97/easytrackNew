<div class="d-flex align-item-center justify-content-between mb-2">
    <h3>Charges variables</h3>
    <a href="#" data-toggle="modal" data-target="#modal-add-variable-charges">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="mr-2">
            <path fill="none" d="M0 0h24v24H0z" />
            <path d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z" fill="rgba(32,107,196,1)" /></svg>
        <span class="align-middle mb-0">Ajouter</span>
    </a>
</div>

<div>
    @foreach (Auth::user()->companies->first()->sites as $site)
        @foreach ($site->vexpenses->reverse() as $vexp)
            <div class="col-md-6 col-xl-12" id="vexpense{{$site->id}}-{{$vexp->id}}">
                <div class="card card-sm">
                    <div class="card-body d-flex align-items-center">
                        <span class="bg-blue text-white stamp mr-3"><svg xmlns="http://www.w3.org/2000/svg" class="icon"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z"></path>
                                <path d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2">
                                </path>
                                <path d="M12 3v3m0 12v3"></path>
                            </svg>
                        </span>
                        <div class="mr-3 lh-sm">
                            <div class="strong">
                                <span> {{$site->name}} </span> - <span> {{$vexp->name}} </span>
                            </div>
                            <div class="text-muted"> <span> {{$vexp->amount}} </span> FCFA</div>
                        </div>
                        <div class="col-auto card-actions">
                            <span class="dropdown button-click-action">
                                <div class="dropdown-toggle" data-boundary="viewport" data-toggle="dropdown">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
                                        <path fill="none" d="M0 0h24v24H0z" />
                                        <path
                                            d="M12 3c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 14c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0-7c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z" />
                                    </svg>
                                </div>

                                <div class="dropdown-menu dropdown-menu-right">
                                    <span class="dropdown-header">Actions</span>
                                    <a class="dropdown-item" data-toggle="modal" data-target="#modal-edit-charge{{$site->id}}-{{$vexp->id}}">
                                        Editer
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" onclick="deleteCharge({{$vexp->id}})">
                                        Supprimer la charge
                                    </a>
                                </div>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endforeach
</div>

<div class="modal-section">
    <div class="modal modal-blur fade" id="modal-add-variable-charges" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ajouter une charge variable</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" />
                            <line x1="18" y1="6" x2="6" y2="18" />
                            <line x1="6" y1="6" x2="18" y2="18" /></svg>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12 mb-3">
                        <label class="form-label"> Site </label>
                        <select name="role" id="site_id" class="form-select">
                            @foreach (auth()->user()->companies->first()->sites as $site)
                                <option value={{$site->id}}> {{$site->name}} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-icon mb-3">
                        <span class="input-icon-addon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="icon">
                                <path fill="none" d="M0 0h24v24H0z" />
                                <path
                                    d="M18 7h3a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h15v4zM4 9v10h16V9H4zm0-4v2h12V5H4zm11 8h3v2h-3v-2z" />
                                </svg>
                        </span>
                        <input type="text" class="form-control" id="name" placeholder="Nom de la charge">
                    </div>
                    <div class="input-icon">
                        <span class="input-icon-addon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="icon">
                                <path fill="none" d="M0 0h24v24H0z" />
                                <path
                                    d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm-3.5-6H14a.5.5 0 1 0 0-1h-4a2.5 2.5 0 1 1 0-5h1V6h2v2h2.5v2H10a.5.5 0 1 0 0 1h4a2.5 2.5 0 1 1 0 5h-1v2h-2v-2H8.5v-2z" />
                                </svg>
                        </span>
                        <input type="text" class="form-control" id="amount" placeholder="Montant">
                    </div>
                    <div class="col-lg-12 mb-4">
                        <label class="form-label"> Description </label>
                        <textarea placeholder="Description..." class="form-control" id="description"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" style="width: 100%"
                        onclick="addExpense()">Enregistrer</button>
                </div>
            </div>
        </div>
    </div>

    @foreach (Auth::user()->companies->first()->sites as $site)
        @foreach ($site->vexpenses as $vexp)
            <div class="modal modal-blur fade" id="modal-edit-charge{{$site->id}}-{{$vexp->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">modifier la charge: {{$vexp->name}} </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" />
                                    <line x1="18" y1="6" x2="6" y2="18" />
                                    <line x1="6" y1="6" x2="18" y2="18" /></svg>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="col-lg-12 mb-3">
                                <label class="form-label"> Site </label>
                                <select disabled name="role" id="site_id" class="form-select">
                                    @foreach (auth()->user()->companies->first()->sites as $site)
                                    <option {{($vexp->site_id == $site->id) ? 'selected' : ''}} value={{$site->id}}> {{$site->name}} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-icon mb-3">
                                <span class="input-icon-addon">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="icon">
                                        <path fill="none" d="M0 0h24v24H0z" />
                                        <path
                                            d="M18 7h3a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h15v4zM4 9v10h16V9H4zm0-4v2h12V5H4zm11 8h3v2h-3v-2z" />
                                    </svg>
                                </span>
                                <input type="text" class="form-control" value="{{$vexp->name}}" id="name{{$site->id}}-{{$vexp->id}}" placeholder="Nom de la charge">
                            </div>
                            <div class="input-icon">
                                <span class="input-icon-addon">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="icon">
                                        <path fill="none" d="M0 0h24v24H0z" />
                                        <path
                                            d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm-3.5-6H14a.5.5 0 1 0 0-1h-4a2.5 2.5 0 1 1 0-5h1V6h2v2h2.5v2H10a.5.5 0 1 0 0 1h4a2.5 2.5 0 1 1 0 5h-1v2h-2v-2H8.5v-2z" />
                                    </svg>
                                </span>
                                <input type="text" class="form-control" value={{$vexp->amount}} id="amount{{$site->id}}-{{$vexp->id}}" placeholder="Montant">
                            </div>
                            <div class="col-lg-12 mb-4">
                                <label class="form-label"> Description </label>
                                <textarea placeholder="Description..."  class="form-control" id="description{{$site->id}}-{{$vexp->id}}"> {{$vexp->description}} </textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" style="width: 100%"
                                onclick="updateExpense({{$site->id}}, {{$vexp->id}})">Enregistrer</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endforeach
</div>

<script>
    function addExpense(){
        var form_data = new FormData(); // Creating object of FormData class

        form_data.append("site_id", $("#site_id").val());
        form_data.append("name", $("#name").val());
        form_data.append("amount", $("#amount").val());
        form_data.append("description", $("#description").val());
        form_data.append("_token", '{{csrf_token()}}');

        $.ajax({
            url : '/admin/vexpenses',
            cache: false,
            contentType: false,
            processData: false,
            method : 'post',
            data: form_data,
            success: function(data){
                $('#modal-add-variable-charges').hide();
                $('.modal-backdrop').remove();
                $("#vexpenses").click();
            }
        });
    }

    function updateExpense(site, vexpense){
        var form_data = new FormData(); // Creating object of FormData class

        form_data.append("name", $("#name"+site+'-'+vexpense).val());
        form_data.append("amount", $("#amount"+site+'-'+vexpense).val());
        form_data.append("description", $("#description"+site+'-'+vexpense).val());
        form_data.append("_token", '{{csrf_token()}}');
        $.ajax({
            url : '/admin/vexpenses/'+vexpense,
            cache: false,
            contentType: false,
            processData: false,
            method : 'post',
            data: form_data,
            success: function(data){
                $('#modal-add-variable-charges').hide();
                $('.modal-backdrop').remove();
                $("#vexpenses").click();
            }
        });
    }

    function deleteCharge(vexpense) {
        $.ajax({
            url : '/admin/vexpenses/'+vexpense+'/destroy',
            method : 'get',
            success: function(data){
                $("#vexpenses").click();
            }
        });
    }
</script>
