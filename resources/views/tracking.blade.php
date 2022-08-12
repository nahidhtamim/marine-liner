@extends('layouts.app')

@section('content')

<style>

.timeline {
  margin: 2px 0;
  list-style-type: none;
  display: flex;
  padding: 0;
  text-align: center;
}
.timeline li {
  transition: all 200ms ease-in;
}
.timestamp {
  width: 100%;
  margin-bottom: 20px;
  padding: 0px 40px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  font-weight: 100;
}
.status {
  padding: 0px 40px;
  display: flex;
  justify-content: center;
  border-top: 4px solid #0369A1;
  position: relative;
  transition: all 200ms ease-in;
}
.status span {
  font-weight: 600;
  padding-top: 20px;
}
.status span:before {
  content: '';
  width: 25px;
  height: 25px;
  background-color: #27A7DF;
  border-radius: 25px;
  /* border: 4px solid #0369A1; */
  position: absolute;
  top: -15px;
  left: calc(50% - 12px);
  transition: all 200ms ease-in;
}
.swiper-control {
  text-align: right;
}
.swiper-container {
  width: 100%;
  margin: 50px 0;
  overflow: hidden;
  padding: 0 20px 30px 20px;
}
.swiper-slide {
  width: 200px;
  text-align: center;

}
.swiper-slide:nth-child(2n) {
  width: 40%;
}
.swiper-slide:nth-child(3n) {
  width: 20%;
}

</style>

<section class="bg-gradient-to-l from-red-50 to-indigo-50">
    <div class="h-full text-gray-800 wrapper">
        <div class="grid md:grid-cols-2 gap-12">
            <div class="flex justify-center items-center md:order-last">
                <div class="bg-gradient-to-br from-sky-700 to-sky-500 p-11 rounded-full shadow-inner drop-shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-60 w-60 order-first md:order-last text-white"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
            </div>
            <div class="flex items-center">
                <h1>Track my Shipment</h1>
                
            </div>
        </div>
    </div>
</section>

<!-- tracking table start -->
<section class="wrapper">
    <div class="space-y-8">
        <!--tracking detail start -->
        <div class="flex items-end flex-col space-y-1">
          <div id="app" class="container">
            <div class="row">
              <div class="col-md-12">
                {{-- <h1>Horizontal Timeline with Swiper</h1>
                Credit : 
                <ul>
                  <li>Horizontal timeline CSS based on <a href="https://codepen.io/abhisharma2/pen/vEKWVo">https://codepen.io/abhisharma2/pen/vEKWVo</a> with a few modifications.</li>  
                  <li>Website development step <a href="https://xbsoftware.com/blog/website-development-process-full-guide/">https://xbsoftware.com/blog/website-development-process-full-guide/</a></li>
                  <li>Swiper Grab Cursor <a href="http://idangero.us/swiper/demos/12-grab-cursor.html">http://idangero.us/swiper/demos/12-grab-cursor.html</a></li>
                </ul> --}}
                <div class="swiper-container">
                  {{-- <p class="swiper-control">
                    <button type="button" class="btn btn-default btn-sm prev-slide">Prev</button>
                    <button type="button" class="btn btn-default btn-sm next-slide">Next</button>
                  </p> --}}
                  <div class="swiper-wrapper timeline">
                    @foreach ($trackings as $tracking)
                    <div class="swiper-slide">
                      <div class="timestamp">
                        <span class="date"><span>
                      </div>
                      <div class="status">
                        <span>{{$tracking->country_info->name}}, {{$tracking->port_info->name}}</span>
                      </div>
                    </div>
                    @endforeach

                  </div>
                  <!-- Add Pagination -->
                  <div class="swiper-pagination"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--tracking detail end -->
        <!-- tracking label start -->
        <div class="flex border flex-col md:flex-row py-3">
            <div class="flex items-center">
                <div class="py-2 px-4 md:border-r-2">
                    <p class="text-xs text-gray-500">Tracking No</p>
                    <h6 class="font-semibold">{{$booking_id}}</h6>
                </div>
            </div>
            <div class="flex items-center">
                <div class="py-2 px-4">
                    <p class="text-xs text-gray-500">Destination</p>
                    <h6 class="font-semibold">{{$booking->destination_p->name}}, {{$booking->destination_c->name}}</h6>
                </div>
            </div>
        </div>
        <!-- tracking label end -->
        <!-- tracking table start -->

        <div class="overflow-x-auto relative">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="py-3 px-6">Current Country</th>
                        <th scope="col" class="py-3 px-6">Current Port</th>
                        <th scope="col" class="py-3 px-6">Status</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($trackings as $tracking)
                    <tr class="bg-white border-b">
                      <td class="py-4 px-6 whitespace-nowrap">{{$tracking->country_info->name}}</td>
                      <td class="py-4 px-6 whitespace-nowrap">{{$tracking->port_info->name}}</td>
                      <td class="py-4 px-6 whitespace-nowrap">
                          @if($tracking->status == '0')
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
                  @endforeach
                </tbody>
            </table>
        </div>

        <!-- tracking table end -->
    </div>
</section>
<!-- tracking table end -->

@endsection
