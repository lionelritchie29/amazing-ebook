@extends('_layout')

@section('title', 'Update Role')

@section('header', $account->first_name . ' ' . $account->middle_name . ' ' . $account->last_name)

@section('content')
    <form action="{{ '/update_role/' . $account->account_id }}" method="POST">
      @csrf
      <div>
        <label class="block text-sm font-medium text-gray-700">
          Role
        </label>
        <select name="role" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
          @foreach($roles as $role)
            <option {{ $account->role_id == $role->role_id ? 'selected' : '' }} value={{ $role->role_id }}>
              {{ $role->role_desc }}
            </option>
          @endforeach
        </select>
        @error('role') <small class="text-red-500">{{$message}}</small> @enderror
      </div>

      <div class="mt-4">
        <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
          Save
        </button>
      </div>
    </form>
@endsection
