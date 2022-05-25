@extends('layouts.app')

@section('content')
    <link href="{{ asset('css/app-tailwind.css') }}" rel="stylesheet">
    <link href="{{ asset('css/components-v2.css') }}" rel="stylesheet">

    <section id="comp">
        <div class="container">
            <div class="card_alras">
                <h2 class="text-3xl font-bold">
                    Центр управления компетенциями
                </h2>
                <h3 class="text-xl font-bold mt-3 mb-3">

                </h3>
                <div class="bg-white">
                    <div>
                        <!--
                          Mobile filter dialog

                          Off-canvas menu for mobile, show/hide based on off-canvas menu state.
                        -->
                        <div class="fixed inset-0 flex z-40 lg:hidden" role="dialog" aria-modal="true"
                             style="display: none" id="filterBlock">
                            <!--
                              Off-canvas menu overlay, show/hide based on off-canvas menu state.

                              Entering: "transition-opacity ease-linear duration-300"
                                From: "opacity-0"
                                To: "opacity-100"
                              Leaving: "transition-opacity ease-linear duration-300"
                                From: "opacity-100"
                                To: "opacity-0"
                            -->
                            <div class="fixed inset-0 bg-black bg-opacity-25" aria-hidden="true" id="overlayBlock">

                                <!--
                                  Off-canvas menu, show/hide based on off-canvas menu state.

                                  Entering: "transition ease-in-out duration-300 transform"
                                    From: "translate-x-full"
                                    To: "translate-x-0"
                                  Leaving: "transition ease-in-out duration-300 transform"
                                    From: "translate-x-0"
                                    To: "translate-x-full"
                                -->
                                <div
                                    class="ml-auto relative max-w-xs w-full h-full bg-white shadow-xl py-4 pb-6 flex flex-col overflow-y-auto filterContentBlock"
                                    id="filterContentBlock">
                                    <div class="px-4 flex items-center justify-between">
                                        <h2 class="text-lg font-medium text-gray-900">Filters</h2>
                                        <button type="button"
                                                class="-mr-2 w-10 h-10 p-2 flex items-center justify-center text-gray-400 hover:text-gray-500"
                                                id="closeFilter">
                                            <span class="sr-only">Close menu</span>
                                            <!-- Heroicon name: outline/x -->
                                            <svg class="h-6 w-6 closeicon" xmlns="http://www.w3.org/2000/svg"
                                                 fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                 aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M6 18L18 6M6 6l12 12" class="closeicon"/>
                                            </svg>
                                        </button>
                                    </div>
                                    <!-- Filters -->
                                    <form class="mt-4 px-3 py-3" method="post">
                                        <div>
                                            <fieldset>
                                                <legend class="block text-sm font-medium text-gray-900">Блок
                                                    компетенций
                                                </legend>
                                                <div class="pt-6 space-y-3">
                                                    @foreach ($competentionsBlock as $comp_block)
                                                        <div class="flex items-center">
                                                            <input id="color-0" name="{{$comp_block->slug}}[]"
                                                                   value="{{$comp_block->id}}" type="checkbox"
                                                                   class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                                            <label for="color-0"
                                                                   class="ml-3 text-sm text-gray-600"> {{$comp_block->name}} </label>
                                                        </div>
                                                    @endforeach

                                                    <button type="submit"
                                                            class="no-underline mx-2 bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                                                        Подобрать курс
                                                    </button>


                                                </div>
                                            </fieldset>
                                        </div>
                                    </form>
                                </div>


                            </div>
                        </div>

                        <main class="max-w-2xl lg:max-w-7xl">
                            <div class="border-b border-gray-200 pb-10">
                                <h2 class="text-2xl font-bold tracking-tight text-gray-800  my-3 mt-5">Программы
                                    компетенций</h2>
                                <p class="mt-4 text-base text-gray-500">Выберите подходящую для вас программу, используя
                                    фильтр компетенций</p>
                            </div>

                            <div class="pt-12 lg:grid lg:grid-cols-3 lg:gap-x-8 xl:grid-cols-4">
                                <aside>
                                    <h2 class="sr-only">Фильтры</h2>

                                    <button type="button" class="inline-flex items-center lg:hidden" id="buttonFilters">
                                        <span class="text-sm font-medium text-gray-700">Фильтры</span>
                                        <svg class="flex-shrink-0 ml-1 h-5 w-5 text-gray-400"
                                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                             aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                  d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                                  clip-rule="evenodd"/>
                                        </svg>
                                    </button>

                                    <div class="hidden lg:block">
                                        <form class="divide-y divide-gray-200 space-y-5" action="/competentions"
                                              method="POST">
                                            @csrf
                                            <div>
                                                <fieldset>
                                                    <legend class="block text-sm font-medium text-gray-900">Блок
                                                        компетенций
                                                    </legend>
                                                    <div class="pt-6 space-y-3">
                                                        @foreach ($competentionsBlock as $comp_block)
                                                            <div class="flex items-center">
                                                                <input id="color-0" name="{{$comp_block->slug}}[]"
                                                                       value="{{$comp_block->id}}" type="checkbox"
                                                                       class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                                                <label for="color-0"
                                                                       class="ml-3 text-sm text-gray-600"> {{$comp_block->name}} </label>
                                                            </div>
                                                        @endforeach


                                                        <button type="submit"
                                                                class="no-underline mx-2 bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                                                            Подобрать курс
                                                        </button>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </form>
                                    </div>
                                </aside>

                                <div class="mt-6 lg:mt-0 lg:col-span-2 xl:col-span-3">
                                    @if (!isset($courses))
                                        <div class="p-5 leading-normal text-blue-700 border border-blue-500 rounded-lg"
                                             role="alert">
                                            <p>Выберите фильтры, чтобы посмотреть список курсов, подходящий именно
                                                Вам!</p>
                                        </div>


                                    @endif

                                    <div class="grid gap-8 lg:grid-cols-3">
                                        @if (isset($courses))
                                            @foreach ($courses as $course)
                                                <div>
                                                    <div class="relative">
                                                        <div class="relative w-full h-72 rounded-lg overflow-hidden">
                                                            <img src="{{ \Illuminate\Support\Facades\Storage::url($course->url) }}"
                                                                 class="w-full h-full object-center object-cover">
                                                        </div>
                                                        <div class="relative mt-4">
                                                            <h3 class="text-sm font-medium text-gray-900">{{$course->title}}</h3>
                                                            <p class="mt-1 text-sm text-gray-500"
                                                               style="min-height: 130px">{{$course->description}}</p>
                                                        </div>
                                                        <div
                                                            class="absolute top-0 inset-x-0 h-72 rounded-lg p-4 flex items-end justify-end overflow-hidden">
                                                            <div aria-hidden="true"
                                                                 class="absolute inset-x-0 bottom-0 h-36 bg-gradient-to-t from-black opacity-50"></div>
                                                            <div>
                                                                <p class="relative text-lg font-semibold text-white">{{$course->cost}}</p>
                                                                <p class="relative text-sm font-normal text-white">{{$course->dates}}</p>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="mt-6">
                                                        <a href="{{ route('course.page', $course->id) }}"
                                                           class="relative flex bg-blue-100 border border-transparent rounded-md py-2 px-8 items-center justify-center text-sm font-medium text-blue-900 hover:bg-blue-200"
                                                           style="text-decoration: none !important">Подробнее</a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </main>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
