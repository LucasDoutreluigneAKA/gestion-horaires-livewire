<section class="calendar-printer" x-data>
    <div id="table">
        <div id="table-head">
            <div id="table-head-wrapper">
                @if ($viewWeekMode == 'week')
                    <div id="table-head-content">
                        <div class="table-head-element">{{ Date::parse($viewedWeek['monday']['date'])->format('D d-m-Y') }}</div>
                        <div class="table-head-element">{{ Date::parse($viewedWeek['tuesday']['date'])->format('D d-m-Y') }}</div>
                        <div class="table-head-element">{{ Date::parse($viewedWeek['wednesday']['date'])->format('D d-m-Y') }}</div>
                        <div class="table-head-element">{{ Date::parse($viewedWeek['thursday']['date'])->format('D d-m-Y') }}</div>
                        <div class="table-head-element">{{ Date::parse($viewedWeek['friday']['date'])->format('D d-m-Y') }}</div>
                    </div>

                @else
                    <div class="table-head-content">
                        <div class="table-head-element">{{ Date::parse($viewedWeek[$viewWeekMode]['date'])->format('D d-m-Y') }}</div>
                    </div>

                @endif
            </div>
        </div>
        <tbody>

            <div id="table-body">
                <div id="table-body-content-wrapper">
                    <div id="table-body-content">

                        <div id="table-body-hours">
                            @foreach (range(0, 23) as $i)
                                <div class="content-line">
                                    <div class="content-column no-shadow">
                                        {{ sprintf('%1$02d' . ':00', $i) }}
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div id="table-body-cases">
                            @foreach (range(0, 23) as $i)
                                <div class="content-line">

                                    @if ($viewWeekMode == "week")
                                        @foreach (range(0, 4) as $y)
                                            <div class="content-column">



                                            </div>
                                        @endforeach
                                    @else
                                        <div class="content-column">



                                        </div>
                                    @endif

                                </div>
                            @endforeach

                            <div id="table-body-events">

                                @if ($viewWeekMode == "week")
                                    @foreach ($viewedWeek as $index => $day)
                                        @foreach ($day['events'] as $event)
                                            <div class="event-item"
                                                style="top: {{ $this->convertHoursToPixels($event['event_begin_hour']) }}px;
                                                       left: {{ $this->convertDayNameToPercentage($index) }}%;
                                                       height: {{ $this->convertDurationToPixels($event['event_begin_hour'], $event['event_end_hour']) }}px;
                                                       z-index: {{ $z_index += 3 }}
                                                ">
                                                <span
                                                    class="event-item-hours">{{ $event['event_begin_hour'] }} à {{ $event['event_end_hour'] }}</span>

                                                <span class="event-item-name">{{ $event['event_name'] }}</span>
                                            </div>

                                        @endforeach
                                    @endforeach

                                @else

                                    @foreach ($viewedWeek[$viewWeekMode]['events'] as $event)

                                        <div class="event-item event-item-full-width"
                                            style="top: {{ $this->convertHoursToPixels($event['event_begin_hour']) }}px;
                                                   height: {{ $this->convertDurationToPixels($event['event_begin_hour'], $event['event_end_hour']) }}px;
                                                   z-index: {{ $z_index += 3 }}
                                            ">
                                            <span
                                                class="event-item-hours">{{ $event['event_begin_hour'] }} à {{ $event['event_end_hour'] }}</span>

                                            <span class="event-item-name">{{ $event['event_name'] }}</span>
                                        </div>

                                    @endforeach

                                @endif
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </tbody>
    </table>
</section>
