<div class="row">
    <section>
        <div class="d-flex align-item-center justify-content-between mb-2">
            <h3> Suivi des dépenses </h3>
        </div>
        {{-- <p>Définnissez vos charges pour établir un listing et faire des simulations à fin d'obtenir une estimation.</p> --}}
        <div class="card">
            <div class="card-body">
              <div class="d-flex align-items-center">
                <div class="subheader">Bénéfice</div>
              </div>
              <div class="h1 mb-3">250.000 Fcfa</div>
              <div class="mb-0 text-muted d-flex justify-content-between align-items-center">
                <div>
                    <span class="text-nowrap selected-period">
                        <span class="dropdown button-click-action">
                            <div class="dropdown-toggle" data-boundary="viewport" data-toggle="dropdown">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
                                    <path fill="none" d="M0 0h24v24H0z" />
                                    <path d="M12 23.728l-6.364-6.364a9 9 0 1 1 12.728 0L12 23.728zm4.95-7.778a7 7 0 1 0-9.9 0L12 20.9l4.95-4.95zM12 13a2 2 0 1 1 0-4 2 2 0 0 1 0 4z" fill="rgba(0,0,0,1)" /></svg>
                                <span class="selected-site align-middle ml-2" data-site="all"> Tous les sites </span>
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
                    </span>
                </div>
                <div class="ml-auto">
                    <div class="dropdown">
                      <a class="dropdown-toggle text-muted" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Global
                      </a>
                      <div class="dropdown-menu dropdown-menu-right" style="">
                          <a class="dropdown-item active" href="#">Global</a>
                        <a class="dropdown-item" href="#">7 Derniers jours</a>
                        <a class="dropdown-item" href="#">30 Derniers jours</a>
                        <a class="dropdown-item" href="#">3 Derniers mois</a>
                      </div>
                    </div>
                </div>
            </div>
            </div>
          </div>
    </section>
    <section>
        <div class="col-md-6 col-xl-12">
            <div class="card card-sm">
                <div class="card-body d-flex align-items-center">
                    <span class="bg-blue text-white stamp mr-3"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z"></path>
                            <path d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2"></path>
                            <path d="M12 3v3m0 12v3"></path>
                        </svg>
                    </span>
                    <div class="mr-3 lh-sm">
                        <div class="strong">
                            Salaire employé
                        </div>
                        <div class="text-muted"><span contenteditable="true">
                                {{auth()->user()->companies->first()->totalSalary()}} </span> FCFA</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="mb-4">
        <button class="btn btn-primary active expenses" id='fexpenses'> chages fixes </button>
        <button class="btn btn-primary expenses" id='vexpenses'> chages variables </button>
    </div>
    <section class="mb-4" id="expenses">

    </section>
</div>



<div class="modal-section">

    
</div>

<script>

    $(".expenses").click(function(){
            $(".expenses").removeClass('active');
            $(this).addClass('active');
            page = $(this).attr('id');

            $.ajax({
                url: '/admin/settings/view/budget/'+page,
                method: 'get',
                success: function(data){
                    $("#expenses").html(data).fadeIn();
                }
            });
        })
</script>
