<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id={{ env('APP_ANALYTICS_ID') }}"></script>
<script>
    window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', '{{ env('APP_ANALYTICS_ID') }}');
</script>