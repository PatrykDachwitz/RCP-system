<div class="histories d-flex flex-column align-items-stretch">

    @for($i = 0; $i < 15; $i++)
        <div class="history d-flex flex-column p-2 bg-gray-light">
            <div class="text-dark d-flex justify-content-between align-items-center">
                <div>
                    <strong class="text-dark">12.02.2024 Poniedziałek</strong>
                    - Wejśćei: <span class="text-danger">6:15</span>
                    -
                    Wyjście: <span class="text-success">14:00</span>
                </div>
                <div>
                    <button class="btn btn-dark"><img src="/assets/add.png" width="20" height="20" alt="add event history"/></button>
                </div>
            </div>
            <div class="history-info text-dark ps-4 py-2"><strong class="text-dark">6:15</strong> - Zarejestrowao wyjśce słuzbowe</div>
            <div class="text-dark ps-4 py-2"><strong class="text-dark">6:15</strong> - ZArejestrowano wejśćie</div>
        </div>
    @endfor
</div>
