@extends('layouts.app')

@section('content')

{{-- <section class="bg-gradient-to-l from-red-50 to-indigo-50">
    <div class="h-full text-gray-800 wrapper">
      <div class="grid md:grid-cols-2 gap-12">
        <div class="flex justify-center items-center md:order-last">
          <div
            class="bg-gradient-to-br from-sky-700 to-sky-500 p-11 rounded-full shadow-inner drop-shadow-md"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="h-60 w-60 order-first md:order-last text-white"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
              stroke-width="2"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"
              />
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"
              />
            </svg>
          </div>
        </div>
        <div class="flex items-center">
          <form class="w-full space-y-6">
            <h1>Track my Shipment</h1>
            <div class="flex flex-wrap -mx-3 mb-6">
              <div class="w-full px-3">
                <label
                  class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                  for="grid-password"
                >
                  Container, Bill of lading or Booking reference
                </label>
                <input
                  class="appearance-none block w-full bg-gray-50 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                  id="grid-password"
                  type="text"
                  placeholder="CMAU0000003"
                />
                <span class="text-gray-500 text-xs leading-none -mt-4"
                  >To track up to three containers, please enter references
                  separated by a comma as 'CMAU0000001, CMAU0000002,
                  CMAU0000003’</span
                >
              </div>
            </div>

            <div class="flex justify-start">
              <button type="button" class="btn-primary px-10">
                Search
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
</section> --}}

<!-- tracking table start -->
<section class="wrapper">
    <div class="space-y-8">
        <!--tracking detail start -->
        <div class="flex items-end flex-col space-y-1">
            <div class="flex space-x-2 items-center">
                <div>
                    <span
                        class="whitespace-nowrap px-2 bg-blue-500 rounded-md font-semibold text-white text-xs">Container
                        to consignee
                    </span>
                </div>
                <h3 class="font-semibold">My Bookings</h3>
            </div>
        </div>
        <!--tracking detail end -->

        @if($bookings->count() == 0)

        <!-- tracking label start -->
        <div class="flex border flex-col md:flex-row py-3">
            <div class="flex items-center">
                <div class="py-2 px-4 text-center">
                    <h6 class="font-semibold text-center">No Booking Yet</h6>
                </div>
            </div>
        </div>
        <!-- tracking label end -->

        @elseif($bookings->count() >= 1)

        <!-- tracking table start -->

        <div class="overflow-x-auto relative">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr class="text-center">
                        <th scope="col" class="py-3 px-6">Tracking ID</th>
                        <th scope="col" class="py-3 px-6">Company Name</th>
                        <th scope="col" class="py-3 px-6">Company Address</th>
                        <th scope="col" class="py-3 px-6">From Country</th>
                        <th scope="col" class="py-3 px-6">From Port</th>
                        <th scope="col" class="py-3 px-6">Destination Country</th>
                        <th scope="col" class="py-3 px-6">Destination Port</th>
                        <th scope="col" class="py-3 px-6">Container</th>
                        <th scope="col" class="py-3 px-6">Booking Date</th>
                        <th scope="col" class="py-3 px-6">Details</th>
                        <th scope="col" class="py-3 px-6">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forEach($bookings as $booking)
                    <tr class="bg-white border-b">
                        <td class="py-4 px-6 whitespace-nowrap">
                          <a href="{{url('/tracking/'.$booking->tracking_id)}}" class="whitespace-nowrap py-1 px-2 bg-blue-50 rounded-md font-semibold text-green-800 text-sm">
                            <ion-icon name="airplane-outline"></ion-icon>
                          </a>
                          &nbsp;{{$booking->tracking_id}}
                        </td>
                        <td class="py-4 px-6 whitespace-nowrap">{{$booking->company_name}}</td>
                        <td class="py-4 px-6 whitespace-nowrap">{{$booking->company_address}}</td>
                        <td class="py-4 px-6 whitespace-nowrap">{{$booking->from_c->name}}</td>
                        <td class="py-4 px-6 whitespace-nowrap">{{$booking->from_p->name}}</td>
                        <td class="py-4 px-6 whitespace-nowrap">{{$booking->destination_c->name}}</td>
                        <td class="py-4 px-6 whitespace-nowrap">{{$booking->destination_p->name}}</td>
                        <td class="py-4 px-6 whitespace-nowrap">{{$booking->container_info->name}}</td>
                        <td class="py-4 px-6 whitespace-nowrap">
                          <span class="flex items-center space-x-1">
                              <svg xmlns="http://www.w3.org/2000/svg"
                                  class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                  stroke-width="2">
                                  <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                              </svg>
                              <span> {{$booking->booking_date}} </span>
                            </span>
                      </td>
                        <td class="py-4 px-6 whitespace-nowrap">{{$booking->goods}}</td>
                        <td class="py-4 px-6 whitespace-nowrap">
                          @if($booking->status == '0')
                          <span class="whitespace-nowrap py-1 px-2 bg-blue-50 rounded-md font-semibold text-yellow-500 text-xs">
                              On Hold
                          </span>
                          @elseif($booking->status == '1')
                          <span class="whitespace-nowrap py-1 px-2 bg-blue-50 rounded-md font-semibold text-green-500 text-xs">
                              Active
                          </span>
                          @else
                          <span class="whitespace-nowrap py-1 px-2 bg-blue-50 rounded-md font-semibold text-blue-500 text-xs">
                              Completed
                          </span>
                          @endif
                      </td>
                    </tr>
                    @endforEach
                </tbody>
            </table>
        </div>

        <!-- tracking table end -->

        @endif
    </div>
</section>
<!-- tracking table end -->

@endsection
