@extends('admin.layout')
@section('title', 'Pesan Kontak')

@section('content')

<div class="mb-6">
    <h2 class="text-xl font-bold text-gray-800">Pesan Kontak</h2>
    <p class="text-gray-500 text-sm mt-1">{{ $contacts->count() }} pesan masuk</p>
</div>

@if($contacts->isEmpty())
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-16 text-center">
        <i class="fas fa-envelope text-4xl text-gray-300 mb-3 block"></i>
        <p class="text-gray-500">Belum ada pesan kontak</p>
    </div>
@else
    <div class="space-y-3">
        @foreach($contacts as $c)
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5 hover:shadow-md transition">
            <div class="flex items-start justify-between gap-4">
                <div class="flex items-start gap-4">
                    <div class="w-10 h-10 bg-gradient-to-br from-blue-400 to-indigo-500 rounded-xl flex items-center justify-center text-white font-bold flex-shrink-0">
                        {{ strtoupper(substr($c->name, 0, 1)) }}
                    </div>
                    <div>
                        <div class="flex items-center gap-3 flex-wrap">
                            <h4 class="font-semibold text-gray-800">{{ $c->name }}</h4>
                            <span class="text-xs text-gray-400">{{ $c->email }}</span>
                        </div>
                        <p class="text-sm font-medium text-gray-700 mt-1">{{ $c->subject }}</p>
                        <p class="text-sm text-gray-500 mt-1">{{ $c->message }}</p>
                        <p class="text-xs text-gray-400 mt-2">{{ $c->created_at->diffForHumans() }}</p>
                    </div>
                </div>
                <form action="{{ route('admin.contacts.delete', $c->id) }}" method="POST" class="flex-shrink-0">
                    @csrf @method('DELETE')
                    <button onclick="return confirm('Hapus pesan ini?')" class="text-red-400 hover:text-red-600 transition" title="Hapus">
                        <i class="fas fa-trash text-sm"></i>
                    </button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
@endif

@endsection
