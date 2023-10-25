   <x-filament::modal id="biodata" slide-over sticky-header sticky-footer width='5xl' :close-button="false" :close-by-clicking-away="false" icon="heroicon-o-information-circle">
        <x-slot name="heading">
             Biodata
        </x-slot>
        <x-slot name="description">
             Thank you for choosing Kodibooks. Please provide information about you and your organization.
        </x-slot>
        <div>
             <form wire:submit.prevent="create">
                  {{ $this->form }}
             </form>
        </div>
        <x-slot name="footer">
             Kodibooks
        </x-slot>
   </x-filament::modal>
