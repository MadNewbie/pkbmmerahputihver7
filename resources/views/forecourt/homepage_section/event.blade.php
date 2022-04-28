<section class="section container event">
    <h2 class="section__title-center event__title">
    {!!__('homepage.title.event')!!}
    </h2>
    <div class="container event__container">
        @if(count($recentEvents)!=0)
            <?php echo($recentEvents) ?>
        @else
            <h3>Belum ada informasi kegiatan terbaru</h3>
        @endif
    </div>
</section>