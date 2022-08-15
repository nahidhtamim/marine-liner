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

<div class="object-center bg-no-repeat bg-cover" style="
          background-image: linear-gradient(#00000053, #00000053),
            url(https://images.unsplash.com/photo-1615840287214-7ff58936c4cf?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80);
        ">
    <div class="space-y-2 flex items-center justify-center mx-auto flex-col wrapper">
        <h2 class="text-center text-white font-bold uppercase">Tracking</h2>
        <div class="border-b-4 border-blue-300 pb-4 w-20"></div>
    </div>
</div>

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
        @if($booking_id != null)
        <!-- tracking label start -->
        <div class="flex border flex-col md:flex-row py-3">
            <div class="flex items-center">
                <div class="py-2 px-4 md:border-r-2">
                    <p class="text-xs text-gray-500">Tracking No</p>
                    <h6 class="font-semibold">{{$booking_id}}</h6>
                </div>
            </div>
            {{-- <div class="flex items-center">
                <div class="py-2 px-4">
                    <p class="text-xs text-gray-500">Destination</p>
                    <h6 class="font-semibold">{{$booking->destination_p->name}}, {{$booking->destination_c->name}}</h6>
                </div>
            </div> --}}
        </div>
        <!-- tracking label end -->
        @else
            <!-- tracking label start -->
        <div class="flex border flex-col md:flex-row py-3">
            <div class="flex items-center">
                <div class="py-2 px-4 md:border-r-2">
                    <h6 class="font-semibold">No Booking Yet</h6>
                </div>
            </div>
        </div>
        <!-- tracking label end -->
        @endif
        <!-- tracking table start -->
        @if($trackings->count() >=1)
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
        <p class="text-blue-800 text-xs italic text-center">
          **All dates/times are given as reasonable estimates only and subject to change without prior notice. 
        </p>
        @else
            <!-- tracking label start -->
        <div class="flex border flex-col md:flex-row py-3">
            <div class="flex items-center">
                <div class="py-2 px-4 md:border-r-2">
                    <h6 class="font-semibold">No Tracking Yet</h6>
                </div>
            </div>
        </div>
        <!-- tracking label end -->
        @endif
        <!-- tracking table end -->
    </div>
</section>
<!-- tracking table end -->


@endsection
