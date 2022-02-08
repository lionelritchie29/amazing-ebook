@extends('_layout')

@section('title', 'Account Maintenance')

@section('header', 'Account Maintenance')

@section('content')
  {{-- cuma ada admin yg lg login skrg --}}
  @if (count($accounts) == 1) 
    <h1>Ups, there is no accounts</h1>
  @else
    <div class="flex flex-col">
      <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
              <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                  <table class="min-w-full divide-y divide-gray-200">
                      <thead class="bg-blue-500">
                      <tr>
                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                              Account
                          </th>
                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                              Action
                          </th>
                      </tr>
                      </thead>
                      <tbody>
                          @foreach($accounts as $account)
                            @if($account->account_id != Session::get('user')->account_id)
                              <tr class="bg-white">
                                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                      {{$account->first_name . ' ' . $account->middle_name . ' ' . $account->last_name}} - {{ $account->role->role_desc }}
                                  </td>
                                  <td class="space-x-3 flex px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    <a href={{'/update_role/' . $account->account_id}} class="cursor inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                      Update Role
                                    </a>

                                    <form action="{{ '/account/' . $account->account_id }}" method="POST">
                                      @csrf
                                      @method('delete')
                                      <button type="submit" class="cursor inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                        Delete
                                      </button>
                                    </form>
                                </td>
                              </tr>
                              @endif
                          @endforeach
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
  </div>
  @endif
@endsection
