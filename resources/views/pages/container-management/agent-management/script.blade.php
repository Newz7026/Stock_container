<script>
    let delete_data = $('.btn-delete')
    delete_data.click(function() {
        var data_id_del = $(this).attr('data-id')
        var data_name_del = $(this).attr('data-name')
        $('#delete_id').val(data_id_del)
        $('#delete_name').val(data_name_del)
        console.log(data_name_del)
        console.log(data_id_del)
    });

    $('.btn-update').click(function() {
        var data_id_edit = $(this).attr('data-id')
        var data_name_edit = $(this).attr('data-name')
        var data_add_edit = $(this).attr('data-add')
        var data_phone_edit = $(this).attr('data-phone')
        var data_fax_edit = $(this).attr('data-fax')
        var data_tax_edit = $(this).attr('data-taxpayer')
        $('#edit_id').val(data_id_edit)
        $('#edit_name').val(data_name_edit)
        $('#edit_add').val(data_add_edit)
        $('#edit_phone').val(data_phone_edit)
        $('#edit_fax').val(data_fax_edit)
        $('#edit_tax').val(data_tax_edit)
    });
</script>
