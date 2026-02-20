@extends('layouts.app')
@section('title', 'Erreur 419')
@section('content')
@include('errors.partials.design', [
  'code' => 419,
  'title' => 'Session expirée',
  'message' => 'Votre session a expiré pour des raisons de sécurité. Rechargez la page et réessayez.',
])
@endsection
