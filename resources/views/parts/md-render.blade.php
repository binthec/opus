<script>
    $(function () {
        var text = <?php echo json_encode($body); ?>;
        var md = window.markdownit();
        $('.markdown-body').html(md.render(text));
    });
</script>