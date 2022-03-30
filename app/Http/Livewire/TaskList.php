<?php

namespace App\Http\Livewire;
use Livewire\Component;
use App\Models\Todo;
use App\Models\TaskAssignment;
use App\Models\TaskResolution;
use App\Models\Program;
use App\Models\User;
use Livewire\WithPagination;
class TaskList extends Component
{
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        return view('livewire.task-list',[
                                        'tasks'=>TaskResolution::join('task_assignments','task_assignments.id','=','task_resolutions.taskAssignmentID')
                                        ->where('task_resolutions.userID',auth()->user()->id)->paginate(5)
        ]);
    }
}
