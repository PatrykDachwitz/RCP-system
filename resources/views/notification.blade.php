<section class="notifications bg-dark d-flex flex-column justify-content-start py-2 px-3">
    <div class="notifications-header py-2 d-flex justify-content-between align-items-center">
        <strong>Powiadomienia</strong>
        <img src="/assets/close.png" alt="close notification" width="20" height="20" />
    </div>
    @for($i = 0; $i < 10; $i++)
        <div class="notification d-flex flex-column py-3">
            <div class="d-flex justify-content-between align-items-center pt-1 pb-1">
                <strong>12.05.2024</strong>
                <img src="/assets/close.png" class="pointer-event" alt="close" width="20" height="20">
            </div>
            <p class="m-0 pb-1">Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum</p>
            <div class="d-flex justify-content-between pt-1">
                <button class="btn btn-danger">Anuluj</button>
                <button class="btn btn-success">Akceptuj</button>
            </div>
        </div>
    @endfor
</section>
