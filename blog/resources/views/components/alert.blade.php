@if(session('status'))
<div
    x-data="{ show: true}"
    x-init="SetTimeOut(()=>show=false,4000)"
    x-show="show"
    x-transition
    x-cloak
    role="status"
    class="mb-6 flex items-start justify-between rounded-lg bg-emerald-50 p-4 text-sm text-emerald-800 ring-1 ring-emerald-200"
>

<span>{{session('status')}}</span>
<button type="button" x-on:click="show = flase" aria-label="tanca"
        class="ml-4" text-emerald-600 hover:text-emerald-900>&times;
</button>

</div>