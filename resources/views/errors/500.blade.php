@extends('layouts.app')
@section('title', 'Erreur 500')
@section('content')
@include('errors.partials.design', [
  'code' => 500,
  'title' => 'Erreur serveur',
  'message' => 'Une erreur interne s\'est produite. Notre équipe en a été informée. Réessayez plus tard ou contactez-nous.',
])
@endsection
