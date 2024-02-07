@if (count($dateWiseTasks) > 0)
    @foreach ($dateWiseTasks as $task)
        <div class="date-wise-task-item">
            <h4>{{ \Carbon\Carbon::parse($task->date)->format('l j/m/Y') }}</h4>
            <p class="m-0">{{ $task->start_time }} -
                {{ \Carbon\Carbon::parse($task->end_time)->format('g:i A') }}</p>
            <p class="m-0">{{ $task->description }}</p>
        </div>
    @endforeach
    @else

    @component( 'components.empty-data-component' , ['dynamicData' => 'No Task Found!'])@endcomponent
@endif
