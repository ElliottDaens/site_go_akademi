@extends('layouts.app')
@section('title', 'Erreur 401')
@section('content')
@include('errors.partials.design', [
  'code' => 401,
  'title' => 'Accès refusé',
  'message' => 'Connectez-vous pour accéder à cette page.',
])
@endsection
