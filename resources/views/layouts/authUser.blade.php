@php
    $user = auth()->user();

    $authUser = !is_null($user)
    ? [
        'csrf_token' => csrf_token(),
        ...$user->only(['id', 'name', 'email']),
    ]
    : [];
@endphp

<script lang="js">
    window.authUser = @json($authUser)
</script>
