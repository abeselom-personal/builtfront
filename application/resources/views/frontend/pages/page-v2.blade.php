@extends('frontend.layout-v2.master')
@section('title', $content['page_title'])

@section('content')
    <section class="md:px-20 px-5 py-20 bg-[#F2F9E7] relative page-content">
        <h1 class="text-center text-5xl font-bold text-black mb-10">{{ $content->page_title }}</h1>

        {!! $content->page_content ?? '' !!}
    </section>

@endsection

@push('head')
    <link rel="canonical" href="{{ url('/page/' . $content['page_permanent_link']) }}" />
    @if($page['meta_description'])
        <meta name="description" content="{{ $page['meta_description'] }}"/>
    @endif

    <style>
        .page-content p{
            margin-bottom: 1rem;
        }
    </style>
@endpush