@extends('_layout')

@section('title', 'Cart')

@section('header', 'My Cart')

@section('content')

  @if(count($orders) == 0)
    <div>
      <h1>Ups, there is no order</h1>
    </div>
  @else
    <div class="flex flex-col">
      <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
              <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                  <table class="min-w-full divide-y divide-gray-200">
                      <thead class="bg-blue-500">
                      <tr>
                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                              Title
                          </th>
                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                              Action
                          </th>
                      </tr>
                      </thead>
                      <tbody>
                          @foreach($orders as $order)
                              <tr class="bg-white">
                                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                      {{$order->ebook->title}}
                                  </td>
                                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    <form action="/orders" method="POST">
                                      @csrf
                                      @method('delete')
                                      <input type="hidden" name="ebook_id" value="{{$order->ebook->ebook_id}}">
                                      <button class="cursor inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                        Delete
                                      </button>
                                    </form>
                                </td>
                              </tr>
                          @endforeach
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
  </div>
  @endif
@endsection
