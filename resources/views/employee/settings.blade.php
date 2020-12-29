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
                <a href={{route('easytrack.profile')}} class="d-flex align-items-center text-white mr-5">
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
                    Suupport
                </a>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="card col-lg-3"
        style="height: 330px;">
        @include("partials.employee.settingsSidebar")
    </div>
    <div class="view card card-max-size col-lg-5 ml-4 p-4">
        <div class="row">
            <div class="ml-3">
                <h3 class="text-gray">Email</h3>
                <h2 class="button-click-action"> {{Auth::user()->companies->first()->email}}</h2>
            </div>
            <div class="ml-3">
                <h3 class="text-gray">Ville</h3>
                <h2 class="mb-4 button-click-action"> {{Auth::user()->companies->first()->town}}</h2>
            </div>
            <div class="ml-3">
                <h3 class="text-gray">Quartier</h3>
                <h2 class="mb-4 button-click-action"> {{Auth::user()->companies->first()->street}} </h2>
            </div>
            <div class="ml-3">
                <h3 class="text-gray">Téléphone N°1</h3>
                <h2 class="mb-4 button-click-action"> {{Auth::user()->companies->first()->phone1}} </h2>
            </div>
            <div class="ml-3">
                <h3 class="text-gray">Téléphone N°2</h3>
                <h2 class="mb-4 button-click-action"> {{Auth::user()->companies->first()->phone2}}</h2>
            </div>
        </div>
    </div>
</div>

@endsection


@section('scripts')

    <script>

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
@endsection
