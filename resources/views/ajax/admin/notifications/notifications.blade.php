@foreach (Auth::user()->notifications->where('is_active','1')->take(5) as $notif)
    <div class="card-body">
        <div class="notification-card d-flex align-items-center">
            <span class="bg-yellow-lt text-white stamp mr-3"><svg xmlns="http://www.w3.org/2000/svg"
                    class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z"></path>
                    <path d="M4 21v-13a3 3 0 0 1 3 -3h10a3 3 0 0 1 3 3v6a3 3 0 0 1 -3 3h-9l-4 4"></path>
                    <line x1="8" y1="9" x2="16" y2="9"></line>
                    <line x1="8" y1="13" x2="14" y2="13"></line>
                </svg>
            </span>
            <div class="mr-3 lh-sm">
                <a href={{route('admin.'.$notif->action)}}>
                    <div class="strong">
                        {{$notif->text}}
                    </div>
                </a>
                <div class="text-gray"> {{$notif->created_at->diffForHumans()}} </div>
            </div>
        </div>
    </div>
@endforeach
