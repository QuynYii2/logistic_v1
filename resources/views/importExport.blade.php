@extends('layouts.app')

@section('importExcel')
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h1>Laravel 5.6 Import Export to Excel and CSV Example - ItSolutionStuff.com</h1>
        </div>
        <div class="panel-body">

            <a href="{{ url('downloadExcel/xls') }}"><button class="btn btn-success">Download Excel xls</button></a>
            <a href="{{ url('downloadExcel/xlsx') }}"><button class="btn btn-success">Download Excel xlsx</button></a>
            <a href="{{ url('downloadExcel/csv') }}"><button class="btn btn-success">Download CSV</button></a>

            <form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;" action="{{route('import') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                @csrf

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (Session::has('success'))
                    <div class="alert alert-success">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        <p>{{ Session::get('success') }}</p>
                    </div>
                @endif

                <input type="file" name="import_file" />
                <button class="btn btn-primary">Import File</button>
            </form>

        </div>
    </div>
</div>
@endsection
