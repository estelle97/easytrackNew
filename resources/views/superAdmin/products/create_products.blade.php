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
                    <a class="text-white mr-3 mb-0" onclick="addElement()">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="28" height="28" class="mr-2"><path fill="none" d="M0 0h24v24H0z"/><path d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z" fill="rgba(255,255,255,1)"/></svg>
                        <span class="h2 align-middle">Ajouter un produit</span>
                    </a>
                    <a class="text-white mb-0 ml-3" onclick="addProducts()">
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
                    <div class="order-items-table">
                        <div class="table-responsive">
                            <table class="table table-lightborder">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Nom</th>
                                        <th>Marque</th>
                                        <th>Catégorie</th>
                                        <th>Unité</th>
                                        <th>Description</th>
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

<script src={{asset("template/assets/dist/libs/selectize/dist/js/standalone/selectize.min.js")}} ></script>

<script>
    // AUTOCOMPLETE
    var categoriesSelect = $("#categories").selectize({});
    var suppliersSelect = $("#suppliers").selectize({});
    var sitesSelect = $("#sites").selectize({});

    // GLOBAL VARIABLES


    let productCardList = [];
    let productCardOnClick = null;
    let products = [];

    // POS FUNCTIONS

    function removeElement(el) {
        $("#product"+el).remove().fadeOut(1000);

        products = jQuery.grep(products, function(value) {
            return value != el;
        });
    }

    function addElement() {
        const productId = products.length + 1;
        var categories = '{!! $categories !!}';
        var units = '{!! $units !!}';
        $('.order-list').append(
            '<tr id="product'+productId+'">' +
            '    <td>' +
            '    <input type="file" name="img[]" id="file'+productId+'" accept="image/*" hidden>' +
            '        <a id="profile'+productId+'" class="avatar avatar-upload rounded thumbnail" onclick="preview('+productId+')">' +
            '            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" /> <line x1="12" y1="5" x2="12" y2="19" /> <line x1="5" y1="12" x2="19" y2="12" /></svg> <span class="avatar-upload-text">Photo </span>' +
            '        </a>' +
            '    </td>' +
            '    <td style="vertical-align: middle;">' +
            '        <div class="product-input">' +
            '            <div class="product-input">' +
            '                <input type="text" class="form-control p-0 text-left border-0" placeholder="Nom du produit" id="name'+productId+'" data-name="Nom du produit">' +
            '            </div>' +
            '        </div>' +
            '    </td>' +
            '    <td style="vertical-align: middle;">' +
            '        <div class="product-input">' +
            '            <div class="product-input">' +
            '                <input type="text" class="form-control p-0 text-left border-0" placeholder="Marque du produit" min="0" id="brand'+productId+'" data-brand="1">' +
            '            </div>' +
            '        </div>' +
            '    </td>' +
            '    <td style="vertical-align: middle;">' +
            '        <div class="product-input">' +
            '            <div class="product-input">' +
            '                <select value="1" id="category'+productId+'" data-category="1" class="form-select">' +
            '                    '+categories+
            '                </select>' +
            '            </div>' +
            '        </div>' +
            '    </td>' +
            '    <td style="vertical-align: middle;">' +
            '        <div class="product-input">' +
            '            <div class="product-input">' +
            '                <select value="1" id="unit'+productId+'" data-unit="1" class="form-select">' +
            '                    '+units+
            '                </select>' +
            '            </div>' +
            '        </div>' +
            '    </td>' +
            '    <td style="vertical-align: middle;">' +
            '        <div class="product-input">' +
            '            <div class="product-input">' +
            '                <input type="text" class="form-control p-0 text-left border-0" placeholder="Description du produit" id="description'+productId+'" data-description="1">' +
            '            </div>' +
            '        </div>' +
            '    </td>' +
            '    <td style="vertical-align: middle;">' +
            '        <a class="btn btn-light p-1 delete" data-product="'+productId+'" onclick="removeElement('+productId+')" ><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 10.586l4.95-4.95 1.414 1.414-4.95 4.95 4.95 4.95-1.414 1.414-4.95-4.95-4.95 4.95-1.414-1.414 4.95-4.95-4.95-4.95L7.05 5.636z" fill="rgb(255, 62, 62)"/></svg></a>' +
            '    </td>' +
            '</tr>'
        );
        products.push(productId);
    }

    function cardOnCick() {
        return $('.product-card').click(function () {
            element = $(this);
            addElement(element);
        });
    }

    function addProducts() {
        var form_data = new FormData(); // Creating object of FormData class
        var productsList = '';
        $.each(products, function (key, val) {
            name = $("#name"+val).val();
            brand = $("#brand"+val).val();
            category = $("#category"+val).val();
            description = $("#description"+val).val();
            unit = $("#unit"+val).val();
            photo = $("#file"+val).prop('files')[0];
            productsList += name+';'+brand+';'+category+';'+unit+';'+description+'|';
            form_data.append("photo"+key, photo);
        });


        form_data.append("products", productsList);
        form_data.append("_token", '{{csrf_token()}}');

        $.ajax({
            url: '/easytrack/products/store/many',
            cache: false,
            contentType: false,
            processData: false,
            method: 'post',
            data: form_data,
            success: function(data){
                window.location.replace("/easytrack/products");
            }
        });
    }

    function preview(id){
            $("#file"+id).click();

        $('#file'+id).change(function(e) {
            var fileName = e.target.files[0].name;

            var reader = new FileReader();
            reader.onload = function(e) {
                pic = "<img src='"+e.target.result+"' class='img img-responsive' width='100px' />";
                $("#profile"+id).html(pic);
            };
            reader.readAsDataURL(this.files[0]);
        });
    }

</script>

@endsection

@section('styles')

@endsection
