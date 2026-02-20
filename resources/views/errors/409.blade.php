@extends('layouts.app')
@section('title', 'Erreur 409')
@section('content')
@include('errors.partials.design', [
  'code' => 409,
  'title' => 'Conflit',
  'message' => 'La requête entre en conflit avec l\'état actuel du serveur. Réessayez après avoir actualisé la page.',
])
@endsection
