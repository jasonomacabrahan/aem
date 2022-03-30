<div>
    <div>
  
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
      
        @if($updateMode)
            @include('livewire.update')
        @else
            @include('livewire.create')
        @endif
      
        <ul class="list-group">
            @foreach($tasks as $task)
                <li class="list-group-item">{{ $task->taskDetail }}<a href="#" class="float-right" wire:click="delete({{ $task->tid }})"><i class="fa fa-fw fa-x"></i></a></li>
            @endforeach
            
            <div class="livewire-pagination">{{ $tasks->onEachSide(2)->links() }}</div>
            
            
        </ul>
    </div>
</div>
