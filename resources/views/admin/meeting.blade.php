@extends('layouts.base')

@section('content')
<!-- Page title -->
<div class="page-header text-white">
    <div class="row align-items-center">
        <div class="col-auto d-flex align-items-center">
            <h2 class="page-title" style="opacity: 0.5">
                <a class="agenda-segment" href="{{route('admin.teams')}}">Agenda</a>
            </h2>
            <h2 class="page-title ml-3">
                <a class="agenda-segment" href="{{route('admin.meeting')}}">Reunion</a>
            </h2>
        </div>
        <!-- Page title actions -->
        <div class="col-auto ml-auto d-print-none">
            <div class="d-flex align-items-center">
                <a href="#" class="text-white mb-0 mr-2" data-toggle="modal" data-target="#modal-create-customer">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="28" height="28" class="mr-2"><path fill="none" d="M0 0h24v24H0z"/><path d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z" fill="rgba(255,255,255,1)"/></svg>
                    <span class="h2 align-middle">Ajouter</span>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="row row-deck row-cards">
    <div class="col-lg-12">
        <div class="card p-4" style="height: 700px; max-height: 700px; overflow-x: hidden;">


        </div>
    </div>
</div>
@endsection
