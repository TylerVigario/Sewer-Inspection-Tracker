import "./bootstrap";

import { Livewire, Alpine } from '../../vendor/livewire/livewire/dist/livewire.esm';

import queryString from "@invoate/alpine-query-string";

window.Alpine = Alpine;

Alpine.plugin(queryString);

Livewire.start();

import "flowbite";

import "./maps";
