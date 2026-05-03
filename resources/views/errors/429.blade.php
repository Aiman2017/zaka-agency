@extends('errors.layout')

@section('error_code', '429')
@section('error_title', __('Too Many Requests'))
@section('error_message', __("You've sent too many requests in a short period. Please wait a moment and try again."))
