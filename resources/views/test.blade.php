<main>


    @script
        <script src="https://maps.googleapis.com/maps/api/js?key={{ env('LOCATION_API_KEY') }}&libraries=places" async defer></script>
    @endscript

    <script>
        let autocomplete;

        function initAutocomplete() {
            const input = document.getElementById('addressInput');
            if (!window.google || !input) {
                console.error('Google Maps script not loaded or address input not found');
                return;
            }

            autocomplete = new window.google.maps.places.Autocomplete(input, {
                types: ['address'],
                componentRestrictions: {
                    country: []
                }, // Add country code(s) if needed
            });

            autocomplete.addListener('place_changed', onPlaceChanged);
        }

        function onPlaceChanged() {
            const place = autocomplete.getPlace();
            if (!place.geometry) {
                alert('Please select a valid address from the dropdown.');
                return;
            }

            // Update address input value
            const address = place.formatted_address;
            document.getElementById('addressInput').value = address;

            // Reset form fields
            document.getElementById('cityInput').value = '';
            document.getElementById('stateInput').value = '';
            document.getElementById('postalCodeInput').value = '';
            document.getElementById('countryInput').value = '';

            // Fill form fields based on address components
            const components = place.address_components || [];
            components.forEach((component) => {
                const types = component.types;
                if (types.includes('locality')) document.getElementById('cityInput').value = component.long_name;
                if (types.includes('administrative_area_level_1')) document.getElementById('stateInput').value =
                    component.long_name;
                if (types.includes('postal_code')) document.getElementById('postalCodeInput').value = component
                    .long_name;
                if (types.includes('country')) document.getElementById('countryInput').value = component.long_name;
            });

            const destCoords = place.geometry.location;
            calculateShippingCost(destCoords.lat(), destCoords.lng());
        }

        // Initialize after the window loads to ensure script is ready
        window.addEventListener('load', initAutocomplete);
    </script>
</main>
