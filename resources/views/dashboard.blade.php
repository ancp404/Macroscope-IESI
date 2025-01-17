{{-- perubahan --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @if(session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{session()->get('success')}}
            </div>
    @endif
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1>Artikel</h1>
                    <a href="{{route('artikel.index')}}">See more</a>
                    @foreach($artikels as $artikel)
                    <div class="py-12">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="p-6 bg-white border-b border-gray-200">
                                    
                                        <h3 class="font-semibold text-lg text-black-400 leading-tight">
                                            <a href="{{route('artikel.show', $artikel)}}">{{$artikel->title}}</a>
                                        </h3>

                                        @can('admin')
                                            <h3 class="font-semibold text-lg text-black-400 leading-tight">
                                                <a href="{{route('artikel.edit', $artikel)}}">Edit</a>

                                                <span class="font-semibold text-lg text-black-400 leading-tight">
                                                    {{-- <a href="{{route('webinar.edit', $webinar)}}">Edit</a> --}}
                        
                                                    <x-dropdown width="48">
                                                        <x-slot name="trigger">
                                                            <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                                                <div>⚙️</div>
                                    
                                                                <div class="ml-1">
                                                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                                    </svg>
                                                                </div>
                                                            </button>
                                                        </x-slot>
                                    
                                                        <x-slot name="content">
                                                            <x-dropdown-link href="{{route('artikel.edit', $artikel)}}">
                                                                    {{ __('Edit artikel') }}
                                                            </x-dropdown-link>
                                                            <!-- Authentication -->
                                                            {{-- <form method="POST" action="{{ route('logout') }}">
                                                                @csrf
                                    
                                                                <x-dropdown-link :href="route('logout')"
                                                                        onclick="event.preventDefault();
                                                                                    this.closest('form').submit();">
                                                                    {{ __('Log Out') }}
                                                                </x-dropdown-link>
                                                            </form> --}}
                        
                                                            <form action="{{route('artikel.destroy', $artikel->id)}}" method="post">
                                                                @method('delete')
                                                                @csrf
                                                                <x-dropdown-link :href="route('artikel.destroy', $artikel->id)"
                                                                        onclick="event.preventDefault();
                                                                                    this.closest('form').submit();">
                                                                    {{ __('Delete') }}
                                                                </x-dropdown-link>
                                                                
                                                            </form>
                                                        </x-slot>
                                    
                                                        
                                                    </x-dropdown>
                                                </span>
                                            </h3>
                                        @endcan

                                        <h5 class="font-thin text-sm text-black-100 leading-tight">
                                            {{$artikel->author}}
                                        </h5>

                                        <h5 class="font-thin text-base text-black-200 leading-tight">
                                            {{$artikel->content}}
                                        </h5>

                                        <h3 class="font-semibold text-lg text-black-400 leading-tight">
                                            <a href="{{route('artikel.show', $artikel)}}">Read More</a>
                                        </h3>
                                        
                                </div>
                            </div>
                        </div>
                    </div>

    
    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1>Webinar</h1>
                    <a href="{{route('webinar.index')}}">See more</a>
                    @foreach($webinars as $webinar)
                        <div class="py-12">
                            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                    <div class="p-6 bg-white border-b border-gray-200">
                                        
                                            <h3 class="font-semibold text-lg text-black-400 leading-tight">
                                                {{$webinar->title}}
                                            </h3>
                    
                                            @can('admin')
                                            <span class="font-semibold text-lg text-black-400 leading-tight">
                                                {{-- <a href="{{route('webinar.edit', $webinar)}}">Edit</a> --}}
                    
                                                <x-dropdown width="48">
                                                    <x-slot name="trigger">
                                                        <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                                            <div>⚙️</div>
                                
                                                            <div class="ml-1">
                                                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                                </svg>
                                                            </div>
                                                        </button>
                                                    </x-slot>
                                
                                                    <x-slot name="content">
                                                        <x-dropdown-link href="{{route('webinar.edit', $webinar)}}">
                                                                {{ __('Edit webinar') }}
                                                        </x-dropdown-link>
                                                        <!-- Authentication -->
                    
                                                        <form action="{{route('webinar.destroy', $webinar->id)}}" method="post">
                                                            @method('delete')
                                                            @csrf
                                                            <x-dropdown-link :href="route('webinar.destroy', $webinar->id)"
                                                                    onclick="event.preventDefault();
                                                                                this.closest('form').submit();">
                                                                {{ __('Delete') }}
                                                            </x-dropdown-link>
                                                            
                                                        </form>
                                                    </x-slot>
                                
                                                    
                                                </x-dropdown>
                                            </span>
                                            @endcan
                    
                                            <h5 class="font-thin text-sm text-black-100 leading-tight">
                                                {{$webinar->speaker}}
                                            </h5>
                    
                                            <h5 class="font-thin text-base text-black-200 leading-tight">
                                                {{$webinar->date}}
                                            </h5>
                    
                                            <h5 class="font-thin text-base text-black-200 leading-tight">
                                                <a href="{{$webinar->link}}">Enter</a>
                                                
                                            </h5>
                                            
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
