<video class="d-block w-100 leccion-curso" controls crossorigin playsinline
    poster="{{ asset('images/banner_live.png') }}" id="player">
    <!-- Video files -->
    <source src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-576p.mp4" type="video/mp4" size="576" />
    <source src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-720p.mp4" type="video/mp4" size="720" />
    <source src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-1080p.mp4" type="video/mp4"
        size="1080" />

    <!-- Caption files -->
    <track kind="captions" label="English" srclang="en"
        src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.en.vtt" default />
    <track kind="captions" label="Français" srclang="fr"
        src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.fr.vtt" />
</video>
