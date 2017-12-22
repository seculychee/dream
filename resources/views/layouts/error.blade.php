@if (count($errors) > 0)
    <br/>
    <div class="ui container">
        <div class="ui negative message">
            <div class="header">
                {{trans('validation.header')}}
            </div>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{trans($error)}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
    <br/>
@endif

@if(Session::has('success'))
<br/>
<div class="ui container">
    <div class="ui success message">
        <div class="header">
            Sikeres mentés!
        </div>
                    <p>{{ Session::get('success')}}</p>
                    <p></p>
                </div>
            </div>
<br/>
@endif