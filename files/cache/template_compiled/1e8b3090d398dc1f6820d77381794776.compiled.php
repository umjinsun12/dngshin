<?php if(!defined("__XE__"))exit;?>
           
           
        <div class="modal" id="modal2">
            <h1>Modal Demo #2</h1>
            <button class="closeMe">Close Me</button>
        </div>
        <script>
            $(document).ready(function(){
                
                //global settings
                $(document).modal({
                    easing : 'linear',
                    speed : 250,
                    animation : 'none',
                    position : 'center',
                    overlayClose : true,
                    escapeClose : false,
                    overlayColor : '#888'
                });
                //view modal option
                $('.modal2').ready(function(){
                    $('#modal2').modal('view', {
                        position : 'center',
                        animation : 'none',
                        easing : 'easeOutBounce',     
                        overlayClose : false,
                        speed : 150,
                        close : $('.closeMe')
                    });
                });
                
            });
           </script>