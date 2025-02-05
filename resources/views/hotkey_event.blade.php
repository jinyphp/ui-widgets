<div>
    @script
    <script>
        document.addEventListener('keydown', function(event){
            // event.shiftKey
            if(event.altKey) {

                /* widget toggle */
                if(event.key === 't' || event.key === 'T'){
                    console.log("design mode");
                    $wire.dispatch('design-mode');
                }

                /* layout toggle */
                if(event.key === 'l' || event.key === 'L'){
                    console.log("Layout mode");
                    $wire.dispatch('layout-mode');
                }

                /* menu toggle */
                if(event.key === 'm' || event.key === 'M'){
                    console.log("menu edit");
                    $wire.dispatch('menu-mode');
                }

                /* action rules toggle */
                if(event.key === 'k' || event.key === 'K'){
                    console.log("action rules");
                    $wire.dispatch('action-mode');
                }

                /* Page Edit toggle */
                if(event.key === 'p' || event.key === 'P'){
                    console.log("page edit");
                    $wire.dispatch('page-mode');
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
