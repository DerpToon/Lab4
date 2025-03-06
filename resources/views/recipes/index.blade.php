@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-3">Recipe List</h2>
    <a href="{{ route('recipes.create') }}" class="btn btn-primary mb-3">Add New Recipe</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($recipes as $recipe)
            <tr>
                <td>{{ $recipe->name }}</td>
                <td>{{ Str::limit($recipe->description, 50) }}</td>
                <td>
                    <a href="{{ route('recipes.show', $recipe) }}" class="btn btn-info">View</a>
                    <a href="{{ route('recipes.edit', $recipe) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('recipes.destroy', $recipe) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection