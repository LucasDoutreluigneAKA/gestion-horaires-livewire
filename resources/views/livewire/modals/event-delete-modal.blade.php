<div
    x-data="{open: false}"
    x-show="open"
    x-on:open-event-delete-modal.window="open = true"
    x-on:close-event-delete-modal.window="open = false"
    x-on:close-all.window="open = false"
    id="event-delete-modal"
    class="modal "
    x-show="open">
    <h1>Supprimer un évènement</h1>
    <div class="modal-content">

        <form
            wire:submit.prevent='submit'
            method="POST"
            x-on:click.stop>

            <div class="modal-full-container">
                <span class="label">Êtes-vous sûr de vouloir supprimer cet évènement ?</span>
            </div>

            <div class="modal-half-container left">
                <input
                type="submit"
                value="Supprimer" />
            </div>

            <div class="modal-half-container right">
                <button
                wire:click="$emit('unlock-page')">Annuler</button>
            </div>

        </form>

    </div>
</div>
