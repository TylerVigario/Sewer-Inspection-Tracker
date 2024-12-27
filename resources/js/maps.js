import { Loader } from "@googlemaps/js-api-loader";
//import "@googlemaps/extended-component-library/api_loader.js";

if (document.getElementsByClassName("map").length > 0) {
    new Loader({
        apiKey: "AIzaSyC4wX7uf2znePZArRl4n3SiwmZSh4SXfmY",
        version: "beta",
    })
        .load()
        .then(async () => {
            Array.from(document.getElementsByClassName("map")).forEach(
                async (mapElement) => {
                    //#region Map
                    const { Map } = await google.maps.importLibrary("maps");
                    const center = mapElement.dataset.center.split(",");

                    const map = new Map(
                        mapElement.getElementsByClassName("viewport")[0],
                        {
                            zoom: parseInt(mapElement.dataset.zoom),
                            center: {
                                lat: parseFloat(center[0]),
                                lng: parseFloat(center[1]),
                            },
                            mapId: mapElement.dataset.id ?? "TEST_MAP_ID",
                        }
                    );
                    //#endregion

                    //#region Custom Controls
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

                    if (mapElement.hasAttribute("data-create-asset")) {
                        const newAssetButton = document.createElement("button");

                        newAssetButton.classList.add(
                            "mt-2",
                            ...buttonClassList
                        );

                        newAssetButton.innerHTML =
                            '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">' +
                            '<path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />' +
                            "</svg>";

                        map.controls[
                            google.maps.ControlPosition.TOP_CENTER
                        ].push(newAssetButton);

                        let newAssetMarker;

                        newAssetButton.addEventListener("click", async () => {
                            if (
                                newAssetButton.classList.contains(
                                    "text-gray-600"
                                )
                            ) {
                                const { AdvancedMarkerElement, PinElement } =
                                    await google.maps.importLibrary("marker");

                                newAssetButton.classList.remove(
                                    "text-gray-600"
                                );
                                newAssetButton.classList.remove(
                                    "hover:text-black"
                                );
                                newAssetButton.classList.add("text-blue-500");

                                const pin = new PinElement({
                                    glyph: "0",
                                    background: "#3F83F8",
                                    borderColor: "#4169E1",
                                    glyphColor: "white",
                                    scale: 1,
                                });

                                newAssetMarker = new AdvancedMarkerElement({
                                    map,
                                    position: map.getCenter(),
                                    title: "New Asset",
                                    content: pin.element,
                                    gmpDraggable: true,
                                });
                            } else {
                                window.location.assign(
                                    mapElement.dataset.createAsset +
                                        "?position=" +
                                        newAssetMarker.position.lat +
                                        "," +
                                        newAssetMarker.position.lng
                                );
                            }
                        });
                    }
                    //#endregion

                    //#region Markers
                    Array.from(
                        mapElement.getElementsByClassName("marker")
                    ).forEach(async (markerElement) => {
                        const { AdvancedMarkerElement, PinElement } =
                            await google.maps.importLibrary("marker");
                        const { InfoWindow } = await google.maps.importLibrary(
                            "maps"
                        );

                        const infoWindow = new InfoWindow();

                        const pin = new PinElement({
                            glyph: markerElement.dataset.id,
                            glyphColor: "black",
                            scale: 1,
                        });

                        const marker = new AdvancedMarkerElement({
                            map,
                            position: {
                                lat: parseFloat(markerElement.dataset.lat),
                                lng: parseFloat(markerElement.dataset.lng),
                            },
                            title: markerElement.dataset.title,
                            content: pin.element,
                            gmpClickable: markerElement.hasAttribute(
                                "data-clickable"
                            )
                                ? true
                                : false,
                            gmpDraggable: markerElement.hasAttribute(
                                "data-draggable"
                            )
                                ? true
                                : false,
                        });

                        if (markerElement.hasAttribute("data-clickable")) {
                            marker.addListener(
                                "click",
                                async ({ domEvent, latLng }) => {
                                    const { target } = domEvent;

                                    infoWindow.close();
                                    infoWindow.setContent(marker.title);
                                    infoWindow.open(marker.map, marker);
                                }
                            );
                        }

                        if (markerElement.hasAttribute("data-draggable")) {
                            marker.addListener("dragend", async (event) => {
                                const position = marker.position;

                                if (markerElement.children.lat) {
                                    markerElement.children.lat.value =
                                        position.lat;
                                    markerElement.children.lng.value =
                                        position.lng;
                                }

                                if (
                                    markerElement.hasAttribute("data-geocode")
                                ) {
                                    const geocoder = new google.maps.Geocoder();

                                    const response = await geocoder.geocode({
                                        location: {
                                            lat: position.lat,
                                            lng: position.lng,
                                        },
                                    });

                                    const address =
                                        response.results[0].address_components;

                                    mapElement.querySelector("#number").value =
                                        address[0].short_name;
                                    mapElement.querySelector(
                                        "#street_name"
                                    ).value = address[1].short_name;
                                    mapElement.querySelector("#city").value =
                                        address[2].short_name;
                                    mapElement.querySelector("#state").value =
                                        address[4].short_name;
                                    mapElement.querySelector(
                                        "#zip_code"
                                    ).value = address[6].short_name;
                                }
                            });
                        }
                    });
                    //#endregion

                    //#region Paths
                    Array.from(
                        mapElement.getElementsByClassName("path")
                    ).forEach(async (pathElement) => {
                        const { Polyline } = await google.maps.importLibrary(
                            "maps"
                        );

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
                    });
                    //#endregion
                }
            );
        })
        .catch((e) => {
            console.error(e);
        });
}
