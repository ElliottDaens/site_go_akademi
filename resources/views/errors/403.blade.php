@extends('layouts.app')
@section('title', 'Erreur 403')
@section('content')
@include('errors.partials.design', [
  'code' => 403,
  'title' => 'Accès interdit',
  'message' => 'Vous n\'avez pas l\'autorisation d\'accéder à cette page.',
])
@endsection
