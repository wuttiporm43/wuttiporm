@extends('bootstrap-theme')

@section('content')
<h1>Staff #{{ $staff->id }}</h1>
<table class="table table-sm" style="width:50%">
    <tbody>
       
        <tr>
            <th> Name </th>
            <td> {{ $staff->name }} </td>
        </tr>
        <tr>
            <th> Age </th>
            <td> {{ $staff->age }} </td>
        </tr>
        <tr>
            <th> Salary </th>
            <td> {{ $staff->salary }} </td>
        </tr>
        <tr>
            <th> Phone </th>
            <td> {{ $staff->phone }} </td>
        </tr>
        
    </tbody>
</table>
@endsection