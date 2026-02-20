@extends('layouts.app')
@section('title', 'Erreur 408')
@section('content')
@include('errors.partials.design', [
  'code' => 408,
  'title' => 'Délai dépassé',
  'message' => 'Le serveur a mis trop de temps à répondre. Réessayez dans un instant.',
])
@endsection
