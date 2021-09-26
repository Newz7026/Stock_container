@extends('layouts.app', ['activePage' => 'export-manage', 'title' => 'Export manage', 'navName' => 'Export management',
'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form action="{{route('export-pdf')}}" method="get">
                        <div class="input-group">
                            <select class="form-select" id="inputGroupSelect04"
                                aria-label="Example select with button addon" name="id_export" id="id_export">

                                <option selected>Choose...</option>
                                @foreach ($agent_data as $item)
                                    <option value="{{ $item->enterprise_id }}">{{ $item->enterprise_name }}</option>
                                @endforeach
                            </select>
                            <button class="btn btn-outline-secondary" type="submit">Button</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
