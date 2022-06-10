@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Questionnaire | ',
    'activePage' => 'settings',
    'backgroundImage' => asset('assets') . "/img/logo.png",
])
@push('header')

@endpush

@section('content')
<div class="panel-header panel-header-sm">
</div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h5>Step 1/3: Feedback</h5>
                            <p>Due to commitment of continually extending utmost service to our client and stakeholders, your feedback is very important
                                to us. Please take a moment to fill up this questionnaire so that we can better respond to your needs. Please be assured 
                                that all information shall be treated with strict confidentiality. Kindly mark the box that correspond to your answer.
                            </p>
                            <form action="{{ route('feedback.store') }}" method="post">
                                @csrf
                                @php
                                    // $activies = DB::table('activities')->where('activityDateStart', '>=', now())->get();
                                    $activies = DB::table('activities')->get();
                                @endphp

                                <div class="form-group" id="events-select">
                                    <strong>Select Activity:</strong>
                                    <select class="form-control border-info rounded-0" name="ActivityID" id="events-select" required>
                                            <option></option>
                                        @foreach($activies as $activity)
                                            <option value="{{ $activity->id }}">{{ $activity->activityDescription }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <table class="table table-bordered">
                                    @foreach ($question as $item)
                                        
                                    <tr>
                                        <td>{{$loop->index+1}}. {{ $item->question}}</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            
                                            <ol>
                                                    @php
                                                        $data = App\Models\QuestionnaireSub::Select('*')->where('qid',$item->qid)->get();
                                                    @endphp
                                                    
                                                    <ul style="list-style-type: lower-alpha;">
                                                        @foreach ($data as $key) 
                                                        <li>{{ $key->question_sub}}</li>
                                                        
                                                        <input type="hidden" name="q_sub_id[]" value="{{$key->q_sub_id}}"/>
                                                            

                                                            <label for="vs" style="font-weight: bolder; color: black;"required>Very Satisfied</label>
                                                            <input type="radio" id="vs" name="{{$key->q_sub_id}}" value="4" required/>
                                                            <label for="s" style="font-weight: bolder; color: black;">Satisfied</label>
                                                            <input type="radio" id="s" name="{{$key->q_sub_id}}" value="3" required/>
                                                            <label for="d" style="font-weight: bolder; color: black;">Disatisfied</label>
                                                            <input type="radio" id="d" name="{{$key->q_sub_id}}" value="2" required/>
                                                            <label for="vd" style="font-weight: bolder; color: black;">Very Disatisfied</label>
                                                            <input type="radio" id="vd" name="{{$key->q_sub_id}}" value="1" required/>
                                                        
                                                        @endforeach
                                                    </ul>
                                                </ol>
                                            </td>
                                    </tr>
                                        @endforeach
                                </table>
                                <button type="submit" name="submit" class="btn btn-info rounded-0">Next <i class="fa fa-fw fa-arrow-right"></i></button>
                            </form>
                                
                            </div>
                            </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
