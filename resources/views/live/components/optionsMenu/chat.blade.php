<style>
    .modal.left .modal-dialog,
    .modal.right .modal-dialog {
        position: fixed;
        margin: 20px;
        top:150px;
        width: 320px;
        height: 100%;
        -webkit-transform: translate3d(0%, 0, 0);
            -ms-transform: translate3d(0%, 0, 0);
             -o-transform: translate3d(0%, 0, 0);
                transform: translate3d(0%, 0, 0);
         bottom:0px;
    }

    .modal.left .modal-content,
    .modal.right .modal-content {
        height: 100%;
        overflow-y: auto;
    }
    
    .modal.left .modal-body,
    .modal.right .modal-body {
        padding: 15px 15px 80px;
    }
    
    /*Left*/
    .modal.left.fade .modal-dialog{
        -webkit-transition: opacity 0.3s linear, left 0.3s ease-out;
           -moz-transition: opacity 0.3s linear, left 0.3s ease-out;
             -o-transition: opacity 0.3s linear, left 0.3s ease-out;
                transition: opacity 0.3s linear, left 0.3s ease-out;
                bottom:0px;
    }
    
    .modal.left.fade.in .modal-dialog{
        left: 0;
    }
</style>

<div class="modal left fade" id="option-modal-chat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Chat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
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
                                        $('#resetinput').val('');
                                        $('#avisoSuccess').fadeIn('slow')
                                        setTimeout(() => {
                                            $('#avisoSuccess').fadeOut('slow');
                                        }, 3000);
                                    })
                                </script>
                            
                                <script>
                                    // Enable pusher logging - don't include this in production
                                    Pusher.logToConsole = true;
                                    var pusher = new Pusher('c92816561f9134ce8d8c', {
                                    cluster: 'us2'
                                    });
                                    var channel = pusher.subscribe('chat-channel');
                                    channel.bind('chat-event', function(data) {
                                    // alert(JSON.stringify(data));
                                        window.livewire.emit("mensajeRecibido", data)
                                        $('#badge-chat').css('display', 'block');
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
