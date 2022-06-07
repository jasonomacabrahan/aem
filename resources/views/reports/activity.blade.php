@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Activity Evaluation | ',
    'activePage' => 'dashboard',
    'backgroundImage' => asset('assets') . "/img/logo.png",
])
@section('content')
<div class="panel-header panel-header-sm">
</div>
<div class="content">
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header bg-info text-white">
                    <h5><i class="fa fa-fw fa-th-list"></i>Evaluated Activity</h5>
                </div>
                <div class="card-body">
                    <table id="list" class="table table-striped table-hover table-bordered" style="width:100%">
                                    <thead >
                                        <tr style='font-size: 6pt;'>
                                            <th style='font-weight: bolder;'>Activity / Event </th>
                                            <th style='font-weight: bolder;'>Location</th>
                                            <th style='font-weight: bolder;'>Date Start</th>
                                            <th style='font-weight: bolder;'>Date End</th>
                                            <th style='font-weight: bolder;'>Date Created</th>
                                            <th style='font-weight: bolder;'>Rating</th>
                                            <th style='font-weight: bolder;'><i class="fa fa-fw fa-cog"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            @forelse ($activity as $item)
                                                <tr>
                                                    <td>{{ $item->activityDescription }}</td>
                                                    <td>{{ $item->location }}</td>
                                                    <td>{{ $item->activityDateStart }}</td>
                                                    <td>{{ $item->activityDateEnd }}</td>
                                                    <td>{{ $item->created_at }}</td>
                                                    <td>{{ $item->average }}</td>
                                                    <td>
                                                        <a href="" class="btn btn-sm btn-info rounded-0"><i class="fa fa-fw fa-th-list"></i>View Evaluation</a>
                                                    </td>
                                                </tr>
                                            @empty
                                                
                                            @endforelse
                                    </tbody>
                                    <tfoot style='font-size: 8pt;'>
                                        <tr>
                                            <th style='font-weight: bolder;'>Activity / Event </th>
                                            <th style='font-weight: bolder;'>Location</th>
                                            <th style='font-weight: bolder;'>Date Start</th>
                                            <th style='font-weight: bolder;'>Date End</th>
                                            <th style='font-weight: bolder;'>Date Created</th>
                                            <th style='font-weight: bolder;'>Rating</th>
                                            <th style='font-weight: bolder;'><i class="fa fa-fw fa-cog"></i></th>
                                        </tr>
                                    </tfoot>
                                </table>

                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection
