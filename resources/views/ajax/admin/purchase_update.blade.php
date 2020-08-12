<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div id="pos-app">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Mettre à jour la commande {{$purchase->code}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <line x1="18" y1="6" x2="6" y2="18" />
                        <line x1="6" y1="6" x2="18" y2="18" />
                    </svg>
                </button>
            </div>
            <div class="modal-body bg-white">
                <section class="pos-section">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card border-0 p-0">
                                <div class="card-body p-0">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row d-flex justify-content-between">
                                                <div class="col-md-5 mb-4">
                                                    <label class="form-label"> Site </label>
                                                    <select name="role" disabled id="sites" class="form-select">
                                                        <option> Sélectionnez un site </option>
                                                        @foreach (Auth::user()->companies->first()->sites as $site)
                                                            <option {{($purchase->site_id == $site->id) ? 'selected' : ''}} value={{$site->id}}> {{$site->name}} </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-md-6 mb-4">
                                                    <label class="form-label"> Fournisseur </label>
                                                    <select name="role" id="suppliers" class="form-select">
                                                        @foreach ($purchase->site->suppliers as $suppl)
                                                            <option value={{$suppl->id}}> {{$suppl->name}} </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-1 mb-4">
                                                    <a class="btn border-0 shadow-none p-1">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M18.537 19.567A9.961 9.961 0 0 1 12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10c0 2.136-.67 4.116-1.81 5.74L17 12h3a8 8 0 1 0-2.46 5.772l.997 1.795z"/></svg>
                                                    </a>
                                                </div>
                                                <div class="col-md-12 mb-4">
                                                    <select name="role" id="products" class="form-select" onchange="addProduct()">
                                                        <option disabled selected>Selectionnez un produit</option>
                                                        @foreach ($purchase->site->products as $prod)
                                                            <option class="product" data-id="{{$prod->id}}" data-qty="{{$prod->pivot->qty}}" data-price="{{$prod->pivot->cost}}" value="{{$prod->id}}"> {{$prod->name}} </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="table-responsive transaction-list">
                                                    <table class="table table-hover table-striped table-fixed">
                                                        <thead>
                                                            <tr>
                                                                <th class="col-sm-4 ">Nom</th>
                                                                <th class="col-sm-2 text-center">Prix</th>
                                                                <th class="col-sm-3 text-center">Quantité</th>
                                                                <th class="col-sm-3 text-center pl-3">Sous total</th>
                                                                <th class="col-sm-3 text-center"></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="order-list">
                                                            @foreach ($purchase->products as $prod)
                                                                <tr id="product-{{$prod->id}}">
                                                                    <td class="col-sm-4">
                                                                        <button type="button" class="btn btn-link">
                                                                            <strong id="name-{{$prod->id}}" data-name={{$prod->name}}  >{{$prod->name}}  </strong>
                                                                        </button>
                                                                    </td>
                                                                    <td class="text-center col-sm-2" id="price-{{$prod->id}}"  data-price={{$prod->pivot->cost}}>  {{$prod->pivot->cost}}  </td>
                                                                    <td class="col-sm-3">
                                                                        <div class="input-group">
                                                                            <span class="input-group-btn mr-1">
                                                                                <a class="btn btn-light p-1" id="minus-{{$prod->id}}" onclick="updateQty({{$prod->id}}, -1)">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="15" height="15"><path fill="none" d="M0 0h24v24H0z"/><path d="M5 11h14v2H5z" fill="rgba(0,0,0,1)"/></svg>
                                                                                </a>
                                                                            </span>
                                                                        <input type="text" class="quantity-input form-control p-0 text-center border-0" value={{$prod->pivot->qty}} id="qty-{{$prod->id}}" data-total={{$prod->pivot->qty}} data-qty="{{$prod->pivot->qty}}"  oninput="updateQty({{$prod->id}}, this.value)">
                                                                            <span class="input-group-btn ml-1">
                                                                                <a class="btn btn-light p-1" id="plus-{{$prod->id}}" onclick="updateQty({{$prod->id}})">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="15" height="15"><path fill="none" d="M0 0h24v24H0z"/><path d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z" fill="rgba(0,0,0,1)"/></svg>
                                                                                </a>
                                                                            </span>
                                                                        </div>
                                                                    </td>
                                                                    <td class="text-center" id="subtotal-{{$prod->id}}" data-subtotal={{$prod->pivot->cost}}> {{$prod->pivot->cost * $prod->pivot->qty}} </td>
                                                                    <td class="col-sm-2">
                                                                        <a class="btn btn-danger p-1 delete" data-product="{{$prod->id}}" onclick="removeElement({{$prod->id}})" ><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 10.586l4.95-4.95 1.414 1.414-4.95 4.95 4.95 4.95-1.414 1.414-4.95-4.95-4.95 4.95-1.414-1.414 4.95-4.95-4.95-4.95L7.05 5.636z" fill="rgba(255,255,255,1)"/></svg></a>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-sm-4 mb-2">
                                                        <span class="totals-title mr-3">Produits</span>
                                                        <span class="product-number">{{$purchase->products->count()}}</span>
                                                    </div>
                                                    <div class="col-sm-4 mb-2">
                                                        <span class="totals-title mr-3">Total</span>
                                                        <span class="md total"> {{$purchase->total()}} </span>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <span class="totals-title mr-3">Transport</span>
                                                        <span >0.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="payment-amount text-right">
                                    <h4>Grand Total <span class="grand-total" class="h2 ml-2"> {{$purchase->total()}} </span></h4>
                                </div>

                                    <div class="form-group row">
                                        <div class="col-md-12 mb-4">
                                            <label class="form-label">Moyen de paiement</label>
                                            <div
                                                class="form-selectgroup form-selectgroup-boxes d-flex flex-row">
                                                <label class="form-selectgroup-item flex-fill">
                                                    <input type="radio" {{($purchase->paying_method == 'cash') ? 'checked' : ''}} class="paying_method" name="paying_method" value="cash"
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
                                                    <input type="radio" {{($purchase->paying_method == 'om') ? 'checked' : ''}} class="paying_method" name="paying_method" value="om"
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
                                                    <input type="radio" {{($purchase->paying_method == 'momo') ? 'checked' : ''}} class="paying_method" name="paying_method" value="momo"
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

                                <div class="form-group">
                                    <div class="col-md-12 mb-4">
                                        <label class="form-label"> Etat </label>
                                        <select name="role" id="status" class="form-select">
                                            <option {{($purchase->status == 0) ? 'selected' : ''}} value="0">Non livré</option>
                                            <option {{($purchase->status == 1) ? 'selected' : ''}} value="1">   livré   </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-2 mb-0">
                                        <label class="form-label"> Notes </label>
                                        <textarea rows="5" class="form-control" id="purchase_text" placeholder="Description">{{$purchase->purchase_text}}</textarea>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" style="width: 100%;" onclick='order_update({{$purchase->id}})'>
                    Enregistrer
                </button>
            </div>
        </div>
    </div>
</div>