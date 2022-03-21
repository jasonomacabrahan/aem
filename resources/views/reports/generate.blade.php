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
    
    <div class="row mt-4">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                <h5>Report(s)</h5>
            </div>
            <div class="card-body">
                <input name="b_print" type="button" class="ipt" onClick="printdiv('div_print');" value=" Print ">
                <div id="div_print">
                    {{-- <div style="clear:both;">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center;"><img src="https://myfiles.space/user_files/115917_565e29541e860fcc/1647771020_ar-february-2022-1/1647771020_ar-february-2022-1-1.png" width="403" height="84" alt="" style="float: left; text-align: left; display: inline-block; "></p>
                    </div> --}}
                    <p style="margin-top:0pt; margin-bottom:0pt;">&nbsp;</p>
                    <p style="margin-top:0pt; margin-bottom:0pt;">&nbsp;</p>
                   
                    <table cellpadding="0" cellspacing="0" style="width:473.25pt; border:0.75pt solid #000000; border-collapse:collapse;">
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
                                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt;"><strong contenteditable="true">ENGR. VIRGIL A. FUENTES</strong><br><span contenteditable="true">MC3 eBPLS Project Focal</span></p>
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
                    <div style="clear:both;">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-indent:180pt; font-size:9pt;"><span style="color:#0070c0;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color:#0070c0;">DICT Building, F. Torres St.,</span><img src="https://myfiles.space/user_files/115917_565e29541e860fcc/1647771020_ar-february-2022-1/1647771020_ar-february-2022-1-2.png" width="710" height="3" alt="" style="float: left; text-align: left; display: inline-block; "></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:9pt;"><span style="color:#0070c0;">Davao City, 8*** Philippines</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:9pt;"><span style="color:#0070c0;">(082) 224-0646 www.dict.gov.ph</span></p>
                    </div>
                </div>
            </div>
            
            </div>
        </div>
    </div>
    
</div>

@endsection
