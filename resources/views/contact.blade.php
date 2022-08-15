@extends('layouts.app')

@section('content')

<div class="object-center bg-no-repeat bg-cover" style="
          background-image: linear-gradient(#00000053, #00000053),
            url(https://images.unsplash.com/photo-1615840287214-7ff58936c4cf?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80);
        ">
    <div class="space-y-6 flex items-center justify-center mx-auto flex-col wrapper">
        <h2 class="text-center text-white font-bold uppercase">Contact Us</h2>
        <div class="border-b-4 border-blue-300 pb-4 w-20"></div>
    </div>
</div>
<section class="wrapper">
    <div class="h-full text-gray-800">
        <div class="grid md:grid-cols-2 gap-12">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.8170858156736!2d101.69790721522754!3d3.142938054066106!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc49d0e9850f8f%3A0x84ee5fabba2ee59a!2sRumah%20B%20P%2C%204%2C%20Jalan%20Hang%20Jebat%2C%20City%20Centre%2C%2050150%20Kuala%20Lumpur%2C%20Wilayah%20Persekutuan%20Kuala%20Lumpur%2C%20Malaysia!5e0!3m2!1sen!2sbd!4v1660597056629!5m2!1sen!2sbd"
                style="border: 0" allowfullscreen="" class="w-full h-full min-h-[450px]" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
                @if (Session::has('message_sent'))
                    <div class="bg-green-100 text-center rounded-lg px-6 text-base text-green-700 py-2" role="alert">
                        {{Session::get('message_sent')}}
                        <a href="" class="alert-del">&times;</a>
                    </div>
                @endif
            <form class="w-full space-y-6" method="POST" action="{{route('contact.send')}}">
                @csrf
                <h1>Contact Us</h1>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                            for="grid-password">
                            Name <span class="text-red-500">*</span>
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-50 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="grid-password" type="text" name="name" required=""/>
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                            for="grid-password">
                            Company Name 
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-50 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="grid-password" type="text" name="company_name" required=""/>
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                            for="grid-password">
                            Email <span class="text-red-500">*</span>
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-50 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="grid-password" type="email" name="email" required=""/>
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                            for="grid-password">
                            Phone
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-50 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="grid-password" type="tel" name="phone" required=""/>
                    </div>
                </div>

                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                            for="grid-password">
                            Message <span class="text-red-500">*</span>
                        </label>

                        <textarea id="content" rows="4"
                            class="appearance-none block w-full bg-gray-50 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                             name="content"></textarea>
                    </div>
                </div>

                <div class="flex flex-wrap -mx-3 mb-2">
                    <div class="w-full md:w-1/2 px-3">
                        <div class="single-input-field{{$errors->has('captcha') ? 'has-error' : ''}}">
                            <div class="captcha">
                                <span>{!! captcha_img('flat') !!}</span>
                                <button type="button" class="px-6 py-3 btn-secondary btn-refresh">
                                    Refresh
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                            for="company_address">
                            Captcha <span class="text-red-500">*</span>
                        </label>
                        <input class="appearance-none py-3 px-4 pr-8 leading-tight focus:outline-none bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2" 
                        id="captcha" type="text" placeholder="Type What You See" name="captcha"  required=""/>
                        @if ($errors->has('captcha'))
                        <span class="text-red-500">
                            @error('message')
                                <p class="text-red-500">{{$message}} {{$errors->first('captcha')}}</p> 
                            @enderror
                        </span> 
                        @endif
                    </div>
                  </div>


                <div class="flex justify-end">
                    <button type="submit" class="px-6 py-4 btn-primary">
                        Send Message
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection
