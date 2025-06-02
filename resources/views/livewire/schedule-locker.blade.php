@php
    use App\Http\Controllers\LockerController;
    $lockers = LockerController::index();
    $count = count($lockers);
@endphp
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h2 class="text-2xl font-bold mb-6">Schedule a Locker: {{ $count }} available</h2>
                
                @if (session()->has('error'))
                    <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                        {{ session('error') }}
                    </div>
                @endif

                @if (session()->has('message'))
                    <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                        {{ session('message') }}
                    </div>
                @endif
                
                <form wire:submit.prevent="schedule" class="space-y-6">
                    <div>
                        <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                        <select wire:model.live="location" id="location" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <option value="">Select a location</option>
                            <option value="tech">Technological Institute</option>
                            <option value="allison">Allison Hall</option>
                            <option value="norris">Norris University Center</option>
                        </select>
                        @error('location') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label for="locker_size" class="block text-sm font-medium text-gray-700">Locker Size</label>
                        <select wire:model.live="locker_size" id="locker_size" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" {{ empty($location) ? 'disabled' : '' }}>
                            <option value="">Select a locker size</option>
                            @foreach($available_sizes as $size)
                                @php
                                    $count = \App\Models\Locker::where('location', $location)
                                        ->where('locker_size', $size)
                                        ->where('status', 'available')
                                        ->count();
                                @endphp
                                <option value="{{ $size }}">
                                    @switch($size)
                                        @case('small')
                                            Small: 24 x 24 cm ({{ $count }} available)
                                            @break
                                        @case('medium')
                                            Medium: 40 x 30 cm ({{ $count }} available)
                                            @break
                                        @case('large')
                                            Large: 40 x 35 cm ({{ $count }} available)
                                            @break
                                        @case('x-large')
                                            Extra Large: 120 x 40 cm ({{ $count }} available)
                                            @break
                                    @endswitch
                                </option>
                            @endforeach
                        </select>
                        @error('locker_size') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label for="duration" class="block text-sm font-medium text-gray-700">Duration</label>
                        <select wire:model="duration" id="duration" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <option value="">Select duration</option>
                            <option value="12">12 Hours</option>
                            <option value="24">24 Hours</option>
                        </select>
                        @error('duration') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="flex items-center justify-end">
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-600 focus:bg-blue-600 active:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Schedule Locker
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
