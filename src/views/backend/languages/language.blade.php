@extends('admin::layout.master')

@section('myStyles')
    <title>{{ env('APP_NAME') }}</title>
    <meta name="description" content="">

@endsection

@section('content')
<x-admin::form-container title="Language" :backRoute="route('admin.languages')">
    <x-slot name="breadcrumbs">
        <x-admin::breadcrumb title="Dashboard" :route="route('dashboard')"/>
        <x-admin::breadcrumb title="Languages" :route="route('admin.languages')"/>
        <x-admin::breadcrumb title="Language" />
    </x-slot>
</x-admin::form-container>
@endsection

@section('myScripts')

@endsection
