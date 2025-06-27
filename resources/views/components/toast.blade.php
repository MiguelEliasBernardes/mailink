@props(['status' => '', 'message' => ''])

<div
    x-data="{show: true}"
    x-show="show"
    x-init="setTimeout(() => show = false, 3000)"
    x-transition
    class="toast toast-top toast-end mt-16">

    @if ($status == 'success')
        <div class="alert alert-success">
            <span>{{$message}}</span>
        </div>
    @else
        <div class="alert alert-error">
            <span>{{$message}}</span>
        </div>
    @endif



</div>
