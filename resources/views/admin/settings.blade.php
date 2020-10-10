@extends('layouts.base')

@section('content')

<!-- Page title -->
<div class="page-header text-white">
    <div class="row align-items-center">
        <div class="col-auto">
            <h2 class="page-title">
                <a href={{str_replace(url('/'), '', url()->previous())}} class="app-back-button mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                        <path fill="none" d="M0 0h24v24H0z" />
                        <path d="M7.828 11H20v2H7.828l5.364 5.364-1.414 1.414L4 12l7.778-7.778 1.414 1.414z"
                            fill="rgba(255,255,255,1)" /></svg>
                </a>
                Mes paramètres
            </h2>
        </div>
        <!-- Page title actions -->
        <div class="col-auto ml-auto d-print-none">
            <div class="d-flex align-items-center">
                <a href={{route('admin.profile')}} class="d-flex align-items-center text-white mr-5">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="mr-2">
                        <path fill="none" d="M0 0h24v24H0z" />
                        <path
                            d="M20 22h-2v-2a3 3 0 0 0-3-3H9a3 3 0 0 0-3 3v2H4v-2a5 5 0 0 1 5-5h6a5 5 0 0 1 5 5v2zm-8-9a6 6 0 1 1 0-12 6 6 0 0 1 0 12zm0-2a4 4 0 1 0 0-8 4 4 0 0 0 0 8z"
                            fill="rgba(255,255,255,1)" /></svg>
                    Mon compte
                </a>

                <a href="#" class="d-flex align-items-center text-white mr-5">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="mr-2">
                        <path fill="none" d="M0 0h24v24H0z" />
                        <path
                            d="M19.938 8H21a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2h-1.062A8.001 8.001 0 0 1 12 23v-2a6 6 0 0 0 6-6V9A6 6 0 1 0 6 9v7H3a2 2 0 0 1-2-2v-4a2 2 0 0 1 2-2h1.062a8.001 8.001 0 0 1 15.876 0zM3 10v4h1v-4H3zm17 0v4h1v-4h-1zM7.76 15.785l1.06-1.696A5.972 5.972 0 0 0 12 15a5.972 5.972 0 0 0 3.18-.911l1.06 1.696A7.963 7.963 0 0 1 12 17a7.963 7.963 0 0 1-4.24-1.215z"
                            fill="rgba(255,255,255,1)" /></svg>
                    Support
                </a>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="card col-lg-3"
        style="height: 430px;">
        @include("partials.admin.settingsSidebar")
    </div>
    <div class="view card col-lg-5 ml-4 p-3" style="max-height: 700px; overflow-y: auto">
        <div class="row">
            <div class="ml-3">
                <h3 class="text-gray">Email</h3>
                <h2 class="button-click-action" contenteditable="true" onkeyup="if(event.keyCode!=13) updateCompany(this.textContent, 'email')"> {{Auth::user()->companies->first()->email}}</h2>
            </div>
            <div class="ml-3">
                <h3 class="text-gray">Ville</h3>
                <h2 class="mb-4 button-click-action" contenteditable="true" onkeyup="if(event.keyCode!=13) updateCompany(this.textContent, 'town')"> {{Auth::user()->companies->first()->town}}</h2>
            </div>
            <div class="ml-3">
                <h3 class="text-gray">Quartier</h3>
                <h2 class="mb-4 button-click-action" contenteditable="true" onkeyup="if(event.keyCode!=13) updateCompany(this.textContent, 'street')"> {{Auth::user()->companies->first()->street}} </h2>
            </div>
            <div class="ml-3">
                <h3 class="text-gray">Téléphone N°1</h3>
                <h2 class="mb-4 button-click-action" contenteditable="true" onkeyup="if(event.keyCode!=13) updateCompany(this.textContent, 'phone1')"> {{Auth::user()->companies->first()->phone1}} </h2>
            </div>
            <div class="ml-3">
                <h3 class="text-gray">Téléphone N°2</h3>
                <h2 class="mb-4 button-click-action" contenteditable="true" onkeyup="if(event.keyCode!=13) updateCompany(this.textContent, 'phone2')"> {{Auth::user()->companies->first()->phone2}}</h2>
            </div>
        </div>
    </div>
    <div class="card col-lg-3 ml-4 p-3" style="max-height: 500px; overflow-y: auto; overflow-x: none !important;">
        <div class="d-flex align-item-center justify-content-between mb-2">
            <span class="d-flex align-item-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                    <path fill="none" d="M0 0h24v24H0z" />
                    <path
                        d="M11 2l7.298 2.28a1 1 0 0 1 .702.955V7h2a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1l-3.22.001c-.387.51-.857.96-1.4 1.33L11 22l-5.38-3.668A6 6 0 0 1 3 13.374V5.235a1 1 0 0 1 .702-.954L11 2zm0 2.094L5 5.97v7.404a4 4 0 0 0 1.558 3.169l.189.136L11 19.58 14.782 17H10a1 1 0 0 1-1-1V8a1 1 0 0 1 1-1h7V5.97l-6-1.876zM11 12v3h9v-3h-9zm0-2h9V9h-9v1z"
                        fill="rgba(38,127,201,1)" /></svg>
                <h3 class="ml-2"> {{Auth::user()->companies->first()->types->last()->title}} </h3>
            </span>
            <a href="#" data-toggle="modal" data-target="#modal-unsubscribe-licence">Se désabonner</a>
        </div>
        <h1>{{Auth::user()->companies->first()->subscription()->remainingDays}} Jours</h1>
        <p class="mb-0 text-muted">
            <span class="text-nowrap text-gray"> {{ date('M d, Y', strtotime(Auth::user()->companies->first()->types->last()->pivot->created_at))}} / {{ date('M d, Y', strtotime(Auth::user()->companies->first()->types->last()->pivot->end_date))}} </span>
            <div class="progress progress-sm mt-3">
                <div class="progress-bar bg-blue" style="width: {{Auth::user()->companies->first()->subscription()->percentage}}%" role="progressbar" aria-valuenow="75"
                    aria-valuemin="0" aria-valuemax="100">
                    <span class="sr-only">{{Auth::user()->companies->first()->subscription()->percentage}}% d'utilisation</span>
                </div>
            </div>
        </p>
        <a href="#" class="btn btn-outline-primary btn-block mb-3" data-toggle="modal"
            data-target="#modal-update-licence">
            Payer une nouvelle licence
        </a>
        <h3 class="mb-1">Historique</h3>
        <table class="table card-table table-vcenter">
            <thead>
                <tr>
                    <th>Abonnement</th>
                    <th>Prix</th>
                    <th colspan="2">Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach (Auth::user()->companies->first()->types as $type)

                @endforeach
                <tr>
                    <td> {{$type->title}} </td>
                    <td> {{$type->price}} FCFA</td>
                    <td> {{date('M d, Y', strtotime($type->pivot->created_at))}} </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<div class="modal-section">
    <div class="modal modal-blur fade" id="modal-update-licence" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Payer une licence</h5>
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
                    <div class="mb-3">
                        <div class="input-icon">
                            <span class="input-icon-addon ml-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18">
                                    <path fill="none" d="M0 0h24v24H0z" />
                                    <path
                                        d="M14 9V4H5v16h6.056c.328.417.724.785 1.18 1.085l1.39.915H3.993A.993.993 0 0 1 3 21.008V2.992C3 2.455 3.449 2 4.002 2h10.995L21 8v1h-7zm-2 2h9v5.949c0 .99-.501 1.916-1.336 2.465L16.5 21.498l-3.164-2.084A2.953 2.953 0 0 1 12 16.95V11zm2 5.949c0 .316.162.614.436.795l2.064 1.36 2.064-1.36a.954.954 0 0 0 .436-.795V13h-5v3.949z" />
                                    </svg>
                            </span>
                            <select id="type-update" class="auth-input type-update form-control py-2 px-5">
                                <option selected> Choisisez un forfait</option>
                                @foreach(App\Type::all() as $t)
                                <option data-duration="{{$t->duration}}" id="type{{$t->id}}" value="{{$t->id}}">
                                    {{$t->title}} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="update-subscription" class="btn btn-primary"
                        style="width: 100%">Envoyer</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal modal-blur fade" id="modal-unsubscribe-package" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="modal-title">Désabonement</div>
                    <div>Si vous continuez, cette action sera irreversible.</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link link-secondary mr-auto"
                        data-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Oui, se désabonner</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@section('scripts')

    <script>

        function updateCompany(value, field){

            var form_data = new FormData();
            form_data.append(field, value);
            form_data.append('value', value),
            form_data.append("_token", '{{csrf_token()}}');
            $.ajax({
                url: '/admin/companies/update/'+field,
                method: 'post',
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                success: function(data){
                   console.log(data);
                }
            });
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
                updateCompany(this.files[0], 'logo');

            });
        });

        $(".settings").click(function(){
            $(".settings").removeClass('active');
            $(this).addClass('active');
            page = $(this).attr('id');

            $.ajax({
                url: '/admin/settings/view/'+page,
                method: 'get',
                success: function(data){
                    $(".view").fadeOut().html(data).fadeIn();
                }
            });
        })

    </script>

@endsection

@section('styles')
<link href={{asset("template/assets/dist/css/easytrak-payments.min.css")}} rel="stylesheet" />
<style>
</style>
@endsection
