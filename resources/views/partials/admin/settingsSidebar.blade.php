<div class="settings-sidebar px-2 py-3">
    <div class="d-flex flex-row align-items-center mb-3">
        <div>
            <img class="img-thumbnail rounded-circle" style="max-width: 60px;"
                src={{(Auth::user()->photo != null) ? Auth::user()->photo : "https://picsum.photos/id/700/400"}}
                alt="Profile picture">
        </div>
        <div class="ml-3">
            <h3 class="mb-1 button-click-action" contenteditable="true">Le Relais de la Citée</h3>
            <small class="d-block text-muted" contenteditable="true">En ligne</small>
        </div>
    </div>
    <ul>
        <li>
            <a href="#" class="active px-3 py-2 rounded-lg">
                <i class="ri-building-2-line ri-xl mr-3"></i>
                <span class="libelle align-middle">Compagnie</span>
            </a>
        </li>
        <li>
            <a href="#" class="px-3 py-2 rounded-lg">
                <i class="ri-notification-4-line ri-xl mr-3"></i>
                <div class="libelle">Notifications</div>
            </a>
        </li>
        <li>
            <a href="#" class="px-3 py-2 rounded-lg">
                <i class="ri-history-line ri-xl mr-3"></i>
                <div class="libelle">Activités</div>
            </a>
        </li>
        <li>
            <a href="#" class="px-3 py-2 rounded-lg">
                <i class="ri-information-line ri-xl mr-3"></i>
                <div class="libelle">A Propos</div>
            </a>
        </li>
    </ul>
</div>
