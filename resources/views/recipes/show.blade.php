@extends('layouts.app')

@section('title', 'Recipe Details')

@section('content')
<h2>{{ $recipe->name }}</h2>

<div class="mb-3">
    <h4>Ingredients</h4>
    <p>{{ $recipe->ingredients }}</p>
</div>

<div class="mb-3">
    <h4>Instructions</h4>
    <p>{{ $recipe->instructions }}</p>
</div>

<a href="{{ route('recipes.index') }}" class="btn btn-primary">Back to Recipes</a>
@endsection
