<?php  $this->view('components/toasts') ?>
<?php  $this->view('components/add_button') ?>
</main>
<!-- Bootstrap JS and Popper JS  CDN -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
<script>
    CKEDITOR.replace( 'editor' );

    const toast = document.querySelector('.toast');

    if(toast){
        setTimeout(()=>{
            toast.classList.add('hide');
            toast.classList.remove('show');
        }, 3000);
    }
</script>
</body>
</html>