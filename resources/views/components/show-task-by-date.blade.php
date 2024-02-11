@if (count($dateWiseTasks) > 0)
    @foreach ($dateWiseTasks as $task)
        {{-- <div class="date-wise-task-item">
            <h4>{{ \Carbon\Carbon::parse($task->date)->format('l j/m/Y') }}</h4>
            <p class="m-0">{{ $task->start_time }} -
                {{ \Carbon\Carbon::parse($task->end_time)->format('g:i A') }}</p>
            <p class="m-0">{{ $task->description }}</p>
        </div> --}}




        <div class="task-list-box">
            <div class="task-list-box-inner">

                <div class="single-task-box">
                    <div class="time-box">
                        <span class="time">8:00 AM</span>
                    </div>
                    <div class="task-info-box">
                        <div class="task-info">
                            <h4>{{ $task->title }}</h4>
                            <div class="timespan">{{ \Carbon\Carbon::parse($task->start_time)->format('g:i a') }} - {{ \Carbon\Carbon::parse($task->end_time)->format('g:i a') }}</div>
                        </div>
                        <div class="box-divider"></div>
                    </div>
                </div>
            </div>
        </div>





    @endforeach
    @else

    @component( 'components.empty-data-component' , ['dynamicData' => 'No Task Found!'])@endcomponent
@endif
