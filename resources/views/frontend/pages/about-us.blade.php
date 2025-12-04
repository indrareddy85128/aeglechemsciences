@extends('layouts.frontend.app')
@section('content')
    <x-breadcrumb title="About Us" :links="[['name' => 'Home', 'url' => route('home')], ['name' => 'About Us', 'url' => '#']]" />
    <x-about-section />
    <x-mission-vision-value />
    <x-why-choose-us--section />
@endsection
