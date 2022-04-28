<div
    id="insert-event-modal"
    x-data="{open: false}"
    x-show="open"
    x-on:open-insert-event-modal.window="open = true"
    x-on:close-insert-event-modal.window="open = false">
    <div
        x-on:click="open = false"
        class="modal-background">
    </div>

    <div
        class="modal insert-event-modal"
        x-show="open"
        x-transition.duration.400ms>
        <h1>Enregistrer un évènement</h1>
        <div class="modal-content">

            <form wire:submit.prevent='submit(Object.fromEntries(new FormData($event.target)))' method="POST">

                <div class="modal-full-container">
                    <label for="date">Date</label>
                    <input type="date" name="date" id="date" placeholder="01/01/2022" />
                </div>

                <div class="modal-half-container left">
                    <label for="begin_hour">Heure de début</label>
                    <input type="time" min="00:00" max="23:59" name="begin_hour" id="begin_hour" placeholder="07:00" />
                </div>

                <div class="modal-half-container right">
                    <label for="end_hour">Heure de début</label>
                    <input type="time" min="00:00" max="23:59" name="end_hour" id="end_hour" placeholder="18:00" />
                </div>

                <div class="modal-full-container">
                    <label for="name">Nom</label>
                    <input type="text" name="name" id="name" placeholder="Travailler durement" />
                </div>

                <div class="modal-full-container">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" placeholder="Parce que travailler c'est bien..."></textarea>
                </div>

                <div class="modal-full-container row">
                    <input type="checkbox" name="every_day" id="every_day" />
                    <label for="every_day" class="inline-label">Appliquer tous les jours</label>
                </div>

                <div class="modal-full-container row">
                    <input type="checkbox" name="every_week" id="every_week" />
                    <label for="every_week">Appliquer toutes les semaines</label>
                </div>

                <div class="modal-full-container row">
                    <input type="checkbox" name="every_two_weeks" id="every_two_weeks" />
                    <label for="every_two_weeks">Appliquer toutes les deux semaines</label>
                </div>

                <div class="modal-full-container">
                    <input type="submit" value="Enregistrer" />
                </div>

            </form>

        </div>
    </div>

</div>
