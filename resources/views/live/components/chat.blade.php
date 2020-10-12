
@livewire('chat-list')
@livewire('chat-form')

@push('scripts')
    @livewireStyles
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    @livewireScripts

    <script>
        window.livewire.on('mensajeEnviado', function(){

            $('#avisoSuccess').fadeIn('slow')

            setTimeout(() => {
                $('#avisoSuccess').fadeOut('slow');
            }, 3000);
        })
    </script>

    <script>

        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('70633ff8ae20c2f8780b', {
        cluster: 'mt1'
        });

        var channel = pusher.subscribe('chat-channel');
        channel.bind('chat-event', function(data) {
        // alert(JSON.stringify(data));
            window.livewire.emit("mensajeRecibido", data)
        });
    </script>
@endpush