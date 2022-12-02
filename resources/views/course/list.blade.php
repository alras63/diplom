<?php
use Illuminate\Support\Facades\Storage;
?>

@extends('layouts.app')

@section('content')
    <div class="bg-white">
        <div class="max-w-2xl mx-auto py-16  px-4 sm:py-24 sm:px-6 pt-4 lg:max-w-7xl lg:px-8">
            <h2 class="text-xl font-bold text-gray-900 mb-3">Курсы на платформе</h2>

            <div class="mt-0 grid grid-cols-1 gap-y-12 sm:grid-cols-2 sm:gap-x-6 lg:grid-cols-4 xl:gap-x-8">
                @foreach ($courses as $course)
                    <div class="flex flex-column justify-between">
                        <div class="relative ">
                            <div class="relative w-full h-72  rounded-lg overflow-hidden @if(false == \Illuminate\Support\Facades\Storage::exists($course->url)) bg-blue-100 text-center uppercase flex items-center justify-center text-md font-weight-bold text-blue-400 p-3" @endif>
                                @if(false !== \Illuminate\Support\Facades\Storage::disk('public')->exists($course->url))
                                    <img src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($course->url) }}"
                                        class="w-full h-full object-center object-cover">
                                @else
                                    {{$course->title}}
                                @endif
                            </div>
                            <div class="relative mt-4">
                                <h3 class="text-sm font-medium text-gray-900">{{$course->title}}</h3>
                                <p class="mt-1 text-sm text-gray-500" style="min-height: 30px">{{$course->description}}</p>
                            </div>
                            <div
                                class="absolute top-0 inset-x-0 h-24 rounded-lg p-2 flex items-end justify-end overflow-hidden">
{{--                                <div aria-hidden="true"--}}
{{--                                    class="absolute inset-x-0 bottom-0 h-36 bg-gradient-to-t from-black opacity-50"></div>--}}
                                <div class="p-3 bg-blue-gray-600">
                                    <p class="relative text-lg font-semibold text-white">{{$course->cost}}</p>
                                    <p class="relative text-sm font-normal text-white">{{$course->time}}</p>
                                    <p class="relative text-sm font-normal text-white">{{$course->dates}}</p>
                                </div>

                            </div>
                        </div>
                        <div class="mt-6">
                            <a href="{{ route('course.page', $course->id) }}"
                                class="relative flex bg-blue-100 border border-transparent rounded-md py-2 px-8 items-center justify-center text-sm font-medium text-blue-900 hover:bg-blue-200" style="text-decoration: none !important">Подробнее</a>
                        </div>
                    </div>
                @endforeach



            </div>
        </div>
    </div>
@endsection
