@extends('errors::minimal')

@section('title', __('Server Error'))
@section('code', '500')
@section('message', __('Server Error'))
<x-error-layout title="خطای سرور" code="500"
  message="متاسفانه مشکلی پیش آمده، این مشکل از طرف سایت میباشد و ربطی به شما ندارد." />
