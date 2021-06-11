@extends('admin::layout.master')

@section('myStyles')
    <title>{{ env('APP_NAME') }}</title>
    <meta name="description" content="">

    <x-admin::table-styles/>
@endsection

@section('content')
    <x-admin::form-container title="Languages">
        <x-slot name="breadcrumbs">
            <x-admin::breadcrumb title="Dashboard" :route="route('dashboard')"/>
            <x-admin::breadcrumb title="Languages"/>
        </x-slot>

        <x-slot name="buttons">
            <x-admin::form-button title="Add Language" :route="route('admin.addLanguage')">
                <i class="fas fa-plus"></i>
            </x-admin::form-button>
        </x-slot>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="myTable" class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Code</th>
                            <th>Order</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($languages as $language)
                            <tr onclick="window.location = '{{ route('admin.editLanguage', ['id' => $language->id]) }}'">
                                <td>{{ $language->id }}</td>
                                <td>{{ $language->name }}</td>
                                <td>{{ $language->code }}</td>
                                <td>{{ $language->sort_order }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </x-admin::form-container>
@endsection

@section('myScripts')
    <x-admin::table-scripts/>
@endsection
