<?php

namespace App\Http\Livewire;
use Livewire\Component;
use App\Models\Todo;
use App\Models\TaskAssignment;
use App\Models\TaskResolution;
use App\Models\Program;
use App\Models\User;
use Livewire\WithPagination;

class Todos extends Component
{
    //use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public  $title,$taskDetail,$resolutionDetails,$userID,$verifiedBy,$data,$taskBy,$taskedTo,
            $taskResolved,$taskAssignmentID,$created_at,$updated_at,$tid;

    public $updateMode = false;
    public function render()
    {
       
        return view('livewire.todos',[
                                    'tasks'=>TaskAssignment::where('task_assignments.taskedTo',auth()->user()->id)
                                    ->where('taskResolved',0)
                                    ->orderBy('task_assignments.id', 'desc')
                                    ->paginate(10),
                                    'program'=>Program::all(),
        ]);
    }
    private function resetInputFields(){
        $this->taskDetail = '';
        $this->papID = '';
    }
    public function store()
    {
        $this->validate([
            // 'papID' => 'required',
            'taskDetail' => 'required'
            
        ]);
        
        $assign = new TaskAssignment;
        $assign->papID       = 0;
        $assign->taskBy      = auth()->user()->id;
        $assign->taskedTo    = auth()->user()->id;
        $assign->taskDetail  = $this->taskDetail;
        $assign->taskResolved= 0 ;
        $assign->created_at = now();
        $assign->updated_at = now();
        $assign->save();
        session()->flash('message', 'Task Added');
        $this->resetInputFields();
    }
    // public function edit($id)
    // {
    //     $todo = Todo::findOrFail($id);
    //     $this->title = $todo->title;
    //     $this->description = $todo->description;
    //     $this->todos_id = $todo->id;
    //     $this->updateMode = true;
    // }

    // public function cancel()
    // {
    //     $this->updateMode = false;
    //     $this->resetInputFields();
    // }
    // public function update()
    // {
    //     // dd($this->todos_id);
    //     $validatedDate = $this->validate([
    //         'title' => 'required',
    //         'description' => 'required',
    //     ]);
  
    //     $todo = Todo::find($this->todos_id);
    //     $todo->update([
    //         'title' => $this->title,
    //         'description' => $this->description,
    //     ]);
  
    //     $this->updateMode = false;
  
    //     session()->flash('message', 'Post Updated Successfully.');
    //     $this->resetInputFields();
    // }

    public function delete($id)
    {
        TaskAssignment::find($id)->delete();
        TaskResolution::where('taskAssignmentID',$id)->delete();
        session()->flash('message', 'Deleted');
    }


}
