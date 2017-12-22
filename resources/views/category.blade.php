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
    <button class="ui button" id="new_category">
        {{trans('category.categoryCreate')}}
    </button>
</div>


<br/>

<div class="ui container">
    <table class="ui sortable celled table">
        <thead>
        <tr>
            <th>#</th>
            <th>{{trans('category.name')}}</th>
            <th class="no-short">{{trans('category.edit')}}</th>
            <th class="no-short">{{trans('category.delete')}}</th>
        </tr>
        </thead>
        <tbody>

        @foreach($categories as $key => $category)
            <tr>
                <td>
                    <div class="ui ribbon label">{{$key}}</div>
                </td>
                <td>{{$category->name}}</td>
                <td>
                    @if($category->id != 1)
                        <button class="ui button" id="category_edit{{$category->id}}">
                            <i class="write icon"></i>
                        </button>
                </td>
                <td>
                    <form class="ui form" action="{{route('categoryDelete',$category->id)}}" method="post">
                        {{method_field('DELETE')}}
                        {{ csrf_field() }}
                        <button type="submit" class="ui button">
                            <i class="remove user icon"></i>
                        </button>
                    </form>
                    @endif
                </td>
            </tr>
        @endforeach

        </tbody>
        <tfoot>
        <tr>
            <th colspan="7">
                <label>{{trans('category.allCategory')}} {{$categories->total()}}</label>
                <div class="ui right floated pagination menu">
                    <a class="icon item" href="{{$categories->previousPageUrl()}}">
                        <i class="left chevron icon"></i>
                    </a>
                    <a class="item" href="{{$categories->currentPage()}}">{{$categories->currentPage()}}</a>
                    <a class="icon item" href="{{$categories->nextPageUrl()}}">
                        <i class="right chevron icon"></i>
                    </a>
                </div>
            </th>
        </tr>
        </tfoot>
    </table>
</div>

@include('layouts.categoryModal')

</body>
</html>
