@component('mail::message')
Hello Admin,

You have received a new reply on a post.

Please visit your admin panel to review and approve/reject this reply. Your link is here:
@component('mail::button', ['url' => route('admin.post.replies')])
Review Replies
@endcomponent

Best Regards,<br>
{{ config('app.name') }}
@endcomponent