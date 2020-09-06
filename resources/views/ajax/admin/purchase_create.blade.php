<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div id="pos-app">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Passer une commande</h5>
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
                                                    <div class="col-md-6 mb-4">
                                                        <label class="form-label"> Site </label>
                                                        <select name="role" id="sites" class="form-select" onchange="changeSite()">
                                                            <option selected> Sélectionnez un site </option>
                                                            @foreach (Auth::user()->companies->first()->sites as $site)
                                                                <option value={{$site->id}}> {{$site->name}} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="col-md-6 mb-4">
                                                        <label class="form-label"> Fournisseur </label>
                                                        <select name="role" id="suppliers" class="form-select">

                                                        </select>
                                                    </div>
                                                    <div class="col-md-12 mb-4">
                                                        <select name="role" id="products" class="form-select" onchange="addProduct()">
                                                            <option disabled selected>Selectionnez un produit</option>
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

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-sm-4 mb-2">
                                                            <span class="totals-title mr-3">Produits</span>
                                                            <span class="product-number">0</span>
                                                        </div>
                                                        <div class="col-sm-4 mb-2">
                                                            <span class="totals-title mr-3">Total</span>
                                                            <span class="md total">0</span>
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
                                        <h4>Grand Total <span class="grand-total" class="h2 ml-2">0</span></h4>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-12 mb-4">
                                            <label class="form-label">Moyen de paiement</label>
                                            <div
                                                class="form-selectgroup form-selectgroup-boxes d-flex flex-row">
                                                <label class="form-selectgroup-item flex-fill">
                                                    <input type="radio" name="paying_method" value="cash"
                                                        class="paying_method form-selectgroup-input" checked>
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
                                                    <input type="radio" name="paying_method" value="om"
                                                        class="paying_method form-selectgroup-input">
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
                                                    <input type="radio" name="paying_method" value="momo"
                                                        class="paying_method form-selectgroup-input">
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
                                                <option value="0">Non livrée</option>
                                                <option value="1"> livrée </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="mb-2 mb-0">
                                            <label class="form-label"> Notes </label>
                                            <textarea rows="5" class="form-control" id="purchase_text" placeholder="Description">  </textarea>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" style="width: 100%;" onclick="order_create()">
                        Enregistrer
                    </button>
                </div>
            </div>
        </div>
    </div>
