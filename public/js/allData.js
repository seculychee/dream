/**
 * Created by Szeku on 2017. 12. 20..
 */
$( document ).ready(function() {

    $( "#new_category" ).click(function() {
        $('#category_new')
            .modal('show')
        ;
    });

    $( "#new_user" ).click(function() {
        $('#user_new')
            .modal('show')
        ;
    });

    $( "#user_edit" ).click(function() {
        $('#edit_user')
            .modal('show')
        ;
    });

    $( "#category_edit" ).click(function() {
        $('#edit_category')
            .modal('show')
        ;
    });
    $('table').tablesort();



});