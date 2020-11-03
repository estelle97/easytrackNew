<div class="row">
    @for ($i = 1; $i <= 7; $i++)
        <div class="col-sm-12 col-md-6 col-lg-3">
            <div class="card agenda-card">
                <div class="card-body">
                    <div class="card-title">
                        <h6 class="h4 mb-3"> {{Carbon\Carbon::now()->startOfWeek()->addDays($i-1)->locale('fr_FR')->isoFormat('dddd')}} </h6>
                    </div>
                    <div class="avatar-list avatar-list-stacked mb-3">
                        {{App\Team::where('site_id', $site->id)->where('day', $i)->count()}} équipe(s)
                    </div>
                    <div class="card-meta d-flex justify-content-between">
                        <div class="d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="icon mr-2"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 23.728l-6.364-6.364a9 9 0 1 1 12.728 0L12 23.728zm4.95-7.778a7 7 0 1 0-9.9 0L12 20.9l4.95-4.95zM12 13a2 2 0 1 1 0-4 2 2 0 0 1 0 4z"/></svg>
                            <span> {{$site->name}} </span>
                        </div>
                        <span class="dropdown">
                            <div class="dropdown-toggle" data-boundary="viewport" data-toggle="dropdown">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 3c-.825 0-1.5.675-1.5 1.5S11.175 6 12 6s1.5-.675 1.5-1.5S12.825 3 12 3zm0 15c-.825 0-1.5.675-1.5 1.5S11.175 21 12 21s1.5-.675 1.5-1.5S12.825 18 12 18zm0-7.5c-.825 0-1.5.675-1.5 1.5s.675 1.5 1.5 1.5 1.5-.675 1.5-1.5-.675-1.5-1.5-1.5z"/></svg>
                            </div>
                            <div class="dropdown-menu dropdown-menu-right mt-3">
                                <span class="dropdown-header">Menu</span>
                                <a href="#" class="dropdown-item" data-toggle="modal" data-target="#modal-show-agenda{{$site->id}}-{{$i}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="icon dropdown-item-icon"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 3c5.392 0 9.878 3.88 10.819 9-.94 5.12-5.427 9-10.819 9-5.392 0-9.878-3.88-10.819-9C2.121 6.88 6.608 3 12 3zm0 16a9.005 9.005 0 0 0 8.777-7 9.005 9.005 0 0 0-17.554 0A9.005 9.005 0 0 0 12 19zm0-2.5a4.5 4.5 0 1 1 0-9 4.5 4.5 0 0 1 0 9zm0-2a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/></svg>
                                    Ouvrir
                                </a>
                            </div>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    @endfor
</div>
