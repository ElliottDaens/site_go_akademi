@extends('layouts.app')
@section('title', 'Erreur 402')
@section('content')
@include('errors.partials.design', [
  'code' => 402,
  'title' => 'Paiement requis',
  'message' => 'Un abonnement ou un paiement est requis pour accéder à cette fonctionnalité.',
])
@endsection
