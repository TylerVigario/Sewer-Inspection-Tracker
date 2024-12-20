import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

import "flowbite";

((g) => {
    var h,
        a,
        k,
        p = "The Google Maps JavaScript API",
        c = "google",
        l = "importLibrary",
        q = "__ib__",
        m = document,
        b = window;
    b = b[c] || (b[c] = {});
    var d = b.maps || (b.maps = {}),
        r = new Set(),
        e = new URLSearchParams(),
        u = () =>
            h ||
            (h = new Promise(async (f, n) => {
                await (a = m.createElement("script"));
                e.set("libraries", [...r] + "");
                for (k in g)
                    e.set(
                        k.replace(/[A-Z]/g, (t) => "_" + t[0].toLowerCase()),
                        g[k]
                    );
                e.set("callback", c + ".maps." + q);
                a.src = `https://maps.${c}apis.com/maps/api/js?` + e;
                d[q] = f;
                a.onerror = () => (h = n(Error(p + " could not load.")));
                a.nonce = m.querySelector("script[nonce]")?.nonce || "";
                m.head.append(a);
            }));
    d[l]
        ? console.warn(p + " only loads once. Ignoring:", g)
        : (d[l] = (f, ...n) => r.add(f) && u().then(() => d[l](f, ...n)));
})({
    key: "AIzaSyC4wX7uf2znePZArRl4n3SiwmZSh4SXfmY",
    v: "weekly",
    // Use the 'v' parameter to indicate the version to use (weekly, beta, alpha, etc.).
    // Add other bootstrap parameters as needed, using camel case.
});

async function initMap() {
    // Request needed libraries.
    const { Map, InfoWindow } = await google.maps.importLibrary("maps");
    const { AdvancedMarkerElement, PinElement } =
        await google.maps.importLibrary("marker");
    const map = new Map(document.getElementById("map"), {
        zoom: 17,
        center: markers[0].position,
        mapId: "4504f8b37365c3d0",
    });

    // Create an info window to share between markers.
    const infoWindow = new InfoWindow();

    // Create the markers.
    if (markers) {
        markers.forEach(({ position, title }, i) => {
            const pin = new PinElement({
                glyph: `${i + 1}`,
                scale: 1.5,
            });
            const marker = new AdvancedMarkerElement({
                position,
                map,
                title: `${i + 1}. ${title}`,
                content: pin.element,
                gmpClickable: true,
                gmpDraggable: true,
            });

            // Add a click listener for each marker, and set up the info window.
            marker.addListener("click", ({ domEvent, latLng }) => {
                const { target } = domEvent;

                infoWindow.close();
                infoWindow.setContent(marker.title);
                infoWindow.open(marker.map, marker);
            });

            marker.addListener("dragend", (event) => {
                const position = marker.position;

                infoWindow.close();
                infoWindow.setContent(
                    `Pin dropped at: ${position.lat}, ${position.lng}`
                );
                infoWindow.open(marker.map, marker);
            });
        });
    }

    if (paths) {
        const pipePath = new google.maps.Polyline({
            path: paths,
            geodesic: true,
            strokeColor: "#FF0000",
            strokeOpacity: 1.0,
            strokeWeight: 2,
        });

        pipePath.setMap(map);
    }
}

initMap();
