<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Primary Meta Tags -->
    <meta name="title"
      content="{{ config('app.name', 'TimBurnOut') }} - Modern Project Management Platform">
    <meta name="description"
      content="TimBurnOut is a modern project management application designed to help teams collaborate efficiently through intuitive task management, real-time communication, and powerful project tracking features.">
    <meta name="keywords"
      content="project management, task management, team collaboration, real-time updates, agile project management, task tracking, team communication, project planning, workflow management, project collaboration">
    <meta name="author" content="TimBurnOut">
    <meta name="robots" content="index, follow">
    <meta name="language" content="English">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ config('app.url') }}">
    <meta property="og:title"
      content="{{ config('app.name', 'TimBurnOut') }} - Modern Project Management Platform">
    <meta property="og:description"
      content="Boost team productivity with TimBurnOut's intuitive project management tools, real-time collaboration features, and powerful task tracking capabilities.">
    <meta property="og:image" content="{{ asset('screenshot.jpg') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ config('app.url') }}">
    <meta property="twitter:title"
      content="{{ config('app.name', 'TimBurnOut') }} - Modern Project Management Platform">
    <meta property="twitter:description"
      content="Boost team productivity with TimBurnOut's intuitive project management tools, real-time collaboration features, and powerful task tracking capabilities.">
    <meta property="twitter:image" content="{{ asset('screenshot.jpg') }}">

    <title inertia>{{ config('app.name', 'TimBurnOut') }}</title>

    <!-- Application Color Theme -->
    <meta name="theme-color" content="#7c3aed">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <!-- Scripts -->
    @routes
    @viteReactRefresh
    @vite(['resources/js/app.tsx', "resources/js/Pages/{$page['component']}.tsx"])
    @inertiaHead
  </head>

  <body class="font-sans antialiased">
    @inertia
  </body>

</html>
