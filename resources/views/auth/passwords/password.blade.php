<h3>Click here to reset your password:</h3>
<a href="{{ $link = url('auth/password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}">{{ $link }}</a>
