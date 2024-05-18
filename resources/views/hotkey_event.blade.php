<div>
    @script
    <script>
        document.addEventListener('keydown', function(event){
            // event.shiftKey
            if(event.altKey) {
                if(event.key === 't'){
                    console.log("design mode");
                    $wire.dispatch('design-mode');
                }
            }
        });
    </script>
    @endscript
</div>
