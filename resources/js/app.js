import "./bootstrap";
import queryString from "@invoate/alpine-query-string";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.plugin(queryString);

Alpine.start();

import "flowbite";

Array.from(document.getElementsByClassName("map")).forEach(loadMap);

async function loadMap(mapElement) {
    const { Map, InfoWindow } = await google.maps.importLibrary("maps");
    const { AdvancedMarkerElement, PinElement } =
        await google.maps.importLibrary("marker");

    let markers = mapElement.getElementsByClassName("marker");
    let pos;

    const map = new Map(mapElement.getElementsByClassName("viewport")[0], {
        zoom: parseInt(mapElement.dataset.zoom),
        center: {
            lat: parseFloat(mapElement.dataset.lat),
            lng: parseFloat(mapElement.dataset.lng),
        },
        mapId: "4504f8b37365c3d0",
    });

    Array.from(markers).forEach(async (markerElement) => {
        const infoWindow = new InfoWindow();

        const pin = new PinElement({
            glyph: markerElement.dataset.title,
            scale: 1.5,
        });

        const marker = new AdvancedMarkerElement({
            map,
            position: {
                lat: parseFloat(markerElement.dataset.lat),
                lng: parseFloat(markerElement.dataset.lng),
            },
            title: markerElement.dataset.title,
            content: pin.element,
            gmpClickable: markerElement.dataset.clickable === "" ? true : false,
            gmpDraggable: markerElement.dataset.draggable === "" ? true : false,
        });

        if (markerElement.dataset.geolocation === "") {
            marker.position = pos = await getLocation(pos);
        }

        if (markerElement.dataset.clickable === "") {
            marker.addListener("click", async ({ domEvent, latLng }) => {
                const { target } = domEvent;

                infoWindow.close();
                infoWindow.setContent(marker.title);
                infoWindow.open(marker.map, marker);
            });
        }

        if (markerElement.dataset.draggable === "") {
            marker.addListener("dragend", async (event) => {
                const position = marker.position;

                markerElement.children.lat.value = position.lat;
                markerElement.children.lng.value = position.lng;

                if (markerElement.dataset.geocode === "") {
                    const geocoder = new google.maps.Geocoder();

                    const response = await geocoder.geocode({
                        location: { lat: position.lat, lng: position.lng },
                    });

                    const address = response.results[0].address_components;

                    console.debug(address);

                    mapElement.querySelector("#number").value = address[0].short_name;
                    mapElement.querySelector("#street_name").value = address[1].short_name;
                    mapElement.querySelector("#city").value = address[2].short_name;
                    mapElement.querySelector("#state").value = address[4].short_name;
                    mapElement.querySelector("#zip_code").value = address[6].short_name;
                }
            });
        }
    });

    if (mapElement.dataset.geolocation === "") {
        map.setCenter((pos = await getLocation(pos)));
    }

    /*if (paths) {
        const pipePath = new google.maps.Polyline({
            path: paths,
            geodesic: true,
            strokeColor: "#FF0000",
            strokeOpacity: 1.0,
            strokeWeight: 2,
        });

        pipePath.setMap(map);
    }*/
}

async function getLocation(pos) {
    if (pos) {
        return pos;
    } else {
        console.debug("Attempting to get geolocation from browser.");

        if (navigator.geolocation) {
            let position = await getCoordinates();

            console.debug(position);

            return {
                lat: position.coords.latitude,
                lng: position.coords.longitude,
            };
        }

        return false;
    }
}

async function getCoordinates() {
    return new Promise(function (resolve, reject) {
        navigator.geolocation.getCurrentPosition(resolve, reject);
    });
}
