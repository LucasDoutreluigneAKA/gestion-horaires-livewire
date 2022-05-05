<div
    x-data="{open: false}"
    x-show="open"
    x-on:open-event-registration-modal.window="open = true"
    x-on:close-event-registration-modal.window="open = false"
    x-on:close-all.window="open = false"
    id="event-registration-modal"
    class="modal "
    x-show="open">
    @if ($serie_edition_enabled)
        <h1>Enregistrer une série</h1>
    @else
        <h1>Enregistrer un évènement</h1>
    @endif

    <div class="modal-content">

        <form
            wire:submit.prevent="submit"
            method="POST"
            x-on:click.stop>

            <input type="hidden" wire:model.defer="event_id" />

            <div class="modal-full-container">
                <label for="name">Nom</label>
                <input wire:model.defer='name' type="text" name="name" id="name" placeholder="Travailler durement" />
                <span class="form-error">@error('name') {{ $message }} @enderror</span>
            </div>

            <div class="modal-full-container">
                <label for="description">Description</label>
                <textarea wire:model.defer='description' name="description" id="description" placeholder="Parce que travailler c'est bien..."></textarea>
                <span class="form-error">@error('description') {{ $message }} @enderror</span>
            </div>

            @if (!$serie_edition_enabled)
                <div class="modal-full-container">
                    <label for="date">Date</label>
                    <input wire:model.defer='date' type="date" name="date" id="date" placeholder="01/01/2022" />
                    <span class="form-error">@error('date') {{ $message }} @enderror</span>
                </div>
            @endif

            <div class="modal-half-container left">
                <label for="begin_hour">Heure de début</label>
                <input wire:model.defer='begin_hour' type="time" min="00:00" max="23:59" name="begin_hour" id="begin_hour" placeholder="07:00" />
                <span class="form-error">@error('begin_hour') {{ $message }} @enderror</span>
            </div>

            <div class="modal-half-container right">
                <label for="end_hour">Heure de fin</label>
                <input wire:model.defer='end_hour' type="time" min="00:00" max="23:59" name="end_hour" id="end_hour" placeholder="18:00" />
                <span class="form-error">@error('end_hour') {{ $message }} @enderror</span>
            </div>

            @if ($change_recursivity_enabled)

                <div class="modal-half-container left">
                    <label for="recursivity">Récursivité</label>
                    <select wire:model='recursivity' name="recursivity" id="recursivity">
                        <option value="one-time">Une seule fois</option>
                        <option value="every-day">Tous les jours</option>
                        <option value="every-week">Toutes les semaines au même jour</option>
                        <option value="every-two-weeks">Toutes les deux semaines au même jour</option>
                    </select>
                    <span class="form-error"></span>
                </div>

                @if ($recursivity != "one-time")

                    <div class="modal-half-container right">
                        <label for="period">Période</label>
                        <select wire:model='period' name="period" id="period">
                            <option value="1">Une semaine</option>
                            <option value="2">Deux semaines</option>
                            <option value="4">Un mois</option>
                            <option value="13">Trois mois</option>
                        </select>
                        <span class="form-error"></span>
                    </div>

                @endif

            @endif

            <div class="modal-full-container">
                <input type="submit" value="Enregistrer" />
            </div>

        </form>

    </div>
</div>
