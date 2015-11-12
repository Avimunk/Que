@extends('admin')
@section('content')

    @if(Session::has('message'))
        <div class="alert alert-block alert-success">
            <button type="button" class="close" data-dismiss="alert">
                <i class="icon-remove"></i>
            </button>
            <h2>{{ Session::get('message') }}</h2>
        </div>
    @endif
        <div class="table-responsive">
            <table id="sample-table-2" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tags as $page)
                    <tr>
                        <td>
                            {{$page->id}}
                        </td>
                        <td>{{$page->name}}</td>


                        <td>
                            <div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
                                <a class="blue" href="/tags/{{$page->id}}">
                                    <i class="icon-zoom-in bigger-130"></i>
                                </a>

                                <a class="green" href="/admin/tags/{{$page->id}}/edit">
                                    <i class="icon-pencil bigger-130"></i>
                                </a>

                                <a class="red" href="/admin/tags/{{$page->id}}/destroy">
                                    <i class="icon-trash bigger-130"></i>
                                </a>
                            </div>

                            <div class="visible-xs visible-sm hidden-md hidden-lg">
                                <div class="inline position-relative">
                                    <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown">
                                        <i class="icon-caret-down icon-only bigger-120"></i>
                                    </button>

                                    <ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close">
                                        <li>
                                            <a href="#" class="tooltip-info" data-rel="tooltip" title="View">
                                                <span class="blue">
                                                    <i class="icon-zoom-in bigger-120"></i>
                                                </span>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
                                                <span class="green">
                                                    <i class="icon-edit bigger-120"></i>
                                                </span>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
                                                <span class="red">
                                                    <i class="icon-trash bigger-120"></i>
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
@endsection


@section('scripts')
    <script type="text/javascript">
        jQuery(function($) {

        })
    </script>
@endsection