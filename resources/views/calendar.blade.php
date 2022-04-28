@extends('layouts.app')

@section('head')
    @parent

    <link rel="stylesheet" href="/css/calendar/calendar_date_picker.css" />
    <link rel="stylesheet" href="/css/calendar/calendar_week_printer.css">
    <link rel="stylesheet" href="/css/calendar/calendar_menu.css">

    <link rel="stylesheet" href="/css/modals/modal.css">
    <link rel="stylesheet" href="/css/modals/insert-event-modal.css">

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

    <livewire:modals.insert-event-modal />
@endsection
