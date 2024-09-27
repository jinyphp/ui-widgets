<div>
    @script
    <script>
        document.addEventListener('keydown', function(event){
            // event.shiftKey
            if(event.altKey) {
                /* widget */
                if(event.key === 't' || event.key === 'T'){
                    console.log("design mode");
                    $wire.dispatch('design-mode');
                    //window.dispatchEvent(new CustomEvent('design-mode2')); // Custom frontend event
                }

                /* layout */
                if(event.key === 'l' || event.key === 'L'){
                    console.log("Layout mode");
                    $wire.dispatch('layout-mode');
                    //window.dispatchEvent(new CustomEvent('design-mode2')); // Custom frontend event
                }

                /* menu */
                if(event.key === 'm' || event.key === 'M'){
                    console.log("menu edit");
                    $wire.dispatch('menu-mode');
                }

                /* action rules */
                if(event.key === 'k' || event.key === 'K'){
                    console.log("action rules");
                    $wire.dispatch('action-mode');
                }

            }

            if (event.altKey && event.shiftKey) {
                if(event.key === 'm' || event.key === 'M'){
                    console.log("menu edit");
                    $wire.dispatch('menu-mode');
                }
            }
        });
    </script>
    @endscript
</div>
