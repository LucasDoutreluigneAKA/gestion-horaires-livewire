@extends('layouts.app')

@section('head')
    @parent

    <link rel="stylesheet" href="/css/calendar/calendar_date_picker.css" />
    <link rel="stylesheet" href="/css/calendar/calendar_week_printer.css">
    <link rel="stylesheet" href="/css/calendar/calendar_menu.css">

    <link rel="stylesheet" href="/css/modals/modal.css">
    <link rel="stylesheet" href="/css/modals/insert-event-modal.css">
    <link rel="stylesheet" href="/css/modals/event-registration-modal.css">
    <link rel="stylesheet" href="/css/modals/event-view-modal.css">
    <link rel="stylesheet" href="/css/modals/event-edit-modal.css">
    <link rel="stylesheet" href="/css/modals/event-delete-modal.css">

    <script
        src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer>
    </script>

@endsection

@section('title')
    Titre défini
@endsection

@section('content')
    <livewire:calendar-date-printer />
    <livewire:calendar-date-picker />
    <livewire:calendar-menu />

    <div
        x-data="{lock_page: false}"
        x-on:lock-page.window="lock_page = true"
        x-on:unlock-page.window="lock_page = false; $dispatch('close-all')"
        x-on:click="lock_page = false; $dispatch('close-all')"
        x-show="lock_page"
        id="page-locker">
    </div>

    <livewire:modals.event-registration-modal />
    <livewire:modals.event-view-modal />
    <livewire:modals.event-delete-modal />

@endsection
