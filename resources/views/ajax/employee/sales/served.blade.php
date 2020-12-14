@foreach (Auth::user()->employee->site->sales->where('status',1)->reverse() as $sale)
                                        <div class="easy-kanban-card card" id="sale{{$sale->id}}">
                                            <div class="card-header border-bottom-0 pr-0 pb-0">
                                                <div class="w-100 row align-items-center">
                                                    <div class="col-auto pl-2">
                                                        <h2 class="m-0">S0-{{$sale->code}} </h2>
                                                    </div>
                                                    <div class="col-auto pr-1 ml-auto">
                                                        <span class="dropdown">
                                                            <div class="dropdown-toggle" data-boundary="viewport" data-toggle="dropdown">
                                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 3c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 14c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0-7c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z" fill="rgba(120,120,120,1)"/></svg>
                                                            </div>

                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href={{route('employee.sales.show', $sale->id)}}>
                                                                    Voir la facture
                                                                </a>
                                                                @if(Auth::user()->may('validate_sale_orders'))
                                                                    <a class="dropdown-item" href="#" onclick="validateSale({{$sale->id}})">
                                                                        Valider la commande
                                                                    </a>
                                                                @endif
                                                                <a class="dropdown-item" href="#" onclick="updateStatus({{$sale->id}},0)">
                                                                    Marquer comme commandé
                                                                </a>
                                                                <a class="dropdown-item" href="#" onclick="updateStatus({{$sale->id}},2)">
                                                                    Marquer comme payé
                                                                </a>
                                                                <div class="dropdown-divider"></div>
                                                                @if($sale->validator_id == null)
                                                                    @if(Auth::user()->may('delete_sale_orders') || $sale->initiator_id == Auth::user()->id)
                                                                        <a class="dropdown-item" href="#" href="#" data-toggle="modal"
                                                                            data-target="#modal-delete-sale{{$sale->id}}">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                                                width="18" height="18" class="mr-2">
                                                                                <path fill="none" d="M0 0h24v24H0z" />
                                                                                <path
                                                                                    d="M7 4V2h10v2h5v2h-2v15a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V6H2V4h5zM6 6v14h12V6H6zm3 3h2v8H9V9zm4 0h2v8h-2V9z" />
                                                                            </svg>
                                                                            Supprimer
                                                                        </a>
                                                                    @endif
                                                                @endif
                                                            </div>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body pt-2 pb-2">
                                                <h4 class="font-weight-normal m-0"> {{$sale->products->count()}} Produit(s)</h4>
                                                <h4 class="text-muted font-weight-normal">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><rect x="4" y="5" width="16" height="16" rx="2"></rect><line x1="16" y1="3" x2="16" y2="7"></line><line x1="8" y1="3" x2="8" y2="7"></line><line x1="4" y1="11" x2="20" y2="11"></line><line x1="11" y1="15" x2="12" y2="15"></line><line x1="12" y1="15" x2="12" y2="18"></line></svg>
                                                    {{ date('M d, Y', strtotime($sale->created_at))}}
                                                </h4>
                                            </div>
                                            <!-- Card footer -->
                                            <div class="card-footer bg-white border-top-0 pt-0">
                                                <div class="row align-items-center">
                                                    <div class="col-auto">
                                                        {{-- <div class="avatar-list avatar-list-stacked pt-2">
                                                            <span class="avatar border mb-0"
                                                                style="background-image: url('https://ui-avatars.com/api/?name=Alex+Gautier&background=f1f3f8&color=6e7582')"></span>
                                                            <span class="avatar border mb-0"
                                                                style="background-image: url('https://ui-avatars.com/api/?name=Jeane+Marie&background=f1f3f8&color=6e7582')"></span>
                                                            <span class="avatar border mb-0">+3</span>
                                                        </div> --}}
                                                        {{Auth::user()->employee->site->name}}
                                                    </div>
                                                    <div class="col-auto ml-auto">
                                                        <h6 class="m-0">Total</h6>
                                                        <h4 class="m-0">{{$sale->total()}} FCFA</h4>
                                                        <!-- <a href="#" class="">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20"><path fill="none" d="M0 0h24v24H0z"/><path d="M7 4V2h10v2h5v2h-2v15a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V6H2V4h5zM6 6v14h12V6H6zm3 3h2v8H9V9zm4 0h2v8h-2V9z" fill="rgba(120,120,120,1)"/></svg>
                                                        </a> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
