<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
</head>
<body style="font-family: Arial, sans-serif;">
    <h2>Welcome {{ $user->first_name }} {{ $user->last_name }} 👋</h2>

    <p>
        Thank you for signing up on <strong>Job Portal</strong>.
    </p>

    <p>
        You can now:
    </p>

    <ul>
        <li>Browse jobs</li>
        <li>Apply for positions</li>
        <li>Manage your profile</li>
    </ul>

    <p>
         We are excited to have you!
    </p>

    <p>
        Regards,<br>
        Job Search Team
    </p>
</body>
</html>
