<div class="row">
    <section class="mb-4">
        <div class="d-flex align-item-center justify-content-between mb-2">
            <h3>Mon budget</h3>
        </div>
        <p>Définnissez vos charges pour établir un listing et faire des simulations à fin d'obtenir une estimation.</p>
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
    <section class="mb-4">
        <div class="d-flex align-item-center justify-content-between mb-2">
            <h3>Charges fixes</h3>
            <a href="#" data-toggle="modal" data-target="#modal-add-fixed-charges">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="mr-2"><path fill="none" d="M0 0h24v24H0z"/><path d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z" fill="rgba(32,107,196,1)"/></svg>
                <span class="align-middle mb-0">Ajouter</span>
            </a>
        </div>
        <div class="col-md-6 col-xl-12">
            <div class="card card-sm">
              <div class="card-body d-flex align-items-center">
                <span class="bg-blue text-white stamp mr-3"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><path d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2"></path><path d="M12 3v3m0 12v3"></path></svg>
                </span>
                <div class="mr-3 lh-sm">
                  <div class="strong">
                    Salaire employé
                  </div>
                  <div class="text-muted"><span contenteditable="true">120000</span> FCFA</div>
                </div>
                <div class="col-auto card-actions">
                    <span class="dropdown button-click-action">
                        <div class="dropdown-toggle" data-boundary="viewport" data-toggle="dropdown">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20"
                                    height="20">
                                    <path fill="none" d="M0 0h24v24H0z" />
                                    <path
                                        d="M12 3c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 14c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0-7c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z" />
                                </svg>
                        </div>

                        <div class="dropdown-menu dropdown-menu-right">
                            <span class="dropdown-header">Actions</span>
                            <a class="dropdown-item">
                                Editer
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">
                                Desactiver
                            </a>
                            <a class="dropdown-item" href="#" data-toggle="modal"
                                data-target="#modal-delete-charge">
                                Supprimer la charge
                            </a>
                        </div>
                    </span>
                </div>
              </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-12">
            <div class="card card-sm">
              <div class="card-body d-flex align-items-center">
                <span class="bg-blue text-white stamp mr-3"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><path d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2"></path><path d="M12 3v3m0 12v3"></path></svg>
                </span>
                <div class="mr-3 lh-sm">
                  <div class="strong">
                    Internet
                  </div>
                  <div class="text-muted"><span contenteditable="true">300000</span> FCFA</div>
                </div>
                <div class="col-auto card-actions">
                    <span class="dropdown button-click-action">
                        <div class="dropdown-toggle" data-boundary="viewport" data-toggle="dropdown">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20"
                                    height="20">
                                    <path fill="none" d="M0 0h24v24H0z" />
                                    <path
                                        d="M12 3c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 14c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0-7c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z" />
                                </svg>
                        </div>

                        <div class="dropdown-menu dropdown-menu-right">
                            <span class="dropdown-header">Actions</span>
                            <a class="dropdown-item">
                                Editer
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">
                                Desactiver
                            </a>
                            <a class="dropdown-item" href="#" data-toggle="modal"
                                data-target="#modal-delete-charge">
                                Supprimer la charge
                            </a>
                        </div>
                    </span>
                </div>
              </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-12">
            <div class="card card-sm">
              <div class="card-body d-flex align-items-center">
                <span class="bg-blue text-white stamp mr-3"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><path d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2"></path><path d="M12 3v3m0 12v3"></path></svg>
                </span>
                <div class="mr-3 lh-sm">
                  <div class="strong">
                    Loyer
                  </div>
                  <div class="text-muted"><span contenteditable="true">300000</span> FCFA</div>
                </div>
                <div class="col-auto card-actions">
                    <span class="dropdown button-click-action">
                        <div class="dropdown-toggle" data-boundary="viewport" data-toggle="dropdown">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20"
                                    height="20">
                                    <path fill="none" d="M0 0h24v24H0z" />
                                    <path
                                        d="M12 3c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 14c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0-7c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z" />
                                </svg>
                        </div>

                        <div class="dropdown-menu dropdown-menu-right">
                            <span class="dropdown-header">Actions</span>
                            <a class="dropdown-item">
                                Editer
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">
                                Desactiver
                            </a>
                            <a class="dropdown-item" href="#" data-toggle="modal"
                                data-target="#modal-delete-charge">
                                Supprimer la charge
                            </a>
                        </div>
                    </span>
                </div>
              </div>
            </div>
        </div>
    </section>
    <section>
        <div class="d-flex align-item-center justify-content-between mb-2">
            <h3>Charges variables</h3>
            <a href="#" data-toggle="modal" data-target="#modal-add-variable-charges">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="mr-2"><path fill="none" d="M0 0h24v24H0z"/><path d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z" fill="rgba(32,107,196,1)"/></svg>
                <span class="align-middle mb-0">Ajouter</span>
            </a>
        </div>
        <div class="col-md-6 col-xl-12">
            <div class="card card-sm">
              <div class="card-body d-flex align-items-center">
                <span class="bg-azure text-white stamp mr-3"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><path d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2"></path><path d="M12 3v3m0 12v3"></path></svg>
                </span>
                <div class="mr-3 lh-sm">
                  <div class="strong">
                    Eau
                  </div>
                  <div class="text-muted"><span contenteditable="true">120000</span> FCFA</div>
                </div>
                <div class="col-auto card-actions">
                    <span class="dropdown button-click-action">
                        <div class="dropdown-toggle" data-boundary="viewport" data-toggle="dropdown">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20"
                                    height="20">
                                    <path fill="none" d="M0 0h24v24H0z" />
                                    <path
                                        d="M12 3c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 14c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0-7c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z" />
                                </svg>
                        </div>

                        <div class="dropdown-menu dropdown-menu-right">
                            <span class="dropdown-header">Actions</span>
                            <a class="dropdown-item">
                                Editer
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">
                                Desactiver
                            </a>
                            <a class="dropdown-item" href="#" data-toggle="modal"
                                data-target="#modal-delete-charge">
                                Supprimer la charge
                            </a>
                        </div>
                    </span>
                </div>
              </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-12">
            <div class="card card-sm">
              <div class="card-body d-flex align-items-center">
                <span class="bg-azure text-white stamp mr-3"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><path d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2"></path><path d="M12 3v3m0 12v3"></path></svg>
                </span>
                <div class="mr-3 lh-sm">
                  <div class="strong">
                    Courant électrique
                  </div>
                  <div class="text-muted"><span contenteditable="true">300000</span> FCFA</div>
                </div>
                <div class="col-auto card-actions">
                    <span class="dropdown button-click-action">
                        <div class="dropdown-toggle" data-boundary="viewport" data-toggle="dropdown">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20"
                                    height="20">
                                    <path fill="none" d="M0 0h24v24H0z" />
                                    <path
                                        d="M12 3c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 14c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0-7c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z" />
                                </svg>
                        </div>

                        <div class="dropdown-menu dropdown-menu-right">
                            <span class="dropdown-header">Actions</span>
                            <a class="dropdown-item">
                                Editer
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">
                                Desactiver
                            </a>
                            <a class="dropdown-item" href="#" data-toggle="modal"
                                data-target="#modal-delete-charge">
                                Supprimer la charge
                            </a>
                        </div>
                    </span>
                </div>
              </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-12">
            <div class="card card-sm">
              <div class="card-body d-flex align-items-center">
                <span class="bg-azure text-white stamp mr-3"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><path d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2"></path><path d="M12 3v3m0 12v3"></path></svg>
                </span>
                <div class="mr-3 lh-sm">
                  <div class="strong">
                    Achats imprévus
                  </div>
                  <div class="text-muted"><span contenteditable="true">300000</span> FCFA</div>
                </div>
                <div class="col-auto card-actions">
                    <span class="dropdown button-click-action">
                        <div class="dropdown-toggle" data-boundary="viewport" data-toggle="dropdown">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20"
                                    height="20">
                                    <path fill="none" d="M0 0h24v24H0z" />
                                    <path
                                        d="M12 3c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 14c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0-7c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z" />
                                </svg>
                        </div>

                        <div class="dropdown-menu dropdown-menu-right">
                            <span class="dropdown-header">Actions</span>
                            <a class="dropdown-item">
                                Editer
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">
                                Desactiver
                            </a>
                            <a class="dropdown-item" href="#" data-toggle="modal"
                                data-target="#modal-delete-charge">
                                Supprimer la charge
                            </a>
                        </div>
                    </span>
                </div>
              </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-12">
            <div class="card card-sm">
              <div class="card-body d-flex align-items-center">
                <span class="bg-azure text-white stamp mr-3"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><path d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2"></path><path d="M12 3v3m0 12v3"></path></svg>
                </span>
                <div class="mr-3 lh-sm">
                  <div class="strong">
                    Arrêt maladie
                  </div>
                  <div class="text-muted"><span contenteditable="true">300000</span> FCFA</div>
                </div>
                <div class="col-auto card-actions">
                    <span class="dropdown button-click-action">
                        <div class="dropdown-toggle" data-boundary="viewport" data-toggle="dropdown">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20"
                                    height="20">
                                    <path fill="none" d="M0 0h24v24H0z" />
                                    <path
                                        d="M12 3c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 14c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0-7c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z" />
                                </svg>
                        </div>

                        <div class="dropdown-menu dropdown-menu-right">
                            <span class="dropdown-header">Actions</span>
                            <a class="dropdown-item">
                                Editer
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">
                                Desactiver
                            </a>
                            <a class="dropdown-item" href="#" data-toggle="modal"
                                data-target="#modal-delete-charge">
                                Supprimer la charge
                            </a>
                        </div>
                    </span>
                </div>
              </div>
            </div>
        </div>
    </section>
</div>



<div class="modal-section">
    <div class="modal modal-blur fade" id="modal-add-fixed-charges" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ajouter une charge fixe</h5>
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
                    <div class="input-icon mb-3">
                        <span class="input-icon-addon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="icon"><path fill="none" d="M0 0h24v24H0z"/><path d="M18 7h3a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h15v4zM4 9v10h16V9H4zm0-4v2h12V5H4zm11 8h3v2h-3v-2z"/></svg>
                        </span>
                        <input type="text" class="form-control" placeholder="Nom de la charge">
                    </div>
                    <div class="input-icon">
                        <span class="input-icon-addon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="icon"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm-3.5-6H14a.5.5 0 1 0 0-1h-4a2.5 2.5 0 1 1 0-5h1V6h2v2h2.5v2H10a.5.5 0 1 0 0 1h4a2.5 2.5 0 1 1 0 5h-1v2h-2v-2H8.5v-2z"/></svg>
                        </span>
                        <input type="text" class="form-control" placeholder="Montant">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary"
                        style="width: 100%">Enregistrer</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal modal-blur fade" id="modal-add-variable-charges" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ajouter une charge variable</h5>
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
                    <div class="input-icon mb-3">
                        <span class="input-icon-addon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="icon"><path fill="none" d="M0 0h24v24H0z"/><path d="M18 7h3a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h15v4zM4 9v10h16V9H4zm0-4v2h12V5H4zm11 8h3v2h-3v-2z"/></svg>
                        </span>
                        <input type="text" class="form-control" placeholder="Nom de la charge">
                    </div>
                    <div class="input-icon">
                        <span class="input-icon-addon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="icon"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm-3.5-6H14a.5.5 0 1 0 0-1h-4a2.5 2.5 0 1 1 0-5h1V6h2v2h2.5v2H10a.5.5 0 1 0 0 1h4a2.5 2.5 0 1 1 0 5h-1v2h-2v-2H8.5v-2z"/></svg>
                        </span>
                        <input type="text" class="form-control" placeholder="Montant">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary"
                        style="width: 100%">Enregistrer</button>
                </div>
            </div>
        </div>
    </div>
</div>
