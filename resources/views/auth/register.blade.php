@extends('_layout')

@section('title', 'Register')

@section('header', 'Register')

@section('content')
<div class="mt-8">
  <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
    <form action="{{ route('register') }}" class="space-y-6" enctype="multipart/form-data" method="POST">
      @csrf

      <div>
        <label class="block text-sm font-medium text-gray-700">
          First Name
        </label>
        <div class="mt-1">
          <input name="first_name" type="text" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>
        @error('first_name') <small class="text-red-500">{{$message}}</small> @enderror
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700">
          Middle Name
        </label>
        <div class="mt-1">
          <input name="middle_name" type="text" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>
        @error('middle_name') <small class="text-red-500">{{$message}}</small> @enderror
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700">
          Last Name
        </label>
        <div class="mt-1">
          <input name="last_name" type="text" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>
        @error('last_name') <small class="text-red-500">{{$message}}</small> @enderror
      </div>

      <div>
        <label for="email" class="block text-sm font-medium text-gray-700">
          Email address
        </label>
        <div class="mt-1">
          <input id="email" name="email" type="text" autocomplete="email" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>
        @error('email') <small class="text-red-500">{{$message}}</small> @enderror
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700">
          Gender
        </label>
        <div class="mt-1 flex">
          @foreach ($genders as $gender)
          <div class="mr-5">
            <input name="gender" type="radio" value="{{ $gender->gender_id }}">
              {{$gender->gender_desc}}
          </div>
          @endforeach
        </div>
        @error('gender') <small class="text-red-500">{{$message}}</small> @enderror
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700">
          Role
        </label>
        <select name="role" value={{$roles[0]->role_id}} class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
          @foreach($roles as $role)
            <option value={{ $role->role_id }}>
              {{ $role->role_desc }}
            </option>
          @endforeach
        </select>
        @error('role') <small class="text-red-500">{{$message}}</small> @enderror
      </div>

      <div>
        <label for="password" class="block text-sm font-medium text-gray-700">
          Password
        </label>
        <div class="mt-1">
          <input id="password" name="password" type="password" autocomplete="current-password" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>
        @error('password') <small class="text-red-500">{{$message}}</small> @enderror
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700">
          Display Picture
        </label>
        <input type="file" name="picture">
      </div>
      @error('picture') <small class="text-red-500">{{$message}}</small> @enderror

      <div>
        <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
          Register
        </button>
      </div>
    </form>
  </div>
</div>
@endsection
