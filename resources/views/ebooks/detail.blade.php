@extends('_layout')

@section('title', 'Ebook Detail')

@section('header', __('content.ebook_detail'))

@section('content')
    <div class="space-y-4">
        <div class="flex">
          <div class="w-24">
            {{ __('content.title') }}:
          </div>
          <div>
            {{$ebook->title}}
          </div>
      </div>

      <div class="flex">
          <div class="w-24">
            {{__('content.author')}}:
          </div>
          <div>
            {{$ebook->author}}
          </div>
      </div>

      <div class="flex">
          <div class="w-24 mr-3">
            {{__('content.description')}}:
          </div>

          <div>
            {{$ebook->description}}
          </div>
      </div>
    </div>

    <form action="{{ route('addOrder') }}" method="POST" class="text-center mt-8">
      @csrf
      <input type="hidden" name="ebook_id" value="{{$ebook->ebook_id}}">
      <button class="w-full justify-center inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        {{__('content.rent')}}
      </button>
    </form>
@endsection
