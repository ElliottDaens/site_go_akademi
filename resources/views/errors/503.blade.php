@extends('layouts.app')
@section('title', 'Erreur 503')
@section('content')
@include('errors.partials.design', [
  'code' => 503,
  'title' => 'Service indisponible',
  'message' => 'Le site est temporairement en maintenance. Nous serons de retour très bientôt.',
])
@endsection
