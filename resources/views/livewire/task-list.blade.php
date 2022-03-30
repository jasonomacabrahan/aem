
{{-- <div wire:poll.visible>
    <ul class="list-group">
        @forelse ($tasks as $task)
            <li class="list-group-item">{{ $task->taskDetail }}<a href="#" class="float-right" wire:click="delete({{ $task->tid }})"><i class="fa fa-fw fa-x"></i></a></li>
        @empty
            <div class="alert alert-info">
                No task added
            </div>
        @endforelse 
        {{ $tasks->links() }}
    </ul>
</div> --}}

