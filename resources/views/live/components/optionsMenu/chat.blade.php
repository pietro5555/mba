<div class="modal fade" id="option-modal-chat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Archivos</h5>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
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
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
