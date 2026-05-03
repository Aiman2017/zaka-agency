@extends('errors.layout')

@section('error_code', '419')
@section('error_title', __('Page Expired'))
@section('error_message', __("Your session has expired or the security token is invalid. Please go back and try submitting the form again."))
