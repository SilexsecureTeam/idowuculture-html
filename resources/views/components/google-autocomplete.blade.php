<div>
   @push('scripts')
    <script src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google_maps.key') }}&libraries=places"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const input = document.getElementById('autocomplete');
            if (!input) return;

            const autocomplete = new google.maps.places.Autocomplete(input);

            autocomplete.addListener('place_changed', function () {
                const place = autocomplete.getPlace();
                input.value = place.formatted_address || place.name;
            });
        });
    </script>
@endpush
</div>
