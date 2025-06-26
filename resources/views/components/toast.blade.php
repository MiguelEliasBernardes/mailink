@props(['status' => '', 'message' => ''])

<div
    x-data="{show: true}"
    x-show="show"
    x-init="setTimeout(() => show = false, 3000)"
    x-transition
    class="toast toast-top toast-end mt-16">

    <div class="alert alert-{{ $status }}">
        <span>{{$message}}</span>
    </div>

</div>
