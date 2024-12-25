import "./bootstrap";
import queryString from "@invoate/alpine-query-string";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.plugin(queryString);

Alpine.start();

import "flowbite";

import "./maps";
