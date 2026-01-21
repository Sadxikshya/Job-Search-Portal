@component('mail::message')
@if($application->status === 'accepted')
# 🎉 Congratulations!

Your application for **{{ $application->job->title }}** has been **accepted**.

The employer may contact you soon.
@elseif($application->status === 'rejected')
# Application Update

Thank you for applying to **{{ $application->job->title }}**.

Unfortunately, the employer decided not to proceed at this time.
@else
# Application Status Updated
                                                                                                     
Your application for **{{ $application->job->title }}** is now **{{ ucfirst($application->status) }}**.
@endif

@component('mail::button', ['url' => url('/profile')])
View My Applications
@endcomponent

Thanks,<br>
Job Search Team!<br>
{{-- {{ config('app.name') }} --}}
@endcomponent
