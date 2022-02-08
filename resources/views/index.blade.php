@extends('_layout')

@section('title', 'Index')

@section('header', __('content.index_title'))

@section('content')
<div class="bg-gray-500 rounded">
    <div class="max-w-2xl mx-auto text-center py-16 px-4 sm:py-20 sm:px-6 lg:px-8">
      <h2 class="text-3xl font-extrabold text-white sm:text-4xl">
        <span class="block">{{ __('content.index_message') }}</span>
      </h2>
    </div>
  </div>
@endsection
