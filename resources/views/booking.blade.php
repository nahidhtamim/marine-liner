@extends('layouts.app')

@section('content')
@if (session('status'))
<div class="bg-green-100 text-center rounded-lg px-6 text-base text-green-700 py-2" role="alert">
    {{ session('status') }}
    <a href="" class="alert-del">&times;</a>
</div>
@endif
<section class="bg-gradient-to-l from-red-50 to-indigo-50">
    <div class="h-full text-gray-800 wrapper">
        <div class="grid md:grid-cols-2 gap-12">
            
            
            <form class="w-full space-y-6" method="POST" action="{{url('/make-booking')}}">
                @csrf
                <h1>Make Booking</h1>
                <div class="flex flex-wrap -mx-3 mb-2">
                  <div class="w-full md:w-1/2 px-3">
                      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                          for="company_name">
                          Company Name <span class="text-red-500">*</span>
                      </label>
                      <input class="appearance-none py-3 px-4 pr-8 leading-tight focus:outline-none bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2" id="company_name" type="text" placeholder="Company Name" name="company_name"  required=""/>
                  </div>
                  <div class="w-full md:w-1/2 px-3">
                      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                          for="company_address">
                          Company Address <span class="text-red-500">*</span>
                      </label>
                      <input class="appearance-none py-3 px-4 pr-8 leading-tight focus:outline-none bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2" id="company_address" type="text" placeholder="Company Address" name="company_address"  required=""/>
                  </div>
                </div>
                
                <div class="flex flex-wrap -mx-3 mb-2">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                            for="from_country">
                            From Country <span class="text-red-500">*</span>
                        </label>
                        <select
                            class="appearance-none py-3 px-4 pr-8 leading-tight focus:outline-none bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 "
                            id="from_country" name="from_country" required="">
                            <option>Select A Country</option>
                            @forEach($countries as $country)
                            <option value="{{$country->id}}">{{$country->name}}</option>
                            @endforEach
                        </select>
                    </div>
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                            for="from_port">
                            From Port <span class="text-red-500">*</span>
                        </label>
                        <select
                            class="appearance-none py-3 px-4 pr-8 leading-tight focus:outline-none bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 "
                            id="from_port" name="from_port" required="">
                            <option>Select A Port</option>
                        </select>
                    </div>
                </div>

                <div class="flex flex-wrap -mx-3 mb-2">
                  <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                          for="destination_country">
                          Destination Country <span class="text-red-500">*</span>
                      </label>
                      <select
                          class="appearance-none py-3 px-4 pr-8 leading-tight focus:outline-none bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 "
                          id="destination_country" name="destination_country" required="">
                          <option>Select A Country</option>
                          @forEach($countries as $country)
                          <option value="{{$country->id}}">{{$country->name}}</option>
                          @endforEach
                      </select>
                  </div>
                  <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                          for="destination_port">
                          Destination Port <span class="text-red-500">*</span>
                      </label>
                      <select
                          class="appearance-none py-3 px-4 pr-8 leading-tight focus:outline-none bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 "
                          id="destination_port" name="destination_port" required="">
                          <option>Select A Port</option>
                      </select>
                  </div>
              </div>

                <div class="flex flex-wrap -mx-3 mb-6">
                  <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                          for="container_id">
                          Container Type <span class="text-red-500">*</span>
                      </label>
                      <select
                          class="appearance-none py-3 px-4 pr-8 leading-tight focus:outline-none bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                          id="container_id" name="container_id" required="">
                          <option>Select A Container</option>
                          @forEach($containers as $container)
                          <option value="{{$container->id}}">{{$container->name}}</option>
                          @endforEach
                      </select>
                  </div>
                    <div class="w-full md:w-1/2 px-3 mt-5 md:mt-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                            for="booking_date">
                            Booking Date <span class="text-red-500">*</span>
                        </label>
                        <input class="appearance-none block w-full bg-gray-50 text-gray-700 border border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="grid-last-name" type="date" placeholder="Doe" name="booking_date" required=""/>
                    </div>
                </div>

                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                            for="goods">
                            Description of Your Goods <span class="text-red-500">*</span>
                        </label>
                        <textarea name="goods" id="goods" rows="2" class="appearance-none block w-full bg-gray-50 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"> Details about your goods</textarea>
                    </div>
                </div>

                    @if(!Auth::check()) 
                    <div class="flex justify-end">
                        <button type="submit" class="btn-primary disabled">
                            Book
                        </button>
                    </div>
                    <p class="text-red-600 text-xs italic text-center">
                        Please Login or Register to make a booking!!!
                    </p>
                    @else
                    <div class="flex justify-end">
                        <button type="submit" class="btn-primary">
                            Book
                        </button>
                    </div>
                    @endif
            </form>
            <div class="flex justify-center items-center">
                <img src="{{asset('frontend/assets/images/example-7.svg')}}" class="w-full order-first md:order-last"
                    alt="bg-image" />
            </div>
        </div>
    </div>
</section>

<style>
    .disabled{
  pointer-events: none;
  cursor: not-allowed;
  opacity: 0.65;
  filter: alpha(opacity=65);
  -webkit-box-shadow: none;
  box-shadow: none;}
</style>

@endsection
