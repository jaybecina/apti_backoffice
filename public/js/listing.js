function submit_form(url,ids){
    $('#submit_form').attr('action',url);
    $('#ids').val(ids);
    $('#submit_form').submit();
}

function delete_multiple_entries(){
        var counter = 0;
        var selected_entries = '';

        $(".cb:checked").each(function(){
            counter++;
            fid = $(this).attr('id');
            selected_entries += fid.substring(2, fid.length)+'|';
        });
        if(parseInt(counter) < 1){
            Swal.fire({
              icon: 'error',
              title: 'Error',
              text: 'Please select at least one (1) entry.',
            });

            return false;
        }
        else{
            if(parseInt(counter)>1){ // ask for confirmation when multiple pages was selected

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        submit_form(route_multiple_delete_entries,selected_entries);
                    }
                });
            }
            else{
                submit_form(route_multiple_delete_entries,selected_entries);
            }
        }
    }