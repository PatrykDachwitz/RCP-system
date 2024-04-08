<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        @vite('resources/sass/app.scss')
    </head>
    <body class="container-fluid d-flex flex-column flex-lg-row min-vh-100 m-0 p-0 align-items-stretch overflow-hidden">
        <nav class="navigation d-flex flex-lg-column justify-content-between py-2 pt-0 px-lg-3 pt-lg-4">
            <div>
                <img src="/assets/home-white.png" width="25" class="mb-lg-5" height="25"  alt="home"/>
            </div>
            <div class="d-flex flex-lg-column">
                @for($i = 0; $i < 10; $i++)
                    <img src="/assets/home-gray.png" class="my-lg-2" width="25" height="25"  alt="home"/>
                @endfor
            </div>

            <div>
                <img src="/assets/home-white.png" class="mt-lg-5" width="25" height="25"  alt="home"/>
            </div>
        </nav>

        <section class="profile d-none d-lg-flex flex-column px-4 pt-5 text-start">
            <img src="/assets/profil.png" width="150" height="150"  alt="home" class="rounded-circle"/>
            <div class="profile__detail">
                <h2 class="mt-2 fs-3">Patryk Dachwitz</h2>
                <ul class="list-unstyled fs-6">
                    <li>Stanowisko: Pracownik</li>
                    <li>Dział: Sprzedaż</li>
                </ul>
            </div>
            <div>
                @for($i = 0; $i < 4; $i++)
                    <div class="mt-3">
                        <h3 class="fs-5">Czas pracy</h3>
                        <div class="rounded-2 profile__marker position-relative overflow-hidden text-center">
                            <span class="profile__marker-time position-relative">100 / 120H</span>
                            <div class="rounded-2 profile__marker-done position-absolute start-0 top-0 w-50 h-100"></div>
                        </div>
                    </div>
                @endfor
            </div>

        </section>
        <section class="content min-vh-100 max-vh-100 d-flex justify-content-center align-items-center">
            <div class="content-body d-flex flex-column">
                <div class="content-body__header d-flex align-items-center">
                    <span class="fs-4 ps-4 text-white">Test</span>
                </div>
                <div class="content-body__body d-flex flex-column overflow-y-scroll">
                    <div class="d-flex flex-column">
                        @for($i = 0; $i < 50; $i++)
                            <div class="text-danger">testsefds</div>
                        @endfor
                    </div>
                </div>
            </div>

<!--            <div class="content-body d-flex justify-content-center align-items-center">
&lt;!&ndash;                <div class="shadow content-body__cart d-flex flex-column rounded-2 overflow-hidden">
                    <div class="content-body__cart-header d-flex align-items-center">
                        <span class="fs-4 ps-4 text-white">Test</span>
                    </div>
                    <div class="content-body__cart-body d-flex flex-column overflow-y-scroll">
                        <div class="d-flex flex-column">
                            @for($i = 0; $i < 50; $i++)
                                <div class="text-danger">testsefds</div>
                            @endfor
                        </div>
                    </div>
                </div>&ndash;&gt;
            </div>-->
        </section>
    </body>
</html>
