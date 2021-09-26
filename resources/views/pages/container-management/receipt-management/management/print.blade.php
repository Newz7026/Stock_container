
@extends('layouts.app', ['activePage' => 'Print', 'title' => 'Print', 'navName' => '', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-10">
                                <p class="text-bold">
                                    หจก. บุญดีคอนเทนเนอร์ เซอร์วิส</p>
                            </div>
                            <div class="col-2">
                                <input type="date" class="form-control" id="date"   name="date" >
                            </div>
                            <div class="col-12">
                            </div>

                        </div>

                    </div>

                </div>


            </div>
        </div>
    </div>
@endsection
