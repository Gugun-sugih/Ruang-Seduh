@extends('layouts.app')

@section('title', 'Menu - RuangSeduh')

@section('content')

@include('pages.menu.hero')
@include('pages.menu.filter')
@include('pages.menu.list')
@include('pages.menu.testimoni')
@include('pages.menu.cta')

<x-footer />

@endsection
