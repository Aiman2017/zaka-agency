@extends('errors.layout')

@section('error_code', '500')
@section('error_title', __('Server Error'))
@section('error_message', __("Something went wrong on our end. Our team has been notified and we're working to fix it. Please try again in a few moments."))
