@extends('layouts.app')

@section('content')
  <section>

    {{-- SR title --}}
    <x-sr-title>
      Notifications
    </x-sr-title>

    <div class="flex">

      <aside class="w-1/4">
        Aside
      </aside>

      <main class="w-3/4 border-r border-l border-gray-800">
        Notifications
      </main>

    </div>
  </section>
@endsection
