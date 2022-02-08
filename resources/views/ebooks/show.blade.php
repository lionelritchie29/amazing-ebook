@extends('_layout')

@section('title', 'Ebook Detail')

@section('header', 'Ebook Detail')

@section('content')
    <div class="space-y-4">
        <div class="flex">
          <div class="w-24">
            Title:
          </div>
          <div>
            {{$ebook->title}}
          </div>
      </div>

      <div class="flex">
          <div class="w-24">
            Author:
          </div>
          <div>
            {{$ebook->author}}
          </div>
      </div>

      <div class="flex">
          <div class="w-24 mr-3">
            Description:
          </div>

          <div>
            {{$ebook->description}}
          </div>
      </div>
    </div>

    <div class="text-center mt-8">
      <a href="/home" type="button" class="w-full justify-center inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        Rent
      </a>
    </div>
@endsection
