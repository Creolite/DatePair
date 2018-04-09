<div id="flash-message" class="alert alert-success" role="alert">
    {{$flash}}
</div>
<script>
    setTimeout(function () {
        document.getElementById('flash-message').setAttribute('style', "display:none");
    }, 3500);
</script>
