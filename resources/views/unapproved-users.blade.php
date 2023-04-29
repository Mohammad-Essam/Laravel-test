<x-main-layout title="hunted">
    <div>
        <table>
            <tr>
                <th>Email</th>
                <th>registered at</th>
                <th>action</th>
            </tr>
            @foreach ($users as $user )
            <tr>
                <td> {{ $user->email }} </td>
                <td >{{ $user->created_at->diffForHumans() }}</td>
                <td ><a role="button" href="{{ route('approve', $user->id) }}">approve</a></td>
                {{-- <td>
                    <form action="{{route('approve',$user->id)}}" method="POST">
                        <input type="submit" value="Approve"/>
                    </form>
                </td> --}}
            </tr>

            @endforeach
        </table>

    </div>
</x-main-layout>
