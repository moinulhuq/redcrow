<a tabindex='0' href='javascript: void(0);' class='deleteRecord' id='deleteRecord' data-trigger='focus'  data-placement='right' data-toggle='popover' data-html='true' title='Are you sure ?'
       data-content='<div align="center">
        <form class="form-inline" action="{{$url}}/{{$rowId}}" method="POST">
            @csrf
            <input type="hidden" name="_method" value="DELETE">
            <button type="submit" name="deleteConfirm" id="deleteConfirm" class="btn btn-danger btn-sm deleteConfirm">YES</button>
            <button name="deleteCancel" id="deleteCancel" class="btn btn-secondary text-white btn-sm deleteCancel">NO</button>
        </form>
       </div>'>
    {!! $logo !!}</a>