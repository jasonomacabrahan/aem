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
                @if ($task->taskedTo==auth()->user()->id AND $task->taskBy==auth()->user()->id)
                    <li class="list-group-item">{{ $task->taskDetail }}<a href="#" class="float-right" wire:click="delete({{ $task->id }})"><i class="fa fa-fw fa-trash"></i></a></li>
                @else
                    <li class="list-group-item">
                                                {{ $task->taskDetail }} 
                                                @php
                                                    $data = App\Models\User::Select('name')->where('id',$task->taskBy)->get();
                                                @endphp
                                                @foreach($data as $element)
                                                    <span style="" class="badge badge-info float-right">TASKED BY: {{ $element->name ?? '' }}</span>
                                                @endforeach
                    </li>
                @endif
            @empty
                    <span class="badge badge-success">No task added...</span>
                                
            @endforelse

        </ul>
        <div class="livewire-pagination">{{ $tasks->onEachSide(2)->links() }}</div>
    </div>
</div>
