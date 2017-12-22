<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Címjegyzék kezelő</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="semantic/semantic.min.css">
    <script
            src="https://code.jquery.com/jquery-3.1.1.min.js"
            integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
            crossorigin="anonymous"></script>
    <script src="semantic/semantic.min.js"></script>
    <script src="js/allData.js"></script>
    <script src="js/jquery.tablesort.min.js"></script>


</head>
<body>
@include('layouts.navbar')
@include('layouts.modals')
@include('layouts.error')

<div class="ui container">
    <button class="ui button" id="new_user">
        {{trans('userData.userCreate')}}
    </button>
</div>


<br/>

<div class="ui container">
    <table class="ui sortable celled table">
        <thead>
        <tr>
            <th>#</th>
            <th>{{trans('userData.name')}}</th>
            <th>{{trans('userData.email')}}</th>
            <th>{{trans('userData.phone')}}</th>
            <th>{{trans('userData.category')}}</th>
            <th>{{trans('userData.edit')}}</th>
            <th>{{trans('userData.delete')}}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($userDatas as $key => $userData)

            <tr>
                <td>
                    <div class="ui ribbon label">{{$key}}</div>
                </td>
                <td>{{$userData->name}}</td>
                <td>{{$userData->email}}</td>

                @if(isset($userData->phone))
                    <td>+36{{$userData->phone}}{{$userData->phone_format}}</td>
                @else
                    <td>{{trans('userData.emptyPhone')}}</td>
                @endif

                @foreach($userData->categories as $category)
                    <td>{{$category->name}}</td>
                @endforeach

                <td>
                    <button class="ui button" id="user_edit{{$userData->id}}">
                        <i class="write icon"></i>
                    </button>
                </td>
                <td>
                    <form class="ui form" action="{{route('userDataDelete',$userData->id)}}" method="post">
                        {{method_field('DELETE')}}
                        {{ csrf_field() }}
                        <button type="submit" class="ui button">
                            <i class="remove user icon"></i>
                        </button>
                    </form>
                </td>
            </tr>

        @endforeach

        </tbody>

        <tfoot>
        <tr>
            <th colspan="7">
                <label>{{trans('userData.allUser')}} {{$userDatas->total()}}</label>
                <div class="ui right floated pagination menu">
                    <a class="icon item" href="{{$userDatas->previousPageUrl()}}">
                        <i class="left chevron icon"></i>
                    </a>
                    <a class="item" href="{{$userDatas->currentPage()}}">{{$userDatas->currentPage()}}</a>
                    <a class="icon item" href="{{$userDatas->nextPageUrl()}}">
                        <i class="right chevron icon"></i>
                    </a>
                </div>
            </th>

        </tr>
        </tfoot>
    </table>

@include('layouts.userModal')


</body>
</html>
