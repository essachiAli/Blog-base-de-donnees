@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl mx-auto">
            <div class="bg-white shadow-xl rounded-2xl overflow-hidden">
                <div class="bg-indigo-600 px-6 py-4">
                    <h2 class="text-2xl font-bold text-white">Modifier l'article</h2>
                    <p class="text-indigo-100 mt-1 text-sm">Mettez à jour les informations de votre article ci-dessous.</p>
                </div>

                <div class="p-8">
                    <form method="POST" action="{{ route('articles.update', $article->id) }}" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <!-- Title Input -->
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Titre de
                                l'article</label>
                            <input type="text" id="title" name="title" value="{{ old('title', $article->title) }}"
                                class="w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 transition duration-150 ease-in-out @error('title') border-red-500 @enderror"
                                required>
                            @error('title')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Content Textarea -->
                        <div>
                            <label for="content" class="block text-sm font-medium text-gray-700 mb-1">Contenu</label>
                            <textarea id="content" name="content" rows="8"
                                class="w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 transition duration-150 ease-in-out @error('content') border-red-500 @enderror"
                                required>{{ old('content', $article->content) }}</textarea>
                            @error('content')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Created At Input -->
                        <div>
                            <label for="created_at" class="block text-sm font-medium text-gray-700 mb-1">Date de
                                publication</label>
                            <input type="datetime-local" id="created_at" name="created_at"
                                value="{{ old('created_at', $article->created_at ? $article->created_at->format('Y-m-d\TH:i') : '') }}"
                                class="w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 transition duration-150 ease-in-out @error('created_at') border-red-500 @enderror">
                            @error('created_at')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Categories -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-3">Catégories</label>
                            <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                                <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                                    @foreach($categories as $category)
                                        <div class="flex items-center">
                                            <input type="checkbox" name="tags[]" value="{{ $category }}"
                                                id="tag_{{ $loop->index }}"
                                                class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded transition duration-150 ease-in-out"
                                                {{ in_array($category, $article->tags->pluck('name')->toArray()) ? 'checked' : '' }}>
                                            <label for="tag_{{ $loop->index }}"
                                                class="ml-2 block text-sm text-gray-700 cursor-pointer select-none">
                                                {{ $category }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-100">
                            <a href="{{ route('articles.index') }}"
                                class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150 ease-in-out">
                                Annuler
                            </a>
                            <button type="submit"
                                class="px-6 py-2 bg-indigo-600 border border-transparent rounded-lg text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150 ease-in-out transform hover:-translate-y-0.5">
                                Enregistrer les modifications
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection