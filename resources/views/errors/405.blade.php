@extends('layouts.app')
@section('title', 'Erreur 405')
@section('content')
@include('errors.partials.design', [
  'code' => 405,
  'title' => 'Méthode non autorisée',
  'message' => 'La méthode de requête utilisée n\'est pas acceptée pour cette ressource.',
])
@endsection
