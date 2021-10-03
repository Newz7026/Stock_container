@extends('layouts.app', ['activePage' => 'Print', 'title' => 'Print', 'navName' => '', 'activeButton' => 'laravel'])

@section('content')
    <style>
        @media print {
            #hid {
                display: none;
                /* ซ่อน  */
            }
        }

    </style>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="card">

                    <div class="card-body">
                        <div class="row ">
                            <div class="col-12 ">
                                    <div class="panel panel-default invoice" id="invoice">
                                    <div class="panel-body">
                                        <p class="lh-base font-monospace font-weight-bold fs-3">Boondee Container Serveice</p>
                                      <div class="row">

                                          <div class="col-6 top-left">
                                          </div>

                                          <div class="col-6 top-right">
                                            <div class="input-group input-group-sm mb-3 font-monospace w-50">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">INVOICE</span>
                                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                              </div>
                                                  <span class="marginright"><input type="date" name="" id="" class="form-control w-50" ></span>
                                          </div>

                                      </div>
                                      <hr>
                                      <div class="row">

                                          <div class="col-6">
                                            <p class="lh-base font-monospace"><b>Form : Boondee Container Serveice(Head Office)</b> <br>
                                                3/340 Moo.8, Village nirun ville10 <br>
                                                Debaratna Rd., Bang Chalong, Bang Phli<br>
                                                Samut Prakan 10540 Thailand<br>
                                                <b>Email</b> : Anekcontainer@hotmail.com <br>
                                                <b>Tel.</b> : 087-518-0429, 090-678-3389 <br>
                                                <b>Tex ID</b> : 0-1135-56002-51-4
                                            </p>
                                          </div>

                                          <div class="col-6">
                                            <p class="lh-base font-monospace text-break"><b>Form : {{ $cstr_data[0]->enterprise_name }}</b> <br>
                                                Address : {{ $cstr_data[0]->enterprise_add }} <br>
                                                <b>Fax</b> : {{ $cstr_data[0]->enterprise_fax }} <br>
                                                <b>Tel.</b> : {{ $cstr_data[0]->enterprise_phone }} <br>
                                                <b>Tex ID</b> : {{ $cstr_data[0]->enterprise_taxpayer }}
                                            </p>
                                          </div>

                                      </div>

                                      <div class="row table-row ">
                                          <table class="table table-bordered font-monospace">
                                            <thead>
                                              <tr>
                                                <th class="text-center fw-bold text-dark" style="width:5%">#</th>
                                                <th class="text-right fw-bold text-dark" style="width:50%">Item</th>
                                                <th class="text-right fw-bold text-dark" style="width:15%">Quantity</th>
                                                <th class="text-right fw-bold text-dark" style="width:15%">Unit Price</th>
                                                <th class="text-right w-100 fw-bold text-dark" style="width:15%">Total Price</th>
                                              </tr>
                                            </thead>
                                            <tbody >
                                              <tr >
                                                <td class="text-center font-monospace">1</td>
                                                <td class="font-monospace ">Pedage</td>
                                                <td class="text-right"></td>
                                                <td class="text-right"></td>
                                                <td class="text-right w-100"></td>
                                              </tr>
                                              <tr>
                                                <td class="text-center font-monospace"></td>
                                                <td class="font-monospace">In - {{ $cstr_data[0]->enterprise_add }}</td>
                                                <td class="text-center font-monospace">6</td>
                                                <td class="text-center font-monospace">$59</td>
                                                <td class="text-center font-monospace w-100">$254</td>
                                              </tr>
                                              <tr>
                                                <td class="text-center"></td>
                                                <td class="font-monospace">Out - {{ $cstr_data[0]->enterprise_add }}</td>
                                                <td class="text-right"></td>
                                                <td class="text-right"></td>
                                                <td class="text-right w-100"></td>
                                              </tr>
                                               <tr class="last-row">
                                                <td class="text-center"></td>
                                                <td></td>
                                                <td class="text-right"></td>
                                                <td class="text-right"></td>
                                                <td class="text-right w-100"></td>

                                              </tr>
                                             </tbody>
                                          </table>

                                      </div>

                                      <div class="row">
                                      <div class="col-6 margintop">
                                          <p class="lead marginbottom">THANK YOU!</p>

                                          <button class="btn btn-success" id="invoice-print"><i class="fa fa-print"></i> Print Invoice</button>
                                          <button class="btn btn-danger"><i class="fa fa-envelope-o"></i> Mail Invoice</button>
                                      </div>
                                      <div class="col-6 text-right pull-right invoice-total">
                                                <p>Subtotal : $1019</p>
                                                <p>Discount (10%) : $101 </p>
                                                <p>VAT (8%) : $73 </p>
                                                <p>Total : $991 </p>
                                      </div>
                                      </div>

                                    </div>
                                  </div>
                              </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

