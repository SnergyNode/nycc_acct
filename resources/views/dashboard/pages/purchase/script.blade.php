<script>
    $(document).on('click', '.fieldMon_others', function () {
        //do something
        let elem = $(this);
        if(elem.val()==='cash and credit'){
            $('.otherField').slideDown();
        }else{
            $('.otherField').slideUp();
        }
    })
</script>