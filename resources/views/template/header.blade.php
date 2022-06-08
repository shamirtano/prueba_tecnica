<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prueba Técnica - PHP - @yield('title')</title>
    {{-- Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    {{-- Bootstrap --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    {{-- Fontawesome --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    {{-- Datatable --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    {{-- Custom Styles, sweetalert2 --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <aside>
             {{-- Header --}}
            <div class="row">
                <div class="col-md-12">
                    <div class="header-title">
                        <h1 class="p3">Prueba Técnica - PHP</h1>
                    </div>
                </div>
            </div>
            {{-- End Header --}}
        </aside>

        <main>
            {{-- Content --}}
            <div class="row">
                <div class="col-md-12">
                    @yield('content')
                </div>
            </div>
            {{-- End Content --}}
        </main>

        <section>
            {{-- footer --}}
            @extends('template.footer')
        </section>
    </div>




