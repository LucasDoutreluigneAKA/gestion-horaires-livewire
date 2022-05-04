<div
    x-data="{open: false}"
    x-show="open"
    x-on:open-event-registration-modal.window="open = true"
    x-on:close-event-registration-modal.window="open = false"
    x-on:close-all.window="open = false"
    id="event-registration-modal"
    class="modal "
    x-show="open">
    <h1>Enregistrer un évènement</h1>
    <div class="modal-content">

        <form
            wire:submit.prevent="submit"
            method="POST"
            x-on:click.stop>

            <input type="hidden" wire:model.lazy="event_id" />

            <div class="modal-full-container">
                <label for="name">Nom</label>
                <input wire:model.lazy='name' type="text" name="name" id="name" placeholder="Travailler durement" />
                <span class="form-error">@error('name') {{ $message }} @enderror</span>
            </div>

            <div class="modal-full-container">
                <label for="description">Description</label>
                <textarea wire:model.lazy='description' name="description" id="description" placeholder="Parce que travailler c'est bien..."></textarea>
                <span class="form-error">@error('description') {{ $message }} @enderror</span>
            </div>

            <div class="modal-full-container">
                <label for="date">Date</label>
                <input wire:model.lazy='date' type="date" name="date" id="date" placeholder="01/01/2022" />
                <span class="form-error">@error('date') {{ $message }} @enderror</span>
            </div>

            <div class="modal-half-container left">
                <label for="begin_hour">Heure de début</label>
                <input wire:model.lazy='begin_hour' type="time" min="00:00" max="23:59" name="begin_hour" id="begin_hour" placeholder="07:00" />
                <span class="form-error">@error('begin_hour') {{ $message }} @enderror</span>
            </div>

            <div class="modal-half-container right">
                <label for="end_hour">Heure de début</label>
                <input wire:model.lazy='end_hour' type="time" min="00:00" max="23:59" name="end_hour" id="end_hour" placeholder="18:00" />
                <span class="form-error">@error('end_hour') {{ $message }} @enderror</span>
            </div>

            <div class="modal-full-container row">
                <input wire:model.lazy='every_day' type="checkbox" name="every_day" id="every_day" />
                <label for="every_day" class="inline-label">Appliquer tous les jours</label>
                <span class="form-error">@error('every_day') {{ $message }} @enderror</span>
            </div>

            <div class="modal-full-container row">
                <input wire:model.lazy='every_week' type="checkbox" name="every_week" id="every_week" />
                <label for="every_week">Appliquer toutes les semaines</label>
                <span class="form-error">@error('every_week') {{ $message }} @enderror</span>
            </div>

            <div class="modal-full-container row">
                <input wire:model.lazy='every_two_weeks' type="checkbox" name="every_two_weeks" id="every_two_weeks" />
                <label for="every_two_weeks">Appliquer toutes les deux semaines</label>
                <span class="form-error">@error('every_two_weeks') {{ $message }} @enderror</span>
            </div>

            <div class="modal-full-container">
                <input type="submit" value="Enregistrer" />
            </div>

        </form>

    </div>
</div>
