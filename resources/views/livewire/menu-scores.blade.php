<div class="text-center">
    <li class="nav-item">
        <span class="nav-link text-center" aria-current="page">امتیاز همکاری:
            {{ $colabrateScore }}</span>
    </li>
    <li class="nav-item">
        <span class="nav-link text-center" aria-current="page">امتیاز تمرین:
            {{ $practiceScore }}</span>
    </li>
    <li class="nav-item">
        <span class="nav-link text-center" aria-current="page">تعداد روزهای تمرین:
            {{ $practiceDays }}</span>
    </li>

    <i class="fas fa-refresh text_blue pointer hoverable_text" wire:click="calculateScores"></i>
</div>
