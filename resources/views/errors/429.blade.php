@extends('layouts.app')
@section('title', 'Erreur 429')
@section('content')
@include('errors.partials.design', [
  'code' => 429,
  'title' => 'Trop de requêtes',
  'message' => 'Vous avez effectué trop de requêtes. Veuillez patienter quelques instants avant de réessayer.',
])
@endsection
