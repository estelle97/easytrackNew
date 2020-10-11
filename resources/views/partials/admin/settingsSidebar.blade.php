<div class="settings-sidebar px-2 py-3">
    <div class="d-flex flex-row align-items-center mb-3">
        <div>
            <input type="file" name="img[]" class="file" accept="image/*" hidden>
            <a id="profile" class="avatar avatar-upload rounded thumbnail" style="max-width: 60px;">
                <img src="{{(Auth::user()->companies->first()->logo != null) ? asset(Auth::user()->companies->first()->logo) : "https://ui-avatars.com/api/?background=E4E4E4&color=9B9B9B&name=".Auth::user()->companies->first()->name}}" alt="Profile picture">
            </a>
        </div>
        <div class="ml-3">
            <h3 class="mb-1 button-click-action" contenteditable="true" onkeyup="if(event.keyCode!=13) updateCompany(this.textContent, 'name')"> {{Auth::user()->companies->first()->name}}</h3>
            <small class="d-block text-muted"> {{Auth::user()->companies->first()->activity->name}} </small>
        </div>
    </div>
    <ul>
        <li>
            <a id="companies" class="settings active px-3 py-2 rounded-lg button-click-action">
                <i class="ri-building-2-line ri-xl mr-3"></i>
                <span class="libelle align-middle">Compagnie</span>
            </a>
        </li>
        {{-- <li>
            <a id="notifications" class="settings px-3 py-2 rounded-lg button-click-action">
                <i class="ri-notification-4-line ri-xl mr-3"></i>
                <div class="libelle">Notifications</div>
            </a>
        </li> --}}
        <li>
            <a id="activities" class="settings px-3 py-2 rounded-lg button-click-action">
                <i class="ri-history-line ri-xl mr-3"></i>
                <div class="libelle">Activités</div>
            </a>
        </li>
        <li>
            <a id="subscription-history" class="settings px-3 py-2 rounded-lg button-click-action">
                <i class="ri-refund-2-line ri-xl mr-3"></i>
                <div class="libelle">Abonement</div>
            </a>
        </li>
        <li>
            <a id="budget" class="settings px-3 py-2 rounded-lg button-click-action">
                <i class="ri-wallet-line ri-xl mr-3"></i>
                <div class="libelle">Mon budget</div>
            </a>
        </li>
        <li>
            <a id="about" class="settings px-3 py-2 rounded-lg button-click-action">
                <i class="ri-information-line ri-xl mr-3"></i>
                <div class="libelle">A Propos</div>
            </a>
        </li>
    </ul>
</div>
