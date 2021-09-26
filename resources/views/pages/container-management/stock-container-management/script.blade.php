
<script>

    $('.btn-update').click(function(){
            var id = $(this).attr('data-id')
            var agent = $(this).attr('data-agent')
            var no = $(this).attr('data-no')
            var type = $(this).attr('data-type')
            var grade = $(this).attr('data-grade')
            var status = $(this).attr('data-status')
            var date = $(this).attr('data-date')
            var name = $(this).attr('data-name')
            var tel = $(this).attr('data-tel')
            var car = $(this).attr('data-car')
            var prise = $(this).attr('data-prise')

            $('#hidden_id_update').val(id)
            $('#update_agent').val(agent)
            $('#update_no').val(no)
            $('#update_type').val(type)
            $('#update_grade').val(grade)
            $('#update_status').val(status)
            $('#update_date').val(date)
            $('#update_name').val(name)
            $('#update_tel').val(tel)
            $('#update_car').val(car)
            $('#update_prise').val(prise)


        })
        $('.btn-expose').click(function(){
            var id = $(this).attr('data-id')
            var agent_name = $(this).attr('data-agent')
            var no = $(this).attr('data-no')
            var type = $(this).attr('data-type')
            var grade = $(this).attr('data-grade')
            var status = $(this).attr('data-status')
            var date = $(this).attr('data-date')
            var name = $(this).attr('data-name')
            var tel = $(this).attr('data-tel')
            var car = $(this).attr('data-car')
            var prise = $(this).attr('data-prise')

            $('#hidden_id_expose').val(id)
            $('#expose_agent').val(agent_name)
            $('#expose_no').val(no)
            $('#expose_type').val(type)
            $('#expose_grade').val(grade)
            $('#expose_status').val(status)
            $('#expose_date').val(date)
            $('#expose_name').val(name)
            $('#expose_tel').val(tel)
            $('#expose_car').val(car)
            $('#expose_prise').val(prise)


        })



        $('.btn-view').click(function(){
            var agent = $(this).attr('data-agent')
            var no = $(this).attr('data-no')
            var type = $(this).attr('data-type')
            var grade = $(this).attr('data-grade')
            var status = $(this).attr('data-status')
            var date = $(this).attr('data-date')
            var name = $(this).attr('data-name')
            var tel = $(this).attr('data-tel')
            var car = $(this).attr('data-car')
            var prise = $(this).attr('data-prise')

            $('#view_agent').val(agent)
            $('#view_no').val(no)
            $('#view_type').val(type)
            $('#view_grade').val(grade)
            $('#view_status').val(status)
            $('#view_date').val(date)
            $('#view_name').val(name)
            $('#view_tel').val(tel)
            $('#view_car').val(car)
            $('#view_prise').val(prise)


        })

        $('.btn-delete').click(function(){
            var id = $(this).attr('data-id')
            var number = $(this).attr('data-no')
            $('#delete_id').val(id)
            $('#delete_number').val(number)
        })
    </script>
