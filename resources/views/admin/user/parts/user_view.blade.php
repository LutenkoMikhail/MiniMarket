<tr>
    <td>{{ __($user->id) }}</td>
    <td>{{ __($user->name) }}</td>
    <td>{{ __($user->email) }}</td>
    <td>{{ __($user->role()->value('name')) }}</td>
    <td>{{ __($user->order()->get()->count()) }}</td>
</tr>
