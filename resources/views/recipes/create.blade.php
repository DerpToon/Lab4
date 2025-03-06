@extends('layouts.app')

@section('title', 'Add Recipe')

@section('content')
<h2>Add a New Recipe</h2>

<form action="{{ route('recipes.store') }}" method="POST" class="mt-3">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Recipe Name</label>
        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
        @error('name') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
        <label for="ingredients" class="form-label">Ingredients</label>
        <textarea name="ingredients" class="form-control">{{ old('ingredients') }}</textarea>
        @error('ingredients') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
        <label for="instructions" class="form-label">Instructions</label>
        <textarea name="instructions" class="form-control">{{ old('instructions') }}</textarea>
        @error('instructions') <small class="text-danger">{{ $message }}</small> @enderror
    </div>
    
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" class="form-control">{{ old('description', $recipe->description ?? '') }}</textarea>
        @error('description') <small class="text-danger">{{ $message }}</small> @enderror
    </div>
    
    <button type="submit" class="btn btn-success">Save Recipe</button>
    <a href="{{ route('recipes.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
