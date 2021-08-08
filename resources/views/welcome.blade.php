<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Paper archive photo digilization</title>
        <script src="https://unpkg.com/vue@next"></script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
 
    </head>
    <body>
    <h1 id="site-heading">Welcome to {{ siteName }}</h1>
        <script>
            const app = Vue.createApp({
                data() {
                    return {
                        siteName: 'Learn Vue LiveLessons',
                    };
                }
            }).mount('#site-heading');
        </script>
</html>
