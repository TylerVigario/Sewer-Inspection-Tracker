<div class="map" data-zoom="19">
    <div class="viewport"></div>
    <div class="marker" data-title="0" data-geocode data-clickable data-draggable>
        <input type="hidden" name="lat" id="lat" value="{{ $position[0] ?? '36.908035' }}" />
        <input type="hidden" name="lng" id="lng" value="{{ $position[1] ?? '-119.794041' }}" />
    </div>
    <div class="py-4" x-data="{ enabled: false }">
        <div class="mt-4 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="sm:col-span-4">
                <label for="city" class="block text-sm/6 font-medium text-gray-900">City</label>
                <div class="mt-2">
                    <input type="text" name="city" id="city" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                </div>
            </div>

            <div class="sm:col-span-2">
                <label for="state" class="block text-sm/6 font-medium text-gray-900">State / Province</label>
                <div class="mt-2">
                    <input type="text" name="state" id="state" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                </div>
            </div>
        </div>
    </div>
</div>
