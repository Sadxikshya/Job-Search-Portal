@component('mail::message')
# New Application Received

{{ $application->user->first_name }} has applied for **{{ $application->job->title }}**.

@component('mail::button', ['url' => url('/jobs/'.$application->job->id)])
View Job
@endcomponent

Thanks,<br>
Job Search Team <br>
@endcomponent
