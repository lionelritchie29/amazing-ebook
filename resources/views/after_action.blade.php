@extends('_layout')

@section('title', '')

@section('header', '')

@section('content')
<div class="bg-green-700">
  <div class="max-w-2xl mx-auto text-center py-16 px-4 sm:py-20 sm:px-6 lg:px-8">
    <h2 class="text-3xl font-extrabold text-white sm:text-4xl">
      <span class="block">{{ $message }}</span>
    </h2>
    
    @if ($redirect)
      <a href="{{ route('home') }}" class="mt-8 w-full inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-green-600 bg-white hover:bg-green-50 sm:w-auto">
        {{__('content.back_to_home')}}
      </a>
    @endif
  </div>
</div>
@endsection
