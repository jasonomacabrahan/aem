<form wire:keydown.enter.prevent="store()">
    {{-- <div class="form-group">
        <label for="exampleFormControlInput2">Program</label>
        <select class="form-control rounded-0 border-info" wire:model="papID">
            @foreach($program as $prog)
                <option value={{$prog->id}}>{{strtoupper($prog->shortName)}}</option>
            @endforeach
        </select>
        @error('papID') <span class="text-danger">{{ $message }}</span>@enderror
    </div> --}}

    <div class="form-group">
        <label for="exampleFormControlInput2">Task Detail:</label>
        <input type="text" class="form-control border form-bordered rounded-0" id="exampleFormControlInput2" wire:model="taskDetail" placeholder="Enter Task Detail">
        {{-- <textarea type="email" class="form-control border form-bordered" id="exampleFormControlInput2" wire:model="taskDetail" placeholder="Enter Task Detail"></textarea> --}}
        @error('taskDetail') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    {{-- <button wire:click.prevent="store()" class="btn btn-info"><i class="fa fa-fw fa-plus"></i>Add Task</button> --}}
</form>