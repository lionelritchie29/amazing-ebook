@extends('_layout')

@section('title', 'Home')

@section('header', __('content.home'))

@section('content')
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-blue-500">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                {{__('content.author')}}
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                {{__('content.title')}}
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($ebooks as $ebook)
                                <tr class="bg-white">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{$ebook->author}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                      <a href={{'/ebooks/' . $ebook->ebook_id}} class="text-blue-400 hover:text-blue-600 hover:underline">{{$ebook->title}}</a>
                                  </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
