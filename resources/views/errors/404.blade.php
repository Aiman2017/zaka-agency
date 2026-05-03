@extends('errors.layout')

@section('error_code', '404')
@section('error_title', __('Page Not Found'))
@section('error_message', __("The page you're looking for doesn't exist or has been moved. Double-check the URL or head back to the homepage."))
