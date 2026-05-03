@extends('errors.layout')

@section('error_code', '401')
@section('error_title', __('Unauthorized'))
@section('error_message', __("You need to be logged in to access this page. Please sign in and try again."))
