<div>
    <div>
  
        @if (session()->has('message'))
            <div class="alert alert-success">
                <i class="fa fa-fw fa-check-circle"></i><strong>{{ session('message') }}</strong>
            </div>
        @endif
      
        @if($updateMode)
            @include('livewire.update')
        @else
            @include('livewire.create')
        @endif
      
        <ul class="list-group">
            @forelse ($tasks as $task)
                <li class="list-group-item">{{ $task->taskDetail }}<a href="#" class="float-right" wire:click="delete({{ $task->id }})"><i class="fa fa-fw fa-trash"></i></a></li>
            @empty
                    <span class="badge badge-success">No task added...</span>
                                
            @endforelse

        </ul>
        <div class="livewire-pagination">{{ $tasks->onEachSide(2)->links() }}</div>
    </div>
</div>
