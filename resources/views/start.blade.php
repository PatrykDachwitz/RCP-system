<!doctype html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div class="container-fluid d-flex flex-column flex-lg-row min-vh-100 m-0 p-0 align-items-stretch overflow-hidden" id="app">

</div>
<div style="display: none !important;" data-laguage>
    @json(__('content'))
</div>
@vite('resources/js/app.js')
@vite('resources/sass/app.scss')
</body>
</html>
