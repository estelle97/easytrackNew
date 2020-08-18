@extends('layouts.base')

@section('content')
    
<!-- Page title -->
<div class="page-header text-white">
    <div class="row align-items-center">
        <div class="col-auto">
            <h2 class="page-title">
                <a href="./salesorders-kanban-board.html" class="mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                        <path fill="none" d="M0 0h24v24H0z" />
                        <path
                            d="M7.828 11H20v2H7.828l5.364 5.364-1.414 1.414L4 12l7.778-7.778 1.414 1.414z"
                            fill="rgba(255,255,255,1)" /></svg>
                </a>
                Ajouter des produits
            </h2>
        </div>
        <!-- Page title actions -->
        <div class="col-auto ml-auto d-print-none">
            <div class="d-flex align-items-center">
                <a class="text-white mr-4 mb-0" onclick="addProducts()">
                    <span class="h2 align-middle">Enregistrer</span>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12" style="max-height: 700px;">
        <div class="card">
            <div class="order-box">
                <div class="order-controls m-4">
                    <form class="form-inline">
                        <div class="form-group mb-3">
                            <label for="">Site</label>
                            <select id="sites" class="form-select">
                                <option value="all"> Tous les sites </option>
                                @foreach (Auth::user()->companies->first()->sites as $site)
                                    <option value={{$site->id}}> {{$site->name}} </option>
                                @endforeach
                            </select>
                        </div>
                    </form>
                </div>
                <div class="order-products m-4">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="input-icon mb-3">
                                <input id="product-search" type="text" class="form-control" placeholder="Rechercher un produit..">
                                <span class="input-icon-addon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><circle cx="10" cy="10" r="7"></circle><line x1="21" y1="21" x2="15" y2="15"></line></svg>
                                </span>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <select id="categories" class="form-select">
                                @foreach (App\Category::all() as $cat)
                                    <option value={{$cat->id}}> {{$cat->name}} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="card-deck row d-flex flex-row">
                    </div>
                </div>
                <div class="order-items-table">
                    <div class="table-responsive">
                        <table class="table table-lightborder">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Nom</th>
                                    <th>Prix d'achat</th>
                                    <th>Prix de vente</th>
                                    <th>Quantité</th>
                                    <th>Minimum</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody class="order-list">
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection


@section('scripts')
<script src={{asset("template/assets/dist/libs/selectize/dist/js/standalone/selectize.min.js")}}></script>

<script>
    // INITIALIZATION
    init();
    // AUTOCOMPLETE
    var categoriesSelect = $("#categories").selectize({});

    // GLOBAL VARIABLES
    let productInDB = [];
    let productCardList = [];
    let productCardOnClick = null;
    let products = [];

    // DYNAMIC PRODUCT LOADER
    function injectCardList(itemList) {
        $.each(itemList, function (key, item) {
            $('.card-deck').append(
                '<div class="col-md-3 product-card d-flex flex-column align-items-center card border-0 pt-3 mb-0" data-imgsrc="'+item.photo+'" data-id="'+item.id+'"  data-qty="'+item.qty+'" data-qty-alert="'+item.qty_alert+'" data-price="'+item.price+'" data-cost="'+item.cost+'" value="'+item.id+'">' +
                '    <img class="w-50" src="'+item.photo+'" alt="Card image cap">' +
                '    <div class="card-body text-center">' +
                '    <h5 class="card-title">'+item.name+'</h5>' +
                '    </div>' +
                '</div>'
            );
        });
    }

    function displayProduct() {
        // INITIALIZE HTML CONTENT
        $('.card-deck').empty();

        // CORE
        var category = categoriesSelect[0].selectize.getValue();
        productCardList = productInDB.filter(product => product.category_id == category);
        injectCardList(productCardList);
        productCardOnClick = cardOnCick();
    };

    displayProduct();

    // CATEGORY SELECT EVENT
    categoriesSelect[0].selectize.on('change', () => {
        displayProduct();
    });

    // SEARCH
    $("#product-search").keyup(function() {
        var val = $(this).val();
        var result = productInDB.filter(product => {
            return product.name.toLowerCase().indexOf(val.toLowerCase()) > -1;
        });
        if (result.length > 0) {
            // INITIALIZE HTML CONTENT
            $('.card-deck').empty();

            // CORE
            injectCardList(result);
            productCardOnClick = cardOnCick();
        }
    });

    // POS FUNCTIONS

    function removeElement(el) {
        $("#product-"+el).remove().fadeOut(1000);

        products = jQuery.grep(products, function(value) {
            return value != el;
        });
    }

    function addElement(el) {
        if (!products.includes(el.data('id'))) {
            console.log(el.data());
            $('.order-list').append(
                '<tr id="product-'+el.data("id")+'">' +
                '    <td>' +
                '        <div class="product-image mt-3 mb-3"' +
                '            style="background-image: url(\''+el.data("imgsrc")+'\')">' +
                '        </div>' +
                '    </td>' +
                '    <td style="vertical-align: middle;">' +
                '        <div class="product-name" id="name'+el.data("id")+'">'+el.text()+'</div>' +
                '    </td>' +
                '    <td style="vertical-align: middle;">' +
                '        <div class="quantity-selector">' +
                '            <div class="product-input">' +
                '                <input type="number" class="form-control p-0 text-left border-0" value="500" min="0" id="cost'+el.data("id")+'">' +
                '            </div>' +
                '        </div>' +
                '    </td>' +
                '    <td style="vertical-align: middle;">' +
                '        <div class="quantity-selector">' +
                '            <div class="product-input">' +
                '                <input type="number" class="form-control p-0 text-left border-0" value="1000" min="0" id="price'+el.data("id")+'">' +
                '            </div>' +
                '        </div>' +
                '    </td>' +
                '    <td style="vertical-align: middle;">' +
                '        <div class="quantity-selector">' +
                '            <div class="product-input">' +
                '                <input type="number" class="form-control p-0 text-left border-0" value="0" min="0" id="qty'+el.data("id")+'">' +
                '            </div>' +
                '        </div>' +
                '    </td>' +
                '    <td style="vertical-align: middle;">' +
                '        <div class="quantity-selector">' +
                '            <div class="product-input">' +
                '                <input type="number" class="form-control p-0 text-left border-0" value="0" min="0" id="qty_alert'+el.data("id")+'" >' +
                '            </div>' +
                '        </div>' +
                '    </td>' +
                '    <td style="vertical-align: middle;">' +
                '        <a class="btn btn-light p-1 delete" data-product="'+el.data("id")+'" onclick="removeElement('+el.data("id")+')" ><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 10.586l4.95-4.95 1.414 1.414-4.95 4.95 4.95 4.95-1.414 1.414-4.95-4.95-4.95 4.95-1.414-1.414 4.95-4.95-4.95-4.95L7.05 5.636z" fill="rgb(255, 62, 62)"/></svg></a>' +
                '    </td>' +
                '</tr>'
            );
            products.push(el.data('id'));
        }
    }

    function cardOnCick() {
        return $('.product-card').click(function () {
            element = $(this);
            addElement(element);
        });
    }

    function addProducts() {
        var site = $("#sites").val();
        var token = '{{@csrf_token()}}';
        var productsList = '';
        $.each(products, function (key, val) {
            id = val;
            qty = $("#qty"+val).val();
            qty_alert = $("#qty_alert"+val).val();
            price = $("#price"+val).val();
            cost = $("#cost"+val).val();

            productsList += id+';'+qty+';'+qty_alert+';'+cost+';'+price+'|'
        });

        $.ajax({
            url: '/admin/products/store/many',
            method: 'post',
            data: {
                _token: token,
                site_id: site,
                products: productsList,
            },
            success: function(data){
                window.location.replace("/admin/products");
            }
        })
    }

    function init(){

        $.ajax({
            url: '/admin/products/init',
            method: 'get',
            success: function(data){
                $("#customers").html(data.customers);
                productInDB = [];
                productInDB = [
                    ...data.products
                ];
            displayProduct();
            }

        });
    }

</script>
@endsection


@section('styles')
    
@endsection