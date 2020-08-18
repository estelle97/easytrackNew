@extends('layouts.base')

@section('content')

<!-- Page title -->
<div class="page-header text-white">
    <div class="row align-items-center">
        <div class="col-auto">
            <h2 class="page-title">
                Gestion des produits
            </h2>
        </div>
        <div class="col-auto">
            <div class="text-white text-h5 mt-2">
                1-10 of 30
            </div>
        </div>
        <!-- Page title actions -->
        <div class="col-auto ml-auto d-print-none">
            <div class="d-flex align-items-center">
                <a href="#" class="btn btn-white" data-toggle="modal" data-target="#modal-create-product">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <line x1="12" y1="5" x2="12" y2="19" />
                        <line x1="5" y1="12" x2="19" y2="12" />
                    </svg>
                    Ajouter un produit
                </a>

                <a href={{route('admin.products.create')}} class="btn btn-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <line x1="12" y1="5" x2="12" y2="19" />
                        <line x1="5" y1="12" x2="19" y2="12" />
                    </svg>
                    Ajouter plusieurs produits
                </a>

                <span class="dropdown ml-3">
                    <div class="dropdown-toggle" data-boundary="viewport" data-toggle="dropdown">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                            height="24">
                            <path fill="none" d="M0 0h24v24H0z" />
                            <path
                                d="M2 18h7v2H2v-2zm0-7h9v2H2v-2zm0-7h20v2H2V4zm18.674 9.025l1.156-.391 1 1.732-.916.805a4.017 4.017 0 0 1 0 1.658l.916.805-1 1.732-1.156-.391c-.41.37-.898.655-1.435.83L19 21h-2l-.24-1.196a3.996 3.996 0 0 1-1.434-.83l-1.156.392-1-1.732.916-.805a4.017 4.017 0 0 1 0-1.658l-.916-.805 1-1.732 1.156.391c.41-.37.898-.655 1.435-.83L17 11h2l.24 1.196c.536.174 1.024.46 1.434.83zM18 18a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"
                                fill="rgba(255,255,255,1)" /></svg>
                    </div>

                    <div class="dropdown-menu dropdown-menu-right mt-3">
                        <span class="dropdown-header">Trier par</span>
                        <a class="dropdown-item" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18"
                                height="18" class="mr-2">
                                <path fill="none" d="M0 0h24v24H0z" />
                                <path
                                    d="M8 4h13v2H8V4zM4.5 6.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm0 7a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm0 6.9a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zM8 11h13v2H8v-2zm0 7h13v2H8v-2z" />
                            </svg>
                            Nom
                        </a>
                        <a class="dropdown-item" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18"
                                height="18" class="mr-2">
                                <path fill="none" d="M0 0h24v24H0z" />
                                <path
                                    d="M8 4h13v2H8V4zM4.5 6.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm0 7a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm0 6.9a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zM8 11h13v2H8v-2zm0 7h13v2H8v-2z" />
                            </svg>
                            Type
                        </a>
                        <a class="dropdown-item" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18"
                                height="18" class="mr-2">
                                <path fill="none" d="M0 0h24v24H0z" />
                                <path
                                    d="M8 4h13v2H8V4zM4.5 6.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm0 7a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm0 6.9a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zM8 11h13v2H8v-2zm0 7h13v2H8v-2z" />
                            </svg>
                            Categorie
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18"
                                height="18" class="mr-2">
                                <path fill="none" d="M0 0h24v24H0z" />
                                <path
                                    d="M5.463 4.433A9.961 9.961 0 0 1 12 2c5.523 0 10 4.477 10 10 0 2.136-.67 4.116-1.81 5.74L17 12h3A8 8 0 0 0 6.46 6.228l-.997-1.795zm13.074 15.134A9.961 9.961 0 0 1 12 22C6.477 22 2 17.523 2 12c0-2.136.67-4.116 1.81-5.74L7 12H4a8 8 0 0 0 13.54 5.772l.997 1.795z" />
                                </svg>
                            Actualiser
                        </a>
                    </div>
                </span>

            </div>
        </div>
    </div>
</div>
<div class="row">

    <div class="col-lg-12">
        <div class="card">
            <div class="table-responsive">
                <table id="products" class="table card-table table-vcenter text-nowrap datatable">
                    <thead>
                        <tr>
                            <th class="exportable"> Photo </th>
                            <th class="exportable">Produit</th>
                            <th class="exportable">Categorie</th>
                            <th class="exportable">PA</th>
                            <th class="exportable">PV</th>
                            <th class="exportable">Qté</th>
                            <th class="exportable">Site</th>
                            <th>Marque</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="products">
                        @foreach (Auth::user()->companies->first()->sites as $site)
                            @foreach ($site->products as $product)
                            <tr id="product{{$site->id}}{{$product->id}}">
                                <td> <img src="{{asset($product->photo)}}" class="avatar avatar-upload rounded thumbnail" alt="{{$product->name}}"> </td>
                                <td><span id="product-name{{$site->id}}{{$product->id}}" class="text-muted"> {{$product->name}} </span></td>
                                <td><a id="product-category{{$site->id}}{{$product->id}}"  class="text-reset" tabindex="-1">{{$product->category->name}}</a></td>
                                <td id="product-cost{{$site->id}}{{$product->id}}">
                                    {{$product->pivot->cost}}
                                </td>
                                <td id="product-price{{$site->id}}{{$product->id}}">
                                    {{$product->pivot->price}}
                                </td>
                                <td id="product-qty{{$site->id}}{{$product->id}}">
                                    {{$product->pivot->qty}}
                                </td>
                                <td id="product-site{{$site->id}}{{$product->id}}">
                                    {{$site->name}}
                                </td>
                                <td id="product-brand{{$site->id}}{{$product->id}}">
                                    {{$product->brand}}
                                </td>
                                <td class="text-right">
                                    <a href="#" class="btn btn-white btn-sm mt-1" data-toggle="modal" data-target="#modal-edit-product{{$site->id}}{{$product->id}}">
                                        Modifier
                                    </a>
                                    <span class="dropdown">
                                        <button class="btn btn-white btn-sm dropdown-toggle align-text-top"
                                            data-boundary="viewport" data-toggle="dropdown">Actions</button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#">
                                                 Afficher
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                marquer comme inactif
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    width="18" height="18" class="mr-2">
                                                    <path fill="none" d="M0 0h24v24H0z" />
                                                    <path
                                                        d="M7 4V2h10v2h5v2h-2v15a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V6H2V4h5zM6 6v14h12V6H6zm3 3h2v8H9V9zm4 0h2v8h-2V9z" />
                                                </svg>
                                                Supprimer
                                            </a>
                                        </div>
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer d-flex align-items-center">
                <p class="m-0 text-muted">Affichage <span>1</span> à <span>10</span> de <span>30</span>
                    élements</p>
                <ul class="pagination m-0 ml-auto">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <polyline points="15 6 9 12 15 18" /></svg>
                            précédent
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item active"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">
                            suivant <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <polyline points="9 6 15 12 9 18" /></svg>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>


<div class="modal-section">

    {{-- Modal Add Product--}}
    <div class="modal modal-blur fade" id="modal-create-product" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ajouter un nouveau produit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" />
                            <line x1="18" y1="6" x2="6" y2="18" />
                            <line x1="6" y1="6" x2="18" y2="18" /></svg>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3 align-items-end">
                        <div class="col-lg-12 mb-4">
                            <label class="form-label"> Produit </label>
                            <select name="produit" id="product-product-add" class="form-select" data-live-search="true">
                                @foreach (Auth::user()->companies->first()->activity->products as $product)
                                    <option value="{{$product->id}}"> {{$product->name}} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-12 mb-4">
                            <label class="form-label"> Site </label>
                            <select name="site_id" id="product-site-add" class="form-select">
                                <option value="all"> Tous les sites </option>
                                @foreach (Auth::user()->companies->first()->sites()->get() as $site)
                                    <option value="{{$site->id}}"> {{$site->name}} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-12 mb-4">
                            <label class="form-label">Prix D'achat</label>
                            <input type="number" id="product-cost-add" class="form-control" min="0"  placeholder="Prix de d'achat" required>
                            <span class="text-danger" id="cost-error"></span>
                        </div>
                        <div class="col-lg-12 mb-4">
                            <label class="form-label">Prix de vente</label>
                            <input type="number" id="product-price-add" class="form-control" min="0"  placeholder="Prix de vente" required>
                            <span class="text-danger" id="price-error"></span>
                        </div>

                        <div class="col-lg-12 mb-4">
                            <label class="form-label">Quantité</label>
                            <input type="number" id="product-qty-add" class="form-control" min="1"  placeholder="Quantité en stock" required>
                            <span class="text-danger" id="qty-error"></span>
                        </div>
                        <div class="col-lg-12 mb-4">
                            <label class="form-label">Minimum</label>
                            <input type="number" id="product-qty_alert-add" class="form-control" min="1"  placeholder="Le Stock minimum" required>
                            <span class="text-danger" id="qty_alert-error"></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="addProduct()" class="btn btn-primary" style="width: 100%;">Ajouter</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Update product--}}
    @foreach (Auth::user()->companies->first()->sites as $site)
        @foreach ($site->products as $product)
            <div class="modal modal-blur fade" id="modal-edit-product{{$site->id}}{{$product->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"> Modifier le produit </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" />
                                    <line x1="18" y1="6" x2="6" y2="18" />
                                    <line x1="6" y1="6" x2="18" y2="18" /></svg>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row mb-3 align-items-end">

                                <div class="col-lg-12 mb-4">
                                    <label class="form-label"> Site </label>
                                    <select name="site_id" id="product-site-update{{$site->id}}{{$product->id}}" class="form-select">
                                        <option value="all"> Tous les sites </option>
                                        @foreach (Auth::user()->companies->first()->sites()->get() as $allSite)
                                            <option {{($allSite->id == $site->id) ? 'selected' : ''}} value="{{$allSite->id}}"> {{$allSite->name}} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-12 mb-4">
                                    <label class="form-label">Prix D'achat</label>
                                <input type="number" min="0" id="product-cost-update{{$site->id}}{{$product->id}}" value="{{$product->pivot->cost}}" class="form-control"  placeholder="Prix de d'achat " required>
                                    <span class="text-danger" id="cost-error{{$site->id}}{{$product->id}}"></span>
                                </div>
                                <div class="col-lg-12 mb-4">
                                    <label class="form-label">Prix de vente</label>
                                <input type="number" min="0" id="product-price-update{{$site->id}}{{$product->id}}" value="{{$product->pivot->price}}" class="form-control"  placeholder="Prix de vente" required>
                                    <span class="text-danger" id="price-error{{$site->id}}{{$product->id}}"></span>
                                </div>

                                <div class="col-lg-12 mb-4">
                                    <label class="form-label">Quantité</label>
                                    <input type="number" min="1" id="product-qty-update{{$site->id}}{{$product->id}}" value="{{$product->pivot->qty}}" class="form-control"  placeholder="Quantité en stock" required>
                                    <span class="text-danger" id="qty-error{{$site->id}}{{$product->id}}"></span>
                                </div>
                                <div class="col-lg-12 mb-4">
                                    <label class="form-label">Minimum</label>
                                    <input type="number" min="1" id="product-qty_alert-update{{$site->id}}{{$product->id}}" value="{{$product->pivot->qty_alert}}" class="form-control"  placeholder="Le Stock minimum" required>
                                    <span class="text-danger" id="qty_alert-error{{$site->id}}{{$product->id}}"></span>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button onclick="updateProduct({{$site->id}} , {{$product->id}})" type="button" class="btn btn-primary" style="width: 100%;"> Mettre à jour </button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endforeach


    <div class="modal modal-blur fade" id="modal-delete-site" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="modal-title">Êtes vous sûre de cette action ?</div>
                    <div>Si vous continuez, vous perdrez toutes les données de ce site.</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link link-secondary mr-auto"
                        data-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Oui, supprimer</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.21/af-2.3.5/b-1.6.2/b-colvis-1.6.2/b-flash-1.6.2/b-html5-1.6.2/b-print-1.6.2/cr-1.5.2/r-2.2.5/rr-1.2.7/sp-1.1.1/sl-1.3.1/datatables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#products').DataTable({
                 dom: 'Blfrtip',
                buttons: [
                    {
                        extend: 'colvis',
                        text: 'Colones visibles'
                    },
                    {
                        extend: 'copy',
                        text: 'Copier',
                        title : 'Easytrack',
                        exportOptions: {
                            columns: '.exportable',
                        }
                    },
                    {
                        extend: 'excel',
                        text: 'Excel',
                        title : 'Easytrack',
                        exportOptions: {
                            columns: '.exportable',
                        }
                    },
                    {
                        extend: 'csv',
                        text: 'CSV',
                        title : 'Easytrack',
                        exportOptions: {
                            columns: '.exportable',
                        }
                    },
                    {
                        extend: 'pdf',
                        text: 'PDF',
                        title : 'Easytrack',
                        exportOptions: {
                            columns: '.exportable'
                        }
                    },
                ],
                select: false,
                colReorder: true,
            });
        } );
    </script>
    <script>
        function addProduct(){
            var token = '{{csrf_token()}}';
            var product_id = $("#product-product-add").val();
            var cost = $("#product-cost-add").val();
            var price = $("#product-price-add").val();
            var qty = $("#product-qty-add").val();
            var qty_alert = $("#product-qty_alert-add").val();
            var site_id = $("#product-site-add").val();

            $.ajax({
                url : '/admin/products',
                method : 'post',
                data : {
                    _token : token,
                    product_id : product_id,
                    cost : cost,
                    price : price,
                    site_id : site_id,
                    qty : qty,
                    qty_alert : qty_alert,
                },
                success : function(){
                    location.reload();
                },
                error: function (err) {
                    if (err.status == 422) { // when status code is 422, it's a validation issue
                            // console.log(err.responseJSON);

                        // you can loop through the errors object and show it to the user
                            //console.warn(err.responseJSON.errors);
                        // display errors on each form field

                        $(".text-danger").fadeOut().html('');

                        $.each(err.responseJSON.errors, function (i, error) {
                            var el = $('#'+i+'-error');
                            el.html(error).fadeIn();
                        });
                    }
                }

            });
        }

        function updateProduct(site, product){
            var token = '{{csrf_token()}}';
            var site_id = $("#product-site-update"+site+product).val();
            var cost = $("#product-cost-update"+site+product).val();
            var price = $("#product-price-update"+site+product).val();
            var qty = $("#product-qty-update"+site+product).val();
            var qty_alert = $("#product-qty_alert-update"+site+product).val();

            var site = $('#product-site-update'+site+product+' option:selected').text();

            $.ajax({
                url : '/admin/products/'+product,
                method : 'post',
                data : {
                    _token : token,
                    site_id : site_id,
                    cost : cost,
                    price : price,
                    qty : qty,
                    qty_alert : qty_alert,
                },
                success : function(){
                        location.reload();
                        $(".text-danger").fadeOut().html('');
                        // $("#modal-edit-site"+id).modal().hide();
                        $("#product-cost"+site+product).fadeOut().html(cost).fadeIn();
                        $("#product-price"+site+product).fadeOut().html(price).fadeIn();
                        $("#product-site"+site+product).fadeOut().html(site).fadeIn();
                        $("#product-qty"+site+product).fadeOut().html(qty).fadeIn();
                        $("#product-qty_alert"+site+product).fadeOut().html(qty_alert).fadeIn();
                },
                error: function (err) {
                    if (err.status == 422) { // when status code is 422, it's a validation issue
                            // console.log(err.responseJSON);

                        // you can loop through the errors object and show it to the user
                            //console.warn(err.responseJSON.errors);
                        // display errors on each form field

                        $(".text-danger").fadeOut().html('');

                        $.each(err.responseJSON.errors, function (i, error) {
                            var el = $('#'+i+'-error'+site+product);
                            el.html(error).fadeIn();
                        });
                    }
                }

            });
        }
    </script>
@endsection

@section('styles')
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.21/af-2.3.5/b-1.6.2/b-colvis-1.6.2/b-flash-1.6.2/b-html5-1.6.2/b-print-1.6.2/cr-1.5.2/r-2.2.5/rr-1.2.7/sp-1.1.1/sl-1.3.1/datatables.min.css"/>
@endsection
