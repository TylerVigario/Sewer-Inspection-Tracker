import { Loader } from "@googlemaps/js-api-loader";
//import "@googlemaps/extended-component-library/api_loader.js";

const loader = new Loader({
    apiKey: "AIzaSyC4wX7uf2znePZArRl4n3SiwmZSh4SXfmY",
    version: "beta",
});

// Load Google Maps libraries
loader
    .load()
    .then(async () => {
        Array.from(document.getElementsByClassName("map")).forEach(initMap);
    })
    .catch((e) => {
        console.error(e);
    });

async function initMap(mapElement) {
    const { Map, InfoWindow } = await google.maps.importLibrary("maps");
    const { AdvancedMarkerElement, PinElement } =
        await google.maps.importLibrary("marker");
    const { Polyline } = await google.maps.importLibrary("drawing");

    const center = mapElement.dataset.center.split(',');
    let pos;

    const map = new Map(mapElement.getElementsByClassName("viewport")[0], {
        zoom: parseInt(mapElement.dataset.zoom),
        center: {
            lat: parseFloat(center[0]),
            lng: parseFloat(center[1]),
        },
        mapId: "4504f8b37365c3d0",
    });

    Array.from(mapElement.getElementsByClassName("marker")).forEach(async (markerElement) => {
        const infoWindow = new InfoWindow();

        const pin = new PinElement({
            glyph: markerElement.dataset.id,
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
            gmpClickable: markerElement.dataset.clickable === "" ? true : false,
            gmpDraggable: markerElement.dataset.draggable === "" ? true : false,
        });

        if (markerElement.dataset.geolocation === "") {
            marker.position = pos = await getLocation(pos);

            if (pos = await getLocation(pos)) {
                marker.position = pos;
            }
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

                if (markerElement.children.lat) {
                    markerElement.children.lat.value = position.lat;
                    markerElement.children.lng.value = position.lng;
                }

                if (markerElement.dataset.geocode === "") {
                    const geocoder = new google.maps.Geocoder();

                    const response = await geocoder.geocode({
                        location: { lat: position.lat, lng: position.lng },
                    });

                    const address = response.results[0].address_components;

                    mapElement.querySelector("#number").value =
                        address[0].short_name;
                    mapElement.querySelector("#street_name").value =
                        address[1].short_name;
                    mapElement.querySelector("#city").value =
                        address[2].short_name;
                    mapElement.querySelector("#state").value =
                        address[4].short_name;
                    mapElement.querySelector("#zip_code").value =
                        address[6].short_name;
                }
            });
        }
    });

    Array.from(mapElement.getElementsByClassName("path")).forEach(async (pathElement) => {
        const start = pathElement.dataset.start.split(',');
        const end = pathElement.dataset.end.split(',');

        const pipePath = new google.maps.Polyline({
            path: [{
                lat: parseFloat(start[0]),
                lng: parseFloat(start[1]),
            },{
                lat: parseFloat(end[0]),
                lng: parseFloat(end[1]),
            }],
            strokeColor: pathElement.dataset.color ?? "#FF0000",
            strokeOpacity: pathElement.dataset.opacity ?? 1.0,
            strokeWeight: pathElement.dataset.weight ?? 2,
        });

        pipePath.setMap(map);
    });

    if (mapElement.dataset.geolocation === "") {
        if (pos = await getLocation(pos)) {
            map.setCenter(pos);
        }
    }
}

async function getLocation(pos) {
    if (pos) {
        return pos;
    } else {
        if (navigator.geolocation) {
            let position = await getCoordinates();

            return {
                lat: position.coords.latitude,
                lng: position.coords.longitude,
            };
        }

        console.error("Browser doesn't  support geolocation.")

        return false;
    }
}

async function getCoordinates() {
    return new Promise(function (resolve, reject) {
        navigator.geolocation.getCurrentPosition(resolve, reject);
    });
}
