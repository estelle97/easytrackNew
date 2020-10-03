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