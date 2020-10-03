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
        <!-- Page title actions -->
        <div class="col-auto ml-auto d-print-none">
            <div class="d-flex align-items-center">
                <span class="dropdown mr-4">
                    <a class="dropdown-toggle button-click-action" data-boundary="viewport" data-toggle="dropdown">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="28" height="28" class="mr-2"><path fill="none" d="M0 0h24v24H0z"/><path d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z" fill="rgba(255,255,255,1)"/></svg>
                    <span class="align-middle">Nouveau produit</span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right mt-3">
                        <span class="dropdown-header">Menu</span>
                        <a class="dropdown-item" data-toggle="modal" data-target="#modal-create-product">
                            Ajouter un produit
                        </a>
                        <a class="dropdown-item" href="{{route('easytrack.products.create')}}">
                            Ajouter plusieurs produits
                        </a>
                    </div>
                </span>

            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="card col-lg-3 p-3">
        <div class="row">
            <div class="col-lg-6">
                <h2 class="">
                    Catégories
                </h2>
            </div>
            <!-- Page title actions -->
            <div class="col-lg-6 ">
                <div class="d-flex flex-row-reverse">

                    <a href="#" class="btn-e-icon text-black ml-2" data-toggle="modal" data-target="#modal-create-category">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20"
                            height="20">
                            <path fill="none" d="M0 0h24v24H0z" />
                            <path
                                d="M15.728 9.686l-1.414-1.414L5 17.586V19h1.414l9.314-9.314zm1.414-1.414l1.414-1.414-1.414-1.414-1.414 1.414 1.414 1.414zM7.242 21H3v-4.243L16.435 3.322a1 1 0 0 1 1.414 0l2.829 2.829a1 1 0 0 1 0 1.414L7.243 21z" />
                        </svg>
                    </a>
                </div>
            </div>
            <div class="category-list list list-row">
                @foreach (App\Category::all() as $cat)
                    <div class="list-item" id="category{{$cat->id}}">
                        <div><input type="checkbox" class="form-check-input"></div>
                        <a href="#">
                            <span class="avatar rounded"
                                style="background-image: url('https://ui-avatars.com/api/?name={{$cat->name}};"></span>
                        </a>
                        <div class="text-truncate">
                            <a id="cat-name{{$cat->id}}" href="#" class="text-body d-block"> {{$cat->name}} </a>
                            <small class="d-block text-muted text-truncate mt-n1"> {{$cat->products->count()}} </small>
                        </div>

                        <a href="#" class="btn-e-icon text-black" data-toggle="modal" data-target="#modal-edit-category{{$cat->id}}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20"
                                height="20">
                                <path fill="none" d="M0 0h24v24H0z" />
                                <path
                                    d="M15.728 9.686l-1.414-1.414L5 17.586V19h1.414l9.314-9.314zm1.414-1.414l1.414-1.414-1.414-1.414-1.414 1.414 1.414 1.414zM7.242 21H3v-4.243L16.435 3.322a1 1 0 0 1 1.414 0l2.829 2.829a1 1 0 0 1 0 1.414L7.243 21z" />
                            </svg>
                        </a>
                        <a  class="btn-e-icon text-black" onclick="deleteCategory({{$cat->id}})">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                width="20" height="20">
                                <path fill="none" d="M0 0h24v24H0z" />
                                <path
                                    d="M7 4V2h10v2h5v2h-2v15a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V6H2V4h5zM6 6v14h12V6H6zm3 3h2v8H9V9zm4 0h2v8h-2V9z" />
                            </svg>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-lg-9">
        <div class="card p-2">
            <div class="table-responsive">
                <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar" class="table card-table table-vcenter text-nowrap datatable">
                    <thead>
                        <tr>
                            <th class="w-1"></th>
                            <th class="exportable w-1">Code</th>
                            <th class="exportable">Nom</th>
                            <th class="exportable">Categorie</th>
                            <th>Marque</th>
                            <th>Unité</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="products">
                        @foreach (App\Product::all() as $product)
                            <tr id="product{{$product->id}}">
                                <td>
                                     <a class="avatar avatar-upload rounded thumbnail" id="product-photo{{$product->id}}">
                                        <img src="{{asset($product->photo)}}" />
                                    </a>
                                </td>
                                <td><span class="text-muted"> {{$product->code}} </span></td>
                                <td id="product-name{{$product->id}}">  
                                    {{$product->name}}
                                </td>
                                <td id="product-category{{$product->id}}">
                                    {{$product->category->name}}
                                </td>
                                <td id="product-brand{{$product->id}}">
                                    {{$product->brand}}
                                </td>
                                <td id="product-unit{{$product->id}}">
                                    {{($product->unit->name ?? 'bouteille')}}
                                </td>
                                <td class="text-right">
                                    <a href="#" class="btn btn-white btn-sm mt-1" data-toggle="modal" data-target="#modal-edit-product{{$product->id}}">
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
                                                 Afficher
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" onclick="deleteProduct({{$product->id}})">
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
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<div class="modal-section">

    {{-- Modal Add Category--}}
    <div class="modal modal-blur fade" id="modal-create-category" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ajouter une categorie</h5>
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
                            <label class="form-label">Nom</label>
                            <input type="text" id="category-name-add" class="form-control" placeholder="Saisissez le nom de la categorie..." required>
                            <span class="text-danger" id="name-error"></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="addCategory()" class="btn btn-primary" style="width: 100%;">Ajouter</button>
                </div>
            </div>
        </div>
    </div>

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
                        <div class="col-lg-3">
                            <input type="file" name="img[]" class="file" accept="image/*" hidden>
                            <a id="profile" class="avatar avatar-upload rounded thumbnail">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <line x1="12" y1="5" x2="12" y2="19" />
                                <line x1="5" y1="12" x2="19" y2="12" /></svg>
                                <span class="avatar-upload-text">Photo </span>
                            </a>
                        </div>
                        <div class="col-lg-9">
                            <span class="text-danger" id="product-photo-error"></span>
                        </div>
                        <div class="col-lg-12 mb-4">
                            <label class="form-label">Nom</label>
                            <input type="text" id="product-name-add" class="form-control" placeholder="Saisissez le nom du produit..." required>
                            <span class="text-danger" id="product-name-error"></span>
                        </div>
                        <div class="col-lg-12 mb-4">
                            <label class="form-label">Marque</label>
                            <input type="text" id="product-brand-add" class="form-control"  placeholder="Saisissez la marque du produit..." required>
                            <span class="text-danger" id="product-brand-error"></span>
                        </div>
                        <div class="col-lg-12 mb-4">
                            <label class="form-label"> Catégorie </label>
                            <select name="category" id="product-category-add" class="form-select">
                                 @foreach (App\Category::all() as $cat)
                                    <option value="{{$cat->id}}"> {{$cat->name}} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-12 mb-4">
                            <label class="form-label"> Unité </label>
                            <select name="unit" id="product-unit-add" class="form-select">
                                 @foreach (App\Unit::all() as $unit)
                                    <option value="{{$unit->id}}"> {{$unit->name}} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-12 mb-4">
                            <label class="form-label"> Description </label>
                            <textarea placeholder="Description..." class="form-control" id="product-description-add"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="addProduct()" class="btn btn-primary" style="width: 100%;">Ajouter</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Update Category--}}
    @foreach (App\Category::all() as $cat)
        <div class="modal modal-blur fade" id="modal-edit-category{{$cat->id}}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"> Modifier une catégorie </h5>
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
                                <label class="form-label">Nom</label>
                                <input type="text" id="category-name-update{{$cat->id}}" value="{{$cat->name}}" class="form-control"
                                    placeholder="Nom de la catégorie" required>
                                    <span class="text-danger" id="name-error{{$cat->id}}"></span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button onclick="updateCategory({{$cat->id}})" type="button" class="btn btn-primary" style="width: 100%;"> Mettre à jour </button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    {{-- Modal Update product--}}
    @foreach (App\Product::all() as $product)
        <div class="modal modal-blur fade" id="modal-edit-product{{$product->id}}" tabindex="-1" role="dialog" aria-hidden="true">
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
                            <input type="file" name="img[]" class="file{{$product->id}}" accept="image/*" hidden>
                            <a id="profile{{$product->id}}" class="avatar avatar-upload rounded thumbnail" onclick="preview({{$product->id}})">
                               <img src="{{asset($product->photo)}}" class="img img-responsive"/>
                            </a>
                            <div class="col-lg-12 mb-4">
                                <label class="form-label">Nom</label>
                                <input type="text" id="product-name-update{{$product->id}}" value="{{$product->name}}" class="form-control"
                                    placeholder="Saisissez le nom du produit" required>
                                    <span class="text-danger" id="product-name-error{{$product->id}}"></span>
                            </div>
                            <div class="col-lg-12 mb-4">
                                <label class="form-label">Marque</label>
                                <input type="text" id="product-brand-update{{$product->id}}" value="{{$product->brand}}" class="form-control"
                                    placeholder="Saisissez la marque " required>
                                    <span class="text-danger" id="product-brand-error{{$product->id}}"></span>
                            </div>
                            <div class="col-lg-12 mb-4">
                                <label class="form-label"> Catégorie </label>
                                <select name="category" id="product-category-update{{$product->id}}" class="form-select">
                                     @foreach (App\Category::all() as $cat)
                                        <option {{($product->category_id == $cat->id) ? 'selected' : ''}} value="{{$cat->id}}"> {{$cat->name}} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-12 mb-4">
                                <label class="form-label"> Unité </label>
                                <select name="unit" id="product-unit-update{{$product->id}}" class="form-select">
                                     @foreach (App\Unit::all() as $unit)
                                        <option {{($product->unit_id == $unit->id) ? 'selected' : ''}} value="{{$unit->id}}"> {{$unit->name}} </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-lg-12 mb-4">
                                <label class="form-label"> Description </label>
                                <textarea placeholder="Description..." class="form-control" id="product-description-update{{$product->id}}">{{$product->description}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button onclick="updateProduct({{$product->id}})" type="button" class="btn btn-primary" style="width: 100%;"> Mettre à jour </button>
                    </div>
                </div>
            </div>
        </div>
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

    <script>
        function addCategory(){
            var token = '{{csrf_token()}}';
            var name = $("#category-name-add").val();

            $.ajax({
                url: '/easytrack/categories',
                method: 'post',
                data: {
                    _token : token,
                    name : name,
                },
                success: function(data){
                    // $("#modal-create-site").modal('hide');
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

        function updateCategory(id){
            var token = '{{csrf_token()}}';
            var name = $("#category-name-update"+id).val();

            $.ajax({
                url: '/easytrack/categories/'+id,
                method: 'post',
                data: {
                    _token : token,
                    name : name,
                },
                success: function(data){
                    if(data == 'success'){
                        $(".text-danger").fadeOut().html('');
                        // $("#modal-edit-category"+id+" .close").click();

                        $("#cat-name"+id).fadeOut().html(name).fadeIn();
                    }
                },
                error: function (err) {
                    if (err.status == 422) { // when status code is 422, it's a validation issue
                            // console.log(err.responseJSON);

                        // you can loop through the errors object and show it to the user
                            //console.warn(err.responseJSON.errors);
                        // display errors on each form field

                        $(".text-danger").fadeOut().html('');

                        $.each(err.responseJSON.errors, function (i, error) {
                            var el = $('#'+i+'-error'+id);
                            el.html(error[0]).fadeIn();
                        });
                    }
                }
            });
        }

        function addProduct(){
            var form_data = new FormData(); // Creating object of FormData class

            form_data.append("photo", $('.file').prop('files')[0]);
            form_data.append("name", $("#product-name-add").val());
            form_data.append("brand", $("#product-brand-add").val());
            form_data.append("description", $("#product-description-add").val());
            form_data.append("unit_id", $("#product-unit-add").val());
            form_data.append("category_id", $("#product-category-add").val());
            form_data.append("_token", '{{csrf_token()}}');
            $.ajax({
                url : '/easytrack/products',
                cache: false,
                contentType: false,
                processData: false,
                method : 'post',
                data : form_data,
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
                            var el = $('#product-'+i+'-error');
                            el.html(error).fadeIn();
                        });
                    }
                }

            });
        }

        function updateProduct(id){

            var form_data = new FormData(); // Creating object of FormData class

            if($(".file"+id).get(0).files.length != 0)   form_data.append("photo", $('.file'+id).prop('files')[0]);
            form_data.append("name", $("#product-name-update"+id).val());
            form_data.append("brand", $("#product-brand-update"+id).val());
            form_data.append("description", $("#product-description-update"+id).val());
            form_data.append("unit_id", $("#product-unit-update"+id).val());
            form_data.append("category_id", $("#product-category-update"+id).val());
            form_data.append("_token", '{{csrf_token()}}');

            var unit = $('#product-unit-update'+id+' option:selected').text();
            var category = $('#product-category-update'+id+' option:selected').text();

            $.ajax({
                url : '/easytrack/products/'+id,
                cache: false,
                contentType: false,
                processData: false,
                method : 'post',
                data : form_data,
                success : function(){
                    $(".text-danger").fadeOut().html('');
                        // $("#modal-edit-site"+id).modal().hide();


                        $("#product-name"+id).fadeOut().html( $("#product-name-update"+id).val()).fadeIn();
                        $("#product-brand"+id).fadeOut().html($("#product-brand-update"+id).val()).fadeIn();
                        $("#product-category"+id).fadeOut().html(category).fadeIn();
                        $("#product-unit"+id).fadeOut().html(unit).fadeIn();
                },
                error: function (err) {
                    if (err.status == 422) { // when status code is 422, it's a validation issue
                            // console.log(err.responseJSON);

                        // you can loop through the errors object and show it to the user
                            //console.warn(err.responseJSON.errors);
                        // display errors on each form field

                        $(".text-danger").fadeOut().html('');

                        $.each(err.responseJSON.errors, function (i, error) {
                            var el = $('#product-'+i+'-error'+id);
                            el.html(error).fadeIn();
                        });
                    }
                }

            });
        }

        function deleteProduct(id){
            var token = '{{csrf_token()}}';
            if(confirm('Voulez vous vraiment supprimer ce produit?')){
                $.ajax({
                    url: '/easytrack/products/'+id+'/destroy',
                    method: 'post',
                    data: {
                        _token: token
                    },
                    success: function(){
                        $("#product"+id).fadeOut();
                    }
                });
            }
        }

        function deleteCategory(id){
            var token = '{{csrf_token()}}';
            if(confirm('Voulez vous vraiment supprimer ce produit?')){
                $.ajax({
                    url: '/easytrack/categories/'+id+'/destroy',
                    method: 'post',
                    data: {
                        _token: token
                    },
                    success: function(){
                        $("#category"+id).fadeOut();
                    },
                    error: function(data){
                        alert(data.responseJSON.message);
                    }
                });
            }
        }

        $("#profile").click(function(){
            $(".file").click();

            $('input[type="file"]').change(function(e) {
                console.log(e.target.files);
                var fileName = e.target.files[0].name;
                // $("#file").val(fileName);

                var reader = new FileReader();
                reader.onload = function(e) {
                    // get loaded data and render thumbnail.
                    pic = "<img src='"+e.target.result+"' class='img img-responsive' width='100px' height='100px' />";
                    $("#profile").html(pic);
                    // document.getElementById("preview").src = e.target.result;
                };
                // read the image file as a data URL.
                reader.readAsDataURL(this.files[0]);
            });
        })

        function preview(id){
             $(".file"+id).click();

            $('.file'+id).change(function(e) {
                var fileName = e.target.files[0].name;

                var reader = new FileReader();
                reader.onload = function(e) {
                    pic = "<img src='"+e.target.result+"' class='img img-responsive' width='100px' />";
                    $("#profile"+id).html(pic);
                    $("#product-photo"+id).html(pic);
                };
                reader.readAsDataURL(this.files[0]);
            });
        }

    </script>
@endsection
