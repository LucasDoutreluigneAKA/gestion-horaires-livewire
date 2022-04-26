<section class="calendar-bottom-menu">
    <div class="calendar-bottom-menu-content">
        <div class="selection-pointer-left">
            <div class="selection-pointer-left-content">
                <a href="#" wire:click="updatePicker(2)"><</a>
            </div>
        </div>

        <div class="selection-pointer-middle">
            <div class="selection-pointer-middle-content">

                @foreach ([0, 1, 2, 3, 4, 5, 6] as $i)


                    <div class="week-pointer {{ $i == $selectorIndex ? "week-pointer-content-selected" : "" }}" wire:key="{{ $i }}">
                        <a href="#">
                            <div class="week-pointer-content"
                                 wire:click="updatePrinter({{ $i }})">
                                <p>
                                    {{-- <span>{{ var_dump($weekDatesList[$i]) }}</span> --}}
                                    <span>Du {{ $weekDatesList[ $i ]['start'] }}</span>
                                    <span>au {{ $weekDatesList[ $i ]['end'] }}</span>
                                </p>
                            </div>
                        </a>
                    </div>

                @endforeach

            </div>
        </div>

        <div class="selection-pointer-right">
            <div class="selection-pointer-right-content">
                <a href="#" wire:click="updatePicker(4)">></a>
            </div>
        </div>
    </div>
</section>
