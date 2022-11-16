<x-mail::message>
# Hi {{ $full_name }},
Welcome to <strong>TDEdu</strong>!

For your reference, your user name is <strong>{{ $email }}</strong> for logging in.

## Your password:
<x-mail::panel>
{{ $password }}
</x-mail::panel>

<x-mail::button :url="$url" color="success">
Go the website
</x-mail::button>

</x-mail::message>
