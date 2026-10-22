@props(['size' => 'xs', 'message'])

<div {{ $attributes->merge([ 'class'=>'text-center text-'.$size]) }}>
    <h5>{{$message}}</h5>
</div>