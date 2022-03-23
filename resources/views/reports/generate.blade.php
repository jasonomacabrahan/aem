@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Accomplishment | ',
    'activePage' => 'dashboard',
    'backgroundImage' => asset('assets') . "/img/logo.png",
])
@section('content')
<div class="panel-header panel-header-sm">
</div>
<div class="content">
<style>
    @page {
        @page{
margin-left: 0cm;
margin-right: 0cm;
margin-top: 0cm;
margin-bottom: 0cm;
}
}
</style>


    <div class="row mt-4">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                <h5>Report(s)</h5>
                <button name="b_print" type="button" class="ipt btn btn-info rounded-0" onClick="printdiv('div_print');"><i class="fa fa-fw fa-print"></i>Print</button>
                <button type="button" class="btn btn-success rounded-0" data-toggle="modal" data-target="#focalModal">
                    Update Signatory
                </button>
            </div>
            <div class="">
                <div id="div_print">
                    <div style="clear:both;">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center;">
                            <img width="403" height1="84" alt="" style="float: center; text-align: left; display: inline-block; " src="{{asset('assets')}}/img/dictlogo.png" alt="...">
                        </p>
                    </div>
                    <p style="margin-top:0pt; margin-bottom:0pt;">&nbsp;</p>
                    <p style="margin-top:0pt; margin-bottom:0pt;">&nbsp;</p>
                   
                    <table class="table table-bordered">
                        <tbody>
                            <tr style="height:32pt;">
                                <td colspan="2" style="width:461pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.38pt; padding-left:5.38pt; vertical-align:middle; background-color:#9cc3e5;">
                                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt;"><strong>ACCOMPLISHMENT REPORT</strong></p>
                                    <?php
                                        $from = strtotime($datefrom);
                                        $to = strtotime($dateto);    
                                    ?>
                                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:8pt;"><strong>For the period <?php  echo date('F jS, Y', $from);?> to <?php echo date('F jS, Y', $to);?></strong></p>
                                </td>
                            </tr>
                            <tr style="height:18pt;">
                                <td style="width:290.75pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.38pt; padding-left:5.38pt; vertical-align:top;">
                                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt;"><strong>NAME:</strong><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong><strong>{{ auth()->user()->name }}</strong></p>
                                </td>
                                <td style="width:158.75pt; border-top-style:solid; border-top-width:0.75pt; border-left-style:solid; border-left-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.38pt; padding-left:5.38pt; vertical-align:top;">
                                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt;"><strong>POSITION:</strong><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong><strong>{{ auth()->user()->designation }}</strong></p>
                                </td>
                            </tr>
                            <tr style="height:18pt;">
                                <td colspan="2" style="width:461pt; border-top-style:solid; border-top-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.38pt; padding-left:5.38pt; vertical-align:top;">
                                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt;"><strong>OFFICE:</strong><strong>&nbsp;&nbsp;&nbsp;&nbsp;</strong><strong contenteditable="true">{{ auth()->user()->agency }}</strong></p>
                                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt;"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong><strong contenteditable="true">FOO Mindanao Cluster-03</strong></p>
                                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt;"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong><strong contenteditable="true">Florentino Torres St., Davao City</strong></p>
                                </td>
                            </tr>
                            <tr style="height:394pt;">
                                <td colspan="2" style="width:461pt; border-top-style:solid; border-top-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.38pt; padding-left:5.38pt; vertical-align:top;">
                                    <p style="margin-top:0pt; margin-left:36pt; margin-bottom:0pt; font-size:11pt;">&nbsp;</p>
                                    <p style="margin-top:0pt; margin-left:36pt; margin-bottom:0pt; font-size:11pt;">&nbsp;</p>
                                    <ol style="margin:0pt; padding-left:0pt;" type="1">
                                        @foreach($accomplishments as $reports)
                                        
                                                <li style="margin-left:31.35pt; line-height:115%; padding-left:4.65pt; font-size:11pt; background-color:#ffffff;">{{ $reports->taskDetail }}</li>
                                        @endforeach    
                                    </ol>
                                    <p style="margin-top:0pt; margin-left:18pt; margin-bottom:0pt; line-height:150%; font-size:12.5pt; background-color:#ffffff;">&nbsp;</p>
                                </td>
                            </tr>
                            <tr style="height:40pt;">
                                <td style="width:290.75pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.38pt; padding-left:5.38pt; vertical-align:top;">
                                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt;">SUBMITTED BY:</p>
                                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt;">&nbsp;</p>
                                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt;"><strong>{{ auth()->user()->name }}</strong></p>
                                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt;">Employee</p>
                                </td>
                                <td style="width:158.75pt; border-top-style:solid; border-top-width:0.75pt; border-left-style:solid; border-left-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.38pt; padding-left:5.38pt; vertical-align:top;">
                                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt;">APPROVED BY:</p>
                                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt;">&nbsp;</p>
                                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt;"><strong id="officer" contenteditable="true">ENGR. VIRGIL A. FUENTES</strong><br><span id="newdesignation" contenteditable="true">MC3 eBPLS Project Focal</span></p>
                                </td>
                            </tr>
                            <tr style="height:23pt;">
                                <td style="width:290.75pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; padding-right:5.38pt; padding-left:5.38pt; vertical-align:top;">
                                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt;">DATE:</p>
                                </td>
                                <td style="width:158.75pt; border-top-style:solid; border-top-width:0.75pt; border-left-style:solid; border-left-width:0.75pt; padding-right:5.38pt; padding-left:5.38pt; vertical-align:top;">
                                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt;">DATE:</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:8pt;">&nbsp;</p>
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:8pt;">NOTE: <strong><em>To ** submitted together with the Daily Time Record every 16</em></strong><strong><em><span style="font-size:5.33pt;"><sup>th</sup></span></em></strong><strong><em>&nbsp;and last day of the month.&nbsp;</em></strong></p>
                    <p style="margin-top:0pt; margin-bottom:0pt;">&nbsp;</p>
                    <div class="text-center">
                        <p style="color:#0070c0; font-size: 8pt;">DICT Building, F. Torres St.,<br>Davao City, 8000 Philippines<br>(082) 224-0646 www.dict.gov.ph</p>
                        
                    </div>
                </div>
            </div>
            
            </div>
        </div>
    </div>
    
</div>

<div class="modal fade" id="focalModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Supervisor</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label>Please select your Supervisor</label>
                <select name="approvingofficer"  id="approvingofficer" class="form-control rounded-0 border-info form-bordered" required>
                    <option></option>
                    @foreach($users as $userdata)
                    <option>{{ $userdata->name }}</option>
                    @endforeach           
                </select>    
            </div>
            <div class="form-group">
                <label>Select Designation</label>
                <select id="designation" class="form-control border-info rounded-0" type="text" name="designation" required>
                    <option></option>
                    <option>Project Focal</option>
                    <option>MC3 eBPLS Project Focal</option>
                    <option>Chief TOD</option>
                </select>
            </div>
            <div class="alert alert-warning">
                <p>We are sorry for inconvinience. For now you can manually select your Supervisor and Designation. Next update will be much better.</p>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" id="selectsupervisor" class="btn btn-info rounded-0">Append</button>
        </div>
      </div>
    </div>
  </div>

@endsection
