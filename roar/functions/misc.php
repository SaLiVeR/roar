<?php

function site_name() {
	return Config::get('settings.site_name');
}

function notifications() {
	return Notify::read();
}