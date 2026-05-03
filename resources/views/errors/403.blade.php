@extends('errors.layout')

@section('error_code', '403')
@section('error_title', __('Access Denied'))
@section('error_message', __("You don't have permission to access this page. If you believe this is a mistake, please contact the administrator."))
