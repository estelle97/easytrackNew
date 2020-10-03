@extends('layouts.base')

@section('content')
     {{-- Page Header --}}
    <div class="page-header text-white">
        <div class="row align-items-center">
            <div class="col-auto">
                <h2 class="page-title">
                    Liste des utilisateurs
                </h2>
            </div>
        </div>
    </div>
    {{-- end Page Header --}}


    {{-- Content Body--}}
    <div class="row row-deck row-cards">
        <div class="card">
            <div class="table-responsive">
                <table class="table card-table table-vcenter text-nowrap datatable">
                    <thead>
                        <tr>
                            <th>photo</th>
                            <th>Companie</th>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Tel</th>
                            <th>Adresse</th>
                            <th>Rôle</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="users">
                        @foreach (App\User::all()->where('is_admin','<',3) as $user)
                            <tr>
                                <td>
                                    @if ($user->photo)
                                        <span class="avatar avatar-md"  style="background-image: url('{{asset($user->photo)}}')"> </span>
                                    @else
                                        <span class="avatar avatar-md"  style="background-image: url('https://ui-avatars.com/api/?background=E0F1FF&color=267FC9&name={{$user->name}}')"> </span>
                                    @endif
                                </td>
                                <td> 
                                    @if ($user->is_admin == 1)
                                        {{$user->employee->site->company->name}}
                                    @else
                                        {{$user->companies->first()->name ?? ''}}
                                    @endif
                                </td>
                                <td>
                                    {{$user->name}}
                                </td>
                                <td>
                                    {{$user->email}}
                                </td>
                                <td>
                                    {{$user->phone}}
                                </td>
                                <td>
                                    {{$user->adress}}
                                </td>
                                <td>
                                    {{$user->role->name}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- end Content Body--}}

@endsection

@section('scripts')

@endsection
