@foreach($userDatas as $userData)

    {{--Címzett szerkesztés modal--}}
    <div class="ui modal" id="edit_user{{$userData->id}}">
        <i class="close icon"></i>
        <div class="header">
            {{trans('userData.userCreate')}}
        </div>
        <div class="content">
            <form class="ui form" action="{{route('userDataUpdate',$userData->id)}}" method="post">
                {{method_field('PUT')}}
                {{ csrf_field() }}
                <div class="field">
                    <label>{{trans('userData.userName')}}</label>
                    <input type="text" name="name" placeholder="{{trans('userData.userName')}}"
                           value="{{$userData->name}}">
                </div>
                <div class="field">
                    <label>{{trans('userData.userEmail')}}</label>
                    <input type="email" name="email" placeholder="{{trans('userData.userEmail')}}"
                           value="{{$userData->email}}">
                </div>


                <label>{{trans('userData.userPhone')}}</label>
                <div class="inline fields">
                    <div class="three wide field">
                        <label>+36</label>
                        <select name="phone_format" class="ui fluid dropdown">
                            <option selected
                                    value="{{isset($userData->phone_format) ? $userData->phone_format : ""}}">{{isset($userData->phone_format) ? $userData->phone_format : "Formátum"}}</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                            <option value="31">31</option>
                            <option value="70">70</option>
                        </select>
                    </div>
                    <div class="five wide field">
                        <input type="number" name="phone" placeholder="{{trans('userData.userPhoneNumber')}}"
                               value="{{isset($userData->phone) ? $userData->phone : "" }}">
                    </div>
                </div>
                {{--Címzett kategória módosítás--}}
                <div class="field">
                    <label>{{trans('userData.userCategory')}}</label>
                    <select name="category" class="ui fluid dropdown">
                        @foreach($categories as $category)
                            @if($category->id != 1)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>


                {{ csrf_field() }}

                <div class="ui black deny button">
                    {{trans('userData.cancel')}}
                </div>
                <input type="submit" class="ui positive right labeled icon button" value="{{trans('userData.save')}}"/>
            </form>
        </div>

        <script>
            $(document).ready(function () {
                $("#user_edit{{$userData->id}}").click(function () {
                    $('#edit_user{{$userData->id}}')
                            .modal('show')
                    ;
                });
            });
        </script>
        @endforeach

    </div>

    <script>
        $('.ui.form')
                .form({
                    fields: {
                        name: {
                            identifier: 'name',
                            rules: [
                                {
                                    type: 'empty',
                                    prompt: 'Please enter your name'
                                }
                            ]
                        },
                        email: {
                            identifier: 'email',
                            rules: [
                                {
                                    type: 'empty',
                                    prompt: 'Please enter your name'
                                }
                            ]
                        }
                    }
                })
        ;
    </script>