@if (session('status'))
    <div class="mb-5 rounded-xl bg-green-50 border border-green-200 p-4 text-sm text-green-700">
        {{ session('status') }}
    </div>
@endif
