<form method="post" action="">
    <select name="controller">
        @if($controllers)
            @foreach($controllers as $key=>$con)
                <option value={{$key}}>{{$key}}</option>
            @endforeach
        @endif
    </select>
    @if($actions)
        @foreach($actions as $values)
        <div>{{$values}}</div>
        <table>
            @foreach($roles as $role)
            <tr>
                <td><input type="checkbox" name = 'roles[]' value="{{$role->name}}={{$controller}}_{{$values}}" />{{$role->name}}</td>
            </tr>
            @endforeach
        </table>
        @endforeach
    @endif
    <input type="hidden" name="_token" value="{{csrf_token()}}" />
    <input type="submit" value="apply"/>
</form>    

