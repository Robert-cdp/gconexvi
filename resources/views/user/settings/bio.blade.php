@extends('user.settings')

@section('content-settings')
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">
        <form class="space-y-4">
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Biografía</label>
                <textarea rows="3" class="w-full px-4 py-2.5 text-sm border border-slate-200 rounded-xl outline-none focus:ring-2 focus:ring-primary-100 focus:border-primary-300 resize-y">
                    
                </textarea>
            </div>
            <button type="button" class="px-6 py-2.5 bg-primary-600 text-white text-sm font-semibold rounded-xl hover:bg-primary-700 shadow-sm transition-all">
                Guardar cambios
            </button>
        </form>
    </div>
@endsection
