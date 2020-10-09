@extends('layouts.base')

@section('content')

<div class="container-xl">
    <!-- Page title -->
    <div class="page-header text-white">
        <div class="row align-items-center">
            <div class="col-auto">
                <h2 class="page-title">
                    <a href={{route('admin.sales.kanban')}} class="mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                            <path fill="none" d="M0 0h24v24H0z" />
                            <path
                                d="M7.828 11H20v2H7.828l5.364 5.364-1.414 1.414L4 12l7.778-7.778 1.414 1.414z"
                                fill="rgba(255,255,255,1)" /></svg>
                    </a>
                    Mettre à jour la commande SO-{{$sale->code}}
                </h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="card" style="height: 710px; max-height: 710px;">
                <div class="order-box p-3">
                    <div class="order-details-box">
                        <div class="order-main-info"><span>Commande </span><strong>SO-{{$sale->code}}</strong></div>
                        <div class="order-sub-info"><span>Créer le</span><strong class="order-sub-info-date">{{ date('M d, Y', strtotime($sale->created_at))}}</strong>
                        </div>
                    </div>
                    <div class="order-controls mb-4">
                        <form class="form-inline">
                            <div class="form-group mb-3">
                                <label for="">Site</label>
                                <select name="role" id="sites" disabled class="form-select">
                                    <option selected value={{$sale->site->id}}> {{$sale->site->name}} </option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for=""> Client </label>
                                <select id="customers" class="form-select">
                                    @foreach ($sale->site->customers as $cus)
                                        <option {{($sale->site->customer_id == $cus->id) ? 'selected' : ''}} value={{$cus->id}} > {{$cus->name}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="order-products mb-5">
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
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card" style="height: 710px; max-height: 710px;">
                <div class="order-box p-3">
                    <div class="order-items-table">
                        <div class="table-responsive">
                            <table class="table table-lightborder">
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Quantité</th>
                                        <th>PU</th>
                                        <th>sous total</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody class="order-list">
                                    @foreach ($sale->products as $prod)
                                        <tr id="product-{{$prod->id}}">
                                                <td>
                                                    <div class="product-image mt-3 mb-3"
                                                        style="background-image: url('{{asset($prod->photo)}}')">
                                                    </div>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <div class="product-name" id="name-{{$prod->id}}" data-name="{{$prod->name}}">{{$prod->name}}</div>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <div class="product-price" id="price-{{$prod->id}}"  data-price="{{$prod->pivot->price}}">{{$prod->pivot->price}} FCFA</div>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <div class="quantity-selector">
                                                        <div class="quantity-input">
                                                            <div class="input-group">
                                                                <span class="input-group-btn mr-1">
                                                                    <a class="btn btn-light p-1" id="minus-{{$prod->id}}" onclick="updateQty({{$prod->id}}, -1)">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M5 11h14v2H5z" fill="rgba(0,0,0,1)"/></svg>
                                                                    </a>
                                                                </span>
                                                                <input type="text" class="form-control p-0 text-center border-0" value="{{$prod->pivot->qty}}" id="qty-{{$prod->id}}" data-total={{$sale->site->products->find($prod->id)->pivot->qty}} data-qty={{$prod->pivot->qty}} required oninput="updateQty({{$prod->id}}, this.value)">
                                                                <span class="input-group-btn ml-1">
                                                                    <a class="btn btn-light p-1" id="plus-{{$prod->id}}" onclick="updateQty({{$prod->id}})">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z" fill="rgba(0,0,0,1)"/></svg>
                                                                    </a>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <div class="product-price" id="subtotal-{{$prod->id}}" data-subtotal={{$prod->pivot->price * $prod->pivot->qty}}> {{$prod->pivot->price * $prod->pivot->qty}} FCFA </div>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <a class="btn btn-light p-1 delete" data-product="{{$prod->id}}" onclick="removeElement({{$prod->id}})" ><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 10.586l4.95-4.95 1.414 1.414-4.95 4.95 4.95 4.95-1.414 1.414-4.95-4.95-4.95 4.95-1.414-1.414 4.95-4.95-4.95-4.95L7.05 5.636z" fill="rgb(255, 62, 62)"/></svg></a>
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
        <div class="col-lg-4">
            <div class="card p-3 order-foot">
                <div class="row">
                    <div class="col-md-12 mb-2">
                        <div>
                            <div class="form-group row">
                                <div class="col-md-12 mb-4">
                                    <label class="form-label">Moyen de paiement</label>
                                    <div
                                        class="form-selectgroup form-selectgroup-boxes d-flex flex-row">
                                        <label class="form-selectgroup-item flex-fill">
                                            <input type="radio" {{($sale->paying_method == 'cash') ? 'checked' : ''}} class="paying_method" name="paying_method" value="cash"
                                                class="form-selectgroup-input">
                                            <div
                                                class="form-selectgroup-label d-flex align-items-center p-3">
                                                <div class="mr-3">
                                                    <span class="form-selectgroup-check"></span>
                                                </div>
                                                <div>
                                                    <span
                                                        class="payment payment-provider-cash payment-sm mr-2 shadow-none"></span>
                                                    Cash
                                                </div>
                                            </div>
                                        </label>
                                        <label class="form-selectgroup-item flex-fill">
                                            <input type="radio" {{($sale->paying_method == 'om') ? 'checked' : ''}} class="paying_method" name="paying_method" value="om"
                                                class="form-selectgroup-input">
                                            <div
                                                class="form-selectgroup-label d-flex align-items-center p-3">
                                                <div class="mr-3">
                                                    <span class="form-selectgroup-check"></span>
                                                </div>
                                                <div>
                                                    <span
                                                        class="payment payment-provider-om payment-sm mr-2 shadow-none"></span>
                                                    Orange Money
                                                </div>
                                            </div>
                                        </label>
                                        <label class="form-selectgroup-item flex-fill">
                                            <input type="radio" {{($sale->paying_method == 'momo') ? 'checked' : ''}} class="paying_method" name="paying_method" value="momo"
                                                class="form-selectgroup-input">
                                            <div
                                                class="form-selectgroup-label d-flex align-items-center p-3">
                                                <div class="mr-3">
                                                    <span class="form-selectgroup-check"></span>
                                                </div>
                                                <div>
                                                    <span
                                                        class="payment payment-provider-mtn payment-sm mr-2 shadow-none"></span>
                                                    MOMO
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-4">
                        <h5 class="order-section-heading">Récapitulatif</h5>
                        <div class="order-summary-row">
                            <div class="order-summary-label"><span>Total</span></div>
                            <div class="order-summary-value subtotal"> {{$sale->total()}} </div>
                        </div>
                        <div class="order-summary-row">
                            <div class="order-summary-label"><span>Transport</span></div>
                            <div class="order-summary-value">0</div>
                        </div>
                        <div class="order-summary-row as-total">
                            <div class="order-summary-label"><span> Grand Total</span></div>
                            <div class="order-summary-value grand-total"> {{$sale->total()}} </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-4">
                        <label class="form-label"> Etat </label>
                        <select name="role" id="status" class="form-select">
                            <option {{($sale->status == 0) ? 'selected' : ''}} value="0"> Commandé </option>
                            <option {{($sale->status == 1) ? 'selected' : ''}} value="1">   Servi   </option>
                            <option {{($sale->status == 2) ? 'selected' : ''}} value="2">   Payé   </option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <div>
                            <div class="form-group">
                                <label class="form-label"> Notes </label>
                                <textarea class="form-control mb-4" id="sale_note" placeholder="Donner un avis">{{$sale->sale_note}} </textarea>
                        </div>
                        </div>
                        <button class="btn btn-primary btn-block" onclick="order()">Enregister</button>
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
    document.body.style.display = "block";
    $(document).ready(function() {
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1;

        var yyyy = today.getFullYear();
        if (dd < 10) {
            dd = '0' + dd;
        }

        if (mm < 10) {
            mm = '0' + mm;
        }
        var today_converted = dd + '/' + mm + '/' + yyyy;
        $( ".order-sub-info-date" ).text( today_converted );
    });
</script>
<script>
    // INItIALISATION
    init();
    // AUTOCOMPLETE
    var categoriesSelect = $("#categories").selectize({});
    var suppliersSelect = $("#suppliers").selectize({});
    var sitesSelect = $("#sites").selectize({});

    // GLOBAL VARIABLES
    let productInDB = [];
    let productCardList = null;
    let products = [];

    // DYNAMIC PRODUCT LOADER
    function injectCardList(itemList) {
        $.each(itemList, function (key, item) {
            $('.card-deck').append(
                '<div class="col-md-4 product-card d-flex flex-column align-items-center card border-0 pt-3 mb-0" data-imgsrc="'+item.photo+'" data-id="'+item.id+'"  data-qty="'+item.qty+'" data-price="'+item.price+'" value="'+item.id+'">' +
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
        productCardOnClick = cardOnClick();
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
            productCardOnClick = cardOnClick();
        }
    });

    // POS FUNCTIONS
    function calculate(){
        var total = 0;
        $.each(products, function (key, val) {
            total  += parseInt($("#qty-"+val).data('qty')) * parseInt($("#price-"+val).data('price'));
            $("#subtotal-"+val).html(parseInt($("#qty-"+val).data('qty')) * parseInt($("#price-"+val).data('price')));
            $("#subtotal-"+val).data('subtotal', parseInt($("#qty-"+val).data('qty')) * parseInt($("#price-"+val).data('price')));
        });

        $(".subtotal").html(total);

        $(".grand-total").html(total);
    }

    function removeElement(el) {
        $("#product-"+el).remove().fadeOut(1000);

        products = jQuery.grep(products, function(value) {
            return value != el;
        });
        calculate();
    }

    function addElement(el) {
        if(products.includes(el.data('id'))){
            updateQty(el.data('id'));
        } else {
            /* $('.order-list').prepend(
                '<tr id="product-'+el.data("id")+'">' +
                '    <td>' +
                '        <div class="product-image mt-3 mb-3"' +
                '            style="background-image: url(\''+el.data("imgsrc")+'\')">' +
                '        </div>' +
                '    </td>' +
                '    <td style="vertical-align: middle;">' +
                '        <div class="product-name" id="name-'+el.data("id")+'" data-name="'+el.text()+'">'+el.text()+'</div>' +
                '    </td>' +
                '    <td style="vertical-align: middle;">' +
                '        <div class="quantity-selector">' +
                '            <div class="quantity-input">' +
                '                <div class="input-group">' +
                '                    <span class="input-group-btn mr-1">' +
                '                        <a class="btn btn-light p-1" id="minus-'+el.data("id")+'" onclick="updateQty('+el.data("id")+', -1)">' +
                '                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M5 11h14v2H5z" fill="rgba(0,0,0,1)"/></svg>' +
                '                        </a>' +
                '                    </span>' +
                '                    <input type="text" class="form-control p-0 text-center border-0" value="1" id="qty-'+el.data("id")+'" data-total="'+el.data("qty")+'" data-qty="1" required oninput="updateQty('+el.data("id")+', '+this.value+')">' +
                '                    <span class="input-group-btn ml-1">' +
                '                        <a class="btn btn-light p-1" id="plus-'+el.data("id")+'" onclick="updateQty('+el.data("id")+')">' +
                '                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z" fill="rgba(0,0,0,1)"/></svg>' +
                '                        </a>' +
                '                    </span>' +
                '                </div>' +
                '            </div>' +
                '        </div>' +
                '    </td>' +
                '    <td style="vertical-align: middle;">' +
                '        <div class="product-price" id="price-'+el.data("id")+'"  data-price="'+el.data("price")+'">'+el.data("price")+' FCFA</div>' +
                '    </td>' +
                '    <td style="vertical-align: middle;">' +
                '        <div class="product-price" id="subtotal-'+el.data("id")+'" data-subtotal="'+el.data("price")+'">'+el.data("price")+' FCFA</div>' +
                '    </td>' +
                '    <td style="vertical-align: middle;">' +
                '        <a class="btn btn-light p-1 delete" data-product="'+el.data("id")+'" onclick="removeElement('+el.data("id")+')" ><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 10.586l4.95-4.95 1.414 1.414-4.95 4.95 4.95 4.95-1.414 1.414-4.95-4.95-4.95 4.95-1.414-1.414 4.95-4.95-4.95-4.95L7.05 5.636z" fill="rgb(255, 62, 62)"/></svg></a>' +
                '    </td>' +
                '</tr>'
            ); */
            $('.order-list').prepend(
                '<tr id="product-'+el.data("id")+'">' +
                '    <td style="vertical-align: middle;">' +
                '        <div class="product-name" id="name-'+el.data("id")+'" data-name="'+el.text()+'">'+el.text()+'</div>' +
                '    </td>' +
                '    <td style="vertical-align: middle;">' +
                '        <div class="quantity-selector">' +
                '            <div class="quantity-input">' +
                '                <input type="text" class="form-control p-0 text-center border-0" value="1" id="qty-'+el.data("id")+'" data-total="'+el.data("qty")+'" data-qty="1" required oninput="updateQty('+el.data("id")+', '+this.value+')">' +
                '            </div>' +
                '        </div>' +
                '    </td>' +
                '    <td style="vertical-align: middle;">' +
                '        <div class="product-price" id="price-'+el.data("id")+'"  data-price="'+el.data("price")+'">'+el.data("price")+' FCFA</div>' +
                '    </td>' +
                '    <td style="vertical-align: middle;">' +
                '        <div class="product-price" id="subtotal-'+el.data("id")+'" data-subtotal="'+el.data("price")+'">'+el.data("price")+' FCFA</div>' +
                '    </td>' +
                '    <td style="vertical-align: middle;">' +
                '        <a class="btn btn-light p-1 delete" data-product="'+el.data("id")+'" onclick="removeElement('+el.data("id")+')" ><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 10.586l4.95-4.95 1.414 1.414-4.95 4.95 4.95 4.95-1.414 1.414-4.95-4.95-4.95 4.95-1.414-1.414 4.95-4.95-4.95-4.95L7.05 5.636z" fill="rgb(255, 62, 62)"/></svg></a>' +
                '    </td>' +
                '</tr>'
            );
            products.push(el.data('id'));
            calculate();
        }
    }

    function updateQty(el, one = 1){
        var  product = $("#qty-"+el);
        var nbr;
        if(one != 1 && one != -1) nbr = one;
        else  {
            nbr = parseInt(product.val()) + one;
        }
        if(product.data('total') >= nbr && nbr >= 1){
            product.data('qty', nbr);
            product.val(nbr);
        }
        calculate();
    }

    function cardOnClick(){
        return  $('.product-card').click(function () {
            element = $(this);
            if(element.data('qty') == 0){
                return alert('produit en rupture de stock!');
            }
            // console.log(element.data('qty'));
            addElement(element);
        });
    }


    function order() {
        var token = '{{@csrf_token()}}';
        var order = '';
        var site = $("#sites").val();
        var customer = $("#customers").val();
        var paying_method = $("input[type='radio']:checked").val();
        var status = $("#status").val();
        var sale_note = $("#sale_note").val();
        $.each(products, function (key, val) {
            id = val;
            qty = $("#qty-"+val).data('qty');
            price = $("#price-"+val).data('price');
            order += id+';'+qty+';'+price+'|';
        });

        $.ajax({
            url: '/admin/sales/{{$sale->id}}',
            method: 'post',
            data: {
                _token: token,
                order : order,
                site_id : site,
                customer_id: customer,
                status: status,
                paying_method: paying_method,
                sale_note: sale_note
            },
            success: function(data){
                location.reload();
            }

        });
    }


    function init(){
        var site = $("#sites").val();

        $.ajax({
            url: '/admin/sales/{{$sale->id}}/update/init',
            method: 'get',
            data: {
                site_id: site

            },
            success: function(data){
                $("#customers").html(data.customers);
                productInDB = [];
                productInDB = [
                    ...data.products
                ];
                products = [
                    ...data.saleProducts
                ]
            displayProduct();
            }

        });
    }

</script>
@endsection



@section('styles')
<link href={{asset('template/assets/dist/libs/selectize/dist/css/selectize.css')}} rel="stylesheet" />
<link href={{asset("template/assets/dist/css/easytrak-payments.min.css")}} rel="stylesheet" />
<style>
    body {
        display: none;
    }
    .order-box {
        width: 100%;
        padding: 30px;
        position: relative;
        height: 78%;
    }

    .order-products (
        height: 100%;
        position: relative;
    )

    .card-deck (
        overflow-y: auto;
        height: 88%;
        position: relative;
        overflow-x: hidden;
    )

    .order-box .order-details-box {
        display: -webkit-box;
        display: flex;
        -webkit-box-pack: justify;
        justify-content: space-between;
        margin-bottom: 20px;
        -webkit-box-align: center;
        align-items: center
    }

    .order-box .order-details-box .order-main-info span {
        display: block;
        color: #adb5bd;
        line-height: 1.3
    }

    .order-box .order-details-box .order-main-info strong {
        display: block;
        font-size: 1.5rem;
        line-height: 1.3
    }

    .order-box .order-details-box .order-sub-info span {
        display: block;
        color: #adb5bd;
        line-height: 1.3;
        font-size: .775rem
    }

    .order-box .order-details-box .order-sub-info strong {
        display: block;
        font-size: .9rem;
        line-height: 1.3
    }

    .order-box .order-controls {
        margin-bottom: 20px
    }

    .order-box .order-items-table {
        margin-bottom: 40px;
        padding-bottom: 20px;
    }

    .order-box .order-items-table .product-image {
        width: 30px;
        height: 30px;
        background-size: contain;
        background-repeat: no-repeat;
        background-position: center center
    }

    .order-box .order-items-table .product-name {
        font-weight: 500;
        font-size: 0.8rem;
        line-height: 1.3;
    }

    .order-box .order-items-table .product-price {
        font-weight: 500;
        font-size: 0.8rem;
    }

    .order-box .order-items-table .product-remove-btn {
        color: #E08989;
        font-size: 16px
    }

    .order-box .order-items-table .product-details {
        color: #adb5bd;
        font-size: .8rem
    }

    .order-box .order-items-table .product-details strong {
        color: #3E4B5B
    }

    .order-box .order-items-table .product-details .color-box {
        width: 10px;
        height: 10px;
        display: inline-block;
        margin-left: 5px;
        margin-right: 10px
    }

    .order-box .order-items-table .quantity-input .input-group-text {
        padding-left: 5px !important;
        padding-right: 5px !important
    }

    .order-box .order-items-table .quantity-input .form-control {
        -webkit-box-flex: 0;
        flex: 0 0 45px;
        text-align: center;
        font-weight: 500
    }

    .order-box .order-section-heading {
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        padding-bottom: 10px;
        margin-bottom: 15px
    }

    .order-summary-row {
        display: -webkit-box;
        display: flex;
        -webkit-box-pack: justify;
        justify-content: space-between;
        -webkit-box-align: center;
        align-items: center
    }

    .order-summary-row.as-total .order-summary-label {
        font-weight: 500;
        font-size: 1.25rem;
        color: #3E4B5B
    }

    .order-summary-row.as-total .order-summary-value {
        font-weight: 500;
        font-size: 1.5rem
    }

    .order-summary-row .order-summary-label {
        color: #adb5bd
    }

    .order-summary-row .order-summary-label strong {
        display: block;
        color: #3E4B5B;
        font-size: .8rem
    }

    .order-summary-row .order-summary-value {
        font-weight: 500
    }

    .order-summary-row+.order-summary-row {
        border-top: 1px solid rgba(0, 0, 0, 0.05);
        padding-top: 5px;
        margin-top: 5px
    }

    .order-summary-row+.order-summary-row.as-total {
        margin-top: 20px;
        padding-top: 10px;
        border-top: 3px solid #222
    }
    .product-card {
        transition: all 0.5s;
    }
    .product-card:hover {
        border: 1px solid rgba(0, 0, 0, 0.4);
        border-radius: 10px;
        transform: scale(1.07);
        -webkit-box-shadow: 0px 4px 30px -15px rgba(0,0,0,0.5);
        -moz-box-shadow: 0px 4px 30px -15px rgba(0,0,0,0.5);
        box-shadow: 0px 4px 30px -15px rgba(0,0,0,0.5);
        z-index: 10;
    }
    .product-card:focus {
        outline: none !important;
    }
    .product-card:active{
        transform: scale(1.025);
        -webkit-box-shadow: 0px 4px 30px -15px rgba(0,0,0,0.1);
        -moz-box-shadow: 0px 4px 30px -15px rgba(0,0,0,0.1);
        box-shadow: 0px 4px 30px -15px rgba(0,0,0,0.1);
    }
</style>
@endsection
