@extends('layouts.app')

@section('content')

<x-home.mobile-farm-component :getFarm="$getFarm" :getVet="$getVet" />
@endsection