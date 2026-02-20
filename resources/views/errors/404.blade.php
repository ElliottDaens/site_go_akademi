@extends('layouts.app')
@section('title', 'Erreur 404')
@section('content')
@include('errors.partials.design', [
  'code' => 404,
  'title' => 'Page introuvable',
  'message' => 'Cette page n\'existe pas ou a été déplacée. Retournez à l\'accueil ou contactez-nous si le problème persiste.',
])
@endsection
