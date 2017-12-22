{{--Kategória szerkesztés modal--}}
<div class="ui modal" id="edit_category{{$category->id}}">
    <i class="close icon"></i>
    <div class="header">
        Kategória felvitele
    </div>

    <div class="content">
        <form class="ui form" action="{{route('updateCategory',$category->id)}}" method="post">
            {{method_field('PUT')}}
            {{ csrf_field() }}
            <div class="field">
                <label>Kategória neve</label>
                <input type="text" name="name" placeholder="Kategória neve" value="{{$category->name}}">
            </div>

            <div class="ui black deny button">
                Mégse
            </div>
            <button type="submit" class="ui positive right labeled icon button">
                Mentés
                <i class="checkmark icon"></i>
            </button>
        </form>
    </div>
</div>

<script>
    $( document ).ready(function() {
        $( "#category_edit{{$category->id}}" ).click(function() {
            $('#edit_category{{$category->id}}')
                    .modal('show')
            ;
        });
    });
    $('.ui.form')
            .form({
                fields: {
                    name: {
                        identifier: 'name',
                        rules: [
                            {
                                type   : 'empty',
                                prompt : 'Please enter your name'
                            }
                        ]
                    },
                    email: {
                        identifier: 'email',
                        rules: [
                            {
                                type   : 'empty',
                                prompt : 'Please enter your name'
                            }
                        ]
                    }
                }
            })
    ;
</script>