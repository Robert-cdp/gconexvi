@extends('user.settings')

@section('content-settings')
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">

        <h2 class="text-lg font-bold text-slate-800 mb-4">
            Foto de perfil
        </h2>

        <form action="{{ route('user.settings.avatar.update') }}" method="POST" enctype="multipart/form-data"
            class="space-y-5">

            @csrf
            @method('PUT')

            <div class="flex items-center gap-5">

                <img src="{{ $user->avatar ? Storage::url($user->avatar) : asset('images/default-avatar.png') }}"
                    class="w-20 h-20 rounded-full object-cover border border-slate-200">

                <div class="flex-1">

                    <input type="file" name="avatar" accept=".jpg,.jpeg,.png,.webp"
                        class="block w-full text-sm file:mr-4 file:px-4 file:py-2 file:border-0 file:rounded-lg file:bg-primary-600 file:text-white file:cursor-pointer">

                    <p class="mt-2 text-xs text-slate-500">
                        JPG, PNG o WEBP. Máximo 2 MB.
                    </p>

                    @error('avatar')
                        <p class="mt-2 text-sm text-red-600">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

            </div>

            <button type="submit" class="px-6 py-2.5 bg-primary-600 text-white rounded-xl hover:bg-primary-700">
                Guardar foto
            </button>

        </form>

    </div>
@endsection
