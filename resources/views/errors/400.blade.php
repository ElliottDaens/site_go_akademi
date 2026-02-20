@extends('layouts.app')
@section('title', 'Erreur 400')
@section('content')
@include('errors.partials.design', [
  'code' => 400,
  'title' => 'Requête invalide',
  'message' => 'Le serveur n\'a pas pu comprendre la requête. Vérifiez l\'URL ou réessayez.',
])
@endsection
