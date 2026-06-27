@extends('user.settings')

@section('content-settings')
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">

        <h2 class="text-lg font-bold text-slate-800 mb-4">
            Biografía
        </h2>

        <form action="{{ route('user.settings.bio.update') }}" method="POST" class="space-y-4">

            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">
                    Biografía
                </label>

                <textarea name="bio" rows="5"
                    class="w-full px-4 py-2.5 text-sm border rounded-xl outline-none resize-y
                @error('bio')
                    border-red-300 focus:ring-red-100 focus:border-red-400
                @else
                    border-slate-200 focus:ring-primary-100 focus:border-primary-300
                @enderror">{{ old('bio', $user->bio) }}</textarea>

                <div class="mt-1 flex justify-between text-xs text-slate-500">
                    <span>Cuéntale a los demás un poco sobre ti.</span>
                    <span>Máximo 500 caracteres.</span>
                </div>

                @error('bio')
                    <p class="mt-2 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <button type="submit"
                class="px-6 py-2.5 bg-primary-600 text-white text-sm font-semibold rounded-xl hover:bg-primary-700 shadow-sm transition-all">
                Guardar cambios
            </button>

        </form>

    </div>
@endsection
