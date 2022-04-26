<section class="calendar-left-menu">
    <div class="menu-section-content-one">
        <span>Horaires effectués</span>
        <a href="#">Accéder</a>
    </div>

    <div class="menu-section-content-two">
        <div>
            <span>Affichage</span>
            <a href="#" class="{{ $viewWeekMode == "week" ? 'week-mode-button-enabled' : '' }}" wire:click="changeViewMode('week')">Sem.</a>
            <a href="#" class="{{ $viewWeekMode == "monday" ? 'week-mode-button-enabled' : ''}}" wire:click="changeViewMode('monday')">Lun.</a>
            <a href="#" class="{{ $viewWeekMode == "tuesday" ? 'week-mode-button-enabled no-margin' : 'no-margin'}}" wire:click="changeViewMode('tuesday')">Mar.</a>
            <a href="#" class="{{ $viewWeekMode == "wednesday" ? 'week-mode-button-enabled' : "" }}" wire:click="changeViewMode('wednesday')">Mer.</a>
            <a href="#" class="{{ $viewWeekMode == "thursday" ? 'week-mode-button-enabled' : "" }}" wire:click="changeViewMode('thursday')">Jeu.</a>
            <a href="#" class="{{ $viewWeekMode == "friday" ? 'week-mode-button-enabled no-margin' : 'no-margin' }}" wire:click="changeViewMode('friday')">Ven.</a>
        </div>
    </div>

    <div class="menu-section-content-three">
        <div>
            <span>Sélection de semaine</span>
        </div>
    </div>
</section>
