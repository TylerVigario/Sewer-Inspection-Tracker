import { Loader } from "@googlemaps/js-api-loader";

if (document.getElementsByClassName("map").length > 0) {
    new Loader({
        apiKey: import.meta.env.VITE_GOOGLE_API_KEY,
        version: "beta",
        libraries: ["places"],
    })
        .load()
        .then(async () => {
            Array.from(document.getElementsByClassName("map")).forEach(
                async (mapElement) => {
                    //#region Map
                    const { Map } = await google.maps.importLibrary("maps");
                    let center;
                    if (
                        mapElement.hasAttribute("data-center") &&
                        mapElement.dataset.center.length > 0
                    ) {
                        center = mapElement.dataset.center.split(",");
                        center = {
                            lat: parseFloat(center[0]),
                            lng: parseFloat(center[1]),
                        };
                    } else {
                        center = {
                            lat: 36.908035,
                            lng: -119.794041,
                        };
                    }

                    const map = new Map(
                        mapElement.getElementsByClassName("viewport")[0],
                        {
                            zoom: parseInt(mapElement.dataset.zoom),
                            center: center,
                            mapId: mapElement.dataset.id ?? "TEST_MAP_ID",
                        }
                    );
                    //#endregion

                    //#region Place Picker (Google)
                    await google.maps.importLibrary("places");

                    const placeAutocomplete =
                        new google.maps.places.PlaceAutocompleteElement();

                    placeAutocomplete.classList.add(
                        "mt-3",
                        "bg-white",
                        "sm:text-sm/6",
                        "shadow"
                    );

                    placeAutocomplete.style["width"] = "300px";

                    map.controls[google.maps.ControlPosition.TOP_CENTER].push(
                        placeAutocomplete
                    );

                    placeAutocomplete.addEventListener(
                        "gmp-placeselect",
                        async ({ place }) => {
                            if (
                                locationButton.classList.contains(
                                    "text-blue-500"
                                )
                            ) {
                                locationButton.click();
                            }

                            await place.fetchFields({
                                fields: [
                                    "displayName",
                                    "formattedAddress",
                                    "location",
                                ],
                            });

                            if (place.viewport) {
                                map.fitBounds(place.viewport);
                            } else {
                                map.setCenter(place.location);
                                map.setZoom(17);
                            }

                            console.debug(place);
                        }
                    );
                    //#endregion

                    //#region Place Picker (Custom)
                    /*const searchInputDiv = document.createElement("div");

                    searchInputDiv.classList.add("m-2", "grid", "grid-cols-1");

                    const searchInput = document.createElement("input");

                    searchInput.type = "text";
                    searchInput.placeholder = "Search for a place...";
                    searchInput.style.width = "300px";
                    searchInput.classList.add(
                        //"mt-2",
                        "py-2",
                        "rounded-sm",
                        "shadow-lg",
                        "border-none",
                        //
                        "col-start-1",
                        "row-start-1",
                        "block",
                        "w-full",
                        //"bg-white",
                        "pl-3",
                        "pr-10",
                        "text-base",
                        "text-gray-900",
                        //"outline",
                        //"outline-1",
                        //"-outline-offset-1",
                        //"outline-gray-300",
                        "placeholder:text-gray-400",
                        //"focus:outline",
                        //"focus:outline-2",
                        //"focus:-outline-offset-2",
                        //"focus:outline-indigo-600",
                        "sm:pr-9",
                        "sm:text-sm/6"
                    );

                    searchInputDiv.appendChild(searchInput);

                    const searchInputSvg = document.createElementNS(
                        "http://www.w3.org/2000/svg",
                        "svg"
                    );

                    searchInputSvg.classList.add(
                        "pointer-events-none",
                        "col-start-1",
                        "row-start-1",
                        "mr-3",
                        "size-5",
                        "self-center",
                        "justify-self-end",
                        "text-gray-400",
                        "sm:size-4"
                    );

                    searchInputSvg.setAttribute("fill", "none");
                    searchInputSvg.setAttribute("viewBox", "0 0 24 24");
                    searchInputSvg.setAttribute("stroke-width", "1.5");
                    searchInputSvg.setAttribute("stroke", "currentColor");
                    searchInputSvg.setAttribute("aria-hidden", "true");
                    searchInputSvg.setAttribute("data-slot", "icon");

                    const searchInputSvgPath = document.createElementNS(
                        "http://www.w3.org/2000/svg",
                        "path"
                    );

                    searchInputSvgPath.setAttribute("stroke-linecap", "round");
                    searchInputSvgPath.setAttribute("stroke-linejoin", "round");
                    searchInputSvgPath.setAttribute(
                        "d",
                        "m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"
                    );

                    searchInputSvg.appendChild(searchInputSvgPath);

                    searchInputDiv.appendChild(searchInputSvg);

                    map.controls[google.maps.ControlPosition.TOP_CENTER].push(
                        searchInputDiv
                    );

                    searchInput.addEventListener("keydown", async (event) => {
                        if (event.key === "Enter") {
                            const { Place } = await google.maps.importLibrary(
                                "places"
                            );

                            const request = {
                                textQuery: searchInput.value,
                                //fields: ["displayName", "location", "businessStatus"],
                                //includedType: "restaurant",
                                locationBias: map.getCenter(),
                                //isOpenNow: true,
                                language: "en-US",
                                //maxResultCount: 8,
                                //minRating: 3.2,
                                region: "us",
                                //useStrictTypeFiltering: false,
                            };

                            const { places } = await Place.searchByText(
                                request
                            );

                            if (places.length) {
                                console.log(places);

                                const { LatLngBounds } =
                                    await google.maps.importLibrary("core");
                                const bounds = new LatLngBounds();

                                // Loop through and get all the results.
                                places.forEach((place) => {
                                    const markerView =
                                        new AdvancedMarkerElement({
                                            map,
                                            position: place.location,
                                            title: place.displayName,
                                        });

                                    bounds.extend(place.location);
                                    console.log(place);
                                });
                                map.fitBounds(bounds);
                            } else {
                                console.log("No results");
                            }
                        }
                    });*/
                    //#endregion

                    //#region Geolocation
                    const buttonClassList = [
                        "rounded-sm",
                        "bg-white",
                        "p-2",
                        "text-gray-600",
                        "shadow-md",
                        "hover:text-black",
                    ];

                    const locationDiv = document.createElement("div");

                    const locationButton = document.createElement("button");

                    locationButton.classList.add("ml-2", ...buttonClassList);

                    locationButton.innerHTML =
                        '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">' +
                        '<path fill-rule="evenodd" d="m11.54 22.351.07.04.028.016a.76.76 0 0 0 .723 0l.028-.015.071-.041a16.975 16.975 0 0 0 1.144-.742 19.58 19.58 0 0 0 2.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 0 0-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 0 0 2.682 2.282 16.975 16.975 0 0 0 1.145.742ZM12 13.5a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" clip-rule="evenodd" />' +
                        "</svg>";

                    locationDiv.appendChild(locationButton);

                    map.controls[google.maps.ControlPosition.LEFT_BOTTOM].push(
                        locationDiv
                    );

                    let watchID;

                    locationButton.addEventListener("click", async () => {
                        locationButton.classList.toggle("text-gray-600");
                        locationButton.classList.toggle("text-blue-500");
                        locationButton.classList.toggle("hover:text-black");

                        if (
                            !locationButton.classList.contains("text-gray-600")
                        ) {
                            if (navigator.geolocation) {
                                navigator.geolocation.getCurrentPosition(
                                    (position) => {
                                        map.setCenter({
                                            lat: position.coords.latitude,
                                            lng: position.coords.longitude,
                                        });

                                        watchID =
                                            navigator.geolocation.watchPosition(
                                                (position) => {
                                                    map.setCenter({
                                                        lat: position.coords
                                                            .latitude,
                                                        lng: position.coords
                                                            .longitude,
                                                    });
                                                }
                                            );
                                    },
                                    (e) => {
                                        console.error(e);
                                    }
                                );
                            } else {
                                console.info(
                                    "Browser doesn't support geolocation."
                                );
                            }
                        } else {
                            navigator.geolocation.clearWatch(watchID);
                        }
                    });
                    //#endregion

                    //#region Asset/Pipe Tools
                    if (
                        mapElement.hasAttribute("data-create-asset") ||
                        mapElement.hasAttribute("data-create-pipe")
                    ) {
                        const toolsDiv = document.createElement("div");

                        toolsDiv.classList.add(
                            "mb-6",
                            "flex",
                            "flex-row",
                            "space-x-2"
                        );

                        //#region New Asset
                        if (mapElement.hasAttribute("data-create-asset")) {
                            const newAssetButton =
                                document.createElement("button");

                            newAssetButton.classList.add(...buttonClassList);

                            newAssetButton.innerHTML =
                                '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">' +
                                '<path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />' +
                                "</svg>";

                            toolsDiv.appendChild(newAssetButton);

                            let newAssetMarker;

                            newAssetButton.addEventListener(
                                "click",
                                async () => {
                                    if (
                                        newAssetButton.classList.contains(
                                            "text-gray-600"
                                        )
                                    ) {
                                        const {
                                            AdvancedMarkerElement,
                                            PinElement,
                                        } = await google.maps.importLibrary(
                                            "marker"
                                        );

                                        newAssetButton.classList.remove(
                                            "text-gray-600",
                                            "hover:text-black"
                                        );
                                        newAssetButton.classList.add(
                                            "text-blue-500"
                                        );

                                        const pin = new PinElement({
                                            glyph: "0",
                                            background: "#3F83F8",
                                            borderColor: "#4169E1",
                                            glyphColor: "white",
                                            scale: 1.1,
                                        });

                                        newAssetMarker =
                                            new AdvancedMarkerElement({
                                                map,
                                                position: map.getCenter(),
                                                title: "New Asset",
                                                content: pin.element,
                                                gmpDraggable: true,
                                            });

                                        newAssetMarker.addEventListener(
                                            "dblclick",
                                            () => {
                                                newAssetMarker.setMap(null);
                                                newAssetMarker = null;
                                                newAssetButton.classList.remove(
                                                    "text-blue-500"
                                                );
                                                newAssetButton.classList.add(
                                                    "text-gray-600",
                                                    "hover:text-black"
                                                );
                                            }
                                        );
                                    } else {
                                        window.location.assign(
                                            mapElement.dataset.createAsset +
                                                "?position=" +
                                                newAssetMarker.position.lat +
                                                "," +
                                                newAssetMarker.position.lng
                                        );
                                    }
                                }
                            );
                        }
                        //#endregion

                        //#region New Pipe
                        if (mapElement.hasAttribute("data-create-pipe")) {
                            const newPipeButton =
                                document.createElement("button");

                            newPipeButton.classList.add(...buttonClassList);

                            newPipeButton.innerHTML =
                                '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">' +
                                '<path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5 4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244" />' +
                                "</svg>";

                            toolsDiv.appendChild(newPipeButton);

                            newPipeButton.addEventListener(
                                "click",
                                async () => {
                                    window.location.assign(
                                        mapElement.dataset.createPipe
                                    );
                                }
                            );
                        }
                        //#endregion

                        //#region New Inspection
                        if (mapElement.hasAttribute("data-create-inspection")) {
                            const newInspectionButton =
                                document.createElement("button");

                            newInspectionButton.classList.add(
                                ...buttonClassList
                            );

                            newInspectionButton.innerHTML =
                                '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">' +
                                '<path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607ZM10.5 7.5v6m3-3h-6" />' +
                                "</svg>";

                            toolsDiv.appendChild(newInspectionButton);

                            newInspectionButton.addEventListener(
                                "click",
                                async () => {
                                    window.location.assign(
                                        mapElement.dataset.createInspection
                                    );
                                }
                            );
                        }
                        //#endregion

                        map.controls[
                            google.maps.ControlPosition.BOTTOM_CENTER
                        ].push(toolsDiv);
                    }
                    //#endregion

                    loadMarkers(mapElement, map, google);

                    loadPaths(mapElement, map, google);
                }
            );
        })
        .catch((e) => {
            console.error(e);
        });
}

async function loadMarkers(mapElement, map, google) {
    Array.from(mapElement.getElementsByClassName("marker")).forEach(
        async (markerElement) => {
            const { AdvancedMarkerElement, PinElement } =
                await google.maps.importLibrary("marker");
            const { InfoWindow } = await google.maps.importLibrary("maps");

            const infoWindow = new InfoWindow();

            const pin = new PinElement({
                glyph: markerElement.dataset.id,
                glyphColor: "black",
                background: markerElement.dataset.color ?? "#FF0000",
                borderColor: markerElement.dataset.borderColor ?? "#e60303",
                scale: 1,
            });

            let position;

            if (
                markerElement.hasAttribute("data-lat") &&
                markerElement.dataset.lat.length > 0 &&
                markerElement.hasAttribute("data-lng") &&
                markerElement.dataset.lng.length > 0
            ) {
                position = {
                    lat: parseFloat(markerElement.dataset.lat),
                    lng: parseFloat(markerElement.dataset.lng),
                };
            } else {
                position = map.getCenter();
                position = {
                    lat: position.lat(),
                    lng: position.lng(),
                };
            }

            const marker = new AdvancedMarkerElement({
                map,
                position: position,
                title: markerElement.dataset.title,
                content: pin.element,
                gmpClickable: markerElement.hasAttribute("data-clickable")
                    ? true
                    : false,
                gmpDraggable: markerElement.hasAttribute("data-draggable")
                    ? true
                    : false,
            });

            if (markerElement.hasAttribute("data-clickable")) {
                marker.addListener("gmp-click", async () => {
                    infoWindow.close();
                    infoWindow.setContent(marker.title);
                    infoWindow.open(marker.map, marker);
                });
            }

            if (markerElement.hasAttribute("data-draggable")) {
                marker.addListener("dragend", async (event) => {
                    const position = marker.position;

                    if (markerElement.children.lat) {
                        markerElement.children.lat.value = position.lat;
                        markerElement.children.lng.value = position.lng;
                    }

                    if (markerElement.hasAttribute("data-geocode")) {
                        geocodePosition(position, mapElement);
                    }
                });
            }

            if (markerElement.hasAttribute("data-geocode")) {
                geocodePosition(position, mapElement);
            }
        }
    );
}

async function loadPaths(mapElement, map, google) {
    Array.from(mapElement.getElementsByClassName("path")).forEach(
        async (pathElement) => {
            const { Polyline } = await google.maps.importLibrary("maps");

            const start = pathElement.dataset.start.split(",");
            const end = pathElement.dataset.end.split(",");

            const pipePath = new Polyline({
                path: [
                    {
                        lat: parseFloat(start[0]),
                        lng: parseFloat(start[1]),
                    },
                    {
                        lat: parseFloat(end[0]),
                        lng: parseFloat(end[1]),
                    },
                ],
                strokeColor: pathElement.dataset.color ?? "#FF0000",
                strokeOpacity: pathElement.dataset.opacity ?? 1.0,
                strokeWeight: pathElement.dataset.weight ?? 2,
            });

            pipePath.setMap(map);
        }
    );
}

async function geocodePosition(position, mapElement) {
    const geocoder = new google.maps.Geocoder();

    const response = await geocoder.geocode({
        location: {
            lat: position.lat,
            lng: position.lng,
        },
    });

    const address = response.results[0].address_components;

    const numberElement = mapElement.querySelector("#number");
    if (numberElement) {
        numberElement.value = address[0].short_name;
    }

    const streetNameElement = mapElement.querySelector("#street_name");
    if (streetNameElement) {
        streetNameElement.value = address[1].short_name;
    }

    const cityElement = mapElement.querySelector("#city");
    if (cityElement) {
        cityElement.value = address[2].short_name;
    }

    const stateElement = mapElement.querySelector("#state");
    if (stateElement) {
        stateElement.value = address[4].short_name;
    }

    const zipCodeElement = mapElement.querySelector("#zip_code");
    if (zipCodeElement) {
        zipCodeElement.value = address[6].short_name;
    }
}
