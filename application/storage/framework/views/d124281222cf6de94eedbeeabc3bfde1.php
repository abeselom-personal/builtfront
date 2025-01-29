<?php
/**
 * Anything added to this file will be added inside the <head> of-
 *
 * admin dashboard (landlord)
 * customers dashboard
 * frontend
 */
?>

<?php if(env('APP_ENV') == 'production'): ?>

<script type="text/javascript">
    (function(c,l,a,r,i,t,y){
        c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
        t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;
        y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
    })(window, document, "clarity", "script", "kva71y8vrd");
</script>

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-11562235105">
</script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-11562235105');
</script>
<?php endif; ?><?php /**PATH /var/www/html/application/resources/views/misc/global_head.blade.php ENDPATH**/ ?>