@extends('layouts.app-layout')

@section('content')
 <!-- Start block -->
 <section class="bg-white dark:bg-gray-900">
        <div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-28">
            <div class="mr-auto place-self-center lg:col-span-7">
                <h1 class="max-w-2xl mb-4 text-4xl font-extrabold leading-none tracking-tight md:text-5xl xl:text-6xl dark:text-white">Welcome To our<br>Vaccine Center</h1>
                <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">We’re here to make vaccination easy and accessible for everyone! Our landing page is designed using the latest web technologies, including Tailwind CSS for sleek and responsive design, Flowbite Library for dynamic components, and the Blocks System for seamless integration.

Getting vaccinated has never been simpler. Register through our streamlined process using Google Forms. It’s free, user-friendly, and helps us ensure a smooth vaccination experience for everyone.</p>
                <div class="space-y-4 sm:flex sm:space-y-0 sm:space-x-4">
                    <a href="{{route('users.register')}}" class="inline-flex items-center justify-center w-full px-5 py-3 text-sm font-medium text-white bg-blue-600 rounded-lg sm:w-auto hover:bg-blue-700 focus:ring-4 focus:ring-blue-300">
                         Register for Vaccine
                    </a>

                    <a href="https://forms.gle/yBbM34QGKz1k6Uab7" class="inline-flex items-center justify-center w-full px-5 py-3 text-sm font-medium text-white bg-green-600 rounded-lg sm:w-auto hover:bg-green-700 focus:ring-4 focus:ring-green-300">
                        Register with Google Form
                    </a>
                </div>
            </div>
            <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
                <img src="{{asset('img/logo.webp')}}" alt="hero image">
            </div>
        </div>
    </section>
    <!-- End block -->
@endsection
